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
	<title>Quality Audit Management Software - Efeedor Healthcare Experience Management Platform</title>
	<meta charset="utf-8">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
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

<body ng-app="ehandorApp" ng-controller="PatientFeedbackCtrl" id="body">
	<fieldset ng-show="step0 == true">
		<div class="main-container">
			<div class="form-container" style="margin-top: 100px;">


				<div class="form-body" style="align-items:center;">
					<form class="the-form">
						<div style="text-align: center; margin-top:-22px;">
							<a class="navbar-brand" href="#"><img src="{{setting_data.logo}}"
									style="height: 100px; width:100%"></a>
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
	<div ng-cloak ng-show="step2 == true">
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
				<li><a href="/form_login"><i class="fa fa-sign-out"></i> Logout</a></li>
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




		<!-- Web Dashboard section -->
		<div ng-show="dashboardVisible" class="dashboard-section"
			style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
			<h2>Explore Web Dashboard</h2>
			<p>
				To access the web dashboard, please log in with your credentials using the following link. If you hold
				an Admin role, you will have access to view reports and analytics based on the permissions granted. If
				you are a department head or in charge of a department, you will be able to access the dashboard to view
				reports and analytics specific to your department and take action on the tickets assigned to you or your
				team.
			</p>

			<!-- Button for APK Download -->
			<a href="/login/?userid={{ adminId }}"
				style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
				<i class="fa fa-globe"></i> Click here to open the link
			</a>
		</div>
		<!-- top navbar end -->

		<!-- Create a modal for language selection -->
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

		<div class="container-fluid" id="grad1" ng-show="!aboutVisible && !dashboardVisible">
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
									<fieldset>
										<div class="form-card">
											<h3 class="sectiondivision" style="font-weight:bold;">{{lang.pagetitle}}
											</h3>

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


										<!-- Search box -->
										<input type="text" ng-model="searchAudit" placeholder="🔍 Search audits..."
											style="width:94%;margin:10px auto;display:block; padding:8px 10px;border:1px solid #ccc; border-radius:4px;font-size:16px;">



										<div class="" style="width: 94%; margin: 0px auto;">
											<div class="row" ng-if="hasAuditInRange(1,29)">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														MRD & MDC</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT1'] == true"
												ng-show="matchSearch(lang.active_cases_mrd_audit_ip)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../active_cases_mrd" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text ">
																				{{lang.active_cases_mrd_audit_ip}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>

																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['AUDIT2'] == true"
												ng-show="matchSearch(lang.discharged_patients_mrd_audit_2023)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../dischargedpatients_mrd_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text ">
																				{{lang.discharged_patients_mrd_audit_2023}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>

																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT3'] == true"
												ng-show="matchSearch(lang.nursing_ip_closed_cases)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../nursingip_closed_cases" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text ">
																				{{lang.nursing_ip_closed_cases}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>

																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT4'] == true"
												ng-show="matchSearch(lang.nursing_ip_open_cases)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../nursingip_open_cases" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.nursing_ip_open_cases}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="row" ng-if="profilen['AUDIT5'] == true"
												ng-show="matchSearch(lang.nursing_op_closed_cases)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../nursingop_closed_cases" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.nursing_op_closed_cases}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT6'] == true"
												ng-show="matchSearch(lang.clinical_dietetics_active)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_active_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_dietetics_active}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT7'] == true"
												ng-show="matchSearch(lang.clinical_dietetics_closed_cases)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_closedcases_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_dietetics_closed_cases}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT8'] == true"
												ng-show="matchSearch(lang.clinical_pharmacy_closed)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pharmacy_closed" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pharmacy_closed}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT9'] == true"
												ng-show="matchSearch(lang.clinical_pharmacy_op)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pharmacy_op" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pharmacy_op}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT10'] == true"
												ng-show="matchSearch(lang.clinical_pharmacy_open)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pharmacy_open" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pharmacy_open}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT11'] == true"
												ng-show="matchSearch(lang.clinicians_anesthesia_active)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../anesthesia_active_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_anesthesia_active}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT12'] == true"
												ng-show="matchSearch(lang.clinicians_anesthesia_closed)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../anesthesia_closed_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_anesthesia_closed}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT13'] == true"
												ng-show="matchSearch(lang.clinicians_ed_active)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../ed_active_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_ed_active}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT14'] == true"
												ng-show="matchSearch(lang.clinicians_ed_closed)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../ed_closed_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_ed_closed}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT15'] == true"
												ng-show="matchSearch(lang.clinicians_icu_active)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../icu_active_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_icu_active}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT16'] == true"
												ng-show="matchSearch(lang.clinicians_icu_closed)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../icu_closed_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_icu_closed}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT17'] == true"
												ng-show="matchSearch(lang.clinicians_primary_care_active)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../primarycare_active_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_primary_care_active}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT18'] == true"
												ng-show="matchSearch(lang.clinicians_primary_care_closed)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../primarycare_closed_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_primary_care_closed}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="row" ng-if="profilen['AUDIT19'] == true"
												ng-show="matchSearch(lang.clinicians_sedation_active)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../sedation_active_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_sedation_active}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT20'] == true"
												ng-show="matchSearch(lang.clinicians_sedation_closed)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../sedation_closed_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_sedation_closed}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT21'] == true"
												ng-show="matchSearch(lang.clinicians_surgeons_active)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../surgeons_active_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_surgeons_active}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT22'] == true"
												ng-show="matchSearch(lang.clinicians_surgeons_closed)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../surgeons_closed_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicians_surgeons_closed}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT23'] == true"
												ng-show="matchSearch(lang.diet_consultation_op)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../dietconsultation_op_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.diet_consultation_op}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT24'] == true"
												ng-show="matchSearch(lang.physiotherapy_closed)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../physiotherapy_closed_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.physiotherapy_closed}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT25'] == true"
												ng-show="matchSearch(lang.physiotherapy_op)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../physiotherapy_op_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.physiotherapy_op}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT26'] == true"
												ng-show="matchSearch(lang.physiotherapy_open)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../physiotherapy_open_mdc" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.physiotherapy_open}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT27'] == true"
												ng-show="matchSearch(lang.mrd_audit_ed)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../mrd_ed_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.mrd_audit_ed}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT28'] == true"
												ng-show="matchSearch(lang.mrd_audit_lama)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../mrd_lama_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.mrd_audit_lama}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT29'] == true"
												ng-show="matchSearch(lang.mrd_audit_op)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../mrd_op_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.mrd_audit_op}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasAuditInRange(30,44)">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Nursing & IPSG</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT30'] == true"
												ng-show="matchSearch(lang.accidental_delining_audit_checklist)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../accidental_delining_audit_checklist"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.accidental_delining_audit_checklist}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT31'] == true"
												ng-show="matchSearch(lang.admission_holding_area_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../admissionholding_area_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.admission_holding_area_audit}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT32'] == true"
												ng-show="matchSearch(lang.cpr_analysis_record)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../cardio_pulmonary_checklist" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.cpr_analysis_record}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT33'] == true"
												ng-show="matchSearch(lang.extravasation_audit_checklist)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../extravasation_audit_checklist" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.extravasation_audit_checklist}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT34'] == true"
												ng-show="matchSearch(lang.hapu_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../hospital_acquire_pressure_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.hapu_audit}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT35'] == true"
												ng-show="matchSearch(lang.initial_assessment_ae)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../initial_assessment_ae" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.initial_assessment_ae}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT36'] == true"
												ng-show="matchSearch(lang.initial_assessment_ipd)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../initial_assessment_ipd" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.initial_assessment_ipd}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT37'] == true"
												ng-show="matchSearch(lang.initial_assessment_opd)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../initial_assessment_opd" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.initial_assessment_opd}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT38'] == true"
												ng-show="matchSearch(lang.ipsg_1)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../ipsg1" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.ipsg_1}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="profilen['AUDIT101'] == true"
												ng-show="matchSearch(lang.ipsg2_er)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../ipsg2_er" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.ipsg2_er}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT39'] == true"
												ng-show="matchSearch(lang.ipsg_2_ae)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../ipsg2_ae" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.ipsg_2_ae}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT40'] == true"
												ng-show="matchSearch(lang.ipsg_2_ipd)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../ipsg2_ipd" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.ipsg_2_ipd}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT41'] == true"
												ng-show="matchSearch(lang.ipsg_4_timeout_outside_ot)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../ipsg4_timeout" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.ipsg_4_timeout_outside_ot}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT42'] == true"
												ng-show="matchSearch(lang.ipsg_6_ip)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../ipsg6_ip" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.ipsg_6_ip}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT43'] == true"
												ng-show="matchSearch(lang.ipsg_6_opd)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../ipsg6_opd" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.ipsg_6_opd}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT44'] == true"
												ng-show="matchSearch(lang.point_prevalence_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../point_prevelance_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.point_prevalence_audit}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasAuditInRange(45,70)">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Clinical Outcome</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT45'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_audit_acl)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_audit_acl" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_audit_acl}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT46'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_allogenic_bone_marrow)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_allogenic_bone_marrow"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_allogenic_bone_marrow}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT47'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_aortic_value_replacement)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_aortic_value_replacement"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_aortic_value_replacement}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT48'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_autologous_bone)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_autologous_bone"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_autologous_bone}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT49'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_brain_tumour)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_brain_tumour" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_brain_tumour}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT50'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_cabg)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_cabg" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_cabg}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT51'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_carotid_stenting)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_carotid_stenting"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_carotid_stenting}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT52'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_chemotherapy)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_chemotherapy" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_chemotherapy}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT53'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_colo_rectal)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_colo_rectal" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_colo_rectal}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT54'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_endoscopy)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_endoscopy" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_endoscopy}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT55'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_epilepsy)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_epilepsy" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_epilepsy}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>



											<div class="row" ng-if="profilen['AUDIT56'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_herniorrhaphy)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_herniorrhaphy" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_herniorrhaphy}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT57'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_holep)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_holep" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_holep}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT58'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_laparoscopic_appendicectomy)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_laparoscopic_appendicectomy"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_laparoscopic_appendicectomy}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT59'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_mechanical_thrombectomy)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_mechanical_thrombectomy"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_mechanical_thrombectomy}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT60'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_mvr)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_mvr" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.clinicaloutcome_mvr}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT61'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_ptca)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_ptca" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_ptca}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT62'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_renal_transplantation)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_renal_transplantation"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_renal_transplantation}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT63'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_scoliosis_correction)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_scoliosis_correction"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_scoliosis_correction}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT64'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_spinal_dysraphism)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_spinal_dysraphism"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_spinal_dysraphism}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT65'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_spine_disc_surgery)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_spine_disc_surgery"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_spine_disc_surgery}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT66'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_thoracotomy)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_thoracotomy" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_thoracotomy}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT67'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_tkr)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_tkr" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">{{lang.clinicaloutcome_tkr}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT68'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_uro_oncology)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_uro_oncology" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_uro_oncology}} <i
																					class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT69'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_whipples_surgery)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_whipples_surgery"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_whipples_surgery}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT70'] == true"
												ng-show="matchSearch(lang.clinicaloutcome_laparoscopic_cholecystectomy)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicaloutcome_laparoscopic_cholecystectomy"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicaloutcome_laparoscopic_cholecystectomy}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i></p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasAuditInRange(71,72)">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Clinical KPI</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT71'] == true"
												ng-show="matchSearch(lang.clinicalkpi_bronchodilators_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicalkpi_bronchodilators_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicalkpi_bronchodilators_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT72'] == true"
												ng-show="matchSearch(lang.clinicalkpi_copd_protocol_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinicalkpi_copd_protocol_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.clinicalkpi_copd_protocol_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasAuditInRange(73,89)">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Infection Control & PCI</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT73'] == true"
												ng-show="matchSearch(lang.infection_control_biomedical_waste)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_biomedical_waste"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_biomedical_waste}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT74'] == true"
												ng-show="matchSearch(lang.infection_control_canteen_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_canteen_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_canteen_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT75'] == true"
												ng-show="matchSearch(lang.infection_control_cssd_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_cssd_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_cssd_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT76'] == true"
												ng-show="matchSearch(lang.infection_control_hand_hygiene)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_hand_hygiene" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_hand_hygiene}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT77'] == true"
												ng-show="matchSearch(lang.infection_control_bundle_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_bundle_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_bundle_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT78'] == true"
												ng-show="matchSearch(lang.infection_control_ot_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_ot_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_ot_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT79'] == true"
												ng-show="matchSearch(lang.infection_control_linen_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_linen_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_linen_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT80'] == true"
												ng-show="matchSearch(lang.infection_control_ambulance_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_ambulance_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_ambulance_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT81'] == true"
												ng-show="matchSearch(lang.infection_control_coffee_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_coffee_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_coffee_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT82'] == true"
												ng-show="matchSearch(lang.infection_control_laboratory_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_laboratory_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_laboratory_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT83'] == true"
												ng-show="matchSearch(lang.infection_control_mortuary_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_mortuary_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_mortuary_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT84'] == true"
												ng-show="matchSearch(lang.infection_control_radiology_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_radiology_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_radiology_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT85'] == true"
												ng-show="matchSearch(lang.infection_control_ssi_survelliance_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_ssi_survelliance_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_ssi_survelliance_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT86'] == true"
												ng-show="matchSearch(lang.infection_control_peripheralivline_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_peripheralivline_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_peripheralivline_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT87'] == true"
												ng-show="matchSearch(lang.infection_control_personalprotective_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_personalprotective_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_personalprotective_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT88'] == true"
												ng-show="matchSearch(lang.infection_control_safe_injection_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_safe_injection_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_safe_injection_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT89'] == true"
												ng-show="matchSearch(lang.infection_control_surface_cleaning_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../infection_control_surface_cleaning_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color: #5c5959;font-size: 36px;">
																			</p>
																			<p class="text">
																				{{lang.infection_control_surface_cleaning_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="hasAuditInRange(90,100)">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														Clinical Pathways</h4>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT90'] == true"
												ng-show="matchSearch(lang.clinical_pathway_arthroscopic_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_arthroscopic_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_arthroscopic_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT91'] == true"
												ng-show="matchSearch(lang.clinical_pathway_breast_lump_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_breast_lump_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_breast_lump_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT92'] == true"
												ng-show="matchSearch(lang.clinical_pathway_cardiac_arrest_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_cardiac_arrest_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_cardiac_arrest_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT93'] == true"
												ng-show="matchSearch(lang.clinical_pathway_donor_hepatectomy_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_donor_hepatectomy_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_donor_hepatectomy_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT94'] == true"
												ng-show="matchSearch(lang.clinical_pathway_febrile_seizure_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_febrile_seizure_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_febrile_seizure_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT95'] == true"
												ng-show="matchSearch(lang.clinical_pathway_heart_transplant_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_heart_transplant_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_heart_transplant_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT96'] == true"
												ng-show="matchSearch(lang.clinical_pathway_laproscopic_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_laproscopic_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_laproscopic_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT97'] == true"
												ng-show="matchSearch(lang.clinical_pathway_picc_line_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_picc_line_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_picc_line_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT98'] == true"
												ng-show="matchSearch(lang.clinical_pathway_stroke_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_stroke_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_stroke_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT99'] == true"
												ng-show="matchSearch(lang.clinical_pathway_urodynamics_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_urodynamics_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_urodynamics_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT100'] == true"
												ng-show="matchSearch(lang.clinical_pathway_stemi_audit)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../clinical_pathway_stemi_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.clinical_pathway_stemi_audit}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" ng-if="hasAuditInRange(102,103)">
												<div class="col-12">
													<h4 style="margin-top: 20px; font-size: 18px; font-weight: bold;">
														House Keeping</h4>
												</div>
											</div>
											<div class="row" ng-if="profilen['AUDIT102'] == true"
												ng-show="matchSearch(lang.biomedical_Waste)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../bmw_audit"
																	class="card" style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.biomedical_Waste}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="row" ng-if="profilen['AUDIT103'] == true"
												ng-show="matchSearch(lang.pest_control)">
												<div class="col-12">
													<div class="card">
														<div class="row">
															<div class="col-12">
																<a href="../pest_control_audit" class="card"
																	style="text-decoration: none;">
																	<div class="card product-card"
																		style="margin-bottom: 10px;">
																		<div class="card-body"
																			style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
																			<p class="text" ng-bind-html="q.icon"
																				style="color:#5c5959;font-size:36px;">
																			</p>
																			<p class="text">
																				{{lang.pest_control}}
																				<i class="fa fa-info-circle"
																					aria-hidden="true"
																					style="margin-left:6px;color:#6c757d;"
																					title=""></i>
																			</p>
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
	</div>
</body>
<!-- body section end  -->


<!-- script code start  -->
<script>
	setTimeout(function () {

		$('#body').show();

	}, 2000);
</script>
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

<!-- script code end  -->



</html>