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

    <!--Search box-->
    <input type="text" id="searchAudit" placeholder="🔍 Search audits" style="width:49%; margin:5px auto;margin-right:0px; display:block; padding:8px 10px; border:1px solid #ccc; border-radius:4px; font-size:16px;">


    <!-- Close Download Buttons-->

    <!-- Metric Boxes-->
    <div class="row">
        <div class="col-12 heading-block">
            <div class="heading">
                <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 7px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">MRD & MDC</h2>
            </div>
        </div>


        <?php if (isfeature_active('AUDIT-FORM1') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_active_cases_mrdip';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top: 10px; cursor: pointer;" onclick="window.location.href='<?php echo $feedbacks_report_active_cases_mrd; ?>'" data-title="<?php echo strtolower('Active Cases MRD Audit-IP'); ?>">

                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight">
                                    <i class="fa fa-play fa-rotate-270 text-warning"></i>
                                </span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Active Cases MRD Audit-IP
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only">
                                <!-- optional icon -->
                            </div>
                            <a href="<?php echo $feedbacks_report_active_cases_mrd; ?>"
                                style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>



        <?php if (isfeature_active('AUDIT-FORM2') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_dischargedpatients_mrd_audit';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_discharged_patients_mrd; ?>'"
                data-title="<?php echo strtolower('Discharged Patients MRD Audit'); ?>">

                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight">
                                    <i class="fa fa-play fa-rotate-270 text-warning"></i>
                                </span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Discharged Patients MRD Audit
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only">
                                <!-- optional icon -->
                            </div>
                            <a href="<?php echo $feedbacks_report_discharged_patients_mrd; ?>"
                                style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>




        <?php if (isfeature_active('AUDIT-FORM3') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_nursingip_closed_cases';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_nursing_ip_closed; ?>'"
                data-title="<?php echo strtolower('Nursing (IP Closed Cases)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Nursing (IP Closed Cases)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"></div>
                            <a href="<?php echo $feedbacks_report_nursing_ip_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM4') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_nursingip_open_cases';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_nursing_ip_open; ?>'"
                data-title="<?php echo strtolower('Nursing (IP Open Cases)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Nursing (IP Open Cases)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_nursing_ip_open; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM5') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_nursingop_closed_cases';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_nursing_op_closed; ?>'"
                data-title="<?php echo strtolower('Nursing (OP Closed Cases)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Nursing (OP Closed Cases)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_nursing_op_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM6') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_clinical_active_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_active_mdc; ?>'"
                data-title="<?php echo strtolower('Clinical Dietetics (Active)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinical Dietetics (Active)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_active_mdc; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM7') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_clinical_closedcases_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_closed_mdc; ?>'"
                data-title="<?php echo strtolower('Clinical Dietetics (Closed Cases)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinical Dietetics (Closed Cases)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_closed_mdc; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM8') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pharmacy_closed';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pharmacy_closed; ?>'"
                data-title="<?php echo strtolower('Clinical Pharmacy-(Closed)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinical Pharmacy-(Closed)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pharmacy_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM9') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pharmacy_op';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pharmacy_op; ?>'"
                data-title="<?php echo strtolower('Clinical Pharmacy-(OP)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinical Pharmacy-(OP)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pharmacy_op; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM10') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pharmacy_open';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pharmacy_open; ?>'"
                data-title="<?php echo strtolower('Clinical Pharmacy-(Open)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinical Pharmacy-(Open)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pharmacy_open; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM11') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_anesthesia_active_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_anesthesia_active; ?>'"
                data-title="<?php echo strtolower('Clinicians-Anesthesia(Active)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-Anesthesia(Active)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_anesthesia_active; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM12') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_anesthesia_closed_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_anesthesia_closed; ?>'"
                data-title="<?php echo strtolower('Clinicians-Anesthesia(Closed)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-Anesthesia(Closed)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_anesthesia_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM13') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_ed_active_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_ed_active; ?>'"
                data-title="<?php echo strtolower('Clinicians-ED (Active)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-ED (Active)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_ed_active; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM14') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_ed_closed_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_ed_closed; ?>'"
                data-title="<?php echo strtolower('Clinicians-ED (Closed)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-ED (Closed)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_ed_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM15') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_icu_active_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_icu_active; ?>'"
                data-title="<?php echo strtolower('Clinicians-ICU (Active)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-ICU (Active)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_icu_active; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM16') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_icu_closed_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_icu_closed; ?>'"
                data-title="<?php echo strtolower('Clinicians-ICU (Closed)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-ICU (Closed)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_icu_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM17') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_primarycare_active_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_primarycare_active; ?>'"
                data-title="<?php echo strtolower('Clinicians-Primary Care Provider (Active)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-Primary Care Provider (Active)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_primarycare_active; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM18') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_primarycare_closed_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_primarycare_closed; ?>'"
                data-title="<?php echo strtolower('Clinicians-Primary Care Provider (Closed)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-Primary Care Provider (Closed)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_primarycare_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM19') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_sedation_active_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_sedation_active; ?>'"
                data-title="<?php echo strtolower('Clinicians-Sedation (Active)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-Sedation (Active)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_sedation_active; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM20') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_sedation_closed_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_sedation_closed; ?>'"
                data-title="<?php echo strtolower('Clinicians-Sedation (Closed)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-Sedation (Closed)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_sedation_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM21') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_surgeons_active_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_surgeons_active; ?>'"
                data-title="<?php echo strtolower('Clinicians-Surgeons (Active)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-Surgeons (Active)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_surgeons_active; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM22') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_surgeons_closed_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_surgeons_closed; ?>'"
                data-title="<?php echo strtolower('Clinicians-Surgeons (Closed)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Clinicians-Surgeons (Closed)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_surgeons_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM23') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_dietconsultation_op_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_diet_consultation_op; ?>'"
                data-title="<?php echo strtolower('Diet Consultation (OP)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Diet Consultation (OP)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_diet_consultation_op; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM24') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_physiotherapy_closed_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_physiotherapy_closed; ?>'"
                data-title="<?php echo strtolower('Physiotherapy (Closed)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Physiotherapy (Closed)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_physiotherapy_closed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM25') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_physiotherapy_op_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_physiotherapy_op; ?>'"
                data-title="<?php echo strtolower('Physiotherapy (OP)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Physiotherapy (OP)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_physiotherapy_op; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM26') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_physiotherapy_open_mdc';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_physiotherapy_open; ?>'"
                data-title="<?php echo strtolower('Physiotherapy (Open)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Physiotherapy (Open)
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_physiotherapy_open; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM27') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_mrd_ed_audit';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_mrd_ed; ?>'"
                data-title="<?php echo strtolower('MRD Audit - ED'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                MRD Audit - ED
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_mrd_ed; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM28') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_mrd_lama_audit';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_mrd_lama; ?>'"
                data-title="<?php echo strtolower('MRD Audit - LAMA'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                MRD Audit - LAMA
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_mrd_lama; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM29') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_mrd_op_audit';
            $table_patients_1PSQ3a = 'bf_patients';
            $desc_1PSQ3a = 'desc';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count2 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_mrd_op; ?>'"
                data-title="<?php echo strtolower('MRD Audit - OP'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count2); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                MRD Audit - OP
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $report_error_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-file-medical fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_mrd_op; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-12 heading-block">
            <div class="heading">
                <h2 style="margin-top: 20px;margin-bottom:20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 7px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Nursing & IPSG</h2>
            </div>
        </div>

        <?php if (isfeature_active('AUDIT-FORM30') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_accidental_delining_audit';
            $table_patients_1PSQ3a = 'bf_patients';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count30 = $this->audit_model->patient_and_feedback(
                $table_patients_1PSQ3a,
                $table_feedback_1PSQ3a,
                $sorttime,
                $setup
            );
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_accidental_delining; ?>'"
                data-title="<?php echo strtolower('Accidental Delining Audit'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count30); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">
                                Accidental Delining Audit
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-triangle-exclamation fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_accidental_delining; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM31') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_admission_area_audit';
            $table_patients_1PSQ3a = 'bf_patients';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count31 = $this->audit_model->patient_and_feedback(
                $table_patients_1PSQ3a,
                $table_feedback_1PSQ3a,
                $sorttime,
                $setup
            );
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_admission_holding_area; ?>'"
                data-title="<?php echo strtolower('Admission Holding Area Audit'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count31); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">Admission Holding Area Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-bed-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_admission_holding_area; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM32') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_cardio_pulmonary_audit';
            $table_patients_1PSQ3a = 'bf_patients';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count32 = $this->audit_model->patient_and_feedback(
                $table_patients_1PSQ3a,
                $table_feedback_1PSQ3a,
                $sorttime,
                $setup
            );
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_cardio_pulmonary; ?>'"
                data-title="<?php echo strtolower('CPR Analysis Record'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count32); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">CPR Analysis Record</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_cardio_pulmonary; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM33') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_extravasation_audit';
            $table_patients_1PSQ3a = 'bf_patients';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count33 = $this->audit_model->patient_and_feedback(
                $table_patients_1PSQ3a,
                $table_feedback_1PSQ3a,
                $sorttime,
                $setup
            );
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_extravasation_audit; ?>'"
                data-title="<?php echo strtolower('Extravasation Audit'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count33); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">Extravasation Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_extravasation_audit; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM34') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_hapu_audit';
            $table_patients_1PSQ3a = 'bf_patients';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count34 = $this->audit_model->patient_and_feedback(
                $table_patients_1PSQ3a,
                $table_feedback_1PSQ3a,
                $sorttime,
                $setup
            );
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_hapu_audit; ?>'"
                data-title="<?php echo strtolower('Hospital Acquired Pressure Ulcers (HAPU) Audit'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count34); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">Hospital Acquired Pressure Ulcers (HAPU) Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_hapu_audit; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM35') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_assessment_ae';
            $table_patients_1PSQ3a = 'bf_patients';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count35 = $this->audit_model->patient_and_feedback(
                $table_patients_1PSQ3a,
                $table_feedback_1PSQ3a,
                $sorttime,
                $setup
            );
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor: pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_initial_assessment_ae; ?>'"
                data-title="<?php echo strtolower('Initial Assessment Accident and Emergency (A&E)'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count35); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">Initial Assessment Accident and Emergency (A&E)</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_initial_assessment_ae; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>



        <?php if (isfeature_active('AUDIT-FORM36') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_assessment_ipd';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor:pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_initial_assessment_ipd; ?>';"
                data-title="<?php echo strtolower('Initial Assessment IPD'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">Initial Assessment IPD
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_initial_assessment_ipd; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM37') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_assessment_opd';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor:pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_initial_assessment_opd; ?>';"
                data-title="<?php echo strtolower('Initial Assessment OPD'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">Initial Assessment OPD
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_initial_assessment_opd; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM38') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_ipsg1_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor:pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_ipsg1; ?>';"
                data-title="<?php echo strtolower('IPSG-1'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">IPSG-1
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_ipsg1; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM39') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_ipsg2_ae';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor:pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_ipsg2_ae; ?>';"
                data-title="<?php echo strtolower('IPSG2- A&E'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">IPSG2- A&E
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_ipsg2_ae; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM40') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_ipsg2_ipd';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top: 10px; cursor:pointer;"
                onclick="window.location.href='<?php echo $feedbacks_report_ipsg2_ipd; ?>';"
                data-title="<?php echo strtolower('IPSG2- IPD'); ?>">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height: 100px;">
                        <div class="statistic-box">
                            <h2 style="font-size: 25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size: 18px;">IPSG2- IPD
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>">
                                    <i class="0" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_ipsg2_ipd; ?>" style="float: right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>



        <?php if (isfeature_active('AUDIT-FORM41') === true) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            $table_feedback_1PSQ3a = 'bf_ma_ipsg4_timeout';
            $table_patients_1PSQ3a = 'bf_patients';
            $sorttime = 'asc';
            $setup = 'setup';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('IPSG4-Timeout- Outside OT Audit'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_ipsg4_timeout; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">IPSG4-Timeout- Outside OT Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_ipsg4_timeout; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM42') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_ipsg6_ip';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('IPSG6- IP'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_ipsg6_ip; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">IPSG6- IP</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_ipsg6_ip; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM43') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_ipsg6_opd';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('IPSG6- OPD'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_ipsg6_opd; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">IPSG6- OPD</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_ipsg6_opd; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM44') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_point_prevlance_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Point Prevalence Audit'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_point_prevelance; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Point Prevalence Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_point_prevelance; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-12 heading-block">
            <div class="heading">
                <h2 style="margin-top: 20px;margin-bottom:20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 7px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Clinical Outcome</h2>
            </div>
        </div>


        <?php if (isfeature_active('AUDIT-FORM45') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_audit_acl';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('ACL'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_audit_acl; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">ACL</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_audit_acl; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM46') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_allogenic_bone_marrow';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Allogenic Bone Marrow Transplantation'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_allogenic_bone_marrow; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Allogenic Bone Marrow Transplantation</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_allogenic_bone_marrow; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM47') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_aortic_value_replacement';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Aortic Valve Replacement (AVR)'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_aortic_value_replacement; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Aortic Valve Replacement (AVR)</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_aortic_value_replacement; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM48') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_autologous_bone';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Autologous Bone Marrow Transplantation'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_autologous_bone; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Autologous Bone Marrow Transplantation</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_autologous_bone; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM49') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_brain_tumour';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Brain Tumour Surgery'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_brain_tumour; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Brain Tumour Surgery</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_brain_tumour; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM50') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_cabg';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('CABG'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_cabg; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;">
                                <span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">CABG</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_cabg; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM51') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_carotid_stenting';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Carotid Stenting'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_carotid_stenting; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Carotid Stenting</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_carotid_stenting; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM52') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_chemotherapy';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Chemotherapy (Medical Oncology)'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_chemotherapy; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Chemotherapy (Medical Oncology)</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_chemotherapy; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM53') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_colo_rectal';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Colo-Rectal Surgeries'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_colo_rectal; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Colo-Rectal Surgeries</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_colo_rectal; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM54') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_endoscopy';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Endoscopy'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_endoscopy; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Endoscopy</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_endoscopy; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM55') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_epilepsy';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="<?php echo strtolower('Epilepsy'); ?>"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_epilepsy; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Epilepsy</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_epilepsy; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM56') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_herniorrhaphy';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="herniorrhaphy"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_herniorrhaphy; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Herniorrhaphy</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_herniorrhaphy; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM57') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_holep';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="holep"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_holep; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">HoLEP</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_holep; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM58') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_laparoscopic_appendicectomy';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="laparoscopic_appendicectomy"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_laparoscopic; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Laparoscopic Appendicectomy</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_laparoscopic; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM59') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_mechanical_thrombectomy';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="mechanical_thrombectomy"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_mechanical_thrombectomy; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Mechanical Thrombectomy</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_mechanical_thrombectomy; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM61') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_ptca';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="ptca"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_ptca; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">PTCA</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_ptca; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM62') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_renal_transplantation';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="renal_transplantation"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_renal_transplantation; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Renal Transplantation</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_renal_transplantation; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM63') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_scoliosis_correction';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="scoliosis_correction"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_scoliosis_correction; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Scoliosis Correction Surgery</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_scoliosis_correction; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM64') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_spinal_dysraphism';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="spinal_dysraphism"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_spinal_dysraphism; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Spinal Dysraphism</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_spinal_dysraphism; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM65') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_spine_disc_surgery';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="spine_disc_surgery"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_spine_disc_surgery; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Spine & Disc Surgery-Fusion Procedures</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_spine_disc_surgery; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM66') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_thoracotomy';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="thoracotomy"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_thoracotomy; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Thoracotomy</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_thoracotomy; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM67') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_tkr';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="tkr"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_tkr; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">TKR</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_tkr; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM68') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_uro_oncology';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="uro_oncology"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_uro_oncology; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Uro-oncology Procedures</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_uro_oncology; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM69') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_whipples_surgery';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="whipples_surgery"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_whipples_surgery; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Whipples Surgery</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_whipples_surgery; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM70') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicaloutcome_laparoscopic_cholecystectomy';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="laparoscopic_cholecystectomy"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_laparoscopic_cholecystectomy; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Laparoscopic Cholecystectomy</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_laparoscopic_cholecystectomy; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>

    <div class="row">

        <div class="col-12 heading-block">
            <div class="heading">
                <h2 style="margin-top: 20px; margin-bottom:20px;font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 7px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Clinical KPI</h2>
            </div>
        </div>
        <?php if (isfeature_active('AUDIT-FORM71') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicalkpi_bronchodilators_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="bronchodilators_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinicalkpi_bronchodilators; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">Bronchodilators Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinicalkpi_bronchodilators; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM72') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinicalkpi_copd_protocol_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="copd_protocol_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinicalkpi_copd_protocol; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span></h2>
                            <div class="small" style="font-size:18px;">COPD Protocol Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinicalkpi_copd_protocol; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>

    <div class="row">

        <div class="col-12 heading-block">
            <div class="heading">
                <h2 style="margin-top: 20px;margin-bottom:20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 7px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Infection Control & PCI</h2>
            </div>
        </div>
        <?php if (isfeature_active('AUDIT-FORM73') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_biomedical_waste';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="biomedical_waste_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_biomedical_waste; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Biomedical Waste Management Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_biomedical_waste; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM74') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_canteen_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="canteen_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_canteen_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Canteen Audit Checklist</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_canteen_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM75') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_cssd_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="cssd_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_cssd_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">CSSD Audit Checklist</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_cssd_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM76') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_hand_hygiene';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="hand_hygiene_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_hand_hygiene; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Hand Hygiene Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_hand_hygiene; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM77') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_bundle_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="bundle_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_bundle_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Infection Control Bundle Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_bundle_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM78') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_ot_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="ot_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_ot_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Infection Control OT Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_ot_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM79') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_linen_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="linen_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_linen_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Linen Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_linen_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM80') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_ambulance_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="ambulance_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_ambulance_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Ambulance PCI Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_ambulance_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM81') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_coffee_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="coffee_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_coffee_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">CoffeeShop PCI Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_coffee_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM82') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_laboratory_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="laboratory_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_laboratory_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Laboratory PCI Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_laboratory_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM83') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_mortuary_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="mortuary_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_mortuary_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Mortuary PCI Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_mortuary_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM84') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_radiology_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="radiology_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_radiology_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Radiology PCI Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_radiology_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM85') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_ssi_survelliance_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="ssi_surveillance_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_ssi_survelliance_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">SSI Surveillance Checklist</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_ssi_survelliance_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM86') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_peripheralivline_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="iv_cannula_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_peripheralivline_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">IV Cannula Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_peripheralivline_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM87') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_personalprotective_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="personal_protective_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_personalprotective_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Personal Protective Equipment Usage Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_personalprotective_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM88') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_safe_injection_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="safe_injection_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_safe_injection_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Safe Injection and Infusion Audit</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_safe_injection_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM89') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_infection_control_surface_cleaning_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6"
                style="margin-top:10px; cursor:pointer;"
                data-title="surface_cleaning_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_infection_control_surface_cleaning_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Surface Cleaning and Disinfection Effectiveness Monitoring Record</div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_infection_control_surface_cleaning_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>

    <div class="row">
        <div class="col-12 heading-block">
            <div class="heading">
                <h2 style="margin-top: 20px;margin-bottom:20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 7px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Clinical Pathways</h2>
            </div>
        </div>
        <?php if (isfeature_active('AUDIT-FORM90') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_arthroscopic_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="arthroscopic_acl_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_arthroscopic_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Arthroscopic ACL Reconstruction Surgery
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_arthroscopic_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM91') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_breast_lump_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="breast_lump_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_breast_lump_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Breast Lump Consensus Guidelines
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_breast_lump_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM92') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_cardiac_arrest_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="cardiac_arrest_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_cardiac_arrest_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Cardiac Arrest
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_cardiac_arrest_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM93') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_donor_hepatectomy_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="donor_hepatectomy_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_donor_hepatectomy_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Donor Hepatectomy
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_donor_hepatectomy_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM94') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_febrile_seizure_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="febrile_seizure_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_febrile_seizure_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Febrile Seizure
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_febrile_seizure_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM95') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_heart_transplant_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="heart_transplant_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_heart_transplant_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Heart Transplant Recipient
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_heart_transplant_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (isfeature_active('AUDIT-FORM96') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_laproscopic_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="laparoscopic_donor_nephrectomy_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_laproscopic_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Laparoscopic Donor Nephrectomy
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_laproscopic_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM97') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_picc_line_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="picc_line_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_picc_line_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">PICC LINE Insertion
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_picc_line_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM98') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_stroke_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="stroke_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_stroke_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Stroke
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_stroke_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM99') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_urodynamics_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="urodynamics_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_urodynamics_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">Urodynamics
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_urodynamics_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isfeature_active('AUDIT-FORM100') === true) {
            $table_feedback_1PSQ3a = 'bf_ma_clinical_pathway_stemi_audit';
            $ip_feedbacks_count3 = $this->audit_model->patient_and_feedback($table_patients_1PSQ3a, $table_feedback_1PSQ3a, $sorttime, $setup);
        ?>
            <div class="audit-card col-xs-12 col-sm-6 col-md-6 col-lg-6" style="margin-top:10px; cursor:pointer;" data-title="stemi_primary_pci_audit"
                onclick="window.location.href='<?php echo $feedbacks_report_clinical_pathway_stemi_audit; ?>'">
                <div class="panel panel-bd">
                    <div class="panel-body" style="height:100px;">
                        <div class="statistic-box">
                            <h2 style="font-size:25px;"><span class="count-number"><?php echo count($ip_feedbacks_count3); ?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                            </h2>
                            <div class="small" style="font-size:18px;">STEMI-Primary PCI Clinical Pathway
                                <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $safety_precautions_info_tooltip; ?>"><i class="0"></i></a>
                            </div>
                            <div class="icon large-screen-only"><i class="fa-solid fa-heart-pulse fa-4x"></i></div>
                            <a href="<?php echo $feedbacks_report_clinical_pathway_stemi_audit; ?>" style="float:right; font-size:18px; margin-top: -12px;">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>



    </div>

    <!-- Close Metric Boxes-->
    <?php



    ?>





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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchAudit");
        const allHeadings = document.querySelectorAll(".heading-block");

        // Helper to get all audit cards under a given heading
        function getAuditCardsUnderHeading(headingBlock) {
            const cards = [];
            let next = headingBlock.nextElementSibling;
            while (next && !next.classList.contains("heading-block")) {
                if (next.classList.contains("audit-card")) cards.push(next);
                next = next.nextElementSibling;
            }
            return cards;
        }

        // Function to update visibility of headings based on content
        function updateHeadings(searchQuery = "") {
            allHeadings.forEach(block => {
                const audits = getAuditCardsUnderHeading(block);
                let hasVisibleCard = false;

                audits.forEach(card => {
                    const title = (card.dataset.title || "").toLowerCase();
                    if (!searchQuery || title.includes(searchQuery)) {
                        card.style.display = "block";
                        hasVisibleCard = true;
                    } else {
                        card.style.display = "none";
                    }
                });

                // 🔥 Hide the heading if no cards exist or all are hidden
                block.style.display = hasVisibleCard ? "block" : "none";
            });
        }

        // Initial check after DOM load
        updateHeadings();

        // Handle search filter dynamically
        if (searchInput) {
            searchInput.addEventListener("input", function() {
                const query = searchInput.value.toLowerCase().trim();
                updateHeadings(query);
            });
        }
    });
</script>