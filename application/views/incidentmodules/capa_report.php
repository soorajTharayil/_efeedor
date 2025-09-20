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
						<div class="btn-group" style="display: inline-flex;">
							<span style="margin-right: 10px; font-weight: bold;margin-top: 8px;">Downloads:</span>
							<a class="btn btn-success" target="_blank" data-placement="bottom" style="margin-right: 5px;"
								data-toggle="tooltop" title="Download PDF report"
								href="<?php echo base_url($this->uri->segment(1)) . '/download_capa_report_pdf' ?>">
								<i class="fa fa-file-pdf-o"></i>
							</a>
							<a class="btn btn-success" target="_blank" data-placement="bottom" data-toggle="tooltip"
								title="Download Excel report"
								href="<?php echo base_url($this->uri->segment(1)) . '/download_capa_report' ?>">
								<i class="fa fa-file-excel-o"></i>
							</a>
						</div>
					</div>

					<div class="panel-body">
						<?php if (isfeature_active('INC-INCIDENTS-DASHBOARD') === true) { ?>
							<form>
								<p>
									<!-- <span style="font-size:15px; font-weight:bold;"><?php echo lang_loader('inc', 'inc_sort_incident_by'); ?></span> -->
									<select name="dep" class="form-control" id="subsecid"
										onchange="gotonextdepartment2(this.value)"
										style="width:200px; margin:0px 0px 20px 20px;">
										<option value="1" selected><?php echo lang_loader('inc', 'inc_select_category'); ?>
										</option>
										<?php
										$this->db->group_by('description');
										$this->db->where('type', 'incident');
										$query = $this->db->get('department');
										$result = $query->result();

										foreach ($result as $row) {
											?>
											<?php if ($this->input->get('depsec') == $row->description) { ?>
												<option value="<?php echo str_replace('&', '%26', $row->description); ?>" selected>
													<?php echo $row->description; ?>
												</option>
											<?php } else { ?>
												<option value="<?php echo str_replace('&', '%26', $row->description); ?>">
													<?php echo $row->description; ?>
												</option>
											<?php } ?>

										<?php } ?>
									</select>
									<?php if (isset($_GET['depsec'])) { ?>
										<span
											style="font-size:15px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
										<select name="dep" class="form-control" onchange="gotonextdepartment(this.value)"
											style="width:200px; margin:0px 0px 20px 20px;">
											<option value="1" selected><?php echo lang_loader('inc', 'inc_select_incident'); ?>
											</option>
											<?php
											$this->db->where('type', 'incident');
											$this->db->where('description', $this->input->get('depsec'));
											$query = $this->db->get('department');
											$result = $query->result();
											foreach ($result as $row) {
												?>
												<?php if ($this->input->get('type') == $row->dprt_id) { ?>
													<option value="<?php echo $row->dprt_id; ?>" selected><?php echo $row->name; ?></option>
												<?php } else { ?>
													<option value="<?php echo $row->dprt_id; ?>"><?php echo $row->name; ?></option>
												<?php } ?>

											<?php } ?>
										</select>
									<?php } ?>
								</p>
							</form>
							<br />
						<?php } ?>

						<table class="inccapareport table table-striped table-bordered table-hover" cellspacing="0"
							width="100%">
							<thead>
								<tr>
									<th><?php echo lang_loader('inc', 'inc_slno'); ?></th>
									<!-- <th style="white-space: nowrap;"><?php echo lang_loader('inc', 'inc_incidents_id'); ?>
									</th> -->
									<th style="white-space: nowrap;">
										Incident Details</th>
									<!-- <th style="white-space: nowrap;">Incident Category</th> -->
									<th style="white-space: nowrap;">Incident Timeline & History</th>
									<!-- <th style="white-space: nowrap;">
										<?php echo lang_loader('inc', 'inc_turn_around'); ?><br><?php echo lang_loader('inc', 'inc_tat'); ?>
									</th> -->


								</tr>
							</thead>
							<tbody>
								<?php if (!empty($departments)) { ?>
									<?php $sl = 1; ?>
									<?php foreach ($departments as $department) {

										if ($department->status == 'Closed') {
											$this->db->where('ticketid', $department->id)->where('ticket_status', 'Closed');
											$query = $this->db->get('ticket_incident_message');
											$ticket = $query->result();
											$rowmessage = $ticket[0]->message . ' Closed this ticket';
											$createdOn1 = strtotime($department->created_on);
											$lastModified1 = strtotime($department->last_modified);
											$closeddiff = $lastModified1 - $createdOn1;
											if ($department->department->close_time <= $closeddiff) {
												$close = '<b><span style="color:red;">Exceeded TAT<span></b>';
											} else {
												$close = '<b><span style="color:green;">Within TAT<span></b>';
											}
										} elseif ($department->status == 'Addressed') {
											$this->db->where('ticketid', $department->id)->where('ticket_status', 'Addressed');
											$query = $this->db->get('ticket_incident_message');
											$ticket = $query->result();
											$addressed_comm = $ticket[0]->reply;
											$createdOn2 = strtotime($department->created_on);
											$lastModified2 = strtotime($department->last_modified);
											$adddiff = $lastModified2 - $createdOn2;
											if ($department->department->address_time <= $adddiff) {
												$add = 'Addressed OT';
											} else {
												$add = 'Addressed WT';
											}
										}
										if (strlen($rowmessage) > 60) {
											$rowmessage = substr($rowmessage, 0, 60) . '  ' . ' ... click status to view';
										}

										?>
										<tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>" data-placement="bottom"
											data-toggle="tooltip" title="<?php echo $rowmessage; ?>">
											<td><?php echo $sl; ?></td>
											<!-- <td><?php echo lang_loader('inc', 'inc_inc'); ?><?php echo $department->id; ?></td> -->
											<td style="overflow-wrap: break-word; word-break: normal;">
												<?php
												   $rep = '';
												   if ($department->departmentid_trasfered != 0) {
													   $issue = NULL;
												   } else {
													   foreach ($department->feed->reason as $key => $value) {
														   if ($key) {
															   if ($titles[$key] == $department->department->description) {
																   if (in_array($key, $keys)) {
																	   $issue = $res[$key];
																   }
															   }
														   }
													   }
												   }
							   
												   $root = [];
												   $corrective = [];
												   $resolution_note = [];
												   $rootcause_describtion = [];
												   $corrective_description = [];
							   
												   foreach ($department->replymessage as $r) {
													   if ($r->rootcause != NULL) {
														   $root[] = $r->rootcause;
													   }
							   
													   if ($r->corrective != NULL) {
														   $corrective[] = $r->corrective;
													   }
													   if ($r->rootcause_describtion != NULL) {
														   $rootcause_describtion[] = $r->rootcause_describtion;
													   }
													   if ($r->corrective_description != NULL) {
														   $corrective_description[] = $r->corrective_description;
													   }
							   
													   if ($r->resolution_note != NULL) {
														   $resolution_note[] = $r->resolution_note;
													   }
							   
													   if ($r->ticket_status == 'Addressed' && $r->reply != NULL) {
														   $rep = $r->reply;
													   }
												   }
							   
												   $createdOn = strtotime($department->created_on);
												   $lastModified = strtotime($department->last_modified);
												   $timeDifferenceInSeconds = $lastModified - $createdOn;
							   
												   $value = $this->incident_model->convertSecondsToTime($timeDifferenceInSeconds);
							   
												   $timetaken = '';
												   if ($value['days'] != 0) {
													   $timetaken .= $value['days'] . ' days, ';
												   }
							   
												   if ($value['hours'] != 0) {
													   $timetaken .= $value['hours'] . ' hrs, ';
												   }
							   
												   if ($value['minutes'] != 0) {
													   $timetaken .= $value['minutes'] . ' mins.';
												   }
							   
												   if ($timeDifferenceInSeconds <= 60) {
													   $timetaken .= 'less than a minute';
												   }
							   
												   $assignee = $department->department->pname;
												   $incidentHistory = $department->replymessage;

												echo '<strong>Incident ID:</strong> ' . ($department->id) . '<br>' .
													'<strong>Incident :</strong> ' . ($department->department->description) . '<br>' .
													'<strong>Category:</strong> ' . ($issue ? $issue : 'Ticket was transferred') . '<br>' .
													'<strong>Description:</strong> ' . ($department->feed->other ? $department->feed->other : 'NA') . '<br>',
													'<strong>Reported By:</strong> ' . ($department->feed->name ?? '') . (!empty($department->feed->patientid) ? ' (' . $department->feed->patientid . ')' : '') . '<br>' .
													'<strong>Reported On:</strong> ' . $department->created_on . '<br>' .
													'<strong>Reported In:</strong> ' . ($department->feed->ward ?? '') . (!empty($department->feed->bedno) ? ' (' . $department->feed->bedno . ')' : '') . '<br>' .
													'<strong>Incident Type:</strong> ' . ($department->incident_type). '<br>' .
													'<strong>Priority:</strong> ' . ($department->priority) . '<br>' .
													'<strong>Closed On:</strong> ' . $department->last_modified . '<br>' .
													'<strong>Closed By:</strong> ' . $ticket[0]->message . '<br>' .
													'<strong>TAT:</strong> ' .$timetaken. '<br>';
												?>

												
											</td>

											<!-- <td style="overflow-wrap: break-word; word-break: normal;">

												<?php
												if ($department->departmentid_trasfered != 0) {
													$show = false;
													if ($department->status == 'Addressed') {
														echo $addressed_comm;
														$show = true;
													}
													if ($department->status == 'Transfered') {
														echo $trans_comm;
														$show = true;
													}
													if ($department->status == 'Reopen') {
														echo $reopen_comm;
														$show = true;
													}

													if ($show == false && $department->status == 'Closed') {
														echo 'Ticket was transferred';
													}
												} else {

													foreach ($department->feed->reason as $key => $value) {


														if ($key) {
															if ($titles[$key] == $department->department->description) {
																if (in_array($key, $keys)) {
																	echo $res[$key];
																	echo '<br>';
																	$show = $res[$key];
																}
															}
														}
													}
												}
												// print_r($show);
												?>
											</td> -->



											<td style="border: 1px solid #dadada; overflow: clip; word-break: break-word;">

												<?php
												// Sort the reply messages by created_on if available
												usort($department->replymessage, function ($a, $b) {
													return strtotime($a->created_on) - strtotime($b->created_on);
												});

												foreach ($department->replymessage as $r) {
													echo '<div style="margin-bottom:15px; border-bottom:1px dashed #ccc; padding-bottom:10px;">';

													echo '<strong>Date & Time :</strong> ' . date('d M, Y - g:i A', strtotime($r->created_on)) . '<br>';
													echo '<strong>Action :</strong> ' . htmlspecialchars($r->action) . '<br>';

													if ($r->ticket_status == 'Assigned') {
														echo '<strong>Assigned by :</strong> ' . htmlspecialchars($r->message) . '<br>';
													}

													if ($r->ticket_status == 'Re-assigned') {
														echo '<strong>Re-assigned by :</strong> ' . htmlspecialchars($r->message) . '<br>';
													}

													if ($r->ticket_status == 'Described') {
														echo '<strong>RCA :</strong> ' . htmlspecialchars($r->rootcause_describtion) . '<br>';
														echo '<strong>CAPA :</strong> ' . htmlspecialchars($r->corrective_description) . '<br>';
														echo '<strong>Additional note :</strong> ' . htmlspecialchars($r->reply) . '<br>';
													} elseif (!empty($r->reply)) {
														echo '<strong>Comment :</strong> ' . htmlspecialchars($r->reply) . '<br>';
													}

													if ($r->ticket_status == 'Closed') {
														if (!empty($r->rootcause))
															echo '<strong>Closure RCA :</strong> ' . htmlspecialchars($r->rootcause) . '<br>';
														if (!empty($r->corrective))
															echo '<strong>Closure CAPA :</strong> ' . htmlspecialchars($r->corrective) . '<br>';
														if (!empty($r->preventive))
															echo '<strong>Preventive :</strong> ' . htmlspecialchars($r->preventive) . '<br>';
														if (!empty($r->resolution_note))
															echo '<strong>Additional note :</strong> ' . htmlspecialchars($r->resolution_note) . '<br>';
													}

													echo '</div>';
												}
												?>
											</td>




											<!-- <td>
												<?php
												$createdOn = strtotime($department->created_on);
												$lastModified = strtotime($department->last_modified);
												$timeDifferenceInSeconds = $lastModified - $createdOn;
												$value = $this->incident_model->convertSecondsToTime($timeDifferenceInSeconds);

												if ($value['days'] != 0) {
													echo $value['days'] . ' days, ';
												}
												if ($value['hours'] != 0) {
													echo $value['hours'] . ' hrs, ';
												}
												if ($value['minutes'] != 0) {
													echo $value['minutes'] . ' mins.';
												}
												if ($timeDifferenceInSeconds <= 60) {
													echo 'less than a minute';
												}
												?>
											</td> -->


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
		var subsecid = $('#subsecid').val();
		var url = "<?php echo base_url($this->uri->segment(1) . "/capa_report?type=") ?>" + type + "&depsec=" + subsecid;
		window.location.href = url;
	}

	function gotonextdepartment2(type) {
		var url = "<?php echo base_url($this->uri->segment(1) . "/capa_report?depsec=") ?>" + type;
		window.location.href = url;
	}
</script>