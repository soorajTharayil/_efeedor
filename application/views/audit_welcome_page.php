<!--Code updates: 
Worked on UI allignment, fixed all the issues.
Last updated on 05-03-23 -->

<?php //echo lang_loader('ip','ip_allfeedbacks_dashboard'); exit; 
require_once 'audit_tables.php';
?>

<!-- content -->
<div class="content">


	<!-- Download Buttons-->

	<!-- <span class="download_option" style="display: none; position:relative;" id="showdownload"> -->
	<div class="row" style="position: relative;display: none;" id="showdownload">
		<div class="p-l-30 p-r-30" style="float:right;margin-bottom: 20px;">
			<a data-toggle="tooltip" title="<?php echo lang_loader('ip', 'ip_download_department_report_tooltip'); ?>" target="_blank" href="<?php echo $ip_download_department_excel; ?>" style="float:right;margin:0px 0px;"><img src="<?php echo base_url(); ?>assets/icon/department.png" style="float: right;
			   width: 32px;
			   cursor: pointer;"></a>
			<a data-toggle="tooltip" title="<?php echo lang_loader('ip', 'ip_download_discharge_report_tooltip'); ?>" target="_blank" href="<?php echo $ip_download_patient_excel; ?>" style="float:right;margin:0px 10px;"><img src="<?php echo base_url(); ?>assets/icon/hospital.png" style="float: right;
			   width: 32px;
			   cursor: pointer;"></a>
			<a data-toggle="tooltip" title="<?php echo lang_loader('ip', 'ip_download_discharge_overall_report_tooltip'); ?>" target="_blank" href="<?php echo $ip_download_overall_excel; ?>" style="float:right;margin:0px 10px;"><img src="<?php echo base_url(); ?>assets/icon/download.png" style="float: right;
			   width: 32px;
			   cursor: pointer;"></a>
			<a data-toggle="tooltip" title="<?php echo lang_loader('ip', 'ip_download_discharge_overall_report_pdf_tooltip'); ?>" target="_blank" href="<?php echo $ip_download_overall_pdf; ?>" style="float:right;margin:0px 10px;"><img src="<?php echo base_url(); ?>assets/icon/pdfdownload.png" style="float: right;
			   width: 32px;
			   color: 	#62c52d;
			   cursor: pointer;"></a>

			<span style="float:right;margin:5px 10px;">
				<h4><strong><?php echo lang_loader('ip', 'ip_downloads'); ?></strong></h4>
			</span>

		</div>
		<br>
	</div>

	<!-- Close Download Buttons-->

	<!-- Metric Boxes-->
	<div class="row">
		<div class="col-12">
			<div class="heading">
				<h2 style="font-size: 22px; font-weight: bold;margin-left:25px;">MRD & MDC</h2>
			</div>
		</div>
		

		<?php if (isfeature_active('AUDIT-FORM1') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_active_cases_mrdip';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Active Cases MRD Audit-IP <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<!-- <i class="fa fa-file-text"></i> -->
							</div>
							<a href="<?php echo $feedbacks_report_active_cases_mrd; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM2') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_dischargedpatients_mrd_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Discharged Patients MRD Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<!-- <i class="fa fa-sign-out"></i> -->
							</div>
							<a href="<?php echo $feedbacks_report_discharged_patients_mrd; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM3') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_nursingip_closed_cases';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Nursing (IP Closed Cases) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<!-- <i class="fa fa-lock"></i> -->
							</div>
							<a href="<?php echo $feedbacks_report_nursing_ip_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM4') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_nursingip_open_cases';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Nursing (IP Open Cases) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_nursing_ip_open; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM5') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_nursingop_closed_cases';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Nursing (OP Closed Cases) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_nursing_op_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM6') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_active_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinical Dietetics (Active) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_active_mdc; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM7') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_closedcases_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinical Dietetics (Closed Cases) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_closed_mdc; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM8') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pharmacy_closed';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinical Pharmacy-(Closed) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pharmacy_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM9') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pharmacy_op';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinical Pharmacy-(OP) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pharmacy_op; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM10') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pharmacy_open';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinical Pharmacy-(Open) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pharmacy_open; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM11') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_anesthesia_active_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-Anesthesia(Active) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_anesthesia_active; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM12') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_anesthesia_closed_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-Anesthesia(Closed) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_anesthesia_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM13') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_ed_active_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-ED (Active) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_ed_active; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM14') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_ed_closed_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-ED (Closed) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_ed_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM15') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_icu_active_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-ICU (Active) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_icu_active; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM16') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_icu_closed_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-ICU (Closed) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_icu_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>


		<?php if (isfeature_active('AUDIT-FORM17') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_primarycare_active_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-Primary Care Provider (Active) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_primarycare_active; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM18') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_primarycare_closed_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-Primary Care Provider (Closed) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_primarycare_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM19') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_sedation_active_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-Sedation (Active) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_sedation_active; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM20') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_sedation_closed_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-Sedation (Closed) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_sedation_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM21') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_surgeons_active_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-Surgeons (Active) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_surgeons_active; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>


		<?php if (isfeature_active('AUDIT-FORM22') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_surgeons_closed_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Clinicians-Surgeons (Closed) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_surgeons_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM23') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_dietconsultation_op_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Diet Consultation (OP) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_diet_consultation_op; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM24') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_physiotherapy_closed_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Physiotherapy- (Closed) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_physiotherapy_closed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM25') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_physiotherapy_op_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Physiotherapy- (OP) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_physiotherapy_op; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM26') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_physiotherapy_open_mdc';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Physiotherapy- (Open) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_physiotherapy_open; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM27') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_mrd_ed_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">MRD Audit- ED <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_mrd_ed; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM28') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_mrd_lama_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">MRD Audit- LAMA <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_mrd_lama; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM29') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_mrd_op_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count2); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">MRD Audit- OP <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-file-medical fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_mrd_op; ?>" style="float: right;  font-size:15px;  margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		
	</div>

	<div class="row">

		<div class="col-12">
			<div class="heading">
				<h2 style="margin-top: 20px; font-size: 22px; font-weight: bold;margin-left:25px;">Nursing & IPSG</h2>
			</div>
		</div>

		<?php if (isfeature_active('AUDIT-FORM30') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_accidental_delining_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Accidental Delining Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-triangle-exclamation fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_accidental_delining; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM31') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_admission_area_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Admission Holding Area Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-bed-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_admission_holding_area; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM32') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_cardio_pulmonary_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">CPR Analysis Record <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_cardio_pulmonary; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM33') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_extravasation_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Extravasation Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_extravasation_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM34') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_hapu_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Hospital Acquired Pressure Ulcers (HAPU) Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_hapu_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM35') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_assessment_ae';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Initial Assessment Accident and Emergency (A&E) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_initial_assessment_ae; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM36') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_assessment_ipd';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Initial Assessment IPD <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_initial_assessment_ipd; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM37') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_assessment_opd';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Initial Assessment OPD <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_initial_assessment_opd; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM38') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_ipsg1_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">IPSG-1 <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_ipsg1; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM39') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_ipsg2_ae';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">IPSG2- A&E <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_ipsg2_ae; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM40') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_ipsg2_ipd';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">IPSG2- IPD <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_ipsg2_ipd; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM41') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_ipsg4_timeout';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">IPSG4-Timeout- Outside OT Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_ipsg4_timeout; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>


		<?php if (isfeature_active('AUDIT-FORM42') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_ipsg6_ip';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">IPSG6- IP <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_ipsg6_ip; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM43') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_ipsg6_opd';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">IPSG6- OPD <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_ipsg6_opd; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if (isfeature_active('AUDIT-FORM44') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_point_prevlance_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Point Prevalence Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_point_prevelance; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		


	</div>
             <div class="row">

		<div class="col-12">
			<div class="heading">
				<h2 style="margin-top: 20px; font-size: 22px; font-weight: bold;margin-left:25px;">Clinical Outcome</h2>
			</div>
		</div>
		<?php if (isfeature_active('AUDIT-FORM45') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_audit_acl';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">ACL <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_audit_acl; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM46') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_allogenic_bone_marrow';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Allogenic Bone Marrow Transplantation <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_allogenic_bone_marrow; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM47') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_aortic_value_replacement';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Aortic Valve Replacement (AVR) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_aortic_value_replacement; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM48') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_autologous_bone';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Autologous Bone Marrow Transplantation <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_autologous_bone; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM49') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_brain_tumour';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Brain Tumour Surgery <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_brain_tumour; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM50') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_cabg';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">CABG <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_cabg; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM51') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_carotid_stenting';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Carotid Stenting <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_carotid_stenting; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM52') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_chemotherapy';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Chemotherapy (Medical Oncology) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_chemotherapy; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM53') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_colo_rectal';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Colo-Rectal Surgeries <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_colo_rectal; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM54') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_endoscopy';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Endoscopy <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_endoscopy; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM55') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_epilepsy';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Epilepsy <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_epilepsy; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM56') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_herniorrhaphy';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Herniorrhaphy <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_herniorrhaphy; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM57') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_holep';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">HoLEP <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_holep; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM58') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_laparoscopic_appendicectomy';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Laparoscopic Appendicectomy <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_laparoscopic; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM59') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_mechanical_thrombectomy';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Mechanical Thrombectomy <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_mechanical_thrombectomy; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM60') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_mvr';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">MVR (Mitral Valve Replacement) <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_mvr; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM61') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_ptca';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">PTCA <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_ptca; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM62') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_renal_transplantation';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Renal Transplantation <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_renal_transplantation; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM63') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_scoliosis_correction';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Scoliosis Correction Surgery <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_scoliosis_correction; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM64') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_spinal_dysraphism';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Spinal Dysraphism <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_spinal_dysraphism; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM65') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_spine_disc_surgery';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Spine & Disc Surgery-Fusion Procedures <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_spine_disc_surgery; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM66') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_thoracotomy';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Thoracotomy <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_thoracotomy; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM67') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_tkr';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">TKR <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_tkr; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM68') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_uro_oncology';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Uro-oncology Procedures <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_uro_oncology; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM69') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_whipples_surgery';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Whipples Surgery <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_whipples_surgery; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM70') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_laparoscopic_cholecystectomy';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Laparoscopic Cholecystectomy <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_laparoscopic_cholecystectomy; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
			<div class="heading">
				<h2 style="margin-top: 20px; font-size: 22px; font-weight: bold;margin-left:25px;">Clinical KPI</h2>
			</div>
		</div>
		<?php if (isfeature_active('AUDIT-FORM71') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicalkpi_bronchodilators_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Bronchodilators Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinicalkpi_bronchodilators; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM72') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinicalkpi_copd_protocol_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">COPD Protocol Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinicalkpi_copd_protocol; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="col-12">
			<div class="heading">
				<h2 style="margin-top: 20px; font-size: 22px; font-weight: bold;margin-left:25px;">Infection Control & PCI</h2>
			</div>
		</div>
		<?php if (isfeature_active('AUDIT-FORM73') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_biomedical_waste';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Biomedical Waste Management Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_biomedical_waste; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM74') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_canteen_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Canteen Audit checklist <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_canteen_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM75') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_cssd_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">CSSD audit checklist <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_cssd_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM76') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_hand_hygiene';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Hand Hygiene Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_hand_hygiene; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM77') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_bundle_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Infection control bundle audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_bundle_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM78') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_ot_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Infection Control OT audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_ot_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM79') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_linen_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Linen Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_linen_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM80') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_ambulance_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Ambulance PCI Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_ambulance_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM81') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_coffee_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">CoffeeShop PCI Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_coffee_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM82') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_laboratory_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Laboratory PCI Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_laboratory_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM83') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_mortuary_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Mortuary PCI Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_mortuary_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM84') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_radiology_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Radiology PCI Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_radiology_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM85') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_ssi_survelliance_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">SSI Surveillance checklist <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_ssi_survelliance_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM86') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_peripheralivline_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">IV cannula audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_peripheralivline_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM87') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_personalprotective_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Personal Protective Equipment Usage audit  <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_personalprotective_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM88') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_safe_injection_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Safe Injection and Infusion Audit <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_safe_injection_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM89') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_infection_control_surface_cleaning_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Surface cleaning and disinfection effectiveness monitoring record <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_infection_control_surface_cleaning_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
			</div>
		  <?php } ?>
		<div class="col-12">
			<div class="heading">
				<h2 style="margin-top: 20px; font-size: 22px; font-weight: bold;margin-left:25px;">Clinical Pathways</h2>
			</div>
		</div>
		 <?php if (isfeature_active('AUDIT-FORM90') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_arthroscopic_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Arthroscopic ACL Reconstruction Surgery <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_arthroscopic_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM91') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_breast_lump_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Breast Lump Consensus Guidelines <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_breast_lump_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM92') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_cardiac_arrest_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Cardiac Arrest <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_cardiac_arrest_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM93') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_donor_hepatectomy_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Donor Hepatectomy <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_donor_hepatectomy_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM94') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_febrile_seizure_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Febrile Seizure <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_febrile_seizure_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM95') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_heart_transplant_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Heart Transplant Recipient <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_heart_transplant_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM96') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_laproscopic_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Laparoscopic Donor Nephrectomy <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_laproscopic_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM97') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_picc_line_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">PICC LINE Insertion <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_picc_line_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM98') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_stroke_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Stroke <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_stroke_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM99') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_urodynamics_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">Urodynamics <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_urodynamics_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if (isfeature_active('AUDIT-FORM100') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_stemi_audit';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px;">
				<div class="panel panel-bd">
					<div class="panel-body" style="height: 100px;">
						<div class="statistic-box">
							<h2 style="font-size: 25px;"><span class="count-number">
									<?php echo count($ip_feedbacks_count3); ?>
								</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
									</i></span></h2>
							<div class="small" style="font-size: 18px;">STEMI-Primary PCI Clinical Pathway  <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></i></a></div>
							<div class="icon large-screen-only">
								<i class="fa-solid fa-heart-pulse fa-4x"></i>
							</div>
							<a href="<?php echo $feedbacks_report_clinical_pathway_stemi_audit; ?>" style="float: right; font-size:15px;   margin-top: -9px;">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php } ?>

	<!-- Close Metric Boxes-->
	<?php



	?>




	<!-- Close Why choose the hospital and patient comments -->


	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="<?php echo base_url(); ?>assets/efeedor_chart.js"></script>
</div>

<style>
	.icon .fa {
		font-size: 55px;
	}

	.chart-container {
		justify-content: center;
		/* Align the chart horizontally in the center */
		align-items: center;
		/* Align the chart vertically in the center */
		width: 460px !important;
		margin: 0px auto;
		height: 450px;
		width: 200px;
	}

	.coment-cloud {
		display: flex;
		justify-content: center;
		align-items: center;
		overflow: auto;
		/* width: 100%;
			height: 50%; */
		margin-bottom: 5px;
		margin-top: 5px;
	}


	.progress {
		margin-bottom: 10px;
	}

	.mybarlength {
		text-align: right;
		margin-right: 18px;
		font-weight: bold;
	}

	.panel-body {
		height: 531px;
	}

	.bar_chart {
		justify-content: center;
		/* Align the chart horizontally in the center */
		align-items: center;
		/* Align the chart vertically in the center */
		/* width: 460px !important; */
		margin: 0px auto;
		height: 500px;
		width: 1024px;
	}


	.line_chart {
		justify-content: center;
		/* Align the chart horizontally in the center */
		align-items: center;
		/* Align the chart vertically in the center */
		/* width: 460px !important; */
		margin: 0px auto;
		height: 270px;
		width: 200px;
	}

	.dropdown-menu>li>a {
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
		width: 100%;
		display: block;
		/* Ensure the anchor element takes up full width */
	}


	.dropdown-menu>.li {
		width: 100%;
		border: 0px;
		border-bottom: 1px solid #ccc;
		text-align: left;
	}

	@media screen and (max-width: 1024px) {
		#pie_donut {
			overflow-x: scroll;
		}

		#bar {
			overflow-x: scroll;
		}

		#word {
			overflow-x: scroll;
		}

		#line {
			overflow-x: scroll;
			overflow-y: scroll;
		}
	}

	/* Default: hide the icon */
	.icon.large-screen-only {
		display: none;
	}

	/* Show the icon only on large screens */
	@media (min-width: 992px) {
		.icon.large-screen-only {
			display: block;
		}
	}
</style>