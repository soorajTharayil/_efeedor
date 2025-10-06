<div class="content">
	<?php
	if ($this->input->post('id') || $this->input->get('id')) {
		$email = $this->session->userdata['email'];
		$hide = true;
		$id = $this->input->post('id') ? $this->input->post('id') : $this->input->get('id');

		$this->db->where('id', $id);
		$query = $this->db->get('bf_ma_infection_control_safe_injection_audit');
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
									Safe Injection and Infusion Audit - <?php echo $result->id; ?>
								</h3>
							</div>
							 <?php if (ismodule_active('AUDIT') === true  && isfeature_active('AUDIT-EDIT-PERMISSION') === true) { ?>
								<div class="btn-group" style="float: right;">
									<a class="btn btn-danger" style="margin-top:-40px;margin-right:10px;" href="<?php echo base_url($this->uri->segment(1) . "/edit_infection_control_safe_injection_audit_feedback/$id") ?>">
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
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;"></th>
									</tr>

									

									<tr>
                                        <td>Is Hand hygiene performed (soap/water or hand sanitizer) prior to accessing supplies, handling vials and IV solutions, and preparing or administering medications?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['identification_details'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['identification_details_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Disposable gloves worn according to Meitra policy/procedure?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['vital_signs'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['vital_signs_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Medications and supplies stored and prepared in a clean area on a clean surface?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['surgery'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['surgery_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that needles and syringes are stored in their original packaging/wrapper?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['complaints_communicated'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['complaints_communicated_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is the Skin at the injection/insertion site prepared with the appropriate antiseptic which is allowed to dry on the skin?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['intake'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['intake_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that the injection site is not touched after skin antisepsis has been done?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['output'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['output_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Sterile, single use syringes always used for any type of injection or infusion?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['allergies'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['allergies_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Needles, cannulas and syringes always used as single use (used for only one patient) and are never re-used on other patients?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['medication'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['medication_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Medications never administered from the same syringe or needle to more than one patient?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['diagnostic'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['diagnostic_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that the sterile needle/cannula and/or syringe is removed from the packaging just prior to use?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['lab_results'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['lab_results_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Single-use or single-dose vials used whenever possible? Discard after one use.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['pending_investigation'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['pending_investigation_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Entry into a medication vial always done with a new needle or cannula and syringe? Never enter a vial with a used syringe or needle.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['medicine_order'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['medicine_order_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are the rubber septum/diaphragm of medication vials always cleansed using friction with alcohol prior to each entry?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['facility_communicated'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['facility_communicatedr_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Multi-dose vials dated when first opened and discarded within 28 days or as per manufacturer?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['health_education'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['health_education_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that leftover parenteral medications are never pooled or combined for later use?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['risk_assessment'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['risk_assessment_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that needles and cannulas are never left inserted in any vial rubber septum for multiple withdrawals?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['urethral'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['urethral_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pre-drawing of medications:</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['urine_sample'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['urine_sample_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Medication vials inspected prior to use and discarded if sterility is compromised?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['bystander'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['bystander_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that bags/bottles of IV solutions are never used as common source supply for more than one patient?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['instruments'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['instruments_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that Infusion supplies are never used for more than one patient?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['sterile'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['sterile_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that there is restricted use of finger stick capillary blood sampling devices to individual patients?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['antibiotics'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['antibiotics_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are single-use lancets that permanently retract upon puncture used and never reused?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['surgical_site'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['surgical_site_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that pen style devices with removable lancet are dedicated to one patient?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['wound'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['wound_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is it ensured that the exterior surface of glucometer is cleaned and disinfected after each use?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['documented'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['documented_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Needles/sharps disposed of at the point of use and containers conveniently located?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['adequate_facilities'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['adequate_facilities_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Sharps disposal containers leak-proof, puncture-resistant, and labeled with a biohazard label?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['sufficient_lighting'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['sufficient_lighting_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are Sharps containers emptied/replaced when 2/3 full?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['storage_facility_for_food'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['storage_facility_for_food_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are sharps containers wall mounted or stabilized so they do not tip over?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['personnel_hygiene_facilities'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['personnel_hygiene_facilities_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are sharps safety devices used where possible and activated immediately after use?</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['food_material_testing'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['food_material_testing_text']); ?>
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