<div class="content">
    <div class="row">
        <!--  form area -->
        <div class="col-sm-12">
            <div class="panel panel-default">

                <div class="panel-heading no-print">
                    <div class="btn-group">
                        <a class="btn btn-success" href="<?php echo base_url("departmentop_location") ?>"> <i
                                class="fa fa-list"></i> List </a>
                    </div>
                </div>

                <div class="panel-body panel-form">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">

                            <?php echo form_open('departmentop_location/create', 'class="form-inner"') ?>

                            <?php echo form_hidden('guid', $department->guid) ?>

                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label">Location Name <i
                                        class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Speciality Name" value="<?php echo $department->title ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label">Speciality</label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="form-control"
                                        placeholder="List of Speciality(Separate using Comma ',')"
                                        rows="7"><?php echo $department->bed_no ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="doctorname" class="col-xs-3 col-form-label">Doctors Name</label>
                                <div class="col-xs-9">
                                    <textarea name="doctorname" class="form-control"
                                        placeholder="List of Doctor(Separate using Comma ',')"
                                        rows="7"><?php echo $department->doctorname ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="unique_link" class="col-xs-3 col-form-label">Unique Links</label>
                                <div class="col-xs-9">
                                    <?php
                                    $base_url = base_url() . "opfb_location_site/?location=";
                                    $encoded_title = rawurlencode($department->title); // Encode location (floor)
                                    
                                    if (!empty($department->bed_no)) {
                                        $bed_numbers = explode(',', $department->title); // Assuming bed_no is a comma-separated string
                                        foreach ($bed_numbers as $bed) {
                                            $encoded_bed = rawurlencode(trim($bed)); // Trim spaces and encode bed number
                                            $unique_link = $base_url . $encoded_title ;
                                            ?>
                                            <input type="text" name="unique_link[]" class="form-control"
                                                value="<?php echo $unique_link; ?>" readonly>
                                            <br>
                                            <?php
                                        }
                                    } else {
                                        // Generate link only based on the location
                                        $unique_link = $base_url . $encoded_title;
                                        ?>
                                        <input type="text" name="unique_link" class="form-control"
                                            value="<?php echo $unique_link; ?>" readonly>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>

                            <?php echo form_close() ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>