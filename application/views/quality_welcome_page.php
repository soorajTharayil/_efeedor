<!--Code updates: 
Worked on UI allignment, fixed all the issues.
Last updated on 05-03-23 -->

<?php //echo lang_loader('ip','ip_allfeedbacks_dashboard'); exit; 
require_once 'quality_tables.php';
?>

<!-- content -->
<div class="content">
	<!-- alert message -->
	<!-- content -->
	<!-- PHP Code {-->

	<!-- } PHP Code -->


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

	<!-- </span> -->

	<!-- Close Download Buttons-->
	<!-- Metric Boxes-->
	<div class="row">
		<!-- <div class="heading">
				<h2 style="margin-top: 20px; font-size: 22px; font-weight: bold; text-align: center;">Mandatory Indicators</h2>
		</div> -->
		<?php if (isfeature_active('QUALITY-KPI1') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_feedback_CQI3a1';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
				<div class="panel panel-bd">

					<div class="panel-body" style="height: 100px; padding-top:0px;">
						<div class="statistic-box" style="padding-top: 44px;">

							<div class="small" style="font-size: 20px;">
								Average Time for initial assessment of in-patients (Doctors) in MRD(ICU)
								<a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
									<i class="fa fa-info-circle" aria-hidden="true"></i>
								</a>
							</div>
							<!--<div class="icon large-screen-only">-->
							<!--	<i class="fa fa-clock-o" style="font-size: 80px;"></i>-->
							<!--</div>-->
							<a href="<?php echo $feedbacks_report_CQI3a1; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
						</div>
					</div>
				</div>
			</div>

		<?php } ?>
	    <?php if (isfeature_active('QUALITY-KPI2') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_feedback_CQI3a2';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
				<div class="panel panel-bd">

					<div class="panel-body" style="height: 100px; padding-top:0px;">
						<div class="statistic-box" style="padding-top: 44px;">

							<div class="small" style="font-size: 20px;">
								Average Time for initial assessment of in-patients (Doctors)- (MRI WARD)
								<a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
									<i class="fa fa-info-circle" aria-hidden="true"></i>
								</a>
							</div>
							<!--<div class="icon large-screen-only">-->
							<!--	<i class="fa fa-clock-o" style="font-size: 80px;"></i>-->
							<!--</div>-->
							<a href="<?php echo $feedbacks_report_CQI3a2; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	    <?php if (isfeature_active('QUALITY-KPI3') === true) { ?>
			<?php
			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
			$table_feedback_1PSQ3a = 'bf_feedback_CQI3a3';
			$table_patients_1PSQ3a = 'bf_patients';
			$desc_1PSQ3a = 'desc';
			$sorttime = 'asc';
			$setup = 'setup';
			$ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
			?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
				<div class="panel panel-bd">

					<div class="panel-body" style="height: 100px; padding-top:0px;">
						<div class="statistic-box" style="padding-top: 44px;">

							<div class="small" style="font-size: 20px;">
								Average Time for initial assessment of emergency patients (Doctors)-(Emergency Department)
								<a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
									<i class="fa fa-info-circle" aria-hidden="true"></i>
								</a>
							</div>
							<!--<div class="icon large-screen-only">-->
							<!--	<i class="fa fa-clock-o" style="font-size: 80px;"></i>-->
							<!--</div>-->
							<a href="<?php echo $feedbacks_report_CQI3a3; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
        
        <?php if (isfeature_active('QUALITY-KPI4') === true) { ?>
        <?php
        $table_feedback_1PSQ3a = 'bf_feedback_CQI3a4';
        $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
            <div class="panel panel-bd">
                <div class="panel-body" style="height: 100px; padding-top:0px;">
                    <div class="statistic-box" style="padding-top: 44px;">
                        <div class="small" style="font-size: 20px;">
                            Percentage of Care-plan is documented for inpatients(MRD)
                            <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                        <a href="<?php echo $feedbacks_report_CQI3a4; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <?php if (isfeature_active('QUALITY-KPI5') === true) { ?>
        <?php
        $table_feedback_1PSQ3a = 'bf_feedback_CQI3a5';
        $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
            <div class="panel panel-bd">
                <div class="panel-body" style="height: 100px; padding-top:0px;">
                    <div class="statistic-box" style="padding-top: 44px;">
                        <div class="small" style="font-size: 20px;">
                            Percentage of Nutritional assessment is documented for inpatients (Clinical Nutrition and Dietetics)
                            <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                        <a href="<?php echo $feedbacks_report_CQI3a5; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if (isfeature_active('QUALITY-KPI6') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a6';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of Nursing care is documented for inpatients (MRD - Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a6; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI7') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a7';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Average Time for initial assessment of Emergency patients (Nurses) - (Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a7; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI8') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a8';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Average Time for initial assessment of in-patients (Nurses) - (Nursing-ICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a8; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI9') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a9';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Average Time for initial assessment of in-patients (Nurses) - (Nursing-Ward)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a9; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI10') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a10';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of Blood culture contamination rate (Lab Service)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a10; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI11') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a11';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of Beta-blocker prescriptions with a diagnosis of CHF with reduced EF (Cardiology - Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a11; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI12') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a12';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of Hospitalized patients with hypoglycemia who achieved targeted blood glucose level (Endocrinology and Diabetes - Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a12; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI13') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a13';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of Spontaneous perineal Tear Rate
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a13; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI14') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a14';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of sepsis patients who receive care as per the HOUR-1 sepsis bundle (Critical Care Medicine - Medical records)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a14; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI15') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a15';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of COPD patients receiving COPD Action plan at the time of discharge (Pulmonary Medicine)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a15; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI16') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a16';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of bronchiolitis patients treated inappropriately (Pediatrics)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a16; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI17') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a17';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of oncology patients who had treatment initiated following multidisciplinary meeting (Tumour board) - (Oncology - Gastro surgery)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a17; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI18') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a18';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of Intravenous Contrast Media Extravasation (Radiology)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a18; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI19') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a19';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Average Time taken for triage (Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a19; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI20') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a20';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of patients undergoing dialysis who are able to achieve target hemoglobin levels (Nephrology)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a20; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI21') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a21';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of Compliance rate of timeliness of physician responding to the reported critical results (JCI8-IPSG 2.0) - (Medical Administration)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a21; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI22') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a22';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of compliance to Holding area care (ACC2-JCI8) - (Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3a22; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI23') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b1';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Number of reporting errors per 1000 investigations (Lab) - (Lab Services)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI24') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b2';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Rate of redo in 1000 tests (Lab) - (Lab Services)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI25') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b3';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of reports correlating to clinical diagnosis (Lab) - (Lab Services)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI26') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b4';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of employees in diagnostics adhering to safety precautions (Lab) - (Lab Services)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI27') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b5';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Rate of redo in 1000 tests (Radiology)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI28') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b6';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Number of reporting errors per 1000 investigations (Radiology)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI29') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b7';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of reports correlating to clinical diagnosis (Radiology)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI30') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b8';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of employees in diagnostics adhering to safety precautions (Radiology)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI31') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b9';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of employees in diagnostics adhering to safety precautions (Radiology) - (OT)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI32') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b10';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of employees in diagnostics adhering to safety precautions (Radiology) - (Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b10; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI33') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b11';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Number of reporting errors before dispatch (Lab)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b11; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI34') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b12';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Waiting time for Laboratory services
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b12; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI35') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3b13';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Patient safety events or errors related to pathology samples, such as biopsy or other tissue specimens (JCI8-QPS 3.04) - (Lab Services)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3b13; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI36') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c1';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Medication errors Rate (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI37') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c2';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Incidence of medication errors - Prescription errors (IP) (As per NABH 4th edition) - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI38') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c3';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Incidence of medication errors - Dispensing errors (IP) (As per NABH 4th edition) - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI39') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c4';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of admissions with ADR - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI40') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c5';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of medication charts with error prone abbreviations (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI41') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c6';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of patients receiving high risk medication developing adverse drug event (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI42') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c7';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Incidence of Medication Administering errors (As per NABH 4th edition) - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI43') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c8';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of in-patients developing adverse drug reaction (PSQ3a) - (Clinical Pharmacy) for this month
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI44') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c9';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Incidence of Medication Administering errors - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI45') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c10';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Incidence of medication errors - Dispensing errors (IP) - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c10; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI46') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c11';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Incidence of medication errors - Prescription errors (IP) - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c11; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI47') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c12';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Empirical Antibiotics therapy compliance rate for high risk infections (JCI8-MMU1.1) - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c12; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI48') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c13';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Restricted antibiotics usage compliance rate (JCI8-MMU1.1) - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c13; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI49') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3c14';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Monitor data related to appropriateness of indication for the new drugs (JCI8-MMU2.0) - (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3c14; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI50') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3d1';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of modification of anaesthesia plan (OT - Anaesthesia)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3d1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI51') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3d2';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of unplanned ventilation following anaesthesia (OT - Anaesthesia)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3d2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI52') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3d3';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of adverse anaesthesia events following anaesthesia (OT - Anaesthesia)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3d3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI53') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3d4';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Anaesthesia related mortality rate (OT - Anaesthesia)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3d4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI54') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3d5';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of safe and rational prescriptions (Clinical Pharmacy - IP - Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3d5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI55') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3e1';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of unplanned return to OT
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3e1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI56') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3e2';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of rescheduling of surgeries (OT)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3e2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI57') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3e3';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of cases where organisation's procedure to prevent surgery errors (wrong site, wrong procedure, wrong patient) have been adhered (OT)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3e3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI58') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3e4';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of cases receiving appropriate prophylactic antibiotics within specified time frame (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3e4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI59') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3e5';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of cases where the planned surgery were changed intraoperatively (OT)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3e5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI60') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3e6';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Re-exploration rate (OT)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3e6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI61') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3e7';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Primary Cesarean Rate (Nursing - OBG)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3e7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI62') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3e8';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Adverse events related to implant devices (JCI8-ASC 4.4) - (OT)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3e8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI63') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3e9';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        All major patient safety events or errors related to surgical procedures (JCI8-QPS 3.04)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3e9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI64') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f1';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of transfusion reactions (PSQ3a) - (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI65') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f2';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of waste of blood and blood components among those issued (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI66') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f3';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of waste of blood and blood components among those stored (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI67') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f4';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Percentage of number of blood component units used (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI68') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f5';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Turn-around time for blood and blood components cross matched / reserved (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI69') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f6';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Adverse events and near miss events involving blood bank and/or transfusion services (JCI8-AOP 4.00) - (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI70') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f7';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Blood availability rate (JCI8-AOP 4.00) - (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI71') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f8';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        CT Ratio (cross match to transfusion) (JCI8-AOP 4.00) - (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI72') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f9';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Turnaround time for Platelet Apheresis (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI73') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3f10';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Turnaround time for blood donation (Blood Center)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3f10; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI74') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3g1';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Catheter associated urinary tract infection rate (PSQ 3b) - (Infection Control - Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3g1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI75') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3g2';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3g2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI76') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3g3';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3g3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI77') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3g4';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Surgical site infection rate (Infection Control - Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3g4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI78') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3g5';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Late Onset Sepsis Rate After 72 Hours (Nursing - NICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3g5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI79') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3g6';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Environmental cleaning & disinfection compliance rate (JCI8-PCI 4.0) - (House Keeping)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3g6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI80') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h1';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Mortality rate (MRD)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI81') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h2';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Return to ICU within 48 hours (Nursing - ICU1)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI82') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h3';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Return to ICU 2 within 48 hours (Nursing - ICU2)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI83') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h4';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Return to ICU 3 within 48 hours (Nursing - CICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI84') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h5';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Return to the emergency department after 72 hours with similar presenting complaints - (Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI85') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h6';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Reintubation rate - (Nursing - ICU1)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI86') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h7';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Reintubation rate - (Nursing - ICU2)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI86') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h7';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Reintubation rate - (Nursing - ICU2)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI87') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h8';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Reintubation rate - (Nursing - CICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI88') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3h9';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Re Admission Rate (Nursing - NICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3h9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI89') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j1';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Shift change handover communication (Nurses)(ED, ICU, Ward) - (Nursing - Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI90') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j2';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Shift change handover communication (Nurses)(ED, ICU, Ward) - (Nursing - ICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI91') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j3';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Shift change handover communication (Nurses)(ED, ICU, Ward) - (Nursing - Ward)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI92') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j4';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Incidence of patient identification error (Quality Office)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI93') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j5';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Number of missed hand hygiene opportunities (Infection Control - Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI94') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j6';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Compliance rate to medication prescription in capitals (Clinical Pharmacy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI95') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j7';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Shift change handover communication (Doctors) (MRD - Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI96') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j8';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Shift change handover communication (Doctors) - (MRD - ICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI97') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j9';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Compliance to patient identification - IPD (Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI98') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j10';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Compliance rate of timeliness of reporting Critical results in Radiology (within 30 min) - (Radiology)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j10; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI99') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j11';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication interdepartmental shift (MRD - Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j11; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI100') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j12';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication interdepartmental shift - (MRD - ICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j12; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI101') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j13';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses) - (Nursing - Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j13; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI102') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j14';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses) - (Nursing - ICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j14; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI103') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j15';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses) - (Nursing - Ward)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j15; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI104') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j16';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication among doctors (During shift change) - (MRD - Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j16; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI105') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j17';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication among doctors (During shift change) - (MRD - ICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j17; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI106') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j18';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication among nurses (During shift change) - (Nursing - Emergency Department)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j18; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI107') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j19';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication among nurses (During shift change) - (Nursing - ICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j19; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI108') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j20';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 2.2 - Hand off communication among nurses During shift change) - (Nursing - Ward)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j20; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI109') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j21';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 4 - Ensure correct site, correct procedure, correct patient surgery-(Quality Office - Endoscopy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j21; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI110') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j22';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 4 - Ensure correct site, correct procedure, correct patient surgery-(Quality Office - ICU)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j22; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI111') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j23';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 4 - Ensure correct site, correct procedure, correct patient surgery-(Quality Office - OT)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j23; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI112') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j24';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        PSG 6 - Compliance to Fall prevention measures in IPD-(Nursing - IPD)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j24; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI113') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j25';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        PSG 6 - Compliance to Fall prevention measures in OPD-(Nursing - OPD)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j25; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI114') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j26';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 6 - Compliance to Fall prevention measures in Physiotherapy OP patients-(Physical therapy and Rehabilitation Department - Physiotherapy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j26; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI115') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j27';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Compliance to hand hygiene practice (New)-(Infection Control - Nursing)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j27; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI116') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j28';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Compliance to patient identification OPD-(Nursing-OPD)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j28; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI117') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j29';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Shift change handover communication(Doctors - ward)-(Medical Administration)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j29; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI118') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j30';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Incidence of Adverse events in Physiotherapy (IPD)-(Physical therapy and Rehabilitation Department - Physiotherapy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j30; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (isfeature_active('QUALITY-KPI119') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j31';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Incidence of Adverse events in Physiotherapy (OPD)-(Physical therapy and Rehabilitation Department - Physiotherapy)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j31; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI120') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j32';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        IPSG 4 - Ensure correct site, correct procedure, correct patient surgery-(Quality Office - OT)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j32; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI121') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j33';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Security incidents rate (JCI8-FMS 4.0)-(Safety & Security)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j33; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isfeature_active('QUALITY-KPI122') === true) { ?>
    <?php
    $table_feedback_1PSQ3a = 'bf_feedback_CQI3j34';
    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="margin-top: 15px;">
        <div class="panel panel-bd">
            <div class="panel-body" style="height: 100px; padding-top:0px;">
                <div class="statistic-box" style="padding-top: 44px;">
                    <div class="small" style="font-size: 20px;">
                        Safety incidents rate (JCI8-FMS 3.0)
                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <a href="<?php echo $feedbacks_report_CQI3j34; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 1px">Explore</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


















	</div>


</div>
<!-- Close Metric Boxes-->
<?php



?>




<!-- Close Why choose the hospital and patient comments -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?php echo base_url(); ?>assets/efeedor_chart.js"></script>
</div>

<style>
	.icon .fa {
		font-size: 60px;
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