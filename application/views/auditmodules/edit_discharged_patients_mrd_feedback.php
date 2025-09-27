<?php
$id = $this->uri->segment(3);
$this->db->where('id', $id);
$query = $this->db->get('bf_ma_dischargedpatients_mrd_audit');
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
                            <i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp;Discharged Patients MRD Audit - <?php echo $row->id; ?></h3>
                    <!-- <a class="btn btn-primary" style="background-color: #45c203;float: right;    margin-top: -30px;" href="<?php echo base_url("tickets") ?>">
                        <i class="fa fa-list"></i> Tickets Details </a> -->
                </div>
                <div class="panel-body" style="background: #fff;">


                    <?php echo form_open_multipart('audit/edit_discharged_patients_mrd_feedback_byid/' . $this->uri->segment(3), 'class="form-inner"') ?>
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
                                    <th colspan="2">Doctors documentation - Admission note:</th>
                                </tr>
                                <tr>
                                    <td><b>Are Present Complaints documented?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="identification_details"
                                            value="<?php echo $param['identification_details']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="identification_details_text"
                                            value="<?php echo $param['identification_details_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Patient History recorded properly?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="vital_signs"
                                            value="<?php echo $param['vital_signs']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="vital_signs_text"
                                            value="<?php echo $param['vital_signs_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Are Clinical Findings noted?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="surgery"
                                            value="<?php echo $param['surgery']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="surgery_text"
                                            value="<?php echo $param['surgery_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Admitting Diagnosis clearly mentioned?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="complaints_communicated"
                                            value="<?php echo $param['complaints_communicated']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="complaints_communicated_text"
                                            value="<?php echo $param['complaints_communicated_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Plan of Care documented?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="intake"
                                            value="<?php echo $param['intake']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="intake_text"
                                            value="<?php echo $param['intake_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Plan for Discharge prepared?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="output"
                                            value="<?php echo $param['output']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="output_text"
                                            value="<?php echo $param['output_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Patient and Family Education (PFE) provided?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="focus"
                                            value="<?php echo $param['focus']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="focus_text"
                                            value="<?php echo $param['focus_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Medication History documented accurately?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="meti"
                                            value="<?php echo $param['meti']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="meti_text"
                                            value="<?php echo $param['meti_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is the use of abbreviations as per guidelines?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="diagnostic"
                                            value="<?php echo $param['diagnostic']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="diagnostic_text"
                                            value="<?php echo $param['diagnostic_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                            
                                <tr>
                                    <th colspan="2">Doctors documentation - IP notes:</th>
                                </tr>
                                <tr>
                                    <td><b>Are Complaints updated in the notes?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="lab_results"
                                            value="<?php echo $param['lab_results']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="lab_results_text"
                                            value="<?php echo $param['lab_results_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Are Investigation Findings recorded?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="pending_investigation"
                                            value="<?php echo $param['pending_investigation']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="pending_investigation_text"
                                            value="<?php echo $param['pending_investigation_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Are Vital signs monitored and documented?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="medicine_order"
                                            value="<?php echo $param['medicine_order']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="medicine_order_text"
                                            value="<?php echo $param['medicine_order_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Diagnosis clearly mentioned?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="psychological"
                                            value="<?php echo $param['psychological']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="psychological_text"
                                            value="<?php echo $param['psychological_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Plan for Care updated?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="vulnerab"
                                            value="<?php echo $param['vulnerab']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="vulnerab_text"
                                            value="<?php echo $param['vulnerab_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Discharge Plan communicated?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="social"
                                            value="<?php echo $param['social']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="social_text"
                                            value="<?php echo $param['social_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Nutritional Assessment done?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="nutri"
                                            value="<?php echo $param['nutri']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="nutri_text"
                                            value="<?php echo $param['nutri_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Spiritual support provided when required?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="spiritual"
                                            value="<?php echo $param['spiritual']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="spiritual_text"
                                            value="<?php echo $param['spiritual_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is 'Copy and Paste' practice avoided?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="suicide"
                                            value="<?php echo $param['suicide']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="suicide_text"
                                            value="<?php echo $param['suicide_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Are Critical values identified and actions taken?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="risk"
                                            value="<?php echo $param['risk']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="risk_text"
                                            value="<?php echo $param['risk_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Preoperative assessment completed?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="care"
                                            value="<?php echo $param['care']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="care_text"
                                            value="<?php echo $param['care_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                            
                                <tr>
                                    <th colspan="2">Doctors documentation - ICU:</th>
                                </tr>
                                <tr>
                                    <td><b>Are ICU Initial Notes documented?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="pfe"
                                            value="<?php echo $param['pfe']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="pfe_text"
                                            value="<?php echo $param['pfe_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Are ICU Progress Notes updated?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="disch"
                                            value="<?php echo $param['disch']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="disch_text"
                                            value="<?php echo $param['disch_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Are ICU Transfer Notes properly filled?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="health_education"
                                            value="<?php echo $param['health_education']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="health_education_text"
                                            value="<?php echo $param['health_education_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is ICU Handover completed?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="remarks1"
                                            value="<?php echo $param['remarks1']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="remarks1_text"
                                            value="<?php echo $param['remarks1_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Is Abbreviation use compliant with guidelines?</b></td>
                                    <td>
                                        <input class="form-control" type="text" name="urethral"
                                            value="<?php echo $param['urethral']; ?>"><br>
                                        Remarks:
                                        <input class="form-control" type="text" name="urethral_text"
                                            value="<?php echo $param['urethral_text']; ?>" placeholder="Remarks">
                                    </td>
                                </tr>
                                    <tr>
                                        <th colspan="2">Doctors documentation - Anaesthesia Documents:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Pre Anaesthesia Assessment documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="urine_sample"
                                                value="<?php echo $param['urine_sample']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="urine_sample_text"
                                                value="<?php echo $param['urine_sample_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Pre Anaesthesia Order completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="bystander"
                                                value="<?php echo $param['bystander']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="bystander_text"
                                                value="<?php echo $param['bystander_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Post Procedure Notes - Anaesthesia documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="instruments"
                                                value="<?php echo $param['instruments']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="instruments_text"
                                                value="<?php echo $param['instruments_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Pre-Induction Assessment (PIA) completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="sterile"
                                                value="<?php echo $param['sterile']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="sterile_text"
                                                value="<?php echo $param['sterile_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Plan of Anaesthesia prepared?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="antibiotics"
                                                value="<?php echo $param['antibiotics']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="antibiotics_text"
                                                value="<?php echo $param['antibiotics_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Anaesthesia Record complete?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="surgical_site"
                                                value="<?php echo $param['surgical_site']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="surgical_site_text"
                                                value="<?php echo $param['surgical_site_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Consent for Anaesthesia obtained?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="wound"
                                                value="<?php echo $param['wound']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="wound_text"
                                                value="<?php echo $param['wound_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th colspan="2">Doctors documentation - Operation Notes:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Date & Time of procedure recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="documented"
                                                value="<?php echo $param['documented']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="documented_text"
                                                value="<?php echo $param['documented_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Preoperative Assessment documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="adequate_facilities"
                                                value="<?php echo $param['adequate_facilities']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="adequate_facilities_text"
                                                value="<?php echo $param['adequate_facilities_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Pre & Post-Operative Diagnosis recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="sufficient_lighting"
                                                value="<?php echo $param['sufficient_lighting']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="sufficient_lighting_text"
                                                value="<?php echo $param['sufficient_lighting_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Surgery/Procedure Name documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="storage_facility_for_food"
                                                value="<?php echo $param['storage_facility_for_food']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="storage_facility_for_food_text"
                                                value="<?php echo $param['storage_facility_for_food_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Surgeon & Anaesthetist names recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="personnel_hygiene_facilities"
                                                value="<?php echo $param['personnel_hygiene_facilities']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="personnel_hygiene_facilities_text"
                                                value="<?php echo $param['personnel_hygiene_facilities_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Scrub Nurse & OT Technician names documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="food_material_testing"
                                                value="<?php echo $param['food_material_testing']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="food_material_testing_text"
                                                value="<?php echo $param['food_material_testing_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Type of Anaesthesia & Position recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="incoming_material"
                                                value="<?php echo $param['incoming_material']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="incoming_material_text"
                                                value="<?php echo $param['incoming_material_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Procedure Details documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="raw_materials_inspection"
                                                value="<?php echo $param['raw_materials_inspection']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="raw_materials_inspection_text"
                                                value="<?php echo $param['raw_materials_inspection_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Post-Operative Status & Orders updated?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="storage_of_materials"
                                                value="<?php echo $param['storage_of_materials']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="storage_of_materials_text"
                                                value="<?php echo $param['storage_of_materials_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Peri-Operative Complications documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="raw_materials_cleaning"
                                                value="<?php echo $param['raw_materials_cleaning']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="raw_materials_cleaning_text"
                                                value="<?php echo $param['raw_materials_cleaning_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is the amount of blood loss documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="equipment_sanitization"
                                                value="<?php echo $param['equipment_sanitization']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="equipment_sanitization_text"
                                                value="<?php echo $param['equipment_sanitization_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is the amount of blood transfused recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="frozen_food_thawing"
                                                value="<?php echo $param['frozen_food_thawing']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="frozen_food_thawing_text"
                                                value="<?php echo $param['frozen_food_thawing_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <th colspan="2">Doctors documentation - Consents:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is patient identification verified before procedure?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="vegetarian_and_non_vegetarian"
                                                value="<?php echo $param['vegetarian_and_non_vegetarian']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="vegetarian_and_non_vegetarian_text"
                                                value="<?php echo $param['vegetarian_and_non_vegetarian_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is the Name & Type of Anaesthesia documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="cooked_food_cooling"
                                                value="<?php echo $param['cooked_food_cooling']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="cooked_food_cooling_text"
                                                value="<?php echo $param['cooked_food_cooling_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is the Name of Surgery/Procedure recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="food_portioning"
                                                value="<?php echo $param['food_portioning']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="food_portioning_text"
                                                value="<?php echo $param['food_portioning_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is the Doctor and Patient signature obtained?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab1"
                                                value="<?php echo $param['ab1']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab1_text"
                                                value="<?php echo $param['ab1_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Date & Time documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab2"
                                                value="<?php echo $param['ab2']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab2_text"
                                                value="<?php echo $param['ab2_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is it ensured that abbreviations are not used?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab3"
                                                value="<?php echo $param['ab3']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab3_text"
                                                value="<?php echo $param['ab3_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Risk, Benefits, and Alternatives documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab4"
                                                value="<?php echo $param['ab4']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab4_text"
                                                value="<?php echo $param['ab4_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is the legibility of Consent maintained?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab5"
                                                value="<?php echo $param['ab5']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab5_text"
                                                value="<?php echo $param['ab5_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2">Doctors documentation - Cross Consultation:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Consultation Request documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab6"
                                                value="<?php echo $param['ab6']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab6_text"
                                                value="<?php echo $param['ab6_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Consultation Response documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab7"
                                                value="<?php echo $param['ab7']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab7_text"
                                                value="<?php echo $param['ab7_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Has the priority of Consultation been marked?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab8"
                                                value="<?php echo $param['ab8']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab8_text"
                                                value="<?php echo $param['ab8_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Doctors documentation - Discharge Summary:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Are DOA, DOD, and DOS recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab9"
                                                value="<?php echo $param['ab9']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab9_text"
                                                value="<?php echo $param['ab9_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Diagnosis documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab10"
                                                value="<?php echo $param['ab10']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab10_text"
                                                value="<?php echo $param['ab10_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Course in the Hospital recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab11"
                                                value="<?php echo $param['ab11']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab11_text"
                                                value="<?php echo $param['ab11_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Cross Consultation (if applicable) documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab12"
                                                value="<?php echo $param['ab12']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab12_text"
                                                value="<?php echo $param['ab12_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Discharge Medications & Instructions provided?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab13"
                                                value="<?php echo $param['ab13']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab13_text"
                                                value="<?php echo $param['ab13_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Patient Condition at Discharge recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab14"
                                                value="<?php echo $param['ab14']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab14_text"
                                                value="<?php echo $param['ab14_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is 'When to Contact' instruction given?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab15"
                                                value="<?php echo $param['ab15']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab15_text"
                                                value="<?php echo $param['ab15_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Emergency Contact information provided?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab16"
                                                value="<?php echo $param['ab16']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab16_text"
                                                value="<?php echo $param['ab16_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is it ensured that no abbreviations are used?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab17"
                                                value="<?php echo $param['ab17']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab17_text"
                                                value="<?php echo $param['ab17_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Document finalized and signed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab18"
                                                value="<?php echo $param['ab18']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab18_text"
                                                value="<?php echo $param['ab18_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is ED Initial Assessment completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab19"
                                                value="<?php echo $param['ab19']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab19_text"
                                                value="<?php echo $param['ab19_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are ED Transfer Notes documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab20"
                                                value="<?php echo $param['ab20']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab20_text"
                                                value="<?php echo $param['ab20_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is the Triage process completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab21"
                                                value="<?php echo $param['ab21']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab21_text"
                                                value="<?php echo $param['ab21_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Pre and Post-Operative Checklist completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab22"
                                                value="<?php echo $param['ab22']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab22_text"
                                                value="<?php echo $param['ab22_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Surgical Safety Checklist followed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab23"
                                                value="<?php echo $param['ab23']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab23_text"
                                                value="<?php echo $param['ab23_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Operation Room Count completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab24"
                                                value="<?php echo $param['ab24']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab24_text"
                                                value="<?php echo $param['ab24_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is PACU documentation updated?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab25"
                                                value="<?php echo $param['ab25']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab25_text"
                                                value="<?php echo $param['ab25_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Anaesthesia Technician Checklist filled?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab26"
                                                value="<?php echo $param['ab26']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab26_text"
                                                value="<?php echo $param['ab26_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Pain Assessment documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab27"
                                                value="<?php echo $param['ab27']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab27_text"
                                                value="<?php echo $param['ab27_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Fall Risk Assessment completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab28"
                                                value="<?php echo $param['ab28']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab28_text"
                                                value="<?php echo $param['ab28_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Patient Needs assessed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab29"
                                                value="<?php echo $param['ab29']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab29_text"
                                                value="<?php echo $param['ab29_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Discharge Planning done?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab30"
                                                value="<?php echo $param['ab30']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab30_text"
                                                value="<?php echo $param['ab30_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Pain Reassessment performed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab31"
                                                value="<?php echo $param['ab31']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab31_text"
                                                value="<?php echo $param['ab31_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Fall Risk Reassessment documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab32"
                                                value="<?php echo $param['ab32']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab32_text"
                                                value="<?php echo $param['ab32_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is End of Life (EOL) care documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab33"
                                                value="<?php echo $param['ab33']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab33_text"
                                                value="<?php echo $param['ab33_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Geriatric Assessment completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab34"
                                                value="<?php echo $param['ab34']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab34_text"
                                                value="<?php echo $param['ab34_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Psychiatric Assessment documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab35"
                                                value="<?php echo $param['ab35']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab35_text"
                                                value="<?php echo $param['ab35_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Chemotherapy Assessment completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab36"
                                                value="<?php echo $param['ab36']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab36_text"
                                                value="<?php echo $param['ab36_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Physiotherapy Initial Assessment documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab37"
                                                value="<?php echo $param['ab37']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab37_text"
                                                value="<?php echo $param['ab37_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Physiotherapy Progress Notes updated?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab38"
                                                value="<?php echo $param['ab38']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab38_text"
                                                value="<?php echo $param['ab38_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Narcotic Drug Form filled?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab39"
                                                value="<?php echo $param['ab39']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab39_text"
                                                value="<?php echo $param['ab39_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Blood Transfusion Form completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab40"
                                                value="<?php echo $param['ab40']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab40_text"
                                                value="<?php echo $param['ab40_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Sedation Assessment performed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab41"
                                                value="<?php echo $param['ab41']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab41_text"
                                                value="<?php echo $param['ab41_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Reason for Restraint documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab42"
                                                value="<?php echo $param['ab42']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab42_text"
                                                value="<?php echo $param['ab42_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Type of Restraint specified?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab43"
                                                value="<?php echo $param['ab43']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab43_text"
                                                value="<?php echo $param['ab43_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Scanned Status uploaded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab44"
                                                value="<?php echo $param['ab44']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab44_text"
                                                value="<?php echo $param['ab44_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Planned Length of Stay (LOS) documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab45"
                                                value="<?php echo $param['ab45']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab45_text"
                                                value="<?php echo $param['ab45_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Actual Length of Stay (LOS) documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab46"
                                                value="<?php echo $param['ab46']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab46_text"
                                                value="<?php echo $param['ab46_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Remarks updated?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab47"
                                                value="<?php echo $param['ab47']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab47_text"
                                                value="<?php echo $param['ab47_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Procedure Name recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab48"
                                                value="<?php echo $param['ab48']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab48_text"
                                                value="<?php echo $param['ab48_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Date & Time documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab49"
                                                value="<?php echo $param['ab49']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab49_text"
                                                value="<?php echo $param['ab49_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Special Issues documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab50"
                                                value="<?php echo $param['ab50']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab50_text"
                                                value="<?php echo $param['ab50_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Condition after Procedure recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab51"
                                                value="<?php echo $param['ab51']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab51_text"
                                                value="<?php echo $param['ab51_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Post Operative Care Plan documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab52"
                                                value="<?php echo $param['ab52']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab52_text"
                                                value="<?php echo $param['ab52_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                     <tr>                           
                                    <th colspan="2">Nurses Shift record</th>                     
                                    </tr>
                                    <tr>
                                        <td><b>Is MEWS (Modified Early Warning Score) assessment done?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab53"
                                                value="<?php echo $param['ab53']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab53_text"
                                                value="<?php echo $param['ab53_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is ABC (Airway, Breathing, Circulation) check completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab54"
                                                value="<?php echo $param['ab54']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab54_text"
                                                value="<?php echo $param['ab54_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Pain Reassessment performed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab55"
                                                value="<?php echo $param['ab55']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab55_text"
                                                value="<?php echo $param['ab55_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Lines and Tubes checked and documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab56"
                                                value="<?php echo $param['ab56']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab56_text"
                                                value="<?php echo $param['ab56_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Care Bundle followed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab57"
                                                value="<?php echo $param['ab57']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab57_text"
                                                value="<?php echo $param['ab57_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>                           
                                    <th colspan="2">Nurses Handover</th>                     
                                    </tr> 
                                    <tr>
                                        <td><b>Are Types of Handover documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab58"
                                                value="<?php echo $param['ab58']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab58_text"
                                                value="<?php echo $param['ab58_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Date and Time recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab59"
                                                value="<?php echo $param['ab59']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab59_text"
                                                value="<?php echo $param['ab59_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Handover Details documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab60"
                                                value="<?php echo $param['ab60']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab60_text"
                                                value="<?php echo $param['ab60_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Doctors documentation - In-house Transfer:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Date and Time recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab61"
                                                value="<?php echo $param['ab61']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab61_text"
                                                value="<?php echo $param['ab61_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Reason for Transfer specified?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab62"
                                                value="<?php echo $param['ab62']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab62_text"
                                                value="<?php echo $param['ab62_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Name of Procedure documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab63"
                                                value="<?php echo $param['ab63']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab63_text"
                                                value="<?php echo $param['ab63_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are From & To Departments mentioned?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab64"
                                                value="<?php echo $param['ab64']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab64_text"
                                                value="<?php echo $param['ab64_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Handover Details updated?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab65"
                                                value="<?php echo $param['ab65']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab65_text"
                                                value="<?php echo $param['ab65_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Takeover Details recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab66"
                                                value="<?php echo $param['ab66']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab66_text"
                                                value="<?php echo $param['ab66_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2">Doctors documentation - Restrain Monitoring:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Date and Time documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab67"
                                                value="<?php echo $param['ab67']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab67_text"
                                                value="<?php echo $param['ab67_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Type of Restraint specified?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab68"
                                                value="<?php echo $param['ab68']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab68_text"
                                                value="<?php echo $param['ab68_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Location documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab69"
                                                value="<?php echo $param['ab69']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab69_text"
                                                value="<?php echo $param['ab69_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Reassessment completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab70"
                                                value="<?php echo $param['ab70']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab70_text"
                                                value="<?php echo $param['ab70_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Discontinued Details recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab71"
                                                value="<?php echo $param['ab71']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab71_text"
                                                value="<?php echo $param['ab71_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2">Doctors documentation - Blood Transfusion Record:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Date and Time documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab72"
                                                value="<?php echo $param['ab72']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab72_text"
                                                value="<?php echo $param['ab72_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Bag Number documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab73"
                                                value="<?php echo $param['ab73']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab73_text"
                                                value="<?php echo $param['ab73_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Date of Expiry mentioned?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab74"
                                                value="<?php echo $param['ab74']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab74_text"
                                                value="<?php echo $param['ab74_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Start and End Date with Time documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab75"
                                                value="<?php echo $param['ab75']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab75_text"
                                                value="<?php echo $param['ab75_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Verification Details recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab76"
                                                value="<?php echo $param['ab76']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab76_text"
                                                value="<?php echo $param['ab76_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Vitals recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab77"
                                                value="<?php echo $param['ab77']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab77_text"
                                                value="<?php echo $param['ab77_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2">Doctors documentation - Endoscopy Flow Sheet:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Sign-In Date and Time recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab78"
                                                value="<?php echo $param['ab78']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab78_text"
                                                value="<?php echo $param['ab78_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Co-Morbidities documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab79"
                                                value="<?php echo $param['ab79']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab79_text"
                                                value="<?php echo $param['ab79_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Time-Out Date and Time documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab80"
                                                value="<?php echo $param['ab80']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab80_text"
                                                value="<?php echo $param['ab80_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Patient & Procedure Identification confirmed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab81"
                                                value="<?php echo $param['ab81']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab81_text"
                                                value="<?php echo $param['ab81_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Sign-Out Date and Time recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab82"
                                                value="<?php echo $param['ab82']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab82_text"
                                                value="<?php echo $param['ab82_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Specimen Details documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab83"
                                                value="<?php echo $param['ab83']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab83_text"
                                                value="<?php echo $param['ab83_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Transfer Details recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab84"
                                                value="<?php echo $param['ab84']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab84_text"
                                                value="<?php echo $param['ab84_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Handover Details updated?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab85"
                                                value="<?php echo $param['ab85']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab85_text"
                                                value="<?php echo $param['ab85_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2">Doctors documentation - Surgical Safety Checklist (OT/Outside OT):</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Sign-In Date and Time recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab86"
                                                value="<?php echo $param['ab86']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab86_text"
                                                value="<?php echo $param['ab86_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Identification Details documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab87"
                                                value="<?php echo $param['ab87']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab87_text"
                                                value="<?php echo $param['ab87_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Time-Out Date and Time recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab88"
                                                value="<?php echo $param['ab88']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab88_text"
                                                value="<?php echo $param['ab88_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Confirmation by Team done?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab89"
                                                value="<?php echo $param['ab89']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab89_text"
                                                value="<?php echo $param['ab89_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Sign-Out Date and Time recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab90"
                                                value="<?php echo $param['ab90']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab90_text"
                                                value="<?php echo $param['ab90_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Count and Specimen details documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab100"
                                                value="<?php echo $param['ab100']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab100_text"
                                                value="<?php echo $param['ab100_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Transfer Details recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab101"
                                                value="<?php echo $param['ab101']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab101_text"
                                                value="<?php echo $param['ab101_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Handover Details documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab102"
                                                value="<?php echo $param['ab102']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab102_text"
                                                value="<?php echo $param['ab102_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2">Doctors documentation - Sedation Monitoring Form:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Mallampati Score recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab103"
                                                value="<?php echo $param['ab103']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab103_text"
                                                value="<?php echo $param['ab103_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is ASA classification documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab104"
                                                value="<?php echo $param['ab104']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab104_text"
                                                value="<?php echo $param['ab104_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Intra-Procedural Vitals monitored and recorded?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab105"
                                                value="<?php echo $param['ab105']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab105_text"
                                                value="<?php echo $param['ab105_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Post-Sedation Vitals documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab106"
                                                value="<?php echo $param['ab106']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab106_text"
                                                value="<?php echo $param['ab106_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Discharge Note completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab107"
                                                value="<?php echo $param['ab107']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab107_text"
                                                value="<?php echo $param['ab107_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2">Doctors documentation - Stroke Forms:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is Stroke Timeline entry completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab108"
                                                value="<?php echo $param['ab108']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab108_text"
                                                value="<?php echo $param['ab108_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is NIHSS score documented in initial notes (ED/IP)?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab109"
                                                value="<?php echo $param['ab109']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab109_text"
                                                value="<?php echo $param['ab109_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Initial GRBS documented at admission?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab110"
                                                value="<?php echo $param['ab110']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab110_text"
                                                value="<?php echo $param['ab110_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Consent forms for IV Thrombolysis / Mechanical Thrombectomy completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab111"
                                                value="<?php echo $param['ab111']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab111_text"
                                                value="<?php echo $param['ab111_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Informed Refusal form documented (if applicable)?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab112"
                                                value="<?php echo $param['ab112']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab112_text"
                                                value="<?php echo $param['ab112_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Post-Thrombolysis Monitoring form completed?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab113"
                                                value="<?php echo $param['ab113']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab113_text"
                                                value="<?php echo $param['ab113_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Does the record contain admission reasons, assessments, diagnosis, investigations, procedures, monitoring, and care details?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab114"
                                                value="<?php echo $param['ab114']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab114_text"
                                                value="<?php echo $param['ab114_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is documentation provided if an eligible ischemic stroke patient did not receive IV thrombolytic therapy?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab115"
                                                value="<?php echo $param['ab115']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab115_text"
                                                value="<?php echo $param['ab115_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Pre-morbid mRS documented in all initial IP notes?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab116"
                                                value="<?php echo $param['ab116']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab116_text"
                                                value="<?php echo $param['ab116_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are key infection control indicators defined and measured (Hand Hygiene, CAUTI, CLABSI, VAP, SSI)?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab117"
                                                value="<?php echo $param['ab117']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab117_text"
                                                value="<?php echo $param['ab117_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are all assessments documented and signed/authenticated by staff?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab118"
                                                value="<?php echo $param['ab118']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab118_text"
                                                value="<?php echo $param['ab118_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Do assessments result in appropriate care/monitoring plans that are documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab119"
                                                value="<?php echo $param['ab119']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab119_text"
                                                value="<?php echo $param['ab119_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Dysphagia Screening documented before starting oral feeds?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab120"
                                                value="<?php echo $param['ab120']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab120_text"
                                                value="<?php echo $param['ab120_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Nutritional Screening documented for all patients?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab121"
                                                value="<?php echo $param['ab121']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab121_text"
                                                value="<?php echo $param['ab121_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Is Care guided by functional assessment and periodic reassessments documented?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab122"
                                                value="<?php echo $param['ab122']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab122_text"
                                                value="<?php echo $param['ab122_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are Assessments completed within 24 hours of admission or once patient is stable?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab123"
                                                value="<?php echo $param['ab123']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab123_text"
                                                value="<?php echo $param['ab123_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Does the Discharge/Treatment summary include instructions for urgent care?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab124"
                                                value="<?php echo $param['ab124']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab124_text"
                                                value="<?php echo $param['ab124_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Are NIHSS / mRS scores documented at discharge?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab125"
                                                value="<?php echo $param['ab125']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab125_text"
                                                value="<?php echo $param['ab125_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>In case of death, does the record include a Death Summary?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab126"
                                                value="<?php echo $param['ab126']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab126_text"
                                                value="<?php echo $param['ab126_text']; ?>" placeholder="Remarks">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Doctors documentation - Closed Audit Checklist:</th>
                                    </tr>
                                    <tr>
                                        <td><b>Is there missing or incomplete documentation related to Medico-Legal Case (MLC)?</b></td>
                                        <td>
                                            <input class="form-control" type="text" name="ab127"
                                                value="<?php echo $param['ab127']; ?>"><br>
                                            Remarks:
                                            <input class="form-control" type="text" name="ab127_text"
                                                value="<?php echo $param['ab127_text']; ?>" placeholder="Remarks">
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