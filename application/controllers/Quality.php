<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quality extends CI_Controller
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
                'tickets_model',
                'quality_model',
                'setting_model',
                'departmenthead_model',
            )
        );

        // $fdate = date('Y-m-d'); // today
        // $tdate = date('Y-m-01'); // first day of current month
        // $_SESSION['from_date'] = $fdate;
        // $_SESSION['to_date'] = $tdate;

        // $dates = get_from_to_date();
        if (isset($_SESSION['from_date']) && isset($_SESSION['to_date'])) {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
        } else {
            $fdate = date('Y-m-d'); // today
            $tdate = date('Y-m-01'); // first day of current month
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        }

        $this->module = 'inpatient_modules';

        $this->session->set_userdata([
            'active_menu' => array('ip_dashboard', 'ip_ticket', 'ip_reports', 'ip_patients', 'ip_settings', 'ip_dep', 'ip_analysis'),
        ]);

        if (ismodule_active('QUALITY') === false && $this->uri->segment(2) != 'track')
            redirect('dashboard/noaccess');
    }

    // RESERVED FOR DEVELOPER OR COMPANY ACCESS
    public function index()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        if (ismodule_active('QUALITY') === true) {

            $data['title'] = 'IP MODULE CONFIGURATION';
            $data['content'] = $this->load->view('qualitymodules/developer', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }



    // SUPER ADMIN AND ADMIN LOGIN
    public function quality_welcome_page()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();

            $data['title'] = 'QUALITY INDICATOR MANAGER DASHBOARD';
            #------------------------------#
            $data['content'] = $this->load->view('quality_welcome_page', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }


    //main page for all KPI
    public function feedbacks_report_CQI3a1()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Average Time for initial assessment of in-patients in MRD (ICU)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a2()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Average Time for initial assessment of in-patients (Doctors)- (MRI WARD)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a3()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Average Time for initial assessment of emergency patients (Doctors)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a4()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of Care-plan is documented for inpatients';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a5()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of Nutritional assessment is documented for inpatients';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a6()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of Nursing care is documented for inpatients';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a7()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Average Time for initial assessment of Emergency patients';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a7', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a8()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Average Time for initial assessment of in-patients (Nurses)-(Nursing-ICU) ';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a9()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Average Time for initial assessment of in-patients (Nurses)-(Nursing-Ward)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a10()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of Blood culture contamination rate(Lab Service)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a10', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a11()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = ' Percentage of Beta-blocker prescriptions with a diagnosis of CHF with reduced EF (Cardiology - Emergency Department)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a11', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a12()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = ' Percentage of Hospitalized patients with hypoglycemia who achieved targeted blood glucose level (Endocrinology and Diabetes - Emergency Department)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a12', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a13()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of Spontaneous perineal Tear Rate';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a13', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a14()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of sepsis patients who receive care as per the HOUR-1 sepsis bundle (Critical Care Medicine - Medical records)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a14', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a15()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of COPD patients receiving COPD Action plan at the time of discharge (Pulmonary Medicine)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a15', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a16()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of bronchiolitis patients treated inappropriately (Pediatrics) ';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a16', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a17()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = ' Percentage of oncology patients who had treatment initiated following multidisciplinary meeting(Tumour board)-(Oncology - Gastro surgery)  ';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a17', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a18()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of Intravenous Contrast Media Extravasation (Radiology)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a18', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a19()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Average Time taken for triage(Emergency Department)';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a19', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a20()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of patients undergoing dialysis who are able to achieve target hemoglobin levels(Nephrology) ';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a20', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3a21()
    {
        

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";

            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }

            $data['title'] = 'Percentage of Compliance rate of timeliness of physician responding to the reported critical results (JCI8-IPSG 2.0)-(Medical Administration)  ';
            $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a21', $data, true);
            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/feedbacks_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
                public function feedbacks_report_CQI3a22()
            {
                $fdate = date('Y-m-d');
                $tdate = date('Y-m-01');
                $_SESSION['from_date'] = $fdate;
                $_SESSION['to_date'] = $tdate;
                if ($this->session->userdata('isLogIn') == false)
                    redirect('login');
                if (ismodule_active('QUALITY') === true) {
                    $dateInfo = get_from_to_date();
                    $pagetitle = $dateInfo['pagetitle'];
                    $titleSuffix = "";
            
                    if ($pagetitle === "Current Month") {
                        $titleSuffix = strtoupper(date('F Y'));
                    } elseif ($pagetitle === "Previous Month") {
                        $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                    } elseif ($pagetitle === "Last 365 Days") {
                        $titleSuffix = "LAST 365 DAYS";
                    } elseif ($pagetitle === "Last 30 Days") {
                        $titleSuffix = "LAST 30 DAYS";
                    } elseif ($pagetitle === "Custom") {
                        $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                    } elseif ($pagetitle === "Last 24 Hours") {
                        $titleSuffix = "LAST 24 HOURS";
                    } elseif ($pagetitle === "Quaterly") {
                        $titleSuffix = "LAST 90 DAYS";
                    } else {
                        $titleSuffix = $pagetitle;
                    }
            
                    $data['title'] = 'Percentage of compliance to Holding area care (ACC2-JCI8)-(Nursing)';
                    $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3a22', $data, true);
                    $this->load->view('layout/main_wrapper', $data);
                } else {
                    redirect('dashboard/noaccess');
                }
            }
            
            public function feedbacks_report_CQI3b1()
            {
                $fdate = date('Y-m-d');
                $tdate = date('Y-m-01');
                $_SESSION['from_date'] = $fdate;
                $_SESSION['to_date'] = $tdate;
                if ($this->session->userdata('isLogIn') == false)
                    redirect('login');
                if (ismodule_active('QUALITY') === true) {
                    $dateInfo = get_from_to_date();
                    $pagetitle = $dateInfo['pagetitle'];
                    $titleSuffix = "";
            
                    if ($pagetitle === "Current Month") {
                        $titleSuffix = strtoupper(date('F Y'));
                    } elseif ($pagetitle === "Previous Month") {
                        $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                    } elseif ($pagetitle === "Last 365 Days") {
                        $titleSuffix = "LAST 365 DAYS";
                    } elseif ($pagetitle === "Last 30 Days") {
                        $titleSuffix = "LAST 30 DAYS";
                    } elseif ($pagetitle === "Custom") {
                        $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                    } elseif ($pagetitle === "Last 24 Hours") {
                        $titleSuffix = "LAST 24 HOURS";
                    } elseif ($pagetitle === "Quaterly") {
                        $titleSuffix = "LAST 90 DAYS";
                    } else {
                        $titleSuffix = $pagetitle;
                    }
            
                    $data['title'] = 'Number of reporting errors per 1000 investigations (Lab)-(Lab Services)';
                    $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3b1', $data, true);
                    $this->load->view('layout/main_wrapper', $data);
                } else {
                    redirect('dashboard/noaccess');
                }
            }
            
            public function feedbacks_report_CQI3b2()
            {
                $fdate = date('Y-m-d');
                $tdate = date('Y-m-01');
                $_SESSION['from_date'] = $fdate;
                $_SESSION['to_date'] = $tdate;
                if ($this->session->userdata('isLogIn') == false)
                    redirect('login');
                if (ismodule_active('QUALITY') === true) {
                    $dateInfo = get_from_to_date();
                    $pagetitle = $dateInfo['pagetitle'];
                    $titleSuffix = "";
            
                    if ($pagetitle === "Current Month") {
                        $titleSuffix = strtoupper(date('F Y'));
                    } elseif ($pagetitle === "Previous Month") {
                        $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                    } elseif ($pagetitle === "Last 365 Days") {
                        $titleSuffix = "LAST 365 DAYS";
                    } elseif ($pagetitle === "Last 30 Days") {
                        $titleSuffix = "LAST 30 DAYS";
                    } elseif ($pagetitle === "Custom") {
                        $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                    } elseif ($pagetitle === "Last 24 Hours") {
                        $titleSuffix = "LAST 24 HOURS";
                    } elseif ($pagetitle === "Quaterly") {
                        $titleSuffix = "LAST 90 DAYS";
                    } else {
                        $titleSuffix = $pagetitle;
                    }
            
                    $data['title'] = 'Rate of redo in 1000 tests (Lab)-(Lab Services)';
                    $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3b2', $data, true);
                    $this->load->view('layout/main_wrapper', $data);
                } else {
                    redirect('dashboard/noaccess');
                }
            }
            
            public function feedbacks_report_CQI3b3()
            {
                $fdate = date('Y-m-d');
                $tdate = date('Y-m-01');
                $_SESSION['from_date'] = $fdate;
                $_SESSION['to_date'] = $tdate;
                if ($this->session->userdata('isLogIn') == false)
                    redirect('login');
                if (ismodule_active('QUALITY') === true) {
                    $dateInfo = get_from_to_date();
                    $pagetitle = $dateInfo['pagetitle'];
                    $titleSuffix = "";
            
                    if ($pagetitle === "Current Month") {
                        $titleSuffix = strtoupper(date('F Y'));
                    } elseif ($pagetitle === "Previous Month") {
                        $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                    } elseif ($pagetitle === "Last 365 Days") {
                        $titleSuffix = "LAST 365 DAYS";
                    } elseif ($pagetitle === "Last 30 Days") {
                        $titleSuffix = "LAST 30 DAYS";
                    } elseif ($pagetitle === "Custom") {
                        $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                    } elseif ($pagetitle === "Last 24 Hours") {
                        $titleSuffix = "LAST 24 HOURS";
                    } elseif ($pagetitle === "Quaterly") {
                        $titleSuffix = "LAST 90 DAYS";
                    } else {
                        $titleSuffix = $pagetitle;
                    }
            
                    $data['title'] = 'Percentage of reports correlating to clinical diagnosis (Lab)-(Lab Services)';
                    $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3b3', $data, true);
                    $this->load->view('layout/main_wrapper', $data);
                } else {
                    redirect('dashboard/noaccess');
                }
            }
            public function feedbacks_report_CQI3b4()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Critical value reporting TAT (Lab)-(Lab Services)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3b4', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3b5()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Sample Rejection Rate per 1000 samples (Lab)-(Lab Services)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3b5', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c1()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Incidence of medication errors - Transcription Errors (IP)-(Clinical Pharmacy)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c1', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c2()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Incidence of medication errors - Dispensing Errors (IP)-(Clinical Pharmacy)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c2', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c3()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Incidence of medication errors - Administration Errors (IP)-(Clinical Pharmacy)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c3', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        public function feedbacks_report_CQI3c4()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Incidence of medication errors - Prescription errors (IP)-(Clinical Pharmacy)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c4', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c5()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Incidence of Adverse Drug Events per 1000 patient days (IP)-(Clinical Pharmacy)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c5', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c6()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Blood and Blood components wastage rate (%) per month (Blood Bank)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c6', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c7()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of Adverse transfusion reaction rate (Blood Bank)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c7', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c8()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of patients who received blood and blood components after cross match within 30 minutes (Blood Bank)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c8', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c9()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Incidence of Transfusion related infections (Blood Bank)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c9', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c10()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Incidence of near miss events reported (Blood Bank)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c10', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c11()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Cross match TAT (Blood Bank)';
                $data['content']  = $this->load->view('qualitymodules/feedbacks_report_CQI3c11', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        public function feedbacks_report_CQI3c12()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Emperical Antibiotics therapy compliance rate for high risk infections(JCI8-MMU1.1)-(Clinical Pharmacy)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3c12', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c13()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Restricted antibiotics usage compliance rate(JCI8-MMU1.1)-(Clinical Pharmacy)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3c13', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3c14()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Monitor data related to appropriateness of indication for the new drugs(JCI8-MMU2.0)-(Clinical Pharmacy)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3c14', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        public function feedbacks_report_CQI3d1()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of modification of anaesthesia plan (OT - Anasthesia)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3d1', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3d2()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of unplanned ventilation following anaesthesia (OT - Anasthesia)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3d2', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3d3()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of adverse anaesthesia events following anaesthesia (OT - Anasthesia)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3d3', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3d4()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Anaesthesia related mortality rate (OT - Anasthesia)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3d4', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3d5()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of safe and rational prescriptions (Clinical Pharmacy - IP - Pharmacy)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3d5', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        public function feedbacks_report_CQI3e1()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of unplanned return to OT';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3e1', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3e2()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of rescheduling of surgeries (OT)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3e2', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3e3()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of cases where organisations procedure to prevent surgery errors (wrong site, wrong procedure, wrong patient) have been adhered (OT)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3e3', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3e4()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of cases receiving appropriate prophylactic antibiotics with specified time frame (Clinical Pharmacy)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3e4', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3e5()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of cases where the planned surgery were changed intraoperatively (OT)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3e5', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3e6()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Re-exploration rate (OT)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3e6', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3e7()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Primary Cesarean Rate (Nursing - OBG)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3e7', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3e8()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Adverse events related to implant devices (JCI8 - ASC 4.4) - (OT)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3e8', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3e9()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false)
                redirect('login');
            if (ismodule_active('QUALITY') === true) {
        
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'All major patient safety events or errors related to surgical procedures (JCI8 - QPS 3.04)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3e9', $data, true);
                $this->load->view('layout/main_wrapper', $data);
        
            } else {
                redirect('dashboard/noaccess');
            }
        }
        public function feedbacks_report_CQI3f1()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false) redirect('login');
            if (ismodule_active('QUALITY') === true) {
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of transfusion reactions (PSQ3a) - (Blood Center)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f1', $data, true);
                $this->load->view('layout/main_wrapper', $data);
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3f2()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false) redirect('login');
            if (ismodule_active('QUALITY') === true) {
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of waste of blood and blood components among those issued (Blood Center)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f2', $data, true);
                $this->load->view('layout/main_wrapper', $data);
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3f3()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false) redirect('login');
            if (ismodule_active('QUALITY') === true) {
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of waste of blood and blood components among those stored (Blood Center)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f3', $data, true);
                $this->load->view('layout/main_wrapper', $data);
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3f4()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false) redirect('login');
            if (ismodule_active('QUALITY') === true) {
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Percentage of number of blood component units used (Blood Center)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f4', $data, true);
                $this->load->view('layout/main_wrapper', $data);
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3f5()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false) redirect('login');
            if (ismodule_active('QUALITY') === true) {
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Turn-around time for blood and blood components cross matched / reserved (Blood Center)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f5', $data, true);
                $this->load->view('layout/main_wrapper', $data);
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3f6()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false) redirect('login');
            if (ismodule_active('QUALITY') === true) {
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Adverse events and near miss events involving blood bank and/or transfusion services (Transfusion to the wrong patient, Mislabeled blood product, Contaminated blood product) (JCI8-AOP 4.00) - (Blood Center)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f6', $data, true);
                $this->load->view('layout/main_wrapper', $data);
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3f7()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false) redirect('login');
            if (ismodule_active('QUALITY') === true) {
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Blood availability rate (JCI8-AOP 4.00) - (Blood Center)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f7', $data, true);
                $this->load->view('layout/main_wrapper', $data);
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3f8()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false) redirect('login');
            if (ismodule_active('QUALITY') === true) {
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'CT Ratio (cross match to transfusion) (JCI8-AOP 4.00) - (Blood Center)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f8', $data, true);
                $this->load->view('layout/main_wrapper', $data);
            } else {
                redirect('dashboard/noaccess');
            }
        }
        
        public function feedbacks_report_CQI3f9()
        {
            $fdate = date('Y-m-d');
            $tdate = date('Y-m-01');
            $_SESSION['from_date'] = $fdate;
            $_SESSION['to_date'] = $tdate;
        
            if ($this->session->userdata('isLogIn') == false) redirect('login');
            if (ismodule_active('QUALITY') === true) {
                $dateInfo = get_from_to_date();
                $pagetitle = $dateInfo['pagetitle'];
                $titleSuffix = "";
        
                if ($pagetitle === "Current Month") {
                    $titleSuffix = strtoupper(date('F Y'));
                } elseif ($pagetitle === "Previous Month") {
                    $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
                } elseif ($pagetitle === "Last 365 Days") {
                    $titleSuffix = "LAST 365 DAYS";
                } elseif ($pagetitle === "Last 30 Days") {
                    $titleSuffix = "LAST 30 DAYS";
                } elseif ($pagetitle === "Custom") {
                    $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
                } elseif ($pagetitle === "Last 24 Hours") {
                    $titleSuffix = "LAST 24 HOURS";
                } elseif ($pagetitle === "Quaterly") {
                    $titleSuffix = "LAST 90 DAYS";
                } else {
                    $titleSuffix = $pagetitle;
                }
        
                $data['title'] = 'Turnaround time for Platelet Apheresis (Blood Center)';
                $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f9', $data, true);
                $this->load->view('layout/main_wrapper', $data);
            } else {
                redirect('dashboard/noaccess');
            }
        }
        public function feedbacks_report_CQI3f10() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Turnaround time for blood donation (Blood Center)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3f10', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3g1() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Catheter associated urinary tract infection rate (PSQ 3b) - (Infection Control - Nursing)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3g1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3g2() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Ventilator associated pneumonias (VAP) in 1000 ventilator days (Infection Control - Nursing)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3g2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
        public function feedbacks_report_CQI3g3() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Central Line Associated Blood Stream Infection (CLABSI) - (Infection Control - Nursing)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3g3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function feedbacks_report_CQI3g4() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Surgical site infection rate (Infection Control - Nursing)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3g4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3g5() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Late Onset Sepsis Rate After 72 Hours (Nursing - NICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3g5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3g6() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Environmental cleaning & disinfection compliance rate (JCI8-PCI 4.0) - (House Keeping)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3g6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
        public function feedbacks_report_CQI3h1() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Mortality rate (MRD)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3h1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3h2() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Return to ICU within 48 hours (Nursing - ICU1)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3h2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3h3() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Return to ICU 2 within 48 hours (Nursing - ICU2)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3h3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3h4() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Return to ICU 3 within 48 hours (Nursing - CICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3h4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3h5() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Return to the emergency department after 72 hours with similar presenting complaints (Emergency - Department)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3h5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3h6() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Reintubation rate (Nursing - ICU1)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3h6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3h7() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Reintubation rate (Nursing - ICU2)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3h7', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3h8() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Reintubation rate (Nursing - CICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3h8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3h9() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Re Admission Rate (Nursing - NICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3h9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
        public function feedbacks_report_CQI3j1() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Shift change handover communication (Nurses) (ED, ICU, Ward) - (Nursing - Emergency Department)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function feedbacks_report_CQI3j2() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Shift change handover communication (Nurses) (ED, ICU, Ward) - (Nursing - ICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j3() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Shift change handover communication (Nurses) (ED, ICU, Ward) - (Nursing - Ward)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
        public function feedbacks_report_CQI3j4() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Incidence of patient identification error (Quality Office)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j5() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Number of missed hand hygiene opportunities (Infection Control - Nursing)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j6() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Compliance rate to medication prescription in capitals (Clinical Pharmacy)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3j7() {
    $fdate = date('Y-m-d');
    $tdate = date('Y-m-01');
    $_SESSION['from_date'] = $fdate;
    $_SESSION['to_date'] = $tdate;

    if ($this->session->userdata('isLogIn') == false) redirect('login');
    if (ismodule_active('QUALITY') === true) {
        $dateInfo = get_from_to_date();
        $pagetitle = $dateInfo['pagetitle'];
        $titleSuffix = "";

        if ($pagetitle === "Current Month") {
            $titleSuffix = strtoupper(date('F Y'));
        } elseif ($pagetitle === "Previous Month") {
            $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
        } elseif ($pagetitle === "Last 365 Days") {
            $titleSuffix = "LAST 365 DAYS";
        } elseif ($pagetitle === "Last 30 Days") {
            $titleSuffix = "LAST 30 DAYS";
        } elseif ($pagetitle === "Custom") {
            $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
        } elseif ($pagetitle === "Last 24 Hours") {
            $titleSuffix = "LAST 24 HOURS";
        } elseif ($pagetitle === "Quaterly") {
            $titleSuffix = "LAST 90 DAYS";
        } else {
            $titleSuffix = $pagetitle;
        }

        $data['title'] = 'Shift change handover communication (Doctors) (MRD - Emergency Department)';
        $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j7', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    } else {
        redirect('dashboard/noaccess');
    }
}

    public function feedbacks_report_CQI3j8() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Shift change handover communication (Doctors) - (MRD - ICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j9() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Compliance to patient identification - IPD (Nursing)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j10() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Compliance rate of timeliness of reporting Critical results in Radiology (within 30 min) - (Radiology)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j10', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3j11() {
    $fdate = date('Y-m-d');
    $tdate = date('Y-m-01');
    $_SESSION['from_date'] = $fdate;
    $_SESSION['to_date'] = $tdate;

    if ($this->session->userdata('isLogIn') == false) redirect('login');
    if (ismodule_active('QUALITY') === true) {
        $dateInfo = get_from_to_date();
        $pagetitle = $dateInfo['pagetitle'];
        $titleSuffix = "";

        if ($pagetitle === "Current Month") {
            $titleSuffix = strtoupper(date('F Y'));
        } elseif ($pagetitle === "Previous Month") {
            $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
        } elseif ($pagetitle === "Last 365 Days") {
            $titleSuffix = "LAST 365 DAYS";
        } elseif ($pagetitle === "Last 30 Days") {
            $titleSuffix = "LAST 30 DAYS";
        } elseif ($pagetitle === "Custom") {
            $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
        } elseif ($pagetitle === "Last 24 Hours") {
            $titleSuffix = "LAST 24 HOURS";
        } elseif ($pagetitle === "Quaterly") {
            $titleSuffix = "LAST 90 DAYS";
        } else {
            $titleSuffix = $pagetitle;
        }

        $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental shift (MRD - Emergency Department)';
        $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j11', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    } else {
        redirect('dashboard/noaccess');
    }
}

    public function feedbacks_report_CQI3j12() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental shift (MRD - ICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j12', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j13() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses) - (Nursing - Emergency Department)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j13', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j14() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses) - (Nursing - ICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j14', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j15() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses) - (Nursing - Ward)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j15', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j16() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental Shift (Doctors) - (MRD - Ward)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j16', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j17() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental Shift (Doctors) - (MRD - ICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j17', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j18() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental Shift (Doctors) - (MRD - Ward)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j18', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j19() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses) - (Nursing - Emergency Department)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j19', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j20() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 2.2 - Hand off communication interdepartmental Shift (Nurses) - (Nursing - ICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j20', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3j21() {
    $fdate = date('Y-m-d');
    $tdate = date('Y-m-01');
    $_SESSION['from_date'] = $fdate;
    $_SESSION['to_date'] = $tdate;

    if ($this->session->userdata('isLogIn') == false) redirect('login');
    if (ismodule_active('QUALITY') === true) {
        $dateInfo = get_from_to_date();
        $pagetitle = $dateInfo['pagetitle'];
        $titleSuffix = "";

        if ($pagetitle === "Current Month") {
            $titleSuffix = strtoupper(date('F Y'));
        } elseif ($pagetitle === "Previous Month") {
            $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
        } elseif ($pagetitle === "Last 365 Days") {
            $titleSuffix = "LAST 365 DAYS";
        } elseif ($pagetitle === "Last 30 Days") {
            $titleSuffix = "LAST 30 DAYS";
        } elseif ($pagetitle === "Custom") {
            $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
        } elseif ($pagetitle === "Last 24 Hours") {
            $titleSuffix = "LAST 24 HOURS";
        } elseif ($pagetitle === "Quaterly") {
            $titleSuffix = "LAST 90 DAYS";
        } else {
            $titleSuffix = $pagetitle;
        }

        $data['title'] = 'IPSG 4 - Ensure correct site, correct procedure, correct patient surgery-(Quality Office - Endoscopy)';
        $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j21', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    } else {
        redirect('dashboard/noaccess');
    }
}

    public function feedbacks_report_CQI3j22() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 4 - Ensure correct site, correct procedure, correct patient surgery-(Quality Office - ICU)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j22', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j23() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 4 - Ensure correct site, correct procedure, correct patient surgery-(Quality Office - OT)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j23', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j24() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'PSG 6 - Compliance to Fall prevention measures in IPD-(Nursing - IPD)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j24', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j25() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'PSG 6 - Compliance to Fall prevention measures in OPD-(Nursing - OPD)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j25', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j26() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 6 - Compliance to Fall prevention measures in Physiotherapy OP patients-(Physical therapy and Rehabilitation Department - Physiotherapy)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j26', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j27() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Compliance to hand hygiene practice (New)-(Infection Control - Nursing)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j27', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j28() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Compliance to patient identification OPD-(Nursing-OPD)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j28', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function feedbacks_report_CQI3j29() {
    $fdate = date('Y-m-d');
    $tdate = date('Y-m-01');
    $_SESSION['from_date'] = $fdate;
    $_SESSION['to_date'] = $tdate;

    if ($this->session->userdata('isLogIn') == false) redirect('login');
    if (ismodule_active('QUALITY') === true) {
        $dateInfo = get_from_to_date();
        $pagetitle = $dateInfo['pagetitle'];
        $titleSuffix = "";

        if ($pagetitle === "Current Month") {
            $titleSuffix = strtoupper(date('F Y'));
        } elseif ($pagetitle === "Previous Month") {
            $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
        } elseif ($pagetitle === "Last 365 Days") {
            $titleSuffix = "LAST 365 DAYS";
        } elseif ($pagetitle === "Last 30 Days") {
            $titleSuffix = "LAST 30 DAYS";
        } elseif ($pagetitle === "Custom") {
            $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
        } elseif ($pagetitle === "Last 24 Hours") {
            $titleSuffix = "LAST 24 HOURS";
        } elseif ($pagetitle === "Quaterly") {
            $titleSuffix = "LAST 90 DAYS";
        } else {
            $titleSuffix = $pagetitle;
        }

        $data['title'] = 'Shift change handover communication(Doctors - ward)-(Medical Administration)';
        $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j29', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    } else {
        redirect('dashboard/noaccess');
    }
}

    public function feedbacks_report_CQI3j30() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Incidence of Adverse events in Physiotherapy (IPD)-(Physical therapy and Rehabilitation Department - Physiotherapy)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j30', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j31() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Incidence of Adverse events in Physiotherapy(OPD)-(Physical therapy and Rehabilitation Department - Physiotherapy)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j31', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j32() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'IPSG 4 - Ensure correct site, correct procedure, correct patient surgery-(Quality Office - OT)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j32', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j33() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Security incidents rate(JCI8-FMS 4.0)-(Safety & Security)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j33', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function feedbacks_report_CQI3j34() {
        $fdate = date('Y-m-d');
        $tdate = date('Y-m-01');
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;
    
        if ($this->session->userdata('isLogIn') == false) redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $dateInfo = get_from_to_date();
            $pagetitle = $dateInfo['pagetitle'];
            $titleSuffix = "";
    
            if ($pagetitle === "Current Month") {
                $titleSuffix = strtoupper(date('F Y'));
            } elseif ($pagetitle === "Previous Month") {
                $titleSuffix = strtoupper(date('F Y', strtotime('-1 month')));
            } elseif ($pagetitle === "Last 365 Days") {
                $titleSuffix = "LAST 365 DAYS";
            } elseif ($pagetitle === "Last 30 Days") {
                $titleSuffix = "LAST 30 DAYS";
            } elseif ($pagetitle === "Custom") {
                $titleSuffix = date('F Y', strtotime($dateInfo['tdate'])) . " - " . date('F Y', strtotime($dateInfo['fdate']));
            } elseif ($pagetitle === "Last 24 Hours") {
                $titleSuffix = "LAST 24 HOURS";
            } elseif ($pagetitle === "Quaterly") {
                $titleSuffix = "LAST 90 DAYS";
            } else {
                $titleSuffix = $pagetitle;
            }
    
            $data['title'] = 'Safety incidents rate(JCI8-FMS 3.0)';
            $data['content'] = $this->load->view('qualitymodules/feedbacks_report_CQI3j34', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }


















        

        



    



    //individual page for all KPI
    public function patient_feedback_CQI3a1()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {

            $data['title'] = 'QUALITY KPI ANALYSIS';
            #------------------------------#

            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a1', $data, true);


            $this->load->view('layout/main_wrapper', $data);
            // redirect('report/ip_patient_feedback');

        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function patient_feedback_CQI3a2()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }

    public function patient_feedback_CQI3a3()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a4()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a5()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a6()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a7()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a7', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a8()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a9()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a10()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a10', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function patient_feedback_CQI3a11()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a11', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a12()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a12', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a13()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a13', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a14()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a14', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a15()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a15', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a16()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a16', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a17()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a17', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a18()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a18', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a19()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a19', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a20()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a20', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a21()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a21', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3a22()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3a22', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function patient_feedback_CQI3b1()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b2()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b3()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b4()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b5()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b6()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b7()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b7', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b8()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b9()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b10()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b10', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b11()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b11', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b12()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b12', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3b13()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3b13', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c1()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c2()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c3()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c4()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c5()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c6()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c7()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c7', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c8()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c9()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c10()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c10', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c11()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c11', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function patient_feedback_CQI3c12()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c12', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c13()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c13', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3c14()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3c14', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3d1()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3d1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3d2()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3d2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3d3()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3d3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3d4()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3d4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3d5()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3d5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3e1()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3e1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3e2()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3e2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3e3()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3e3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3e4()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3e4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3e5()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3e5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3e6()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3e6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3e7()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3e7', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3e8()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3e8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3e9()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
    
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3e9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
    
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function patient_feedback_CQI3f1()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3f2()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3f3()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3f4()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3f5()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3f6()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3f7()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f7', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3f8()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3f9()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3f10()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3f10', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3g1()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3g1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3g2()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3g2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3g3()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3g3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3g4()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3g4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3g5()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3g5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3g6()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3g6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3h1()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3h1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3h2()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3h2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3h3()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3h3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3h4()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3h4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3h5()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3h5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3h6()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3h6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3h7()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3h7', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3h8()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3h8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3h9()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3h9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function patient_feedback_CQI3j1()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j1', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j2()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j2', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j3()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j3', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j4()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j4', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j5()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j5', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j6()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j6', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j7()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j7', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j8()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j8', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j9()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j9', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j10()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j10', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j11()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j11', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    public function patient_feedback_CQI3j12()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j12', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j13()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j13', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j14()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j14', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j15()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j15', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j16()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j16', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j17()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j17', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j18()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j18', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j19()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j19', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j20()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j20', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j21()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j21', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j22()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j22', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j23()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j23', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j24()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j24', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j25()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j25', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j26()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j26', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j27()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j27', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j28()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j28', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j29()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j29', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j30()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j30', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j31()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j31', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j32()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j32', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j33()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j33', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }
    
    public function patient_feedback_CQI3j34()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {
            $data['title'] = 'QUALITY KPI ANALYSIS';
            $data['content'] = $this->load->view('qualitymodules/patient_feedback_CQI3j34', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {
            redirect('dashboard/noaccess');
        }
    }











    //Edit page for all KPI

    public function edit_feedback_CQI3a1()
    {

        if (!isset($this->session->userdata['isLogIn']) || ($this->session->userdata('isLogIn') === false)) {
            $this->session->set_userdata('referred_from', current_url());
        } else {
            $this->session->set_userdata('referred_from', NULL);
        }


        $LOAD = pagetoload($this->module);
        if ($LOAD == 'inpatient_modules') {
            $data['title'] = 'EDIT KPI FORM';

            if (isfeature_active('QUALITY-DASHBOARD') === true) {
                $data['content'] = $this->load->view('qualitymodules/edit_feedback_CQI3a1', $data, true);
            } else {
                $data['content'] = $this->load->view('qualitymodules/dephead/edit_feedback_CQI3a1', $data, true);
            }
            //    $data['content'] = $this->load->view('qualitymodules/ticket_track', $data, true);

            $this->load->view('layout/main_wrapper', $data);
        }
    }


    public function edit_feedback_CQI3a1_byid($id)
    {


        // Check if form is submitted
        if ($this->input->post()) {
            // Capture the hour, minute, and second values from the form input
            $hr = intval($this->input->post('initial_assessment_hr')) ?: 0;
            $min = intval($this->input->post('initial_assessment_min')) ?: 0;
            $sec = intval($this->input->post('initial_assessment_sec')) ?: 0;

            // Format hr, min, and sec into the desired string format "HH:MM:SS"
            $timeString = sprintf('%02d:%02d:%02d', $hr, $min, $sec);

            // Capture other form data
            $dataCollected = $this->input->post('dataCollected');
            $formattedDatetime = date('Y-m-d H:i:s', strtotime($dataCollected));
            $formattedDatet = date('Y-m-d', strtotime($dataCollected));
            $data = array(


                'time_taken_initial_assessment' => $timeString,
                'number_of_admission' => $this->input->post('total_admission'),
                'average_time_taken_initial_assessment' => $this->input->post('calculatedResult'),
                'bench_mark_time' => $this->input->post('benchmark'),
                'data_analysis' => $this->input->post('dataAnalysis'),
                'corrective_action' => $this->input->post('correctiveAction'),
                'preventive_action' => $this->input->post('preventiveAction'),
                'datetime' => $formattedDatetime, // Correctly formatted datetime
                'datet' => $formattedDatet,       // Correctly formatted date
                'dataset'             => json_encode($_POST)
            );



            // Update the data in the database
            $this->quality_model->update_feedback_CQI3a1($id, $data);

            // Redirect to a success page or wherever you need to go after the update
            redirect('quality/patient_feedback_CQI3a1?id=' . $id);
        } else {
            // Load the view with the form
            $data['param'] = $this->quality_model->get_feedback_1PSQ3a_byid($id);
            $this->load->view('qualitymodules/dephead/patient_feedback_CQI3a1', $data);
        }
    }


    //START REPORTS




    public function overall_CQI3a1_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_CQI3a1';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of time taken for initial assessment';
            $header[4] = 'Total number of in-patients';
            $header[5] = 'Avg. time taken for initial assessment';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis (RCA, Reason for Variation etc.)';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_total'] = $data['initial_assessment_total'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- Average Time for initial assessment of in-patients (Doctors) in MRD(ICU) - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_CQI3a2_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_CQI3a2';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of time taken for assessment of in-patients';
            $header[4] = 'Total number of in-patients';
            $header[5] = 'Avg. time taken for initial assessment';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis (RCA, Reason for Variation etc.)';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_total'] = $data['initial_assessment_total'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- Average Time for initial assessment of in-patients (Doctors) in MRD(Ward) - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_CQI3a3_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_CQI3a3';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of time taken for initial assessment of emergency patients';
            $header[4] = 'Total number of emergency patients';
            $header[5] = 'Avg.Time for initial assessment of in-patients- (Emergency Department)';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis (RCA, Reason for Variation etc.)';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_total'] = $data['initial_assessment_total'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- Average Time for initial assessment of in-patients (Doctors)-(Emergency Department) - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_2psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_2PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of reporting errors';
            $header[4] = 'Number of tests performed';
            $header[5] = 'No. of reporting errors per 1000 investigations';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 2.PSQ3a- Number of reporting errors per 1000 investigations - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_3psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_3PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of staff adhering to safety precautions';
            $header[4] = 'Number of staff audited';
            $header[5] = 'Percentage of adherence to safety precautions';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 3.PSQ3a- Percentage of adherence to safety precautions by diagnostics staffs - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_4psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_4PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of medication errors';
            $header[4] = 'Number of opportunities of medication errors';
            $header[5] = 'Percentage of medication error';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 4.PSQ3a- Medication errors rate - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_5psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_5PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of medication charts with error prone abbreviation';
            $header[4] = 'Number of medication charts reviewed';
            $header[5] = 'Percentage of medication chart with error-prone abbreviations';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 5.PSQ3a- Percentage of medication charts with error-prone abbreviations - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_6psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_6PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of patients developing adverse drug reactions';
            $header[4] = 'Number of in-patients';
            $header[5] = 'Percentage of in-patients developing adverse drug reaction';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 6.PSQ3a- Percentage of in-patients developing adverse drug reaction(s) - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_7psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_7PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of unplanned return to OT';
            $header[4] = 'Number of patients who underwent surgeries in the OT';
            $header[5] = 'Percentage of unplanned return to OT';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 7.PSQ3a- Percentage of unplanned return to OT - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_8psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_8PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of surgeries where the procedure was followed';
            $header[4] = 'Number of surgeries performed';
            $header[5] = 'Percentage of Surgeries following adverse event prevention procedures';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 8.PSQ3a- Percentage of surgeries where the organisations procedure to prevent adverse events - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_9psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_9PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of transfusion reactions';
            $header[4] = 'Number of units transfused (in Units)';
            $header[5] = 'Percentage of transfusion reactions';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 9.PSQ3a- Percentage of transfusion reactions - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_10psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_10PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Actual deaths in ICU';
            $header[4] = 'Predicted deaths in ICU';
            $header[5] = 'Percentage of standardised mortality ratio for ICU';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 10.PSQ3a- Standardised mortality ratio for ICU - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_11psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_11PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of returns to emergency within 72 hrs with similar complaints';
            $header[4] = 'Number of patients who have come to the emergency';
            $header[5] = 'Percentage of returns to emergency within 72 hrs with similar complaints';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 11.PSQ3a- Return to the emergency within 72 hours with similar complaints - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_12psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_12PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of patients who develop new / worsening of pressure ulcer';
            $header[4] = 'Total no. of patient days';
            $header[5] = 'Incidence of hospital associated pressure ulcers after admission';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 12.PSQ3a- Incidence of hospital associated pressure ulcers after admission - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_13psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_13PSQ3b';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of urinary catheter associated UTIs';
            $header[4] = 'Number of urinary catheter days';
            $header[5] = 'Catheter associated Urinary tract infection rate';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 13.PSQ3b- Catheter associated urinary tract infection rate - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_14psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_14PSQ3b';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of ventilator associated pneumonia';
            $header[4] = 'Number of ventilator days';
            $header[5] = 'Ventilator associated pneumonia rate';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 14.PSQ3b- Ventilator associated pneumonia rate - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_15psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_15PSQ3b';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of central line - associated blood stream infections';
            $header[4] = 'No. of central line days';
            $header[5] = 'Central line - associated blood stream infection rate';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 15.PSQ3b- Central line - associated blood stream infection rate - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_16psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_16PSQ3b';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of surgical site infections';
            $header[4] = 'Number of surgeries performed';
            $header[5] = 'Surgical site infection rate';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 16.PSQ3b- Surgical site infection rate - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_17psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_17PSQ3b';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of hand hygiene actions performed';
            $header[4] = 'Number of hand hygiene opportunities';
            $header[5] = 'Hand hygiene compliance rate';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 17.PSQ3b- Hand hygiene compliance rate - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_18psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_18PSQ3b';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of patients who receive appropriate prophylactic antibiotic';
            $header[4] = 'Number of patients who underwent surgeries in the OT';
            $header[5] = 'Percentage of cases who received appropriate prophylactic antibiotics';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 18.PSQ3b- Percentage of cases who received appropriate prophylactic antibiotics - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_19psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_19PSQ3c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of cases rescheduled';
            $header[4] = 'Number of surgeries planned';
            $header[5] = 'Percentage of re-scheduling of surgeries';

            $j = 6;


            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                echo '<pre>';
                print_r($data);
                echo '</pre>';
                exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 19.PSQ3c- Percentage of re- scheduling of surgeries - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_20psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_20PSQ3c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of cases rescheduled';
            $header[4] = 'Number of surgeries planned';
            $header[5] = 'Percentage of re-scheduling of surgeries';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 20.PSQ3c- Turn around time for issue of blood and blood components - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_21psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_21PSQ3c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of nursing staff';
            $header[4] = 'Number of occupied beds';
            $header[5] = 'Nurse-patient ratio for ICU';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 21.PSQ3c- Nurse-patient ratio for ICUs - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_21apsq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_21aPSQ3c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of nursing staff';
            $header[4] = 'Number of occupied beds';
            $header[5] = 'Nurse-patient ratio for Ward';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 21a.PSQ3c- Nurse-patient ratio for Wards - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_22psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_22PSQ3c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of total time for consultation';
            $header[4] = 'Total number of out-patients';
            $header[5] = 'Avg. waiting time for out-patient consultation';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 22.PSQ3c - Waiting time for out- patient consultation - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_23apsq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_23aPSQ4c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of total patient reporting time';
            $header[4] = 'Number of patients reported in laboratory';
            $header[5] = 'Avg. waiting time for laboratory';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 23a.PSQ4c- Waiting time for laboratory diagnostics - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_23bpsq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_23bPSQ4c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of total patient reporting time';
            $header[4] = 'Number of patients reported in X-Ray';
            $header[5] = 'Avg. waiting time for X-Ray';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 23b.PSQ4c- Waiting time for X-ray diagnostics - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_23cpsq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_23cPSQ4c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of total patient reporting time';
            $header[4] = 'Number of patients reported in USG';
            $header[5] = 'Avg. waiting time for USG';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 23c.PSQ4c- Waiting time for USG diagnostics - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_23dpsq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_23dPSQ4c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of total patient reporting time';
            $header[4] = 'Number of patients reported in CT scan';
            $header[5] = 'Avg. waiting time for CT scan';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 23d.PSQ4c- Waiting time for CT scan diagnostics - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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



    public function overall_24gpsq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_24PSQ4c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of time taken for discharge';
            $header[4] = 'Number of patients discharged';
            $header[5] = 'Avg. time taken for discharge';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 24.PSQ4c- Time taken for discharge(General Patients) - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_24ipsq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_24PSQ4c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of time taken for discharge';
            $header[4] = 'Number of patients discharged';
            $header[5] = 'Avg. time taken for discharge';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 24.PSQ4c- Time taken for discharge(Insurance Patients) - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_24cpsq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_24PSQ4c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of time taken for discharge';
            $header[4] = 'Number of patients discharged';
            $header[5] = 'Avg. time taken for discharge';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 24.PSQ4c- Time taken for discharge(Corporate Patients) - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_25psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_25PSQ4c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of medical records having incomplete/ improper consent';
            $header[4] = 'Number of discharges and deaths';
            $header[5] = 'Percentage of medical records having incomplete/ improper consent';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 25.PSQ4c- Percentage of medical records having incomplete/ improper consent - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_26psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_26PSQ4c';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of stock outs of emergency drugs';
            $header[4] = 'Number of drugs listed as emergency drugs';
            $header[5] = 'Percentage of stock out rate for emergency medications';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 26.PSQ4c- Stock out rate of emergency medications - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_27psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_27PSQ4d';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of variations observed in a mock drill';
            $header[4] = 'Number of opportunities of variations';
            $header[5] = 'Percentage of number of variations observed in mock';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 27.PSQ4d- Number of variations observed in mock drills - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_28psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_28PSQ4d';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of patient falls';
            $header[4] = 'Total number of patient days';
            $header[5] = 'Patient fall rate';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 28.PSQ4d- Patient fall rate - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_29psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_29PSQ4d';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of near misses reported';
            $header[4] = 'Number of incidents reported';
            $header[5] = 'Percentage of near misses';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 29.PSQ4d- Percentage of near misses - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_30psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_30PSQ3d';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of parenteral exposures';
            $header[4] = 'Number of in-patient days';
            $header[5] = 'Incidence of needle stick injuries';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 30.PSQ3d- Incidence of needle stick injuries - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_31psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_31PSQ3d';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of handovers done appropriately';
            $header[4] = 'Number of handover opportunities';
            $header[5] = 'Percentage of appropriate handovers during shift change';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 31.PSQ3d- Appropriate handovers during shift change - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_32psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_32PSQ3d';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of prescriptions in capital letters';
            $header[4] = 'Number of prescriptions';
            $header[5] = 'Percentage of compliance rate to prescription in capitals';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- 32.PSQ3d- Compliance rate to medication prescription in capitals - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of readmission to ICU within 48 hours';
            $header[4] = 'Number of admissions';
            $header[5] = 'Percentage of readmission rate';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a - Readmission to ICU within 48 hours after being discharged - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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


    public function overall_33psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_33PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of patients discharged with diagnosis of CHF with reduced EF';
            $header[4] = 'Number of patients discharged with diagnosis of CHF';
            $header[5] = 'Percentage of Beta-blocker prescription with diagnosis of CHF with reduced EF';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a - Percentage of Beta-blocker prescription with a diagnosis of CHF with reduced EF - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_34psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_34PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of AMI patients during primary angioplasty for whom door to balloon time of 90 minutes is achieved';
            $header[4] = 'Number of AMI patients undergoing primary angioplasty';
            $header[5] = 'Percentage of patients with myocardial infarction for whom door to balloon time of 90 minutes';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of patients with myocardial infarction for whom door to balloon time of 90 minutes is achieved - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_35psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_35PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of patients with hypoglycemic events where the target glucose level was achieved';
            $header[4] = 'Number of patients with hypoglycemic events';
            $header[5] = 'Percentage of hospitalized patients with hypoglycemia who achieved blood glucose level';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of Hospitalized patients with hypoglycemia who achieved targeted blood glucose level - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_36psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_36PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of cases where a spontaneous perineal tear occurs';
            $header[4] = 'Number of vaginal deliveries';
            $header[5] = 'Percentage of cases where a spontaneous perineal tear occurs';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Spontaneous Perineal Tear Rate - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_37psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_37PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of cases of postoperative endophthalmitis';
            $header[4] = 'Number of ophthalmic surgeries';
            $header[5] = 'Percentage of cases where postoperative endophthalmitis occurs';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Postoperative Endophthalmitis Rate - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_38psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_38PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of patients sedated for the colonoscopy procedure';
            $header[4] = 'Number of patients undergoing colonoscopy';
            $header[5] = 'Percentage of patients undergoing colonoscopy who are sedated';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of patients undergoing colonoscopy who are sedated - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_39psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_39PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of cases where bile duct injuries occurred';
            $header[4] = 'Laparoscopic cholecystectomies performed';
            $header[5] = 'Bile Duct Injury Rate';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a - Bile Duct injury rate requiring operative intervention during Laparoscopic cholecystectomy - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_40psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_40PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Number of POCT tests which resulted in clinical intervention';
            $header[4] = 'Number of POCT tests where clinical intervention was necessary';
            $header[5] = 'Percentage of POCT results that led to clinical intervention';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of POCT results which led to a clinical intervention - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_41psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_41PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of functional gain patients in neurorehabilitation';
            $header[4] = 'Number of patients undergoing neurorehabilitation';
            $header[5] = 'Percentage of neurorehabilitation patient with functional gain';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Functional gain following rehabilitation - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_42psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_42PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'No.of sepsis patients receiving Hour-1 bundle care';
            $header[4] = 'Total number of sepsis cases';
            $header[5] = 'Percentage of sepsis patients receiving Hour-1 bundle care';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of sepsis patients who receive care as per the Hour-1 sepsis bundle - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_43psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_43PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'No. of COPD patients provided with COPD action plan';
            $header[4] = 'No. of COPD patients discharged';
            $header[5] = 'Percentage of COPD patients receiving COPD action plan at the time of discharge';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of COPD patients receiving COPD Action plan at the time of discharge - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_44psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_44PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'No. of stroke patients with DTN time within 60 minutes';
            $header[4] = 'No. of stroke patients receiving thrombolytic therapy';
            $header[5] = 'Percentage of stroke patients with DTN time within 60 minutes';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of stroke patients in whom the Door-to-Needle Time (DTN) of 60 minutes is achieved  - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_45psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_45PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'No. of patients treated inappropriately';
            $header[4] = 'Total no. of patients with bronchiolitis';
            $header[5] = 'Percentage of bronchiolitis patients treated inappropriately';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of bronchiolitis patients treated inappropriately  - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_46psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_46PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'No. of oncology patients treated post tumour board';
            $header[4] = 'No. of oncology cases treated';
            $header[5] = 'Percentage of oncology patients treated post tumour board';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of oncology patients who had treatment initiated following Multidisciplinary meeting  - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_47psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_47PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'No. of patients who developed adverse reaction';
            $header[4] = 'No. of patients receiving the radiopharmaceutical';
            $header[5] = 'Percentage of adverse reaction to radiopharmaceutical';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of adverse reaction to radiopharmaceutical  - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_48psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_48PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'No. of contrast extravasation';
            $header[4] = 'No. of patients receiving contrast';
            $header[5] = 'Percentage of Intravenous contrast media extravasation';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Percentage of Intravenous Contrast Media Extravasation  - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_49psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_49PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'Sum of time taken for triage';
            $header[4] = 'Total no. of patients coming to the emergency';
            $header[5] = 'Avg. waiting time for triage';

            $j = 6;

            $header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                $dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a- Time taken for triage  - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    public function overall_50psq3a_report()
    {

        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback_50PSQ3a';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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


            $header[0] = 'Recorded by';
            $header[1] = 'Month - Year';
            $header[2] = 'Employee details';
            $header[3] = 'No. of dialysis patients with target hemoglobin';
            $header[4] = 'Total no. of patients undergoing dialysis';
            $header[5] = 'Percentage of dialysis patients with target hemoglobin levels';

            $j = 6;

            //$header[$j++] = 'Benchmark time';
            $header[$j++] = 'Data analysis';
            $header[$j++] = 'Corrective action';
            $header[$j++] = 'Preventive action';

            $dataexport = [];
            $i = 0;
            foreach ($feedbacktaken as $row) {
                $data = json_decode($row->dataset, true);

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // exit;

                $dataexport[$i]['name'] = $data['name'];
                $dataexport[$i]['date'] = date('M-Y', strtotime($row->datetime));
                $dataexport[$i]['patient_id'] = $data['name'] . "<" . $data['patientid'] . ">\n" .
                    $data['contactnumber'] . "\n" .
                    $data['email'];

                $dataexport[$i]['initial_assessment_hr'] = $data['initial_assessment_hr'];
                $dataexport[$i]['total_admission'] = $data['total_admission'];
                $dataexport[$i]['calculatedResult'] = $data['calculatedResult'];
                //$dataexport[$i]['benchmark'] = $data['benchmark'];
                $dataexport[$i]['dataAnalysis'] = $data['dataAnalysis'];
                $dataexport[$i]['correctiveAction'] = $data['correctiveAction'];
                $dataexport[$i]['preventiveAction'] = $data['preventiveAction'];

                $i++;
            }


            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            ob_end_clean();
            $fileName = 'EF- PSQ3a-  Percentage of patients undergoing dialysis who are able to achieve target hemoglobin levels  - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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

    //consoldited report 
    public function export_all_kpi()
    {
        $this->load->library('spreadsheet');

        // Define KPI tables and headers
        $kpiList = [
            [
                'table' => 'bf_feedback_1PSQ3a',
                'sheet' => '1.PSQ3a- Initial Assessment',
                'header' => [
                    'Recorded by',
                    'Month - Year',
                    'Employee details',
                    'Sum of time taken for initial assessment',
                    'Total number of admissions',
                    'Avg. time taken for initial assessment',
                    'Benchmark time',
                    'Data analysis',
                    'Corrective action',
                    'Preventive action'
                ]
            ],
            [
                'table' => 'bf_feedback_2PSQ3a',
                'sheet' => '2.PSQ3a- Number of reporting errors',
                'header' => [
                    'Recorded by',
                    'Month - Year',
                    'Employee details',
                    'No. of reporting errors',
                    'No. of tests performed',
                    'No. of reporting errors per 1000 investigations',
                    'Data analysis',
                    'Corrective action',
                    'Preventive action'
                ]
            ],
        ];

        $firstSheet = true;
        foreach ($kpiList as $kpi) {
            $feedbackData = $this->quality_model->patient_and_feedback('bf_patients', $kpi['table'], 'desc');

            // Create valid sheet name (max 31 chars)
            $sheetName = substr($kpi['sheet'], 0, 31);

            if ($firstSheet) {
                $sheet = $this->spreadsheet->getActiveSheet();
                $sheet->setTitle($sheetName);
                $firstSheet = false;
            } else {
                $sheet = $this->spreadsheet->addSheetWithTitle($sheetName);
            }

            $sheet->fromArray([$kpi['header']], null, 'A1');

            $rowIndex = 2;
            foreach ($feedbackData as $row) {
                $data = json_decode($row->dataset, true);

                if ($kpi['table'] === 'bf_feedback_1PSQ3a') {
                    $rowValues = [
                        $data['name'],
                        date('M-Y', strtotime($row->datetime)),
                        $data['name'] . "<" . $data['patientid'] . ">\n" . $data['contactnumber'] . "\n" . $data['email'],
                        $data['initial_assessment_total'],
                        $data['total_admission'],
                        $data['calculatedResult'],
                        $data['benchmark'],
                        $data['dataAnalysis'],
                        $data['correctiveAction'],
                        $data['preventiveAction']
                    ];
                } elseif ($kpi['table'] === 'bf_feedback_2PSQ3a') {
                    $rowValues = [
                        $data['name'],
                        date('M-Y', strtotime($row->datetime)),
                        $data['name'] . "<" . $data['patientid'] . ">\n" . $data['contactnumber'] . "\n" . $data['email'],
                        $data['initial_assessment_hr'],
                        $data['total_admission'],
                        $data['calculatedResult'],
                        $data['dataAnalysis'],
                        $data['correctiveAction'],
                        $data['preventiveAction']
                    ];
                }

                $sheet->fromArray([$rowValues], null, 'A' . $rowIndex);
                $sheet->getStyle('C' . $rowIndex)->getAlignment()->setWrapText(true);
                $rowIndex++;
            }
        }

        $this->spreadsheet->download('NABH_KPI_Report.xlsx');
    }



    //END OF QUAILTY KPI




    // IP DASHBOARD DOWNLOADS

    public function downloadcomments()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        if (ismodule_active('QUALITY') === true) {


            $table_feedback = 'bf_feedback';
            $table_patients = 'bf_patients';
            $desc = 'desc';
            $setup = 'setup';

            $feedbacktaken = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $desc);
            $sresult = $this->quality_model->setup_result($setup);
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
            $header[3] = 'Floor/Ward';
            $header[4] = 'Room/Bed';
            $header[5] = 'Mobile Number';
            $j = 6;
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
                $dataexport[$i]['bedno'] = $data['bedno'];
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
                    if ($r * 1 > 0) {
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

            $fileName = 'EF- IPD PATIENT COMMENTS - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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
        if (ismodule_active('QUALITY') === true) {

            $table_feedback = 'bf_feedback';
            $table_patients = 'bf_patients';
            $sorttime = 'asc';
            $setup = 'setup';
            $asc = 'asc';
            $desc = 'desc';
            $table_tickets = 'tickets';
            $open = 'Open';
            $closed = 'Closed';
            $addressed = 'Addressed';
            $type = 'inpatient';

            $ip_feedbacks_count = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
            $ticket_resolution_rate = $this->quality_model->ticket_resolution_rate($table_tickets, $closed, $table_feedback);
            $ip_tickets_count = $this->tickets_model->alltickets();
            $ip_open_tickets = $this->tickets_model->read();
            $ip_closed_tickets = $this->tickets_model->read_close();
            $ip_addressed_tickets = $this->tickets_model->addressedtickets();

            $ip_nps = $this->quality_model->nps_analytics($table_feedback, $asc, $setup);
            $ip_psat = $this->quality_model->psat_analytics($table_patients, $table_feedback, $table_tickets, $sorttime);

            $dataexport = array();
            $i = 0;

            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];

            $dataexport[$i]['row1'] = 'IPD FEEDBACK OVERALL REPORT';
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
            $dataexport[$i]['row2'] = count($ip_feedbacks_count);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'SATISFACTION INDEX';
            $dataexport[$i]['row2'] = $ip_psat['psat_score'] . '%';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'SATISFIED PATIENTS';
            $dataexport[$i]['row2'] =  $ip_psat['satisfied_count'];
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'UNSATISFIED PATIENTS';
            $dataexport[$i]['row2'] = $ip_psat['unsatisfied_count'];
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
            $dataexport[$i]['row2'] =  $ip_nps['nps_score'] . '%';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'NO. OF PROMOTERS';
            $dataexport[$i]['row2'] = $ip_nps['promoters_count'];
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'NO. OF PASSIVES';
            $dataexport[$i]['row2'] = $ip_nps['passives_count'];
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'NO. OF DETRACTORS';
            $dataexport[$i]['row2'] = $ip_nps['detractors_count'];
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
            $dataexport[$i]['row2'] = count($ip_tickets_count);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TICKET RESOLUTION RATE';
            $dataexport[$i]['row2'] = $ticket_resolution_rate . '%';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;
            $dataexport[$i]['row1'] = 'OPEN TICKETS';
            $dataexport[$i]['row2'] = count($ip_open_tickets);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;
            if (ticket_addressal('ip_addressal') === true) {
                $dataexport[$i]['row1'] = 'ADDRESSED TICKETS';
                $dataexport[$i]['row2'] = count($ip_addressed_tickets);
                $dataexport[$i]['row3'] = '';
                $dataexport[$i]['row4'] = '';
                $i++;
            }
            $dataexport[$i]['row1'] = 'CLOSED TICKETS';
            $dataexport[$i]['row2'] = count($ip_closed_tickets);
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
            if (ticket_addressal('ip_addressal') === true) {

                $dataexport[$i]['row5'] = 'ADDRESSED';
            }
            $dataexport[$i]['row6'] = 'CLOSED';
            $dataexport[$i]['row7'] = 'RESOLUTION RATE';
            $dataexport[$i]['row8'] = 'RESOLUTION TIME';
            $dataexport[$i]['row9'] = '';
            $i++;

            $ticket = $this->quality_model->tickets_recived_by_department($type, $table_feedback, $table_tickets);
            foreach ($ticket as $ps) {
                $time = secondsToTimeforreport($ps['res_time']);
                $dataexport[$i]['row1'] = $ps['department'];
                $dataexport[$i]['row2'] = $ps['percentage'] . '%';
                $dataexport[$i]['row3'] = $ps['count'];
                $dataexport[$i]['row4'] = $ps['open_tickets'];
                if (ticket_addressal('ip_addressal') === true) {

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


            $choice_of_hospitals = $this->quality_model->reason_to_choose_hospital($table_feedback, $sorttime);

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
            $fileName = 'EF - OVERALL IPD FEEDBACKS REPORT  - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                //fputcsv($fp, $header,',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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
        if (ismodule_active('QUALITY') === true) {


            $dataexport = array();
            $i = 0;
            $table_feedback = 'bf_feedback';
            $table_patients = 'bf_patients';
            $sorttime = 'asc';
            $setup = 'setup';
            $asc = 'asc';
            $desc = 'desc';
            $table_tickets = 'tickets';
            $open = 'Open';
            $closed = 'Closed';
            $addressed = 'Addressed';
            $type = 'inpatient';

            $ip_tickets_count = $this->tickets_model->alltickets();
            $ip_open_tickets = $this->tickets_model->read();
            $ip_closed_tickets = $this->tickets_model->read_close();
            $ip_addressed_tickets = $this->tickets_model->addressedtickets();
            $ip_feedbacks_count = $this->quality_model->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);

            $ticket_resolution_rate = $this->quality_model->ticket_resolution_rate($table_tickets, $closed, $table_feedback);

            $sresult = $this->quality_model->setup_result($setup);
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
            $dataexport[$i]['row2'] = count($ip_feedbacks_count);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = '';
            $dataexport[$i]['row2'] = '';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            $dataexport[$i]['row1'] = 'TOTAL TICKETS';
            $dataexport[$i]['row2'] = count($ip_tickets_count);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'TICKET RESOLUTION RATE';
            $dataexport[$i]['row2'] = $ticket_resolution_rate . '%';
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;

            $dataexport[$i]['row1'] = 'OPEN TICKETS';
            $dataexport[$i]['row2'] = count($ip_open_tickets);
            $dataexport[$i]['row3'] = '';
            $dataexport[$i]['row4'] = '';
            $i++;


            if (ticket_addressal('ip_addressal') === true) {
                $dataexport[$i]['row1'] = 'ADDRESSED TICKETS';
                $dataexport[$i]['row2'] = count($ip_addressed_tickets);
                $dataexport[$i]['row3'] = '';
                $dataexport[$i]['row4'] = '';
                $i++;
            }

            $dataexport[$i]['row1'] = 'CLOSED TICKETS';
            $dataexport[$i]['row2'] = count($ip_closed_tickets);
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
            if (ticket_addressal('ip_addressal') === true) {
                $dataexport[$i]['row5'] = 'ADDRESSED';
            }
            $dataexport[$i]['row6'] = 'CLOSED';
            $dataexport[$i]['row7'] = 'RESOLUTION RATE';
            $dataexport[$i]['row8'] = 'RESOLUTION TIME';
            $dataexport[$i]['row9'] = '';
            $i++;

            $ticket = $this->quality_model->tickets_recived_by_department($type, $table_feedback, $table_tickets);
            foreach ($ticket as $ps) {
                $time = secondsToTimeforreport($ps['res_time']);
                $dataexport[$i]['row1'] = $ps['department'];
                $dataexport[$i]['row2'] = $ps['percentage'] . '%';
                $dataexport[$i]['row3'] = $ps['count'];
                $dataexport[$i]['row4'] = $ps['open_tickets'];
                if (ticket_addressal('ip_addressal') === true) {
                    $dataexport[$i]['row5'] = $ps['addressed_tickets'];
                }
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

            foreach ($ip_feedbacks_count as $row) {
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
                    if ($r * 1 > 0) {
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

            // $header1='sdgf';
            ob_end_clean();
            $fileName = 'EF- IPD DEPARTMENT WISE TICKET REPORT - ' . $tdate . ' to ' . $fdate . '.csv';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename=' . $fileName);
            if (isset($dataexport[0])) {
                $fp = fopen('php://output', 'w');
                //print_r($header);
                fputcsv($fp, $header, ',');
                foreach ($dataexport as $values) {
                    //print_r($values); exit;
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
        if (ismodule_active('QUALITY') === true) {

            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            redirect('pdfreport/ip_pdf_report?fdate=' . $tdate . '&tdate=' . $fdate);
            // redirect('report/ip_capa_report');

        } else {
            redirect('dashboard/noaccess');
        }
    }
}
