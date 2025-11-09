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
    <!--Search box-->
    <input type="text" id="searchKPI" placeholder="🔍 Search KPIs" style="width:49%; margin:5px auto;margin-right:0px; display:block; padding:8px 10px; border:1px solid #ccc; border-radius:4px; font-size:16px;">

    <!-- Close Download Buttons-->
    <!-- Metric Boxes-->
    <?php if ($hasMedicalRecordsKPIs = (isfeature_active('QUALITY-KPI1') || isfeature_active('QUALITY-KPI2') || isfeature_active('QUALITY-KPI4') || isfeature_active('QUALITY-KPI6') || isfeature_active('QUALITY-KPI14') || isfeature_active('QUALITY-KPI80') || isfeature_active('QUALITY-KPI95') || isfeature_active('QUALITY-KPI96') || isfeature_active('QUALITY-KPI99') || isfeature_active('QUALITY-KPI100') || isfeature_active('QUALITY-KPI104') || isfeature_active('QUALITY-KPI105') || isfeature_active('QUALITY-KPI136') || isfeature_active('QUALITY-KPI137') || isfeature_active('QUALITY-KPI176') || isfeature_active('QUALITY-KPI177') || isfeature_active('QUALITY-KPI178') || isfeature_active('QUALITY-KPI179') || isfeature_active('QUALITY-KPI180') || isfeature_active('QUALITY-KPI181') || isfeature_active('QUALITY-KPI182') || isfeature_active('QUALITY-KPI198') || isfeature_active('QUALITY-KPI199') || isfeature_active('QUALITY-KPI200') || isfeature_active('QUALITY-KPI201') || isfeature_active('QUALITY-KPI202') || isfeature_active('QUALITY-KPI208') || isfeature_active('QUALITY-KPI210') || isfeature_active('QUALITY-KPI211') || isfeature_active('QUALITY-KPI302') || isfeature_active('QUALITY-KPI303') || isfeature_active('QUALITY-KPI304') || isfeature_active('QUALITY-KPI305') || isfeature_active('QUALITY-KPI306') || isfeature_active('QUALITY-KPI307') || isfeature_active('QUALITY-KPI308') || isfeature_active('QUALITY-KPI309') || isfeature_active('QUALITY-KPI310') || isfeature_active('QUALITY-KPI311') || isfeature_active('QUALITY-KPI312') || isfeature_active('QUALITY-KPI313') || isfeature_active('QUALITY-KPI314') || isfeature_active('QUALITY-KPI315') || isfeature_active('QUALITY-KPI316') || isfeature_active('QUALITY-KPI317'))): ?>
        <div class="row">
            <div class="heading heading-block">
                <h2 style="margin-top: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Medical Records</h2>
            </div>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 20px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a1; ?>'"
                    data-title="<?php echo strtolower('Average Time for initial assessment of in-patients (Doctors) in MRD(ICU)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average Time for initial assessment of in-patients (Doctors) in MRD(ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a1; ?>"
                                    style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                    Explore
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI2') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3a2';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a2; ?>'"
                    data-title="<?php echo strtolower('Average Time for initial assessment of in-patients (Doctors)- (MRI WARD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average Time for initial assessment of in-patients (Doctors)- (MRI WARD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a2; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a4; ?>'"
                    data-title="<?php echo strtolower('Percentage of Care-plan is documented for inpatients(MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Percentage of Care-plan is documented for inpatients(MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a4; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a6; ?>'"
                    data-title="<?php echo strtolower('Percentage of Nursing care is documented for inpatients (MRD - Nursing)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Percentage of Nursing care is documented for inpatients (MRD - Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a6; ?>"
                                    style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                    Explore
                                </a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a14; ?>'"
                    data-title="<?php echo strtolower('Percentage of sepsis patients who receive care as per the HOUR-1 sepsis bundle (Critical Care Medicine - Medical records)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Percentage of sepsis patients receiving care as per Hour-1 bundle (Critical Care)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a14; ?>"
                                    style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                    Explore
                                </a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;" data-title="<?php echo strtolower('Mortality rate (MRD)'); ?>" onclick="window.location.href='<?php echo $feedbacks_report_CQI3h1; ?>'">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Mortality rate (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3h1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j7; ?>'"
                    data-title="<?php echo strtolower('Shift change handover communication (Doctors)- (MRD - Emergency Department)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Shift change handover communication (Doctors)- (MRD - Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3j7; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j8; ?>'"
                    data-title="<?php echo strtolower('Shift change handover communication (Doctors)- (MRD - ICU)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Shift change handover communication (Doctors)- (MRD - ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3j8; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j11; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication interdepartmental shift- (MRD - Emergency Department)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    IPSG 2.2 - Hand off communication interdepartmental shift- (MRD - Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3j11; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j12; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication interdepartmental shift- (MRD - ICU)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    IPSG 2.2 - Hand off communication interdepartmental shift- (MRD - ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3j12; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j16; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication among doctors (During shift change)- (MRD - Emergency Department)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    IPSG 2.2 - Hand off communication among doctors (During shift change)- (MRD - Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3j16; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
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
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j17; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication among doctors (During shift change)- (MRD - ICU)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    IPSG 2.2 - Hand off communication among doctors (During shift change)- (MRD - ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3j17; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI136') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4c1';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c1; ?>'"
                    data-title="<?php echo strtolower('Bed occupancy rate- (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Bed occupancy rate- (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI4c1; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI137') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4c2';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c2; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c2; ?>"
                                    style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                    Explore
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI176') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4g1';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4g1; ?>'"
                    data-title="<?php echo strtolower('Percentage of Medical records not having discharge summary(MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Percentage of Medical records not having discharge summary(MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4g1; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI177') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4g2';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4g2; ?>'"
                    data-title="<?php echo strtolower('Percentage of Medical records not having codification as per ICD(MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Percentage of Medical records not having codification as per ICD(MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4g2; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI178') === true) { ?>
                <?php
                $fdate = $_SESSION['from_date'];
                $tdate = $_SESSION['to_date'];
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4g3';
                $table_patients_1PSQ3a = 'bf_patients';
                $desc_1PSQ3a = 'desc';
                $sorttime = 'asc';
                $setup = 'setup';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4g3; ?>'"
                    data-title="<?php echo strtolower('Percentage of Medical records having improper or incomplete consent(MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Percentage of Medical records having improper or incomplete consent(MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4g3; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI179') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4g4';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4g4; ?>'"
                    data-title="<?php echo strtolower('Percentage of missing medical records(MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Percentage of missing medical records(MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4g4; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI180') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4g5';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4g5; ?>'"
                    data-title="<?php echo strtolower('Compliance rate of adhering with policies and procedures for care of patients at risk for suicide and self-harm(JCI8-COP 5)-(MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Compliance with policy for patients at risk of suicide/self-harm (JCI8-COP5)-(MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4g5; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI181') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4g6';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4g6; ?>'"
                    data-title="<?php echo strtolower('Monthly Abbreviation Compliance(MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Monthly Abbreviation Compliance(MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4g6; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI182') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k1';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k1; ?>'"
                    data-title="<?php echo strtolower('Total number of LAMA cases with Reasons (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Total number of LAMA cases with Reasons (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k1; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI198') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k17';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k17; ?>'"
                    data-title="<?php echo strtolower('Case Fatality 1 - CAD (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Case Fatality 1 - CAD (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k17; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI199') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k18';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k18; ?>'"
                    data-title="<?php echo strtolower('Case Fatality 2 - Acute coronary syndrome (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Case Fatality 2 - Acute coronary syndrome (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k18; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI200') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k19';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k19; ?>'"
                    data-title="<?php echo strtolower('Case Fatality 3 - Cerebral infarction (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Case Fatality 3 - Cerebral infarction (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k19; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI201') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k20';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k20; ?>'"
                    data-title="<?php echo strtolower('Case Fatality 4 - MI (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Case Fatality 4 - MI (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k20; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI202') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k21';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k21; ?>'"
                    data-title="<?php echo strtolower('Case Fatality 5 - Heart failure (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Case Fatality 5 - Heart failure (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k21; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI208') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k27';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k27; ?>'"
                    data-title="<?php echo strtolower('Non-compliance to Copy and paste policy (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Non-compliance to Copy and paste policy (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k27; ?>"
                                    style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                    Explore
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI210') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k29';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k29; ?>'"
                    data-title="<?php echo strtolower('Case Fatality - COVID 19 (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Case Fatality - COVID 19 (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k29; ?>"
                                    style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                    Explore
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI211') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k30';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k30; ?>'"
                    data-title="<?php echo strtolower('Case Fatality - Stroke (MRD)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Case Fatality - Stroke (MRD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k30; ?>"
                                    style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                    Explore
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


            <?php if (isfeature_active('QUALITY-KPI302') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM1';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM1; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Cardiology)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Cardiology)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CLOTCM1; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI303') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM2';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM2; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - CVTS)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - CVTS)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CLOTCM2; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI304') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM3';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM3; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Gastro surgery)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Gastro surgery)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CLOTCM3; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI305') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM4';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM4; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Gastroenterology)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Gastroenterology)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CLOTCM4; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI306') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM5';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM5; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - General Medicine)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - General Medicine)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CLOTCM5; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI307') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM6';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM6; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - ICU)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CLOTCM6; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI308') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM7';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM7; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Nephrology)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Nephrology)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="icon large-screen-only">
                                    <i class="fa fa-folder-open-o" style="font-size: 80px;"></i>
                                </div>
                                <a href="<?php echo $feedbacks_report_CLOTCM7; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI309') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM8';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM8; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Neuro Intervention)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Neuro Intervention)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CLOTCM8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI310') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM9';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM9; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Neurology)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Neurology)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CLOTCM9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI311') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM10';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM10; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Neurosurgery)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Neurosurgery)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CLOTCM10; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI312') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM11';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM11; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Ortho neuro integrated spine)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Ortho neuro integrated spine)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CLOTCM11; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI313') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM12';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM12; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Ortho THR)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Ortho THR)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CLOTCM12; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI314') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM13';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM13; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Ortho TKR)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Ortho TKR)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CLOTCM13; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI315') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM14';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM14; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Orthopaedics)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Orthopaedics)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CLOTCM14; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI316') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM15';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM15; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Pulmonology)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Pulmonology)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CLOTCM15; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI317') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CLOTCM16';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM16; ?>'"
                    data-title="<?php echo strtolower('Average length of stay (MRD - Urology)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average length of stay (MRD - Urology)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="fa fa-folder-open-o" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CLOTCM16; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php endif; ?>


    <?php if ($hasNursingKPIs = (isfeature_active('QUALITY-KPI8') || isfeature_active('QUALITY-KPI9') || isfeature_active('QUALITY-KPI22') || isfeature_active('QUALITY-KPI32') || isfeature_active('QUALITY-KPI61') || isfeature_active('QUALITY-KPI78') || isfeature_active('QUALITY-KPI81') || isfeature_active('QUALITY-KPI82') || isfeature_active('QUALITY-KPI83') || isfeature_active('QUALITY-KPI85') || isfeature_active('QUALITY-KPI86') || isfeature_active('QUALITY-KPI87') || isfeature_active('QUALITY-KPI88') || isfeature_active('QUALITY-KPI89') || isfeature_active('QUALITY-KPI90') || isfeature_active('QUALITY-KPI91') || isfeature_active('QUALITY-KPI97') || isfeature_active('QUALITY-KPI101') || isfeature_active('QUALITY-KPI102') || isfeature_active('QUALITY-KPI103') || isfeature_active('QUALITY-KPI106') || isfeature_active('QUALITY-KPI107') || isfeature_active('QUALITY-KPI108') || isfeature_active('QUALITY-KPI112') || isfeature_active('QUALITY-KPI113') || isfeature_active('QUALITY-KPI116') || isfeature_active('QUALITY-KPI128') || isfeature_active('QUALITY-KPI133') || isfeature_active('QUALITY-KPI134') || isfeature_active('QUALITY-KPI139') || isfeature_active('QUALITY-KPI140') || isfeature_active('QUALITY-KPI141') || isfeature_active('QUALITY-KPI142') || isfeature_active('QUALITY-KPI144') || isfeature_active('QUALITY-KPI145') || isfeature_active('QUALITY-KPI146') || isfeature_active('QUALITY-KPI147') || isfeature_active('QUALITY-KPI148') || isfeature_active('QUALITY-KPI159') || isfeature_active('QUALITY-KPI160') || isfeature_active('QUALITY-KPI166') || isfeature_active('QUALITY-KPI221') || isfeature_active('QUALITY-KPI222') || isfeature_active('QUALITY-KPI223') || isfeature_active('QUALITY-KPI224') || isfeature_active('QUALITY-KPI225') || isfeature_active('QUALITY-KPI243') || isfeature_active('QUALITY-KPI245') || isfeature_active('QUALITY-KPI298') || isfeature_active('QUALITY-KPI299') || isfeature_active('QUALITY-KPI300') || isfeature_active('QUALITY-KPI301'))): ?>

        <div class="row">
            <div class="heading heading-block">
                <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Nursing</h2>
            </div>
            <?php if (isfeature_active('QUALITY-KPI8') === true) { ?>
                <?php
                $table_feedback_CQI3a8 = 'bf_feedback_CQI3a8';
                $table_patients_CQI3a8 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3a8, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a8; ?>'"
                    data-title="<?php echo strtolower('Average Time for initial assessment of in-patients (Nursing - ICU)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average Time for initial assessment of in-patients (Nursing - ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a8; ?>" style="float: right; font-size: 17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI9') === true) { ?>
                <?php
                $table_feedback_CQI3a9 = 'bf_feedback_CQI3a9';
                $table_patients_CQI3a9 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3a9, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a9; ?>'"
                    data-title="<?php echo strtolower('Average Time for initial assessment of in-patients (Nursing - Ward)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average Time for initial assessment of in-patients (Nursing - Ward)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI22') === true) { ?>
                <?php
                $table_feedback_CQI3a22 = 'bf_feedback_CQI3a22';
                $table_patients_CQI3a22 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3a22, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a22; ?>'"
                    data-title="<?php echo strtolower('Percentage of compliance to Holding area care (ACC2-JCI8) - (Nursing)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Percentage of compliance to Holding area care (ACC2-JCI8) - (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a22; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI32') === true) { ?>
                <?php
                $table_feedback_CQI3b10 = 'bf_feedback_CQI3b10';
                $table_patients_CQI3b10 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3b10, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3b10; ?>'"
                    data-title="<?php echo strtolower('Percentage of employees in diagnostics adhering to safety precautions (Nursing)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Percentage of employees in diagnostics adhering to safety precautions (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3b10; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI61') === true) { ?>
                <?php
                $fdate = $_SESSION['from_date'];
                $tdate = $_SESSION['to_date'];
                $table_feedback_CQI3e7 = 'bf_feedback_CQI3e7';
                $table_patients_CQI3e7 = 'bf_patients';
                $desc_CQI3e7 = 'desc';
                $sorttime = 'asc';
                $setup = 'setup';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3e7, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3e7; ?>'"
                    data-title="<?php echo strtolower('Primary Cesarean Rate (Nursing - OBG)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Primary Cesarean Rate (Nursing - OBG)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3e7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI78') === true) { ?>
                <?php
                $table_feedback_CQI3g5 = 'bf_feedback_CQI3g5';
                $table_patients_CQI3g5 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3g5, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3g5; ?>'"
                    data-title="<?php echo strtolower('Late Onset Sepsis Rate After 72 Hours (Nursing - NICU)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Late Onset Sepsis Rate After 72 Hours (Nursing - NICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3g5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI81') === true) { ?>
                <?php
                $table_feedback_CQI3h2 = 'bf_feedback_CQI3h2';
                $table_patients_CQI3h2 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3h2, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3h2; ?>'"
                    data-title="<?php echo strtolower('Return to ICU within 48 hours (Nursing - ICU1)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Return to ICU within 48 hours (Nursing - ICU1)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3h2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI82') === true) { ?>
                <?php
                $table_feedback_CQI3h3 = 'bf_feedback_CQI3h3';
                $table_patients_CQI3h3 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3h3, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3h3; ?>'"
                    data-title="<?php echo strtolower('Return to ICU-2 within 48 hours (Nursing - ICU2)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Return to ICU-2 within 48 hours (Nursing - ICU2)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3h3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI83') === true) { ?>
                <?php
                $table_feedback_CQI3h4 = 'bf_feedback_CQI3h4';
                $table_patients_CQI3h4 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3h4, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3h4; ?>'"
                    data-title="<?php echo strtolower('Return to ICU-3 within 48 hours (Nursing - CICU)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Return to ICU-3 within 48 hours (Nursing - CICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3h4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI85') === true) { ?>
                <?php
                $table_feedback_CQI3h6 = 'bf_feedback_CQI3h6';
                $table_patients_CQI3h6 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3h6, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3h6; ?>'"
                    data-title="<?php echo strtolower('Reintubation Rate (Nursing - ICU1)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Reintubation Rate (Nursing - ICU1)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3h6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI86') === true) { ?>
                <?php
                $table_feedback_CQI3h7 = 'bf_feedback_CQI3h7';
                $table_patients_CQI3h7 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3h7, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3h7; ?>'"
                    data-title="<?php echo strtolower('Reintubation Rate (Nursing - ICU2)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Reintubation Rate (Nursing - ICU2)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3h7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI87') === true) { ?>
                <?php
                $table_feedback_CQI3h8 = 'bf_feedback_CQI3h8';
                $table_patients_CQI3h8 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3h8, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3h8; ?>'"
                    data-title="<?php echo strtolower('Reintubation Rate (Nursing - CICU)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Reintubation Rate (Nursing - CICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3h8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI88') === true) { ?>
                <?php
                $table_feedback_CQI3h9 = 'bf_feedback_CQI3h9';
                $table_patients_CQI3h9 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3h9, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3h9; ?>'"
                    data-title="<?php echo strtolower('Re-Admission Rate (Nursing - NICU)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Re-Admission Rate (Nursing - NICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3h9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI89') === true) { ?>
                <?php
                $table_feedback_CQI3j1 = 'bf_feedback_CQI3j1';
                $table_patients_CQI3j1 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j1, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j1; ?>'"
                    data-title="<?php echo strtolower('Shift change handover communication (Nurses) - (Nursing - Emergency Department))'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Shift change handover communication (Nurses) - (Nursing - Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j1; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI90') === true) { ?>
                <?php
                $table_feedback_CQI3j2 = 'bf_feedback_CQI3j2';
                $table_patients_CQI3j2 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j2, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j2; ?>'"
                    data-title="<?php echo strtolower('Shift change handover communication - (Nursing - ICU)'); ?>">
                    <div class="panel panel-bd" style="cursor: pointer;">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Shift change handover communication - (Nursing - ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI91') === true) { ?>
                <?php
                $table_feedback_CQI3j3 = 'bf_feedback_CQI3j3';
                $table_patients_CQI3j3 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j3, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j3; ?>'"
                    data-title="<?php echo strtolower('Shift change handover communication (Nurses) - (Nursing - Ward)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Shift change handover communication (Nurses) - (Nursing - Ward)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j3; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI97') === true) { ?>
                <?php
                $table_feedback_CQI3j9 = 'bf_feedback_CQI3j9';
                $table_patients_CQI3j9 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j9, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j9; ?>'"
                    data-title="<?php echo strtolower('Compliance to patient identification - IPD (Nursing)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Compliance to patient identification - IPD (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j9; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI101') === true) { ?>
                <?php
                $table_feedback_CQI3j13 = 'bf_feedback_CQI3j13';
                $table_patients_CQI3j13 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j13, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j13; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing - Emergency Department)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing - Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j13; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI102') === true) { ?>
                <?php
                $table_feedback_CQI3j14 = 'bf_feedback_CQI3j14';
                $table_patients_CQI3j14 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j14, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j14; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing - ICU)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing - ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j14; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI103') === true) { ?>
                <?php
                $table_feedback_CQI3j15 = 'bf_feedback_CQI3j15';
                $table_patients_CQI3j15 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j15, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j15; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing -Ward)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing -Ward)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j15; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI106') === true) { ?>
                <?php
                $table_feedback_CQI3j18 = 'bf_feedback_CQI3j18';
                $table_patients_CQI3j18 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j18, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j18; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing - Emergency Department)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing - Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j18; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI107') === true) { ?>
                <?php
                $table_feedback_CQI3j19 = 'bf_feedback_CQI3j19';
                $table_patients_CQI3j19 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j19, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j19; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing -ICU)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing -ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j19; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI108') === true) { ?>
                <?php
                $table_feedback_CQI3j20 = 'bf_feedback_CQI3j20';
                $table_patients_CQI3j20 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j20, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j20; ?>'"
                    data-title="<?php echo strtolower('IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing -Ward)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing -Ward)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j20; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI112') === true) { ?>
                <?php
                $table_feedback_CQI3j24 = 'bf_feedback_CQI3j24';
                $table_patients_CQI3j24 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j24, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j24; ?>'"
                    data-title="<?php echo strtolower('IPSG 6 - Compliance to Fall prevention measures in IPD- (Nursing - IPD)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    IPSG 6 - Compliance to Fall prevention measures in IPD- (Nursing - IPD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j24; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI113') === true) { ?>
                <?php
                $table_feedback_CQI3j25 = 'bf_feedback_CQI3j25';
                $table_patients_CQI3j25 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j25, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j25; ?>'"
                    data-title="<?php echo strtolower('IPSG 6 - Compliance to Fall prevention measures in OPD- (Nursing - OPD)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    IPSG 6 - Compliance to Fall prevention measures in OPD- (Nursing - OPD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j25; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI116') === true) { ?>
                <?php
                $table_feedback_CQI3j28 = 'bf_feedback_CQI3j28';
                $table_patients_CQI3j28 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3j28, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3j28; ?>'"
                    data-title="<?php echo strtolower('Compliance to patient identification OPD- (Nursing - OPD)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Compliance to patient identification OPD- (Nursing - OPD)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3j28; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI128') === true) { ?>
                <?php
                $table_feedback_CQI4b1 = 'bf_feedback_CQI4b1';
                $table_patients_CQI4b1 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4b1, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4b1; ?>'"
                    data-title="<?php echo strtolower('Incidence of bed sores (hospital associated pressure ulcers) after admission (in 1000 patient days)- (Nursing)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Incidence of bed sores (hospital associated pressure ulcers) after admission (in 1000 patient days)- (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4b1; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI133') === true) { ?>
                <?php
                $table_feedback_CQI4b6 = 'bf_feedback_CQI4b6';
                $table_patients_CQI4b6 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4b6, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4b6; ?>'"
                    data-title="<?php echo strtolower('Incidence of device associated pressure ulcer after admission (Nursing)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Incidence of device associated pressure ulcer after admission (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4b6; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI134') === true) { ?>
                <?php
                $table_feedback_CQI4b7 = 'bf_feedback_CQI4b7';
                $table_patients_CQI4b7 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4b7, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4b7; ?>'"
                    data-title="<?php echo strtolower('Number of Extravasation (Nursing)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Number of Extravasation (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4b7; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI139') === true) { ?>
                <?php
                $table_feedback_CQI4c4 = 'bf_feedback_CQI4c4';
                $table_patients_CQI4c4 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4c4, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c4; ?>'"
                    data-title="<?php echo strtolower('ICU equipment utilization rate (Nursing - ICU1)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    ICU equipment utilization rate (Nursing - ICU1)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c4; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI140') === true) { ?>
                <?php
                $table_feedback_CQI4c5 = 'bf_feedback_CQI4c5';
                $table_patients_CQI4c5 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4c5, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c5; ?>'"
                    data-title="<?php echo strtolower('ICU equipment utilisation rate-(Nursing - ICU2)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    ICU equipment utilisation rate-(Nursing - ICU2)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c5; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI141') === true) { ?>
                <?php
                $table_feedback_CQI4c6 = 'bf_feedback_CQI4c6';
                $table_patients_CQI4c6 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4c6, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c6; ?>'"
                    data-title="<?php echo strtolower('ICU equipment utilisation rate-(Nursing - ICU3)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    ICU equipment utilisation rate-(Nursing - ICU3)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c6; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI142') === true) { ?>
                <?php
                $table_feedback_CQI4c7 = 'bf_feedback_CQI4c7';
                $table_patients_CQI4c7 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4c7, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c7; ?>'"
                    data-title="<?php echo strtolower('ICU Bed utilization rate (Nursing - ICU)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    ICU Bed utilization rate (Nursing - ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c7; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI144') === true) { ?>
                <?php
                $table_feedback_CQI4c9 = 'bf_feedback_CQI4c9';
                $table_patients_CQI4c9 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4c9, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c9; ?>'"
                    data-title="<?php echo strtolower('Cath lab utilization rate'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Cath lab utilization rate
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c9; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI145') === true) { ?>
                <?php
                $table_feedback_CQI4c10 = 'bf_feedback_CQI4c10';
                $table_patients_CQI4c10 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4c10, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c10; ?>'"
                    data-title="<?php echo strtolower('Nurse patient ratio for ICU Ventilated (Nursing-ICU)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Nurse patient ratio for ICU Ventilated (Nursing-ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c10; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI146') === true) { ?>
                <?php
                $table_feedback_CQI4c11 = 'bf_feedback_CQI4c11';
                $table_patients_CQI4c11 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4c11, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c11; ?>'"
                    data-title="<?php echo strtolower('Nurse patient ratio for ICU Non Ventilated (Nursing-ICU)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Nurse patient ratio for ICU Non Ventilated (Nursing-ICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c11; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI147') === true) { ?>
                <?php
                $table_feedback_CQI4c12 = 'bf_feedback_CQI4c12';
                $table_patients_CQI4c12 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4c12, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c12; ?>'"
                    data-title="<?php echo strtolower('Nurse patient ratio for HDU (Nursing-HDU)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Nurse patient ratio for HDU (Nursing-HDU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c12; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI148') === true) { ?>
                <?php
                $table_feedback_CQI4c13 = 'bf_feedback_CQI4c13';
                $table_patients_CQI4c13 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4c13, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4c13; ?>'"
                    data-title="<?php echo strtolower('Nurse patient ratio for Ward (Nursing-Ward)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Nurse patient ratio for Ward (Nursing-Ward)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4c13; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI159') === true) { ?>
                <?php
                $table_feedback_CQI4d10 = 'bf_feedback_CQI4d10';
                $table_patients_CQI4d10 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4d10, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4d10; ?>'"
                    data-title="<?php echo strtolower('Patient Satisfaction Rate-(Nursing - OBG)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Patient Satisfaction Rate-(Nursing - OBG)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4d10; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI160') === true) { ?>
                <?php
                $table_feedback_CQI4d11 = 'bf_feedback_CQI4d11';
                $table_patients_CQI4d11 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4d11, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4d11; ?>'"
                    data-title="<?php echo strtolower('Turn-around Time for Nursing call bell responds (Nursing)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Turn-around Time for Nursing call bell responds (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4d11; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI166') === true) { ?>
                <?php
                $table_feedback_CQI4e6 = 'bf_feedback_CQI4e6';
                $table_patients_CQI4e6 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI4e6, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top:0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4e6; ?>'"
                    data-title="<?php echo strtolower('Nurses Attrition Rate (Nursing)'); ?>">
                    <div class="panel panel-bd" style="cursor:pointer;">
                        <div class="panel-body" style="height:100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top:44px;">
                                <div class="small" style="font-size:20px;">
                                    Nurses Attrition Rate (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI4e6; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI221') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k40';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k40; ?>'"
                    data-title="<?php echo strtolower('Restraint related injuries among admitted patients (Nursing)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Restraint related injuries among admitted patients (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k40; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI222') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k41';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k41; ?>'"
                    data-title="<?php echo strtolower('Rate of compliance for restraint consent policy (Nursing)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Rate of compliance for restraint consent policy (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k41; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI223') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k42';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k42; ?>'"
                    data-title="<?php echo strtolower('Percentage of Accidental removal of line (Nursing)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Percentage of Accidental removal of line (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k42; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI224') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k43';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k43; ?>'"
                    data-title="<?php echo strtolower('Significant hypotension necessitating termination of dialysis (Nursing)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Significant hypotension necessitating termination of dialysis (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k43; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI225') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k44';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k44; ?>'"
                    data-title="<?php echo strtolower('IPSG4 - Time out compliance in outside OT (Nursing)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    IPSG4 - Time out compliance in outside OT (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k44; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI243') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k62';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k62; ?>'"
                    data-title="<?php echo strtolower('Timeliness of initiation of advanced cardiovascular life support (ACLS) within 5 Min (JCI8-COP 4) - (Nursing)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Timeliness of ACLS initiation within 5 minutes (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k62; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI245') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI3k64';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k64; ?>'"
                    data-title="<?php echo strtolower('Rate to RRT response turn to Code blue (JCI8-COP 4) - (Nursing)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Rate to RRT response turn to Code blue (JCI8-COP 4) - (Nursing)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI3k64; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI298') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4h53';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4h53; ?>'"
                    data-title="<?php echo strtolower('Standardised Mortality Ratio for ICU - 1 (Nursing - ICU 1)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Standardised Mortality Ratio for ICU - 1 (Nursing - ICU 1)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI4h53; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI299') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4h54';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4h54; ?>'"
                    data-title="<?php echo strtolower('Standardised Mortality Ratio for ICU - 2 (Nursing in ICU-2)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Standardised Mortality Ratio for ICU - 2 (Nursing in ICU-2)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI4h54; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI300') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4h55';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4h55; ?>'"
                    data-title="<?php echo strtolower('Standardised Mortality Ratio for PICU (Nursing in PICU)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Standardised Mortality Ratio for PICU (Nursing in PICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI4h55; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI301') === true) { ?>
                <?php
                $table_feedback_1PSQ3a = 'bf_feedback_CQI4h56';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI4h56; ?>'"
                    data-title="<?php echo strtolower('Standardised Mortality Ratio for NICU (Nursing in NICU)'); ?>">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Standardised Mortality Ratio for NICU (Nursing in NICU)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>"><i class="0" aria-hidden="true"></i></a>
                                </div>
                                <div class="icon large-screen-only"><i class="0" style="font-size: 80px;"></i></div>
                                <a href="<?php echo $feedbacks_report_CQI4h56; ?>" style="float: right; font-size: 17px; margin-top: 7px;margin-bottom: 10px;margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    <?php endif; ?>

    <?php if ($hasEmergencyKPIs = (isfeature_active('QUALITY-KPI3') || isfeature_active('QUALITY-KPI7') || isfeature_active('QUALITY-KPI12') || isfeature_active('QUALITY-KPI19') || isfeature_active('QUALITY-KPI84') || isfeature_active('QUALITY-KPI191') || isfeature_active('QUALITY-KPI192') || isfeature_active('QUALITY-KPI193') || isfeature_active('QUALITY-KPI194') || isfeature_active('QUALITY-KPI195') || isfeature_active('QUALITY-KPI203') || isfeature_active('QUALITY-KPI204') || isfeature_active('QUALITY-KPI242') || isfeature_active('QUALITY-KPI244'))): ?>

        <div class="row">
            <div class="heading heading-block">
                <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Emergency Department</h2>
            </div>
            <?php if (isfeature_active('QUALITY-KPI3') === true) { ?>
                <?php
                $table_feedback_CQI3a3 = 'bf_feedback_CQI3a3';
                $table_patients_CQI3a3 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3a3, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a3; ?>'"
                    data-title="Average Time for initial assessment of emergency patients (Doctors) - (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average Time for initial assessment of emergency patients (Doctors) - (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI7') === true) { ?>
                <?php
                $table_feedback_CQI3a7 = 'bf_feedback_CQI3a7';
                $table_patients_CQI3a7 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3a7, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a7; ?>'"
                    data-title="Average Time for initial assessment of Emergency patients (Nurses) - (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average Time for initial assessment of Emergency patients (Nurses) - (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI12') === true) { ?>
                <?php
                $table_feedback_CQI3a12 = 'bf_feedback_CQI3a12';
                $table_patients_CQI3a12 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3a12, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a12; ?>'"
                    data-title="Percentage of Hospitalized patients with hypoglycemia who achieved targeted blood glucose level (Endocrinology and Diabetes - Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Hospitalized hypoglycemia patients achieving target glucose (Endocrinology)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a12; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI19') === true) { ?>
                <?php
                $table_feedback_CQI3a19 = 'bf_feedback_CQI3a19';
                $table_patients_CQI3a19 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3a19, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a19; ?>'"
                    data-title="Average Time taken for triage (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average Time taken for triage (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a19; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI84') === true) { ?>
                <?php
                $table_feedback_CQI3h5 = 'bf_feedback_CQI3h5';
                $table_patients_CQI3h5 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3h5, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 20px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3h5; ?>'"
                    data-title="Return to the emergency department after 72 hours with similar presenting complaints (Emergency-Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Return to the emergency department after 72 hours with similar presenting complaints (Emergency-Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3h5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI191') === true) { ?>
                <?php
                $table_feedback_CQI3k10 = 'bf_feedback_CQI3k10';
                $table_patients_CQI3k10 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3k10, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k10; ?>'"
                    data-title="Door to thrombolysis time in ischemic stroke in ER (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Door to thrombolysis time in ischemic stroke in ER (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k10; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI192') === true) { ?>
                <?php
                $table_feedback_CQI3k11 = 'bf_feedback_CQI3k11';
                $table_patients_CQI3k11 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3k11, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k11; ?>'"
                    data-title="Door to image time in Stroke patients (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Door to image time in Stroke patients (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k11; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI193') === true) { ?>
                <?php
                $table_feedback_CQI3k12 = 'bf_feedback_CQI3k12';
                $table_patients_CQI3k12 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3k12, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k12; ?>'"
                    data-title="Average number of patients visiting Emergency per day (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Average number of patients visiting Emergency per day (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k12; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI194') === true) { ?>
                <?php
                $table_feedback_CQI3k13 = 'bf_feedback_CQI3k13';
                $table_patients_CQI3k13 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3k13, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k13; ?>'"
                    data-title="Efficiency of code blue team (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Efficiency of code blue team (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k13; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI195') === true) { ?>
                <?php
                $table_feedback_CQI3k14 = 'bf_feedback_CQI3k14';
                $table_patients_CQI3k14 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3k14, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k14; ?>'"
                    data-title="Time for first defibrillation (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Time for first defibrillation (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k14; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


            <?php if (isfeature_active('QUALITY-KPI203') === true) { ?>
                <?php
                $table_feedback_CQI3k22 = 'bf_feedback_CQI3k22';
                $table_patients_CQI3k22 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3k22, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k22; ?>'"
                    data-title="Compliances in patient transfer and transportation process (External transfer) (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Compliances in patient transfer and transportation process (External transfer) (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k22; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI204') === true) { ?>
                <?php
                $table_feedback_CQI3k23 = 'bf_feedback_CQI3k23';
                $table_patients_CQI3k23 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3k23, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k23; ?>'"
                    data-title="Number of Adverse Events During Patient Transfers (Outside) (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Number of Adverse Events During Patient Transfers (Outside) (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k23; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI242') === true) { ?>
                <?php
                $table_feedback_CQI3k61 = 'bf_feedback_CQI3k61';
                $table_patients_CQI3k61 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3k61, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k61; ?>'"
                    data-title="Return of spontaneous circulation (ROSC) achieving rate (JCI8-COP 4) - (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Return of spontaneous circulation (ROSC) achieving rate (JCI8-COP 4) - (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k61; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isfeature_active('QUALITY-KPI244') === true) { ?>
                <?php
                $table_feedback_CQI3k63 = 'bf_feedback_CQI3k63';
                $table_patients_CQI3k63 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3k63, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3k63; ?>'"
                    data-title="Timeliness of staff response to cardiac arrest (JCI8-COP 4) - (Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Timeliness of staff response to cardiac arrest (JCI8-COP 4) - (Emergency Department)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3k63; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    <?php endif; ?>

    <?php if ($hasCardiologyKPIs = isfeature_active('QUALITY-KPI11')): ?>

        <div class="row">
            <div class="heading heading-block">
                <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Cardiology</h2>
            </div>

            <?php if (isfeature_active('QUALITY-KPI11') === true) { ?>
                <?php
                $table_feedback_CQI3a11 = 'bf_feedback_CQI3a11';
                $table_patients_CQI3a11 = 'bf_patients';
                $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_CQI3a11, $sorttime, $setup);
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3a11; ?>'"
                    data-title="Percentage of Beta-blocker prescriptions with a diagnosis of CHF with reduced EF (Cardiology - Emergency Department)">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 40px;">
                                <div class="small" style="font-size: 20px;">
                                    Beta-blocker use in CHF patients with reduced EF (Cardiology - ED)
                                    <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                        <i class="0" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3a11; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

    <?php endif; ?>

    <?php if ($hasClinicalNutritionKPIs = (isfeature_active('QUALITY-KPI5') || isfeature_active('QUALITY-KPI197') || isfeature_active('QUALITY-KPI368'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Clinical Nutrition & Dietetics</h2>
                </div>
                <?php if (isfeature_active('QUALITY-KPI5') === true) { ?>
                    <?php
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI3a5';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3a5; ?>'"
                        data-title="Percentage of Nutritional assessment is documented for inpatients (Clinical Nutrition and Dietetics)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of Nutritional assessment is documented for inpatients (Clinical Nutrition and Dietetics)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3a5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI197') === true) { ?>
                    <?php
                    $table_feedback_KPI198 = 'bf_feedback_CQI3k16';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI198, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k16; ?>'"
                        data-title="Compliance to diet order (Clinical Nutrition and Dietetics)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to diet order (Clinical Nutrition and Dietetics)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k16; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI368') === true) { ?>
                    <?php
                    $table_feedback_KPI198 = 'bf_feedback_CQI3k65';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI198, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k65; ?>'"
                        data-title="Percentage of patient Identification Errors for Diet patients (IPD)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of patient Identification Errors for Diet patients (IPD)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k65; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasLabServiceKPIs = (isfeature_active('QUALITY-KPI10') || isfeature_active('QUALITY-KPI23') || isfeature_active('QUALITY-KPI24') || isfeature_active('QUALITY-KPI25') || isfeature_active('QUALITY-KPI26') || isfeature_active('QUALITY-KPI33') || isfeature_active('QUALITY-KPI34') || isfeature_active('QUALITY-KPI35') || isfeature_active('QUALITY-KPI205') || isfeature_active('QUALITY-KPI209') || isfeature_active('QUALITY-KPI272') || isfeature_active('QUALITY-KPI273') || isfeature_active('QUALITY-KPI274') || isfeature_active('QUALITY-KPI275') || isfeature_active('QUALITY-KPI276') || isfeature_active('QUALITY-KPI277') || isfeature_active('QUALITY-KPI288'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Lab Service</h2>
                </div>
                <?php if (isfeature_active('QUALITY-KPI10') === true) { ?>
                    <?php
                    $table_feedback_KPI10 = 'bf_feedback_CQI3a10';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI10, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3a10; ?>'"
                        data-title="Percentage of Blood culture contamination rate (Lab Service)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of Blood culture contamination rate (Lab Service)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3a10; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI23') === true) { ?>
                    <?php
                    $table_feedback_KPI23 = 'bf_feedback_CQI3b1';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI23, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b1; ?>'"
                        data-title="Number of reporting errors per 1000 investigations (Lab Services)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Number of reporting errors per 1000 investigations (Lab Services)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI24') === true) { ?>
                    <?php
                    $table_feedback_KPI24 = 'bf_feedback_CQI3b2';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI24, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b2; ?>'"
                        data-title="Rate of redo in 1000 tests (Lab Services)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Rate of redo in 1000 tests (Lab Services)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI25') === true) { ?>
                    <?php
                    $table_feedback_KPI25 = 'bf_feedback_CQI3b3';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI25, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b3; ?>'"
                        data-title="Percentage of reports correlating to clinical diagnosis (Lab Services)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of reports correlating to clinical diagnosis (Lab Services)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI26') === true) { ?>
                    <?php
                    $table_feedback_KPI26 = 'bf_feedback_CQI3b4';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI26, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b4; ?>'"
                        data-title="Percentage of employees in diagnostics adhering to safety precautions (Lab Services)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of employees in diagnostics adhering to safety precautions (Lab Services)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI33') === true) { ?>
                    <?php
                    $table_feedback_KPI33 = 'bf_feedback_CQI3b11';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI33, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b11; ?>'"
                        data-title="Number of reporting errors before dispatch (Lab)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Number of reporting errors before dispatch (Lab)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b11; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI34') === true) { ?>
                    <?php
                    $table_feedback_KPI34 = 'bf_feedback_CQI3b12';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI34, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b12; ?>'"
                        data-title="Waiting time for Laboratory services">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Waiting time for Laboratory services
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b12; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI35') === true) { ?>
                    <?php
                    $table_feedback_KPI35 = 'bf_feedback_CQI3b13';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI35, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b13; ?>'"
                        data-title="Patient safety events or errors related to pathology samples (Lab Services)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Patient safety events or errors related to pathology samples (Lab Services)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b13; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI205') === true) { ?>
                    <?php
                    $table_feedback_KPI206 = 'bf_feedback_CQI3k24';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI206, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k24; ?>'"
                        data-title="ILC/EQAS compliance rate (Lab Services)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        ILC/EQAS compliance rate (Lab Services)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k24; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI209') === true) { ?>
                    <?php
                    $table_feedback_KPI210 = 'bf_feedback_CQI3k28';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI210, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k28; ?>'"
                        data-title="Compliance to POCT IQC Checking (Lab Services)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to POCT IQC Checking (Lab Services)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k28; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI272') === true) { ?>
                    <?php
                    $table_feedback_KPI273 = 'bf_feedback_CQI4h27';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI273, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h27; ?>'"
                        data-title="Compliance to reporting of critical values in Lab (within 30 min) (Lab Service)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to reporting of critical values in Lab (within 30 min) (Lab Service)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h27; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI273') === true) { ?>
                    <?php
                    $table_feedback_KPI274 = 'bf_feedback_CQI4h28';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI274, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h28; ?>'"
                        data-title="Compliance to reporting of critical values in POCT (Lab Service)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to reporting of critical values in POCT (Lab Service)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h28; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI274') === true) { ?>
                    <?php
                    $table_feedback_KPI275 = 'bf_feedback_CQI4h29';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI275, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h29; ?>'"
                        data-title="TAT for Lab tests (Lab Service)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        TAT for Lab tests (Lab Service)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h29; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>



                <?php if (isfeature_active('QUALITY-KPI275') === true) { ?>
                    <?php
                    $table_feedback_KPI276 = 'bf_feedback_CQI4h30';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI276, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h30; ?>'"
                        data-title="TAT for Lab STAT (Lab Service)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        TAT for Lab STAT (Lab Service)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h30; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>




                <?php if (isfeature_active('QUALITY-KPI276') === true) { ?>
                    <?php
                    $table_feedback_KPI277 = 'bf_feedback_CQI4h31';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI277, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h31; ?>'"
                        data-title="Compliance to TAT for lab outsourced test (Lab Service)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to TAT for lab outsourced test (Lab Service)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h31; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI277') === true) { ?>
                    <?php
                    $table_feedback_KPI278 = 'bf_feedback_CQI4h32';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI278, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h32; ?>'"
                        data-title="Lab Specimen Rejection Rate (Lab Service)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Lab Specimen Rejection Rate (Lab Service)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h32; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI288') === true) { ?>
                    <?php
                    $table_feedback_KPI289 = 'bf_feedback_CQI4h43';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI289, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h43; ?>'"
                        data-title="Quality of patient transportation by ambulance (Out-sourced) (Lab Service)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Quality of patient transportation by ambulance (Out-sourced) (Lab Service)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h43; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasPulmonaryKPIs = isfeature_active('QUALITY-KPI15')): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">
                        Pulmonary Medicine
                    </h2>
                </div>

                <?php if (isfeature_active('QUALITY-KPI15') === true) { ?>
                    <?php
                    $table_feedback_KPI15 = 'bf_feedback_CQI3a15';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI15, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3a15; ?>'"
                        data-title="Percentage of COPD patients receiving COPD Action plan at the time of discharge (Pulmonary Medicine)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of COPD patients receiving COPD Action plan at the time of discharge (Pulmonary Medicine)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3a15; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    <?php endif; ?>


    <?php if ($hasPediatricsKPIs = isfeature_active('QUALITY-KPI16')): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">
                        Pediatrics
                    </h2>
                </div>

                <?php if (isfeature_active('QUALITY-KPI16') === true) { ?>
                    <?php
                    $table_feedback_KPI16 = 'bf_feedback_CQI3a16';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI16, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3a16; ?>'"
                        data-title="Percentage of bronchiolitis patients treated inappropriately (Pediatrics)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of bronchiolitis patients treated inappropriately (Pediatrics)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3a16; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    <?php endif; ?>


    <?php if ($hasGastroSurgeryKPIs = (isfeature_active('QUALITY-KPI17') || isfeature_active('QUALITY-KPI241'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Gastro Surgery</h2>
                </div>
                <?php if (isfeature_active('QUALITY-KPI17') === true) { ?>
                    <?php
                    $table_feedback_KPI17 = 'bf_feedback_CQI3a17';
                    $ip_feedbacks_count17 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI17, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3a17; ?>'"
                        data-title="Percentage of oncology patients who had treatment initiated following multidisciplinary meeting Tumour board-(Oncology - Gastro surgery)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Oncology patients with treatment started post tumour board meeting (Oncology)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3a17; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI241') === true) { ?>
                    <?php
                    $table_feedback_KPI242 = 'bf_feedback_CQI3k60';
                    $ip_feedbacks_count242 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI242, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k60; ?>'"
                        data-title="Survival rate for living donor Liver transplants (Gastrointestinal Surgery)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Survival rate for living donor Liver transplants (Gastrointestinal Surgery)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k60; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasRadiologyKPIs = (isfeature_active('QUALITY-KPI18') || isfeature_active('QUALITY-KPI26') || isfeature_active('QUALITY-KPI27') || isfeature_active('QUALITY-KPI28') || isfeature_active('QUALITY-KPI29') || isfeature_active('QUALITY-KPI30') || isfeature_active('QUALITY-KPI98') || isfeature_active('QUALITY-KPI154') || isfeature_active('QUALITY-KPI155') || isfeature_active('QUALITY-KPI156') || isfeature_active('QUALITY-KPI227') || isfeature_active('QUALITY-KPI228') || isfeature_active('QUALITY-KPI229') || isfeature_active('QUALITY-KPI230') || isfeature_active('QUALITY-KPI247') || isfeature_active('QUALITY-KPI248') || isfeature_active('QUALITY-KPI249') || isfeature_active('QUALITY-KPI250') || isfeature_active('QUALITY-KPI251') || isfeature_active('QUALITY-KPI334'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Radiology</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI18') === true) { ?>
                    <?php
                    $table_feedback_KPI18 = 'bf_feedback_CQI3a18';
                    $ip_feedbacks_count18 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI18, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3a18; ?>'"
                        data-title="Percentage of Intravenous Contrast Media Extravasation (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of Intravenous Contrast Media Extravasation (Radiology)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3a18; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI26') === true) { ?>
                    <?php
                    $table_feedback_KPI26 = 'bf_feedback_CQI3b4';
                    $ip_feedbacks_count26 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI26, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b4; ?>'"
                        data-title="Percentage of employees in diagnostics adhering to safety precautions- (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of employees in diagnostics adhering to safety precautions- (Radiology)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b4; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI27') === true) { ?>
                    <?php
                    $table_feedback_KPI27 = 'bf_feedback_CQI3b5';
                    $ip_feedbacks_count27 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI27, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b5; ?>'"
                        data-title="Rate of redo in 1000 tests- (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Rate of redo in 1000 tests- (Radiology)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b5; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI28') === true) { ?>
                    <?php
                    $table_feedback_KPI28 = 'bf_feedback_CQI3b6';
                    $ip_feedbacks_count28 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI28, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b6; ?>'"
                        data-title="Number of reporting errors per 1000 investigations- (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Number of reporting errors per 1000 investigations- (Radiology)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b6; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI29') === true) { ?>
                    <?php
                    $table_feedback_KPI29 = 'bf_feedback_CQI3b7';
                    $ip_feedbacks_count29 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI29, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b7; ?>'"
                        data-title="Percentage of reports correlating to clinical diagnosis- (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of reports correlating to clinical diagnosis- (Radiology)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b7; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px;">Explore</a>
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
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3b8; ?>'"
                        data-title="<?php echo strtolower('Percentage of employees in diagnostics adhering to safety precautions- (Radiology)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of employees in diagnostics adhering to safety precautions- (Radiology)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3b8; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI98') === true) { ?>
                    <?php
                    $table_feedback_KPI98 = 'bf_feedback_CQI3j10';
                    $ip_feedbacks_count98 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI98, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j10; ?>'"
                        data-title="Compliance rate of timeliness of reporting Critical results in Radiology (within 30 min)- (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance rate of timeliness of reporting Critical results in Radiology (within 30 min)- (Radiology)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j10; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI154') === true) { ?>
                    <?php
                    $table_feedback_KPI154 = 'bf_feedback_CQI4d5';
                    $ip_feedbacks_count154 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI154, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4d5; ?>'"
                        data-title="Waiting time for diagnostic services (Radiology - CT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Waiting time for diagnostic services (Radiology - CT)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4d5; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI155') === true) { ?>
                    <?php
                    $table_feedback_KPI155 = 'bf_feedback_CQI4d6';
                    $ip_feedbacks_count155 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI155, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4d6; ?>'"
                        data-title="Waiting time for diagnostic services (Radiology - MRI)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Waiting time for diagnostic services (Radiology - MRI)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4d6; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI156') === true) { ?>
                    <?php
                    $table_feedback_KPI156 = 'bf_feedback_CQI4d7';
                    $ip_feedbacks_count156 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI156, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4d7; ?>'"
                        data-title="Waiting time for diagnostic services (Radiology - USG)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Waiting time for diagnostic services (Radiology - USG)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4d7; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI227') === true) { ?>
                    <?php
                    $table_feedback_KPI228 = 'bf_feedback_CQI3k46';
                    $ip_feedbacks_count228 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI228, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k46; ?>'"
                        data-title="Radiology TAT orders for CT (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Radiology TAT orders for CT (Radiology)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k46; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI228') === true) { ?>
                    <?php
                    $table_feedback_KPI229 = 'bf_feedback_CQI3k47';
                    $ip_feedbacks_count229 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI229, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k47; ?>'"
                        data-title="Radiology TAT orders for MRI (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Radiology TAT orders for MRI (Radiology)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k47; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI229') === true) { ?>
                    <?php
                    $table_feedback_KPI230 = 'bf_feedback_CQI3k48';
                    $ip_feedbacks_count230 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI230, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k48; ?>'"
                        data-title="Radiology TAT orders for USG (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Radiology TAT orders for USG (Radiology)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k48; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI230') === true) { ?>
                    <?php
                    $table_feedback_KPI231 = 'bf_feedback_CQI3k49';
                    $ip_feedbacks_count231 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI231, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k49; ?>'"
                        data-title="Radiology TAT orders for X-ray (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Radiology TAT orders for X-ray (Radiology)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k49; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI247') === true) { ?>
                    <?php
                    $table_feedback_KPI248 = 'bf_feedback_CQI4h2';
                    $ip_feedbacks_count248 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI248, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h2; ?>'"
                        data-title="TAT for radiology STAT orders (Radiology - CT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        TAT for radiology STAT orders (Radiology - CT)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI248') === true) { ?>
                    <?php
                    $table_feedback_KPI249 = 'bf_feedback_CQI4h3';
                    $ip_feedbacks_count249 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI249, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h3; ?>'"
                        data-title="TAT for radiology STAT orders (Radiology - MRI)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        TAT for radiology STAT orders (Radiology - MRI)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI249') === true) { ?>
                    <?php
                    $table_feedback_KPI250 = 'bf_feedback_CQI4h4';
                    $ip_feedbacks_count250 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI250, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h4; ?>'"
                        data-title="TAT for radiology STAT orders (Radiology - USG)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        TAT for radiology STAT orders (Radiology - USG)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI250') === true) { ?>
                    <?php
                    $table_feedback_KPI251 = 'bf_feedback_CQI4h5';
                    $ip_feedbacks_count251 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI251, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h5; ?>'"
                        data-title="HAZMAT compliance in radiology">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        HAZMAT compliance in radiology
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI251') === true) { ?>
                    <?php
                    $table_feedback_KPI252 = 'bf_feedback_CQI4h6';
                    $ip_feedbacks_count252 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI252, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h6; ?>'"
                        data-title="TLD Reading Compliance (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        TLD Reading Compliance (Radiology)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI334') === true) { ?>
                    <?php
                    $table_feedback_KPI335 = 'bf_feedback_CQI4i3';
                    $ip_feedbacks_count335 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI335, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i3; ?>'"
                        data-title="TAT compliance for radiology outsourced test (Radiology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        TAT compliance for radiology outsourced test (Radiology)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasNephrologyKPIs = (isfeature_active('QUALITY-KPI20') || isfeature_active('QUALITY-KPI214'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Nephrology</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI20') === true) { ?>
                    <?php
                    $table_feedback_KPI20 = 'bf_feedback_CQI3a20';
                    $ip_feedbacks_count20 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI20, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3a20; ?>'"
                        data-title="Percentage of patients undergoing dialysis who are able to achieve target hemoglobin levels (Nephrology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of patients undergoing dialysis who are able to achieve target hemoglobin levels (Nephrology)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3a20; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI214') === true) { ?>
                    <?php
                    $table_feedback_KPI215 = 'bf_feedback_CQI3k33';
                    $ip_feedbacks_count215 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI215, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k33; ?>'"
                        data-title="Survival rate for living donor kidney transplants (Nephrology)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Survival rate for living donor kidney transplants (Nephrology)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k33; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasMedicalAdminKPIs = (isfeature_active('QUALITY-KPI21') || isfeature_active('QUALITY-KPI117') || isfeature_active('QUALITY-KPI332') || isfeature_active('QUALITY-KPI333'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Medical Administration</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI21') === true) { ?>
                    <?php $table_feedback_KPI21 = 'bf_feedback_CQI3a21';
                    $ip_feedbacks_count21 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI21, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3a21; ?>'"
                        data-title="Percentage of Compliance rate of timeliness of physician responding to the reported critical results (JCI8-IPSG 2.0)- (Medical Administration)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Timely physician response to reported critical results (Medical Administration)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3a21; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI117') === true) { ?>
                    <?php $table_feedback_KPI117 = 'bf_feedback_CQI3j29';
                    $ip_feedbacks_count117 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI117, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j29; ?>'"
                        data-title="Shift change handover communication (Doctors - Ward)- (Medical Administration)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Shift change handover communication (Doctors - Ward)- (Medical Administration)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j29; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI332') === true) { ?>
                    <?php $table_feedback_KPI333 = 'bf_feedback_CQI4i1';
                    $ip_feedbacks_count333 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI333, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i1; ?>'"
                        data-title="Compliance to medical service requests - Heart, Lung transplantation (Medical Administration)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to medical service requests - Heart, Lung transplantation (Medical Administration)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i1; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI333') === true) { ?>
                    <?php $table_feedback_KPI334 = 'bf_feedback_CQI4i2';
                    $ip_feedbacks_count334 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI334, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i2; ?>'"
                        data-title="Compliance to medical service requests - Heart, Lung transplantation (Medical Administration)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to medical service requests - Heart, Liver transplantation (Medical Administration)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i2; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasOTKPIs = (isfeature_active('QUALITY-KPI31') || isfeature_active('QUALITY-KPI55') || isfeature_active('QUALITY-KPI56') || isfeature_active('QUALITY-KPI57') || isfeature_active('QUALITY-KPI59') || isfeature_active('QUALITY-KPI60') || isfeature_active('QUALITY-KPI62') || isfeature_active('QUALITY-KPI63') || isfeature_active('QUALITY-KPI138') || isfeature_active('QUALITY-KPI190') || isfeature_active('QUALITY-KPI216') || isfeature_active('QUALITY-KPI231') || isfeature_active('QUALITY-KPI232') || isfeature_active('QUALITY-KPI233') || isfeature_active('QUALITY-KPI369'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">OT</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI31') === true) { ?>
                    <?php
                    $table_feedback_KPI31 = 'bf_feedback_CQI3b9';
                    $ip_feedbacks_count31 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI31, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;" onclick="window.location.href='<?php echo $feedbacks_report_CQI3b9; ?>'" data-title="Percentage of employees in diagnostics adhering to safety precautions- (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Percentage of employees in diagnostics adhering to safety precautions- (OT)</div>
                                    <a href="<?php echo $feedbacks_report_CQI3b9; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI55') === true) { ?>
                    <?php
                    $table_feedback_KPI55 = 'bf_feedback_CQI3e1';
                    $ip_feedbacks_count55 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI55, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;" onclick="window.location.href='<?php echo $feedbacks_report_CQI3e1; ?>'" data-title="Percentage of unplanned return to OT">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Percentage of unplanned return to OT</div>
                                    <a href="<?php echo $feedbacks_report_CQI3e1; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI56') === true) { ?>
                    <?php
                    $table_feedback_KPI56 = 'bf_feedback_CQI3e2';
                    $ip_feedbacks_count56 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI56, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;" onclick="window.location.href='<?php echo $feedbacks_report_CQI3e2; ?>'" data-title="Percentage of re-scheduling of surgeries (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Percentage of re-scheduling of surgeries (OT)</div>
                                    <a href="<?php echo $feedbacks_report_CQI3e2; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI57') === true) { ?>
                    <?php $table_feedback_KPI57 = 'bf_feedback_CQI3e3';
                    $ip_feedbacks_count57 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI57, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3e3; ?>'"
                        data-title="Percentage of cases where organisations procedure to prevent surgery errors have been adhered(OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of cases where organisations procedure to prevent surgery errors have been adhered (OT)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3e3; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI59') === true) { ?>
                    <?php
                    $table_feedback_KPI59 = 'bf_feedback_CQI3e5';
                    $ip_feedbacks_count59 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI59, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;" onclick="window.location.href='<?php echo $feedbacks_report_CQI3e5; ?>'" data-title="Percentage of cases where the planned surgery were changed intraoperatively (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Percentage of cases where the planned surgery were changed intraoperatively (OT)</div>
                                    <a href="<?php echo $feedbacks_report_CQI3e5; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI60') === true) { ?>
                    <?php
                    $table_feedback_KPI60 = 'bf_feedback_CQI3e6';
                    $ip_feedbacks_count60 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI60, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;" onclick="window.location.href='<?php echo $feedbacks_report_CQI3e6; ?>'" data-title="Re-exploration Rate (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Re-exploration Rate (OT)</div>
                                    <a href="<?php echo $feedbacks_report_CQI3e6; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI62') === true) { ?>
                    <?php
                    $table_feedback_KPI62 = 'bf_feedback_CQI3e8';
                    $ip_feedbacks_count62 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI62, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;" onclick="window.location.href='<?php echo $feedbacks_report_CQI3e8; ?>'" data-title="Adverse events related to implant devices (JCI8-ASC 4.4)- (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Adverse events related to implant devices (JCI8-ASC 4.4)- (OT)</div>
                                    <a href="<?php echo $feedbacks_report_CQI3e8; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI63') === true) { ?>
                    <?php $table_feedback_KPI63 = 'bf_feedback_CQI3e9';
                    $ip_feedbacks_count63 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI63, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3e9; ?>'"
                        data-title="All major patient safety events or errors related to surgical procedures (JCI8-QPS 3.04)- (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        All major patient safety events or errors related to surgical procedures (JCI8-QPS 3.04)- (OT)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3e9; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI138') === true) { ?>
                    <?php
                    $table_feedback_KPI138 = 'bf_feedback_CQI4c3';
                    $ip_feedbacks_count138 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI138, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 0px;" onclick="window.location.href='<?php echo $feedbacks_report_CQI4c3; ?>'" data-title="OT Utilization Rate (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">OT Utilization Rate (OT)</div>
                                    <a href="<?php echo $feedbacks_report_CQI4c3; ?>" style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI190') === true) { ?>
                    <?php $table_feedback_KPI191 = 'bf_feedback_CQI3k9';
                    $ip_feedbacks_count191 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI191, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k9; ?>'"
                        data-title="Average recovery time (OT-Post OP)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Average recovery time (OT-Post OP)</div>
                                    <a href="<?php echo $feedbacks_report_CQI3k9; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI216') === true) { ?>
                    <?php $table_feedback_KPI217 = 'bf_feedback_CQI3k35';
                    $ip_feedbacks_count217 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI217, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k35; ?>'"
                        data-title="Major Discrepancies between Preoperative and Post operative Diagnosis (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Major Discrepancies between Preoperative and Post operative Diagnosis (OT)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k35; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI231') === true) { ?>
                    <?php $table_feedback_KPI232 = 'bf_feedback_CQI3k50';
                    $ip_feedbacks_count232 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI232, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k50; ?>'"
                        data-title="Site Marking Compliance Rate (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Site Marking Compliance Rate (OT)</div>
                                    <a href="<?php echo $feedbacks_report_CQI3k50; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI232') === true) { ?>
                    <?php $table_feedback_KPI233 = 'bf_feedback_CQI3k51';
                    $ip_feedbacks_count233 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI233, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k51; ?>'"
                        data-title="Time Out Compliance Rate (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Time Out Compliance Rate (OT)</div>
                                    <a href="<?php echo $feedbacks_report_CQI3k51; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI233') === true) { ?>
                    <?php $table_feedback_KPI234 = 'bf_feedback_CQI3k52';
                    $ip_feedbacks_count234 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI234, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k52; ?>'"
                        data-title="Sign Out Compliance Rate (OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">Sign Out Compliance Rate (OT)</div>
                                    <a href="<?php echo $feedbacks_report_CQI3k52; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (isfeature_active('QUALITY-KPI369') === true) { ?>
                        <?php $table_feedback_KPI233 = 'bf_feedback_CQI3k66';
                        $ip_feedbacks_count233 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI233, $sorttime, $setup); ?>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                            style="margin-top: 0px;"
                            onclick="window.location.href='<?php echo $feedbacks_report_CQI3k66; ?>'"
                            data-title="Time Out Compliance Rate (OT)">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px; padding-top:0px;">
                                    <div class="statistic-box" style="padding-top: 44px;">
                                        <div class="small" style="font-size: 20px;">Number of Patient safety events or patterns of events during procedural sedation</div>
                                        <a href="<?php echo $feedbacks_report_CQI3k66; ?>"
                                            style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                            Explore
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasClinicalPharmacyKPIs = (isfeature_active('QUALITY-KPI36') || isfeature_active('QUALITY-KPI37') || isfeature_active('QUALITY-KPI38') || isfeature_active('QUALITY-KPI39') || isfeature_active('QUALITY-KPI40') || isfeature_active('QUALITY-KPI41') || isfeature_active('QUALITY-KPI42') || isfeature_active('QUALITY-KPI43') || isfeature_active('QUALITY-KPI47') || isfeature_active('QUALITY-KPI48') || isfeature_active('QUALITY-KPI49') || isfeature_active('QUALITY-KPI54') || isfeature_active('QUALITY-KPI58') || isfeature_active('QUALITY-KPI94') || isfeature_active('QUALITY-KPI187') || isfeature_active('QUALITY-KPI188'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Clinical Pharmacy</h2>
                </div>
                <?php if (isfeature_active('QUALITY-KPI36') === true) { ?>
                    <?php $table_feedback_KPI36 = 'bf_feedback_CQI3c1';
                    $ip_feedbacks_count36 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI36, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c1; ?>'"
                        data-title="Medication Errors Rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Medication Errors Rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c1; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI37') === true) { ?>
                    <?php $table_feedback_KPI37 = 'bf_feedback_CQI3c2';
                    $ip_feedbacks_count37 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI37, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c2; ?>'"
                        data-title="Incidence of medication errors - Prescription errors (IP) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of medication errors - Prescription errors (IP) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c2; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI38') === true) { ?>
                    <?php $table_feedback_KPI38 = 'bf_feedback_CQI3c3';
                    $ip_feedbacks_count38 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI38, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c3; ?>'"
                        data-title="Incidence of medication errors - Dispensing errors (IP) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of medication errors - Dispensing errors (IP) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c3; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI39') === true) { ?>
                    <?php $table_feedback_KPI39 = 'bf_feedback_CQI3c4';
                    $ip_feedbacks_count39 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI39, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c4; ?>'"
                        data-title="Percentage of admissions with ADR ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of admissions with ADR 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI40') === true) { ?>
                    <?php $table_feedback_KPI40 = 'bf_feedback_CQI3c5';
                    $ip_feedbacks_count40 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI40, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c5; ?>'"
                        data-title="Percentage of medication charts with error prone abbreviations ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of medication charts with error prone abbreviations 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c5; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI41') === true) { ?>
                    <?php $table_feedback_KPI41 = 'bf_feedback_CQI3c6';
                    $ip_feedbacks_count41 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI41, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c6; ?>'"
                        data-title="Percentage of patients receiving high risk medication developing adverse drug event ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of patients receiving high risk medication developing adverse drug event 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c6; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI42') === true) { ?>
                    <?php $table_feedback_KPI42 = 'bf_feedback_CQI3c7';
                    $ip_feedbacks_count42 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI42, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c7; ?>'"
                        data-title="Incidence of Medication Administering errors ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of Medication Administering errors 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c7; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI43') === true) { ?>
                    <?php $table_feedback_KPI43 = 'bf_feedback_CQI3c8';
                    $ip_feedbacks_count43 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI43, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c8; ?>'"
                        data-title="Percentage of in-patients developing adverse drug reaction ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of in-patients developing adverse drug reaction 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c8; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- <?php if (isfeature_active('QUALITY-KPI44') === true) { ?>
                <?php $table_feedback_KPI44 = 'bf_feedback_CQI3c9';
                            $ip_feedbacks_count44 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI44, $sorttime, $setup); ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3c9; ?>'"
                    data-title="Incidence of Medication Administering errors- ">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 44px;">
                                <div class="small" style="font-size: 20px;">
                                    Incidence of Medication Administering errors- 
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3c9; ?>"
                                    style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                    Explore
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?> -->
                <!-- <?php if (isfeature_active('QUALITY-KPI45') === true) { ?>
                <?php $table_feedback_KPI45 = 'bf_feedback_CQI3c10';
                            $ip_feedbacks_count45 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI45, $sorttime, $setup); ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3c10; ?>'"
                    data-title="Incidence of medication errors- Dispensing errors (IP)- ">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 44px;">
                                <div class="small" style="font-size: 20px;">
                                    Incidence of medication errors- Dispensing errors (IP)- 
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3c10; ?>"
                                    style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                    Explore
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (isfeature_active('QUALITY-KPI46') === true) { ?>
                <?php $table_feedback_KPI46 = 'bf_feedback_CQI3c11';
                $ip_feedbacks_count46 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI46, $sorttime, $setup); ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                    style="margin-top: 0px;"
                    onclick="window.location.href='<?php echo $feedbacks_report_CQI3c11; ?>'"
                    data-title="Incidence of medication errors- Prescription errors (IP)- ">
                    <div class="panel panel-bd">
                        <div class="panel-body" style="height: 100px; padding-top:0px;">
                            <div class="statistic-box" style="padding-top: 44px;">
                                <div class="small" style="font-size: 20px;">
                                    Incidence of medication errors- Prescription errors (IP)- 
                                </div>
                                <a href="<?php echo $feedbacks_report_CQI3c11; ?>"
                                    style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                    Explore
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?> -->


                <?php if (isfeature_active('QUALITY-KPI47') === true) { ?>
                    <?php $table_feedback_KPI47 = 'bf_feedback_CQI3c12';
                    $ip_feedbacks_count47 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI47, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c12; ?>'"
                        data-title="Emperical Antibiotics therapy compliance rate for high risk infections (JCI8-MMU1.1) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Emperical Antibiotics therapy compliance rate for high risk infections (JCI8-MMU1.1) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c12; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI48') === true) { ?>
                    <?php $table_feedback_KPI48 = 'bf_feedback_CQI3c13';
                    $ip_feedbacks_count48 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI48, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c13; ?>'"
                        data-title="Restricted antibiotics usage compliance rate (JCI8-MMU1.1) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Restricted antibiotics usage compliance rate (JCI8-MMU1.1) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c13; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI49') === true) { ?>
                    <?php $table_feedback_KPI49 = 'bf_feedback_CQI3c14';
                    $ip_feedbacks_count49 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI49, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3c14; ?>'"
                        data-title="Monitor data related to appropriateness of indication for the new drugs (JCI8-MMU2.0) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Monitor data related to appropriateness of indication for the new drugs (JCI8-MMU2.0) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3c14; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI54') === true) { ?>
                    <?php $table_feedback_KPI54 = 'bf_feedback_CQI3d5';
                    $ip_feedbacks_count54 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI54, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3d5; ?>'"
                        data-title="Percentage of safe and rational prescriptions (Clinical Pharmacy- IP)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of safe and rational prescriptions (Clinical Pharmacy- IP)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3d5; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI58') === true) { ?>
                    <?php $table_feedback_KPI58 = 'bf_feedback_CQI3e4';
                    $ip_feedbacks_count58 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI58, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3e4; ?>'"
                        data-title="Percentage of cases receiving appropriate prophylactic antibiotics with specified time frame ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of cases receiving appropriate prophylactic antibiotics with specified time frame 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3e4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI94') === true) { ?>
                    <?php $table_feedback_KPI94 = 'bf_feedback_CQI3j6';
                    $ip_feedbacks_count94 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI94, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j6; ?>'"
                        data-title="Compliance rate to medication prescription in capitals ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance rate to medication prescription in capitals 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j6; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI187') === true) { ?>
                    <?php $table_feedback_KPI188 = 'bf_feedback_CQI3k6';
                    $ip_feedbacks_count188 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI188, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k6; ?>'"
                        data-title="Monitoring the duration of antibiotic usage in surgical prophylaxis (After 48 hours) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Monitoring the duration of antibiotic usage in surgical prophylaxis (After 48 hours) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k6; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI188') === true) { ?>
                    <?php $table_feedback_KPI189 = 'bf_feedback_CQI3k7';
                    $ip_feedbacks_count189 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI189, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k7; ?>'"
                        data-title="De-escalation of antibiotics ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        De-escalation of antibiotics 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k7; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasAnesthesiaKPIs = (isfeature_active('QUALITY-KPI50') || isfeature_active('QUALITY-KPI51') || isfeature_active('QUALITY-KPI52') || isfeature_active('QUALITY-KPI53'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Anasthesia</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI50') === true) { ?>
                    <?php $table_feedback_KPI50 = 'bf_feedback_CQI3d1';
                    $ip_feedbacks_count50 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI50, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3d1; ?>'"
                        data-title="Percentage of modification of anaesthesia plan (OT-Anasthesia)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of modification of anaesthesia plan (OT-Anasthesia)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3d1; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI51') === true) { ?>
                    <?php $table_feedback_KPI51 = 'bf_feedback_CQI3d2';
                    $ip_feedbacks_count51 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI51, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3d2; ?>'"
                        data-title="Percentage of unplanned ventilation following anaesthesia (OT-Anasthesia)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of unplanned ventilation following anaesthesia (OT-Anasthesia)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3d2; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI52') === true) { ?>
                    <?php $table_feedback_KPI52 = 'bf_feedback_CQI3d3';
                    $ip_feedbacks_count52 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI52, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3d3; ?>'"
                        data-title="Percentage of adverse anaesthesia events following anaesthesia (OT-Anasthesia)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of adverse anaesthesia events following anaesthesia (OT-Anasthesia)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3d3; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI53') === true) { ?>
                    <?php $table_feedback_KPI53 = 'bf_feedback_CQI3d4';
                    $ip_feedbacks_count53 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI53, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3d4; ?>'"
                        data-title="Anaesthesia related mortality rate (OT - Anasthesia)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Anaesthesia related mortality rate (OT - Anasthesia)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3d4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasBloodCenterKPIs = (isfeature_active('QUALITY-KPI64') || isfeature_active('QUALITY-KPI65') || isfeature_active('QUALITY-KPI66') || isfeature_active('QUALITY-KPI67') || isfeature_active('QUALITY-KPI68') || isfeature_active('QUALITY-KPI69') || isfeature_active('QUALITY-KPI70') || isfeature_active('QUALITY-KPI71') || isfeature_active('QUALITY-KPI72') || isfeature_active('QUALITY-KPI73') || isfeature_active('QUALITY-KPI331'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Blood Center</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI64') === true) { ?>
                    <?php $table_feedback_KPI64 = 'bf_feedback_CQI3f1';
                    $ip_feedbacks_count64 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI64, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f1; ?>'"
                        data-title="Percentage of transfusion reactions (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of transfusion reactions (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f1; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI65') === true) { ?>
                    <?php $table_feedback_KPI65 = 'bf_feedback_CQI3f2';
                    $ip_feedbacks_count65 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI65, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f2; ?>'"
                        data-title="Percentage of waste of blood and blood components among those issued (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of waste of blood and blood components among those issued (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f2; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI66') === true) { ?>
                    <?php $table_feedback_KPI66 = 'bf_feedback_CQI3f3';
                    $ip_feedbacks_count66 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI66, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f3; ?>'"
                        data-title="Percentage of waste of blood and blood components among those stored (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of waste of blood and blood components among those stored (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f3; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI67') === true) { ?>
                    <?php $table_feedback_KPI67 = 'bf_feedback_CQI3f4';
                    $ip_feedbacks_count67 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI67, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f4; ?>'"
                        data-title="Percentage of number of blood component units used (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of number of blood component units used (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI68') === true) { ?>
                    <?php $table_feedback_KPI68 = 'bf_feedback_CQI3f5';
                    $ip_feedbacks_count68 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI68, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f5; ?>'"
                        data-title="Turn-around time for blood and blood components cross matched / reserved (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Turn-around time for blood and blood components cross matched / reserved (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f5; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI69') === true) { ?>
                    <?php $table_feedback_KPI69 = 'bf_feedback_CQI3f6';
                    $ip_feedbacks_count69 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI69, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f6; ?>'"
                        data-title="Adverse events and near miss events involving blood bank and/or transfusion services (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Adverse/near miss events in blood transfusion (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f6; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI70') === true) { ?>
                    <?php $table_feedback_KPI70 = 'bf_feedback_CQI3f7';
                    $ip_feedbacks_count70 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI70, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f7; ?>'"
                        data-title="Blood Availability Rate (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Blood Availability Rate (JCI8-AOP 4.00)- (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f7; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI71') === true) { ?>
                    <?php $table_feedback_KPI71 = 'bf_feedback_CQI3f8';
                    $ip_feedbacks_count71 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI71, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f8; ?>'"
                        data-title="CT Ratio (Cross match to transfusion) (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        CT Ratio (Cross match to transfusion) (JCI8-AOP 4.00)- (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f8; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI72') === true) { ?>
                    <?php $table_feedback_KPI72 = 'bf_feedback_CQI3f9';
                    $ip_feedbacks_count72 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI72, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f9; ?>'"
                        data-title="Turnaround time for Platelet Apheresis (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Turnaround time for Platelet Apheresis (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f9; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI73') === true) { ?>
                    <?php $table_feedback_KPI73 = 'bf_feedback_CQI3f10';
                    $ip_feedbacks_count73 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI73, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3f10; ?>'"
                        data-title="Turnaround time for blood donation (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Turnaround time for blood donation (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3f10; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI331') === true) { ?>
                    <?php $table_feedback_KPI332 = 'bf_feedback_CLOTCM30';
                    $ip_feedbacks_count332 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI332, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM30; ?>'"
                        data-title="Prevalence of transfusion reactions in Leuco depleted PRBC transfusions (Blood Center)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Prevalence of transfusion reactions in Leuco depleted PRBC transfusions (Blood Center)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM30; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>

    <?php endif; ?>



    <?php if ($hasInfectionControlKPIs = (isfeature_active('QUALITY-KPI74') || isfeature_active('QUALITY-KPI75') || isfeature_active('QUALITY-KPI76') || isfeature_active('QUALITY-KPI77') || isfeature_active('QUALITY-KPI93') || isfeature_active('QUALITY-KPI115') || isfeature_active('QUALITY-KPI131') || isfeature_active('QUALITY-KPI169') || isfeature_active('QUALITY-KPI170') || isfeature_active('QUALITY-KPI173') || isfeature_active('QUALITY-KPI174') || isfeature_active('QUALITY-KPI184') || isfeature_active('QUALITY-KPI185') || isfeature_active('QUALITY-KPI186') || isfeature_active('QUALITY-KPI215') || isfeature_active('QUALITY-KPI218') || isfeature_active('QUALITY-KPI219') || isfeature_active('QUALITY-KPI220') || isfeature_active('QUALITY-KPI318') || isfeature_active('QUALITY-KPI319') || isfeature_active('QUALITY-KPI320') || isfeature_active('QUALITY-KPI321') || isfeature_active('QUALITY-KPI322') || isfeature_active('QUALITY-KPI323') || isfeature_active('QUALITY-KPI324') || isfeature_active('QUALITY-KPI325') || isfeature_active('QUALITY-KPI326') || isfeature_active('QUALITY-KPI327') || isfeature_active('QUALITY-KPI328') || isfeature_active('QUALITY-KPI329') || isfeature_active('QUALITY-KPI330'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Infection Control</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI74') === true) { ?>
                    <?php
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI3g1';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3g1; ?>'"
                        data-title="<?php echo strtolower('Catheter associated urinary tract infection rate (Infection Control - Nursing)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Catheter associated urinary tract infection rate (Infection Control - Nursing)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3g1; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
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
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3g2; ?>'"
                        data-title="<?php echo strtolower('Ventilator Associated Pneumonias (VAP) in 1000 ventilator days (Infection Control - Nursing)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ventilator Associated Pneumonias (VAP) in 1000 ventilator days (Infection Control - Nursing)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3g2; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
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
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3g3; ?>'"
                        data-title="<?php echo strtolower('Central Line Associated Blood Stream Infection (CLABSI)- (Infection Control - Nursing)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Central Line Associated Blood Stream Infection (CLABSI)- (Infection Control - Nursing)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3g3; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
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
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3g4; ?>'"
                        data-title="<?php echo strtolower('Surgical site infection rate (Infection Control - Nursing)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Surgical site infection rate (Infection Control - Nursing)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3g4; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI93') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j5; ?>'"
                        data-title="Number of missed hand hygiene opportunities (Infection Control - Nursing)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Number of missed hand hygiene opportunities (Infection Control - Nursing)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j5; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI115') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j27; ?>'"
                        data-title="Compliance to hand hygiene practice (New) - (Infection Control - Nursing)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to hand hygiene practice (New) - (Infection Control - Nursing)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j27; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI131') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4b4; ?>'"
                        data-title="Percentage of staff provided with pre-exposure prophylaxis (Infection Control)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of staff provided with pre-exposure prophylaxis (Infection Control)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4b4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI169') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4f1; ?>'"
                        data-title="Incidence of needle stick injuries IPD area (Infection Control - IPD)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of needle stick injuries IPD area (in 1000 IPD days) - (Infection Control - IPD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4f1; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI170') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4f2; ?>'"
                        data-title="Incidence of needle stick injuries OPD area (Infection Control - OPD)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of needle stick injuries OPD area (in 1000 OPD days) - (Infection Control - OPD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4f2; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI173') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4f5; ?>'"
                        data-title="Incidence of blood body fluid exposure IPD (Infection Control - IPD)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of blood body fluid exposure IPD (Infection Control - IPD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4f5; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI174') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4f6; ?>'"
                        data-title="Incidence of blood body fluid exposure OPD (Infection Control - OPD)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of blood body fluid exposure OPD (Infection Control - OPD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4f6; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI184') === true) { ?>
                    <?php $table_feedback_KPI185 = 'bf_feedback_CQI3k3';
                    $ip_feedbacks_count185 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI185, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k3; ?>'"
                        data-title="Inguinal herniorrhaphy with mesh (Infection Control)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Inguinal herniorrhaphy with mesh (Infection Control)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k3; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI185') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k4; ?>'"
                        data-title="Coronary artery bypass grafting (CABG) (Infection Control)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Coronary artery bypass grafting (CABG) (Infection Control)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI186') === true) { ?>
                    <?php $table_feedback_KPI187 = 'bf_feedback_CQI3k5';
                    $ip_feedbacks_count187 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI187, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k5; ?>'"
                        data-title="Laparoscopic cholecystectomy (Infection Control)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Laparoscopic cholecystectomy (Infection Control)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k5; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI215') === true) { ?>
                    <?php $table_feedback_KPI216 = 'bf_feedback_CQI3k34';
                    $ip_feedbacks_count216 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI216, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k34; ?>'"
                        data-title="CAUTI Prevention Bundle compliance Rate (Infection Control)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        CAUTI Prevention Bundle compliance Rate (Infection Control)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k34; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI218') === true) { ?>
                    <?php $table_feedback_KPI219 = 'bf_feedback_CQI3k37';
                    $ip_feedbacks_count219 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI219, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k37; ?>'"
                        data-title="CLABSI Prevention Bundle compliance Rate (Infection Control)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        CLABSI Prevention Bundle compliance Rate (Infection Control)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k37; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI219') === true) { ?>
                    <?php $table_feedback_KPI220 = 'bf_feedback_CQI3k38';
                    $ip_feedbacks_count220 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI220, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k38; ?>'"
                        data-title="SSI Prevention Bundle compliance Rate (Infection Control)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        SSI Prevention Bundle compliance Rate (Infection Control)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k38; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI220') === true) { ?>
                    <?php $table_feedback_KPI221 = 'bf_feedback_CQI3k39';
                    $ip_feedbacks_count221 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI221, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k39; ?>'"
                        data-title="VAP Prevention Bundle compliance Rate (Infection Control)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        VAP Prevention Bundle compliance Rate (Infection Control)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k39; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI318') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM17; ?>'"
                        data-title="Catheter associated urinary tract infection rate (Infection Control - ICU1)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Catheter associated urinary tract infection rate (Infection Control - ICU1)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM17; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI319') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM18; ?>'"
                        data-title="Catheter associated urinary tract infection rate (Infection Control - ICU2)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Catheter associated urinary tract infection rate (Infection Control - ICU2)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM18; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI320') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM19; ?>'"
                        data-title="Catheter associated urinary tract infection rate (Infection Control - ICU3)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Catheter associated urinary tract infection rate (Infection Control - ICU3)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM19; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI321') === true) { ?>
                    <?php $table_feedback_KPI322 = 'bf_feedback_CLOTCM20';
                    $ip_feedbacks_count322 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI322, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM20; ?>'"
                        data-title="Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - ICU1)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - ICU1)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM20; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI322') === true) { ?>
                    <?php $table_feedback_KPI323 = 'bf_feedback_CLOTCM21';
                    $ip_feedbacks_count323 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI323, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM21; ?>'"
                        data-title="Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - ICU2)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - ICU2)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM21; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI323') === true) { ?>
                    <?php $table_feedback_KPI324 = 'bf_feedback_CLOTCM22';
                    $ip_feedbacks_count324 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI324, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM22; ?>'"
                        data-title="Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - ICU3)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - ICU3)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM22; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI324') === true) { ?>
                    <?php $table_feedback_KPI325 = 'bf_feedback_CLOTCM23';
                    $ip_feedbacks_count325 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI325, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM23; ?>'"
                        data-title="Surgical Site Infection rate (Infection Control - Ortho THR)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Surgical Site Infection rate (Infection Control - Ortho THR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM23; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI325') === true) { ?>
                    <?php $table_feedback_KPI326 = 'bf_feedback_CLOTCM24';
                    $ip_feedbacks_count326 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI326, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM24; ?>'"
                        data-title="Surgical Site Infection rate (Infection Control - Ortho TKR)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Surgical Site Infection rate (Infection Control - Ortho TKR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM24; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI326') === true) { ?>
                    <?php $table_feedback_KPI327 = 'bf_feedback_CLOTCM25';
                    $ip_feedbacks_count327 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI327, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM25; ?>'"
                        data-title="Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - ICU1)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - ICU1)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM25; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI327') === true) { ?>
                    <?php $table_feedback_KPI328 = 'bf_feedback_CLOTCM26';
                    $ip_feedbacks_count328 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI328, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM26; ?>'"
                        data-title="Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - ICU2)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - ICU2)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM26; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI328') === true) { ?>
                    <?php $table_feedback_KPI329 = 'bf_feedback_CLOTCM27';
                    $ip_feedbacks_count329 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI329, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM27; ?>'"
                        data-title="Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - ICU3)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - ICU3)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM27; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>



                <?php if (isfeature_active('QUALITY-KPI329') === true) { ?>
                    <?php $table_feedback_KPI330 = 'bf_feedback_CLOTCM28';
                    $ip_feedbacks_count330 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI330, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM28; ?>'"
                        data-title="Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - Ortho THR)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - Ortho THR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM28; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI330') === true) { ?>
                    <?php $table_feedback_KPI331 = 'bf_feedback_CLOTCM29';
                    $ip_feedbacks_count331 = $this->quality_model->patient_and_feedback_quality($table_feedback_KPI331, $sorttime, $setup); ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CLOTCM29; ?>'"
                        data-title="Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - Ortho TKR)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - Ortho TKR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CLOTCM29; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>


    <?php if ($hasHousekeepingKPIs = (isfeature_active('QUALITY-KPI79') || isfeature_active('QUALITY-KPI280') || isfeature_active('QUALITY-KPI281') || isfeature_active('QUALITY-KPI282') || isfeature_active('QUALITY-KPI283') || isfeature_active('QUALITY-KPI285') || isfeature_active('QUALITY-KPI292') || isfeature_active('QUALITY-KPI293') || isfeature_active('QUALITY-KPI335') || isfeature_active('QUALITY-KPI336') || isfeature_active('QUALITY-KPI337') || isfeature_active('QUALITY-KPI339') || isfeature_active('QUALITY-KPI341') || isfeature_active('QUALITY-KPI342') || isfeature_active('QUALITY-KPI343') || isfeature_active('QUALITY-KPI344') || isfeature_active('QUALITY-KPI345'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Housekeeping</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI79') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3g6; ?>'"
                        data-title="Environmental cleaning & disinfection compliance rate (JCI8-PCI 4.0)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Environmental cleaning & disinfection compliance rate (JCI8-PCI 4.0)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3g6; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI280') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h35; ?>'"
                        data-title="Medical Waste Collection Rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Medical Waste Collection Rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h35; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI281') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h36; ?>'"
                        data-title="Compliance to MSDS in Facility ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to MSDS in Facility 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h36; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI282') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h37; ?>'"
                        data-title="Percentage of Pest control Complaints rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of Pest control Complaints rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h37; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI283') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h38; ?>'"
                        data-title="Linen Quality - Compliance Rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Linen Quality - Compliance Rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h38; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI285') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h40; ?>'"
                        data-title="Outsourced staff manpower compliance rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Outsourced staff manpower compliance rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h40; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI292') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h47; ?>'"
                        data-title="Compliances in patient room cleaning and hygiene practices ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliances in patient room cleaning and hygiene practices 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h47; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI293') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h48; ?>'"
                        data-title="Patient's Complaints Rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Patient's Complaints Rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h48; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI335') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i4; ?>'"
                        data-title="Food waste collection rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Food waste collection rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI336') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i5; ?>'"
                        data-title="Solid waste collection rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Solid waste collection rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i5; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI337') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i6; ?>'"
                        data-title="Outsourced GDA (General Duty Assistance) absenteeism rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Outsourced GDA (General Duty Assistance) absenteeism rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i6; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>



                <?php if (isfeature_active('QUALITY-KPI339') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i8; ?>'"
                        data-title="Outsourced UTIZ staff attendance ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Outsourced UTIZ staff attendance 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i8; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI341') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i10; ?>'"
                        data-title="Number of laundry loads reduced by optimizing and sorting laundry (JCI8-GHI 3) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Number of laundry loads reduced by optimizing and sorting laundry (JCI8-GHI 3) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i10; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI342') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i11; ?>'"
                        data-title="Percentage of cleaning products used biodegradable (JCI8-GHI 3) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of cleaning products used biodegradable (JCI8-GHI 3) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i11; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI343') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i12; ?>'"
                        data-title="Average use of Ecofriendly catering supplies in a month (carbon intensity reduction - JCI8-GHI 3) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Average use of Ecofriendly catering supplies in a month (carbon intensity reduction - JCI8-GHI 3) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i12; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI344') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i13; ?>'"
                        data-title="Average monthly medical waste disposed ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Average monthly medical waste disposed 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i13; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI345') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i14; ?>'"
                        data-title="Non-Recyclable Waste per Patient Day (Kg) - (JCI8-GHI 3) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Non-Recyclable Waste per Patient Day (Kg) - (JCI8-GHI 3) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i14; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasQualityOfficeKPIs = (isfeature_active('QUALITY-KPI92') || isfeature_active('QUALITY-KPI109') || isfeature_active('QUALITY-KPI110') || isfeature_active('QUALITY-KPI111') || isfeature_active('QUALITY-KPI129') || isfeature_active('QUALITY-KPI135') || isfeature_active('QUALITY-KPI171') || isfeature_active('QUALITY-KPI172') || isfeature_active('QUALITY-KPI183') || isfeature_active('QUALITY-KPI217') || isfeature_active('QUALITY-KPI254'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Quality Office</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI92') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j4; ?>'"
                        data-title="Incidence of patient identification error ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of patient identification error 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI109') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j21; ?>'"
                        data-title="IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - Endoscopy)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - Endoscopy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j21; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI110') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j22; ?>'"
                        data-title="IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - ICU)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - ICU)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j22; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI111') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j23; ?>'"
                        data-title="IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - OT)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - OT)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j23; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI129') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4b2; ?>'"
                        data-title="Incidence of falls (in 1000 IPD days) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of falls (in 1000 IPD days) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4b2; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI135') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4b8; ?>'"
                        data-title="Monitoring of Clinical Errors (JCI8-PCC 2.3) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Monitoring of Clinical Errors (JCI8-PCC 2.3) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4b8; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI171') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4f3; ?>'"
                        data-title="Percentage of sentinel events, reported, collected and analysed within the defined time frame ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of sentinel events, reported, collected and analysed within the defined time frame 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4f3; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI172') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4f4; ?>'"
                        data-title="Percentage of near misses ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of near misses 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4f4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI183') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k2; ?>'"
                        data-title="Adverse events due to handover ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Adverse events due to handover 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k2; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI217') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k36; ?>'"
                        data-title="Adverse Events Related to patient Identification ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Adverse Events Related to patient Identification 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k36; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI254') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h9; ?>'"
                        data-title="Incident report rate ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incident report rate 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h9; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasPhysiotherapyKPIs = (isfeature_active('QUALITY-KPI114') || isfeature_active('QUALITY-KPI118') || isfeature_active('QUALITY-KPI119') || isfeature_active('QUALITY-KPI226') || isfeature_active('QUALITY-KPI240') || isfeature_active('QUALITY-KPI246'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Physiotherapy</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI114') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j26; ?>'"
                        data-title="IPSG 6 - Compliance to Fall prevention measures in Physiotherapy OP patients- (Physical therapy and Rehabilitation Department - Physiotherapy)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        IPSG 6 – Compliance with fall prevention in Physiotherapy OPD patients.
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j26; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI118') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j30; ?>'"
                        data-title="Incidence of Adverse events in Physiotherapy (IPD)- (Physical therapy and Rehabilitation Department - Physiotherapy)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of Adverse events in Physiotherapy (IPD)- (Physical therapy and Rehabilitation Department - Physiotherapy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j30; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI119') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j31; ?>'"
                        data-title="Incidence of Adverse events in Physiotherapy (OPD)- (Physical therapy and Rehabilitation Department - Physiotherapy)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Incidence of Adverse events in Physiotherapy (OPD)- (Physical therapy and Rehabilitation Department - Physiotherapy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j31; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI226') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k45; ?>'"
                        data-title="Percentage of cases where initial assessment done in physiotherapy within 24 hours (IPD) - Physical therapy and Rehabilitation Department - Medical records">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Physiotherapy initial assessment done within 24 hrs (IPD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k45; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI240') === true) { ?>
                    <?php
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI3k59';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 0px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k59; ?>'"
                        data-title="<?php echo strtolower('Percentage of cases where in Initial assessment done in physiotherapy within 24 hours (OPD) - (Physical therapy and Rehabilitation Department - Medical records)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Physiotherapy initial assessment done within 24 hrs (OPD)
                                        <a href="javascript:void()" data-toggle="tooltip" title="<?php echo $initial_assesment_info_tooltip; ?>">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k59; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI246') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h1; ?>'"
                        data-title="Patient satisfaction index - Physiotherapy (Physical therapy and Rehabilitation Department)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Patient satisfaction index - Physiotherapy (Physical therapy and Rehabilitation Department)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h1; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>


    <?php if ($hasSecuritySafetyKPIs = (isfeature_active('QUALITY-KPI120') || isfeature_active('QUALITY-KPI121') || isfeature_active('QUALITY-KPI122') || isfeature_active('QUALITY-KPI130') || isfeature_active('QUALITY-KPI132') || isfeature_active('QUALITY-KPI271') || isfeature_active('QUALITY-KPI297'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Security & Safety</h2>
                </div>
                <?php if (isfeature_active('QUALITY-KPI120') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j32; ?>'"
                        data-title="Rate of Safety, security incidents related to Work place violence (JCI8-FMS 3.0, 4.0)- (Security and Safety)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Rate of Safety, security incidents related to Work place violence (JCI8-FMS 3.0, 4.0)- (Security and Safety)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j32; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI121') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j33; ?>'"
                        data-title="Security incidents rate (JCI8-FMS 4.0)- (Safety & Security)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Security incidents rate (JCI8-FMS 4.0)- (Safety & Security)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j33; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI122') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3j34; ?>'"
                        data-title="Safety incidents rate (JCI8-FMS 3.0)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Safety incidents rate (JCI8-FMS 3.0)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3j34; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI130') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4b3; ?>'"
                        data-title="Number of variations observed in mock drill (Safety & Security)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Number of variations observed in mock drill (Safety & Security)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4b3; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI132') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4b5; ?>'"
                        data-title="Number of Fire Incidents (Safety & Security)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Number of Fire Incidents (Safety & Security)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4b5; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI271') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h26; ?>'"
                        data-title="Outsourced Security service Staff Attendance (Safety & Security - Security)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Outsourced Security service Staff Attendance (Safety & Security - Security)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h26; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI297') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h52; ?>'"
                        data-title="Percentage of adherence to facility audit observation closure (Safety & Security)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of adherence to facility audit observation closure (Safety & Security)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h52; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasPharmacyKPIs = (isfeature_active('QUALITY-KPI123') || isfeature_active('QUALITY-KPI124') || isfeature_active('QUALITY-KPI125') || isfeature_active('QUALITY-KPI189') || isfeature_active('QUALITY-KPI255') || isfeature_active('QUALITY-KPI256'))): ?>


        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Pharmacy</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI123') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4a1; ?>'"
                        data-title="Percentage of drugs and consumables procured by local purchases within the formulary (Pharmacy)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of drugs and consumables procured by local purchases within the formulary (Pharmacy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4a1; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI124') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4a2; ?>'"
                        data-title="Percentage of drugs and consumables procured by local purchase outside the formulary (Pharmacy)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of drugs and consumables procured by local purchase outside the formulary (Pharmacy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4a2; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI125') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4a3; ?>'"
                        data-title="Stock out rate of emergency medications (Pharmacy)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Stock out rate of emergency medications (Pharmacy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4a3; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI189') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k8; ?>'"
                        data-title="High Alert Medication Segregation, storage & labelling Compliance rate (Pharmacy - Store)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        High Alert Medication Segregation, storage & labelling Compliance rate (Pharmacy - Store)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k8; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI255') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h10; ?>'"
                        data-title="TAT for dispensing medicine - IP (Pharmacy)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        TAT for dispensing medicine - IP (Pharmacy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h10; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI256') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h11; ?>'"
                        data-title="TAT for STAT medicine (Pharmacy)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        TAT for STAT medicine (Pharmacy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h11; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasSCMStoreKPIs = isfeature_active('QUALITY-KPI126')): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">SCM-Store</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI126') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4a4; ?>'"
                        data-title="Percentage of drugs and consumables rejected before preparation of Goods Receipt Note (SCM-Store)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of drugs and consumables rejected before preparation of Goods Receipt Note (SCM-Store)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4a4; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasSCMPurchaseKPIs = isfeature_active('QUALITY-KPI127')): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">SCM-Purchase</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI127') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4a5; ?>'"
                        data-title="Percentage of variations from procurement process (SCM-Purchase)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of variations from procurement process (SCM-Purchase)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4a5; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasBiomedicalEngineeringKPIs = (isfeature_active('QUALITY-KPI143') || isfeature_active('QUALITY-KPI287'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Biomedical Engineering</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI143') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4c8; ?>'"
                        data-title="Critical equipment downtime (Biomedical Engineering)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Critical equipment downtime (Biomedical Engineering)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4c8; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI287') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h42; ?>'"
                        data-title="Biomedical Preventive Maintenance Completion rate (Biomedical Engineering)">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Biomedical Preventive Maintenance Completion rate (Biomedical Engineering)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h42; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasEngineeringMaintenanceKPIs = (isfeature_active('QUALITY-KPI149') || isfeature_active('QUALITY-KPI265') || isfeature_active('QUALITY-KPI266') || isfeature_active('QUALITY-KPI267') || isfeature_active('QUALITY-KPI268') || isfeature_active('QUALITY-KPI269') || isfeature_active('QUALITY-KPI270') || isfeature_active('QUALITY-KPI291') || isfeature_active('QUALITY-KPI294') || isfeature_active('QUALITY-KPI295') || isfeature_active('QUALITY-KPI340'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Engineering & Maintenance</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI149') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4c14; ?>'"
                        data-title="Engineering Critical equipment downtime ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Engineering Critical equipment downtime 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4c14; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI265') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h20; ?>'"
                        data-title="Average units of electricity consumed/Day (Units) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Average units of electricity consumed/Day (Units) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h20; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI266') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h21; ?>'"
                        data-title="TAT for complaints on equipment/Utility/Facility ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        TAT for complaints on equipment/Utility/Facility 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h21; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI267') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h22; ?>'"
                        data-title="Average units of water consumed/Day (L) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Average units of water consumed/Day (L) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h22; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI268') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h23; ?>'"
                        data-title="Adherence to PPE usage in Engineering and Maintenance department ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Adherence to PPE usage in Engineering and Maintenance department 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h23; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI269') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h24; ?>'"
                        data-title="Compliance to PM schedule ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to PM schedule 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h24; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI270') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h25; ?>'"
                        data-title="Compliance to safe storage of chemicals ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to safe storage of chemicals 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h25; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI291') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h46; ?>'"
                        data-title="Compliance to PCRA ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to PCRA 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h46; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI294') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h49; ?>'"
                        data-title="Percentage of renewable energy used against total energy used (JCI8-GHI 3) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of renewable energy used against total energy used (JCI8-GHI 3) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h49; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI295') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h50; ?>'"
                        data-title="To Monitor the energy consumption (JCI8-GHI 3) ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        To Monitor the energy consumption (JCI8-GHI 3) 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h50; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI340') === true) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i9; ?>'"
                        data-title="Compliance to safe transportation of Oil waste ">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 44px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to safe transportation of Oil waste 
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i9; ?>"
                                        style="float:right; font-size:17px; margin-top:7px; margin-bottom:10px; margin-right:12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>


    <?php if ($hasPatientCareServicesKPIs = (isfeature_active('QUALITY-KPI150') || isfeature_active('QUALITY-KPI151') || isfeature_active('QUALITY-KPI152') || isfeature_active('QUALITY-KPI153') || isfeature_active('QUALITY-KPI157') || isfeature_active('QUALITY-KPI158') || isfeature_active('QUALITY-KPI167') || isfeature_active('QUALITY-KPI252') || isfeature_active('QUALITY-KPI253'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Patient Care Services</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI150') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI4d1';
                    $table_patients_1PSQ3a = 'bf_patients';
                    $desc_1PSQ3a = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count3 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4d1; ?>'"
                        data-title="<?php echo strtolower('Out-patient satisfaction index (OPD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Out-patient satisfaction index (OPD)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4d1; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI151') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI4d2';
                    $table_patients_1PSQ3a = 'bf_patients';
                    $desc_1PSQ3a = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count4 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4d2; ?>'"
                        data-title="<?php echo strtolower('Inpatient satisfaction index (IPD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Inpatient satisfaction index (IPD)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4d2; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI152') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI4d3';
                    $table_patients_1PSQ3a = 'bf_patients';
                    $desc_1PSQ3a = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4d3; ?>'"
                        data-title="<?php echo strtolower('Time taken for discharge - Cash Patients)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Time taken for discharge - Cash Patients
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4d3; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI153') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI4d4';
                    $table_patients_1PSQ3a = 'bf_patients';
                    $desc_1PSQ3a = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count3 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4d4; ?>'"
                        data-title="<?php echo strtolower('Time taken for discharge - Insurance Patients)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Time taken for discharge - Insurance Patients
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4d4; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI157') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI4d8';
                    $table_patients_1PSQ3a = 'bf_patients';
                    $desc_1PSQ3a = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4d8; ?>'"
                        data-title="<?php echo strtolower('Waiting Time for OPD appointments (Patient Care Services - OPD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Waiting Time for OPD appointments (Patient Care Services - OPD)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4d8; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI158') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI4d9';
                    $table_patients_1PSQ3a = 'bf_patients';
                    $desc_1PSQ3a = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count4 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4d9; ?>'"
                        data-title="<?php echo strtolower('Waiting Time for OPD Walkin (Patient Care Services - OPD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Waiting Time for OPD Walkin (Patient Care Services - OPD)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4d9; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI167') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI4e7';
                    $table_patients_1PSQ3a = 'bf_patients';
                    $desc_1PSQ3a = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count5 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4e7; ?>'"
                        data-title="<?php echo strtolower('Outsourced employee absenteeism rate (Nursing Assistants) - (Patient Care Services - OPD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Outsourced employee absenteeism rate (Nursing Assistants) - (Patient Care Services - OPD)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4e7; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI252') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI4h7';
                    $table_patients_1PSQ3a = 'bf_patients';
                    $desc_1PSQ3a = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h7; ?>'"
                        data-title="<?php echo strtolower('Variance in Financial counselling (Patient Care Services - IPD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Variance in Financial counselling (Patient Care Services - IPD)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h7; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (isfeature_active('QUALITY-KPI253') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback_1PSQ3a = 'bf_feedback_CQI4h8';
                    $table_patients_1PSQ3a = 'bf_patients';
                    $desc_1PSQ3a = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback_1PSQ3a, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h8; ?>'"
                        data-title="<?php echo strtolower('Planned Discharge rate (Patient Care Services - IPD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Planned Discharge rate (Patient Care Services - IPD)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" style="font-size: 80px;"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h8; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasHRKPIs = (isfeature_active('QUALITY-KPI161') || isfeature_active('QUALITY-KPI162') || isfeature_active('QUALITY-KPI163') || isfeature_active('QUALITY-KPI164') || isfeature_active('QUALITY-KPI165') || isfeature_active('QUALITY-KPI168') || isfeature_active('QUALITY-KPI257') || isfeature_active('QUALITY-KPI258') || isfeature_active('QUALITY-KPI259') || isfeature_active('QUALITY-KPI260') || isfeature_active('QUALITY-KPI261') || isfeature_active('QUALITY-KPI262') || isfeature_active('QUALITY-KPI263') || isfeature_active('QUALITY-KPI264'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">HR</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI161') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4e1';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count3 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4e1; ?>'"
                        data-title="<?php echo strtolower('Employee satisfaction index (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Employee satisfaction index (HR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4e1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI162') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4e2';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count4 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4e2; ?>'"
                        data-title="<?php echo strtolower('Employee attrition rate (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Employee attrition rate (HR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4e2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI163') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4e3';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count5 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4e3; ?>'"
                        data-title="<?php echo strtolower('Employee absenteeism rate (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Employee absenteeism rate (HR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4e3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI164') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4e4';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count8 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4e4; ?>'"
                        data-title="<?php echo strtolower('Percentage of employees aware of rights, responsibility and welfare schemes (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of employees aware of rights, responsibility and welfare schemes (HR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4e4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI165') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4e5';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count7 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4e5; ?>'"
                        data-title="<?php echo strtolower('Average number of training hours (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Average number of training hours (HR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4e5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI168') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4e8';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count6 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4e8; ?>'"
                        data-title="<?php echo strtolower('Average number of unpaid leave per month (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Average number of unpaid leave per month (HR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4e8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI257') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback = 'bf_feedback_CQI4h12';
                    $table_patients = 'bf_patients';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h12; ?>'"
                        data-title="<?php echo strtolower('Average number of Doctors on hospital rolls at any point of time (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Average number of Doctors on hospital rolls at any point of time (HR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h12; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI258') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback = 'bf_feedback_CQI4h13';
                    $table_patients = 'bf_patients';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h13; ?>'"
                        data-title="<?php echo strtolower('Average Number of Nurses on hospital rolls at any point of time (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Average Number of Nurses on hospital rolls at any point of time (HR)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h13; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI259') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback = 'bf_feedback_CQI4h14';
                    $table_patients = 'bf_patients';
                    $desc = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count6 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h14; ?>'"
                        data-title="<?php echo strtolower('Reason for staff exit (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Reason for staff exit (HR)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h14; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI260') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback = 'bf_feedback_CQI4h15';
                    $table_patients = 'bf_patients';
                    $desc = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count5 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h15; ?>'"
                        data-title="<?php echo strtolower('Compliance to Internal complaints committee requirements (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to Internal complaints committee requirements (HR)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h15; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI261') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback = 'bf_feedback_CQI4h16';
                    $table_patients = 'bf_patients';
                    $desc = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count4 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h16; ?>'"
                        data-title="<?php echo strtolower('Effectiveness in recruitment (MRF submission days - Staff onboarded time) (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Effectiveness in recruitment (MRF submission days - Staff onboarded time) (HR)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h16; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI262') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback = 'bf_feedback_CQI4h17';
                    $table_patients = 'bf_patients';
                    $desc = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count3 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h17; ?>'"
                        data-title="<?php echo strtolower('Compliance to Employee Engagement activities (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to Employee Engagement activities (HR)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h17; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI263') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback = 'bf_feedback_CQI4h18';
                    $table_patients = 'bf_patients';
                    $desc = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h18; ?>'"
                        data-title="<?php echo strtolower('Number of Mandatory training hours coverage / staff (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Number of Mandatory training hours coverage / staff (HR)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h18; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI264') === true) { ?>
                    <?php
                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $table_feedback = 'bf_feedback_CQI4h19';
                    $table_patients = 'bf_patients';
                    $desc = 'desc';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card"
                        style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h19; ?>'"
                        data-title="<?php echo strtolower('Compliance to ACLS training (HR)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to ACLS training (HR)
                                        <a href="javascript:void()" data-toggle="tooltip" title="">
                                            <i class="0" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="icon large-screen-only">
                                        <i class="0" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h19; ?>"
                                        style="float: right; font-size: 17px; margin-top: 7px; margin-bottom: 10px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasCSSDKPIs = (isfeature_active('QUALITY-KPI175') || isfeature_active('QUALITY-KPI206') || isfeature_active('QUALITY-KPI207'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">CSSD</h2>
                </div>
                <?php if (isfeature_active('QUALITY-KPI175') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4f7';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count3 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4f7; ?>'"
                        data-title="<?php echo strtolower('Adverse events related to SUDs (JCI8-PCI 3.1) - (CSSD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Adverse events related to SUDs (JCI8-PCI 3.1) - (CSSD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4f7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI206') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k25';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k25; ?>'"
                        data-title="<?php echo strtolower('Compliance with Biological Indicator (CSSD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance with Biological Indicator (CSSD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k25; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI207') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k26';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k26; ?>'"
                        data-title="<?php echo strtolower('Compliance to risk assessment in reprocessing of SUMD (CSSD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Compliance to risk assessment in reprocessing of SUMD (CSSD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k26; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasEndoscopyKPIs = (isfeature_active('QUALITY-KPI212') || isfeature_active('QUALITY-KPI213'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Endoscopy</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI212') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k31';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k31; ?>'"
                        data-title="<?php echo strtolower('Post procedure complication rate - Colonoscopy (Endoscopy)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Post procedure complication rate - Colonoscopy (Endoscopy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k31; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI213') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k32';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k32; ?>'"
                        data-title="<?php echo strtolower('Polyp retrieval rate after colonoscopic polypectomy (Endoscopy)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Polyp retrieval rate after colonoscopic polypectomy (Endoscopy)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k32; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasTransplantKPIs = (isfeature_active('QUALITY-KPI234') || isfeature_active('QUALITY-KPI235'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Transplant Unit</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI234') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k53';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k53; ?>'"
                        data-title="<?php echo strtolower('Post transplant complication rate for Donor (Liver) - Transplant Unit'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Post transplant complication rate for Donor (Liver) - Transplant Unit
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k53; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI235') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k54';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k54; ?>'"
                        data-title="<?php echo strtolower('Post transplant complication rate (Heart) - Transplant Unit'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Post transplant complication rate (Heart) - Transplant Unit
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k54; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasResearchKPIs = (isfeature_active('QUALITY-KPI236') || isfeature_active('QUALITY-KPI237') || isfeature_active('QUALITY-KPI238') || isfeature_active('QUALITY-KPI239'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Research</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI236') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k55';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count4 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k55; ?>'"
                        data-title="<?php echo strtolower('Percentage of research activities approved by ethics committee (Research)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of research activities approved by ethics committee (Research)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k55; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI237') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k56';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count3 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k56; ?>'"
                        data-title="<?php echo strtolower('Percentage of patients withdrawing from the study (Research)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of patients withdrawing from the study (Research)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k56; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI238') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k57';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k57; ?>'"
                        data-title="<?php echo strtolower('Percentage of protocol violations/deviations reported (Research)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of protocol violations/deviations reported (Research)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k57; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI239') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k58';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k58; ?>'"
                        data-title="<?php echo strtolower('Percentage of serious adverse events reported to the ethics committee within the defined timeframe (Research)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of serious adverse events reported to the ethics committee within the defined timeframe (Research)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k58; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasInsuranceKPIs = (isfeature_active('QUALITY-KPI278') || isfeature_active('QUALITY-KPI279'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Insurance</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI278') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4h33';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h33; ?>'"
                        data-title="<?php echo strtolower('Insurance Claims Rejection Rate (Insurance)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Insurance Claims Rejection Rate (Insurance)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h33; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI279') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4h34';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h34; ?>'"
                        data-title="<?php echo strtolower('TPA TAT (Insurance) for the month'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        TPA TAT (Insurance) for the month
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h34; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasITDKPIs = (isfeature_active('QUALITY-KPI284') || isfeature_active('QUALITY-KPI286'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">ITD</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI284') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4h39';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h39; ?>'"
                        data-title="<?php echo strtolower('Downtime of EMR (ITD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Downtime of EMR (ITD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h39; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI286') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4h41';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h41; ?>'"
                        data-title="<?php echo strtolower('ITD Preventive Maintenance compliance (ITD)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        ITD Preventive Maintenance compliance (ITD)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h41; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasFBKPIs = (isfeature_active('QUALITY-KPI289') || isfeature_active('QUALITY-KPI290') || isfeature_active('QUALITY-KPI296'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">F & B Services</h2>
                </div>
                <?php if (isfeature_active('QUALITY-KPI289') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4h44';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count3 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h44; ?>'"
                        data-title="<?php echo strtolower('F&B Patient complaints rate (Food and Beverage Services)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        F&B Patient complaints rate (Food and Beverage Services)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h44; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI290') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4h45';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h45; ?>'"
                        data-title="<?php echo strtolower('Delay in room services (Food and Beverage Services)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Delay in room services (Food and Beverage Services)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h45; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI296') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4h51';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4h51; ?>'"
                        data-title="<?php echo strtolower('Percentage of Wrong food Delivery for Patients & Bystanders (Food and Beverage Services)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of Wrong food Delivery for Patients & Bystanders (Food and Beverage Services)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4h51; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>


    <?php if ($hasStrokeUnitKPIs = (isfeature_active('QUALITY-KPI346') || isfeature_active('QUALITY-KPI347') || isfeature_active('QUALITY-KPI348') || isfeature_active('QUALITY-KPI349') || isfeature_active('QUALITY-KPI350') || isfeature_active('QUALITY-KPI351') || isfeature_active('QUALITY-KPI352') || isfeature_active('QUALITY-KPI353') || isfeature_active('QUALITY-KPI354') || isfeature_active('QUALITY-KPI355') || isfeature_active('QUALITY-KPI356') || isfeature_active('QUALITY-KPI357') || isfeature_active('QUALITY-KPI358') || isfeature_active('QUALITY-KPI359') || isfeature_active('QUALITY-KPI360') || isfeature_active('QUALITY-KPI361') || isfeature_active('QUALITY-KPI362') || isfeature_active('QUALITY-KPI363') || isfeature_active('QUALITY-KPI364') || isfeature_active('QUALITY-KPI365') || isfeature_active('QUALITY-KPI366') || isfeature_active('QUALITY-KPI367'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Stroke Unit</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI346') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j1';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count1 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j1; ?>'"
                        data-title="<?php echo strtolower('Door to Physician ≤10 min (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Door to Physician ≤10 min (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j1; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI347') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j2';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count2 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j2; ?>'"
                        data-title="<?php echo strtolower('Door to stroke team ≤15 min (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Door to stroke team ≤15 min (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j2; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI348') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j3';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count3 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j3; ?>'"
                        data-title="<?php echo strtolower('Door to CT/MRI initiation ≤20 min (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Door to CT/MRI initiation ≤20 min (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j3; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI349') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j4';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count4 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j4; ?>'"
                        data-title="<?php echo strtolower('Door to CT/MRI interpretation ≤30 min (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Door to CT/MRI interpretation ≤30 min (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j4; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI350') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j5';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count5 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j5; ?>'"
                        data-title="<?php echo strtolower('Order to lab results ≤30 min, if ordered (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Order to lab results ≤30 min, if ordered (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j5; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI351') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j6';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count6 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j6; ?>'"
                        data-title="<?php echo strtolower('Door to IV thrombolytic bolus (≥75% compliance) ≤60 min [Achieving Door to needle times within 60 min in ≥75% of acute ischemic stroke] (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Door to IV thrombolytic bolus ≤60 mins (≥75% compliance) (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j6; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI352') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j7';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count7 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j7; ?>'"
                        data-title="<?php echo strtolower('Door to IV thrombolytic bolus (≥50% compliance) ≤45 min [Achieving Door to needle times within 45 min in ≥50% of acute ischemic stroke patients] (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Door to IV thrombolytic bolus ≤45 mins (≥50% compliance) (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI353') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j8';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count8 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j8; ?>'"
                        data-title="<?php echo strtolower('Door to puncture time ≤90 min (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Door to puncture time ≤90 min (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j8; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI354') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j9';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count9 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j9; ?>'"
                        data-title="<?php echo strtolower('The periprocedural complication rates after correcting for various comorbidities (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        The periprocedural complication rates after correcting for various comorbidities (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j9; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI355') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j10';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count10 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j10; ?>'"
                        data-title="<?php echo strtolower('The periprocedural mortality rate for surgical or interventional procedures (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        The periprocedural mortality rate for surgical or interventional procedures (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j10; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI356') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j11';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count11 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j11; ?>'"
                        data-title="<?php echo strtolower('Percentage of all stroke/TIA patients who have a deficit at the time of the initial note, ED Physician or Neurology consultation note for whom an NIHSS score is documented (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Stroke/TIA patients with NIHSS score documented (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j11; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI357') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j12';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count12 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j12; ?>'"
                        data-title="<?php echo strtolower('Percentage of ischemic stroke patients eligible for intravenous thrombolysis who receive it within the appropriate time window (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ischemic stroke patients receiving IV thrombolysis on time (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j12; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI358') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j13';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count13 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j13; ?>'"
                        data-title="<?php echo strtolower('Percentage of patients treated for acute ischemic stroke with intravenous thrombolysis whose treatment is started within 60 minutes after arrival (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Stroke patients treated with IV thrombolysis within 60 mins of arrival (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j13; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI359') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j14';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count14 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j14; ?>'"
                        data-title="<?php echo strtolower('Time from arrival to the start of initial imaging workup for all patients who arrive within 24 hours of last known well (In Minutes) (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Arrival to start of imaging workup time (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j14; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI360') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j15';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count15 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j15; ?>'"
                        data-title="<?php echo strtolower('Percentage of ischemic stroke patients who develop a symptomatic intracranial hemorrhage within ≤36 hours after onset of IV or IA thrombolytic therapy, or mechanical endovascular reperfusion procedure (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ischemic stroke patients developing intracranial hemorrhage ≤36 hrs (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j15; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI361') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j16';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count16 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j16; ?>'"
                        data-title="<?php echo strtolower('Percentage of patients undergoing CEA, or carotid angioplasty or stenting, having stroke or death within 30 days of the procedure (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Patients undergoing carotid procedures with stroke/death ≤30 days (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j16; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI362') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j17';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count17 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j17; ?>'"
                        data-title="<?php echo strtolower('Percentage of patients undergoing intracranial angioplasty and/or stenting for atherosclerotic disease having stroke or death within 30 days of the procedure (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Patients undergoing intracranial stenting/angioplasty with stroke/death ≤30 days (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j17; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI363') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j18';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count18 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j18; ?>'"
                        data-title="<?php echo strtolower('Percentage of patients with stroke or death within 24 hours of diagnostic cerebral-angiography (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of patients with stroke or death within 24 hours of diagnostic cerebral-angiography (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j18; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI364') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j19';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count19 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j19; ?>'"
                        data-title="<?php echo strtolower('Percentage of patients who have a diagnosis of ischemic stroke who undergo EVD and then develop ventriculitis (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of patients who have a diagnosis of ischemic stroke who undergo EVD and then develop ventriculitis (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j19; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI365') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j20';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count20 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j20; ?>'"
                        data-title="<?php echo strtolower('Percentage of ischemic stroke patients with post-treatment reperfusion grade of TICI 2B or higher at the end of IA thrombolytic and/or mechanical endovascular reperfusion therapy (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ischemic stroke patients achieving TICI 2B+ post reperfusion therapy (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j20; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI366') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j21';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count21 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j21; ?>'"
                        data-title="<?php echo strtolower('Percentage of ischemic stroke patients with a large vessel cerebral occlusion receiving MER therapy within 120 minutes of hospital arrival achieving TICI 2B or higher (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ischemic stroke patients achieving TICI 2B+ post reperfusion therapy (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j21; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI367') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4j22';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count22 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4j22; ?>'"
                        data-title="<?php echo strtolower('Percentage of ischemic stroke patients with a large vessel cerebral occlusion receiving MER therapy and achieving TICI 2B or higher ≤60 minutes from skin puncture (Stroke Unit)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Ischemic stroke patients achieving TICI 2B+ post reperfusion therapy (Stroke Unit)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4j22; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    <?php endif; ?>

    <?php if ($hasOtherKPIs = (isfeature_active('QUALITY-KPI13') || isfeature_active('QUALITY-KPI196') || isfeature_active('QUALITY-KPI338'))): ?>

        <div class="row">
            <div class="col-12">
                <div class="heading heading-block">
                    <h2 style="margin-top: 20px;margin-bottom: 20px; font-size: 22px; font-weight: bold;margin-left:15px;background:#f5f5f5; padding: 4px 10px; border: 1px solid #ccc; border-radius: 6px;width:98%;">Other</h2>

                </div>
                <?php if (isfeature_active('QUALITY-KPI13') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3a13';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count13 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3a13; ?>'"
                        data-title="<?php echo strtolower('Percentage of Spontaneous perineal Tear Rate'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Percentage of Spontaneous perineal Tear Rate
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3a13; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isfeature_active('QUALITY-KPI196') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI3k15';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count15 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI3k15; ?>'"
                        data-title="<?php echo strtolower('Door to Balloon time in PTCA (Cath Lab)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Door to Balloon time in PTCA (Cath Lab)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI3k15; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isfeature_active('QUALITY-KPI338') === true) { ?>
                    <?php
                    $table_feedback = 'bf_feedback_CQI4i7';
                    $sorttime = 'asc';
                    $setup = 'setup';
                    $ip_feedbacks_count7 = $this->quality_model->patient_and_feedback_quality($table_feedback, $sorttime, $setup);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12 kpi-card" style="margin-top: 20px;"
                        onclick="window.location.href='<?php echo $feedbacks_report_CQI4i7; ?>'"
                        data-title="<?php echo strtolower('Outsourced OPD Assistance attendance (Operation)'); ?>">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px; padding-top:0px;">
                                <div class="statistic-box" style="padding-top: 40px;">
                                    <div class="small" style="font-size: 20px;">
                                        Outsourced OPD Assistance attendance (Operation)
                                    </div>
                                    <a href="<?php echo $feedbacks_report_CQI4i7; ?>" style="float: right; font-size: 17px; margin-top: 7px; margin-right: 12px;">
                                        Explore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>




            </div>


        </div>

    <?php endif; ?>





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
        margin-top: 0px;
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
        const searchInput = document.getElementById("searchKPI");
        const allHeadings = document.querySelectorAll(".heading-block");

        // 🧩 Helper to get all KPI cards under a given heading
        function getKPICardsUnderHeading(headingBlock) {
            const cards = [];
            let next = headingBlock.nextElementSibling;
            while (next && !next.classList.contains("heading-block")) {
                if (next.classList.contains("kpi-card")) cards.push(next);
                next = next.nextElementSibling;
            }
            return cards;
        }

        // 🔍 Function to update visibility of headings based on content
        function updateHeadings(searchQuery = "") {
            allHeadings.forEach(block => {
                const kpis = getKPICardsUnderHeading(block);
                let hasVisibleCard = false;

                kpis.forEach(card => {
                    const title = (card.dataset.title || "").toLowerCase();
                    if (!searchQuery || title.includes(searchQuery)) {
                        card.style.display = "block";
                        hasVisibleCard = true;
                    } else {
                        card.style.display = "none";
                    }
                });

                // Show or hide heading based on visible KPI cards
                block.style.display = hasVisibleCard ? "block" : "none";
            });
        }

        // 🏁 Initial check after DOM load
        updateHeadings();

        // ✨ Handle search filter dynamically
        if (searchInput) {
            searchInput.addEventListener("input", function() {
                const query = searchInput.value.toLowerCase().trim();
                updateHeadings(query);
            });
        }
    });
</script>