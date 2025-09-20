<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Isr extends CI_Controller
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
                'ticketsesr_model',
                'isr_model',
                'setting_model',
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
        $this->module = 'esr_modules';

        $this->session->set_userdata([
            'active_menu' => array('esr_dashboard', 'esr_ticket', 'esr_reports', 'esr_patients', 'esr_settings'),
        ]);

        // if (ismodule_active('ISR') === false  && $this->uri->segment(2) != 'track')
        //     redirect('dashboard/noaccess');
    }

    // RESERVED FOR DEVELOPER OR COMPANY ACCESS
    public function index()
    {
        if (ismodule_active('ISR') === true) {

            $data['title'] = 'ESR MODULE CONFIGURATION';
            $data['content'] = $this->load->view('esrmodules/developer', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    // SUPER ADMIN AND ADMIN LOGIN
    public function ticket_dashboard()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {


            $data['title'] = 'ISR- REQUESTS DASHBOARD';
            #------------------------------#
            $data['content'] = $this->load->view('esrmodules/ticket_dashboard', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }



       public function escalation_report()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $dates = get_from_to_date();
            $data['title'] = 'ISR- ESCALATION REPORT-INTERNAL SERVICE REQUEST';
            #-------------------------------#
            $data['departments'] = $this->ticketsesr_model->alltickets();
           
                $data['content'] = $this->load->view('esrmodules/escalation_report', $data, true);
           
            $this->load->view('layout/main_wrapper', $data);
            $this->session->set_userdata('referred_from', NULL);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function rejecttickets()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('ISR') === true) {
            $dates = get_from_to_date();
            $data['title'] = 'ISR- REJECTED REQUEST';
            $data['departments'] = $this->ticketsesr_model->rejecttickets();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/rejecttickets', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/rejecttickets', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
            // redirect('tickets/alltickets');

        } else {
            redirect('dashboard/noaccess');
        }
    }

    // END SUPER ADMIN AND ADMIN LOGIN


    // DEPARTMENT HEAD LOGIN
    public function department_tickets()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('ISR') === true && isfeature_active('DEPARTMENT-HEAD-OVERALL-PAGE') === true) {


            $data['title'] = 'ISR- REQUESTS DASHBOARD';
            #------------------------------#
            $data['content'] = $this->load->view('esrmodules/department_tickets', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            //used for department head login

        } else {
            redirect('dashboard/noaccess');
        }
    }
    // END DEPARTMENT HEAD LOGIN

    //START TICKETS 
    public function alltickets()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('ISR') === true) {
            $dates = get_from_to_date();
            $data['title'] = 'ISR- ALL REQUESTS';
            #-------------------------------#
            $data['departments'] = $this->ticketsesr_model->alltickets();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/alltickets', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/alltickets', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function alltickets_individual_user()
    {
        $userName = $this->session->userdata['fullname'];
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('ISR') === true) {
            $dates = get_from_to_date();
            $data['title'] = 'ISR all requests raised  by ' . $userName . '';
            #-------------------------------#
            $data['departments'] = $this->ticketsesr_model->alltickets_individual_user();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/alltickets_individual_user', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/alltickets_individual_user', $data, true);
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

        if (ismodule_active('ISR') === true) {
            $dates = get_from_to_date();
            $data['title'] = 'ISR- ADDRESSED REQUESTS';
            $data['departments'] = $this->ticketsesr_model->addressedtickets();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/addressedtickets', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/addressedtickets', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
            // redirect('tickets/alltickets');

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

        $data['title'] = 'ISR- SERVICE REQUEST DETAILS';
        $data['departments'] = $this->ticketsesr_model->read_by_id($this->uri->segment(3));
        if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
            $data['content'] = $this->load->view('esrmodules/ticket_track', $data, true);
        } else {
            $data['content'] = $this->load->view('esrmodules/dephead/ticket_track', $data, true);
        }
        $this->load->view('layout/main_wrapper', $data);
    }

    // open tickets
    public function opentickets()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $dates = get_from_to_date();
            $data['title'] = 'ISR- OPEN REQUESTS';
            #-------------------------------#
            $data['departments'] = $this->ticketsesr_model->read();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/opentickets', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/opentickets', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
            $this->session->set_userdata('referred_from', NULL);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function read_individual_user()
    {
        $userName = $this->session->userdata['fullname'];
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $dates = get_from_to_date();
            $data['title'] = 'ISR open requests raised  by ' . $userName . '';
            #-------------------------------#
            $data['departments'] = $this->ticketsesr_model->read_individual_user();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/read_individual_user', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/read_individual_user', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
            $this->session->set_userdata('referred_from', NULL);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function assignedtickets_individual_user()
    {
        $userName = $this->session->userdata['fullname'];
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $dates = get_from_to_date();
            $data['title'] = 'ISR assigned requests raised  by ' . $userName . '';
            #-------------------------------#
            $data['departments'] = $this->ticketsesr_model->assignedtickets_individual_user();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/assignedtickets_individual_user', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/assignedtickets_individual_user', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
            $this->session->set_userdata('referred_from', NULL);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function assignedtickets()
    {
        $userName = $this->session->userdata['fullname'];
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $dates = get_from_to_date();
            $data['title'] = 'ISR- ASSIGNED REQUESTS';
            #-------------------------------#
            $data['departments'] = $this->ticketsesr_model->assignedtickets();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/assignedtickets', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/assignedtickets', $data, true);
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
        if (ismodule_active('ISR') === true) {

            $dates = get_from_to_date();

            $data['title'] = 'ISR- CLOSED REQUESTS';
            $data['departments'] = $this->ticketsesr_model->read_close();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/closedtickets', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/closedtickets', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
            // redirect('tickets/ticket_close');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function read_close_individual_user()
    {
        $userName = $this->session->userdata['fullname'];
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {
            $dates = get_from_to_date();


            $data['title'] = 'ISR closed requests raised  by ' . $userName . '';
            $data['departments'] = $this->ticketsesr_model->read_close_individual_user();
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/read_close_individual_user', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/read_close_individual_user', $data, true);
            }
            $this->load->view('layout/main_wrapper', $data);
            // redirect('tickets/ticket_close');

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
        if (ismodule_active('ISR') === true) {

            $data['title'] = 'ISR- CAPA REPORT';
            $dates = get_from_to_date();
            $data['departments'] = $this->ticketsesr_model->read_close();
            $data['content'] = $this->load->view('esrmodules/capa_report', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }



    public function complaints()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $data['title'] = 'ISR- PATIENT' . "'" . 'S COMMENTS';
            $data['content'] = $this->load->view('esrmodules/recent_comments', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/int_recent_comments');

        } else {
            redirect('dashboard/noaccess');
        }
    }


    public function employee_complaint()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $data['title'] = 'ISR- INTERNAL SERVICE REQUEST';
            #------------------------------#
            if (isfeature_active('ISR-REQUESTS-DASHBOARD') === true) {
                $data['content'] = $this->load->view('esrmodules/employee_complaint', $data, true);
            } else {
                $data['content'] = $this->load->view('esrmodules/dephead/employee_complaint', $data, true);
            }

            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/int_patient_feedback');

        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function notifications()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $data['title'] = 'ISR- REQUEST NOTIFICATIONS';
            $data['content'] = $this->load->view('esrmodules/recent_comments', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    //END REPORTS



    public function downloadcomments()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {


            $table_feedback = 'bf_feedback_esr';
            $table_patients = 'bf_employees_esr';
            $desc = 'desc';
            $setup = 'setup_esr';

            $feedbacktaken = $this->isr_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->isr_model->setup_result($setup);
            $setarray = array();
            $question = array();
            foreach ($sresult as $r) {
                $setarray[$r->type] = $r->title;
                $setarray[$r->shortkey] = $r->shortname;
            }
            foreach ($sresult as $r) {
                $question[$r->shortkey] = $r->shortname;
                $question[$r->type] = $r->title;
            }



            $header[0] = 'Date';
            $header[1] = 'Employee Name';
            $header[2] = 'Employee ID';
            $header[3] = 'Floor/Ward';
            $header[4] = 'Location';
            $header[5] = 'Mobile Number';
            $header[6] = 'Category';
            $header[7] = 'Service Request';
            $header[8] = 'Description';
           
            $dataexport = array();
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);
                $dataexport[$i]['date'] = date('d-m-Y', strtotime($row->datetime));
                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['patient_id'] = $data['patientid'];
                $dataexport[$i]['ward'] = $data['ward'];
                $dataexport[$i]['bedno'] = $data['bedno'];
                $dataexport[$i]['mobile'] = $data['contactnumber'];
                foreach ($data['comment'] as $key => $value) {
                    $dataexport[$i]['Department'] = $setarray[$key];
                }
                foreach ($data['reason'] as $key => $value) {
                    if ($value) {
                        $dataexport[$i]['ticket'] = $question[$key];
                    }
                }
                foreach ($data['comment'] as $key => $value) {
                    if ($value) {
                        $dataexport[$i]['comment'] = $value;
                    }
                }
                $i++;
            }
            $newdataset = $dataexport;
            // echo '<pre>';
            // print_r($dataexport);
            // exit;
            ob_end_clean();
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];

            $fileName = 'EF- STAFF SERVICE REQUEST REPORT - ' . $tdate . ' to ' . $fdate . '.csv';
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

    public function dep_tat()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $data['title'] = 'TAT SET';
            $data['content'] = $this->load->view('esrmodules/dep_tat', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }




    public function dep_tat_edit()
    {
        if (ismodule_active('ISR') === true) {

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



            $data['title'] = 'Internal Service Request - Manage Escalation Turn Around Time';

            #------------------------------#

            $data['content'] = $this->load->view('esrmodules/dep_tat_edit', $data, true);

            $this->load->view('layout/main_wrapper', $data);
        }
    }

    public function overall_department_excel()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {


            $dataexport = array();
            $i = 0;
            $table_feedback = 'bf_feedback_esr';
            $table_patients = 'bf_employees_esr';
            $sorttime = 'asc';
            $setup = 'setup_esr';
            $asc = 'asc';
            $desc = 'desc';
            $table_tickets = 'tickets_esr';
            $open = 'Open';
            $closed = 'Closed';
            $addressed = 'Addressed';
            $type = 'esr';

            $int_feedbacks_count = $this->isr_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);

            $int_tickets_count = $this->ticketsesr_model->alltickets();
            $int_open_tickets = $this->ticketsesr_model->read();
            $int_closed_tickets = $this->ticketsesr_model->read_close();
            $int_addressed_tickets = $this->ticketsesr_model->addressedtickets();

            $ticket_resolution_rate = $this->isr_model->ticket_resolution_rate($table_tickets, $closed, $table_feedback);

            $header = 'ESR DEPARTMENT WISE REQUEST REPORT';
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];

            $dataexport[$i]['row1'] = 'REQUESTS REPORT';
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


            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'TOTAL REQUESTS';
            $dataexport[$i]['row2'] = count($int_tickets_count);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;



            $dataexport[$i]['row1'] = 'OPEN REQUESTS';
            $dataexport[$i]['row2'] = count($int_open_tickets);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;
            if (ticket_addressal('isr_addressal') === true) {

                $dataexport[$i]['row1'] = 'ADDRESSED REQUESTS';
                $dataexport[$i]['row2'] = count($int_addressed_tickets);
                $dataexport[$i]['row3'] = '';
                $dataexport[$i]['row4'] = '';
                $i++;
            }
            $dataexport[$i]['row1'] = 'CLOSED REQUESTS';
            $dataexport[$i]['row2'] = count($int_closed_tickets);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'REQUEST RESOLUTION RATE';
            $dataexport[$i]['row2'] = $ticket_resolution_rate . '%';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;



            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'REQUESTS RECEIVED BY CATEGORY';
            $dataexport[$i]['row2'] = 'PERCENTAGE';
            $dataexport[$i]['row3'] = 'COUNT';
            $dataexport[$i]['row4'] = 'OPEN';
            $ticket = $this->isr_model->tickets_recived_by_department_interim($type, $table_feedback, $table_tickets);

            foreach ($ticket as $ps) {
                // print_r($ticket);
                $time = secondsToTimeforreport($ps['res_time']);
                $dataexport[$i]['row1'] = $ps['department'];

                $dataexport[$i]['row2'] = $ps['percentage'] . '%';

                $dataexport[$i]['row3'] = $ps['total_count'];

                $dataexport[$i]['row4'] = $ps['open_tickets'];
                if (ticket_addressal('isr_addressal') === true) {

                    $dataexport[$i]['row5'] = $ps['addressed_tickets'];
                }
                $dataexport[$i]['row6'] = $ps['closed_tickets'];

                $dataexport[$i]['row7'] = $ps['tr_rate'] . '%';

                $dataexport[$i]['row8'] = $time;

                $i++;
            }
            $dataexport[$i]['row5'] = 'ADDRESSED';
            $dataexport[$i]['row6'] = 'CLOSED';
            $dataexport[$i]['row7'] = 'RESOLUTION RATE';
            $dataexport[$i]['row8'] = '';
            $i++;

            $ticket = $this->isr_model->tickets_recived_by_department_interim($type, $table_feedback, $table_tickets);

            foreach ($ticket as $ps) {
                $dataexport[$i]['row1'] = $ps['department'];
                $dataexport[$i]['row2'] = $ps['percentage'] . '%';
                $dataexport[$i]['row3'] = $ps['total_count'];
                $dataexport[$i]['row4'] = $ps['open_tickets'];
                $dataexport[$i]['row5'] = $ps['addressed_tickets'];
                $dataexport[$i]['row6'] = $ps['closed_tickets'];
                $dataexport[$i]['row7'] = $ps['tr_rate'] . '%';
                $dataexport[$i]['row8'] = '';
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
            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            ob_end_clean();
            $fileName = 'EF- ISR CATEGORY WISE REPORT - ' . $tdate . ' to ' . $fdate . '.csv';
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

    public function overall_pdf_report()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            redirect('pdfreport/esr_pdf_report?fdate=' . $tdate . '&tdate=' . $fdate);
            // redirect('report/ip_capa_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }





    public function download_capa_report()
    {

        if ($this->session->userdata('isLogIn') == false)

            redirect('login');

        if (ismodule_active('ISR') === true) {

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

            $this->db->from('setup_esr');

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

            $departments = $this->ticketsesr_model->read_close();



            $dataexport[$i]['row1'] = 'SL No.';

            $dataexport[$i]['row2'] = 'REQUEST ID';

            $dataexport[$i]['row3'] = 'REPORTED ON';

            $dataexport[$i]['row4'] = 'REPORTED BY';

            $dataexport[$i]['row5'] = 'REPORTED IN';

            $dataexport[$i]['row6'] = 'SERVICE REQUEST';

            $dataexport[$i]['row7'] = 'CATEGORY';

            $dataexport[$i]['row8'] = 'DESCRIPTION';

            // $dataexport[$i]['row9'] = 'ASSIGNEE';

            $dataexport[$i]['row9'] = 'REQUEST TIMELINE & HISTORY';

            $dataexport[$i]['row10'] = 'RESOLVED ON';

            $dataexport[$i]['row11'] = 'TIME TAKEN';
            $dataexport[$i]['row12'] = 'TIME TAKEN IN MINUTE';

            // $dataexport[$i]['row13'] = 'TAT STATUS';

            $i++;



            if (!empty($departments)) {
                $sl = 1;
                foreach ($departments as $department) {

                    if ($department->status == 'Closed') {
                        // Initialize variables to ensure they are reset for each department
                        $root = [];
                        $corrective = [];
                        $resolution_note = [];

                        foreach ($department->replymessage as $r) {
                            if ($r->rootcause != NULL) {
                                $root[] = $r->rootcause;
                            }

                            if ($r->corrective != NULL) {
                                $corrective[] = $r->corrective;
                            }

                            if ($r->resolution_note != NULL) {
                                $resolution_note = $r->resolution_note;
                            }

                            if ($r->ticket_status == 'Addressed' && $r->reply != NULL) {
                                $rep = $r->reply;
                            }
                        }

                        $this->db->where('ticketid', $department->id)->where('ticket_status', 'Closed');
                        $query = $this->db->get('ticket_esr_message');
                        $ticket = $query->result();
                        $rowmessage = $ticket[0]->message . ' Closed this ticket';
                        $createdOn1 = strtotime($department->created_on);
                        $lastModified1 = strtotime($department->last_modified);
                        $closeddiff = $lastModified1 - $createdOn1;

                        if ($department->department->close_time <= $closeddiff) {
                            $close = 'Exceeded TAT';
                        } else {
                            $close = 'Within TAT';
                        }

                        if (strlen($rowmessage) > 60) {
                            $rowmessage = substr($rowmessage, 0, 60) . '  ' . ' ... click status to view';
                        }

                        foreach ($department->feed->reason as $key => $value) {
                            if (isset($titles[$key]) && $titles[$key] == $department->department->description) {
                                if (in_array($key, $keys)) {
                                    $issue = $res[$key];
                                }
                            }
                        }



                        $value2 = $this->isr_model->convertSecondsToTime($department->department->close_time);
                        $dep_tat = '';
                        if ($value2['days'] != 0) {
                            $dep_tat .= $value2['days'] . ' days, ';
                        }
                        if ($value2['hours'] != 0) {
                            $dep_tat .= $value2['hours'] . ' hrs, ';
                        }
                        if ($value2['minutes'] != 0) {
                            $dep_tat .= $value2['minutes'] . ' mins.';
                        }

                        $createdOn = strtotime($department->created_on);
                        $lastModified = strtotime($department->last_modified);
                        $timeDifferenceInSeconds = $lastModified - $createdOn;
                        $value = $this->isr_model->convertSecondsToTime($timeDifferenceInSeconds);
                        $totalMinutes = round($timeDifferenceInSeconds / 60);
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

                        $dataexport[$i]['row1'] = $sl;
                        $dataexport[$i]['row2'] = 'ISR- ' . $department->id;
                        $dataexport[$i]['row3'] = date('g:i a, d-m-y', strtotime($department->created_on));
                        $dataexport[$i]['row4'] = $department->feed->name . '(' . $department->feed->patientid . ')';
                        $dataexport[$i]['row5'] = $department->feed->ward . '(' . $department->feed->bedno . ')';
                        $dataexport[$i]['row6'] = $issue;


                        $dataexport[$i]['row7'] = $department->department->description;
                        if ($department->feed->other) {
                            $dataexport[$i]['row8'] = $department->feed->other;
                        } else {
                            $dataexport[$i]['row8'] = 'NA';
                        }

                        // $dataexport[$i]['row7'] = $dep_tat;
                        // if (!empty($department_users[$department->department->type][$department->department->setkey][$department->department->slug])) {
                        //     $dataexport[$i]['row9'] = implode(',', $department_users[$department->department->type][$department->department->setkey][$department->department->slug]);
                        // } else {
                        //     $dataexport[$i]['row9'] = 'NA';
                        // }


                        // Sort the reply messages by created_on
                        usort($department->replymessage, function ($a, $b) {
                            return strtotime($a->created_on) - strtotime($b->created_on);
                        });

                        $reply_details = "";

                        foreach ($department->replymessage as $r) {
                            $reply_details .= "Date & Time : " . date('d M, Y - g:i A', strtotime($r->created_on)) . "\n";
                            $reply_details .= "Action : " . strip_tags($r->action) . "\n";

                            if ($r->ticket_status == 'Assigned') {
                                $reply_details .= "Assigned by : " . strip_tags($r->message) . "\n";
                            }

                            if ($r->ticket_status == 'Re-assigned') {
                                $reply_details .= "Re-assigned by : " . strip_tags($r->message) . "\n";
                            }

                            if ($r->ticket_status == 'Described') {
                                $reply_details .= "RCA : " . strip_tags($r->rootcause_describtion) . "\n";
                                $reply_details .= "CAPA : " . strip_tags($r->corrective_description) . "\n";
                                $reply_details .= "Additional note : " . strip_tags($r->reply) . "\n";
                            } elseif (!empty($r->reply)) {
                                $reply_details .= "Comment : " . strip_tags($r->reply) . "\n";
                            }

                            if ($r->ticket_status == 'Closed') {
                                if (!empty($r->rootcause))
                                    $reply_details .= "Closure RCA : " . strip_tags($r->rootcause) . "\n";
                                if (!empty($r->corrective))
                                    $reply_details .= "Closure CAPA : " . strip_tags($r->corrective) . "\n";
                                if (!empty($r->preventive))
                                    $reply_details .= "Preventive : " . strip_tags($r->preventive) . "\n";
                                if (!empty($r->resolution_note))
                                    $reply_details .= "Additional note : " . strip_tags($r->resolution_note) . "\n";
                            }

                            $reply_details .= "---------------------------------------\n";
                        }

                        $dataexport[$i]['row9'] = $reply_details;


                        $dataexport[$i]['row10'] = date('g:i a, d-m-y', strtotime($department->last_modified));
                        $dataexport[$i]['row11'] = $timetaken;
                        $dataexport[$i]['row12'] = $totalMinutes . ' minutes'; // Time in minutes
                        // $dataexport[$i]['row13'] = $close;

                        $i++;
                        $sl++;
                    }
                }
            }



            ob_end_clean();

            $fileName = 'EF- ISR CAPA REPORT - ' . $tdate . ' to ' . $fdate . '.csv';

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
        if (ismodule_active('ISR') === true) {

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
            $this->db->from('setup_esr');
            $query = $this->db->get();
            $reasons = $query->result();

            foreach ($reasons as $row) {
                $keys[$row->shortkey] = $row->shortkey;
                $res[$row->shortkey] = $row->shortname;
                $titles[$row->shortkey] = $row->title;
            }

            $dataexport = array();
            $i = 0;
            $departments = $this->ticketsesr_model->read_close();

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
                        $resolution_note = [];

                        foreach ($department->replymessage as $r) {
                            if ($r->rootcause != NULL) {
                                $root[] = $r->rootcause;
                            }

                            if ($r->corrective != NULL) {
                                $corrective[] = $r->corrective;
                            }

                            if ($r->resolution_note != NULL) {
                                $resolution_note[] = $r->resolution_note;
                            }

                            if ($r->ticket_status == 'Addressed' && $r->reply != NULL) {
                                $rep = $r->reply;
                            }
                        }

                        $createdOn = strtotime($department->created_on);
                        $lastModified = strtotime($department->last_modified);
                        $timeDifferenceInSeconds = $lastModified - $createdOn;

                        $value = $this->isr_model->convertSecondsToTime($timeDifferenceInSeconds);

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
                        $requestHistory = $department->replymessage;


                        $dataexport[] = array(
                            // 'SL No.' => $sl,
                            'TICKET ID' => 'ISR- ' . $department->id,
                            'TICKET DETAILS' => 'Category: ' . ($department->department->description) . '<br>' .
                                'Service request: ' . ($issue ? $issue : 'Ticket was transferred') . '<br>' .
                                'description: ' . ($department->feed->other ? $department->feed->other : 'NA'),

                            'PRIORITY' => $department->priority,

                            'PATIENT DETAILS' => ($department->feed->name ?? '') . (!empty($department->feed->patientid) ? ' (' . $department->feed->patientid . ')' : '') . '<br>' . (!empty($department->feed->contactnumber) ? '<i class="fa fa-phone"></i> ' . $department->feed->contactnumber . '<br>' : '') . (!empty($department->feed->email) ? '<i class="fa fa-envelope"></i> ' . $department->feed->email : ''),


                            'FLOOR DETAILS' => 'Floor/ Ward: ' . ($department->feed->ward) . '<br>' .
                                'Site: ' . ($department->feed->bedno ? $department->feed->bedno : 'NA'),

                            'ASSIGNEE' => !empty($department_users[$department->department->type][$department->department->setkey][$department->department->slug])
                                ? implode(',', $department_users[$department->department->type][$department->department->setkey][$department->department->slug])
                                : 'NA',
                            'CREATED ON' => date('g:i a, d-m-y', strtotime($department->created_on)),
                            'RESOLVED ON' => date('g:i a, d-m-y', strtotime($department->last_modified)),
                            // 'ADDRESSAL COMMENT' => $rep,
                            'RCA/CAPA' =>
                            'Resolution Comment: ' . (!empty($resolution_note) ? implode(", ", $resolution_note) : 'NA'),

                            'TURN AROUND TIME' => $timetaken,
                            'DATA' => $department->replymessage
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
            $pdf->SetTitle('INTERNAL SERVICE REQUESTS - CAPA REPORT - ' . $tdate . ' to ' . $fdate);
            $pdf->SetSubject('INTERNAL SERVICE REQUESTS - CAPA REPORT - ' . $tdate . ' to ' . $fdate);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);

            $pdf->SetFont('dejavusans', '', 10);
            $pdf->AddPage();


            $html = '<span style="text-align:center;"><img src="' . $logo . '" style="height:30px; width:100px;margin-bottom:-3px;"></span>';
            $html .= '<h2 style="text-align:center;">' . $title . '</h2>';
            $html .= '<h2 style="text-align:center;">INTERNAL SERVICE REQUESTS- CAPA REPORT </h2>';
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
                <td colspan="1" style="font-weight: bold; text-align: left; color: red;">
                    ' . $data['TICKET ID'] . '
                </td>
                </tr>';

                //Request Details
                $html .= '<tr>
                <td style="width: 30%; font-weight: bold;">Service request details</td>
                <td>' . $data['TICKET DETAILS'] . '</td>
                </tr>';

                //Priority
                $html .= '<tr>
                <td style="width: 30%; font-weight: bold;">Priority</td>
                <td>' . $data['PRIORITY'] . '</td>
                </tr>';

                //Floor and site Details
                $html .= '<tr>
                <td style="width: 30%; font-weight: bold;">Request reported in</td>
                <td>' . $data['FLOOR DETAILS'] . '</td>
                </tr>';

                //Emp Details
                $html .= '<tr>
                <td style="width: 30%; font-weight: bold;">Request reported by</td>
                <td>' . $data['PATIENT DETAILS'] . '</td>
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

                $html .= '<tr>
                <td style="width: 30%; font-weight: bold;">Request Timeline & History</td>
                <td>';



                // Sort request History by created_on
                usort($data['DATA'], function ($a, $b) {
                    return strtotime($a->created_on) - strtotime($b->created_on);
                });

                foreach ($data['DATA'] as $r) {
                    $html .= '<div style="margin-bottom:15px; border-bottom:1px dashed #ccc; padding-bottom:10px;">';
                    $html .= '<strong>Date & Time :</strong> ' . date('d M, Y - g:i A', strtotime($r->created_on)) . '<br>';

                    $html .= '<strong>Action :</strong> ' . $r->action . '<br>';
                    if ($r->ticket_status == 'Assigned') {
                        $html .= '<strong>Assigned by :</strong> ' . $r->message . '<br>';
                    }
                    if ($r->ticket_status == 'Re-assigned') {
                        $html .= '<strong>Re-assigned by :</strong> ' . $r->message . '<br>';
                    }
                    if ($r->ticket_status == 'Described') {
                        $html .= '<strong>RCA :</strong> ' . $r->rootcause_describtion . '<br>';
                        $html .= '<strong>CAPA :</strong> ' . $r->corrective_description . '<br>';
                        $html .= '<strong>Additional note :</strong> ' . $r->reply . '<br>';
                    } elseif ($r->reply) {
                        $html .= '<strong>Comment :</strong> ' . $r->reply . '<br>';
                    }

                    if ($r->ticket_status == 'Closed') {
                        if ($r->rootcause)
                            $html .= '<strong>Closure RCA :</strong> ' . $r->rootcause . '<br>';
                        if ($r->corrective)
                            $html .= '<strong>Closure CAPA :</strong> ' . $r->corrective . '<br>';
                        if ($r->preventive)
                            $html .= '<strong>Preventive :</strong> ' . $r->preventive . '<br>';
                        if ($r->resolution_note)
                            $html .= '<strong>Additional note :</strong> ' . $r->resolution_note . '<br>';
                    }

                    $html .= '</div>';
                }

                $html .= '</td></tr>'; // End incident history row


                // Close table for each ticket
                $html .= '</table>';
            }




            $pdf->writeHTML($html, true, false, true, false, '');

            $fileName = 'EF- ISR CAPA REPORT - ' . $tdate . ' to ' . $fdate . '.pdf';
            $pdf->Output($fileName, 'D');
        } else {
            redirect('dashboard/noaccess');
        }
    }



    public function download_alltickets()
    {

        if (ismodule_active('ISR') === true) {

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
            $this->db->from('setup_esr');
            $query = $this->db->get();
            $reasons = $query->result();
            foreach ($reasons as $row) {
                $keys[$row->shortkey] = $row->shortkey;
                $res[$row->shortkey] = $row->shortname;
                $titles[$row->shortkey] = $row->title;
            }
            $dataexport = array();
            $i = 0;
            $departments = $this->ticketsesr_model->alltickets();
            $dataexport[$i]['row1'] = 'SL No.';
            $dataexport[$i]['row2'] = 'REQUEST ID';
            $dataexport[$i]['row3'] = 'REPORTED ON';
            $dataexport[$i]['row4'] = 'REPORTED BY';
            $dataexport[$i]['row5'] = 'EMPLOYEE ID';
            $dataexport[$i]['row6'] = 'PHONE NUMBER';
            $dataexport[$i]['row7'] = 'FLOOR/WARD';
            $dataexport[$i]['row8'] = 'SITE';
            $dataexport[$i]['row9'] = 'SERVICE REQUEST';
            $dataexport[$i]['row10'] = 'CATEGORY';
            $dataexport[$i]['row11'] = 'COMMENT';
            $dataexport[$i]['row12'] = 'ASSIGNEE';
            $dataexport[$i]['row13'] = 'STATUS';
            $dataexport[$i]['row14'] = 'TRANSFERRED TO';
            $dataexport[$i]['row15'] = 'LAST MODIFIED';
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
                            $dataexport[$i]['row2'] = 'ISR- ' . $department->id;
                            $dataexport[$i]['row3'] = date('g:i a, d-m-y', strtotime($department->created_on));
                            $dataexport[$i]['row4'] = $department->feed->name;
                            $dataexport[$i]['row5'] = $department->feed->patientid;
                            $dataexport[$i]['row6'] = $department->feed->contactnumber;
                            $dataexport[$i]['row7'] = $department->feed->ward;
                            $dataexport[$i]['row8'] = $department->feed->bedno;
                            $dataexport[$i]['row9'] = $issue;
                            $dataexport[$i]['row10'] = $department->department->description;
                            if ($department->feed->other) {
                                $dataexport[$i]['row11'] = $department->feed->other;
                            } else {
                                $dataexport[$i]['row11'] = 'NA';
                            }
                            if (!empty($department_users[$department->department->type][$department->department->setkey][$department->department->slug])) {
                                $dataexport[$i]['row12'] = implode(',', $department_users[$department->department->type][$department->department->setkey][$department->department->slug]);
                            } else {
                                $dataexport[$i]['row12'] = 'NA';
                            }
                            $dataexport[$i]['row13'] = $department->status;
                            if ($transfer_dep_desc) {

                                $dataexport[$i]['row14'] = $transfer_dep_desc;
                            } else {
                                $dataexport[$i]['row14'] = 'NA';
                            }
                            $dataexport[$i]['row15'] = date('g:i a, d-m-y', strtotime($department->last_modified));
                        }
                    }
                    $i++;
                    $sl++;
                }
            }



            ob_end_clean();

            $fileName = 'EF- ISR ALL REQUESTS REPORT - ' . $tdate . ' to ' . $fdate . '.csv';

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

    public function download_opentickets()
    {
        if (ismodule_active('ISR') === true) {

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

            $departments = $this->ticketsesr_model->alltickets();
            if (!empty($departments)) {

                $fdate = $_SESSION['from_date'];
                $tdate = $_SESSION['to_date'];
                $this->db->select("*");
                $this->db->from('setup_esr');
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
                $dataexport[$i]['row2'] = 'REQUEST ID';
                $dataexport[$i]['row3'] = 'REPORTED ON';
                $dataexport[$i]['row4'] = 'REPORTED BY';
                $dataexport[$i]['row5'] = 'EMPLOYEE ID';
                $dataexport[$i]['row6'] = 'PHONE NUMBER';
                $dataexport[$i]['row7'] = 'FLOOR/WARD';
                $dataexport[$i]['row8'] = 'SITE';
                $dataexport[$i]['row9'] = 'SERVICE REQUEST';
                $dataexport[$i]['row10'] = 'CATEGORY';
                $dataexport[$i]['row11'] = 'COMMENT';
                $dataexport[$i]['row12'] = 'ASSIGNEE';
                $dataexport[$i]['row13'] = 'STATUS';
                $dataexport[$i]['row14'] = 'TRANSFERRED TO';
                $dataexport[$i]['row15'] = 'LAST MODIFIED';
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
                                $dataexport[$i]['row2'] = 'ISR- ' . $department->id;
                                $dataexport[$i]['row3'] = date('g:i a, d-m-y', strtotime($department->created_on));
                                $dataexport[$i]['row4'] = $department->feed->name;
                                $dataexport[$i]['row5'] = $department->feed->patientid;
                                $dataexport[$i]['row6'] = $department->feed->contactnumber;
                                $dataexport[$i]['row7'] = $department->feed->ward;
                                $dataexport[$i]['row8'] = $department->feed->bedno;
                                $dataexport[$i]['row9'] = $issue;
                                $dataexport[$i]['row10'] = $department->department->description;

                                if ($department->feed->other) {
                                    $dataexport[$i]['row11'] = $department->feed->other;
                                } else {
                                    $dataexport[$i]['row11'] = 'NA';
                                }

                                if (!empty($department_users[$department->department->type][$department->department->setkey][$department->department->slug])) {
                                    $dataexport[$i]['row12'] = implode(',', $department_users[$department->department->type][$department->department->setkey][$department->department->slug]);
                                } else {
                                    $dataexport[$i]['row12'] = 'NA';
                                }
                                $dataexport[$i]['row13'] = $department->status;
                                if ($transfer_dep_desc) {

                                    $dataexport[$i]['row14'] = $transfer_dep_desc;
                                } else {
                                    $dataexport[$i]['row14'] = 'NA';
                                }
                                $dataexport[$i]['row15'] = date('g:i a, d-m-y', strtotime($department->last_modified));
                            }
                        }
                        $i++;
                        $sl++;
                    }
                }
            }



            ob_end_clean();

            $fileName = 'EF- ISR OPEN REQUESTS REPORT - ' . $tdate . ' to ' . $fdate . '.csv';

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

    public function ticket_resolution_rate()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $data['title'] = 'ISR- REQUEST RESOLUTION RATE';
            #------------------------------#
            $data['content'] = $this->load->view('esrmodules/ticket_analisys_page', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }


    public function average_resolution_time()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('ISR') === true) {

            $data['title'] = 'ISR- AVERAGE RESOLUTION TIME';
            #------------------------------#
            $data['content'] = $this->load->view('esrmodules/ticket_analisys_page', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
}
