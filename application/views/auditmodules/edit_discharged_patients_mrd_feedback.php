<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_dischargedpatients_mrd_audit');
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
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp;Discharged Patients MRD
                        Audit - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_discharged_patients_mrd_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
                    <table class="table table-striped table-bordered  no-footer dtr-inline collapsed">

                        <tr>
                            <td>
                                <b>Audit Details</b>
                            </td>
                            <td style="overflow: clip;">
                                <label><b>Audit Name:</b></label>
                                <input class="form-control" type="text" name="audit_type"
                                    value="<?php echo isset($param['audit_type']) ? htmlspecialchars($param['audit_type'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    readonly>
                                <br>

                                <!-- Date & Time of Audit -->
                                <label><b>Date & Time of Audit:</b></label>
                                <?php
                                $datetimeValue = '';
                                if (!empty($param['datetime']) && $param['datetime'] != '0000-00-00 00:00:00') {
                                    $datetimeValue = date('Y-m-d\TH:i', strtotime($param['datetime'])); // use param datetime
                                }

                                // Set max to current date/time to disable future values
                                $maxDatetime = date('Y-m-d\TH:i');
                                ?>
                                <input class="form-control" type="datetime-local" id="auditDatetime" name="datetime"
                                    value="<?php echo $datetimeValue; ?>" max="<?php echo $maxDatetime; ?>" readonly>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const datetimeInput = document.getElementById("auditDatetime");

                                        // When user clicks anywhere in the input, open the date/time picker
                                        datetimeInput.addEventListener("click", function () {
                                            this.showPicker?.(); // âœ… supported in modern browsers
                                        });

                                        // Prevent future date/time selection dynamically
                                        datetimeInput.max = new Date().toISOString().slice(0, 16);
                                    });
                                </script> <br>
                                <!-- Audit By -->
                                <label><b>Audit By:</b></label>
                                <input class="form-control" type="text" name="audit_by"
                                    value="<?php echo isset($param['audit_by']) ? htmlspecialchars($param['audit_by'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    readonly>

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
                        </tr>
                        <tr>
                            <td><b>Patient Gender</b></td>
                            <td>
                                <select class="form-control" name="patient_gender">
                                    <option value="" <?php if (empty($param['patient_gender']))
                                        echo 'selected'; ?>>
                                    </option>
                                    <option value="Male" <?php if ($param['patient_gender'] == 'Male')
                                        echo 'selected'; ?>>Male</option>
                                    <option value="Female" <?php if ($param['patient_gender'] == 'Female')
                                        echo 'selected'; ?>>Female</option>
                                    <option value="Other" <?php if ($param['patient_gender'] == 'Other')
                                        echo 'selected'; ?>>Other</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Area</b></td>
                            <td>
                                <select class="form-control" name="location">
                                    <option value="">Select Area</option>
                                    <?php
                                    $areas = $this->db->get('bf_audit_area')->result_array();
                                    foreach ($areas as $a) {
                                        $selected = ($param['location'] == $a['title']) ? 'selected' : '';
                                        echo "<option value='{$a['title']}' $selected>{$a['title']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Department</b></td>
                            <td>
                                <select class="form-control" name="department">
                                    <option value="">Select Department</option>
                                    <?php
                                    $departments = $this->db->get('bf_audit_department')->result_array();
                                    foreach ($departments as $d) {
                                        $selected = ($param['department'] == $d['title']) ? 'selected' : '';
                                        echo "<option value='{$d['title']}' $selected>{$d['title']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Attended Doctor</b></td>
                            <td>
                                <select class="form-control" name="attended_doctor">
                                    <option value="">Select Doctor</option>
                                    <?php
                                    $doctors = $this->db->get('bf_audit_doctor')->result_array();
                                    foreach ($doctors as $doc) {
                                        $selected = ($param['attended_doctor'] == $doc['title']) ? 'selected' : '';
                                        echo "<option value='{$doc['title']}' $selected>{$doc['title']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <?php
                        // Common max datetime to disable future selection
                        $maxDatetime = date('Y-m-d\TH:i');
                        ?>

                        <!-- ðŸŸ© Admission Date & Time (Editable) -->
                        <tr>
                            <td><b>Admission Date & Time</b></td>
                            <td>
                                <?php
                                $admissionDatetime = '';
                                if (!empty($param['initial_assessment_hr6']) && $param['initial_assessment_hr6'] != '1970-01-01 05:30:00') {
                                    $admissionDatetime = date('Y-m-d\TH:i', strtotime($param['initial_assessment_hr6']));
                                } else {
                                    $admissionDatetime = $maxDatetime; // Default current date-time
                                }
                                ?>
                                <input class="form-control datetime-picker" type="datetime-local" id="admissionDatetime"
                                    name="initial_assessment_hr6" value="<?php echo $admissionDatetime; ?>"
                                    max="<?php echo $maxDatetime; ?>">
                            </td>
                        </tr>

                        <!-- ðŸŸ© Discharge Date & Time (Editable) -->
                        <tr>
                            <td><b>Discharge Date & Time</b></td>
                            <td>
                                <?php
                                $dischargeDatetime = '';
                                if (!empty($param['discharge_date_time']) && $param['discharge_date_time'] != '1970-01-01 05:30:00') {
                                    $dischargeDatetime = date('Y-m-d\TH:i', strtotime($param['discharge_date_time']));
                                } else {
                                    $dischargeDatetime = $maxDatetime; // Default current date-time
                                }
                                ?>
                                <input class="form-control datetime-picker" type="datetime-local" id="dischargeDatetime"
                                    name="discharge_date_time" value="<?php echo $dischargeDatetime; ?>"
                                    max="<?php echo $maxDatetime; ?>">
                            </td>
                        </tr>

                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                // Select all datetime pickers
                                const pickers = document.querySelectorAll(".datetime-picker");

                                pickers.forEach(function (input) {
                                    // Disable future dates dynamically
                                    input.max = new Date().toISOString().slice(0, 16);

                                    // Open the calendar/time picker when clicking anywhere in the box
                                    input.addEventListener("click", function () {
                                        this.showPicker?.();
                                    });
                                });
                            });
                        </script>

                        <script>
                            // Force open calendar picker when clicking anywhere in the input box
                            document.querySelectorAll('.datetime-picker').forEach(function (input) {
                                input.addEventListener('click', function () {
                                    this.showPicker(); // Opens the native calendar/clock popup
                                });
                            });
                        </script>
                        <style>
                            .datetime-picker {
                                cursor: pointer;
                            }
                        </style>


                        <tr>
                            <th colspan="2">Doctors documentation - Admission note:</th>
                        </tr>
                        <tr>
                            <td><b>Are Present Complaints documented?</b></td>
                            <td>
                                <?php $val = isset($param['identification_details']) ? strtolower(trim($param['identification_details'])) : ''; ?>
                                <select class="form-control" name="identification_details">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="identification_details_text"
                                        value="<?php echo isset($param['identification_details_text']) ? htmlspecialchars($param['identification_details_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Patient History recorded properly?</b></td>
                            <td>
                                <?php $val = isset($param['vital_signs']) ? strtolower(trim($param['vital_signs'])) : ''; ?>
                                <select class="form-control" name="vital_signs">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="vital_signs_text"
                                        value="<?php echo isset($param['vital_signs_text']) ? htmlspecialchars($param['vital_signs_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Clinical Findings noted?</b></td>
                            <td>
                                <?php $val = isset($param['surgery']) ? strtolower(trim($param['surgery'])) : ''; ?>
                                <select class="form-control" name="surgery">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="surgery_text"
                                        value="<?php echo isset($param['surgery_text']) ? htmlspecialchars($param['surgery_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Admitting Diagnosis clearly mentioned?</b></td>
                            <td>
                                <?php $val = isset($param['complaints_communicated']) ? strtolower(trim($param['complaints_communicated'])) : ''; ?>
                                <select class="form-control" name="complaints_communicated">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="complaints_communicated_text"
                                        value="<?php echo isset($param['complaints_communicated_text']) ? htmlspecialchars($param['complaints_communicated_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Plan of Care documented?</b></td>
                            <td>
                                <?php $val = isset($param['intake']) ? strtolower(trim($param['intake'])) : ''; ?>
                                <select class="form-control" name="intake">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="intake_text"
                                        value="<?php echo isset($param['intake_text']) ? htmlspecialchars($param['intake_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Plan for Discharge prepared?</b></td>
                            <td>
                                <?php $val = isset($param['output']) ? strtolower(trim($param['output'])) : ''; ?>
                                <select class="form-control" name="output">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="output_text"
                                        value="<?php echo isset($param['output_text']) ? htmlspecialchars($param['output_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Patient and Family Education (PFE) provided?</b></td>
                            <td>
                                <?php $val = isset($param['focus']) ? strtolower(trim($param['focus'])) : ''; ?>
                                <select class="form-control" name="focus">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="focus_text"
                                        value="<?php echo isset($param['focus_text']) ? htmlspecialchars($param['focus_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Medication History documented accurately?</b></td>
                            <td>
                                <?php $val = isset($param['meti']) ? strtolower(trim($param['meti'])) : ''; ?>
                                <select class="form-control" name="meti">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="meti_text"
                                        value="<?php echo isset($param['meti_text']) ? htmlspecialchars($param['meti_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the use of abbreviations as per guidelines?</b></td>
                            <td>
                                <?php $val = isset($param['diagnostic']) ? strtolower(trim($param['diagnostic'])) : ''; ?>
                                <select class="form-control" name="diagnostic">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="diagnostic_text"
                                        value="<?php echo isset($param['diagnostic_text']) ? htmlspecialchars($param['diagnostic_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <th colspan="2">Doctors documentation - IP notes:</th>
                        </tr>
                        <tr>
                            <td><b>Are Complaints updated in the notes?</b></td>
                            <td>
                                <?php $val = isset($param['lab_results']) ? strtolower(trim($param['lab_results'])) : ''; ?>
                                <select class="form-control" name="lab_results">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="lab_results_text"
                                        value="<?php echo isset($param['lab_results_text']) ? htmlspecialchars($param['lab_results_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Investigation Findings recorded?</b></td>
                            <td>
                                <?php $val = isset($param['pending_investigation']) ? strtolower(trim($param['pending_investigation'])) : ''; ?>
                                <select class="form-control" name="pending_investigation">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="pending_investigation_text"
                                        value="<?php echo isset($param['pending_investigation_text']) ? htmlspecialchars($param['pending_investigation_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Vital signs monitored and documented?</b></td>
                            <td>
                                <?php $val = isset($param['medicine_order']) ? strtolower(trim($param['medicine_order'])) : ''; ?>
                                <select class="form-control" name="medicine_order">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="medicine_order_text"
                                        value="<?php echo isset($param['medicine_order_text']) ? htmlspecialchars($param['medicine_order_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Diagnosis clearly mentioned?</b></td>
                            <td>
                                <?php $val = isset($param['psychological']) ? strtolower(trim($param['psychological'])) : ''; ?>
                                <select class="form-control" name="psychological">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="psychological_text"
                                        value="<?php echo isset($param['psychological_text']) ? htmlspecialchars($param['psychological_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Plan for Care updated?</b></td>
                            <td>
                                <?php $val = isset($param['vulnerab']) ? strtolower(trim($param['vulnerab'])) : ''; ?>
                                <select class="form-control" name="vulnerab">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="vulnerab_text"
                                        value="<?php echo isset($param['vulnerab_text']) ? htmlspecialchars($param['vulnerab_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Discharge Plan communicated?</b></td>
                            <td>
                                <?php $val = isset($param['social']) ? strtolower(trim($param['social'])) : ''; ?>
                                <select class="form-control" name="social">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="social_text"
                                        value="<?php echo isset($param['social_text']) ? htmlspecialchars($param['social_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Patient and Family Education (PFE) provided?</b></td>
                            <td>
                                <?php $val = isset($param['nutri']) ? strtolower(trim($param['nutri'])) : ''; ?>
                                <select class="form-control" name="nutri">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="nutri_text"
                                        value="<?php echo isset($param['nutri_text']) ? htmlspecialchars($param['nutri_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the use of abbreviations as per guidelines?</b></td>
                            <td>
                                <?php $val = isset($param['spiritual']) ? strtolower(trim($param['spiritual'])) : ''; ?>
                                <select class="form-control" name="spiritual">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="spiritual_text"
                                        value="<?php echo isset($param['spiritual_text']) ? htmlspecialchars($param['spiritual_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is 'Copy and Paste' practice avoided?</b></td>
                            <td>
                                <?php $val = isset($param['suicide']) ? strtolower(trim($param['suicide'])) : ''; ?>
                                <select class="form-control" name="suicide">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="suicide_text"
                                        value="<?php echo isset($param['suicide_text']) ? htmlspecialchars($param['suicide_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Critical values identified and actions taken?</b></td>
                            <td>
                                <?php $val = isset($param['risk']) ? strtolower(trim($param['risk'])) : ''; ?>
                                <select class="form-control" name="risk">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="risk_text"
                                        value="<?php echo isset($param['risk_text']) ? htmlspecialchars($param['risk_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Preoperative assessment completed?</b></td>
                            <td>
                                <?php $val = isset($param['care']) ? strtolower(trim($param['care'])) : ''; ?>
                                <select class="form-control" name="care">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="care_text"
                                        value="<?php echo isset($param['care_text']) ? htmlspecialchars($param['care_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - ICU:</th>
                        </tr>

                        <tr>
                            <td><b>Are ICU Initial Notes documented?</b></td>
                            <td>
                                <?php $val = isset($param['pfe']) ? strtolower(trim($param['pfe'])) : ''; ?>
                                <select class="form-control" name="pfe">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="pfe_text"
                                        value="<?php echo isset($param['pfe_text']) ? htmlspecialchars($param['pfe_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are ICU Progress Notes updated?</b></td>
                            <td>
                                <?php $val = isset($param['disch']) ? strtolower(trim($param['disch'])) : ''; ?>
                                <select class="form-control" name="disch">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="disch_text"
                                        value="<?php echo isset($param['disch_text']) ? htmlspecialchars($param['disch_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are ICU Transfer Notes properly filled?</b></td>
                            <td>
                                <?php $val = isset($param['health_education']) ? strtolower(trim($param['health_education'])) : ''; ?>
                                <select class="form-control" name="health_education">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="health_education_text"
                                        value="<?php echo isset($param['health_education_text']) ? htmlspecialchars($param['health_education_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is ICU Handover completed?</b></td>
                            <td>
                                <?php $val = isset($param['remarks1']) ? strtolower(trim($param['remarks1'])) : ''; ?>
                                <select class="form-control" name="remarks1">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="remarks1_text"
                                        value="<?php echo isset($param['remarks1_text']) ? htmlspecialchars($param['remarks1_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Abbreviation use compliant with guidelines?</b></td>
                            <td>
                                <?php $val = isset($param['urethral']) ? strtolower(trim($param['urethral'])) : ''; ?>
                                <select class="form-control" name="urethral">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="urethral_text"
                                        value="<?php echo isset($param['urethral_text']) ? htmlspecialchars($param['urethral_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - Anaesthesia Documents:</th>
                        </tr>
                        <tr>
                            <td><b>Is Pre Anaesthesia Assessment documented?</b></td>
                            <td>
                                <?php $val = isset($param['urine_sample']) ? strtolower(trim($param['urine_sample'])) : ''; ?>
                                <select class="form-control" name="urine_sample">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="urine_sample_text"
                                        value="<?php echo isset($param['urine_sample_text']) ? htmlspecialchars($param['urine_sample_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Pre Anaesthesia Order completed?</b></td>
                            <td>
                                <?php $val = isset($param['bystander']) ? strtolower(trim($param['bystander'])) : ''; ?>
                                <select class="form-control" name="bystander">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="bystander_text"
                                        value="<?php echo isset($param['bystander_text']) ? htmlspecialchars($param['bystander_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Post Procedure Notes - Anaesthesia documented?</b></td>
                            <td>
                                <?php $val = isset($param['instruments']) ? strtolower(trim($param['instruments'])) : ''; ?>
                                <select class="form-control" name="instruments">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="instruments_text"
                                        value="<?php echo isset($param['instruments_text']) ? htmlspecialchars($param['instruments_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Pre-Induction Assessment (PIA) completed?</b></td>
                            <td>
                                <?php $val = isset($param['sterile']) ? strtolower(trim($param['sterile'])) : ''; ?>
                                <select class="form-control" name="sterile">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="sterile_text"
                                        value="<?php echo isset($param['sterile_text']) ? htmlspecialchars($param['sterile_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Plan of Anaesthesia prepared?</b></td>
                            <td>
                                <?php $val = isset($param['antibiotics']) ? strtolower(trim($param['antibiotics'])) : ''; ?>
                                <select class="form-control" name="antibiotics">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="antibiotics_text"
                                        value="<?php echo isset($param['antibiotics_text']) ? htmlspecialchars($param['antibiotics_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Anaesthesia Record complete?</b></td>
                            <td>
                                <?php $val = isset($param['surgical_site']) ? strtolower(trim($param['surgical_site'])) : ''; ?>
                                <select class="form-control" name="surgical_site">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="surgical_site_text"
                                        value="<?php echo isset($param['surgical_site_text']) ? htmlspecialchars($param['surgical_site_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Consent for Anaesthesia obtained?</b></td>
                            <td>
                                <?php $val = isset($param['wound']) ? strtolower(trim($param['wound'])) : ''; ?>
                                <select class="form-control" name="wound">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="wound_text"
                                        value="<?php echo isset($param['wound_text']) ? htmlspecialchars($param['wound_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - Operation Notes:</th>
                        </tr>

                        <tr>
                            <td><b>Is Date & Time of procedure recorded?</b></td>
                            <td>
                                <?php $val = isset($param['documented']) ? strtolower(trim($param['documented'])) : ''; ?>
                                <select class="form-control" name="documented">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="documented_text"
                                        value="<?php echo isset($param['documented_text']) ? htmlspecialchars($param['documented_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Preoperative Assessment documented?</b></td>
                            <td>
                                <?php $val = isset($param['adequate_facilities']) ? strtolower(trim($param['adequate_facilities'])) : ''; ?>
                                <select class="form-control" name="adequate_facilities">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="adequate_facilities_text"
                                        value="<?php echo isset($param['adequate_facilities_text']) ? htmlspecialchars($param['adequate_facilities_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Pre & Post-Operative Diagnosis recorded?</b></td>
                            <td>
                                <?php $val = isset($param['sufficient_lighting']) ? strtolower(trim($param['sufficient_lighting'])) : ''; ?>
                                <select class="form-control" name="sufficient_lighting">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="sufficient_lighting_text"
                                        value="<?php echo isset($param['sufficient_lighting_text']) ? htmlspecialchars($param['sufficient_lighting_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Surgery/Procedure Name documented?</b></td>
                            <td>
                                <?php $val = isset($param['storage_facility_for_food']) ? strtolower(trim($param['storage_facility_for_food'])) : ''; ?>
                                <select class="form-control" name="storage_facility_for_food">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="storage_facility_for_food_text"
                                        value="<?php echo isset($param['storage_facility_for_food_text']) ? htmlspecialchars($param['storage_facility_for_food_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Surgeon & Anaesthetist names recorded?</b></td>
                            <td>
                                <?php $val = isset($param['personnel_hygiene_facilities']) ? strtolower(trim($param['personnel_hygiene_facilities'])) : ''; ?>
                                <select class="form-control" name="personnel_hygiene_facilities">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="personnel_hygiene_facilities_text"
                                        value="<?php echo isset($param['personnel_hygiene_facilities_text']) ? htmlspecialchars($param['personnel_hygiene_facilities_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Scrub Nurse & OT Technician names documented?</b></td>
                            <td>
                                <?php $val = isset($param['food_material_testing']) ? strtolower(trim($param['food_material_testing'])) : ''; ?>
                                <select class="form-control" name="food_material_testing">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="food_material_testing_text"
                                        value="<?php echo isset($param['food_material_testing_text']) ? htmlspecialchars($param['food_material_testing_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Type of Anaesthesia & Position recorded?</b></td>
                            <td>
                                <?php $val = isset($param['incoming_material']) ? strtolower(trim($param['incoming_material'])) : ''; ?>
                                <select class="form-control" name="incoming_material">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="incoming_material_text"
                                        value="<?php echo isset($param['incoming_material_text']) ? htmlspecialchars($param['incoming_material_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Procedure Details documented?</b></td>
                            <td>
                                <?php $val = isset($param['raw_materials_inspection']) ? strtolower(trim($param['raw_materials_inspection'])) : ''; ?>
                                <select class="form-control" name="raw_materials_inspection">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="raw_materials_inspection_text"
                                        value="<?php echo isset($param['raw_materials_inspection_text']) ? htmlspecialchars($param['raw_materials_inspection_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Post-Operative Status & Orders updated?</b></td>
                            <td>
                                <?php $val = isset($param['storage_of_materials']) ? strtolower(trim($param['storage_of_materials'])) : ''; ?>
                                <select class="form-control" name="storage_of_materials">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="storage_of_materials_text"
                                        value="<?php echo isset($param['storage_of_materials_text']) ? htmlspecialchars($param['storage_of_materials_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Are Peri-Operative Complications documented?</b></td>
                            <td>
                                <?php $val = isset($param['raw_materials_cleaning']) ? strtolower(trim($param['raw_materials_cleaning'])) : ''; ?>
                                <select class="form-control" name="raw_materials_cleaning">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="raw_materials_cleaning_text"
                                        value="<?php echo isset($param['raw_materials_cleaning_text']) ? htmlspecialchars($param['raw_materials_cleaning_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the amount of blood loss documented?</b></td>
                            <td>
                                <?php $val = isset($param['equipment_sanitization']) ? strtolower(trim($param['equipment_sanitization'])) : ''; ?>
                                <select class="form-control" name="equipment_sanitization">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="equipment_sanitization_text"
                                        value="<?php echo isset($param['equipment_sanitization_text']) ? htmlspecialchars($param['equipment_sanitization_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the amount of blood transfused recorded?</b></td>
                            <td>
                                <?php $val = isset($param['frozen_food_thawing']) ? strtolower(trim($param['frozen_food_thawing'])) : ''; ?>
                                <select class="form-control" name="frozen_food_thawing">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="frozen_food_thawing_text"
                                        value="<?php echo isset($param['frozen_food_thawing_text']) ? htmlspecialchars($param['frozen_food_thawing_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <th colspan="2">Doctors documentation - Consents:</th>
                        </tr>
                        <tr>
                            <td><b>Is patient identification verified before procedure?</b></td>
                            <td>
                                <?php $val = isset($param['vegetarian_and_non_vegetarian']) ? strtolower(trim($param['vegetarian_and_non_vegetarian'])) : ''; ?>
                                <select class="form-control" name="vegetarian_and_non_vegetarian">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="vegetarian_and_non_vegetarian_text"
                                        value="<?php echo isset($param['vegetarian_and_non_vegetarian_text']) ? htmlspecialchars($param['vegetarian_and_non_vegetarian_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the Name & Type of Anaesthesia documented?</b></td>
                            <td>
                                <?php $val = isset($param['cooked_food_cooling']) ? strtolower(trim($param['cooked_food_cooling'])) : ''; ?>
                                <select class="form-control" name="cooked_food_cooling">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="cooked_food_cooling_text"
                                        value="<?php echo isset($param['cooked_food_cooling_text']) ? htmlspecialchars($param['cooked_food_cooling_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the Name of Surgery/Procedure recorded?</b></td>
                            <td>
                                <?php $val = isset($param['food_portioning']) ? strtolower(trim($param['food_portioning'])) : ''; ?>
                                <select class="form-control" name="food_portioning">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="food_portioning_text"
                                        value="<?php echo isset($param['food_portioning_text']) ? htmlspecialchars($param['food_portioning_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the Doctor and Patient signature obtained?</b></td>
                            <td>
                                <?php $val = isset($param['ab1']) ? strtolower(trim($param['ab1'])) : ''; ?>
                                <select class="form-control" name="ab1">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab1_text"
                                        value="<?php echo isset($param['ab1_text']) ? htmlspecialchars($param['ab1_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Date & Time documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab2']) ? strtolower(trim($param['ab2'])) : ''; ?>
                                <select class="form-control" name="ab2">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab2_text"
                                        value="<?php echo isset($param['ab2_text']) ? htmlspecialchars($param['ab2_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is it ensured that abbreviations are not used?</b></td>
                            <td>
                                <?php $val = isset($param['ab3']) ? strtolower(trim($param['ab3'])) : ''; ?>
                                <select class="form-control" name="ab3">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab3_text"
                                        value="<?php echo isset($param['ab3_text']) ? htmlspecialchars($param['ab3_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Risk, Benefits, and Alternatives documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab4']) ? strtolower(trim($param['ab4'])) : ''; ?>
                                <select class="form-control" name="ab4">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab4_text"
                                        value="<?php echo isset($param['ab4_text']) ? htmlspecialchars($param['ab4_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the legibility of Consent maintained?</b></td>
                            <td>
                                <?php $val = isset($param['ab5']) ? strtolower(trim($param['ab5'])) : ''; ?>
                                <select class="form-control" name="ab5">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab5_text"
                                        value="<?php echo isset($param['ab5_text']) ? htmlspecialchars($param['ab5_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <th colspan="2">Doctors documentation - Cross Consultation:</th>
                        </tr>
                        <tr>
                            <td><b>Is Consultation Request documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab6']) ? strtolower(trim($param['ab6'])) : ''; ?>
                                <select class="form-control" name="ab6">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab6_text"
                                        value="<?php echo isset($param['ab6_text']) ? htmlspecialchars($param['ab6_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Consultation Response documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab7']) ? strtolower(trim($param['ab7'])) : ''; ?>
                                <select class="form-control" name="ab7">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab7_text"
                                        value="<?php echo isset($param['ab7_text']) ? htmlspecialchars($param['ab7_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Has the priority of Consultation been marked?</b></td>
                            <td>
                                <?php $val = isset($param['ab8']) ? strtolower(trim($param['ab8'])) : ''; ?>
                                <select class="form-control" name="ab8">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab8_text"
                                        value="<?php echo isset($param['ab8_text']) ? htmlspecialchars($param['ab8_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - Discharge Summary:</th>
                        </tr>

                        <tr>
                            <td><b>Are DOA, DOD, and DOS recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab9']) ? strtolower(trim($param['ab9'])) : ''; ?>
                                <select class="form-control" name="ab9">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab9_text"
                                        value="<?php echo isset($param['ab9_text']) ? htmlspecialchars($param['ab9_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Diagnosis documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab10']) ? strtolower(trim($param['ab10'])) : ''; ?>
                                <select class="form-control" name="ab10">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab10_text"
                                        value="<?php echo isset($param['ab10_text']) ? htmlspecialchars($param['ab10_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Course in the Hospital recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab11']) ? strtolower(trim($param['ab11'])) : ''; ?>
                                <select class="form-control" name="ab11">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab11_text"
                                        value="<?php echo isset($param['ab11_text']) ? htmlspecialchars($param['ab11_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Cross Consultation (if applicable) documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab12']) ? strtolower(trim($param['ab12'])) : ''; ?>
                                <select class="form-control" name="ab12">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab12_text"
                                        value="<?php echo isset($param['ab12_text']) ? htmlspecialchars($param['ab12_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Discharge Medications & Instructions provided?</b></td>
                            <td>
                                <?php $val = isset($param['ab13']) ? strtolower(trim($param['ab13'])) : ''; ?>
                                <select class="form-control" name="ab13">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab13_text"
                                        value="<?php echo isset($param['ab13_text']) ? htmlspecialchars($param['ab13_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Patient Condition at Discharge recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab14']) ? strtolower(trim($param['ab14'])) : ''; ?>
                                <select class="form-control" name="ab14">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab14_text"
                                        value="<?php echo isset($param['ab14_text']) ? htmlspecialchars($param['ab14_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is 'When to Contact' instruction given?</b></td>
                            <td>
                                <?php $val = isset($param['ab15']) ? strtolower(trim($param['ab15'])) : ''; ?>
                                <select class="form-control" name="ab15">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab15_text"
                                        value="<?php echo isset($param['ab15_text']) ? htmlspecialchars($param['ab15_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Emergency Contact information provided?</b></td>
                            <td>
                                <?php $val = isset($param['ab16']) ? strtolower(trim($param['ab16'])) : ''; ?>
                                <select class="form-control" name="ab16">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab16_text"
                                        value="<?php echo isset($param['ab16_text']) ? htmlspecialchars($param['ab16_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is it ensured that no abbreviations are used?</b></td>
                            <td>
                                <?php $val = isset($param['ab17']) ? strtolower(trim($param['ab17'])) : ''; ?>
                                <select class="form-control" name="ab17">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab17_text"
                                        value="<?php echo isset($param['ab17_text']) ? htmlspecialchars($param['ab17_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Document finalized and signed?</b></td>
                            <td>
                                <?php $val = isset($param['ab18']) ? strtolower(trim($param['ab18'])) : ''; ?>
                                <select class="form-control" name="ab18">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab18_text"
                                        value="<?php echo isset($param['ab18_text']) ? htmlspecialchars($param['ab18_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is ED Initial Assessment completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab19']) ? strtolower(trim($param['ab19'])) : ''; ?>
                                <select class="form-control" name="ab19">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab19_text"
                                        value="<?php echo isset($param['ab19_text']) ? htmlspecialchars($param['ab19_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are ED Transfer Notes documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab20']) ? strtolower(trim($param['ab20'])) : ''; ?>
                                <select class="form-control" name="ab20">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab20_text"
                                        value="<?php echo isset($param['ab20_text']) ? htmlspecialchars($param['ab20_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is the Triage process completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab21']) ? strtolower(trim($param['ab21'])) : ''; ?>
                                <select class="form-control" name="ab21">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab21_text"
                                        value="<?php echo isset($param['ab21_text']) ? htmlspecialchars($param['ab21_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Pre and Post-Operative Checklist completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab22']) ? strtolower(trim($param['ab22'])) : ''; ?>
                                <select class="form-control" name="ab22">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab22_text"
                                        value="<?php echo isset($param['ab22_text']) ? htmlspecialchars($param['ab22_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Surgical Safety Checklist followed?</b></td>
                            <td>
                                <?php $val = isset($param['ab23']) ? strtolower(trim($param['ab23'])) : ''; ?>
                                <select class="form-control" name="ab23">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab23_text"
                                        value="<?php echo isset($param['ab23_text']) ? htmlspecialchars($param['ab23_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Operation Room Count completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab24']) ? strtolower(trim($param['ab24'])) : ''; ?>
                                <select class="form-control" name="ab24">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab24_text"
                                        value="<?php echo isset($param['ab24_text']) ? htmlspecialchars($param['ab24_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is PACU documentation updated?</b></td>
                            <td>
                                <?php $val = isset($param['ab25']) ? strtolower(trim($param['ab25'])) : ''; ?>
                                <select class="form-control" name="ab25">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab25_text"
                                        value="<?php echo isset($param['ab25_text']) ? htmlspecialchars($param['ab25_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Anaesthesia Technician Checklist filled?</b></td>
                            <td>
                                <?php $val = isset($param['ab26']) ? strtolower(trim($param['ab26'])) : ''; ?>
                                <select class="form-control" name="ab26">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab26_text"
                                        value="<?php echo isset($param['ab26_text']) ? htmlspecialchars($param['ab26_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Pain Assessment documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab27']) ? strtolower(trim($param['ab27'])) : ''; ?>
                                <select class="form-control" name="ab27">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab27_text"
                                        value="<?php echo isset($param['ab27_text']) ? htmlspecialchars($param['ab27_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Fall Risk Assessment completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab28']) ? strtolower(trim($param['ab28'])) : ''; ?>
                                <select class="form-control" name="ab28">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab28_text"
                                        value="<?php echo isset($param['ab28_text']) ? htmlspecialchars($param['ab28_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Patient Needs assessed?</b></td>
                            <td>
                                <?php $val = isset($param['ab29']) ? strtolower(trim($param['ab29'])) : ''; ?>
                                <select class="form-control" name="ab29">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab29_text"
                                        value="<?php echo isset($param['ab29_text']) ? htmlspecialchars($param['ab29_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Discharge Planning done?</b></td>
                            <td>
                                <?php $val = isset($param['ab30']) ? strtolower(trim($param['ab30'])) : ''; ?>
                                <select class="form-control" name="ab30">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab30_text"
                                        value="<?php echo isset($param['ab30_text']) ? htmlspecialchars($param['ab30_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Pain Reassessment performed?</b></td>
                            <td>
                                <?php $val = isset($param['ab31']) ? strtolower(trim($param['ab31'])) : ''; ?>
                                <select class="form-control" name="ab31">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab31_text"
                                        value="<?php echo isset($param['ab31_text']) ? htmlspecialchars($param['ab31_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Fall Risk Reassessment documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab32']) ? strtolower(trim($param['ab32'])) : ''; ?>
                                <select class="form-control" name="ab32">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab32_text"
                                        value="<?php echo isset($param['ab32_text']) ? htmlspecialchars($param['ab32_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is End of Life (EOL) care documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab33']) ? strtolower(trim($param['ab33'])) : ''; ?>
                                <select class="form-control" name="ab33">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab33_text"
                                        value="<?php echo isset($param['ab33_text']) ? htmlspecialchars($param['ab33_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Geriatric Assessment completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab34']) ? strtolower(trim($param['ab34'])) : ''; ?>
                                <select class="form-control" name="ab34">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab34_text"
                                        value="<?php echo isset($param['ab34_text']) ? htmlspecialchars($param['ab34_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Psychiatric Assessment documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab35']) ? strtolower(trim($param['ab35'])) : ''; ?>
                                <select class="form-control" name="ab35">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab35_text"
                                        value="<?php echo isset($param['ab35_text']) ? htmlspecialchars($param['ab35_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td><b>Is Chemotherapy Assessment completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab36']) ? strtolower(trim($param['ab36'])) : ''; ?>
                                <select class="form-control" name="ab36">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab36_text"
                                        value="<?php echo isset($param['ab36_text']) ? htmlspecialchars($param['ab36_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Physiotherapy Initial Assessment documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab37']) ? strtolower(trim($param['ab37'])) : ''; ?>
                                <select class="form-control" name="ab37">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab37_text"
                                        value="<?php echo isset($param['ab37_text']) ? htmlspecialchars($param['ab37_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Physiotherapy Progress Notes updated?</b></td>
                            <td>
                                <?php $val = isset($param['ab38']) ? strtolower(trim($param['ab38'])) : ''; ?>
                                <select class="form-control" name="ab38">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab38_text"
                                        value="<?php echo isset($param['ab38_text']) ? htmlspecialchars($param['ab38_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Narcotic Drug Form filled?</b></td>
                            <td>
                                <?php $val = isset($param['ab39']) ? strtolower(trim($param['ab39'])) : ''; ?>
                                <select class="form-control" name="ab39">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab39_text"
                                        value="<?php echo isset($param['ab39_text']) ? htmlspecialchars($param['ab39_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Blood Transfusion Form completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab40']) ? strtolower(trim($param['ab40'])) : ''; ?>
                                <select class="form-control" name="ab40">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab40_text"
                                        value="<?php echo isset($param['ab40_text']) ? htmlspecialchars($param['ab40_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Sedation Assessment performed?</b></td>
                            <td>
                                <?php $val = isset($param['ab41']) ? strtolower(trim($param['ab41'])) : ''; ?>
                                <select class="form-control" name="ab41">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab41_text"
                                        value="<?php echo isset($param['ab41_text']) ? htmlspecialchars($param['ab41_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Reason for Restraint documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab42']) ? strtolower(trim($param['ab42'])) : ''; ?>
                                <select class="form-control" name="ab42">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab42_text"
                                        value="<?php echo isset($param['ab42_text']) ? htmlspecialchars($param['ab42_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Type of Restraint specified?</b></td>
                            <td>
                                <?php $val = isset($param['ab43']) ? strtolower(trim($param['ab43'])) : ''; ?>
                                <select class="form-control" name="ab43">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab43_text"
                                        value="<?php echo isset($param['ab43_text']) ? htmlspecialchars($param['ab43_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Scanned Status uploaded?</b></td>
                            <td>
                                <?php $val = isset($param['ab44']) ? strtolower(trim($param['ab44'])) : ''; ?>
                                <select class="form-control" name="ab44">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab44_text"
                                        value="<?php echo isset($param['ab44_text']) ? htmlspecialchars($param['ab44_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Planned Length of Stay (LOS) documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab45']) ? strtolower(trim($param['ab45'])) : ''; ?>
                                <select class="form-control" name="ab45">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab45_text"
                                        value="<?php echo isset($param['ab45_text']) ? htmlspecialchars($param['ab45_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Actual Length of Stay (LOS) documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab46']) ? strtolower(trim($param['ab46'])) : ''; ?>
                                <select class="form-control" name="ab46">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab46_text"
                                        value="<?php echo isset($param['ab46_text']) ? htmlspecialchars($param['ab46_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Remarks updated?</b></td>
                            <td>
                                <?php $val = isset($param['ab47']) ? strtolower(trim($param['ab47'])) : ''; ?>
                                <select class="form-control" name="ab47">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab47_text"
                                        value="<?php echo isset($param['ab47_text']) ? htmlspecialchars($param['ab47_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Procedure Name recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab48']) ? strtolower(trim($param['ab48'])) : ''; ?>
                                <select class="form-control" name="ab48">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab48_text"
                                        value="<?php echo isset($param['ab48_text']) ? htmlspecialchars($param['ab48_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Date & Time documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab49']) ? strtolower(trim($param['ab49'])) : ''; ?>
                                <select class="form-control" name="ab49">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab49_text"
                                        value="<?php echo isset($param['ab49_text']) ? htmlspecialchars($param['ab49_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Special Issues documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab50']) ? strtolower(trim($param['ab50'])) : ''; ?>
                                <select class="form-control" name="ab50">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab50_text"
                                        value="<?php echo isset($param['ab50_text']) ? htmlspecialchars($param['ab50_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Condition after Procedure recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab51']) ? strtolower(trim($param['ab51'])) : ''; ?>
                                <select class="form-control" name="ab51">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab51_text"
                                        value="<?php echo isset($param['ab51_text']) ? htmlspecialchars($param['ab51_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Post Operative Care Plan documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab52']) ? strtolower(trim($param['ab52'])) : ''; ?>
                                <select class="form-control" name="ab52">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab52_text"
                                        value="<?php echo isset($param['ab52_text']) ? htmlspecialchars($param['ab52_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Nurses Shift record</th>
                        </tr>

                        <tr>
                            <td><b>Is MEWS (Modified Early Warning Score) assessment done?</b></td>
                            <td>
                                <?php $val = isset($param['ab53']) ? strtolower(trim($param['ab53'])) : ''; ?>
                                <select class="form-control" name="ab53">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab53_text"
                                        value="<?php echo isset($param['ab53_text']) ? htmlspecialchars($param['ab53_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is ABC (Airway, Breathing, Circulation) check completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab54']) ? strtolower(trim($param['ab54'])) : ''; ?>
                                <select class="form-control" name="ab54">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab54_text"
                                        value="<?php echo isset($param['ab54_text']) ? htmlspecialchars($param['ab54_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Pain Reassessment performed?</b></td>
                            <td>
                                <?php $val = isset($param['ab55']) ? strtolower(trim($param['ab55'])) : ''; ?>
                                <select class="form-control" name="ab55">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab55_text"
                                        value="<?php echo isset($param['ab55_text']) ? htmlspecialchars($param['ab55_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Lines and Tubes checked and documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab56']) ? strtolower(trim($param['ab56'])) : ''; ?>
                                <select class="form-control" name="ab56">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab56_text"
                                        value="<?php echo isset($param['ab56_text']) ? htmlspecialchars($param['ab56_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Care Bundle followed?</b></td>
                            <td>
                                <?php $val = isset($param['ab57']) ? strtolower(trim($param['ab57'])) : ''; ?>
                                <select class="form-control" name="ab57">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab57_text"
                                        value="<?php echo isset($param['ab57_text']) ? htmlspecialchars($param['ab57_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Nurses Handover</th>
                        </tr>

                        <tr>
                            <td><b>Are Types of Handover documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab58']) ? strtolower(trim($param['ab58'])) : ''; ?>
                                <select class="form-control" name="ab58">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab58_text"
                                        value="<?php echo isset($param['ab58_text']) ? htmlspecialchars($param['ab58_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Date and Time recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab59']) ? strtolower(trim($param['ab59'])) : ''; ?>
                                <select class="form-control" name="ab59">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab59_text"
                                        value="<?php echo isset($param['ab59_text']) ? htmlspecialchars($param['ab59_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Handover Details documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab60']) ? strtolower(trim($param['ab60'])) : ''; ?>
                                <select class="form-control" name="ab60">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab60_text"
                                        value="<?php echo isset($param['ab60_text']) ? htmlspecialchars($param['ab60_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - In-house Transfer:</th>
                        </tr>

                        <tr>
                            <td><b>Is Date and Time recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab61']) ? strtolower(trim($param['ab61'])) : ''; ?>
                                <select class="form-control" name="ab61">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab61_text"
                                        value="<?php echo isset($param['ab61_text']) ? htmlspecialchars($param['ab61_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Reason for Transfer specified?</b></td>
                            <td>
                                <?php $val = isset($param['ab62']) ? strtolower(trim($param['ab62'])) : ''; ?>
                                <select class="form-control" name="ab62">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab62_text"
                                        value="<?php echo isset($param['ab62_text']) ? htmlspecialchars($param['ab62_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Name of Procedure documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab63']) ? strtolower(trim($param['ab63'])) : ''; ?>
                                <select class="form-control" name="ab63">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab63_text"
                                        value="<?php echo isset($param['ab63_text']) ? htmlspecialchars($param['ab63_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are From & To Departments mentioned?</b></td>
                            <td>
                                <?php $val = isset($param['ab64']) ? strtolower(trim($param['ab64'])) : ''; ?>
                                <select class="form-control" name="ab64">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab64_text"
                                        value="<?php echo isset($param['ab64_text']) ? htmlspecialchars($param['ab64_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Handover Details updated?</b></td>
                            <td>
                                <?php $val = isset($param['ab65']) ? strtolower(trim($param['ab65'])) : ''; ?>
                                <select class="form-control" name="ab65">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab65_text"
                                        value="<?php echo isset($param['ab65_text']) ? htmlspecialchars($param['ab65_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Takeover Details recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab66']) ? strtolower(trim($param['ab66'])) : ''; ?>
                                <select class="form-control" name="ab66">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab66_text"
                                        value="<?php echo isset($param['ab66_text']) ? htmlspecialchars($param['ab66_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - Restrain Monitoring:</th>
                        </tr>
                        <tr>
                            <td><b>Is Date and Time documented? (Restrain Monitoring)</b></td>
                            <td>
                                <?php $val = isset($param['ab67']) ? strtolower(trim($param['ab67'])) : ''; ?>
                                <select class="form-control" name="ab67">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab67_text"
                                        value="<?php echo isset($param['ab67_text']) ? htmlspecialchars($param['ab67_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Type of Restraint specified?</b></td>
                            <td>
                                <?php $val = isset($param['ab68']) ? strtolower(trim($param['ab68'])) : ''; ?>
                                <select class="form-control" name="ab68">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab68_text"
                                        value="<?php echo isset($param['ab68_text']) ? htmlspecialchars($param['ab68_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Location documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab69']) ? strtolower(trim($param['ab69'])) : ''; ?>
                                <select class="form-control" name="ab69">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab69_text"
                                        value="<?php echo isset($param['ab69_text']) ? htmlspecialchars($param['ab69_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Reassessment completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab70']) ? strtolower(trim($param['ab70'])) : ''; ?>
                                <select class="form-control" name="ab70">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab70_text"
                                        value="<?php echo isset($param['ab70_text']) ? htmlspecialchars($param['ab70_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Discontinued Details recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab71']) ? strtolower(trim($param['ab71'])) : ''; ?>
                                <select class="form-control" name="ab71">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab71_text"
                                        value="<?php echo isset($param['ab71_text']) ? htmlspecialchars($param['ab71_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Date and Time documented? (Blood Transfusion Record)</b></td>
                            <td>
                                <?php $val = isset($param['ab72']) ? strtolower(trim($param['ab72'])) : ''; ?>
                                <select class="form-control" name="ab72">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab72_text"
                                        value="<?php echo isset($param['ab72_text']) ? htmlspecialchars($param['ab72_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Bag Number documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab73']) ? strtolower(trim($param['ab73'])) : ''; ?>
                                <select class="form-control" name="ab73">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab73_text"
                                        value="<?php echo isset($param['ab73_text']) ? htmlspecialchars($param['ab73_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Date of Expiry mentioned?</b></td>
                            <td>
                                <?php $val = isset($param['ab74']) ? strtolower(trim($param['ab74'])) : ''; ?>
                                <select class="form-control" name="ab74">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab74_text"
                                        value="<?php echo isset($param['ab74_text']) ? htmlspecialchars($param['ab74_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Start and End Date with Time documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab75']) ? strtolower(trim($param['ab75'])) : ''; ?>
                                <select class="form-control" name="ab75">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab75_text"
                                        value="<?php echo isset($param['ab75_text']) ? htmlspecialchars($param['ab75_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Verification Details recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab76']) ? strtolower(trim($param['ab76'])) : ''; ?>
                                <select class="form-control" name="ab76">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab76_text"
                                        value="<?php echo isset($param['ab76_text']) ? htmlspecialchars($param['ab76_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Vitals recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab77']) ? strtolower(trim($param['ab77'])) : ''; ?>
                                <select class="form-control" name="ab77">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab77_text"
                                        value="<?php echo isset($param['ab77_text']) ? htmlspecialchars($param['ab77_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - Endoscopy Flow Sheet:</th>
                        </tr>

                        <tr>
                            <td><b>Is Sign-In Date and Time recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab78']) ? strtolower(trim($param['ab78'])) : ''; ?>
                                <select class="form-control" name="ab78">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab78_text"
                                        value="<?php echo isset($param['ab78_text']) ? htmlspecialchars($param['ab78_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Co-Morbidities documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab79']) ? strtolower(trim($param['ab79'])) : ''; ?>
                                <select class="form-control" name="ab79">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab79_text"
                                        value="<?php echo isset($param['ab79_text']) ? htmlspecialchars($param['ab79_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Time-Out Date and Time documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab80']) ? strtolower(trim($param['ab80'])) : ''; ?>
                                <select class="form-control" name="ab80">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab80_text"
                                        value="<?php echo isset($param['ab80_text']) ? htmlspecialchars($param['ab80_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Patient & Procedure Identification confirmed?</b></td>
                            <td>
                                <?php $val = isset($param['ab81']) ? strtolower(trim($param['ab81'])) : ''; ?>
                                <select class="form-control" name="ab81">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab81_text"
                                        value="<?php echo isset($param['ab81_text']) ? htmlspecialchars($param['ab81_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Sign-Out Date and Time recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab82']) ? strtolower(trim($param['ab82'])) : ''; ?>
                                <select class="form-control" name="ab82">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab82_text"
                                        value="<?php echo isset($param['ab82_text']) ? htmlspecialchars($param['ab82_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Specimen Details documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab83']) ? strtolower(trim($param['ab83'])) : ''; ?>
                                <select class="form-control" name="ab83">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab83_text"
                                        value="<?php echo isset($param['ab83_text']) ? htmlspecialchars($param['ab83_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Transfer Details recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab84']) ? strtolower(trim($param['ab84'])) : ''; ?>
                                <select class="form-control" name="ab84">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab84_text"
                                        value="<?php echo isset($param['ab84_text']) ? htmlspecialchars($param['ab84_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Handover Details updated?</b></td>
                            <td>
                                <?php $val = isset($param['ab85']) ? strtolower(trim($param['ab85'])) : ''; ?>
                                <select class="form-control" name="ab85">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab85_text"
                                        value="<?php echo isset($param['ab85_text']) ? htmlspecialchars($param['ab85_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <th colspan="2">Doctors documentation - Surgical Safety Checklist (OT/Outside OT):</th>
                        </tr>
                        <tr>
                            <td><b>Is Sign-In Date and Time recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab86']) ? strtolower(trim($param['ab86'])) : ''; ?>
                                <select class="form-control" name="ab86">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab86_text"
                                        value="<?php echo isset($param['ab86_text']) ? htmlspecialchars($param['ab86_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Identification Details documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab87']) ? strtolower(trim($param['ab87'])) : ''; ?>
                                <select class="form-control" name="ab87">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab87_text"
                                        value="<?php echo isset($param['ab87_text']) ? htmlspecialchars($param['ab87_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Time-Out Date and Time recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab88']) ? strtolower(trim($param['ab88'])) : ''; ?>
                                <select class="form-control" name="ab88">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab88_text"
                                        value="<?php echo isset($param['ab88_text']) ? htmlspecialchars($param['ab88_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Confirmation by Team done?</b></td>
                            <td>
                                <?php $val = isset($param['ab89']) ? strtolower(trim($param['ab89'])) : ''; ?>
                                <select class="form-control" name="ab89">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab89_text"
                                        value="<?php echo isset($param['ab89_text']) ? htmlspecialchars($param['ab89_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Sign-Out Date and Time recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab90']) ? strtolower(trim($param['ab90'])) : ''; ?>
                                <select class="form-control" name="ab90">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab90_text"
                                        value="<?php echo isset($param['ab90_text']) ? htmlspecialchars($param['ab90_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Count and Specimen details documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab100']) ? strtolower(trim($param['ab100'])) : ''; ?>
                                <select class="form-control" name="ab100">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab100_text"
                                        value="<?php echo isset($param['ab100_text']) ? htmlspecialchars($param['ab100_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Transfer Details recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab101']) ? strtolower(trim($param['ab101'])) : ''; ?>
                                <select class="form-control" name="ab101">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab101_text"
                                        value="<?php echo isset($param['ab101_text']) ? htmlspecialchars($param['ab101_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Handover Details documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab102']) ? strtolower(trim($param['ab102'])) : ''; ?>
                                <select class="form-control" name="ab102">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab102_text"
                                        value="<?php echo isset($param['ab102_text']) ? htmlspecialchars($param['ab102_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - Sedation Monitoring Form:</th>
                        </tr>

                        <tr>
                            <td><b>Is Mallampati Score recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab103']) ? strtolower(trim($param['ab103'])) : ''; ?>
                                <select class="form-control" name="ab103">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab103_text"
                                        value="<?php echo isset($param['ab103_text']) ? htmlspecialchars($param['ab103_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is ASA classification documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab104']) ? strtolower(trim($param['ab104'])) : ''; ?>
                                <select class="form-control" name="ab104">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab104_text"
                                        value="<?php echo isset($param['ab104_text']) ? htmlspecialchars($param['ab104_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Intra-Procedural Vitals monitored and recorded?</b></td>
                            <td>
                                <?php $val = isset($param['ab105']) ? strtolower(trim($param['ab105'])) : ''; ?>
                                <select class="form-control" name="ab105">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab105_text"
                                        value="<?php echo isset($param['ab105_text']) ? htmlspecialchars($param['ab105_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Post-Sedation Vitals documented?</b></td>
                            <td>
                                <?php $val = isset($param['ab106']) ? strtolower(trim($param['ab106'])) : ''; ?>
                                <select class="form-control" name="ab106">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab106_text"
                                        value="<?php echo isset($param['ab106_text']) ? htmlspecialchars($param['ab106_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Discharge Note completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab107']) ? strtolower(trim($param['ab107'])) : ''; ?>
                                <select class="form-control" name="ab107">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab107_text"
                                        value="<?php echo isset($param['ab107_text']) ? htmlspecialchars($param['ab107_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - Stroke Forms:</th>
                        </tr>

                        <tr>
                            <td><b>Is Stroke Timeline entry completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab108']) ? strtolower(trim($param['ab108'])) : ''; ?>
                                <select class="form-control" name="ab108">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab108_text"
                                        value="<?php echo isset($param['ab108_text']) ? htmlspecialchars($param['ab108_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is NIHSS score documented in initial notes (ED/IP)?</b></td>
                            <td>
                                <?php $val = isset($param['ab109']) ? strtolower(trim($param['ab109'])) : ''; ?>
                                <select class="form-control" name="ab109">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab109_text"
                                        value="<?php echo isset($param['ab109_text']) ? htmlspecialchars($param['ab109_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Initial GRBS documented at admission?</b></td>
                            <td>
                                <?php $val = isset($param['ab110']) ? strtolower(trim($param['ab110'])) : ''; ?>
                                <select class="form-control" name="ab110">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab110_text"
                                        value="<?php echo isset($param['ab110_text']) ? htmlspecialchars($param['ab110_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Consent forms for IV Thrombolysis / Mechanical Thrombectomy completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab111']) ? strtolower(trim($param['ab111'])) : ''; ?>
                                <select class="form-control" name="ab111">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab111_text"
                                        value="<?php echo isset($param['ab111_text']) ? htmlspecialchars($param['ab111_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Informed Refusal form documented (if applicable)?</b></td>
                            <td>
                                <?php $val = isset($param['ab112']) ? strtolower(trim($param['ab112'])) : ''; ?>
                                <select class="form-control" name="ab112">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab112_text"
                                        value="<?php echo isset($param['ab112_text']) ? htmlspecialchars($param['ab112_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Post-Thrombolysis Monitoring form completed?</b></td>
                            <td>
                                <?php $val = isset($param['ab113']) ? strtolower(trim($param['ab113'])) : ''; ?>
                                <select class="form-control" name="ab113">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab113_text"
                                        value="<?php echo isset($param['ab113_text']) ? htmlspecialchars($param['ab113_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Does the record contain admission reasons, assessments, diagnosis, investigations,
                                    procedures, monitoring, and care details?</b></td>
                            <td>
                                <?php $val = isset($param['ab114']) ? strtolower(trim($param['ab114'])) : ''; ?>
                                <select class="form-control" name="ab114">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab114_text"
                                        value="<?php echo isset($param['ab114_text']) ? htmlspecialchars($param['ab114_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is documentation provided if an eligible ischemic stroke patient did not receive IV
                                    thrombolytic therapy?</b></td>
                            <td>
                                <?php $val = isset($param['ab115']) ? strtolower(trim($param['ab115'])) : ''; ?>
                                <select class="form-control" name="ab115">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab115_text"
                                        value="<?php echo isset($param['ab115_text']) ? htmlspecialchars($param['ab115_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Pre-morbid mRS documented in all initial IP notes?</b></td>
                            <td>
                                <?php $val = isset($param['ab116']) ? strtolower(trim($param['ab116'])) : ''; ?>
                                <select class="form-control" name="ab116">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab116_text"
                                        value="<?php echo isset($param['ab116_text']) ? htmlspecialchars($param['ab116_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are key infection control indicators defined and measured (Hand Hygiene, CAUTI,
                                    CLABSI, VAP, SSI)?</b></td>
                            <td>
                                <?php $val = isset($param['ab117']) ? strtolower(trim($param['ab117'])) : ''; ?>
                                <select class="form-control" name="ab117">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab117_text"
                                        value="<?php echo isset($param['ab117_text']) ? htmlspecialchars($param['ab117_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are all assessments documented and signed/authenticated by staff?</b></td>
                            <td>
                                <?php $val = isset($param['ab118']) ? strtolower(trim($param['ab118'])) : ''; ?>
                                <select class="form-control" name="ab118">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab118_text"
                                        value="<?php echo isset($param['ab118_text']) ? htmlspecialchars($param['ab118_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Do assessments result in appropriate care/monitoring plans that are documented?</b>
                            </td>
                            <td>
                                <?php $val = isset($param['ab119']) ? strtolower(trim($param['ab119'])) : ''; ?>
                                <select class="form-control" name="ab119">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab119_text"
                                        value="<?php echo isset($param['ab119_text']) ? htmlspecialchars($param['ab119_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Dysphagia Screening documented before starting oral feeds?</b></td>
                            <td>
                                <?php $val = isset($param['ab120']) ? strtolower(trim($param['ab120'])) : ''; ?>
                                <select class="form-control" name="ab120">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab120_text"
                                        value="<?php echo isset($param['ab120_text']) ? htmlspecialchars($param['ab120_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Nutritional Screening documented for all patients?</b></td>
                            <td>
                                <?php $val = isset($param['ab121']) ? strtolower(trim($param['ab121'])) : ''; ?>
                                <select class="form-control" name="ab121">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab121_text"
                                        value="<?php echo isset($param['ab121_text']) ? htmlspecialchars($param['ab121_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Is Care guided by functional assessment and periodic reassessments documented?</b>
                            </td>
                            <td>
                                <?php $val = isset($param['ab122']) ? strtolower(trim($param['ab122'])) : ''; ?>
                                <select class="form-control" name="ab122">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab122_text"
                                        value="<?php echo isset($param['ab122_text']) ? htmlspecialchars($param['ab122_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are Assessments completed within 24 hours of admission or once patient is stable?</b>
                            </td>
                            <td>
                                <?php $val = isset($param['ab123']) ? strtolower(trim($param['ab123'])) : ''; ?>
                                <select class="form-control" name="ab123">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab123_text"
                                        value="<?php echo isset($param['ab123_text']) ? htmlspecialchars($param['ab123_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Does the Discharge/Treatment summary include instructions for urgent care?</b></td>
                            <td>
                                <?php $val = isset($param['ab124']) ? strtolower(trim($param['ab124'])) : ''; ?>
                                <select class="form-control" name="ab124">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab124_text"
                                        value="<?php echo isset($param['ab124_text']) ? htmlspecialchars($param['ab124_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Are NIHSS / mRS scores documented at discharge?</b></td>
                            <td>
                                <?php $val = isset($param['ab125']) ? strtolower(trim($param['ab125'])) : ''; ?>
                                <select class="form-control" name="ab125">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab125_text"
                                        value="<?php echo isset($param['ab125_text']) ? htmlspecialchars($param['ab125_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>In case of death, does the record include a Death Summary?</b></td>
                            <td>
                                <?php $val = isset($param['ab126']) ? strtolower(trim($param['ab126'])) : ''; ?>
                                <select class="form-control" name="ab126">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab126_text"
                                        value="<?php echo isset($param['ab126_text']) ? htmlspecialchars($param['ab126_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Doctors documentation - Closed Audit Checklist:</th>
                        </tr>

                        <tr>
                            <td><b>Is there missing or incomplete documentation related to Medico-Legal Case (MLC)?</b>
                            </td>
                            <td>
                                <?php $val = isset($param['ab127']) ? strtolower(trim($param['ab127'])) : ''; ?>
                                <select class="form-control" name="ab127">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>
                                    Remarks:
                                    <input class="form-control" type="text" name="ab127_text"
                                        value="<?php echo isset($param['ab127_text']) ? htmlspecialchars($param['ab127_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Uploaded Files</b></td>
                            <td>
                                <?php
                                // $param = json_decode($record->dataset, true);
                                $existingFiles = !empty($param['files_name']) ? $param['files_name'] : [];
                                ?>

                                <!-- 🗂 Existing Files Section -->
                                <div id="existing-files">
                                    <?php if (!empty($existingFiles)) { ?>
                                        <!-- <label><b>Current Files:</b></label> -->
                                        <ul id="file-list" style="list-style-type:none; padding-left:0;">
                                            <?php foreach ($existingFiles as $index => $file) { ?>
                                                <li data-index="<?php echo $index; ?>"
                                                    style="margin-bottom:6px; background:#f8f9fa; padding:6px 10px; border-radius:6px; display:flex; align-items:center; justify-content:space-between;">
                                                    <a href="<?php echo htmlspecialchars($file['url']); ?>" target="_blank"
                                                        style="text-decoration:none; color:#007bff;">
                                                        <?php echo htmlspecialchars($file['name']); ?>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger remove-file"
                                                        style="margin-left:10px; padding:2px 6px; font-size:12px;">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } else { ?>
                                        <p id="no-files">No files uploaded</p>
                                    <?php } ?>
                                </div>

                                <!-- 📤 Dynamic Upload Inputs -->
                                <div class="form-group" id="upload-container" style="margin-top:10px;">
                                    <label><b>Add New Files:</b></label>
                                    <div class="upload-row"
                                        style="display:flex; align-items:center; margin-bottom:6px;">
                                        <input type="file" name="uploaded_files[]" class="form-control upload-input"
                                            style="flex:1; margin-right:10px;">
                                        <button type="button" class="btn btn-danger btn-sm remove-upload"
                                            style="display:none;">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- ➕ Add More Files Button -->
                                <button type="button" id="add-more-files" class="btn btn-sm btn-success"
                                    style="margin-top:5px;">
                                    <i class="fa fa-plus"></i> Add More Files
                                </button>

                                <!-- Hidden input for removed old files -->
                                <input type="hidden" name="remove_files_json" id="remove_files_json" value="">
                            </td>
                        </tr>
<script>
                            document.addEventListener("DOMContentLoaded", function () {

                                // 🗑️ Handle removing existing old files
                                const removeInput = document.getElementById("remove_files_json");
                                let removedIndexes = [];

                                document.querySelectorAll(".remove-file").forEach(btn => {
                                    btn.addEventListener("click", function () {
                                        const li = this.closest("li");
                                        const index = li.getAttribute("data-index");
                                        removedIndexes.push(index);
                                        removeInput.value = JSON.stringify(removedIndexes);
                                        li.remove();
                                        if (document.querySelectorAll("#file-list li").length === 0) {
                                            document.getElementById("existing-files").innerHTML = "<p id='no-files'>No files uploaded</p>";
                                        }
                                    });
                                });

                                // ➕ Dynamic "Add More Files"
                                const addMoreBtn = document.getElementById("add-more-files");
                                const uploadContainer = document.getElementById("upload-container");

                                addMoreBtn.addEventListener("click", function () {
                                    const newRow = document.createElement("div");
                                    newRow.className = "upload-row";
                                    newRow.style.cssText = "display:flex; align-items:center; margin-bottom:6px;";

                                    const input = document.createElement("input");
                                    input.type = "file";
                                    input.name = "uploaded_files[]";
                                    input.className = "form-control upload-input";
                                    input.style.cssText = "flex:1; margin-right:10px;";

                                    const removeBtn = document.createElement("button");
                                    removeBtn.type = "button";
                                    removeBtn.className = "btn btn-danger btn-sm remove-upload";
                                    removeBtn.innerHTML = '<i class="fa fa-times"></i>';
                                    removeBtn.addEventListener("click", function () {
                                        newRow.remove();
                                    });
                                    removeBtn.style.display = "inline-block";

                                    newRow.appendChild(input);
                                    newRow.appendChild(removeBtn);
                                    uploadContainer.appendChild(newRow);
                                });
                            });
                        </script>












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