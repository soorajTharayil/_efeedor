<!--Code updates: 
Worked on UI allignment, fixed all the issues.
Last updated on 05-03-23 -->

<?php




$dates = get_from_to_date();
$fdate = $dates['fdate'];
$tdate = $dates['tdate'];
$pagetitle = $dates['pagetitle'];
$fdate = date('Y-m-d', strtotime($fdate));
$fdatet = date('Y-m-d 23:59:59', strtotime($fdate));
$days = $dates['days'];
$num_of_modules = 0;
$num_of_modules_tickets = 0;

if (ismodule_active('IP') === true) {
    require_once 'ip_tables.php';
}

if (ismodule_active('OP') === true) {
    require_once 'op_tables.php';
}
if (ismodule_active('PCF') === true) {
    require_once 'interim_tables.php';
}

if (ismodule_active('PDF') === true) {
    require_once 'pdf_tables.php';
}

if (ismodule_active('ADF') === true) {
    require_once 'adf_tables.php';
}

if (ismodule_active('ISR') === true) {
    require_once 'esr_tables.php';
}

if (ismodule_active('INCIDENT') === true) {
    require_once 'incident_tables.php';
}

if (ismodule_active('GRIEVANCE') === true) {
    require_once 'grievance_tables.php';
}

if (ismodule_active('ASSET') === true) {
    require_once 'asset_table_variables.php';
}

date_default_timezone_set('Asia/Kolkata');
$hour = date('H');
// echo $hour;
if ($hour < 12) {
    $greeting = '<b>Good morning,<\/b>';
} elseif ($hour < 17) {
    $greeting = '<b>Good afternoon,<\/b> ';
} else {
    $greeting = '<b>Good evening,<\/b> ';
}



if ($pagetitle != 'Custom') {
    $welcometext = $greeting . "<br><br>Here's an overview of the key healthcare experience metrics from each module based on the data collected over the   " . strtolower($pagetitle) . ". For more detailed analytics and comprehensive reports, please visit the individual dashboards.";
} else {
    $dateObjstrt = DateTime::createFromFormat('Y-m-d', $fdate);
    $enddate = $dateObjstrt->format('d-m-y');
    $dateObjend = DateTime::createFromFormat('Y-m-d', $tdate);
    $startdate = $dateObjend->format('d-m-y');
    $welcometext = $greeting . "<br><br>Here is an overview of the key healthcare experience metrics from each module for the data collected from " . $startdate . " to " . $enddate . ". For more detailed analytics and comprehensive reports, please visit the individual dashboards.";
}
//  print_r($this->session->userdata['departmenthead']->empid);

$welcometext2 = $greeting . "<br><br>Here’s an overview of your data from the Incident, Audit, and KPI modules for the current month. Please access your dashboard and use the relevant links to take action on your assigned items.";
?>

<?php

$tables = [
    // CQI3a
    'bf_feedback_CQI3a1',
    'bf_feedback_CQI3a2',
    'bf_feedback_CQI3a3',
    'bf_feedback_CQI3a4',
    'bf_feedback_CQI3a5',
    'bf_feedback_CQI3a6',
    'bf_feedback_CQI3a7',
    'bf_feedback_CQI3a8',
    'bf_feedback_CQI3a9',
    'bf_feedback_CQI3a10',
    'bf_feedback_CQI3a11',
    'bf_feedback_CQI3a12',
    'bf_feedback_CQI3a13',
    'bf_feedback_CQI3a14',
    'bf_feedback_CQI3a15',
    'bf_feedback_CQI3a16',
    'bf_feedback_CQI3a17',
    'bf_feedback_CQI3a18',
    'bf_feedback_CQI3a19',
    'bf_feedback_CQI3a20',
    'bf_feedback_CQI3a21',
    'bf_feedback_CQI3a22',

    // CQI3b
    'bf_feedback_CQI3b1',
    'bf_feedback_CQI3b2',
    'bf_feedback_CQI3b3',
    'bf_feedback_CQI3b4',
    'bf_feedback_CQI3b5',
    'bf_feedback_CQI3b6',
    'bf_feedback_CQI3b7',
    'bf_feedback_CQI3b8',
    'bf_feedback_CQI3b9',
    'bf_feedback_CQI3b10',
    'bf_feedback_CQI3b11',
    'bf_feedback_CQI3b12',
    'bf_feedback_CQI3b13',

    // CQI3c
    'bf_feedback_CQI3c1',
    'bf_feedback_CQI3c2',
    'bf_feedback_CQI3c3',
    'bf_feedback_CQI3c4',
    'bf_feedback_CQI3c5',
    'bf_feedback_CQI3c6',
    'bf_feedback_CQI3c7',
    'bf_feedback_CQI3c8',
    'bf_feedback_CQI3c9',
    'bf_feedback_CQI3c10',
    'bf_feedback_CQI3c11',
    'bf_feedback_CQI3c12',
    'bf_feedback_CQI3c13',
    'bf_feedback_CQI3c14',

    // CQI3d
    'bf_feedback_CQI3d1',
    'bf_feedback_CQI3d2',
    'bf_feedback_CQI3d3',
    'bf_feedback_CQI3d4',
    'bf_feedback_CQI3d5',

    // CQI3e
    'bf_feedback_CQI3e1',
    'bf_feedback_CQI3e2',
    'bf_feedback_CQI3e3',
    'bf_feedback_CQI3e4',
    'bf_feedback_CQI3e5',
    'bf_feedback_CQI3e6',
    'bf_feedback_CQI3e7',
    'bf_feedback_CQI3e8',
    'bf_feedback_CQI3e9',

    // CQI3f
    'bf_feedback_CQI3f1',
    'bf_feedback_CQI3f2',
    'bf_feedback_CQI3f3',
    'bf_feedback_CQI3f4',
    'bf_feedback_CQI3f5',
    'bf_feedback_CQI3f6',
    'bf_feedback_CQI3f7',
    'bf_feedback_CQI3f8',
    'bf_feedback_CQI3f9',
    'bf_feedback_CQI3f10',

    // CQI3g
    'bf_feedback_CQI3g1',
    'bf_feedback_CQI3g2',
    'bf_feedback_CQI3g3',
    'bf_feedback_CQI3g4',
    'bf_feedback_CQI3g5',
    'bf_feedback_CQI3g6',

    // CQI3h
    'bf_feedback_CQI3h1',
    'bf_feedback_CQI3h2',
    'bf_feedback_CQI3h3',
    'bf_feedback_CQI3h4',
    'bf_feedback_CQI3h5',
    'bf_feedback_CQI3h6',
    'bf_feedback_CQI3h7',
    'bf_feedback_CQI3h8',
    'bf_feedback_CQI3h9',

    // CQI3j
    'bf_feedback_CQI3j1',
    'bf_feedback_CQI3j2',
    'bf_feedback_CQI3j3',
    'bf_feedback_CQI3j4',
    'bf_feedback_CQI3j5',
    'bf_feedback_CQI3j6',
    'bf_feedback_CQI3j7',
    'bf_feedback_CQI3j8',
    'bf_feedback_CQI3j9',
    'bf_feedback_CQI3j10',
    'bf_feedback_CQI3j11',
    'bf_feedback_CQI3j12',
    'bf_feedback_CQI3j13',
    'bf_feedback_CQI3j14',
    'bf_feedback_CQI3j15',
    'bf_feedback_CQI3j16',
    'bf_feedback_CQI3j17',
    'bf_feedback_CQI3j18',
    'bf_feedback_CQI3j19',
    'bf_feedback_CQI3j20',
    'bf_feedback_CQI3j21',
    'bf_feedback_CQI3j22',
    'bf_feedback_CQI3j23',
    'bf_feedback_CQI3j24',
    'bf_feedback_CQI3j25',
    'bf_feedback_CQI3j26',
    'bf_feedback_CQI3j27',
    'bf_feedback_CQI3j28',
    'bf_feedback_CQI3j29',
    'bf_feedback_CQI3j30',
    'bf_feedback_CQI3j31',
    'bf_feedback_CQI3j32',
    'bf_feedback_CQI3j33',
    'bf_feedback_CQI3j34',

    // CQI4a
    'bf_feedback_CQI4a1',
    'bf_feedback_CQI4a2',
    'bf_feedback_CQI4a3',
    'bf_feedback_CQI4a4',
    'bf_feedback_CQI4a5',

    // CQI4b
    'bf_feedback_CQI4b1',
    'bf_feedback_CQI4b2',
    'bf_feedback_CQI4b3',
    'bf_feedback_CQI4b4',
    'bf_feedback_CQI4b5',
    'bf_feedback_CQI4b6',
    'bf_feedback_CQI4b7',
    'bf_feedback_CQI4b8',

    // CQI4c
    'bf_feedback_CQI4c1',
    'bf_feedback_CQI4c2',
    'bf_feedback_CQI4c3',
    'bf_feedback_CQI4c4',
    'bf_feedback_CQI4c5',
    'bf_feedback_CQI4c6',
    'bf_feedback_CQI4c7',
    'bf_feedback_CQI4c8',
    'bf_feedback_CQI4c9',
    'bf_feedback_CQI4c10',
    'bf_feedback_CQI4c11',
    'bf_feedback_CQI4c12',
    'bf_feedback_CQI4c13',
    'bf_feedback_CQI4c14',

    // CQI4d
    'bf_feedback_CQI4d1',
    'bf_feedback_CQI4d2',
    'bf_feedback_CQI4d3',
    'bf_feedback_CQI4d4',
    'bf_feedback_CQI4d5',
    'bf_feedback_CQI4d6',
    'bf_feedback_CQI4d7',
    'bf_feedback_CQI4d8',
    'bf_feedback_CQI4d9',
    'bf_feedback_CQI4d10',
    'bf_feedback_CQI4d11',

    // CQI4e
    'bf_feedback_CQI4e1',
    'bf_feedback_CQI4e2',
    'bf_feedback_CQI4e3',
    'bf_feedback_CQI4e4',
    'bf_feedback_CQI4e5',
    'bf_feedback_CQI4e6',
    'bf_feedback_CQI4e7',
    'bf_feedback_CQI4e8',

    // CQI4f
    'bf_feedback_CQI4f1',
    'bf_feedback_CQI4f2',
    'bf_feedback_CQI4f3',
    'bf_feedback_CQI4f4',
    'bf_feedback_CQI4f5',
    'bf_feedback_CQI4f6',
    'bf_feedback_CQI4f7',

    // CQI4g
    'bf_feedback_CQI4g1',
    'bf_feedback_CQI4g2',
    'bf_feedback_CQI4g3',
    'bf_feedback_CQI4g4',
    'bf_feedback_CQI4g5',
    'bf_feedback_CQI4g6',

    // CQI3k
    'bf_feedback_CQI3k1',
    'bf_feedback_CQI3k2',
    'bf_feedback_CQI3k3',
    'bf_feedback_CQI3k4',
    'bf_feedback_CQI3k5',
    'bf_feedback_CQI3k6',
    'bf_feedback_CQI3k7',
    'bf_feedback_CQI3k8',
    'bf_feedback_CQI3k9',
    'bf_feedback_CQI3k10',
    'bf_feedback_CQI3k11',
    'bf_feedback_CQI3k12',
    'bf_feedback_CQI3k13',
    'bf_feedback_CQI3k14',
    'bf_feedback_CQI3k15',
    'bf_feedback_CQI3k16',
    'bf_feedback_CQI3k17',
    'bf_feedback_CQI3k18',
    'bf_feedback_CQI3k19',
    'bf_feedback_CQI3k20',
    'bf_feedback_CQI3k21',
    'bf_feedback_CQI3k22',
    'bf_feedback_CQI3k23',
    'bf_feedback_CQI3k24',
    'bf_feedback_CQI3k25',
    'bf_feedback_CQI3k26',
    'bf_feedback_CQI3k27',
    'bf_feedback_CQI3k28',
    'bf_feedback_CQI3k29',
    'bf_feedback_CQI3k30',
    'bf_feedback_CQI3k31',
    'bf_feedback_CQI3k32',
    'bf_feedback_CQI3k33',
    'bf_feedback_CQI3k34',
    'bf_feedback_CQI3k35',
    'bf_feedback_CQI3k36',
    'bf_feedback_CQI3k37',
    'bf_feedback_CQI3k38',
    'bf_feedback_CQI3k39',
    'bf_feedback_CQI3k40',
    'bf_feedback_CQI3k41',
    'bf_feedback_CQI3k42',
    'bf_feedback_CQI3k43',
    'bf_feedback_CQI3k44',
    'bf_feedback_CQI3k45',
    'bf_feedback_CQI3k46',
    'bf_feedback_CQI3k47',
    'bf_feedback_CQI3k48',
    'bf_feedback_CQI3k49',
    'bf_feedback_CQI3k50',
    'bf_feedback_CQI3k51',
    'bf_feedback_CQI3k52',
    'bf_feedback_CQI3k53',
    'bf_feedback_CQI3k54',
    'bf_feedback_CQI3k55',
    'bf_feedback_CQI3k56',
    'bf_feedback_CQI3k57',
    'bf_feedback_CQI3k58',
    'bf_feedback_CQI3k59',
    'bf_feedback_CQI3k60',
    'bf_feedback_CQI3k61',
    'bf_feedback_CQI3k62',
    'bf_feedback_CQI3k63',
    'bf_feedback_CQI3k64',
    'bf_feedback_CQI3k65',
    'bf_feedback_CQI3k66',



    
    // CQI4h
    'bf_feedback_CQI4h1',
    'bf_feedback_CQI4h2',
    'bf_feedback_CQI4h3',
    'bf_feedback_CQI4h4',
    'bf_feedback_CQI4h5',
    'bf_feedback_CQI4h6',
    'bf_feedback_CQI4h7',
    'bf_feedback_CQI4h8',
    'bf_feedback_CQI4h9',
    'bf_feedback_CQI4h10',
    'bf_feedback_CQI4h11',
    'bf_feedback_CQI4h12',
    'bf_feedback_CQI4h13',
    'bf_feedback_CQI4h14',
    'bf_feedback_CQI4h15',
    'bf_feedback_CQI4h16',
    'bf_feedback_CQI4h17',
    'bf_feedback_CQI4h18',
    'bf_feedback_CQI4h19',
    'bf_feedback_CQI4h20',
    'bf_feedback_CQI4h21',
    'bf_feedback_CQI4h22',
    'bf_feedback_CQI4h23',
    'bf_feedback_CQI4h24',
    'bf_feedback_CQI4h25',
    'bf_feedback_CQI4h26',
    'bf_feedback_CQI4h27',
    'bf_feedback_CQI4h28',
    'bf_feedback_CQI4h29',
    'bf_feedback_CQI4h30',
    'bf_feedback_CQI4h31',
    'bf_feedback_CQI4h32',
    'bf_feedback_CQI4h33',
    'bf_feedback_CQI4h34',
    'bf_feedback_CQI4h35',
    'bf_feedback_CQI4h36',
    'bf_feedback_CQI4h37',
    'bf_feedback_CQI4h38',
    'bf_feedback_CQI4h39',
    'bf_feedback_CQI4h40',
    'bf_feedback_CQI4h41',
    'bf_feedback_CQI4h42',
    'bf_feedback_CQI4h43',
    'bf_feedback_CQI4h44',
    'bf_feedback_CQI4h45',
    'bf_feedback_CQI4h46',
    'bf_feedback_CQI4h47',
    'bf_feedback_CQI4h48',
    'bf_feedback_CQI4h49',
    'bf_feedback_CQI4h50',
    'bf_feedback_CQI4h51',
    'bf_feedback_CQI4h52',
    'bf_feedback_CQI4h53',
    'bf_feedback_CQI4h54',
    'bf_feedback_CQI4h55',
    'bf_feedback_CQI4h56',

    // CLOTCM
    'bf_feedback_CLOTCM1',
    'bf_feedback_CLOTCM2',
    'bf_feedback_CLOTCM3',
    'bf_feedback_CLOTCM4',
    'bf_feedback_CLOTCM5',
    'bf_feedback_CLOTCM6',
    'bf_feedback_CLOTCM7',
    'bf_feedback_CLOTCM8',
    'bf_feedback_CLOTCM9',
    'bf_feedback_CLOTCM10',
    'bf_feedback_CLOTCM11',
    'bf_feedback_CLOTCM12',
    'bf_feedback_CLOTCM13',
    'bf_feedback_CLOTCM14',
    'bf_feedback_CLOTCM15',
    'bf_feedback_CLOTCM16',
    'bf_feedback_CLOTCM17',
    'bf_feedback_CLOTCM18',
    'bf_feedback_CLOTCM19',
    'bf_feedback_CLOTCM20',
    'bf_feedback_CLOTCM21',
    'bf_feedback_CLOTCM22',
    'bf_feedback_CLOTCM23',
    'bf_feedback_CLOTCM24',
    'bf_feedback_CLOTCM25',
    'bf_feedback_CLOTCM26',
    'bf_feedback_CLOTCM27',
    'bf_feedback_CLOTCM28',
    'bf_feedback_CLOTCM29',
    'bf_feedback_CLOTCM30',

    // CQI4i
    'bf_feedback_CQI4i1',
    'bf_feedback_CQI4i2',
    'bf_feedback_CQI4i3',
    'bf_feedback_CQI4i4',
    'bf_feedback_CQI4i5',
    'bf_feedback_CQI4i6',
    'bf_feedback_CQI4i7',
    'bf_feedback_CQI4i8',
    'bf_feedback_CQI4i9',
    'bf_feedback_CQI4i10',
    'bf_feedback_CQI4i11',
    'bf_feedback_CQI4i12',
    'bf_feedback_CQI4i13',
    'bf_feedback_CQI4i14',

    // CQI4j
    'bf_feedback_CQI4j1',
    'bf_feedback_CQI4j2',
    'bf_feedback_CQI4j3',
    'bf_feedback_CQI4j4',
    'bf_feedback_CQI4j5',
    'bf_feedback_CQI4j6',
    'bf_feedback_CQI4j7',
    'bf_feedback_CQI4j8',
    'bf_feedback_CQI4j9',
    'bf_feedback_CQI4j10',
    'bf_feedback_CQI4j11',
    'bf_feedback_CQI4j12',
    'bf_feedback_CQI4j13',
    'bf_feedback_CQI4j14',
    'bf_feedback_CQI4j15',
    'bf_feedback_CQI4j16',
    'bf_feedback_CQI4j17',
    'bf_feedback_CQI4j18',
    'bf_feedback_CQI4j19',
    'bf_feedback_CQI4j20',
    'bf_feedback_CQI4j21',
    'bf_feedback_CQI4j22',
    'bf_feedback_CQI4j23'
];


$kpi_feature_map = [];
foreach ($tables as $index => $tbl) {
    $kpi_feature_map['QUALITY-KPI' . ($index + 1)] = $tbl;
}


$fdate = date('Y-m-d', strtotime($_SESSION['from_date']) + 24 * 60 * 60);
$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));


$user_id = $this->session->userdata('user_id');
$this->db->select('firstname');
$this->db->from('user');
$this->db->where('user_id', $user_id);
$query = $this->db->get();
$user = $query->row();
$current_user_name = !empty($user) ? trim($user->firstname) : '';


$feature = $this->session->userdata('feature');


$kpi_conducted_count = 0;
$total_kpis = 0;


$exclude_keys = ['QUALITY-KPI23a', 'QUALITY-KPI23b', 'QUALITY-KPI23c', 'QUALITY-KPI23d'];

foreach ($feature as $key => $value) {
    if (strpos($key, 'QUALITY-KPI') !== false && $value === true) {

        // Skip only the specified keys
        if (in_array($key, $exclude_keys)) {
            continue;
        }

        if (isset($kpi_feature_map[$key])) {
            $table_name = $kpi_feature_map[$key];

            if ($this->db->table_exists($table_name)) {
                $total_kpis++;

                $this->db->from($table_name);
                // $this->db->where('datetime >=', $tdate);
                // $this->db->where('datetime <=', $fdate);


                // if (!empty($current_user_name)) {
                //     $this->db->where('name', $current_user_name);
                // }

                $row_count = $this->db->count_all_results();

                if ($row_count > 0) {
                    $kpi_conducted_count++;
                }
            }
        }
    }
}


$remaining_kpi = $total_kpis - $kpi_conducted_count;
$completion_rate = ($total_kpis > 0)
    ? round(($kpi_conducted_count / $total_kpis) * 100, 2)
    : 0;

?>



<?php
// ✅ Step 1: Define all audit tables
$audit_array = [
    'bf_ma_active_cases_mrdip',
    'bf_ma_dischargedpatients_mrd_audit',
    'bf_ma_nursingip_closed_cases',
    'bf_ma_nursingip_open_cases',
    'bf_ma_nursingop_closed_cases',
    'bf_ma_clinical_active_mdc',
    'bf_ma_clinical_closedcases_mdc',
    'bf_ma_clinical_pharmacy_closed',
    'bf_ma_clinical_pharmacy_op',
    'bf_ma_clinical_pharmacy_open',
    'bf_ma_anesthesia_active_mdc',
    'bf_ma_anesthesia_closed_mdc',
    'bf_ma_ed_active_mdc',
    'bf_ma_ed_closed_mdc',
    'bf_ma_icu_active_mdc',
    'bf_ma_icu_closed_mdc',
    'bf_ma_primarycare_active_mdc',
    'bf_ma_primarycare_closed_mdc',
    'bf_ma_sedation_active_mdc',
    'bf_ma_sedation_closed_mdc',
    'bf_ma_surgeons_active_mdc',
    'bf_ma_surgeons_closed_mdc',
    'bf_ma_dietconsultation_op_mdc',
    'bf_ma_physiotherapy_closed_mdc',
    'bf_ma_physiotherapy_op_mdc',
    'bf_ma_physiotherapy_open_mdc',
    'bf_ma_mrd_ed_audit',
    'bf_ma_mrd_lama_audit',
    'bf_ma_mrd_op_audit',
    'bf_ma_accidental_delining_audit',
    'bf_ma_admission_area_audit',
    'bf_ma_cardio_pulmonary_audit',
    'bf_ma_extravasation_audit',
    'bf_ma_hapu_audit',
    'bf_ma_assessment_ae',
    'bf_ma_assessment_ipd',
    'bf_ma_assessment_opd',
    'bf_ma_ipsg1_audit',
    'bf_ma_ipsg2_er',
    'bf_ma_ipsg2_ae',
    'bf_ma_ipsg2_ipd',
    'bf_ma_ipsg4_timeout',
    'bf_ma_ipsg6_ip',
    'bf_ma_ipsg6_opd',
    'bf_ma_point_prevlance_audit',
    'bf_ma_clinicaloutcome_audit_acl',
    'bf_ma_clinicaloutcome_allogenic_bone_marrow',
    'bf_ma_clinicaloutcome_aortic_value_replacement',
    'bf_ma_clinicaloutcome_autologous_bone',
    'bf_ma_clinicaloutcome_brain_tumour',
    'bf_ma_clinicaloutcome_cabg',
    'bf_ma_clinicaloutcome_carotid_stenting',
    'bf_ma_clinicaloutcome_chemotherapy',
    'bf_ma_clinicaloutcome_colo_rectal',
    'bf_ma_clinicaloutcome_endoscopy',
    'bf_ma_clinicaloutcome_epilepsy',
    'bf_ma_clinicaloutcome_herniorrhaphy',
    'bf_ma_clinicaloutcome_holep',
    'bf_ma_clinicaloutcome_laparoscopic_appendicectomy',
    'bf_ma_clinicaloutcome_mechanical_thrombectomy',
    'bf_ma_clinicaloutcome_mvr',
    'bf_ma_clinicaloutcome_ptca',
    'bf_ma_clinicaloutcome_renal_transplantation',
    'bf_ma_clinicaloutcome_scoliosis_correction',
    'bf_ma_clinicaloutcome_spinal_dysraphism',
    'bf_ma_clinicaloutcome_spine_disc_surgery',
    'bf_ma_clinicaloutcome_thoracotomy',
    'bf_ma_clinicaloutcome_tkr',
    'bf_ma_clinicaloutcome_uro_oncology',
    'bf_ma_clinicaloutcome_whipples_surgery',
    'bf_ma_clinicaloutcome_laparoscopic_cholecystectomy',
    'bf_ma_clinicalkpi_bronchodilators_audit',
    'bf_ma_clinicalkpi_copd_protocol_audit',
    'bf_ma_infection_control_biomedical_waste',
    'bf_ma_infection_control_canteen_audit',
    'bf_ma_infection_control_cssd_audit',
    'bf_ma_infection_control_hand_hygiene',
    'bf_ma_infection_control_bundle_audit',
    'bf_ma_infection_control_ot_audit',
    'bf_ma_infection_control_linen_audit',
    'bf_ma_infection_control_ambulance_audit',
    'bf_ma_infection_control_coffee_audit',
    'bf_ma_infection_control_laboratory_audit',
    'bf_ma_infection_control_mortuary_audit',
    'bf_ma_infection_control_radiology_audit',
    'bf_ma_infection_control_ssi_survelliance_audit',
    'bf_ma_infection_control_peripheralivline_audit',
    'bf_ma_infection_control_personalprotective_audit',
    'bf_ma_infection_control_safe_injection_audit',
    'bf_ma_infection_control_surface_cleaning_audit',
    'bf_ma_clinical_pathway_arthroscopic_audit',
    'bf_ma_clinical_pathway_breast_lump_audit',
    'bf_ma_clinical_pathway_cardiac_arrest_audit',
    'bf_ma_clinical_pathway_donor_hepatectomy_audit',
    'bf_ma_clinical_pathway_febrile_seizure_audit',
    'bf_ma_clinical_pathway_heart_transplant_audit',
    'bf_ma_clinical_pathway_laproscopic_audit',
    'bf_ma_clinical_pathway_picc_line_audit',
    'bf_ma_clinical_pathway_stroke_audit',
    'bf_ma_clinical_pathway_urodynamics_audit',
    'bf_ma_clinical_pathway_stemi_audit',
    'bf_ma_bmw_audit',
    'bf_ma_pest_control_audit'
];

// Mapping
$audit_feature_map = [];
foreach ($audit_array as $index => $table_name) {
    $audit_feature_map['AUDIT-FORM' . ($index + 1)] = $table_name;
}


$fdate = date('Y-m-d', strtotime($_SESSION['from_date']) + 24 * 60 * 60);
$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));

//Get current user firstname from DB
$user_id = $this->session->userdata('user_id');
$this->db->select('firstname');
$this->db->from('user');
$this->db->where('user_id', $user_id);
$query = $this->db->get();
$user = $query->row();

$current_user_name = '';
if (!empty($user)) {
    $current_user_name = trim($user->firstname);
}


$feature = $this->session->userdata('feature');

// echo '<pre>';
// print_r($feature);
// exit;


$audit_conducted_count = 0;
$total_audits = 0;

//Loop only permitted audits
foreach ($feature as $key => $value) {
    if (strpos($key, 'AUDIT-FORM') !== false && $value === true) {

        if (isset($audit_feature_map[$key])) {
            $table_name = $audit_feature_map[$key];

            if ($this->db->table_exists($table_name)) {
                $total_audits++;

                $this->db->from($table_name);
                $this->db->where('datetime >=', $tdate);
                $this->db->where('datetime <=', $fdate);

                //Match dataset.audit_by = user's firstname
                // if (!empty($current_user_name)) {
                //     $this->db->where("JSON_UNQUOTE(JSON_EXTRACT(dataset, '$.audit_by')) =", $current_user_name);
                // }

                $row_count = $this->db->count_all_results();

                if ($row_count > 0) {
                    $audit_conducted_count++;
                }
            }
        }
    }
}

// echo $audit_conducted_count;

// ✅ Step 7: Calculate summary
$remaining_audit = $total_audits - $audit_conducted_count;
$completion_audit_rate = ($total_audits > 0)
    ? round(($audit_conducted_count / $total_audits) * 100, 2)
    : 0;
?>




<!-- content -->
<div class="content">


    <br>
    <!-- START FOR SUPERADMIN AND ADMIN -->
    <?php if (ismodule_active('GLOBAL') === true && isfeature_active('ADMINS-OVERALL-PAGE') === true) { ?>
        <div class="col-lg-12">
            <div style="margin-bottom: 15px; margin-top: 20px; ">
                <marquee behavior="scroll" direction="left">
                    <div style="text-align:center; color:orange;">
                        <?php include 'display_remaining_days_message.php'; ?>
                    </div>
                </marquee>
                <h4 style="font-size:18px;font-weight:normal; margin-top: 0px;">
                    <span class="typing-text"></span>
                </h4>
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;<span class="typing-text"></span> </h4> -->
            </div>
        </div>

        <!-- START ADMISSION OVERVIEW -->
        <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-FEEDBACKS-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">

                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Inpatient admission feedbacks"
                                style="color: inherit;" href="<?php echo base_url(); ?>admissionfeedback/feedback_dashboard">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_adf_feedbacks'); ?> </h3>
                                    <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-FEEDBACKS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>admissionfeedback/feedback_dashboard"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-FEEDBACK-REPORTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($adf_feedbacks_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_feedbacks'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-comments-o"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_feedback_report; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-PSAT') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $adf_psat_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $adf_psat['psat_score']; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_psat'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_psat_page; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-NPS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" style="height: 100px;" data-placement="top"
                                            data-toggle="tooltip" title="<?php echo $adf_nps_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $adf_nps['nps_score']; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_nps'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-tachometer"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_nps_page; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $adf_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($adf_tickets_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_ticket_dashboard; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- START ADMISSION OVERVIEW -->

        <!-- START INPATIENT OVERVIEW -->
        <?php if (ismodule_active('IP') === true && isfeature_active('IP-FEEDBACKS-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Inpatient discharge feedbacks"
                                style="color: inherit;" href="<?php echo base_url(); ?>ipd/feedback_dashboard">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_ip_discharge_feedback'); ?> </h3>
                                    <?php if (ismodule_active('IP') === true && isfeature_active('IP-FEEDBACKS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>ipd/feedback_dashboard"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-FEEDBACK-REPORTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($ip_feedbacks_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_feedbacks'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-comments-o"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_feedback_report; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-PSAT') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $ip_psat_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $ip_psat['psat_score']; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_psat'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_psat_page; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-NPS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" style="height: 100px;" data-placement="top"
                                            data-toggle="tooltip" title="<?php echo $ip_nps_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $ip_nps['nps_score']; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_nps'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-tachometer"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_nps_page; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $ip_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $ip_department['alltickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_ticket_dashboard; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- END INPATIENT OVERVIEW -->

        <!-- START INTERIM OVERVIEW -->
        <?php if (ismodule_active('PCF') === true && isfeature_active('PC-COMPLAINTS-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">

                            <a href="<?php echo base_url(); ?>pc/ticket_dashboard" data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of patient complaints and requests"
                                style="color: inherit;" href="<?php echo base_url(); ?>dashboard/swithc?type=2">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_ip_complaints'); ?></h3>
                                    <?php if (ismodule_active('PCF') === true && isfeature_active('PC-COMPLAINTS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>pc/ticket_dashboard"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('PCF') === true && isfeature_active('TOTAL-COMPLAINTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $interim_tickets_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($int_tickets_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $int_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PCF') === true && isfeature_active('OPEN-COMPLAINTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $interim_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $int_allopenticket_count; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $int_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('PCF') === true && isfeature_active('ADDRESSED-COMPLAINTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $interim_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($int_addressed_tickets); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">
                                                    <?php echo lang_loader('global', 'global_addressed_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $int_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PCF') === true && isfeature_active('CLOSED-COMPLAINTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $interim_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($int_closed_tickets); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $int_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- END INTERIM OVERVIEW -->

        <!-- START PDF OVERVIEW -->
        <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-FEEDBACKS-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Inpatient discharge feedbacks"
                                style="color: inherit;" href="<?php echo base_url(); ?>post/feedback_dashboard">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_pdf_discharge_feedback'); ?> </h3>
                                    <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-FEEDBACKS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>post/feedback_dashboard"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-FEEDBACK-REPORTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($pdf_feedbacks_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_feedbacks'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-comments-o"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_feedback_report; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-PSAT') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $pdf_psat_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $pdf_psat['psat_score']; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_psat'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_psat_page; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-NPS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" style="height: 100px;" data-placement="top"
                                            data-toggle="tooltip" title="<?php echo $pdf_nps_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $pdf_nps['nps_score']; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_nps'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-tachometer"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_nps_page; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $pdf_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($pdf_tickets_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_ticket_dashboard; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- END PDF OVERVIEW -->


        <!-- START OUTPATIENT OVERVIEW -->
        <?php if (ismodule_active('OP') === true && isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Outpatient feedbacks" style="color: inherit;"
                                href="<?php echo base_url(); ?>opf/feedback_dashboard">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_op_feedback'); ?> </h3>
                                    <?php if (ismodule_active('OP') === true && isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>opf/feedback_dashboard"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-FEEDBACK-REPORTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($op_feedbacks_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_feedbacks'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-comments-o"></i>
                                                </div>
                                                <a href="<?php echo $op_link_feedback_report; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-PSAT') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $op_psat_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $op_psat['psat_score']; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_psat'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <a href="<?php echo $op_link_psat_page; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-NPS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" style="height: 100px;" data-placement="top"
                                            data-toggle="tooltip" title="<?php echo $op_nps_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $op_nps['nps_score']; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_nps'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-tachometer"></i>
                                                </div>
                                                <a href="<?php echo $op_link_nps_page; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $op_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($op_tickets_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $op_link_ticket_dashboard; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- END OUTPATIENT OVERVIEW -->


        <!-- START ISR OVERVIEW -->
        <?php if (ismodule_active('ISR') === true && isfeature_active('ISR-REQUESTS-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of internal service requests" style="color: inherit;"
                                href="<?php echo base_url(); ?>isr/ticket_dashboard">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_isr'); ?></h3>
                                    <?php if (ismodule_active('ISR') === true && (isfeature_active('ISR-REQUESTS-DASHBOARD') === true || isfeature_active('REQUESTS-DASHBOARD') === true)) { ?>
                                        <div style="float: right; margin-top: -26px">
                                            <a class="btn btn-success btn-sm" target="_blank"
                                                style="margin-right: 10px; background: #62c52d; border:none; border-radius: 4px; font-size: 13px;"
                                                data-placement="bottom" data-toggle="tooltip" title="Raise requests"
                                                href="<?php echo base_url('/isrf?user_id=' . $this->session->userdata['user_id']); ?>"
                                                style="margin-right: 10px;">
                                                Raise requests
                                            </a>
                                            <a href="<?php echo base_url(); ?>isr/ticket_dashboard" class="btn btn-primary btn-sm"
                                                style="font-size:13px; float: right; margin-right: 4px; margin-top: 1px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a>
                                        </div>
                                    <?php } ?>
                                </span>
                        </div>


                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('ISR') === true && isfeature_active('TOTAL-REQUESTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $esr_tickets_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $esr_department['alltickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ISR') === true && isfeature_active('OPEN-REQUESTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $esr_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $esr_department['opentickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ISR') === true && isfeature_active('ADDRESSED-REQUESTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $esr_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $esr_department['addressedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ISR') === true && isfeature_active('CLOSED-REQUESTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $esr_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $esr_department['closedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- END ISR OVERVIEW -->

        <!-- START INCIDENT OVERVIEW -->
        <?php if (ismodule_active('INCIDENT') === true && isfeature_active('INC-INCIDENTS-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of incidents" style="color: inherit;"
                                href="<?php echo base_url(); ?>incident/ticket_dashboard">
                                <span>
                                    <h3>INCIDENT MANAGER</h3>
                                    <?php if (ismodule_active('INCIDENT') === true && (isfeature_active('INC-INCIDENTS-DASHBOARD') === true || isfeature_active('INCIDENTS-DASHBOARD') === true)) { ?>
                                        <div style="float: right; margin-top: -26px">
                                            <a class="btn btn-success btn-sm" target="_blank"
                                                style="margin-right: 10px; background: #62c52d; border-radius: 4px; border:none; font-size: 13px; width:110px;"
                                                data-placement="bottom" data-toggle="tooltip" title="Report incidents"
                                                href="<?php echo base_url('/inn?user_id=' . $this->session->userdata['user_id']); ?>">
                                                Report Incidents
                                            </a>

                                            <a href="<?php echo base_url(); ?>incident/ticket_dashboard"
                                                class="btn btn-primary btn-sm"
                                                style="font-size:13px; float: right; margin-right: 4px; margin-top: 1px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none; width:110px;">
                                                Explore
                                            </a>
                                        </div>
                                    <?php } ?>

                                </span>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('TOTAL-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($incident_tickets_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_inc'); ?></div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('OPEN-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $incident_department['opentickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_inc'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('DESCRIBING-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($incident_addressed_tickets); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Described Incidents
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('CLOSED-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($incident_closed_tickets); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_inc'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- END INCIDENT OVERVIEW -->

        <!-- START grievance_page OVERVIEW -->
        <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('SG-STAFF-GRIEVANCES-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">

                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of staff grievance" style="color: inherit;"
                                href="<?php echo base_url(); ?>grievance/ticket_dashboard">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_sg'); ?> </h3>
                                    <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('SG-STAFF-GRIEVANCES-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>grievance/ticket_dashboard"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('TOTAL-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($grievance_tickets_count); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('OPEN-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $grievance_department['opentickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('ADDRESSED-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($grievance_addressed_tickets); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">
                                                    <?php echo lang_loader('global', 'global_addressed_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('CLOSED-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo count($grievance_closed_tickets); ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- END grievance_page OVERVIEW -->

        <!-- START Quality KPI overview -->
        <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed Quality Indicator Analysis" style="color: inherit;"
                                href="<?php echo base_url(); ?>quality/quality_welcome_page">
                                <span>
                                    <h3>QUALITY KPI MANAGER</h3>
                                    <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
                                        <div style="float: right; margin-top: -26px">
                                            <a class="btn btn-success btn-sm" target="_blank"
                                                style="margin-right: 10px; background: #62c52d; border-radius: 4px; border:none; font-size: 13px; width:110px;"
                                                data-placement="bottom" data-toggle="tooltip" title="Report QIM Forms"
                                                href="<?php echo base_url('/qim_forms?user_id=' . $this->session->userdata['user_id']); ?>">
                                                Record KPI
                                            </a>

                                            <a href="<?php echo base_url(); ?>quality/quality_welcome_page"
                                                class="btn btn-primary btn-sm"
                                                style="font-size:13px; float: right; margin-right: 4px; margin-top: 1px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none; width:110px;">
                                                Explore
                                            </a>
                                        </div>
                                    <?php } ?>

                                </span>
                            </a>
                        </div>

                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-toggle="tooltip"
                                            title="The total number of Key Performance Indicators(KPIs) present.">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $total_kpis; ?>
                                                    </span>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total KPIs</div>
                                                <div class="icon">
                                                    <i class="fa fa-tachometer"></i>
                                                </div>
                                                <a href="<?php echo base_url(); ?>quality/quality_welcome_page"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The total number of KPIs recorded or performed during the month">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $kpi_conducted_count; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total KPIs Recorded</div>
                                                <div class="icon">
                                                    <i class="fa fa-check-square-o"></i>
                                                </div>
                                                <!-- <a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The number of KPIs yet to be recorded or performed.">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $remaining_kpi; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total KPIs Pending</div>
                                                <div class="icon">
                                                    <i class="fa fa-hourglass-o"></i>
                                                </div>
                                                <!-- <a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The percentage of KPIs recorded out of the total KPIs.">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $completion_rate; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">KPI Recording Rate</div>
                                                <div class="icon">
                                                    <i class="fa fa-line-chart"></i>
                                                </div>
                                                <!-- <a href="<?php echo $ip_link_ticket_dashboard; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- End quality KPI overview -->

        <!-- START audit overview -->
        <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed Quality Audit Analysis" style="color: inherit;"
                                href="<?php echo base_url(); ?>audit/audit_welcome_page">
                                <span>
                                    <h3>QUALITY AUDIT MANAGER</h3>
                                    <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
                                        <div style="float: right; margin-top: -26px">
                                            <a class="btn btn-success btn-sm" target="_blank"
                                                style="margin-right: 10px; background: #62c52d; border-radius: 4px; border:none; font-size: 13px; width:110px;"
                                                data-placement="bottom" data-toggle="tooltip" title="Report Audit Forms"
                                                href="<?php echo base_url('/audit_forms?user_id=' . $this->session->userdata['user_id']); ?>">
                                                Perform Audit
                                            </a>

                                            <a href="<?php echo base_url(); ?>audit/audit_welcome_page"
                                                class="btn btn-primary btn-sm"
                                                style="font-size:13px; float: right; margin-right: 4px; margin-top: 1px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none; width:110px;">
                                                Explore
                                            </a>
                                        </div>
                                    <?php } ?>

                                </span>
                            </a>
                        </div>

                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-toggle="tooltip"
                                            title="The total number of audits present">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $total_audits; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total Audits</div>
                                                <div class="icon">
                                                    <i class="fa fa-list-alt"></i>
                                                </div>
                                                <a href="<?php echo base_url(); ?>audit/audit_welcome_page"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The total number of audits that have been initiated or conducted during the month.">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $audit_conducted_count; ?>

                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total Audits Initiated</div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The number of audits yet to be initiated or conducted.">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $remaining_audit; ?>

                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total Audits Pending</div>
                                                <div class="icon">
                                                    <i class="fa fa-hourglass-o"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The percentage of audits initiated out of the total audits.">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $completion_audit_rate; ?>

                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Audit Initiation Ratio</div>
                                                <div class="icon">
                                                    <i class="fa fa-line-chart"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>



                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- End audit overview -->

        <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
            <div class="row">
                <?php

                // $fdate = date('Y-m-d', strtotime($_SESSION['from_date']) + 24 * 60 * 60);
                // $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
                $this->db->select("*");
                $this->db->from('bf_feedback_asset_creation');
                // $this->db->where('datetime >=', $tdate);
                // $this->db->where('datetime <=', $fdate);
                if ($_SESSION['ward'] !== 'ALL') {
                    $this->db->where('locationsite', $_SESSION['ward']);
                }
                $query = $this->db->get();
                $ASSETSresults = $query->result();

                ?>
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">

                            <a href="<?php echo base_url(); ?>asset/ticket_dashboard" data-toggle="tooltip"
                                data-placement="bottom"
                                title="This section provides an overview of asset management. Click the Explore button"
                                style="color: inherit;" href="<?php echo base_url(); ?>dashboard/swithc?type=2">
                                <span>
                                    <h3>ASSET MANAGER</h3>
                                    <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>asset/ticket_dashboard"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip">

                                            <div class="statistic-box" title="<?php echo $asset_tickets_tool; ?>">
                                                <h2><span class="count-number">
                                                        <?php echo $asset_department['alltickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total Assets
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Total no. of hospital assets registered for use in the hospital.">
														<i class="fa fa-info-circle" aria-hidden="true"></i>
													</a> -->
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-hospital-o"></i>
                                                </div>
                                                <a href="<?php echo base_url(); ?>asset/alltickets"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>



                            <?php

                            $scheduleCount = 0;
                            $notApplicableCount = 0;
                            $overdueCount = 0;
                            $dueIn45DaysCount = 0;
                            $overDue30DaysCount = 0;
                            $dueThisMonthCount = 0;

                            // Loop through the results to calculate counts
                            if (!empty($ASSETSresults)) {
                                foreach ($ASSETSresults as $department) {
                                    $upcomingDate = $department->upcoming_preventive_maintenance_date;
                                    $assetWithPm = $department->assetWithPm;
                                    $currentDate = new DateTime();

                                    if ($assetWithPm === 'PM not applicable') {
                                        $notApplicableCount++;
                                    } elseif ($assetWithPm === 'PM applicable') {
                                        if (empty($upcomingDate)) {
                                            // PM applicable but no upcoming date → Scheduled
                                            $scheduleCount++;
                                        } else {
                                            $upcomingDateObj = new DateTime($upcomingDate);
                                            $interval = $currentDate->diff($upcomingDateObj);
                                            $daysRemaining = $interval->format('%r%a');

                                            if ($daysRemaining < -30) {
                                                $overDue30DaysCount++;
                                            } elseif ($daysRemaining < 0) {
                                                $overdueCount++;
                                            } elseif ($currentDate->format('Y-m') === $upcomingDateObj->format('Y-m')) {
                                                $dueThisMonthCount++;
                                            } elseif ($daysRemaining >= 1 && $daysRemaining <= 45) {
                                                $dueIn45DaysCount++;
                                            } else {
                                                $scheduleCount++;
                                            }
                                        }
                                    } else {
                                        // If assetWithPm is empty or unrecognized → mark as Not Applicable (fallback)
                                        $notApplicableCount++;
                                    }
                                }
                            }

                            $applicableCount = $scheduleCount + $overdueCount + $dueIn45DaysCount + $dueThisMonthCount + $overDue30DaysCount;

                            ?>

                            <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip">
                                            <div class="statistic-box"
                                                title="<?php echo 'Maintenance Scheduled: ' . $scheduleCount . ', Due this Month: ' . $dueThisMonthCount . ', Due in 45 Days: ' . $dueIn45DaysCount . ', Maintenance Overdue: ' . $overdueCount . ', Overdue by 30+ Days: ' . $overDue30DaysCount; ?>">
                                                <h2><span class="count-number">
                                                        <?php echo $applicableCount; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">PM applicable assets
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Represents the total count of assets requiring preventive maintenance.">
														<i class="fa fa-info-circle" aria-hidden="true"></i>
													</a> -->
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                            <?php
                            $totalNoWarranty = 0;
                            $totalExpired30Days = 0;
                            $totalExpired = 0;
                            $totalExpiresThisMonth = 0;
                            $totalExpiringSoon = 0;
                            $totalWarrantyActive = 0;

                            if (!empty($ASSETSresults)) {
                                foreach ($ASSETSresults as $department) {
                                    $warrantyEndDate = $department->warrenty_end;
                                    $assetWithWarranty = $department->assetWithWarranty;
                                    $currentDate = new DateTime();

                                    if ($assetWithWarranty === 'Warranty not applicable' || empty($assetWithWarranty)) {
                                        $totalNoWarranty++; // Not applicable or not under warranty
                                    } elseif ($assetWithWarranty === 'Warranty applicable') {
                                        if (empty($warrantyEndDate)) {
                                            // Warranty applicable but no end date → treat as active
                                            $totalWarrantyActive++;
                                        } else {
                                            $warrantyEndDateObj = new DateTime($warrantyEndDate);
                                            $interval = $currentDate->diff($warrantyEndDateObj);
                                            $daysRemaining = (int) $interval->format('%r%a'); // signed days

                                            if ($daysRemaining < -30) {
                                                $totalExpired30Days++;
                                            } elseif ($daysRemaining < 0) {
                                                $totalExpired++;
                                            } elseif ($currentDate->format('Y-m') === $warrantyEndDateObj->format('Y-m')) {
                                                $totalExpiresThisMonth++;
                                            } elseif ($daysRemaining >= 1 && $daysRemaining <= 90) {
                                                $totalExpiringSoon++;
                                            } else {
                                                $totalWarrantyActive++;
                                            }
                                        }
                                    } else {
                                        // Unrecognized status — treat as no warranty
                                        $totalNoWarranty++;
                                    }
                                }
                            }

                            $applicableWarrantyCount = $totalWarrantyActive + $totalExpired + $totalExpired30Days + $totalExpiresThisMonth + $totalExpiringSoon;


                            ?>


                            <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip">
                                            <div class="statistic-box"
                                                title="<?php echo 'Warranty Active: ' . $totalWarrantyActive . ', Expiring this Month: ' . $totalExpiresThisMonth . ', Expiring within 90 days: ' . $totalExpiringSoon . ', Warranty Expired: ' . $totalExpired . ', Expired 30+ Days: ' . $totalExpired30Days; ?>">
                                                <h2><span class="count-number">
                                                        <?php echo $applicableWarrantyCount; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Warranty applicable assets
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Represents the total number of assets for which warranty is applicable.">
														<i class="fa fa-info-circle" aria-hidden="true"></i>
													</a> -->
                                                </div>

                                                <div class="icon">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </div>
                                                <!-- <a href="<?php echo base_url(); ?>asset/asset_warranty_reports?status=Warranty+Active" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>



                            <?php
                            $totalNoContract = 0;
                            $totalExpired30Days = 0;
                            $totalExpired = 0;
                            $totalExpiresThisMonth = 0;
                            $totalExpiringSoon = 0;
                            $totalContractActive = 0;

                            // Loop through the results to calculate counts
                            if (!empty($ASSETSresults)) {
                                foreach ($ASSETSresults as $department) {
                                    $contractEndDate = $department->contract_end_date;
                                    $assetWithAmc = $department->assetWithAmc;
                                    $currentDate = new DateTime();

                                    if ($assetWithAmc === 'AMC/ CMC not applicable' || empty($assetWithAmc)) {
                                        $totalNoContract++; // Not applicable or missing → Count as No Contract
                                    } elseif ($assetWithAmc === 'AMC/ CMC applicable') {
                                        if (empty($contractEndDate)) {
                                            $totalContractActive++; // AMC exists but no end date → Consider Active
                                        } else {
                                            $contractEndDateObj = new DateTime($contractEndDate);
                                            $interval = $currentDate->diff($contractEndDateObj);
                                            $daysRemaining = (int) $interval->format('%r%a'); // Negative if expired

                                            if ($daysRemaining < -30) {
                                                $totalExpired30Days++;
                                            } elseif ($daysRemaining < 0) {
                                                $totalExpired++;
                                            } elseif ($currentDate->format('Y-m') == $contractEndDateObj->format('Y-m')) {
                                                $totalExpiresThisMonth++;
                                            } elseif ($daysRemaining >= 1 && $daysRemaining <= 90) {
                                                $totalExpiringSoon++;
                                            } else {
                                                $totalContractActive++;
                                            }
                                        }
                                    } else {
                                        // If AMC status is unknown, treat as No Contract
                                        $totalNoContract++;
                                    }
                                }
                            }

                            $applicableContractCount = $totalContractActive + $totalExpired + $totalExpired30Days + $totalExpiresThisMonth + $totalExpiringSoon;

                            ?>
                            <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip">
                                            <div class="statistic-box"
                                                title="<?php echo "Contract Active: " . $totalContractActive . ', Expires this Month: ' . $totalExpiresThisMonth . ', Expiring within 90 days: ' . $totalExpiringSoon . ', Contract Expired: ' . $totalExpired . ', Expired 30+ Days: ' . $totalExpired30Days; ?>">
                                                <h2><span class="count-number">
                                                        <?php echo $applicableContractCount; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">AMC/CMC applicable assets
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Represents the total number of assets under an active annual or comprehensive maintenance contract.">
														<i class="fa fa-info-circle" aria-hidden="true"></i>
													</a> -->
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </div>
                                                <!-- <a href="<?php echo base_url(); ?>asset/asset_contract_reports?status=Contract+Active&amc_status=all" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>







    <?php } ?>
    <!-- FOR SUPERADMIN AND ADMIN END -->

    <!-- FOR DEPT HEAD -->

    <?php if (ismodule_active('GLOBAL') === true && isfeature_active('DEPARTMENT-HEAD-OVERALL-PAGE') === true && ($this->session->userdata['user_role'] >= 4)) { ?>
        <div class="col-lg-12">
            <div style="margin-bottom: 15px; margin-top: 20px; ">
                <marquee behavior="scroll" direction="left">
                    <div style="text-align:center; color:orange;">
                        <?php include 'display_remaining_days_message.php'; ?>
                    </div>
                </marquee>
                <h4 style="font-size:18px;font-weight:normal; margin-top: 0px;">
                    <span class="typing-text2"></span>
                </h4>
                <!-- &nbsp;&nbsp;&nbsp;&nbsp;<span class="typing-text"></span> </h4> -->
            </div>
        </div>
        <!-- if dephead has access to admission feedback tickets -->
        <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of patient complaints and requests"
                                style="color: inherit;" href="<?php echo base_url(); ?>admissionfeedback/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_adf_tickets'); ?> </h3>
                                    <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>admissionfeedback/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>

                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-TOTAL-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $adf_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/alltickets'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-OPEN-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $adf_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-ADDRESSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $adf_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-CLOSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $adf_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Close Metric Boxes-->
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>


        <?php } ?>

        <!-- if dephead has access to ipfeedback tickets -->
        <?php if (ismodule_active('IP') === true && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Inpatient discharge feedbacks"
                                style="color: inherit;" href="<?php echo base_url(); ?>ipd/department_tickets">

                                <span>
                                    <h3><?php echo lang_loader('global', 'global_ip_tickets'); ?></h3>
                                    <?php if (ismodule_active('IP') === true && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>ipd/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-TOTAL-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $ip_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-OPEN-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $ip_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-ADDRESSED-TICKETS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $ip_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-CLOSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $ip_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Close Metric Boxes-->
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- if dephead has access to patient complaints -->
        <?php if (ismodule_active('PCF') === true && isfeature_active('COMPLAINTS-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of patient complaints and requests"
                                style="color: inherit;" href="<?php echo base_url(); ?>pc/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_patient_complaints'); ?> </h3>
                                    <?php if (ismodule_active('PCF') === true && isfeature_active('COMPLAINTS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>pc/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('PCF') === true && isfeature_active('TOTAL-COMPLAINTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $int_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $int_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/alltickets'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PCF') === true && isfeature_active('OPEN-COMPLAINTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $int_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $int_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('PCF') === true && isfeature_active('ADDRESSED-COMPLAINTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $int_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small">
                                                    <?php echo lang_loader('global', 'global_addressed_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $int_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PCF') === true && isfeature_active('CLOSED-COMPLAINTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $int_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $int_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <!-- Close Metric Boxes-->
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>


        <?php } ?>

        <!-- if dephead has access to pdf tickets -->
        <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Inpatient discharge feedbacks"
                                style="color: inherit;" href="<?php echo base_url(); ?>post/department_tickets">

                                <span>
                                    <h3><?php echo lang_loader('global', 'global_pdf_tickets'); ?></h3>
                                    <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>post/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-TOTAL-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $pdf_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-OPEN-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $pdf_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-ADDRESSED-TICKETS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $pdf_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-CLOSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $pdf_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Close Metric Boxes-->
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- if dephead has access to outpatient feedback tickets -->
        <?php if (ismodule_active('OP') === true && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Outpatient feedbacks" style="color: inherit;"
                                href="<?php echo base_url(); ?>opf/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_op_tickets'); ?></h3>
                                    <?php if (ismodule_active('OP') === true && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>opf/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-TOTAL-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $op_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $op_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-OPEN-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $op_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $op_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-ADDRESSED-TICKETS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $op_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $op_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-CLOSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $op_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $op_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <!-- Close Metric Boxes-->
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- if dephead has access to internal service requests -->
        <?php if (ismodule_active('ISR') === true && isfeature_active('REQUESTS-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of employee requests" style="color: inherit;"
                                href="<?php echo base_url(); ?>isr/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_isr'); ?></h3>
                                    <?php if (ismodule_active('ISR') === true && (isfeature_active('ISR-REQUESTS-DASHBOARD') === true || isfeature_active('REQUESTS-DASHBOARD') === true)) { ?>
                                        <div style="float: right; margin-top: -26px">
                                            <a class="btn btn-success btn-sm" target="_blank"
                                                style="margin-right: 10px; background: #62c52d; border:none; border-radius: 4px; font-size: 13px;"
                                                data-placement="bottom" data-toggle="tooltip" title="Raise requests"
                                                href="<?php echo base_url('/isrf?user_id=' . $this->session->userdata['user_id']); ?>"
                                                style="margin-right: 10px;">
                                                Raise requests
                                            </a>
                                            <?php if (ismodule_active('ISR') === true && isfeature_active('REQUESTS-DASHBOARD') === true) { ?><a
                                                    href="<?php echo base_url(); ?>isr/department_tickets"
                                                    style="float: right;margin-top: 0px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                        </div>
                                    <?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('ISR') === true && isfeature_active('TOTAL-REQUESTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $esr_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('ISR') === true && isfeature_active('OPEN-REQUESTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $esr_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ISR') === true && isfeature_active('ADDRESSED-REQUESTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $esr_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('ISR') === true && isfeature_active('CLOSED-REQUESTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $esr_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Close Metric Boxes-->
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- START INCIDENT OVERVIEW -->
        <?php if (ismodule_active('INCIDENT') === true && isfeature_active('INCIDENTS-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of incidents" style="color: inherit;"
                                href="<?php echo base_url(); ?>incident/ticket_dashboard">
                                <span>
                                    <h3>INCIDENT MANAGER</h3>
                                    <?php if (ismodule_active('INCIDENT') === true && (isfeature_active('INC-INCIDENTS-DASHBOARD') === true || isfeature_active('INCIDENTS-DASHBOARD') === true)) { ?>
                                        <div style="float: right; margin-top: -26px">
                                            <a class="btn btn-success btn-sm" target="_blank"
                                                style="margin-right: 10px; background: #62c52d; border-radius: 4px; border:none; font-size: 13px; width:110px;"
                                                data-placement="bottom" data-toggle="tooltip" title="Report incidents"
                                                href="<?php echo base_url('/inn?user_id=' . $this->session->userdata['user_id']); ?>">
                                                Report Incidents
                                            </a>

                                            <a href="<?php echo base_url(); ?>incident/ticket_dashboard"
                                                class="btn btn-primary btn-sm"
                                                style="font-size:13px; float: right; margin-right: 4px; margin-top: 1px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none; width:110px;">
                                                Explore
                                            </a>
                                        </div>
                                    <?php } ?>

                                </span>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('TOTAL-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $esr_tickets_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $incident_department['alltickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_inc'); ?></div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('OPEN-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $incident_department['opentickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_inc'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('DESCRIBING-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $incident_department['addressedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Described Incidents
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('CLOSED-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $incident_department['closedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_inc'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>

        <?php } ?>
        <!-- END INCIDENT OVERVIEW -->

        <!-- START grievance_page OVERVIEW -->
        <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('GRIEVANCES-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">

                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of staff grievance" style="color: inherit;"
                                href="<?php echo base_url(); ?>grievance/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_sg'); ?> </h3>
                                    <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('GRIEVANCES-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>grievance/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('TOTAL-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $grievance_department['alltickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('OPEN-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $grievance_department['opentickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('ADDRESSED-GRIEVANCES') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $grievance_department['addressedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">
                                                    <?php echo lang_loader('global', 'global_addressed_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('CLOSED-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $grievance_department['closedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>

        <?php } ?>
        <!-- END grievance_page OVERVIEW -->

        <!-- START Quality KPI overview -->
        <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed Quality Indicator Analysis" style="color: inherit;"
                                href="<?php echo base_url(); ?>quality/quality_welcome_page">
                                <span>
                                    <h3>QUALITY KPI MANAGER</h3>
                                    <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
                                        <div style="float: right; margin-top: -26px">
                                            <a class="btn btn-success btn-sm" target="_blank"
                                                style="margin-right: 10px; background: #62c52d; border-radius: 4px; border:none; font-size: 13px; width:110px;"
                                                data-placement="bottom" data-toggle="tooltip" title="Report QIM Forms"
                                                href="<?php echo base_url('/qim_forms?user_id=' . $this->session->userdata['user_id']); ?>">
                                                Record KPI
                                            </a>

                                            <a href="<?php echo base_url(); ?>quality/quality_welcome_page"
                                                class="btn btn-primary btn-sm"
                                                style="font-size:13px; float: right; margin-right: 4px; margin-top: 1px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none; width:110px;">
                                                Explore
                                            </a>
                                        </div>
                                    <?php } ?>

                                </span>
                            </a>
                        </div>

                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-toggle="tooltip"
                                            title="The total number of Key Performance Indicators(KPIs) present.">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $total_kpis; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total KPIs</div>
                                                <div class="icon">
                                                    <i class="fa fa-tachometer"></i>
                                                </div>
                                                <a href="<?php echo base_url(); ?>quality/quality_welcome_page"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The total number of KPIs recorded or performed during the month">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $kpi_conducted_count; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total KPIs Recorded</div>
                                                <div class="icon">
                                                    <i class="fa fa-check-square-o"></i>
                                                </div>
                                                <!-- <a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The number of KPIs yet to be recorded or performed.">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $remaining_kpi; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total KPIs Pending</div>
                                                <div class="icon">
                                                    <i class="fa fa-hourglass-o"></i>
                                                </div>
                                                <!-- <a href="<?php echo $ip_link_psat_page; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('QUALITY') === true && isfeature_active('QUALITY-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The percentage of KPIs recorded out of the total KPIs.">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $completion_rate; ?>
                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">KPI Recording Rate</div>
                                                <div class="icon">
                                                    <i class="fa fa-line-chart"></i>
                                                </div>
                                                <!-- <a href="<?php echo $ip_link_ticket_dashboard; ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- End quality KPI overview -->

        <!-- START audit overview -->
        <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed Quality Audit Analysis" style="color: inherit;"
                                href="<?php echo base_url(); ?>audit/audit_welcome_page">
                                <span>
                                    <h3>QUALITY AUDIT MANAGER</h3>
                                    <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
                                        <div style="float: right; margin-top: -26px">
                                            <a class="btn btn-success btn-sm" target="_blank"
                                                style="margin-right: 10px; background: #62c52d; border-radius: 4px; border:none; font-size: 13px; width:110px;"
                                                data-placement="bottom" data-toggle="tooltip" title="Report Audit Forms"
                                                href="<?php echo base_url('/audit_forms?user_id=' . $this->session->userdata['user_id']); ?>">
                                                Perform Audit
                                            </a>

                                            <a href="<?php echo base_url(); ?>audit/audit_welcome_page"
                                                class="btn btn-primary btn-sm"
                                                style="font-size:13px; float: right; margin-right: 4px; margin-top: 1px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none; width:110px;">
                                                Explore
                                            </a>
                                        </div>
                                    <?php } ?>

                                </span>
                            </a>
                        </div>

                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-toggle="tooltip"
                                            title="The total number of audits present">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $total_audits; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total Audits</div>
                                                <div class="icon">
                                                    <i class="fa fa-list-alt"></i>
                                                </div>
                                                <a href="<?php echo base_url(); ?>audit/audit_welcome_page"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The total number of audits that have been initiated or conducted during the month.">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $audit_conducted_count; ?>

                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total Audits Initiated</div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The number of audits yet to be initiated or conducted.">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $remaining_audit; ?>

                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total Audits Pending</div>
                                                <div class="icon">
                                                    <i class="fa fa-hourglass-o"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('AUDIT') === true && isfeature_active('AUDIT-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="The percentage of audits initiated out of the total audits.">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $completion_audit_rate; ?>

                                                    </span>% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Audit Initiation Ratio</div>
                                                <div class="icon">
                                                    <i class="fa fa-line-chart"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>



                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- End audit overview -->

        <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
            <div class="row">
                <?php

                // $fdate = date('Y-m-d', strtotime($_SESSION['from_date']) + 24 * 60 * 60);
                // $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
                $this->db->select("*");
                $this->db->from('bf_feedback_asset_creation');
                // $this->db->where('datetime >=', $tdate);
                // $this->db->where('datetime <=', $fdate);
                if ($_SESSION['ward'] !== 'ALL') {
                    $this->db->where('locationsite', $_SESSION['ward']);
                }
                $query = $this->db->get();
                $ASSETSresults = $query->result();

                ?>
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">

                            <a href="<?php echo base_url(); ?>asset/ticket_dashboard" data-toggle="tooltip"
                                data-placement="bottom"
                                title="This section provides an overview of asset management. Click the Explore button"
                                style="color: inherit;" href="<?php echo base_url(); ?>dashboard/swithc?type=2">
                                <span>
                                    <h3>ASSET MANAGER</h3>
                                    <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>asset/ticket_dashboard"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip">

                                            <div class="statistic-box" title="<?php echo $asset_tickets_tool; ?>">
                                                <h2><span class="count-number">
                                                        <?php echo $asset_department['alltickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Total Assets
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Total no. of hospital assets registered for use in the hospital.">
														<i class="fa fa-info-circle" aria-hidden="true"></i>
													</a> -->
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-hospital-o"></i>
                                                </div>
                                                <a href="<?php echo base_url(); ?>asset/alltickets"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>



                            <?php

                            $scheduleCount = 0;
                            $notApplicableCount = 0;
                            $overdueCount = 0;
                            $dueIn45DaysCount = 0;
                            $overDue30DaysCount = 0;
                            $dueThisMonthCount = 0;

                            // Loop through the results to calculate counts
                            if (!empty($ASSETSresults)) {
                                foreach ($ASSETSresults as $department) {
                                    $upcomingDate = $department->upcoming_preventive_maintenance_date;
                                    $assetWithPm = $department->assetWithPm;
                                    $currentDate = new DateTime();

                                    if (empty($upcomingDate)) {
                                        if (!empty($assetWithPm)) {
                                            // PM exists but no date → still considered scheduled
                                            $scheduleCount++;
                                        } else {
                                            // No PM and no date → Not Applicable
                                            $notApplicableCount++;
                                        }
                                    } else {
                                        $upcomingDateObj = new DateTime($upcomingDate);
                                        $interval = $currentDate->diff($upcomingDateObj);
                                        $daysRemaining = $interval->format('%r%a');

                                        if ($daysRemaining < -30) {
                                            $overDue30DaysCount++;
                                        } elseif ($daysRemaining < 0) {
                                            $overdueCount++;
                                        } elseif ($daysRemaining <= 30 && $currentDate->format('Y-m') == $upcomingDateObj->format('Y-m')) {
                                            $dueThisMonthCount++;
                                        } elseif ($daysRemaining > 30 && $daysRemaining <= 45) {
                                            $dueIn45DaysCount++;
                                        } else {
                                            $scheduleCount++;
                                        }
                                    }
                                }
                            }

                            $applicableCount = $scheduleCount + $overdueCount + $dueIn45DaysCount + $dueThisMonthCount + $overDue30DaysCount;

                            ?>

                            <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip">
                                            <div class="statistic-box"
                                                title="<?php echo 'Maintenance Scheduled: ' . $scheduleCount . ', Due this Month: ' . $dueThisMonthCount . ', Due in 45 Days: ' . $dueIn45DaysCount . ', Maintenance Overdue: ' . $overdueCount . ', Overdue by 30+ Days: ' . $overDue30DaysCount; ?>">
                                                <h2><span class="count-number">
                                                        <?php echo $applicableCount; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">PM applicable assets
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Represents the total count of assets requiring preventive maintenance.">
														<i class="fa fa-info-circle" aria-hidden="true"></i>
													</a> -->
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                            <?php
                            $totalNoWarranty = 0;
                            $totalExpired30Days = 0;
                            $totalExpired = 0;
                            $totalExpiresThisMonth = 0;
                            $totalExpiringSoon = 0;
                            $totalWarrantyActive = 0;

                            if (!empty($ASSETSresults)) {
                                foreach ($ASSETSresults as $department) {
                                    $warrantyEndDate = $department->warrenty_end;
                                    $assetWithWarranty = $department->assetWithWarranty;
                                    $currentDate = new DateTime();

                                    if (empty($warrantyEndDate)) {
                                        if (!empty($assetWithWarranty)) {
                                            // Warranty exists but end date is not set → still considered active
                                            $totalWarrantyActive++;
                                        } else {
                                            $totalNoWarranty++; // Truly no warranty
                                        }
                                    } else {
                                        $warrantyEndDateObj = new DateTime($warrantyEndDate);
                                        $interval = $currentDate->diff($warrantyEndDateObj);
                                        $daysRemaining = (int) $interval->format('%r%a'); // Negative if expired, positive if active

                                        if ($daysRemaining < -30) {
                                            $totalExpired30Days++;
                                        } elseif ($daysRemaining < 0) {
                                            $totalExpired++;
                                        } elseif ($daysRemaining <= 30 && $currentDate->format('Y-m') == $warrantyEndDateObj->format('Y-m')) {
                                            $totalExpiresThisMonth++;
                                        } elseif ($daysRemaining > 30 && $daysRemaining <= 90) {
                                            $totalExpiringSoon++;
                                        } else {
                                            $totalWarrantyActive++;
                                        }
                                    }
                                }
                            }

                            $applicableWarrantyCount = $totalWarrantyActive + $totalExpired + $totalExpired30Days + $totalExpiresThisMonth + $totalExpiringSoon;


                            ?>


                            <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip">
                                            <div class="statistic-box"
                                                title="<?php echo 'Warranty Active: ' . $totalWarrantyActive . ', Expiring this Month: ' . $totalExpiresThisMonth . ', Expiring within 90 days: ' . $totalExpiringSoon . ', Warranty Expired: ' . $totalExpired . ', Expired 30+ Days: ' . $totalExpired30Days; ?>">
                                                <h2><span class="count-number">
                                                        <?php echo $applicableWarrantyCount; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Warranty applicable assets
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Represents the total number of assets for which warranty is applicable.">
														<i class="fa fa-info-circle" aria-hidden="true"></i>
													</a> -->
                                                </div>

                                                <div class="icon">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </div>
                                                <!-- <a href="<?php echo base_url(); ?>asset/asset_warranty_reports?status=Warranty+Active" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>



                            <?php
                            $totalNoContract = 0;
                            $totalExpired30Days = 0;
                            $totalExpired = 0;
                            $totalExpiresThisMonth = 0;
                            $totalExpiringSoon = 0;
                            $totalContractActive = 0;

                            // Loop through the results to calculate counts
                            if (!empty($ASSETSresults)) {
                                foreach ($ASSETSresults as $department) {
                                    $contractEndDate = $department->contract_end_date;
                                    $assetWithAmc = $department->assetWithAmc;
                                    $currentDate = new DateTime();

                                    if (empty($contractEndDate)) {
                                        if (!empty($assetWithAmc)) {
                                            $totalContractActive++; // AMC exists but end date missing → consider active
                                        } else {
                                            $totalNoContract++; // No AMC and no date
                                        }
                                    } else {
                                        $contractEndDateObj = new DateTime($contractEndDate);
                                        $interval = $currentDate->diff($contractEndDateObj);
                                        $daysRemaining = (int) $interval->format('%r%a'); // Negative if expired

                                        if ($daysRemaining < -30) {
                                            $totalExpired30Days++;
                                        } elseif ($daysRemaining < 0) {
                                            $totalExpired++;
                                        } elseif ($daysRemaining <= 30 && $currentDate->format('Y-m') == $contractEndDateObj->format('Y-m')) {
                                            $totalExpiresThisMonth++;
                                        } elseif ($daysRemaining > 30 && $daysRemaining <= 90) {
                                            $totalExpiringSoon++;
                                        } else {
                                            $totalContractActive++;
                                        }
                                    }
                                }
                            }

                            $applicableContractCount = $totalContractActive + $totalExpired + $totalExpired30Days + $totalExpiresThisMonth + $totalExpiringSoon;

                            ?>
                            <?php if (ismodule_active('ASSET') === true && isfeature_active('ASSET-DASHBOARD') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip">
                                            <div class="statistic-box"
                                                title="<?php echo "Contract Active: " . $totalContractActive . ', Expires this Month: ' . $totalExpiresThisMonth . ', Expiring within 90 days: ' . $totalExpiringSoon . ', Contract Expired: ' . $totalExpired . ', Expired 30+ Days: ' . $totalExpired30Days; ?>">
                                                <h2><span class="count-number">
                                                        <?php echo $applicableContractCount; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">AMC/CMC applicable assets
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Represents the total number of assets under an active annual or comprehensive maintenance contract.">
														<i class="fa fa-info-circle" aria-hidden="true"></i>
													</a> -->
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </div>
                                                <!-- <a href="<?php echo base_url(); ?>asset/asset_contract_reports?status=Contract+Active&amc_status=all" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>
        <?php } ?>


    <?php } ?>


    <?php if ($this->session->userdata['user_role'] == 7) { ?>
        <!-- if dephead has access to admission feedback tickets -->
        <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of patient complaints and requests"
                                style="color: inherit;" href="<?php echo base_url(); ?>admissionfeedback/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_adf_tickets'); ?> </h3>
                                    <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-TICKETS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>admissionfeedback/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>

                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-TOTAL-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $adf_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/alltickets'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-OPEN-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $adf_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-ADDRESSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $adf_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ADF') === true && isfeature_active('ADF-CLOSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $adf_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $adf_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Close Metric Boxes-->
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>


        <?php } ?>

        <!-- if dephead has access to ipfeedback tickets -->
        <?php if (ismodule_active('IP') === true && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Inpatient discharge feedbacks"
                                style="color: inherit;" href="<?php echo base_url(); ?>ipd/department_tickets">

                                <span>
                                    <h3><?php echo lang_loader('global', 'global_ip_tickets'); ?></h3>
                                    <?php if (ismodule_active('IP') === true && isfeature_active('IP-TICKETS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>ipd/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-TOTAL-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $ip_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-OPEN-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $ip_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-ADDRESSED-TICKETS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $ip_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('IP') === true && isfeature_active('IP-CLOSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $ip_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $ip_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Close Metric Boxes-->
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- if dephead has access to patient complaints -->
        <?php if (ismodule_active('PCF') === true && isfeature_active('COMPLAINTS-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of patient complaints and requests"
                                style="color: inherit;" href="<?php echo base_url(); ?>pc/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_patient_complaints'); ?> </h3>
                                    <?php if (ismodule_active('PCF') === true && isfeature_active('COMPLAINTS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>pc/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('PCF') === true && isfeature_active('TOTAL-COMPLAINTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $int_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $int_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/alltickets'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PCF') === true && isfeature_active('OPEN-COMPLAINTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $int_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $int_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('PCF') === true && isfeature_active('ADDRESSED-COMPLAINTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $int_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small">
                                                    <?php echo lang_loader('global', 'global_addressed_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $int_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PCF') === true && isfeature_active('CLOSED-COMPLAINTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $int_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_complaints'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $int_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <!-- Close Metric Boxes-->
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>


        <?php } ?>

        <!-- if dephead has access to pdf tickets -->
        <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Inpatient discharge feedbacks"
                                style="color: inherit;" href="<?php echo base_url(); ?>post/department_tickets">

                                <span>
                                    <h3><?php echo lang_loader('global', 'global_pdf_tickets'); ?></h3>
                                    <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-TICKETS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>post/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-TOTAL-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $pdf_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-OPEN-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $pdf_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-ADDRESSED-TICKETS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $pdf_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('PDF') === true && isfeature_active('PDF-CLOSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $pdf_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $pdf_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Close Metric Boxes-->
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- if dephead has access to outpatient feedback tickets -->
        <?php if (ismodule_active('OP') === true && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of Outpatient feedbacks" style="color: inherit;"
                                href="<?php echo base_url(); ?>opf/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_op_tickets'); ?></h3>
                                    <?php if (ismodule_active('OP') === true && isfeature_active('OP-TICKETS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>opf/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-TOTAL-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $op_department['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $op_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-OPEN-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $op_department['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $op_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-ADDRESSED-TICKETS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $op_department['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_tickets'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $op_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('OP') === true && isfeature_active('OP-CLOSED-TICKETS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span class="count-number"><?php echo $op_department['closedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'Closed Tickets'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $op_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <!-- Close Metric Boxes-->
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- if dephead has access to internal service requests -->
        <?php if (ismodule_active('ISR') === true && isfeature_active('REQUESTS-DASHBOARD') === true) { ?>

            <?php include 'overallpage_department_user_count.php'; ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">
                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of employee requests" style="color: inherit;"
                                href="<?php echo base_url(); ?>isr/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_isr'); ?></h3>
                                    <?php if (ismodule_active('ISR') === true && isfeature_active('REQUESTS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>isr/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:135px; max-height:150px;">
                            <?php if (ismodule_active('ISR') === true && isfeature_active('TOTAL-REQUESTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $isr_department_head_user_count['alltickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('ISR') === true && isfeature_active('OPEN-REQUESTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $isr_department_head_user_count['opentickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small">Assigned Requests </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('ISR') === true && isfeature_active('ADDRESSED-REQUESTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $isr_department_head_user_count['addressedtickets']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_addressed_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                                <!-- <a href="<?php echo base_url('tickets/ticket_close'); ?>" style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('ISR') === true && isfeature_active('CLOSED-REQUESTS') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;">
                                            <div class="statistic-box">
                                                <h2><span
                                                        class="count-number"><?php echo $isr_department_head_user_count['closedticket']; ?></span>
                                                    <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span>
                                                </h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_requests'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $esr_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Close Metric Boxes-->
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>










        <!-- START INCIDENT OVERVIEW -->
        <?php if (ismodule_active('INCIDENT') === true && isfeature_active('INCIDENTS-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">

                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of incidents" style="color: inherit;"
                                href="<?php echo base_url(); ?>incident/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_inc'); ?></h3>
                                    <?php if (ismodule_active('INCIDENT') === true && isfeature_active('INCIDENTS-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>incident/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('TOTAL-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $esr_tickets_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $incident_department['alltickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_inc'); ?></div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('OPEN-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $incident_department['opentickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_inc'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('DESCRIBING-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $incident_department['addressedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">Described Incidents
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (ismodule_active('INCIDENT') === true && isfeature_active('CLOSED-INCIDENTS') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $incident_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $incident_department['closedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_inc'); ?> </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $incident_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>

        <?php } ?>
        <!-- END INCIDENT OVERVIEW -->

        <!-- START grievance_page OVERVIEW -->
        <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('GRIEVANCES-DASHBOARD') === true) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow:auto;">
                        <div class="panel-heading">

                            <a data-toggle="tooltip" data-placement="bottom"
                                title="Click here for detailed analysis of staff grievance" style="color: inherit;"
                                href="<?php echo base_url(); ?>grievance/department_tickets">
                                <span>
                                    <h3><?php echo lang_loader('global', 'global_sg'); ?> </h3>
                                    <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('GRIEVANCES-DASHBOARD') === true) { ?><a
                                            href="<?php echo base_url(); ?>grievance/department_tickets"
                                            style="float: right;margin-top: -27px; background: #8791a4; color: #fff; border: none; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Explore</a><?php } ?>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body" style="height:120px; max-height:120px;">
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('TOTAL-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">

                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $grievance_department['alltickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_total_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-ticket"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_alltickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('OPEN-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $grievance_department['opentickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_open_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_opentickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('ADDRESSED-GRIEVANCES') === true) { ?>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $grievance_department['addressedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small">
                                                    <?php echo lang_loader('global', 'global_addressed_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-reply"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_addressedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (ismodule_active('GRIEVANCE') === true && isfeature_active('CLOSED-GRIEVANCES') === true) { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                    <div class="panel panel-bd">
                                        <div class="panel-body" style="height: 100px;" data-placement="top" data-toggle="tooltip"
                                            title="<?php echo $grievance_tickets_tool; ?>">
                                            <div class="statistic-box">
                                                <h2><span class="count-number">
                                                        <?php echo $grievance_department['closedtickets']; ?>
                                                    </span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning">
                                                        </i></span></h2>
                                                <div class="small"><?php echo lang_loader('global', 'global_closed_grievance'); ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check-circle-o"></i>
                                                </div>
                                                <a href="<?php echo $grievance_link_closedtickets; ?>"
                                                    style="float: right;    margin-top: -9px;"><?php echo lang_loader('global', 'global_view_list'); ?></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Close Metric Boxes-->
                    </div>
                </div>
            </div>

        <?php } ?>
        <!-- END grievance_page OVERVIEW -->
    <?php } ?>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var typed = new Typed(".typing-text", {
            strings: ["<?php echo $welcometext; ?>"],
            // delay: 10,
            loop: false,
            typeSpeed: 30,
            backSpeed: 5,
            backDelay: 1000,
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var typed = new Typed(".typing-text2", {
            strings: ["<?php echo $welcometext2; ?>"],
            // delay: 10,
            loop: false,
            typeSpeed: 30,
            backSpeed: 5,
            backDelay: 1000,
        });
    });
</script>