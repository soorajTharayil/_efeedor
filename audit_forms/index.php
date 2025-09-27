<!DOCTYPE html>
<html lang="en">
<!-- head part start -->
<!-- Interim feedback -->

<head>
	<title>Quality Audit Management Software - Efeedor Healthcare Experience Management Platform</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="style.css?<?php echo time(); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.7.9/angular-sanitize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-load-image/2.21.0/load-image.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/image-conversion@1.0.1/dist/browser.js"></script>

	<script src="app_grievance.js?<?php echo time(); ?>"></script>
</head>
<!-- head part end -->


<!-- body part start -->

<body ng-app="ehandorApp" ng-controller="PatientFeedbackCtrl" style="display:none;" id="body">
	<!-- top navbar start -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed">
		<!-- Logo of efeedor -->
		<!-- <a class="navbar-brand" href="#"><img src="{{setting_data.logo}}" style="height: 36px; margin-left: -10px;" alt="Efeedor Logo"></a> -->

		<!-- Section for Buttons and Language Button -->
		<div class="ml-auto d-flex justify-content-between align-items-center w-100">
			<div class="left-buttons d-flex">
				<a ng-href="/login/?userid={{ userId }}" class="btn btn-light mr-3 dashboard-btn" style="width: 100px; height: 32px; font-size: 14px; font-weight: bold; text-align: left; display: flex; align-items: center; padding-left: 10px;">
					Dashboard
				</a>
			</div>



			<!-- Right Side: Language Button -->
			<div class="right-buttons d-flex align-items-center">
				<button type="button" class="btn btn-dark language-btn" data-toggle="modal" data-target="#languageModal" style="margin: 4px;">
					<!--  {{type2}}-->
					<!--  <i class="fa fa-language" aria-hidden="true"></i>-->
					<!--</button>-->
					<button class="btn btn-dark menu-toggle" ng-click="menuVisible = !menuVisible" style="margin: 4px;">
						<i class="fa fa-bars"></i>
					</button>
			</div>
		</div>
	</nav>
	<div class="menu-dropdown" ng-show="menuVisible" style="margin-top: 32px; margin-right: 10px;">
		<div class="user-info" style="display: flex; align-items: center; padding: 10px; border-bottom: 1px solid #ddd; background: #f5f5f5;">
			<i class="fa fa-user-circle" style="font-size: 24px; margin-right: 10px; color: #333;"></i>
			<div>
				<div style="font-weight: bold; font-size: 14px;">{{ profilen.name }}</div>
				<div style="font-size: 12px; font-weight: bold;">{{ profilen.email }}</div>
			</div>
		</div>
		<ul style="margin-left: -5px;">
			<li><a href="#" ng-click="showAllContent()"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="#" ng-click="showDashboard()"><i class="fa fa-globe"></i> Web Dashboard Access</a></li>
			<li><a href="/login/?userid={{ adminId }}&redirectType=userActivity"><i class="fa fa-user"></i> User Activity</a></li>
			<li><a href="#" ng-click="showAppDown()"><i class="fa fa-download"></i> App Download</a></li>
			<li><a href="#" ng-click="showSupport()"><i class="fa fa-phone"></i> Support</a></li>
			<li><a href="#" ng-click="showAbout()"><i class="fa fa-info-circle"></i> About</a></li>
			<li><a href="/form_login"><i class="fa fa-sign-out"></i> Logout</a></li>
		</ul>
	</div>

	<!-- About Content Section -->
	<div ng-show="aboutVisible" class="about-section" style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
		<h2>About</h2>
		<!-- <img src="/Efeedor_logo.png" alt="Colorful Image" style="max-width: 100%; height: auto; margin-bottom: 20px;"> -->
		<p><strong>Version:</strong> 8.01.05</p>
		<p>
			The Efeedor Mobile App is an extension of Efeedor's Healthcare Experience Management Suite, developed by ITATONE POINT CONSULTING LLP, a global health tech company specializing in enterprise applications for healthcare experience management. Designed for healthcare staff on the go, the app simplifies tasks like collecting patient feedback, addressing concerns, and reporting incidents or internal tickets. With its intuitive interface, you can easily track and manage activities and tickets.
		</p>
		<p>
			Record patient feedback, concerns, and requests, report incidents and grievances, and raise internal tickets effortlessly. The Efeedor Mobile App puts healthcare experience management at your fingertips, streamlining operations for better care delivery.
		</p>
		<p><i class="fa fa-globe"></i> <a href="https://www.efeedor.com" target="_blank">www.efeedor.com</a></p>
		<p><i class="fa fa-envelope"></i> <a href="mailto:contact@efeedor.com">contact@efeedor.com</a></p>
	</div>

	<!-- Support Content Section -->
	<div ng-show="supportVisible" class="support-section" style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
		<h2>Support</h2>
		<p>
			For dedicated assistance ensuring your satisfaction and success with our software, please complete the details below to create your support ticket.
		</p>

		<iframe width="500" height="650" src="https://crm.efeedor.com/forms/ticket" frameborder="0" allowfullscreen></iframe>
	</div>

	<!-- App Download Section -->
	<div ng-show="appDownloadVisible" class="app-download-section" style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
		<h2>App Download</h2>
		<p>
			Download the Efeedor Mobile App to enhance your healthcare experience management. Click the button below to get the latest version of the APK.
		</p>

		<!-- Button for APK Download -->
		<button ng-click="downloadApk()"
			ng-disabled="!setting_data.android_apk"
			style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
			<i class="fa fa-download"></i> Download APK
		</button>
	</div>

	<!-- Web Dashboard section -->
	<div ng-show="dashboardVisible" class="dashboard-section" style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
		<h2>Explore Web Dashboard</h2>
		<p>
			To access the web dashboard, please log in with your credentials using the following link. If you hold an Admin role, you will have access to view reports and analytics based on the permissions granted. If you are a department head or in charge of a department, you will be able to access the dashboard to view reports and analytics specific to your department and take action on the tickets assigned to you or your team.
		</p>

		<!-- Button for APK Download -->
		<a href="/login/?userid={{ adminId }}"
			style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
			<i class="fa fa-globe"></i> Click here to open the link
		</a>
	</div>
	<!-- top navbar end -->
	<!-- Create a modal for language selection -->
	<div class="modal fade" id="languageModal" tabindex="-1" role="dialog" aria-labelledby="languageModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="languageModalLabel">Select Language</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Place your language selection options here -->



					<div class=" col-lg-12 col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-2 mb-2">
						<div class=" px-0 pt-2 pb-0">

							<div style="text-align: left; align-items: left; margin-left: 25px; margin-right: 25px;"></div>
							<div class="box box-primary profilepage">
								<div class="box-body box-profile" style="display: inline-block;">

									<div class="card" style=" border: 2px solid #000;">
										<div class="" ng-click="language('english')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
											<span style="margin-left: -133px; color: #4b4c4d;">
												English
											</span><br>
											<span style="font-size: 34px; color: #4b4c4d; font-weight: bold;">
												A
											</span>
										</div>
									</div>
									<br>

									<!-- <div class="card" style=" border: 2px solid #000;">
										<div class="" ng-click="language('lang2')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
											<span style="margin-left: -133px; color: #4b4c4d;">
												ಕನ್ನಡ
											</span><br>
											<span style="font-size: 34px; color: #4b4c4d; font-weight: bold;">
												ಕ
											</span>
										</div>
									</div>
									<br> -->

									<!-- <div class="card" style=" border: 2px solid #000;">
										<div class="" ng-click="language('lang3')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
											<span style="margin-left: -100px; color: #4b4c4d;">
												മലയാളം
											</span><br>
											<span style="font-size: 34px; color: #4b4c4d; font-weight: bold;">
												അ
											</span>
										</div>
									</div>
									<br> -->

									<!--	<div class="card" style=" border: 2px solid #000;">
										<div class="card-body" ng-click="language('lang3')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
											<span style="margin-left: -100px; color: #4b4c4d;">
												தமிழ்
											</span><br>
											<span style="font-size: 34px; color: #4b4c4d; font-weight: bold;">
												த
											</span>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="grad1" ng-show="!aboutVisible && !supportVisible && !appDownloadVisible && !dashboardVisible">
		<div class="row justify-content-center mt-0" style="height:max-content;">
			<div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-2 mb-2">
				<img ng-src="{{setting_data.logo}}" style="    height: 50px;">
				<br>
				<div class="card px-0 pt-2 pb-0 mt-2 mb-3">
					<div class="row">
						<div class="col-md-12 mx-0">
							<!-- form start -->
							<form id="msform">


								<!-- INTERIM FEEDBACK FORM page start  -->
								<fieldset ng-show="step2 == true">
									<div class="form-card">
										<h3 class="sectiondivision" style="font-weight:bold;">{{lang.pagetitle}}</h3>

										<p style="margin:0px; margin-top:10px;font-size: 16px;">
											<?php
											date_default_timezone_set('Asia/Kolkata');
											$hour = date('H');

											if ($hour < 12) {
												echo '{{lang.goodmorning}}';
											} elseif ($hour < 18) {
												echo '{{lang.goodafternoon}}';
											} else {
												echo '{{lang.goodevening}}';
											} ?>
											<!-- {{lang.gustname}}  -->
											{{loginname}}
											<br>
										<p style="margin:0px;font-size: 16px;">{{lang.gustmessageint}}</p>
									</div>
									<br />


									<h4 style="font-size: 18px; margin-bottom: 22px; padding-top: 10px;">
										<b>{{lang.chooseCategory}}
											<!--<select ng-model="selectedMonth" ng-change="saveSelection()" ng-options="month for month in months" style="font-size: 16px; margin-left: 10px; border: 1px solid grey; background: white; padding: 2px 5px; border-radius: 4px; font-weight: bold;">-->
											<!--</select>-->
											<!--<select ng-model="selectedYear" ng-change="saveSelection()" ng-options="year for year in years" style="font-size: 16px; margin-left: 10px; border: 1px solid grey; background: white; padding: 2px 5px; border-radius: 4px; font-weight: bold;">-->
											<!--</select>-->
										</b>
									</h4>



									<div class="" style="width: 94%; margin: 0px auto;">
										<div class="row">
											<div class="col-12">
												<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">MRD & MDC</h4>
											</div>
										</div>
										
										<div class="row" ng-if="profilen['AUDIT1'] == true" title="Ensures completeness of IP records incl. doctor, nurse & dietician notes; aligned with NABH, JCI, CAHO standards and WHO/ICMR patient safety protocols.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../active_cases_mrd" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.active_cases_mrd_audit_ip}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Ensures completeness of IP records incl. doctor, nurse & dietician notes; aligned with NABH, JCI, CAHO standards and WHO/ICMR patient safety protocols."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT2'] == true" title="Tracks X-ray waiting time from billing to procedure completion as per NABH, WHO, AERB, ICMR, CDC, CAHO & JCI standards to improve workflow, ensure safety, and enhance patient care.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../dischargedpatients_mrd_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.discharged_patients_mrd_audit_2023}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks X-ray waiting time from billing to procedure completion as per NABH, WHO, AERB, ICMR, CDC, CAHO & JCI standards to improve workflow, ensure safety, and enhance patient care."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT3'] == true" title="Tracks USG waiting time from billing to report delivery as per NABH, WHO, ICMR, CDC, CAHO & JCI standards to enhance efficiency, streamline workflow, and improve patient satisfaction.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../nursingip_closed_cases" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.nursing_ip_closed_cases}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks USG waiting time from billing to report delivery as per NABH, WHO, ICMR, CDC, CAHO & JCI standards to enhance efficiency, streamline workflow, and improve patient satisfaction."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT4'] == true" title="Tracks CT scan waiting time from billing to procedure completion as per NABH, WHO, ICMR, CDC, CAHO & JCI standards to optimize workflow, ensure safety, and enhance patient satisfaction.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../nursingip_open_cases" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.nursing_ip_open_cases}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks CT scan waiting time from billing to procedure completion as per NABH, WHO, ICMR, CDC, CAHO & JCI standards to optimize workflow, ensure safety, and enhance patient satisfaction."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT5'] == true" title="Validates OR safety compliance—patient ID, consent, site marking, infection control & equipment checks as per NABH, JCI, CAHO, WHO Safe Surgery & CDC perioperative standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../nursingop_closed_cases" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.nursing_op_closed_cases}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Validates OR safety compliance—patient ID, consent, site marking, infection control & equipment checks as per NABH, JCI, CAHO, WHO Safe Surgery & CDC perioperative standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT6'] == true" title="Assesses safe prescribing, dispensing & administration of medications as per NABH, JCI, CAHO, WHO Medication Safety, ISMP & CDSCO standards to ensure compliance and patient safety.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_active_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_dietetics_active}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses safe prescribing, dispensing & administration of medications as per NABH, JCI, CAHO, WHO Medication Safety, ISMP & CDSCO standards to ensure compliance and patient safety."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT7'] == true" title="Ensures safe, timely & accurate medication administration with patient rights, infection control & documentation checks as per NABH, JCI, CAHO & WHO safe medication standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_closedcases_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_dietetics_closed_cases}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Ensures safe, timely & accurate medication administration with patient rights, infection control & documentation checks as per NABH, JCI, CAHO & WHO safe medication standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT8'] == true" title="Monitors safe, complete patient handover including ID, vitals, meds, risks & pending results as per NABH, JCI, CAHO & WHO communication standards (SBAR/IPASS) to ensure continuity of care.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pharmacy_closed" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pharmacy_closed}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Monitors safe, complete patient handover including ID, vitals, meds, risks & pending results as per NABH, JCI, CAHO & WHO communication standards (SBAR/IPASS) to ensure continuity of care."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT9'] == true" title="Audits prescriptions for legibility & completeness—drug, dose, route, frequency, patient ID & doctor signature—as per NABH, JCI, CAHO, MCI & WHO safe prescribing standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pharmacy_op" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pharmacy_op}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits prescriptions for legibility & completeness—drug, dose, route, frequency, patient ID & doctor signature—as per NABH, JCI, CAHO, MCI & WHO safe prescribing standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT10'] == true" title="Tracks staff hand hygiene practices & compliance by role/department to prevent HAIs, aligned with NABH, JCI, CAHO, WHO 5 Moments & CDC infection control guidelines.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pharmacy_open" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pharmacy_open}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks staff hand hygiene practices & compliance by role/department to prevent HAIs, aligned with NABH, JCI, CAHO, WHO 5 Moments & CDC infection control guidelines."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT11'] == true" title="Monitors turnaround time for blood and component requests to ensure timely transfusion, as per NABH, JCI, CAHO, NACO & WHO standards on blood bank safety and transfusion practices.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../anesthesia_active_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_anesthesia_active}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Monitors turnaround time for blood and component requests to ensure timely transfusion, as per NABH, JCI, CAHO, NACO & WHO standards on blood bank safety and transfusion practices."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT12'] == true" title="Tracks ICU nurse-patient ratio to ensure safe staffing and quality care, aligned with NABH, JCI, CAHO, MoHFW & Indian Nursing Council standards for critical care units.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../anesthesia_closed_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_anesthesia_closed}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks ICU nurse-patient ratio to ensure safe staffing and quality care, aligned with NABH, JCI, CAHO, MoHFW & Indian Nursing Council standards for critical care units."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT13'] == true" title="Monitors ICU readmissions within 48 hours of discharge to evaluate care quality, prevent adverse events, and improve outcomes as per NABH, JCI, CAHO, MoHFW & ICMR patient safety standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../ed_active_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_ed_active}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Monitors ICU readmissions within 48 hours of discharge to evaluate care quality, prevent adverse events, and improve outcomes as per NABH, JCI, CAHO, MoHFW & ICMR patient safety standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['AUDIT14'] == true" title="Validates ICU readmission data within 24–48 hrs to ensure accuracy, support quality reviews, and minimize errors as per NABH, JCI, CAHO, MoHFW & ICMR patient safety guidelines.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../ed_closed_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_ed_closed}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Validates ICU readmission data within 24–48 hrs to ensure accuracy, support quality reviews, and minimize errors as per NABH, JCI, CAHO, MoHFW & ICMR patient safety guidelines."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT15'] == true" title="Tracks ED revisits within 72 hours with similar complaints to assess care adequacy, detect missed diagnoses, and enhance patient safety as per NABH, JCI, CAHO, MoHFW & ICMR guidelines.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../icu_active_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_icu_active}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks ED revisits within 72 hours with similar complaints to assess care adequacy, detect missed diagnoses, and enhance patient safety as per NABH, JCI, CAHO, MoHFW & ICMR guidelines."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT16'] == true" title="Verifies ED revisit data within 24–72 hrs to ensure accurate documentation, monitor patient outcomes, and improve emergency care as per NABH, JCI, CAHO, MoHFW & ICMR standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../icu_closed_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_icu_closed}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Verifies ED revisit data within 24–72 hrs to ensure accurate documentation, monitor patient outcomes, and improve emergency care as per NABH, JCI, CAHO, MoHFW & ICMR standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT17'] == true" title="Audits code mock drills to assess emergency response, child safety, staff readiness & debriefing, aligned with NABH, JCI, CAHO, MoHFW & hospital safety protocols for preparedness.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../primarycare_active_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_primary_care_active}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits code mock drills to assess emergency response, child safety, staff readiness & debriefing, aligned with NABH, JCI, CAHO, MoHFW & hospital safety protocols for preparedness."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT18'] == true" title="Audits Code emergency response, CPR quality, patient transport & CCU readiness to ensure staff efficiency and patient safety, aligned with NABH, JCI, CAHO & hospital emergency protocols.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../primarycare_closed_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_primary_care_closed}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits Code emergency response, CPR quality, patient transport & CCU readiness to ensure staff efficiency and patient safety, aligned with NABH, JCI, CAHO & hospital emergency protocols."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT19'] == true" title="Audits hospital facility safety—stairways, corridors, lighting, electricals, fire safety, cleanliness & signage—to prevent accidents and ensure compliance with NABH, JCI, CAHO & safety standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../sedation_active_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_sedation_active}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits hospital facility safety—stairways, corridors, lighting, electricals, fire safety, cleanliness & signage—to prevent accidents and ensure compliance with NABH, JCI, CAHO & safety standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT20'] == true" title="Monitors nurse-to-patient ratios in wards to ensure adequate staffing and safe patient care, aligned with NABH, JCI, CAHO & Indian hospital staffing standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../sedation_closed_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_sedation_closed}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Monitors nurse-to-patient ratios in wards to ensure adequate staffing and safe patient care, aligned with NABH, JCI, CAHO & Indian hospital staffing standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['AUDIT21'] == true" title="Ensures compliance with VAP prevention in ICU patients—covering hygiene, positioning, sedation & prophylaxis—as per NABH, JCI, CAHO & Indian ICU care standards to improve safety and outcomes.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../surgeons_active_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_surgeons_active}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Ensures compliance with VAP prevention in ICU patients—covering hygiene, positioning, sedation & prophylaxis—as per NABH, JCI, CAHO & Indian ICU care standards to improve safety and outcomes."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT22'] == true" title="Ensures safe, sterile urinary catheter insertion with patient ID, consent, aseptic technique & post-care education as per NABH, JCI, CAHO & Indian hospital catheter care standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../surgeons_closed_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicians_surgeons_closed}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Ensures safe, sterile urinary catheter insertion with patient ID, consent, aseptic technique & post-care education as per NABH, JCI, CAHO & Indian hospital catheter care standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT23'] == true" title="Ensures compliance with SSI bundle—pre, intra & post-op care, sterile technique, antibiotic prophylaxis & documentation—as per NABH, JCI, CAHO & Indian surgical infection prevention standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../dietconsultation_op_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.diet_consultation_op}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Ensures compliance with SSI bundle—pre, intra & post-op care, sterile technique, antibiotic prophylaxis & documentation—as per NABH, JCI, CAHO & Indian surgical infection prevention standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT24'] == true" title="Audits urinary catheter care—aseptic handling, drainage, hygiene & documentation—to prevent CAUTI, aligned with NABH, JCI, CAHO & Indian infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../physiotherapy_closed_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.physiotherapy_closed}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits urinary catheter care—aseptic handling, drainage, hygiene & documentation—to prevent CAUTI, aligned with NABH, JCI, CAHO & Indian infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT25'] == true" title="Audits central line insertion—aseptic technique, site prep, consent, hand hygiene & documentation—to prevent CLABSI, aligned with NABH, JCI, CAHO & Indian infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../physiotherapy_op_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.physiotherapy_op}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits central line insertion—aseptic technique, site prep, consent, hand hygiene & documentation—to prevent CLABSI, aligned with NABH, JCI, CAHO & Indian infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT26'] == true" title="Audits central line maintenance—hand hygiene, aseptic access, dressing care, daily assessment & documentation—to prevent CLABSI, aligned with NABH, JCI, CAHO & Indian infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../physiotherapy_open_mdc" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.physiotherapy_open}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits central line maintenance—hand hygiene, aseptic access, dressing care, daily assessment & documentation—to prevent CLABSI, aligned with NABH, JCI, CAHO & Indian infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT27'] == true" title="Audits cleaning of non-patient areas—trash, surfaces, floors, fixtures, toilets & equipment—ensuring hygiene as per NABH, JCI, CAHO & Indian hospital housekeeping and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../mrd_ed_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.mrd_audit_ed}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits cleaning of non-patient areas—trash, surfaces, floors, fixtures, toilets & equipment—ensuring hygiene as per NABH, JCI, CAHO & Indian hospital housekeeping and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT28'] == true" title="Audits toilet cleaning—hygiene, disinfection, supplies, odor control & maintenance—ensuring compliance with NABH, JCI, CAHO & Indian hospital infection control and housekeeping protocols.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../mrd_lama_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.mrd_audit_lama}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits toilet cleaning—hygiene, disinfection, supplies, odor control & maintenance—ensuring compliance with NABH, JCI, CAHO & Indian hospital infection control and housekeeping protocols."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT29'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../mrd_op_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.mrd_audit_op}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">Nursing & IPSG</h4>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT30'] == true" title="Tracks causes of accidental line dislodgement to enhance patient safety & care; complies with NABH, JCI, CAHO standards and WHO line-care protocols.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../accidental_delining_audit_checklist" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.accidental_delining_audit_checklist}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks causes of accidental line dislodgement to enhance patient safety & care; complies with NABH, JCI, CAHO standards and WHO line-care protocols."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT31'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../admissionholding_area_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.admission_holding_area_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT32'] == true" title="Evaluates CPR events for response time, quality & outcomes to improve survival; aligned with NABH, JCI, CAHO and AHA resuscitation guidelines.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../cardio_pulmonary_checklist" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.cpr_analysis_record}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Evaluates CPR events for response time, quality & outcomes to improve survival; aligned with NABH, JCI, CAHO and AHA resuscitation guidelines."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										

										<div class="row" ng-if="profilen['AUDIT33'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../extravasation_audit_checklist" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.extravasation_audit_checklist}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT34'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../hospital_acquire_pressure_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.hapu_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT35'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../initial_assessment_ae" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.initial_assessment_ae}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										

										<div class="row" ng-if="profilen['AUDIT36'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../initial_assessment_ipd" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.initial_assessment_ipd}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT37'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../initial_assessment_opd" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.initial_assessment_opd}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT38'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../ipsg1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.ipsg_1}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT39'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../ipsg2_ae" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.ipsg_2_ae}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										

										<div class="row" ng-if="profilen['AUDIT40'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../ipsg2_ipd" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.ipsg_2_ipd}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										
										<div class="row" ng-if="profilen['AUDIT41'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../ipsg4_timeout" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.ipsg_4_timeout_outside_ot}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT42'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../ipsg6_ip" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.ipsg_6_ip}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT43'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../ipsg6_opd" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.ipsg_6_opd}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										

										

										<div class="row" ng-if="profilen['AUDIT44'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../point_prevelance_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.point_prevalence_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">Clinical Outcome</h4>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT45'] == true" title="Tracks causes of accidental line dislodgement to enhance patient safety & care; complies with NABH, JCI, CAHO standards and WHO line-care protocols.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_audit_acl" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_audit_acl}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks causes of accidental line dislodgement to enhance patient safety & care; complies with NABH, JCI, CAHO standards and WHO line-care protocols."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT46'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_allogenic_bone_marrow" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_allogenic_bone_marrow}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT47'] == true" title="Evaluates CPR events for response time, quality & outcomes to improve survival; aligned with NABH, JCI, CAHO and AHA resuscitation guidelines.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_aortic_value_replacement" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_aortic_value_replacement}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Evaluates CPR events for response time, quality & outcomes to improve survival; aligned with NABH, JCI, CAHO and AHA resuscitation guidelines."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										

										<div class="row" ng-if="profilen['AUDIT48'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_autologous_bone" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_autologous_bone}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT49'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_brain_tumour" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_brain_tumour}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT50'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_cabg" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_cabg}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										

										<div class="row" ng-if="profilen['AUDIT51'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_carotid_stenting" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_carotid_stenting}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT52'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_chemotherapy" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_chemotherapy}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT53'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_colo_rectal" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_colo_rectal}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT54'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_endoscopy" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_endoscopy}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										

										<div class="row" ng-if="profilen['AUDIT55'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_epilepsy" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_epilepsy}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										
										<div class="row" ng-if="profilen['AUDIT56'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_herniorrhaphy" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_herniorrhaphy}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT57'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_holep" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_holep}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT58'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_laparoscopic_appendicectomy" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_laparoscopic_appendicectomy}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										

										

										<div class="row" ng-if="profilen['AUDIT59'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_mechanical_thrombectomy" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_mechanical_thrombectomy}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT60'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_mvr" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_mvr}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT61'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_ptca" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_ptca}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT62'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_renal_transplantation" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_renal_transplantation}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT63'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_scoliosis_correction" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_scoliosis_correction}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT64'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_spinal_dysraphism" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_spinal_dysraphism}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT65'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_spine_disc_surgery" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_spine_disc_surgery}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT66'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_thoracotomy" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_thoracotomy}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT67'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_tkr" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_tkr}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT68'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_uro_oncology" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_uro_oncology}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT69'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_whipples_surgery" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_whipples_surgery}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
											<div class="row" ng-if="profilen['AUDIT70'] == true" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI  & Indian hospital food safety and infection control standards.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicaloutcome_laparoscopic_cholecystectomy" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicaloutcome_laparoscopic_cholecystectomy}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Audits canteen hygiene, food handling, storage, transport, pest control & staff training per NABH, JCI & Indian hospital food safety and infection control standards."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">Clinical KPI</h4>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT71'] == true" title="Tracks causes of accidental line dislodgement to enhance patient safety & care; complies with NABH, JCI, CAHO standards and WHO line-care protocols.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicalkpi_bronchodilators_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicalkpi_bronchodilators_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks causes of accidental line dislodgement to enhance patient safety & care; complies with NABH, JCI, CAHO standards and WHO line-care protocols."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT72'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinicalkpi_copd_protocol_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinicalkpi_copd_protocol_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">Infection Control & PCI</h4>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT73'] == true" title="Tracks causes of accidental line dislodgement to enhance patient safety & care; complies with NABH, JCI, CAHO standards and WHO line-care protocols.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_biomedical_waste" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_biomedical_waste}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Tracks causes of accidental line dislodgement to enhance patient safety & care; complies with NABH, JCI, CAHO standards and WHO line-care protocols."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT74'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_canteen_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_canteen_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT75'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_cssd_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_cssd_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT76'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_hand_hygiene" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_hand_hygiene}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT77'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_bundle_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_bundle_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT78'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_ot_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_ot_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT79'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_linen_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_linen_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT80'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_ambulance_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_ambulance_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT81'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_coffee_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_coffee_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT82'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_laboratory_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_laboratory_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT83'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_mortuary_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_mortuary_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT84'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_radiology_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_radiology_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT85'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_ssi_survelliance_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_ssi_survelliance_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT86'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_peripheralivline_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_peripheralivline_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT87'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_personalprotective_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_personalprotective_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT88'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_safe_injection_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_safe_injection_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT89'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../infection_control_surface_cleaning_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.infection_control_surface_cleaning_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">Clinical Pathways</h4>
											</div>
										</div>

										<div class="row" ng-if="profilen['AUDIT90'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_arthroscopic_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_arthroscopic_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT91'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_breast_lump_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_breast_lump_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT92'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_cardiac_arrest_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_cardiac_arrest_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT93'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_donor_hepatectomy_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_donor_hepatectomy_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT94'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_febrile_seizure_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_febrile_seizure_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT95'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_heart_transplant_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_heart_transplant_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT96'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_laproscopic_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_laproscopic_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT97'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_picc_line_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_picc_line_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT98'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_stroke_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_stroke_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT99'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_urodynamics_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_urodynamics_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['AUDIT100'] == true" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance.">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../clinical_pathway_stemi_audit" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.clinical_pathway_stemi_audit}} <i class="fa fa-info-circle" aria-hidden="true" style="margin-left:6px;color:#6c757d;" title="Assesses patient safety, care continuity & staff competency in holding areas; follows NABH, JCI, CAHO standards with WHO patient safety guidance."></i></p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										


									


									</div>



								</fieldset>





							</form>
							<!-- form end  -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<!-- body section end  -->


<!-- script code start  -->
<script>
	setTimeout(function() {

		$('#body').show();

	}, 2000);
</script>

<!-- script code end  -->



</html>