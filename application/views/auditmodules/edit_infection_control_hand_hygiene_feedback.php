<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_infection_control_hand_hygiene');
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
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp; Hand Hygiene Audit -
                        <?php echo $row->id; ?>
                    </h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_infection_control_hand_hygiene_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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

                        <script>
                            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
                            var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
                        </script>

                        <tr>
                            <td><b>Department</b></td>
                            <td>
                                <select class="form-control" name="department" id="department">
                                    <option value="">Select Department</option>
                                    <?php
                                    $departments = $this->db->get('bf_audit_department')->result_array();
                                    foreach ($departments as $d) {
                                        $selected = (!empty($param['department']) && $param['department'] == $d['title']) ? 'selected' : '';
                                        echo "<option value='{$d['title']}' {$selected}>{$d['title']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Attended Doctor</b></td>
                            <td>
                                <select class="form-control" name="attended_doctor" id="attended_doctor">
                                    <option value="">Select Doctor</option>
                                    <?php
                                    if (!empty($param['department'])) {
                                        $this->db->where('title', $param['department']);
                                        $dept = $this->db->get('bf_audit_department')->row_array();
                                        if (!empty($dept['bed_no'])) {
                                            $doctors = explode(',', $dept['bed_no']);
                                            foreach ($doctors as $doc) {
                                                $doc = trim($doc);
                                                $selected = ($param['attended_doctor'] == $doc) ? 'selected' : '';
                                                echo "<option value='{$doc}' {$selected}>{$doc}</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <script>
                            $(document).ready(function () {
                                $('#department').on('change', function () {
                                    var dept = $(this).val();
                                    $('#attended_doctor').html('<option value="">Loading...</option>');

                                    if (dept) {
                                        $.ajax({
                                            url: "<?php echo base_url('audit/get_doctors_by_department'); ?>",
                                            type: "POST",
                                            dataType: "json", // ✅ Important!
                                            data: {
                                                department: dept,
                                                [csrfName]: csrfHash
                                            },
                                            success: function (res) {
                                                // ✅ Update dropdown with parsed HTML
                                                $('#attended_doctor').html(res.html);

                                                // ✅ Refresh CSRF for next request
                                                csrfName = res.csrfName;
                                                csrfHash = res.csrfHash;
                                            },
                                            error: function (xhr) {
                                                alert('Error fetching doctors: ' + xhr.statusText);
                                            }
                                        });
                                    } else {
                                        $('#attended_doctor').html('<option value="">Select Doctor</option>');
                                    }
                                });
                            });


                        </script>

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
                                    $dischargeDatetime = ''; // Leave empty if no valid value
                                }
                                ?>
                                <input class="form-control datetime-picker" type="datetime-local" id="dischargeDatetime"
                                    name="discharge_date_time" value="<?php echo $dischargeDatetime; ?>"
                                    max="<?php echo date('Y-m-d\TH:i'); ?>">
                            </td>
                        </tr>

                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                // Select all datetime pickers
                                const pickers = document.querySelectorAll(".datetime-picker");

                                pickers.forEach(function (input) {
                                    // Dynamically restrict to current date/time as maximum
                                    input.max = new Date().toISOString().slice(0, 16);

                                    // Auto-open picker on click (modern browsers)
                                    input.addEventListener("click", function () {
                                        if (this.showPicker) this.showPicker();
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
                            <td><b>HH activities Before touching Patient</b></td>
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
                                    <input type="text" class="form-control" name="identification_details_text"
                                        value="<?php echo isset($param['identification_details_text']) ? htmlspecialchars($param['identification_details_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities Before Aseptic Procedure</b></td>
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
                                    <input type="text" class="form-control" name="vital_signs_text"
                                        value="<?php echo isset($param['vital_signs_text']) ? htmlspecialchars($param['vital_signs_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After Blood/Body fluid Exposure</b></td>
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
                                    <input type="text" class="form-control" name="surgery_text"
                                        value="<?php echo isset($param['surgery_text']) ? htmlspecialchars($param['surgery_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After touching patient</b></td>
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
                                    <input type="text" class="form-control" name="intake_text"
                                        value="<?php echo isset($param['intake_text']) ? htmlspecialchars($param['intake_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After Touching patient Surroundings</b></td>
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
                                    <input type="text" class="form-control" name="output_text"
                                        value="<?php echo isset($param['output_text']) ? htmlspecialchars($param['output_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Nurses</th>
                        </tr>

                        <tr>
                            <td><b>HH activities Before touching Patient</b></td>
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
                                    <input type="text" class="form-control" name="focus_text"
                                        value="<?php echo isset($param['focus_text']) ? htmlspecialchars($param['focus_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities Before Aseptic Procedure</b></td>
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
                                    <input type="text" class="form-control" name="meti_text"
                                        value="<?php echo isset($param['meti_text']) ? htmlspecialchars($param['meti_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After Blood/Body fluid Exposure</b></td>
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
                                    <input type="text" class="form-control" name="diagnostic_text"
                                        value="<?php echo isset($param['diagnostic_text']) ? htmlspecialchars($param['diagnostic_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After touching patient</b></td>
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
                                    <input type="text" class="form-control" name="lab_results_text"
                                        value="<?php echo isset($param['lab_results_text']) ? htmlspecialchars($param['lab_results_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After Touching patient Surroundings</b></td>
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
                                    <input type="text" class="form-control" name="pending_investigation_text"
                                        value="<?php echo isset($param['pending_investigation_text']) ? htmlspecialchars($param['pending_investigation_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">GDA</th>
                        </tr>

                        <tr>
                            <td><b>HH activities Before touching Patient</b></td>
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
                                    <input type="text" class="form-control" name="medicine_order_text"
                                        value="<?php echo isset($param['medicine_order_text']) ? htmlspecialchars($param['medicine_order_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After Blood/Body fluid Exposure</b></td>
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
                                    <input type="text" class="form-control" name="psychological_text"
                                        value="<?php echo isset($param['psychological_text']) ? htmlspecialchars($param['psychological_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After touching patient</b></td>
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
                                    <input type="text" class="form-control" name="vulnerab_text"
                                        value="<?php echo isset($param['vulnerab_text']) ? htmlspecialchars($param['vulnerab_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After Touching patient Surroundings</b></td>
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
                                    <input type="text" class="form-control" name="social_text"
                                        value="<?php echo isset($param['social_text']) ? htmlspecialchars($param['social_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Technician</th>
                        </tr>

                        <tr>
                            <td><b>HH activities Before touching Patient</b></td>
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
                                    <input type="text" class="form-control" name="nutri_text"
                                        value="<?php echo isset($param['nutri_text']) ? htmlspecialchars($param['nutri_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities Before Aseptic Procedure</b></td>
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
                                    <input type="text" class="form-control" name="spiritual_text"
                                        value="<?php echo isset($param['spiritual_text']) ? htmlspecialchars($param['spiritual_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After Blood/Body fluid Exposure</b></td>
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
                                    <input type="text" class="form-control" name="suicide_text"
                                        value="<?php echo isset($param['suicide_text']) ? htmlspecialchars($param['suicide_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><b>HH activities After touching patient</b></td>
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
                                    <input type="text" class="form-control" name="risk_text"
                                        value="<?php echo isset($param['risk_text']) ? htmlspecialchars($param['risk_text'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                        placeholder="Remarks">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Touching patient Surroundings</td>
                            <td>
                                <select name="care" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['care'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['care'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['care'] == 'NA')
                                        echo 'selected'; ?>>N/A</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="care_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['care_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Housekeeping</th>
                        </tr>

                        <tr>
                            <td>HH activities Before touching Patient</td>
                            <td>
                                <select name="pfe" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['pfe'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['pfe'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['pfe'] == 'NA')
                                        echo 'selected'; ?>>N/A</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="pfe_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['pfe_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities Before Aseptic Procedure</td>
                            <td>
                                <select name="disch" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['disch'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['disch'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['disch'] == 'NA')
                                        echo 'selected'; ?>>N/A</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="disch_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['disch_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities Before Aseptic Procedure</td>
                            <td>
                                <select name="facility_communicated" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['facility_communicated'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['facility_communicated'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['facility_communicated'] == 'NA')
                                        echo 'selected'; ?>>N/A</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="facility_communicated_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['facility_communicated_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After touching patient</td>
                            <td>
                                <select name="health_education" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['health_education'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['health_education'] == 'No')
                                        echo 'selected'; ?>>
                                        No</option>
                                    <option value="NA" <?php if ($param['health_education'] == 'NA')
                                        echo 'selected'; ?>>
                                        N/A</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="health_education_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['health_education_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Touching patient Surroundings</td>
                            <td>
                                <select name="remarks1" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['remarks1'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['remarks1'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['remarks1'] == 'NA')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="remarks1_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['remarks1_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Physiotherapist</th>
                        </tr>

                        <tr>
                            <td>HH activities Before touching Patient</td>
                            <td>
                                <select name="urethral" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['urethral'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['urethral'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['urethral'] == 'NA')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="urethral_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['urethral_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities Before touching Patient</td>
                            <td>
                                <select name="urine_sample" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['urine_sample'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['urine_sample'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['urine_sample'] == 'NA')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="urine_sample_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['urine_sample_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Blood/Body fluid Exposure</td>
                            <td>
                                <select name="bystander" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['bystander'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['bystander'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['bystander'] == 'NA')
                                        echo 'selected'; ?>>N/A
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="bystander_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['bystander_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After touching patient</td>
                            <td>
                                <select name="instruments" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['instruments'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['instruments'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['instruments'] == 'NA')
                                        echo 'selected'; ?>>NA
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="instruments_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['instruments_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Touching patient Surroundings</td>
                            <td>
                                <select name="sterile" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['sterile'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['sterile'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['sterile'] == 'NA')
                                        echo 'selected'; ?>>NA
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="sterile_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['sterile_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Respiratory Therapist
                            </th>
                        </tr>

                        <tr>
                            <td>HH activities Before touching Patient</td>
                            <td>
                                <select name="antibiotics" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['antibiotics'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['antibiotics'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['antibiotics'] == 'NA')
                                        echo 'selected'; ?>>NA
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="antibiotics_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['antibiotics_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities Before Aseptic Procedure</td>
                            <td>
                                <select name="surgical_site" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['surgical_site'] == 'Yes')
                                        echo 'selected'; ?>>
                                        Yes</option>
                                    <option value="No" <?php if ($param['surgical_site'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['surgical_site'] == 'NA')
                                        echo 'selected'; ?>>NA
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="surgical_site_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['surgical_site_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Blood/Body fluid Exposure</td>
                            <td>
                                <select name="wound" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['wound'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['wound'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['wound'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="wound_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['wound_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After touching patient</td>
                            <td>
                                <select name="documented" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['documented'] == 'Yes')
                                        echo 'selected'; ?>>Yes
                                    </option>
                                    <option value="No" <?php if ($param['documented'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['documented'] == 'NA')
                                        echo 'selected'; ?>>NA
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="documented_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['documented_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Touching patient Surroundings</td>
                            <td>
                                <select name="adequate_facilities" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['adequate_facilities'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['adequate_facilities'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['adequate_facilities'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="adequate_facilities_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['adequate_facilities_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Cardiac Physiotherapist
                            </th>
                        </tr>

                        <tr>
                            <td>HH activities Before touching Patient</td>
                            <td>
                                <select name="sufficient_lighting" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['sufficient_lighting'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['sufficient_lighting'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['sufficient_lighting'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="sufficient_lighting_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['sufficient_lighting_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities Before Aseptic Procedure</td>
                            <td>
                                <select name="storage_facility_for_food" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['storage_facility_for_food'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['storage_facility_for_food'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['storage_facility_for_food'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="storage_facility_for_food_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['storage_facility_for_food_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Blood/Body fluid Exposure</td>
                            <td>
                                <select name="personnel_hygiene_facilities" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['personnel_hygiene_facilities'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['personnel_hygiene_facilities'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['personnel_hygiene_facilities'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="personnel_hygiene_facilities_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['personnel_hygiene_facilities_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After touching patient</td>
                            <td>
                                <select name="food_material_testing" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['food_material_testing'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['food_material_testing'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['food_material_testing'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="food_material_testing_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['food_material_testing_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Touching patient Surroundings</td>
                            <td>
                                <select name="incoming_material" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['incoming_material'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['incoming_material'] == 'No')
                                        echo 'selected'; ?>>
                                        No</option>
                                    <option value="NA" <?php if ($param['incoming_material'] == 'NA')
                                        echo 'selected'; ?>>
                                        NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="incoming_material_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['incoming_material_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">PCS</th>
                        </tr>

                        <tr>
                            <td>HH activities Before touching Patient</td>
                            <td>
                                <select name="raw_materials_inspection" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['raw_materials_inspection'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['raw_materials_inspection'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['raw_materials_inspection'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="raw_materials_inspection_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['raw_materials_inspection_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities Before Aseptic Procedure</td>
                            <td>
                                <select name="storage_of_materials" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['storage_of_materials'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['storage_of_materials'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['storage_of_materials'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="storage_of_materials_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['storage_of_materials_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Blood/Body fluid Exposure</td>
                            <td>
                                <select name="raw_materials_cleaning" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['raw_materials_cleaning'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['raw_materials_cleaning'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['raw_materials_cleaning'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="raw_materials_cleaning_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['raw_materials_cleaning_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After touching patient</td>
                            <td>
                                <select name="equipment_sanitization" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['equipment_sanitization'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['equipment_sanitization'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['equipment_sanitization'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="equipment_sanitization_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['equipment_sanitization_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Touching patient Surroundings</td>
                            <td>
                                <select name="frozen_food_thawing" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['frozen_food_thawing'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['frozen_food_thawing'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['frozen_food_thawing'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="frozen_food_thawing_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['frozen_food_thawing_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Laboratory</th>
                        </tr>

                        <tr>
                            <td>HH activities Before touching Patient</td>
                            <td>
                                <select name="vegetarian_and_non_vegetarian" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['vegetarian_and_non_vegetarian'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['vegetarian_and_non_vegetarian'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['vegetarian_and_non_vegetarian'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="vegetarian_and_non_vegetarian_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['vegetarian_and_non_vegetarian_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities Before Aseptic Procedure</td>
                            <td>
                                <select name="cooked_food_cooling" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['cooked_food_cooling'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['cooked_food_cooling'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['cooked_food_cooling'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="cooked_food_cooling_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['cooked_food_cooling_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Blood/Body fluid Exposure</td>
                            <td>
                                <select name="food_portioning" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['food_portioning'] == 'Yes')
                                        echo 'selected'; ?>>
                                        Yes</option>
                                    <option value="No" <?php if ($param['food_portioning'] == 'No')
                                        echo 'selected'; ?>>No
                                    </option>
                                    <option value="NA" <?php if ($param['food_portioning'] == 'NA')
                                        echo 'selected'; ?>>NA
                                    </option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="food_portioning_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['food_portioning_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After touching patient</td>
                            <td>
                                <select name="ab1" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['ab1'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['ab1'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['ab1'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="ab1_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['ab1_text']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>HH activities After Touching patient Surroundings</td>
                            <td>
                                <select name="ab2" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Yes" <?php if ($param['ab2'] == 'Yes')
                                        echo 'selected'; ?>>Yes</option>
                                    <option value="No" <?php if ($param['ab2'] == 'No')
                                        echo 'selected'; ?>>No</option>
                                    <option value="NA" <?php if ($param['ab2'] == 'NA')
                                        echo 'selected'; ?>>NA</option>
                                </select><br>
                                <strong>Remarks:</strong>
                                <input type="text" name="ab2_text" class="form-control"
                                    value="<?php echo htmlspecialchars($param['ab2_text']); ?>">
                            </td>
                        </tr>


                        <tr>
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">OPD Assistant</th>
                        </tr>
                        <tr>
                            <td>HH activities Before touching Patient</td>
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
                            <td>HH activities Before Aseptic Procedure</td>
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
                            <td>HH activities After Blood/Body fluid Exposure</td>
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
                            <td>HH activities After touching patient</td>
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
                            <td>HH activities After Touching patient Surroundings</td>
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
                            <th colspan="2" style="background-color: #f5f5f5; text-align: left;">Doctors</th>
                        </tr>

                        <tr>
                            <td>HH activities Before touching Patient</td>
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
                            <td>HH activities Before Aseptic Procedure</td>
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
                            <td>HH activities After Blood/Body fluid Exposure</td>
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
                            <td>HH activities After touching patient</td>
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
                            <td>HH activities After Touching patient Surroundings</td>
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