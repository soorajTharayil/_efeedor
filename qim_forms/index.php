<!DOCTYPE html>
<html lang="en">
<!-- head part start -->
<!-- Interim feedback -->

<head>
	<title>Quality KPI Management Software - Efeedor Healthcare Experience Management Platform</title>
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

									<div class="card" style=" border: 2px solid #000;">
										<div class="" ng-click="language('lang2')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
											<span style="margin-left: -133px; color: #4b4c4d;">
												ಕನ್ನಡ
											</span><br>
											<span style="font-size: 34px; color: #4b4c4d; font-weight: bold;">
												ಕ
											</span>
										</div>
									</div>
									<br>

									<div class="card" style=" border: 2px solid #000;">
										<div class="" ng-click="language('lang3')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
											<span style="margin-left: -100px; color: #4b4c4d;">
												മലയാളം
											</span><br>
											<span style="font-size: 34px; color: #4b4c4d; font-weight: bold;">
												അ
											</span>
										</div>
									</div>
									<br>

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
				<a class="navbar-brand" href="#"><img src="{{setting_data.logo}}" style="height: 70px; max-width: 200px;" alt="Efeedor Logo"></a>
				<br>
				<div class="card px-0 pt-2 pb-0 mt-2 mb-3">
					<div class="row">
						<div class="col-md-12 mx-0">
							<!-- form start -->
							<form id="msform">


								<!-- INTERIM FEEDBACK FORM page start  -->
								<fieldset ng-show="step2 == true">
									<div class="form-card">
										<h3 class="sectiondivision" style="font-weight:bold;" ng-show="feedback.section == 'GRIEVANCE'">{{lang.pagetitle}}</h3>

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
											<select ng-model="selectedMonth" ng-change="saveSelection()" ng-disabled="profilen['MONTH-SELECTION'] == false" ng-options="month for month in months" style="font-size: 16px; margin-left: 10px; border: 1px solid grey; background: white; padding: 2px 5px; border-radius: 4px; font-weight: bold;">
											</select>
											<select ng-model="selectedYear" ng-change="saveSelection()" ng-disabled="profilen['MONTH-SELECTION'] == false" ng-options="year for year in years" style="font-size: 16px; margin-left: 10px; border: 1px solid grey; background: white; padding: 2px 5px; border-radius: 4px; font-weight: bold;">
											</select>
										</b>
									</h4>

									<div class="" style="width: 94%; margin: 0px auto;">
										<!-- <div class="row">
											<div class="col-12">
												<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">Mandatory Indicators</h4>
											</div>
										</div> -->
										<div class="row" ng-if="profilen['KPI1'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">

															<div class="card product-card" style="margin-bottom: 10px;">
																<a href="../CQI3a1" class="card" ng-click="saveSelection()" style="text-decoration: none; background-color: #F5F5F5; color: black;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>

																		<p class="text ">{{lang.initial_assesment}}</p>


																	</div>
															</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI2'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.report_error}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI3'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.safety_precautions}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI4'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.medication_errors}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI5'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.medication_charts}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI6'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.adverse_drug}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI7'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a7" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.unplanned_return}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI8'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a8" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.wrong_surgery}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI9'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a9" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.transfusion_reactions}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI10'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a10" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.mortality_ratio}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI11'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a11" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.theemergency}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI12'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a12" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.ulcers}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI13'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a13" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.urinary}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI14'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a14" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.pneumonia}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI15'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a15" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.blood_infection}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI16'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a16" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.site_infection}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI17'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a17" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.hand_hygiene}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI18'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a18" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.prophylactic}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI19'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a19" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.re_scheduling}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI20'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a20" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.blood_components}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI21'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a21" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.nurse_patient}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI22'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3a22" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.nurse_patient_w}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI3b Start -->
										<div class="row" ng-if="profilen['KPI23'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.consultation}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI24'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.diagnostics_l}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI25'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.diagnostics_x}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI26'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.diagnostics_u}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI27'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.diagnostics_c}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI28'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.discharge}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI29'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b7" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.medical_records}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI30'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b8" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.emergency_medications}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI31'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b9" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.mock_drills}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI32'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b10" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.patient_fall}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI33'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b11" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.near_misses}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI34'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b12" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.stick_injuries}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" ng-if="profilen['KPI35'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3b13" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.shift_change}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI3c Start -->
										<div class="row" ng-if="profilen['KPI36'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">{{lang.medication_error}}</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI37'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Incidence of medication errors -Prescription errors (IP)- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI38'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Incidence of medication errors -Dispensing errors (IP)- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI39'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of admissions with A D R- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI40'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of medication charts with error prone abbreviations (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI41'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of patients receiving high risk medication developing adverse drug event (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI42'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c7" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Incidence of Medication Administering errors (As per NABH 4th edition)- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI43'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c8" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of in-patients developing adverse drug reaction (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI44'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c9" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Incidence of Medication Administering errors- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI45'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c10" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Incidence of medication errors- Dispensing errors (IP)- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI46'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c11" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Incidence of medication errors- Prescription errors (IP)- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI47'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c12" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Emperical Antibiotics therapy compliance rate for high risk infections (JCI8-MMU1.1)- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI48'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c13" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Restricted antibiotics usage compliance rate (JCI8-MMU1.1)- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI49'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3c14" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Monitor data related to appropriateness of indication for the new drugs (JCI8-MMU2.0)- (Clinical Pharmacy)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI3d Start -->
										<div class="row" ng-if="profilen['KPI50'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3d1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of modification of anaesthesia plan (OT-Anasthesia)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI51'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3d2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of unplanned ventilation following anaesthesia (OT-Anasthesia)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI52'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3d3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of adverse anaesthesia events following anaesthesia (OT-Anasthesia)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI53'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3d4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Anaesthesia related mortality rate (OT - Anasthesia)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI54'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3d5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of safe and rational prescriptions (Clinical Pharmacy- IP)</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI3e Start -->

										<div class="row" ng-if="profilen['KPI55'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3e1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of unplanned return to OT</p>

																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI56'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3e2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of re-scheduling of surgeries (OT)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI57'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3e3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of cases where organisations procedure to prevent surgery errors have been adhered(OT)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI58'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3e4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of cases receiving appropriate prophylactic antibiotics with specified time frame (Clinical Pharmacy)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI59'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3e5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Percentage of cases where the planned surgery were changed intraoperatively (OT)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI60'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3e6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Re-exploration Rate (OT)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI61'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3e7" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Primary Cesarean Rate (Nursing - OBG)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI62'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3e8" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">Adverse events related to implant devices (JCI8-ASC 4.4)- (OT)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI63'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3e9" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text ">All major patient safety events or errors related to surgical procedures (JCI8-QPS 3.04)- (OT)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI3f Start -->

										<div class="row" ng-if="profilen['KPI64'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Percentage of transfusion reactions (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI65'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Percentage of waste of blood and blood components among those issued (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI66'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Percentage of waste of blood and blood components among those stored (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI67'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Percentage of number of blood component units used (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI68'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Turn-around time for blood and blood components cross matched / reserved (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI69'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Adverse events and near miss events involving blood bank and/or transfusion services (Transfusion to the wrong patient, Mislabeled blood product, Contaminated blood product) (JCI8-AOP 4.00)- (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI70'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f7" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Blood Availability Rate (JCI8-AOP 4.00)- (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI71'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f8" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">CT Ratio (Cross match to transfusion) (JCI8-AOP 4.00)- (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI72'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f9" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Turnaround time for Platelet Apheresis (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI73'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3f10" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Turnaround time for blood donation (Blood Center)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI3g start -->

										<div class="row" ng-if="profilen['KPI74'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3g1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Catheter associated urinary tract infection rate- (Infection Control - Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI75'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3g2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Ventilator Associated Pneumonias (VAP) in 1000 ventilator days (Infection Control - Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI76'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3g3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Central Line Associated Blood Stream Infection (CLABSI)- (Infection Control - Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI77'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3g4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Surgical site infection rate (Infection Control - Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI78'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3g5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Late Onset Sepsis Rate After 72 Hours (Nursing - NICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI79'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3g6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Environmental cleaning & disinfection compliance rate (JCI8-PCI 4.0)- (Housekeeping)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI3h start -->

										<div class="row" ng-if="profilen['KPI80'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3h1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Mortality rate (MRD)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI81'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3h2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Return to ICU within 48 hours (Nursing - ICU1)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI82'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3h3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Return to ICU-2 within 48 hours (Nursing-ICU2)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI83'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3h4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Return to ICU-3 within 48 hours (Nursing - CICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI84'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3h5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Return to the emergency department after 72 hours with similar presenting complaints- (Emergency-Department)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI85'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3h6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Reintubation rate- (Nursing - ICU1)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI86'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3h7" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Reintubation rate- (Nursing - ICU2)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI87'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3h8" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Reintubation rate- (Nursing - CICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI88'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3h9" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Re-Admission Rate(Nursing-NICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI3j start -->

										<div class="row" ng-if="profilen['KPI89'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Shift change handover communication (Nurses) (ED, ICU, Ward)- (Nursing - Emergency Department)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI90'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Shift change handover communication (Nurses) (ED, ICU, Ward)- (Nursing - ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI91'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Shift change handover communication (Nurses) (ED, ICU, Ward)- (Nursing - Ward)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI92'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Incidence of patient identification error (Quality Office)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI93'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Number of missed hand hygiene opportunities (Infection Control - Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI94'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Compliance rate to medication prescription in capitals (Clinical Pharmacy)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI95'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j7" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Shift change handover communication (Doctors)- (MRD - Emergency Department)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI96'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j8" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Shift change handover communication (Doctors)- (MRD - ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI97'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j9" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Compliance to patient identification -IPD (Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI98'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j10" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Compliance rate of timeliness of reporting Critical results in Radiology (within 30 min)- (Radiology)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI99'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j11" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication interdepartmental shift- (MRD - Emergency Department)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI100'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j12" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication interdepartmental shift- (MRD - ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI101'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j13" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing - Emergency Department)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI102'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j14" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing - ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI103'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j15" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing -Ward)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI104'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j16" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication among doctors (During shift change)- (MRD - Emergency Department)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI105'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j17" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication among doctors (During shift change)- (MRD - ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI106'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j18" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing - Emergency Department)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="row" ng-if="profilen['KPI107'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j19" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing -ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI108'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j20" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing -Ward)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI109'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j21" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - Endoscopy)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI110'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j22" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI111'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j23" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - OT)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI112'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j24" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 6 - Compliance to Fall prevention measures in IPD- (Nursing - IPD)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI113'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j25" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 6 - Compliance to Fall prevention measures in OPD- (Nursing - OPD)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI114'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j26" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">IPSG 6 - Compliance to Fall prevention measures in Physiotherapy OP patients- (Physical therapy and Rehabilitation Department - Physiotherapy)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI115'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j27" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Compliance to hand hygiene practice (New)- (Infection Control - Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI116'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j28" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Compliance to patient identification OPD- (Nursing-OPD)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI117'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j29" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Shift change handover communication (Doctors - Ward)- (Medical Administration)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI118'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j30" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Incidence of Adverse events in Physiotherapy (IPD)- (Physical therapy and Rehabilitation Department - Physiotherapy)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI119'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j31" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Incidence of Adverse events in Physiotherapy (OPD)- (Physical therapy and Rehabilitation Department - Physiotherapy)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI120'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j32" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Rate of Safety, security incidents related to Work place violence (JCI8-FMS 3.0, 4.0)- (Security and Safety)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI121'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j33" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Security incidents rate (JCI8-FMS 4.0)- (Safety & Security)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI122'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI3j34" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Safety incidents rate (JCI8-FMS 3.0)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI4a start -->

										<div class="row" ng-if="profilen['KPI123'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4a1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Percentage of drugs and consumables procured by local purchases within the formulary (Pharmacy)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI124'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4a2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Percentage of drugs and consumables procured by local purchase outside the formulary (Pharmacy)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI125'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4a3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Stock out rate of emergency medications (Pharmacy)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI126'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4a4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Percentage of drugs and consumables rejected before preparation of Goods Receipt Note (SCM-Store)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI127'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4a5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Percentage of variations from procurement process (SCM-Purchase)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI4b start -->

										<div class="row" ng-if="profilen['KPI128'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4b1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Incidence of bed sores (hospital associated pressure ulcers) after admission (in 1000 patient days)- (Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI129'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4b2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Incidence of falls (in 1000 IPD days)- (Quality Office)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI130'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4b3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Number of variations observed in mock drill (Safety & Security)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI131'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4b4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Percentage of staff provided with pre-exposure prophylaxis (Infection Control)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI132'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4b5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Number of Fire Incidents (Safety & Security)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI133'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4b6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Incidence of device associated pressure ulcer after admission (Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI134'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4b7" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Number of Extravasation (Nursing)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI135'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4b8" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Monitoring of Clinical Errors (JCI8-PCC 2.3)- (Quality Office)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- CQI4c start -->

										<div class="row" ng-if="profilen['KPI136'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c1" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Bed occupancy rate- (MRD)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI137'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c2" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Average length of stay (MRD)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI138'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c3" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">OT Utilization Rate (OT)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI139'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c4" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">ICU equipment utilization rate (Nursing - ICU1)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI140'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c5" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">ICU equipment utilization rate (Nursing - ICU2)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI141'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c6" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">ICU equipment utilization rate (Nursing - ICU3)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI142'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c7" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">ICU Bed utilization rate (Nursing - ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI143'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c8" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Critical equipment downtime (Biomedical Engineering)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI144'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c9" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Cath lab utilization rate</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI145'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c10" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Nurse patient ratio for ICU Ventilated (Nursing-ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI146'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c11" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Nurse patient ratio for ICU Non Ventilated (Nursing-ICU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI147'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c12" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Nurse patient ratio for HDU (Nursing-HDU)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI148'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c13" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Nurse patient ratio for Ward (Nursing-Ward)</p>
																	</div>
																</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row" ng-if="profilen['KPI149'] == true">
											<div class="col-12">
												<div class="card">
													<div class="row">
														<div class="col-12">
															<a href="../CQI4c14" class="card" style="text-decoration: none;">
																<div class="card product-card" style="margin-bottom: 10px;">
																	<div class="card-body" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																		<p class="text" ng-bind-html="q.icon" style="color: #5c5959;font-size: 36px;"></p>
																		<p class="text">Engineering Critical equipment downtime (Engineering & Maintenance)</p>
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