<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_nursingip_open_cases');
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
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp; Nursing (IP Open Cases) - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_nursing_ip_open_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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
                                <th colspan="2">Arcus Air Entries</th>
                            </tr>
                            <tr>
                                <td><b>Are allergy entries documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="identification_details"
                                        value="<?php echo $param['identification_details']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="identification_details_text"
                                        value="<?php echo $param['identification_details_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Are verbal/telephonic orders compliant with IPSG:2?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="vital_signs"
                                        value="<?php echo $param['vital_signs']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="vital_signs_text"
                                        value="<?php echo $param['vital_signs_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Are all medication orders administered through HIS (eMAR)?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="surgery"
                                        value="<?php echo $param['surgery']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="surgery_text"
                                        value="<?php echo $param['surgery_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is triage documentation in emergency recorded?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="complaints_communicated"
                                        value="<?php echo $param['complaints_communicated']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="complaints_communicated_text"
                                        value="<?php echo $param['complaints_communicated_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2">Blood Transfusion Monitoring Record</th>
                            </tr>
                            <tr>
                                <td><b>Is compliance to blood transfusion monitoring recorded?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="intake"
                                        value="<?php echo $param['intake']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="intake_text"
                                        value="<?php echo $param['intake_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2">Cathlab Flow Sheet</th>
                            </tr>
                            <tr>
                                <td><b>Is intra-cath monitoring performed?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="output"
                                        value="<?php echo $param['output']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="output_text"
                                        value="<?php echo $param['output_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is post-cath monitoring performed?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="focus"
                                        value="<?php echo $param['focus']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="focus_text"
                                        value="<?php echo $param['focus_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is pre-cath monitoring performed?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="meti"
                                        value="<?php echo $param['meti']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="meti_text"
                                        value="<?php echo $param['meti_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2">Haemodialysis Record</th>
                            </tr>
                            <tr>
                                <td><b>Is there evidence of pain screening during initial assessment?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="lab_results"
                                        value="<?php echo $param['lab_results']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="lab_results_text"
                                        value="<?php echo $param['lab_results_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2">Nursing Shift Record</th>
                            </tr>
                            <tr>
                                <td><b>Is the ability to learn, barriers to learning, and learning needs documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="psychological"
                                        value="<?php echo $param['psychological']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="psychological_text"
                                        value="<?php echo $param['psychological_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is the care plan documentation available?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="vulnerab"
                                        value="<?php echo $param['vulnerab']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="vulnerab_text"
                                        value="<?php echo $param['vulnerab_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">Nursing Shift Record (Continued)</th>
                            </tr>
                            <tr>
                                <td><b>Is fall risk reassessment completed in every shift?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="social"
                                        value="<?php echo $param['social']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="social_text"
                                        value="<?php echo $param['social_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is shift-to-shift handover entry available?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="nutri"
                                        value="<?php echo $param['nutri']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="nutri_text"
                                        value="<?php echo $param['nutri_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is handover during inter-department transfer documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="spiritual"
                                        value="<?php echo $param['spiritual']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="spiritual_text"
                                        value="<?php echo $param['spiritual_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Are invasive lines records documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="suicide"
                                        value="<?php echo $param['suicide']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="suicide_text"
                                        value="<?php echo $param['suicide_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is MEWS monitoring in wards done as per policy?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="risk"
                                        value="<?php echo $param['risk']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="risk_text"
                                        value="<?php echo $param['risk_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is pain reassessment recorded, if applicable?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="care"
                                        value="<?php echo $param['care']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="care_text"
                                        value="<?php echo $param['care_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is risk of self-harm assessment documented, if applicable?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="pfe"
                                        value="<?php echo $param['pfe']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="pfe_text"
                                        value="<?php echo $param['pfe_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2">Nursing Form Daycare</th>
                            </tr>
                            <tr>
                                <td><b>Is the ability to learn, barriers to learning, and learning needs documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="disch"
                                        value="<?php echo $param['disch']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="disch_text"
                                        value="<?php echo $param['disch_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is the care plan documentation available?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="facility_communicated"
                                        value="<?php echo $param['facility_communicated']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="facility_communicated_text"
                                        value="<?php echo $param['facility_communicated_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is fall risk assessment completed within 2 hours of admission?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="health_education"
                                        value="<?php echo $param['health_education']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="health_education_text"
                                        value="<?php echo $param['health_education_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is fall risk reassessment completed, if applicable?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="remarks1"
                                        value="<?php echo $param['remarks1']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="remarks1_text"
                                        value="<?php echo $param['remarks1_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is nursing initial assessment completed within 60 minutes?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="urethral"
                                        value="<?php echo $param['urethral']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="urethral_text"
                                        value="<?php echo $param['urethral_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is pain reassessment recorded, if applicable?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="urine_sample"
                                        value="<?php echo $param['urine_sample']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="urine_sample_text"
                                        value="<?php echo $param['urine_sample_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is pain screening done during initial assessment?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="bystander"
                                        value="<?php echo $param['bystander']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="bystander_text"
                                        value="<?php echo $param['bystander_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is patient and family education status documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="instruments"
                                        value="<?php echo $param['instruments']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="instruments_text"
                                        value="<?php echo $param['instruments_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is screening for abuse and neglect during initial assessment documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="sterile"
                                        value="<?php echo $param['sterile']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="sterile_text"
                                        value="<?php echo $param['sterile_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is screening for alcohol or drug dependency during initial assessment documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="antibiotics"
                                        value="<?php echo $param['antibiotics']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="antibiotics_text"
                                        value="<?php echo $param['antibiotics_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">Nursing Initial Assessment - ED</th>
                            </tr>
                            <tr>
                                <td><b>Is the ability to learn, barriers to learning, and learning needs documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="surgical_site"
                                        value="<?php echo $param['surgical_site']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="surgical_site_text"
                                        value="<?php echo $param['surgical_site_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is the care plan documentation available?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="wound"
                                        value="<?php echo $param['wound']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="wound_text"
                                        value="<?php echo $param['wound_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is fall risk screening completed within 30 minutes of registration/billing?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="documented"
                                        value="<?php echo $param['documented']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="documented_text"
                                        value="<?php echo $param['documented_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is nursing initial assessment completed within 30 minutes?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="adequate_facilities"
                                        value="<?php echo $param['adequate_facilities']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="adequate_facilities_text"
                                        value="<?php echo $param['adequate_facilities_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is pain screening done during initial assessment?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="sufficient_lighting"
                                        value="<?php echo $param['sufficient_lighting']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="sufficient_lighting_text"
                                        value="<?php echo $param['sufficient_lighting_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is patient and family education status documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="storage_facility_for_food"
                                        value="<?php echo $param['storage_facility_for_food']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="storage_facility_for_food_text"
                                        value="<?php echo $param['storage_facility_for_food_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is screening for abuse and neglect during initial assessment documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="personnel_hygiene_facilities"
                                        value="<?php echo $param['personnel_hygiene_facilities']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="personnel_hygiene_facilities_text"
                                        value="<?php echo $param['personnel_hygiene_facilities_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is screening for alcohol or drug dependency during initial assessment documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="food_material_testing"
                                        value="<?php echo $param['food_material_testing']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="food_material_testing_text"
                                        value="<?php echo $param['food_material_testing_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            
                            <tr>
                                <th colspan="2">Nursing Initial Assessment - IPD</th>
                            </tr>
                            <tr>
                                <td><b>Is the ability to learn, barriers to learning, and learning needs documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="incoming_material"
                                        value="<?php echo $param['incoming_material']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="incoming_material_text"
                                        value="<?php echo $param['incoming_material_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is care plan documentation available?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="raw_materials_inspection"
                                        value="<?php echo $param['raw_materials_inspection']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="raw_materials_inspection_text"
                                        value="<?php echo $param['raw_materials_inspection_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is fall risk assessment completed within 2 hours of admission?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="storage_of_materials"
                                        value="<?php echo $param['storage_of_materials']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="storage_of_materials_text"
                                        value="<?php echo $param['storage_of_materials_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is nursing initial assessment completed within 4 hours for ICU patients?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="raw_materials_cleaning"
                                        value="<?php echo $param['raw_materials_cleaning']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="raw_materials_cleaning_text"
                                        value="<?php echo $param['raw_materials_cleaning_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is nursing initial assessment completed within 6 hours for ward patients?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="equipment_sanitization"
                                        value="<?php echo $param['equipment_sanitization']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="equipment_sanitization_text"
                                        value="<?php echo $param['equipment_sanitization_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is pain screening done during initial assessment?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="frozen_food_thawing"
                                        value="<?php echo $param['frozen_food_thawing']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="frozen_food_thawing_text"
                                        value="<?php echo $param['frozen_food_thawing_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is patient and family education status documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="vegetarian_and_non_vegetarian"
                                        value="<?php echo $param['vegetarian_and_non_vegetarian']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="vegetarian_and_non_vegetarian_text"
                                        value="<?php echo $param['vegetarian_and_non_vegetarian_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is screening for abuse and neglect during initial assessment documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="cooked_food_cooling"
                                        value="<?php echo $param['cooked_food_cooling']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="cooked_food_cooling_text"
                                        value="<?php echo $param['cooked_food_cooling_text']; ?>" placeholder="Remarks">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Is screening for alcohol or drug dependency during initial assessment documented?</b></td>
                                <td>
                                    <input class="form-control" type="text" name="food_portioning"
                                        value="<?php echo $param['food_portioning']; ?>"><br>
                                    Remarks:
                                    <input class="form-control" type="text" name="food_portioning_text"
                                        value="<?php echo $param['food_portioning_text']; ?>" placeholder="Remarks">
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