<div class="content">
	<?php
	if ($this->input->post('id') || $this->input->get('id')) {
		$email = $this->session->userdata['email'];
		$hide = true;
		$id = $this->input->post('id') ? $this->input->post('id') : $this->input->get('id');

		$this->db->where('id', $id);
		$query = $this->db->get('bf_ma_dischargedpatients_mrd_audit');
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
									Discharged Patients MRD Audit 2023 - <?php echo $result->id; ?>
								</h3>
							</div>
							 <?php if (ismodule_active('AUDIT') === true  && isfeature_active('AUDIT-EDIT-PERMISSION') === true) { ?>
								<div class="btn-group" style="float: right;">
									<a class="btn btn-danger" style="margin-top:-40px;margin-right:10px;" href="<?php echo base_url($this->uri->segment(1) . "/edit_discharged_patients_mrd_feedback/$id") ?>">
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
										<th colspan="2">Admission note</th>
									</tr>

									<tr>
										<td>Are Present Complaints documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['identification_details'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['identification_details_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is Patient History recorded properly?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['vital_signs'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['vital_signs_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Are Clinical Findings noted?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['surgery'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['surgery_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is Admitting Diagnosis clearly mentioned?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['complaints_communicated'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['complaints_communicated_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is Plan of Care documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['intake'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['intake_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is Plan for Discharge prepared?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['output'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['output_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is Patient and Family Education (PFE) provided?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['focus'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['focus_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is Medication History documented accurately?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['meti'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['meti_text']); ?>
										</td>
									</tr>
									
									<tr>
										<td>Is the use of abbreviations as per guidelines?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['diagnostic'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['diagnostic_text']); ?>
										</td>
									</tr>

									<tr>
										<th colspan="2">IP notes</th>
									</tr>

									<tr>
										<td>Are Complaints updated in the notes?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['lab_results'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['lab_results_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Are Investigation Findings recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['pending_investigation'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['pending_investigation_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Are Vital signs monitored and documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['medicine_order'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['medicine_order_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is Diagnosis clearly mentioned?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['psychological'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['psychological_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is Plan for Care updated?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['vulnerab'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['vulnerab_text']); ?>
										</td>
									</tr>

									<tr>
										<td>Is Discharge Plan communicated?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['social'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['social_text']); ?>
										</td>
									</tr>
									
									
									<tr>
										<td>Is Patient and Family Education (PFE) provided?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['nutri'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['nutri_text']); ?>
										</td>
									</tr>
									
									<tr>
										<td>Is the use of abbreviations as per guidelines?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['spiritual'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['spiritual_text']); ?>
										</td>
									</tr>
									
									<tr>
										<td>Is 'Copy and Paste' practice avoided?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['suicide'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['suicide_text']); ?>
										</td>
									</tr>
									
									<tr>
										<td>Are Critical values identified and actions taken?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['risk'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['risk_text']); ?>
										</td>
									</tr>
									
									
									<tr>
										<td>Is Preoperative assessment completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['care'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['care_text']); ?>
										</td>
									</tr>

									<tr>
										<th colspan="2">ICU</th>
									</tr>

									<tr>
										<td>Are ICU Initial Notes documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['pfe'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['pfe_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are ICU Progress Notes updated?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['disch'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['disch_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are ICU Transfer Notes properly filled?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['facility_communicated'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['facility_communicated_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is ICU Handover completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['health_education'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['health_education_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Abbreviation use compliant with guidelines?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['remarks1'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['remarks1_text']); ?>
										</td>
									</tr>
																		
									<tr>
										<th colspan="2">Anaesthesia Documents</th>
									</tr>
									<tr>
										<td>Is Pre Anaesthesia Assessment documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['urethral'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['urethral_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Pre Anaesthesia Order completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['urine_sample'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['urine_sample_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Post Procedure Notes - Anaesthesia documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['bystander'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['bystander_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Pre-Induction Assessment (PIA) completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['instruments'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['instruments_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Plan of Anaesthesia prepared?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['sterile'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['sterile_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Anaesthesia Record complete?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['antibiotics'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['antibiotics_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Consent for Anaesthesia obtained?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['surgical_site'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['surgical_site_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Operation notes</th>
									</tr>
									<tr>
										<td>Is Date & Time of procedure recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['wound'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['wound_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Preoperative Assessment documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['documented'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['documented_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Pre & Post-Operative Diagnosis recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['adequate_facilities'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['adequate_facilities_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Surgery/Procedure Name documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['sufficient_lighting'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['sufficient_lighting_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Surgeon & Anaesthetist names recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['storage_facility_for_food'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['storage_facility_for_food_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Scrub Nurse & OT Technician names documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['personnel_hygiene_facilities'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['personnel_hygiene_facilities_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Type of Anaesthesia & Position recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['food_material_testing'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['food_material_testing_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Procedure Details documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['incoming_material'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['incoming_material_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Post-Operative Status & Orders updated?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['raw_materials_inspection'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['raw_materials_inspection_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Peri-Operative Complications documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['storage_of_materials'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['storage_of_materials_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the amount of blood loss documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['raw_materials_cleaning'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['raw_materials_cleaning_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the amount of blood transfused recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['equipment_sanitization'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['equipment_sanitization_text']); ?>
										</td>
									</tr>
										<tr>
										<th colspan="2">Consents</th>
									</tr>
									
									<tr>
										<td>Is patient identification verified before procedure?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['frozen_food_thawing'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['frozen_food_thawing_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the Name & Type of Anaesthesia documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['vegetarian_and_non_vegetarian'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['vegetarian_and_non_vegetarian_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the Name of Surgery/Procedure recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['cooked_food_cooling'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['cooked_food_cooling_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the Doctor and Patient signature obtained?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['food_portioning'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['food_portioning_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Date & Time documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab1'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab1_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is it ensured that abbreviations are not used?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab2'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab2_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Risk, Benefits, and Alternatives documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab3'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab3_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the legibility of Consent maintained?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab4'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab4_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Cross consultation</th>
									</tr>
									<tr>
										<td>Is Consultation Request documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab5'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab5_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Consultation Response documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab6'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab6_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Has the priority of Consultation been marked?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab7'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab7_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Discharge summary</th>
									</tr>
									<tr>
										<td>Are DOA, DOD, and DOS recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab8'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab8_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Diagnosis documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab9'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab9_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Course in the Hospital recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab10'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab10_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Cross Consultation (if applicable) documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab11'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab11_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Discharge Medications & Instructions provided?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab12'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab12_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Patient Condition at Discharge recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab13'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab13_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is 'When to Contact' instruction given?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab14'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab14_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Emergency Contact information provided?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab15'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab15_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is it ensured that no abbreviations are used?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab16'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab16_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Document finalized and signed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab17'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab17_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">ED documents</th>
									</tr>
									<tr>
										<td>Is ED Initial Assessment completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab18'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab18_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are ED Transfer Notes documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab19'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab19_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is the Triage process completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab20'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab20_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">OT documents</th>
									</tr>
									<tr>
										<td>Is Pre and Post-Operative Checklist completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab21'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab21_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Surgical Safety Checklist followed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab22'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab22_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Operation Room Count completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab23'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab23_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is PACU documentation updated?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab24'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab24_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Anaesthesia Technician Checklist filled?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab25'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab25_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Nursing Initial assessment</th>
									</tr>
									<tr>
										<td>Is Pain Assessment documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab26'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab26_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Fall Risk Assessment completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab27'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab27_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Patient Needs assessed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab28'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab28_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Discharge Planning done?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab29'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab29_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Pain Reassessment performed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab30'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab30_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Fall Risk Reassessment documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab31'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab31_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Special Population assessment</th>
									</tr>
									<tr>
										<td>Is End of Life (EOL) care documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab32'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab32_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Geriatric Assessment completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab33'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab33_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Psychiatric Assessment documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab34'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab34_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Chemotherapy Assessment completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab35'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab35_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Other documents</th>
									</tr>
									<tr>
										<td>Is Physiotherapy Initial Assessment documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab36'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab36_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Physiotherapy Progress Notes updated?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab37'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab37_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Narcotic Drug Form filled?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab38'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab38_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Blood Transfusion Form completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab39'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab39_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Sedation Assessment performed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab40'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab40_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Reason for Restraint documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab41'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab41_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Type of Restraint specified?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab42'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab42_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Scanned Status uploaded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab43'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab43_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Planned Length of Stay (LOS) documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab44'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab44_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Actual Length of Stay (LOS) documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab45'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab45_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Remarks updated?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab46'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab46_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Post Procedure note</th>
									</tr>
									<tr>
										<td>Is Procedure Name recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab47'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab47_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Date & Time documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab48'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab48_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Special Issues documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab49'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab49_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Condition after Procedure recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab50'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab50_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Post Operative Care Plan documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab51'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab51_text']); ?>
										</td>
									</tr>
										<tr>
										<th colspan="2">Nurses Shift record</th>
									</tr>
									<tr>
										<td>Is MEWS (Modified Early Warning Score) assessment done?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab52'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab52_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is ABC (Airway, Breathing, Circulation) check completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab53'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab53_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Pain Reassessment performed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab54'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab54_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Lines and Tubes checked and documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab55'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab55_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Care Bundle followed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab56'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab56_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Nurses Handover</th>
									</tr>
									<tr>
										<td>Are Types of Handover documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab57'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab57_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Date and Time recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab58'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab58_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Handover Details documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab59'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab59_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">In house Transfer</th>
									</tr>
									<tr>
										<td>Is Date and Time recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab60'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab60_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Reason for Transfer specified?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab61'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab61_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Name of Procedure documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab62'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab62_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are From & To Departments mentioned?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab63'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab63_text']); ?>
										</td>
									</tr><tr>
										<td>Are Handover Details updated?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab64'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab64_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Takeover Details recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab65'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab65_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Restrain Monitoring</th>
									</tr>
									<tr>
										<td>Is Date and Time documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab66'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab66_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Type of Restraint specified?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab67'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab67_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Location documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab68'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab68_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Reassessment completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab69'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab69_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Discontinued Details recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab70'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab70_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Blood Transfusion record</th>
									</tr>
									<tr>
										<td>Is Date and Time documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab71'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab71_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Bag Number documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab72'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab72_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Date of Expiry mentioned?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab73'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab73_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Start and End Date with Time documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab74'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab74_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Verification Details recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab75'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab75_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Vitals recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab76'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab76_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Endoscopy flow sheet</th>
									</tr>
									<tr>
										<td>Is Sign-In Date and Time recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab77'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab77_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Co-Morbidities documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab78'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab78_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Time-Out Date and Time documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab79'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab79_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Patient & Procedure Identification confirmed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab80'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab80_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Sign-Out Date and Time recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab81'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab81_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Specimen Details documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab82'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab82_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Transfer Details recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab83'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab83_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Handover Details updated?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab84'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab84_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Surgical Safety checklist - OT/Outside OT</th>
									</tr>
									<tr>
										<td>Is Sign-In Date and Time recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab85'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab85_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Identification Details documented?/td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab86'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab86_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Time-Out Date and Time recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab87'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab87_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Confirmation by Team done?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab88'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab88_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Sign-Out Date and Time recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab89'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab89_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Count and Specimen details documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab90'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab90_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Transfer Details recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab100'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab100_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Handover Details documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab101'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab101_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Sedation Monitoring form</th>
									</tr>
									<tr>
										<td>Is Mallampati Score recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab102'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab102_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is ASA (American Society of Anesthesiologists) classification documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab103'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab103_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Intra-Procedural Vitals monitored and recorded?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab104'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab104_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Post-Sedation Vitals documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab105'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab105_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Discharge Note completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab106'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab106_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Stroke forms</th>
									</tr>
									<tr>
										<td>Is Stroke Timeline entry completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab107'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab107_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is NIHSS score documented in initial notes (ED/IP)?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab108'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab108_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Initial GRBS documented at admission?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab109'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab109_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Consent forms for IV Thrombolysis / Mechanical Thrombectomy completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab110'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab110_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Informed Refusal form documented (if applicable)?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab111'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab111_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Post-Thrombolysis Monitoring form completed?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab112'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab112_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Does the record contain admission reasons, assessments, diagnosis, investigations, procedures, monitoring, and care details?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab113'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab113_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is documentation provided if an eligible ischemic stroke patient did not receive IV thrombolytic therapy?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab114'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab114_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Pre-morbid mRS documented in all initial IP notes?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab115'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab115_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are key infection control indicators defined and measured (Hand Hygiene, CAUTI, CLABSI, VAP, SSI)?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab116'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab116_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are all assessments documented and signed/authenticated by staff?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab117'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab117_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Do assessments result in appropriate care/monitoring plans that are documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab118'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab118_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Dysphagia Screening documented before starting oral feeds?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab119'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab119_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Nutritional Screening documented for all patients?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab120'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab120_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Is Care guided by functional assessment and periodic reassessments documented?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab121'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab121_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are Assessments completed within 24 hours of admission or once patient is stable?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab122'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab122_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Does the Discharge/Treatment summary include instructions for urgent care?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab123'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab123_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Are NIHSS / mRS scores documented at discharge?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab124'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab124_text']); ?>
										</td>
									</tr>
									<tr>
										<td>In case of death, does the record include a Death Summary?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab125'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab125_text']); ?>
										</td>
									</tr>
									<tr>
										<th colspan="2">Closed Audit checklist</th>
									</tr>
									<tr>
										<td>Is there missing or incomplete documentation related to Medico-Legal Case (MLC)?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab126'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab126_text']); ?>
										</td>
									</tr>
									<tr>
										<td>Does the record reflect accurate and timely documentation of death details (cause, date, time, EMR status updated to 'Deceased')?</td>
										<td>
											<?php echo ucfirst(htmlspecialchars($param['ab127'])); ?><br>
											Remarks: <?php echo htmlspecialchars($param['ab127_text']); ?>
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