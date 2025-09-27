<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_icu_closed_mdc');
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
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp; Clinicians–ICU (Closed) - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_icu_closed_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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
                                <th colspan="2">Consents</th>
                            </tr>
                            
                            <tr>
                                <td>Is the Consent form for ICU admission available in the health record of an inpatient?</td>
                                <td>
                                    <input type="text" name="identification_details" class="form-control"
                                           value="<?php echo htmlspecialchars($param['identification_details']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="identification_details_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['identification_details_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Consent form for ICU admission complete?</td>
                                <td>
                                    <input type="text" name="vital_signs" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vital_signs']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="vital_signs_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vital_signs_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the procedures consent form (includes surgical or invasive procedures) available in the health record of an applicable patient?</td>
                                <td>
                                    <input type="text" name="surgery" class="form-control"
                                           value="<?php echo htmlspecialchars($param['surgery']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="surgery_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['surgery_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are the risks, benefits, potential complications and alternatives to surgery explained and fully documented on consent form (includes surgical or invasive procedures)?</td>
                                <td>
                                    <input type="text" name="complaints_communicated" class="form-control"
                                           value="<?php echo htmlspecialchars($param['complaints_communicated']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="complaints_communicated_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['complaints_communicated_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the signature of patient or representative, witness, and individual obtaining consent obtained?</td>
                                <td>
                                    <input type="text" name="ensure" class="form-control"
                                           value="<?php echo htmlspecialchars($param['ensure']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="ensure_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['ensure_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the administration of anesthesia/sedation consent form available in the health record of an applicable patient?</td>
                                <td>
                                    <input type="text" name="intake" class="form-control"
                                           value="<?php echo htmlspecialchars($param['intake']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="intake_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['intake_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is it ensured that No abbreviations are used on consent forms?</td>
                                <td>
                                    <input type="text" name="output" class="form-control"
                                           value="<?php echo htmlspecialchars($param['output']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="output_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['output_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2">ICU documents</th>
                            </tr>
                            
                            <tr>
                                <td>Is the Initial assessment completed within 2 hours of admission to ICU?</td>
                                <td>
                                    <input type="text" name="focus" class="form-control"
                                           value="<?php echo htmlspecialchars($param['focus']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="focus_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['focus_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the patient's name and health record number, correct?</td>
                                <td>
                                    <input type="text" name="meti" class="form-control"
                                           value="<?php echo htmlspecialchars($param['meti']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="meti_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['meti_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Blood Investigation section completed correctly, if applicable?</td>
                                <td>
                                    <input type="text" name="diagnostic" class="form-control"
                                           value="<?php echo htmlspecialchars($param['diagnostic']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="diagnostic_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['diagnostic_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Known Allergies section completed correctly?</td>
                                <td>
                                    <input type="text" name="lab_results" class="form-control"
                                           value="<?php echo htmlspecialchars($param['lab_results']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="lab_results_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['lab_results_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Medication section completed correctly?</td>
                                <td>
                                    <input type="text" name="pending_investigation" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pending_investigation']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="pending_investigation_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pending_investigation_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are only approved abbreviations used?</td>
                                <td>
                                    <input type="text" name="medicine_order" class="form-control"
                                           value="<?php echo htmlspecialchars($param['medicine_order']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="medicine_order_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['medicine_order_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are the Chief complaints and history documented in Initial assessment?</td>
                                <td>
                                    <input type="text" name="psychological" class="form-control"
                                           value="<?php echo htmlspecialchars($param['psychological']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="psychological_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['psychological_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the medication history documented in initial assessment?</td>
                                <td>
                                    <input type="text" name="vulnerab" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vulnerab']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="vulnerab_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vulnerab_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are the clinical findings and diagnosis documented In Initial assessment?</td>
                                <td>
                                    <input type="text" name="social" class="form-control"
                                           value="<?php echo htmlspecialchars($param['social']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="social_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['social_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the medical assessment documented prior to surgery?</td>
                                <td>
                                    <input type="text" name="nutri" class="form-control"
                                           value="<?php echo htmlspecialchars($param['nutri']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="nutri_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['nutri_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Patient and Family Education documented?</td>
                                <td>
                                    <input type="text" name="spiritual" class="form-control"
                                           value="<?php echo htmlspecialchars($param['spiritual']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="spiritual_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['spiritual_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the patient reassessed daily?</td>
                                <td>
                                    <input type="text" name="suicide" class="form-control"
                                           value="<?php echo htmlspecialchars($param['suicide']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="suicide_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['suicide_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the diagnosis documented in Progress Note?</td>
                                <td>
                                    <input type="text" name="risk" class="form-control"
                                           value="<?php echo htmlspecialchars($param['risk']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="risk_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['risk_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are the clinical findings and status documented in Progress Note?</td>
                                <td>
                                    <input type="text" name="care" class="form-control"
                                           value="<?php echo htmlspecialchars($param['care']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="care_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['care_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Planned care documented in the form of measurable progress (goals)?</td>
                                <td>
                                    <input type="text" name="pfe" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pfe']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="pfe_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pfe_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is Planned Care reviewed by other disciplines?</td>
                                <td>
                                    <input type="text" name="disch" class="form-control"
                                           value="<?php echo htmlspecialchars($param['disch']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="disch_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['disch_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the handover communication documented in every shift?</td>
                                <td>
                                    <input type="text" name="facility_communicated" class="form-control"
                                           value="<?php echo htmlspecialchars($param['facility_communicated']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="facility_communicated_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['facility_communicated_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the care team note documented, if applicable?</td>
                                <td>
                                    <input type="text" name="health_education" class="form-control"
                                           value="<?php echo htmlspecialchars($param['health_education']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="health_education_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['health_education_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the ICU transfer record documented, if applicable?</td>
                                <td>
                                    <input type="text" name="remarks1" class="form-control"
                                           value="<?php echo htmlspecialchars($param['remarks1']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="remarks1_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['remarks1_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the critical care note documented, if applicable?</td>
                                <td>
                                    <input type="text" name="urethral" class="form-control"
                                           value="<?php echo htmlspecialchars($param['urethral']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="urethral_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['urethral_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the restrain order documented, if applicable?</td>
                                <td>
                                    <input type="text" name="urine_sample" class="form-control"
                                           value="<?php echo htmlspecialchars($param['urine_sample']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="urine_sample_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['urine_sample_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the restrain consent form obtained, if applicable?</td>
                                <td>
                                    <input type="text" name="bystander" class="form-control"
                                           value="<?php echo htmlspecialchars($param['bystander']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="bystander_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['bystander_text']); ?>">
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