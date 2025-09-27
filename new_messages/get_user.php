<?php 

function get_user_by_sms_activity($type, $con) {
    $user_list = array();

    // Secure query
    $type = mysqli_real_escape_string($con, $type);
    $query = "SELECT feature_id FROM features WHERE feature_name='" . $type . "' LIMIT 1";
    $result = mysqli_query($con, $query);

    if (!$result || mysqli_num_rows($result) === 0) {
        return $user_list; // No feature found
    }

    $feature_result = mysqli_fetch_object($result);
    $feature_id = (int) $feature_result->feature_id;

    $user_permission_query = "SELECT user_id FROM user_permissions WHERE status=1 AND feature_id=" . $feature_id;
    $permission_result = mysqli_query($con, $user_permission_query);

    if ($permission_result) {
        while ($user_permission = mysqli_fetch_object($permission_result)) {
            $user_id = (int) $user_permission->user_id;

            $user_query = "SELECT * FROM user WHERE user_id=" . $user_id;
            $user_result = mysqli_query($con, $user_query);

            if ($user_result) {
                while ($user = mysqli_fetch_object($user_result)) {
                    $user_list[] = $user;
                }
            }
        }
    }

    return $user_list;
}


function get_user_by_access($type, $con, $userId, $roleId) {
    $type = mysqli_real_escape_string($con, $type);
    $userId = mysqli_real_escape_string($con, $userId);
    $roleId = (int) $roleId;

    $query = "SELECT feature_id FROM features WHERE feature_name='" . $type . "' LIMIT 1";
    $result = mysqli_query($con, $query);

    if (!$result || mysqli_num_rows($result) === 0) {
        return false; // No feature found
    }

    $feature_result = mysqli_fetch_object($result);
    $feature_id = (int) $feature_result->feature_id;

    // First check user_permissions
    $user_permission_query = "SELECT status FROM user_permissions WHERE user_id='" . $userId . "' AND feature_id=" . $feature_id . " LIMIT 1";
    $permission_result = mysqli_query($con, $user_permission_query);

    if (!$permission_result || mysqli_num_rows($permission_result) === 0) {
        // If no user permission, check role_permissions
        $role_permission_query = "SELECT status FROM role_permissions WHERE role_id=" . $roleId . " AND feature_id=" . $feature_id . " LIMIT 1";
        $permission_result = mysqli_query($con, $role_permission_query);
    }

    if ($permission_result && mysqli_num_rows($permission_result) > 0) {
        $role_permission = mysqli_fetch_object($permission_result);
        return ($role_permission && (int) $role_permission->status === 1);
    }

    return false;
}


function get_user_by_question($question_key, $con) {
    $final_user_list = array();

    $query = "SELECT * FROM user";
    $users_result = mysqli_query($con, $query);

    if (!$users_result) {
        return $final_user_list; // No users
    }

    while ($user = mysqli_fetch_object($users_result)) {
        $department = json_decode($user->department);

        if (is_array($department) || is_object($department)) {
            foreach ($department as $row) {
                if (is_array($row) || is_object($row)) {
                    foreach ($row as $r) {
                        $keyvalue = explode(',', (string)$r);
                        foreach ($keyvalue as $k) {
                            if (trim($k) === $question_key) {
                                $final_user_list[] = $user;
                                break 3; // Found a match, skip to next user
                            }
                        }
                    }
                }
            }
        }
    }

    return $final_user_list;
}
