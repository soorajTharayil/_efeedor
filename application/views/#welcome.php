<!--Code updates: 
Worked on UI allignment, fixed all the issues.
Last updated on 05-03-23 -->

<?php




$dates = get_from_to_date();
$fdate = $dates['fdate'];
$tdate = $dates['tdate'];
$pagetitle = $dates['pagetitle'];
$fdate = date('Y-m-d', strtotime($fdate));
$fdatet = date('Y-m-d 23:59:59', strtotime($fdate));
$days = $dates['days'];
$num_of_modules = 0;
$num_of_modules_tickets = 0;

if (ismodule_active('IP') === true) {
	require_once 'ip_tables.php';
}

if (ismodule_active('OP') === true) {
	require_once 'op_tables.php';
}
if (ismodule_active('PCF') === true) {
	require_once 'interim_tables.php';
}

if (ismodule_active('PDF') === true) {
	require_once 'pdf_tables.php';
}

if (ismodule_active('ADF') === true) {
	require_once 'adf_tables.php';
}

if (ismodule_active('ISR') === true) {
	require_once 'esr_tables.php';
}

if (ismodule_active('INCIDENT') === true) {
	require_once 'incident_tables.php';
}

if (ismodule_active('GRIEVANCE') === true) {
	require_once 'grievance_tables.php';
}

date_default_timezone_set('Asia/Kolkata');
$hour = date('H');
// echo $hour;
if ($hour < 12) {
	$greeting =  '<b>Good morning,<\/b>';
} elseif ($hour < 17) {
	$greeting = '<b>Good afternoon,<\/b> ';
} else {
	$greeting = '<b>Good evening,<\/b> ';
}



if ($pagetitle != 'Custom') {
	$welcometext = $greeting . "<br><br>Here's an overview of the key healthcare experience metrics from each module based on the data collected over the   " . strtolower($pagetitle) . ". For more detailed analytics and comprehensive reports, please visit the individual dashboards.";
} else {
	$dateObjstrt = DateTime::createFromFormat('Y-m-d', $fdate);
	$enddate = $dateObjstrt->format('d-m-y');
	$dateObjend = DateTime::createFromFormat('Y-m-d', $tdate);
	$startdate = $dateObjend->format('d-m-y');
	$welcometext = $greeting . "<br><br>Here is an overview of the key healthcare experience metrics from each module for the data collected from " . $startdate . " to " . $enddate . ". For more detailed analytics and comprehensive reports, please visit the individual dashboards.";
}
//  print_r($this->session->userdata['departmenthead']->empid);
?>

<?php

$tables = [
	'bf_feedback_1PSQ3a',
	'bf_feedback_2PSQ3a',
	'bf_feedback_3PSQ3a',
	'bf_feedback_4PSQ3a',
	'bf_feedback_5PSQ3a',
	'bf_feedback_6PSQ3a',
	'bf_feedback_7PSQ3a',
	'bf_feedback_8PSQ3a',
	'bf_feedback_9PSQ3a',
	'bf_feedback_10PSQ3a',
	'bf_feedback_11PSQ3a',
	'bf_feedback_12PSQ3a',
	'bf_feedback_13PSQ3b',
	'bf_feedback_14PSQ3b',
	'bf_feedback_15PSQ3b',
	'bf_feedback_16PSQ3b',
	'bf_feedback_17PSQ3b',
	'bf_feedback_18PSQ3b',
	'bf_feedback_19PSQ3c',
	'bf_feedback_20PSQ3c',
	'bf_feedback_21PSQ3c',
	'bf_feedback_21aPSQ3c',
	'bf_feedback_22PSQ3c',
	'bf_feedback_23aPSQ4c',
	'bf_feedback_23bPSQ4c',
	'bf_feedback_23cPSQ4c',
	'bf_feedback_23dPSQ4c',
	'bf_feedback_24PSQ4c',
	'bf_feedback_25PSQ4c',
	'bf_feedback_26PSQ4c',
	'bf_feedback_27PSQ4d',
	'bf_feedback_28PSQ4d',
	'bf_feedback_29PSQ4d',
	'bf_feedback_30PSQ3d',
	'bf_feedback_31PSQ3d',
	'bf_feedback_32PSQ3d',
	'bf_feedback_PSQ3a'

];

$kpi_conducted_count = 0;
$total_kpis = 0;

foreach ($tables as $table) {
	// Check if the table exists
	if ($this->db->table_exists($table)) {
		$total_kpis++; // Increment total KPIs only if the table exists

		// Count the rows in the existing table
		$query = $this->db->query("SELECT COUNT(*) as row_count FROM $table");
		$result = $query->row();

		if ($result->row_count > 0) {
			$kpi_conducted_count++;
		}
	}
}

//$total_kpis =37;
$remaining_kpi = $total_kpis - $kpi_conducted_count;
$completion_rate = ($kpi_conducted_count / $total_kpis) * 100;

?>


<!-- content -->
<div class="content">
	<div class="col-lg-12">
		<div style="margin-bottom: 15px; margin-top: 10px; ">
			<marquee behavior="scroll" direction="left">
				<div style="text-align:center; color:orange;">
					<?php include 'display_remaining_days_message.php';  ?>
				</div>
			</marquee>
			<h4 style="font-size:18px;font-weight:normal; margin-top: 0px;">
				<span class="typing-text"></span>
			</h4>
			<!-- &nbsp;&nbsp;&nbsp;&nbsp;<span class="typing-text"></span> </h4> -->
		</div>
	</div>

	<br>
	<!-- START FOR SUPERADMIN AND ADMIN -->
	<?php if (ismodule_active('GLOBAL') === true && isfeature_active('ADMINS-OVERALL-PAGE') === true) { ?>

		<!-- START ADMISSION OVERVIEW -->
		<?php if (ismodule_active('ADF') === true && isfeature_active('ADF-FEEDBACKS-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">

							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Inpatient admission feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>admissionfeedback/feedback_dashboard">
								<span>
									<h3><?php echo lang_loader('global', 'global_adf_feedbacks'); ?> </h3>
									<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-FEEDBACKS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>admissionfeedback/feedback_dashboard" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-FEEDBACK-REPORTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($adf_feedbacks_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_feedbacks'); ?></div>
												<div class="icon">
													<i class="fa fa-comments-o"></i>
												</div>
												<a href="<?php echo $adf_link_feedback_report; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-PSAT') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $adf_psat_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $adf_psat['psat_score']; ?>
													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_psat'); ?> </div>
												<div class="icon">
													<i class="fa fa-star-half-o"></i>
												</div>
												<a href="<?php echo $adf_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-NPS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $adf_nps_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $adf_nps['nps_score']; ?>
													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_nps'); ?> </div>
												<div class="icon">
													<i class="fa fa-tachometer"></i>
												</div>
												<a href="<?php echo $adf_link_nps_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $adf_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($adf_tickets_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $adf_link_ticket_dashboard; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>


						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- START ADMISSION OVERVIEW -->

		<!-- START INPATIENT OVERVIEW -->
		<?php if (ismodule_active('IP') === true && isfeature_active('IP-FEEDBACKS-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Inpatient discharge feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>ipd/feedback_dashboard">
								<span>
									<h3><?php echo lang_loader('global', 'global_ip_discharge_feedback'); ?> </h3>
									<?php if (ismodule_active('IP') === true && isfeature_active('IP-FEEDBACKS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>ipd/feedback_dashboard" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('IP') === true && isfeature_active('IP-FEEDBACK-REPORTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($ip_feedbacks_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_feedbacks'); ?></div>
												<div class="icon">
													<i class="fa fa-comments-o"></i>
												</div>
												<a href="<?php echo $ip_link_feedback_report; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('IP') === true && isfeature_active('IP-PSAT') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $ip_psat_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $ip_psat['psat_score']; ?>
													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_psat'); ?> </div>
												<div class="icon">
													<i class="fa fa-star-half-o"></i>
												</div>
												<a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('IP') === true && isfeature_active('IP-NPS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $ip_nps_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $ip_nps['nps_score']; ?>
													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_nps'); ?> </div>
												<div class="icon">
													<i class="fa fa-tachometer"></i>
												</div>
												<a href="<?php echo $ip_link_nps_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('IP') === true  && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $ip_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($ip_tickets_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $ip_link_ticket_dashboard; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- END INPATIENT OVERVIEW -->

		<!-- START INTERIM OVERVIEW -->
		<?php if (ismodule_active('PCF') === true && isfeature_active('PC-COMPLAINTS-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">

							<a href="<?php echo base_url(); ?>pc/ticket_dashboard" data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of patient complaints and requests" style="color: inherit;" href="<?php echo base_url(); ?>dashboard/swithc?type=2">
								<span>
									<h3><?php echo lang_loader('global', 'global_ip_complaints'); ?></h3>
									<?php if (ismodule_active('PCF') === true && isfeature_active('PC-COMPLAINTS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>pc/ticket_dashboard" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('PCF') === true  && isfeature_active('TOTAL-COMPLAINTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $interim_tickets_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($int_tickets_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?></div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $int_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PCF') === true  && isfeature_active('OPEN-COMPLAINTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $interim_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $int_allopenticket_count; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $int_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('PCF') === true  && isfeature_active('ADDRESSED-COMPLAINTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $interim_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($int_addressed_tickets); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $int_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PCF') === true  && isfeature_active('CLOSED-COMPLAINTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $interim_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($int_closed_tickets); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $int_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- END INTERIM OVERVIEW -->

		<!-- START PDF OVERVIEW -->
		<?php if (ismodule_active('PDF') === true && isfeature_active('PDF-FEEDBACKS-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Inpatient discharge feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>post/feedback_dashboard">
								<span>
									<h3><?php echo lang_loader('global', 'global_pdf_discharge_feedback'); ?> </h3>
									<?php if (ismodule_active('PDF') === true && isfeature_active('PDF-FEEDBACKS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>post/feedback_dashboard" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('PDF') === true && isfeature_active('PDF-FEEDBACK-REPORTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($pdf_feedbacks_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_feedbacks'); ?></div>
												<div class="icon">
													<i class="fa fa-comments-o"></i>
												</div>
												<a href="<?php echo $pdf_link_feedback_report; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('PDF') === true && isfeature_active('PDF-PSAT') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $pdf_psat_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $pdf_psat['psat_score']; ?>
													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_psat'); ?> </div>
												<div class="icon">
													<i class="fa fa-star-half-o"></i>
												</div>
												<a href="<?php echo $pdf_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PDF') === true && isfeature_active('PDF-NPS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $pdf_nps_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $pdf_nps['nps_score']; ?>
													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_nps'); ?> </div>
												<div class="icon">
													<i class="fa fa-tachometer"></i>
												</div>
												<a href="<?php echo $pdf_link_nps_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $pdf_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($pdf_tickets_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $pdf_link_ticket_dashboard; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- END PDF OVERVIEW -->


		<!-- START OUTPATIENT OVERVIEW -->
		<?php if (ismodule_active('OP') === true && isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Outpatient feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>opf/feedback_dashboard">
								<span>
									<h3><?php echo lang_loader('global', 'global_op_feedback'); ?> </h3>
									<?php if (ismodule_active('OP') === true && isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>opf/feedback_dashboard" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-FEEDBACK-REPORTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($op_feedbacks_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_feedbacks'); ?></div>
												<div class="icon">
													<i class="fa fa-comments-o"></i>
												</div>
												<a href="<?php echo $op_link_feedback_report; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-PSAT') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $op_psat_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $op_psat['psat_score']; ?>
													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_psat'); ?> </div>
												<div class="icon">
													<i class="fa fa-star-half-o"></i>
												</div>
												<a href="<?php echo $op_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-NPS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $op_nps_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $op_nps['nps_score']; ?>
													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_nps'); ?> </div>
												<div class="icon">
													<i class="fa fa-tachometer"></i>
												</div>
												<a href="<?php echo $op_link_nps_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $op_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($op_tickets_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $op_link_ticket_dashboard; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- END OUTPATIENT OVERVIEW -->


		<!-- START ISR OVERVIEW -->
		<?php if (ismodule_active('ISR') === true && isfeature_active('ISR-REQUESTS-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">

							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of internal service requests" style="color: inherit;" href="<?php echo base_url(); ?>isr/ticket_dashboard">
								<span>
									<h3><?php echo lang_loader('global', 'global_isr'); ?></h3>
									<?php if (ismodule_active('ISR') === true && isfeature_active('ISR-REQUESTS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>isr/ticket_dashboard" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('ISR') === true  && isfeature_active('TOTAL-REQUESTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $esr_tickets_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $esr_department['alltickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_requests'); ?></div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $esr_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ISR') === true  && isfeature_active('OPEN-REQUESTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $esr_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $esr_department['opentickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $esr_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ISR') === true  && isfeature_active('ADDRESSED-REQUESTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $esr_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $esr_department['addressedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $esr_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ISR') === true  && isfeature_active('CLOSED-REQUESTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $esr_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $esr_department['closedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $esr_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- END ISR OVERVIEW -->

		<!-- START INCIDENT OVERVIEW -->
		<?php if (ismodule_active('INCIDENT') === true && isfeature_active('INC-INCIDENTS-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">

							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of incidents" style="color: inherit;" href="<?php echo base_url(); ?>incident/ticket_dashboard">
								<span>
									<h3><?php echo lang_loader('global', 'global_inc'); ?></h3>
									<?php if (ismodule_active('INCIDENT') === true && isfeature_active('INC-INCIDENTS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>incident/ticket_dashboard" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('TOTAL-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($incident_tickets_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_inc'); ?></div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $incident_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('OPEN-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $incident_department['opentickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_inc'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $incident_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('ADDRESSED-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($incident_addressed_tickets); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_inc'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $incident_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('CLOSED-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($incident_closed_tickets); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_inc'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $incident_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- END INCIDENT OVERVIEW -->

		<!-- START grievance_page OVERVIEW -->
		<?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('SG-STAFF-GRIEVANCES-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">

							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of staff grievance" style="color: inherit;" href="<?php echo base_url(); ?>grievance/ticket_dashboard">
								<span>
									<h3><?php echo lang_loader('global', 'global_sg'); ?> </h3>
									<?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('SG-STAFF-GRIEVANCES-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>grievance/ticket_dashboard" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('TOTAL-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($grievance_tickets_count); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_grievance'); ?></div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $grievance_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('OPEN-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $grievance_department['opentickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_grievance'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $grievance_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('ADDRESSED-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($grievance_addressed_tickets); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_grievance'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $grievance_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('CLOSED-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo count($grievance_closed_tickets); ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_grievance'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $grievance_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- END grievance_page OVERVIEW -->

		<!-- START Quality KPI overview -->
		<?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed Quality Indicator Analysis" style="color: inherit;" href="<?php echo base_url(); ?>quality/quality_welcome_page">
								<span>
									<h3>QUALITY INDICATOR MANAGER</h3>
									<?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>quality/quality_welcome_page" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-toggle="tooltip" title="The total number of Key Performance Indicators(KPIs) present.">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $total_kpis; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small">Total KPIs</div>
												<div class="icon">
													<i class="fa fa-tachometer"></i>
												</div>
												<a href="<?php echo base_url(); ?>quality/quality_welcome_page" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="The total number of KPIs recorded or performed during the month">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $kpi_conducted_count; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small">Total KPIs Recorded</div>
												<div class="icon">
													<i class="fa fa-check-square-o"></i>
												</div>
												<!-- <a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="The number of KPIs yet to be recorded or performed.">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $remaining_kpi; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small">Total KPIs Pending</div>
												<div class="icon">
													<i class="fa fa-hourglass-o"></i>
												</div>
												<!-- <a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('QUALITY') === true  && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="The percentage of KPIs recorded out of the total KPIs.">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $completion_rate; ?>
													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small">KPI Recording Rate</div>
												<div class="icon">
													<i class="fa fa-line-chart"></i>
												</div>
												<!-- <a href="<?php echo $ip_link_ticket_dashboard; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- End quality KPI overview -->

		<!-- START audit overview -->
		<?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed Quality Audit Analysis" style="color: inherit;" href="<?php echo base_url(); ?>audit/audit_welcome_page">
								<span>
									<h3>QUALITY AUDIT MANAGER</h3>
									<?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>audit/audit_welcome_page" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-toggle="tooltip" title="The total number of audits present">
											<div class="statistic-box">
												<h2><span class="count-number">
														33
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small">Total Audits</div>
												<div class="icon">
													<i class="fa fa-list-alt"></i>
												</div>
												<a href="<?php echo base_url(); ?>audit/audit_welcome_page" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="The total number of audits that have been initiated or conducted during the month.">

											<div class="statistic-box">
												<h2><span class="count-number">
														
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small">Total Audits Initiated</div>
												<div class="icon">
													<i class="fa fa-check-circle"></i>
												</div>
												<!-- <a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="The number of audits yet to be initiated or conducted.">

											<div class="statistic-box">
												<h2><span class="count-number">
														
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small">Total Audits Pending</div>
												<div class="icon">
													<i class="fa fa-hourglass-o"></i>
												</div>
												<!-- <a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="The percentage of audits initiated out of the total audits.">

											<div class="statistic-box">
												<h2><span class="count-number">

													</span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small">Audit Initiation Ratio</div>
												<div class="icon">
													<i class="fa fa-line-chart"></i>
												</div>
												<!-- <a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

											</div>
										</div>
									</div>
								</div>
							<?php } ?>



						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- End audit overview -->







	<?php } ?>
	<!-- FOR SUPERADMIN AND ADMIN END -->

	<!-- FOR DEPT HEAD -->

	<?php if (ismodule_active('GLOBAL') === true && isfeature_active('DEPARTMENT-HEAD-OVERALL-PAGE') === true && ($this->session->userdata['user_role'] == 4)) {  ?>

		<!-- if dephead has access to admission feedback tickets -->
		<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of patient complaints and requests" style="color: inherit;" href="<?php echo base_url(); ?>admissionfeedback/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_adf_tickets'); ?> </h3>
									<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>admissionfeedback/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>

						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-TOTAL-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $adf_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $adf_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/alltickets'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-OPEN-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $adf_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $adf_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-ADDRESSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $adf_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $adf_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-CLOSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $adf_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $adf_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<!-- Close Metric Boxes-->
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>


		<?php } ?>

		<!-- if dephead has access to ipfeedback tickets -->
		<?php if (ismodule_active('IP') === true  && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?>


			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Inpatient discharge feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>ipd/department_tickets">

								<span>
									<h3><?php echo lang_loader('global', 'global_ip_tickets'); ?></h3>
									<?php if (ismodule_active('IP') === true  && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>ipd/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('IP') === true  && isfeature_active('IP-TOTAL-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $ip_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $ip_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('IP') === true  && isfeature_active('IP-OPEN-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $ip_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $ip_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('IP') === true  && isfeature_active('IP-ADDRESSED-TICKETS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $ip_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $ip_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php }  ?>
							<?php if (ismodule_active('IP') === true  && isfeature_active('IP-CLOSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $ip_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $ip_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>
							<?php }  ?>

							<!-- Close Metric Boxes-->
						</div>
					</div>
				</div>
			</div>

		<?php } ?>

		<!-- if dephead has access to patient complaints -->
		<?php if (ismodule_active('PCF') === true  && isfeature_active('COMPLAINTS-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of patient complaints and requests" style="color: inherit;" href="<?php echo base_url(); ?>pc/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_patient_complaints'); ?> </h3>
									<?php if (ismodule_active('PCF') === true  && isfeature_active('COMPLAINTS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>pc/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('PCF') === true  && isfeature_active('TOTAL-COMPLAINTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $int_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $int_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/alltickets'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PCF') === true  && isfeature_active('OPEN-COMPLAINTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $int_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $int_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php if (ismodule_active('PCF') === true  && isfeature_active('ADDRESSED-COMPLAINTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $int_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $int_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PCF') === true  && isfeature_active('CLOSED-COMPLAINTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $int_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $int_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<!-- Close Metric Boxes-->
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>


		<?php } ?>

		<!-- if dephead has access to pdf tickets -->
		<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?>


			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Inpatient discharge feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>post/department_tickets">

								<span>
									<h3><?php echo lang_loader('global', 'global_pdf_tickets'); ?></h3>
									<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>post/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-TOTAL-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $pdf_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $pdf_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-OPEN-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $pdf_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $pdf_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-ADDRESSED-TICKETS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $pdf_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $pdf_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php }  ?>
							<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-CLOSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $pdf_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $pdf_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php }  ?>

							<!-- Close Metric Boxes-->
						</div>
					</div>
				</div>
			</div>

		<?php } ?>

		<!-- if dephead has access to outpatient feedback tickets -->
		<?php if (ismodule_active('OP') === true  && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Outpatient feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>opf/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_op_tickets'); ?></h3>
									<?php if (ismodule_active('OP') === true  && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>opf/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-TOTAL-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $op_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $op_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php }  ?>
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-OPEN-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $op_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $op_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php }  ?>
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-ADDRESSED-TICKETS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $op_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $op_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-CLOSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $op_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $op_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<!-- Close Metric Boxes-->
						</div>
					</div>
				</div>
			</div>

		<?php } ?>

		<!-- if dephead has access to internal service requests -->
		<?php if (ismodule_active('ISR') === true  && isfeature_active('REQUESTS-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of employee requests" style="color: inherit;" href="<?php echo base_url(); ?>isr/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_isr'); ?></h3>
									<?php if (ismodule_active('ISR') === true  && isfeature_active('REQUESTS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>isr/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('ISR') === true  && isfeature_active('TOTAL-REQUESTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $esr_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $esr_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php if (ismodule_active('ISR') === true  && isfeature_active('OPEN-REQUESTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $esr_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $esr_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ISR') === true  && isfeature_active('ADDRESSED-REQUESTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $esr_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $esr_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php if (ismodule_active('ISR') === true  && isfeature_active('CLOSED-REQUESTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $esr_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $esr_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<!-- Close Metric Boxes-->
						</div>
					</div>
				</div>
			</div>

		<?php } ?>

		<!-- START INCIDENT OVERVIEW -->
		<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('INCIDENTS-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">

							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of incidents" style="color: inherit;" href="<?php echo base_url(); ?>incident/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_inc'); ?></h3>
									<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('INCIDENTS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>incident/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('TOTAL-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $esr_tickets_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $incident_department['alltickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_inc'); ?></div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $incident_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('OPEN-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $incident_department['opentickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_inc'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $incident_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>

							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('ADDRESSED-INCIDENTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $incident_department['addressedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_inc'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $incident_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('CLOSED-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $incident_department['closedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_inc'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $incident_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>

		<?php } ?>
		<!-- END INCIDENT OVERVIEW -->

		<!-- START grievance_page OVERVIEW -->
		<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('GRIEVANCES-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">

							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of staff grievance" style="color: inherit;" href="<?php echo base_url(); ?>grievance/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_sg'); ?> </h3>
									<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('GRIEVANCES-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>grievance/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('TOTAL-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $grievance_department['alltickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_grievance'); ?></div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $grievance_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('OPEN-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $grievance_department['opentickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_grievance'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $grievance_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('ADDRESSED-GRIEVANCES') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $grievance_department['addressedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_grievance'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $grievance_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('CLOSED-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $grievance_department['closedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_grievance'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $grievance_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>

		<?php } ?>
		<!-- END grievance_page OVERVIEW -->

	<?php } ?>


	<?php if ($this->session->userdata['user_role'] == 7) { ?>
		<!-- if dephead has access to admission feedback tickets -->
		<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of patient complaints and requests" style="color: inherit;" href="<?php echo base_url(); ?>admissionfeedback/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_adf_tickets'); ?> </h3>
									<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>admissionfeedback/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>

						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-TOTAL-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $adf_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $adf_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/alltickets'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-OPEN-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $adf_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $adf_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-ADDRESSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $adf_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $adf_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ADF') === true  && isfeature_active('ADF-CLOSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $adf_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $adf_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<!-- Close Metric Boxes-->
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>


		<?php } ?>

		<!-- if dephead has access to ipfeedback tickets -->
		<?php if (ismodule_active('IP') === true  && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?>


			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Inpatient discharge feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>ipd/department_tickets">

								<span>
									<h3><?php echo lang_loader('global', 'global_ip_tickets'); ?></h3>
									<?php if (ismodule_active('IP') === true  && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>ipd/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('IP') === true  && isfeature_active('IP-TOTAL-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $ip_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $ip_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('IP') === true  && isfeature_active('IP-OPEN-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $ip_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $ip_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('IP') === true  && isfeature_active('IP-ADDRESSED-TICKETS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $ip_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $ip_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php }  ?>
							<?php if (ismodule_active('IP') === true  && isfeature_active('IP-CLOSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $ip_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $ip_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>
							<?php }  ?>

							<!-- Close Metric Boxes-->
						</div>
					</div>
				</div>
			</div>

		<?php } ?>

		<!-- if dephead has access to patient complaints -->
		<?php if (ismodule_active('PCF') === true  && isfeature_active('COMPLAINTS-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of patient complaints and requests" style="color: inherit;" href="<?php echo base_url(); ?>pc/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_patient_complaints'); ?> </h3>
									<?php if (ismodule_active('PCF') === true  && isfeature_active('COMPLAINTS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>pc/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('PCF') === true  && isfeature_active('TOTAL-COMPLAINTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $int_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $int_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/alltickets'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PCF') === true  && isfeature_active('OPEN-COMPLAINTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $int_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $int_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php if (ismodule_active('PCF') === true  && isfeature_active('ADDRESSED-COMPLAINTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $int_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $int_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PCF') === true  && isfeature_active('CLOSED-COMPLAINTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $int_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_complaints'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $int_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<!-- Close Metric Boxes-->
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>


		<?php } ?>

		<!-- if dephead has access to pdf tickets -->
		<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?>


			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Inpatient discharge feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>post/department_tickets">

								<span>
									<h3><?php echo lang_loader('global', 'global_pdf_tickets'); ?></h3>
									<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>post/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-TOTAL-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $pdf_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $pdf_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-OPEN-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $pdf_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $pdf_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-ADDRESSED-TICKETS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $pdf_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $pdf_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php }  ?>
							<?php if (ismodule_active('PDF') === true  && isfeature_active('PDF-CLOSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $pdf_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $pdf_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php }  ?>

							<!-- Close Metric Boxes-->
						</div>
					</div>
				</div>
			</div>

		<?php } ?>

		<!-- if dephead has access to outpatient feedback tickets -->
		<?php if (ismodule_active('OP') === true  && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of Outpatient feedbacks" style="color: inherit;" href="<?php echo base_url(); ?>opf/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_op_tickets'); ?></h3>
									<?php if (ismodule_active('OP') === true  && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>opf/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-TOTAL-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $op_department['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $op_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php }  ?>
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-OPEN-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $op_department['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $op_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php }  ?>
							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-ADDRESSED-TICKETS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $op_department['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $op_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php if (ismodule_active('OP') === true  && isfeature_active('OP-CLOSED-TICKETS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $op_department['closedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $op_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<!-- Close Metric Boxes-->
						</div>
					</div>
				</div>
			</div>

		<?php } ?>

		<!-- if dephead has access to internal service requests -->
		<?php if (ismodule_active('ISR') === true  && isfeature_active('REQUESTS-DASHBOARD') === true) { ?>

			<?php include 'overallpage_department_user_count.php';  ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">
							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of employee requests" style="color: inherit;" href="<?php echo base_url(); ?>isr/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_isr'); ?></h3>
									<?php if (ismodule_active('ISR') === true  && isfeature_active('REQUESTS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>isr/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:135px; max-height:150px;">
							<?php if (ismodule_active('ISR') === true  && isfeature_active('TOTAL-REQUESTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $isr_department_head_user_count['alltickets']; ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $esr_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php if (ismodule_active('ISR') === true  && isfeature_active('OPEN-REQUESTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo  $isr_department_head_user_count['opentickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small">Assigned Requests </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $esr_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('ISR') === true  && isfeature_active('ADDRESSED-REQUESTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $isr_department_head_user_count['addressedtickets'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $esr_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

												<!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php if (ismodule_active('ISR') === true  && isfeature_active('CLOSED-REQUESTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;">
											<div class="statistic-box">
												<h2><span class="count-number"><?php echo $isr_department_head_user_count['closedticket'];  ?></span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_requests'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $esr_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<!-- Close Metric Boxes-->
						</div>
					</div>
				</div>
			</div>

		<?php } ?>










		<!-- START INCIDENT OVERVIEW -->
		<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('INCIDENTS-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">

							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of incidents" style="color: inherit;" href="<?php echo base_url(); ?>incident/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_inc'); ?></h3>
									<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('INCIDENTS-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>incident/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('TOTAL-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $esr_tickets_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $incident_department['alltickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_inc'); ?></div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $incident_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('OPEN-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $incident_department['opentickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_inc'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $incident_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>

							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('ADDRESSED-INCIDENTS') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $incident_department['addressedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_inc'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $incident_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('INCIDENT') === true  && isfeature_active('CLOSED-INCIDENTS') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $incident_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $incident_department['closedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_inc'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $incident_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>

		<?php } ?>
		<!-- END INCIDENT OVERVIEW -->

		<!-- START grievance_page OVERVIEW -->
		<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('GRIEVANCES-DASHBOARD') === true) { ?>

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" style="overflow:auto;">
						<div class="panel-heading">

							<a data-toggle="tooltip" data-placement="bottom" title="Click here for detailed analysis of staff grievance" style="color: inherit;" href="<?php echo base_url(); ?>grievance/department_tickets">
								<span>
									<h3><?php echo lang_loader('global', 'global_sg'); ?> </h3>
									<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('GRIEVANCES-DASHBOARD') === true) { ?><a href="<?php echo base_url(); ?>grievance/department_tickets" style="float: right;margin-top: -22px;">Explore</a><?php } ?>
								</span>
							</a>
						</div>
						<div class="panel-body" style="height:120px; max-height:120px;">
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('TOTAL-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">

											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $grievance_department['alltickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_total_grievance'); ?></div>
												<div class="icon">
													<i class="fa fa-ticket"></i>
												</div>
												<a href="<?php echo $grievance_link_alltickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('OPEN-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $grievance_department['opentickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_open_grievance'); ?> </div>
												<div class="icon">
													<i class="fa fa-plus"></i>
												</div>
												<a href="<?php echo $grievance_link_opentickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>

							<?php } ?>
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('ADDRESSED-GRIEVANCES') === true) { ?>

								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $grievance_department['addressedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_addressed_grievance'); ?> </div>
												<div class="icon">
													<i class="fa fa-reply"></i>
												</div>
												<a href="<?php echo $grievance_link_addressedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if (ismodule_active('GRIEVANCE') === true  && isfeature_active('CLOSED-GRIEVANCES') === true) { ?>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
									<div class="panel panel-bd">
										<div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip" title="<?php echo $grievance_tickets_tool; ?>">
											<div class="statistic-box">
												<h2><span class="count-number">
														<?php echo $grievance_department['closedtickets']; ?>
													</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
														</i></span></h2>
												<div class="small"><?php echo lang_loader('global', 'global_closed_grievance'); ?> </div>
												<div class="icon">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<a href="<?php echo $grievance_link_closedtickets; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- Close Metric Boxes-->
					</div>
				</div>
			</div>

		<?php } ?>
		<!-- END grievance_page OVERVIEW -->
	<?php } ?>


</div>

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