<?php defined('BASEPATH') or exit('No direct script access allowed');



class UserManagement_model extends CI_Model

{



	private $table = 'user';
	private $table2 = 'roles';



	public function create($data = [])

	{



		$this->db->insert($this->table, $data);
		// Get the insert ID of the newly inserted record
		$user_id = $this->db->insert_id();  // Retrieve the insert ID

		// Ensure that $user_id is set before proceeding
		if (!$user_id) {
			return false;  // Handle the case where insertion failed
		}

		// Get user permissions based on the new user_id and role_id
		$userPermission = $this->user_permission($user_id, $data['user_role']);
		$this->updateUserManagement($userPermission, $user_id);
		// Insert data into the user_permissions table
		// 		foreach ($userPermission as $module => $sections) {
		// 			foreach ($sections as $section => $permissions) {
		// 				foreach ($permissions as $permission) {
		// 					$permissionData = [
		// 						'user_id' => $user_id,  // Use the insert ID as the user_id
		// 						'feature_id' => $permission['feature_id'],
		// 						'status' => $permission['status'] ? 1 : 0, // Convert boolean to 1 or 0
		// 						'section' => $permission['section_id'],
		// 						'module' => $permission['module_id'],
		// 					];
		// 					// Insert each permission into the user_permissions table
		// 					$this->db->insert('user_permissions', $permissionData);
		// 				}
		// 			}
		// 		}

		$this->sinkdeparment($_POST, 'NOEMAIL');

		return true;
	}

	public function get_all_descriptions()
	{
		$this->db->select('type, setkey, description');
		$query = $this->db->get('department');
		$result = $query->result();

		$descriptions = [];
		foreach ($result as $row) {
			$descriptions[$row->type][$row->setkey] = $row->description;
		}

		return $descriptions;
	}
	public function read()

	{

		return $this->db->select("*")

			->from($this->table)

			->order_by('user_role', 'asc')

			->get()

			->result();
	}


	public function is_mobile_exists($mobile)
	{
		$this->db->where('mobile', $mobile);
		$query = $this->db->get('user'); // Replace 'user' with your actual table name

		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function is_email_exists($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('user'); // Replace 'user' with your actual table name

		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function read_by_id($dprt_id = null)

	{

		return $this->db->select("*")

			->from($this->table)

			->where('user_id', $dprt_id)

			->get()

			->row();
	}

	public function role_edit($dprt_id = null)

	{

		return $this->db->select("*")

			->from($this->table2)

			->where('role_id', $dprt_id)

			->get()

			->row();
	}




	public function departmentList()

	{

		return $this->db->select("*")

			->from('department')



			->get()

			->result();
	}



	public function update($data = [])
	{

		// Check if the record exists
		if ($this->read_by_id($_POST['ids'])) {
			$ds = $this->read_by_id($_POST['ids']);
			$old_email = $ds->email;

			// Update the existing record
			$this->db->where('user_id', $_POST['ids'])
				->update($this->table, $data);

			$user_id = $_POST['ids']; // Use the provided ID for updating permissions
		} else {
			// Insert new record
			$this->db->insert($this->table, $data);

			// Get the insert ID of the newly inserted record
			$user_id = $this->db->insert_id();

			// Ensure that $user_id is set before proceeding
			if (!$user_id) {
				return false; // Handle the case where insertion failed
			}
		}

		// Delete old permissions for the user
		//$this->db->where('user_id', $user_id)->delete('user_permissions');

		// Get user permissions based on the user_id and role_id
		//$userPermission = $this->user_permission($user_id, $data['user_role']);
		//$this->updateUserManagement($userPermission,$user_id);
		// Insert updated data into the user_permissions table

		// Handle other logic for sink department or any additional processing
		$this->sinkdeparment($_POST, $old_email ?? null);

		return true;
	}

	private function updateUserManagement($userPermission, $user_id)
	{
		foreach ($userPermission as $module => $sections) {
			foreach ($sections as $section => $permissions) {
				foreach ($permissions as $permission) {
					// Check if the permission already exists
					$this->db->where([
						'user_id' => $user_id,
						'feature_id' => $permission['feature_id'],
						'section' => $permission['section_id'],
						'module' => $permission['module_id']
					]);
					$query = $this->db->get('user_permissions');

					if ($query->num_rows() == 0) { // Insert only if it does not exist
						$permissionData = [
							'user_id' => $user_id,
							'feature_id' => $permission['feature_id'],
							'status' => $permission['status'] ? 1 : 0,
							'section' => $permission['section_id'],
							'module' => $permission['module_id'],
						];
						$this->db->insert('user_permissions', $permissionData);
					}
				}
			}
		}
	}



	public function sinkdeparment($d, $old_email)

	{



		$data = array(

			'mobile' => '',

			'alternate_mobile' => '',

			'email' => '',

			'alternate_email' => '',

			'pname' => '',

		);

		$this->db->where('email', $old_email);

		$this->db->update('department', $data);

		$ipdepartment = $d['depip'];

		foreach ($ipdepartment as $keyip => $iprow) {

			$this->db->where('dprt_id', $keyip);

			$query = $this->db->get('department');

			$result = $query->result();

			$data = array(

				'mobile' => $d['mobile'],

				'alternate_mobile' => $d['alternate_mobile'],

				'alternate_email' => $d['alternate_email'],

				'email' => $d['email'],

				'pname' => $d['name'],

			);

			$this->db->where('type', 'inpatient');

			$this->db->where('description', $result[0]->description);

			$this->db->update('department', $data);
		}



		$opdepartment = $d['depop'];

		foreach ($opdepartment as $keyip => $iprow) {

			$this->db->where('dprt_id', $keyip);

			$query = $this->db->get('department');

			$result = $query->result();

			$data = array(

				'mobile' => $d['mobile'],

				'alternate_mobile' => $d['alternate_mobile'],

				'alternate_email' => $d['alternate_email'],

				'email' => $d['email'],

				'pname' => $d['name'],

			);

			$this->db->where('type', 'outpatient');

			$this->db->where('description', $result[0]->description);

			$this->db->update('department', $data);
		}



		$indepartment = $d['depin'];

		foreach ($indepartment as $keyip => $iprow) {

			$this->db->where('dprt_id', $keyip);

			$query = $this->db->get('department');

			$result = $query->result();

			$data = array(

				'mobile' => $d['mobile'],

				'alternate_mobile' => $d['alternate_mobile'],

				'alternate_email' => $d['alternate_email'],

				'email' => $d['email'],

				'pname' => $d['name'],

			);

			$this->db->where('type', 'interim');

			$this->db->where('description', $result[0]->description);

			$this->db->update('department', $data);
		}



		$psrdepartment = $d['deppsr'];

		foreach ($psrdepartment as $keyip => $iprow) {

			$this->db->where('dprt_id', $keyip);

			$query = $this->db->get('department');

			$result = $query->result();

			$data = array(

				'mobile' => $d['mobile'],

				'alternate_mobile' => $d['alternate_mobile'],

				'alternate_email' => $d['alternate_email'],

				'email' => $d['email'],

				'pname' => $d['name'],

			);

			$this->db->where('type', 'service');

			$this->db->where('description', $result[0]->description);

			$this->db->update('department', $data);
		}



		$esrdepartment = $d['depesr'];

		foreach ($esrdepartment as $keyip => $iprow) {

			$this->db->where('dprt_id', $keyip);

			$query = $this->db->get('department');

			$result = $query->result();

			$data = array(

				'mobile' => $d['mobile'],

				'alternate_mobile' => $d['alternate_mobile'],

				'alternate_email' => $d['alternate_email'],

				'email' => $d['email'],

				'pname' => $d['name'],

			);

			$this->db->where('type', 'esr');

			$this->db->where('description', $result[0]->description);

			$this->db->update('department', $data);
		}



		// --

		$gridepartment = $d['depgrievance'];

		foreach ($gridepartment as $keyip => $iprow) {

			$this->db->where('dprt_id', $keyip);

			$query = $this->db->get('department');

			$result = $query->result();

			$data = array(

				'mobile' => $d['mobile'],

				'alternate_mobile' => $d['alternate_mobile'],

				'alternate_email' => $d['alternate_email'],

				'email' => $d['email'],

				'pname' => $d['name'],

			);

			$this->db->where('type', 'grievance');

			$this->db->where('description', $result[0]->description);

			$this->db->update('department', $data);
		}

		// --



		$adfdepartment = $d['depadf'];

		foreach ($adfdepartment as $keyadf => $adfrow) {

			$this->db->where('dprt_id', $keyadf);

			$query = $this->db->get('department');

			$result = $query->result();

			$data = array(

				'mobile' => $d['mobile'],

				'alternate_mobile' => $d['alternate_mobile'],

				'alternate_email' => $d['alternate_email'],

				'email' => $d['email'],

				'pname' => $d['name'],

			);

			$this->db->where('type', 'adf');

			$this->db->where('description', $result[0]->description);

			$this->db->update('department', $data);
		}





		$empexdepartment = $d['depempex'];

		foreach ($empexdepartment as $keyip => $iprow) {

			$this->db->where('dprt_id', $keyip);

			$query = $this->db->get('department');

			$result = $query->result();

			$data = array(

				'mobile' => $d['mobile'],

				'alternate_mobile' => $d['alternate_mobile'],

				'alternate_email' => $d['alternate_email'],

				'email' => $d['email'],

				'pname' => $d['name'],

			);

			$this->db->where('type', 'employees');

			$this->db->where('description', $result[0]->description);

			$this->db->update('department', $data);
		}





		$incidepartment = $d['depinci'];

		foreach ($incidepartment as $keyip => $iprow) {

			$this->db->where('dprt_id', $keyip);

			$query = $this->db->get('department');

			$result = $query->result();

			$data = array(

				'mobile' => $d['mobile'],

				'alternate_mobile' => $d['alternate_mobile'],

				'alternate_email' => $d['alternate_email'],

				'email' => $d['email'],

				'pname' => $d['name'],

			);

			$this->db->where('type', 'incident');

			$this->db->where('description', $result[0]->description);

			$this->db->update('department', $data);
		}

		return true;
	}



	public function delete($dprt_id = null)

	{



		$user = $this->db->where('user_id', $dprt_id)->get($this->table)->result();

		$old_email = $user[0]->email;



		$data = array(

			'mobile' => '',

			'alternate_email' => '',

			'alternate_mobile' => '',

			'email' => '',

			'pname' => ''

		);

		$this->db->where('email', $old_email);

		$this->db->update('department', $data);

		$this->db->where('user_id', $dprt_id)->delete($this->table);



		if ($this->db->affected_rows()) {

			return true;
		} else {

			return false;
		}
	}

	public function update_email_status($dprt_id)
	{
		$user = $this->db->where('user_id', $dprt_id)->get($this->table)->result();

		if (empty($user)) {
			return false; // No user found
		}

		$admin = $user[0]->user_role;
		$data = array();

		switch ($admin) {
			case 2:
				$data['admin_email'] = '0';
				break;
			case 3:
				$data['admin_email'] = '0';
				break;
			case 4:
				$data['departmenthead_email'] = '0';
				break;
			case 8:
				$data['patient_coordinator_email'] = '0';
				break;
			default:
				return false; // Invalid user role
		}

		$this->db->where('user_id', $dprt_id);
		return $this->db->update('user', $data);
	}

	public function update_sms_status($dprt_id)
	{
		$user = $this->db->where('user_id', $dprt_id)->get($this->table)->result();

		if (empty($user)) {
			return false; // No user found
		}

		$admin = $user[0]->user_role;
		$data = array();

		switch ($admin) {
			case 2:
				$data['message_alert'] = '0';
				break;
			case 3:
				$data['message_alert'] = '0';
				break;
			case 4:
				$data['message_alert'] = '0';
				break;
			case 8:
				$data['message_alert'] = '0';
				break;
			default:
				return false; // Invalid user role
		}

		$this->db->where('user_id', $dprt_id);
		return $this->db->update('user', $data);
	}


	public function update_whatsapp_status($dprt_id)
	{
		$user = $this->db->where('user_id', $dprt_id)->get($this->table)->result();

		if (empty($user)) {
			return false; // No user found
		}

		$admin = $user[0]->user_role;
		$data = array();

		switch ($admin) {
			case 2:
				$data['whatsapp_alert'] = '0';
				break;
			case 3:
				$data['whatsapp_alert'] = '0';
				break;
			case 4:
				$data['whatsapp_alert'] = '0';
				break;
			case 8:
				$data['whatsapp_alert'] = '0';
				break;
			default:
				return false; // Invalid user role
		}

		$this->db->where('user_id', $dprt_id);
		return $this->db->update('user', $data);
	}

	public function role_delete($dprt_id = null)

	{

		$this->db->where('role_id', $dprt_id)->delete($this->table2);



		if ($this->db->affected_rows()) {

			return true;
		} else {

			return false;
		}
	}



	public function department_list($dep)

	{

		$result = $this->db->select("*")

			->from('department')

			->where('type', $dep)

			->group_by('description')

			->get()

			->result();



		return $result;
	}





	public function role_list()

	{

		$result = $this->db

			->select("*")

			->from('roles')

			->order_by('role_id', 'asc') // or 'desc' for descending order

			->get()

			->result();



		return $result;
	}



	public function role_permission($role)

	{

		// $this->db->where('R.role_id', $userRole);

		// $this->db->select('R.*,F.feature_name,M.module_name,S.section_name');

		// $this->db->from('role_permissions as R');

		// $this->db->join('features as F','F.feature_id = R.feature_id');

		// $this->db->join('modules as M','M.module_id = R.module');

		// $this->db->join('sections as S','S.section_id = R.section');

		// $query = $this->db->get();



		$this->db->from('role_permissions as R');

		$this->db->where('R.role_id', $role);

		$query = $this->db->get();

		$role_permission = $query->result();

		$active_role_permission = [];

		foreach ($role_permission as $role) {

			$active_role_permission[$role->feature_id] = $role->status;
		}

		//echo '<pre>';
		$this->db->from('features as F');
		$this->db->select('F.*, M.description, S.section_name, S.section_type,M.module_id');
		$this->db->join('sections as S', 'S.section_id = F.section_id');
		$this->db->join('modules as M', 'M.module_id = S.module_id');
		$this->db->where('M.display', 1); // Add this line to filter by display column
		$this->db->where('F.display', 1); // Add this line to filter by display column
		$this->db->where('S.display', 1); // Add this line to filter by display column
		$this->db->order_by('M.showid');  // Add this line to order by module_id
		$query = $this->db->get();

		$permissionList = $query->result();



		$groupedPermissions = [];



		foreach ($permissionList as $permission) {

			$module = $permission->description;

			$section = $permission->section_name;



			if (!isset($groupedPermissions[$module][$section])) {

				$groupedPermissions[$module][$section] = [];
			}



			$groupedPermissions[$module][$section][] = [

				'feature_name' => $permission->feature_name,
				'feature_description' => $permission->feature_description,
				'feature_tooltip' => $permission->feature_tooltip,

				'feature_id' => $permission->feature_id,
				'section_id' => $permission->section_id,
				'module_id' => $permission->module_id,
				'section_type' => $permission->section_type,

				'status' => ($active_role_permission[$permission->feature_id] == 1) ? true : false,

			];
		}

		// print_r($groupedPermissions);

		// echo $role; exit;

		return $groupedPermissions;
	}



	public function user_permission($user_id, $role_id)

	{

		$this->db->from('user_permissions as UP');

		$this->db->where('UP.user_id', $user_id);

		$query = $this->db->get();

		$user_permission = $query->result();
		if (count($user_permission) == 0) {
			$this->db->from('role_permissions as R');

			$this->db->where('R.role_id', $role_id);

			$query = $this->db->get();

			$user_permission = $query->result();
		}

		$active_role_permission = [];

		foreach ($user_permission as $role) {

			$active_user_permission[$role->feature_id] = $role->status;
		}

		//echo '<pre>';

		$this->db->from('features as F');
		$this->db->select('F.*, M.description, S.section_name, S.section_type,M.module_id');
		$this->db->join('sections as S', 'S.section_id = F.section_id');
		$this->db->join('modules as M', 'M.module_id = S.module_id');
		$this->db->where('M.display', 1); // Add this line to filter by display column
		$this->db->where('F.display', 1); // Add this line to filter by display column
		$this->db->where('S.display', 1); // Add this line to filter by display column
		//$this->db->order_by('M.showid');  // Add this line to order by module_id
		$this->db->order_by('F.sort_order');  // new line to sort by feature

		$query = $this->db->get();
		$permissionList = $query->result();



		$groupedPermissions = [];


		foreach ($permissionList as $permission) {

			$module = $permission->description;

			$section = $permission->section_name;

			if (!isset($groupedPermissions[$module][$section])) {

				$groupedPermissions[$module][$section] = [];
			}


			$groupedPermissions[$module][$section][] = [

				'feature_name' => $permission->feature_name,
				'feature_description' => $permission->feature_description,
				'feature_tooltip' => $permission->feature_tooltip,
				'feature_id' => $permission->feature_id,
				'section_id' => $permission->section_id,
				'module_id' => $permission->module_id,
				'section_type' => $permission->section_type,
				'sort_order' => $permission->sort_order, // new one
				'status' => ($active_user_permission[$permission->feature_id] == 1) ? true : false,

			];
		}


		foreach ($groupedPermissions as $module => &$sections) {
			foreach ($sections as $section => &$features) {
				usort($features, function ($a, $b) {
					return $a['sort_order'] <=> $b['sort_order'];
				});
			}
		}



		return $groupedPermissions;
	}



	public function save_role_permission($NewPermission, $role)

	{

		$this->db->from('features as F');

		$this->db->join('sections as S', 'S.section_id = F.section_id');

		$this->db->select('F.*,S.module_id');



		$query = $this->db->get();

		$permissionList = $query->result();

		foreach ($permissionList  as $permission) {

			$status = 0;

			if (isset($NewPermission[$permission->feature_id])) {

				$status = 1;
			}

			$this->db->where('role_id', $role);

			$this->db->where('feature_id', $permission->feature_id);

			$query = $this->db->get('role_permissions');

			$result = $query->result();

			if (count($result) > 0) {

				$set = array('status' => $status);

				$this->db->where('role_id', $role);

				$this->db->where('feature_id', $permission->feature_id);

				$this->db->update('role_permissions', $set);
			} else {

				$set = array(

					'status' => $status,

					'role_id' => $role,

					'feature_id' => $permission->feature_id,

					'section' => $permission->section_id,

					'module' => $permission->module_id,



				);

				$this->db->insert('role_permissions', $set);
			}
		}

		return true;
	}



	public function save_user_permission($NewPermission, $floor_ward, $floor_ward_esr, $floor_asset, $speciality_op, $department, $user_id)
	{
		if ($NewPermission !== null) {
			// Get all features with their module + section
			$this->db->from('features as F');
			$this->db->join('sections as S', 'S.section_id = F.section_id');
			$this->db->select('F.*,S.module_id');
			$query = $this->db->get();
			$permissionList = $query->result();

			foreach ($permissionList as $permission) {
				$status = 0;
				if (isset($NewPermission[$permission->feature_id])) {
					$status = 1;
				}

				$this->db->where('user_id', $user_id);
				$this->db->where('feature_id', $permission->feature_id);
				$query = $this->db->get('user_permissions');
				$result = $query->result();

				if (count($result) > 0) {
					$set = ['status' => $status];
					$this->db->where('user_id', $user_id);
					$this->db->where('feature_id', $permission->feature_id);
					$this->db->update('user_permissions', $set);
				} else {
					$set = [
						'status'     => $status,
						'user_id'    => $user_id,
						'feature_id' => $permission->feature_id,
						'section'    => $permission->section_id,
						'module'     => $permission->module_id,
					];
					$this->db->insert('user_permissions', $set);
				}
			}
		}

		$data = [];
		if ($floor_ward !== null) {
			$data['floor_ward'] = json_encode($floor_ward);
		}
		if ($floor_ward_esr !== null) {
			$data['floor_ward_esr'] = json_encode($floor_ward_esr);
		}
		if ($speciality_op !== null) {
			$data['speciality_op'] = json_encode($speciality_op);
		}
		if ($floor_asset !== null) {
			$data['floor_asset'] = json_encode($floor_asset);
		}
		if ($department !== null) {
			$data['department'] = json_encode($department);
		}
		if (!empty($data)) {
			$this->db->where('user_id', $user_id)->update('user', $data);
		}

		// Sync custodians to bf_audit_frequency

		// Map department title → feature_name
		$title_to_feature = [
			'Active Cases MRD Audit-IP' => 'AUDIT-FORM1',
			'Discharged Patients MRD Audit' => 'AUDIT-FORM2',
			'Nursing (IP Closed Cases)' => 'AUDIT-FORM3',
			'Nursing (IP Open Cases)' => 'AUDIT-FORM4',
			'Nursing (OP Closed Cases)' => 'AUDIT-FORM5',
			'Clinical Dietetics (Active)' => 'AUDIT-FORM6',
			'Clinical Dietetics (Closed Cases)' => 'AUDIT-FORM7',
			'Clinical Pharmacy-(Closed)' => 'AUDIT-FORM8',
			'Clinical Pharmacy-(OP)' => 'AUDIT-FORM9',
			'Clinical Pharmacy-(Open)' => 'AUDIT-FORM10',
			'Clinicians-Anesthesia(Active)' => 'AUDIT-FORM11',
			'Clinicians-Anesthesia(Closed)' => 'AUDIT-FORM12',
			'Clinicians-ED (Active)' => 'AUDIT-FORM13',
			'Clinicians-ED (Closed)' => 'AUDIT-FORM14',
			'Clinicians-ICU (Active)' => 'AUDIT-FORM15',
			'Clinicians-ICU (Closed)' => 'AUDIT-FORM16',
			'Clinicians-Primary Care Provider (Active)' => 'AUDIT-FORM17',
			'Clinicians-Primary Care Provider (Closed)' => 'AUDIT-FORM18',
			'Clinicians-Sedation (Active)' => 'AUDIT-FORM19',
			'Clinicians-Sedation (Closed)' => 'AUDIT-FORM20',
			'Clinicians-Surgeons (Active)' => 'AUDIT-FORM21',
			'Clinicians-Surgeons (Closed)' => 'AUDIT-FORM22',
			'Diet Consultation (OP)' => 'AUDIT-FORM23',
			'Physiotherapy- (Closed)' => 'AUDIT-FORM24',
			'Physiotherapy- (OP)' => 'AUDIT-FORM25',
			'Physiotherapy- (Open)' => 'AUDIT-FORM26',
			'MRD Audit- ED' => 'AUDIT-FORM27',
			'MRD Audit- LAMA' => 'AUDIT-FORM28',
			'MRD Audit- OP' => 'AUDIT-FORM29',
			// 'Nursing & IPSG'
			'Accidental Delining Audit' => 'AUDIT-FORM30',
			'Admission Holding Area Audit' => 'AUDIT-FORM31',
			'CPR Analysis Record' => 'AUDIT-FORM32',
			'Extravasation Audit' => 'AUDIT-FORM33',
			'Hospital Acquired Pressure Ulcers (HAPU) Audit' => 'AUDIT-FORM34',
			'Initial Assessment Accident and Emergency (A&E)' => 'AUDIT-FORM35',
			'Initial Assessment IPD' => 'AUDIT-FORM36',
			'Initial Assessment OPD' => 'AUDIT-FORM37',
			'IPSG-1' => 'AUDIT-FORM38',
			'IPSG2- A&E' => 'AUDIT-FORM39',
			'IPSG2- IPD' => 'AUDIT-FORM40',
			'IPSG4-Timeout- Outside OT Audit' => 'AUDIT-FORM41',
			'IPSG6- IP' => 'AUDIT-FORM42',
			'IPSG6- OPD' => 'AUDIT-FORM43',
			'Point Prevalence Audit' => 'AUDIT-FORM44',

			// --- Clinical Outcome ---
			'ACL' => 'AUDIT-FORM45',
			'Allogenic Bone-marrow Transplantation' => 'AUDIT-FORM46',
			'Aortic Valve Replacement (AVR)' => 'AUDIT-FORM47',
			'Autologous Bone-marrow transplantation' => 'AUDIT-FORM48',
			'Brain Tumour Surgery' => 'AUDIT-FORM49',
			'CABG' => 'AUDIT-FORM50',
			'Carotid Stenting' => 'AUDIT-FORM51',
			'Chemotherapy (Medical oncology)' => 'AUDIT-FORM52',
			'Colo-Rectal Surgeries' => 'AUDIT-FORM53',
			'Endoscopy' => 'AUDIT-FORM54',
			'Epilepsy' => 'AUDIT-FORM55',
			'Herniorrhaphy' => 'AUDIT-FORM56',
			'HoLEP' => 'AUDIT-FORM57',
			'Laparoscopic Appendicectomy' => 'AUDIT-FORM58',
			'Mechanical Thrombectomy' => 'AUDIT-FORM59',
			'MVR (Mitral Valve replacement)' => 'AUDIT-FORM60',
			'PTCA' => 'AUDIT-FORM61',
			'Renal Transplantation' => 'AUDIT-FORM62',
			'Scoliosis correction surgery' => 'AUDIT-FORM63',
			'Spinal Dysraphism' => 'AUDIT-FORM64',
			'Spine and Disc Surgery-Fusion procedures' => 'AUDIT-FORM65',
			'Thoracotomy' => 'AUDIT-FORM66',
			'TKR' => 'AUDIT-FORM67',
			'Uro-oncology procedures' => 'AUDIT-FORM68',
			'Whipples Surgery' => 'AUDIT-FORM69',
			'Laparoscopic Cholecystectomy' => 'AUDIT-FORM70',

			// --- Clinical KPI ---
			'Bronchodilators Audit' => 'AUDIT-FORM71',
			'COPD Protocol Audit' => 'AUDIT-FORM72',

			// --- Infection Control & PCI ---
			'Biomedical Waste Management Audit' => 'AUDIT-FORM73',
			'Canteen Audit checklist' => 'AUDIT-FORM74',
			'CSSD audit checklist' => 'AUDIT-FORM75',
			'Hand Hygiene Audit' => 'AUDIT-FORM76',
			'Infection control bundle audit' => 'AUDIT-FORM77',
			'Infection Control OT audit checklist' => 'AUDIT-FORM78',
			'Linen Audit' => 'AUDIT-FORM79',
			'Ambulance PCI Audit' => 'AUDIT-FORM80',
			'CoffeeShop PCI Audit' => 'AUDIT-FORM81',
			'Laboratory PCI Audit' => 'AUDIT-FORM82',
			'Mortuary PCI Audit' => 'AUDIT-FORM83',
			'Radiology PCI Audit' => 'AUDIT-FORM84',
			'SSI Surveillance checklist' => 'AUDIT-FORM85',
			'IV cannula audit' => 'AUDIT-FORM86',
			'Personal Protective Equipment Usage audit' => 'AUDIT-FORM87',
			'Safe Injection and Infusion Audit' => 'AUDIT-FORM88',
			'Surface cleaning and disinfection effectiveness monitoring record' => 'AUDIT-FORM89',

			// --- Clinical Pathways ---
			'Arthroscopic Anterior Cruciate Ligament Reconstruction Surgery' => 'AUDIT-FORM90',
			'Breast Lump Consensus Guidelines' => 'AUDIT-FORM91',
			'Cardiac Arrest' => 'AUDIT-FORM92',
			'Donor Hepatectomy' => 'AUDIT-FORM93',
			'Febrile Seizure' => 'AUDIT-FORM94',
			'Heart Transplant Recipient' => 'AUDIT-FORM95',
			'Laparoscopic Donor Nephrectomy' => 'AUDIT-FORM96',
			'PICC LINE Insertion' => 'AUDIT-FORM97',
			'Stroke' => 'AUDIT-FORM98',
			'Urodynamics' => 'AUDIT-FORM99',
			'STEMI-Primary PCI Clinical Pathway' => 'AUDIT-FORM100',
		];

		// Get all audit departments
		$departments = $this->db->get('bf_audit_frequency')->result();

		foreach ($departments as $dept) {
			$current_feature = isset($title_to_feature[$dept->title]) ? $title_to_feature[$dept->title] : '';

			if ($current_feature) {
				// Get custodians: all users with permission for this feature
				$this->db->select('u.firstname');
				$this->db->from('user_permissions as up');
				$this->db->join('user as u', 'u.user_id = up.user_id');
				$this->db->join('features as f', 'f.feature_id = up.feature_id');
				$this->db->where('up.status', 1);
				$this->db->where('f.feature_name', $current_feature);
				$users = $this->db->get()->result();

				$custodians = [];
				foreach ($users as $u) {
					$custodians[] = htmlspecialchars($u->firstname, ENT_QUOTES, 'UTF-8');
				}

				$default_custodians = !empty($custodians) ? implode(', ', array_unique($custodians)) : 'No custodians assigned';

				// Update bf_audit_frequency
				$this->db->where('id', $dept->id)
					->update('bf_audit_frequency', ['bed_no' => $default_custodians]);
			}
		}

		return true;
	}




	public function role_create($data = [])

	{

		return $this->db->insert('roles', $data);
	}


	public function role_update($data = [])
	{
		return $this->db->where('role_id', $data['role_id'])
			->update($this->table2, $data);
	}
}
