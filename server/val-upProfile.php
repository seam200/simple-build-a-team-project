<?php
include_once("./db-connect.php");
ini_set('session.gc_maxlifetime', 86400);
session_start();
function sefuda($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["upSubmit"]) == "updateSuccess") {
    $user_imgName = $_FILES['uploadImg']['name'] ?? null;
    $user_imgTemp = $_FILES['uploadImg']['tmp_name'] ?? null;
    $user_imgType = $_FILES['uploadImg']['type'] ?? null;
    $user_imgSize = $_FILES['uploadImg']['size'] ?? null;
    $name =  sefuda($_POST['name']);
    $fathersName =  sefuda($_POST['fathersName']);
    $mothersName =  sefuda($_POST['mothersName']);
    $gender =  sefuda($_POST['gender'] ?? null);
    $dob =  sefuda($_POST['dob']);
    $location =  sefuda($_POST['location']);
    $completeGradution =  sefuda($_POST['completeGradution']);
    $graduatedAt =  sefuda($_POST['graduatedAt']);
    $mobileNumber =  sefuda($_POST['mobileNumber']);

    $gender_array = ["Male", "Female", "Others"];
    $get_id = $_SESSION['user']['user_id'];

    $allow_fileType = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
    $allowedFileSize = 5 * 1024 * 1024; // 5MB


    if (!empty($user_imgName)) {
        if (!getimagesize($user_imgTemp)) {
            $res = array(
                "error" => true,
                "msg" => "Please Select an image!",
            );
            exit(json_encode($res));
        } elseif (!in_array($user_imgType, $allow_fileType)) {
            $res = array(
                "error" => true,
                "msg" => "Invalid Image Formate!",
            );
            exit(json_encode($res));
        } elseif ($user_imgSize > $allowedFileSize) {
            $res = array(
                "error" => true,
                "msg" => "Images larger than 5 MB cannot be used.!",
            );
            exit(json_encode($res));
        } else {
            $a = "ABCDEFGHIJKLMNOPQRSTUVWabcdefghijklmnopqrstuvwxyz0123456789";
            $ext = pathinfo($user_imgName, PATHINFO_EXTENSION);
            $uniqName = "alhuda-member-" . str_replace(' ', '-', strtolower($name)) . "-" . strtolower(substr(str_shuffle($a), 0, 8)) . uniqid() . rand() . "." . $ext;

            $location = "../static/images/members/$uniqName";
            $image_src_for_insert = "static/images/members/$uniqName";
            $image_alt_for_insert = "alhuda-member-" . strtolower($name);

            $select_img = $db_conn->query("SELECT * FROM `user-image` WHERE `user_id` = '$get_id'");
            $fetch_img = $select_img->fetch_object();

            if ($select_img->num_rows === 0 && $select_img->num_rows !== 1) {

                $move = move_uploaded_file($user_imgTemp, $location);

                $inset_img = $db_conn->query("INSERT INTO `user-image`( `user_id`, `src`, `alt`) VALUES ('$get_id','$image_src_for_insert','$image_alt_for_insert')");

                if ($inset_img) {
                    $_SESSION['user']['user_image_src'] = $image_src_for_insert;
                    $_SESSION['user']['user_image_alt'] = $image_alt_for_insert;

                    $res = array(
                        "error" => false,
                        "msg" => "Profile Updated Successfully!",
                    );
                    exit(json_encode($res));
                }
            } else {

                $unlink_path = "../" . $fetch_img->src;
                if ($fetch_img !== null) {
                    unlink($unlink_path);
                }

                $move = move_uploaded_file($user_imgTemp, $location);

                $update_img = $db_conn->query("UPDATE `user-image` SET `src`='$image_src_for_insert',`alt`='$image_alt_for_insert' WHERE `user_id` = '$get_id'");

                if ($update_img) {
                    $_SESSION['user']['user_image_src'] = $image_src_for_insert;
                    $_SESSION['user']['user_image_alt'] = $image_alt_for_insert;

                    $res = array(
                        "error" => false,
                        "msg" => "Profile Updated Successfully!",
                    );
                    exit(json_encode($res));
                }
            }
        }
    }

    if (empty($name)) {
        $res = array(
            "error" => true,
            "msg" => "Please enter your name!",
        );
        exit(json_encode($res));
    } elseif (empty($fathersName)) {
        $res = array(
            "error" => true,
            "msg" => "Please enter your Father Name!",
        );
        exit(json_encode($res));
    } elseif (empty($mothersName)) {
        $res = array(
            "error" => true,
            "msg" => "Please enter your Mother Name!",
        );
        exit(json_encode($res));
    } elseif (empty($gender)) {
        $res = array(
            "error" => true,
            "msg" => "Select Your Gender!",
        );
        exit(json_encode($res));
    } elseif (!in_array($gender, $gender_array)) {
        $res = array(
            "error" => true,
            "msg" => "Gender is not exist!",
        );
        exit(json_encode($res));
    } elseif (empty($dob)) {
        $res = array(
            "error" => true,
            "msg" => "Please enter your Date of Birth!",
        );
        exit(json_encode($res));
    } elseif (empty($location)) {
        $res = array(
            "error" => true,
            "msg" => "Please enter your presend address!",
        );
        exit(json_encode($res));
    } elseif (empty($completeGradution)) {
        $res = array(
            "error" => true,
            "msg" => "Please enter your Gradution Year!",
        );
        exit(json_encode($res));
    } elseif (empty($graduatedAt)) {
        $res = array(
            "error" => true,
            "msg" => "Please enter your Graduation College/University!",
        );
        exit(json_encode($res));
    } elseif (empty($mobileNumber)) {
        $res = array(
            "error" => true,
            "msg" => "Please enter your Mobile Number!",
        );
        exit(json_encode($res));
    } elseif (!is_numeric($mobileNumber)) {
        $res = array(
            "error" => true,
            "msg" => "Invalid Mobile Number!",
        );
        exit(json_encode($res));
    } elseif (strlen($mobileNumber) > 13 || strlen($mobileNumber) < 10) {
        $res = array(
            "error" => true,
            "msg" => "Invalid Mobile Number!",
        );
        exit(json_encode($res));
    } else {
        $get_mobile = $db_conn->query("SELECT * FROM `register` WHERE `id` = '$get_id'");
        $fetch_mobile = $get_mobile->fetch_object();

        if ($fetch_mobile->mobile !== $mobileNumber) {
            $existing_mobile = $db_conn->query("SELECT * FROM `register` WHERE `mobile` =  '$mobileNumber'");
            if (!$existing_mobile) {
                $res = array(
                    "error" => true,
                    "msg" => "Database query error: " . mysqli_error($db_conn),
                );
                exit(json_encode($res));
            }

            if ($existing_mobile->num_rows > 0) {
                $res = array(
                    "error" => true,
                    "msg" => "Mobile number is already exist!",
                );
                exit(json_encode($res));
            }
        }

        $updateInfo = $db_conn->query("UPDATE `register` SET `name`='$name',`father_name`='$fathersName',`mother_name`='$mothersName',`gender`='$gender',`dob`='$dob',`location`='$location',`study`='$graduatedAt',`graduated_year`= $completeGradution ,`mobile`= $mobileNumber WHERE `id` = '$get_id'");

        if ($updateInfo) {
            $_SESSION['user']['user_name'] = $name;
            $_SESSION['user']['user_father_name'] = $fathersName;
            $_SESSION['user']['user_mother_name'] = $mothersName;
            $_SESSION['user']['user_gender'] = $gender;
            $_SESSION['user']['user_dob'] = $dob;
            $_SESSION['user']['user_location'] = $location;
            $_SESSION['user']['user_study'] = $graduatedAt;
            $_SESSION['user']['user_graduated_year'] = $completeGradution;
            $_SESSION['user']['user_mobile'] = $mobileNumber;

            $res = array(
                "error" => false,
                "msg" => "Profile Updated Successfully!",
            );
            exit(json_encode($res));
        } else {
            $res = array(
                "error" => true,
                "msg" => "Error updating profile.",
            );
            echo json_encode($res);
        }
    }
}
