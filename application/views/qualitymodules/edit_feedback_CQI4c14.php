<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_feedback_CQI4c14');
$results = $query->result();
// print_r($results);
$row = $results[0];
$param = json_decode($row->dataset, true);
?>



<div class="content">
    <div class="row">
        <script src="<?php echo base_url(); ?>assets/Chart.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/utils.js"></script>
        <div class="col-lg-12">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><a href="javascript:void()" data-toggle="tooltip" title="<?php echo lang_loader('ip', 'ip_discharge_feedback_tooltip'); ?>">
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp;Engineering Critical equipment downtime (Engineering & Maintenance)- <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('quality/edit_feedback_CQI4c14_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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
                            <td><b>Sum of down time of all critical equipment</b></td>
                            <td>
                                <div style="display: flex; flex-direction: row; align-items: center; width: 100%;">
                                    <span class="has-float-label" style="display: flex; align-items: center; ">
                                        <input class="form-control" value="<?php echo $param['initial_assessment_hr']; ?>" oninput="restrictToNumerals(event); calculateTime();" type="number" id="formula_para1_hr" style="padding-top: 2px;padding-left: 6px; border: 1px solid grey;margin-top:9px;width: 90%;" />
                                        <input class="form-control" style="display:none" name="initial_assessment_hr" value="<?php echo $param['initial_assessment_hr']; ?>" />
                                        <input class="form-control" style="display:none" name="initial_assessment_min" value="<?php echo $param['initial_assessment_min']; ?>" />
                                        <input class="form-control" style="display:none" name="initial_assessment_sec" value="<?php echo $param['initial_assessment_sec']; ?>" />
                                        <input class="form-control" style="display:none" name="name" value="<?php echo $param['name']; ?>" />
                                        <input class="form-control" style="display:none" name="patientid" value="<?php echo $param['patientid']; ?>" />
                                        <input class="form-control" style="display:none" name="contactnumber" value="<?php echo $param['contactnumber']; ?>" />
                                        <input class="form-control" style="display:none" name="email" value="<?php echo $param['email']; ?>" />
                                        <span style="margin-left: 4px; margin-right: 9px;">hr </span>
                                        <label for="para1"></label>
                                    </span>
                                    <span class="has-float-label" style="display: flex; align-items: center;  ">
                                        <input class="form-control" value="<?php echo $param['initial_assessment_min']; ?>" oninput="restrictToNumerals(event);" type="number" id="formula_para1_min" style="padding-top: 2px;padding-left: 6px; border: 1px solid grey;margin-top:9px;width: 90%;" />
                                        <span style="margin-left: 4px; margin-right: 9px;">min </span>
                                        <label for="para1"></label>
                                    </span>
                                    <span class="has-float-label" style="display: flex; align-items: center; ">
                                        <input class="form-control" value="<?php echo $param['initial_assessment_sec']; ?>" oninput="restrictToNumerals(event);" type="number" id="formula_para1_sec" style="padding-top: 2px;padding-left: 6px; border: 1px solid grey;margin-top:9px;width: 90%;" />
                                        <span style="margin-left: 4px;">sec</span>
                                        <label for="para1"></label>
                                    </span>
                                </div>
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
    var calculationDone = false;

    // Auto calculation when any input changes
    function calculateTime() {
        var hr = parseInt(document.getElementById('formula_para1_hr').value) || 0;
        var min = parseInt(document.getElementById('formula_para1_min').value) || 0;
        var sec = parseInt(document.getElementById('formula_para1_sec').value) || 0;

        // Update hidden inputs
        document.getElementsByName('initial_assessment_hr')[0].value = hr;
        document.getElementsByName('initial_assessment_min')[0].value = min;
        document.getElementsByName('initial_assessment_sec')[0].value = sec;

        calculationDone = true; // mark as completed
    }

    // INPUT listeners
    document.getElementById('formula_para1_hr').addEventListener('input', calculateTime);
    document.getElementById('formula_para1_min').addEventListener('input', calculateTime);
    document.getElementById('formula_para1_sec').addEventListener('input', calculateTime);

    // SAVE button validation
    document.getElementById('saveButton').addEventListener('click', function(event) {
        if (!calculationDone) {
            alert("Please change at least one value (hr/min/sec) before saving.");
            event.preventDefault();
            return false;
        }
    });
</script>