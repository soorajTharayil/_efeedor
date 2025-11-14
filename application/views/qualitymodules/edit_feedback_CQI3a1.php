<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_feedback_CQI3a1');
$results = $query->result();
// print_r($results);
$row = $results[0];
$param = json_decode($row->dataset, true);
// echo '<pre>';
// print_r($param);
// echo '</pre>';
// exit;
?>




<div class="content">
    <div class="row">
        <script src="<?php echo base_url(); ?>assets/Chart.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/utils.js"></script>
        <div class="col-lg-12">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><a href="javascript:void()" data-toggle="tooltip" title="<?php echo lang_loader('ip', 'ip_discharge_feedback_tooltip'); ?>">
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp;Average Time for initial assessment of in-patients (Doctors)-(MRD-ICU) - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('quality/edit_feedback_CQI3a1_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
                    <table class="table table-striped table-bordered  no-footer dtr-inline collapsed">
                        <tr>
                            <td><b>KPI Recorded By</b></td>
                            <td>
                                <?php echo isset($param['name']) ? $param['name'] : ''; ?>,
                                <?php echo isset($param['patientid']) ? $param['patientid'] : ''; ?>

                                <!-- Hidden inputs to submit values -->
                                <input type="hidden" name="name" value="<?php echo isset($param['name']) ? $param['name'] : ''; ?>" />
                                <input type="hidden" name="patientid" value="<?php echo isset($param['patientid']) ? $param['patientid'] : ''; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td><b>KPI Recorded On</b></td>
                            <td>
                                <?php
                                echo !empty($row->datetime)
                                    ? date('g:i a, d-M-Y', strtotime($row->datetime))
                                    : '';
                                ?>
                                <input type="hidden" name="dataCollected" value="<?php echo htmlspecialchars($row->datetime ?? ''); ?>">
                            </td>
                        </tr>



                    </table>

                    <table class="table table-striped table-bordered  no-footer dtr-inline collapsed">
                        <tr>
                            <td><b>Sum of time taken for assessment in patients </b></td>
                            <td>
                                <div style="display: flex; flex-direction: row; align-items: center; width: 100%;">
                                    <span class="has-float-label" style="display: flex; align-items: center;">
                                        <input class="form-control" value="<?php echo $param['initial_assessment_hr']; ?>"
                                            oninput="restrictToNumerals(event);"
                                            type="number" id="formula_para1_hr"
                                            style="padding-top: 2px;padding-left: 6px; border: 1px solid grey;margin-top:9px;width: 90%;" />
                                        <input class="form-control" style="display:none" name="initial_assessment_hr" value="<?php echo $param['initial_assessment_hr']; ?>" />
                                        <input class="form-control" style="display:none" name="initial_assessment_min" value="<?php echo $param['initial_assessment_min']; ?>" />
                                        <input class="form-control" style="display:none" name="initial_assessment_sec" value="<?php echo $param['initial_assessment_sec']; ?>" />
                                        <span style="margin-left: 4px; margin-right: 9px;">hr </span>
                                    </span>
                                    <span class="has-float-label" style="display: flex; align-items: center;">
                                        <input class="form-control" value="<?php echo $param['initial_assessment_min']; ?>"
                                            oninput="restrictToNumerals(event);"
                                            type="number" id="formula_para1_min"
                                            style="padding-top: 2px;padding-left: 6px; border: 1px solid grey;margin-top:9px;width: 90%;" />
                                        <span style="margin-left: 4px; margin-right: 9px;">min </span>
                                    </span>
                                    <span class="has-float-label" style="display: flex; align-items: center;">
                                        <input class="form-control" value="<?php echo $param['initial_assessment_sec']; ?>"
                                            oninput="restrictToNumerals(event);"
                                            type="number" id="formula_para1_sec"
                                            style="padding-top: 2px;padding-left: 6px; border: 1px solid grey;margin-top:9px;width: 90%;" />
                                        <span style="margin-left: 4px;">sec</span>
                                    </span>
                                </div>
                                <!-- Hidden input to store formatted time -->
                                <input type="hidden" name="time_taken_initial_assessment" id="formattedTime" value="<?php echo $param['time_taken_initial_assessment']; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td><b>Total number of in-patients</b></td>
                            <td>
                                <input class="form-control" type="text" id="total_admission" name="total_admission" value="<?php echo $param['total_admission']; ?>">
                                <br>
                                <button type="button" class="btn btn-primary" onclick="calculateTime()">
                                    Compute KPI
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Avg.Time for initial assessment of in-patients (Doctors)- (MRD-ICU) is:</b></td>
                            <td>
                                <input class="form-control" type="text" id="calculatedResult" name="calculatedResult" value="<?php echo $param['calculatedResult']; ?>">
                            </td>
                        </tr>


                        <tr>
                            <td><b>Bench Mark Time</b></td>
                            <td><span style="margin: 10px;"><?php echo $param['benchmark']; ?></span>
                                <input class="form-control" style="display:none" name="benchmark" value="<?php echo $param['benchmark']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>Data analysis (RCA, Reason for Variation etc.)</b></td>
                            <td><input class="form-control" type="text" name="dataAnalysis" value="<?php echo $param['dataAnalysis']; ?>"></td>
                        </tr>
                        <tr>
                            <td><b>Corrective action</b></td>
                            <td><input class="form-control" type="text" name="correctiveAction" value="<?php echo $param['correctiveAction']; ?>"></td>
                        </tr>
                        <tr>
                            <td><b>Preventive action</b></td>
                            <td><input class="form-control" type="text" name="preventiveAction" value="<?php echo $param['preventiveAction']; ?>"></td>
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
                            document.addEventListener("DOMContentLoaded", function() {

                                // 🗑️ Handle removing existing old files
                                const removeInput = document.getElementById("remove_files_json");
                                let removedIndexes = [];

                                document.querySelectorAll(".remove-file").forEach(btn => {
                                    btn.addEventListener("click", function() {
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

                                addMoreBtn.addEventListener("click", function() {
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
                                    removeBtn.addEventListener("click", function() {
                                        newRow.remove();
                                    });
                                    removeBtn.style.display = "inline-block";

                                    newRow.appendChild(input);
                                    newRow.appendChild(removeBtn);
                                    uploadContainer.appendChild(newRow);
                                });
                            });
                        </script>
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
    // Flags to track edits and calculation
    var valuesEdited = false;
    var calculationDone = false;

    // Called when user edits any input
    function onValuesEdited() {
        valuesEdited = true;
        calculationDone = false;
    }

    // Add event listeners for edits
    document.getElementById('formula_para1_hr').addEventListener('input', onValuesEdited);
    document.getElementById('formula_para1_min').addEventListener('input', onValuesEdited);
    document.getElementById('formula_para1_sec').addEventListener('input', onValuesEdited);
    document.getElementById('total_admission').addEventListener('input', onValuesEdited);

    // Check before saving
    function checkValuesBeforeSubmit(event) {
        if (valuesEdited && !calculationDone) {
            alert('Please calculate before saving');
            event.preventDefault(); // stop form submission
            return false;
        }
        return true;
    }

    // Save button listener
    document.getElementById('saveButton').addEventListener('click', function(event) {
        if (checkValuesBeforeSubmit(event)) {
            console.log('Data saved successfully.');
            // Submit form or AJAX here
        }
    });




    // Time related Calculation function
    function calculateTime() {

        // Get numerator values
        var hr = document.getElementById('formula_para1_hr').value.trim();
        var min = document.getElementById('formula_para1_min').value.trim();
        var sec = document.getElementById('formula_para1_sec').value.trim();

        // Get denominator value
        var totalAdmissions = document.getElementById('total_admission').value.trim();

        // ⭐ NUMERATOR VALIDATION (All empty)
        if ((hr === "" || isNaN(hr)) &&
            (min === "" || isNaN(min)) &&
            (sec === "" || isNaN(sec))) {

            alert("Please enter Sum of time taken for initial assessment of in-patients in MRD-ICU");
            return; // stop calculation
        }

        // ⭐ DENOMINATOR VALIDATION
        if (totalAdmissions === "" || isNaN(totalAdmissions)) {
            alert("Please enter Total number of in-patients");
            return; // stop calculation
        }

        // Convert values (empty values become 0)
        hr = parseInt(hr) || 0;
        min = parseInt(min) || 0;
        sec = parseInt(sec) || 0;
        totalAdmissions = parseInt(totalAdmissions);

        // Update hidden fields
        document.querySelector('input[name="initial_assessment_hr"]').value = hr;
        document.querySelector('input[name="initial_assessment_min"]').value = min;
        document.querySelector('input[name="initial_assessment_sec"]').value = sec;

        // Format time
        var timeString = `${('0'+hr).slice(-2)}:${('0'+min).slice(-2)}:${('0'+sec).slice(-2)}`;
        document.getElementById('formattedTime').value = timeString;

        // Calculate average per admission
        var totalSeconds = hr * 3600 + min * 60 + sec;
        var averageSeconds = totalAdmissions === 0 ? 0 : totalSeconds / totalAdmissions;

        var avgHours = Math.floor(averageSeconds / 3600);
        var remainingSeconds = averageSeconds % 3600;
        var avgMinutes = Math.floor(remainingSeconds / 60);
        var avgSeconds = Math.floor(remainingSeconds % 60);

        document.getElementById('calculatedResult').value =
            `${('0'+avgHours).slice(-2)}:${('0'+avgMinutes).slice(-2)}:${('0'+avgSeconds).slice(-2)}`;
        calculationDone = true;
        valuesEdited = false;
    }




    // Time related Calculation function end




    function restrictToNumerals(event) {
        const inputElement = event.target;
        let currentValue = inputElement.value;

        // Allow only digits and a single decimal point
        let filteredValue = currentValue
            .replace(/[^0-9.]/g, '') // Remove anything except digits and '.'
            .replace(/(\..*?)\./g, '$1'); // Keep only the first '.'

        // Prevent leading zeros before decimal (e.g., 00.5 → 0.5)
        if (filteredValue.startsWith('00')) {
            filteredValue = filteredValue.replace(/^0+/, '0');
        }

        // Update only if changed
        if (currentValue !== filteredValue) {
            inputElement.value = filteredValue;
        }
    }
</script>