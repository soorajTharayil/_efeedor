<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_clinical_pathway_stemi_audit');
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
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp; STEMI-Primary PCI Clinical Pathway  - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_clinical_pathway_stemi_audit_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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
                                <th colspan="2" style="background-color: #f5f5f5; text-align: left;">ED Management</th>
                            </tr>
                            <tr>
                                <td>ECG taken within 10 minutes of arrival</td>
                                <td>
                                    <input type="text" name="identification_details" class="form-control" value="<?php echo htmlspecialchars($param['identification_details']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="identification_details_text" class="form-control" value="<?php echo htmlspecialchars($param['identification_details_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Loading dose of aspirin given</td>
                                <td>
                                    <input type="text" name="vital_signs" class="form-control" value="<?php echo htmlspecialchars($param['vital_signs']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="vital_signs_text" class="form-control" value="<?php echo htmlspecialchars($param['vital_signs_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Loading dose of clopidogrel/ ticagrelor given</td>
                                <td>
                                    <input type="text" name="surgery" class="form-control" value="<?php echo htmlspecialchars($param['surgery']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="surgery_text" class="form-control" value="<?php echo htmlspecialchars($param['surgery_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Cath lab team ready within 20 minutes of alerting</td>
                                <td>
                                    <input type="text" name="complaints_communicated" class="form-control" value="<?php echo htmlspecialchars($param['complaints_communicated']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="complaints_communicated_text" class="form-control" value="<?php echo htmlspecialchars($param['complaints_communicated_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Pre-procedure counselling and consent</td>
                                <td>
                                    <input type="text" name="intake" class="form-control" value="<?php echo htmlspecialchars($param['intake']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="intake_text" class="form-control" value="<?php echo htmlspecialchars($param['intake_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Patient preparation</td>
                                <td>
                                    <input type="text" name="output" class="form-control" value="<?php echo htmlspecialchars($param['output']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="output_text" class="form-control" value="<?php echo htmlspecialchars($param['output_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Chest X ray</td>
                                <td>
                                    <input type="text" name="focus" class="form-control" value="<?php echo htmlspecialchars($param['focus']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="focus_text" class="form-control" value="<?php echo htmlspecialchars($param['focus_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Administration of medication as per doctor’s advice</td>
                                <td>
                                    <input type="text" name="meti" class="form-control" value="<?php echo htmlspecialchars($param['meti']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="meti_text" class="form-control" value="<?php echo htmlspecialchars($param['meti_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Cath Lab</th>
                            </tr>
                            <tr>
                                <td>Handover from ED to Cath lab</td>
                                <td>
                                    <input type="text" name="diagnostic" class="form-control" value="<?php echo htmlspecialchars($param['diagnostic']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="diagnostic_text" class="form-control" value="<?php echo htmlspecialchars($param['diagnostic_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Time out before procedure</td>
                                <td>
                                    <input type="text" name="lab_results" class="form-control" value="<?php echo htmlspecialchars($param['lab_results']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="lab_results_text" class="form-control" value="<?php echo htmlspecialchars($param['lab_results_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Door to device time less than 90 minutes</td>
                                <td>
                                    <input type="text" name="pending_investigation" class="form-control" value="<?php echo htmlspecialchars($param['pending_investigation']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="pending_investigation_text" class="form-control" value="<?php echo htmlspecialchars($param['pending_investigation_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Sign out after procedure</td>
                                <td>
                                    <input type="text" name="medicine_order" class="form-control" value="<?php echo htmlspecialchars($param['medicine_order']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="medicine_order_text" class="form-control" value="<?php echo htmlspecialchars($param['medicine_order_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2" style="background-color: #f5f5f5; text-align: left;">CICU</th>
                            </tr>
                            <tr>
                                <td>Hand over from Cath lab to CICU nurse</td>
                                <td>
                                    <input type="text" name="psychological" class="form-control" value="<?php echo htmlspecialchars($param['psychological']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="psychological_text" class="form-control" value="<?php echo htmlspecialchars($param['psychological_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Administration of medication as per doctor’s advice</td>
                                <td>
                                    <input type="text" name="vulnerab" class="form-control" value="<?php echo htmlspecialchars($param['vulnerab']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="vulnerab_text" class="form-control" value="<?php echo htmlspecialchars($param['vulnerab_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Access site assessment</td>
                                <td>
                                    <input type="text" name="social" class="form-control" value="<?php echo htmlspecialchars($param['social']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="social_text" class="form-control" value="<?php echo htmlspecialchars($param['social_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Ward</th>
                            </tr>
                            <tr>
                                <td>Handover from ICU to Ward Nurse</td>
                                <td>
                                    <input type="text" name="nutri" class="form-control" value="<?php echo htmlspecialchars($param['nutri']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="nutri_text" class="form-control" value="<?php echo htmlspecialchars($param['nutri_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Vital signs monitored four hourly</td>
                                <td>
                                    <input type="text" name="spiritual" class="form-control" value="<?php echo htmlspecialchars($param['spiritual']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="spiritual_text" class="form-control" value="<?php echo htmlspecialchars($param['spiritual_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Optimal Treatment as per doctor’s advice</td>
                                <td>
                                    <input type="text" name="suicide" class="form-control" value="<?php echo htmlspecialchars($param['suicide']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="suicide_text" class="form-control" value="<?php echo htmlspecialchars($param['suicide_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Discharge</th>
                            </tr>
                            <tr>
                                <td>Explained when to obtain urgent care for patient</td>
                                <td>
                                    <input type="text" name="risk" class="form-control" value="<?php echo htmlspecialchars($param['risk']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="risk_text" class="form-control" value="<?php echo htmlspecialchars($param['risk_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Discharge instructions explained to the patient</td>
                                <td>
                                    <input type="text" name="care" class="form-control" value="<?php echo htmlspecialchars($param['care']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="care_text" class="form-control" value="<?php echo htmlspecialchars($param['care_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>All discharge medications, discharge summary and procedure related documents provided to patient</td>
                                <td>
                                    <input type="text" name="pfe" class="form-control" value="<?php echo htmlspecialchars($param['pfe']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="pfe_text" class="form-control" value="<?php echo htmlspecialchars($param['pfe_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Diet counselling given</td>
                                <td>
                                    <input type="text" name="disch" class="form-control" value="<?php echo htmlspecialchars($param['disch']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="disch_text" class="form-control" value="<?php echo htmlspecialchars($param['disch_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Pre discharge cardiac rehabilitation/physiotherapy advise given</td>
                                <td>
                                    <input type="text" name="facility_communicated" class="form-control" value="<?php echo htmlspecialchars($param['facility_communicated']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="facility_communicated_text" class="form-control" value="<?php echo htmlspecialchars($param['facility_communicated_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Follow up appointment advised</td>
                                <td>
                                    <input type="text" name="health_education" class="form-control" value="<?php echo htmlspecialchars($param['health_education']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="health_education_text" class="form-control" value="<?php echo htmlspecialchars($param['health_education_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Clinical Outcome</th>
                            </tr>
                            <tr>
                                <td>In hospital mortality</td>
                                <td>
                                    <input type="text" name="remarks1" class="form-control" value="<?php echo htmlspecialchars($param['remarks1']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="remarks1_text" class="form-control" value="<?php echo htmlspecialchars($param['remarks1_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Timi 3 flow?</td>
                                <td>
                                    <input type="text" name="urethral" class="form-control" value="<?php echo htmlspecialchars($param['urethral']); ?>"><br>
                                    <strong>Remarks:</strong>
                                    <input type="text" name="urethral_text" class="form-control" value="<?php echo htmlspecialchars($param['urethral_text']); ?>">
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