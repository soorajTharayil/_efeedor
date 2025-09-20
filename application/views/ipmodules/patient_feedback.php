<div class="content">

	<?php
	$users = $this->db->select('user.*')
    ->from('user')
    ->where('user_id !=', 1)
    // ->where('user_role', 4)
    ->get()
    ->result();


	if ($this->input->post('id') || $this->input->get('id')) {
		$email = $this->session->userdata['email'];

		$hide = true;
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
		} else {
			$id = $this->input->get('id');
		}
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback');
		$results = $query->result();

		if (count($results) >= 1) {
			foreach ($results as $result) {
				$param = json_decode($result->dataset, true);

				?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3><a href="javascript:void()" data-toggle="tooltip"
										title="<?php echo lang_loader('ip', 'ip_discharge_feedback_id_tooltip'); ?>"> <i
											class="fa fa-question-circle" aria-hidden="true"></i></a>
									<?php echo lang_loader('ip', 'ip_ipdt'); ?> 			<?php echo $result->id; ?> </h3>
							</div>
							<div class="panel-body" style="background: #fff;">


								<table class=" table table-striped table-bordered  no-footer dtr-inline ">
									<tr>
										<td><b><?php echo lang_loader('ip', 'ip_patient_name'); ?></b></td>
										<td><?php echo $param['name']; ?></td>
									</tr>
									<tr>
										<td><b><?php echo lang_loader('ip', 'ip_patient_id'); ?></b></td>
										<td><?php echo $param['patientid']; ?></td>
									</tr>
									<?php if ($param['ward'] != '') { ?>
										<tr>
											<td><b><?php echo lang_loader('ip', 'ip_floor_ward'); ?></b></td>
											<td><?php echo ($param['ward']); ?></td>
										</tr>
									<?php } ?>
									<?php if (($param['bedno']) && $param['bedno'] != '-') { ?>
										<tr>
											<td><b><?php echo lang_loader('ip', 'ip_room_bedno'); ?></b></td>
											<td><?php echo $param['bedno']; ?></td>
										</tr>
									<?php } ?>
									<?php if ($param['email'] != '') { ?>
										<tr>
											<td><b><?php echo lang_loader('ip', 'ip_email_id'); ?></b></td>
											<td><?php echo $param['email']; ?></td>
										</tr>
									<?php } ?>
									<?php if ($param['contactnumber'] != '') { ?>
										<tr>
											<td><b><?php echo lang_loader('ip', 'ip_contact_number'); ?></b></td>
											<td><?php echo $param['contactnumber']; ?></td>
										</tr>
									<?php } ?>
									<tr>
										<td><b><?php echo lang_loader('ip', 'ip_date_time'); ?></b></td>
										<td><?php //echo date('g:i a, d-M-Y', strtotime($result->datetime)); 
													?>
											<?php if ($param['datetime']) { ?>
												<?php echo date('g:i A', date(($param['datetime']) / 1000)); ?>

												<?php echo date('d-m-y', date(($param['datetime']) / 1000)); ?>
											<?php } ?>
										</td>
									</tr>
									<?php if ($param['admissiondate'] != '') { ?>
										<tr>
											<td><b><?php echo lang_loader('ip', 'ip_admission_date'); ?></b></td>
											<td><?php echo date('d-M-Y', strtotime($param['admissiondate'])); ?></td>
										</tr>
									<?php } ?>
									<?php if ($result->source != '') { ?>
										<tr>
											<td><b><?php echo lang_loader('ip', 'ip_source'); ?></b></td>
											<td><?php if ($result->source == 'APP') {
												echo 'Mobile Application.';
											} elseif ($result->source == 'Link') {
												echo 'Web Link.';
											} else {
												echo $result->source;
											} ?></td>
										</tr>
									<?php } ?>
								</table>


								<?php

								if (isfeature_active('DEPARTMENT-HEAD-OVERALL-PAGE') === true) {
									$this->db->select('department.*');
									$this->db->from('department');
									$this->db->join('setup', 'setup.shortkey = department.slug');
									$this->db->where_in('department.slug', $this->session->userdata['question_array'][$type]);
									$this->db->where('setup.parent', 0);
									$this->db->where('department.type', 'inpatient');
									$query = $this->db->get();
									$department_map = $query->result();

									$dh_view = array(); // Initialize an empty array
					
									foreach ($department_map as $row => $department) {
										$dh_view[$row] = $department->slug;
									}

									// Use where_in to apply condition to all elements in $dh_view
									$this->db->where_in('shortkey', $dh_view);
									$query = $this->db->get('setup');
									$sresult = $query->result();
								} else {
									$sresult = $this->ipd_model->setup_result('setup');
								}

								$setarray = array();
								$questioarray = array();
								foreach ($sresult as $r) {
									$setarray[$r->type] = $r->title;
								}

								foreach ($sresult as $r) {
									$questioarray[$r->type][$r->shortkey] = $r->question;
								}


								$arraydata = array();
								foreach ($questioarray as $setr) {
									foreach ($setr as $k => $v) {
										$arraydata[$k] = $v;
									}
								}
								$keyset = array();
								foreach ($datasetnewarray as $key => $p) {
									$keyset[] = $key;
								}
								$keyset2 = array();
								foreach ($datasetnewarray2 as $key => $p) {
									$keyset2[] = $key;
								}
								?>
								<div style="padding:10px; background:#fff;">
									<?php foreach ($questioarray as $k => $paramkey) { ?>
										<?php foreach ($paramkey as $key => $r) { ?>
											 <?php if (isset($param[$key]) && is_numeric($param[$key]) && (int)$param[$key] > 0) { ?>
												<ul class="feedback">
													<li class="feedback">
														<?php if (is_mobile() === true) { ?>
															<h5><?php echo $setarray[$k]; ?></h5>
														<?php } else { ?>
															<h3><?php echo $setarray[$k]; ?></h3>
														<?php } ?>
													</li>
													<li id="feedback">
														<?php if (is_mobile() === true) { ?>
															<h6><?php echo $r; ?></h6>
															<!-- <h6><?php echo 'Patient Rating'; ?></h6> -->
														<?php } else { ?>
															<h4><?php echo $r; ?></h4>
															<!-- <h6><?php echo 'Patient Rating'; ?></h6> -->
														<?php } ?>
														<p>
															<span class="fa fa-star <?php if ($param[$key] >= 1) {
																echo 'checked';
															} ?>"></span>
															<span class="fa fa-star <?php if ($param[$key] >= 2) {
																echo 'checked';
															} ?>"></span>
															<span class="fa fa-star <?php if ($param[$key] >= 3) {
																echo 'checked';
															} ?>"></span>
															<span class="fa fa-star <?php if ($param[$key] >= 4) {
																echo 'checked';
															} ?>"></span>
															<span class="fa fa-star <?php if ($param[$key] >= 5) {
																echo 'checked';
															} ?>"></span>
														</p>
													</li>
												</ul>
												<?php if ($param[$key] == 1) {
													$negRate = 'very poor';
												} else {
													$negRate = 'poor';
												}
												?>

												<?php if ($param[$key] <= 2) { ?>
													<?php if (array_count_values($param['reason']) >= 1) { ?>

														<ul class="feedback">
															<li id="feedback">
																<?php if (is_mobile() === true) { ?>
																	<h6><?php echo 'Reasons for rating ' . $negRate . '.'; ?></h6>
																<?php } else { ?>
																	<h5><?php echo 'Reasons for rating ' . $negRate . '.'; ?></h5>
																<?php } ?>
																<?php foreach ($param['reason'] as $key => $value) { ?>
																	<?php if ($value) {
																		$this->db->where('shortkey', $key);
																		$this->db->where('type', $k);
																		$query = $this->db->get('setup');
																		$cresult = $query->result(); ?>
																		<?php if (count($cresult) >= 1) { ?>
																			<p>
																				<i class="fa fa-frown-o" aria-hidden="true"></i>
																				<?php echo $cresult[0]->question; ?>
																			</p>

																		<?php } ?>
																	<?php } ?>
																<?php } ?>
															</li>
														</ul>
													<?php } ?>
													<?php
													// if ($param['comment']) {
						
													// 	foreach ($param['comment'] as $key => $crow) {
													// 		if ($crow) {
													// 			$this->db->where('type', $key);
													// 			$query = $this->db->get('setup');
													// 			$cresult = $query->result();
													// 			if ($key == $k) {
													// 				$comment = $crow;
													// 			} else {
													// 				$comment = NULL;
													// 			}
													// 		}
													// 	}
													// }
													?>
													<?php if ($param['comment'][$k]) { ?>
														<ul class="feedback">
															<li id="feedback" style="overflow: clip; word-break: break-all;">
																<?php if (is_mobile() === true) { ?>
																	<h6><?php echo 'Patient Remarks:'; ?></h6>
																<?php } else { ?>
																	<h5><?php echo 'Patient Remarks:'; ?></h5>
																<?php } ?>
																<p>
																	"<?php echo $param['comment'][$k]; ?>"
																</p>
															</li>
														</ul>
													<?php } ?>
												<?php } ?>
												<hr>
											<?php } ?>
										<?php } ?>
									<?php } ?>
									<ul class="feedback">
										<?php foreach ($param as $k => $p) { ?>
											<?php if (in_array($k, $keyset)) { ?>

												<li id="feedback">
													<h4><?php echo $datasetnewarray[$k]; ?></h4>
													<p><?php echo $p; ?></p>

												</li>
											<?php } ?>
										<?php } ?>
										<li>
											<?php if (is_mobile() === true) { ?>
												<h6><?php echo lang_loader('ip', 'ip_average_rating'); ?></h6>
											<? } else { ?>
												<h4> <?php echo lang_loader('ip', 'ip_average_rating'); ?></h4>
											<?php } ?>
										</li>
										<?php if ($param['overallScore']) { ?>
											<li id="feedback">
												<p id="feedback"><span class="fa fa-star <?php if ($param['overallScore'] >= 1) {
													echo 'checked';
												} ?>"></span>
													<span class="fa fa-star <?php if ($param['overallScore'] >= 2) {
														echo 'checked';
													} ?>"></span>
													<span class="fa fa-star <?php if ($param['overallScore'] >= 3) {
														echo 'checked';
													} ?>"></span>
													<span class="fa fa-star <?php if ($param['overallScore'] >= 4) {
														echo 'checked';
													} ?>"></span>
													<span class="fa fa-star <?php if ($param['overallScore'] >= 5) {
														echo 'checked';
													} ?>"></span>
												</p>
											</li>

										<?php } ?>


										</li>
										<li>
											<?php if (is_mobile() === true) { ?>
												<h6><?php echo lang_loader('ip', 'ip_netpromoter_analysis'); ?></h6>
											<? } else { ?>
												<h4><?php echo lang_loader('ip', 'ip_netpromoter_analysis'); ?></h4>
											<?php } ?>
										</li>
										<li id="feedback">
											<?php if (is_mobile() === true) { ?>
												<h6><?php echo lang_loader('ip', 'ip_promoters_tooltip'); ?>,
													<?php echo lang_loader('ip', 'ip_promoters_tooltip_r'); ?>
												</h6>
											<? } else { ?>
												<h4><?php echo lang_loader('ip', 'ip_promoters_tooltip'); ?>,
													<?php echo lang_loader('ip', 'ip_promoters_tooltip_r'); ?>
												</h4>
											<?php } ?>
											<p><?php $netpromoterscore = $param['recommend1Score'];
											$netpromoterscore = $netpromoterscore * 2;
											echo $netpromoterscore . '/10'; ?> <br>
												<?php if ($param['recommend1Score'] > 4) { ?>
													<span class="text-success"> <b>
															<?php echo lang_loader('ip', 'ip_promoters'); ?></b></span>
												<?php } elseif ($param['recommend1Score'] < 3.5) { ?>
													<span
														class="text-danger"><b><?php echo lang_loader('ip', 'ip_detractors'); ?></b></span>
												<?php } else { ?>
													<span
														class="text-warning"><b><?php echo lang_loader('ip', 'ip_passives'); ?></b></span>
												<?php } ?>
											</p>
											<p style="overflow: clip; word-break: break-all;">
												<?php if ($param['detractorcomment']) { ?>
													<b><?php echo lang_loader('ip', 'ip_nps_comment'); ?></b>
													<?php echo $param['detractorcomment']; ?>
												<?php } ?>
												<?php if ($param['passivecomment']) { ?>
													<b><?php echo lang_loader('ip', 'ip_nps_comment'); ?></b>
													<?php echo $param['passivecomment']; ?>
												<?php } ?>
												<?php if ($param['promotercomment']) { ?>
													<b><?php echo lang_loader('ip', 'ip_nps_comment'); ?></b>

													<?php echo $param['promotercomment']; ?>
												<?php } ?>

											</p>
										</li>
										<?php if ($this->session->user_role <= 3) { ?>
											<?php if ((($param['location'] == 1)) || ($param['specificservice'] == 1) || ($param['referred'] == 1) || ($param['friend'] == 1) || ($param['previous'] == 1) || ($param['docAvailability'] == 1) || ($param['companyRecommend'] == 1) || ($param['otherReason'] == 1)) { ?>
												<li>

													<?php if (is_mobile() === true) { ?>
														<h6><?php echo lang_loader('ip', 'ip_close_hospital'); ?></h6>
													<? } else { ?>
														<h4><?php echo lang_loader('ip', 'ip_close_hospital'); ?></h4>
													<?php } ?>
												</li>
												<p>
													<?php if ($param['location'] == 1) { ?>
														<li id="feedback"><?php echo lang_loader('ip', 'ip_location_proximity'); ?></li>
													<?php } ?>
													<?php if ($param['specificservice'] == 1) { ?>
														<li id="feedback"><?php echo lang_loader('ip', 'ip_specific_service'); ?> </li>
													<?php } ?>
													<?php if ($param['referred'] == 1) { ?>
														<li id="feedback"><?php echo lang_loader('ip', 'ip_referred_by_doctors'); ?> </li>
													<?php } ?>
													<?php if ($param['friend'] == 1) { ?>
														<li id="feedback"><?php echo lang_loader('ip', 'ip_ff_rocommendation'); ?> </li>
													<?php } ?>
													<?php if ($param['previous'] == 1) { ?>
														<li id="feedback"><?php echo lang_loader('ip', 'ip_previous_experience'); ?> </li>
													<?php } ?>
													<?php if ($param['docAvailability'] == 1) { ?>
														<li id="feedback"><?php echo lang_loader('ip', 'ip_insurance_facilities'); ?></li>
													<?php } ?>
													<?php if ($param['companyRecommend'] == 1) { ?>
														<li id="feedback"><?php echo lang_loader('ip', 'ip_company_recommendation'); ?></li>
													<?php } ?>
													<?php if ($param['otherReason'] == 1) { ?>
														<li id="feedback"><?php echo lang_loader('ip', 'ip_print_online'); ?></li><?php } ?>
												</p>
											<?php } ?>
											<?php if ($param['staffname'] == "" || $param['staffname'] == NULL) {
											} else { ?>
												<li>
													<?php if (is_mobile() === true) { ?>
														<h6><?php echo lang_loader('ip', 'ip_recognized_staff'); ?></h6>
													<? } else { ?>
														<h4><?php echo lang_loader('ip', 'ip_recognized_staff'); ?></h4>
													<?php } ?>

												<li id="feedback">
													<b><?php echo lang_loader('ip', 'ip_staff_name'); ?></b><br>
													<?php echo $param['staffname']; ?>
												</li>
												</li>
											<? } ?>
										<? } ?>
										<li>
											<?php if (is_mobile() === true) { ?>
												<h6><?php echo lang_loader('ip', 'ip_feedback_suggestions'); ?></h6>
											<? } else { ?>
												<h4><?php echo lang_loader('ip', 'ip_feedback_suggestions'); ?></h4>
											<?php } ?>
										</li>
										<li id="feedback" style="overflow: clip; word-break: break-all;">
											<?php if (!empty($param['suggestionText'])) { ?>
												<p class="inbox-item-text"><?php echo $param['suggestionText']; ?></p>


												<!-- Button to Show Transfer Section -->
												<button type="button" class="btn btn-primary" id="showTransfer">Create new feedback
													ticket</button>
												<button type="button" class="btn btn-primary" id="showTransferEmail">Forward to Department
													</button>
											<?php } else {
												echo "<p>No Comments Received</p>";
											} ?>
										</li>

										<!-- Initially Hidden Transfer Section -->
										<div class="col-sm-12" id="moveEmail"
											style="overflow:auto; display: none; margin-top: 15px;">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3>Send Email to Department heads</h3>
												</div>
												<div class="col-md-12 col-sm-12">
													<br />
													<?php echo form_open_multipart('tickets/create_ticket_email', 'class="form-inner"') ?>
													<?php echo form_hidden('id', $result->id) ?>
													<input type="hidden" name="created_by"
														value="<?php echo $result->patientid; ?>">
													<input type="hidden" name="id" value="<?php echo $result->id; ?>">
													<input type="hidden" name="feedbackcomment"
														value="<?php echo $param['suggestionText']; ?>">
													<!-- <input type="hidden" name="ward" value="<?php echo $param['ward']; ?>"> -->

													<div class="form-group row">
														
														<div class="form-group row" >
															<label style="margin-left: 15px;" for="name" class="col-xs-3 col-form-label">Select users from the list</label>
															<div class="col-xs-6">
																<input type="text" id="userSearch" class="form-control"
																	placeholder="Search for names..">
																<div class="checkbox-container" id="userList">
																	<?php foreach ($users as $user): ?>
																		<div class="checkbox">
																			<input type="checkbox"
																				id="user_<?php echo htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?>"
																				name="users[]"
																				value="<?php echo htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?>"
																				>
																			<label
																				for="user_<?php echo htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?>">
																				<?php echo htmlspecialchars($user->firstname . ' , ' . $user->designation . ' ( ' . $user->lastname . ' ) ', ENT_QUOTES, 'UTF-8'); ?>
																			</label>
																		</div>
																	<?php endforeach; ?>
																</div>
															</div>
														</div>
													</div>

													<!-- <div class="form-group row">
														<label for="name" class="col-xs-3 col-form-label"><?php echo lang_loader('ip', 'ip_comment'); ?></label>
														<div class="col-xs-9">
															<textarea class="form-control" rows="5" id="comment" minlength="25" name="reply" placeholder="Enter Comment / Description" required></textarea>
															<input type="hidden" name="reply_by" value="Admin">
															<?php if ($trasnferTargetId == 0) { ?>
																<input type="hidden" name="reply_departmen" value="<?php echo $department->department->description; ?>">
																<input type="hidden" name="reply_department_id" value="<?php echo $department->departmentid; ?>">
															<?php } else { ?>
																<input type="hidden" name="reply_departmen" value="<?php echo $trasnferTargetIdName; ?>">
																<input type="hidden" name="reply_department_id" value="<?php echo $trasnferTargetId; ?>">
															<?php } ?>
														</div>
													</div> -->

													<div class="form-group row">
														<div class="col-sm-offset-3 col-sm-6">
															<button type="submit" class="btn btn-success">Send</button>
														</div>
													</div>
													<?php echo form_close() ?>
												</div>
											</div>
										</div>

										<div class="col-sm-12" id="move" style="overflow:auto; display: none; margin-top: 15px;">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3>Create an additional ticket for this feedback manually</h3>
												</div>
												<div class="col-md-12 col-sm-12">
													<br />
													<?php echo form_open_multipart('tickets/create_ticket', 'class="form-inner"') ?>
													<?php echo form_hidden('id', $result->id) ?>
													<input type="hidden" name="created_by"
														value="<?php echo $result->patientid; ?>">
													<input type="hidden" name="feedbackid" value="<?php echo $result->id; ?>">
													<input type="hidden" name="rating"
														value="<?php echo $param['overallScore']; ?>">
													<input type="hidden" name="ward" value="<?php echo $param['ward']; ?>">

													<div class="form-group row">
														<label for="name"
															class="col-xs-3 col-form-label"><?php echo lang_loader('ip', 'ip_department'); ?></label>
														<div class="col-xs-6">
															<select class="form-control" id="sel1" name="deparment" required
																onchange="updateHiddenFields(this)">
																<option value="">--Select Department--</option>
																<?php
																$this->db->order_by('slug', 'asc');
																$this->db->where('type', 'inpatient');
																$query = $this->db->get('department');
																$data = $query->result();
																$result_department = [];

																foreach ($data as $element) {
																	if (!isset($result_department[$element->description])) {
																		$result_department[$element->description] = $element;
																	}
																}

																$trasnferId = 0;
																//$action_meta = json_decode(end($department->replymessage)->action_meta ?? '{}');
																$action_meta = '{}';

                                                                if ($department && is_array($department->replymessage) && !empty($department->replymessage)) {
                                                                    $last_reply = end($department->replymessage);
                                                                    $action_meta = $last_reply->action_meta ?? '{}';
                                                                }

																if ($action_meta) {
																	$trasnferId = $action_meta->sourceDepartmentId ?? 0;
																	$trasnferTargetId = $action_meta->targetDepartmentId ?? 0;
																}

																foreach ($result_department as $r) {
																	$optionData = htmlspecialchars(json_encode(["slug" => $r->slug, "setkey" => $r->setkey]), ENT_QUOTES, 'UTF-8');
																	echo '<option value="' . $r->dprt_id . '" data-info="' . $optionData . '">' . $r->description . '</option>';
																}
																?>
															</select>

															<!-- Hidden Inputs -->
															<input type="hidden" id="reply_slug" name="reply_slug">
															<input type="hidden" id="reply_setkey" name="reply_setkey">

														</div>
													</div>

													<div class="form-group row">
														<label for="name"
															class="col-xs-3 col-form-label"><?php echo lang_loader('ip', 'ip_comment'); ?></label>
														<div class="col-xs-9">
															<textarea class="form-control" rows="5" id="comment" minlength="25"
																name="reply" placeholder="Enter Comment / Description"
																required></textarea>
															<input type="hidden" name="reply_by" value="Admin">
															<?php if ($trasnferTargetId == 0) { ?>
																<input type="hidden" name="reply_departmen"
																	value="<?php echo $department->department->description; ?>">
																<input type="hidden" name="reply_department_id"
																	value="<?php echo $department->departmentid; ?>">
															<?php } else { ?>
																<input type="hidden" name="reply_departmen"
																	value="<?php echo $trasnferTargetIdName; ?>">
																<input type="hidden" name="reply_department_id"
																	value="<?php echo $trasnferTargetId; ?>">
															<?php } ?>
														</div>
													</div>

													<div class="form-group row">
														<div class="col-sm-offset-3 col-sm-6">
															<button type="submit"
																class="btn btn-success"><?php echo lang_loader('ip', 'ip_submit'); ?></button>
														</div>
													</div>
													<?php echo form_close() ?>
												</div>
											</div>
										</div>

										<!-- jQuery to Show the Transfer Section on Button Click -->

										<script>
											$(document).ready(function () {
												$("#showTransfer").click(function () {
													$("#move").slideDown();         // Show "Create new feedback ticket"
													$("#moveEmail").slideUp();      // Hide "Send Email to Department"
												});

												$("#showTransferEmail").click(function () {
													$("#moveEmail").slideDown();    // Show "Send Email to Department"
													$("#move").slideUp();           // Hide "Create new feedback ticket"
												});
											});
										</script>

									</ul>
								</div>
							</div>
						</div>
						<hr />

					</div>
				</div>

			<?php } ?>
		<?php } else { ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default ">
						<div class="panel-heading">
							<h3 style="text-align: center; color:tomato;"><?php echo lang_loader('ip', 'ip_no_record_found'); ?>
								<br>
								<a href="<?php echo base_url(uri_string(1)); ?>">
									<button type="button" href="javascript:void()" data-toggle="tooltip" title="Back"
										class="btn btn-sm btn-success" style="text-align: center;">
										<i class="fa fa-arrow-left"></i>
									</button>
									<?php //$_SESSION['ward'] = 'ALL';
											//$fdate = date('Y-m-d', time());
											//$tdate = date('Y-m-d', strtotime('-90 days'));
											//$_SESSION['from_date'] = $fdate;
											//$_SESSION['to_date'] = $tdate; 
											?>
								</a>
							</h3>
						</div>
					</div>
				</div>
			</div>
		<?php }
	} ?>

	<?php if ($hide == false) { ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default ">
					<div class="panel-heading">

						<?php echo form_open(); ?>
						<table class="table">
							<tr>
								<th class="" style="border:none !important;vertical-align: middle; text-align:right;">
									<?php echo lang_loader('ip', 'ip_feedback_id'); ?>
								</th>
								<td class="" style="border:none !important;">
									<input type="text" class="form-control" placeholder="Enter Feedback ID" maxlength="15"
										size="10" name="pid">
								</td>
								<th class="" style="text-align:left;">
									<p style="text-align:left;"><a href="javascript:void()" data-toggle="tooltip"
											title="Search"><button type="submit" class="btn btn-success"><i
													class="fa fa-search"></i></button></a>

								</th>
							</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>


</div>

<style>
	ul.feedback {
		margin: 0px;
		padding: 0px;
	}

	ul.feedback li {
		list-style: none;
	}

	li#feedback {
		list-style: none;
		padding: 5px;
		width: 100%;
		background: #f7f7f7;
		margin: 8px;
		box-shadow: -1px 1px 0px #ccc;
		border-radius: 5px;
	}

	li#feedback h4 {
		margin: 0px;
		font-weight: bold;
	}

	span.fa.fa-star {
		visibility: hidden;
	}

	.checked {
		color: orange;
		visibility: visible !important;
	}

	ul.feedback li {
		list-style: none;
	}
</style>
<style>
    .checkbox-container {
        max-height: 300px;
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 10px;
    }

    .checkbox input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: #fff;
        border: 1px solid #ccc;
        width: 20px;
        height: 20px;
        border-radius: 3px;
        display: inline-block;
        position: relative;
        margin-right: 10px;
        cursor: pointer;
        vertical-align: middle;
    }

    .checkbox input[type="checkbox"]:checked {
        background-color: #007bff;
        border-color: #007bff;
    }

    .checkbox input[type="checkbox"]:checked::before {
        content: '\2714';
        /* Check mark symbol */
        font-size: 16px;
        color: #fff;
        /* White color for check mark */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .checkbox input[type="checkbox"]::before {
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 3px;
        background-color: #fff;
        border: 1px solid #ccc;
    }

    .checkbox input[type="checkbox"]:checked::after {
        content: '\2714';
        /* Check mark symbol */
        font-size: 16px;
        color: #fff;
        /* White color for check mark */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .checkbox label {
        cursor: pointer;
        position: relative;
        padding-left: 5px;
        /* Space for check mark */
        vertical-align: middle;
    }
</style>
<script>
	function updateHiddenFields(selectElement) {
		var selectedOption = selectElement.options[selectElement.selectedIndex];
		var dataInfo = selectedOption.getAttribute("data-info");

		if (dataInfo) {
			var parsedData = JSON.parse(dataInfo);
			document.getElementById("reply_slug").value = parsedData.slug;
			document.getElementById("reply_setkey").value = parsedData.setkey;
		} else {
			document.getElementById("reply_slug").value = "";
			document.getElementById("reply_setkey").value = "";
		}
	}
</script>
<script>
    document.getElementById('userSearch_reassign').addEventListener('keyup', function() {
        var filter = this.value.toLowerCase();
        var checkboxes = document.getElementById('userList_reassign').getElementsByClassName('checkbox');

        for (var i = 0; i < checkboxes.length; i++) {
            var label = checkboxes[i].getElementsByTagName('label')[0];
            var text = label.textContent || label.innerText;

            if (text.toLowerCase().indexOf(filter) > -1) {
                checkboxes[i].style.display = '';
            } else {
                checkboxes[i].style.display = 'none';
            }
        }
    });
</script>
<script>
    document.getElementById('userSearch').addEventListener('keyup', function() {
        var filter = this.value.toLowerCase();
        var checkboxes = document.getElementById('userList').getElementsByClassName('checkbox');

        for (var i = 0; i < checkboxes.length; i++) {
            var label = checkboxes[i].getElementsByTagName('label')[0];
            var text = label.textContent || label.innerText;

            if (text.toLowerCase().indexOf(filter) > -1) {
                checkboxes[i].style.display = '';
            } else {
                checkboxes[i].style.display = 'none';
            }
        }
    });
</script>