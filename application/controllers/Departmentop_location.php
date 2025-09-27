<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departmentop_location extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'departmentop_location_model',
			'dashboard_model',
			'efeedor_model',
		));
		if ($this->session->userdata('isLogIn') == false)
			redirect('login');
		if ($this->session->userdata['user_role'] > 2) {

			redirect('dashboard/noaccess');
		}
	}

	public function index()
	{
		$data['title'] = 'LIST OF LOCATION';
		#-------------------------------#
		$data['departments'] = $this->departmentop_location_model->read();
		$data['content'] = $this->load->view('departmentop_location/departmentop', $data, true);
		$this->load->view('layout/main_wrapper', $data);
	}

	public function create()
	{
		$data['title'] = 'ADD LOCATION';
		#-------------------------------#
		$this->form_validation->set_rules('name', display('department_name'), 'required|max_length[100]');


		#-------------------------------#
		$data['department'] = (object)$postData = [
			'guid' 	  => $this->input->post('guid', true),
			'title' 		  => $this->input->post('name', true),
		
			'bed_no' => $this->input->post('description', true),
			'doctorname' => $this->input->post('doctorname', true)

		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $dprt_id then insert data
			if (empty($postData['guid'])) {
				if ($this->departmentop_location_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('departmentop_location');
			} else {
				if ($this->departmentop_location_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));

				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('departmentop_location');
			}
		} else {
			$data['content'] = $this->load->view('departmentop_location/departmentop_form', $data, true);
			$this->load->view('layout/main_wrapper', $data);
		}
	}

	public function edit($dprt_id = null)
	{
		$data['title'] = 'Edit Location';
		#-------------------------------#
		$data['department'] = $this->departmentop_location_model->read_by_id($dprt_id);
		$data['content'] = $this->load->view('departmentop_location/departmentop_form', $data, true);
		$this->load->view('layout/main_wrapper', $data);
	}


	public function delete($dprt_id = null)
	{
		if ($this->departmentop_location_model->delete($dprt_id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('departmentop_location');
	}
}
