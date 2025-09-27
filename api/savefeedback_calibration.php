<?php
include('db.php');

$d = file_get_contents('php://input');
$data = json_decode($d, true);

// Extract the patient ID and calibration details
$patient_id = $data['patientid'];
$assetWithCalibration = $data['assetWithCalibration'];

$asset_calibration_date = $data['lastCalibrationDate'];
$upcoming_calibration_date = $data['upcomingCalibrationDate'];
$setReminderOne = $data['setReminderOne'];
$setReminderTwo = $data['setReminderTwo'];

if (!empty($patient_id)) {

    // Fetch and decode existing dataset
    $select_query = "SELECT dataset FROM bf_feedback_asset_creation WHERE patientid = '$patient_id'";
    $result = mysqli_query($con, $select_query);
    $existing_dataset = [];

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $existing_dataset = json_decode($row['dataset'], true);
        if (!is_array($existing_dataset)) {
            $existing_dataset = [];
        }
    }

    
    $existing_dataset['assetWithCalibration'] = $assetWithCalibration;
    $existing_dataset['asset_calibration_date'] = $asset_calibration_date;
    $existing_dataset['upcoming_calibration_date'] = $upcoming_calibration_date;
    $existing_dataset['calibration_reminder_alert_1'] = $setReminderOne;
    $existing_dataset['calibration_reminder_alert_2'] = $setReminderTwo;

    // Encode dataset back to JSON
    $dataset_json = mysqli_real_escape_string($con, json_encode($existing_dataset));

    // Update calibration
    $update_query = "UPDATE bf_feedback_asset_creation SET assetWithCalibration = '$assetWithCalibration', asset_calibration_date = '$asset_calibration_date', upcoming_calibration_date = '$upcoming_calibration_date', calibration_reminder_alert_1 = '$setReminderOne', calibration_reminder_alert_2 = '$setReminderTwo', dataset = '$dataset_json' WHERE patientid = '$patient_id'";

    if (mysqli_query($con, $update_query)) {
        echo json_encode(["status" => "success", "message" => "Calibration details updated successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to update calibration details."]);
    }
}

mysqli_close($con);

// Trigger CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $baseurl . 'api/curl.php');
curl_exec($curl);
curl_close($curl);
