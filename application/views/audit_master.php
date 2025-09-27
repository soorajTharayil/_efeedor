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
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 25%;">Audit Name</th>
                        <th style="width: 13%;">Audit Type</th>
                        <th>Audit Custdians</th>
                        <th>Total Conducted</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (isfeature_active('AUDIT-FORM1') === true) {
                        $title = 'Active Cases MRD Audit-IP';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_active_cases_mrdip', $sorttime, $setup);
                    ?>
                        <tr>
                            <td title="<?php echo $initial_assesment_info_tooltip; ?>"><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
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


                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM2') === true) {
                        $title = 'Discharged Patients MRD Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_dischargedpatients_mrd_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td title="<?php echo $report_error_info_tooltip; ?>"><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                            <!-- <td>
                                <?php
                                $targetRaw = $meta['target'];        // e.g. "4/year" or "12/month"
                                $frequency = strtolower(trim($meta['frequency']));
                                $conducted = count($cnt);
                                $target    = 0;
                                $output    = '-';

                                // extract numeric target
                                $targetNum = (int) filter_var($targetRaw, FILTER_SANITIZE_NUMBER_INT);

                                // --- short-cycle frequencies → percentage ---
                                $shortCycle = ['daily', 'weekly', 'twice a week', 'fortnightly (once in two weeks)', 'monthly', 'random audit'];

                                if (in_array($frequency, $shortCycle)) {
                                    $target = $targetNum;
                                    if ($target > 0) {
                                        $percent = round(($conducted / $target) * 100, 2);
                                        $output = $percent . '%';
                                    }

                                    // --- long-cycle frequencies → conducted/target ---
                                } elseif (in_array($frequency, ['quarterly', 'half-yearly', 'annual', 'yearly'])) {
                                    if ($frequency === 'quarterly') {
                                        $target = ceil($targetNum / 4);
                                    } elseif ($frequency === 'half-yearly') {
                                        $target = ceil($targetNum / 2);
                                    } else { // annual/yearly
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
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM3') === true) { // same flag per your original
                        $title = 'Nursing (IP Closed Cases)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_nursingip_closed_cases', $sorttime, $setup);
                    ?>
                        <tr>
                            <td title="<?php echo $report_error_info_tooltip; ?>"><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                            <!-- <td>
                                <?php
                                $targetRaw = $meta['target'];        // e.g. "4/year" or "12/month"
                                $frequency = strtolower(trim($meta['frequency']));
                                $conducted = count($cnt);
                                $target    = 0;
                                $output    = '-';

                                // extract numeric target
                                $targetNum = (int) filter_var($targetRaw, FILTER_SANITIZE_NUMBER_INT);

                                // --- short-cycle frequencies → percentage ---
                                $shortCycle = ['daily', 'weekly', 'twice a week', 'fortnightly (once in two weeks)', 'monthly', 'random audit'];

                                if (in_array($frequency, $shortCycle)) {
                                    $target = $targetNum;
                                    if ($target > 0) {
                                        $percent = round(($conducted / $target) * 100, 2);
                                        $output = $percent . '%';
                                    }

                                    // --- long-cycle frequencies → conducted/target ---
                                } elseif (in_array($frequency, ['quarterly', 'half-yearly', 'annual', 'yearly'])) {
                                    if ($frequency === 'quarterly') {
                                        $target = ceil($targetNum / 4);
                                    } elseif ($frequency === 'half-yearly') {
                                        $target = ceil($targetNum / 2);
                                    } else { // annual/yearly
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
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM4') === true) {
                        $title = 'Nursing (IP Open Cases)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_nursingip_open_cases', $sorttime, $setup);
                    ?>
                        <tr>
                            <td title="<?php echo $safety_precautions_info_tooltip; ?>"><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>

                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM5') === true) {
                        $title = 'Nursing (OP Closed Cases)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_nursingop_closed_cases', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM6') === true) {
                        $title = 'Clinical Dietetics (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_active_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM7') === true) {
                        $title = 'Clinical Dietetics (Closed Cases)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_closedcases_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM8') === true) {
                        $title = 'Clinical Pharmacy-(Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pharmacy_closed', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM9') === true) {
                        $title = 'Clinical Pharmacy-(OP)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pharmacy_op', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM10') === true) {
                        $title = 'Clinical Pharmacy-(Open)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_clinical_pharmacy_open', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM11') === true) {
                        $title = 'Clinicians-Anesthesia(Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_anesthesia_active_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM12') === true) {
                        $title = 'Clinicians-Anesthesia(Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_anesthesia_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM13') === true) {
                        $title = 'Clinicians-ED (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ed_active_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM14') === true) {
                        $title = 'Clinicians-ED (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ed_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM15') === true) {
                        $title = 'Clinicians-ICU (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_icu_active_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM16') === true) {
                        $title = 'Clinicians-ICU (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_icu_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM17') === true) {
                        $title = 'Clinicians-Primary Care Provider (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_primarycare_active_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM18') === true) {
                        $title = 'Clinicians-Primary Care Provider (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_primarycare_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM19') === true) {
                        $title = 'Clinicians-Sedation (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_sedation_active_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM20') === true) {
                        $title = 'Clinicians-Sedation (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_sedation_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM21') === true) {
                        $title = 'Clinicians-Surgeons (Active)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_surgeons_active_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM22') === true) {
                        $title = 'Clinicians-Surgeons (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_surgeons_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM23') === true) {
                        $title = 'Diet Consultation (OP)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_dietconsultation_op_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM24') === true) {
                        $title = 'Physiotherapy- (Closed)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_physiotherapy_closed_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM25') === true) {
                        $title = 'Physiotherapy- (OP)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_physiotherapy_op_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM26') === true) {
                        $title = 'Physiotherapy- (Open)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_physiotherapy_open_mdc', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM27') === true) {
                        $title = 'MRD Audit- ED';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_mrd_ed_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM28') === true) {
                        $title = 'MRD Audit- LAMA';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_mrd_lama_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM29') === true) {
                        $title = 'MRD Audit- OP';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_mrd_op_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM30') === true) {
                        $title = 'Accidental Delining Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_accidental_delining_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM31') === true) {
                        $title = 'Admission Holding Area Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_admission_area_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM32') === true) {
                        $title = 'CPR Analysis Record';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_cardio_pulmonary_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM33') === true) {
                        $title = 'Extravasation Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_extravasation_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM34') === true) {
                        $title = 'Hospital Acquired Pressure Ulcers (HAPU) Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_hapu_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM35') === true) {
                        $title = 'Initial Assessment Accident and Emergency (A&E)';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_assessment_ae', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM36') === true) {
                        $title = 'Initial Assessment IPD';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_assessment_ipd', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM37') === true) {
                        $title = 'Initial Assessment OPD';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_assessment_opd', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM38') === true) {
                        $title = 'IPSG-1';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg1_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM39') === true) {
                        $title = 'IPSG2- A&E';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg2_ae', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM40') === true) {
                        $title = 'IPSG2- IPD';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg2_ipd', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM41') === true) {
                        $title = 'IPSG4-Timeout- Outside OT Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg4_timeout', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM42') === true) {
                        $title = 'IPSG6- IP';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg6_ip', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM43') === true) {
                        $title = 'IPSG6- OPD';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_ipsg6_opd', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isfeature_active('AUDIT-FORM44') === true) {
                        $title = 'Point Prevalence Audit';
                        $meta  = metaFor($title, $audit_frequency_by_title);
                        $cnt   = $this->audit_model->patient_and_feedback($table_patients, 'bf_ma_point_prevlance_audit', $sorttime, $setup);
                    ?>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $meta['audit_type']; ?></td>
                            <td><?php echo $meta['bed_no']; ?></td>
                            <td><?php echo count($cnt); ?></td>
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