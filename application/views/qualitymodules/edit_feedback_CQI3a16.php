<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_feedback_CQI3a16');
$results = $query->result();
// print_r($results);
$row = $results[0];
$param = json_decode($row->dataset, true);
//  print_r($param);
?>



<div class="content">
    <div class="row">

        <div class="col-lg-12">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><a href="javascript:void()" data-toggle="tooltip" title="<?php echo lang_loader('ip', 'ip_discharge_feedback_tooltip'); ?>">
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp;Percentage of bronchiolitis patients treated inappropriately (Pediatrics)- <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('quality/edit_feedback_CQI3a16_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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

                    <table class="table table-striped table-bordered no-footer dtr-inline collapsed">
                        <tr>
                            <td><b>Number of patients treated inappropriately</b></td>
                            <td>
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <span class="has-float-label" style="display: flex; align-items: center; ">
                                        <input class="form-control" value="<?php echo $param['initial_assessment_hr']; ?>" name="initial_assessment_hr" oninput="restrictToNumerals(event); calculateErrorRate();" type="number" id="reportingErrors" style="padding-top: 2px; padding-left: 6px; margin-top:9px;" />
                                        <span style="margin-left: 4px; margin-right: 9px;"></span>
                                        <label for="reportingErrors"></label>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Total number of patients with bronchiolitis</b></td>
                            <td>
                                <input class="form-control" type="number" id="testsPerformed" name="total_admission" value="<?php echo $param['total_admission']; ?>">
                                <br>
                                <button type="button" class="btn btn-primary" onclick="calculateErrorRate()">
                                    <input type="hidden" id="formattedTime" name="formattedTime" value="">
                                    Compute KPI
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Percentage of bronchiolitis patients treated inappropriately (Pediatrics)</b></td>
                            <td>
                                <input class="form-control" type="text" id="calculatedResult" name="calculatedResult" value="<?php echo $param['calculatedResult']; ?>">
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
    // Initialize flags to track if values have been edited and if calculation is done
    var valuesEdited = false;
    var calculationDone = false;

    // Function to call when values are edited
    function onValuesEdited() {
        valuesEdited = true;
        calculationDone = false; // Reset calculation flag when values are edited
    }

    // Add event listeners to input elements to call the onValuesEdited function
    document.getElementById('reportingErrors').addEventListener('input', onValuesEdited);
    document.getElementById('testsPerformed').addEventListener('input', onValuesEdited);

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
    document.querySelector('button[onclick="calculateErrorRate()"]').addEventListener('click', calculateErrorRate);

    function calculateErrorRate() {
        var reportingErrors = parseInt(document.getElementById('reportingErrors').value);

        // Get the number of tests performed from the input field
        var testsPerformed = parseInt(document.getElementById('testsPerformed').value);

        document.querySelector('input[name="initial_assessment_hr"]').value = reportingErrors;
        document.querySelector('input[name="total_admission"]').value = testsPerformed;


        // Validate inputs for reporting errors and tests performed
        if (isNaN(reportingErrors) || reportingErrors < 0) {
            alert("Please enter the number of reporting errors.");
            return;
        }

        if (isNaN(testsPerformed) || testsPerformed <= 0) {
            alert("Please enter the number of tests performed.");
            return;
        }

        if (reportingErrors > testsPerformed) {
            alert("The no. of reporting errors must be less than the no. of tests performed.");
            return;
        }

        // Calculate the number of reporting errors per 1000 investigations
        var errorsPerThousand = (reportingErrors / testsPerformed) * 1000;

        // Format the result to have two decimal places for better readability
        var formattedResult = errorsPerThousand.toFixed(2);

        document.getElementById('calculatedResult').value = formattedResult;

        console.log("Calculated result:", formattedResult);
        calculationDone = true;

    }
</script>