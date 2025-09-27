<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_primarycare_closed_mdc');
$results = $query->result();
// print_r($results);
$row = $results[0];
$param = json_decode($row->dataset, true);
// '<pre>';
// print_r($param);
?>


<div class="content">
    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><a href="javascript:void()" data-toggle="tooltip" title="<?php echo lang_loader('ip', 'audit_id_tooltip'); ?>">
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp; Clinicians-Primary Care provider (Closed) - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_primarycare_closed_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
                    <table class="table table-striped table-bordered  no-footer dtr-inline collapsed">

                        <tr>
                            <td>
                                <b>Audit Details</b>
                            </td>
                            <td style="overflow: clip;">
                                Audit Name: <?php echo $param['audit_type']; ?>
                                <br>
                                Date & Time of Audit: <?php echo date('Y-m-d H:i', strtotime($row->datetime)); ?>
                                <br>
                                Audit by: <?php echo $param['audit_by']; ?>

                                <!-- Hidden inputs -->
                                <input class="form-control" type="hidden" name="audit_type" value="<?php echo $param['audit_type']; ?>" />
                                <input class="form-control" type="hidden" name="datetime" value="<?php echo $row->datetime; ?>" />
                                <input class="form-control" type="hidden" name="audit_by" value="<?php echo $param['audit_by']; ?>" />
                            </td>
                        </tr>


                    </table>

                    <table class="table table-striped table-bordered no-footer dtr-inline collapsed">
                        <tr>
                            <td style="width: 43%;"><b>Patient MID</b></td>
                            <td>
                                <input class="form-control" type="text" name="mid_no" value="<?php echo $param['mid_no']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Patient Name</b></td>
                            <td>
                                <input class="form-control" type="text" name="patient_name" value="<?php echo $param['patient_name']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Patient Age</b></td>
                            <td>
                                <input class="form-control" type="text" name="patient_age" value="<?php echo $param['patient_age']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Patient Gender</b></td>
                            <td>
                                <input class="form-control" type="text" name="patient_gender" value="<?php echo $param['patient_gender']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Area</b></td>
                            <td>
                                <input class="form-control" type="text" name="location" value="<?php echo $param['location']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Department</b></td>
                            <td>
                                <input class="form-control" type="text" name="department" value="<?php echo $param['department']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Attended Doctor</b></td>
                            <td>
                                <input class="form-control" type="text" name="attended_doctor" value="<?php echo $param['attended_doctor']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Admission Date & Time</b></td>
                            <td>
                                <input class="form-control" type="text" name="initial_assessment_hr6" value="<?php echo $param['initial_assessment_hr6']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><b>Discharge Date & Time</b></td>
                            <td>
                                <input class="form-control" type="text" name="discharge_date_time" value="<?php echo $param['discharge_date_time']; ?>">
                            </td>
                        </tr>
                            <tr>
                                <th colspan="2">Consents</th>
                            </tr>
                            
                            <tr>
                                <td>Is the general consent form available in the health record of an inpatient?</td>
                                <td>
                                    <input type="text" name="identification_details" class="form-control"
                                           value="<?php echo htmlspecialchars($param['identification_details']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="identification_details_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['identification_details_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the general consent form complete?</td>
                                <td>
                                    <input type="text" name="vital_signs" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vital_signs']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="vital_signs_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vital_signs_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the high-risk procedures and treatments consent form (includes surgical or invasive procedures) is available in the health record of an applicable patient?</td>
                                <td>
                                    <input type="text" name="surgery" class="form-control"
                                           value="<?php echo htmlspecialchars($param['surgery']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="surgery_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['surgery_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the blood and blood products consent form available in the health record of an applicable patient?</td>
                                <td>
                                    <input type="text" name="complaints_communicated" class="form-control"
                                           value="<?php echo htmlspecialchars($param['complaints_communicated']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="complaints_communicated_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['complaints_communicated_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the blood and blood products consent form complete?</td>
                                <td>
                                    <input type="text" name="ensure" class="form-control"
                                           value="<?php echo htmlspecialchars($param['ensure']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="ensure_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['ensure_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are No abbreviations used on consent forms?</td>
                                <td>
                                    <input type="text" name="intake" class="form-control"
                                           value="<?php echo htmlspecialchars($param['intake']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="intake_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['intake_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is The signature of patient or representative, witness, and individual obtaining consent obtained?</td>
                                <td>
                                    <input type="text" name="output" class="form-control"
                                           value="<?php echo htmlspecialchars($param['output']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="output_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['output_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2">Assessments</th>
                            </tr>
                            
                            <tr>
                                <td>Is the initial medical assessment completed within the first 24 hours of admission?</td>
                                <td>
                                    <input type="text" name="focus" class="form-control"
                                           value="<?php echo htmlspecialchars($param['focus']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="focus_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['focus_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Chief complaints and history are documented in Initial assessment?</td>
                                <td>
                                    <input type="text" name="meti" class="form-control"
                                           value="<?php echo htmlspecialchars($param['meti']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="meti_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['meti_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the medication history documented in initial assessment?</td>
                                <td>
                                    <input type="text" name="diagnostic" class="form-control"
                                           value="<?php echo htmlspecialchars($param['diagnostic']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="diagnostic_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['diagnostic_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the physical findings and diagnosis documented in Initial assessment?</td>
                                <td>
                                    <input type="text" name="lab_results" class="form-control"
                                           value="<?php echo htmlspecialchars($param['lab_results']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="lab_results_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['lab_results_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Significant Data Sheet complete, (outpatient Profile)?</td>
                                <td>
                                    <input type="text" name="pending_investigation" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pending_investigation']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="pending_investigation_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pending_investigation_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the patient's name and health record number correct?</td>
                                <td>
                                    <input type="text" name="medicine_order" class="form-control"
                                           value="<?php echo htmlspecialchars($param['medicine_order']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="medicine_order_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['medicine_order_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Blood Investigation section completed correctly, if applicable?</td>
                                <td>
                                    <input type="text" name="psychological" class="form-control"
                                           value="<?php echo htmlspecialchars($param['psychological']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="psychological_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['psychological_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Known Allergies section completed correctly?</td>
                                <td>
                                    <input type="text" name="vulnerab" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vulnerab']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="vulnerab_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vulnerab_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Medication section completed correctly?</td>
                                <td>
                                    <input type="text" name="social" class="form-control"
                                           value="<?php echo htmlspecialchars($param['social']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="social_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['social_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Immunization section completed correctly, if applicable?</td>
                                <td>
                                    <input type="text" name="nutri" class="form-control"
                                           value="<?php echo htmlspecialchars($param['nutri']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="nutri_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['nutri_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are there dates and initials or signature against all applicable entries?</td>
                                <td>
                                    <input type="text" name="spiritual" class="form-control"
                                           value="<?php echo htmlspecialchars($param['spiritual']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="spiritual_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['spiritual_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are Only approved abbreviations used?</td>
                                <td>
                                    <input type="text" name="suicide" class="form-control"
                                           value="<?php echo htmlspecialchars($param['suicide']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="suicide_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['suicide_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are Patient and Family Education section of the Physician's Admission History and Physical Assessment completed?</td>
                                <td>
                                    <input type="text" name="risk" class="form-control"
                                           value="<?php echo htmlspecialchars($param['risk']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="risk_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['risk_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Discharge Planning section of the Physician's Admission History and Physical Assessment completed?</td>
                                <td>
                                    <input type="text" name="care" class="form-control"
                                           value="<?php echo htmlspecialchars($param['care']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="care_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['care_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the patient screened for nutritional status and referred as necessary?</td>
                                <td>
                                    <input type="text" name="pfe" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pfe']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="pfe_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['pfe_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the patient screened for functional status and referred as necessary?</td>
                                <td>
                                    <input type="text" name="disch" class="form-control"
                                           value="<?php echo htmlspecialchars($param['disch']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="disch_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['disch_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the patient reassessed daily. (Progress Notes)?</td>
                                <td>
                                    <input type="text" name="facility_communicated" class="form-control"
                                           value="<?php echo htmlspecialchars($param['facility_communicated']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="facility_communicated_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['facility_communicated_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the diagnosis documented in Progress Note?</td>
                                <td>
                                    <input type="text" name="health_education" class="form-control"
                                           value="<?php echo htmlspecialchars($param['health_education']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="health_education_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['health_education_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are the complaints and physical findings documented in Progress Note?</td>
                                <td>
                                    <input type="text" name="remarks1" class="form-control"
                                           value="<?php echo htmlspecialchars($param['remarks1']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="remarks1_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['remarks1_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are the patient status and special issues documented in Progress Note?</td>
                                <td>
                                    <input type="text" name="urethral" class="form-control"
                                           value="<?php echo htmlspecialchars($param['urethral']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="urethral_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['urethral_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is Planned care documented in the form of measurable progress (goals)?</td>
                                <td>
                                    <input type="text" name="urine_sample" class="form-control"
                                           value="<?php echo htmlspecialchars($param['urine_sample']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="urine_sample_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['urine_sample_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is Planned Care reviewed by other disciplines?</td>
                                <td>
                                    <input type="text" name="bystander" class="form-control"
                                           value="<?php echo htmlspecialchars($param['bystander']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="bystander_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['bystander_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2">Orders</th>
                            </tr>
                            
                            <tr>
                                <td>Is a list of medications taken prior to admission documented (or there is documentation of none taken)?</td>
                                <td>
                                    <input type="text" name="instruments" class="form-control"
                                           value="<?php echo htmlspecialchars($param['instruments']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="instruments_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['instruments_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are Medications ordered written in patient's record and complete?</td>
                                <td>
                                    <input type="text" name="sterile" class="form-control"
                                           value="<?php echo htmlspecialchars($param['sterile']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="sterile_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['sterile_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Do PRN orders contain indications?</td>
                                <td>
                                    <input type="text" name="antibiotics" class="form-control"
                                           value="<?php echo htmlspecialchars($param['antibiotics']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="antibiotics_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['antibiotics_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are all physician orders including non-medication orders in a uniform location?</td>
                                <td>
                                    <input type="text" name="surgical_site" class="form-control"
                                           value="<?php echo htmlspecialchars($param['surgical_site']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="surgical_site_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['surgical_site_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are Verbal/ Telephone orders signed within the approved timeframe?</td>
                                <td>
                                    <input type="text" name="wound" class="form-control"
                                           value="<?php echo htmlspecialchars($param['wound']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="wound_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['wound_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is Diet order documented?</td>
                                <td>
                                    <input type="text" name="documented" class="form-control"
                                           value="<?php echo htmlspecialchars($param['documented']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="documented_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['documented_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is it ensured that During all phases of inpatient care, the individual responsible for the patient's care is identified in documentation related to the patient's plan of care?</td>
                                <td>
                                    <input type="text" name="adequate_facilities" class="form-control"
                                           value="<?php echo htmlspecialchars($param['adequate_facilities']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="adequate_facilities_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['adequate_facilities_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Department handover documented,if applicable?</td>
                                <td>
                                    <input type="text" name="sufficient_lighting" class="form-control"
                                           value="<?php echo htmlspecialchars($param['sufficient_lighting']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="sufficient_lighting_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['sufficient_lighting_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are the consultation request and Consultation Response documented in EMR?</td>
                                <td>
                                    <input type="text" name="storage_facility_for_food" class="form-control"
                                           value="<?php echo htmlspecialchars($param['storage_facility_for_food']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="storage_facility_for_food_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['storage_facility_for_food_text']); ?>">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">Discharge summary</th>
                            </tr>
                            
                            <tr>
                                <td>Is Discharge summary complete?</td>
                                <td>
                                    <input type="text" name="personnel_hygiene_facilities" class="form-control"
                                           value="<?php echo htmlspecialchars($param['personnel_hygiene_facilities']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="personnel_hygiene_facilities_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['personnel_hygiene_facilities_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are Discharge and follow up instructions individualized and complete?</td>
                                <td>
                                    <input type="text" name="food_material_testing" class="form-control"
                                           value="<?php echo htmlspecialchars($param['food_material_testing']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="food_material_testing_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['food_material_testing_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is Record of transferred patient complete?</td>
                                <td>
                                    <input type="text" name="incoming_material" class="form-control"
                                           value="<?php echo htmlspecialchars($param['incoming_material']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="incoming_material_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['incoming_material_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is the Name of accepting physician/organization documented?</td>
                                <td>
                                    <input type="text" name="raw_materials_inspection" class="form-control"
                                           value="<?php echo htmlspecialchars($param['raw_materials_inspection']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="raw_materials_inspection_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['raw_materials_inspection_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is Transfer summary report complete?</td>
                                <td>
                                    <input type="text" name="storage_of_materials" class="form-control"
                                           value="<?php echo htmlspecialchars($param['storage_of_materials']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="storage_of_materials_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['storage_of_materials_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Is it ensured that No abbreviations are used in discharge summary?</td>
                                <td>
                                    <input type="text" name="raw_materials_cleaning" class="form-control"
                                           value="<?php echo htmlspecialchars($param['raw_materials_cleaning']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="raw_materials_cleaning_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['raw_materials_cleaning_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Does the discharge summary contain information on when to obtain urgent care and how to obtain urgent care?</td>
                                <td>
                                    <input type="text" name="equipment_sanitization" class="form-control"
                                           value="<?php echo htmlspecialchars($param['equipment_sanitization']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="equipment_sanitization_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['equipment_sanitization_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are Medication and follow up advice documented in Discharge summary?</td>
                                <td>
                                    <input type="text" name="frozen_food_thawing" class="form-control"
                                           value="<?php echo htmlspecialchars($param['frozen_food_thawing']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="frozen_food_thawing_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['frozen_food_thawing_text']); ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Are Significant findings and diagnosis documented in Discharge Summary?</td>
                                <td>
                                    <input type="text" name="vegetarian_and_non_vegetarian" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vegetarian_and_non_vegetarian']); ?>"><br>
                                    Remarks:
                                    <input type="text" name="vegetarian_and_non_vegetarian_text" class="form-control"
                                           value="<?php echo htmlspecialchars($param['vegetarian_and_non_vegetarian_text']); ?>">
                                </td>
                            </tr>

                            











                            









                                    

                                    

                                



                        <!-- Save/Reset Buttons -->
                        <tr>
                            <td colspan="2">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="ui buttons">
                                        <button type="reset" class="ui button">
                                            <?php echo display('reset') ?>
                                        </button>
                                        <div class="or"></div>
                                        <button type="submit" id="saveButton" class="ui positive button" style="text-align: left;">
                                            <?php echo display('save') ?>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </table>

                    

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Initialize flags to track if values have been edited and if calculation is done
    var valuesEdited = false;
    var calculationDone = false;

    // Function to call when values are edited
    function onValuesEdited() {
        valuesEdited = true;
        calculationDone = false; // Reset calculation flag when values are edited
    }

    // Add event listeners to input elements to call the onValuesEdited function
    document.getElementById('formula_para1_hr').addEventListener('input', onValuesEdited);
    document.getElementById('formula_para1_min').addEventListener('input', onValuesEdited);
    document.getElementById('formula_para1_sec').addEventListener('input', onValuesEdited);
    document.getElementById('formula_para1_bt').addEventListener('input', onValuesEdited);



    // Function to check if values have been edited before form submission
    function checkValuesBeforeSubmit() {
        if (valuesEdited && !calculationDone) {
            alert('Please calculate before saving');
            event.preventDefault();
            return false;
        }
        return true;
    }


    // Add an event listener to the save button
    document.getElementById('saveButton').addEventListener('click', function() {

        if (checkValuesBeforeSubmit()) {
            // Proceed with save action
            console.log('Data saved successfully.');
            // You can use AJAX or form submission here
        }
    });

    // Add event listener to the calculate button
    document.querySelector('button[onclick="calculateTimeFormat()"]').addEventListener('click', calculateTimeFormat);
    document.querySelector('button[onclick="calculateTimeFor()"]').addEventListener('click', calculateTimeFor);


    function calculateTimeFormat() {
        // Retrieve the admission and assessment times from the input fields
        var admissionTime = document.querySelector('input[name="initial_assessment_hr1"]').value;
        var assessmentTime = document.querySelector('input[name="initial_assessment_hr2"]').value;

        // Convert the time strings to Date objects
        var admissionDate = new Date(admissionTime);
        var assessmentDate = new Date(assessmentTime);

        // Validation checks
        if (isNaN(admissionDate.getTime())) {
            alert("Please enter admitted time.");
            return;
        }

        if (isNaN(assessmentDate.getTime())) {
            alert("Please enter initial assessment time.");
            return;
        }

        if (assessmentDate <= admissionDate) {
            alert("Initial assessment time must be greater than admitted time.");
            return;
        }

        // Calculate the time difference in milliseconds
        var timeDifferenceMs = assessmentDate - admissionDate;

        // Convert the time difference to hours, minutes, and seconds
        var totalSeconds = Math.floor(timeDifferenceMs / 1000);
        var hours = Math.floor(totalSeconds / 3600);
        var minutes = Math.floor((totalSeconds % 3600) / 60);
        var seconds = totalSeconds % 60;

        // Format the calculated time as a string
        var formattedTime = `${hours}:${('0' + minutes).slice(-2)}:${('0' + seconds).slice(-2)}`;

        // Set the formatted time to the hidden input field
        document.getElementById('formattedTime').value = formattedTime;

        // Display the calculated result in the corresponding input field
        document.querySelector('input[name="calculatedResult"]').value = formattedTime;

        console.log("Admitted Time:", admissionTime);
        console.log("Initial Assessment Time:", assessmentTime);
        console.log("Time Taken for Initial Assessment:", formattedTime);
        calculationDone = true;
    }


    function calculateTimeFor() {
        // Retrieve the admission and assessment times from the input fields
        var admissionTime = document.querySelector('input[name="initial_assessment_hr3"]').value;
        var assessmentTime = document.querySelector('input[name="initial_assessment_hr4"]').value;

        // Convert the time strings to Date objects
        var admissionDate = new Date(admissionTime);
        var assessmentDate = new Date(assessmentTime);

        // Validation checks
        if (isNaN(admissionDate.getTime())) {
            alert("Please enter discharge advice time.");
            return;
        }

        if (isNaN(assessmentDate.getTime())) {
            alert("Please enter billing time.");
            return;
        }

        if (assessmentDate <= admissionDate) {
            alert("Billing time must be greater than discharge advice time.");
            return;
        }

        // Calculate the time difference in milliseconds
        var timeDifferenceMs = assessmentDate - admissionDate;

        // Convert the time difference to hours, minutes, and seconds
        var totalSeconds = Math.floor(timeDifferenceMs / 1000);
        var hours = Math.floor(totalSeconds / 3600);
        var minutes = Math.floor((totalSeconds % 3600) / 60);
        var seconds = totalSeconds % 60;

        // Format the calculated time as a string
        var formattedTime = `${hours}:${('0' + minutes).slice(-2)}:${('0' + seconds).slice(-2)}`;

        // Set the formatted time to the hidden input field
        document.getElementById('formattedTime').value = formattedTime;

        // Display the calculated result in the corresponding input field
        document.querySelector('input[name="calculatedDoctorAdviceToBillPaid"]').value = formattedTime;

        console.log("Admitted Time:", admissionTime);
        console.log("Initial Assessment Time:", assessmentTime);
        console.log("Time Taken for Initial Assessment:", formattedTime);
        calculationDone = true;
    }
</script>