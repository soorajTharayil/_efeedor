<!DOCTYPE html>
<html lang="en">

<head>
  <title>Efeedor Healthcare Experience Management Platform</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="style.css">
  <script src="dist/js/jquery.min.js"></script>
	<script src="dist/js/popper.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/js/angular.min.js"></script>
	<script src="dist/js/angular-sanitize.min.js"></script>
	<script src="dist/js/load-image.all.min.js"></script>
  <script src="app.js?<?php echo time(); ?>"></script>

</head>

<body ng-app="ehandorApp" ng-controller="PatientFeedbackCtrl" ng-show="lang" ng-cloak>
  <fieldset ng-cloak ng-show="step0 == true">
    <div class="main-container">
      <div class="form-container" style="margin-top: 100px;">


        <div class="form-body" style="align-items:center;">
          <!-- <form class="the-form">
            <div style="text-align: center; margin-top:-22px;">
              <a class="navbar-brand" href="#"><img src="{{setting_data.logo}}" style="height: 100px; width:100%"></a>
            </div>
            <br>
            <div ng-cloak style="color: red; text-align: center;" class="alert-error" ng-show="loginerror.length > 3">
              {{loginerror}}</div>
            
            <input type="text" name="email" id="email" class="input-field" placeholder="Enter email/ mobile no."
              ng-model="loginvar.userid">
            
            <div class="password-container">
              <input type="password" name="password" id="password" class="input-field" placeholder="Enter password"
                ng-model="loginvar.password">
              <span style="color: rgba(0, 0, 0, 0.8);" class="password-toggle" onclick="togglePassword()">
                <i class="fa fa-eye-slash" aria-hidden="true"></i>
              </span>
            </div>
            <div style=" display: flex; justify-content: center; /* horizontally center */align-items: center; ">
              <input ng-click="login()" type="submit" value="LOGIN" style="width: 100px; height:45px;">
            </div>
          </form> -->
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
  <fieldset ng-show="step1 == true">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed">
      <!-- Logo of efeedor -->
      <!-- <a class="navbar-brand" href="#"><img src="{{setting_data.logo}}" style="height: 36px; margin-left: -10px;" alt="Efeedor Logo"></a> -->

      <!-- Section for Buttons and Language Button -->
      <div class="ml-auto d-flex justify-content-between align-items-center w-100">
        <div class="left-buttons d-flex">
          <a ng-href="/login/?userid={{ userId }}" class="btn btn-light mr-3 dashboard-btn"
            style="width: 100px; height: 32px; font-size: 14px; font-weight: bold; text-align: left; display: flex; align-items: center; padding-left: 10px;">
            Dashboard
          </a>
        </div>



        <!-- Right Side: Language Button -->
        <div class="right-buttons d-flex align-items-center">
          <!-- <button type="button" class="btn btn-dark language-btn" data-toggle="modal" data-target="#languageModal"
            style="margin: 4px;">
            {{type2}}
            <i class="fa fa-language" aria-hidden="true"></i>
          </button>
          <button class="btn btn-dark menu-toggle" ng-click="menuVisible = !menuVisible" style="margin: 4px;">
            <i class="fa fa-bars"></i>
          </button> -->
        </div>
      </div>
    </nav>

    






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
                <div class="left" style="margin-left: 68vw; max-width: 100%; margin-top: 5px; margin-right: -10px;">

                </div>
                <div style="text-align: left; align-items: left; margin-left: 25px; margin-right: 25px;"></div>
                <div class="box box-primary profilepage" style="background: transparent;">
                  <div class="box-body box-profile" style="display: inline-block;">

                    <div class="" style=" border: 2px solid #000;">
                      <div class="card-body" ng-click="language('english')"
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

                    <div class="" style=" border: 2px solid #000;">
                      <div class="card-body" ng-click="language('lang2')"
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

                    <div class="" style=" border: 2px solid #000;">
                      <div class="card-body" ng-click="language('lang3')"
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

    <div class="container" id="grad1">

      <div class="row justify-content-center">

        <div class=" col-lg-12 col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-2 mb-2">

          <div class=" px-0 pt-2 pb-0 ">

            <div class="left" style="max-width: 100%;margin-top: 5px;margin-right: -10px;">
              <!-- <a href="../form_login" style="margin-right: 35px;">
                <img src="./logout.png" style="max-width: 100%; height: 45px;" alt="">
              </a> -->
              <a class="navbar-brand" href="#"><img src="{{setting_data.logo}}" style="height: 70px; max-width: 200px;"
                  alt="Efeedor Logo"></a>
            </div>


            <div style=" text-align:left; align-items:left; margin-left: -10px; margin-right: 25px; margin-top: 10px;">
              <?php
              date_default_timezone_set('Asia/Kolkata');
              $hour = date('H');

              if ($hour < 12) {
                echo '<h4>{{lang.goodmorning}}</h4>';
              } elseif ($hour < 18) {
                echo '<h4>{{lang.goodafternoon}}</h4>';
              } else {
                echo '<h4>{{lang.goodevening}}</h4>';
              }
              ?>

              <p><span>{{lang.title3}}</span></p>

              <hr>
            </div>

            <br>
            <h6 class="text" style="font-size: 18px;  text-align:center;  margin-left: 25px; margin-right: 25px;">
              <strong>{{lang.title4}}</strong>
            </h6>
            <!-- <p>&nbsp;</p> -->
            <br> <br>
            <div class="box box-primary profilepage" style="background: transparent;">
              <div class="box-body box-profile" style="display: inline-block; margin-left: 25px; margin-right: 25px;">

                <div ng-if="profilen['IP-MODULE'] == true">
                  <a href="../ipfb?src=Link" class="btn btn-primary btn-block"
                    style="background: #4285F4; padding: 15px; border-radius: 45px; font-size: 16px; box-shadow: 0px 1px 1px rgba(0,0,0,0.5); border:none;">{{lang.button1}}</a>
                  <br>
                </div>

                <div ng-if="profilen['OP-MODULE'] == true">
                  <a href="../opfb?src=Link" class="btn btn-success btn-block"
                    style="padding: 15px; border-radius: 45px; font-size: 16px; box-shadow: 0px 1px 1px rgba(0,0,0,0.5); border:none;">{{lang.button2}}</a>
                  <br>
                </div>

                <div ng-if="profilen['PCF-MODULE'] == true">
                  <a href="../pcrf?src=Link" class="btn btn-danger btn-block"
                    style="padding: 15px; border-radius: 45px; font-size: 16px; box-shadow: 0px 1px 1px rgba(0,0,0,0.5); background-color:#DB6B97; border:none;">{{lang.button3}}</a>
                  <br>
                </div>

                <div ng-if="profilen['ISR-MODULE'] == true">
                  <a href="../isrf?src=Link&userid={{ adminId }} " class="btn btn-danger btn-block"
                    style="background: #4285F4; padding: 15px; border-radius: 45px; font-size: 16px; box-shadow: 0px 1px 1px rgba(0,0,0,0.5); border:none;">{{lang.button4}}</a>
                  <br>
                </div>
                <!-- ng-if="profilen['INCIDENT-MODULE'] == true" -->
                <div>
                  <a href="../inn?src=Link" class="btn btn-primary btn-block"
                    style="padding: 15px; border-radius: 45px; font-size: 16px; box-shadow: 0px 1px 1px rgba(0,0,0,0.5); background-color:#DB6B97; border:none;">{{lang.button5}}</a>
                  <br>
                </div>

                <div ng-if="profilen['GRIEVANCE-MODULE'] == true">
                  <a href="../sgf?src=Link" class="btn btn-success btn-block"
                    style="padding: 15px; border-radius: 45px; font-size: 16px; box-shadow: 0px 1px 1px rgba(0,0,0,0.5); border:none;">{{lang.button6}}</a>
                </div>
                <!-- ng-if="profilen['QUALITY-MODULE'] == true"  -->
                <div style="margin-top: 0px;">
                  <a href="../qim_forms?src=Link" class="btn btn-success btn-block"
                    style="background: #4285F4; padding: 15px; border-radius: 45px; font-size: 16px; box-shadow: 0px 1px 1px rgba(0,0,0,0.5); border:none;">QUALITY
                    KPI FORMS</a>
                  <br>
                </div>
                <!-- ng-if="profilen['AUDIT-MODULE'] == true" -->
                <div>
                  <a href="../audit_forms" class="btn btn-success btn-block"
                    style=" padding: 15px; border-radius: 45px; font-size: 16px; box-shadow: 0px 1px 1px rgba(0,0,0,0.5); border:none;">HEALTHCARE
                    AUDIT FORMS</a>
                </div>

                <div ng-if="profilen['REGISTER-ASSET-FORM'] == true" style="margin-top: 20px;">
                  <a href="../add_asset/?userid={{ adminId }} " class="btn btn-success btn-block"
                    style="background-color:#DB6B97; padding: 15px; border-radius: 45px; font-size: 16px; box-shadow: 0px 1px 1px rgba(0,0,0,0.5); border:none;">REGISTER
                    ASSET</a>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </fieldset>

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

  <!-- <style>
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
  </style> -->
  
  <style>
      [ng-cloak] {
        display: none !important;
      }
   </style>


</body>

</html>