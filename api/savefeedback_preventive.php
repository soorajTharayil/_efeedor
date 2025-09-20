<?php
include('db.php');

$d = file_get_contents('php://input');
$data = json_decode($d, true);

// Extract the patient ID and maintenance dates
$patient_id = $data['patientid'];
$assetWithPm = $data['assetWithPm'];

$last_maintenance = $data['lastMaintenance'];
$upcoming_maintenance = $data['upcomingMaintenance'];
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
        $dataset['assetWithPm'] = $assetWithPm;
        $dataset['preventive_maintenance_date'] = $last_maintenance;
        $dataset['upcoming_preventive_maintenance_date'] = $upcoming_maintenance;
        $dataset['reminder_alert_1'] = $setReminderOne;
        $dataset['reminder_alert_2'] = $setReminderTwo;

        // Encode dataset back to JSON
        $dataset_json = mysqli_real_escape_string($con, json_encode($dataset));


        // Patient ID exists, update maintenance dates
        $update_query = " UPDATE bf_feedback_asset_creation SET assetWithPm = '$assetWithPm', preventive_maintenance_date = '$last_maintenance', upcoming_preventive_maintenance_date = '$upcoming_maintenance' , reminder_alert_1 = '$setReminderOne' , reminder_alert_2 = '$setReminderTwo' , dataset = '$dataset_json' WHERE patientid = '$patient_id'";

        if (mysqli_query($con, $update_query)) {
            echo json_encode(["status" => "success", "message" => "Maintenance dates updated successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update maintenance dates."]);
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
