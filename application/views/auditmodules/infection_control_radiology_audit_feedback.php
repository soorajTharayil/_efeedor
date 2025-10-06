<div class="content">
	<?php
	if ($this->input->post('id') || $this->input->get('id')) {
		$email = $this->session->userdata['email'];
		$hide = true;
		$id = $this->input->post('id') ? $this->input->post('id') : $this->input->get('id');

		$this->db->where('id', $id);
		$query = $this->db->get('bf_ma_infection_control_radiology_audit');
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
									Radiology PCI Audit - <?php echo $result->id; ?>
								</h3>
							</div>
							 <?php if (ismodule_active('AUDIT') === true  && isfeature_active('AUDIT-EDIT-PERMISSION') === true) { ?>
								<div class="btn-group" style="float: right;">
									<a class="btn btn-danger" style="margin-top:-40px;margin-right:10px;" href="<?php echo base_url($this->uri->segment(1) . "/edit_infection_control_radiology_audit_feedback/$id") ?>">
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
										<td>Admission Date & Time</td>
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
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">General</th>
                                    </tr>
                                    <tr>
                                        <td>Employees apply standard precautions when providing patient care.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['identification_details'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['identification_details_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>All areas are clean and tidy.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['vital_signs'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['vital_signs_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>All staffs receive infection control orientation when hired and on an annual basis.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['surgery'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['surgery_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Furniture is made of cleanable material such as vinyl and is intact.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['complaints_communicated'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['complaints_communicated_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Under sink areas are free from supplies.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['intake'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['intake_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Eating and drinking is not allowed except in designated areas.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['output'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['output_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pillows and mattresses are covered with a cleanable material such as vinyl and are intact.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['focus'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['focus_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Hand washing and personal protective equipment (PPE)</th>
                                    </tr>
                                    <tr>
                                        <td>There is adequate sinks available for hand washing, one in each X-ray room.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['meti'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['meti_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There is approved alcohol-based hand rub if sink is not available.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['diagnostic'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['diagnostic_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>All personnel protective equipment is readily available to all staff.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['lab_results'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['lab_results_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Staff is able to verbalize the meaning of standard precautions.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['pending_investigation'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['pending_investigation_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Personal protective equipment is not worn outside patient areas.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['medicine_order'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['medicine_order_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Waste and Sharps Disposal</th>
                                    </tr>
                                    <tr>
                                        <td>There is color-coded foot –operated waste bins for regular and infectious waste. Bins are labeled</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['psychological'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['psychological_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Waste bins are not over-filled.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['vulnerab'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['vulnerab_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There is regular removal of waste.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['social'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['social_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There are adequate puncture resistant leak-proof sharp containers available. These should be wall mounted.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['nutri'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['nutri_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sharp containers are emptied when they are three quarters (3/4) full.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['spiritual'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['spiritual_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Staff is able to verbalize what to do following a needle stick/sharps injury.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['suicide'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['suicide_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Clean / Sterile Supplies</th>
                                    </tr>
                                    <tr>
                                        <td>There is a segregated area for clean/sterile supplies.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['risk'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['risk_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There is a segregated area for dirty/soiled utility.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['care'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['care_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Clean/sterile supplies are stored properly (no cardboard boxes).</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['pfe'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['pfe_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Appropriate measures are taken if temperature in medication refrigerators/ freezers is out of range.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['disch'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['disch_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Cleaning of Environmental Surfaces and Equipment</th>
                                    </tr>
                                    <tr>
                                        <td>Environmental surface are disinfected beginning and end of day and in between patients.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['facility_communicated'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['facility_communicated_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lead aprons and thyroid shields are clean and tidy.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['health_education'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['health_education_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ultrasound props are properly disinfected in between patients.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['remarks1'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['remarks1_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Linen</th>
                                    </tr>
                                    <tr>
                                        <td>There is adequate covered linen storage and disposal hampers.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['urethral'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['urethral_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bed linen is changed between patients.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['urine_sample'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['urine_sample_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Infected is put in leak proof laundry bags.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['bystander'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['bystander_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Housekeeping</th>
                                    </tr>
                                    <tr>
                                        <td>There is adequate housekeeping storage.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['instruments'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['instruments_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Blood spill kit is available?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['sterile'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['sterile_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There are written policies and procedures for cleaning blood spills.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['antibiotics'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['antibiotics_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Person responsible for blood spill cleanup has adequate training and proper PPE for procedures.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['surgical_site'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['surgical_site_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There is proper personnel protective equipment available for clean- up blood spill.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['wound'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['wound_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cleaners are aware of needles tick/ sharps injury protocol</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['documented'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['documented_text']); ?>
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