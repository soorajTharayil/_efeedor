<!DOCTYPE html>

<html lang="en">



<!-- head part start -->

<!-- IP FEEDBACK INDEX PAGE -->



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

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

  <script src="app_handover_audit.js?<?php echo time(); ?>"></script>

</head>

<!-- head part end -->



<!-- body part start -->



<body ng-app="ehandorApp" ng-controller="PatientFeedbackCtrl" style="display:none;" id="body">



  <!-- top navbar start -->

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed">

    <!-- Section for Buttons and Language Button -->
    <div class="ml-auto d-flex justify-content-between align-items-center w-100">
      <div class="left-buttons d-flex">

        <!-- Home button -->
        <!-- <a ng-href="/audit_forms?user_id={{ user_id }}"
          class="btn btn-secondary mr-3"
          style="width: 100px; height: 32px; font-size: 14px; font-weight: bold; display: flex; align-items: center; justify-content: center;">
          <i class="fa fa-home" style="margin-right: 6px;"></i> Home
        </a> -->


        <!-- Dashboard button with icon -->
        <a ng-href="/login/?user_id={{ user_id }}"
          class="btn btn-light dashboard-btn"
          style="width: 120px; height: 32px; font-size: 14px; font-weight: bold; text-align: left; display: flex; align-items: center; padding-left: 10px;">
          <i class="fa fa-tachometer" style="margin-right: 6px;"></i> Dashboard
        </a>

      </div>


      <!-- Right Side: Language Button -->
      <div class="right-buttons d-flex align-items-center">
        <!-- <button type="button" class="btn btn-dark language-btn" data-toggle="modal" data-target="#languageModal" style="margin: 4px;">
          {{type2}}
          <i class="fa fa-language" aria-hidden="true"></i>
        </button> -->
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
        <div style="font-weight: bold; font-size: 14px;">{{ loginname }}</div>
        <div style="font-size: 12px; font-weight: bold;">{{ loginemail }}</div>
      </div>
    </div>
    <ul style="margin-left: -5px;">
      <li><a href="#" ng-click="showAllContent()"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#" ng-click="showDashboard()"><i class="fa fa-globe"></i> Web Dashboard Access</a></li>
      <li><a href="/login/?user_id={{ user_id }}&redirectType=userActivity"><i class="fa fa-user"></i> User Activity</a></li>
      <li><a href="#" ng-click="showAbout()"><i class="fa fa-info-circle"></i> About</a></li>
      <li><a href="/audit_forms"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
  </div>

  <!-- About Content Section -->
  <div ng-show="aboutVisible" class="about-section" style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2>About</h2>
    <!-- <img src="/Efeedor_logo.png" alt="Efeedor Logo" style="max-width: 100%; height: auto; margin-bottom: 20px;"> -->
    <p><strong>Version:</strong> 8.01.10</p>
    <p>
      The Efeedor Quality Management Software (QMS) is an extension of Efeedor's Healthcare Experience Management Suite, developed by ITATONE POINT CONSULTING LLP, a global health-tech company specializing in enterprise applications for hospitals.
    </p>
    <p>
      Designed for healthcare staff on the go, the QMS application simplifies essential tasks such as reporting incidents, performing audits, and recording monthly KPIs, while enabling healthcare institutions to efficiently analyze quality parameters to enhance healthcare quality and patient safety.
    </p>
    <p>
      Efeedor’s software tools are widely recognized for their simple, intuitive interface and exceptional user experience, making them the preferred choice for modern hospitals.
    </p>
    <p>For more information, visit: <a href="https://www.efeedor.com" target="_blank">www.efeedor.com</a></p>
    <p>For support, contact: <a href="mailto:support@efeedor.com">support@efeedor.com</a></p>
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



  <!-- when we sumbit the feedback more than one time this div part shows in UI -->

  <div class="container-fluid" id="grad1" ng-show="feedback.feedbac_summited == 'submitted'" style=" height: 100vh;">

    <div class="jumbotron text-center">

      <h1 class="display-3">Thank You!</h1>

      <p class="lead"><strong>Your feedback is already submmited</strong></p>

      <hr>



    </div>

  </div>

  <!-- this div end here -->

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
              <div class="box box-primary profilepage" style="background: transparent;">
                <div class="box-body box-profile" style="display: inline-block;">

                  <div class="card" style=" border: 2px solid #000;">
                    <div class="card-body" ng-click="language('english')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
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
                    <div class="card-body" ng-click="language('lang2')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
                      <span style="margin-left: -133px; color:#4b4c4d;">
                        ಕನ್ನಡ
                      </span><br>
                      <span style="font-size: 34px; color: #4b4c4d; font-weight: bold;">
                        ಕ
                      </span>
                    </div>
                  </div>
                  <br>

                  <div class="card" style=" border: 2px solid #000;">
                    <div class="card-body" ng-click="language('lang3')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
                      <span style="margin-left: -100px; color: #4b4c4d;">
                        മലയാളം
                      </span><br>
                      <span style="font-size: 34px; color: #4b4c4d; font-weight: bold;">
                        അ
                      </span>
                    </div>
                  </div>

                  <br>

                  <!-- <div class="card" style=" border: 2px solid #000;">
                    <div class="card-body" ng-click="language('lang3')" style="padding: 5px; height:100px; width:200px; " data-dismiss="modal">
                      <span style="margin-left: -100px; color: #4b4c4d;">
                      தமிழ்
                      </span><br>
                      <span style="font-size: 34px; color: #4b4c4d; font-weight: bold;">
                      த
                      </span>
                    </div>
                  </div>
                  <br> -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ip  -->

  <div class="container-fluid" id="grad1" ng-show="!aboutVisible && !dashboardVisible">
    <div class="row justify-content-center mt-0">

      <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-2 mb-2">
        <img src="{{setting_data.logo}}" style="    height: 50px;">

        <br>
        <div class="card px-0 pt-2 pb-0 mt-2 mb-3">



          <div class="row">

            <div class="col-md-12 mx-0">

              <!-- form start -->

              <form id="msform">

                <!-- PATIENT INFORMATION page start -->
                <fieldset ng-show="step0 == true">

                  <!--<h4><strong>AUDIT & PATIENT INFORMATION</strong></h4>-->
                  <h4 style="font-size:22px;"><strong>{{lang.patient_info}}</strong></h4>

                  <!--<p>Fill all form field to go to next step</p>-->
                  <br>
                  <div class="form-card">

                    <div class="row">

                      <!-- Audit Type -->
                      <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 0px 0px 0 0px;">
                        <h6 style="font-size: 18px;margin-left:1px;margin-top:0px;"><b>Audit Details</b></h6>
                        <div class="form-group">
                          <span class="addon" style="font-size: 18px; margin-bottom: 0px;">{{lang.name}}<sup style="color: red;">*</sup></span>
                          <span class="has-float-label">
                            <input class="form-control" type="text" ng-model="feedback.audit_type" placeholder="Enter audit name" ng-required="true" style="margin-top: 0px;" disabled />
                          </span>
                        </div>



                        <!-- Date of Audit -->

                        <div class="form-group">
                          <span class="addon" style="font-size: 18px; margin-bottom: 6px;">
                            {{lang.dtandtym}}<sup style="color:red">*</sup><br>
                            <p style="font-size: 14px; margin: 4px 0 0 0; color:#6c757d;">
                              {{lang.format}}
                            </p>
                          </span>

                          <!-- Input -->
                          <div style="position: relative; width: 100%;">
                            <input class="form-control" ng-model="feedback.initial_assessment_hr2" type="datetime-local" id="formula_para1_hr" ng-required="true" min="{{minDateTime}}" max="{{todayDateTime}}"
                              autocomplete="off" onclick="this.showPicker && this.showPicker()"
                              onfocus="this.showPicker && this.showPicker()"
                              style="padding: 6px 8px; border: 1px solid #ced4da; border-radius: 4px; margin-top: 8px; width: 100%;" />
                          </div>
                        </div>



                        <!-- Audit Short Name -->

                        <!--<div class="form-group">-->
                        <!--  <span class="addon" style="font-size: 18px; margin-bottom: 6px;">{{lang.stname}}</span>-->
                        <!--  <span class="has-float-label" style="margin-top: 8px;">-->
                        <!--    <input class="form-control" type="text" ng-model="feedback.audit_shortname" placeholder="Enter short name" maxlength="30" autocomplete="off" />-->
                        <!--  </span>-->
                        <!--</div>-->

                        <!-- Audit By -->

                        <div class="form-group">
                          <span class="addon" style="font-size: 18px; margin-bottom: 2px;">{{lang.audby}}<sup style="color: red;">*</sup></span>
                          <span class="has-float-label">
                            <input class="form-control" type="text" ng-model="feedback.audit_by" placeholder="Enter auditor name" ng-required="true" style="margin-top: 2px;" />
                          </span>
                        </div>


                        <h6 style="font-size: 18px;margin-left:1px;margin-top:30px;"><b>Patient Information</b></h6>
                        <!-- MID No -->

                        <div class="form-group">
                          <span class="addon" style="font-size: 18px;margin-bottom: 6px; ">{{lang.mid}}<sup style="color: red;">*</sup></span>
                          <span class="has-float-label" style="margin-top: 12px;">
                            <input type="text" class="form-control" maxlength="20" ng-model="feedback.mid_no" placeholder="Enter Patient MID" autocomplete="off" />
                          </span>
                        </div>


                        <!-- Patient Name -->

                        <div class="form-group">
                          <span class="addon" style="font-size: 18px;margin-bottom: 6px;">{{lang.patname}}<sup style="color: red;">*</sup></span>
                          <span class="has-float-label" style="margin-top: 8px;">
                            <input type="text" class="form-control" ng-model="feedback.patient_name" placeholder="Enter Patient Name" maxlength="50" autocomplete="off" />
                          </span>
                        </div>


                        <!-- Patient Age (Numbers Only) -->

                        <div class="form-group">
                          <span class="addon" style="font-size: 18px;margin-bottom: 6px;">{{lang.patage}}</span>
                          <span class="has-float-label" style="margin-top: 8px;">
                            <input type="number" class="form-control" ng-model="feedback.patient_age" placeholder="Enter Age" min="0" max="120" />
                          </span>
                        </div>


                        <!-- Patient Gender -->

                        <div class="form-group">
                          <span class="addon" style="font-size: 18px;margin-bottom: 6px;">{{lang.patgen}}</span>
                          <span class="has-float-label">
                            <select class="form-control" style="margin-top: 8px;" ng-model="feedback.patient_gender">
                              <option value="" disabled selected>{{lang.selgen}}</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                            </select>
                          </span>
                        </div>

                        <!-- Location -->
                        <div class="form-group" ng-init="locationOpen=false; locationSearch='';"
                          click-outside="locationOpen=false">

                          <span class="addon" style="font-size:18px; margin-bottom:6px;">{{lang.location}}<sup
                              style="color: red;">*</sup></span>

                          <div style="margin-top:8px; position:relative;">
                            <!-- Trigger -->
                            <div class="form-control" ng-click="locationOpen=!locationOpen">
                              {{ feedback.location || 'Select Area' }}
                            </div>

                            <!-- Dropdown panel -->
                            <div ng-show="locationOpen"
                              style="position:absolute; z-index:1000; left:0; right:0; margin-top:4px; background:#fff; border:1px solid #ced4da; border-radius:6px; padding:8px; box-shadow:0 8px 24px rgba(0,0,0,.1);">
                              <input class="form-control" placeholder="Search Area" ng-model="locationSearch"
                                style="margin-bottom:8px;" autofocus />

                              <div style="max-height:200px; overflow:auto;">
                                <div ng-repeat="x in area | filter:locationSearch"
                                  ng-if="x.title !== 'ALL'"
                                  ng-click="selectLocation(x.title)"
                                  style="padding:8px; cursor:pointer;">
                                  {{x.title}}
                                </div>

                              </div>
                            </div>
                          </div>

                        </div>






                        <!-- Department -->
                        <div class="form-group" ng-init="depOpen=false; depSearch='';"
                          click-outside="closeDepartment()">
                          <span class="addon" style="font-size:18px; margin-bottom:6px;">{{lang.dep}}<sup
                              style="color: red;">*</sup></span>

                          <div style="position:relative; margin-top:8px;">
                            <!-- Trigger -->
                            <div class="form-control" ng-click="depOpen = !depOpen">
                              {{ feedback.department || lang.seldep }}
                            </div>

                            <!-- Dropdown -->
                            <div ng-show="depOpen"
                              style="position:absolute; left:0; right:0; z-index:1000; margin-top:4px; background:#fff; border:1px solid #ccc; border-radius:6px; padding:8px; box-shadow:0 8px 24px rgba(0,0,0,.1);">

                              <!-- Search box -->
                              <input class="form-control" placeholder="Search Department" ng-model="depSearch"
                                style="margin-bottom:8px;" />

                              <!-- Options -->
                              <div style="max-height:200px; overflow:auto;">
                                <div ng-repeat="x in auditdept.auditdept | filter:depSearch" ng-if="x.title !== 'ALL'"
                                  ng-click="selectDepartment(x.title)" style="padding:8px; cursor:pointer;">
                                  {{x.title}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>




                        <!-- Attended Doctor -->
                        <div class="form-group" ng-init="docOpen=false; docSearch='';" click-outside="closeDoctor()">
                          <span class="addon" style="font-size:18px; margin-bottom:6px;">{{lang.atdoc}}<sup
                              style="color: red;">*</sup></span>

                          <div style="position:relative; margin-top:8px;">
                            <!-- Trigger -->
                            <div class="form-control" ng-click="docOpen = !docOpen">
                              {{ feedback.attended_doctor || lang.seldoc }}
                            </div>

                            <!-- Dropdown -->
                            <div ng-show="docOpen"
                              style="position:absolute; left:0; right:0; z-index:1000; margin-top:4px; background:#fff; border:1px solid #ccc; border-radius:6px; padding:8px; box-shadow:0 8px 24px rgba(0,0,0,.1);">

                              <!-- Search box -->
                              <input class="form-control" placeholder="Search Doctor..." ng-model="docSearch"
                                style="margin-bottom:8px;" />

                              <!-- Options -->
                              <div style="max-height:200px; overflow:auto;">
                                <div ng-repeat="x in doctor.doctor | filter:docSearch" ng-click="selectDoctor(x)"
                                  style="padding:8px; cursor:pointer;">
                                  {{x}}
                                </div>

                                <!-- If no match found -->
                                <div ng-if="(doctor.doctor | filter:docSearch).length === 0 && docSearch"
                                  ng-click="selectDoctor(docSearch)"
                                  style="padding:8px; cursor:pointer; font-style:italic; color:#007bff;">
                                  + Add "{{docSearch}}"
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>



                        <!-- Admission Date -->

                        <div class="form-group">
                          <span class="addon" style="font-size: 18px; margin-bottom: 6px;">
                            {{lang.admidat}}<sup style="color: red;">*</sup><br>
                            <p style="font-size: 14px; margin: 0px 0 0 0; color:#6c757d;">{{lang.format}}</p>
                          </span>

                          <!-- Input -->
                          <div style="position: relative; width: 100%;">
                            <input class="form-control"
                              ng-model="feedback.initial_assessment_hr6"
                              type="datetime-local"
                              id="formula_para1_hr6"
                              ng-required="true"
                              autocomplete="off"
                              max="{{todayDateTime}}"
                              onclick="this.showPicker && this.showPicker()"
                              onfocus="this.showPicker && this.showPicker()"
                              style="padding: 6px 8px; border: 1px solid #ced4da; border-radius: 4px; margin-top: 8px; width: 100%;" />
                          </div>
                        </div>
                        <div class="form-group">
                          <span class="addon" style="font-size: 18px; margin-bottom: 6px;">
                            {{lang.discha}}<sup style="color:red"></sup><br>
                            <p style="font-size: 14px; margin: 0px 0 0 0; color:#6c757d;">{{lang.format}}</p>
                          </span>

                          <!-- Input -->
                          <div style="position: relative; width: 100%;">
                            <input class="form-control"
                              ng-model="feedback.discharge_date_time"
                              type="datetime-local"
                              id="formula_para1_discharge"
                              ng-required="true"
                              autocomplete="off"
                              max="{{todayDateTime}}"
                              onclick="this.showPicker && this.showPicker()"
                              onfocus="this.showPicker && this.showPicker()"
                              style="padding: 6px 8px; border: 1px solid #ced4da; border-radius: 4px; margin-top: 8px; width: 100%;" />
                          </div>
                        </div>





                        <input type="button" name="previous" class="previous action-button-previous" style=" font-size:small; margin-top: 30px;" ng-click="prev()" value="{{lang.previous}}" />

                        <input type="button" name="next" ng-click="next1()" style="background: #4285F4 ; font-size:small;  margin-top: 30px;" class="next action-button" value="{{lang.next}}" />

                </fieldset>


                <!-- PATIENT INFORMATION page end -->
                <fieldset ng-show="step1 == true">

                  <h4 style="font-size:22px;"><strong>{{lang.patient_info}}</strong></h4>

                  <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 30px; margin-left:5px;">
                    <div class="form-group" style="text-align: left;">
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:15px;"><b>Admission note</b></h6>
                      <div style="margin-top: 12px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.identification_details}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.identification_details" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.identification_details" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.identification_details" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label">
                          <input type="text" class="form-cont" ng-model="feedback.identification_details_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>


                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.vital_signs}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.vital_signs" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.vital_signs" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.vital_signs" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.vital_signs_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>


                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.surgery}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.surgery" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.surgery" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.surgery" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.surgery_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>



                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.complaints_communicated}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.complaints_communicated" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.complaints_communicated" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.complaints_communicated" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.complaints_communicated_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>


                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.intake}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.intake" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.intake" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.intake" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.intake_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>



                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.output}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.output" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.output" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.output" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.output_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>



                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.focus}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.focus" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.focus" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.focus" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.focus_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>



                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.meti}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.meti" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.meti" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.meti" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.meti_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>






                      <!--<h6 style="font-size: 18px;margin-left:-6px;margin-top:13px;"><b>Nurses documentation - Initial assessment IPD:</b></h6>-->
                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.diagnostic}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.diagnostic" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.diagnostic" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.diagnostic" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.diagnostic_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>


                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>IP notes</b></h6>
                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.lab_results}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.lab_results" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.lab_results" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.lab_results" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.lab_results_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>



                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.pending_investigation}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.pending_investigation" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.pending_investigation" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.pending_investigation" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.pending_investigation_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>



                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.medicine_order}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.medicine_order" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.medicine_order" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.medicine_order" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.medicine_order_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>



                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.psychological}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.psychological" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.psychological" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.psychological" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.psychological_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>



                      <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.vulnerab}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.vulnerab" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.vulnerab" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.vulnerab" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.vulnerab_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>


                      <!--<h6 style="font-size: 18px;margin-left:-6px;margin-top:13px;"><b>General dietician documentation:</b></h6>-->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.social}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.social" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.social" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.social" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>
                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.social_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.nutri}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.nutri" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.nutri" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.nutri" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.nutri_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.spiritual}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.spiritual" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.spiritual" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.spiritual" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.spiritual_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.suicide}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.suicide" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.suicide" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.suicide" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.suicide_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.risk}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.risk" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.risk" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.risk" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.risk_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.care}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.care" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.care" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.care" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.care_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:13px;"><b>ICU</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.pfe}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.pfe" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.pfe" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.pfe" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.pfe_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.disch}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.disch" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.disch" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.disch" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.disch_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.facility_communicated}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.facility_communicated" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.facility_communicated" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.facility_communicated" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.facility_communicated_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.health_education}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.health_education" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.health_education" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.health_education" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.health_education_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.remarks1}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.remarks1" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.remarks1" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.remarks1" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.remarks1_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Anaesthesia Documents</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.urethral}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.urethral" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.urethral" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.urethral" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.urethral_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.urine_sample}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.urine_sample" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.urine_sample" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.urine_sample" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.urine_sample_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.bystander}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.bystander" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.bystander" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.bystander" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.bystander_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.instruments}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.instruments" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.instruments" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.instruments" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.instruments_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.sterile}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.sterile" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.sterile" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.sterile" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.sterile_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.antibiotics}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.antibiotics" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.antibiotics" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.antibiotics" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.antibiotics_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.surgical_site}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.surgical_site" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.surgical_site" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.surgical_site" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.surgical_site_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Operation notes</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.wound}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.wound" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.wound" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.wound" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.wound_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.documented}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.documented" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.documented" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.documented" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.documented_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.adequate_facilities}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.adequate_facilities" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.adequate_facilities" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.adequate_facilities" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.adequate_facilities_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.sufficient_lighting}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.sufficient_lighting" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.sufficient_lighting" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.sufficient_lighting" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.sufficient_lighting_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.storage_facility_for_food}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.storage_facility_for_food" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.storage_facility_for_food" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.storage_facility_for_food" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.storage_facility_for_food_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.personnel_hygiene_facilities}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.personnel_hygiene_facilities" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.personnel_hygiene_facilities" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.personnel_hygiene_facilities" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.personnel_hygiene_facilities_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.food_material_testing}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.food_material_testing" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.food_material_testing" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.food_material_testing" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.food_material_testing_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.incoming_material}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.incoming_material" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.incoming_material" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.incoming_material" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.incoming_material_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.raw_materials_inspection}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.raw_materials_inspection" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.raw_materials_inspection" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.raw_materials_inspection" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.raw_materials_inspection_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.storage_of_materials}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.storage_of_materials" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.storage_of_materials" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.storage_of_materials" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.storage_of_materials_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.raw_materials_cleaning}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.raw_materials_cleaning" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.raw_materials_cleaning" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.raw_materials_cleaning" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.raw_materials_cleaning_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.equipment_sanitization}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.equipment_sanitization" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.equipment_sanitization" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.equipment_sanitization" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.equipment_sanitization_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Consents</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.frozen_food_thawing}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.frozen_food_thawing" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.frozen_food_thawing" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.frozen_food_thawing" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.frozen_food_thawing_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.vegetarian_and_non_vegetarian}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.vegetarian_and_non_vegetarian" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.vegetarian_and_non_vegetarian" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.vegetarian_and_non_vegetarian" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.vegetarian_and_non_vegetarian_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.cooked_food_cooling}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.cooked_food_cooling" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.cooked_food_cooling" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.cooked_food_cooling" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.cooked_food_cooling_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.food_portioning}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.food_portioning" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.food_portioning" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.food_portioning" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.food_portioning_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab1 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab1}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab1" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab1" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab1" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab1_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab2 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab2}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab2" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab2" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab2" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab2_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab3 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab3}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab3" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab3" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab3" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab3_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab4 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab4}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab4" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab4" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab4" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab4_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab5 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Cross consultation</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab5}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab5" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab5" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab5" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab5_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab6 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab6}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab6" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab6" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab6" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab6_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab7 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab7}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab7" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab7" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab7" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab7_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab8 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Discharge summary</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab8}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab8" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab8" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab8" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab8_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab9 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab9}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab9" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab9" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab9" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab9_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab10 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab10}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab10" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab10" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab10" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab10_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab11 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab11}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab11" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab11" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab11" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab11_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab12 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab12}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab12" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab12" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab12" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab12_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab13 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab13}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab13" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab13" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab13" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab13_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab14 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab14}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab14" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab14" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab14" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab14_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab15 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab15}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab15" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab15" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab15" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab15_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab16 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab16}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab16" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab16" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab16" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab16_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab17 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab17}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab17" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab17" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab17" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab17_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab18 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>ED documents</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab18}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab18" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab18" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab18" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab18_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab19 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab19}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab19" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab19" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab19" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab19_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab20 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab20}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab20" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab20" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab20" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab20_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab21 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>OT documents</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab21}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab21" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab21" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab21" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab21_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab22 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab22}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab22" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab22" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab22" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab22_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab23 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab23}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab23" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab23" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab23" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab23_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab24 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab24}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab24" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab24" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab24" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab24_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab25 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab25}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab25" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab25" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab25" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab25_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab26 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Nursing Initial assessment</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab26}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab26" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab26" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab26" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab26_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab27 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab27}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab27" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab27" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab27" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab27_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab28 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab28}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab28" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab28" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab28" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab28_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab29 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab29}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab29" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab29" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab29" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab29_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab30 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab30}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab30" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab30" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab30" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab30_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab31 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab31}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab31" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab31" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab31" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab31_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab32 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Special Population assessment</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab32}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab32" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab32" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab32" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab32_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab33 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab33}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab33" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab33" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab33" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab33_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab34 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab34}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab34" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab34" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab34" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab34_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab35 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab35}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab35" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab35" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab35" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab35_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab36 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Other documents</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab36}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab36" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab36" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab36" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab36_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab37 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab37}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab37" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab37" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab37" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab37_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab38 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab38}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab38" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab38" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab38" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab38_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab39 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab39}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab39" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab39" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab39" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab39_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab40 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab40}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab40" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab40" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab40" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab40_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab41 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab41}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab41" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab41" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab41" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab41_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab42 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab42}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab42" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab42" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab42" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab42_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab43 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab43}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab43" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab43" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab43" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab43_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab44 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab44}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab44" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab44" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab44" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab44_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab45 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab45}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab45" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab45" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab45" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab45_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab46 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab46}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab46" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab46" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab46" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab46_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab47 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Post Procedure note</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab47}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab47" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab47" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab47" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab47_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab48 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab48}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab48" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab48" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab48" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab48_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab49 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab49}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab49" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab49" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab49" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab49_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab50 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab50}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab50" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab50" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab50" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab50_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab51 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab51}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab51" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab51" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab51" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab51_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab52 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Nurses Shift record</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab52}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab52" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab52" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab52" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab52_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab53 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab53}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab53" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab53" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab53" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab53_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab54 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab54}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab54" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab54" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab54" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab54_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab55 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab55}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab55" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab55" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab55" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab55_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab56 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab56}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab56" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab56" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab56" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab56_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab57 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Nurses Handover</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab57}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab57" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab57" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab57" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab57_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab58 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab58}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab58" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab58" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab58" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab58_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab59 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab59}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab59" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab59" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab59" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab59_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab60 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>In house Transfer</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab60}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab60" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab60" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab60" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab60_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab61 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab61}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab61" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab61" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab61" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab61_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab62 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab62}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab62" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab62" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab62" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab62_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab63 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab63}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab63" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab63" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab63" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab63_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab64 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab64}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab64" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab64" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab64" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab64_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab65 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab65}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab65" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab65" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab65" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab65_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab66 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Restrain Monitoring</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab66}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab66" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab66" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab66" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab66_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab67 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab67}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab67" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab67" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab67" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab67_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab68 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab68}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab68" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab68" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab68" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab68_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab69 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab69}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab69" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab69" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab69" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab69_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab70 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab70}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab70" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab70" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab70" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab70_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab71 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Blood Transfusion record</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab71}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab71" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab71" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab71" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab71_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab72 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab72}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab72" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab72" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab72" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab72_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab73 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab73}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab73" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab73" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab73" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab73_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab74 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab74}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab74" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab74" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab74" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab74_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab75 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab75}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab75" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab75" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab75" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab75_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab76 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab76}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab76" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab76" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab76" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab76_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab77 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Endoscopy flow sheet</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab77}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab77" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab77" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab77" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab77_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab78 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab78}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab78" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab78" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab78" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab78_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab79 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab79}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab79" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab79" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab79" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab79_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab80 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab80}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab80" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab80" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab80" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab80_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab81 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab81}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab81" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab81" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab81" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab81_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab82 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab82}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab82" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab82" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab82" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab82_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab83 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab83}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab83" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab83" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab83" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab83_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab84 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab84}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab84" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab84" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab84" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab84_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab85 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Surgical Safety checklist - OT/Outside OT </b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab85}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab85" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab85" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab85" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab85_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab86 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab86}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab86" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab86" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab86" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab86_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab87 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab87}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab87" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab87" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab87" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab87_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab88 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab88}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab88" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab88" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab88" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab88_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab89 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab89}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab89" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab89" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab89" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab89_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab90 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab90}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab90" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab90" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab90" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab90_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab100 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab100}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab100" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab100" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab100" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab100_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab101 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab101}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab101" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab101" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab101" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab101_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab102 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Sedation Monitoring form</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab102}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab102" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab102" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab102" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab102_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab103 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab103}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab103" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab103" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab103" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab103_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab104 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab104}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab104" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab104" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab104" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab104_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab105 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab105}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab105" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab105" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab105" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab105_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab106 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab106}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab106" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab106" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab106" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab106_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab107 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Stroke forms</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab107}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab107" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab107" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab107" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab107_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab108 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab108}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab108" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab108" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab108" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab108_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab109 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab109}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab109" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab109" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab109" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab109_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab110 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab110}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab110" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab110" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab110" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab110_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab111 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab111}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab111" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab111" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab111" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab111_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab112 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab112}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab112" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab112" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab112" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab112_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab113 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab113}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab113" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab113" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab113" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab113_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab114 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab114}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab114" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab114" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab114" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab114_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab115 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab115}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab115" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab115" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab115" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab115_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab116 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab116}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab116" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab116" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab116" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab116_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab117 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab117}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab117" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab117" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab117" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab117_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab118 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab118}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab118" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab118" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab118" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab118_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>
                      <!-- ab119 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab119}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab119" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab119" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab119" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab119_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab120 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab120}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab120" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab120" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab120" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab120_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab121 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab121}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab121" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab121" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab121" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab121_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab122 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab122}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab122" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab122" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab122" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab122_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab123 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab123}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab123" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab123" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab123" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab123_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab124 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab124}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab124" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab124" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab124" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab124_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab125 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab125}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab125" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab125" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab125" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab125_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab126 -->
                      <h6 style="font-size: 18px;margin-left:-6px;margin-top:16px;"><b>Closed Audit checklist</b></h6>
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab126}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab126" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab126" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab126" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab126_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>

                      <!-- ab127 -->
                      <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                        <p style="font-size: 18px; margin-bottom: 6px;">{{lang.ab127}}</p>

                        <div style="display: flex; gap: 20px; align-items: center; font-size: 18px;">
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab127" value="yes" />
                            <span style="margin-left: 5px;">Yes</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab127" value="no" />
                            <span style="margin-left: 5px;">No</span>
                          </label>
                          <label style="display: flex; align-items: center;">
                            <input type="radio" ng-model="feedback.ab127" value="N/A" />
                            <span style="margin-left: 5px;">N/A</span>
                          </label>
                        </div>

                        <span class="has-float-label" style="margin-top: 5px;">
                          <input type="text" class="form-cont" ng-model="feedback.ab127_text" placeholder="Remarks" style="margin-left:-2px;margin-top:5px;" />
                        </span>
                      </div>











































































                      <!-- <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group" style="margin-top: 15px; margin-left: -16px;">

                              <span class="addon" style="font-size: 16px; margin-top:10px;">{{lang.audited_by}}<sup style="color:red">*</sup></span>

                              <span class="has-float-label">

                                <input class="form-control" placeholder="{{lang.audited_by_placeholder}}" maxlength="20" type="text" id="contactnumber" ng-required="true" ng-model="feedback.auditedBy" autocomplete="off" style="padding-top:0px;" />

                                <label for="contactnumber"></label>

                              </span>

                            </div>

                          </div> -->



                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="padding-right: 0px; padding-left: 2px; margin-left: -5px; margin-top: 13px;">
                      <p style="font-size: 18px; text-align:left; margin-bottom: 6px; margin-left: -2px;">{{lang.data_analysis}}</p>
                      <textarea style="border:1px solid #ced4da; margin-left: -2px; margin-top: 6px; padding: 10px; width: 85%; height: 85px;" class="form-control" id="textarea1" ng-model="feedback.dataAnalysis" rows="5"></textarea>
                    </div>
                    <div style="margin-top: 8px; text-align: left; margin-left:-6px;">
                      <label for="fileInput" class="custom-file-upload" style="font-weight: bold;font-size:18px;">
                        {{lang.attach_file}}
                      </label>

                      <!-- File Input for Document Upload -->
                      <input style="border-bottom: 0px;" type="file" accept="*" multiple onchange="angular.element(this).scope().encodeFiles(this)" />
                      <br>

                      <!-- Display the list of uploaded files -->
                      <div ng-if="feedback.files_name && feedback.files_name.length > 0">
                        <h3 style="font-size: 18px; margin-top:16px;">Uploaded Files:</h3>
                        <ul style="margin-left: 19px;">
                          <li ng-repeat="files_name in feedback.files_name track by $index" style="display: flex; align-items: center;">
                            <a href="{{files_name.url}}" target="_blank" style="margin-right: 8px;">{{files_name.name}}</a>
                            <span style="cursor: pointer; color: red; font-weight: bold;" ng-click="removeFile($index)">&#10060;</span>
                          </li>
                        </ul>
                      </div>
                    </div>


                    <!-- submit button -->
                    <input type="button" name="previous" class="previous action-button-previous" style=" font-size:small;margin-left:-6px;margin-top:35px;" ng-click="prev1()" value="{{lang.previous}}" />

                    <div>
                      <input type="button" ng-show="loader == false" style="background: #4285F4 ; font-size:small; margin-right:12px;margin-top:35px;" name="make_payment" class="next action-button" ng-click="savefeedback()" value="{{lang.submit}}" />
                      <img src="https://media.tenor.com/8ZhQShCQe9UAAAAC/loader.gif" ng-show="loader == true">
                    </div>

                </fieldset>




                <fieldset ng-show="step4 == true">
                  <div class="form-card">
                    <!-- unhappy customer code start -->
                    <div class="row justify-content-center">
                      <div class="col-12 text-center">
                        <br>
                        <h2 class="fs-title text-center" style="font-weight: 300;">{{lang.thankyou}}</h2><br>
                        <img src="dist/tick.png"> <br>
                        <p style="text-align:center; margin-top: 45px; font-weight: 300;" class="lead">
                          {{lang.unhappythankyoumessage}}
                        </p>

                        <style>
                          @media (max-width: 768px) {
                            .thankyou-buttons .btn {
                              display: block;
                              width: 92%;
                              margin-left: 10px !important;
                              margin-top: 10px !important;
                            }
                          }
                        </style>

                        <div class="thankyou-buttons" style="margin-top: 40px;">
                          <button type="button" class="btn btn-primary" ng-click="repeatAudit()">
                            🔄 Repeat Audit
                          </button>
                          <a ng-href="/audit_forms?user_id={{user_id}}"
                            class="btn btn-secondary"
                            style="margin-left: 15px;">
                            🏠 Audits Home Page
                          </a>
                        </div>


                      </div>
                    </div>
                    <!-- unhappy customer code end -->
                  </div>
                </fieldset>







              </form>

              <!-- form end -->

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</body>

<!-- body part start -->





<!-- css code start  -->

<style>
  .transparent-placeholder input::placeholder {
    opacity: 0.5;

  }

  textarea {
    transition: height 0.3s ease-in-out;
  }


  .dropdown-menu {

    /* width: 70px; */

    position: absolute;

    left: auto;

    right: 0px;

    padding: 0px;

    width: 100%;

    list-style: none;

  }



  ul.dropdown-menu.show li a {

    padding: 7px 22px;

    /* background: #007bff; */

    width: 100%;

    display: block;

  }



  .dropdown-toggle {

    font-size: 18px;

    color: #fff;

    margin-top: -16px;

    text-transform: capitalize;


  }




  .image-container {

    display: flex;

    flex-wrap: wrap;

    padding: 1%;

  }



  .image-container img {

    width: 20%;

    height: auto;

    object-fit: cover;

  }





  #text-box input {

    background: none;

    border-radius: 0px;

    width: 100%;

    border-bottom: 1px solid;

    border-top: none;

    border-left: none;

    border-right: none;

    border-color: #6c757d;

    box-sizing: border-box;

  }



  ::placeholder {

    font-size: 15px;

  }
</style>

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

<!-- css code end  -->





<!-- script code start  -->

<script>
  // This function returns the current month and year in the format 'Month Year'
  function getCurrentMonthYear() {
    const date = new Date();
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const currentMonth = monthNames[date.getMonth()];
    const currentYear = date.getFullYear();
    return `${currentMonth} ${currentYear}`;
  }

  setTimeout(function() {



    $('#body').show();



  }, 2000);

  function restrictToAlphabets(event) {
    const inputElement = event.target;
    const currentValue = inputElement.value;
    const filteredValue = currentValue.replace(/[^A-Za-z ]/g, ''); // Remove all characters except A-Z, a-z, and spaces
    if (currentValue !== filteredValue) {
      inputElement.value = filteredValue;
    }
  }

  function restrictToNumerals(event) {
    const inputElement = event.target;
    const currentValue = inputElement.value;
    const filteredValue = currentValue.replace(/\D/g, ''); // Remove all non-digit characters
    if (currentValue !== filteredValue) {
      inputElement.value = filteredValue;
    }
  }
</script>

<!-- script code end  -->



</html>