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
                                <input class="form-control" type="text" ng-model="feedback.audit_type" placeholder="Enter audit name" ng-required="true" style="margin-top: 0px;" disabled/>
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

                          <span class="addon" style="font-size:18px; margin-bottom:6px;">{{lang.location}}</span>

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
                                  style="padding: 6px 8px; border: 1px solid #ced4da; border-radius: 4px; margin-top: 8px; width: 100%;" />
                              </div>
                            </div>
                            </div>
    
    
                        </div>
                    </div>
    
    
                            <input type="button" name="previous" class="previous action-button-previous" style=" font-size:small; margin-top: 30px;" ng-click="prev()" value="{{lang.previous}}" />
    
                            <input type="button" name="next" ng-click="next1()" style="background: #4285F4 ; font-size:small;  margin-top: 30px;" class="next action-button" value="{{lang.next}}" />
    
                </fieldset>


                <!-- PATIENT INFORMATION page end -->
                <fieldset ng-show="step1 == true">
                    
                    <h4 style="font-size:22px;"><strong>{{lang.patient_info}}</strong></h4>


                      <div class="col-xs-12 col-sm-12 col-md-12" style="margin-left:7px; top: 15px;">
                        <div class="form-group">
                          <div style="margin-top: 30px; text-align: left;margin-left:-6px;">
                            <p style="font-size: 18px; margin-bottom: 6px;">{{lang.identification_details}}</p>
                            <input class="form-control" type="text" ng-model="feedback.identification_details" placeholder="Enter your input" maxlength="30" autocomplete="off" />
                          </div>


                          <div style="margin-top: 8px; text-align: left;margin-left:-6px;">
                            <p style="font-size: 18px; margin-bottom: 6px;">{{lang.vital_signs}}</p>
                            <input class="form-control" type="text" ng-model="feedback.vital_signs" placeholder="Enter your input" maxlength="30" autocomplete="off" />
                          </div>
                          <!-- Surgery -->
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
                                <input type="text" class="form-cont" ng-model="feedback.surgery_text" placeholder="Remarks"
                                  style="margin-left:-2px; margin-top:5px;" />
                              </span>
                            </div>
                            
                            <!-- Complaints Communicated -->
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
                                <input type="text" class="form-cont" ng-model="feedback.complaints_communicated_text" placeholder="Remarks"
                                  style="margin-left:-2px; margin-top:5px;" />
                              </span>
                            </div>
                            
                            <!-- Intake -->
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
                                <input type="text" class="form-cont" ng-model="feedback.intake_remarks" placeholder="Remarks"
                                  style="margin-left:-2px; margin-top:5px;" />
                              </span>
                            </div>
                            
                            <!-- Output -->
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
                                <input type="text" class="form-cont" ng-model="feedback.output_remarks" placeholder="Remarks"
                                  style="margin-left:-2px; margin-top:5px;" />
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

                      <div class="col-xs-12 col-sm-12 col-md-12" style="padding-right: 0px; padding-left: 12px; margin-left: -13px; margin-top: 13px;">
                        <p style="font-size: 16px; text-align:left; margin-bottom: 6px; margin-left: -2px;">{{lang.data_analysis}}</p>
                        <textarea style="border:1px solid #ced4da; margin-left: -2px; margin-top: 6px; padding: 10px; width: 85%; height: 85px;" class="form-control" id="textarea1" ng-model="feedback.dataAnalysis" rows="5"></textarea>
                      <div style="margin-top: 8px;text-align:left;">
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
                    </div>



                    

                  <!-- submit button -->
                  <input type="button" name="previous" class="previous action-button-previous" style=" font-size:small;margin-left:-5px;margin-top:35px;" ng-click="prev1()" value="{{lang.previous}}" />

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