<div class="content">

	<?php
	// individual patient feedback link
	$ip_link_patient_feedback = base_url($this->uri->segment(1) . '/employee_complaint?empid=');
	$this->db->select("*");
	$this->db->from('setup_incident');
	//$this->db->where('parent', 0);
	$query = $this->db->get();
	$reasons = $query->result();
	foreach ($reasons as $row) {
		$keys[$row->shortkey] = $row->shortkey;
		$res[$row->shortkey] = $row->shortname;
		$titles[$row->shortkey] = $row->title;
	}
	if (count($departments)) {
		?>

		<div class="row">

			<!--  table area -->
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading" style="text-align: right;">
						<div class="btn-group">
							<a class="btn btn-success" target="_blank" data-placement="bottom" data-toggle="tooltip"
								title="Download open incidents report"
								href="<?php echo base_url($this->uri->segment(1)) . '/download_' . ($this->uri->segment(2)) ?>">
								<i class="fa fa-file-text"></i>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<?php if (isfeature_active('INC-INCIDENTS-DASHBOARD') === true) { ?>
							<form>
								<p>
									<span style="font-size:16px;"><strong>Filter By : </strong></span>

									<select name="dep" class="form-control" id="dep_category"
										onchange="gotonextdepartment2(this.value)"
										style="width:200px; margin:0px 0px 20px 20px;">
										<option value="1" selected>Incident Short Name</option>
										<?php
										$this->db->group_by('description');
										$this->db->where('type', 'incident');
										$query = $this->db->get('department');
										$result = $query->result();
										foreach ($result as $row) {
											$selected = ($this->input->get('depsec') == $row->description) ? "selected" : "";
											echo '<option value="' . str_replace('&', '%26', $row->description) . '" ' . $selected . '>' . $row->description . '</option>';
										}
										?>
									</select>

									<?php if (isset($_GET['depsec'])) { ?>
										<select name="dep" class="form-control" id="dep_incident"
											onchange="gotonextdepartment(this.value)"
											style="width:200px; margin:0px 0px 20px 20px;">
											<option value="1" selected><?php echo lang_loader('inc', 'inc_select_incident'); ?>
											</option>
											<?php
											$this->db->where('type', 'incident');
											$this->db->where('description', $this->input->get('depsec'));
											$query = $this->db->get('department');
											$result = $query->result();
											foreach ($result as $row) {
												$selected = ($this->input->get('type') == $row->dprt_id) ? "selected" : "";
												echo '<option value="' . $row->dprt_id . '" ' . $selected . '>' . $row->name . '</option>';
											}
											?>
										</select>
									<?php } ?>
									<select name="depsec_assigned_risk" class="form-control" id="dep_assigned_risk"
										onchange="gotonextdepartment_assigned_risk(this.value)"
										style="width:200px; margin:0px 0px 20px 20px;">
										<option value="1" selected>Assigned Risk</option>
										<?php
										$this->db->order_by('title');
										$query = $this->db->get('assigned_risk');
										foreach ($query->result() as $row) {
											$selected = ($this->input->get('depsec_assigned_risk') == $row->title) ? "selected" : "";
											echo '<option value="' . str_replace('&', '%26', $row->title) . '" ' . $selected . '>' . $row->title . '</option>';
										}
										?>
									</select>


									<select name="depsec_priority" class="form-control" id="dep_priority"
										onchange="gotonextdepartment_priority(this.value)"
										style="width:200px; margin:0px 0px 20px 20px;">
										<option value="1" selected>Action Priority</option>
										<?php
										$this->db->order_by('title');
										$query = $this->db->get('priority');
										foreach ($query->result() as $row) {
											$selected = ($this->input->get('depsec_priority') == $row->title) ? "selected" : "";
											echo '<option value="' . str_replace('&', '%26', $row->title) . '" ' . $selected . '>' . $row->title . '</option>';
										}
										?>
									</select>
									<select name="dep" class="form-control" id="dep_severity"
										onchange="gotonextdepartment_severity(this.value)"
										style="width:200px; margin:0px 0px 20px 20px;">
										<option value="1" selected>Incident Category</option>
										<?php
										$this->db->order_by('title');
										$query = $this->db->get('incident_type');
										foreach ($query->result() as $row) {
											$selected = ($this->input->get('depsec_severity') == $row->title) ? "selected" : "";
											echo '<option value="' . str_replace('&', '%26', $row->title) . '" ' . $selected . '>' . $row->title . '</option>';
										}
										?>
									</select>


								</p>
							</form>
							<br />
						<?php } ?>

						<table class="incticketsopen table table-striped table-bordered table-hover" cellspacing="0"
							width="100%">
							<thead>
								<tr>
									<th style="width:5%;"><?php echo lang_loader('inc', 'inc_slno'); ?></th>
									<th style="width:25%;">Incident details</th>
									<th style="width:15%;"><?php echo lang_loader('inc', 'inc_incident_reported_by'); ?>
									</th>
									<th style="width:13%;"><?php echo lang_loader('inc', 'inc_reported_on'); ?> / Occurred
										on</th>
									<th style="width:17%;">Risk / Priority / Category</th>
									<th style="width:15%;">Assigned to</th>
									<th style="width:10%; text-align: center;">
										<?php echo lang_loader('inc', 'inc_status'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($departments)) {

									?>
									<?php $sl = 1; ?>
									<?php foreach ($departments as $department) {


										// Step 1: Build user_id → firstname map
										$userss = $this->db->select('user_id, firstname')
											->where('user_id !=', 1)
											->get('user')
											->result();

										$userMap = [];
										foreach ($userss as $u) {
											$userMap[$u->user_id] = $u->firstname;
										}

										// Step 2: Convert comma-separated IDs into arrays
										$assign_for_process_monitor_ids = !empty($department->assign_for_process_monitor)
											? explode(',', $department->assign_for_process_monitor)
											: [];

										$assign_to_ids = !empty($department->assign_to)
											? explode(',', $department->assign_to)
											: [];

										// Step 3: Map IDs → names
										$assign_for_process_monitor_names = array_map(function ($id) use ($userMap) {
											return $userMap[$id] ?? $id;
										}, $assign_for_process_monitor_ids);

										$assign_to_names = array_map(function ($id) use ($userMap) {
											return $userMap[$id] ?? $id;
										}, $assign_to_ids);

										// Step 4: Join into comma-separated strings
										$actionText_process_monitor = implode(', ', $assign_for_process_monitor_names);
										$names = implode(', ', $assign_to_names);


										if ($department->status == 'Transfered') {
											$this->db->where('ticketid', $department->id)->where('ticket_status', 'Transfered');
											$query = $this->db->get('ticket_incident_message');
											$ticket = $query->result();
											$trans_comm = $ticket[0]->reply;
											$rowmessage = $ticket[0]->message . ' Transfered because, ' . $ticket[0]->reply;
										} elseif ($department->status == 'Reopen') {
											$this->db->where('ticketid', $department->id)->where('ticket_status', 'Reopen');
											$query = $this->db->get('ticket_incident_message');
											$ticket = $query->result();
											$reopen_comm = $ticket[0]->reply;
											$rowmessage = $ticket[0]->message . 'Reopened because, ' . $ticket[0]->reply;
											$comment = $ticket[0]->reply;
										} else {
											$last_modified = time();
											$rowmessage = 'THIS TICKET IS OPEN';
											$createdOn1 = strtotime($department->created_on);
											//print_r($createdOn1);
											$lastModified1 = $last_modified;
											// print_r($lastModified1);
							
											//print_r($ttime);
											//print_r($department->department);
											$ttime = strtotime('+' . $department->department->close_time . ' seconds', $createdOn1);
											$closeddiff = $lastModified1 - $createdOn1;
											// $timeleft =   $department->department->close_time + $createdOn1;
											if ($department->department->close_time <= $closeddiff) {
												$close = '<b><span style="color:red;">Exceeded TAT<span></b>';
											} else {
												$close = '<b><span style="color:green;">Within TAT<span></b>';
											}
										}
										if (strlen($rowmessage) > 60) {
											$rowmessage = substr($rowmessage, 0, 60) . '...';
										}

										?>
										<tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>" data-placement="bottom"
											data-toggle="tooltip" title="<?php echo $rowmessage; ?>">
											<td><?php echo $sl; ?></td>
											<td style="overflow-wrap: break-word; word-break: normal; white-space: normal;">
												<strong>Incident ID:</strong> <?php echo $department->id; ?><br>

												<?php
												if ($department->departmentid_trasfered != 0) {
													$show = false;
													if ($department->status == 'Addressed') {
														echo '<strong>Incident:</strong> Ticket was transferred<br>';
														$show = true;
													}
													if ($department->status == 'Transfered') {
														echo '<strong>Incident:</strong> ' . $trans_comm . '<br>';
														$show = true;
													}
													if ($department->status == 'Reopen') {
														echo '<strong>Incident:</strong> ' . $reopen_comm . '<br>';
														$show = true;
													}
													if ($show == false && $department->status == 'Closed') {
														echo '<strong>Incident:</strong> Ticket was transferred<br>';
													}
												} else {
													foreach ($department->feed->reason as $key => $value) {
														if ($key) {
															if ($titles[$key] == $department->department->description) {
																if (in_array($key, $keys)) {
																	echo '<strong>Incident:</strong> ' . $res[$key] . '<br>';
																	echo '<strong>Incident Short Name:</strong> ' . $department->department->description . '<br>';
																}
															}
														}
													}
												}
												?>
											</td>

											<td>
												<?php if (!empty($department->feed->patientid)): ?>
													<?php echo $department->feed->name; ?>
													&nbsp;(<a
														href="<?php echo $ip_link_patient_feedback . $department->feed->patientid; ?>">
														<?php echo $department->feed->patientid; ?>
													</a>)
												<?php else: ?>

													<?php echo $department->feed->name; ?>

												<?php endif; ?> <!-- <br>
											
												<?php echo $department->feed->role; ?> -->
												<br>
												<?php echo $department->feed->ward; ?>
												<?php if ($department->feed->bedno) { ?>
													<?php echo 'in ' . $department->feed->bedno; ?>
												<?php } ?>
												<br>
												<?php
												echo "<i class='fa fa-phone'></i> ";
												echo $department->feed->contactnumber; ?>
												<?php if ($department->feed->email) { ?>
													<br>
													<?php echo "<i class='fa fa-envelope'></i> "; ?>
													<?php echo $department->feed->email; ?>
												<?php } ?>
											</td>
											<td style="overflow: clip; word-break: break-all;">
												<strong>Reported on:</strong><br>
												<?php echo date('g:i A', strtotime($department->created_on)); ?><br>
												<?php echo date('d-m-Y', strtotime($department->created_on)); ?><br><br>

												<strong>Occurred on:</strong><br>
												<?php
												if (!empty($department->incident_occured_in)) {
													echo date('g:i A', strtotime(str_replace([',', '-'], '', $department->incident_occured_in))) . "<br>";
													echo date('d-m-Y', strtotime(str_replace([',', '-'], '', $department->incident_occured_in)));
												} else {
													echo '-';
												}
												?>
											</td>

											<?php
											$priority = !empty($department->feed->priority)
												? str_replace('–', '-', $department->feed->priority)
												: 'Unassigned';

											switch ($priority) {
												case 'P1-Critical':
													$colors = '#ff4d4d';
													break;
												case 'P2-High':
													$colors = '#ff9800';
													break;
												case 'P3-Medium':
													$colors = '#fbc02d';
													break;
												case 'P4-Low':
													$colors = '#1c8e42ff';
													break;
												case 'Unassigned':
													$colors = '#6c757d';
													break;
												default:
													$colors = '#000';
											}
											?>
											<?php
											$incident_type = !empty($department->feed->incident_type)
												? str_replace('–', '-', $department->feed->incident_type)
												: 'Unassigned';

											switch ($incident_type) {
												case 'Sentinel':
													$color = '#ff4d4d';
													break;
												case 'Hazardous Condition':
													$color = '#ff9800';
													break;
												case 'Adverse':
													$color = '#fbc02d';
													break;
												case 'No-harm':
													$color = '#1c36b4ff';
													break;
												case 'Near miss':
													$color = '#1c8e42ff';
													break;
												case 'Unassigned':
													$color = '#6c757d';
													break;
												default:
													$color = '#000';
											}
											?>
											<?php
											$rm = !empty($department->feed->risk_matrix) ? (array) $department->feed->risk_matrix : [];
											$level = $rm['level'] ?? '';
											$impact = $rm['impact'] ?? '';
											$likelihood = $rm['likelihood'] ?? '';

											$riskColors = [
												'High' => '#d9534f',
												'Medium' => '#f0ad4e',
												'Low' => '#1c8e42ff',
												'default' => '#6c757d'
											];

											$getColor = function ($value) use ($riskColors) {
												return $riskColors[$value] ?? $riskColors['default'];
											};
											?>


											<td>
												<table
													style="width:100%; border-collapse: collapse; font-size:14px; line-height:1.6;">
													<!-- Risk -->
													<tr>
														<td style="width:30px;  font-weight:bold;">Risk</td>
														<td style="width:10px; text-align:center;">:</td>
														<td style="padding-left:6px;">
															<?php if (!empty($level)): ?>
																<span style="color: <?php echo $getColor($level); ?>;">
																	<strong><?php echo htmlspecialchars($level); ?></strong>
																</span>
															<?php else: ?>
																<span
																	style="color:#6c757d; font-style:italic;"><strong>Unassigned</strong></span>
															<?php endif; ?>
														</td>
														<td style="width:40px; padding-left:10px;">
															<?php if (
																!empty($department->feed->patientid) && $department->status != 'Closed'
																&& ismodule_active('INCIDENT') && isfeature_active('EDIT-SEVERITY-INCIDENTS')
																&& $department->verified_status != 1
															): ?>
																<a href="<?php echo $ip_link_patient_feedback . $department->feed->patientid; ?>"
																	title="Edit">
																	<i class="fa fa-edit" style="font-size:16px; color:green;"></i>
																</a>
															<?php endif; ?>
														</td>
													</tr>

													<!-- Priority -->
													<tr>
														<td style="font-weight:bold;">Priority</td>
														<td style="text-align:center;">:</td>
														<td style="padding-left:6px;">
															<span style="color: <?php echo $colors; ?>; 
							 font-style:<?php echo ($priority == 'Unassigned') ? 'italic' : 'normal'; ?>;">
																<strong><?php echo $priority; ?></strong>
															</span>
														</td>
														<td style="padding-left:10px;">
															<?php if (
																!empty($department->feed->patientid) && $department->status != 'Closed'
																&& ismodule_active('INCIDENT') && isfeature_active('EDIT-PRIORITY-INCIDENTS')
																&& $department->verified_status != 1
															): ?>
																<!-- <a href="<?php echo $ip_link_patient_feedback . $department->feed->patientid; ?>"
																	title="Edit">
																	<i class="fa fa-edit" style="font-size:16px; color:green;"></i>
																</a> -->
															<?php endif; ?>
														</td>
													</tr>

													<!-- Severity -->
													<tr>
														<td style="font-weight:bold;">Category</td>
														<td style="text-align:center;">:</td>
														<td style="padding-left:6px;">
															<span style="color:<?php echo empty($incident_type) ? '#6c757d' : $color; ?>; 
							 font-style:<?php echo ($incident_type == 'Unassigned') ? 'italic' : 'normal'; ?>;">
																<strong><?php echo $incident_type ?? 'Unassigned'; ?></strong>
															</span>
														</td>
														<td style="padding-left:10px;">
															<?php if (
																!empty($department->feed->patientid) && $department->status != 'Closed'
																&& ismodule_active('INCIDENT') && isfeature_active('EDIT-SEVERITY-INCIDENTS')
																&& $department->verified_status != 1
															): ?>
																<!-- <a href="<?php echo $ip_link_patient_feedback . $department->feed->patientid; ?>"
																	title="Edit">
																	<i class="fa fa-edit" style="font-size:16px; color:green;"></i>
																</a> -->
															<?php endif; ?>
														</td>
													</tr>
												</table>
											</td>

											<td>
												<b><strong> Team Leader :</strong></b>
												<?php echo !empty($names) ? $names : 'Unassigned'; ?><br>

												<b><strong> Process Monitor :</strong></b>
												<?php echo !empty($actionText_process_monitor) ? $actionText_process_monitor : 'Unassigned'; ?>
											</td>



											<?php if (incident_tat('open_ticket') === true) { ?>
												<td style="overflow: clip; word-break: break-all;">
													<?php



													// echo 'Close ticket within';
									
													echo date('g:i A', $ttime);
													echo '<br>';

													echo date('d-m-y', $ttime);
													echo '<br>';


													echo $close;

													?>
												</td>
											<?php } ?>

											<?php
											// Set default values for $tool and $color
											$tool = '';
											$color = 'btn-info'; // Default to a Bootstrap class if status doesn't match
											$tooldelete = 'Click to delete the incident.';
											// Determine the tooltip and color based on the department status
											if ($department->status == 'Addressed') {
												$tool = 'Click to close this ticket.';
												$color = 'btn-warning';
											} elseif ($department->status == 'Open') {
												$tool = 'Click to change the status.';
												$color = 'btn-danger';
												$status_icon = 'fa fa-envelope-open-o';
											} elseif ($department->status == 'Rejected') {
												$tool = 'Click to change the status.';
												$color = 'btn-yellow'; // Changed color to btn-yellow for Rejected
												$status_icon = 'fa fa-reply';
											} elseif ($department->status == 'Closed') {
												$tool = 'Ticket is closed';
												$color = 'btn-success';
												$status_icon = 'fa fa-check-circle';
											} elseif ($department->status == 'Reopen') {
												$tool = 'Click to close this ticket.';
												$color = 'btn-primary';
											} elseif ($department->status == 'Transfered') {
												$tool = 'Click to close this ticket.';
												$color = 'btn-info';
											} elseif ($department->status == 'Assigned') {
												$tool = 'Click to change the status.';
												$color = 'btn-orange'; // Added this condition for Assigned
												$status_icon = 'fa fa-hand-paper-o';
											} elseif ($department->status == 'Re-assigned') {
												$tool = 'Click to change the status.';
												$color = 'btn-bluee'; // Added this condition for Assigned
												$status_icon = '';
											} elseif ($department->status == 'Described') {
												$tool = 'Click to change the status.';
												$color = 'btn-reddd'; // Added this condition for Assigned
												$status_icon = '';
											} else {
												$tool = 'Unknown status';
												$color = 'btn-info';
											}
											?>

											<td style="vertical-align: middle; padding: 5px;">
												<div
													style="display: flex; justify-content: space-between; align-items: center; gap: 10px; width: 100%;">
													<!-- 1st Button (Status) -->
													<?php if ($department->status != 'Verified') { ?>
														<a style="font-size: 17px; width: 140px;"
															href="<?php echo base_url($this->uri->segment(1) . "/track/$department->id") ?>"
															data-placement="bottom" data-toggle="tooltip" title="<?php echo $tool; ?>"
															class="btn btn-sm btn-block <?php echo $color; ?>">
															<?php echo $department->status; ?> <i
																style="font-size:15px;margin-left:5px;"
																class="<?php echo $status_icon; ?>"></i>
														</a>
													<?php } else { ?>
														<!-- Keep an empty placeholder for alignment -->
														<div style="width: 140px;"></div>
													<?php } ?>

													<!-- 2nd Button (Verified Icon) -->
													<?php if (isfeature_active('IN-VERIFY-INCIDENTS') === true && $department->status == 'Closed' && $department->verified_status == 1) { ?>
														<i style="font-size: 25px; color: green;" class="fa fa-check-circle-o"
															data-toggle="tooltip" data-placement="bottom"
															title="Incident is verified"></i>
													<?php } else { ?>
														<!-- Placeholder for alignment -->
														<div style="width: 25px;"></div>
													<?php } ?>

													<!-- 3rd Button (Delete Icon) -->
													<?php if (isfeature_active('IN-DELETE-INCIDENTS') === true) { ?>
														<?php echo form_open('ticketsincident/create', ['class' => 'form-inner', 'id' => 'deleteForm_' . $department->id]) ?>
														<input type="hidden" name="status" value="Delete">
														<input type="hidden" name="id" value="<?php echo $department->id; ?>">
														<a style="font-size: 14px; width: 50px;" href="#"
															onclick="submitDeleteForm(event, '<?php echo $department->id; ?>');"
															data-placement="bottom" data-toggle="tooltip"
															title="<?php echo $tooldelete; ?>" class="btn btn-sm btn-block btn-danger">
															<i style="font-size: 15px;" class="fa fa-trash"></i>
														</a>
														<?php echo form_close(); ?>
													<?php } ?>

												</div>
											</td>

										</tr>
										<?php $sl++; ?>
									<?php } ?>
								<?php } ?>
							</tbody>
						</table> <!-- /.table-responsive -->
					</div>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">

						<h3 style="text-align: center; color:tomato;">
							<?php echo lang_loader('inc', 'inc_no_record_found'); ?>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>
</div>
<script>
	function gotonextdepartment(type) {
		var depsec = $('#dep_category').val();
		var url = "<?php echo base_url($this->uri->segment(1) . '/opentickets?type=') ?>" + type + "&depsec=" + depsec;
		window.location.href = url;
	}

	function gotonextdepartment2(type) {
		var url = "<?php echo base_url($this->uri->segment(1) . '/opentickets?depsec=') ?>" + type;
		window.location.href = url;
	}

	function gotonextdepartment_severity(type) {
		var url = "<?php echo base_url($this->uri->segment(1) . '/opentickets?depsec_severity=') ?>" + type;
		window.location.href = url;
	}

	function gotonextdepartment_priority(type) {
		var url = "<?php echo base_url($this->uri->segment(1) . '/opentickets?depsec_priority=') ?>" + type;
		window.location.href = url;
	}

	function gotonextdepartment_assigned_risk(type) {
		var url = "<?php echo base_url($this->uri->segment(1) . '/opentickets?depsec_assigned_risk=') ?>" + type;
		window.location.href = url;
	}

</script>
<style>
	.btn-orange {
		background-color: #f09a22;
		color: white;
		font-size: 14px;
	}

	.btn-bluee {
		background-color: #2a73e8;
		color: white;
		font-size: 14px;
	}

	.btn-reddd {
		background-color: #3f1670;
		color: white;
		font-size: 14px;
	}

	.btn-yellow {
		background-color: #FFDE4D;
		color: white;
		font-size: 14px;
	}
</style>
<script>
	function submitDeleteForm(event, id) {
		event.preventDefault();

		const confirmDelete = confirm("This incident will be permanently deleted from the application. Are you sure you want to proceed?");

		if (confirmDelete) {
			document.getElementById('deleteForm_' + id).submit();
		}
	}

</script>