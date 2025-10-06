<div class="content">
	<?php
	if ($this->input->post('id') || $this->input->get('id')) {
		$email = $this->session->userdata['email'];
		$hide = true;
		$id = $this->input->post('id') ? $this->input->post('id') : $this->input->get('id');

		$this->db->where('id', $id);
		$query = $this->db->get('bf_ma_surgeons_active_mdc');
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
									Clinicians-Surgeons (Active) - <?php echo $result->id; ?>
								</h3>
							</div>
							 <?php if (ismodule_active('AUDIT') === true  && isfeature_active('AUDIT-EDIT-PERMISSION') === true) { ?>
								<div class="btn-group" style="float: right;">
									<a class="btn btn-danger" style="margin-top:-40px;margin-right:10px;" href="<?php echo base_url($this->uri->segment(1) . "/edit_surgeons_active_feedback/$id") ?>">
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
										<th colspan="2">Consents</th>
									</tr>

									<tr>
										<td>Is the informed consent for surgery obtained?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['identification_details'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['identification_details_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is the date , time and signature of surgeon documented in informed consent for surgery ?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['vital_signs'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['vital_signs_text']); ?>
										</td>
									</tr>
									

									<tr>
										<td>Is the high-risk procedures and treatments consent form (includes surgical or invasive procedures) available in the health record of an applicable patient?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['surgery'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['surgery_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Are the risks, benefits, potential complications and alternatives to surgery explained and fully documented on informed consent form (includes surgical or invasive procedures)?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['complaints_communicated'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['complaints_communicated_text']); ?>
										</td>
									</tr>
									

									<tr>
										<td>Is the blood and blood products consent form available in the health record of an applicable patient?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ensure'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ensure_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the blood and blood products consent form complete?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['intake'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['intake_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the signature of patient or representative, witness, and individual obtaining consent obtained?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['output'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['output_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are No abbreviations used on consent forms</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['focus'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['focus_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">OT documents</th>
									</tr>

									

									
									
									<tr>
										<td>Is the medical assessment documented prior to surgery?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['meti'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['meti_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the Patient and Family Education section completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['diagnostic'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['diagnostic_text']); ?>
										</td>
									</tr>
								
									<tr>
										<td>Is planned care documented in the form of measurable progress (goals)?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['lab_results'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['lab_results_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are the time recovery started and time recovery ended recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['pending_investigation'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['pending_investigation_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the operation record recorded before the patient is transferred to the next level of care?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['medicine_order'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['medicine_order_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is a post-operative report available before the patient leaves the post-anesthesia recovery area?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['psychological'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['psychological_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are the surgical procedure and findings described?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['vulnerab'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['vulnerab_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is a postoperative diagnosis noted?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['social'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['social_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are the names of the surgeon and surgical assistants noted?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['nutri'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['nutri_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Any surgical specimens sent for examination fully documented, if applicable?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['spiritual'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['spiritual_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Amount of blood loss described in ml?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['suicide'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['suicide_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Amount of blood transfused or no blood transfusion described?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['risk'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['risk_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are complications or the absence of complications during the procedure noted?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['care'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['care_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Date, time, and signature of the responsible surgeon noted?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['pfe'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['pfe_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the medical post-surgical plan documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['disch'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['disch_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the patient reassessed daily. (Progress Notes)?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['facility_communicated'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['facility_communicated_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the diagnosis documented in Progress Note?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['health_education'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['health_education_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are the complaints and physical findings documented in Progress Note?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['remarks1'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['remarks1_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are the patient status and special issues documented in Progress Note?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['urethral'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['urethral_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Planned care documented in the form of measurable progress (goals)?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['urine_sample'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['urine_sample_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Planned Care reviewed by other disciplines?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['bystander'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['bystander_text']); ?>
										</td>
									</tr>
										
									<tr>
										<td>Is a list of medications taken prior to admission documented (or there is documentation of none taken)?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['instruments'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['instruments_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Medications ordered written in patient's record and complete?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['sterile'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['sterile_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Do PRN orders contain indications?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['antibiotics'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['antibiotics_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are all physician orders including non-medication orders in a uniform location?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['surgical_site'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['surgical_site_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Verbal/ Telephone orders signed within the approved timeframe?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['wound'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['wound_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Diet order documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['documented'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['documented_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is it ensured that During all phases of inpatient care, the individual responsible for the patient's care is identified in documentation related to the patient's plan of care?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['adequate_facilities'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['adequate_facilities_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the Department handover documented,if applicable?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['sufficient_lighting'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['sufficient_lighting_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are the consultation request and Consultation Response documented in EMR?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['storage_facility_for_food'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['storage_facility_for_food_text']); ?>
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