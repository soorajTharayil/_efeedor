<?php
include('db.php');

$d = file_get_contents('php://input');
$data = json_decode($d, true);

// Extract the patient ID and contract type
$patient_id = $data['patientid'];
$assetWithAmc = $data['assetWithAmc'];
$contract = $data['contract'];

// Separate fields for AMC and CMC
$amc_start_date = $data['amcStartDate'];
$amc_end_date = $data['amcEndDate'];
$amc_service_charges = $data['amcServiceCharges'];
$setAmcReminderOne = $data['setAmcReminderOne'];
$setAmcReminderTwo = $data['setAmcReminderTwo'];


$cmc_start_date = $data['cmcStartDate'];
$cmc_end_date = $data['cmcEndDate'];
$cmc_service_charges = $data['cmcServiceCharges'];
$setCmcReminderOne = $data['setCmcReminderOne'];
$setCmcReminderTwo = $data['setCmcReminderTwo'];

if (!empty($patient_id)) {
    
    $update_contract_type_query = "UPDATE bf_feedback_asset_creation SET assetWithAmc = '$assetWithAmc', contract = '$contract' WHERE patientid = '$patient_id'";

    if (mysqli_query($con, $update_contract_type_query)) {

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

        // Add new contract data
        $existing_dataset['contract'] = $contract;

        if ($contract === 'AMC') {
            $existing_dataset['amcStartDate'] = $amc_start_date;
            $existing_dataset['amcEndDate'] = $amc_end_date;
            $existing_dataset['amcServiceCharges'] = $amc_service_charges;
            $existing_dataset['setAmcReminderOne'] = $setAmcReminderOne;
            $existing_dataset['setAmcReminderTwo'] = $setAmcReminderTwo;


        } elseif ($contract === 'CMC') {
            $existing_dataset['cmcStartDate'] = $cmc_start_date;
            $existing_dataset['cmcEndDate'] = $cmc_end_date;
            $existing_dataset['cmcServiceCharges'] = $cmc_service_charges;
            $existing_dataset['setCmcReminderOne'] = $setCmcReminderOne;
            $existing_dataset['setCmcReminderTwo'] = $setCmcReminderTwo;
        }

        // Encode dataset as JSON
        $dataset_json = mysqli_real_escape_string($con, json_encode($existing_dataset));

        // Step 2: Update contract details and dataset column
        $update_query = "UPDATE bf_feedback_asset_creation SET 
            contract_start_date = '" . ($contract === 'AMC' ? $amc_start_date : $cmc_start_date) . "', 
            contract_end_date = '" . ($contract === 'AMC' ? $amc_end_date : $cmc_end_date) . "', 
            contract_service_charges = '" . ($contract === 'AMC' ? $amc_service_charges : $cmc_service_charges) . "', 
            contract_alert_1 = '" . ($contract === 'AMC' ? $setAmcReminderOne : $setCmcReminderOne) . "', 
            contract_alert_2 = '" . ($contract === 'AMC' ? $setAmcReminderTwo : $setCmcReminderTwo) . "', 


            dataset = '$dataset_json'
            WHERE patientid = '$patient_id'";

        if (mysqli_query($con, $update_query)) {
            echo json_encode([
                "status" => "success",
                "message" => "Contract type, details, and dataset updated successfully.",
                "data" => $existing_dataset
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update contract details and dataset."]);
        }

    } else {
        echo json_encode(["status" => "error", "message" => "Failed to update contract type."]);
    }
}

mysqli_close($con);

// Trigger CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $baseurl . 'api/curl.php');
curl_exec($curl);
curl_close($curl);
