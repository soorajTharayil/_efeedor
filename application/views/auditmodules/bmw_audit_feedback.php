<div class="content">
	<?php
	if ($this->input->post('id') || $this->input->get('id')) {
		$email = $this->session->userdata['email'];
		$hide = true;
		$id = $this->input->post('id') ? $this->input->post('id') : $this->input->get('id');

		$this->db->where('id', $id);
		$query = $this->db->get('bf_ma_bmw_audit');
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
									Biomedical Waste Collection Audit - <?php echo $result->id; ?>
								</h3>
							</div>
							 <?php if (ismodule_active('AUDIT') === true  && isfeature_active('AUDIT-EDIT-PERMISSION') === true) { ?>
								<div class="btn-group" style="float: right;">
									<a class="btn btn-danger" style="margin-top:-40px;margin-right:10px;" href="<?php echo base_url($this->uri->segment(1) . "/edit_bmw_audit_feedback/$id") ?>">
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

								<!-- Staff Information -->
                                <tr>
                                	<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Staff Information</th>
                                </tr>
                                
                                <tr>
                                	<td>Department</td>
                                	<td><?php echo $param['department']; ?></td>
                                </tr>
                                
                                <tr>
                                	<td>Area</td>
                                	<td><?php echo $param['location']; ?></td>
                                </tr>
                                
                                <tr>
                                	<td>Staff MID</td>
                                	<td><?php echo $param['mid_no']; ?></td>
                                </tr>
                                
                                <tr>
                                	<td>Officer Name</td>
                                	<td><?php echo $param['patient_name']; ?></td>
                                </tr>
                                
                                <tr>
                                	<td>Supervisor Name</td>
                                	<td><?php echo $param['supervisor_name']; ?></td>
                                </tr>
                                
                                <tr>
                                	<td>Driver Name</td>
                                	<td><?php echo $param['driver_name']; ?></td>
                                </tr>
                                
                                <tr>
                                	<td>Picker Name</td>
                                	<td><?php echo $param['picker_name']; ?></td>
                                </tr>



									<!-- Audit parameter -->
									<tr>
										<th colspan="2" style="background-color: #f5f5f5; text-align: left;"></th>
									</tr>

									<!-- Biomedical Waste Collection Details -->
                                    <tr>
                                    	<th colspan="2" style="background-color:#f5f5f5; text-align:left;">Biomedical Waste Collection Details</th>
                                    </tr>
                                    
                                    <tr>
                                    	<td>No. of Yellow Bags</td>
                                    	<td>
                                    		<?php echo !empty($param['yellow_bags']) ? htmlspecialchars($param['yellow_bags']) : '-'; ?>
                                    	</td>
                                    </tr>
                                    
                                    <tr>
                                    	<td>No. of Red Bags</td>
                                    	<td>
                                    		<?php echo !empty($param['red_bags']) ? htmlspecialchars($param['red_bags']) : '-'; ?>
                                    	</td>
                                    </tr>
                                    
                                    <tr>
                                    	<td>No. of White Bags</td>
                                    	<td>
                                    		<?php echo !empty($param['white_bags']) ? htmlspecialchars($param['white_bags']) : '-'; ?>
                                    	</td>
                                    </tr>
                                    
                                    <tr>
                                    	<td>No. of Brownish Yellow Bags</td>
                                    	<td>
                                    		<?php echo !empty($param['brownish_yellow_bags']) ? htmlspecialchars($param['brownish_yellow_bags']) : '-'; ?>
                                    	</td>
                                    </tr>
                                    
                                    <tr>
                                    	<td>No. of Blue Bags</td>
                                    	<td>
                                    		<?php echo !empty($param['blue_bags']) ? htmlspecialchars($param['blue_bags']) : '-'; ?>
                                    	</td>
                                    </tr>
                                    
                                    <tr>
                                    	<td>Total Bags</td>
                                    	<td>
                                    		<?php echo !empty($param['total_bags']) ? htmlspecialchars($param['total_bags']) : '-'; ?>
                                    	</td>
                                    </tr>
                                    
                                    <tr>
                                    	<td>Total Bags Processed</td>
                                    	<td>
                                    		<?php echo !empty($param['total_bags_processed']) ? htmlspecialchars($param['total_bags_processed']) : '-'; ?>
                                    	</td>
                                    </tr>
                                    
                                    <tr>
                                    	<td>Total Quantity (Kg)</td>
                                    	<td>
                                    		<?php echo !empty($param['total_quantity']) ? htmlspecialchars($param['total_quantity']) : '-'; ?>
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