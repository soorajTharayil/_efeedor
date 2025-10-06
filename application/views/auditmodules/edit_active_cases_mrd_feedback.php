<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_active_cases_mrdip');
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
                    <h3><a href="javascript:void()" data-toggle="tooltip"
                            title="<?php echo lang_loader('ip', 'audit_id_tooltip'); ?>">
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp;Active Cases MRD Audit
                        (IP) - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_active_cases_mrd_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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
                                <input class="form-control" type="hidden" name="audit_type"
                                    value="<?php echo $param['audit_type']; ?>" />
                                <input class="form-control" type="hidden" name="datetime"
                                    value="<?php echo $row->datetime; ?>" />
                                <input class="form-control" type="hidden" name="audit_by"
                                    value="<?php echo $param['audit_by']; ?>" />
                            </td>
                        </tr>


                    </table>

                    <table class="table table-striped table-bordered no-footer dtr-inline collapsed">
                        <tr>
                            <td style="width: 43%;"><b>Patient MID</b></td>
                            <td>
                                <input class="form-control" type="text" name="mid_no"
                                    value="<?php echo $param['mid_no']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Patient Name</b></td>
                            <td>
                                <input class="form-control" type="text" name="patient_name"
                                    value="<?php echo $param['patient_name']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Patient Age</b></td>
                            <td>
                                <input class="form-control" type="text" name="patient_age"
                                    value="<?php echo $param['patient_age']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Patient Gender</b></td>
                            <td>
                                <input class="form-control" type="text" name="patient_gender"
                                    value="<?php echo $param['patient_gender']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Area</b></td>
                            <td>
                                <input class="form-control" type="text" name="location"
                                    value="<?php echo $param['location']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Department</b></td>
                            <td>
                                <input class="form-control" type="text" name="department"
                                    value="<?php echo $param['department']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Attended Doctor</b></td>
                            <td>
                                <input class="form-control" type="text" name="attended_doctor"
                                    value="<?php echo $param['attended_doctor']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Admission Date & Time</b></td>
                            <td>
                                <input class="form-control" type="text" name="initial_assessment_hr6"
                                    value="<?php echo $param['initial_assessment_hr6']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Discharge Date & Time</b></td>
                            <td>
                                <input class="form-control" type="text" name="discharge_date_time"
                                    value="<?php echo $param['discharge_date_time']; ?>">
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - Admission note:</th>
                        </tr>


                        <style>
                            td select.form-control+div {
                                margin-top: 10px;
                            }
                        </style>

                        <tr>
                            <td><b>Is the plan of care documented?</b></td>
                            <td>
                                <select class="form-control" name="identification_details">
                                    <option value="" <?php if (empty($param['identification_details']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['identification_details'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['identification_details'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($param['identification_details'] == 'N/A')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="identification_details_text"
                                        value="<?php echo $param['identification_details_text']; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the admitting diagnosis documented?</b></td>
                            <td>
                                <select class="form-control" name="vital_signs">
                                    <option value="" <?php if (empty($param['vital_signs']))
                                        echo 'selected'; ?>>
                                    </option>
                                    <option value="Yes" <?php if ($param['vital_signs'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['vital_signs'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="N/A" <?php if ($param['vital_signs'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="vital_signs_text"
                                        value="<?php echo $param['vital_signs_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are physical examination findings available?</b></td>
                            <td>
                                <select class="form-control" name="surgery">
                                    <option value="" <?php if (empty($param['surgery']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['surgery'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['surgery'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($param['surgery'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="surgery_text"
                                        value="<?php echo $param['surgery_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are present complaints documented?</b></td>
                            <td>
                                <select class="form-control" name="complaints_communicated">
                                    <option value="" <?php if (empty($param['complaints_communicated']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['complaints_communicated'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['complaints_communicated'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($param['complaints_communicated'] == 'N/A')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="complaints_communicated_text"
                                        value="<?php echo $param['complaints_communicated_text']; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the patients history recorded?</b></td>
                            <td>
                                <select class="form-control" name="intake">
                                    <option value="" <?php if (empty($param['intake']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['intake'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['intake'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($param['intake'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="intake_text"
                                        value="<?php echo $param['intake_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the discharge plan documented?</b></td>
                            <td>
                                <select class="form-control" name="output">
                                    <option value="" <?php if (empty($param['output']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['output'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['output'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($param['output'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="output_text"
                                        value="<?php echo $param['output_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is patient-focused evaluation completed?</b></td>
                            <td>
                                <select class="form-control" name="focus">
                                    <option value="" <?php if (empty($param['focus']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['focus'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['focus'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($param['focus'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="focus_text"
                                        value="<?php echo $param['focus_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the patients medication history documented?</b></td>
                            <td>
                                <select class="form-control" name="meti">
                                    <option value="" <?php if (empty($param['meti']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['meti'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['meti'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($param['meti'] == 'N/A')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="meti_text"
                                        value="<?php echo $param['meti_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Nurses documentation - Initial Assessment IPD:</th>
                        </tr>

                        <tr>
                            <td><b>Are the patients needs assessed and documented?</b></td>
                            <td>
                                <select class="form-control" name="diagnostic">
                                    <option value="" <?php if (empty($param['diagnostic']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['diagnostic'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['diagnostic'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="N/A" <?php if ($param['diagnostic'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="diagnostic_text"
                                        value="<?php echo $param['diagnostic_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is pain assessment recorded?</b></td>
                            <td>
                                <select class="form-control" name="lab_results">
                                    <option value="" <?php if (empty($param['lab_results']))
                                        echo 'selected'; ?>>
                                    </option>
                                    <option value="Yes" <?php if ($param['lab_results'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['lab_results'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="N/A" <?php if ($param['lab_results'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="lab_results_text"
                                        value="<?php echo $param['lab_results_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is vulnerability status assessed and documented?</b></td>
                            <td>
                                <select class="form-control" name="pending_investigation">
                                    <option value="" <?php if (empty($param['pending_investigation']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['pending_investigation'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['pending_investigation'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($param['pending_investigation'] == 'N/A')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="pending_investigation_text"
                                        value="<?php echo $param['pending_investigation_text']; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is fall-risk assessment completed?</b></td>
                            <td>
                                <select class="form-control" name="medicine_order">
                                    <option value="" <?php if (empty($param['medicine_order']))
                                        echo 'selected'; ?>>
                                    </option>
                                    <option value="Yes" <?php if ($param['medicine_order'] == 'Yes')
                                        echo 'selected'; ?>>
                                        Yes</option>
                                    <option value="No" <?php if ($param['medicine_order'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="N/A" <?php if ($param['medicine_order'] == 'N/A')
                                        echo 'selected'; ?>>
                                        N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="medicine_order_text"
                                        value="<?php echo $param['medicine_order_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the nursing care plan available?</b></td>
                            <td>
                                <select class="form-control" name="psychological">
                                    <option value="" <?php if (empty($param['psychological']))
                                        echo 'selected'; ?>>
                                    </option>
                                    <option value="Yes" <?php if ($param['psychological'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['psychological'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="N/A" <?php if ($param['psychological'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="psychological_text"
                                        value="<?php echo $param['psychological_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the assessment for suicide and self-harm completed?</b></td>
                            <td>
                                <select class="form-control" name="vulnerab">
                                    <option value="" <?php if (empty($param['vulnerab']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['vulnerab'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['vulnerab'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="N/A" <?php if ($param['vulnerab'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="vulnerab_text"
                                        value="<?php echo $param['vulnerab_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">General dietician documentation:</th>
                        </tr>

                        <tr>
                            <td><b>Is nutritional assessment documented?</b></td>
                            <td>
                                <select class="form-control" name="social">
                                    <option value="" <?php if (empty($param['social']))
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($param['social'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['social'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($param['social'] == 'N/A')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="social_text"
                                        value="<?php echo $param['social_text']; ?>" placeholder="Remarks">
                                </div>
                            </td>
                        </tr>



                        <tr>
                            <td><b>Additional comments</b></td>
                            <td>
                                <input type="text" class="form-control" name="dataAnalysis"
                                    value="<?php echo htmlspecialchars($param['dataAnalysis']); ?>">
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
                                        <button type="submit" id="saveButton" class="ui positive button"
                                            style="text-align: left;">
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
    document.getElementById('saveButton').addEventListener('click', function () {

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