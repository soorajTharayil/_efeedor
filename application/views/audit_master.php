<?php //echo lang_loader('ip','ip_allfeedbacks_dashboard'); exit; 
require_once 'audit_tables.php';
?>

<div class="content">


    <?php
    $audit_frequency_by_title = [];
    $freq_rows = $this->db->get('bf_audit_frequency')->result_array();
    foreach ($freq_rows as $r) {
        $key = strtolower(trim($r['title'] ?? ''));
        if ($key !== '') {
            $audit_frequency_by_title[$key] = [
                'audit_type' => $r['audit_type'] ?? '-',
                'frequency'  => $r['frequency'] ?? '-',
                'target'  => $r['target'] ?? '-',
                'bed_no'  => $r['bed_no'] ?? '-',


            ];
        }
    }


    function metaFor($displayTitle, $map)
    {
        $k = strtolower(trim($displayTitle));
        return $map[$k] ?? ['audit_type' => '-', 'frequency' => '-', 'target' => '-', 'bed_no' => '-'];
    }

    // 3) Common params
    $fdate = $_SESSION['from_date'];
    $tdate = $_SESSION['to_date'];
    $table_patients = 'bf_patients';
    $sorttime = 'asc';
    $setup = 'setup';
    ?>

    <div class="row" title="<?php echo $initial_assesment_info_tooltip; ?>">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-bordered table-striped" style="width: 70%;">
                <thead>
                    <tr>
                        <th style="width: 30%;">Audit Name</th>
                        <!-- <th style="width: 13%;">Audit Type</th>
                        <th>Audit Custdians</th> -->
                        <th style="width: 20%;">Total Conducted</th>
                        <th style="width: 20%;">View</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (isfeature_active('AUDIT-FORM1') === true) {
                        $title = 'Active Cases MRD Audit-IP';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_active_cases_mrdip', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_active_cases_mrd; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <!-- <td>
                            <?php
                            $targetRaw = $meta['target'];
                            $frequency = strtolower(trim($meta['frequency']));
                            $conducted = count($cnt);
                            $target    = 0;
                            $output    = '-';

                            $targetNum = (int) filter_var($targetRaw, FILTER_SANITIZE_NUMBER_INT);

                            $shortCycle = ['daily', 'weekly', 'twice a week', 'fortnightly (once in two weeks)', 'monthly', 'random audit'];

                            if (in_array($frequency, $shortCycle)) {
                                $target = $targetNum;
                                if ($target > 0) {
                                    $percent = round(($conducted / $target) * 100, 2);
                                    $output = $percent . '%';
                                }
                            } elseif (in_array($frequency, ['quarterly', 'half-yearly', 'annual', 'yearly'])) {
                                if ($frequency === 'quarterly') {
                                    $target = ceil($targetNum / 4);
                                } elseif ($frequency === 'half-yearly') {
                                    $target = ceil($targetNum / 2);
                                } else {
                                    $target = $targetNum;
                                }

                                if ($target > 0) {
                                    if ($conducted >= $target) {
                                        $output = '<span style="color:green;font-weight:bold;">Met</span> (' . $conducted . '/' . $target . ')';
                                    } else {
                                        $output = '<span style="color:red;font-weight:bold;">Not Met</span> (' . $conducted . '/' . $target . ')';
                                    }
                                }
                            }

                            echo $output;
                            ?>
                            </td> -->
                            <td>
                                <a href="<?php echo $feedbacks_report_active_cases_mrd; ?>"
                                    class="btn btn-info btn-sm">
                                    View Details
                                </a>
                            </td>

                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM2') === true) {
                        $title = 'Discharged Patients MRD Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_dischargedpatients_mrd_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_discharged_patients_mrd; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_discharged_patients_mrd; ?>" class="btn btn-info btn-sm">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM3') === true) {
                        $title = 'Nursing (IP Closed Cases)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_nursingip_closed_cases', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_nursing_ip_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_nursing_ip_closed; ?>" class="btn btn-info btn-sm">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM4') === true) {
                        $title = 'Nursing (IP Open Cases)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_nursingip_open_cases', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_nursing_ip_open; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_nursing_ip_open; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM5') === true) {
                        $title = 'Nursing (OP Closed Cases)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_nursingop_closed_cases', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_nursing_op_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_nursing_op_closed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM6') === true) {
                        $title = 'Clinical Dietetics (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_active_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_active_mdc; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_active_mdc; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM7') === true) {
                        $title = 'Clinical Dietetics (Closed Cases)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_closedcases_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_closed_mdc; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_closed_mdc; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM8') === true) {
                        $title = 'Clinical Pharmacy-(Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pharmacy_closed', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pharmacy_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pharmacy_closed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM9') === true) {
                        $title = 'Clinical Pharmacy-(OP)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pharmacy_op', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pharmacy_op; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pharmacy_op; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM10') === true) {
                        $title = 'Clinical Pharmacy-(Open)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pharmacy_open', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pharmacy_open; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pharmacy_open; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>



                    <?php if (isfeature_active('AUDIT-FORM11') === true) {
                        $title = 'Clinicians-Anesthesia(Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_anesthesia_active_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_anesthesia_active; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_anesthesia_active; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM12') === true) {
                        $title = 'Clinicians-Anesthesia(Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_anesthesia_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_anesthesia_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_anesthesia_closed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM13') === true) {
                        $title = 'Clinicians-ED (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ed_active_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_ed_active; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_ed_active; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM14') === true) {
                        $title = 'Clinicians-ED (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ed_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_ed_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_ed_closed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM15') === true) {
                        $title = 'Clinicians-ICU (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_icu_active_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_icu_active; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_icu_active; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM16') === true) {
                        $title = 'Clinicians-ICU (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_icu_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_icu_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_icu_closed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM17') === true) {
                        $title = 'Clinicians-Primary Care Provider (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_primarycare_active_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_primarycare_active; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_primarycare_active; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM18') === true) {
                        $title = 'Clinicians-Primary Care Provider (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_primarycare_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_primarycare_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_primarycare_closed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM19') === true) {
                        $title = 'Clinicians-Sedation (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_sedation_active_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_sedation_active; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_sedation_active; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM20') === true) {
                        $title = 'Clinicians-Sedation (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_sedation_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_sedation_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_sedation_closed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>



                    <?php if (isfeature_active('AUDIT-FORM21') === true) {
                        $title = 'Clinicians-Surgeons (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_surgeons_active_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_surgeons_active; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_surgeons_active; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM22') === true) {
                        $title = 'Clinicians-Surgeons (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_surgeons_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_surgeons_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_surgeons_closed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM23') === true) {
                        $title = 'Diet Consultation (OP)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_dietconsultation_op_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_diet_consultation_op; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_diet_consultation_op; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM24') === true) {
                        $title = 'Physiotherapy- (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_physiotherapy_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_physiotherapy_closed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_physiotherapy_closed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM25') === true) {
                        $title = 'Physiotherapy- (OP)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_physiotherapy_op_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_physiotherapy_op; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_physiotherapy_op; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM26') === true) {
                        $title = 'Physiotherapy- (Open)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_physiotherapy_open_mdc', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_physiotherapy_open; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_physiotherapy_open; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM27') === true) {
                        $title = 'MRD Audit- ED';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_mrd_ed_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_mrd_ed; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_mrd_ed; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM28') === true) {
                        $title = 'MRD Audit- LAMA';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_mrd_lama_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_mrd_lama; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_mrd_lama; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM29') === true) {
                        $title = 'MRD Audit- OP';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_mrd_op_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_mrd_op; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_mrd_op; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM30') === true) {
                        $title = 'Accidental Delining Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_accidental_delining_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_accidental_delining; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_accidental_delining; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM31') === true) {
                        $title = 'Admission Holding Area Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_admission_area_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_admission_holding_area; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_admission_holding_area; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM32') === true) {
                        $title = 'CPR Analysis Record';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_cardio_pulmonary_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_cardio_pulmonary; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_cardio_pulmonary; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM33') === true) {
                        $title = 'Extravasation Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_extravasation_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_extravasation_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_extravasation_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM34') === true) {
                        $title = 'Hospital Acquired Pressure Ulcers (HAPU) Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_hapu_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_hapu_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_hapu_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM35') === true) {
                        $title = 'Initial Assessment Accident and Emergency (A&E)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_assessment_ae', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_initial_assessment_ae; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_initial_assessment_ae; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>



                    <?php if (isfeature_active('AUDIT-FORM36') === true) {
                        $title = 'Initial Assessment IPD';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_assessment_ipd', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_initial_assessment_ipd; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_initial_assessment_ipd; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM37') === true) {
                        $title = 'Initial Assessment OPD';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_assessment_opd', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_initial_assessment_opd; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_initial_assessment_opd; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM38') === true) {
                        $title = 'IPSG-1';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg1_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_ipsg1; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_ipsg1; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM101') === true) {
                        $title = 'IPSG2- ER';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg2_er', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_ipsg2_er; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_ipsg2_er; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM39') === true) {
                        $title = 'IPSG2- A&E';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg2_ae', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_ipsg2_ae; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_ipsg2_ae; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM40') === true) {
                        $title = 'IPSG2- IPD';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg2_ipd', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_ipsg2_ipd; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_ipsg2_ipd; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM41') === true) {
                        $title = 'IPSG4-Timeout- Outside OT Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg4_timeout', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_ipsg4_timeout; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_ipsg4_timeout; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM42') === true) {
                        $title = 'IPSG6- IP';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg6_ip', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_ipsg6_ip; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_ipsg6_ip; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM43') === true) {
                        $title = 'IPSG6- OPD';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg6_opd', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_ipsg6_opd; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_ipsg6_opd; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM44') === true) {
                        $title = 'Point Prevalence Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_point_prevlance_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_point_prevelance; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_point_prevelance; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM45') === true) {
                        $title = 'ACL';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_audit_acl', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_audit_acl; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_audit_acl; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM46') === true) {
                        $title = 'Allogenic Bone-marrow Transplantation';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_allogenic_bone_marrow', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_allogenic_bone_marrow; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_allogenic_bone_marrow; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM47') === true) {
                        $title = 'Aortic Valve Replacement (AVR)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_aortic_value_replacement', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_aortic_value_replacement; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_aortic_value_replacement; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM48') === true) {
                        $title = 'Autologous Bone-marrow transplantation';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_autologous_bone', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_autologous_bone; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_autologous_bone; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM49') === true) {
                        $title = 'Brain Tumour Surgery';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_brain_tumour', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_brain_tumour; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_brain_tumour; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM50') === true) {
                        $title = 'CABG';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_cabg', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_cabg; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_cabg; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>



                    <?php if (isfeature_active('AUDIT-FORM51') === true) {
                        $title = 'Carotid Stenting';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_carotid_stenting', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_carotid_stenting; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_carotid_stenting; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM52') === true) {
                        $title = 'Chemotherapy (Medical oncology)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_chemotherapy', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_chemotherapy; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_chemotherapy; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM53') === true) {
                        $title = 'Colo-Rectal Surgeries';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_colo_rectal', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_colo_rectal; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_colo_rectal; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM54') === true) {
                        $title = 'Endoscopy';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_endoscopy', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_endoscopy; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_endoscopy; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM55') === true) {
                        $title = 'Epilepsy';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_epilepsy', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_epilepsy; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_epilepsy; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM56') === true) {
                        $title = 'Herniorrhaphy';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_herniorrhaphy', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_herniorrhaphy; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_herniorrhaphy; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM57') === true) {
                        $title = 'HoLEP';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_holep', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_holep; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_holep; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM58') === true) {
                        $title = 'Laparoscopic Appendicectomy';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_laparoscopic_appendicectomy', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_laparoscopic; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_laparoscopic; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM59') === true) {
                        $title = 'Mechanical Thrombectomy';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_mechanical_thrombectomy', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_mechanical_thrombectomy; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_mechanical_thrombectomy; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM60') === true) {
                        $title = 'MVR (Mitral Valve replacement)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_mvr', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_mvr; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_mvr; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM61') === true) {
                        $title = 'PTCA';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_ptca', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_ptca; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_ptca; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM62') === true) {
                        $title = 'Renal Transplantation';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_renal_transplantation', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_renal_transplantation; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_renal_transplantation; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM63') === true) {
                        $title = 'Scoliosis correction surgery';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_scoliosis_correction', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_scoliosis_correction; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_scoliosis_correction; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM64') === true) {
                        $title = 'Spinal Dysraphism';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_spinal_dysraphism', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_spinal_dysraphism; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_spinal_dysraphism; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM65') === true) {
                        $title = 'Spine and Disc Surgery-Fusion procedures';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_spine_disc_surgery', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_spine_disc_surgery; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_spine_disc_surgery; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>



                    <?php if (isfeature_active('AUDIT-FORM66') === true) {
                        $title = 'Thoracotomy';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_thoracotomy', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_thoracotomy; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_thoracotomy; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM67') === true) {
                        $title = 'TKR';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_tkr', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_tkr; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_tkr; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM68') === true) {
                        $title = 'Uro-oncology procedures';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_uro_oncology', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_uro_oncology; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_uro_oncology; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM69') === true) {
                        $title = 'Whipples Surgery';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_whipples_surgery', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_whipples_surgery; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_whipples_surgery; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM70') === true) {
                        $title = 'Laparoscopic Cholecystectomy';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicaloutcome_laparoscopic_cholecystectomy', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_laparoscopic_cholecystectomy; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_laparoscopic_cholecystectomy; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM71') === true) {
                        $title = 'Bronchodilators Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicalkpi_bronchodilators_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinicalkpi_bronchodilators; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinicalkpi_bronchodilators; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM72') === true) {
                        $title = 'COPD Protocol Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinicalkpi_copd_protocol_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinicalkpi_copd_protocol; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinicalkpi_copd_protocol; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM73') === true) {
                        $title = 'Biomedical Waste Management Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_biomedical_waste', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_biomedical_waste; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_biomedical_waste; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM74') === true) {
                        $title = 'Canteen Audit checklist';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_canteen_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_canteen_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_canteen_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM75') === true) {
                        $title = 'CSSD audit checklist';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_cssd_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_cssd_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_cssd_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM76') === true) {
                        $title = 'Hand Hygiene Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_hand_hygiene', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_hand_hygiene; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_hand_hygiene; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM77') === true) {
                        $title = 'Infection control bundle audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_bundle_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_bundle_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_bundle_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM78') === true) {
                        $title = 'Infection Control OT audit checklist';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_ot_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_ot_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_ot_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM79') === true) {
                        $title = 'Linen Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_linen_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_linen_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_linen_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM80') === true) {
                        $title = 'Ambulance PCI Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_ambulance_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_ambulance_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_ambulance_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>



                    <?php if (isfeature_active('AUDIT-FORM81') === true) {
                        $title = 'CoffeeShop PCI Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_coffee_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_coffee_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_coffee_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM82') === true) {
                        $title = 'Laboratory PCI Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_laboratory_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_laboratory_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_laboratory_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM83') === true) {
                        $title = 'Mortuary PCI Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_mortuary_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_mortuary_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_mortuary_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM84') === true) {
                        $title = 'Radiology PCI Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_radiology_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_radiology_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_radiology_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM85') === true) {
                        $title = 'SSI Surveillance checklist';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_ssi_survelliance_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_ssi_survelliance_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_ssi_survelliance_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM86') === true) {
                        $title = 'IV cannula audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_peripheralivline_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_peripheralivline_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_peripheralivline_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM87') === true) {
                        $title = 'Personal Protective Equipment Usage audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_personalprotective_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_personalprotective_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_personalprotective_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM88') === true) {
                        $title = 'Safe Injection and Infusion Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_safe_injection_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_safe_injection_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_safe_injection_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM89') === true) {
                        $title = 'Surface cleaning and disinfection effectiveness monitoring record';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_infection_control_surface_cleaning_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_infection_control_surface_cleaning_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_infection_control_surface_cleaning_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM90') === true) {
                        $title = 'Arthroscopic Anterior Cruciate Ligament Reconstruction Surgery';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_arthroscopic_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_arthroscopic_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_arthroscopic_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>



                    <?php if (isfeature_active('AUDIT-FORM91') === true) {
                        $title = 'Breast Lump Consensus Guidelines';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_breast_lump_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_breast_lump_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_breast_lump_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM92') === true) {
                        $title = 'Cardiac Arrest';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_cardiac_arrest_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_cardiac_arrest_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_cardiac_arrest_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM93') === true) {
                        $title = 'Donor Hepatectomy';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_donor_hepatectomy_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_donor_hepatectomy_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_donor_hepatectomy_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM94') === true) {
                        $title = 'Febrile Seizure';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_febrile_seizure_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_febrile_seizure_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_febrile_seizure_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM95') === true) {
                        $title = 'Heart Transplant Recipient';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_heart_transplant_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_heart_transplant_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_heart_transplant_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM96') === true) {
                        $title = 'Laparoscopic Donor Nephrectomy';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_laproscopic_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_laproscopic_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_laproscopic_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM97') === true) {
                        $title = 'PICC LINE Insertion';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_picc_line_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_picc_line_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
        <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_picc_line_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM98') === true) {
                        $title = 'Stroke';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_stroke_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_stroke_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_stroke_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM99') === true) {
                        $title = 'Urodynamics';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_urodynamics_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_urodynamics_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_urodynamics_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                    <?php if (isfeature_active('AUDIT-FORM100') === true) {
                        $title = 'STEMI-Primary PCI Clinical Pathway';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pathway_stemi_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_clinical_pathway_stemi_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_clinical_pathway_stemi_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM102') === true) {
                        $title = 'Biomedical Waste Collection Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_bmw_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_bmw_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_bmw_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM103') === true) {
                        $title = 'Pest Control Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_pest_control_audit', $sorttime, $setup);
                    ?>
                        <tr onclick="window.location='<?php echo $feedbacks_report_pest_control_audit; ?>'" style="cursor:pointer;">
                            <td><?php echo $title; ?></td>
                            <!-- <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td> -->
                            <td><?php echo count($cnt); ?></td>
                            <td>
                                <a href="<?php echo $feedbacks_report_pest_control_audit; ?>" class="btn btn-info btn-sm">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>





</div>

<style>
    .icon .fa {
        font-size: 55px;
    }

    .chart-container {
        justify-content: center;
        /* Align the chart horizontally in the center */
        align-items: center;
        /* Align the chart vertically in the center */
        width: 460px !important;
        margin: 0px auto;
        height: 450px;
        width: 200px;
    }

    .coment-cloud {
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: auto;
        /* width: 100%;
			height: 50%; */
        margin-bottom: 5px;
        margin-top: 5px;
    }


    .progress {
        margin-bottom: 10px;
    }

    .mybarlength {
        text-align: right;
        margin-right: 18px;
        font-weight: bold;
    }

    .panel-body {
        height: 531px;
    }

    .bar_chart {
        justify-content: center;
        /* Align the chart horizontally in the center */
        align-items: center;
        /* Align the chart vertically in the center */
        /* width: 460px !important; */
        margin: 0px auto;
        height: 500px;
        width: 1024px;
    }


    .line_chart {
        justify-content: center;
        /* Align the chart horizontally in the center */
        align-items: center;
        /* Align the chart vertically in the center */
        /* width: 460px !important; */
        margin: 0px auto;
        height: 270px;
        width: 200px;
    }

    .dropdown-menu>li>a {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 100%;
        display: block;
        /* Ensure the anchor element takes up full width */
    }


    .dropdown-menu>.li {
        width: 100%;
        border: 0px;
        border-bottom: 1px solid #ccc;
        text-align: left;
    }

    @media screen and (max-width: 1024px) {
        #pie_donut {
            overflow-x: scroll;
        }

        #bar {
            overflow-x: scroll;
        }

        #word {
            overflow-x: scroll;
        }

        #line {
            overflow-x: scroll;
            overflow-y: scroll;
        }
    }

    /* Default: hide the icon */
    .icon.large-screen-only {
        display: none;
    }

    /* Show the icon only on large screens */
    @media (min-width: 992px) {
        .icon.large-screen-only {
            display: block;
        }
    }
</style>