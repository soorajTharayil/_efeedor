<div class="content">
	<?php
	if ($this->input->post('id') || $this->input->get('id')) {
		$email = $this->session->userdata['email'];
		$hide = true;
		$id = $this->input->post('id') ? $this->input->post('id') : $this->input->get('id');

		$this->db->where('id', $id);
		$query = $this->db->get('bf_ma_infection_control_hand_hygiene');
		$results = $query->result();

		if (count($results) >= 1) {
			foreach ($results as $result) {
				$param = json_decode($result->dataset, true);

				// echo '<pre>';
				// print_r($param);
				// echo '</pre>';
				// exit;
	?>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3>
									<a href="javascript:void()" data-toggle="tooltip" title="<?php echo lang_loader('ip', 'audit_id_tooltip'); ?>">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									</a>
									Hand Hygiene Audit - <?php echo $result->id; ?>
								</h3>
							</div>
							 <?php if (ismodule_active('AUDIT') === true  && isfeature_active('AUDIT-EDIT-PERMISSION') === true) { ?>
								<div class="btn-group" style="float: right;">
									<a class="btn btn-danger" style="margin-top:-40px;margin-right:10px;" href="<?php echo base_url($this->uri->segment(1) . "/edit_infection_control_hand_hygiene_feedback/$id") ?>">
										<i class="fa fa-pencil" style="font-size:18px;"></i> Edit
									</a>
								</div>
							<?php } ?> 
							<div class="panel-body" style="background: #fff;">
								<table class="table table-striped table-bordered no-footer dtr-inline" style="font-size: 16px;">
									<!-- Audit Details -->
									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Audit Details</th>
									</tr>
									<tr>
										<td>Audit Name</td>
										<td><?php echo $param['audit_type']; ?></td>
									</tr>
									<tr>
										<td>Date & Time of Audit</td>
										<td><?php echo date('Y-m-d H:i', strtotime($result->datetime)); ?></td>
									</tr>
									<tr>
										<td>Audit by</td>
										<td><?php echo $param['audit_by']; ?></td>
									</tr>

									<!-- Patient Information -->
									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Patient Information</th>
									</tr>
									<tr>
										<td>Patient MID</td>
										<td><?php echo $param['mid_no']; ?></td>
									</tr>
									<tr>
										<td>Patient Name</td>
										<td><?php echo $param['patient_name']; ?></td>
									</tr>
									<tr>
										<td>Patient Age</td>
										<td><?php echo $param['patient_age']; ?></td>
									</tr>
									<tr>
										<td>Patient Gender</td>
										<td><?php echo $param['patient_gender']; ?></td>
									</tr>
									<tr>
										<td>Area</td>
										<td><?php echo $param['location']; ?></td>
									</tr>
									<tr>
										<td>Department</td>
										<td><?php echo $param['department']; ?></td>
									</tr>
									<tr>
										<td>Attended Doctor</td>
										<td><?php echo $param['attended_doctor']; ?></td>
									</tr>
									<tr>
										<td>Admission / Visit Date & Time</td>
										<td><?php echo date('Y-m-d H:i', strtotime($param['initial_assessment_hr6'])); ?></td>
									</tr>
									<tr>
										<td>Discharge Date & Time</td>
										<td>
											<?php
											if (!empty($param['discharge_date_time']) && strtotime($param['discharge_date_time']) > 0 && $param['discharge_date_time'] != '1970-01-01 05:30:00') {
												echo date('Y-m-d H:i', strtotime($param['discharge_date_time']));
											} else {
												echo '-';
											}
											?>
										</td>
									</tr>

									<!-- Audit parameter -->
									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;"></th>
									</tr>

									

									<tr>
										<td>HH activities Before touching Patient</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['identification_details'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['identification_details_text']); ?>
										</td>
									</tr>

									<tr>
										<td>HH activities Before Aseptic Procedure</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['vital_signs'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['vital_signs_text']); ?>
										</td>
									</tr>
									

									<tr>
										<td>HH activities After Blood/Body fluid Exposure</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['surgery'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['surgery_text']); ?>
										</td>
									</tr>

									<tr>
										<td>HH activities After touching patient</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['intake'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['intake_text']); ?>
										</td>
									</tr>
									

									<tr>
										<td>HH activities After Touching patient Surroundings</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['output'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['output_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Nurses</th>
									</tr>

									<tr>
										<td>HH activities Before touching Patient</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['focus'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['focus_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities Before Aseptic Procedure</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['meti'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['meti_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities After Blood/Body fluid Exposure</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['diagnostic'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['diagnostic_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities After touching patient</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['lab_results'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['lab_results_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities After Touching patient Surroundings</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['pending_investigation'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['pending_investigation_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">GDA</th>
									</tr>
									<tr>
										<td>HH activities Before touching Patient</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['medicine_order'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['medicine_order_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities After Blood/Body fluid Exposure</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['psychological'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['psychological_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities After touching patient</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['vulnerab'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['vulnerab_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities After Touching patient Surroundings</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['social'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['social_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Technician</th>
									</tr>
									<tr>
										<td>HH activities Before touching Patient</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['nutri'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['nutri_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities Before Aseptic Procedure</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['spiritual'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['spiritual_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities After Blood/Body fluid Exposure</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['suicide'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['suicide_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities After touching patient</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['risk'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['risk_text']); ?>
										</td>
									</tr>
									<tr>
										<td>HH activities After Touching patient Surroundings</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['care'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['care_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Housekeeping</th>
									</tr>
									<tr>
                                        <td>HH activities Before touching Patient</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['pfe'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['pfe_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities Before Aseptic Procedure</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['disch'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['disch_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities Before Aseptic Procedure</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['facility_communicated'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['facility_communicated_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities After touching patient</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['health_education'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['health_education_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities After Touching patient Surroundings</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['remarks1'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['remarks1_text']); ?>
                                        </td>
                                    </tr>

									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Physiotherapist</th>
									</tr>
									<tr>
                                        <td>HH activities Before touching Patient</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['urethral'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['urethral_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities Before touching Patient</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['urine_sample'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['urine_sample_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities After Blood/Body fluid Exposure</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['bystander'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['bystander_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities After touching patient</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['instruments'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['instruments_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities After Touching patient Surroundings</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['sterile'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['sterile_text']); ?>
                                        </td>
                                    </tr>

									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Respiratory Therapist</th>
									</tr>
									<tr>
                                        <td>HH activities Before touching Patient</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['antibiotics'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['antibiotics_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities Before Aseptic Procedure</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['surgical_site'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['surgical_site_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities After Blood/Body fluid Exposure</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['wound'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['wound_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities After touching patient</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['documented'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['documented_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HH activities After Touching patient Surroundings</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['adequate_facilities'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['adequate_facilities_text']); ?>
                                        </td>
                                    </tr>

									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Cardiac Physiotherapist</th>
									</tr>
									<tr>
                                    <td>HH activities Before touching Patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['sufficient_lighting'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['sufficient_lighting_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities Before Aseptic Procedure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['storage_facility_for_food'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['storage_facility_for_food_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Blood/Body fluid Exposure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['personnel_hygiene_facilities'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['personnel_hygiene_facilities_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After touching patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['food_material_testing'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['food_material_testing_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Touching patient Surroundings</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['incoming_material'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['incoming_material_text']); ?>
                                    </td>
                                </tr>

									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">PCS</th>
									</tr>
									<tr>
                                    <td>HH activities Before touching Patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['raw_materials_inspection'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['raw_materials_inspection_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities Before Aseptic Procedure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['storage_of_materials'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['storage_of_materials_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Blood/Body fluid Exposure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['raw_materials_cleaning'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['raw_materials_cleaning_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After touching patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['equipment_sanitization'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['equipment_sanitization_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Touching patient Surroundings</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['frozen_food_thawing'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['frozen_food_thawing_text']); ?>
                                    </td>
                                </tr>

									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Laboratory</th>
									</tr>
									<tr>
                                    <td>HH activities Before touching Patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['vegetarian_and_non_vegetarian'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['vegetarian_and_non_vegetarian_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities Before Aseptic Procedure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['cooked_food_cooling'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['cooked_food_cooling_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Blood/Body fluid Exposure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['food_portioning'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['food_portioning_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After touching patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab1'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab1_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Touching patient Surroundings</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab2'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab2_text']); ?>
                                    </td>
                                </tr>

										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">OPD Assistant</th>
									</tr>
									<tr>
                                    <td>HH activities Before touching Patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab3'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab3_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities Before Aseptic Procedure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab4'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab4_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Blood/Body fluid Exposure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab5'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab5_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After touching patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab6'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab6_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Touching patient Surroundings</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab7'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab7_text']); ?>
                                    </td>
                                </tr>

									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Doctors</th>
									</tr>
									<tr>
                                    <td>HH activities Before touching Patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab8'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab8_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities Before Aseptic Procedure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab9'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab9_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Blood/Body fluid Exposure</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab10'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab10_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After touching patient</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab11'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab11_text']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HH activities After Touching patient Surroundings</td>
                                    <td>
                                        <?php echo ucfirst(htmlspecialchars($param['ab12'])); ?><br>
                                        Remarks: <?php echo htmlspecialchars($param['ab12_text']); ?>
                                    </td>
                                </tr>

									

									
									


								
									
									
									
									


									<!-- Audit other details -->
									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;"></th>
									</tr>

									<tr>
										<td>Additional comments:</td>
										<td><?php echo $param['dataAnalysis']; ?></td>
									</tr>

									<tr>
										<td>Uploaded files:</td>
										<td>
											<?php
											if (!empty($param['files_name']) && is_array($param['files_name'])) {
												foreach ($param['files_name'] as $file) {
													echo '<a href="' . htmlspecialchars($file['url']) . '" target="_blank">' . htmlspecialchars($file['name']) . '</a><br>';
												}
											} else {
												echo 'No files uploaded';
											}
											?>
										</td>
									</tr>


								</table>


							</div>
						</div>
					</div>
				</div>
			<?php } // End foreach
		} else { ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 style="text-align: center; color:tomato;">
								<?php echo lang_loader('ip', 'ip_no_record_found'); ?>
								<br>
								<a href="<?php echo base_url(uri_string(1)); ?>">
									<button type="button" data-toggle="tooltip" title="Back" class="btn btn-sm btn-success" style="text-align: center;">
										<i class="fa fa-arrow-left"></i>
									</button>
								</a>
							</h3>
						</div>
					</div>
				</div>
			</div>
	<?php } // End else
	} // End if 
	?>

	<?php if ($hide == false) { ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php echo form_open(); ?>
						<table class="table">
							<tr>
								<th style="border:none !important;vertical-align: middle; text-align:right;">
									<?php echo lang_loader('ip', 'ip_feedback_id'); ?>
								</th>
								<td style="border:none !important;">
									<input type="text" class="form-control" placeholder="Enter Audit ID" maxlength="15" size="10" name="pid">
								</td>
								<th style="text-align:left;">
									<p style="text-align:left;">
										<a href="javascript:void()" data-toggle="tooltip" title="Search">
											<button type="submit" class="btn btn-success">
												<i class="fa fa-search"></i>
											</button>
										</a>
									</p>
								</th>
							</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<!-- <div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<canvas id="barChart" width="400" height="200" style="width: 50%;padding:50px;"></canvas>
			</div>
		</div>
	</div> -->
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

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