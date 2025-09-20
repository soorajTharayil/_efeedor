<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opf extends CI_Controller
{
    private $module;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        if ($this->session->userdata('isLogIn') === false && $this->uri->segment(2) != 'track')
            redirect('login');

        $this->load->model(
            array(
                'dashboard_model',
                'efeedor_model',
                'ticketsop_model',
                'opf_model',
                'setting_model',
                'Trend_analytic_model',
                'departmenthead_model',
            )
        );
        // $dates = get_from_to_date();
        if (isset($_SESSION['from_date']) && isset($_SESSION['to_date'])) {

            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
        } else {
            $fdate = date('Y-m-d', time());
            $tdate = date('Y-m-d', strtotime('-365 days'));
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        }
        $this->module = 'outpatient_modules';
        $this->session->set_userdata([
            'active_menu' => array('op_dashboard', 'op_ticket', 'op_reports', 'op_patients', 'op_settings', 'op_dep', 'op_analysis'),
        ]);
        // if (ismodule_active('OP') === false  && $this->uri->segment(2) != 'track')
        //     redirect('dashboard/noaccess');
    }

    // RESERVED FOR DEVELOPER OR COMPANY ACCESS
    public function index()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP MODULE CONFIGURATION';
            $data['content'] = $this->load->view('opmodules/developer', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function trend_analytic()
    {
        if ($this->session->userdata('isLogIn') == false) {
            redirect('login');
        }

        if (ismodule_active('OP') === true) {
            // Get the 'type' from the URI segment
            $type = $this->uri->segment(3);

            // Fetch the title_category based on the 'type'
            $query = $this->db->select('title, shortname, id, shortkey')
                ->from('setupop')
                ->where('type', $type)
                ->get();

            $result = $query->result();

            // Check if a result exists
            if (!empty($result)) {
                $title_category = strtoupper($result[0]->title);

                // Pass the category title to the dashboard title
                $data['title'] = "OP CATEGORY ANALYSIS DASHBOARD - $title_category";
            } else {
                // If no result found, fallback to default title
                $data['title'] = 'OP CATEGORY ANALYSIS DASHBOARD';
            }

            #------------------------------#
            $data['content'] = $this->load->view('opmodules/trend_analytic', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }


    public function dep_tat_edit()
    {

        if (ismodule_active('OP') === true) {

            if ($_POST) {
                $close_time = $this->input->post('tat');
                $close_time_l1 = $close_time['close_time_l1'];
                $close_time_l2 = $close_time['close_time_l2'];
                $dept_level_escalation = $close_time['dept_level_escalation'];

                foreach ($close_time_l1 as $key => $row) {
                    $data = array('close_time' => $close_time_l1[$key], 'close_time_l2' => $close_time_l2[$key], 'dept_level_escalation' => $dept_level_escalation[$key]);
                    $this->db->where('dprt_id', $key);
                    $this->db->update('department', $data);
                }
            }


            $data['title'] = 'OP Feedback - Manage Escalation Turn Around Time';

            #------------------------------#

            $data['content'] = $this->load->view('opmodules/dep_tat_edit', $data, true);

            $this->load->view('layout/main_wrapper', $data);
        }
    }

    // SUPER ADMIN AND ADMIN LOGIN
    public function feedback_dashboard()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {


            $data['title'] = 'OP- FEEDBACKS DASHBOARD';
            #------------------------------#
            $data['content'] = $this->load->view('opmodules/feedback_dashboard', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function ticket_dashboard()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('OP') === true) {


            $data['title'] = 'OP- TICKETS DASHBOARD';
            #------------------------------#
            $data['content'] = $this->load->view('opmodules/ticket_dashboard', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    //START ANALYTICS
    public function nps_page()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('OP') === true) {


            $data['title'] = 'OP- NPS ANALYSIS';
            #------------------------------#
            $data['content'] = $this->load->view('opmodules/nps_page', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }


    //2
    public function nps_promoter_list()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- NPS PROMOTERS LIST';
            $data['content'] = $this->load->view('opmodules/nps_promoter_list', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function nps_detractors_list()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- NPS DETRACTORS LIST';

            $data['content'] = $this->load->view('opmodules/nps_detractors_list', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function nps_passive_list()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {


            $data['title'] = 'OP- NPS PASSIVES LIST';

            $data['content'] = $this->load->view('opmodules/nps_passive_list', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }


    public function psat_satisfied_list()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- SATISFIED PATIENTS LIST';
            $data['content'] = $this->load->view('opmodules/psat_satisfied_list', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function psat_unsatisfied_list()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- UNSATISFIED PATIENTS LIST';
            $data['content'] = $this->load->view('opmodules/psat_unsatisfied_list', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function psat_page()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- PSAT ANALYSIS';
            #------------------------------#
            $data['content'] = $this->load->view('opmodules/psat_page', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    //END ANALYTICS
    // END SUPER ADMIN AND ADMIN LOGIN


    // DEPARTMENT HEAD LOGIN
    public function department_tickets()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true && isfeature_active('DEPARTMENT-HEAD-OVERALL-PAGE') === true) {

            $data['title'] = 'OP- TICKETS DASHBOARD';
            $data['content'] = $this->load->view('opmodules/department_tickets', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            //used for department head login

        } else {
            redirect('dashboard/noaccess');
        }
    }
    // END DEPARTMENT HEAD LOGIN

    public function admin_track()
    {


        if (!isset($this->session->userdata['isLogIn']) || ($this->session->userdata('isLogIn') === false)) {
            $this->session->set_userdata('referred_from', current_url());
        } else {
            $this->session->set_userdata('referred_from', NULL);
        }

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');


        $data['title'] = 'OP- TICKET DETAILS';
        $data['departments'] = $this->ticketsop_model->read_by_id($this->uri->segment(3));
        $data['content'] = $this->load->view('ticketsop/ticket_track', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }



    //START TICKETS 
    public function alltickets()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- ALL TICKETS';
            $dates = get_from_to_date();
            $data['departments'] = $this->ticketsop_model->alltickets();
            if (isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('opmodules/alltickets', $data, true);
            } else {
                $data['content'] = $this->load->view('opmodules/dephead/alltickets', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    //addressed ticket
    public function addressedtickets()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- ADDRESSED TICKETS';
            $dates = get_from_to_date();
            $data['departments'] = $this->ticketsop_model->addressedtickets();
            if (isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('opmodules/addressedtickets', $data, true);
            } else {
                $data['content'] = $this->load->view('opmodules/dephead/addressedtickets', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    // ticket tracking
    public function track()
    {
        if (!isset($this->session->userdata['isLogIn']) || ($this->session->userdata('isLogIn') === false)) {
            $this->session->set_userdata('referred_from', current_url());
        } else {
            $this->session->set_userdata('referred_from', NULL);
        }


        $data['title'] = 'OP- TICKET DETAILS';
        $data['departments'] = $this->ticketsop_model->read_by_id($this->uri->segment(3));
        if (isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) {
            $data['content'] = $this->load->view('opmodules/ticket_track', $data, true);
        } else {
            $data['content'] = $this->load->view('opmodules/dephead/ticket_track', $data, true);
        }
        $this->load->view('layout/main_wrapper', $data);
    }

    // open tickets
    public function opentickets()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- OPEN TICKETS';
            $dates = get_from_to_date();
            $data['departments'] = $this->ticketsop_model->read();
            if (isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('opmodules/opentickets', $data, true);
            } else {
                $data['content'] = $this->load->view('opmodules/dephead/opentickets', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
            $this->session->set_userdata('referred_from', NULL);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    // closed tickets
    public function closedtickets()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- CLOSED TICKETS';
            $dates = get_from_to_date();
            $data['departments'] = $this->ticketsop_model->read_close();
            if (isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('opmodules/closedtickets', $data, true);
            } else {
                $data['content'] = $this->load->view('opmodules/dephead/closedtickets', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    //END TICKETS 

    //  REPORTS

    public function capa_report()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- CAPA REPORT';
            $dates = get_from_to_date();
            $data['departments'] = $this->ticketsop_model->read_close();
            $data['content'] = $this->load->view('opmodules/capa_report', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/op_capa_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }


    public function feedbacks_report()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- ALL FEEDBACKS REPORT';
            $data['content']  = $this->load->view('opmodules/feedbacks_report', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function feedbacks_report_login_apk()
    {
        $userName = $this->session->userdata['fullname'];




        $data['title'] = 'OP feedbacks collected by ' . $userName . '';
        $data['content']  = $this->load->view('opmodules/op_feedbacks_report_login_apk', $data, true);
        $this->load->view('layout/main_wrapper', $data);
        // redirect('report/feedbacks_report');


    }



    public function comments()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- PATIENT COMMENTS LIST';
            $data['content'] = $this->load->view('opmodules/recent_comments', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/op_recent_comments');

        } else {
            redirect('dashboard/noaccess');
        }
    }


    public function patient_feedback()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- PATIENT' . "'" . 'S FEEDBACK';
            #------------------------------#
            if (isfeature_active('OP-FEEDBACKS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('opmodules/patient_feedback', $data, true);
            } else {
                $data['content'] = $this->load->view('opmodules/dephead/patient_feedback', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/op_patient_feedback');

        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function notifications()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $data['title'] = 'OP- FEEDBACK NOTIFICATIONS';
            $data['content'] = $this->load->view('opmodules/notifications_list', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    //END REPORTS

    // OP DASHBOARD DOWNLOADS

    public function downloadcomments()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {


            $table_feedback = 'bf_outfeedback';
            $table_patients = 'bf_opatients';
            $desc = 'desc';
            $setup = 'setupop';

            $feedbacktaken = $this->opf_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->opf_model->setup_result($setup);
            $setarray = array();
            $questioarray = array();
            foreach ($sresult as $r) {
                $setarray[$r->type] = $r->title;
            }
            foreach ($sresult as $r) {
                $questioarray[$r->type][$r->shortkey] = $r->shortname;
            }

            $arraydata = array();
            foreach ($questioarray as $setr) {
                foreach ($setr as $k => $v) {
                    $arraydata[$k] = $v;
                }
            }

            $header[0] = 'Date';
            $header[1] = 'Patient Name';
            $header[2] = 'Patient ID';
            $header[3] = 'Speciality';
            $header[4] = 'Mobile Number';
            $j = 5;
            $header[$j++] = 'Average Rating';
            $header[$j++] = 'NPS Score';
            $header[$j++] = 'Comments';
            foreach ($setarray as $r) {
                $header[$j] = $r;
                $j++;
            }
            $dataexport = array();
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);
                $dataexport[$i]['date'] = date('d-m-Y', strtotime($row->datetime));
                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['patient_id'] = $data['patientid'];
                $dataexport[$i]['ward'] = $data['ward'];
                $dataexport[$i]['mobile'] = $data['contactnumber'];
                $dataexport[$i]['overallScore'] = $data['overallScore'];
                $dataexport[$i]['recommend1Score'] = ($data['recommend1Score']) * 2;
                $dataexport[$i]['suggestionText'] = $data['suggestionText'];
                foreach ($setarray as $key => $t) {
                    if ($data['comment'][$key] != '') {
                        $dataexport[$i][$key] = $data['comment'][$key];
                    } else {
                        $dataexport[$i][$key] = '';
                    }
                }
                $i++;
            }
            $newdataset = $dataexport;
            $d = array();
            $p = array();
            $n = array();
            $para = array();
            $for5 = array();
            $for4 = array();
            $for3 = array();
            $for2 = array();
            $for1 = array();
            foreach ($dataexport as $row) {
                foreach ($row as $k => $r) {
                    if (!is_numeric($r)) {
                        continue;
                    }
                    if ((int)$r > 0) {
                        $d[$k] = $d[$k] + 1;
                        if ($r > 2) {
                            $p[$k] = $p[$k] + 1;
                        } else {
                            $n[$k] = $n[$k] + 1;
                        }
                        $para[$k] = $para[$k] + $r;
                        if ($k == 'overallScore') {
                            if ($r == 5) {
                                $for5[$k] = $for5[$k] + 1;
                            }
                            if ($r == 4) {
                                $for4[$k] = $for4[$k] + 1;
                            }
                            if ($r == 3) {
                                $for3[$k] = $for3[$k] + 1;
                            }
                            if ($r == 2) {
                                $for2[$k] = $for2[$k] + 1;
                            }
                            if ($r == 1) {
                                $for1[$k] = $for1[$k] + 1;
                            }
                        }
                    }
                }
            }

            ob_end_clean();
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];

            $fileName = 'EF- OPF PATIENT COMMENTS - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    
                    fputcsv($fp, $values, ',');
                }
                fclose($fp);
            }
            ob_flush();
            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function overall_excel_report()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $table_feedback = 'bf_outfeedback';
            $table_patients = 'bf_opatients';
            $sorttime = 'asc';
            $setup = 'setupop';
            $asc = 'asc';
            $desc = 'desc';
            $table_tickets = 'ticketsop';
            $open = 'Open';
            $closed = 'Closed';
            $addressed = 'Addressed';
            $type = 'outpatient';
            $op_feedbacks_count = $this->opf_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);

            $op_tickets_count = $this->ticketsop_model->alltickets();
            $op_open_tickets = $this->ticketsop_model->read();
            $op_closed_tickets = $this->ticketsop_model->read_close();
            $op_addressed_tickets = $this->ticketsop_model->addressedtickets();

            $op_feedbacks_count = $this->opf_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);


            $op_nps = $this->opf_model->nps_analytics($table_feedback, $asc, $setup);
            $op_psat = $this->opf_model->psat_analytics($table_patients, $table_feedback, $table_tickets, $sorttime);
            $ticket_resolution_rate = $this->opf_model->ticket_resolution_rate($table_tickets, $closed, $table_feedback);
            $dataexport = array();
            $i = 0;

            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];

            $dataexport[$i]['row1'] = 'OP FEEDBACK OVERALL REPORT';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'FROM DATE';
            $dataexport[$i]['row2'] = $tdate;
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TO DATE';
            $dataexport[$i]['row2'] =  $fdate;
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TOTAL FEEDBACKS SUBMITTED';
            $dataexport[$i]['row2'] = count($op_feedbacks_count);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'SATISFACTION INDEX';
            $dataexport[$i]['row2'] = $op_psat['psat_score'] . '%';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'SATISFIED PATIENTS';
            $dataexport[$i]['row2'] =  $op_psat['satisfied_count'];
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'UNSATISFIED PATIENTS';
            $dataexport[$i]['row2'] = $op_psat['unsatisfied_count'];
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            //add here
            $dataexport[$i]['row1'] = 'NET PROMOTER SCORE';
            $dataexport[$i]['row2'] =  $op_nps['nps_score'] . '%';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'NO. OF PROMOTERS';
            $dataexport[$i]['row2'] = $op_nps['promoters_count'];
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'NO. OF PASSIVES';
            $dataexport[$i]['row2'] = $op_nps['passives_count'];
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'NO. OF DETRACTORS';
            $dataexport[$i]['row2'] = $op_nps['detractors_count'];
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'TICKETS REPORT';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TOTAL TICKETS';
            $dataexport[$i]['row2'] = count($op_tickets_count);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TICKET RESOLUTION RATE';
            $dataexport[$i]['row2'] = $ticket_resolution_rate . '%';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'OPEN TICKETS';
            $dataexport[$i]['row2'] = count($op_open_tickets);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;
            if (ticket_addressal('op_addressal') === true) {
                $dataexport[$i]['row1'] = 'ADDRESSED TICKETS';
                $dataexport[$i]['row2'] = count($op_addressed_tickets);
                $dataexport[$i]['row3'] = '';
                $dataexport[$i]['row4'] = '';
                $i++;
            }
            $dataexport[$i]['row1'] = 'CLOSED TICKETS';
            $dataexport[$i]['row2'] = count($op_closed_tickets);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TICKETS RECEIVED BY DEPARTMENT';
            $dataexport[$i]['row2'] = 'PERCENTAGE';
            $dataexport[$i]['row3'] = 'COUNT';
            $dataexport[$i]['row4'] = 'OPEN';
            if (ticket_addressal('op_addressal') === true) {

                $dataexport[$i]['row5'] = 'ADDRESSED';
            }
            $dataexport[$i]['row6'] = 'CLOSED';
            $dataexport[$i]['row7'] = 'RESOLUTION RATE';
            $dataexport[$i]['row8'] = 'RESOLUTION TIME';
            $dataexport[$i]['row9'] = '';
            $i++;

            $ticket = $this->opf_model->tickets_recived_by_department($type, $table_feedback, $table_tickets);
            foreach ($ticket as $ps) {
                $time = secondsToTimeforreport($ps['res_time']);
                $dataexport[$i]['row1'] = $ps['department'];
                $dataexport[$i]['row2'] = $ps['percentage'] . '%';
                $dataexport[$i]['row3'] = $ps['count'];
                $dataexport[$i]['row4'] = $ps['open_tickets'];
                if (ticket_addressal('op_addressal') === true) {

                    $dataexport[$i]['row5'] = $ps['addressed_tickets'];
                }
                $dataexport[$i]['row6'] = $ps['closed_tickets'];
                $dataexport[$i]['row6'] = $ps['closed_tickets'];
                $dataexport[$i]['row7'] = $ps['tr_rate'] . '%';
                $dataexport[$i]['row8'] = $time;
                $dataexport[$i]['row9'] = '';
                $i++;
            }


            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'WHY PATIENTS CHOSE YOUR HOSPITAL';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'REASON';
            $dataexport[$i]['row2'] = 'PERCENTAGE';
            $dataexport[$i]['row3'] = 'COUNT';
            $dataexport[$i]['row4'] = '';
            $i++;


            $choice_of_hospitals = $this->opf_model->reason_to_choose_hospital($table_feedback, $sorttime);

            foreach ($choice_of_hospitals as $key => $object) {

                $dataexport[$i]['row1'] = $object->title;
                $dataexport[$i]['row2'] =  $object->percentage . '%';
                $dataexport[$i]['row3'] = $object->count;
                $dataexport[$i]['row4'] = '';
                $i++;
            }


            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;
            //echo '<pre>';
            //print_r($dataexport); exit; 
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];

            ob_end_clean();
            $fileName = 'EF - OVERALL OP FEEDBACKS REPORT  - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
              
              
                foreach ($dataexport as $values) {
                    
                    fputcsv($fp, $values, ',');
                }
                fclose($fp);
            }
            ob_flush();
            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function overall_patient_excel()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {


            $table_feedback = 'bf_outfeedback';
            $table_patients = 'bf_opatients';
            $desc = 'desc';
            $setup = 'setupop';

            $feedbacktaken = $this->opf_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->opf_model->setup_result($setup);
            $setarray = array();
            $questioarray = array();
            foreach ($sresult as $r) {
                $setarray[$r->type] = $r->title;
            }
            foreach ($sresult as $r) {
                $questioarray[$r->type][$r->shortkey] = $r->shortname;
            }

            $arraydata = array();
            foreach ($questioarray as $setr) {
                foreach ($setr as $k => $v) {
                    $arraydata[$k] = $v;
                }
            }

            $header[0] = 'Date';
            $header[1] = 'Patient Name';
            $header[2] = 'Patient ID';
            $header[3] = 'Speciality';

            $header[4] = 'Mobile Number';
            $header[5] = 'Email id';
            $j = 6;
            foreach ($arraydata as $k => $r) {
                $header[$j] = $r;
                $j++;
            }
            $header[$j++] = 'Average Rating';
            $header[$j++] = 'NPS Score';
            $header[$j++] = 'Recommneded Staff';
            $header[$j++] = 'Comments';
            foreach ($setarray as $r) {
                $header[$j] = $r . ' comment';
                $j++;
            }
            $dataexport = array();
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);
                $dataexport[$i]['date'] = date('d-m-Y', strtotime($row->datetime));
                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['patient_id'] = $data['patientid'];
                $dataexport[$i]['ward'] = $data['ward'];

                $dataexport[$i]['mobile'] = $data['contactnumber'];
                $dataexport[$i]['email'] = $data['email'];
                foreach ($arraydata as $k => $r) {
                    $dataexport[$i][$k] = $data[$k];
                }
                $dataexport[$i]['overallScore'] = $data['overallScore'];
                $dataexport[$i]['recommend1Score'] = ($data['recommend1Score']) * 2;
                $dataexport[$i]['staffname'] = $data['staffname'];
                $dataexport[$i]['suggestionText'] = $data['suggestionText'];
                foreach ($setarray as $key => $t) {
                    if ($data['comment'][$key] != '') {
                        $dataexport[$i][$key] = $data['comment'][$key];
                    } else {
                        $dataexport[$i][$key] = '';
                    }
                }
                $i++;
            }
            $newdataset = $dataexport;
            $d = array();
            $p = array();
            $n = array();
            $para = array();
            $for5 = array();
            $for4 = array();
            $for3 = array();
            $for2 = array();
            $for1 = array();
            foreach ($dataexport as $row) {
                if (!is_numeric($r)) {
                        continue;
                }
                foreach ($row as $k => $r) {
                    if ((int)$r > 0) {
                        $d[$k] = $d[$k] + 1;
                        if ($r > 2) {
                            $p[$k] = $p[$k] + 1;
                        } else {
                            $n[$k] = $n[$k] + 1;
                        }
                        $para[$k] = $para[$k] + $r;
                        if ($k == 'overallScore') {
                            if ($r == 5) {
                                $for5[$k] = $for5[$k] + 1;
                            }
                            if ($r == 4) {
                                $for4[$k] = $for4[$k] + 1;
                            }
                            if ($r == 3) {
                                $for3[$k] = $for3[$k] + 1;
                            }
                            if ($r == 2) {
                                $for2[$k] = $for2[$k] + 1;
                            }
                            if ($r == 1) {
                                $for1[$k] = $for1[$k] + 1;
                            }
                        }
                    }
                }
            }
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- OP PATIENT WISE FEEDBACK REPORT - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    
                    fputcsv($fp, $values, ',');
                }
                fclose($fp);
            }
            ob_flush();
            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function download_promoter_list()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {


            $table_feedback = 'bf_outfeedback';
            $desc = 'desc';
            $setup = 'setupop';

            $ip_nps = $this->opf_model->nps_analytics($table_feedback, $desc, $setup);
            $feedback = $ip_nps['promoters_feedbacks'];



            $header[0] = 'Patient Name';
            $header[1] = 'Patient ID';
            $header[2] = 'Speciality';
            $header[3] = 'Mobile Number';
            $header[4] = 'Email id';
            $header[5] = 'NPS score';
            $header[6] = 'Average rating';
            $header[7] = 'General comment';

            $dataexport = array();
            $i = 0;
            foreach ($feedback as $row) {


                $dataexport[$i]['name'] = $row->name;
                $dataexport[$i]['patient_id'] = $row->patientid;
                $dataexport[$i]['ward'] = $row->ward;
                $dataexport[$i]['mobile'] = $row->contactnumber;
                $dataexport[$i]['email'] = $row->email;
                $dataexport[$i]['nps_score'] = ($row->recommend1Score) * 2;
                $dataexport[$i]['overallScore'] = $row->overallScore;
                $dataexport[$i]['suggestionText'] = $row->suggestionText;

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'OPF PROMOTERS LIST - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');

                foreach ($dataexport as $values) {
                    
                    fputcsv($fp, $values, ',');
                }
                fclose($fp);
            }
            ob_flush();
            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function download_passive_list()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {


            $table_feedback = 'bf_outfeedback';
            $desc = 'desc';
            $setup = 'setupop';

            $ip_nps = $this->opf_model->nps_analytics($table_feedback, $desc, $setup);
            $feedback = $ip_nps['passives_feedback'];



            $header[0] = 'Patient Name';
            $header[1] = 'Patient ID';
            $header[2] = 'Speciality';
            $header[3] = 'Mobile Number';
            $header[4] = 'Email id';
            $header[5] = 'NPS score';
            $header[6] = 'Average rating';
            $header[7] = 'General comment';

            $dataexport = array();
            $i = 0;
            foreach ($feedback as $row) {


                $dataexport[$i]['name'] = $row->name;
                $dataexport[$i]['patient_id'] = $row->patientid;
                $dataexport[$i]['ward'] = $row->ward;
                $dataexport[$i]['mobile'] = $row->contactnumber;
                $dataexport[$i]['email'] = $row->email;
                $dataexport[$i]['nps_score'] = ($row->recommend1Score) * 2;
                $dataexport[$i]['overallScore'] = $row->overallScore;
                $dataexport[$i]['suggestionText'] = $row->suggestionText;

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'OPF PASSIVES LIST - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    
                    fputcsv($fp, $values, ',');
                }
                fclose($fp);
            }
            ob_flush();
            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function download_detractor_list()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {


            $table_feedback = 'bf_outfeedback';
            $desc = 'desc';
            $setup = 'setupop';

            $ip_nps = $this->opf_model->nps_analytics($table_feedback, $desc, $setup);
            $feedback = $ip_nps['detractors_feedback'];



            $header[0] = 'Patient Name';
            $header[1] = 'Patient ID';
            $header[2] = 'Speciality';
            $header[3] = 'Mobile Number';
            $header[4] = 'Email id';
            $header[5] = 'NPS score';
            $header[6] = 'Average rating';
            $header[7] = 'General comment';

            $dataexport = array();
            $i = 0;
            foreach ($feedback as $row) {


                $dataexport[$i]['name'] = $row->name;
                $dataexport[$i]['patient_id'] = $row->patientid;
                $dataexport[$i]['ward'] = $row->ward;
                $dataexport[$i]['mobile'] = $row->contactnumber;
                $dataexport[$i]['email'] = $row->email;
                $dataexport[$i]['nps_score'] = ($row->recommend1Score) * 2;
                $dataexport[$i]['overallScore'] = $row->overallScore;
                $dataexport[$i]['suggestionText'] = $row->suggestionText;

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'OPF DETRACTORS LIST - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    
                    fputcsv($fp, $values, ',');
                }
                fclose($fp);
            }
            ob_flush();
            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function download_satisfied_list()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $table_feedback = 'bf_outfeedback';
            $table_patients = 'bf_opatients';
            $table_tickets = 'ticketsop';
            $desc = 'desc';
            $setup = 'setupop';

            $ip_psat = $this->opf_model->psat_analytics($table_patients, $table_feedback, $table_tickets, $desc);
            $feedback = $ip_psat['satisfied_feedback'];

            $header[0] = 'Patient Name';
            $header[1] = 'Patient ID';
            $header[2] = 'Speciality';
            $header[3] = 'Mobile Number';
            $header[4] = 'Email id';
            $header[5] = 'Average rating';
            $header[6] = 'General comment';

            $dataexport = array();
            $i = 0;
            foreach ($feedback as $row) {


                $dataexport[$i]['name'] = $row->name;
                $dataexport[$i]['patient_id'] = $row->patientid;
                $dataexport[$i]['ward'] = $row->ward;
                $dataexport[$i]['mobile'] = $row->contactnumber;
                $dataexport[$i]['email'] = $row->email;
                $dataexport[$i]['overallScore'] = $row->overallScore;
                $dataexport[$i]['suggestionText'] = $row->suggestionText;

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'OPF SATISFIED LIST - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    
                    fputcsv($fp, $values, ',');
                }
                fclose($fp);
            }
            ob_flush();
            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function overall_department_excel()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $dataexport = array();
            $i = 0;
            $table_feedback = 'bf_outfeedback';
            $table_patients = 'bf_opatients';
            $sorttime = 'asc';
            $setup = 'setupop';
            $asc = 'asc';
            $desc = 'desc';
            $table_tickets = 'ticketsop';
            $open = 'Open';
            $closed = 'Closed';
            $addressed = 'Addressed';
            $type = 'outpatient';
            $ticket_resolution_rate = $this->opf_model->ticket_resolution_rate($table_tickets, $closed, $table_feedback);
            $op_feedbacks_count = $this->opf_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);

            $op_tickets_count = $this->ticketsop_model->alltickets();
            $op_open_tickets = $this->ticketsop_model->read();
            $op_closed_tickets = $this->ticketsop_model->read_close();
            $op_addressed_tickets = $this->ticketsop_model->addressedtickets();

            $sresult = $this->opf_model->setup_result($setup);
            $setarray = array();
            $questioarray = array();

            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];

            $dataexport[$i]['row1'] = 'TICKETS REPORT';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'FROM DATE';
            $dataexport[$i]['row2'] = $tdate;
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TO DATE';
            $dataexport[$i]['row2'] = $fdate;
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TOTAL FEEDBACKS SUBMITTED';
            $dataexport[$i]['row2'] = count($op_feedbacks_count);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'TOTAL TICKETS';
            $dataexport[$i]['row2'] = count($op_tickets_count);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TICKET RESOLUTION RATE';
            $dataexport[$i]['row2'] = $ticket_resolution_rate . '%';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'OPEN TICKETS';
            $dataexport[$i]['row2'] = count($op_open_tickets);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;
            if (ticket_addressal('op_addressal') === true) {

                $dataexport[$i]['row1'] = 'ADDRESSED TICKETS';
                $dataexport[$i]['row2'] = count($op_addressed_tickets);
                $dataexport[$i]['row3'] = '';
                $dataexport[$i]['row4'] = '';
                $i++;
            }
            $dataexport[$i]['row1'] = 'CLOSED TICKETS';
            $dataexport[$i]['row2'] = count($op_closed_tickets);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'TICKETS RECEIVED BY DEPARTMENT';
            $dataexport[$i]['row2'] = 'PERCENTAGE';
            $dataexport[$i]['row3'] = 'COUNT';
            $dataexport[$i]['row4'] = 'OPEN';
            if (ticket_addressal('op_addressal') === true) {

                $dataexport[$i]['row5'] = 'ADDRESSED';
            }
            $dataexport[$i]['row6'] = 'CLOSED';
            $dataexport[$i]['row7'] = 'RESOLUTION RATE';
            $dataexport[$i]['row8'] = 'RESOLUTION TIME';
            $dataexport[$i]['row9'] = '';
            $i++;

            $ticket = $this->opf_model->tickets_recived_by_department($type, $table_feedback, $table_tickets);
            foreach ($ticket as $ps) {
                $time = secondsToTimeforreport($ps['res_time']);
                $dataexport[$i]['row1'] = $ps['department'];
                $dataexport[$i]['row2'] = $ps['percentage'] . '%';
                $dataexport[$i]['row3'] = $ps['count'];
                $dataexport[$i]['row4'] = $ps['open_tickets'];
                $dataexport[$i]['row5'] = $ps['addressed_tickets'];
                $dataexport[$i]['row6'] = $ps['closed_tickets'];
                $dataexport[$i]['row6'] = $ps['closed_tickets'];
                $dataexport[$i]['row7'] = $ps['tr_rate'] . '%';
                $dataexport[$i]['row8'] = $time;
                $dataexport[$i]['row9'] = '';
                $i++;
            }


            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;



            foreach ($sresult as $r) {
                $setarray[$r->type] = $r->title;
            }

            foreach ($sresult as $r) {
                $questioarray[$r->type][$r->shortkey] = $r->shortname;
            }

            $arraydata = array();

            foreach ($questioarray as $setr) {
                foreach ($setr as $k => $v) {
                    $arraydata[$k] = $v;
                }
            }


            $dataexport[$i]['row1'] = 'DEPARTMENT WISE FEEDBACK REPORT';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $k = 2;
            $dataexport[$i]['name'] = 'TITLE';
            foreach ($arraydata as $k => $r) {
                $dataexport[$i][$k] = $r;
                $k++;
            }
            $i++;



            $d = array();
            $p = array();
            $n = array();
            $para = array();
            $for5 = array();
            $for4 = array();
            $for3 = array();
            $for2 = array();
            $for1 = array();

            foreach ($op_feedbacks_count as $row) {
                $data = json_decode($row->dataset, true);
                $dataexportt[$i]['name'] = $data['name'];
                $dataexportt[$i]['patient_id'] = $data['patientid'];
                $dataexportt[$i]['mobile'] = $data['mobile'];
                $dataexportt[$i]['email'] = $data['email'];
                foreach ($arraydata as $k => $r) {
                    $dataexportt[$i][$k] = $data[$k];
                }
                $dataexportt[$i]['overallScore'] = $data['overallScore'];
                $i++;
            }
            $i++;

            foreach ($dataexportt as $row) {
                foreach ($row as $k => $r) {
                    if (!is_numeric($r)) {
                        continue;
                    }
                    if ((int)$r > 0) {
                        $d[$k] = $d[$k] + 1;
                        if ($r > 2) {
                            $p[$k] = $p[$k] + 1;
                        } else {
                            $n[$k] = $n[$k] + 1;
                        }
                        $para[$k] = $para[$k] + $r;
                        if ($k == 'overallScore') {
                            if ($r == 5) {
                                $for5[$k] = $for5[$k] + 1;
                            }
                            if ($r == 4) {
                                $for4[$k] = $for4[$k] + 1;
                            }
                            if ($r == 3) {
                                $for3[$k] = $for3[$k] + 1;
                            }
                            if ($r == 2) {
                                $for2[$k] = $for2[$k] + 1;
                            }
                            if ($r == 1) {
                                $for1[$k] = $for1[$k] + 1;
                            }
                        }
                    }
                }
            }

            $dataexport[$i]['name'] = 'RELATIVE PERFORMANCE';
            foreach ($arraydata as $k => $r) {
                if ($d[$k] * 5 != 0) {
                    $dataexport[$i][$k] = round(($para[$k] / ($d[$k] * 5)) * 100) . '%';
                } else {
                    $dataexport[$i][$k] = '-';  // or some other value that indicates undefined or not applicable
                }
            }
            $i++;

            $dataexport[$i]['name'] = 'MAXIMUM SCORE';
            foreach ($arraydata as $k => $r) {
                $dataexport[$i][$k] = $d[$k] * 5;
            }
            $i++;

            $dataexport[$i]['name'] = 'PARAMETER SCORE';
            foreach ($arraydata as $k => $r) {
                $dataexport[$i][$k] = $para[$k];
            }
            $i++;

            $dataexport[$i]['name'] = 'POSITIVE RATINGS RECIEVED';
            foreach ($arraydata as $k => $r) {
                $dataexport[$i][$k] = $p[$k];
            }
            $i++;

            $dataexport[$i]['name'] =  'NEGATIVE RATINGS RECIEVED';
            foreach ($arraydata as $k => $r) {
                $dataexport[$i][$k] = $n[$k];
            }
            $i++;


            $dataexport[$i]['name'] = 'TOTAL RESPONSES';
            foreach ($arraydata as $k => $r) {
                $dataexport[$i][$k] = $d[$k];
            }
            $i++;


            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;



            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- OP DEPARTMENT WISE TICKET REPORT - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
          
                foreach ($dataexport as $values) {
                    
                    fputcsv($fp, $values, ',');
                }
                fclose($fp);
            }
            ob_flush();
            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function download_unsatisfied_list()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $table_feedback = 'bf_outfeedback';
            $table_patients = 'bf_opatients';
            $table_tickets = 'ticketsop';
            $desc = 'desc';
            $setup = 'setupop';

            $ip_psat = $this->opf_model->psat_analytics($table_patients, $table_feedback, $table_tickets, $desc);
            $feedback = $ip_psat['unsatisfied_feedback'];

            $sresult = $this->opf_model->setup_result($setup);

            foreach ($sresult as $r) {
                $questionarray[$r->shortkey] = $r->shortkey;
                $titles[$r->shortkey] = $r->title;
            }

            $rresult = $this->opf_model->setup_sub_result($setup);
            foreach ($rresult as $r) {
                // $setarray[$r->type] = $r->title;
                $setarray[$r->shortkey] = $r->shortkey;
                $titles[$r->shortkey] = $r->title;
                $shortname[$r->shortkey] = $r->shortname;
            }


            $header[0] = 'Patient Name';
            $header[1] = 'Patient ID';
            $header[2] = 'Speciality';
            $header[3] = 'Mobile Number';
            $header[4] = 'Email id';
            $header[5] = 'Average rating';
            $header[6] = 'NPS score';
            $header[7] = 'Departments';
            $header[8] = 'Concern';

            $dataexport = array();
            $i = 0;
            foreach ($feedback as $row) {


                $dataexport[$i]['name'] = $row->name;
                $dataexport[$i]['patient_id'] = $row->patientid;
                $dataexport[$i]['ward'] = $row->ward;
                $dataexport[$i]['mobile'] = $row->contactnumber;
                $dataexport[$i]['email'] = $row->email;
                $dataexport[$i]['overallScore'] = $row->overallScore;
                $dataexport[$i]['nps_score'] = ($row->recommend1Score) * 2;
                foreach ($questionarray as $key) {
                    if (isset($row->$key) && $row->$key <= 3) {
                        if (!isset($result) || !is_object($result)) {
                            $result = new stdClass();
                        }
                        $result->$key = $row->$key;
                        if ($result->$key) {
                            $dataexport[$i]['department'] = $titles[$key] . ' ';
                        }
                    }
                }

                foreach ($setarray as $key2) {
                    if (isset($row->reason->$key2) && $row->reason->$key2) {
                        if (!isset($rzn) || !is_object($rzn)) {
                            $rzn = new stdClass();
                        }
                        $rzn->$key2 = $row->reason->$key2;
                        if ($rzn->$key2) {
                            $dataexport[$i]['concern'] = $shortname[$key2] . ' ';
                        }
                    }
                }

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'OPF UNSATISFIED LIST - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    
                    fputcsv($fp, $values, ',');
                }
                fclose($fp);
            }
            ob_flush();
            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function overall_pdf_report()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {

            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            redirect('pdfreport/op_pdf_report?fdate=' . $tdate . '&tdate=' . $fdate);
            // redirect('report/ip_capa_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function download_capa_report()
    {
        if (ismodule_active('OP') === true) {


            $users = $this->db->select('user.*')
                ->get('user')
                ->result();

            $department_users = array();
            foreach ($users as $user) {
                $parameter = json_decode($user->department);


                foreach ($parameter as $key => $rows) {
                    foreach ($rows as $k => $row) {

                        $slugs = explode(',', $row);

                        foreach ($slugs as $r) {
                            $department_users[$key][$k][$r][] = $user->firstname;
                        }
                    }
                }
            }
            $fdate = $_SESSION['from_date'];

            $tdate = $_SESSION['to_date'];

            $this->db->select("*");

            $this->db->from('setupop');

            //$this->db->where('parent', 0);

            $query = $this->db->get();

            $reasons = $query->result();

            foreach ($reasons as $row) {

                $keys[$row->shortkey] = $row->shortkey;

                $res[$row->shortkey] = $row->shortname;

                $titles[$row->shortkey] = $row->title;
            }



            $dataexport = array();

            $i = 0;

            $departments = $this->ticketsop_model->read_close();



            $dataexport[$i]['row1'] = 'SL No.';

            $dataexport[$i]['row2'] = 'TICKET ID';

            $dataexport[$i]['row3'] = 'CREATED ON';

            $dataexport[$i]['row4'] = 'PATIENT DETAILS';

            $dataexport[$i]['row5'] = 'CONCERN';

            $dataexport[$i]['row6'] = 'DEPARTMENT';

            $dataexport[$i]['row7'] = 'CONCERN DESCRIPTION';

            $dataexport[$i]['row8'] = 'OTHER FEEDBACKS/ SUGGESTIONS';

            $dataexport[$i]['row9'] = 'ASSIGNEE';

            $dataexport[$i]['row10'] = 'ADDRESSAL COMMENT';

            $dataexport[$i]['row11'] = 'RCA';

            $dataexport[$i]['row12'] = 'CAPA';

            $dataexport[$i]['row13'] = 'RESOLVED ON';

            $dataexport[$i]['row14'] = 'TURN AROUND TIME';

            // $dataexport[$i]['row12'] = 'TAT STATUS';

            $i++;


            if (!empty($departments)) {

                $sl = 1;

                foreach ($departments as $department) {
                    // changes here sooraj
                    if ($department->status == 'Closed') {
                        $rep = '';

                        if ($department->departmentid_trasfered != 0) {
                            $issue = NULL;
                        } else {
                            foreach ($department->feed->reason as $key => $value) {
                                if ($key) {
                                    if ($titles[$key] == $department->department->description) {
                                        if (in_array($key, $keys)) {
                                            $issue = $res[$key];
                                        }
                                    }
                                }
                            }
                        }

                        $root = [];
                        $corrective = [];
                        foreach ($department->replymessage as $r) {
                            if ($r->rootcause != NULL) {
                                $root[] = $r->rootcause;
                            }

                            if ($r->corrective != NULL) {
                                $corrective[] = $r->corrective;
                            }

                            if ($r->ticket_status == 'Addressed' && $r->reply != NULL) {
                                $rep = $r->reply;
                            }
                        }

                        $createdOn = strtotime($department->created_on);

                        $lastModified = strtotime($department->last_modified);

                        $timeDifferenceInSeconds = $lastModified - $createdOn;

                        $value = $this->opf_model->convertSecondsToTime($timeDifferenceInSeconds);

                        $timetaken = '';

                        if ($value['days'] != 0) {

                            $timetaken .= $value['days'] . ' days, ';
                        }

                        if ($value['hours'] != 0) {

                            $timetaken .= $value['hours'] . ' hrs, ';
                        }

                        if ($value['minutes'] != 0) {

                            $timetaken .= $value['minutes'] . ' mins.';
                        }

                        if ($timeDifferenceInSeconds <= 60) {

                            $timetaken .= 'less than a minute';
                        }
                        $assignee = $department->department->pname;
                        $dataexport[$i]['row1'] = $sl;

                        $dataexport[$i]['row2'] = 'OPT- ' . $department->id;

                        $dataexport[$i]['row3'] = date('g:i a, d-m-y', strtotime($department->created_on));

                        $dataexport[$i]['row4'] = $department->feed->name . '(' . $department->feed->patientid . ')';
                        if ($issue) {

                            $dataexport[$i]['row5'] = $issue;
                        } else {
                            $dataexport[$i]['row5'] = 'Ticket was transferred';
                        }

                        $dataexport[$i]['row6'] = $department->department->description;

                        if (isset($department->feed->comment) && is_object($department->feed->comment)) {
                            $commentText = '';
                            foreach ($department->feed->comment as $key => $value) {
                                $commentText .= "$value, "; // Append all values dynamically
                            }
                            $commentText = rtrim($commentText, ', '); // Remove the trailing comma and space
                            $dataexport[$i]['row7'] = $commentText;
                        } else {
                            $dataexport[$i]['row7'] = 'NA';
                        }


                        if ($department->feed->suggestionText) {
                            $dataexport[$i]['row8'] = $department->feed->suggestionText;
                        } else {
                            $dataexport[$i]['row8'] =  'NA';
                        }
                        if (!empty($department_users[$department->department->type][$department->department->setkey][$department->department->slug])) {
                            $dataexport[$i]['row9'] = implode(',', $department_users[$department->department->type][$department->department->setkey][$department->department->slug]);
                        } else {
                            $dataexport[$i]['row9'] = 'NA';
                        }
                        // changes here sooraj

                        $dataexport[$i]['row10'] = $rep;

                        $dataexport[$i]['row11'] = implode(", ", $root);

                        $dataexport[$i]['row12'] = implode(", ", $corrective);

                        $dataexport[$i]['row13'] = date('g:i a, d-m-y', strtotime($department->last_modified));

                        $dataexport[$i]['row14'] = $timetaken;


                        $i++;

                        $sl++;
                    }
                }
            }


            ob_end_clean();

            $fileName = 'EF- OPF CAPA REPORT - ' . $tdate . ' to ' . $fdate . '.csv';

            header('Pragma: public');

            header('Expires: 0');

            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

            header('Cache-Control: private', false);

            header('Content-Type: text/csv');

            header('Content-Disposition: attachment;filename=' . $fileName);

            if (isset($dataexport[0])) {

                $fp = fopen('php://output', 'w');

               

                foreach ($dataexport as $values) {

                    

                    fputcsv($fp, $values, ',');
                }

                fclose($fp);
            }

            ob_flush();

            exit;
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function download_capa_report_pdf()
    {
        if (ismodule_active('OP') === true) {

            $logo = base_url('uploads/') . $this->session->userdata['logo'];
            $title = array();
            $title = $this->session->userdata['title'];

            $users = $this->db->select('user.*')
                ->get('user')
                ->result();

            $department_users = array();
            foreach ($users as $user) {
                $parameter = json_decode($user->department);
                foreach ($parameter as $key => $rows) {
                    foreach ($rows as $k => $row) {
                        $slugs = explode(',', $row);
                        foreach ($slugs as $r) {
                            $department_users[$key][$k][$r][] = $user->firstname;
                        }
                    }
                }
            }

            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];

            $this->db->select("*");
            $this->db->from('setupop');
            $query = $this->db->get();
            $reasons = $query->result();

            foreach ($reasons as $row) {
                $keys[$row->shortkey] = $row->shortkey;
                $res[$row->shortkey] = $row->shortname;
                $titles[$row->shortkey] = $row->title;
            }

            $dataexport = array();
            $i = 0;
            $departments = $this->ticketsop_model->read_close();

            // echo '<pre>';
            // print_r($departments);
            // echo '</pre>';
            // exit;



            if (!empty($departments)) {
                $sl = 1;
                foreach ($departments as $department) {
                    if ($department->status == 'Closed') {
                        $rep = '';
                        if ($department->departmentid_trasfered != 0) {
                            $issue = NULL;
                        } else {
                            foreach ($department->feed->reason as $key => $value) {
                                if ($key) {
                                    if ($titles[$key] == $department->department->description) {
                                        if (in_array($key, $keys)) {
                                            $issue = $res[$key];
                                        }
                                    }
                                }
                            }
                        }

                        $root = [];
                        $corrective = [];
                        foreach ($department->replymessage as $r) {
                            if ($r->rootcause != NULL) {
                                $root[] = $r->rootcause;
                            }

                            if ($r->corrective != NULL) {
                                $corrective[] = $r->corrective;
                            }

                            if ($r->ticket_status == 'Addressed' && $r->reply != NULL) {
                                $rep = $r->reply;
                            }
                        }

                        $createdOn = strtotime($department->created_on);
                        $lastModified = strtotime($department->last_modified);
                        $timeDifferenceInSeconds = $lastModified - $createdOn;

                        $value = $this->opf_model->convertSecondsToTime($timeDifferenceInSeconds);

                        $timetaken = '';
                        if ($value['days'] != 0) {
                            $timetaken .= $value['days'] . ' days, ';
                        }

                        if ($value['hours'] != 0) {
                            $timetaken .= $value['hours'] . ' hrs, ';
                        }

                        if ($value['minutes'] != 0) {
                            $timetaken .= $value['minutes'] . ' mins.';
                        }

                        if ($timeDifferenceInSeconds <= 60) {
                            $timetaken .= 'less than a minute';
                        }

                        $assignee = $department->department->pname;

                        $dataexport[] = array(
                            // 'SL No.' => $sl,
                            'TICKET ID' => 'OPT- ' . $department->id,
                            'PATIENT DETAILS' => ($department->feed->name ?? '') . (!empty($department->feed->patientid) ? ' (' . $department->feed->patientid . ')' : '') . '<br>' . ($department->feed->ward ?? '') . '<br>' . (!empty($department->feed->contactnumber) ? '<i class="fa fa-phone"></i> ' . $department->feed->contactnumber : ''),
                            'TICKET DETAILS' => 'Rated ' . $department->ratingt . ' for ' . $department->department->description . '<br>' .
                                'Concern: ' . ($issue ? $issue : 'Ticket was transferred') . '<br>' .
                                'Comment: ' . ($department->feed->suggestionText ? $department->feed->suggestionText : 'NA'),

                            'ASSIGNEE' => !empty($department_users[$department->department->type][$department->department->setkey][$department->department->slug])
                                ? implode(',', $department_users[$department->department->type][$department->department->setkey][$department->department->slug])
                                : 'NA',
                            'CREATED ON' => date('g:i a, d-m-y', strtotime($department->created_on)),
                            'RESOLVED ON' => date('g:i a, d-m-y', strtotime($department->last_modified)),
                            // 'ADDRESSAL COMMENT' => $rep,
                            'RCA/CAPA' => 'RCA: ' . (!empty($root) ? implode(", ", $root) : 'NA') . '<br>' .
                                'CAPA: ' . (!empty($corrective) ? implode(", ", $corrective) : 'NA'),

                            'TURN AROUND TIME' => $timetaken
                        );

                        $sl++;
                    }
                }
            }

            $this->load->library('Pdf');
            // Load PDF Library and initialize
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Efeedor');
            $pdf->SetTitle('OP FEEDBACKS - CAPA REPORT - ' . $tdate . ' to ' . $fdate);
            $pdf->SetSubject('OP FEEDBACKS - CAPA REPORT - ' . $tdate . ' to ' . $fdate);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);

            $pdf->SetFont('dejavusans', '', 10);
            $pdf->AddPage();


            $html = '<span style="text-align:center;"><img src="' . $logo . '" style="height:30px; width:100px;margin-bottom:-3px;"></span>';
            $html .= '<h2 style="text-align:center;">' . $title . '</h2>';
            $html .= '<h2 style="text-align:center;">OP FEEDBACKS- CAPA REPORT </h2>';
            $html .= '<p><span style="text-align:left;">SHOWING DATA FROM ' . $tdate . ' TO ' . $fdate . '</span></p>';

            // Loop through the dataexport array
            foreach ($dataexport as $data) {
                // Add space between tables
                if ($data !== reset($dataexport)) {
                    $html .= '<p style="margin: 30px 0;"></p>'; // Adding space between tables
                }

                // Open table for each ticket
                $html .= '<table border="1" cellpadding="5" style="margin-bottom: 30px; width: 100%; border:1px solid #dadada; border-radius: 15px; border-collapse: collapse; font-family: Arial, sans-serif;">';

                // Ticket ID as a header for each ticket
                $html .= '<tr style="background: #dadada">
                <td colspan="1" style="font-weight: bold; text-align: left; color: red; ">
                    ' . $data['TICKET ID'] . '
                </td>
              </tr>';

                // Patient Details
                $html .= '<tr>
                <td style="width: 30%; font-weight: bold;">Patient details</td>
                <td>' . $data['PATIENT DETAILS'] . '</td>
              </tr>';

                // Ticket Details
                $html .= '<tr>
                <td style="font-weight: bold;">Ticket details</td>
                <td>' . $data['TICKET DETAILS'] . '</td>
              </tr>';

                // Assignee
                $html .= '<tr>
                <td style="font-weight: bold;">Assigned to</td>
                <td>' . $data['ASSIGNEE'] . '</td>
              </tr>';

                // Created On
                $html .= '<tr>
                <td style="font-weight: bold;">Created on</td>
                <td>' . $data['CREATED ON'] . '</td>
              </tr>';

                // Resolved On
                $html .= '<tr>
                <td style="font-weight: bold;">Resolved on</td>
                <td>' . $data['RESOLVED ON'] . '</td>
              </tr>';

                // Turn Around Time
                $html .= '<tr>
                <td style="font-weight: bold;">Turn Around Time</td>
                <td>' . $data['TURN AROUND TIME'] . '</td>
              </tr>';

                // RCA/CAPA
                $html .= '<tr>
                <td style="font-weight: bold;">RCA/ CAPA</td>
                <td>' . $data['RCA/CAPA'] . '</td>
              </tr>';

                // Close table for each ticket
                $html .= '</table>';
            }




            $pdf->writeHTML($html, true, false, true, false, '');

            $fileName = 'EF- OPF CAPA REPORT - ' . $tdate . ' to ' . $fdate . '.pdf';
            $pdf->Output($fileName, 'D');
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function download_alltickets()
    {
        if (ismodule_active('OP') === true) {


            $LOAD = pagetoload($this->module);
            if ($LOAD == 'outpatient_modules') {

                $users = $this->db->select('user.*')
                    ->get('user')
                    ->result();

                $department_users = array();
                foreach ($users as $user) {
                    $parameter = json_decode($user->department);


                    foreach ($parameter as $key => $rows) {
                        foreach ($rows as $k => $row) {

                            $slugs = explode(',', $row);

                            foreach ($slugs as $r) {
                                $department_users[$key][$k][$r][] = $user->firstname;
                            }
                        }
                    }
                }


                $fdate = $_SESSION['from_date'];
                $tdate = $_SESSION['to_date'];
                $this->db->select("*");
                $this->db->from('setupop');
                $query = $this->db->get();
                $reasons = $query->result();
                foreach ($reasons as $row) {
                    $keys[$row->shortkey] = $row->shortkey;
                    $res[$row->shortkey] = $row->shortname;
                    $titles[$row->shortkey] = $row->title;
                }
                $dataexport = array();
                $i = 0;
                $departments = $this->ticketsop_model->alltickets();
                $dataexport[$i]['row1'] = 'SL No.';
                $dataexport[$i]['row2'] = 'TICKET ID';
                $dataexport[$i]['row3'] = 'CREATED ON';
                $dataexport[$i]['row4'] = 'PATIENT NAME';
                $dataexport[$i]['row5'] = 'PATIENT ID';
                $dataexport[$i]['row6'] = 'PHONE NUMBER';
                $dataexport[$i]['row7'] = 'SPEACIALITY';
                // $dataexport[$i]['row8'] = 'WARD';
                $dataexport[$i]['row8'] = 'CONCERN';
                $dataexport[$i]['row9'] = 'DEPARTMENT';
                $dataexport[$i]['row10'] = 'COMMENT';
                $dataexport[$i]['row11'] = 'ASSIGNEE';
                $dataexport[$i]['row12'] = 'STATUS';
                $dataexport[$i]['row13'] = 'TRANSFERRED TO';
                $dataexport[$i]['row14'] = 'LAST MODIFIED';
                $i++;
                if (!empty($departments)) {
                    $sl = 1;
                    foreach ($departments as $department) {

                        foreach ($department->feed->reason as $key => $value) {
                            if ($titles[$key] == $department->department->description) {
                                if (in_array($key, $keys)) {
                                    $issue = $res[$key];
                                }
                            }


                            if ($department->departmentid_trasfered !== NULL && $department->departmentid_trasfered !== '') {
                                $this->db->select("*");
                                $this->db->from('department');
                                $this->db->where('dprt_id', $department->departmentid_trasfered);
                                $query = $this->db->get();
                                $moved_to_arr = $query->result();
                            }
                            $transfer_dep_desc = $moved_to_arr[0]->description;
                            if (!empty($department)) {
                                $dataexport[$i]['row1'] = $sl;
                                $dataexport[$i]['row2'] = 'OPT- ' . $department->id;
                                $dataexport[$i]['row3'] = date('g:i a, d-m-y', strtotime($department->created_on));
                                $dataexport[$i]['row4'] = $department->feed->name;
                                $dataexport[$i]['row5'] = $department->feed->patientid;
                                $dataexport[$i]['row6'] = $department->feed->contactnumber;
                                $dataexport[$i]['row7'] = $department->feed->ward;
                                // $dataexport[$i]['row8'] = $department->feed->bedno;
                                if ($issue) {

                                    $dataexport[$i]['row8'] = $issue;
                                } else {
                                    $dataexport[$i]['row8'] = 'Ticket was transferred';
                                }
                                // $dataexport[$i]['row8'] = $issue;
                                $dataexport[$i]['row9'] = $department->department->description;
                                if ($department->feed->suggestionText) {
                                    $dataexport[$i]['row10'] = $department->feed->suggestionText;
                                } else {
                                    $dataexport[$i]['row10'] =  'NA';
                                }
                                if (!empty($department_users[$department->department->type][$department->department->setkey][$department->department->slug])) {
                                    $dataexport[$i]['row11'] = implode(',', $department_users[$department->department->type][$department->department->setkey][$department->department->slug]);
                                } else {
                                    $dataexport[$i]['row11'] = 'NA';
                                }
                                $dataexport[$i]['row12'] =  $department->status;
                                if ($transfer_dep_desc) {

                                    $dataexport[$i]['row13'] =  $transfer_dep_desc;
                                } else {
                                    $dataexport[$i]['row13'] =  'NA';
                                }
                                $dataexport[$i]['row14'] = date('g:i a, d-m-y', strtotime($department->last_modified));
                            }
                        }
                        $i++;
                        $sl++;
                    }
                }



                ob_end_clean();

                $fileName = 'EF- OPF ALL TICKETS REPORT - ' . $tdate . ' to ' . $fdate . '.csv';

                header('Pragma: public');

                header('Expires: 0');

                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

                header('Cache-Control: private', false);

                header('Content-Type: text/csv');

                header('Content-Disposition: attachment;filename=' . $fileName);

                if (isset($dataexport[0])) {

                    $fp = fopen('php://output', 'w');


                    foreach ($dataexport as $values) {

                        

                        fputcsv($fp, $values, ',');
                    }

                    fclose($fp);
                }

                ob_flush();

                exit;
            } else {
                redirect('dashboard/noaccess');
            }
        } else {

            redirect('dashboard/noaccess');
        }
    }


    public function download_opentickets()
    {
        if (ismodule_active('OP') === true) {


            $LOAD = pagetoload($this->module);
            if ($LOAD == 'outpatient_modules') {
                $users = $this->db->select('user.*')
                    ->get('user')
                    ->result();

                $department_users = array();
                foreach ($users as $user) {
                    $parameter = json_decode($user->department);


                    foreach ($parameter as $key => $rows) {
                        foreach ($rows as $k => $row) {

                            $slugs = explode(',', $row);

                            foreach ($slugs as $r) {
                                $department_users[$key][$k][$r][] = $user->firstname;
                            }
                        }
                    }
                }


                $departments = $this->ticketsop_model->alltickets();
                if (!empty($departments)) {

                    $fdate = $_SESSION['from_date'];
                    $tdate = $_SESSION['to_date'];
                    $this->db->select("*");
                    $this->db->from('setupop');
                    $query = $this->db->get();
                    $reasons = $query->result();
                    foreach ($reasons as $row) {
                        $keys[$row->shortkey] = $row->shortkey;
                        $res[$row->shortkey] = $row->shortname;
                        $titles[$row->shortkey] = $row->title;
                    }
                    $dataexport = array();
                    $i = 0;

                    $dataexport[$i]['row1'] = 'SL No.';
                    $dataexport[$i]['row2'] = 'TICKET ID';
                    $dataexport[$i]['row3'] = 'CREATED ON';
                    $dataexport[$i]['row4'] = 'PATIENT NAME';
                    $dataexport[$i]['row5'] = 'PATIENT ID';
                    $dataexport[$i]['row6'] = 'PHONE NUMBER';
                    $dataexport[$i]['row7'] = 'SPEACIALITY';
                    // $dataexport[$i]['row8'] = 'WARD';
                    $dataexport[$i]['row8'] = 'CONCERN';
                    $dataexport[$i]['row9'] = 'DEPARTMENT';
                    $dataexport[$i]['row10'] = 'COMMENT';
                    $dataexport[$i]['row11'] = 'ASSIGNEE';
                    $dataexport[$i]['row12'] = 'STATUS';
                    $dataexport[$i]['row13'] = 'TRANSFERRED TO';
                    $dataexport[$i]['row14'] = 'LAST MODIFIED';
                    $i++;
                }
                if (!empty($departments)) {
                    $sl = 1;
                    foreach ($departments as $department) {
                        if ($department->status != 'Closed') {

                            foreach ($department->feed->reason as $key => $value) {
                                if ($titles[$key] == $department->department->description) {
                                    if (in_array($key, $keys)) {
                                        $issue = $res[$key];
                                    }
                                }


                                if ($department->departmentid_trasfered !== NULL && $department->departmentid_trasfered !== '') {
                                    $this->db->select("*");
                                    $this->db->from('department');
                                    $this->db->where('dprt_id', $department->departmentid_trasfered);
                                    $query = $this->db->get();
                                    $moved_to_arr = $query->result();
                                }
                                $transfer_dep_desc = $moved_to_arr[0]->description;
                                if (!empty($department)) {
                                    $dataexport[$i]['row1'] = $sl;
                                    $dataexport[$i]['row2'] = 'OPT- ' . $department->id;
                                    $dataexport[$i]['row3'] = date('g:i a, d-m-y', strtotime($department->created_on));
                                    $dataexport[$i]['row4'] = $department->feed->name;
                                    $dataexport[$i]['row5'] = $department->feed->patientid;
                                    $dataexport[$i]['row6'] = $department->feed->contactnumber;
                                    $dataexport[$i]['row7'] = $department->feed->ward;
                                    // $dataexport[$i]['row8'] = $department->feed->bedno;
                                    if ($issue) {

                                        $dataexport[$i]['row8'] = $issue;
                                    } else {
                                        $dataexport[$i]['row8'] = 'Ticket was transferred';
                                    }
                                    // $dataexport[$i]['row8'] = $issue;
                                    $dataexport[$i]['row9'] = $department->department->description;
                                    if ($department->feed->suggestionText) {
                                        $dataexport[$i]['row10'] = $department->feed->suggestionText;
                                    } else {
                                        $dataexport[$i]['row10'] =  'NA';
                                    }
                                    if (!empty($department_users[$department->department->type][$department->department->setkey][$department->department->slug])) {
                                        $dataexport[$i]['row11'] = implode(',', $department_users[$department->department->type][$department->department->setkey][$department->department->slug]);
                                    } else {
                                        $dataexport[$i]['row11'] = 'NA';
                                    }
                                    $dataexport[$i]['row12'] =  $department->status;
                                    if ($transfer_dep_desc) {

                                        $dataexport[$i]['row13'] =  $transfer_dep_desc;
                                    } else {
                                        $dataexport[$i]['row13'] =  'NA';
                                    }
                                    $dataexport[$i]['row14'] = date('g:i a, d-m-y', strtotime($department->last_modified));
                                }
                            }
                            $i++;
                            $sl++;
                        }
                    }
                }



                ob_end_clean();

                $fileName = 'EF- OPF OPEN TICKETS REPORT - ' . $tdate . ' to ' . $fdate . '.csv';

                header('Pragma: public');

                header('Expires: 0');

                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

                header('Cache-Control: private', false);

                header('Content-Type: text/csv');

                header('Content-Disposition: attachment;filename=' . $fileName);

                if (isset($dataexport[0])) {

                    $fp = fopen('php://output', 'w');

               

                    foreach ($dataexport as $values) {

                        

                        fputcsv($fp, $values, ',');
                    }

                    fclose($fp);
                }

                ob_flush();

                exit;
            } else {
                redirect('dashboard/noaccess');
            }
        } else {

            redirect('dashboard/noaccess');
        }
    }

    public function ticket_resolution_rate()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {


            $data['title'] = 'OP- TICKET RESOLUTION RATE';
            #------------------------------#
            $data['content'] = $this->load->view('opmodules/ticket_analisys_page', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }


    public function average_resolution_time()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('OP') === true) {


            $data['title'] = 'OP- AVERAGE RESOLUTION TIME';
            #------------------------------#
            $data['content'] = $this->load->view('opmodules/ticket_analisys_page', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
}
