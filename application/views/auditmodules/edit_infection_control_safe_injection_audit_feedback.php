<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_infection_control_safe_injection_audit');
$results = $query->result();
// print_r($results);
$row = $results[0];
$param = json_decode($row->dataset, true);
// '<pre>';
// print_r($param);
?>


<div class="content">
    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><a href="javascript:void()" data-toggle="tooltip" title="<?php echo lang_loader('ip', 'audit_id_tooltip'); ?>">
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp; Safe Injection and Infusion Audit  - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_infection_control_safe_injection_audit_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
                    <table class="table table-striped table-bordered  no-footer dtr-inline collapsed">

                        <tr>
                            <td>
                                <b>Audit Details</b>
                            </td>
                            <td style="overflow: clip;">
                                Audit Name: <?php echo $param['audit_type']; ?>
                                <br>
                                Date & Time of Audit: <?php echo date('Y-m-d H:i', strtotime($row->datetime)); ?>
                                <br>
                                Audit by: <?php echo $param['audit_by']; ?>

                                <!-- Hidden inputs -->
                                <input class="form-control" type="hidden" name="audit_type" value="<?php echo $param['audit_type']; ?>" />
                                <input class="form-control" type="hidden" name="datetime" value="<?php echo $row->datetime; ?>" />
                                <input class="form-control" type="hidden" name="audit_by" value="<?php echo $param['audit_by']; ?>" />
                            </td>
                        </tr>


                    </table>

                    <table class="table table-striped table-bordered no-footer dtr-inline collapsed">
                        <tr>
                            <td style="width: 43%;"><b>Patient MID</b></td>
                            <td>
                                <input class="form-control" type="text" name="mid_no" value="<?php echo $param['mid_no']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Patient Name</b></td>
                            <td>
                                <input class="form-control" type="text" name="patient_name" value="<?php echo $param['patient_name']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Patient Age</b></td>
                            <td>
                                <input class="form-control" type="text" name="patient_age" value="<?php echo $param['patient_age']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Patient Gender</b></td>
                            <td>
                                <input class="form-control" type="text" name="patient_gender" value="<?php echo $param['patient_gender']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Area</b></td>
                            <td>
                                <input class="form-control" type="text" name="location" value="<?php echo $param['location']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Department</b></td>
                            <td>
                                <input class="form-control" type="text" name="department" value="<?php echo $param['department']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Attended Doctor</b></td>
                            <td>
                                <input class="form-control" type="text" name="attended_doctor" value="<?php echo $param['attended_doctor']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Admission Date & Time</b></td>
                            <td>
                                <input class="form-control" type="text" name="initial_assessment_hr6" value="<?php echo $param['initial_assessment_hr6']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Discharge Date & Time</b></td>
                            <td>
                                <input class="form-control" type="text" name="discharge_date_time" value="<?php echo $param['discharge_date_time']; ?>">
                            </td>
                        </tr>
                            <tr>
                                <td>Is Hand hygiene performed (soap/water or hand sanitizer) prior to accessing supplies, handling vials and IV solutions, and preparing or administering medications?</td>
                                <td>
                                    <input type="text" name="identification_details" class="form-control" value="<?php echo htmlspecialchars($param['identification_details']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="identification_details_text" class="form-control" value="<?php echo htmlspecialchars($param['identification_details_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Disposable gloves worn according to Meitra policy/procedure?</td>
                                <td>
                                    <input type="text" name="vital_signs" class="form-control" value="<?php echo htmlspecialchars($param['vital_signs']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="vital_signs_text" class="form-control" value="<?php echo htmlspecialchars($param['vital_signs_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Medications and supplies stored and prepared in a clean area on a clean surface?</td>
                                <td>
                                    <input type="text" name="surgery" class="form-control" value="<?php echo htmlspecialchars($param['surgery']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="surgery_text" class="form-control" value="<?php echo htmlspecialchars($param['surgery_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that needles and syringes are stored in their original packaging/wrapper?</td>
                                <td>
                                    <input type="text" name="complaints_communicated" class="form-control" value="<?php echo htmlspecialchars($param['complaints_communicated']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="complaints_communicated_text" class="form-control" value="<?php echo htmlspecialchars($param['complaints_communicated_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is the Skin at the injection/insertion site prepared with the appropriate antiseptic which is allowed to dry on the skin?</td>
                                <td>
                                    <input type="text" name="intake" class="form-control" value="<?php echo htmlspecialchars($param['intake']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="intake_text" class="form-control" value="<?php echo htmlspecialchars($param['intake_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that the injection site is not touched after skin antisepsis has been done?</td>
                                <td>
                                    <input type="text" name="output" class="form-control" value="<?php echo htmlspecialchars($param['output']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="output_text" class="form-control" value="<?php echo htmlspecialchars($param['output_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Sterile, single use syringes always used for any type of injection or infusion?</td>
                                <td>
                                    <input type="text" name="allergies" class="form-control" value="<?php echo htmlspecialchars($param['allergies']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="allergies_text" class="form-control" value="<?php echo htmlspecialchars($param['allergies_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Needles, cannulas and syringes always used as single use (used for only one patient) and are never re-used on other patients?</td>
                                <td>
                                    <input type="text" name="medication" class="form-control" value="<?php echo htmlspecialchars($param['medication']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="medication_text" class="form-control" value="<?php echo htmlspecialchars($param['medication_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Medications never administered from the same syringe or needle to more than one patient?</td>
                                <td>
                                    <input type="text" name="diagnostic" class="form-control" value="<?php echo htmlspecialchars($param['diagnostic']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="diagnostic_text" class="form-control" value="<?php echo htmlspecialchars($param['diagnostic_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that the sterile needle/cannula and/or syringe is removed from the packaging just prior to use?</td>
                                <td>
                                    <input type="text" name="lab_results" class="form-control" value="<?php echo htmlspecialchars($param['lab_results']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="lab_results_text" class="form-control" value="<?php echo htmlspecialchars($param['lab_results_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Single-use or single-dose vials used whenever possible? Discard after one use.</td>
                                <td>
                                    <input type="text" name="pending_investigation" class="form-control" value="<?php echo htmlspecialchars($param['pending_investigation']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="pending_investigation_text" class="form-control" value="<?php echo htmlspecialchars($param['pending_investigation_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Entry into a medication vial always done with a new needle or cannula and syringe? Never enter a vial with a used syringe or needle.</td>
                                <td>
                                    <input type="text" name="medicine_order" class="form-control" value="<?php echo htmlspecialchars($param['medicine_order']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="medicine_order_text" class="form-control" value="<?php echo htmlspecialchars($param['medicine_order_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are the rubber septum/diaphragm of medication vials always cleansed using friction with alcohol prior to each entry?</td>
                                <td>
                                    <input type="text" name="facility_communicated" class="form-control" value="<?php echo htmlspecialchars($param['facility_communicated']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="facility_communicated_text" class="form-control" value="<?php echo htmlspecialchars($param['facility_communicatedr_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Multi-dose vials dated when first opened and discarded within 28 days or as per manufacturer?</td>
                                <td>
                                    <input type="text" name="health_education" class="form-control" value="<?php echo htmlspecialchars($param['health_education']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="health_education_text" class="form-control" value="<?php echo htmlspecialchars($param['health_education_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that leftover parenteral medications are never pooled or combined for later use?</td>
                                <td>
                                    <input type="text" name="risk_assessment" class="form-control" value="<?php echo htmlspecialchars($param['risk_assessment']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="risk_assessment_text" class="form-control" value="<?php echo htmlspecialchars($param['risk_assessment_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that needles and cannulas are never left inserted in any vial rubber septum for multiple withdrawals?</td>
                                <td>
                                    <input type="text" name="urethral" class="form-control" value="<?php echo htmlspecialchars($param['urethral']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="urethral_text" class="form-control" value="<?php echo htmlspecialchars($param['urethral_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Pre-drawing of medications:</td>
                                <td>
                                    <input type="text" name="urine_sample" class="form-control" value="<?php echo htmlspecialchars($param['urine_sample']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="urine_sample_text" class="form-control" value="<?php echo htmlspecialchars($param['urine_sample_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Medication vials inspected prior to use and discarded if sterility is compromised?</td>
                                <td>
                                    <input type="text" name="bystander" class="form-control" value="<?php echo htmlspecialchars($param['bystander']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="bystander_text" class="form-control" value="<?php echo htmlspecialchars($param['bystander_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that bags/bottles of IV solutions are never used as common source supply for more than one patient?</td>
                                <td>
                                    <input type="text" name="instruments" class="form-control" value="<?php echo htmlspecialchars($param['instruments']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="instruments_text" class="form-control" value="<?php echo htmlspecialchars($param['instruments_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that Infusion supplies are never used for more than one patient?</td>
                                <td>
                                    <input type="text" name="sterile" class="form-control" value="<?php echo htmlspecialchars($param['sterile']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="sterile_text" class="form-control" value="<?php echo htmlspecialchars($param['sterile_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that there is restricted use of finger stick capillary blood sampling devices to individual patients?</td>
                                <td>
                                    <input type="text" name="antibiotics" class="form-control" value="<?php echo htmlspecialchars($param['antibiotics']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="antibiotics_text" class="form-control" value="<?php echo htmlspecialchars($param['antibiotics_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are single-use lancets that permanently retract upon puncture used and never reused?</td>
                                <td>
                                    <input type="text" name="surgical_site" class="form-control" value="<?php echo htmlspecialchars($param['surgical_site']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="surgical_site_text" class="form-control" value="<?php echo htmlspecialchars($param['surgical_site_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that pen style devices with removable lancet are dedicated to one patient?</td>
                                <td>
                                    <input type="text" name="wound" class="form-control" value="<?php echo htmlspecialchars($param['wound']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="wound_text" class="form-control" value="<?php echo htmlspecialchars($param['wound_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Is it ensured that the exterior surface of glucometer is cleaned and disinfected after each use?</td>
                                <td>
                                    <input type="text" name="documented" class="form-control" value="<?php echo htmlspecialchars($param['documented']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="documented_text" class="form-control" value="<?php echo htmlspecialchars($param['documented_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Needles/sharps disposed of at the point of use and containers conveniently located?</td>
                                <td>
                                    <input type="text" name="adequate_facilities" class="form-control" value="<?php echo htmlspecialchars($param['adequate_facilities']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="adequate_facilities_text" class="form-control" value="<?php echo htmlspecialchars($param['adequate_facilities_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Sharps disposal containers leak-proof, puncture-resistant, and labeled with a biohazard label?</td>
                                <td>
                                    <input type="text" name="sufficient_lighting" class="form-control" value="<?php echo htmlspecialchars($param['sufficient_lighting']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="sufficient_lighting_text" class="form-control" value="<?php echo htmlspecialchars($param['sufficient_lighting_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are Sharps containers emptied/replaced when 2/3 full?</td>
                                <td>
                                    <input type="text" name="storage_facility_for_food" class="form-control" value="<?php echo htmlspecialchars($param['storage_facility_for_food']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="storage_facility_for_food_text" class="form-control" value="<?php echo htmlspecialchars($param['storage_facility_for_food_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are sharps containers wall mounted or stabilized so they do not tip over?</td>
                                <td>
                                    <input type="text" name="personnel_hygiene_facilities" class="form-control" value="<?php echo htmlspecialchars($param['personnel_hygiene_facilities']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="personnel_hygiene_facilities_text" class="form-control" value="<?php echo htmlspecialchars($param['personnel_hygiene_facilities_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Are sharps safety devices used where possible and activated immediately after use?</td>
                                <td>
                                    <input type="text" name="food_material_testing" class="form-control" value="<?php echo htmlspecialchars($param['food_material_testing']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="food_material_testing_text" class="form-control" value="<?php echo htmlspecialchars($param['food_material_testing_text']); ?>">
                                </td>
                            </tr>


















                            









                                    

                                    

                                



                        <!-- Save/Reset Buttons -->
                        <tr>
                            <td colspan="2">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button">
                                            <?php echo display('reset') ?>
                                        </button>
                                        <div class="or"></div>
                                        <button type="submit" id="saveButton" class="ui positive button" style="text-align: left;">
                                            <?php echo display('save') ?>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </table>

                    

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Initialize flags to track if values have been edited and if calculation is done
    var valuesEdited = false;
    var calculationDone = false;

    // Function to call when values are edited
    function onValuesEdited() {
        valuesEdited = true;
        calculationDone = false; // Reset calculation flag when values are edited
    }

    // Add event listeners to input elements to call the onValuesEdited function
    document.getElementById('formula_para1_hr').addEventListener('input', onValuesEdited);
    document.getElementById('formula_para1_min').addEventListener('input', onValuesEdited);
    document.getElementById('formula_para1_sec').addEventListener('input', onValuesEdited);
    document.getElementById('formula_para1_bt').addEventListener('input', onValuesEdited);



    // Function to check if values have been edited before form submission
    function checkValuesBeforeSubmit() {
        if (valuesEdited && !calculationDone) {
            alert('Please calculate before saving');
            event.preventDefault();
            return false;
        }
        return true;
    }


    // Add an event listener to the save button
    document.getElementById('saveButton').addEventListener('click', function() {

        if (checkValuesBeforeSubmit()) {
            // Proceed with save action
            console.log('Data saved successfully.');
            // You can use AJAX or form submission here
        }
    });

    // Add event listener to the calculate button
    document.querySelector('button[onclick="calculateTimeFormat()"]').addEventListener('click', calculateTimeFormat);
    document.querySelector('button[onclick="calculateTimeFor()"]').addEventListener('click', calculateTimeFor);


    function calculateTimeFormat() {
        // Retrieve the admission and assessment times from the input fields
        var admissionTime = document.querySelector('input[name="initial_assessment_hr1"]').value;
        var assessmentTime = document.querySelector('input[name="initial_assessment_hr2"]').value;

        // Convert the time strings to Date objects
        var admissionDate = new Date(admissionTime);
        var assessmentDate = new Date(assessmentTime);

        // Validation checks
        if (isNaN(admissionDate.getTime())) {
            alert("Please enter admitted time.");
            return;
        }

        if (isNaN(assessmentDate.getTime())) {
            alert("Please enter initial assessment time.");
            return;
        }

        if (assessmentDate <= admissionDate) {
            alert("Initial assessment time must be greater than admitted time.");
            return;
        }

        // Calculate the time difference in milliseconds
        var timeDifferenceMs = assessmentDate - admissionDate;

        // Convert the time difference to hours, minutes, and seconds
        var totalSeconds = Math.floor(timeDifferenceMs / 1000);
        var hours = Math.floor(totalSeconds / 3600);
        var minutes = Math.floor((totalSeconds % 3600) / 60);
        var seconds = totalSeconds % 60;

        // Format the calculated time as a string
        var formattedTime = `${hours}:${('0' + minutes).slice(-2)}:${('0' + seconds).slice(-2)}`;

        // Set the formatted time to the hidden input field
        document.getElementById('formattedTime').value = formattedTime;

        // Display the calculated result in the corresponding input field
        document.querySelector('input[name="calculatedResult"]').value = formattedTime;

        console.log("Admitted Time:", admissionTime);
        console.log("Initial Assessment Time:", assessmentTime);
        console.log("Time Taken for Initial Assessment:", formattedTime);
        calculationDone = true;
    }


    function calculateTimeFor() {
        // Retrieve the admission and assessment times from the input fields
        var admissionTime = document.querySelector('input[name="initial_assessment_hr3"]').value;
        var assessmentTime = document.querySelector('input[name="initial_assessment_hr4"]').value;

        // Convert the time strings to Date objects
        var admissionDate = new Date(admissionTime);
        var assessmentDate = new Date(assessmentTime);

        // Validation checks
        if (isNaN(admissionDate.getTime())) {
            alert("Please enter discharge advice time.");
            return;
        }

        if (isNaN(assessmentDate.getTime())) {
            alert("Please enter billing time.");
            return;
        }

        if (assessmentDate <= admissionDate) {
            alert("Billing time must be greater than discharge advice time.");
            return;
        }

        // Calculate the time difference in milliseconds
        var timeDifferenceMs = assessmentDate - admissionDate;

        // Convert the time difference to hours, minutes, and seconds
        var totalSeconds = Math.floor(timeDifferenceMs / 1000);
        var hours = Math.floor(totalSeconds / 3600);
        var minutes = Math.floor((totalSeconds % 3600) / 60);
        var seconds = totalSeconds % 60;

        // Format the calculated time as a string
        var formattedTime = `${hours}:${('0' + minutes).slice(-2)}:${('0' + seconds).slice(-2)}`;

        // Set the formatted time to the hidden input field
        document.getElementById('formattedTime').value = formattedTime;

        // Display the calculated result in the corresponding input field
        document.querySelector('input[name="calculatedDoctorAdviceToBillPaid"]').value = formattedTime;

        console.log("Admitted Time:", admissionTime);
        console.log("Initial Assessment Time:", assessmentTime);
        console.log("Time Taken for Initial Assessment:", formattedTime);
        calculationDone = true;
    }
</script>