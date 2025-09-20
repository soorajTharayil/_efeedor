<!--Code updates: 
Worked on UI allignment, fixed all the issues.
Last updated on 05-03-23 -->

<?php
include('env.php');
include('/home/cpefeedor/globalconfig.php');


// Enable error reporting for development; comment the line below in production
error_reporting(E_ALL);
ini_set('display_errors', 1);

$active_group = 'default';
$active_record = true;

$link = $config_set['DOMAIN'];

$db['hostname'] = $config_set['DBHOST'];
$db['username'] = $config_set['DBUSER'];
$db['password'] = $config_set['DBPASSWORD'];
$db['database'] = $config_set['DBNAME'];
$baseurl = $config_set['BASE_URL'];

/* Create a connection to the database */
$con = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
if ($con->connect_error) {
    die('Could not connect to the database server: ' . $con->connect_error);
}

/* Fetch data from the 'setting' table */
$setting_query = 'SELECT * FROM `setting`';
$setting_result = $con->query($setting_query);

if ($setting_result === false) {
    die('Error executing setting query: ' . $con->error);
}

while ($user_object = $setting_result->fetch_object()) {
    $hid = $user_object->description;
    $title = $user_object->title;
}
// print_r($hid);

$notification_query = "SELECT * FROM `notification` WHERE HID = '$hid'";
$notification_result = $conn_g->query($notification_query);
// print_r($notification_result);
if ($notification_result === false) {
    die('Error executing notification query: ' . $con->error);
}





$notification_object = $notification_result->fetch_object();


$user_notification_count = 0;
$patient_message = 0;
$department_message = 0;
$admins_message = 0;
$google_message = 0;
$negative_message = 0;

$ip_email_admin = 0;
$op_email_admin = 0;
$pcf_email_admin = 0;
$isr_email_admin = 0;
$inc_email_admin = 0;
$ip_email_usercreation = 0;


// Fetch each row correctly inside the loop
while ($notification_object = $notification_result->fetch_object()) {
    $field_count = mysqli_num_fields($notification_result);
    // print_r($notification_object);

    if ($notification_object->type == 'user') {
        $user_notification_count++;
    }
    if ($notification_object->template_id == '1607100000000284456') {
        $google_message++;
    }
    if ($notification_object->template_id == '1607100000000284459') {
        $negative_message++;
    }
    if ($notification_object->type == 'patient_message' && $notification_object->status == 1) {
        $patient_message++;
    }
    if ($notification_object->type == 'department_message' && $notification_object->status == 1) {
        $department_message++;
    }
    if ($notification_object->type == 'admins_message' && $notification_object->status == 1) {
        $admins_message++;
    }
    // print_r($google_message);
    if ($notification_object->type == 'email' && strpos($notification_object->subject, 'Alert: Negative feedback Report from Discharged Inpatient') !== false) {

        $ip_email_admin++;
    }
    if ($notification_object->type == 'email' && strpos($notification_object->subject, 'Alert: Negative feedback Report from Outpatient') !== false) {

        $op_email_admin++;
    }
    if ($notification_object->type == 'email' && strpos($notification_object->subject, 'Urgent: Complaint reported by InPatient') !== false) {

        $pcf_email_admin++;
    }
    if ($notification_object->type == 'email' && strpos($notification_object->subject, 'Urgent: Service Request reported by an Employee') !== false) {

        $isr_email_admin++;
    }
    if ($notification_object->type == 'email' && strpos($notification_object->subject, 'Urgent: Incident reported by an Employee') !== false) {

        $inc_email_admin++;
    }
    if ($notification_object->type == 'email' && strpos($notification_object->subject, 'Welcome to') !== false) {

        $email_usercreation++;
    }
}
$all = $google_message + $negative_message;
$success_total = $admins_message + $user_notification_count + $department_message + $all;
$success_total_email = $ip_email_admin + $op_email_admin + $pcf_email_admin + $isr_email_admin + $inc_email_admin + $email_usercreation;


?>

<!-- content -->
<div class="content">
    <div class="content">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Notifications and Alerts Statistics</h2>

            <!-- Success Stats Section -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Success Notifications</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total User Creation Messages Sent</td>
                                <td><?php echo  $user_notification_count ?></td>
                            </tr>

                            <tr>
                                <td>Total Google Review Related Messages Sent</td>
                                <td><?php echo  $google_message ?></td>
                            </tr>
                            <tr>
                                <td>Total Patient Negative Related Messages Sent</td>
                                <td><?php echo  $negative_message ?></td>
                            </tr>
                            <tr>
                                <td>Total Alerts Sent for Department Heads</td>
                                <td><?php echo  $department_message ?></td>
                            </tr>
                            <tr>
                                <td>Total Alerts Sent for Admins</td>
                                <td><?php echo  $admins_message ?></td>
                            </tr>
                            <tr class="table-success">
                                <td><strong>Total Alerts Success</strong></td>
                                <td><strong><?php echo  $success_total ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h2 class="text-center mb-4">Email Statistics</h2>
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Success Notifications</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total User Creation Email Sent</td>
                                <td><?php echo  $email_usercreation ?></td>
                            </tr>

                            <tr>
                                <td>Total Alerts Sent for Admins & Department Heads (IP)</td>
                                <td><?php echo  $ip_email_admin ?></td>
                            </tr>
                            <tr>
                                <td>Total Alerts Sent for Admins & Department Heads (OP)</td>
                                <td><?php echo  $op_email_admin ?></td>
                            </tr>
                            <tr>
                                <td>Total Alerts Sent for Admins & Department Heads (PCF)</td>
                                <td><?php echo  $pcf_email_admin ?></td>
                            </tr>
                            <tr>
                                <td>Total Alerts Sent for Admins & Department Heads (ISR)</td>
                                <td><?php echo  $isr_email_admin ?></td>
                            </tr>
                            <tr>
                                <td>Total Alerts Sent for Admins & Department Heads (IN)</td>
                                <td><?php echo  $inc_email_admin ?></td>
                            </tr>
                            <tr class="table-success">
                                <td><strong>Total Alerts Success</strong></td>
                                <td><strong><?php echo  $success_total_email ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php

            $notification_query_whatsapp = "SELECT * FROM `notifications_whatsapp` WHERE JSON_CONTAINS(templateParams, JSON_QUOTE('$title'))";
            $notification_result_whatsapp = $conn_g->query($notification_query_whatsapp);

            $whatsapp_user_notification_count = 0;
            $whatsapp_googlereview = 0;
            $whatsapp_negativepatient = 0;
            $whatsapp_admin = 0;
            $whatsapp_dep = 0;

           
            // print_r($notification_result);
            if ($notification_result_whatsapp === false) {
                die('Error executing notification query: ' . $con->error);
            }
            while ($notification_object_whatsapp = $notification_result_whatsapp->fetch_object()) {

                if ($notification_object_whatsapp->campaignName == 'usersms_on_useraccountcreation') {
                    $whatsapp_user_notification_count++;
                }
                if ($notification_object_whatsapp->campaignName == 'inpatient_sms_to_satisfiedpatient' || $notification_object_whatsapp->campaignName == 'outpatientsms_to_satisfiedpatient') {
                    $whatsapp_googlereview++;
                }
                if ($notification_object_whatsapp->campaignName == 'inpatientsms_to_unsatisfiedpatient' || $notification_object_whatsapp->campaignName == 'outpatientsms_to_unsatisfiedpatient') {
                    $whatsapp_negativepatient++;
                }

                if ($notification_object_whatsapp->campaignName == 'staffsmsalert_inpatientcomplaints' || $notification_object_whatsapp->campaignName == 'staffsms_on_negativeexperiences_inpatient'
                || $notification_object_whatsapp->campaignName == 'staffsmsalert_on_negativeexperience_oppatients' || $notification_object_whatsapp->campaignName == 'staffsmsalert_on_servicerequest'
                || $notification_object_whatsapp->campaignName == 'staffalertsms_on_receivingincident') {
                    $whatsapp_admin++;
                }

                $success_total_whatsapp = $whatsapp_user_notification_count + $whatsapp_googlereview + $whatsapp_negativepatient +  $whatsapp_admin ;

            }
            ?>
            <h2 class="text-center mb-4">Whatsapp Statistics</h2>
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Success Notifications</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total User Creation Whatsapp Sent</td>
                                <td><?php echo  $whatsapp_user_notification_count ?></td>
                            </tr>
                           
                            <tr>
                                <td>Total Google Review Related Whatsapp Sent</td>
                                <td><?php echo  $whatsapp_googlereview ?></td>
                            </tr>
                            <tr>
                                <td>Total Patient Negative Related Whatsapp Sent</td>
                                <td><?php echo  $whatsapp_negativepatient ?></td>
                            </tr>
                          
                            <tr>
                                <td>Total Whatsapp Alerts Sent for Admins & Department Head</td>
                                <td><?php echo  $whatsapp_admin ?></td>
                            </tr>
                            <tr class="table-success">
                                <td><strong>Total Alerts Success</strong></td>
                                <td><strong><?php echo  $success_total_whatsapp ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <footer class="text-center mt-4">
                <p>&copy; <?php echo  date("Y") ?> Notification System. All Rights Reserved.</p>
            </footer>
        </div>
    </div>
</div>
<style>
    .bg-success {
        background-color: #198754 !important;
        /* Bootstrap green */
    }
</style>