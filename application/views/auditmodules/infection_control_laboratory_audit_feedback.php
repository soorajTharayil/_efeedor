<div class="content">
	<?php
	if ($this->input->post('id') || $this->input->get('id')) {
		$email = $this->session->userdata['email'];
		$hide = true;
		$id = $this->input->post('id') ? $this->input->post('id') : $this->input->get('id');

		$this->db->where('id', $id);
		$query = $this->db->get('bf_ma_infection_control_laboratory_audit');
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
									Laboratory PCI Audit - <?php echo $result->id; ?>
								</h3>
							</div>
							 <?php if (ismodule_active('AUDIT') === true  && isfeature_active('AUDIT-EDIT-PERMISSION') === true) { ?>
								<div class="btn-group" style="float: right;">
									<a class="btn btn-danger" style="margin-top:-40px;margin-right:10px;" href="<?php echo base_url($this->uri->segment(1) . "/edit_infection_control_laboratory_audit_feedback/$id") ?>">
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
										<td><?php echo date('Y-m-d H:i', strtotime($param['discharge_date_time'])); ?></td>
									</tr>

									<!-- Audit parameter -->
									<tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">General</th>
                                    </tr>
                                    
                                    <tr>
                                        <td>There is a cleaning schedule for the laboratory.</td>
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
                                        <td>There are designated clean and dirty areas in the laboratory.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['surgery'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['surgery_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Furniture/ counters are made of non-porous materials.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['complaints_communicated'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['complaints_communicated_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>All staff receives infection control education upon hire and on annual basis.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['intake'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['intake_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Under sink areas are free from supplies.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['output'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['output_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Eye wash stations and emergency showers are available and checked daily.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['focus'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['focus_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There is no eating, drinking, and smoking in the laboratory.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['meti'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['meti_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Refrigerators and freezers temperatures are monitored on regularly basis and records are kept.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['diagnostic'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['diagnostic_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chemicals are labeled and stored appropriately.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['lab_results'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['lab_results_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>A class type biological safety cabinet is available when working with highly infectious agents. The type is dependent on the classification of the infectious agent.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['pending_investigation'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['pending_investigation_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Food is not stored in technical area or technical; refrigerators.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['food'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['food_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Waste and Sharp Disposal</th>
                                    </tr>
                                    <tr>
                                        <td>There are adequate color–coded foot–operated waste bins for regular infectious waste. Bins are labeled.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['medicine_order'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['medicine_order_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Waste bins are not over-filled.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['psychological'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['psychological_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There is regular removal of waste.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['vulnerab'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['vulnerab_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There are adequate leak-proof sharps containers available. These should be wall mounted. Sharps containers are replaced when they are three quarters ¾.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['social'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['social_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>There is no recapping of needles.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['needle'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['needle_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There is proper storage and disposal of lab specimens.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['nutri'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['nutri_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Staff is able to verbalize what to do following a needlestick / sharps injury.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['spiritual'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['spiritual_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Personal Protective Equipment (PPE), Standard precautions and isolation</th>
                                    </tr>
                                    <tr>
                                        <td>PPE are readily available.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['suicide'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['suicide_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Staff wears proper PPE when appropriate.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['risk'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['risk_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lab coats/gowns are worn when collecting blood.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['care'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['care_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lab coats are clean.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['pfe'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['pfe_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Staff is able to verbalize the meaning of standard precautions.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['disch'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['disch_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>All specimens of blood and body fluids are transported in leak-proof containers.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['facility_communicated'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['facility_communicated_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bio-hazard (zip-lock) bags are available and used for specimen transport.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['health_education'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['health_education_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Personnel respiratory protection is used when handling Tuberculosis or Suspected TB specimens.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['remarks1'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['remarks1_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TB lab negative pressure is controlled and maintained.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['urethral'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['urethral_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Hand washing</th>
                                    </tr>
                                    <tr>
                                        <td>There are adequate sinks available for handwashing.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['urine_sample'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['urine_sample_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There is alcohol-based hand rub if sinks are not available.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['bystander'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['bystander_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Staff members successfully demonstrate proper hand washing technique.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['instruments'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['instruments_text']); ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Housekeeping</th>
                                    </tr>
                                    <tr>
                                        <td>There is adequate housekeeping storage.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['sterile'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['sterile_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Blood spill kits are available.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['antibiotics'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['antibiotics_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>There are written policies and procedures for cleaning blood spills.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['surgical_site'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['surgical_site_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Person responsible for blood spill cleanup has adequate training and proper PPE for procedures.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['wound'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['documented_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cleaners are aware of needlestick/sharps injury protocol.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['adequate_facilities'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['adequate_facilities_text']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Housekeeper is educated in cleaning techniques using separate cleaning supplies for regular cleaning, for bathrooms and for isolation rooms.</td>
                                        <td>
                                            <?php echo ucfirst(htmlspecialchars($param['disch'])); ?><br>
                                            Remarks: <?php echo htmlspecialchars($param['disch_text']); ?>
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