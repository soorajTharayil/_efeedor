<!DOCTYPE html>

<html lang="en">



<!-- head part start -->

<!-- IP FEEDBACK INDEX PAGE -->



<head>

  <title>Efeedor Feedback System</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <link rel="stylesheet" href="style.css?<?php echo time(); ?>">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

  <script src="app_mrd_audit.js?<?php echo time(); ?>"></script>

</head>

<!-- head part end -->



<!-- body part start -->



<body ng-app="ehandorApp" ng-controller="PatientFeedbackCtrl" style="display:none;" id="body">



  <!-- top navbar start -->

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

    <!-- logo of efeedor -->

    <a class="navbar-brand" href="#"><img style="    height: 36px;"></a>

    <!-- dropdown for three language start -->

    <!-- Add a button to trigger the modal -->
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#languageModal" style="margin: 4px; float:right;">
      {{type2}}
      <i class="fa fa-language" aria-hidden="true"></i>
    </button>
    <!-- dropdown for three language end -->

  </nav>

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


  <div class="container-fluid" id="grad1">
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

                  <h4><strong>{{lang.patient_info}}</strong></h4>

                  <!--<p>Fill all form field to go to next step</p>-->
                  <br>
                  <div class="form-card">

                    <div class="row">





                      <!-- Patient UHID -->

                      <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                          <span class="addon" style="    font-size: 16px;">{{lang.patientid}}<sup style="color:red">*</sup></span>

                          <span class="has-float-label">

                            <input class="form-control" placeholder="{{lang.enter_placeholder}}" maxlength="20" type="text" id="contactnumber" ng-required="true" ng-model="feedback.patientid" autocomplete="off" placeholder="Numerical digits only" style="padding-top:0px;" />

                            <label for="contactnumber"></label>

                          </span>

                        </div>

                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group" style="margin-top: 12px;">
                          <span class="addon" style="font-size: 16px;">{{lang.department}}</span>
                          <span class="has-float-label">
                            <select class="form-control" id="department" ng-required="true" ng-model="feedback.department" autocomplete="off">
                              <option value="" disabled selected>Select Department</option>
                              <option ng-repeat="x in auditdept.auditdept" ng-show="x.title != 'ALL'" value="{{x.title}}">{{x.title}}</option>
                            </select>

                            <label for="bednumber"></label>
                          </span>
                        </div>
                      </div>


                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <span class="addon" style="font-size: 16px;">{{lang.patient_category}}<sup style="color:red">*</sup></span>
                          <span class="has-float-label">
                            <select class="form-control" id="patient_category" ng-required="true" ng-model="feedback.patient_category" autocomplete="off" style="padding-top:0px;">
                              <option value="" disabled selected>Patient Category</option>
                              <option ng-repeat="x in patient_category.patient_category" ng-show="x.title != 'ALL'" value="{{x.title}}">{{x.title}}</option>

                            </select>
                            <label for="bednumber"></label>
                          </span>
                        </div>
                      </div>

                      <p>&nbsp;</p>





                    </div>

                  </div>

                  <!-- next button -->
                  <input type="button" name="previous" class="previous action-button-previous" style=" font-size:small;" ng-click="prev()" value="{{lang.previous}}" />

                  <input type="button" name="next" ng-click="next1()" style="background: #4285F4 ; font-size:small; ;" class="next action-button" value="{{lang.next}}" />

                </fieldset>

                <fieldset ng-show="step1 == true">


                  <h4 style="font-size:24px"><strong>{{lang.file_audit}}</strong></h4>

                  <br>
                  <div class="form-card">

                    <div class="row">


                      <div class="col-xs-12 col-sm-12 col-md-12" style="margin-left:5px;">
                        <div class="form-group transparent-placeholder" style="display: flex; flex-direction: column; position: relative;">
                          <span class="addon" style="font-size: 16px; margin-bottom: -10px;">{{lang.formula_para1}}<sup style="color:red">*</sup><br>
                            <p style="font-size: 14px;">{{lang.format}}</p>
                          </span>

                          <div style="display: flex; flex-direction: row; align-items: center; width: 100%;">
                            <input class="form-control" ng-model="feedback.initial_assessment_hr1" oninput="restrictYearLength(this)" type="datetime-local" id="formula_para1_hr" ng-required="true" autocomplete="off" style="padding-top: 2px;padding-left: 6px; border: 1px solid #ced4da;margin-top:9px;width: calc(100% - 20px);" />
                            <span class="calendar-icon-container" style="position: absolute; right: 5px; top: 76%; transform: translateY(-50%); margin-left:-29px;">
                              <svg class="calendar-icon" style="margin-left:-36px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm0 1V1h8v-.5a.5.5 0 0 1 1 0V1h1a1 1 0 0 1 1 1v2H1V2a1 1 0 0 1 1-1h1V.5a.5.5 0 0 1 1 0V1zm-2 4v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5H1z" />
                              </svg>
                            </span>
                            <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%);">
                              <i class="fa fa-calendar-alt"></i>
                            </span>
                            <label for="para1"></label>
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12" style="margin-left:5px;">
                        <div class="form-group transparent-placeholder" style="display: flex; flex-direction: column; position: relative;">
                          <span class="addon" style="font-size: 16px; margin-bottom: -10px;">{{lang.formula_para2}}<sup style="color:red">*</sup><br>
                            <p style="font-size: 14px;">{{lang.format}}</p>
                          </span>

                          <div style="display: flex; flex-direction: row; align-items: center; width: 100%;">
                            <input class="form-control" ng-model="feedback.initial_assessment_hr2" oninput="restrictYearLength(this)" type="datetime-local" id="formula_para1_hr" ng-required="true" autocomplete="off" style="padding-top: 2px;padding-left: 6px; border: 1px solid #ced4da;margin-top:9px;width: calc(100% - 20px);" />
                            <span class="calendar-icon-container" style="position: absolute; right: 5px; top: 81%; transform: translateY(-50%); margin-left:-29px;">
                              <svg class="calendar-icon" style="margin-left:-36px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm0 1V1h8v-.5a.5.5 0 0 1 1 0V1h1a1 1 0 0 1 1 1v2H1V2a1 1 0 0 1 1-1h1V.5a.5.5 0 0 1 1 0V1zm-2 4v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5H1z" />
                              </svg>
                            </span>
                            <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%);">
                              <i class="fa fa-calendar-alt"></i>
                            </span>
                            <label for="para1"></label>
                          </div>
                        </div>
                      </div>





                      <button type="button" class="btn btn-primary" ng-click="calculateTimeFormat()" style=" margin-top:15px; margin-left:20px;">
                        Calculate initial assessment time
                      </button>


                    </div>

                  </div>


                  <div ng-if="calculatedResult" style="margin-top: 15px;text-align:left;"><br>

                    <div style="margin-left:15px;">
                      <strong>Time taken for initial assessment is: <span style="color: blue; font-size:16px;">{{calculatedResultTime}}</span></strong><br><br>
                      <!-- <strong>Bench Mark Time: 04:00:00</strong> -->
                    </div>

                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 23px; text-align: left;">
                    <p style="font-size: 16px; margin-bottom: 6px;">{{lang.consent}}</p>
                    <div style="display: flex; gap: 20px; align-items: center;">
                      <label style="display: flex; align-items: center;">
                        <input type="radio" ng-model="feedback.consent_verified" value="yes" /><span style="margin-left: 5px;">Yes</span>
                      </label>
                      <label style="display: flex; align-items: center;">
                        <input type="radio" ng-model="feedback.consent_verified" value="no" /><span style="margin-left: 5px;">No</span>
                      </label>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12" ng-show="feedback.consent_verified === 'no'" style="margin-top: 10px; text-align: left;">
                    <p style="font-size: 16px; margin-bottom: 6px;">{{lang.explain}}</p>
                    <input class="form-control" ng-model="feedback.consent_comment" rows="3" placeholder="Enter reason here" style="margin-top: 10px; padding-left:5px;border: 1px solid #ced4da; width: 100%;">
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 13px; text-align: left;">
                    <p style="font-size: 16px; margin-bottom: 6px;">{{lang.discharge_summary}}</p>
                    <div style="display: flex; gap: 20px; align-items: center;">
                      <label style="display: flex; align-items: center;">
                        <input type="radio" ng-model="feedback.discharge_summary" value="yes" /><span style="margin-left: 5px;">Yes</span>
                      </label>
                      <label style="display: flex; align-items: center;">
                        <input type="radio" ng-model="feedback.discharge_summary" value="no" /><span style="margin-left: 5px;">No</span>
                      </label>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 13px; text-align: left;">
                    <p style="font-size: 16px; margin-bottom: 6px;">{{lang.error_prone}}</p>
                    <div style="display: flex; gap: 20px; align-items: center;">
                      <label style="display: flex; align-items: center;">
                        <input type="radio" ng-model="feedback.error_prone" value="yes" /><span style="margin-left: 5px;">Yes</span>
                      </label>
                      <label style="display: flex; align-items: center;">
                        <input type="radio" ng-model="feedback.error_prone" value="no" /><span style="margin-left: 5px;">No</span>
                      </label>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12" ng-show="feedback.error_prone === 'yes'" style="margin-top: 10px; text-align: left;">
                    <p style="font-size: 16px; margin-bottom: 6px;">{{lang.explain}}</p>
                    <input class="form-control" ng-model="feedback.error_prone_comment" rows="3" placeholder="Enter abbrevation used" style="margin-top: 10px; padding-left:5px;border: 1px solid #ced4da; width: 100%;">
                  </div>

                  <div class="form-card">

                    <div class="row">

                      <!-- <p style="margin-left:20px;font-size: 16px;margin-right:10px;margin-bottom:30px;"><b>{{lang.definition}}</b> {{lang.kpi_def}}</p> -->

                      <div class="col-xs-12 col-sm-12 col-md-12" style="margin-left:5px; margin-top: 20px;">
                        <div class="form-group transparent-placeholder" style="display: flex; flex-direction: column; position: relative;">
                          <span class="addon" style="font-size: 16px; margin-bottom: -10px;">{{lang.doctor_advice}}<sup style="color:red">*</sup><br>
                            <p style="font-size: 14px;">{{lang.format}}</p>
                          </span>

                          <div style="display: flex; flex-direction: row; align-items: center; width: 100%;">
                            <input class="form-control" ng-model="feedback.initial_assessment_hr3" oninput="restrictYearLength(this)" type="datetime-local" id="formula_para3_hr" ng-required="true" autocomplete="off" style="padding-top: 2px;padding-left: 6px; border: 1px solid #ced4da;margin-top:9px;width: calc(100% - 20px);" />
                            <span class="calendar-icon-container" style="position: absolute; right: 5px; top: 76%; transform: translateY(-50%); margin-left:-29px;">
                              <svg class="calendar-icon" style="margin-left:-36px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm0 1V1h8v-.5a.5.5 0 0 1 1 0V1h1a1 1 0 0 1 1 1v2H1V2a1 1 0 0 1 1-1h1V.5a.5.5 0 0 1 1 0V1zm-2 4v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5H1z" />
                              </svg>
                            </span>
                            <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%);">
                              <i class="fa fa-calendar-alt"></i>
                            </span>
                            <label for="para1"></label>
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12" style="margin-left:5px;">
                        <div class="form-group transparent-placeholder" style="display: flex; flex-direction: column; position: relative;">
                          <span class="addon" style="font-size: 16px; margin-bottom: -10px;">{{lang.bill_paid}}<sup style="color:red">*</sup><br>
                            <p style="font-size: 14px;">{{lang.format}}</p>
                          </span>

                          <div style="display: flex; flex-direction: row; align-items: center; width: 100%;">
                            <input class="form-control" ng-model="feedback.initial_assessment_hr4" oninput="restrictYearLength(this)" type="datetime-local" id="formula_para4_hr" ng-required="true" autocomplete="off" style="padding-top: 2px;padding-left: 6px; border: 1px solid #ced4da;margin-top:9px;width: calc(100% - 20px);" />
                            <span class="calendar-icon-container" style="position: absolute; right: 5px; top: 76%; transform: translateY(-50%); margin-left:-29px;">
                              <svg class="calendar-icon" style="margin-left:-36px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm0 1V1h8v-.5a.5.5 0 0 1 1 0V1h1a1 1 0 0 1 1 1v2H1V2a1 1 0 0 1 1-1h1V.5a.5.5 0 0 1 1 0V1zm-2 4v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5H1z" />
                              </svg>
                            </span>
                            <span style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%);">
                              <i class="fa fa-calendar-alt"></i>
                            </span>
                            <label for="para1"></label>
                          </div>
                        </div>
                      </div>





                      <button type="button" class="btn btn-primary" ng-click="calculateDoctorAdviceToBillPaid()" style="margin-left:20px; margin-top:15px;">
                        Calculate discharge time
                      </button>


                    </div>

                  </div>

                  <div ng-if="calculatedDoctorAdviceToBillPaid" style="margin-top: 15px;text-align:left;"><br>

                    <div style="margin-left:15px;">
                      <strong>Time taken for discharge is: <span style="color: blue; font-size:16px;">{{calculatedDoctorAdviceToBillPaidTime}}</span></strong><br><br>

                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12" style="padding-right: 0px; padding-left: 12px; margin-left: 5px; margin-top: 20px;">
                    <p style="font-size: 16px; text-align:left; margin-bottom: 6px; margin-left: -2px;">{{lang.data_analysis}}</p>
                    <textarea style="border:1px solid #ced4da; margin-left: -2px; margin-top: 6px; padding: 10px; width: 85%; height: 85px;" class="form-control" id="textarea1" ng-model="feedback.dataAnalysis" rows="5"></textarea>
                  </div>






                  <br><br>

                  <input type="button" name="previous" class="previous action-button-previous" style=" font-size:small;margin-left:13px;" ng-click="prev1()" value="{{lang.previous}}" />
                  <!-- submit button -->
                  <div ng-if="calculatedDoctorAdviceToBillPaid">

                    <input type="button" ng-show="loader == false" style="background: #4285F4 ; font-size:small; margin-right:10px;" name="make_payment" class="next action-button" ng-click="savefeedback()" value="{{lang.submit}}" />
                    <img src="https://media.tenor.com/8ZhQShCQe9UAAAAC/loader.gif" ng-show="loader == true">
                  </div>
                </fieldset>




                <fieldset ng-show="step4 == true">

                  <div class="form-card">





                    <!-- happy customer code start		 -->

                    <!-- <div class="row justify-content-center">

                      <div class="col-12 text-center">

                        <br>

                        <h2 class="fs-title text-center" style="font-weight: 300;">{{lang.thankyou}}</h2> <br>

                        <img src="dist/happy100x100.png"> <br>

                        <p style="text-align:center; margin-top: 15px; font-weight: 300;" class="lead">

                          {{lang.happythankyoumessage}}
                        </p><br>

                        <p style="text-align:center;"><a href="{{setting_data.google_review_link}}" target="_blank"><img style="width:268px" src="dist/ggg.jpg"></a></p>

                      </div>

                    </div> -->

                    <!-- happy customer code end		 -->



                    <!-- unhappy customer code start		 -->

                    <div class="row justify-content-center">

                      <div class="col-12 text-center">

                        <br>

                        <h2 class="fs-title text-center" style="font-weight: 300;">{{lang.thankyou}}</h2><br>

                        <img src="dist/tick.png"> <br>

                        <p style="text-align:center; margin-top: 45px; font-weight: 300;" class="lead">

                          {{lang.unhappythankyoumessage}}
                        </p>

                      </div>

                    </div>

                    <!-- unhappy customer code end		 -->

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
  .calendar-icon-container {
    display: none;
  }

  @media (max-width: 800px) {
    .calendar-icon-container {
      display: block;
    }
  }

  .transparent-placeholder input::placeholder {
    opacity: 0.5;
  }

  textarea {
    transition: height 0.3s ease-in-out;
  }

  .btn-primary {
    background-color: #686DE0;
    border-color: #686DE0;
    border-radius: 7px;
    color: white;
    padding: 8px 16px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }

  /* Hover effect */
  .btn-primary:hover {
    background-color: #5B56D6;
    border-color: #5B56D6;
  }

  /* Focus and active state (clicked) */
  .btn-primary:focus,
  .btn-primary:active {
    outline: none;
    box-shadow: 0 0 10px rgba(104, 109, 224, 0.5);
  }

  /* Optional: add a transition effect when hovering */
  .btn-primary {
    transition: background-color 0.3s, box-shadow 0.3s;
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

<!-- css code end  -->





<!-- script code start  -->

<script>
  function restrictYearLength(input) {
    if (!input.value) return;

    // Extract parts of datetime-local input
    const parts = input.value.split("T");
    const date = parts[0]; // YYYY-MM-DD
    const time = parts[1] || "";

    const segments = date.split("-");
    if (segments.length === 3) {
      let year = segments[0];
      if (year.length > 4) {
        year = year.slice(0, 4); // Trim to 4 digits
      }
      // Rebuild and assign trimmed datetime
      input.value = year + '-' + segments[1] + '-' + segments[2] + (time ? 'T' + time : '');
    }
  }
</script>


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