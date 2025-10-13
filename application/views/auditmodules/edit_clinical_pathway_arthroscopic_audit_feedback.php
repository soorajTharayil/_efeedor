<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_clinical_pathway_arthroscopic_audit');
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
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp; Arthroscopic Anterior
                        Cruciate Ligament Reconstruction Surgery - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_clinical_pathway_arthroscopic_audit_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Orthopaedic Assessment
                            </th>
                        </tr>
                        <tr>
                            <td>Orthopaedic assessment</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="identification_details_text"
                                        value="<?php echo isset($param['identification_details_text']) ? htmlspecialchars($param['identification_details_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Admission protocol - Orthopaedic assessment</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="vital_signs_text"
                                        value="<?php echo isset($param['vital_signs_text']) ? htmlspecialchars($param['vital_signs_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Nursing assessment</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="surgery_text"
                                        value="<?php echo isset($param['surgery_text']) ? htmlspecialchars($param['surgery_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Radiology investigation like Knee X ray, Knee MRI, Chest X ray and ECG</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="complaints_communicated_text"
                                        value="<?php echo isset($param['complaints_communicated_text']) ? htmlspecialchars($param['complaints_communicated_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Lab Investigations to be checked for (CBC, RBS, S.creatinine, HIV, HbsAg, HCV)</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="intake_text"
                                        value="<?php echo isset($param['intake_text']) ? htmlspecialchars($param['intake_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Patient educated on the procedure and associated Risks</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="output_text"
                                        value="<?php echo isset($param['output_text']) ? htmlspecialchars($param['output_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Informed Consent for Surgery and/or invasive procedure</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="focus_text"
                                        value="<?php echo isset($param['focus_text']) ? htmlspecialchars($param['focus_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Pre-Anesthetic Checkup
                            </th>
                        </tr>
                        <tr>
                            <td>Anesthesia planned</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="meti_text"
                                        value="<?php echo isset($param['meti_text']) ? htmlspecialchars($param['meti_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Patient Educated on the type of planned anesthesia and the risks associated</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="diagnostic_text"
                                        value="<?php echo isset($param['diagnostic_text']) ? htmlspecialchars($param['diagnostic_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Informed Consent for anesthesia</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="lab_results_text"
                                        value="<?php echo isset($param['lab_results_text']) ? htmlspecialchars($param['lab_results_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Pre-Operative Work Up
                            </th>
                        </tr>

                        <tr>
                            <td>Limb preparation, Chlorhexidine scrub application</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="pending_investigation_text"
                                        value="<?php echo isset($param['pending_investigation_text']) ? htmlspecialchars($param['pending_investigation_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Inform the following personnel (OR In Charge, Anaesthetist)</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="medicine_order_text"
                                        value="<?php echo isset($param['medicine_order_text']) ? htmlspecialchars($param['medicine_order_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">OT Protocol</th>
                        </tr>

                        <tr>
                            <td>Compliance to Handover protocol to the OT nurse</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="psychological_text"
                                        value="<?php echo isset($param['psychological_text']) ? htmlspecialchars($param['psychological_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Pre-op time in</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="vulnerab_text"
                                        value="<?php echo isset($param['vulnerab_text']) ? htmlspecialchars($param['vulnerab_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Induction of Anesthesia</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="social_text"
                                        value="<?php echo isset($param['social_text']) ? htmlspecialchars($param['social_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Pre op antibiotic (Cefuroxime 1.5gm iv 30 minutes before skin incision)</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="nutri_text"
                                        value="<?php echo isset($param['nutri_text']) ? htmlspecialchars($param['nutri_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Intra-op Time out</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="spiritual_text"
                                        value="<?php echo isset($param['spiritual_text']) ? htmlspecialchars($param['spiritual_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Completion of surgical procedure</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="suicide_text"
                                        value="<?php echo isset($param['suicide_text']) ? htmlspecialchars($param['suicide_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Patient shifted to Recovery</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="risk_text"
                                        value="<?php echo isset($param['risk_text']) ? htmlspecialchars($param['risk_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Post Operative</th>
                        </tr>

                        <tr>
                            <td>Continuous monitoring of vital signs</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="care_text"
                                        value="<?php echo isset($param['care_text']) ? htmlspecialchars($param['care_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Pain Assessment</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="pfe_text"
                                        value="<?php echo isset($param['pfe_text']) ? htmlspecialchars($param['pfe_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Analgesics administered as per Doctorâ€™s advice</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="disch_text"
                                        value="<?php echo isset($param['disch_text']) ? htmlspecialchars($param['disch_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Documentation of OT notes and post-op notes</td>
                            <td>
                                <?php $val = isset($param['facility_communicated']) ? strtolower(trim($param['facility_communicated'])) : ''; ?>
                                <select class="form-control" name="facility_communicated">
                                    <option value="" <?php if ($val === '')
                                        echo 'selected'; ?>></option>
                                    <option value="Yes" <?php if ($val === 'yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($val === 'no')
                                        echo 'selected'; ?>>No</option>
                                    <option value="N/A" <?php if ($val === 'n/a')
                                        echo 'selected'; ?>>N/A</option>
                                </select>
                                <div>Remarks:
                                    <input type="text" class="form-control" name="facility_communicated_text"
                                        value="<?php echo isset($param['facility_communicated_text']) ? htmlspecialchars($param['facility_communicated_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Adherence to Recovery shift out criteria</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="health_education_text"
                                        value="<?php echo isset($param['health_education_text']) ? htmlspecialchars($param['health_education_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Instructions to shift patient out of recovery</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="remarks1_text"
                                        value="<?php echo isset($param['remarks1_text']) ? htmlspecialchars($param['remarks1_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Distal Neurovascular assessment</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="urethral_text"
                                        value="<?php echo isset($param['urethral_text']) ? htmlspecialchars($param['urethral_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">To Ward</th>
                        </tr>

                        <tr>
                            <td>Handover from OT nurse to Ward Nurse</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="urine_sample_text"
                                        value="<?php echo isset($param['urine_sample_text']) ? htmlspecialchars($param['urine_sample_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Vital signs monitored four hourly and any abnormal findings reported</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="bystander_text"
                                        value="<?php echo isset($param['bystander_text']) ? htmlspecialchars($param['bystander_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Patient checked for bleeding</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="instruments_text"
                                        value="<?php echo isset($param['instruments_text']) ? htmlspecialchars($param['instruments_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Pain assessment</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="sterile_text"
                                        value="<?php echo isset($param['sterile_text']) ? htmlspecialchars($param['sterile_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Patient advised on oral intake</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="antibiotics_text"
                                        value="<?php echo isset($param['antibiotics_text']) ? htmlspecialchars($param['antibiotics_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Administration of medication as per doctorâ€™s advice</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="surgical_site_text"
                                        value="<?php echo isset($param['surgical_site_text']) ? htmlspecialchars($param['surgical_site_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Physiotherapy as per advice</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="wound_text"
                                        value="<?php echo isset($param['wound_text']) ? htmlspecialchars($param['wound_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Wound dressing checked for oozing and dressing changed after 24 hours</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="documented_text"
                                        value="<?php echo isset($param['documented_text']) ? htmlspecialchars($param['documented_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Discharge Protocol</th>
                        </tr>
                        <tr>
                            <td>Explained when to obtain urgent care for patient</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="adequate_facilities_text"
                                        value="<?php echo isset($param['adequate_facilities_text']) ? htmlspecialchars($param['adequate_facilities_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Discharge instructions explained to the patient including wound care and activities</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="sufficient_lighting_text"
                                        value="<?php echo isset($param['sufficient_lighting_text']) ? htmlspecialchars($param['sufficient_lighting_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>All discharge medications and discharge summary provided to patient</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="storage_facility_for_food_text"
                                        value="<?php echo isset($param['storage_facility_for_food_text']) ? htmlspecialchars($param['storage_facility_for_food_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>All documents and material related to post surgery return to normal life handed over to
                                patient (Including physiotherapy)</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="personnel_hygiene_facilities_text"
                                        value="<?php echo isset($param['personnel_hygiene_facilities_text']) ? htmlspecialchars($param['personnel_hygiene_facilities_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Post-surgery appointment advised</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="food_material_testing_text"
                                        value="<?php echo isset($param['food_material_testing_text']) ? htmlspecialchars($param['food_material_testing_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Follow Up</th>
                        </tr>

                        <tr>
                            <td>Post Operative ROM achieved according to protocol at two week review</td>
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
                                <div>Remarks:
                                    <input type="text" class="form-control" name="incoming_material_text"
                                        value="<?php echo isset($param['incoming_material_text']) ? htmlspecialchars($param['incoming_material_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
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