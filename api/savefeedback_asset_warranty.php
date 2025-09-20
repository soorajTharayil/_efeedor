<?php
include('db.php');

$d = file_get_contents('php://input');
$data = json_decode($d, true);

// Extract the patient ID and warranty details
$patient_id = $data['patientid'];
$assetWithWarranty = $data['assetWithWarranty'];
$warrantySDate = $data['warrantySDate'];
$warrantyEDate = $data['warrantyEDate'];
$setReminderOne = $data['setReminderOne'];
$setReminderTwo = $data['setReminderTwo'];

if (!empty($patient_id)) {

    $select_query = "SELECT dataset FROM bf_feedback_asset_creation WHERE patientid = '$patient_id'";
    $result = mysqli_query($con, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $dataset = json_decode($row['dataset'], true);

        if (!is_array($dataset)) {
            $dataset = [];
        }

        // Update dataset fields
        $dataset['assetWithWarranty'] = $assetWithWarranty;
        $dataset['warrenty'] = $warrantySDate;
        $dataset['warrenty_end'] = $warrantyEDate;
        $dataset['warranty_alert_1'] = $setReminderOne;
        $dataset['warranty_alert_2'] = $setReminderTwo;


        // Encode dataset back to JSON
        $dataset_json = mysqli_real_escape_string($con, json_encode($dataset));

        // Update database
        $update_query = "UPDATE bf_feedback_asset_creation SET assetWithWarranty = '$assetWithWarranty',  warrenty = '$warrantySDate', warrenty_end = '$warrantyEDate', warranty_alert_1 = '$setReminderOne', warranty_alert_2 = '$setReminderTwo', dataset = '$dataset_json' WHERE patientid = '$patient_id'";

        if (mysqli_query($con, $update_query)) {
            echo json_encode(["status" => "success", "message" => "Warranty details updated successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update warranty details."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Patient ID not found."]);
    }
}

mysqli_close($con);

// Trigger CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $baseurl . 'api/curl.php');
curl_exec($curl);
curl_close($curl);
