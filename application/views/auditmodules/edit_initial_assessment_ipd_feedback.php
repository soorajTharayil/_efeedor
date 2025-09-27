<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_assessment_ipd');
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
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp; Initial Assessment IPD - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_initial_assessment_ipd_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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
                                <td>Is initial admission assessment completed - day care?</td>
                                <td>
                                    <input type="text" name="identification_details" class="form-control"
                                           value="<?php echo htmlspecialchars($param['identification_details']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="identification_details_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['identification_details_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is initial assessment started within defined TAT?</td>
                                <td>
                                    <input type="text" name="vital_signs" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vital_signs']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="vital_signs_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vital_signs_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are vital signs recorded?</td>
                                <td>
                                    <input type="text" name="surgery" class="form-control"
                                           value="<?php echo htmlspecialchars($param['surgery']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="surgery_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['surgery_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is orientation given to patient about environment?</td>
                                <td>
                                    <input type="text" name="complaints_communicated" class="form-control"
                                           value="<?php echo htmlspecialchars($param['complaints_communicated']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="complaints_communicated_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['complaints_communicated_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the vulnerability status ascertained?</td>
                                <td>
                                    <input type="text" name="intake" class="form-control"
                                           value="<?php echo htmlspecialchars($param['intake']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="intake_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['intake_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is pain assessment completed?</td>
                                <td>
                                    <input type="text" name="output" class="form-control"
                                           value="<?php echo htmlspecialchars($param['output']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="output_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['output_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is ability to perform activities of daily living assessed?</td>
                                <td>
                                    <input type="text" name="allergies" class="form-control"
                                           value="<?php echo htmlspecialchars($param['allergies']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="allergies_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['allergies_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is psychological status assessed?</td>
                                <td>
                                    <input type="text" name="medication" class="form-control"
                                           value="<?php echo htmlspecialchars($param['medication']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="medication_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['medication_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is skin status assessed?</td>
                                <td>
                                    <input type="text" name="diagnostic" class="form-control"
                                           value="<?php echo htmlspecialchars($param['diagnostic']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="diagnostic_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['diagnostic_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is fall risk assessment completed?</td>
                                <td>
                                    <input type="text" name="lab_results" class="form-control"
                                           value="<?php echo htmlspecialchars($param['lab_results']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="lab_results_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['lab_results_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is braden scale completed?</td>
                                <td>
                                    <input type="text" name="pending_investigation" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pending_investigation']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="pending_investigation_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pending_investigation_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is current medication ascertained?</td>
                                <td>
                                    <input type="text" name="medicine_order" class="form-control"
                                           value="<?php echo htmlspecialchars($param['medicine_order']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="medicine_order_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['medicine_order_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is nursing care plan available?</td>
                                <td>
                                    <input type="text" name="facility_communicated" class="form-control"
                                           value="<?php echo htmlspecialchars($param['facility_communicated']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="facility_communicated_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['facility_communicated_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are special instructions documents included?</td>
                                <td>
                                    <input type="text" name="health_education" class="form-control"
                                           value="<?php echo htmlspecialchars($param['health_education']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="health_education_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['health_education_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is discharge note completed?</td>
                                <td>
                                    <input type="text" name="risk_assessment" class="form-control"
                                           value="<?php echo htmlspecialchars($param['risk_assessment']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="risk_assessment_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['risk_assessment_text']); ?>">
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