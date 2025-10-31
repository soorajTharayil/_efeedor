<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_bmw_audit');
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
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp; Biomedical Waste Collection Audit
                         - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_bmw_audit_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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
                        <!-- Staff Information -->
                        <tr>
                        	<th colspan="2" style="background-color: #f5f5f5; text-align: left;">Staff Information</th>
                        </tr>
                        
                        <!-- Department -->
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
                        
                        <!-- Area -->
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
                        
                        <!-- Staff MID -->
                        <tr>
                        	<td><b>Staff MID</b></td>
                        	<td>
                        		<input class="form-control" type="text" name="mid_no"
                        			value="<?php echo htmlspecialchars($param['mid_no']); ?>">
                        	</td>
                        </tr>
                        
                        <!-- Officer Name -->
                        <tr>
                        	<td><b>Officer Name</b></td>
                        	<td>
                        		<input class="form-control" type="text" name="patient_name"
                        			value="<?php echo htmlspecialchars($param['patient_name']); ?>">
                        	</td>
                        </tr>
                        
                        <!-- Supervisor Name -->
                        <tr>
                        	<td><b>Supervisor Name</b></td>
                        	<td>
                        		<input class="form-control" type="text" name="supervisor_name"
                        			value="<?php echo htmlspecialchars($param['supervisor_name']); ?>">
                        	</td>
                        </tr>
                        
                        <!-- Driver Name -->
                        <tr>
                        	<td><b>Driver Name</b></td>
                        	<td>
                        		<input class="form-control" type="text" name="driver_name"
                        			value="<?php echo htmlspecialchars($param['driver_name']); ?>">
                        	</td>
                        </tr>
                        
                        <!-- Picker Name -->
                        <tr>
                        	<td><b>Picker Name</b></td>
                        	<td>
                        		<input class="form-control" type="text" name="picker_name"
                        			value="<?php echo htmlspecialchars($param['picker_name']); ?>">
                        	</td>
                        </tr>


                      

                      

                       




                        <tr>
                            <td><b>No. of Yellow Bags</b></td>
                            <td>
                                <input class="form-control" type="number" name="yellow_bags"
                                    value="<?php echo isset($param['yellow_bags']) ? htmlspecialchars($param['yellow_bags'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    placeholder="Enter No. of Yellow Bags" min="0">
                            </td>
                        </tr>
                        
                        <tr>
                            <td><b>No. of Red Bags</b></td>
                            <td>
                                <input class="form-control" type="number" name="red_bags"
                                    value="<?php echo isset($param['red_bags']) ? htmlspecialchars($param['red_bags'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    placeholder="Enter No. of Red Bags" min="0">
                            </td>
                        </tr>
                        
                        <tr>
                            <td><b>No. of White Bags</b></td>
                            <td>
                                <input class="form-control" type="number" name="white_bags"
                                    value="<?php echo isset($param['white_bags']) ? htmlspecialchars($param['white_bags'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    placeholder="Enter No. of White Bags" min="0">
                            </td>
                        </tr>
                        
                        <tr>
                            <td><b>No. of Brownish Yellow Bags</b></td>
                            <td>
                                <input class="form-control" type="number" name="brownish_yellow_bags"
                                    value="<?php echo isset($param['brownish_yellow_bags']) ? htmlspecialchars($param['brownish_yellow_bags'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    placeholder="Enter No. of Brownish Yellow Bags" min="0">
                            </td>
                        </tr>
                        
                        <tr>
                            <td><b>No. of Blue Bags</b></td>
                            <td>
                                <input class="form-control" type="number" name="blue_bags"
                                    value="<?php echo isset($param['blue_bags']) ? htmlspecialchars($param['blue_bags'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    placeholder="Enter No. of Blue Bags" min="0">
                            </td>
                        </tr>
                        
                        <tr>
                            <td><b>Total Bags</b></td>
                            <td>
                                <input class="form-control" type="number" name="total_bags"
                                    value="<?php echo isset($param['total_bags']) ? htmlspecialchars($param['total_bags'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    placeholder="Auto Calculated" readonly
                                    style="background-color:#f8f8f8;">
                            </td>
                        </tr>
                        
                        <tr>
                            <td><b>Total Bags Processed</b></td>
                            <td>
                                <input class="form-control" type="number" name="total_bags_processed"
                                    value="<?php echo isset($param['total_bags_processed']) ? htmlspecialchars($param['total_bags_processed'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    placeholder="Enter Total Bags Processed" min="0">
                            </td>
                        </tr>
                        
                        <tr>
                            <td><b>Total Quantity (Kg)</b></td>
                            <td>
                                <input class="form-control" type="number" step="0.1" name="total_quantity"
                                    value="<?php echo isset($param['total_quantity']) ? htmlspecialchars($param['total_quantity'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                                    placeholder="Enter Total Quantity (Kg)" min="0">
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