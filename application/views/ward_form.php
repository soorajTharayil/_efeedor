<!-- This page is use to Add Ward -->
<div class="content">

    <div class="row">
        <!--  form area start -->
        <div class="col-sm-12">
            <div class="panel panel-default">
                <!--  ward list button start -->
                <div class="panel-heading no-print">
                    <div class="btn-group">
                        <a class="btn btn-success" href="<?php echo base_url("ward") ?>"> <i
                                class="fa fa-list"></i>&nbsp;List</a>
                    </div>
                </div>
                <!--  ward list button end -->

                <div class="panel-body panel-form">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">

                            <?php echo form_open('ward/create', 'class="form-inner"') ?>

                            <?php echo form_hidden('guid', $department->guid) ?>
                            <!-- Ward name start -->
                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label">Floor/ Ward Name<i
                                        class="text-danger">*</i></label>
                                <div class="col-xs-9">
                                    <input name="name" type="text" class="form-control" maxlength="25" id="name"
                                        placeholder="Enter Floor/ Ward Name" value="<?php echo $department->title ?>">
                                </div>
                            </div>
                            <!-- Ward name end -->

                            <!-- list of bed start -->
                            <div class="form-group row">
                                <label for="description" class="col-xs-3 col-form-label">Rooms/ Bed No.'s</label>
                                <div class="col-xs-9">
                                    <textarea name="description" class="form-control"
                                        placeholder="Add list & separate using comma( Ex: 201A, 201B, 202A )"
                                        rows="7"><?php echo $department->bed_no ?></textarea>
                                </div>
                            </div>
                            <!-- list of bed end -->

                            <!-- Short Codestart -->
                            <div class="form-group row">
                                <label for="name" class="col-xs-3 col-form-label">Short Code<i class="text-danger">*</i>
                                    <a href="javascript:void()" data-placement="right" data-toggle="tooltip"
                                        title="These are Short codes used in SMS alerts">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i></a></label>
                                <div class="col-xs-9">
                                    <input name="smallname" maxlength="4" type="text" class="form-control"
                                        id="smallname"
                                        placeholder="Enter Short Codes of Floor/Ward less than 4 characters"
                                        value="<?php echo $department->smallname ?>" required>
                                </div>
                            </div>

                            <!-- Code for Individual Floor/ Site -->
                            <fieldset style="border: 1px solid #ccc; padding: 20px 25px; border-radius: 6px; margin-bottom: 30px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                <legend style="font-weight: 600; font-size: 17px; padding: 0 10px; color: #2c3e50;">For Patient Complaints</legend>
                                <div class="form-group row">
                                    <label for="unique_link" class="col-xs-3 col-form-label">Unique links for Room/ Bed No</label>
                                    <div class="text-right mt-3" style="margin-right: 17px;">
                                        <button type="button" class="btn btn-success" onclick="downloadAllQRCodes()">Download All QR Codes</button>
                                    </div>
                                    <div class="col-xs-9" style="margin-top: 20px;">
                                        <?php
                                        $base_url = base_url() . "pcrf_location_site/?location=";
                                        $encoded_title = rawurlencode($department->title);

                                        $qr_js_data = []; // collect data for JS

                                        if (!empty($department->bed_no)) {
                                            $bed_numbers = explode(',', $department->bed_no);
                                            foreach ($bed_numbers as $bed) {
                                                $encoded_bed = rawurlencode(trim($bed));
                                                $unique_link = $base_url . $encoded_title . "&site=" . $encoded_bed;
                                                $hash_id = md5($unique_link);
                                                $ward = rawurldecode($encoded_title);
                                                $room_no = rawurldecode($encoded_bed);


                                                // Add to array for JS use
                                                $qr_js_data[] = [
                                                    'id' => $hash_id,
                                                    'url' => $unique_link,
                                                    'room' => rawurldecode($encoded_bed),
                                                    'floor' => rawurldecode($encoded_title),
                                                    'filename' => str_replace(' ', '_', rawurldecode($encoded_title . '_' . $encoded_bed))
                                                ];
                                        ?>
                                                <div style="display: flex; gap: 10px; margin-bottom: 5px; align-items: center;">
                                                    <input type="text" name="unique_link[]" class="form-control" value="<?php echo $unique_link; ?>" readonly>
                                                    <button type="button" class="btn btn-sm btn-secondary" onclick="previewQRCode('<?php echo $unique_link; ?>', 'qrcode_<?php echo $hash_id; ?>')">Preview QR</button>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        onclick="downloadQRCode('<?php echo $unique_link; ?>', 'qrcode_<?php echo $hash_id; ?>', 'qrcode_<?php echo $hash_id; ?>.png', '<?php echo $ward; ?>', '<?php echo $room_no; ?>')">
                                                        Download QR
                                                    </button>


                                                </div>
                                                <div id="qrcode_<?php echo $hash_id; ?>" style="margin-bottom: 20px; display: none;"></div>
                                            <?php
                                            }
                                        } else {
                                            $unique_link = $base_url . $encoded_title;
                                            $hash_id = md5($unique_link);
                                            $qr_js_data[] = [
                                                'id' => $hash_id,
                                                'url' => $unique_link,
                                                'filename' => str_replace(' ', '_', rawurldecode($encoded_title . '_' . $encoded_bed))
                                            ];
                                            ?>
                                            <div style="display: flex; gap: 10px; margin-bottom: 5px; align-items: center;">
                                                <input type="text" name="unique_link" class="form-control" value="<?php echo $unique_link; ?>" readonly>
                                                <button type="button" class="btn btn-sm btn-secondary" onclick="previewQRCode('<?php echo $unique_link; ?>', 'qrcode_<?php echo $hash_id; ?>')">Preview QR</button>
                                                <button type="button" class="btn btn-sm btn-primary" onclick="downloadQRCode('<?php echo $unique_link; ?>', 'qrcode_<?php echo $hash_id; ?>')">Download QR</button>
                                            </div>
                                            <div id="qrcode_<?php echo $hash_id; ?>" style="margin-bottom: 20px; display: none;"></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </fieldset>



                            <!-- Code for common QRforms Links-->
                            <fieldset style="border: 1px solid #ccc; padding: 20px 25px; border-radius: 6px; margin-bottom: 30px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                <legend style="font-weight: 600; font-size: 17px; padding: 0 10px; color: #2c3e50;">For Inpatients</legend>
                                <div class="form-group row">
                                    <label for="unique_link" class="col-xs-3 col-form-label">Unique links for Room/ Bed No</label>
                                    <div class="text-right mt-3" style="margin-right: 17px;">
                                        <button type="button" class="btn btn-success" onclick="downloadAllQRCodes()">Download All QR Codes</button>
                                    </div>
                                    <div class="col-xs-9" style="margin-top: 20px;">
                                        <?php
                                        $base_url = base_url() . "qrform_location_site/?location=";
                                        $encoded_title = rawurlencode($department->title);

                                        $qr_js_data = []; // collect data for JS

                                        if (!empty($department->bed_no)) {
                                            $bed_numbers = explode(',', $department->bed_no);
                                            foreach ($bed_numbers as $bed) {
                                                $encoded_bed = rawurlencode(trim($bed));
                                                $unique_link = $base_url . $encoded_title . "&site=" . $encoded_bed;
                                                $hash_id = md5($unique_link);
                                                $ward = rawurldecode($encoded_title);
                                                $room_no = rawurldecode($encoded_bed);


                                                // Add to array for JS use
                                                $qr_js_data[] = [
                                                    'id' => $hash_id,
                                                    'url' => $unique_link,
                                                    'room' => rawurldecode($encoded_bed),
                                                    'floor' => rawurldecode($encoded_title),
                                                    'filename' => str_replace(' ', '_', rawurldecode($encoded_title . '_' . $encoded_bed))
                                                ];
                                        ?>
                                                <div style="display: flex; gap: 10px; margin-bottom: 5px; align-items: center;">
                                                    <input type="text" name="unique_link[]" class="form-control" value="<?php echo $unique_link; ?>" readonly>
                                                    <button type="button" class="btn btn-sm btn-secondary" onclick="previewQRCode('<?php echo $unique_link; ?>', 'qrcode_<?php echo $hash_id; ?>')">Preview QR</button>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        onclick="downloadQRCode('<?php echo $unique_link; ?>', 'qrcode_<?php echo $hash_id; ?>', 'qrcode_<?php echo $hash_id; ?>.png', '<?php echo $ward; ?>', '<?php echo $room_no; ?>')">
                                                        Download QR
                                                    </button>


                                                </div>
                                                <div id="qrcode_<?php echo $hash_id; ?>" style="margin-bottom: 20px; display: none;"></div>
                                            <?php
                                            }
                                        } else {
                                            $unique_link = $base_url . $encoded_title;
                                            $hash_id = md5($unique_link);
                                            $qr_js_data[] = [
                                                'id' => $hash_id,
                                                'url' => $unique_link,
                                                'filename' => str_replace(' ', '_', rawurldecode($encoded_title . '_' . $encoded_bed))
                                            ];
                                            ?>
                                            <div style="display: flex; gap: 10px; margin-bottom: 5px; align-items: center;">
                                                <input type="text" name="unique_link" class="form-control" value="<?php echo $unique_link; ?>" readonly>
                                                <button type="button" class="btn btn-sm btn-secondary" onclick="previewQRCode('<?php echo $unique_link; ?>', 'qrcode_<?php echo $hash_id; ?>')">Preview QR</button>
                                                <button type="button" class="btn btn-sm btn-primary" onclick="downloadQRCode('<?php echo $unique_link; ?>', 'qrcode_<?php echo $hash_id; ?>')">Download QR</button>
                                            </div>
                                            <div id="qrcode_<?php echo $hash_id; ?>" style="margin-bottom: 20px; display: none;"></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </fieldset>





                            <!-- reset and save button start -->
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">

                                    <div class="ui buttons">
                                        <button type="reset" class="ui button"><?php echo display('reset') ?></button>
                                        <div class="or"></div>
                                        <button class="ui positive button"><?php echo display('save') ?></button>
                                    </div>
                                </div>
                            </div>
                            <!-- reset and save button end -->
                            <?php echo form_close() ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- form area stop -->

    </div>
</div>

<script>
    const allQRData = <?php echo json_encode($qr_js_data); ?>;
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
    function previewQRCode(url, elementId) {
        const container = document.getElementById(elementId);
        if (container.style.display === 'block') {
            container.style.display = 'none';
            container.innerHTML = "";
        } else {
            container.style.display = 'block';
            container.innerHTML = "";
            new QRCode(container, {
                text: url,
                width: 128,
                height: 128,
                correctLevel: QRCode.CorrectLevel.H
            });
        }
    }

    function downloadQRCode(url, elementId, fileName = "qrcode.png", wardNumber = "", bedNumber = "") {
        const container = document.getElementById(elementId);
        container.innerHTML = "";

        const qr = new QRCode(container, {
            text: url,
            width: 256,
            height: 256,
            correctLevel: QRCode.CorrectLevel.H
        });

        setTimeout(() => {
            const img = container.querySelector('img');
            if (img) {
                const canvas = document.createElement('canvas');
                const size = 400;
                const extraHeight = 50; // extra white space
                canvas.width = size;
                canvas.height = size + extraHeight;

                const ctx = canvas.getContext('2d');

                // White background
                ctx.fillStyle = "#FFFFFF";
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                const qrImage = new Image();
                qrImage.src = img.src;

                qrImage.onload = function() {
                    // Draw QR
                    const qrSize = size - 2 * 18;
                    const qrX = (size - qrSize) / 2;
                    const qrY = 18;
                    ctx.drawImage(qrImage, qrX, qrY, qrSize, qrSize);

                    ctx.fillStyle = "#000000";
                    ctx.font = "16px Arial";
                    ctx.textAlign = "center";

                    // Line 1: Room/Bed No.
                    ctx.fillText(`Room/ Bed No.: ${bedNumber}`, canvas.width / 2, size + 20);

                    // Line 2: Floor/Ward
                    ctx.fillText(`(${wardNumber})`, canvas.width / 2, size + 38);

                    // Download
                    const link = document.createElement('a');
                    link.href = canvas.toDataURL("image/png");
                    link.download = fileName;
                    link.click();

                    container.innerHTML = "";
                    container.style.display = 'none';
                };
            }
        }, 500);
    }




    function downloadAllQRCodes() {
        allQRData.forEach((item, index) => {
            const tempId = "temp_qr_" + item.id;
            const container = document.createElement("div");
            container.id = tempId;
            container.style.display = "none";
            document.body.appendChild(container);

            const qr = new QRCode(container, {
                text: item.url,
                width: 256,
                height: 256,
                correctLevel: QRCode.CorrectLevel.H
            });

            setTimeout(() => {
                const img = container.querySelector("img");
                if (img) {
                    const canvas = document.createElement("canvas");
                    const size = 400;
                    const margin = 18;

                    canvas.width = size;
                    canvas.height = size;
                    const ctx = canvas.getContext("2d");

                    // White background
                    ctx.fillStyle = "#FFFFFF";
                    ctx.fillRect(0, 0, size, size);

                    const qrImage = new Image();
                    qrImage.src = img.src;

                    qrImage.onload = function() {
                        const canvasHeight = size + 20;
                        canvas.height = canvasHeight;

                        const qrSize = size - 2 * margin - 14;
                        const qrX = (size - qrSize) / 2;
                        const qrY = margin;

                        ctx.fillStyle = "#FFFFFF";
                        ctx.fillRect(0, 0, size, canvasHeight);

                        // Draw QR code
                        ctx.drawImage(qrImage, qrX, qrY, qrSize, qrSize);

                        // Draw text
                        ctx.fillStyle = "#000000";
                        ctx.font = "16px Arial";
                        ctx.textAlign = "center";

                        //Room/Bed No
                        ctx.fillText(`Room/ Bed No.: ${item.room}`, size / 2, size - 10);

                        //Floor
                        ctx.fillText(`(${item.floor})`, size / 2, size + 8);

                        // Download
                        const link = document.createElement("a");
                        link.href = canvas.toDataURL("image/png");
                        link.download = item.filename + ".png";
                        link.click();
                    };


                }

                container.remove();
            }, 400 * (index + 1));
        });
    }
</script>