<?php
// Disable caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<!-- head part start -->
<!-- Interim feedback -->

<head>
	<title>Quality KPI Management Software - Efeedor Healthcare Experience Management Platform</title>
	<meta charset="utf-8">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="style.css?<?php echo time(); ?>">
	<script src="dist/js/jquery.min.js"></script>
	<script src="dist/js/popper.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/js/angular.min.js"></script>
	<script src="dist/js/angular-sanitize.min.js"></script>
	<script src="dist/js/load-image.all.min.js"></script>

	<script src="app_grievance.js?<?php echo time(); ?>"></script>
</head>
<!-- head part end -->


<!-- body part start -->

<body ng-app="ehandorApp" ng-controller="PatientFeedbackCtrl" id="body" ng-cloak>

	<body>
		<div class="container">
		</div>
	</body>

	<fieldset ng-show="step0 == true">
		<div class="main-container">
			<div class="form-container" style="margin-top: 100px;">


				<div class="form-body" style="align-items:center;">
					<form class="the-form">
						<div style="text-align: center; margin-top:-22px;">
							<a class="navbar-brand" href="#"><img src="{{setting_data.logo}}"
									style="height: 100px; width:100%" title="LOGO" alt="-"></a>
						</div>
						<br>
						<div ng-cloak style="color: red; text-align: center;" class="alert-error"
							ng-show="loginerror.length > 3">
							{{loginerror}}
						</div>
						<!-- <label for="text">Email / Mobile Number</label> -->
						<input type="text" name="email" id="email" class="input-field"
							placeholder="Enter email/ mobile no." ng-model="loginvar.userid">
						<!-- <label for="password">Password</label> -->
						<div class="password-container">
							<input type="password" name="password" id="password" class="input-field"
								placeholder="Enter password" ng-model="loginvar.password">
							<span style="color: rgba(0, 0, 0, 0.8);" class="password-toggle" onclick="togglePassword()">
								<i class="fa fa-eye-slash" aria-hidden="true"></i>
							</span>
						</div>
						<div style=" display: flex;
		justify-content: center; /* horizontally center */
		align-items: center; ">
							<input ng-click="login()" type="submit" value="LOGIN" style="width: 100px; height:45px;">
						</div>
					</form>
				</div>
				<!-- FORM BODY-->
				<br><br><br>
				<div class="form-footer" style=" display: flex;
		justify-content: center; /* horizontally center */
		align-items: center; ">
					<img src="./logo.png" style="max-width: 100%; height: 45px; " alt="">
				</div><!-- FORM FOOTER -->

			</div><!-- FORM CONTAINER -->
		</div>
	</fieldset>
	<!-- top navbar start -->
	<div ng-cloak ng-show="step2">
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed">
			<!-- Logo of efeedor -->
			<!-- <a class="navbar-brand" href="#"><img src="{{setting_data.logo}}" style="height: 36px; margin-left: -10px;" alt="Efeedor Logo"></a> -->

			<!-- Section for Buttons and Language Button -->
			<div class="ml-auto d-flex justify-content-between align-items-center w-100">
				<div class="left-buttons d-flex">

					<!-- Home button -->
					<a ng-href="/form_login" class="btn btn-secondary mr-3" title="Click to return to Application Home"
						style="width: 100px; height: 32px; font-size: 14px; font-weight: bold; display: flex; align-items: center; justify-content: center;">
						<i class="fa fa-home" style="margin-right: 6px;"></i> Home
					</a>


					<!-- Dashboard button with icon -->
					<a ng-href="/login/?user_id={{ user_id }}" class="btn btn-light dashboard-btn"
						title="Click to access your Dashboard and Reports"
						style="width: 120px; height: 32px; font-size: 14px; font-weight: bold; text-align: left; display: flex; align-items: center; padding-left: 10px;">
						<i class="fa fa-tachometer" style="margin-right: 6px;"></i> Dashboard
					</a>

				</div>



				<!-- Right Side: Language Button -->
				<div class="right-buttons d-flex align-items-center">
					<button type="button" class="btn btn-dark language-btn" data-toggle="modal"
						data-target="#languageModal" style="margin: 4px;">
						<!--  {{type2}}-->
						<!--  <i class="fa fa-language" aria-hidden="true"></i>-->
						<!--</button>-->
						<button class="btn btn-dark menu-toggle" ng-click="menuVisible = !menuVisible"
							style="margin: 4px;">
							<i class="fa fa-bars"></i>
						</button>
				</div>
			</div>
		</nav>
		<div ng-cloak class="menu-dropdown" ng-show="menuVisible" style="margin-top: 32px; margin-right: 10px;">
			<div class="user-info"
				style="display: flex; align-items: center; padding: 10px; border-bottom: 1px solid #ddd; background: #f5f5f5;">
				<i class="fa fa-user-circle" style="font-size: 24px; margin-right: 10px; color: #333;"></i>
				<div>
					<div ng-cloak style="font-weight: bold; font-size: 14px;">{{ profilen.name }}</div>
					<div ng-cloak style="font-size: 12px; font-weight: bold;">{{ profilen.email }}</div>
				</div>
			</div>
			<ul style="margin-left: -5px;">
				<li><a href="#" ng-click="showAllContent()"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="#" ng-click="showDashboard()"><i class="fa fa-globe"></i> Web Dashboard Access</a></li>
				<li><a href="/login/?userid={{ adminId }}&redirectType=userActivity"><i class="fa fa-user"></i> User
						Activity</a></li>

				<li><a href="#" ng-click="showAbout()"><i class="fa fa-info-circle"></i> About</a></li>
				<li><a href="/qim_forms"><i class="fa fa-sign-out"></i> Logout</a></li>
			</ul>
		</div>

		<!-- About Content Section -->
		<div ng-show="aboutVisible" class="about-section"
			style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
			<h2>About</h2>
			<!-- <img src="/Efeedor_logo.png" alt="Efeedor Logo" style="max-width: 100%; height: auto; margin-bottom: 20px;"> -->
			<p><strong>Version:</strong> 8.01.10</p>
			<p>
				The Efeedor Quality Management Software (QMS) is an extension of Efeedor's Healthcare Experience
				Management Suite, developed by ITATONE POINT CONSULTING LLP, a global health-tech company specializing
				in enterprise applications for hospitals.
			</p>
			<p>
				Designed for healthcare staff on the go, the QMS application simplifies essential tasks such as
				reporting incidents, performing audits, and recording monthly KPIs, while enabling healthcare
				institutions to efficiently analyze quality parameters to enhance healthcare quality and patient safety.
			</p>
			<p>
				Efeedor’s software tools are widely recognized for their simple, intuitive interface and exceptional
				user experience, making them the preferred choice for modern hospitals.
			</p>
			<p>For more information, visit: <a href="https://www.efeedor.com" target="_blank">www.efeedor.com</a></p>
			<p>For support, contact: <a href="mailto:support@efeedor.com">support@efeedor.com</a></p>
		</div>

		<!-- Support Content Section -->
		<div ng-show="supportVisible" class="support-section"
			style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
			<h2>Support</h2>
			<p>
				For dedicated assistance ensuring your satisfaction and success with our software, please complete the
				details below to create your support ticket.
			</p>

			<iframe width="500" height="650" src="https://crm.efeedor.com/forms/ticket" frameborder="0"
				allowfullscreen></iframe>
		</div>

		<!-- App Download Section -->
		<div ng-show="appDownloadVisible" class="app-download-section"
			style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
			<h2>App Download</h2>
			<p>
				Download the Efeedor Mobile App to enhance your healthcare experience management. Click the button below
				to
				get the latest version of the APK.
			</p>

			<!-- Button for APK Download -->
			<button ng-click="downloadApk()" ng-disabled="!setting_data.android_apk"
				style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
				<i class="fa fa-download"></i> Download APK
			</button>
		</div>

		<!-- Web Dashboard section -->
		<div ng-show="dashboardVisible" class="dashboard-section"
			style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
			<h2>Explore Web Dashboard</h2>
			<p>
				To access the web dashboard, please log in with your credentials using the following link. If you hold
				an
				Admin role, you will have access to view reports and analytics based on the permissions granted. If you
				are
				a department head or in charge of a department, you will be able to access the dashboard to view reports
				and
				analytics specific to your department and take action on the tickets assigned to you or your team.
			</p>

			<!-- Button for APK Download -->
			<a href="/login/?userid={{ adminId }}"
				style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
				<i class="fa fa-globe"></i> Click here to open the link
			</a>
		</div>
		<div class="modal fade" id="languageModal" tabindex="-1" role="dialog" aria-labelledby="languageModalLabel"
			aria-hidden="true">
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

								<div
									style="text-align: left; align-items: left; margin-left: 25px; margin-right: 25px;">
								</div>
								<div class="box box-primary profilepage">
									<div class="box-body box-profile" style="display: inline-block;">

										<div class="card" style=" border: 2px solid #000;">
											<div class="" ng-click="language('english')"
												style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
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
											<div class="" ng-click="language('lang2')"
												style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
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
											<div class="" ng-click="language('lang3')"
												style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
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

		<div class="container-fluid" id="grad1"
			ng-show="!aboutVisible && !supportVisible && !appDownloadVisible && !dashboardVisible">
			<div class="row justify-content-center mt-0" style="height:max-content;">
				<div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-2 mb-2">
					<a class="navbar-brand" href="#"><img src="{{setting_data.logo}}"
							style="height: 70px; max-width: 200px;" alt="Efeedor Logo"></a>
					<br>
					<div class="card px-0 pt-2 pb-0 mt-2 mb-3">
						<div class="row">
							<div class="col-md-12 mx-0">
								<!-- form start -->
								<form id="msform">


									<!-- INTERIM FEEDBACK FORM page start  -->
									<fieldset>
										<div class="form-card">
											<h3 class="sectiondivision" style="font-weight:bold;"
												ng-show="feedback.section == 'GRIEVANCE'">{{lang.pagetitle}}</h3>

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
												<select ng-model="selectedMonth" ng-change="saveSelection()"
													ng-disabled="profilen['MONTH-SELECTION'] == false"
													ng-options="month for month in months"
													style="font-size: 16px; margin-left: 10px; border: 1px solid grey; background: white; padding: 2px 5px; border-radius: 4px; font-weight: bold;">
												</select>
												<select ng-model="selectedYear" ng-change="saveSelection()"
													ng-disabled="profilen['MONTH-SELECTION'] == false"
													ng-options="year for year in years"
													style="font-size: 16px; margin-left: 10px; border: 1px solid grey; background: white; padding: 2px 5px; border-radius: 4px; font-weight: bold;">
												</select>
											</b>
										</h4>

										<!-- Search box -->
										<input type="text" ng-model="searchAudit" placeholder="🔍 Search KPI..."
											style="width:94%;margin:10px auto;display:block; padding:8px 10px;border:1px solid #ccc; border-radius:4px;font-size:16px;">

										<div class="" style="width: 94%; margin: 0px auto;">
											<div class="row" ng-if="hasKPIInGroup('MRD')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Medical Records Department (MRD)</h4>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI1'] == true"
												ng-show="matchSearch(lang.initial_assesment)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">

																<div class="card product-card"
																	style="margin-bottom: 10px;">
																	<a href="../CQI3a1" class="card"
																		ng-click="saveSelection()"
																		style="text-decoration: none; background-color: #F5F5F5; color: black;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>

																			<p class="text ">{{lang.initial_assesment}}
																			</p>
																		</div>
																</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI2'] == true"
												ng-show="matchSearch(lang.report_error)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a2" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text ">{{lang.report_error}}</p>

																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI4'] == true"
												ng-show="matchSearch(lang.medication_errors)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a4" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text ">{{lang.medication_errors}}
																			</p>

																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI6'] == true"
												ng-show="matchSearch(lang.adverse_drug)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a6" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text ">{{lang.adverse_drug}}</p>

																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI14'] == true"
												ng-show="matchSearch(lang.pneumonia)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a14" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text ">{{lang.pneumonia}}</p>

																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI80'] == true"
												ng-show="matchSearch('Mortality Rate (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3h1" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">Mortality Rate (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI95'] == true"
												ng-show="matchSearch('Shift change handover communication (Doctors)- (MRD - Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j7" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">Shift change handover
																				communication (Doctors)- (MRD -
																				Emergency Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI96'] == true"
												ng-show="matchSearch('Shift change handover communication (Doctors)- (MRD - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j8" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">Shift change handover
																				communication (Doctors)- (MRD - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI99'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication interdepartmental shift- (MRD - Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j11" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication interdepartmental shift-
																				(MRD - Emergency Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="row" ng-if="profilen['KPI100'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication interdepartmental shift- (MRD - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j12" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication interdepartmental shift-
																				(MRD - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI104'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication among doctors (During shift change)- (MRD - Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j16" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication among doctors (During
																				shift change)- (MRD - Emergency
																				Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI105'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication among doctors (During shift change)- (MRD - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j17" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication among doctors (During
																				shift change)- (MRD - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI136'] == true"
												ng-show="matchSearch('Bed Occupancy Rate- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c1" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Bed Occupancy Rate- (MRD)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI137'] == true"
												ng-show="matchSearch('Average length of stay (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average length of stay (MRD)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="row" ng-if="profilen['KPI176'] == true"
												ng-show="matchSearch('Percentage of Medical records not having discharge summary- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4g1" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of Medical
																				records not having discharge summary-
																				(MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI177'] == true"
												ng-show="matchSearch('Percentage of Medical records not having codification as per ICD- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4g2" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of Medical
																				records not having codification as per
																				ICD- (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI178'] == true"
												ng-show="matchSearch('Percentage of Medical records having improper or incomplete consent- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4g3" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of Medical
																				records having improper or incomplete
																				consent- (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI179'] == true"
												ng-show="matchSearch('Percentage of missing medical records- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4g4" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of missing
																				medical records- (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI180'] == true"
												ng-show="matchSearch('Compliance rate of adhering with policies and procedures for care of patients at risk for suicide and self-harm (JCI8-COP 5)- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4g5" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance rate of adhering
																				with policies and procedures for care of
																				patients at risk for suicide and
																				self-harm (JCI8-COP 5)- (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI181'] == true"
												ng-show="matchSearch('Monthly Abbreviation Compliance- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4g6" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Monthly Abbreviation
																				Compliance- (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI182'] == true"
												ng-show="matchSearch('Total number of LAMA cases with Reasons- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k1" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Total number of LAMA cases
																				with Reasons- (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI198'] == true"
												ng-show="matchSearch('Case Fatality 1: CAD- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k17" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Case Fatality 1: CAD- (MRD)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI199'] == true"
												ng-show="matchSearch('Case Fatality 2: Acute coronary syndrome- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k18" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Case Fatality 2: Acute
																				coronary syndrome- (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI200'] == true"
												ng-show="matchSearch('Case Fatality 3: Cerebral infarction- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k19" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Case Fatality 3: Cerebral
																				infarction- (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI201'] == true"
												ng-show="matchSearch('Case Fatality 4: MI- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k20" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Case Fatality 4: MI- (MRD)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI202'] == true"
												ng-show="matchSearch('Case Fatality 5: Heart failure- (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k21" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Case Fatality 5: Heart
																				failure- (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI208'] == true"
												ng-show="matchSearch('Non-compliance to Copy and paste policy (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k27" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Non-compliance to Copy and
																				paste policy (MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI210'] == true"
												ng-show="matchSearch('Case Fatality - COVID 19 (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k29" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Case Fatality - COVID 19
																				(MRD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI211'] == true"
												ng-show="matchSearch('Case Fatality - Stroke (MRD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k30" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Case Fatality - Stroke (MRD)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>



											<div class="row" ng-if="profilen['KPI302'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Cardiology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM1" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Cardiology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI303'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - CVTS)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM2" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- CVTS)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI304'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Gastro surgery)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM3" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Gastro surgery)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI305'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Gastroenterology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM4" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Gastroenterology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI306'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - General Medicine)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM5" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- General Medicine)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI307'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM6" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI308'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Nephrology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM7" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Nephrology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI309'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Neuro Intervention)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM8" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Neuro Intervention)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI310'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Neurology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM9" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Neurology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI311'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Neurosurgery)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM10" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Neurosurgery)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI312'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Ortho neuro integrated spine)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM11" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Ortho neuro integrated spine)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI313'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Ortho THR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM12" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Ortho THR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI314'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Ortho TKR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM13" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Ortho TKR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI315'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Orthopaedics)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM14" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Orthopaedics)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI316'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Pulmonology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM15" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Pulmonology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI317'] == true"
												ng-show="matchSearch('Average length of stay- (MRD - Urology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM16" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Average length of stay- (MRD
																				- Urology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="row" ng-if="hasKPIInGroup('Nursing')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Nursing</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI8'] == true"
												ng-show="matchSearch(lang.wrong_surgery)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a8" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.wrong_surgery}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI9'] == true"
												ng-show="matchSearch(lang.transfusion_reactions)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a9" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.transfusion_reactions}}
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI22'] == true"
												ng-show="matchSearch(lang.nurse_patient_w)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a22" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.nurse_patient_w}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI32'] == true"
												ng-show="matchSearch(lang.patient_fall)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b10" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.patient_fall}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI61'] == true"
												ng-show="matchSearch('Primary Cesarean Rate- (Nursing - OBG)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3e7" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Primary Cesarean Rate-
																				(Nursing - OBG)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI78'] == true"
												ng-show="matchSearch('Late Onset Sepsis Rate After 72 Hours- (Nursing - NICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3g5" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Late Onset Sepsis Rate After
																				72 Hours- (Nursing - NICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI81'] == true"
												ng-show="matchSearch('Return to ICU within 48 hours- (Nursing - ICU1)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3h2" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Return to ICU within 48
																				hours- (Nursing - ICU1)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI82'] == true"
												ng-show="matchSearch('Return to ICU-2 within 48 hours- (Nursing - ICU2)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3h3" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Return to ICU-2 within 48
																				hours- (Nursing - ICU2)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI83'] == true"
												ng-show="matchSearch('Return to ICU-3 within 48 hours- (Nursing - CICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3h4" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Return to ICU-3 within 48
																				hours- (Nursing - CICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI85'] == true"
												ng-show="matchSearch('Reintubation Rate- (Nursing - ICU1)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3h6" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Reintubation Rate- (Nursing
																				- ICU1)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI86'] == true"
												ng-show="matchSearch('Reintubation Rate- (Nursing - ICU2)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3h7" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Reintubation Rate- (Nursing
																				- ICU2)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI87'] == true"
												ng-show="matchSearch('Reintubation Rate- (Nursing - CICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3h8" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Reintubation Rate- (Nursing
																				- CICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI88'] == true"
												ng-show="matchSearch('Re-Admission Rate- (Nursing - NICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3h9" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Re-Admission Rate- (Nursing
																				- NICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI89'] == true"
												ng-show="matchSearch('Shift change handover communication (Nurses) - (Nursing - Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j1" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Shift change handover communication (Nurses) - (Nursing - Emergency Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI90'] == true"
												ng-show="matchSearch('Shift change handover communication (Nurses) - (Nursing - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j2" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Shift change handover communication (Nurses) - (Nursing - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI91'] == true"
												ng-show="matchSearch('Shift change handover communication (Nurses) - (Nursing - Ward)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j3" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Shift change handover communication (Nurses) - (Nursing - Ward)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI97'] == true"
												ng-show="matchSearch('Compliance to patient identification (IPD)- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j9" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to patient
																				identification (IPD)- (Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI101'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing - Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j13" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication interdepartmental Shift
																				(Nurses)- (Nursing - Emergency
																				Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI102'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j14" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication interdepartmental Shift
																				(Nurses)- (Nursing - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI103'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses)- (Nursing - Ward)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j15" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication interdepartmental Shift
																				(Nurses)- (Nursing - Ward)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI106'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing - Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j18" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication among nurses (During shift
																				change)- (Nursing - Emergency
																				Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI107'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j19" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication among nurses (During shift
																				change)- (Nursing - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI108'] == true"
												ng-show="matchSearch('IPSG 2.2 - Hand off communication among nurses (During shift change)- (Nursing - Ward)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j20" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 2.2 - Hand off
																				communication among nurses (During shift
																				change)- (Nursing - Ward)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI112'] == true"
												ng-show="matchSearch('IPSG 6 - Compliance to Fall prevention measures in IPD- (Nursing - IPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j24" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 6 - Compliance to Fall
																				prevention measures in IPD- (Nursing -
																				IPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI113'] == true"
												ng-show="matchSearch('IPSG 6 - Compliance to Fall prevention measures in OPD- (Nursing - OPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j25" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 6 - Compliance to Fall
																				prevention measures in OPD- (Nursing -
																				OPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI116'] == true"
												ng-show="matchSearch('Compliance to patient identification OPD- (Nursing - OPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j28" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to patient
																				identification OPD- (Nursing - OPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI128'] == true"
												ng-show="matchSearch('Incidence of bed sores (hospital associated pressure ulcers) after admission (in 1000 patient days)- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4b1" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of bed sores
																				(hospital associated pressure ulcers)
																				after admission (in 1000 patient days)-
																				(Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI133'] == true"
												ng-show="matchSearch('Incidence of device associated pressure ulcer after admission- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4b6" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of device
																				associated pressure ulcer after
																				admission- (Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI134'] == true"
												ng-show="matchSearch('Number of Extravasation- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4b7" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Number of Extravasation-
																				(Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI139'] == true"
												ng-show="matchSearch('ICU equipment utilization rate- (Nursing - ICU1)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">ICU equipment utilization
																				rate- (Nursing - ICU1)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI140'] == true"
												ng-show="matchSearch('ICU equipment utilization rate- (Nursing - ICU2)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">ICU equipment utilization
																				rate- (Nursing - ICU2)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI141'] == true"
												ng-show="matchSearch('ICU equipment utilization rate- (Nursing - ICU3)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">ICU equipment utilization
																				rate- (Nursing - ICU3)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI142'] == true"
												ng-show="matchSearch('ICU Bed utilization rate- (Nursing - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">ICU Bed utilization rate-
																				(Nursing - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI144'] == true"
												ng-show="matchSearch('Cath lab utilization rate')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c9" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Cath lab utilization rate
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI145'] == true"
												ng-show="matchSearch('Nurse patient ratio for ICU Ventilated- (Nursing - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c10" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Nurse patient ratio for ICU
																				Ventilated- (Nursing - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI146'] == true"
												ng-show="matchSearch('Nurse patient ratio for ICU Non Ventilated- (Nursing - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c11" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Nurse patient ratio for ICU
																				Non Ventilated- (Nursing - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI147'] == true"
												ng-show="matchSearch('Nurse patient ratio for HDU- (Nursing - HDU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c12" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Nurse patient ratio for HDU-
																				(Nursing - HDU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI148'] == true"
												ng-show="matchSearch('Nurse patient ratio for Ward- (Nursing - Ward)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c13" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Nurse patient ratio for
																				Ward- (Nursing - Ward)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI159'] == true"
												ng-show="matchSearch('Patient Satisfaction Rate- (Nursing - OBG)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d10" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Patient Satisfaction Rate-
																				(Nursing - OBG)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI160'] == true"
												ng-show="matchSearch('Turn-around Time for Nursing call bell responds- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d11" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Turn-around Time for Nursing
																				call bell responds- (Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI166'] == true"
												ng-show="matchSearch('Nurses Attrition Rate- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4e6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Nurses Attrition Rate-
																				(Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI221'] == true"
												ng-show="matchSearch('Restraint related injuries among admitted patients- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k40" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Restraint related injuries
																				among admitted patients- (Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI222'] == true"
												ng-show="matchSearch('Rate of compliance for restraint consent policy- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k41" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Rate of compliance for
																				restraint consent policy- (Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI223'] == true"
												ng-show="matchSearch('Percentage of Accidental removal of line- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k42" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of Accidental
																				removal of line- (Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI224'] == true"
												ng-show="matchSearch('Significant hypotension necessitating termination of dialysis- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k43" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Significant hypotension
																				necessitating termination of dialysis-
																				(Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI225'] == true"
												ng-show="matchSearch('IPSG4 - Time out compliance in outside OT- (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k44" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG4 - Time out compliance
																				in outside OT- (Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI243'] == true"
												ng-show="matchSearch('Timeliness of initiation of advanced cardiovascular life support (ACLS) within 5 Min (JCI8-COP 4) - (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k62" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Timeliness of initiation of
																				advanced cardiovascular life support
																				(ACLS) within 5 Min (JCI8-COP 4) -
																				(Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI245'] == true"
												ng-show="matchSearch('Rate to RRT response turn to Code blue (JCI8-COP 4) - (Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k64" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Rate to RRT response turn to
																				Code blue (JCI8-COP 4) - (Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI298'] == true"
												ng-show="matchSearch('Standardised Mortality Ratio for ICU1 - (Nursing - ICU 1)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h53" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Standardised Mortality Ratio
																				for ICU1 - (Nursing - ICU 1)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI299'] == true"
												ng-show="matchSearch('Standardised Mortality Ratio for ICU2 - (Nursing in ICU-2)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h54" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Standardised Mortality Ratio
																				for ICU2 - (Nursing in ICU-2)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI300'] == true"
												ng-show="matchSearch('Standardised Mortality Ratio for PICU - (Nursing in PICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h55" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Standardised Mortality Ratio
																				for PICU - (Nursing in PICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI301'] == true"
												ng-show="matchSearch('Standardised Mortality Ratio for NICU - (Nursing in NICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h56" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Standardised Mortality Ratio
																				for NICU - (Nursing in NICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Emergency Department')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Emergency Department</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI3'] == true"
												ng-show="matchSearch(lang.safety_precautions)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.safety_precautions}}
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI7'] == true"
												ng-show="matchSearch(lang.unplanned_return)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.unplanned_return}}
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="row" ng-if="profilen['KPI12'] == true"
												ng-show="matchSearch(lang.ulcers)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a12" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.ulcers}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI19'] == true"
												ng-show="matchSearch(lang.re_scheduling)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a19" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.re_scheduling}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI84'] == true"
												ng-show="matchSearch('Return to the emergency department after 72 hours with similar presenting complaints- (Emergency-Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3h5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Return to the emergency
																				department after 72 hours with similar
																				presenting complaints-
																				(Emergency-Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI191'] == true"
												ng-show="matchSearch('Door to thrombolysis time in ischemic stroke in ER- (Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k10" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Door to thrombolysis time in
																				ischemic stroke in ER- (Emergency
																				Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI192'] == true"
												ng-show="matchSearch('Door to image time in Stroke patients- (Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k11" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Door to image time in Stroke
																				patients- (Emergency Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI193'] == true"
												ng-show="matchSearch('Average number of patients visiting Emergency per day- (Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k12" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average number of patients
																				visiting Emergency per day- (Emergency
																				Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI194'] == true"
												ng-show="matchSearch('Efficiency of code blue team- (Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k13" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Efficiency of code blue
																				team- (Emergency Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI195'] == true"
												ng-show="matchSearch('Time for first defibrillation- (Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k14" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Time for first
																				defibrillation- (Emergency Department)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['KPI203'] == true"
												ng-show="matchSearch('Compliances in patient transfer and transportation process (External transfer) (Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k22" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliances in patient
																				transfer and transportation process
																				(External transfer) (Emergency
																				Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI204'] == true"
												ng-show="matchSearch('Number of Adverse Events During Patient Transfers (Outside) (Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k23" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Number of Adverse Events
																				During Patient Transfers (Outside)
																				(Emergency Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI242'] == true"
												ng-show="matchSearch('Return of spontaneous circulation (ROSC) achieving rate (JCI8-COP 4) - (Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k61" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Return of spontaneous
																				circulation (ROSC) achieving rate
																				(JCI8-COP 4) - (Emergency Department)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI244'] == true"
												ng-show="matchSearch('Timeliness of staff response to cardiac arrest (JCI8-COP 4) - (Emergency Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k63" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Timeliness of staff response
																				to cardiac arrest (JCI8-COP 4) -
																				(Emergency Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Cardiology')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Cardiology</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI11'] == true"
												ng-show="matchSearch(lang.theemergency)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a11" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.theemergency}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Clinical Nutrition & Dietetics')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Clinical Nutrition & Dietetics</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI5'] == true"
												ng-show="matchSearch(lang.medication_charts)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.medication_charts}}
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI197'] == true"
												ng-show="matchSearch('Compliance to diet order- (Clinical Nutrition and Dietetics)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k16" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to diet order-
																				(Clinical Nutrition and Dietetics)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI368'] == true"
												ng-show="matchSearch('Percentage of patient Identification Errors for Diet patients (IPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k65" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of patient Identification Errors for Diet patients (IPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>



											<div class="row" ng-if="hasKPIInGroup('Lab Service')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Lab Service</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI10'] == true"
												ng-show="matchSearch(lang.mortality_ratio)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a10" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.mortality_ratio}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI23'] == true"
												ng-show="matchSearch(lang.consultation)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.consultation}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI24'] == true"
												ng-show="matchSearch(lang.diagnostics_l)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.diagnostics_l}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI25'] == true"
												ng-show="matchSearch(lang.diagnostics_x)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.diagnostics_x}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>



											<div class="row" ng-if="profilen['KPI33'] == true"
												ng-show="matchSearch(lang.near_misses)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b11" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.near_misses}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI34'] == true"
												ng-show="matchSearch(lang.stick_injuries)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b12" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.stick_injuries}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI35'] == true"
												ng-show="matchSearch(lang.shift_change)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b13" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.shift_change}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI205'] == true"
												ng-show="matchSearch('ILC/EQAS compliance rate- (Lab Services)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k24" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">ILC/EQAS compliance rate-
																				(Lab Services)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI209'] == true"
												ng-show="matchSearch('Compliance to POCT IQC Checking- (Lab Services)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k28" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to POCT IQC
																				Checking- (Lab Services)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI272'] == true"
												ng-show="matchSearch('Compliance to reporting of critical values in Lab (within 30 min)- (Lab Service)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h27" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Compliance to reporting of
																				critical values in Lab (within 30 min)-
																				(Lab Service)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI273'] == true"
												ng-show="matchSearch('Compliance to reporting of critical values in POCT- (Lab Service)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h28" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Compliance to reporting of
																				critical values in POCT- (Lab Service)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI274'] == true"
												ng-show="matchSearch('TAT for Lab tests- (Lab Service)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h29" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">TAT for Lab tests- (Lab
																				Service)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI275'] == true"
												ng-show="matchSearch('TAT for Lab STAT- (Lab Service)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h30" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">TAT for Lab STAT- (Lab
																				Service)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI276'] == true"
												ng-show="matchSearch('Compliance to TAT for lab outsourced test- (Lab Service)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h31" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Compliance to TAT for lab
																				outsourced test- (Lab Service)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI277'] == true"
												ng-show="matchSearch('Lab Specimen Rejection Rate- (Lab Service)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h32" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Lab Specimen Rejection Rate-
																				(Lab Service)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>



											<div class="row" ng-if="hasKPIInGroup('Pulmonary Medicine')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Pulmonary Medicine</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI15'] == true"
												ng-show="matchSearch(lang.blood_infection)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a15" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.blood_infection}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Pediatrics')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Pediatrics</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI16'] == true"
												ng-show="matchSearch(lang.site_infection)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a16" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.site_infection}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Gastro Surgery')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Gastro Surgery</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI17'] == true"
												ng-show="matchSearch(lang.hand_hygiene)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a17" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.hand_hygiene}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI241'] == true"
												ng-show="matchSearch('Survival rate for living donor Liver transplants- (Gastrointestinal Surgery)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k60" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Survival rate for living
																				donor Liver transplants-
																				(Gastrointestinal Surgery)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Radiology')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Radiology</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI18'] == true"
												ng-show="matchSearch(lang.prophylactic)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a18" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.prophylactic}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI26'] == true"
												ng-show="matchSearch(lang.diagnostics_u)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.diagnostics_u}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI27'] == true"
												ng-show="matchSearch(lang.diagnostics_c)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.diagnostics_c}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI28'] == true"
												ng-show="matchSearch(lang.discharge)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.discharge}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI29'] == true"
												ng-show="matchSearch(lang.medical_records)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.medical_records}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI30'] == true"
												ng-show="matchSearch(lang.emergency_medications)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b8" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text ">
																				{{lang.emergency_medications}}
																			</p>

																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI98'] == true"
												ng-show="matchSearch('Compliance rate of timeliness of reporting Critical results in Radiology (within 30 min)- (Radiology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j10" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance rate of
																				timeliness of reporting Critical results
																				in Radiology (within 30 min)-
																				(Radiology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI154'] == true"
												ng-show="matchSearch('Waiting time for diagnostic services- (Radiology - CT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Waiting time for diagnostic
																				services- (Radiology - CT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI155'] == true"
												ng-show="matchSearch('Waiting time for diagnostic services- (Radiology - MRI)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Waiting time for diagnostic
																				services- (Radiology - MRI)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI156'] == true"
												ng-show="matchSearch('Waiting time for diagnostic services- (Radiology - USG)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Waiting time for diagnostic
																				services- (Radiology - USG)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI227'] == true"
												ng-show="matchSearch('Radiology TAT orders for CT- (Radiology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k46" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Radiology TAT orders for CT-
																				(Radiology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI228'] == true"
												ng-show="matchSearch('Radiology TAT orders for MRI- (Radiology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k47" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Radiology TAT orders for
																				MRI- (Radiology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI229'] == true"
												ng-show="matchSearch('Radiology TAT orders for USG- (Radiology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k48" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Radiology TAT orders for
																				USG- (Radiology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI230'] == true"
												ng-show="matchSearch('Radiology TAT orders for X-ray- (Radiology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k49" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Radiology TAT orders for
																				X-ray- (Radiology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI247'] == true"
												ng-show="matchSearch('TAT for radiology STAT orders- (Radiology - CT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">TAT for radiology STAT
																				orders- (Radiology - CT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI248'] == true"
												ng-show="matchSearch('TAT for radiology STAT orders- (Radiology - MRI)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">TAT for radiology STAT
																				orders- (Radiology - MRI)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI249'] == true"
												ng-show="matchSearch('TAT for radiology STAT orders- (Radiology - USG)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">TAT for radiology STAT
																				orders- (Radiology - USG)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI250'] == true"
												ng-show="matchSearch('HAZMAT compliance in radiology')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">HAZMAT compliance in
																				radiology</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI251'] == true"
												ng-show="matchSearch('TLD Reading Compliance- (Radiology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">TLD Reading Compliance-
																				(Radiology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI334'] == true"
												ng-show="matchSearch('TAT compliance for radiology outsourced test- (Radiology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">TAT compliance for radiology
																				outsourced test- (Radiology)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Nephrology')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Nephrology</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI20'] == true"
												ng-show="matchSearch(lang.blood_components)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a20" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.blood_components}}
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI214'] == true"
												ng-show="matchSearch('Survival rate for living donor kidney transplants- (Nephrology)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k33" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Survival rate for living
																				donor kidney transplants- (Nephrology)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Medical Administration')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Medical Administration</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI21'] == true"
												ng-show="matchSearch(lang.nurse_patient)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3a21" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.nurse_patient}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI117'] == true"
												ng-show="matchSearch('Shift change handover communication (Doctors - Ward)- (Medical Administration)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j29" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Shift change handover
																				communication (Doctors - Ward)- (Medical
																				Administration)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI332'] == true"
												ng-show="matchSearch('Compliance to medical service requests - Heart, Lung transplantation- (Medical Administration)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Compliance to medical
																				service requests - Heart, Lung
																				transplantation- (Medical
																				Administration)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI333'] == true"
												ng-show="matchSearch('Compliance to medical service requests - Heart, Lung transplantation- (Medical Administration)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Compliance to medical
																				service requests - Heart, Lung
																				transplantation- (Medical
																				Administration)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('OT')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">OT
													</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI31'] == true"
												ng-show="matchSearch(lang.mock_drills)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3b9" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.mock_drills}}</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI55'] == true"
												ng-show="matchSearch('Percentage of unplanned return to OT')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3e1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of unplanned
																				return to OT</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI56'] == true"
												ng-show="matchSearch('Percentage of re-scheduling of surgeries (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3e2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of re-scheduling
																				of surgeries (OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI57'] == true"
												ng-show="matchSearch('Percentage of cases where procedure to prevent surgery errors have been adhered (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3e3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of cases where
																				procedure to prevent surgery errors have
																				been adhered (OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI59'] == true"
												ng-show="matchSearch('Percentage of cases where the planned surgery were changed intraoperatively (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3e5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of cases where
																				the planned surgery were changed
																				intraoperatively (OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI60'] == true"
												ng-show="matchSearch('Re-exploration Rate (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3e6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Re-exploration Rate (OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI62'] == true"
												ng-show="matchSearch('Adverse events related to implant devices (JCI8-ASC 4.4)- (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3e8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Adverse events related to
																				implant devices (JCI8-ASC 4.4)- (OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI63'] == true"
												ng-show="matchSearch('All major patient safety events or errors related to surgical procedures (JCI8-QPS 3.04)- (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3e9" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">All major patient safety
																				events or errors related to surgical
																				procedures (JCI8-QPS 3.04)- (OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI138'] == true"
												ng-show="matchSearch('OT Utilization Rate- (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">OT Utilization Rate- (OT)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI190'] == true"
												ng-show="matchSearch('Average recovery time- (OT-Post OP)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k9" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average recovery time-
																				(OT-Post OP)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI216'] == true"
												ng-show="matchSearch('Major Discrepancies between Preoperative and Post operative Diagnosis- (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k35" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Major Discrepancies between
																				Preoperative and Post operative
																				Diagnosis- (OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI231'] == true"
												ng-show="matchSearch('Site Marking Compliance Rate- (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k50" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Site Marking Compliance
																				Rate- (OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI232'] == true"
												ng-show="matchSearch('Time Out Compliance Rate- (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k51" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Time Out Compliance Rate-
																				(OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI233'] == true"
												ng-show="matchSearch('Sign Out Compliance Rate- (OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k52" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Sign Out Compliance Rate-
																				(OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI369'] == true"
												ng-show="matchSearch('Number of Patient safety events or patterns of events during procedural sedation')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k66" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Number of Patient safety events or patterns of events during procedural sedation</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Clinical Pharmacy')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Clinical Pharmacy</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI36'] == true"
												ng-show="matchSearch(lang.medication_error)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">{{lang.medication_error}}
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI37'] == true"
												ng-show="matchSearch('Incidence of medication errors - Prescription errors (IP) (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of medication
																				errors - Prescription errors (IP)
																				(Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI38'] == true"
												ng-show="matchSearch('Incidence of medication errors - Dispensing errors (IP) (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of medication
																				errors - Dispensing errors (IP)
																				(Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI39'] == true"
												ng-show="matchSearch('Percentage of admissions with ADR (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of admissions
																				with ADR (Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI40'] == true"
												ng-show="matchSearch('Percentage of medication charts with error prone abbreviations (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of medication
																				charts with error prone abbreviations
																				(Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI41'] == true"
												ng-show="matchSearch('Percentage of patients receiving high risk medication developing adverse drug event (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of patients
																				receiving high risk medication
																				developing adverse drug event (Clinical
																				Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI42'] == true"
												ng-show="matchSearch('Incidence of Medication Administering errors (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of Medication Administering errors (Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI43'] == true"
												ng-show="matchSearch('Percentage of in-patients developing adverse drug reaction (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of in-patients
																				developing adverse drug reaction
																				(Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- <div class="row" ng-if="profilen['KPI44'] == true"
												ng-show="matchSearch('Incidence of Medication Administering errors (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c9" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of Medication
																				Administering errors (Clinical Pharmacy)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div> -->

											<!-- <div class="row" ng-if="profilen['KPI45'] == true"
												ng-show="matchSearch('Incidence of medication errors - Dispensing errors (IP) (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c10" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of medication
																				errors - Dispensing errors (IP)
																				(Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI46'] == true"
												ng-show="matchSearch('Incidence of medication errors - Prescription errors (IP) (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c11" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of medication
																				errors - Prescription errors (IP)
																				(Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div> -->

											<div class="row" ng-if="profilen['KPI47'] == true"
												ng-show="matchSearch('Empirical Antibiotics therapy compliance rate for high risk infections (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c12" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Empirical Antibiotics
																				therapy compliance rate for high risk
																				infections (Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI48'] == true"
												ng-show="matchSearch('Restricted antibiotics usage compliance rate (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c13" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Restricted antibiotics usage
																				compliance rate (Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI49'] == true"
												ng-show="matchSearch('Monitor data related to appropriateness of indication for the new drugs (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3c14" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Monitor data related to
																				appropriateness of indication for the
																				new drugs (Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI54'] == true"
												ng-show="matchSearch('Percentage of safe and rational prescriptions (Clinical Pharmacy- IP)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3d5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of safe and
																				rational prescriptions (Clinical
																				Pharmacy- IP)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI58'] == true"
												ng-show="matchSearch('Percentage of cases receiving appropriate prophylactic antibiotics within specified time frame (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3e4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of cases
																				receiving appropriate prophylactic
																				antibiotics within specified time frame
																				(Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI94'] == true"
												ng-show="matchSearch('Compliance rate to medication prescription in capitals (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance rate to
																				medication prescription in capitals
																				(Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI187'] == true"
												ng-show="matchSearch('Monitoring the duration of antibiotic usage in surgical prophylaxis (After 48 hours) (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Monitoring the duration of
																				antibiotic usage in surgical prophylaxis
																				(After 48 hours) (Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI188'] == true"
												ng-show="matchSearch('De-escalation of antibiotics (Clinical Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">De-escalation of antibiotics
																				(Clinical Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Anesthesia')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Anesthesia</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI50'] == true"
												ng-show="matchSearch('Percentage of modification of anaesthesia plan (OT - Anesthesia)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3d1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of modification
																				of anaesthesia plan (OT - Anesthesia)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI51'] == true"
												ng-show="matchSearch('Percentage of unplanned ventilation following anaesthesia (OT - Anesthesia)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3d2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of unplanned
																				ventilation following anaesthesia (OT -
																				Anesthesia)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI52'] == true"
												ng-show="matchSearch('Percentage of adverse anaesthesia events following anaesthesia (OT - Anesthesia)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3d3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of adverse
																				anaesthesia events following anaesthesia
																				(OT - Anesthesia)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI53'] == true"
												ng-show="matchSearch('Anaesthesia related mortality rate (OT - Anesthesia)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3d4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Anaesthesia related
																				mortality rate (OT - Anesthesia)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Blood Center')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Blood Center</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI64'] == true"
												ng-show="matchSearch('Percentage of transfusion reactions (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of transfusion
																				reactions (Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI65'] == true"
												ng-show="matchSearch('Percentage of waste of blood and blood components among those issued (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of waste of blood
																				and blood components among those issued
																				(Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI66'] == true"
												ng-show="matchSearch('Percentage of waste of blood and blood components among those stored (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of waste of blood
																				and blood components among those stored
																				(Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI67'] == true"
												ng-show="matchSearch('Percentage of number of blood component units used (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of number of
																				blood component units used (Blood
																				Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI68'] == true"
												ng-show="matchSearch('Turn-around time for blood and blood components cross matched / reserved (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Turn-around time for blood
																				and blood components cross matched /
																				reserved (Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI69'] == true"
												ng-show="matchSearch('Adverse events and near miss events involving blood bank and/or transfusion services (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Adverse events and near miss
																				events involving blood bank and/or
																				transfusion services (Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI70'] == true"
												ng-show="matchSearch('Blood Availability Rate (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Blood Availability Rate
																				(Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI71'] == true"
												ng-show="matchSearch('CT Ratio (Cross match to transfusion) (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">CT Ratio (Cross match to
																				transfusion) (Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI72'] == true"
												ng-show="matchSearch('Turnaround time for Platelet Apheresis (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f9" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Turnaround time for Platelet
																				Apheresis (Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI73'] == true"
												ng-show="matchSearch('Turnaround time for blood donation (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3f10" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Turnaround time for blood
																				donation (Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI331'] == true"
												ng-show="matchSearch('Prevalence of transfusion reactions in Leuco depleted PRBC transfusions (Blood Center)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM30" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Prevalence of transfusion
																				reactions in Leuco depleted PRBC
																				transfusions (Blood Center)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Infection Control')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Infection Control</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI74'] == true"
												ng-show="matchSearch('Catheter associated urinary tract infection rate (Infection Control - Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3g1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Catheter associated urinary
																				tract infection rate (Infection Control
																				- Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI75'] == true"
												ng-show="matchSearch('Ventilator Associated Pneumonias (VAP) in 1000 ventilator days (Infection Control - Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3g2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Ventilator Associated
																				Pneumonias (VAP) in 1000 ventilator days
																				(Infection Control - Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI76'] == true"
												ng-show="matchSearch('Central Line Associated Blood Stream Infection (CLABSI)- (Infection Control - Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3g3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Central Line Associated
																				Blood Stream Infection (CLABSI)-
																				(Infection Control - Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI77'] == true"
												ng-show="matchSearch('Surgical site infection rate (Infection Control - Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3g4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Surgical site infection rate
																				(Infection Control - Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>




											<!--<div class="row" ng-if="profilen['KPI93'] == true"-->
											<!--	ng-show="matchSearch('Number of missed hand hygiene opportunities (Infection Control - Nursing)')">-->
											<!--	<div class="col-12">-->
											<!--		<div class="card">-->
											<!--			<div class="row">-->
											<!--				<div class="col-12">-->
											<!--					<a href="../CQI3j5" class="card"-->
											<!--						style="text-decoration:none;">-->
											<!--						<div class="card product-card"-->
											<!--							style="margin-bottom:10px;">-->
											<!--							<div class="card-body"-->
											<!--								style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">-->
											<!--								<p class="text" ng-bind-html="q.icon"-->
											<!--									style="color:#5c5959;font-size:36px;">-->
											<!--								</p>-->
											<!--								<p class="text">Number of missed hand-->
											<!--									hygiene opportunities (Infection Control-->
											<!--									- Nursing)</p>-->
											<!--							</div>-->
											<!--						</div>-->
											<!--					</a>-->
											<!--				</div>-->
											<!--			</div>-->
											<!--		</div>-->
											<!--	</div>-->
											<!--</div>-->

											<div class="row" ng-if="profilen['KPI115'] == true"
												ng-show="matchSearch('Compliance to hand hygiene practice (New) - (Infection Control - Nursing)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j27" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to hand hygiene
																				practice (New) - (Infection Control -
																				Nursing)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI131'] == true"
												ng-show="matchSearch('Percentage of staff provided with pre-exposure prophylaxis (Infection Control)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4b4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of staff provided
																				with pre-exposure prophylaxis (Infection
																				Control)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI169'] == true"
												ng-show="matchSearch('Incidence of needle stick injuries IPD area (in 1000 IPD days) - (Infection Control - IPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4f1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of needle stick
																				injuries IPD area (in 1000 IPD days) -
																				(Infection Control - IPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI170'] == true"
												ng-show="matchSearch('Incidence of needle stick injuries OPD area (in 1000 OPD days) - (Infection Control - OPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4f2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of needle stick
																				injuries OPD area (in 1000 OPD days) -
																				(Infection Control - OPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI173'] == true"
												ng-show="matchSearch('Incidence of blood body fluid exposure IPD (Infection Control - IPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4f5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of blood body
																				fluid exposure IPD (Infection Control -
																				IPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI174'] == true"
												ng-show="matchSearch('Incidence of blood body fluid exposure OPD (Infection Control - OPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4f6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of blood body
																				fluid exposure OPD (Infection Control -
																				OPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI184'] == true"
												ng-show="matchSearch('Inguinal herniorrhaphy with mesh (Infection Control)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Inguinal herniorrhaphy with
																				mesh (Infection Control)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI185'] == true"
												ng-show="matchSearch('Coronary artery bypass grafting (CABG) (Infection Control)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Coronary artery bypass
																				grafting (CABG) (Infection Control)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI186'] == true"
												ng-show="matchSearch('Laparoscopic cholecystectomy (Infection Control)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Laparoscopic cholecystectomy
																				(Infection Control)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI215'] == true"
												ng-show="matchSearch('CAUTI Prevention Bundle compliance Rate (Infection Control)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k34" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">CAUTI Prevention Bundle
																				compliance Rate (Infection Control)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI218'] == true"
												ng-show="matchSearch('CLABSI Prevention Bundle compliance Rate (Infection Control)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k37" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">CLABSI Prevention Bundle
																				compliance Rate (Infection Control)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI219'] == true"
												ng-show="matchSearch('SSI Prevention Bundle compliance Rate (Infection Control)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k38" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">SSI Prevention Bundle
																				compliance Rate (Infection Control)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI220'] == true"
												ng-show="matchSearch('VAP Prevention Bundle compliance Rate (Infection Control)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k39" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">VAP Prevention Bundle
																				compliance Rate (Infection Control)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI318'] == true"
												ng-show="matchSearch('Catheter associated urinary tract infection rate (Infection Control - ICU1)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM17" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Catheter associated urinary
																				tract infection rate (Infection Control
																				- ICU1)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI319'] == true"
												ng-show="matchSearch('Catheter associated urinary tract infection rate (Infection Control - ICU2)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM18" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Catheter associated urinary
																				tract infection rate (Infection Control
																				- ICU2)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI320'] == true"
												ng-show="matchSearch('Catheter associated urinary tract infection rate (Infection Control - ICU3)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM19" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Catheter associated urinary
																				tract infection rate (Infection Control
																				- ICU3)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI321'] == true"
												ng-show="matchSearch('Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - ICU1)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM20" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Central Line Associated
																				Blood Stream Infection (CLABSI) -
																				(Infection Control - ICU1)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI322'] == true"
												ng-show="matchSearch('Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - ICU2)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM21" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Central Line Associated
																				Blood Stream Infection (CLABSI) -
																				(Infection Control - ICU2)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI323'] == true"
												ng-show="matchSearch('Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - ICU3)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM22" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Central Line Associated
																				Blood Stream Infection (CLABSI) -
																				(Infection Control - ICU3)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI324'] == true"
												ng-show="matchSearch('Surgical Site Infection rate (Infection Control - Ortho THR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM23" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Surgical Site Infection rate
																				(Infection Control - Ortho THR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI325'] == true"
												ng-show="matchSearch('Surgical Site Infection rate (Infection Control - Ortho TKR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM24" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Surgical Site Infection rate
																				(Infection Control - Ortho TKR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI326'] == true"
												ng-show="matchSearch('Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - ICU1)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM25" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Ventilator associated
																				pneumonias (VAP) in 1000 ventilator days
																				(Infection Control - ICU1)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI327'] == true"
												ng-show="matchSearch('Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - ICU2)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM26" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Ventilator associated
																				pneumonias (VAP) in 1000 ventilator days
																				(Infection Control - ICU2)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI328'] == true"
												ng-show="matchSearch('Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - ICU3)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM27" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Ventilator associated
																				pneumonias (VAP) in 1000 ventilator days
																				(Infection Control - ICU3)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI329'] == true"
												ng-show="matchSearch('Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - Ortho THR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM28" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Ventilator associated
																				pneumonias (VAP) in 1000 ventilator days
																				(Infection Control - Ortho THR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI330'] == true"
												ng-show="matchSearch('Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - Ortho TKR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CLOTCM29" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Ventilator associated
																				pneumonias (VAP) in 1000 ventilator days
																				(Infection Control - Ortho TKR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Housekeeping')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Housekeeping</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI79'] == true"
												ng-show="matchSearch('Environmental cleaning & disinfection compliance rate (JCI8-PCI 4.0)- (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3g6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Environmental cleaning &
																				disinfection compliance rate (JCI8-PCI
																				4.0)- (Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI280'] == true"
												ng-show="matchSearch('Medical Waste Collection Rate (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h35" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Medical Waste Collection
																				Rate (Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI281'] == true"
												ng-show="matchSearch('Compliance to MSDS in Facility (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h36" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to MSDS in
																				Facility (Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI282'] == true"
												ng-show="matchSearch('Percentage of Pest control Complaints rate (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h37" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of Pest control
																				Complaints rate (Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI283'] == true"
												ng-show="matchSearch('Linen Quality - Compliance Rate (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h38" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Linen Quality - Compliance
																				Rate (Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI285'] == true"
												ng-show="matchSearch('Outsourced staff manpower compliance rate (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h40" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Outsourced staff manpower
																				compliance rate (Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI292'] == true"
												ng-show="matchSearch('Compliances in patient room cleaning and hygiene practices (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h47" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliances in patient room
																				cleaning and hygiene practices
																				(Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI293'] == true" ng-show="matchSearch('Patients Complaints Rate (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h48" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Patients Complaints Rate (Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI335'] == true"
												ng-show="matchSearch('Food waste collection rate (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Food waste collection rate
																				(Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI336'] == true"
												ng-show="matchSearch('Solid waste collection rate (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Solid waste collection rate
																				(Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI337'] == true"
												ng-show="matchSearch('Outsourced GDA (General Duty Assistance) absenteeism rate (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i6" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Outsourced GDA (General Duty
																				Assistance) absenteeism rate
																				(Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI339'] == true"
												ng-show="matchSearch('Outsourced UTIZ staff attendance (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Outsourced UTIZ staff
																				attendance (Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI341'] == true"
												ng-show="matchSearch('Number of laundry loads reduced by optimizing and sorting laundry (JCI8-GHI 3) (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i10" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Number of laundry loads
																				reduced by optimizing and sorting
																				laundry (JCI8-GHI 3) (Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI342'] == true"
												ng-show="matchSearch('Percentage of cleaning products used biodegradable (JCI8-GHI 3) (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i11" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of cleaning
																				products used biodegradable (JCI8-GHI 3)
																				(Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>



											<div class="row" ng-if="profilen['KPI344'] == true"
												ng-show="matchSearch('Average quantity of Medical waste disposed per month in Kgs (Clinical practices to reduce the environmental impact - JCI8-GHI 3) (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i13" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average quantity of Medical
																				waste disposed per month in Kgs
																				(Clinical practices to reduce the
																				environmental impact - JCI8-GHI 3)
																				(Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI345'] == true"
												ng-show="matchSearch('Non-Recyclable Waste per Patient Day (Kg) - (JCI8-GHI 3) (Housekeeping)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i14" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Non-Recyclable Waste per
																				Patient Day (Kg) - (JCI8-GHI 3)
																				(Housekeeping)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Quality Office')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Quality Office</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI92'] == true"
												ng-show="matchSearch('Incidence of patient identification error (Quality Office)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of patient
																				identification error (Quality Office)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI109'] == true"
												ng-show="matchSearch('IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - Endoscopy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j21" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 4 - Ensure correct
																				site, correct procedure, correct patient
																				surgery- (Quality Office - Endoscopy)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI110'] == true"
												ng-show="matchSearch('IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - ICU)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j22" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 4 - Ensure correct
																				site, correct procedure, correct patient
																				surgery- (Quality Office - ICU)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI111'] == true"
												ng-show="matchSearch('IPSG 4 - Ensure correct site, correct procedure, correct patient surgery- (Quality Office - OT)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j23" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 4 - Ensure correct
																				site, correct procedure, correct patient
																				surgery- (Quality Office - OT)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI129'] == true"
												ng-show="matchSearch('Incidence of falls (in 1000 IPD days)- (Quality Office)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4b2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of falls (in 1000
																				IPD days)- (Quality Office)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI135'] == true"
												ng-show="matchSearch('Monitoring of Clinical Errors (JCI8-PCC 2.3)- (Quality Office)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4b8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Monitoring of Clinical
																				Errors (JCI8-PCC 2.3)- (Quality Office)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI171'] == true"
												ng-show="matchSearch('Percentage of sentinel events, reported, collected and analysed within the defined time frame (Quality Office)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4f3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of sentinel
																				events, reported, collected and analysed
																				within the defined time frame (Quality
																				Office)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI172'] == true"
												ng-show="matchSearch('Percentage of near misses (Quality Office)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4f4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of near misses
																				(Quality Office)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI183'] == true"
												ng-show="matchSearch('Adverse events due to handover (Quality Office)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Adverse events due to
																				handover (Quality Office)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI217'] == true"
												ng-show="matchSearch('Adverse Events Related to patient Identification (Quality Office)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k36" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Adverse Events Related to
																				patient Identification (Quality Office)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI254'] == true"
												ng-show="matchSearch('Incident report rate (Quality Office)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h9" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incident report rate
																				(Quality Office)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Physiotherapy')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Physiotherapy</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI114'] == true"
												ng-show="matchSearch('IPSG 6 - Compliance to Fall prevention measures in Physiotherapy OP patients- (Physical therapy and Rehabilitation Department - Physiotherapy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j26" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">IPSG 6 - Compliance to Fall
																				prevention measures in Physiotherapy OP
																				patients- (Physical therapy and
																				Rehabilitation Department -
																				Physiotherapy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI118'] == true"
												ng-show="matchSearch('Incidence of Adverse events in Physiotherapy (IPD)- (Physical therapy and Rehabilitation Department - Physiotherapy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j30" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of Adverse events
																				in Physiotherapy (IPD)- (Physical
																				therapy and Rehabilitation Department -
																				Physiotherapy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI119'] == true"
												ng-show="matchSearch('Incidence of Adverse events in Physiotherapy (OPD)- (Physical therapy and Rehabilitation Department - Physiotherapy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j31" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Incidence of Adverse events
																				in Physiotherapy (OPD)- (Physical
																				therapy and Rehabilitation Department -
																				Physiotherapy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI226'] == true"
												ng-show="matchSearch('Percentage of cases where initial assessment done in physiotherapy within 24 hours (IPD) - (Physical therapy and Rehabilitation Department - Medical records)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k45" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of cases where
																				initial assessment done in physiotherapy
																				within 24 hours (IPD) - (Physical
																				therapy and Rehabilitation Department -
																				Medical records)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI240'] == true"
												ng-show="matchSearch('Percentage of cases where in Initial assessment done in physiotherapy within 24 hours (OPD) - (Physical therapy and Rehabilitation Department - Medical records)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k59" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of cases where in
																				Initial assessment done in physiotherapy
																				within 24 hours (OPD) - (Physical
																				therapy and Rehabilitation Department -
																				Medical records)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI246'] == true"
												ng-show="matchSearch('Patient satisfaction index - Physiotherapy (Physical therapy and Rehabilitation Department)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Patient satisfaction index -
																				Physiotherapy (Physical therapy and
																				Rehabilitation Department)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Security & Safety')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Security & Safety</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI120'] == true"
												ng-show="matchSearch('Rate of Safety, security incidents related to Work place violence (JCI8-FMS 3.0, 4.0)- (Security and Safety)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j32" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Rate of Safety, security
																				incidents related to Work place violence
																				(JCI8-FMS 3.0, 4.0)- (Security and
																				Safety)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI121'] == true"
												ng-show="matchSearch('Security incidents rate (JCI8-FMS 4.0)- (Safety & Security)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j33" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Security incidents rate
																				(JCI8-FMS 4.0)- (Safety & Security)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI122'] == true"
												ng-show="matchSearch('Safety incidents rate (JCI8-FMS 3.0)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3j34" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Safety incidents rate
																				(JCI8-FMS 3.0)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI130'] == true"
												ng-show="matchSearch('Number of variations observed in mock drill (Safety & Security)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4b3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Number of variations
																				observed in mock drill (Safety &
																				Security)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI132'] == true"
												ng-show="matchSearch('Number of Fire Incidents (Safety & Security)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4b5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Number of Fire Incidents
																				(Safety & Security)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI271'] == true"
												ng-show="matchSearch('Outsourced Security service Staff Attendance (Safety & Security - Security)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h26" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Outsourced Security service
																				Staff Attendance (Safety & Security -
																				Security)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI297'] == true"
												ng-show="matchSearch('Percentage of adherence to facility audit observation closure (Safety & Security)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h52" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of adherence to
																				facility audit observation closure
																				(Safety & Security)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI288'] == true"
												ng-show="matchSearch('Quality of patient transportation by ambulance (Out-sourced)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h43" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text">Quality of patient
																				transportation by ambulance
																				(Out-sourced)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Pharmacy')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Pharmacy</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI123'] == true"
												ng-show="matchSearch('Percentage of drugs and consumables procured by local purchases within the formulary (Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4a1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of drugs and
																				consumables procured by local purchases
																				within the formulary (Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI124'] == true"
												ng-show="matchSearch('Percentage of drugs and consumables procured by local purchase outside the formulary (Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4a2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of drugs and
																				consumables procured by local purchase
																				outside the formulary (Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI125'] == true"
												ng-show="matchSearch('Stock out rate of emergency medications (Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4a3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Stock out rate of emergency
																				medications (Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI189'] == true"
												ng-show="matchSearch('High Alert Medication Segregation, storage & labelling Compliance rate (Pharmacy - Store)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">High Alert Medication
																				Segregation, storage & labelling
																				Compliance rate (Pharmacy - Store)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI255'] == true"
												ng-show="matchSearch('TAT for dispensing medicine - IP (Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h10" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">TAT for dispensing medicine
																				- IP (Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI256'] == true"
												ng-show="matchSearch('TAT for STAT medicine (Pharmacy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h11" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">TAT for STAT medicine
																				(Pharmacy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI370'] == true" ng-show="matchSearch('Percentage of OP Medication dispensed within less than 15 mints.')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4j23" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of OP Medication dispensed within less than 15 mints.</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('SCM-Store')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														SCM-Store</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI126'] == true"
												ng-show="matchSearch('Percentage of drugs and consumables rejected before preparation of Goods Receipt Note (SCM-Store)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4a4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of drugs and
																				consumables rejected before preparation
																				of Goods Receipt Note (SCM-Store)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('SCM-Purchase')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														SCM-Purchase</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI127'] == true"
												ng-show="matchSearch('Percentage of variations from procurement process (SCM-Purchase)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4a5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of variations
																				from procurement process (SCM-Purchase)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Biomedical Engineering')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Biomedical Engineering</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI143'] == true"
												ng-show="matchSearch('Critical equipment downtime (Biomedical Engineering)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Critical equipment downtime
																				(Biomedical Engineering)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI287'] == true"
												ng-show="matchSearch('Biomedical Preventive Maintenance Completion rate (Biomedical Engineering)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h42" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Biomedical Preventive
																				Maintenance Completion rate (Biomedical
																				Engineering)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Engineering & Maintenance')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Engineering & Maintenance</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI149'] == true"
												ng-show="matchSearch('Engineering Critical equipment downtime (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4c14" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Engineering Critical
																				equipment downtime (Engineering &
																				Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI265'] == true"
												ng-show="matchSearch('Average units of electricity consumed/Day (Units) (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h20" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average units of electricity
																				consumed/Day (Units) (Engineering &
																				Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI266'] == true"
												ng-show="matchSearch('TAT for complaints on equipment/Utility/Facility (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h21" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">TAT for complaints on
																				equipment/Utility/Facility (Engineering
																				& Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI267'] == true"
												ng-show="matchSearch('Average units of water consumed/Day (L) (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h22" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average units of water
																				consumed/Day (L) (Engineering &
																				Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI268'] == true"
												ng-show="matchSearch('Adherence to PPE usage in Engineering and Maintenance department (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h23" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Adherence to PPE usage in
																				Engineering and Maintenance department
																				(Engineering & Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI269'] == true"
												ng-show="matchSearch('Compliance to PM schedule (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h24" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to PM schedule
																				(Engineering & Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI270'] == true"
												ng-show="matchSearch('Compliance to safe storage of chemicals (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h25" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to safe storage
																				of chemicals (Engineering & Maintenance)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI291'] == true"
												ng-show="matchSearch('Compliance to PCRA (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h46" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to PCRA
																				(Engineering & Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI294'] == true"
												ng-show="matchSearch('Percentage of renewable energy used against total energy used (JCI8-GHI 3) - (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h49" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of renewable
																				energy used against total energy used
																				(JCI8-GHI 3) - (Engineering &
																				Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI295'] == true"
												ng-show="matchSearch('To Monitor the energy consumption (JCI8-GHI 3) - (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h50" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">To Monitor the energy
																				consumption (JCI8-GHI 3) - (Engineering
																				& Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI340'] == true"
												ng-show="matchSearch('Compliance to safe transportation of Oil waste (Engineering & Maintenance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i9" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to safe
																				transportation of Oil waste (Engineering
																				& Maintenance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Patient Care Services')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Patient Care Services</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI150'] == true"
												ng-show="matchSearch('Out-patient satisfaction index (OPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Out-patient satisfaction index (OPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI151'] == true"
												ng-show="matchSearch('Inpatient satisfaction index (IPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Inpatient satisfaction index (IPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI152'] == true"
												ng-show="matchSearch('Time taken for discharge - Cash Patients')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Time taken for discharge - Cash Patients</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI153'] == true"
												ng-show="matchSearch('Time taken for discharge - Insurance Patients')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Time taken for discharge - Insurance Patients</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI157'] == true"
												ng-show="matchSearch('Waiting Time for OPD appointments (Patient Care Services - OPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Waiting Time for OPD
																				appointments (Patient Care Services -
																				OPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI158'] == true"
												ng-show="matchSearch('Waiting Time for OPD Walkin (Patient Care Services - OPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4d9" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Waiting Time for OPD Walkin
																				(Patient Care Services - OPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI167'] == true"
												ng-show="matchSearch('Outsourced employee absenteeism rate (Nursing Assistants) - (Patient Care Services - OPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4e7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Outsourced employee
																				absenteeism rate (Nursing Assistants) -
																				(Patient Care Services - OPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI252'] == true"
												ng-show="matchSearch('Variance in Financial counselling (Patient Care Services - IPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Variance in Financial
																				counselling (Patient Care Services -
																				IPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI253'] == true"
												ng-show="matchSearch('Planned Discharge rate (Patient Care Services - IPD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Planned Discharge rate
																				(Patient Care Services - IPD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('HR')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">HR
													</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI161'] == true"
												ng-show="matchSearch('Employee satisfaction index (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4e1" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Employee satisfaction index
																				(HR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI162'] == true"
												ng-show="matchSearch('Employee attrition rate (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4e2" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Employee attrition rate (HR)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI163'] == true"
												ng-show="matchSearch('Employee absenteeism rate (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4e3" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Employee absenteeism rate
																				(HR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI164'] == true"
												ng-show="matchSearch('Percentage of employees aware of rights, responsibility and welfare schemes (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4e4" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of employees
																				aware of rights, responsibility and
																				welfare schemes (HR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI165'] == true"
												ng-show="matchSearch('Average number of training hours (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4e5" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average number of training
																				hours (HR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI168'] == true"
												ng-show="matchSearch('Average number of unpaid leave per month (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4e8" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average number of unpaid
																				leave per month (HR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI257'] == true"
												ng-show="matchSearch('Average number of Doctors on hospital rolls at any point of time (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h12" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average number of Doctors on
																				hospital rolls at any point of time (HR)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI258'] == true"
												ng-show="matchSearch('Average Number of Nurses on hospital rolls at any point of time (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h13" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average Number of Nurses on
																				hospital rolls at any point of time (HR)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI259'] == true"
												ng-show="matchSearch('Reason for staff exit (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h14" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Reason for staff exit (HR)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI260'] == true"
												ng-show="matchSearch('Compliance to Internal complaints committee requirements (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h15" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to Internal
																				complaints committee requirements (HR)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI261'] == true"
												ng-show="matchSearch('Effectiveness in recruitment (MRF submission days - Staff onboarded time) (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h16" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Effectiveness in recruitment
																				(MRF submission days - Staff onboarded
																				time) (HR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI262'] == true"
												ng-show="matchSearch('Compliance to Employee Engagement activities (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h17" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to Employee
																				Engagement activities (HR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI263'] == true"
												ng-show="matchSearch('Number of Mandatory training hours coverage / staff (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h18" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Number of Mandatory training
																				hours coverage / staff (HR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI264'] == true"
												ng-show="matchSearch('Compliance to ACLS training (HR)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h19" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to ACLS training
																				(HR)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('CSSD')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														CSSD</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI175'] == true"
												ng-show="matchSearch('Adverse events related to SUDs (JCI8-PCI 3.1) - (CSSD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4f7" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Adverse events related to
																				SUDs (JCI8-PCI 3.1) - (CSSD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI206'] == true"
												ng-show="matchSearch('Compliance with Biological Indicator (CSSD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k25" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance with Biological
																				Indicator (CSSD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI207'] == true"
												ng-show="matchSearch('Compliance to risk assessment in reprocessing of SUMD (CSSD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k26" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Compliance to risk
																				assessment in reprocessing of SUMD
																				(CSSD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Endoscopy')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Endoscopy</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI212'] == true"
												ng-show="matchSearch('Post procedure complication rate - Colonoscopy (Endoscopy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k31" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Post procedure complication
																				rate - Colonoscopy (Endoscopy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI213'] == true"
												ng-show="matchSearch('Polyp retrieval rate after colonoscopic polypectomy (Endoscopy)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k32" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Polyp retrieval rate after
																				colonoscopic polypectomy (Endoscopy)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Transplant Unit')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Transplant Unit</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI234'] == true"
												ng-show="matchSearch('Post transplant complication rate for Donor (Liver) - Transplant Unit')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k53" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Post transplant complication
																				rate for Donor (Liver) - Transplant Unit
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI235'] == true"
												ng-show="matchSearch('Post transplant complication rate (Heart) - Transplant Unit')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k54" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Post transplant complication
																				rate (Heart) - Transplant Unit</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Research')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Research</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI236'] == true"
												ng-show="matchSearch('Percentage of research activities approved by ethics committee (Research)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k55" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of research
																				activities approved by ethics committee
																				(Research)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI237'] == true"
												ng-show="matchSearch('Percentage of patients withdrawing from the study (Research)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k56" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of patients
																				withdrawing from the study (Research)
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI238'] == true"
												ng-show="matchSearch('Percentage of protocol violations/deviations reported (Research)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k57" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of protocol
																				violations/deviations reported
																				(Research)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI239'] == true"
												ng-show="matchSearch('Percentage of serious adverse events reported to the ethics committee within the defined timeframe (Research)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI3k58" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of serious
																				adverse events reported to the ethics
																				committee within the defined timeframe
																				(Research)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Insurance')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Insurance</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI278'] == true"
												ng-show="matchSearch('Insurance Claims Rejection Rate (Insurance)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h33" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Insurance Claims Rejection
																				Rate (Insurance)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI279'] == true"
												ng-show="matchSearch('TPA TAT (Insurance) for the month')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h34" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">TPA TAT (Insurance) for the
																				month</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('ITD')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														ITD</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI284'] == true"
												ng-show="matchSearch('Downtime of EMR (ITD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h39" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Downtime of EMR (ITD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI286'] == true"
												ng-show="matchSearch('ITD Preventive Maintenance compliance (ITD)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h41" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">ITD Preventive Maintenance
																				compliance (ITD)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('F & B Services')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">F
														& B Services</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI289'] == true"
												ng-show="matchSearch('F&B Patient complaints rate (Food and Beverage Services)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h44" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">F&amp;B Patient complaints
																				rate (Food and Beverage Services)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI290'] == true"
												ng-show="matchSearch('Delay in room services (Food and Beverage Services)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h45" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Delay in room services (Food
																				and Beverage Services)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI296'] == true"
												ng-show="matchSearch('Percentage of Wrong food Delivery for Patients & Bystanders (Food and Beverage Services)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4h51" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Percentage of Wrong food
																				Delivery for Patients &amp; Bystanders
																				(Food and Beverage Services)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI343'] == true"
												ng-show="matchSearch('Average use of Ecofriendly catering supplies in a month (carbon intensity reduction - JCI8-GHI 3)')">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../CQI4i12" class="card"
																	style="text-decoration:none;">
																	<div class="card product-card"
																		style="margin-bottom:10px;">
																		<div class="card-body"
																			style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">Average use of Ecofriendly catering supplies in a month (carbon intensity reduction - JCI8-GHI 3)</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Stroke Unit')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Stroke Unit</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI346'] == true"
												ng-show="matchSearch('Door to Physician ≤10 min (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j1" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Door to Physician ≤10 min (Stroke
																		Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI347'] == true"
												ng-show="matchSearch('Door to stroke team ≤15 min (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j2" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Door to stroke team ≤15 min (Stroke
																		Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI348'] == true"
												ng-show="matchSearch('Door to CT/MRI initiation ≤20 min (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j3" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Door to CT/MRI initiation ≤20 min
																		(Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI349'] == true"
												ng-show="matchSearch('Door to CT/MRI interpretation ≤30 min (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j4" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Door to CT/MRI interpretation ≤30
																		min (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI350'] == true"
												ng-show="matchSearch('Order to lab results ≤30 min (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j5" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Order to lab results ≤30 min, if
																		ordered (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI351'] == true"
												ng-show="matchSearch('Door to IV thrombolytic bolus 60 min (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j6" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Door to IV thrombolytic bolus (≥75%
																		compliance) ≤60 min (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI352'] == true"
												ng-show="matchSearch('Door to IV thrombolytic bolus 45 min (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j7" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Door to IV thrombolytic bolus (≥50%
																		compliance) ≤45 min (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI353'] == true"
												ng-show="matchSearch('Door to puncture time ≤90 min (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j8" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Door to puncture time ≤90 min
																		(Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI354'] == true"
												ng-show="matchSearch('Periprocedural complication rates (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j9" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Periprocedural complication rates
																		after correcting for comorbidities (Stroke Unit)
																	</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI355'] == true"
												ng-show="matchSearch('Periprocedural mortality rate (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j10" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Periprocedural mortality rate for
																		surgical or interventional procedures (Stroke
																		Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI356'] == true"
												ng-show="matchSearch('NIHSS score documentation (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j11" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of all stroke/TIA
																		patients who have a deficit at the time of
																		initial note or consultation for whom an NIHSS
																		score is documented (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI357'] == true"
												ng-show="matchSearch('Eligible ischemic stroke patients receiving thrombolysis (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j12" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of ischemic stroke
																		patients eligible for intravenous thrombolysis
																		who receive it within the appropriate time
																		window (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI358'] == true"
												ng-show="matchSearch('Thrombolysis started within 60 min (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j13" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of patients treated for
																		acute ischemic stroke with intravenous
																		thrombolysis whose treatment is started within
																		60 minutes after arrival (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI359'] == true"
												ng-show="matchSearch('Initial imaging workup ≤24 hours (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j14" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Time from arrival to the start of
																		initial imaging workup for all patients who
																		arrive within 24 hours of last known well
																		(Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI360'] == true"
												ng-show="matchSearch('Symptomatic intracranial hemorrhage within 36h (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j15" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of ischemic stroke
																		patients who develop a symptomatic intracranial
																		hemorrhage within ≤36 hours after onset of
																		thrombolytic or endovascular therapy (Stroke
																		Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI361'] == true"
												ng-show="matchSearch('CEA or carotid angioplasty stroke/death within 30 days (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j16" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of patients undergoing
																		CEA or carotid angioplasty/stenting having
																		stroke or death within 30 days of the procedure
																		(Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI362'] == true"
												ng-show="matchSearch('Intracranial angioplasty/stenting stroke/death within 30 days (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j17" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of patients undergoing
																		intracranial angioplasty and/or stenting for
																		atherosclerotic disease having stroke or death
																		within 30 days (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI363'] == true"
												ng-show="matchSearch('Stroke or death within 24h after diagnostic cerebral angiography (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j18" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of patients with stroke
																		or death within 24 hours of diagnostic cerebral
																		angiography (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI364'] == true"
												ng-show="matchSearch('EVD ventriculitis after ischemic stroke (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j19" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of patients with ischemic
																		stroke who undergo EVD and then develop
																		ventriculitis (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI365'] == true"
												ng-show="matchSearch('Reperfusion grade TICI 2B or higher after therapy (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j20" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of ischemic stroke
																		patients with post-treatment reperfusion grade
																		TICI 2B or higher at the end of therapy (Stroke
																		Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI366'] == true"
												ng-show="matchSearch('MER therapy within 120 min achieving TICI 2B or higher (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j21" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of ischemic stroke
																		patients with large vessel occlusion receiving
																		MER therapy within 120 minutes of hospital
																		arrival achieving TICI 2B or higher (Stroke
																		Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI367'] == true"
												ng-show="matchSearch('MER therapy achieving TICI 2B ≤60 min from puncture (Stroke Unit)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4j22" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Percentage of ischemic stroke
																		patients with large vessel occlusion receiving
																		MER therapy and achieving TICI 2B or higher ≤60
																		minutes from skin puncture (Stroke Unit)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasKPIInGroup('Other')">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Other</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI13'] == true"
												ng-show="matchSearch(lang.urinary)">
												<div class="col-12">
													<div class="card">
														<a href="../CQI3a13" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">{{lang.urinary}}</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI196'] == true"
												ng-show="matchSearch('Door to Balloon time in PTCA (Cath Lab)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI3k15" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text" ng-bind-html="q.icon"
																		style="color:#5c5959;font-size:36px;"></p>
																	<p class="text">Door to Balloon time in PTCA (Cath
																		Lab)</p>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['KPI338'] == true"
												ng-show="matchSearch('Outsourced OPD Assistance attendance (Operation)')">
												<div class="col-12">
													<div class="card">
														<a href="../CQI4i7" class="card" style="text-decoration:none;">
															<div class="card product-card" style="margin-bottom:10px;">
																<div class="card-body"
																	style="box-shadow:0 2px 4px rgba(0,0,0,0.3);">
																	<p class="text">Outsourced OPD Assistance attendance
																		(Operation)</p>
																</div>
															</div>
														</a>
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
<script>
	function togglePassword() {
		var passwordField = document.getElementById("password");
		var passwordToggle = document.querySelector(".password-toggle");

		if (passwordField.type === "password") {
			passwordField.type = "text";
			passwordToggle.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>'; // Change HTML to eye icon
		} else {
			passwordField.type = "password";
			passwordToggle.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>'; // Change HTML to eye slash icon
		}
	}
</script>

<style>
	.menu-dropdown {
		position: absolute;
		right: 10px;
		top: 50px;
		background: white;
		border-radius: 5px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		padding: 10px;
		width: 200px;
		display: none;
		z-index: 1000;
	}

	.menu-dropdown ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.menu-dropdown ul li {
		padding: 10px;
		border-bottom: 1px solid #ddd;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	.menu-dropdown ul li a {
		text-decoration: none;
		color: black;
		display: flex;
		align-items: center;
		font-size: 14px;
	}

	.menu-dropdown ul li a i {
		margin-right: 10px;
	}

	.menu-dropdown ul li:last-child {
		border-bottom: none;
	}

	.menu-toggle {
		cursor: pointer;
	}

	[ng-show="menuVisible"] {
		display: block !important;
	}

	.menu-dropdown ul li a:hover {
		color: #555;
	}


	.input-field {
		padding: 12px;
		font-size: 16px;
		border: 1px solid rgba(0, 0, 0, 0.2);
		/* Add border */
		border-radius: 25px;
		/* Add border radius */
		margin-bottom: 15px;
		width: 100%;
		box-sizing: border-box;
		color: #000;
		box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
		/* Add box shadow */
	}

	.password-container {
		position: relative;
	}

	.password-input {
		width: calc(100% - 40px);
		/* Adjust width to accommodate the show/hide button */
	}

	.password-toggle {
		position: absolute;
		right: 10px;
		top: 39%;
		transform: translateY(-50%);
		cursor: pointer;
	}


	@media (max-width: 768px) {
		.navbar {
			flex-wrap: nowrap;
		}

		.navbar .navbar-brand {
			flex-shrink: 0;
			margin-right: 10px;
		}

		.navbar .ml-auto {
			display: flex;
			justify-content: flex-end;
			align-items: center;
			gap: 7px;
		}

		.navbar .left-buttons a,
		.navbar .right-buttons button {
			flex-shrink: 0;
			white-space: nowrap;
		}

		.navbar .right-buttons {
			margin-left: -5px;
			/* Adjust the position of the language button */
		}

		.navbar .btn {
			padding: 5px 10px;
			font-size: 14px;
		}
	}
</style>

<style>
	[ng-cloak] {
		display: none !important;
	}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</html>