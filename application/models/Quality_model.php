<?php defined('BASEPATH') or exit('No direct script access allowed');



class Quality_model extends CI_Model
{



	public function comm($table_patient, $table_feedback, $sorttime, $setup)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));

		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		$this->db->join($table_patient, $table_patient . '.id = ' . $table_feedback . '.pid', 'inner');

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		}

		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);

		$query = $this->db->get();
		$feedback = $query->result();

		$chosenSet = $this->input->get('set');
		$results = [];  // An array to store the results


		$this->db->select($setup . '.*');
		$this->db->where($setup . '.type', $chosenSet);
		$query = $this->db->get($setup);
		$sresult = $query->result();
		if ($chosenSet) {
			foreach ($sresult as $r) {
				$setarray[$r->type] = $r->title;
				$questionarray[$r->shortkey] = $r->shortkey;
				$shortname[$r->shortkey] = $r->shortname;
			}
		}
		// }


		foreach ($feedback as $row) {
			$param = json_decode($row->dataset, true);

			if (isset($chosenSet) && isset($param['comment'][$chosenSet])) {
				// $commentData[$chosenSet] = $param['comment'][$chosenSet];
				$commentData['feedbackid'] = $row->id;
				$commentData['datetime'] = $param['datetime'];
				$commentData['name'] = $param['name'];
				$commentData['patientid'] = $param['patientid'];
				$commentData['contactnumber'] = $param['contactnumber'];
				$commentData['avg_rating'] = $param['overallScore'];
				$commentData['nps_score'] = $param['recommend1Score'];
				$commentData['ovr_com'] = $param['suggestionText'];
				foreach ($setarray as $key => $t) {
					if ($param['comment'][$key]) {
						$commentData['comment'] = $param['comment'][$key];
						// $dataexport[$i]['reason'] = $data;
					}
				}
				foreach ($questionarray as $key => $t3) {
					if ($param['reason'][$key]) {
						$commentData['reason'][] = $shortname[$key];
					}
				}
				// $commentData['name'] = $param['name'];
				$results[] = $commentData;
			} elseif (!isset($chosenSet)) {
				$commentData['feedbackid'] = $row->id;

				$commentData['datetime'] = $param['datetime'];
				$commentData['name'] = $param['name'];
				$commentData['patientid'] = $param['patientid'];
				$commentData['contactnumber'] = $param['contactnumber'];
				$commentData['avg_rating'] = $param['overallScore'];
				$commentData['nps_score'] = $param['recommend1Score'] * 2;
				$commentData['ovr_com'] = $param['suggestionText'];
				$results[] = $commentData;
			} else {
				continue; // Skip this iteration if the set is chosen but the comment doesn't exist for it
			}



			// $results[] = $commentData;
		}
		// print_r($results);
		return $results;
	}

	// public function negative_selection($table_patients, $table_feedback, $sorttime, $setup)
	// {
	// 	$question_list_reasons = $this->setup_sub_result($setup);
	// 	$feedback_data = $this->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
	// 	$set1 = array();
	// 	foreach ($question_list_reasons as $row2) {
	// 		$set1[$row2->type][$row2->shortkey]['checkbox_param'] = $row2->shortname;
	// 		$set1[$row2->type][$row2->shortkey]['checkbox_param_count'] = $this->get_feedback_for_reason($row2->shortkey, $feedback_data);
	// 		// $set1[$row2->shortkey]['shortkey'] =  $row2->shortkey;
	// 		$res = $set1;
	// 	}

	// 	return $set1;

	// 	print_r($set1);
	// }



	public function update_feedback_2PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_2PSQ3a', $data);
	}
	public function update_feedback_3PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_3PSQ3a', $data);
	}
	public function update_feedback_4PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_4PSQ3a', $data);
	}
	public function update_feedback_5PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_5PSQ3a', $data);
	}
	public function update_feedback_6PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_6PSQ3a', $data);
	}
	public function update_feedback_7PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_7PSQ3a', $data);
	}
	public function update_feedback_8PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_8PSQ3a', $data);
	}
	public function update_feedback_9PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_9PSQ3a', $data);
	}
	public function update_feedback_10PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_10PSQ3a', $data);
	}
	public function update_feedback_11PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_11PSQ3a', $data);
	}
	public function update_feedback_12PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_12PSQ3a', $data);
	}

	public function update_feedback_13PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_13PSQ3b', $data);
	}
	public function update_feedback_14PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_14PSQ3b', $data);
	}
	public function update_feedback_15PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_15PSQ3b', $data);
	}
	public function update_feedback_16PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_16PSQ3b', $data);
	}
	public function update_feedback_17PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_17PSQ3b', $data);
	}


	public function update_feedback_18PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_18PSQ3b', $data);
	}
	public function update_feedback_19PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_19PSQ3c', $data);
	}
	public function update_feedback_20PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_20PSQ3c', $data);
	}
	public function update_feedback_21PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_21PSQ3c', $data);
	}
	public function update_feedback_21aPSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_21aPSQ3c', $data);
	}
	public function update_feedback_22PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_22PSQ3c', $data);
	}

	public function update_feedback_23PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_23PSQ4c', $data);
	}
	public function update_feedback_23aPSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_23aPSQ4c', $data);
	}
	public function update_feedback_23bPSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_23bPSQ4c', $data);
	}
	public function update_feedback_23cPSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_23cPSQ4c', $data);
	}
	public function update_feedback_23dPSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('	bf_feedback_23dPSQ4c', $data);
	}


	public function update_feedback_24PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_24PSQ4c', $data);
	}
	public function update_feedback_25PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_25PSQ4c', $data);
	}
	public function update_feedback_26PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_26PSQ4c', $data);
	}
	public function update_feedback_27PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_27PSQ4d', $data);
	}
	public function update_feedback_28PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_28PSQ4d', $data);
	}


	public function update_feedback_29PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_29PSQ4d', $data);
	}
	public function update_feedback_30PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_30PSQ3d', $data);
	}
	public function update_feedback_31PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_31PSQ3d', $data);
	}
	public function update_feedback_32PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_32PSQ3d', $data);
	}
	public function update_feedback_PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_PSQ3a', $data);
	}

	public function update_feedback_33PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_33PSQ3a', $data);
	}

	public function update_feedback_34PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_34PSQ3a', $data);
	}

	public function update_feedback_35PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_35PSQ3a', $data);
	}

	public function update_feedback_36PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_36PSQ3a', $data);
	}

	public function update_feedback_37PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_37PSQ3a', $data);
	}

	public function update_feedback_38PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_38PSQ3a', $data);
	}

	public function update_feedback_39PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_39PSQ3a', $data);
	}

	public function update_feedback_40PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_40PSQ3a', $data);
	}

	public function update_feedback_41PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_41PSQ3a', $data);
	}

	public function update_feedback_42PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_42PSQ3a', $data);
	}

	public function update_feedback_43PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_43PSQ3a', $data);
	}

	public function update_feedback_44PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_44PSQ3a', $data);
	}

	public function update_feedback_45PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_45PSQ3a', $data);
	}

	public function update_feedback_46PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_46PSQ3a', $data);
	}

	public function update_feedback_47PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_47PSQ3a', $data);
	}

	public function update_feedback_48PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_48PSQ3a', $data);
	}

	public function update_feedback_49PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_49PSQ3a', $data);
	}

	public function update_feedback_50PSQ3a($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_50PSQ3a', $data);
	}

	//update function

	public function update_feedback_CQI3a1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a1', $data);
	}
	public function update_feedback_CQI3a2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a2', $data);
	}

	public function update_feedback_CQI3a3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a3', $data);
	}

	public function update_feedback_CQI3a4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a4', $data);
	}

	public function update_feedback_CQI3a5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a5', $data);
	}

	public function update_feedback_CQI3a6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a6', $data);
	}

	public function update_feedback_CQI3a7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a7', $data);
	}

	public function update_feedback_CQI3a8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a8', $data);
	}

	public function update_feedback_CQI3a9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a9', $data);
	}

	public function update_feedback_CQI3a10($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a10', $data);
	}

	public function update_feedback_CQI3a11($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a11', $data);
	}

	public function update_feedback_CQI3a12($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a12', $data);
	}

	public function update_feedback_CQI3a13($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a13', $data);
	}

	public function update_feedback_CQI3a14($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a14', $data);
	}

	public function update_feedback_CQI3a15($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a15', $data);
	}

	public function update_feedback_CQI3a16($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a16', $data);
	}

	public function update_feedback_CQI3a17($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a17', $data);
	}

	public function update_feedback_CQI3a18($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a18', $data);
	}

	public function update_feedback_CQI3a19($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a19', $data);
	}

	public function update_feedback_CQI3a20($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a20', $data);
	}

	public function update_feedback_CQI3a21($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a21', $data);
	}

	public function update_feedback_CQI3a22($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3a22', $data);
	}

	public function update_feedback_CQI3b1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b1', $data);
	}

	public function update_feedback_CQI3b2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b2', $data);
	}

	public function update_feedback_CQI3b3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b3', $data);
	}

	public function update_feedback_CQI3b4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b4', $data);
	}

	public function update_feedback_CQI3b5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b5', $data);
	}

	public function update_feedback_CQI3b6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b6', $data);
	}

	public function update_feedback_CQI3b7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b7', $data);
	}

	public function update_feedback_CQI3b8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b8', $data);
	}

	public function update_feedback_CQI3b9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b9', $data);
	}

	public function update_feedback_CQI3b10($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b10', $data);
	}

	public function update_feedback_CQI3b11($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b11', $data);
	}

	public function update_feedback_CQI3b12($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b12', $data);
	}

	public function update_feedback_CQI3b13($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3b13', $data);
	}
	// ---------------------------- Clinical Pharmacy ----------------------------

	public function update_feedback_CQI3c1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c1', $data);
	}

	public function update_feedback_CQI3c2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c2', $data);
	}

	public function update_feedback_CQI3c3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c3', $data);
	}

	public function update_feedback_CQI3c4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c4', $data);
	}

	public function update_feedback_CQI3c5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c5', $data);
	}

	public function update_feedback_CQI3c6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c6', $data);
	}

	public function update_feedback_CQI3c7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c7', $data);
	}

	public function update_feedback_CQI3c8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c8', $data);
	}

	public function update_feedback_CQI3c9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c9', $data);
	}

	public function update_feedback_CQI3c10($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c10', $data);
	}

	public function update_feedback_CQI3c11($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c11', $data);
	}

	public function update_feedback_CQI3c12($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c12', $data);
	}

	public function update_feedback_CQI3c13($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c13', $data);
	}

	public function update_feedback_CQI3c14($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3c14', $data);
	}

	// ---------------------------- OT - Anaesthesia ----------------------------

	public function update_feedback_CQI3d1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3d1', $data);
	}

	public function update_feedback_CQI3d2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3d2', $data);
	}

	public function update_feedback_CQI3d3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3d3', $data);
	}

	public function update_feedback_CQI3d4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3d4', $data);
	}

	public function update_feedback_CQI3d5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3d5', $data);
	}

	// ---------------------------- OT & Surgery ----------------------------

	public function update_feedback_CQI3e1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3e1', $data);
	}

	public function update_feedback_CQI3e2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3e2', $data);
	}

	public function update_feedback_CQI3e3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3e3', $data);
	}

	public function update_feedback_CQI3e4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3e4', $data);
	}

	public function update_feedback_CQI3e5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3e5', $data);
	}

	public function update_feedback_CQI3e6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3e6', $data);
	}

	public function update_feedback_CQI3e7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3e7', $data);
	}

	public function update_feedback_CQI3e8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3e8', $data);
	}

	public function update_feedback_CQI3e9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3e9', $data);
	}

	// ---------------------------- Blood Center ----------------------------

	public function update_feedback_CQI3f1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f1', $data);
	}

	public function update_feedback_CQI3f2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f2', $data);
	}

	public function update_feedback_CQI3f3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f3', $data);
	}

	public function update_feedback_CQI3f4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f4', $data);
	}

	public function update_feedback_CQI3f5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f5', $data);
	}

	public function update_feedback_CQI3f6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f6', $data);
	}

	public function update_feedback_CQI3f7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f7', $data);
	}

	public function update_feedback_CQI3f8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f8', $data);
	}

	public function update_feedback_CQI3f9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f9', $data);
	}

	public function update_feedback_CQI3f10($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3f10', $data);
	}

	// ---------------------------- Infection Control / Nursing ----------------------------

	public function update_feedback_CQI3g1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3g1', $data);
	}

	public function update_feedback_CQI3g2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3g2', $data);
	}

	public function update_feedback_CQI3g3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3g3', $data);
	}

	public function update_feedback_CQI3g4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3g4', $data);
	}

	public function update_feedback_CQI3g5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3g5', $data);
	}

	public function update_feedback_CQI3g6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3g6', $data);
	}

	// ---------------------------- MRD & ICU ----------------------------

	public function update_feedback_CQI3h1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3h1', $data);
	}

	public function update_feedback_CQI3h2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3h2', $data);
	}

	public function update_feedback_CQI3h3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3h3', $data);
	}

	public function update_feedback_CQI3h4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3h4', $data);
	}

	public function update_feedback_CQI3h5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3h5', $data);
	}

	public function update_feedback_CQI3h6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3h6', $data);
	}

	public function update_feedback_CQI3h7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3h7', $data);
	}

	public function update_feedback_CQI3h8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3h8', $data);
	}

	public function update_feedback_CQI3h9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3h9', $data);
	}
	public function update_feedback_CQI3j1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j1', $data);
	}

	public function update_feedback_CQI3j2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j2', $data);
	}

	public function update_feedback_CQI3j3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j3', $data);
	}

	public function update_feedback_CQI3j4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j4', $data);
	}

	public function update_feedback_CQI3j5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j5', $data);
	}

	public function update_feedback_CQI3j6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j6', $data);
	}

	public function update_feedback_CQI3j7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j7', $data);
	}

	public function update_feedback_CQI3j8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j8', $data);
	}

	public function update_feedback_CQI3j9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j9', $data);
	}

	public function update_feedback_CQI3j10($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j10', $data);
	}

	public function update_feedback_CQI3j11($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j11', $data);
	}

	public function update_feedback_CQI3j12($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j12', $data);
	}

	public function update_feedback_CQI3j13($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j13', $data);
	}

	public function update_feedback_CQI3j14($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j14', $data);
	}

	public function update_feedback_CQI3j15($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j15', $data);
	}

	public function update_feedback_CQI3j16($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j16', $data);
	}

	public function update_feedback_CQI3j17($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j17', $data);
	}

	public function update_feedback_CQI3j18($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j18', $data);
	}

	public function update_feedback_CQI3j19($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j19', $data);
	}

	public function update_feedback_CQI3j20($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j20', $data);
	}

	public function update_feedback_CQI3j21($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j21', $data);
	}

	public function update_feedback_CQI3j22($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j22', $data);
	}

	public function update_feedback_CQI3j23($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j23', $data);
	}

	public function update_feedback_CQI3j24($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j24', $data);
	}
	public function update_feedback_CQI3j25($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j25', $data);
	}

	public function update_feedback_CQI3j26($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j26', $data);
	}

	public function update_feedback_CQI3j27($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j27', $data);
	}

	public function update_feedback_CQI3j28($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j28', $data);
	}

	public function update_feedback_CQI3j29($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j29', $data);
	}

	public function update_feedback_CQI3j30($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j30', $data);
	}

	public function update_feedback_CQI3j31($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j31', $data);
	}

	public function update_feedback_CQI3j32($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j32', $data);
	}

	public function update_feedback_CQI3j33($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j33', $data);
	}

	public function update_feedback_CQI3j34($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3j34', $data);
	}

	public function update_feedback_CQI4a1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4a1', $data);
	}

	public function update_feedback_CQI4a2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4a2', $data);
	}

	public function update_feedback_CQI4a3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4a3', $data);
	}

	public function update_feedback_CQI4a4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4a4', $data);
	}

	public function update_feedback_CQI4a5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4a5', $data);
	}

	public function update_feedback_CQI4b1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4b1', $data);
	}

	public function update_feedback_CQI4b2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4b2', $data);
	}

	public function update_feedback_CQI4b3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4b3', $data);
	}

	public function update_feedback_CQI4b4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4b4', $data);
	}

	public function update_feedback_CQI4b5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4b5', $data);
	}

	public function update_feedback_CQI4b6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4b6', $data);
	}

	public function update_feedback_CQI4b7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4b7', $data);
	}

	public function update_feedback_CQI4b8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4b8', $data);
	}
	public function update_feedback_CQI4c1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c1', $data);
	}

	public function update_feedback_CQI4c2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c2', $data);
	}

	public function update_feedback_CQI4c3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c3', $data);
	}

	public function update_feedback_CQI4c4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c4', $data);
	}

	public function update_feedback_CQI4c5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c5', $data);
	}

	public function update_feedback_CQI4c6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c6', $data);
	}

	public function update_feedback_CQI4c7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c7', $data);
	}

	public function update_feedback_CQI4c8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c8', $data);
	}

	public function update_feedback_CQI4c9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c9', $data);
	}

	public function update_feedback_CQI4c10($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c10', $data);
	}

	public function update_feedback_CQI4c11($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c11', $data);
	}

	public function update_feedback_CQI4c12($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c12', $data);
	}

	public function update_feedback_CQI4c13($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c13', $data);
	}

	public function update_feedback_CQI4c14($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4c14', $data);
	}

	public function update_feedback_CQI4d1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d1', $data);
	}

	public function update_feedback_CQI4d2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d2', $data);
	}

	public function update_feedback_CQI4d3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d3', $data);
	}

	public function update_feedback_CQI4d4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d4', $data);
	}

	public function update_feedback_CQI4d5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d5', $data);
	}

	public function update_feedback_CQI4d6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d6', $data);
	}

	public function update_feedback_CQI4d7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d7', $data);
	}

	public function update_feedback_CQI4d8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d8', $data);
	}

	public function update_feedback_CQI4d9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d9', $data);
	}

	public function update_feedback_CQI4d10($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d10', $data);
	}

	public function update_feedback_CQI4d11($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4d11', $data);
	}
	// ========================== CQI4e Series ==========================
	public function update_feedback_CQI4e1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4e1', $data);
	}

	public function update_feedback_CQI4e2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4e2', $data);
	}

	public function update_feedback_CQI4e3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4e3', $data);
	}

	public function update_feedback_CQI4e4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4e4', $data);
	}

	public function update_feedback_CQI4e5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4e5', $data);
	}

	public function update_feedback_CQI4e6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4e6', $data);
	}

	public function update_feedback_CQI4e7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4e7', $data);
	}

	public function update_feedback_CQI4e8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4e8', $data);
	}

	// ========================== CQI4f Series ==========================
	public function update_feedback_CQI4f1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4f1', $data);
	}

	public function update_feedback_CQI4f2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4f2', $data);
	}

	public function update_feedback_CQI4f3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4f3', $data);
	}

	public function update_feedback_CQI4f4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4f4', $data);
	}

	public function update_feedback_CQI4f5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4f5', $data);
	}

	public function update_feedback_CQI4f6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4f6', $data);
	}

	public function update_feedback_CQI4f7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4f7', $data);
	}

	// ========================== CQI4g Series ==========================
	public function update_feedback_CQI4g1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4g1', $data);
	}

	public function update_feedback_CQI4g2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4g2', $data);
	}

	public function update_feedback_CQI4g3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4g3', $data);
	}

	public function update_feedback_CQI4g4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4g4', $data);
	}

	public function update_feedback_CQI4g5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4g5', $data);
	}

	public function update_feedback_CQI4g6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI4g6', $data);
	}
	// ========================== CQI3k Series ==========================
	public function update_feedback_CQI3k1($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k1', $data);
	}

	public function update_feedback_CQI3k2($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k2', $data);
	}

	public function update_feedback_CQI3k3($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k3', $data);
	}

	public function update_feedback_CQI3k4($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k4', $data);
	}

	public function update_feedback_CQI3k5($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k5', $data);
	}

	public function update_feedback_CQI3k6($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k6', $data);
	}

	public function update_feedback_CQI3k7($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k7', $data);
	}

	public function update_feedback_CQI3k8($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k8', $data);
	}

	public function update_feedback_CQI3k9($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k9', $data);
	}

	public function update_feedback_CQI3k10($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k10', $data);
	}

	public function update_feedback_CQI3k11($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k11', $data);
	}

	public function update_feedback_CQI3k12($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k12', $data);
	}

	public function update_feedback_CQI3k13($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k13', $data);
	}

	public function update_feedback_CQI3k14($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k14', $data);
	}

	public function update_feedback_CQI3k15($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k15', $data);
	}

	public function update_feedback_CQI3k16($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k16', $data);
	}

	public function update_feedback_CQI3k17($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k17', $data);
	}

	public function update_feedback_CQI3k18($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k18', $data);
	}

	public function update_feedback_CQI3k19($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k19', $data);
	}

	public function update_feedback_CQI3k20($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k20', $data);
	}

	public function update_feedback_CQI3k21($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k21', $data);
	}

	public function update_feedback_CQI3k22($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k22', $data);
	}

	public function update_feedback_CQI3k23($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k23', $data);
	}

	public function update_feedback_CQI3k24($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k24', $data);
	}

	public function update_feedback_CQI3k25($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k25', $data);
	}

	public function update_feedback_CQI3k26($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k26', $data);
	}

	public function update_feedback_CQI3k27($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k27', $data);
	}

	public function update_feedback_CQI3k28($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k28', $data);
	}

	public function update_feedback_CQI3k29($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k29', $data);
	}

	public function update_feedback_CQI3k30($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k30', $data);
	}

	public function update_feedback_CQI3k31($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k31', $data);
	}

	public function update_feedback_CQI3k32($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k32', $data);
	}

	public function update_feedback_CQI3k33($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k33', $data);
	}

	public function update_feedback_CQI3k34($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k34', $data);
	}

	public function update_feedback_CQI3k35($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k35', $data);
	}

	public function update_feedback_CQI3k36($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k36', $data);
	}

	public function update_feedback_CQI3k37($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k37', $data);
	}

	public function update_feedback_CQI3k38($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k38', $data);
	}

	public function update_feedback_CQI3k39($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k39', $data);
	}

	public function update_feedback_CQI3k40($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k40', $data);
	}

	public function update_feedback_CQI3k41($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k41', $data);
	}

	public function update_feedback_CQI3k42($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k42', $data);
	}

	public function update_feedback_CQI3k43($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k43', $data);
	}

	public function update_feedback_CQI3k44($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k44', $data);
	}

	public function update_feedback_CQI3k45($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k45', $data);
	}

	public function update_feedback_CQI3k46($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k46', $data);
	}

	public function update_feedback_CQI3k47($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k47', $data);
	}

	public function update_feedback_CQI3k48($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k48', $data);
	}

	public function update_feedback_CQI3k49($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k49', $data);
	}

	public function update_feedback_CQI3k50($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k50', $data);
	}

	public function update_feedback_CQI3k51($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k51', $data);
	}

	public function update_feedback_CQI3k52($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k52', $data);
	}

	public function update_feedback_CQI3k53($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k53', $data);
	}

	public function update_feedback_CQI3k54($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k54', $data);
	}

	public function update_feedback_CQI3k55($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k55', $data);
	}

	public function update_feedback_CQI3k56($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k56', $data);
	}

	public function update_feedback_CQI3k57($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k57', $data);
	}

	public function update_feedback_CQI3k58($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k58', $data);
	}

	public function update_feedback_CQI3k59($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k59', $data);
	}

	public function update_feedback_CQI3k60($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k60', $data);
	}

	public function update_feedback_CQI3k61($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k61', $data);
	}

	public function update_feedback_CQI3k62($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k62', $data);
	}

	public function update_feedback_CQI3k63($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k63', $data);
	}

	public function update_feedback_CQI3k64($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('bf_feedback_CQI3k64', $data);
	}
	










	// Get function
	public function get_feedback_CQI3a1_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a1'); // table name
		return $query->row(); // return single row as object
	}
	public function get_feedback_CQI3a2_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a2');
		return $query->row();
	}

	public function get_feedback_CQI3a3_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a3');
		return $query->row();
	}

	public function get_feedback_CQI3a4_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a4');
		return $query->row();
	}

	public function get_feedback_CQI3a5_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a5');
		return $query->row();
	}

	public function get_feedback_CQI3a6_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a6');
		return $query->row();
	}

	public function get_feedback_CQI3a7_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a7');
		return $query->row();
	}

	public function get_feedback_CQI3a8_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a8');
		return $query->row();
	}

	public function get_feedback_CQI3a9_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a9');
		return $query->row();
	}

	public function get_feedback_CQI3a10_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a10');
		return $query->row();
	}

	public function get_feedback_CQI3a11_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a11');
		return $query->row();
	}

	public function get_feedback_CQI3a12_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a12');
		return $query->row();
	}

	public function get_feedback_CQI3a13_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a13');
		return $query->row();
	}

	public function get_feedback_CQI3a14_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a14');
		return $query->row();
	}

	public function get_feedback_CQI3a15_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a15');
		return $query->row();
	}

	public function get_feedback_CQI3a16_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a16');
		return $query->row();
	}

	public function get_feedback_CQI3a17_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a17');
		return $query->row();
	}

	public function get_feedback_CQI3a18_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a18');
		return $query->row();
	}

	public function get_feedback_CQI3a19_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a19');
		return $query->row();
	}

	public function get_feedback_CQI3a20_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a20');
		return $query->row();
	}

	public function get_feedback_CQI3a21_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a21');
		return $query->row();
	}

	public function get_feedback_CQI3a22_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3a22');
		return $query->row();
	}

	public function get_feedback_CQI3b1_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b1');
		return $query->row();
	}

	public function get_feedback_CQI3b2_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b2');
		return $query->row();
	}

	public function get_feedback_CQI3b3_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b3');
		return $query->row();
	}

	public function get_feedback_CQI3b4_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b4');
		return $query->row();
	}

	public function get_feedback_CQI3b5_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b5');
		return $query->row();
	}

	public function get_feedback_CQI3b6_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b6');
		return $query->row();
	}

	public function get_feedback_CQI3b7_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b7');
		return $query->row();
	}

	public function get_feedback_CQI3b8_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b8');
		return $query->row();
	}

	public function get_feedback_CQI3b9_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b9');
		return $query->row();
	}

	public function get_feedback_CQI3b10_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b10');
		return $query->row();
	}

	public function get_feedback_CQI3b11_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b11');
		return $query->row();
	}

	public function get_feedback_CQI3b12_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b12');
		return $query->row();
	}

	public function get_feedback_CQI3b13_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('bf_feedback_CQI3b13');
		return $query->row();
	}









	public function process_feedback_data($table_patients, $table_feedback, $sorttime, $setup, $table_tickets)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$days = $_SESSION['days'];
		// $type = 'inpatient';
		$setarray = $questioarray = $arraydata = $dataexport  = array();
		$allfeeds = $this->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
		$sresult = $this->setup_result($setup);
		$question_list_reasons = $this->setup_sub_result($setup);
		$count_this_re = 0;
		foreach ($question_list_reasons as $subr) {
			$subsetarray[$subr->type] = $subr->title;
			$reason[$subr->shortkey] = $subr->shortname;
			$subset_key[$subr->shortkey] = $subr->type;
			$subquestioarray[$subr->type][$subr->shortkey] = $subr->shortname;
		}

		foreach ($subquestioarray as $setrsubr) {
			foreach ($setrsubr as $ksubr => $vsubr) {
				$subarraydata[$ksubr]['title'] = $vsubr;
			}
		}

		// $tickets = $this->tickets_recived_by_department($type, $table_feedback, $table_tickets);

		foreach ($sresult as $r) {
			$setarray[$r->type] = $r->title;
			$department_name[$r->shortkey] = $r->title;
			$set_key[$r->shortkey] = $r->type;
			$questioarray[$r->type][$r->shortkey] = $r->shortname;
		}

		foreach ($questioarray as $setr) {
			foreach ($setr as $k => $v) {
				$arraydata[$k]['title'] = $v;
			}
		}


		foreach ($allfeeds as $row) {
			$data = json_decode($row->dataset, true); // Decode the dataset JSON
			// asort($data); 
			// Determine the month based on the date
			if ($days > 10 && $days < 93) {
				$desdate = getStartAndEndDate($row->datetime, $fdate, $tdate);
				$mon = $desdate['week_start'] . '-' . $desdate['week_end'] . ' ' . $desdate['mon'];
			} elseif ($days <= 10) {
				$mon = date("d", strtotime($row->datetime)) . '-' . date("F", strtotime($row->datetime));
			} else {
				$mon = date("F", strtotime($row->datetime));
			}

			// Loop through the questions and process the data
			foreach ($arraydata as $k => $v) {
				if (isset($data[$k]) && $data[$k] * 1 > 0) {
					// If feedback is received
					$dataexport[$mon][$k]['check']++;
					$dataexport[$mon][$k]['received_feedback_score'] += isset($data[$k]) ? $data[$k] : 0;
					$dataexport[$mon][$k]['max_feedback_score'] += isset($data[$k]) ? $data[$k] * 5 : 0;

					// Calculate NPS components
					if (($data['recommend1Score'] * 2) > 8) {
						$dataexport[$mon][$k]['promoters_count']++;
					} elseif (($data['recommend1Score'] * 2) < 6) {
						$dataexport[$mon][$k]['detractor_count']++;
					} else {
						$dataexport[$mon][$k]['passives_count']++;
					}

					// Calculate rating counts
					if ($data[$k] == 1) {
						$dataexport[$mon][$k]['worst']++;
					} elseif ($data[$k] == 2) {
						$dataexport[$mon][$k]['poor']++;
					} elseif ($data[$k] == 3) {
						$dataexport[$mon][$k]['average']++; // fixed this line
					} elseif ($data[$k] == 4) {
						$dataexport[$mon][$k]['good']++;
					} else {
						$dataexport[$mon][$k]['excelent']++;
					}
				}

				// Update fields based on conditions
				if ($dataexport[$mon][$k]['check'] > 0) { // Check if 'check' is greater than 0
					$dataexport[$mon][$k]['department'] = $department_name[$k];
					$dataexport[$mon][$k]['set_key'] = $set_key[$k];
					$dataexport[$mon][$k]['feedbacks_recieved'] = $dataexport[$mon][$k]['check'];
					$dataexport[$mon][$k]['department_performance'] = round(($dataexport[$mon][$k]['received_feedback_score'] / $dataexport[$mon][$k]['max_feedback_score']) * 100) . '%';

					$dataexport[$mon][$k]['psat_satisfied'] = $dataexport[$mon][$k]['average'] + $dataexport[$mon][$k]['good'] + $dataexport[$mon][$k]['excelent'];
					$dataexport[$mon][$k]['psat_unsatisfied'] = $dataexport[$mon][$k]['worst'] + $dataexport[$mon][$k]['poor'];

					// Calculate NPS and rating counts
					$dataexport[$mon][$k]['nps_promoters'] = isset($dataexport[$mon][$k]['promoters_count']) ? $dataexport[$mon][$k]['promoters_count'] : 0;
					$dataexport[$mon][$k]['nps_detractors'] = isset($dataexport[$mon][$k]['detractor_count']) ? $dataexport[$mon][$k]['detractor_count'] : 0;
					$dataexport[$mon][$k]['nps_passives'] = isset($dataexport[$mon][$k]['passives_count']) ? $dataexport[$mon][$k]['passives_count'] : 0;


					$dataexport[$mon][$k]['department_nps'] = round((($dataexport[$mon][$k]['nps_promoters'] - $dataexport[$mon][$k]['nps_detractors']) / $dataexport[$mon][$k]['check']) * 100) . '%';
					$dataexport[$mon][$k]['count_rated_worst'] = isset($dataexport[$mon][$k]['worst']) ? $dataexport[$mon][$k]['worst'] : 0;
					$dataexport[$mon][$k]['count_rated_poor'] = isset($dataexport[$mon][$k]['poor']) ? $dataexport[$mon][$k]['poor'] : 0;
					$dataexport[$mon][$k]['count_rated_average'] = isset($dataexport[$mon][$k]['average']) ? $dataexport[$mon][$k]['average'] : 0;
					$dataexport[$mon][$k]['count_rated_good'] = isset($dataexport[$mon][$k]['good']) ? $dataexport[$mon][$k]['good'] : 0;
					$dataexport[$mon][$k]['count_rated_excellent'] = isset($dataexport[$mon][$k]['excellent']) ? $dataexport[$mon][$k]['excellent'] : 0;

					foreach ($subarraydata as $subk => $vsubr) {
						if (isset($data['reason'][$subk])) {
							$count_this_re++; // Increment count_this_re for each negative feedback
							$dataexport[$mon][$subk]['negative'] = $reason[$subk]; // Assign negative feedback reason
							$dataexport[$mon][$subk]['set'] = $subset_key[$subk]; // Assign negative feedback reason
							$dataexport[$mon][$subk]['count'] = $count_this_re; // Assign count of negative feedbacks
						}
					}
				} else {
					// Remove unnecessary fields if 'check' is not greater than 0
					unset($dataexport[$mon][$k]['department'], $dataexport[$mon][$k]['set_key'], $dataexport[$mon][$k]['feedbacks_recieved'], $dataexport[$mon][$k]['department_performance'], $dataexport[$mon][$k]['psat_satisfied'], $dataexport[$mon][$k]['psat_unsatisfied'], $dataexport[$mon][$k]['nps_promoters'], $dataexport[$mon][$k]['nps_detractors'], $dataexport[$mon][$k]['nps_passives'], $dataexport[$mon][$k]['department_nps'], $dataexport[$mon][$k]['count_rated_worst'], $dataexport[$mon][$k]['count_rated_poor'], $dataexport[$mon][$k]['count_rated_average'], $dataexport[$mon][$k]['count_rated_good'], $dataexport[$mon][$k]['count_rated_excelent']);
				}
			}
		}
		return $dataexport;
	}




	public function commentwords($table_patient, $table_feedback, $sorttime)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));

		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		$this->db->join($table_patient, $table_patient . '.id = ' . $table_feedback . '.pid', 'inner');
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		}
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);

		$query = $this->db->get();
		$feedback = $query->result();

		$chosenSet = $this->input->get('set'); // Get the chosen set from the dropdown

		$allUniqueWords = [];

		//... [Your stopwords initialization code here, I'm skipping this for brevity] ...
		$conjunctions = [
			"and",
			"but",
			"or",
			"nor",
			"for",
			"so",
			"yet",
			"although",
			"because",
			"since",
			"unless",
			"while",
			"either...or",
			"neither...nor"
		];

		$prepositions = [
			"about",
			"above",
			"across",
			"after",
			"against",
			"along",
			"among",
			"around",
			"at",
			"before",
			"behind",
			"below",
			"beneath",
			"beside",
			"between",
			"beyond",
			"by",
			"down",
			"during",
			"for",
			"from",
			"in",
			"inside",
			"into",
			"near",
			"of",
			"off",
			"on",
			"onto",
			"out",
			"outside",
			"over",
			"through",
			"to",
			"under",
			"up",
			"with",
			"without"
		];

		$interjections = [
			"ah!",
			"aha!",
			"alas!",
			"ouch!",
			"hey!",
			"wow!",
			"oh!",
			"oops!",
			"yikes!",
			"hmm...",
			"shh!"
		];

		$pronouns = [
			"I",
			"you",
			"he",
			"she",
			"it",
			"we",
			"they",
			"mine",
			"yours",
			"his",
			"hers",
			"ours",
			"theirs",
			"myself",
			"yourself",
			"himself",
			"herself",
			"itself",
			"ourselves",
			"yourselves",
			"themselves",
			"who",
			"whom",
			"whose",
			"which",
			"that",
			"this",
			"that",
			"these",
			"those",
			"who",
			"whom",
			"whose",
			"which",
			"what",
			"anybody",
			"anyone",
			"something",
			"nothing",
			"everything",
			"all",
			"both",
			"few",
			"many",
			"neither",
			"several",
			"some",
			"such"
		];

		$fillerWords = [
			"um",
			"uh",
			"you know",
			"like",
			"basically",
			"actually",
			"seriously",
			"literally",
			"just",
			"really"
		];

		$articles = [
			"the",
			"a",
			"an"
		];

		$others = [
			"a",
			"about",
			"above",
			"after",
			"again",
			"against",
			"all",
			"am",
			"an",
			"and",
			"any",
			"are",
			"as",
			"at",
			"be",
			"because",
			"been",
			"before",
			"being",
			"below",
			"between",
			"both",
			"but",
			"by",
			"can't",
			"cannot",
			"could",
			"did",
			"do",
			"does",
			"doing",
			"don't",
			"down",
			"during",
			"each",
			"few",
			"for",
			"from",
			"further",
			"had",
			"has",
			"have",
			"having",
			"he",
			"he'd",
			"he'll",
			"he's",
			"her",
			"here",
			"here's",
			"hers",
			"herself",
			"him",
			"himself",
			"his",
			"how",
			"how's",
			"i",
			"i'd",
			"i'll",
			"i'm",
			"i've",
			"if",
			"in",
			"into",
			"is",
			"it",
			"it's",
			"its",
			"itself",
			"let's",
			"me",
			"more",
			"most",
			"my",
			"myself",
			"nor",
			"of",
			"on",
			"once",
			"only",
			"or",
			"other",
			"ought",
			"our",
			"ours",
			"ourselves",
			"out",
			"over",
			"own",
			"same",
			"she",
			"she'd",
			"she'll",
			"she's",
			"should",
			"so",
			"some",
			"such",
			"than",
			"that",
			"that's",
			"the",
			"their",
			"theirs",
			"them",
			"themselves",
			"then",
			"there",
			"there's",
			"these",
			"they",
			"they'd",
			"they'll",
			"they're",
			"they've",
			"this",
			"those",
			"through",
			"to",
			"too",
			"under",
			"until",
			"up",
			"very",
			"was",
			"we",
			"we'd",
			"we'll",
			"we're",
			"we've",
			"were",
			"what",
			"what's",
			"when",
			"when's",
			"where",
			"where's",
			"which",
			"while",
			"who",
			"who's",
			"whom",
			"why",
			"why's",
			"with",
			"would",
			"you",
			"you'd",
			"you'll",
			"you're",
			"you've",
			"your",
			"yours",
			"yourself",
			"yourselves",
			"not",
			"can",
			"1",
			"2",
			"3",
			"4",
			"5",
			"6",
			"7",
			"8",
			"9",
			"0",
			" "
		];

		$stopwords = array_merge($conjunctions, $prepositions, $interjections, $pronouns, $fillerWords, $articles, $others);

		// print_r($stopwords);
		// If you want the stopwords in lowercase for case-insensitive matching:
		$stopwords = array_map('strtolower', $stopwords);

		foreach ($feedback as $row) {
			$param = json_decode($row->dataset, true);

			if (isset($chosenSet) && isset($param['comment'][$chosenSet])) {
				$words = array_map('strtolower', preg_split('/\s+/', $param['comment'][$chosenSet]));
			} elseif (!isset($chosenSet)) {
				$words = $param['suggestionText'] ? array_map('strtolower', preg_split('/\s+/', $param['suggestionText'])) : [];
			} else {
				continue; // Skip this iteration if the set is chosen but the comment doesn't exist for it
			}

			foreach ($words as $word) {
				$word = strtolower(trim($word, ",.!?|/"));

				if (!in_array($word, $stopwords)) {
					if (isset($allUniqueWords[$word])) {
						$allUniqueWords[$word]++;
					} else {
						$allUniqueWords[$word] = 1;
					}
				}
			}
		}


		$wordCounts = [];
		foreach ($allUniqueWords as $word => $count) {
			if ($count > 3) {
				// Generate random color for each word
				$color = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); // Random hex color
				$wordCounts[] = [$word, $count, $color];
			}
		}
		usort($wordCounts, function ($a, $b) {
			return $b['count'] - $a['count'];
		});

		return $wordCounts;
	}



	//keep
	public function key_highlights2($table_patients, $table_feedback, $sorttime, $setup)
	{
		$question_list_parent = $this->setup_result($setup);
		$question_list_reasons = $this->setup_sub_result($setup);
		$feedback_data = $this->patient_and_feedback($table_patients, $table_feedback, $sorttime, $setup);
		$i = 0;
		$z = 0;
		$set = array();
		$set1 = array();


		foreach ($question_list_parent as $row) {
			$set[$i]['parent_param'] = $row->shortname;
			$set[$i]['parent_percentage'] = $this->get_total_feedback_rating_percentage($row->shortkey, $feedback_data);
			// $set[$i]['parent_count'] = $this->get_total_feedback_rating_count($row->shortkey, $feedback_data);
			$set[$i]['shortkey'] =  $row->shortkey;
			$res['parent'] = $set;
			$i++;
		}

		foreach ($question_list_reasons as $row2) {
			$set1[$z]['sub_param'] = $row2->shortname;
			$set1[$z]['sub_count'] = $this->get_feedback_for_reason($row2->shortkey, $feedback_data);
			$set1[$z]['shortkey'] =  $row2->shortkey;
			$res['sub'] = $set1;
			$z++;
		}

		return $res;

		print_r($res);
	}




	//keep
	private function get_total_feedback_rating_percentage($key, $feedback)
	{
		$total = 0;
		$total_incidence = 0;
		foreach ($feedback as $row) {
			$dataset = json_decode($row->dataset, true);

			if (isset($dataset[$key]) && $dataset[$key] > 0) {
				$total_incidence++;
				$total = $total + $dataset[$key];
			}
		}
		if ($total_incidence > 0) {
			$percentage = round(($total / ($total_incidence * 5)) * 100);
		} else {
			$percentage = 0;
		}
		return $percentage;
	}



	//keep
	private function get_feedback_for_reason($key, $feedback)
	{
		$total = 0;
		$total_incidence = 0;

		foreach ($feedback as $row) {
			$dataset = json_decode($row->dataset, true);
			if (isset($dataset['reason']) && is_array($dataset['reason'])) {
				if (isset($dataset['reason'][$key]) && $dataset['reason'][$key] > 0) {
					$total_incidence++;
					$total = $total + $dataset['reason'][$key];
				}
			}
		}
		return $total;
	}

	//keep
	public function ticket_rate($table_tickets, $status, $table_feedback, $table_ticket_action)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));


		$get_tickes = $this->get_tickets($table_feedback, $table_tickets);
		$closed_tickets = 0;
		$time = 0;
		$this->db->select('*');
		$this->db->from($table_ticket_action);
		$query = $this->db->get();
		$alltickets = $query->result();

		foreach ($get_tickes as $row) {
			foreach ($alltickets as $t) {
				if ($t->ticketid == $row->id && $row->status == 'Closed') {
					// print_r($t);
					$closed_tickets++;
					$time += strtotime($t->created_on) - strtotime($row->created_on);
				}
			}
		}
		if ($closed_tickets > 0 && $time > 0) {
			$seconds = $time / $closed_tickets;
		} else {
			$seconds = 0;
		}
		return $seconds;
	}



	//keep
	public function ticket_resolution_rate($table_tickets, $status, $table_feedback)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select('*');
		$this->db->from($table_tickets);
		$this->db->join($table_feedback, $table_feedback . '.id=' . $table_tickets . '.feedbackid');
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			// Use ward only if floorwise doesn't exist
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		} elseif (count($this->session->userdata['floor_ward']) > 0) {
			$floorwiseArray = $this->session->userdata['floor_ward'];
			$this->db->where_in($table_feedback . '.ward', $floorwiseArray);
		}

		$this->db->where($table_tickets . '.created_on <=', $fdate . ' 23:59:59');
		$this->db->where($table_tickets . '.created_on >=', $tdate);
		$query = $this->db->get();
		$alltickets = $query->result();
		$tickets = 0;
		foreach ($alltickets as $t) {
			if ($t->status == $status) {
				$tickets++;
			}
		}
		if ($tickets > 0 && count($alltickets) > 0) {
			$countofclosed = round(($tickets / count($alltickets)) * 100);
			return $countofclosed;
		} else {
			return 0;
		}
	}

	//keep
	public function setup_result($table)
	{
		$this->db->order_by('sort_order');
		$this->db->where('parent', 1);
		$query = $this->db->get($table);
		return $result = $query->result();
	}


	//keep
	public function setup_sub_result($table)
	{
		$this->db->order_by('id');
		$this->db->where('parent', 0);
		$query = $this->db->get($table);
		return $result = $query->result();
	}

	//keep
	public function tickets_recived_by_department($type, $table_feedback, $table_tickets)
	{
		$department = $this->get_department($type);
		$get_tickes = $this->get_tickets($table_feedback, $table_tickets);
		$set = array();
		// $i = 0;
		foreach ($department as $key => $row) {
			// exit;
			$i = $row->slug;
			if (count($get_tickes) >= 1) {

				$data =  $this->get_toal_ticket_by_department($row->dprt_id, $get_tickes);
				$percentage  = $data['percentage'];
				$total_count  = $data['total_count'];
				$total_count = $data['total_count'];
				$open_tickets = $data['open_tickets'];
				$closed_tickets = $data['closed_tickets'];
				$addressed_tickets = $data['addressed_tickets'];
				$res_time = $data['res_time'];
				$tr_rate = $data['tr_rate'];
				$set[$i]['department'] = $row->description;
				$set[$i]['slug'] = $row->slug;
				$set[$i]['percentage'] = $percentage;
				$set[$i]['count'] = $total_count;
				$set[$i]['alltickets'] = $total_count;
				$set[$i]['closed_tickets'] = $closed_tickets;
				$set[$i]['open_tickets'] = $open_tickets;
				$set[$i]['addressed_tickets'] = $addressed_tickets;
				$set[$i]['tr_rate'] = $tr_rate;
				$set[$i]['res_time'] = $res_time;
				// $i++;
			}
		}
		return $set;
	}
	//keep
	public function get_toal_ticket_by_department($key, $tickes)
	{
		$total = 0;
		$total_percentage = 0;
		$open_tickets = 0;
		$closed_tickets = 0;
		$addressed_tickets = 0;
		$time = 0;
		foreach ($tickes as $row) {
			if ($row->departmentid == $key) {
				$total++;
			}
		}
		foreach ($tickes as $row) {
			if ($row->departmentid == $key && $row->status == 'Open') {
				$open_tickets++;
			} elseif ($row->departmentid == $key && $row->status == 'Addressed') {
				$addressed_tickets++;
			} elseif ($row->departmentid == $key && $row->status == 'Closed') {
				$closed_tickets++;
				$time += strtotime($row->last_modified) - strtotime($row->created_on);
			}
		}
		if ($total > 0 && count($tickes) > 0) {
			$total_percentage = round(($total / count($tickes)) * 100);
		}
		if ($closed_tickets > 0 && count($tickes) > 0) {
			$tr_rate = round(($closed_tickets / count($tickes)) * 100);
			$seconds = $time / $closed_tickets;
		} else {
			$tr_rate = 0;
			$seconds = 0;
		}



		$data = array();
		$data['percentage'] = $total_percentage;
		$data['total_count'] = $total;
		$data['open_tickets'] = $open_tickets;
		$data['closed_tickets'] = $closed_tickets;
		$data['addressed_tickets'] = $addressed_tickets;
		$data['tr_rate'] = $tr_rate;
		$data['res_time'] = $seconds;
		return $data;
	}

	//keep
	public function get_department($type)
	{
		$this->db->where('type', $type);
		$this->db->group_by('setkey');
		$query = $this->db->get('department');
		return $department = $query->result();
	}

	public function get_departmentint($type)
	{
		$this->db->where('type', $type);
		$query = $this->db->get('department');
		return $department = $query->result();
	}

	public function check_demo($settings)
	{
		$this->db->select($settings . '.*');
		$this->db->from($settings);
		$query = $this->db->get();
		$response  = $query->result();
		return $response;
	}

	//keep
	public function get_satisfied_count($table_feedback, $table_tickets)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			// Use ward only if floorwise doesn't exist
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		} elseif (count($this->session->userdata['floor_ward']) > 0) {
			$floorwiseArray = $this->session->userdata['floor_ward'];
			$this->db->where_in($table_feedback . '.ward', $floorwiseArray);
		}

		$query = $this->db->get();
		$all_feedback = $query->result();
		$this->db->select($table_tickets . ".*");
		$this->db->from($table_tickets);
		$this->db->where($table_tickets . '.created_on <=', $fdate . ' 23:59:59');
		$this->db->where($table_tickets . '.created_on >=', $tdate);
		$query = $this->db->get();
		$all_tickets = $query->result();
		$satisfied = 0;
		foreach ($all_feedback as $row) {
			$check = true;
			foreach ($all_tickets as $t) {
				if ($row->id == $t->feedbackid && $check == true) {
					$satisfied = $satisfied - 1;
				}
			}
			if ($check == true) {
				$satisfied = $satisfied + 1;
				$check = false;
			}
		}
		return $satisfied;
	}


	//keep
	public function get_unsatisfied_count($table_feedback, $table_tickets)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			// Use ward only if floorwise doesn't exist
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		} elseif (count($this->session->userdata['floor_ward']) > 0) {
			$floorwiseArray = $this->session->userdata['floor_ward'];
			$this->db->where_in($table_feedback . '.ward', $floorwiseArray);
		}

		$this->db->join($table_tickets, $table_tickets . '.feedbackid = ' . $table_feedback . '.id');
		$query = $this->db->get();
		$all_feedback = $query->result();
		$unsatisfied = 0;
		foreach ($all_feedback as $row) {
			if ($row) {
				$unsatisfied = $unsatisfied + 1;
			}
		}
		return $unsatisfied;
	}
	//keep
	function convertSecondsToTime($inputSeconds)
	{
		$isNegative = $inputSeconds < 0 ? true : false;

		// Always work with positive values for calculations
		$inputSeconds = abs($inputSeconds);

		$days = floor($inputSeconds / 86400);
		$inputSeconds %= 86400;

		$hours = floor($inputSeconds / 3600);
		$inputSeconds %= 3600;

		$minutes = floor($inputSeconds / 60);
		$inputSeconds %= 60;

		$seconds = $inputSeconds;

		return array(
			'isNegative' => $isNegative,
			'days' => $days,
			'hours' => $hours,
			'minutes' => $minutes,
			'seconds' => $seconds
		);
	}


	//keep
	public function tickets_feeds($table_feedback, $table_tickets, $sorttime, $status)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . ".*");
		$this->db->from($table_feedback);
		$this->db->join($table_tickets, $table_tickets . '.feedbackid = ' . $table_feedback . '.id');
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			// Use ward only if floorwise doesn't exist
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		} elseif (count($this->session->userdata['floor_ward']) > 0) {
			$floorwiseArray = $this->session->userdata['floor_ward'];
			$this->db->where_in($table_feedback . '.ward', $floorwiseArray);
		}

		$this->db->where($table_tickets . '.status=', $status);
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		return $feedbackandticket = $query->result();
	}


	//keep
	public function patient_and_feedback($table_patient, $table_feedback, $sorttime)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']) + 24 * 60 * 60);
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));

		$tables = [
			'bf_feedback_CQI3a1',
			'bf_feedback_CQI3a2',
			'bf_feedback_CQI3a3',
			'bf_feedback_CQI3a4',
			'bf_feedback_CQI3a5',
			'bf_feedback_CQI3a6',
			'bf_feedback_CQI3a7',
			'bf_feedback_CQI3a8',
			'bf_feedback_CQI3a9',
			'bf_feedback_CQI3a10',
			'bf_feedback_CQI3a11',
			'bf_feedback_CQI3a12',
			'bf_feedback_CQI3a13',
			'bf_feedback_CQI3a14',
			'bf_feedback_CQI3a15',
			'bf_feedback_CQI3a16',
			'bf_feedback_CQI3a17',
			'bf_feedback_CQI3a18',
			'bf_feedback_CQI3a19',
			'bf_feedback_CQI3a20',
			'bf_feedback_CQI3a21',
			'bf_feedback_CQI3a22',
			'bf_feedback_CQI3b1',
			'bf_feedback_CQI3b2',
			'bf_feedback_CQI3b3',
			'bf_feedback_CQI3b4',
			'bf_feedback_CQI3b5',
			'bf_feedback_CQI3b6',
			'bf_feedback_CQI3b7',
			'bf_feedback_CQI3b8',
			'bf_feedback_CQI3b9',
			'bf_feedback_CQI3b10',
			'bf_feedback_CQI3b11',
			'bf_feedback_CQI3b12',
			'bf_feedback_CQI3b13',
			'bf_feedback_CQI3c1',
			'bf_feedback_CQI3c2',
			'bf_feedback_CQI3c3',
			'bf_feedback_CQI3c4',
			'bf_feedback_CQI3c5',
			'bf_feedback_CQI3c6',
			'bf_feedback_CQI3c7',
			'bf_feedback_CQI3c8',
			'bf_feedback_CQI3c9',
			'bf_feedback_CQI3c10',
			'bf_feedback_CQI3c11',
			'bf_feedback_CQI3c12',
			'bf_feedback_CQI3c13',
			'bf_feedback_CQI3c14',
			'bf_feedback_CQI3d1',
			'bf_feedback_CQI3d2',
			'bf_feedback_CQI3d3',
			'bf_feedback_CQI3d4',
			'bf_feedback_CQI3d5',
			'bf_feedback_CQI3e1',
			'bf_feedback_CQI3e2',
			'bf_feedback_CQI3e3',
			'bf_feedback_CQI3e4',
			'bf_feedback_CQI3e5',
			'bf_feedback_CQI3e6',
			'bf_feedback_CQI3e7',
			'bf_feedback_CQI3e8',
			'bf_feedback_CQI3e9',
			'bf_feedback_CQI3f1',
			'bf_feedback_CQI3f2',
			'bf_feedback_CQI3f3',
			'bf_feedback_CQI3f4',
			'bf_feedback_CQI3f5',
			'bf_feedback_CQI3f6',
			'bf_feedback_CQI3f7',
			'bf_feedback_CQI3f8',
			'bf_feedback_CQI3f9',
			'bf_feedback_CQI3f10',
			'bf_feedback_CQI3g1',
			'bf_feedback_CQI3g2',
			'bf_feedback_CQI3g3',
			'bf_feedback_CQI3g4',
			'bf_feedback_CQI3g5',
			'bf_feedback_CQI3g6',
			'bf_feedback_CQI3h1',
			'bf_feedback_CQI3h2',
			'bf_feedback_CQI3h3',
			'bf_feedback_CQI3h4',
			'bf_feedback_CQI3h5',
			'bf_feedback_CQI3h6',
			'bf_feedback_CQI3h7',
			'bf_feedback_CQI3h8',
			'bf_feedback_CQI3h9',
			'bf_feedback_CQI3j1',
			'bf_feedback_CQI3j2',
			'bf_feedback_CQI3j3',
			'bf_feedback_CQI3j4',
			'bf_feedback_CQI3j5',
			'bf_feedback_CQI3j6',
			'bf_feedback_CQI3j7',
			'bf_feedback_CQI3j8',
			'bf_feedback_CQI3j9',
			'bf_feedback_CQI3j10',
			'bf_feedback_CQI3j11',
			'bf_feedback_CQI3j12',
			'bf_feedback_CQI3j13',
			'bf_feedback_CQI3j14',
			'bf_feedback_CQI3j15',
			'bf_feedback_CQI3j16',
			'bf_feedback_CQI3j17',
			'bf_feedback_CQI3j18',
			'bf_feedback_CQI3j19',
			'bf_feedback_CQI3j20',
			'bf_feedback_CQI3j21',
			'bf_feedback_CQI3j22',
			'bf_feedback_CQI3j23',
			'bf_feedback_CQI3j24',
			'bf_feedback_CQI3j25',
			'bf_feedback_CQI3j26',
			'bf_feedback_CQI3j27',
			'bf_feedback_CQI3j28',
			'bf_feedback_CQI3j29',
			'bf_feedback_CQI3j30',
			'bf_feedback_CQI3j31',
			'bf_feedback_CQI3j32',
			'bf_feedback_CQI3j33',
			'bf_feedback_CQI3j34',
			'bf_feedback_CQI4a1',
			'bf_feedback_CQI4a2',
			'bf_feedback_CQI4a3',
			'bf_feedback_CQI4a4',
			'bf_feedback_CQI4a5',
			'bf_feedback_CQI4b1',
			'bf_feedback_CQI4b2',
			'bf_feedback_CQI4b3',
			'bf_feedback_CQI4b4',
			'bf_feedback_CQI4b5',
			'bf_feedback_CQI4b6',
			'bf_feedback_CQI4b7',
			'bf_feedback_CQI4b8',
			'bf_feedback_CQI4c1',
			'bf_feedback_CQI4c2',
			'bf_feedback_CQI4c3',
			'bf_feedback_CQI4c4',
			'bf_feedback_CQI4c5',
			'bf_feedback_CQI4c6',
			'bf_feedback_CQI4c7',
			'bf_feedback_CQI4c8',
			'bf_feedback_CQI4c9',
			'bf_feedback_CQI4c10',
			'bf_feedback_CQI4c11',
			'bf_feedback_CQI4c12',
			'bf_feedback_CQI4c13',
			'bf_feedback_CQI4c14',
			'bf_feedback_CQI4d1',
			'bf_feedback_CQI4d2',
			'bf_feedback_CQI4d3',
			'bf_feedback_CQI4d4',
			'bf_feedback_CQI4d5',
			'bf_feedback_CQI4d6',
			'bf_feedback_CQI4d7',
			'bf_feedback_CQI4d8',
			'bf_feedback_CQI4d9',
			'bf_feedback_CQI4d10',
			'bf_feedback_CQI4d11',
			'bf_feedback_CQI4e1',
			'bf_feedback_CQI4e2',
			'bf_feedback_CQI4e3',
			'bf_feedback_CQI4e4',
			'bf_feedback_CQI4e5',
			'bf_feedback_CQI4e6',
			'bf_feedback_CQI4e7',
			'bf_feedback_CQI4e8',
			'bf_feedback_CQI4f1',
			'bf_feedback_CQI4f2',
			'bf_feedback_CQI4f3',
			'bf_feedback_CQI4f4',
			'bf_feedback_CQI4f5',
			'bf_feedback_CQI4f6',
			'bf_feedback_CQI4f7',
			'bf_feedback_CQI4g1',
			'bf_feedback_CQI4g2',
			'bf_feedback_CQI4g3',
			'bf_feedback_CQI4g4',
			'bf_feedback_CQI4g5',
			'bf_feedback_CQI4g6',
			'bf_feedback_CQI3k1',
			'bf_feedback_CQI3k2',
			'bf_feedback_CQI3k3',
			'bf_feedback_CQI3k4',
			'bf_feedback_CQI3k5',
			'bf_feedback_CQI3k6',
			'bf_feedback_CQI3k7',
			'bf_feedback_CQI3k8',
			'bf_feedback_CQI3k9',
			'bf_feedback_CQI3k10',
			'bf_feedback_CQI3k11',
			'bf_feedback_CQI3k12',
			'bf_feedback_CQI3k13',
			'bf_feedback_CQI3k14',
			'bf_feedback_CQI3k15',
			'bf_feedback_CQI3k16',
			'bf_feedback_CQI3k17',
			'bf_feedback_CQI3k18',
			'bf_feedback_CQI3k19',
			'bf_feedback_CQI3k20',
			'bf_feedback_CQI3k21',
			'bf_feedback_CQI3k22',
			'bf_feedback_CQI3k23',
			'bf_feedback_CQI3k24',
			'bf_feedback_CQI3k25',
			'bf_feedback_CQI3k26',
			'bf_feedback_CQI3k27',
			'bf_feedback_CQI3k28',
			'bf_feedback_CQI3k29',
			'bf_feedback_CQI3k30',
			'bf_feedback_CQI3k31',
			'bf_feedback_CQI3k32',
			'bf_feedback_CQI3k33',
			'bf_feedback_CQI3k34',
			'bf_feedback_CQI3k35',
			'bf_feedback_CQI3k36',
			'bf_feedback_CQI3k37',
			'bf_feedback_CQI3k38',
			'bf_feedback_CQI3k39',
			'bf_feedback_CQI3k40',
			'bf_feedback_CQI3k41',
			'bf_feedback_CQI3k42',
			'bf_feedback_CQI3k43',
			'bf_feedback_CQI3k44',
			'bf_feedback_CQI3k45',
			'bf_feedback_CQI3k46',
			'bf_feedback_CQI3k47',
			'bf_feedback_CQI3k48',
			'bf_feedback_CQI3k49',
			'bf_feedback_CQI3k50',
			'bf_feedback_CQI3k51',
			'bf_feedback_CQI3k52',
			'bf_feedback_CQI3k53',
			'bf_feedback_CQI3k54',
			'bf_feedback_CQI3k55',
			'bf_feedback_CQI3k56',
			'bf_feedback_CQI3k57',
			'bf_feedback_CQI3k58',
			'bf_feedback_CQI3k59',
			'bf_feedback_CQI3k60',
			'bf_feedback_CQI3k61',
			'bf_feedback_CQI3k62',
			'bf_feedback_CQI3k63',
			'bf_feedback_CQI3k64',
			'bf_feedback_CQI3k65',
			'bf_feedback_CQI3k66',
			'bf_feedback_CQI4h1',
			'bf_feedback_CQI4h2',
			'bf_feedback_CQI4h3',
			'bf_feedback_CQI4h4',
			'bf_feedback_CQI4h5',
			'bf_feedback_CQI4h6',
			'bf_feedback_CQI4h7',
			'bf_feedback_CQI4h8',
			'bf_feedback_CQI4h9',
			'bf_feedback_CQI4h10',
			'bf_feedback_CQI4h11',
			'bf_feedback_CQI4h12',
			'bf_feedback_CQI4h13',
			'bf_feedback_CQI4h14',
			'bf_feedback_CQI4h15',
			'bf_feedback_CQI4h16',
			'bf_feedback_CQI4h17',
			'bf_feedback_CQI4h18',
			'bf_feedback_CQI4h19',
			'bf_feedback_CQI4h20',
			'bf_feedback_CQI4h21',
			'bf_feedback_CQI4h22',
			'bf_feedback_CQI4h23',
			'bf_feedback_CQI4h24',
			'bf_feedback_CQI4h25',
			'bf_feedback_CQI4h26',
			'bf_feedback_CQI4h27',
			'bf_feedback_CQI4h28',
			'bf_feedback_CQI4h29',
			'bf_feedback_CQI4h30',
			'bf_feedback_CQI4h31',
			'bf_feedback_CQI4h32',
			'bf_feedback_CQI4h33',
			'bf_feedback_CQI4h34',
			'bf_feedback_CQI4h35',
			'bf_feedback_CQI4h36',
			'bf_feedback_CQI4h37',
			'bf_feedback_CQI4h38',
			'bf_feedback_CQI4h39',
			'bf_feedback_CQI4h40',
			'bf_feedback_CQI4h41',
			'bf_feedback_CQI4h42',
			'bf_feedback_CQI4h43',
			'bf_feedback_CQI4h44',
			'bf_feedback_CQI4h45',
			'bf_feedback_CQI4h46',
			'bf_feedback_CQI4h47',
			'bf_feedback_CQI4h48',
			'bf_feedback_CQI4h49',
			'bf_feedback_CQI4h50',
			'bf_feedback_CQI4h51',
			'bf_feedback_CQI4h52',
			'bf_feedback_CQI4h53',
			'bf_feedback_CQI4h54',
			'bf_feedback_CQI4h55',
			'bf_feedback_CQI4h56',
			'bf_feedback_CLOTCM1',
			'bf_feedback_CLOTCM2',
			'bf_feedback_CLOTCM3',
			'bf_feedback_CLOTCM4',
			'bf_feedback_CLOTCM5',
			'bf_feedback_CLOTCM6',
			'bf_feedback_CLOTCM7',
			'bf_feedback_CLOTCM8',
			'bf_feedback_CLOTCM9',
			'bf_feedback_CLOTCM10',
			'bf_feedback_CLOTCM11',
			'bf_feedback_CLOTCM12',
			'bf_feedback_CLOTCM13',
			'bf_feedback_CLOTCM14',
			'bf_feedback_CLOTCM15',
			'bf_feedback_CLOTCM16',
			'bf_feedback_CLOTCM17',
			'bf_feedback_CLOTCM18',
			'bf_feedback_CLOTCM19',
			'bf_feedback_CLOTCM20',
			'bf_feedback_CLOTCM21',
			'bf_feedback_CLOTCM22',
			'bf_feedback_CLOTCM23',
			'bf_feedback_CLOTCM24',
			'bf_feedback_CLOTCM25',
			'bf_feedback_CLOTCM26',
			'bf_feedback_CLOTCM27',
			'bf_feedback_CLOTCM28',
			'bf_feedback_CLOTCM29',
			'bf_feedback_CLOTCM30',
			'bf_feedback_CQI4i1',
			'bf_feedback_CQI4i2',
			'bf_feedback_CQI4i3',
			'bf_feedback_CQI4i4',
			'bf_feedback_CQI4i5',
			'bf_feedback_CQI4i6',
			'bf_feedback_CQI4i7',
			'bf_feedback_CQI4i8',
			'bf_feedback_CQI4i9',
			'bf_feedback_CQI4i10',
			'bf_feedback_CQI4i11',
			'bf_feedback_CQI4i12',
			'bf_feedback_CQI4i13',
			'bf_feedback_CQI4i14',
			'bf_feedback_CQI4j1',
			'bf_feedback_CQI4j2',
			'bf_feedback_CQI4j3',
			'bf_feedback_CQI4j4',
			'bf_feedback_CQI4j5',
			'bf_feedback_CQI4j6',
			'bf_feedback_CQI4j7',
			'bf_feedback_CQI4j8',
			'bf_feedback_CQI4j9',
			'bf_feedback_CQI4j10',
			'bf_feedback_CQI4j11',
			'bf_feedback_CQI4j12',
			'bf_feedback_CQI4j13',
			'bf_feedback_CQI4j14',
			'bf_feedback_CQI4j15',
			'bf_feedback_CQI4j16',
			'bf_feedback_CQI4j17',
			'bf_feedback_CQI4j18',
			'bf_feedback_CQI4j19',
			'bf_feedback_CQI4j20',
			'bf_feedback_CQI4j21',
			'bf_feedback_CQI4j22'
		];

		$kpi_feature_map = [];
		foreach ($tables as $index => $tbl) {
			$kpi_feature_map['QUALITY-KPI' . ($index + 1)] = $tbl;
		}

		$allowed = false;
		if (isset($this->session->userdata['feature']) && is_array($this->session->userdata['feature'])) {
			foreach ($this->session->userdata['feature'] as $key => $val) {
				if ($val === true && isset($kpi_feature_map[$key]) && $kpi_feature_map[$key] === $table_feedback) {
					$allowed = true;
					break;
				}
			}
		}

		if (!$allowed) {
			return [];
		}

		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);

		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		} elseif (
			isset($this->session->userdata['floor_ward']) &&
			is_array($this->session->userdata['floor_ward']) &&
			count($this->session->userdata['floor_ward']) > 0
		) {
			$this->db->where_in($table_feedback . '.ward', $this->session->userdata['floor_ward']);
		}

		$this->db->where($table_feedback . '.datetime <=', $fdate);
		$this->db->where($table_feedback . '.datetime >=', $tdate);
		$this->db->order_by('datetime', $sorttime);

		$query = $this->db->get();
		if (!$query) return [];
		return $query->result();
	}


	public function patient_and_feedback_quality($table_feedback, $sorttime)
	{

		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);

		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);

		$query = $this->db->get();
		return $patientandfeedback = $query->result();
	}

	//keep
	public function feedback_and_ticket($table_feedback, $table_tickets, $sorttime)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . ".*");
		$this->db->from($table_feedback);
		$this->db->join($table_tickets, $table_tickets . '.feedbackid = ' . $table_feedback . '.id');
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			// Use ward only if floorwise doesn't exist
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		} elseif (count($this->session->userdata['floor_ward']) > 0) {
			$floorwiseArray = $this->session->userdata['floor_ward'];
			$this->db->where_in($table_feedback . '.ward', $floorwiseArray);
		}


		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		return $feedbackandticket = $query->result();
	}

	//keep
	public function get_tickets($table_feedback, $table_tickets)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_tickets . ".*");
		$this->db->from($table_feedback);
		$this->db->join($table_tickets, $table_tickets . '.feedbackid = ' . $table_feedback . '.id');
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			// Use ward only if floorwise doesn't exist
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		} elseif (count($this->session->userdata['floor_ward']) > 0) {
			$floorwiseArray = $this->session->userdata['floor_ward'];
			$this->db->where_in($table_feedback . '.ward', $floorwiseArray);
		}

		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$query = $this->db->get();
		return 	$feedbackandticket = $query->result();
	}


	public function get_tickets2($table_feedback, $table_tickets)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . ".*");
		$this->db->from($table_tickets);
		$this->db->join($table_tickets, $table_tickets . '.feedbackid = ' . $table_feedback . '.id');
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		}
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$query = $this->db->get();
		return 	$tickets23 = $query->result();
	}

	//keep
	public function nps_analytics($table_feedback, $sorttime)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			// Use ward only if floorwise doesn't exist
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		} elseif (count($this->session->userdata['floor_ward']) > 0) {
			$floorwiseArray = $this->session->userdata['floor_ward'];
			$this->db->where_in($table_feedback . '.ward', $floorwiseArray);
		}

		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		$nps_analytics = $query->result();


		$promoters_count = 0;
		$detractors_count = 0;
		$passives_count = 0;

		$promoters_feedback = array();
		$detractors_feedback = array();
		$passives_feedback = array();

		foreach ($nps_analytics as $row) {
			$param = json_decode($row->dataset);
			$rating = $param->recommend1Score * 2;
			if ($rating >= 9) {
				$promoters_count++;
				$promoters_feedback[$row->id] = $param;
			} elseif ($rating <= 6) {
				$detractors_count++;
				$detractors_feedback[$row->id] = $param;
			} else {
				$passives_count++;
				$passives_feedback[$row->id] = $param;
			}
		}

		$nps_score = count($nps_analytics) > 0 ? round((($promoters_count - $detractors_count) / count($nps_analytics)) * 100) : 0;

		$targetNPS = 0.85;
		$totalResponses = count($nps_analytics);
		$x = (($targetNPS * $totalResponses) + (100 * $detractors_count) - (100 * $promoters_count)) / (100 - $targetNPS);
		$neededPromoters = ceil($x) + $promoters_count;


		$nps = array();
		$nps['nps_score'] = $nps_score;
		$nps['promoters_count'] = $promoters_count;
		$nps['promoters_feedbacks'] = $promoters_feedback;
		$nps['detractors_count'] = $detractors_count;
		$nps['detractors_feedback'] = $detractors_feedback;
		$nps['passives_count'] = $passives_count;
		$nps['passives_feedback'] = $passives_feedback;
		$nps['to_reach_benchmark'] = 	$neededPromoters;
		// echo $neededPromoters;
		return $nps;
	}


	//keep
	public function psat_analytics($table_patients, $table_feedback, $table_tickets, $sorttime)
	{
		$all_tickets = $this->get_tickets($table_feedback, $table_tickets);
		$feedback_data = $this->patient_and_feedback($table_patients, $table_feedback, $sorttime);
		$satisfied_count = 0;
		$unsatisfied_count = 0;
		$neutral_count = 0;

		foreach ($feedback_data as $row) {
			$param = json_decode($row->dataset);
			$nps_score = ($param->recommend1Score * 2);
			$ticket_data = array();
			foreach ($all_tickets as $t) {
				if ($t->feedbackid == $row->id) {
					$ticket_data[] = $t;
				}
			}
			if (count($ticket_data) == 0 && $nps_score > 6) {
				$satisfied_count++;
				$satisfied_feedback[$row->id] = $param;
			} else {
				$unsatisfied_count++;
				$unsatisfied_feedback[$row->id] = $param;
			}

			// print_r($param);
			// foreach ($all_tickets as $t) {
			// 	if ($t->feedbackid == $row->id) {

			// 		$tickets[$row->id] = $t;
			// 	}
			// }
		}
		$total_count = $satisfied_count + $unsatisfied_count + $neutral_count;
		if ($total_count > 0) {
			$psat_score = round((($total_count - $unsatisfied_count) / $total_count * 100) * 1);
		} else {
			$psat_score = 0;
		}
		$psat = array();
		$psat['psat_score'] = $psat_score;
		$psat['satisfied_count'] = $satisfied_count;
		$psat['satisfied_feedback'] = $satisfied_feedback;
		$psat['unsatisfied_count'] = $unsatisfied_count;
		$psat['unsatisfied_feedback'] = $unsatisfied_feedback;
		// $psat['neutral_count'] = $neutral_count;
		// $psat['neutral_feedbacks'] = $neutral_feedbacks;
		// $psat['tickets'] = $tickets;
		return $psat;
	}





	public function recent_comments($table_feedback, $sorttime, $setup)
	{
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		}
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		$recent_comments = $query->result();
		$dataexport = array();
		$this->db->select($setup . '.*');
		$this->db->from($setup);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		$sresult = $query->result();
		foreach ($sresult as $r) {
			$setarray[$r->type] = $r->title;
			$questionarray[$r->shortkey] = $r->shortkey;
		}

		$i = 0;

		foreach ($recent_comments as $row) {
			$data = json_decode($row->dataset, true);
			$dataexport[$i]['id'] = $row->id;
			$dataexport[$i]['name'] = $data['name'];
			$dataexport[$i]['patientid'] = $data['patientid'];
			$dataexport[$i]['ward'] = $data['ward'];
			$dataexport[$i]['bed'] = $data['bedno'];
			$dataexport[$i]['suggestions']  = $data['suggestionText'];
			$dataexport[$i]['avgrating']  = $data['overallScore'];
			foreach ($setarray as $key => $t) {
				if ($data['comment'][$key]) {
					$dataexport[$i]['comment'] = $data['comment'];
				}
				foreach ($questionarray as $skey => $tss) {
					$dataexport[$i]['reason'] = $data['reason'];
				}
			}
			$i++;
		}
		return $dataexport;
	}

	public function feedbacks_data($table_feedback, $sorttime, $setup)
	{
		//date capture from session data
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		// floor/ ward condition
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		}
		// date condition for querry
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		$feedbacks_data = $query->result();
		$dataexport = array();
		//index varriable
		$i = 0;
		//questions and set for comparison 
		$this->db->select($setup . '.*');
		$this->db->from($setup);
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		$sresult = $query->result();
		foreach ($sresult as $r) {
			$setarray[$r->type] = $r->title;
		}
		foreach ($sresult as $r) {
			//change short key to question if question has to be displayed.
			$questionarray[$r->shortkey] = $r->shortkey;
		}

		foreach ($feedbacks_data as $row) {
			$data = json_decode($row->dataset, true);
			$dataexport['id'] = $row->id;
			$dataexport['name'] = $data['name'];
			$dataexport['patientid'] = $data['patientid'];
			$dataexport['mobile'] = $data['contactnumber'];
			$dataexport['ward'] = $data['ward'];
			$dataexport['bed'] = $data['bedno'];
			$dataexport['suggestions']  = $data['suggestionText'];
			$dataexport['average_rating']  = $data['overallScore'];
			$dataexport['source']  = $row->source;
			$dataexport['feedtime']  = date('g:i A, d-m-y', strtotime($row->datetime));
			foreach ($setarray as $key => $t) {
				if ($data['comment'][$key]) {
					$dataexport[$i][$t] = $data['comment'][$key];
					// $dataexport[$i]['reason'] = $data;
				}
			}
			foreach ($questionarray as $key => $t3) {
				if ($data['reason'][$key]) {
					$dataexport[$i]['reason'] = $t3;
				}
			}
			$i++;
		}
		return $dataexport;
		//returns array with all demography of the patient.
	}

	//keep
	public function reason_to_choose_hospital($table_feedback, $sorttime)
	{
		// print_r($_SESSION);
		//date capture from session data
		$fdate = date('Y-m-d', strtotime($_SESSION['from_date']));
		$tdate = date('Y-m-d', strtotime($_SESSION['to_date']));
		$this->db->select($table_feedback . '.*');
		$this->db->from($table_feedback);
		// floor/ ward condition
		if (isset($_SESSION['ward']) && $_SESSION['ward'] != 'ALL') {
			// Use ward only if floorwise doesn't exist
			$this->db->where($table_feedback . '.ward', $_SESSION['ward']);
		} elseif (count($this->session->userdata['floor_ward']) > 0) {
			$floorwiseArray = $this->session->userdata['floor_ward'];
			$this->db->where_in($table_feedback . '.ward', $floorwiseArray);
		}


		// date condition for querry
		$this->db->where($table_feedback . '.datet <=', $fdate);
		$this->db->where($table_feedback . '.datet >=', $tdate);
		$this->db->order_by('datetime', $sorttime);
		$query = $this->db->get();
		$reason_to_choose_hospital = $query->result();
		$t = 0;
		$i = 0;
		$piechart = array();
		$choice_array = array('location' => 'Location', 'specificservice' => 'Specific services offered', 'referred' => 'Referred by doctors', 'friend' => 'Friend/Family recommendation', 'previous' => 'Previous experience', 'docAvailability' => 'Insurance facilities', 'companyRecommend' => 'Company Recommendation', 'otherReason' => 'Print or Online Media');
		$tcount = 0;
		foreach ($choice_array as $row => $v) {
			foreach ($reason_to_choose_hospital as $r) {
				$param = json_decode($r->dataset, true);
				foreach ($param as $k => $rval) {
					if ($k == $row) {
						if ($param[$k] != '') {
							$tcount++;
						}
					}
				}
			}
		}
		$t = 0;
		foreach ($choice_array as $row => $v) {
			$count = 0;
			foreach ($reason_to_choose_hospital as $r) {
				$param = json_decode($r->dataset, true);
				foreach ($param as $k => $rval) {
					if ($k == $row) {
						if ($param[$k] != '') {
							$count++;
						}
					}
				}
			}
			if ($count > 0) {
				$percentage = ($count / $tcount) * 100;
			} else {
				$percentage = 0;
			}

			if ($t == 0) {
				$t = 1;
				$piechart[$i]['percentage'] .= round(($percentage));
				$piechart[$i]['title'] .= $v;
				$piechart[$i]['count'] .= $count;
				$oba[$i] = (object)$piechart[$i];
			} else {
				$piechart[$i]['percentage'] .=   round(($percentage));
				$piechart[$i]['title'] .= $v;
				$piechart[$i]['count'] .=  $count;
				$oba[$i] = (object)$piechart[$i];
			}
			$i++;
		}
		return $oba;
	}


	//keep
	public function key_highlights($table_patients, $table_feedback, $sorttime, $setup)
	{


		$highestPercentage = -1; // Initial value to ensure any positive value in the array is higher
		$lowestPercentage = 101; // Initial value to ensure any value in the array is lower
		$highestName = "";
		$lowestName = "";

		$highestCount = -1; // Initial value to ensure any positive value in the array is higher
		$lowestCount = PHP_INT_MAX; // Set initial value to the largest possible integer value
		$highestSubParam = "";
		$lowestSubParam = "";

		$res = $this->key_highlights2($table_patients, $table_feedback, $sorttime, $setup);
		foreach ($res['parent'] as $item) {
			$percentage = $item['parent_percentage'];
			if ($percentage > 0) { // exclude zeros
				if ($percentage > $highestPercentage) {
					$highestPercentage = $percentage;
					$highestName = $item['parent_param'];
					$highesthortkey = $item['shortkey'];
				}
				if ($percentage < $lowestPercentage) {
					$lowestPercentage = $percentage;
					$lowestName = $item['parent_param'];
					$lowestshortkey = $item['shortkey'];
				}
			}
		}

		foreach ($res['sub'] as $item) {
			$count = $item['sub_count'];
			if ($count > 0) {
				if ($count > $highestCount) {
					$highestCount = $count;
					$highestSubParam = $item['sub_param'];
					$highestreasonshortkey = $item['shortkey'];
				}
				if ($count < $lowestCount) {
					$lowestCount = $count;
					$lowestSubParam = $item['sub_param'];
					$lowestreasonshortkey = $item['shortkey'];
				}
			}
		}

		$keyhighlights = array();
		$keyhighlights['best_param'] = $highestName;
		$keyhighlights['highestvalue'] = $highestPercentage;
		$keyhighlights['highesthortkey'] = $highesthortkey;

		$keyhighlights['lowest_param'] = $lowestName;
		$keyhighlights['lowestvalue'] = $lowestPercentage;
		$keyhighlights['lowestshortkey'] = $lowestshortkey;

		$keyhighlights['badparam'] = $highestSubParam;


		$keyhighlights['highestCount'] = $highestCount;
		$keyhighlights['highestSubParam'] = $highestSubParam;
		$keyhighlights['highestreasonshortkey'] = $highestreasonshortkey;


		$keyhighlights['lowestCount'] = $lowestCount;
		$keyhighlights['lowestSubParam'] = $lowestSubParam;
		$keyhighlights['lowestreasonshortkey'] = $lowestreasonshortkey;


		// print_r($keyhighlights);
		return $keyhighlights;
	}



	public function tickets_recived_by_department_interim($type, $table_feedback, $table_tickets)
	{
		$department = $this->get_departmentint($type);
		$i = 0;
		$all_tickes = $this->get_tickets($table_feedback, $table_tickets);
		$report = array();
		$response = array();
		$department_set = array();
		foreach ($department as $departmentRow) {
			if (isset($department_set[$departmentRow->setkey])) {
				$department_set[$departmentRow->setkey]['department_id_set'][] = $departmentRow->dprt_id;
			} else {
				$department_set[$departmentRow->setkey] = array();
				$department_set[$departmentRow->setkey]['department_id_set'] = array();
				$department_set[$departmentRow->setkey]['department_id_set'][] = $departmentRow->dprt_id;
				$department_set[$departmentRow->setkey]['department_name'] = $departmentRow->description;
			}
			asort($department_set);
		}
		$set = array();
		foreach ($department_set as $key => $department_set_row) {
			// echo '<pre>';
			// print_r($department_set_row); exit;
			$data =  $this->get_toal_ticket_by_department_interim($all_tickes, $department_set_row);
			$percentage  = $data['percentage'];
			$total_count  = $data['total_count'];
			$open_tickets = $data['open_tickets'];
			$closed_tickets = $data['closed_tickets'];
			$addressed_tickets = $data['addressed_tickets'];
			$tr_rate = $data['tr_rate'];
			$res_time = $data['res_time'];
			// $total_tickets = $data['total_tickets'];
			$set[$i]['department'] = $department_set_row['department_name'];

			$set[$i]['percentage'] = $percentage;
			$set[$i]['total_count'] = $total_count;
			$set[$i]['closed_tickets'] = $closed_tickets;
			$set[$i]['open_tickets'] = $open_tickets;
			$set[$i]['addressed_tickets'] = $addressed_tickets;
			$set[$i]['tr_rate'] = $tr_rate;
			$set[$i]['res_time'] = $res_time;
			$i++;
		}
		return $set;
	}


	private function get_toal_ticket_by_department_interim($tickes, $department_set_row)
	{
		$total_count = 0;
		$total_percentage = 0;
		$open_tickets = 0;
		$closed_tickets = 0;
		$addressed_tickets = 0;
		$time = 0;
		foreach ($tickes as $row) {
			if (in_array($row->departmentid, $department_set_row['department_id_set'])) {
				$total_count++;
			}
		}
		foreach ($tickes as $row) {
			if (in_array($row->departmentid, $department_set_row['department_id_set']) && $row->status == 'Open') {
				$open_tickets++;
			}
			if (in_array($row->departmentid, $department_set_row['department_id_set']) && $row->status == 'Closed') {
				$closed_tickets++;
				$time += strtotime($row->last_modified) - strtotime($row->created_on);
			}
			if (in_array($row->departmentid, $department_set_row['department_id_set']) && $row->status == 'Addressed') {
				$addressed_tickets++;
			}
		}
		if ($total_count > 0 && count($tickes) > 0) {
			$total_percentage = round(($total_count / count($tickes)) * 100);
		}
		if ($closed_tickets > 0 && count($tickes) > 0) {
			$tr_rate = round(($closed_tickets / count($tickes)) * 100);
			$seconds = $time / $closed_tickets;
		} else {
			$tr_rate = 0;
		}

		$data = array();
		$data['percentage'] = $total_percentage;
		$data['total_count'] = $total_count;
		$data['open_tickets'] = $open_tickets;
		$data['closed_tickets'] = $closed_tickets;
		$data['addressed_tickets'] = $addressed_tickets;
		$data['tr_rate'] = $tr_rate;
		$data['res_time'] = $seconds;
		// $data['total_tickets'] = count($tickes);
		return $data;
	}
}
