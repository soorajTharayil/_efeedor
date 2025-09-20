<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tickets extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'tickets_model',
			'ipd_model'

		));
		$dates = get_from_to_date();
		if (isset($_SESSION['from_date']) && isset($_SESSION['to_date'])) {

			$fdate = $_SESSION['from_date'];
			$tdate = $_SESSION['to_date'];
		} else {
			$fdate = date('Y-m-d', time());
			$tdate = date('Y-m-d', strtotime('-365 days'));
			$_SESSION['from_date'] = $fdate;
			$_SESSION['to_date'] = $tdate;
		}
		//exit;
		// if (($this->session->userdata('isLogIn') === false)) {
		// 	$this->session->set_userdata('referred_from', current_url());
		// } else {
		// 	$this->session->set_userdata('referred_from', NULL);
		// }
	}



	public function index()
	{
		if ($this->session->userdata('isLogIn') == false)
			redirect('login');

		$data['title'] = 'IP- OPEN TICKETS LIST';
		#-------------------------------#
		$data['departments'] = $this->tickets_model->read();

		$data['content'] = $this->load->view('ipd/ticket', $data, true);
		$this->load->view('layout/main_wrapper', $data);
		$this->session->set_userdata('referred_from', NULL);
	}


	public function addressedtickets()
	{
		if ($this->session->userdata('isLogIn') == false)
			redirect('login');

		$data['title'] = 'IP- ADDRESSED TICKETS LIST';
		#-------------------------------#
		$data['departments'] = $this->tickets_model->addressedtickets();

		$data['content'] = $this->load->view('ipd/addressedtickets', $data, true);
		$this->load->view('layout/main_wrapper', $data);
		$this->session->set_userdata('referred_from', NULL);
	}

	public function alltickets()
	{

		if ($this->session->userdata('isLogIn') == false)
			redirect('login');

		$data['title'] = 'IP- ALL TICKETS LIST';
		#-------------------------------#
		$data['departments'] = $this->tickets_model->alltickets();
		$data['content'] = $this->load->view('ipd/alltickets', $data, true);
		$this->load->view('layout/main_wrapper', $data);
		$this->session->set_userdata('referred_from', NULL);
	}


	public function ticket_track()
	{


		$data['title'] = 'IP- TICKET DETAILS';
		$data['departments'] = $this->tickets_model->read_by_id($this->uri->segment(3));
		$data['content'] = $this->load->view('ipd/ticket_track', $data, true);
		$this->load->view('layout/main_wrapper', $data);
	}

	public function ticket_close()
	{
		if ($this->session->userdata('isLogIn') == false)
			redirect('login');

		$data['title'] = 'IP- CLOSED TICKETS LIST';
		$data['departments'] = $this->tickets_model->read_close();
		$data['content'] = $this->load->view('ipd/ticket_close', $data, true);

		$this->load->view('layout/main_wrapper', $data);
		$this->session->set_userdata('referred_from', NULL);
	}

	public function create_ticket($dprt_id = null)
	{
		// Debugging: Print incoming POST data
		// print_r($_POST);
		// exit;
	
		// Get the current date and time
		$current_time = date('Y-m-d H:i:s');
	
		// Fetch the existing dataset from the database
		$this->db->select('dataset');
		$this->db->where('id', $this->input->post('id'));
		$query = $this->db->get('bf_feedback');
		$row = $query->row();
	
		if ($row) {
			$existingDataset = json_decode($row->dataset, true);
			
			if (!is_array($existingDataset)) {
				$existingDataset = [];
			}
	
			// Extract reply_slug (e.g., ip100) and reply_setkey (e.g., set10) from POST
			$reply_slug = $this->input->post('reply_slug'); // Example: ip100
			$reply_setkey = $this->input->post('reply_setkey'); // Example: set10
	
			// Ensure reasonSet & reason keys exist in the dataset
			if (!isset($existingDataset['reasonSet'])) {
				$existingDataset['reasonSet'] = [];
			}
			if (!isset($existingDataset['reason'])) {
				$existingDataset['reason'] = [];
			}
	
			// Initialize the specific set if not present
			if (!isset($existingDataset['reasonSet'][$reply_setkey])) {
				$existingDataset['reasonSet'][$reply_setkey] = [];
			}
	
			// Update the dataset with new values
			$existingDataset['reasonSet'][$reply_setkey][$reply_slug] = true;
			$existingDataset['reason'][$reply_slug] = true;
	
			// Encode back to JSON
			$updatedDataset = json_encode($existingDataset);
	
			// Update the database
			$updateData = ['dataset' => $updatedDataset,'admins_messagestatus' => 0 , 'departmenthead_messagestatus' => 0];
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('bf_feedback', $updateData);
		}
	
	
		$dataset = array(
			'created_on' => $current_time ,
			'created_by' => $this->input->post('created_by'),
			'rating' =>  $this->input->post('rating'),
			'feedbackid' =>$this->input->post('feedbackid'),
			'departmentid' =>$this->input->post('deparment'),
			'anymessage' =>$this->input->post('reply'),
			'ward' => $this->input->post('ward'),
			'status' => 'Open',
			'last_modified' => $current_time 
		

		);

		// Insert data into the tickets table
		if ($this->db->insert('tickets', $dataset)) {
			redirect('ipd/patient_feedback?id=' . $this->input->post('id'));
		} else {
			// Print the database error
			$error = $this->db->error(); 
			print_r($error);
			exit;
		}
	}

	public function create_ticket_email($dprt_id = null){
		// print_r($_POST);
		// exit;
		$assigned_user_ids = $this->input->post('users'); // Assuming 'users' is the name of your checkbox array

		if (!empty($assigned_user_ids)) {

			// Prepare the comma-separated list of user IDs
			$assigned_user_ids_str = implode(',', $assigned_user_ids);

			// Fetch user names from the user table based on the selected user IDs
			$this->db->select('firstname');
			$this->db->from('user');
			$this->db->where_in('user_id', $assigned_user_ids);
			$query = $this->db->get();
			$assigned_user_names = array_column($query->result_array(), 'firstname');

			// Prepare the comma-separated list of user names
			$assigned_user_names_str = implode(',', $assigned_user_names);

			
			// Update the ticket incident
			$updatedepartment = array(

				
				'manual_department_emailstatus' => 0,
				'manual_department_email_to' => $assigned_user_ids_str // Store comma-separated IDs in 'assign_to' field
			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('bf_feedback', $updatedepartment);
		}

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_URL, base_url() . 'api/curl.php');
		curl_exec($curl);

		// Redirect to open tickets page after assigning users
		redirect('ipd/patient_feedback?id=' . $this->input->post('id'));


	}

	public function track_close()
	{
		if ($this->session->userdata('isLogIn') == false)
			redirect('login');

		$data['title'] = 'IP- CLOSED TICKET DETAILS';
		$data['departments'] = $this->tickets_model->read_by_id($this->uri->segment(3));
		$data['content'] = $this->load->view('ipd/track_close', $data, true);
		$this->load->view('layout/main_wrapper', $data);
		$this->session->set_userdata('referred_from', NULL);
	}

	public function create($dprt_id = null)
	{


		if ($this->input->post('deparment') != 0) {

			$this->db->where('dprt_id', $this->input->post('deparment'));
			// print_r($_POST);
			$query = $this->db->get('department');
			$department = $query->result();
			$action = 'Moved From  ' . $this->input->post('reply_departmen') . ' To ' . $department[0]->description;
			$action_meta = array(
				'action' => 'Transfered',
				'sourceDepartmentId' => $this->input->post('reply_department_id'),
				'targetDepartmentId' => $this->input->post('deparment')
			);

			$message = $this->session->userdata['fullname'];
			$updatedepartment = array('departmentid_trasfered' => $this->input->post('deparment'), 'emailstatus' => 0, 'status' => 'Transfered', 'transfer_ticket_alert' => '0');
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tickets', $updatedepartment);



			$dataset = array(
				'reply' => $this->input->post('reply'),
				'corrective' => $this->input->post('corrective'),
				'preventive' => $this->input->post('preventive'),
				'message' => $message,
				'action' => $action,
				'action_meta' => json_encode($action_meta),
				'ticketid' => $this->input->post('id'),
				'ticket_status' => 'Transfered',
				'created_by' => $this->session->userdata('user_id'),

			);

			$this->db->insert('ticket_message', $dataset);
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_URL, base_url() . 'api/curl.php');
			curl_exec($curl);
			redirect('ipd/opentickets');
		} else {
			if ($this->input->post('status') == 'Closed') {
				$result = $this->db->select("*")
					->from('tickets')
					->where('id', $this->input->post('id'))
					->get()
					->result();
				//print_r($result); exit;			
				$results = $this->db->select("*")
					->from('department')
					->where('dprt_id', $result[0]->departmentid)
					->get()
					->result();
				$resultss = $this->db->select("*")
					->from('department')
					->where('description', $results[0]->description)
					->get()
					->result();
				//print_r($resultss); exit;
				$action = 'Closed by ' . $this->session->userdata['fullname'];
				$message = $this->session->userdata['fullname'];
				//foreach($resultss as $tickets){

				$updatedepartmen = array('status' => $this->input->post('status'));

				$this->db->where('id', $this->input->post('id'));
				//$this->db->where('created_by',$result[0]->created_by);
				$this->db->update('tickets', $updatedepartmen);
				//}
				if (close_comment('ip_close_comment') === true) {
					$comment = $this->input->post('comment');
				} else {
					$comment = NULL;
				}

				//picture upload
				$picture = $this->fileupload->do_upload(
					'assets/images/capaimage/',
					'picture'
				);
				// print_r($picture); exit;
				
			

				$dataset = array(
					'reply' => $this->input->post('reply'),
					'corrective' => $this->input->post('corrective'),
					'preventive' => $this->input->post('preventive'),
					'rootcause' => $this->input->post('rootcause'),
					'comment' => $comment,
					'message' => $message,
					'action' => $action,
					'picture' => (!empty($picture) ? $picture : null),
					'ticket_status' => 'Closed',
					'created_by' => $this->session->userdata('user_id'),
					'ticketid' => $this->input->post('id'),
				);

				$this->db->insert('ticket_message', $dataset);



				// redirect('ipd/closedtickets');
				$this->session->set_flashdata('message', '<span style="color: green;">Ticket is closed</span>');
			} elseif ($this->input->post('status') == 'Reopen') {

				$action = 'Reopened by ' . $this->session->userdata['fullname'];
				$message = $this->session->userdata['fullname'];
				$updatedepartmen = array('status' => $this->input->post('status'), 'addressed' => 0, 'reopen_ticket_alert' => '0');
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tickets', $updatedepartmen);

				$dataset = array(
					'reply' => $this->input->post('reply'),
					'message' => $message,
					'action' => $action,
					'ticket_status' => 'Reopen',
					'created_by' => $this->session->userdata('user_id'),
					'ticketid' => $this->input->post('id')
				);

				$this->db->insert('ticket_message', $dataset);
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_URL, base_url() . 'api/curl.php');
				curl_exec($curl);
				redirect('ipd/opentickets');
			} elseif ($this->input->post('status') == 'Addressed') {

				$action = 'Addressed by ' . $this->session->userdata['fullname'];
				$message = $this->session->userdata['fullname'];
				$updatedepartmen = array('addressed' => 1, 'status' => 'Addressed');
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tickets', $updatedepartmen);

				$dataset = array(
					'reply' => $this->input->post('reply'),
					'message' => $message,
					'action' => $action,
					'ticket_status' => 'Addressed',
					'created_by' => $this->session->userdata('user_id'),
					'ticketid' => $this->input->post('id')
				);

				$this->db->insert('ticket_message', $dataset);
				redirect('ipd/addressedtickets');
			} else {
				$action = 'Comment';
				$message = $this->session->userdata['fullname'];
				$dataset = array(
					'reply' => $this->input->post('reply'),
					'message' => $message,
					'action' => $action,
					'created_by' => $this->session->userdata('user_id'),
					'ticketid' => $this->input->post('id')
				);

				$this->db->insert('ticket_message', $dataset);
			}
		}
		redirect('ipd/track/' . $this->input->post('id'));
	}
}
