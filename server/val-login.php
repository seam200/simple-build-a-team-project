<?php
function sefuda($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['login'])) {
    $mobile = sefuda($_POST['mobile']);
    $pass = sefuda($_POST['pass']);

    if (empty($mobile)) {
        $error_mobile = "Please enter a mobile number!";
    } else if (!is_numeric($mobile)) {
        $error_mobile = "Don't allow text!";
    } else if (strlen($mobile) > 13 || strlen($mobile) < 11) {
        $error_mobile = "Invalid number fomate!";
    } else {
        $crr_mobile = $db_conn->real_escape_string($mobile);
    }

    if (empty($pass)) {
        $error_pass = "Please enter password!";
    } else {
        $crr_pass = $db_conn->real_escape_string($pass);
    }

    if (isset($crr_mobile) && isset($crr_pass)) {

        $md5_pass = md5($pass);
        $check_User = $db_conn->query("SELECT * FROM `register` WHERE `mobile` = '$crr_mobile' AND `pass` = '$md5_pass'");
        $userData = $check_User->fetch_object();
        $fetch_userid = $userData->id ?? null;
        $check_user_img = ($db_conn->query("SELECT * FROM `user-image` WHERE `user_id` = '$fetch_userid'")) ?? null;
        $fetch_user_img = $check_user_img->fetch_object();

        if ($check_User->num_rows != 1) {
            $error_pass = "Password Doesn't matched!";
        } else {
            $_SESSION['user'] = [
                'user_id' => $userData->id,
                'user_name' => $userData->name,
                'user_father_name' => $userData->father_name,
                'user_mother_name' => $userData->mother_name,
                'user_gender' => $userData->gender,
                'user_dob' => $userData->dob,
                'user_location' => $userData->location,
                'user_study' => $userData->study,
                'user_graduated_year' => $userData->graduated_year,
                'user_email' => $userData->email,
                'user_mobile' => $userData->mobile,
                'user_image_src' => ($fetch_user_img->src),
                'user_image_alt' => ($fetch_user_img->alt),
                'user_role' => $userData->role,
                'user_post' => $userData->post,
                'user_ref_token' => $userData->ref_token,
            ];
            header("location: ./");
        }
    }
}
