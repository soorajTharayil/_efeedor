<!--Code updates: 
Worked on UI allignment, fixed all the issues.
Last updated on 05-03-23 -->

<?php
// ip module related
$feedbacktaken_count_ip = $this->ipd_model->get_feedback_count();
$ip_link_allfeedback = base_url('ipd/feedbacks_report_login_apk');
// print_r($ipallfeedbackk);
// exit;

// op module  
$feedbacktaken_count_op = $this->opf_model->get_feedback_count();
$op_link_allfeedback = base_url('opf/feedbacks_report_login_apk');

// op module  
$feedbacktaken_count_pcf = $this->pc_model->get_feedback_count();
$pcf_link_allfeedback = base_url('pc/alltickets_login_apk');


// isr related 
$esralltickets = $this->ticketsesr_model->alltickets_individual_user();
$esrallticketsOpen = $this->ticketsesr_model->read_individual_user();
$esrallticketsAssigned = $this->ticketsesr_model->assignedtickets_individual_user();
$esrallticketsClosed = $this->ticketsesr_model->read_close_individual_user();
$totalTicketsCount = count($esralltickets);
$totalTicketsCountOpen = count($esrallticketsOpen);
$totalTicketsCountAssigned = count($esrallticketsAssigned);
$totalTicketsCountClosed = count($esrallticketsClosed);

// incident related 
$incidentalltickets = $this->ticketsincidents_model->alltickets_individual_user();
$incidentallticketsOpen = $this->ticketsincidents_model->read_individual_user();
$incidentallticketsAssigned = $this->ticketsincidents_model->assignedtickets_individual_user();
$incidentallticketsClosed = $this->ticketsincidents_model->read_close_individual_user();
$totalTicketsCount_incident = count($incidentalltickets);
$totalTicketsCountOpen_inciden = count($incidentallticketsOpen);
$totalTicketsCountAssigned_inciden = count($incidentallticketsAssigned);
$totalTicketsCountClosed_inciden = count($incidentallticketsClosed);

// incident related 
$grievencealltickets = $this->ticketsgrievance_model->alltickets_individual_user();
$grievenceallticketsOpen = $this->ticketsgrievance_model->read_individual_user();
$grievenceallticketsAddressed = $this->ticketsgrievance_model->addressedtickets_individual_user();
$grievenceallticketsClosed = $this->ticketsgrievance_model->read_close_individual_user();
$totalTicketsCount_grievence = count($grievencealltickets);
$totalTicketsCountOpen_grievence = count($grievenceallticketsOpen);
$totalTicketsCountAddressed_grievence = count($grievenceallticketsAddressed);
$totalTicketsCountClosed_grievence = count($grievenceallticketsClosed);

$esr_link_alltickets = base_url('isr/alltickets_individual_user');
$esr_link_opentickets = base_url('isr/read_individual_user');
$esr_link_assignedtickets = base_url('isr/assignedtickets_individual_user');
$esr_link_closedtickets = base_url('isr/read_close_individual_user');

$incident_link_alltickets = base_url('incident/alltickets_individual_user');
$incident_link_opentickets = base_url('incident/read_individual_user');
$incident_link_assignedtickets = base_url('incident/assignedtickets_individual_user');
$incident_link_closedtickets = base_url('incident/read_close_individual_user');

$grievance_link_alltickets = base_url('grievance/alltickets_individual_user');
$grievance_link_opentickets = base_url('grievance/read_individual_user');
$grievance_link_addressedtickets = base_url('grievance/addressedtickets_individual_user');
$grievance_link_closedtickets = base_url('grievance/read_close_individual_user');



//  print_r($this->session->userdata['departmenthead']->empid);
$welcometext = "This page provides an overview of each user's activities across various tools, including patient feedback, concerns raised, internal requests, and incidents reported through Efeedor.";

?>

<!-- content -->
<div class="content">
    <div class="col-lg-12">
        <div style="margin-bottom: 25px; ">

            <h4 style="font-size:18px;font-weight:normal; margin-top: 20px; ">
                <span class="typing-text"></span>
            </h4>
            <!-- &nbsp;&nbsp;&nbsp;&nbsp;<span class="typing-text"></span> </h4> -->
        </div>
    </div>



    <?php if ($totalTicketsCount >= 1) { ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="overflow:auto;">
                    <div class="panel-heading">
                        <a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of employee requests" style="color: inherit;" href="<?php echo base_url(); ?>isr/department_tickets">
                            <span>
                                <h3>INTERNAL SERVICE REQUEST</h3>
                                <!-- <a href="<?php echo base_url(); ?>isr/department_tickets" style="float: right;margin-top: -22px;">Explore</a> -->
                            </span>
                        </a>
                    </div>
                    <div class="panel-body" style="height:135px; max-height:150px;">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCount; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">Requests raised</div>
                                        <div class="icon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <a href="<?php echo $esr_link_alltickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCountOpen; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">Requests Unaddressed</div>
                                        <div class="icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <a href="<?php echo $esr_link_opentickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCountAssigned; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">
                                            Requests Assigned</div>
                                        <div class="icon">
                                            <i class="fa fa-reply"></i>
                                        </div>
                                        <a href="<?php echo $esr_link_assignedtickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCountClosed; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">Requests Resolved</div>
                                        <div class="icon">
                                            <i class="fa fa-check-circle-o"></i>
                                        </div>
                                        <a href="<?php echo $esr_link_closedtickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
    <?php } ?>
    <?php if ($totalTicketsCount_incident >= 1) { ?>

        <div class="col-lg-12">
            <div style="margin-bottom: 15px; ">

                <h4 style="font-size:18px;font-weight:normal; margin-top: -40px; ">
                    <!-- <span class="typing-text1"></span> -->
                </h4>
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;<span class="typing-text"></span> </h4> -->
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="overflow:auto;">
                    <div class="panel-heading">
                        <a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of employee requests" style="color: inherit;" href="<?php echo base_url(); ?>isr/department_tickets">
                            <span>
                                <h3>INCIDENT</h3>
                                <!-- <a href="<?php echo base_url(); ?>isr/department_tickets" style="float: right;margin-top: -22px;">Explore</a> -->
                            </span>
                        </a>
                    </div>
                    <div class="panel-body" style="height:135px; max-height:150px;">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCount_incident; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">Incidents Reported</div>
                                        <div class="icon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <a href="<?php echo $incident_link_alltickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCountOpen_inciden; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">
                                            Incidents Unaddressed</div>
                                        <div class="icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <a href="<?php echo $incident_link_opentickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCountAssigned_inciden; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">
                                            Incidents Assigned</div>
                                        <div class="icon">
                                            <i class="fa fa-reply"></i>
                                        </div>
                                        <a href="<?php echo $incident_link_assignedtickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCountClosed_inciden; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">Incidents Closed</div>
                                        <div class="icon">
                                            <i class="fa fa-check-circle-o"></i>
                                        </div>
                                        <a href="<?php echo $incident_link_closedtickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    <?php } ?>
    <?php if ($totalTicketsCount_grievence >= 1) { ?>

        <div class="col-lg-12">
            <div style="margin-bottom: 15px; ">

                <h4 style="font-size:18px;font-weight:normal; margin-top: -40px; ">
                    <!-- <span class="typing-text2"></span> -->
                </h4>
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;<span class="typing-text"></span> </h4> -->
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="overflow:auto;">
                    <div class="panel-heading">
                        <a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of employee requests" style="color: inherit;" href="<?php echo base_url(); ?>isr/department_tickets">
                            <span>
                                <h3>GREVIENCE</h3>
                                <!-- <a href="<?php echo base_url(); ?>isr/department_tickets" style="float: right;margin-top: -22px;">Explore</a> -->
                            </span>
                        </a>
                    </div>
                    <div class="panel-body" style="height:135px; max-height:150px;">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCount_grievence; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">Grievance Reported</div>
                                        <div class="icon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <a href="<?php echo $grievance_link_alltickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo  $totalTicketsCountOpen_grievence; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">
                                            Grievance Unaddressed</div>
                                        <div class="icon">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <a href="<?php echo $grievance_link_opentickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCountAddressed_grievence; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">
                                            Grievance Addressed</div>
                                        <div class="icon">
                                            <i class="fa fa-reply"></i>
                                        </div>
                                        <a href="<?php echo $grievance_link_addressedtickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $totalTicketsCountClosed_grievence; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">
                                            Grievance Closed</div>
                                        <div class="icon">
                                            <i class="fa fa-check-circle-o"></i>
                                        </div>
                                        <a href="<?php echo $grievance_link_closedtickets; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($feedbacktaken_count_ip >= 1) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="overflow:auto;">
                    <div class="panel-heading">
                        <a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of employee requests" style="color: inherit;" href="<?php echo base_url(); ?>isr/department_tickets">
                            <span>
                                <h3>IP DISCHARGE FEEDBACKS</h3>
                                <!-- <a href="<?php echo base_url(); ?>isr/department_tickets" style="float: right;margin-top: -22px;">Explore</a> -->
                            </span>
                        </a>
                    </div>
                    <div class="panel-body" style="height:135px; max-height:150px;">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $feedbacktaken_count_ip; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">Feedbacks collected</div>
                                        <div class="icon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <a href="<?php echo $ip_link_allfeedback; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <br>

    <?php } ?>
    <?php if ($feedbacktaken_count_op >= 1) { ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="overflow:auto;">
                    <div class="panel-heading">
                        <a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of employee requests" style="color: inherit;" href="<?php echo base_url(); ?>isr/department_tickets">
                            <span>
                                <h3>OUTPATIENT FEEDBACKS</h3>
                                <!-- <a href="<?php echo base_url(); ?>isr/department_tickets" style="float: right;margin-top: -22px;">Explore</a> -->
                            </span>
                        </a>
                    </div>
                    <div class="panel-body" style="height:135px; max-height:150px;">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $feedbacktaken_count_op; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">Feedbacks collected</div>
                                        <div class="icon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <a href="<?php echo $op_link_allfeedback; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <br>
    <?php } ?>
    <?php if ($feedbacktaken_count_pcf >= 1) { ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="overflow:auto;">
                    <div class="panel-heading">
                        <a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of employee requests" style="color: inherit;" href="<?php echo base_url(); ?>isr/department_tickets">
                            <span>
                                <h3>INPATIENT COMPLAINTS</h3>
                                <!-- <a href="<?php echo base_url(); ?>isr/department_tickets" style="float: right;margin-top: -22px;">Explore</a> -->
                            </span>
                        </a>
                    </div>
                    <div class="panel-body" style="height:135px; max-height:150px;">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body" style="height: 100px;">
                                    <div class="statistic-box">
                                        <h2><span class="count-number"><?php echo $feedbacktaken_count_pcf; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
                                        <div class="small">Complaints Captured</div>
                                        <div class="icon">
                                            <i class="fa fa-ticket"></i>
                                        </div>
                                        <a href="<?php echo $pcf_link_allfeedback; ?>" style="float: right; margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row">

        <?php

        $audit_array = [
            'bf_ma_accidental_delining_audit',
            'bf_ma_admission_area_audit',
            'bf_ma_cardio_pulmonary_audit',
            'bf_ma_extravasation_audit',
            'bf_ma_hapu_audit',
            'bf_ma_assessment_ae',
            'bf_ma_assessment_ipd',
            'bf_ma_assessment_opd',
            'bf_ma_ipsg1_audit',
            'bf_ma_ipsg2_ae',
            'bf_ma_ipsg2_ipd',
            'bf_ma_ipsg4_timeout',
            'bf_ma_ipsg6_ip',
            'bf_ma_ipsg6_opd',
            'bf_ma_point_prevlance_audit',
            'bf_ma_active_cases_mrdip',
            'bf_ma_dischargedpatients_mrd_audit',
            'bf_ma_nursingip_closed_cases',
            'bf_ma_nursingip_open_cases',
            'bf_ma_nursingop_closed_cases',
            'bf_ma_clinical_active_mdc',
            'bf_ma_clinical_closedcases_mdc',
            'bf_ma_clinical_pharmacy_closed',
            'bf_ma_clinical_pharmacy_op',
            'bf_ma_clinical_pharmacy_open',
            'bf_ma_anesthesia_active_mdc',
            'bf_ma_anesthesia_closed_mdc',
            'bf_ma_ed_active_mdc',
            'bf_ma_ed_closed_mdc',
            'bf_ma_icu_active_mdc',
            'bf_ma_icu_closed_mdc',
            'bf_ma_primarycare_active_mdc',
            'bf_ma_primarycare_closed_mdc',
            'bf_ma_sedation_active_mdc',
            'bf_ma_sedation_closed_mdc',
            'bf_ma_surgeons_active_mdc',
            'bf_ma_surgeons_closed_mdc',
            'bf_ma_dietconsultation_op_mdc',
            'bf_ma_physiotherapy_closed_mdc',
            'bf_ma_physiotherapy_op_mdc',
            'bf_ma_physiotherapy_open_mdc',
            'bf_ma_mrd_ed_audit',
            'bf_ma_mrd_lama_audit',
            'bf_ma_mrd_op_audit',
            'bf_ma_infection_control_biomedical_waste',
            'bf_ma_infection_control_canteen_audit',
            'bf_ma_infection_control_cssd_audit',
            'bf_ma_infection_control_hand_hygiene',
            'bf_ma_infection_control_bundle_audit',
            'bf_ma_infection_control_ot_audit',
            'bf_ma_infection_control_linen_audit',
            'bf_ma_infection_control_ambulance_audit',
            'bf_ma_infection_control_coffee_audit',
            'bf_ma_infection_control_laboratory_audit',
            'bf_ma_infection_control_mortuary_audit',
            'bf_ma_infection_control_radiology_audit',
            'bf_ma_infection_control_ssi_survelliance_audit',
            'bf_ma_infection_control_peripheralivline_audit',
            'bf_ma_infection_control_personalprotective_audit',
            'bf_ma_infection_control_safe_injection_audit',
            'bf_ma_infection_control_surface_cleaning_audit',
            'bf_ma_clinicaloutcome_audit_acl',
            'bf_ma_clinicaloutcome_allogenic_bone_marrow',
            'bf_ma_clinicaloutcome_aortic_value_replacement',
            'bf_ma_clinicaloutcome_autologous_bone',
            'bf_ma_clinicaloutcome_brain_tumour',
            'bf_ma_clinicaloutcome_cabg',
            'bf_ma_clinicaloutcome_carotid_stenting',
            'bf_ma_clinicaloutcome_chemotherapy',
            'bf_ma_clinicaloutcome_colo_rectal',
            'bf_ma_clinicaloutcome_endoscopy',
            'bf_ma_clinicaloutcome_epilepsy',
            'bf_ma_clinicaloutcome_herniorrhaphy',
            'bf_ma_clinicaloutcome_holep',
            'bf_ma_clinicaloutcome_laparoscopic_appendicectomy',
            'bf_ma_clinicaloutcome_mechanical_thrombectomy',
            'bf_ma_clinicaloutcome_mvr',
            'bf_ma_clinicaloutcome_ptca',
            'bf_ma_clinicaloutcome_renal_transplantation',
            'bf_ma_clinicaloutcome_scoliosis_correction',
            'bf_ma_clinicaloutcome_spinal_dysraphism',
            'bf_ma_clinicaloutcome_spine_disc_surgery',
            'bf_ma_clinicaloutcome_thoracotomy',
            'bf_ma_clinicaloutcome_tkr',
            'bf_ma_clinicaloutcome_uro_oncology',
            'bf_ma_clinicaloutcome_whipples_surgery',
            'bf_ma_clinicaloutcome_laparoscopic_cholecystectomy',
            'bf_ma_clinicalkpi_bronchodilators_audit',
            'bf_ma_clinicalkpi_copd_protocol_audit',
            'bf_ma_clinical_pathway_arthroscopic_audit',
            'bf_ma_clinical_pathway_breast_lump_audit',
            'bf_ma_clinical_pathway_cardiac_arrest_audit',
            'bf_ma_clinical_pathway_donor_hepatectomy_audit',
            'bf_ma_clinical_pathway_febrile_seizure_audit',
            'bf_ma_clinical_pathway_heart_transplant_audit',
            'bf_ma_clinical_pathway_laproscopic_audit',
            'bf_ma_clinical_pathway_picc_line_audit',
            'bf_ma_clinical_pathway_stroke_audit',
            'bf_ma_clinical_pathway_urodynamics_audit',
            'bf_ma_clinical_pathway_stemi_audit'
        ];


        $audit_conducted_count = 0;
        $total_audits = 0;

        foreach ($audit_array as $table) {
            if ($this->db->table_exists($table)) {
                $total_audits++;

                $row_count = $this->db->count_all($table); // cleaner + safer

                if ($row_count > 0) {
                    $audit_conducted_count++;
                }
            }
        }

        $remaining_audit = $total_audits - $audit_conducted_count;

        $completion_audit_rate = ($total_audits > 0) ? round(($audit_conducted_count / $total_audits) * 100, 2) : 0;

        ?>
        <div class="col-lg-12">
            <div class="panel panel-default" style="overflow:auto;">
                <div class="panel-heading">
                    <a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of audits" style="color: inherit;" href="<?php echo base_url(); ?>audit/audit_master">
                        <h3>QUALITY AUDIT MANAGER</h3>
                    </a>
                </div>
                <div class="panel-body" style="height:135px; max-height:150px;">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="panel panel-bd">
                            <div class="panel-body" style="height: 100px;">
                                <div class="statistic-box">
                                    <h2>
                                        <span class="count-number"><?php echo $total_audits; ?></span>
                                        <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span>
                                    </h2>
                                    <div class="small">Total Audits</div>
                                    <div class="icon">
                                        <i class="fa fa-check-square-o"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>audit/audit_master" style="float: right; margin-top: -9px;">
                                        <?php echo lang_loader('global', 'global_view_list'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    document.addEventListener('DOMContentLoaded', function() {
        var typed = new Typed(".typing-text", {
            strings: ["<?php echo $welcometext; ?>"],
            // delay: 10,
            loop: false,
            typeSpeed: 30,
            backSpeed: 5,
            backDelay: 1000,
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var typed = new Typed(".typing-text1", {
            strings: ["<?php echo $welcometext1; ?>"],
            // delay: 10,
            loop: false,
            typeSpeed: 30,
            backSpeed: 5,
            backDelay: 1000,
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var typed = new Typed(".typing-text2", {
            strings: ["<?php echo $welcometext2; ?>"],
            // delay: 10,
            loop: false,
            typeSpeed: 30,
            backSpeed: 5,
            backDelay: 1000,
        });
    });
</script>