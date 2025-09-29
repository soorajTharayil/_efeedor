<?php 



    public function resposnsechart_discharged_patients_mrd()
    {

        $table_feedback = 'bf_ma_dischargedpatients_mrd_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_nursing_ip_closed()
    {

        $table_feedback = 'bf_ma_nursingip_closed_cases';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_nursing_ip_open()
    {

        $table_feedback = 'bf_ma_nursingip_open_cases';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_nursing_op_closed()
    {

        $table_feedback = 'bf_ma_nursingop_closed_cases';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_clinical_active_mdc()
    {

        $table_feedback = 'bf_ma_clinical_active_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_clinical_closed_mdc()
    {

        $table_feedback = 'bf_ma_clinical_closedcases_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_clinical_pharmacy_closed()
    {

        $table_feedback = 'bf_ma_clinical_pharmacy_closed';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_clinical_pharmacy_op()
    {

        $table_feedback = 'bf_ma_clinical_pharmacy_op';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_clinical_pharmacy_open()
    {

        $table_feedback = 'bf_ma_clinical_pharmacy_open';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_anesthesia_active()
    {

        $table_feedback = 'bf_ma_anesthesia_active_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_anesthesia_closed()
    {

        $table_feedback = 'bf_ma_anesthesia_closed_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_ed_active()
    {

        $table_feedback = 'bf_ma_ed_active_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_ed_closed()
    {

        $table_feedback = 'bf_ma_ed_closed_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_icu_active()
    {

        $table_feedback = 'bf_ma_icu_active_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }



    public function resposnsechart_icu_closed()
    {

        $table_feedback = 'bf_ma_icu_closed_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_primarycare_active_mdc()
    {

        $table_feedback = 'bf_ma_primarycare_active_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_primarycare_closed_mdc()
    {

        $table_feedback = 'bf_ma_primarycare_closed_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_sedation_active_mdc()
    {

        $table_feedback = 'bf_ma_sedation_active_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_sedation_closed_mdc()
    {

        $table_feedback = 'bf_ma_sedation_closed_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_surgeons_active_mdc()
    {

        $table_feedback = 'bf_ma_surgeons_active_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_surgeons_closed_mdc()
    {

        $table_feedback = 'bf_ma_surgeons_closed_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_dietconsultation_op_mdc()
    {

        $table_feedback = 'bf_ma_dietconsultation_op_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_physiotherapy_closed_mdc()
    {

        $table_feedback = 'bf_ma_physiotherapy_closed_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }



    public function resposnsechart_physiotherapy_op_mdc()
    {

        $table_feedback = 'bf_ma_physiotherapy_op_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }




    public function resposnsechart_physiotherapy_open_mdc()
    {

        $table_feedback = 'bf_ma_physiotherapy_open_mdc';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_mrd_ed_audit()
    {

        $table_feedback = 'bf_ma_mrd_ed_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_mrd_lama_audit()
    {

        $table_feedback = 'bf_ma_mrd_lama_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }



    public function resposnsechart_mrd_op_audit()
    {

        $table_feedback = 'bf_ma_mrd_op_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }





    public function resposnsechart_accidental_delining_audit()
    {

        $table_feedback = 'bf_ma_accidental_delining_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_admissionholding_area_audit()
    {

        $table_feedback = 'bf_ma_admission_area_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_cardio_pulmonary_checklist()
    {

        $table_feedback = 'bf_ma_cardio_pulmonary_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_extravasation_audit()
    {

        $table_feedback = 'bf_ma_extravasation_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_hapu_audit()
    {

        $table_feedback = 'bf_ma_hapu_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_initial_assessment_ae()
    {

        $table_feedback = 'bf_ma_assessment_ae';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_initial_assessment_ipd()
    {

        $table_feedback = 'bf_ma_assessment_ipd';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_initial_assessment_opd()
    {

        $table_feedback = 'bf_ma_assessment_opd';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_ipsg1()
    {

        $table_feedback = 'bf_ma_ipsg1_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_ipsg2_ae()
    {

        $table_feedback = 'bf_ma_ipsg2_ae';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_ipsg2_ipd()
    {

        $table_feedback = 'bf_ma_ipsg2_ipd';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_ipsg4_timeout()
    {

        $table_feedback = 'bf_ma_ipsg4_timeout';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_ipsg6_ip()
    {

        $table_feedback = 'bf_ma_ipsg6_ip';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    public function resposnsechart_ipsg6_opd()
    {

        $table_feedback = 'bf_ma_ipsg6_opd';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    public function resposnsechart_point_prevelance()
    {

        $table_feedback = 'bf_ma_point_prevlance_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }

    // Response chart for Clinical Outcome

    public function resposnsechart_clinicaloutcome_audit_acl()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_audit_acl';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_allogenic_bone_marrow()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_allogenic_bone_marrow';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_aortic_value_replacement()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_aortic_value_replacement';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_autologous_bone()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_autologous_bone';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_brain_tumour()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_brain_tumour';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_cabg()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_cabg';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_carotid_stenting()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_carotid_stenting';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_chemotherapy()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_chemotherapy';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_colo_rectal()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_colo_rectal';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_endoscopy()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_endoscopy';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_epilepsy()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_epilepsy';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_herniorrhaphy()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_herniorrhaphy';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_holep()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_holep';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_laparoscopic_appendicectomy()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_laparoscopic_appendicectomy';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_mechanical_thrombectomy()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_mechanical_thrombectomy';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_mvr()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_mvr';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_ptca()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_ptca';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_renal_transplantation()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_renal_transplantation';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_scoliosis_correction()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_scoliosis_correction';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_spinal_dysraphism()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_spinal_dysraphism';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_spine_disc_surgery()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_spine_disc_surgery';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_thoracotomy()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_thoracotomy';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_tkr()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_tkr';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_uro_oncology()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_uro_oncology';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_whipples_surgery()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_whipples_surgery';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicaloutcome_laparoscopic_cholecystectomy()
    {

        $table_feedback = 'bf_ma_clinicaloutcome_laparoscopic_cholecystectomy';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    // Response chart for Clinical KPI

    public function resposnsechart_clinicalkpi_bronchodilators_audit()
    {

        $table_feedback = 'bf_ma_clinicalkpi_bronchodilators_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinicalkpi_copd_protocol_audit()
    {

        $table_feedback = 'bf_ma_clinicalkpi_copd_protocol_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }



    // Response chart for Infection Control
    public function resposnsechart_infection_control_biomedical_waste()
    {

        $table_feedback = 'bf_ma_infection_control_biomedical_waste';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_canteen_audit()
    {

        $table_feedback = 'bf_ma_infection_control_canteen_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_cssd_audit()
    {

        $table_feedback = 'bf_ma_infection_control_cssd_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_hand_hygiene()
    {

        $table_feedback = 'bf_ma_infection_control_hand_hygiene';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_bundle_audit()
    {

        $table_feedback = 'bf_ma_infection_control_bundle_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_ot_audit()
    {

        $table_feedback = 'bf_ma_infection_control_ot_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_linen_audit()
    {

        $table_feedback = 'bf_ma_infection_control_linen_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_ambulance_audit()
    {

        $table_feedback = 'bf_ma_infection_control_ambulance_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_coffee_audit()
    {

        $table_feedback = 'bf_ma_infection_control_coffee_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_laboratory_audit()
    {

        $table_feedback = 'bf_ma_infection_control_laboratory_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_mortuary_audit()
    {

        $table_feedback = 'bf_ma_infection_control_mortuary_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_radiology_audit()
    {

        $table_feedback = 'bf_ma_infection_control_radiology_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_ssi_survelliance_audit()
    {

        $table_feedback = 'bf_ma_infection_control_ssi_survelliance_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_peripheralivline_audit()
    {

        $table_feedback = 'bf_ma_infection_control_peripheralivline_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_personalprotective_audit()
    {

        $table_feedback = 'bf_ma_infection_control_personalprotective_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_safe_injection_audit()
    {

        $table_feedback = 'bf_ma_infection_control_safe_injection_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_infection_control_surface_cleaning_audit()
    {

        $table_feedback = 'bf_ma_infection_control_surface_cleaning_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }


    //ResponseChart for Clinical Pathways
    public function resposnsechart_clinical_pathway_arthroscopic_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_arthroscopic_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_breast_lump_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_breast_lump_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_cardiac_arrest_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_cardiac_arrest_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_donor_hepatectomy_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_donor_hepatectomy_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_febrile_seizure_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_febrile_seizure_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_heart_transplant_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_heart_transplant_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_laproscopic_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_laproscopic_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_picc_line_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_picc_line_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_stroke_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_stroke_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_urodynamics_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_urodynamics_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }
    public function resposnsechart_clinical_pathway_stemi_audit()
    {

        $table_feedback = 'bf_ma_clinical_pathway_stemi_audit';
        $table_patients = 'bf_patients';
        $sorttime = 'asc';
        $setup = 'setup';
        $asc = 'asc';
        $desc = 'desc';
        //$dates = get_from_to_date();
        $feedback_data = $this->audit_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
        $days = $_SESSION['days'];
        $set = array();
        $report = array();
        $y = date('Y');
        $fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
        $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
        foreach ($feedback_data as $row) {
            if ($days > 10 && $days < 93) {
                $desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
                $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
            } elseif ($days <= 10) {
                $mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
            } else {
                $mon = date("F", strtotime($row->datetime));
            }
            // if ($days > 0) {
            //     if ($days < 183 && $days > 10) {
            //         $desdate = getStartAndEndDate(date("W", strtotime($row->datetime)), $y);
            //         $mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . date("F", strtotime($row->datetime));
            //     }
            // }
            $param = json_decode($row->dataset);
            if (!isset($report[$mon])) {
                $report[$mon]['count'] = 0;
            }
            $avg = count($row);
            if ($avg > 0) {
                $report[$mon]['count'] = $report[$mon]['count'] + 1;
            } else {
                $report[$mon]['count'] = 0;
            }
            $report[$mon]['overall'] = count($feedback_data);
        }
        $response = array();
        foreach ($report as $key => $row) {
            $set = array();
            $set['label_field'] = $key;
            $set['data_field'] = round((($report[$key]['count']) / count($feedback_data)) * 100);
            $set['all_detail'] = $report[$key];
            $response[] = $set;
        }
        echo json_encode($response);
        exit;
    }








?>