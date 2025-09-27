<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // $dates = get_from_to_date();
        $this->load->model(
            array(
                'dashboard_model',
                'efeedor_model',
                'ticketsadf_model', //1
                'tickets_model', //2
                'ticketsint_model', //3
                'ticketsop_model', // 4
                'ticketsesr_model', // 5 
                'ticketsgrievance_model',  //  6
                'ticketsincidents_model', // 7 
                'ticketspdf_model', // 7 
                'opt/ipd_opt_model',
                'ipd_model',
                'opf_model',
                'pc_model',
                'isr_model',
                'post_model',
                'incident_model',
                'grievance_model',
                'admissionfeedback_model',
                'departmenthead_model',
                'asset_model',
                'ticketsasset_model',
                'setting_model',
            )
        );
    }

    public function index()
    {
        $redirect = $this->input->get('redirect');
        if (!empty($redirect)) {
            $this->session->set_userdata('referred_from', $redirect);
        }


        if ($this->session->userdata('isLogIn'))
            $this->redirectTo(1);
        // Redirect for APK login

        $userid = $this->input->get('userid', true);

        if (!empty($userid)) {
            // Verify if the userid exists in the database
            $check_user = $this->dashboard_model->check_user_api($userid);
            $data['user'] = $check_user;
            // print_r($check_user);
        } else {



            // Web redirect to dashboard home page


            // $this->form_validation->set_rules('email', display('email'), 'required|max_length[50]|valid_email');
            $this->form_validation->set_rules('password', display('password'), 'required|max_length[32]|md5');
            $this->form_validation->set_rules('user_role', display('user_role'), 'required');



            $data['user'] = (object) $postData = [
                'email' => $this->input->post('email', true),
                'password' => md5($this->input->post('password', true)),
                'user_role' => $this->input->post('user_role', true),


            ];
            if ($this->form_validation->run() === true) {
                $check_user = $this->dashboard_model->check_user($postData);
            }
        }
        #-------------------------------#
        if ($this->form_validation->run() === true || !empty($userid)) {
            //check user data


            #-------------------------------#
            $setting = $this->setting_model->read();
            $data['title'] = (!empty($setting->title) ? $setting->title : null);
            $data['logo'] = (!empty($setting->logo) ? $setting->logo : null);
            $data['favicon'] = (!empty($setting->favicon) ? $setting->favicon : null);
            $data['footer_text'] = (!empty($setting->footer_text) ? $setting->footer_text : null);

            $u = json_decode($check_user->row()->departmentpermission);
            $floor_ward = json_decode($check_user->row()->floor_ward) ?? [];
            $floor_ward_esr = json_decode($check_user->row()->floor_ward_esr)  ?? [];
            $department = json_decode($check_user->row()->department, true);

            $question_array = array();
            foreach ($department as $key => $deprow) {
                foreach ($deprow as $set) {
                    $set_array = explode(',', $set);
                    foreach ($set_array as $r) {
                        $question_array[$key][] = $r;
                    }
                }
            }



            if ($check_user->num_rows() === 1) {
                //retrive setting data and store to session

                //store data in session
                $this->session->set_userdata([
                    'isLogIn' => true,
                    'user_id' => (($postData['user_role'] == 10) ? $check_user->row()->id : $check_user->row()->user_id),
                    'patient_id' => (($postData['user_role'] == 10) ? $check_user->row()->patient_id : null),
                    'email' => $check_user->row()->email,
                    'fullname' => $check_user->row()->firstname,
                    'user_role' => $check_user->row()->user_role,
                    'user_role_name' => $check_user->row()->lastname,
                    'designation' => $check_user->row()->designation,

                    'picture' => $check_user->row()->picture,
                    // 'access1' => $access1,
                    // 'access2' => $access2,
                    // 'access3' => $access3,
                    // 'access4' => $access4,
                    // 'access5' => $access5,
                    // 'access6' => $access6,
                    // 'access7' => $access7,
                    // 'access8' => $access8,
                    // 'access9' => $access9,
                    'departmenthead' => $u,
                    'floor_ward' => $floor_ward ?? [],
                    'floor_ward_esr' => $floor_ward_esr ?? [],
                    'floor_asset' => json_decode($check_user->row()->floor_asset) ?? [],
                    'department_access' => $department,
                    'question_array' => $question_array,
                    'title' => (!empty($setting->title) ? $setting->title : null),
                    'address' => (!empty($setting->description) ? $setting->description : null),
                    'logo' => (!empty($setting->logo) ? $setting->logo : null),
                    'favicon' => (!empty($setting->favicon) ? $setting->favicon : null),
                    'footer_text' => (!empty($setting->footer_text) ? $setting->footer_text : null),
                ]);



                $this->redirectTo($check_user->row()->user_access);
            } else {
                #set exception message
                $this->session->set_flashdata('exception', 'Incorrect Email / Mobile Number / Password!');
                //redirect to login form
                redirect('login');
            }
        } else {
            $this->load->view('layout/login_wrapper', $data);
        }
    }


    public function redirectTo($user_access = null)
    {
        // print_r($this->session->userdata);
        // exit;

        if ($this->session->userdata('isLogIn') === false)
            redirect('login');
        // echo '<pre>';
        // print_r($this->session->userdata); exit;
        $userRole = $this->session->userdata['user_role'];
        $userId = $this->session->userdata['user_id'];
        $this->db->where('U.user_id', $userId);
        $this->db->select('U.*,F.feature_name,M.module_name,S.section_name,S.url');
        $this->db->from('user_permissions as U');
        $this->db->join('features as F', 'F.feature_id = U.feature_id');
        $this->db->join('modules as M', 'M.module_id = U.module');
        $this->db->join('sections as S', 'S.section_id = U.section');
        $this->db->order_by('M.module_id', 'asc');
        $query = $this->db->get();
        $permission = $query->result();

        if (count($permission) == 0) {
            $this->db->where('R.role_id', $userRole);
            $this->db->select('R.*,F.feature_name,M.module_name,S.section_name,S.url');
            $this->db->from('role_permissions as R');
            $this->db->join('features as F', 'F.feature_id = R.feature_id');
            $this->db->join('modules as M', 'M.module_id = R.module');
            $this->db->join('sections as S', 'S.section_id = R.section');
            $this->db->order_by('M.module_id', 'asc');
            $query = $this->db->get();
            $permission = $query->result();
        }



        $module_access = array();
        $feature_access = array();
        $section_access = array();
        $section_url = array();
        foreach ($permission as $row) {
            if ($row->status == 1) {
                $module_access[$row->module_name] = true;
                $feature_access[$row->feature_name] = true;
                $section_access[$row->section_name] = true;

                $section_url[$row->section_name] = $row->url;
            } else {
                if ($module_access[$row->module_name] != true) {
                    $module_access[$row->module_name] = false;
                }
                if ($feature_access[$row->feature_name] != true) {
                    $feature_access[$row->feature_name] = false;
                }
                if ($section_access[$row->section_name] != true) {
                    $section_access[$row->section_name] = false;
                }
            }
        }

        $this->session->set_userdata(['modules' => $module_access, 'feature' => $feature_access, 'section' => $section_access]);
        //echo '<pre>';

        if (isset($this->session->userdata['referred_from']) || $_GET['referred_from']) {
            $referred_from = $this->session->userdata('referred_from');
            $this->session->set_userdata('referred_from', NULL);
            redirect($referred_from, 'refresh');
        }
        foreach ($section_access as $key => $row) {
            if ($row === true) {

                //echo $section_url[$key]; exit;
                redirect($section_url[$key]);
                exit;
            }
        }
        //exit;
        redirect('dashboard/welcome');

        //  echo '<pre>';
        //  echo count($permission);
        // print_r($this->session->userdata); exit; 

        // switch ($user_access) {
        //     case 1:
        //         if ($this->session->userdata['user_role'] === 0 && $this->session->userdata['user_access'] === 0) {
        //             $this->session->set_userdata([
        //                 'active_menu' => array(null),
        //             ]);
        //             redirect('Devcheck/devhome');
        //         } else {
        //             if ($this->session->userdata['user_role'] == 5) {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('patient'),
        //                     'useraccess' => 1
        //                 ]);
        //                 redirect('dashboard/swithc?type=8');
        //             }
        //             if (isset($this->session->userdata['referred_from'])) {
        //                 $referred_from = $this->session->userdata('referred_from');
        //                 $this->session->set_userdata('referred_from', NULL);
        //                 redirect($referred_from, 'refresh');
        //             }
        //         }
        //         if ($this->session->userdata['user_role'] == 2 || $this->session->userdata['user_role'] == 3) {
        //             $this->session->set_userdata([
        //                 'active_menu' => array(null),
        //             ]);
        //         }
        //         // uncomment the following line to route to welcome page
        //         redirect('dashboard/welcome');
        //         // comment this line later
        //         // redirect('ipd/feedback_dashboard');

        //         break;

        //     case 2:
        //         if ($this->session->userdata['access1'] == 'inpatient') {
        //             if ($this->session->userdata['user_role'] != 4) {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('ip_dashboard', 'ip_ticket', 'ip_reports', 'ip_patients', 'ip_settings', 'ip_dep'),
        //                 ]);
        //                 redirect('ipd/feedback_dashboard');
        //                 // redirect('dashboard/ip_feedback_dashboard');
        //             } else {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('ip_dashboard', 'ip_ticket', 'ip_reports', 'ip_patients', 'ip_settings', 'ip_dep'),
        //                 ]);
        //                 redirect('ipd/department_tickets');
        //             }
        //         } else {
        //             redirect('dashboard/noaccess');
        //         }
        //         break;
        //     case 3:
        //         if ($this->session->userdata['access2'] == 'outpatient') {
        //             if ($this->session->userdata['user_role'] != 4) {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('op_dashboard', 'op_ticket', 'op_reports', 'op_patients', 'op_settings', 'op_dep'),
        //                 ]);
        //                 redirect('opf/feedback_dashboard');
        //             } else {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('op_ticket'),
        //                 ]);
        //                 redirect('opf/department_tickets');
        //             }
        //         } else {
        //             redirect('dashboard/noaccess');
        //         }
        //         break;
        //     case 4:
        //         if ($this->session->userdata['access3'] == 'int') {
        //             if ($this->session->userdata['user_role'] != 4) {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('int_dashboard', 'int_ticket', 'int_reports', 'int_patients', 'int_settings'),
        //                 ]);
        //                 redirect('pc/ticket_dashboard');
        //             } else {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('int_ticket'),
        //                 ]);
        //                 redirect('pc/department_tickets');
        //             }
        //         } else {
        //             redirect('dashboard/noaccess');
        //         }
        //         break;
        //     case 5:
        //         if ($this->session->userdata['access4'] == 'psr') {
        //             if ($this->session->userdata['user_role'] != 4) {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('psr_dashboard', 'psr_ticket', 'psr_reports', 'psr_settings'),
        //                 ]);

        //                 redirect('dashboard/psr_request_dashboard');
        //             } else {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('psr_ticket'),
        //                 ]);
        //                 redirect('dashboard/psr_department_requests');
        //             }
        //         } else {
        //             redirect('dashboard/noaccess');
        //         }
        //         break;
        //     case 6:
        //         if ($this->session->userdata['access5'] == 'esr') {
        //             if ($this->session->userdata['user_role'] != 4) {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('esr_dashboard', 'esr_ticket', 'esr_reports', 'esr_patients', 'esr_settings'),
        //                 ]);
        //                 redirect('isr/ticket_dashboard');
        //             } else {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('esr_ticket'),
        //                 ]);
        //                 redirect('isr/department_tickets');
        //             }
        //         } else {
        //             redirect('dashboard/noaccess');
        //         }
        //         break;
        //     case 7:
        //         if ($this->session->userdata['access6'] == 'empex') {
        //             if ($this->session->userdata['user_role'] != 4) {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('empex_dashboard', 'empex_ticket', 'empex_reports', 'empex_patients', 'empex_settings'),
        //                 ]);
        //                 redirect('dashboard/empex_feedback_dashboard');
        //             } else {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('empxp_ticket'),
        //                 ]);
        //                 redirect('empex_department_tickets');
        //             }
        //         } else {
        //             redirect('dashboard/noaccess');
        //         }
        //         break;
        //     case 8:
        //         if ($this->session->userdata['access7'] == 'admin_allaccess') {
        //             $this->session->set_userdata([
        //                 'active_menu' => array('patient'),
        //                 'useraccess' => 1
        //             ]);
        //             redirect('patient/');
        //         }
        //         if ($this->session->userdata['access7'] == 'admin_patient_discharge') {
        //             $this->session->set_userdata([
        //                 'active_menu' => array('patient'),
        //                 'useraccess' => 1
        //             ]);
        //             redirect('patient/');
        //         }
        //         break;
        //     case 9:
        //         redirect('noaccess');
        //         break;
        //         $one = 1;
        //     case 10:
        //         redirect('dashboard/maintenance');
        //         break;
        //     case 11:
        //         if ($this->session->userdata['access8'] == 'incident') {
        //             if ($this->session->userdata['user_role'] != 4) {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('inci_dashboard', 'inci_ticket', 'inci_reports', 'inci_patients', 'inci_settings'),
        //                 ]);
        //                 redirect('incident/ticket_dashboard');
        //             } else {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('inci_ticket'),
        //                 ]);
        //                 redirect('incident/department_tickets');
        //             }
        //         } else {
        //             redirect('dashboard/noaccess');
        //         }
        //         break;
        //     case 12:
        //         if ($this->session->userdata['access9'] == 'adf') {
        //             if ($this->session->userdata['user_role'] != 4) {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('adf_dashboard', 'adf_ticket', 'adf_reports', 'adf_patients', 'adf_settings'),
        //                 ]);
        //                 redirect('admissionfeedback/ticket_dashboard');
        //             } else {
        //                 $this->session->set_userdata([
        //                     'active_menu' => array('adf_ticket'),
        //                 ]);
        //                 redirect('admissionfeedback/department_tickets');
        //             }
        //         } else {
        //             redirect('dashboard/noaccess');
        //         }
        //         break;
        //     default:
        //         redirect('login');
        //         break;
        // }
    }

    public function maintenance()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        $this->load->view('maintenance');
    }






    public function ebook()
    {
        if ($this->session->userdata('isLogIn') == false) {
            redirect('login');
        } else {
            $fdate = $_SESSION['from_date'];
            $tdate = $_SESSION['to_date'];
            redirect('pdfreport/ebook?fdate=' . $tdate . '&tdate=' . $fdate);
        }
        // redirect('report/ip_capa_report');

    }

    public function noaccess()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        $this->load->view('noaccess', [] );
    }

    public function departmenthead()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        $data['title'] = 'DEPARTMENT HEAD MAPPING';

        #------------------------------#
        $data['content'] = $this->load->view('departmenthead', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function welcome()
    {
        if (isset($this->session->userdata['user_role'])) {

            $this->session->set_userdata([
                'active_menu' => array(null)
            ]);

            $data['title'] = null;
            //  'OVERVIEW  ' . '<small class="align-items:center;"><a href="javascript:void()" data-placement="bottom" data-toggle="tooltip" title="This page provides a quick overview of all the key patient experience metrics derived from each module. Please visit individual  dashboard to view detailed analytics and reports."><i class="fa fa-info-circle" aria-hidden="true"></i></a></small>';

            #------------------------------#
            $data['content'] = $this->load->view('welcome', $data, true);
            $this->load->view('layout/main_wrapper', $data);
        } else {

            redirect('logout');
        }
    }

    public function profile()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');

        $data['title'] = 'PROFILE';
        #------------------------------#
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->dashboard_model->profile($user_id);
        $data['content'] = $this->load->view('profile', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function company_profile()
    {
        $data['title'] = 'Company Profile';
        #------------------------------#
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->dashboard_model->profile($user_id);
        $data['content'] = $this->load->view('company_profile', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function email_check($email, $user_id)
    {
        $emailExists = $this->db->select('email')
            ->where('email', $email)
            ->where_not_in('user_id', $user_id)
            ->get('user')
            ->num_rows();

        if ($emailExists > 0) {
            $this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
            return false;
        } else {
            return true;
        }
    }


    public function form()
    {
        if ($this->session->userdata('isLogIn') == false)
            redirect('login');
        $data['title'] = 'MANAGE YOUR PROFILE';
        $user_id = $this->session->userdata('user_id');
        #-------------------------------#
        $this->form_validation->set_rules('firstname', display('first_name'), 'required|max_length[50]');
        //$this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');

        //$this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");
        $this->form_validation->set_rules('email', display('email'), "required|max_length[50]|valid_email");

        $this->form_validation->set_rules('password', display('password'), 'required|max_length[32]|md5');

        $this->form_validation->set_rules('phone', display('phone'), 'max_length[20]');
        $this->form_validation->set_rules('mobile', display('mobile'), 'required|max_length[20]');
        $this->form_validation->set_rules('blood_group', display('blood_group'), 'max_length[10]');
        $this->form_validation->set_rules('sex', display('sex'), 'required|max_length[10]');
        $this->form_validation->set_rules('date_of_birth', display('date_of_birth'), 'max_length[10]');
        //$this->form_validation->set_rules('address',display('address'),'required|max_length[255]');
        $this->form_validation->set_rules('status', display('status'), 'required');
        #-------------------------------#
        //picture upload
        $picture = $this->fileupload->do_upload(
            'assets/images/doctor/',
            'picture'
        );
        // if picture is uploaded then resize the picture
        if ($picture !== false && $picture != null) {
            $this->fileupload->do_resize(
                $picture,
                293,
                350
            );
        }
        //if picture is not uploaded
        if ($picture === false) {
            $this->session->set_flashdata('exception', display('invalid_picture'));
        }
        #-------------------------------#
        $data['doctor'] = (object) $postData = [
            'user_id' => $this->input->post('user_id', true),
            'firstname' => $this->input->post('firstname', true),
            'lastname' => '',
            'designation' => $this->input->post('designation', true),
            'department_id' => $this->input->post('department_id', true),
            'address' => $this->input->post('address', true),
            'phone' => $this->input->post('phone', true),
            'mobile' => $this->input->post('mobile', true),
            'email' => $this->input->post('email', true),
            'password' => md5($this->input->post('password', true)),
            'short_biography' => $this->input->post('short_biography', true),
            'picture' => (!empty($picture) ? $picture : $this->input->post('old_picture')),
            'specialist' => $this->input->post('specialist', true),
            'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth', true))),
            'sex' => $this->input->post('sex', true),
            'blood_group' => $this->input->post('blood_group', true),
            'altmobile' => $this->input->post('altmobile', true),
            'degree' => $this->input->post('degree', true),
            'created_by' => $this->session->userdata('user_id'),
            'create_date' => date('Y-m-d'),
            'status' => $this->input->post('status', true),
        ];
        #-------------------------------#

        if ($this->form_validation->run() === true) {

            if ($this->dashboard_model->update($postData)) {
                #set success message
                $this->session->set_flashdata('message', display('update_successfully'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception', display('please_try_again'));
            }

            //update profile picture
            if ($postData['user_id'] == $this->session->userdata('user_id')) {
                $this->session->set_userdata([
                    'picture' => $postData['picture'],
                    'fullname' => $postData['firstname'] . ' ' . $postData['lastname']
                ]);
            }

            redirect('dashboard/form/');
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['doctor'] = $this->dashboard_model->profile($user_id);
            $data['content'] = $this->load->view('profile_form', $data, true);

            $this->load->view('layout/main_wrapper', $data);
        }
    }




    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function swithc()
    {
        $_SESSION['ward'] = 'ALL';
        $fdate = date('Y-m-d', time());
        $tdate = date('Y-m-d', strtotime('-90 days'));
        $_SESSION['from_date'] = $fdate;
        $_SESSION['to_date'] = $tdate;

        if ($this->input->get('type') == 1) {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1,
            ]);
            $this->redirectTo(1);
        } elseif ($this->input->get('type') == 2) {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1,

            ]);
            $this->redirectTo(2);
        } elseif ($this->input->get('type') == 3) {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1,
            ]);
            $this->redirectTo(3);
        } elseif ($this->input->get('type') == 4) {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1
            ]);
            $this->redirectTo(4);
        } elseif ($this->input->get('type') == 5) {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1
            ]);
            $this->redirectTo(5);
        } elseif ($this->input->get('type') == 6) {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1
            ]);
            $this->redirectTo(6);
        } elseif ($this->input->get('type') == 7) {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1
            ]);
            $this->redirectTo(7);
        } elseif ($this->input->get('type') == 8) {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1
            ]);
            $this->redirectTo(8);
        } elseif ($this->input->get('type') == 9) {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1
            ]);
            $this->redirectTo(10);
        } else {
            $this->session->set_userdata([
                'isLogIn' => true,
                'useraccess' => 1,

            ]);
            $this->redirectTo(9);
        }

        exit;
    }
}
