<div class="content">
    <?php
    // individual patient feedback link
    $ip_link_patient_feedback = base_url($this->uri->segment(1) . '/patient_complaint?patientid=');
    $this->db->select("*");
    $this->db->from('setup_int');
    //$this->db->where('parent', 0);
    $query = $this->db->get();
    $reasons  = $query->result();
    foreach ($reasons as $row) {
        $keys[$row->shortkey] = $row->shortkey;
        $res[$row->shortkey] = $row->shortname;
        $titles[$row->shortkey] = $row->title;
    }
    if (count($departments)) {
    ?>


        <div class="row">

            <!-- Logic for Feedback received By Patient Cordinator  -->
            <?php
            $fdate = date('Y-m-d', strtotime($_SESSION['from_date']) + 24 * 60 * 60);
            $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));

            $this->db->select("u.firstname, COUNT(bf.id) AS feedback_count", false);
            $this->db->from('user u');
            $this->db->join(
                'bf_feedback_int bf',
                'JSON_UNQUOTE(JSON_EXTRACT(bf.dataset, "$.loginemail")) = u.email AND bf.datetime >= "' . $tdate . '" AND bf.datetime <= "' . $fdate . '"',
                'left'
            );
            $this->db->where('u.user_role', 8);

            if ($_SESSION['ward'] !== 'ALL') {
                $this->db->where('ward', $_SESSION['ward']);
            }

            $this->db->group_by('u.firstname');
            $query = $this->db->get();
            $feedback_data = $query->result_array();

            // Display results in table
            echo '<table class="table table-striped table-bordered" style="margin-left: 18px; width: 97%;">';
            echo '<thead>';

            // Table heading
            echo '<tr>';
            echo '<th colspan="2" class="text-left h5" style="background: #dadada;"><strong>Complaint Collection Analysis</strong> 
            <span data-toggle="tooltip" title="This analysis shows the number of complaints collected by each user in the Patient Coordinator role, based on their individual logins used to access the mobile or tablet application within the hospital.">
            <i class="fa fa-info-circle" style="cursor: pointer; color: green;"></i>
            </span>
            </th>';
            echo '</tr>';

            echo '<tr>';
            echo '<th>Patient Coordinator</th>';
            echo '<th>No. of complaints collected</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            if (!empty($feedback_data)) {
                foreach ($feedback_data as $row) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['firstname']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['feedback_count']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="2">No complaint data available</td></tr>';
            }

            echo '</tbody>';
            echo '</table>';
            ?>





            <!-- Logic for Feedback received By Floor /Ward  -->
            <?php
            $fdate = date('Y-m-d', strtotime($_SESSION['from_date']) + 24 * 60 * 60);
            $tdate = date('Y-m-d', strtotime($_SESSION['to_date']));

            $this->db->select('ward AS floor, COUNT(*) AS feedback_count');
            $this->db->from('bf_feedback_int');

            if ($_SESSION['ward'] !== 'ALL') {
                $this->db->where('ward', $_SESSION['ward']);
            }

            // Apply date filters
            $this->db->where('datetime >=', $tdate);
            $this->db->where('datetime <=', $fdate);
            $this->db->group_by('ward');

            $query = $this->db->get();
            $feedback_data = $query->result_array();

            echo '<table class="table table-striped table-bordered" style="margin-left: 18px; width: 97%;">';
            echo '<thead>';

            // Heading row with info icon, bolded using <strong>
            echo '<tr>';
            echo '<th colspan="2" class="text-left h5" style="background: #dadada;">
                  <strong>Complaints by Block/ Floor/ Area</strong>
                <span data-toggle="tooltip" title="This analysis showcases the number of complaints received from various areas within the hospital premises, such as floors, blocks, wards, and other designated zones.">
                  <i class="fa fa-info-circle" style="cursor: pointer; color: green;"></i>
                </span>
              </th>';

            echo '</tr>';

            echo '<tr>';
            echo '<th>Floor/ Block/ Ward/ Area</th>';
            echo '<th>No of complaints received</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            if (!empty($feedback_data)) {
                foreach ($feedback_data as $row) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['floor'] ?? 'Unknown') . '</td>';
                    echo '<td>' . htmlspecialchars($row['feedback_count']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="2">No complaint data available</td></tr>';
            }

            echo '</tbody>';
            echo '</table>';

            ?>

            <!--  table area -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: right;">
                        <div class="btn-group">
                            <a class="btn btn-success" target="_blank" data-placement="bottom" data-toggle="tooltip" title="<?php echo lang_loader('pcf', 'pcf_download_all_complaint_report'); ?>" href="<?php echo base_url($this->uri->segment(1)) . '/download_' . ($this->uri->segment(2)) ?>">
                                <i class="fa fa-file-text"></i>
                            </a>
                        </div>
                    </div>


                    <div class="panel-body">
                        <?php if ($this->session->userdata('user_role') != 4) { ?>
                            <form>
                                <p> <!-- <span style="font-size:15px; font-weight:bold;">Sort Complaints By : </span> -->
                                    <select name="dep" class="form-control" id="subsecid" onchange="gotonextdepartment2(this.value)" style="width:200px; margin:0px 0px 20px 20px;">
                                        <option value="1" selected><?php echo lang_loader('pcf', 'pcf_select_department'); ?></option>
                                        <?php
                                        $this->db->group_by('description');
                                        $this->db->where('type', 'interim');
                                        $query = $this->db->get('department');
                                        $result = $query->result();

                                        foreach ($result as $row) {
                                        ?>
                                            <?php if ($this->input->get('depsec') == $row->description) { ?>
                                                <option value="<?php echo str_replace('&', '%26', $row->description); ?>" selected><?php echo $row->description; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo str_replace('&', '%26', $row->description); ?>"><?php echo $row->description; ?></option>
                                            <?php } ?>

                                        <?php } ?>
                                    </select>
                                    <?php if (isset($_GET['depsec'])) { ?>
                                        <span style="font-size:15px; font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <select name="dep" class="form-control" onchange="gotonextdepartment(this.value)" style="width:200px; margin:0px 0px 20px 20px;">
                                            <option value="1" selected><?php echo lang_loader('pcf', 'pcf_select_parameter'); ?></option>
                                            <?php
                                            $this->db->where('type', 'interim');
                                            $this->db->where('description', $this->input->get('depsec'));
                                            $query = $this->db->get('department');
                                            $result = $query->result();
                                            foreach ($result as $row) {
                                            ?>
                                                <?php if ($this->input->get('type') == $row->dprt_id) { ?>
                                                    <option value="<?php echo $row->dprt_id; ?>" selected><?php echo $row->name; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $row->dprt_id; ?>"><?php echo $row->name; ?></option>
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                    <?php } ?>
                                </p>
                            </form>
                            <br />
                        <?php } ?>

                        <table class="pcticketsall table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo lang_loader('pcf', 'pcf_slno'); ?></th>
                                    <th style="white-space: nowrap;"><?php echo lang_loader('pcf', 'pcf_complaint_id'); ?></th>
                                    <th style="white-space: nowrap;"><?php echo lang_loader('pcf', 'pcf_patient_details'); ?></th>

                                    <th style="white-space: nowrap;"><?php echo lang_loader('pcf', 'pcf_concern'); ?></th>
                                    <?php if ($this->session->userdata('user_role') != 4) { ?>
                                        <th><?php echo lang_loader('pcf', 'pcf_department'); ?></th>
                                    <?php } ?>
                                    <th style="white-space: nowrap;"><?php echo lang_loader('pcf', 'pcf_created_on'); ?></th>
                                    <th style="white-space: nowrap;"><?php echo lang_loader('pcf', 'pcf_modified_on'); ?></th>
                                    <?php if (ismodule_active('PCF') === true  && isfeature_active('OPEN-COMPLAINTS') === true) { ?>
                                        <th style="text-align: center;"><?php echo display('action') ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($departments)) {        ?>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($departments as $department) {
                                        if ($department->status == 'Addressed') {
                                            $this->db->where('ticketid', $department->id)->where('ticket_status', 'Addressed');
                                            $query = $this->db->get('ticket_int_message');
                                            $ticket = $query->result();
                                            $addressed_comm = $ticket[0]->reply;
                                            $rowmessage = $ticket[0]->message . '  addressed the ticket with , ' . $ticket[0]->reply;
                                        } elseif ($department->status == 'Transfered') {
                                            $this->db->where('ticketid', $department->id)->where('ticket_status', 'Transfered');
                                            $query = $this->db->get('ticket_int_message');
                                            $ticket = $query->result();
                                            $trans_comm =  $ticket[0]->reply;
                                            $rowmessage = $ticket[0]->message . ' Transfered because, ' . $ticket[0]->reply;
                                        } elseif ($department->status == 'Reopen') {
                                            $this->db->where('ticketid', $department->id)->where('ticket_status', 'Reopen');
                                            $query = $this->db->get('ticket_int_message');
                                            $ticket = $query->result();
                                            $reopen_comm =  $ticket[0]->reply;
                                            $rowmessage = $ticket[0]->message . 'Reopened because, ' . $ticket[0]->reply;
                                        } elseif ($department->status == 'Closed') {
                                            $this->db->where('ticketid', $department->id)->where('ticket_status', 'Closed');
                                            $query = $this->db->get('ticket_int_message');
                                            $ticket = $query->result();

                                            $rowmessage = $ticket[0]->message . ' Closed the ticket,  Root Cause: ' . $ticket[0]->rootcause . '. CAPA: ' . $ticket[0]->corrective . '  ';
                                        } else {
                                            $rowmessage = 'THIS TICKET IS OPEN';
                                        }
                                        if (strlen($rowmessage) > 60) {
                                            $rowmessage = substr($rowmessage, 0, 60) . '  ' . ' ... click status to view';
                                        }

                                    ?>
                                        <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>" data-placement="bottom" data-toggle="tooltip" title="<?php echo $rowmessage; ?>">
                                            <td><?php echo $sl; ?></td>
                                            <td>PCT-<?php echo $department->id; ?></td>
                                            <td style="overflow: clip; word-break: break-all;"><?php echo $department->feed->name; ?>&nbsp;(<a href="<?php echo $ip_link_patient_feedback . $department->feed->patientid; ?>"><?php echo $department->feed->patientid; ?></a>)
                                                <br>
                                                <?php echo $department->feed->ward; ?>
                                                <?php if ($department->feed->bedno) { ?>
                                                    <?php echo 'in ' . $department->feed->bedno; ?>
                                                <?php } ?>
                                                <br>
                                                <?php
                                                echo "<i class='fa fa-phone'></i> ";
                                                echo $department->feed->contactnumber; ?>
                                                <?php if ($department->feed->email) { ?>
                                                    <br>
                                                    <?php echo "<i class='fa fa-envelope'></i> "; ?>
                                                    <?php echo $department->feed->email; ?>
                                                <?php } ?>
                                            </td>

                                            <td style="overflow: clip; word-break: break-all;">

                                                <?php
                                                if ($department->departmentid_trasfered != 0) {
                                                    $show = false;
                                                    if ($department->status == 'Addressed') {
                                                        echo 'Ticket was transferred';
                                                        $show = true;
                                                    }
                                                    if ($department->status == 'Transfered') {
                                                        echo $trans_comm;
                                                        $show = true;
                                                    }
                                                    if ($department->status == 'Reopen') {
                                                        echo $reopen_comm;
                                                        $show = true;
                                                    }

                                                    if ($show == false && $department->status == 'Closed') {
                                                        echo 'Ticket was transferred';
                                                    }
                                                } else {

                                                    foreach ($department->feed->reason as $key => $value) {


                                                        if ($key) {
                                                            if ($titles[$key] == $department->department->description) {
                                                                if (in_array($key, $keys)) {
                                                                    echo $res[$key];
                                                                    echo '<br>';
                                                                    $show = $res[$key];
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                // print_r($show);
                                                ?>
                                            </td>
                                            <?php if ($this->session->userdata('user_role') != 4) { ?>
                                                <td><?php echo $department->department->description; ?>
                                                    <br>
                                                    <?php echo $department->department->pname; ?>
                                                </td>
                                            <?php } ?>
                                            <td style="overflow: clip; word-break: break-all;">
                                                <?php echo date('g:i A', strtotime($department->created_on)); ?>
                                                <br>
                                                <?php echo date('d-m-y', strtotime($department->created_on)); ?>
                                            </td>

                                            <td style="overflow: clip; word-break: break-all;">
                                                <?php echo date('g:i A', strtotime($department->last_modified)); ?>
                                                <br>
                                                <?php echo date('d-m-y', strtotime($department->last_modified)); ?>
                                            </td>
                                            <?php
                                            if ($department->status == 'Addressed') {
                                                $tool = 'Click to close this ticket.';
                                                $color = 'warning';
                                            } elseif ($department->status == 'Open') {
                                                $tool = 'Click to change the status.';
                                                $color = 'danger';
                                            } elseif ($department->status == 'Closed') {
                                                $tool = 'Ticket is closed';
                                                $color = 'success';
                                            } elseif ($department->status == 'Reopen') {
                                                $tool = 'Click to close this ticket.';
                                                $color = 'primary';
                                            } elseif ($department->status == 'Transfered') {
                                                $tool = 'Click to close this ticket.';
                                                $color = 'info';
                                            } else {
                                                $color = 'info';
                                            }



                                            ?>
                                            <?php if (ismodule_active('PCF') === true  && isfeature_active('OPEN-COMPLAINTS') === true) { ?>
                                                <td style="display: flex; align-items: center; gap: 10px;">
                                                    <a href="<?php echo base_url($this->uri->segment(1) . "/track/$department->id") ?>"
                                                        data-placement="bottom"
                                                        data-toggle="tooltip"
                                                        title="<?php echo $tool; ?>"
                                                        class="btn btn-sm btn-<?php echo $color; ?>">
                                                        <?php echo $department->status; ?>
                                                        <i style="font-size: x-small;" class="fa fa-edit"></i>
                                                    </a>
                                                    <?php if ($department->status == 'Closed' && $department->patient_verified_status == 1) { ?>
                                                        <span
                                                            style="font-size: 20px; color: green; cursor: pointer;"
                                                            data-toggle="tooltip"
                                                            data-placement="bottom"
                                                            title="Concern has been verified by the patient">
                                                            ✔️
                                                        </span>
                                                    <?php } ?>
                                                </td>



                                            <?php } ?>
                                        </tr>
                                        <?php $sl++; ?>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table> <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    <?php } else {   ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h3 style="text-align: center; color:tomato;"><?php echo lang_loader('pcf', 'pcf_no_record_found'); ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div>
<script>
    function gotonextdepartment(type) {
        var subsecid = $('#subsecid').val();
        var url = "<?php echo base_url($this->uri->segment(1) . "/alltickets?type=") ?>" + type + "&depsec=" + subsecid;
        window.location.href = url;
    }

    function gotonextdepartment2(type) {
        var url = "<?php echo base_url($this->uri->segment(1) . "/alltickets?depsec=") ?>" + type;
        window.location.href = url;
    }
</script>