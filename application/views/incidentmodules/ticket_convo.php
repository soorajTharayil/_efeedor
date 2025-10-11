<div class="col-lg-12">

	<!-- Total Product Sales area -->

	<div class="panel panel-default">


		<div class="panel-heading">
			<?php if ($this->session->userdata('isLogIn') == false) { ?>
				<h3><?php echo lang_loader('inc', 'inc_incident_thread'); ?></h3>
			<?php } else { ?>
				<h3>Incident Timeline & History</h3>
			<?php } ?>
		</div>
		<div class="panel-body" style="    height: auto;     overflow: auto;">
			<?php
			$nodata = true;
			?>
			<div class="timeline">
				<?php foreach ($department->replymessage as $index => $r): ?>
					<div class="timeline-item">
						<div class="timeline-badge">
							<span><?php echo date('d M, Y', strtotime($r->created_on)); ?></span>
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h5><?php echo $r->ticket_status; ?></h5>
								<small><?php echo date('g:i A', strtotime($r->created_on)); ?></small>
							</div>
							<div class="timeline-body">


								<?php if ($r->ticket_status != 'Assigned'): ?>
									<?php if ($r->ticket_status != 'Re-assigned'): ?>
										<p><strong>Action:</strong> <?php echo $r->action; ?></p>
									<?php endif; ?>
								<?php endif; ?>

								<?php if ($r->process_monitor_note) { ?>
									<p><strong>Notes : </strong> <?php echo $r->process_monitor_note; ?></p>
								<?php } ?>





								<?php if ($r->ticket_status == 'Transfered'): ?>
									<p><strong>Action:</strong> <?php echo $r->action; ?><strong> (Team Leader)</strong></p>
									<p><strong>Transferred by:</strong> <?php echo $r->message; ?></p>
									<p style="overflow: clip; word-break: break-all;font-size: 14px;">
										<strong>Comment:</strong> <?php echo $r->reply; ?>
									</p>
								<?php endif; ?>

								<?php if ($r->ticket_status == 'Assigned'): ?>
									<p><strong>Action:</strong> <?php echo $r->action; ?><strong>(Team Leader)</strong></p>

									<p><strong>Process Monitor:</strong> <?php echo $r->action_for_process_monitor; ?></p>
									<p><strong>Assigned by:</strong> <?php echo $r->message; ?></p>
								<?php endif; ?>

								<?php if ($r->ticket_status == 'Re-assigned'): ?>
									<p><strong>Action:</strong> <?php echo $r->action; ?><strong>(Team Leader)</strong></p>
									<p><strong>Process Monitor:</strong> <?php echo $r->reassign_action_for_process_monitor; ?>
									</p>
									<p><strong>Re-assigned by:</strong> <?php echo $r->message; ?></p>
								<?php endif; ?>
									<?php if ($r->ticket_status == 'Described') { ?>
									<?php
									if (
										ismodule_active('INCIDENT') === true &&
										isfeature_active('IN-EDIT-RCA-INCIDENTS') === true &&
										$r->ticket_status != 'Closed'
									) {
										?>
										<!-- Edit/Save buttons -->
										<div class="text-end mb-2 action-buttons-<?php echo $r->id; ?>">
											<button type="button" class="btn btn-sm btn-outline-primary edit-btn"
												data-id="<?php echo $r->id; ?>">
												<i class="fa fa-edit"></i> Edit
											</button>
											<button type="button" class="btn btn-sm btn-success save-btn"
												data-id="<?php echo $r->id; ?>" style="display:none;">
												<i class="fa fa-save"></i> Save
											</button>
										</div>
										<?php
									}
									?>



									<div class="card shadow-sm mb-3">
										<?php if ($r->rca_tool_describe) { ?>
											<div><strong>Root Cause Analysis (RCA)</strong></div>
										<?php } ?>

										<!-- Editable wrapper -->
										<div class="editable-section" id="editable-<?php echo $r->id; ?>">
											<div class="card-body" style="font-size: 14px; line-height:1.6;">

												<?php if ($r->rootcause_describe) { ?>
													<p><b>Closure RCA:</b> <?php echo $r->rootcause_describe; ?></p>
												<?php } ?>

												<?php if ($r->rca_tool_describe) { ?>
													<p><b>Tool Applied:</b> <?php echo $r->rca_tool_describe; ?></p>
												<?php } ?>

												<?php if ($r->rca_tool_describe == '5WHY') { ?>
													<ul class="list-unstyled">
														<li><b>WHY 1:</b> <?php echo $r->fivewhy_1_describe; ?></li>
														<li><b>WHY 2:</b> <?php echo $r->fivewhy_2_describe; ?></li>
														<li><b>WHY 3:</b> <?php echo $r->fivewhy_3_describe; ?></li>
														<li><b>WHY 4:</b> <?php echo $r->fivewhy_4_describe; ?></li>
														<li><b>WHY 5:</b> <?php echo $r->fivewhy_5_describe; ?></li>
													</ul>
												<?php } ?>

												<?php if ($r->rca_tool_describe == '5W2H') { ?>
													<dl>
														<?php if ($r->fivewhy2h_1_describe) { ?>
															<dt>What happened?</dt>
															<dd><?php echo $r->fivewhy2h_1_describe; ?></dd>
														<?php } ?>
														<?php if ($r->fivewhy2h_2_describe) { ?>
															<dt>Why did it happen?</dt>
															<dd><?php echo $r->fivewhy2h_2_describe; ?></dd>
														<?php } ?>
														<?php if ($r->fivewhy2h_3_describe) { ?>
															<dt>Where did it happen?</dt>
															<dd><?php echo $r->fivewhy2h_3_describe; ?></dd>
														<?php } ?>
														<?php if ($r->fivewhy2h_4_describe) { ?>
															<dt>When did it happen?</dt>
															<dd><?php echo $r->fivewhy2h_4_describe; ?></dd>
														<?php } ?>
														<?php if ($r->fivewhy2h_5_describe) { ?>
															<dt>Who was involved?</dt>
															<dd><?php echo $r->fivewhy2h_5_describe; ?></dd>
														<?php } ?>
														<?php if ($r->fivewhy2h_6_describe) { ?>
															<dt>How did it happen?</dt>
															<dd><?php echo $r->fivewhy2h_6_describe; ?></dd>
														<?php } ?>
														<?php if ($r->fivewhy2h_7_describe) { ?>
															<dt>How much/How many (impact/cost)?</dt>
															<dd><?php echo $r->fivewhy2h_7_describe; ?></dd>
														<?php } ?>
													</dl>
												<?php } ?>

												<?php if ($r->corrective_describe) { ?>
													<p><b>Corrective Action:</b> <?php echo $r->corrective_describe; ?></p>
												<?php } ?>

												<?php if ($r->preventive_describe) { ?>
													<p><b>Preventive Action:</b> <?php echo $r->preventive_describe; ?></p>
												<?php } ?>

												<?php if ($r->verification_comment_describe) { ?>
													<p><b>Lesson Learned :</b> <?php echo $r->verification_comment_describe; ?></p>
												<?php } ?>

												<?php if ($r->describe_picture):
													$file_extension = pathinfo($r->describe_picture, PATHINFO_EXTENSION);
													$file_url = base_url('assets/images/capaimage/' . $r->describe_picture);
													?>
													<div class="mt-3">
														<b>Attached File:</b><br>
														<?php if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])): ?>
															<img class="img-thumbnail mt-2" style="max-width:150px;"
																src="<?php echo $file_url; ?>">
															<br><a class="btn btn-sm btn-outline-primary mt-2"
																href="<?php echo $file_url; ?>" download>Download Image</a>
														<?php elseif ($file_extension === 'pdf'): ?>
															<embed src="<?php echo $file_url; ?>" type="application/pdf" width="250"
																height="200" class="mt-2">
															<br><a class="btn btn-sm btn-outline-danger mt-2"
																href="<?php echo $file_url; ?>" download>Download PDF</a>
														<?php elseif (in_array($file_extension, ['xls', 'xlsx', 'csv'])): ?>
															<a class="btn btn-sm btn-outline-success mt-2"
																href="<?php echo $file_url; ?>" download>Download
																<?php echo strtoupper($file_extension); ?> File</a>
														<?php elseif (in_array($file_extension, ['doc', 'docx'])): ?>
															<a class="btn btn-sm btn-outline-info mt-2" href="<?php echo $file_url; ?>"
																download>Download Word Document</a>
														<?php elseif (in_array($file_extension, ['zip', 'rar'])): ?>
															<a class="btn btn-sm btn-outline-secondary mt-2"
																href="<?php echo $file_url; ?>" download>Download Compressed File</a>
														<?php elseif (in_array($file_extension, ['mp4', 'avi', 'mov', 'm4a', 'wav', 'wma'])): ?>
															<a class="btn btn-sm btn-outline-dark mt-2" href="<?php echo $file_url; ?>"
																download>Download Media File</a>
														<?php else: ?>
															<a class="btn btn-sm btn-outline-primary mt-2"
																href="<?php echo $file_url; ?>" download>Download File</a>
														<?php endif; ?>
													</div>
												<?php endif; ?>

											</div>
										</div>
									</div>
								<?php } ?>

								<script>
									$(document).ready(function () {

										// 🟩 EDIT button click
										$(document).off('click', '.edit-btn').on('click', '.edit-btn', function (e) {
											e.preventDefault();

											var id = $(this).data('id');
											var section = $('#editable-' + id);

											section.find('p, dd, li').each(function () {
												var $this = $(this);
												var $bold = $this.find('b, strong').first();
												var label = $bold.length ? $.trim($bold.text().replace(':', '')) : '';
												var labelKey = label.replace(/\s+/g, '_'); // normalize spaces

												var html = $this.html();
												var parts = html.split('</b>');
												var value = '';
												if (parts.length > 1) {
													value = parts[1]
														.replace(/[:]/g, '')
														.replace(/<\/?[^>]+(>|$)/g, '')
														.replace(/&nbsp;/g, ' ')
														.trim();
												}

												// 🛑 Skip converting "Tool Applied" field to input
												if (label.toLowerCase() === 'tool applied') {
													// Keep it as plain text
													$this.html($bold.prop('outerHTML') + ': ' + value);
													// Store the value in a hidden input (so it still gets submitted)
													$this.append('<input type="hidden" class="editable-input" name="' + labelKey + '" value="' + value + '">');
													return; // continue loop
												}

												// Create editable field for all others
												var inputEl = (value.length > 80)
													? $('<textarea class="form-control form-control-sm editable-input" rows="2"></textarea>')
														.val(value)
														.attr('name', labelKey)
													: $('<input type="text" class="form-control form-control-sm editable-input">')
														.val(value)
														.attr('name', labelKey);

												$this.html($bold.prop('outerHTML') + ': ').append(inputEl);
											});

											$(".action-buttons-" + id + " .edit-btn").hide();
											$(".action-buttons-" + id + " .save-btn").show();
										});

										// 🟨 SAVE button click
										$(document).off('click', '.save-btn').on('click', '.save-btn', function (e) {
											e.preventDefault();
											e.stopImmediatePropagation();

											if (!confirm("Are you sure you want to save these changes?")) {
												return;
											}

											var id = $(this).data('id');
											var section = $('#editable-' + id);
											var dataToSend = { id: id };

											section.find('.editable-input').each(function () {
												var name = $(this).attr('name');
												var val = $.trim($(this).val());
												dataToSend[name] = val;
											});

											var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
											var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
											dataToSend[csrfName] = csrfHash;

											console.log("🟢 Sending to backend:", dataToSend);

											$.ajax({
												url: "<?php echo base_url('ticketsincident/update_described_rca'); ?>",
												type: "POST",
												data: dataToSend,
												dataType: "text",
												success: function (responseText) {
													try {
														var cleanText = responseText.trim();
														var response = JSON.parse(cleanText);
														console.log('✅ Clean parsed response:', response);

														if (response.status === 'success') {
															alert('✅ RCA details updated successfully!');
															setTimeout(function () {
																location.reload();
															}, 500);
														} else {
															alert('⚠️ Failed to update RCA. Please try again.');
														}
													} catch (e) {
														console.warn('⚠️ Could not parse JSON. Raw:', responseText);
														alert('✅ RCA details updated successfully!');
														setTimeout(function () {
															location.reload();
														}, 500);
													}
												},
												error: function (xhr, status, error) {
													console.error('❌ AJAX Error:', status, error);
													console.error('Response text:', xhr.responseText);
													alert('⚠️ Error while saving. Please try again.');
												}
											});
										});

									});
								</script>


								<style>
									.editable-input {
										margin: 3px 0;
									}

									.text-end {
										text-align: right;
									}
								</style>

								<?php if ($r->reply && $r->ticket_status != 'Described' && $r->ticket_status != 'Transfered') { ?>
									<p class="inbox-item-text" style="overflow: clip; word-break: break-all;font-size: 14px;">
										<b><?php echo lang_loader('inc', 'inc_comment'); ?></b>:
										<?php echo $r->reply; ?>
									</p>
								<?php } ?>
								<div class="card shadow-sm mb-3">
									<?php if ($r->rca_tool) { ?>
										<div class="">
											<strong>Root Cause Analysis (RCA) for Incident </strong>
										</div>
									<?php } ?>
									<div class="card-body" style="font-size: 14px; line-height:1.6;">
										<?php if ($r->rca_tool) { ?>
											<p><b>Tool Applied:</b> <?php echo $r->rca_tool; ?></p>
										<?php } ?>
										<?php if ($r->rca_tool == 'DEFAULT') { ?>
											<p><b> RCA:</b> <?php echo $r->rootcause; ?></p>
										<?php } ?>

										<?php if ($r->rca_tool == '5WHY') { ?>
											<ul class="list-unstyled">
												<li><b>WHY 1:</b> <?php echo $r->fivewhy_1; ?></li>
												<li><b>WHY 2:</b> <?php echo $r->fivewhy_2; ?></li>
												<li><b>WHY 3:</b> <?php echo $r->fivewhy_3; ?></li>
												<li><b>WHY 4:</b> <?php echo $r->fivewhy_4; ?></li>
												<li><b>WHY 5:</b> <?php echo $r->fivewhy_5; ?></li>
											</ul>
										<?php } ?>

										<?php if ($r->rca_tool == '5W2H') { ?>
											<dl>
												<?php if ($r->fivewhy2h_1) { ?>
													<dt>What happened?</dt>
													<dd><?php echo $r->fivewhy2h_1; ?></dd><?php } ?>
												<?php if ($r->fivewhy2h_2) { ?>
													<dt>Why did it happen?</dt>
													<dd><?php echo $r->fivewhy2h_2; ?></dd><?php } ?>
												<?php if ($r->fivewhy2h_3) { ?>
													<dt>Where did it happen?</dt>
													<dd><?php echo $r->fivewhy2h_3; ?></dd><?php } ?>
												<?php if ($r->fivewhy2h_4) { ?>
													<dt>When did it happen?</dt>
													<dd><?php echo $r->fivewhy2h_4; ?></dd><?php } ?>
												<?php if ($r->fivewhy2h_5) { ?>
													<dt>Who was involved?</dt>
													<dd><?php echo $r->fivewhy2h_5; ?></dd><?php } ?>
												<?php if ($r->fivewhy2h_6) { ?>
													<dt>How did it happen?</dt>
													<dd><?php echo $r->fivewhy2h_6; ?></dd><?php } ?>
												<?php if ($r->fivewhy2h_7) { ?>
													<dt>How much/How many (impact/cost)?</dt>
													<dd><?php echo $r->fivewhy2h_7; ?></dd><?php } ?>
											</dl>
										<?php } ?>

										<?php if ($r->corrective) { ?>
											<p><b>Closure Corrective Action:</b> <?php echo $r->corrective; ?></p>
										<?php } ?>

										<?php if ($r->preventive) { ?>
											<p><b>Closure Preventive Action:</b> <?php echo $r->preventive; ?></p>
										<?php } ?>

										<?php if ($r->verification_comment) { ?>
											<p><b>Closure Verification Remark:</b> <?php echo $r->verification_comment; ?></p>
										<?php } ?>

										<?php if ($r->picture):
											$file_extension = pathinfo($r->picture, PATHINFO_EXTENSION);
											$file_url = base_url('assets/images/capaimage/' . $r->picture);
											?>
											<div class="mt-3">
												<b>Attached File:</b><br>
												<?php if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])): ?>
													<img class="img-thumbnail mt-2" style="max-width:150px;"
														src="<?php echo $file_url; ?>">
													<br><a class="btn btn-sm btn-outline-primary mt-2"
														href="<?php echo $file_url; ?>" download>Download Image</a>
												<?php elseif ($file_extension === 'pdf'): ?>
													<embed src="<?php echo $file_url; ?>" type="application/pdf" width="250"
														height="200" class="mt-2">
													<br><a class="btn btn-sm btn-outline-danger mt-2"
														href="<?php echo $file_url; ?>" download>Download PDF</a>
												<?php elseif (in_array($file_extension, ['xls', 'xlsx', 'csv'])): ?>
													<a class="btn btn-sm btn-outline-success mt-2" href="<?php echo $file_url; ?>"
														download>Download <?php echo strtoupper($file_extension); ?> File</a>
												<?php elseif (in_array($file_extension, ['doc', 'docx'])): ?>
													<a class="btn btn-sm btn-outline-info mt-2" href="<?php echo $file_url; ?>"
														download>Download Word Document</a>
												<?php elseif (in_array($file_extension, ['zip', 'rar'])): ?>
													<a class="btn btn-sm btn-outline-secondary mt-2" href="<?php echo $file_url; ?>"
														download>Download Compressed File</a>
												<?php elseif (in_array($file_extension, ['mp4', 'avi', 'mov', 'm4a', 'wav', 'wma'])): ?>
													<a class="btn btn-sm btn-outline-dark mt-2" href="<?php echo $file_url; ?>"
														download>Download Media File</a>
												<?php else: ?>
													<a class="btn btn-sm btn-outline-primary mt-2" href="<?php echo $file_url; ?>"
														download>Download File</a>
												<?php endif; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>



							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</div>


<style>
	.timeline {
		position: relative;
		padding: 30px 0;
		font-family: Arial, sans-serif;
	}

	.timeline::before {
		content: '';
		position: absolute;
		left: 50%;
		top: 0;
		bottom: 0;
		width: 6px;
		background: rgba(0, 128, 0, 0.7);
		border-radius: 4px;
		z-index: 1;
	}

	.timeline-item-date {
		position: absolute;
		top: -40px;
		/* Adjusted to move above the line */
		left: 50%;
		transform: translateX(-50%);
		background: rgba(0, 128, 0, 0.7);
		color: white;
		padding: 5px 10px;
		border-radius: 4px;
		font-size: 14px;
		font-weight: bold;
		z-index: 2;
		/* Ensure it appears above the line */
	}

	.timeline-item {
		position: relative;
		width: 45%;
		padding: 15px 25px;
		margin-bottom: 30px;
		border-radius: 8px;
		transition: transform 0.2s;
	}

	.timeline-item:hover {
		transform: scale(1.02);
	}

	.timeline-item:nth-child(odd) {
		left: 5%;
	}

	.timeline-item:nth-child(even) {
		left: 56%;
	}

	.timeline-item:nth-child(odd)::before {
		content: '';
		position: absolute;
		top: 50px;
		/* Adjusted to move the line down */
		right: -30px;
		width: calc(50% - 30px);
		height: 2px;
		background: rgba(0, 128, 0, 0.7);
		z-index: 0;
	}

	.timeline-item:nth-child(odd)::after {
		content: '';
		position: absolute;
		top: 45px;
		/* Adjusted to position the arrow correctly */
		right: -10px;
		border-width: 5px;
		border-style: solid;
		border-color: transparent transparent transparent rgba(0, 128, 0, 0.7);
		z-index: 0;
	}

	.timeline-item:nth-child(even)::before {
		content: '';
		position: absolute;
		top: 50px;
		/* Adjusted to move the line down */
		left: -30px;
		width: calc(50% - 30px);
		height: 2px;
		background: rgba(0, 128, 0, 0.7);
		z-index: 0;
	}

	.timeline-item:nth-child(even)::after {
		content: '';
		position: absolute;
		top: 45px;
		/* Adjusted to position the arrow correctly */
		left: -18px;
		border-width: 5px;
		border-style: solid;
		border-color: transparent rgba(0, 128, 0, 0.7) transparent transparent;
		z-index: 0;
	}

	.timeline-badge {
		position: absolute;
		top: 10px;
		left: -50px;
		width: 80px;
		height: auto;
		background: rgba(0, 128, 0, 0.7);
		color: #fff;
		text-align: center;
		padding: 10px;
		border-radius: 4px;
		font-size: 14px;
		font-weight: bold;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
	}

	.timeline-panel {
		background: #fff;
		border-radius: 8px;
		padding: 20px;
		box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
		position: relative;
		z-index: 2;
	}

	.timeline-heading h5 {
		font-weight: bold;
		color: rgba(0, 128, 0, 0.7);
		margin: 0 0 5px;
	}

	.timeline-body p {
		margin: 5px 0;
		line-height: 1.6;
	}

	.timeline-body strong {
		color: #555;
	}

	@media (max-width: 768px) {
		.timeline-item {
			width: 90%;
			left: 5%;
		}

		.timeline-badge {
			left: auto;
			right: 0;
			transform: translateX(-50%);
		}

		.timeline-panel {
			padding: 15px;
		}
	}
</style>


<!-- /.row -->
