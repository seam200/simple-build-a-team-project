<?php
include_once("./db-connect.php");
function sefuda($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"]) == "success") {
    $name =  sefuda($_POST['name']);
    $fathersName =  sefuda($_POST['fathersName']);
    $mothersName =  sefuda($_POST['mothersName']);
    $gender =  sefuda($_POST['gender'] ?? null);
    $dob =  sefuda($_POST['dob']);
    $location =  sefuda($_POST['location']);
    $completeGradution =  sefuda($_POST['completeGradution']);
    $graduatedAt =  sefuda($_POST['graduatedAt']);
    $mobileNumber =  sefuda($_POST['mobileNumber']);
    $email =  sefuda($_POST['email']);
    $pass =  sefuda($_POST['pass']);
    $confPass =  sefuda($_POST['confPass']);
    $refToken =  sefuda($_POST['refToken']);

    $gender_array = ["Male", "Female", "Others"];

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
    } elseif (strlen($mobileNumber) > 13 || strlen($mobileNumber) < 11) {
        $res = array(
            "error" => true,
            "msg" => "Invalid Mobile Number!",
        );
        exit(json_encode($res));
    } else {
        $existing_mobile = $db_conn->query("SELECT * FROM `register` WHERE `mobile` =  '$mobileNumber'");
        if ($existing_mobile->num_rows > 0 || $existing_mobile->num_rows === 1) {
            $res = array(
                "error" => true,
                "msg" => "Mobile number is already exist!",
            );
            exit(json_encode($res));
        } elseif (empty($email)) {
            $res = array(
                "error" => true,
                "msg" => "Please enter your Email Address!",
            );
            exit(json_encode($res));
        } elseif (substr($email, -10) !== "@gmail.com") {
            $res = array(
                "error" => true,
                "msg" => "Invalid Gmail Address!",
            );
            exit(json_encode($res));
        } else {
            $existing_email = $db_conn->query("SELECT * FROM `register` WHERE `email` =  '$email'");
            if ($existing_email->num_rows > 0 || $existing_email->num_rows === 1) {
                $res = array(
                    "error" => true,
                    "msg" => "Email Address already registred!",
                );
                exit(json_encode($res));
            } elseif (empty($pass)) {
                $res = array(
                    "error" => true,
                    "msg" => "Please enter your Password!",
                );
                exit(json_encode($res));
            } elseif (empty($confPass)) {
                $res = array(
                    "error" => true,
                    "msg" => "Please enter your Password Again!",
                );
                exit(json_encode($res));
            } elseif ($pass !== $confPass) {
                $res = array(
                    "error" => true,
                    "msg" => "Password should be the same!",
                );
                exit(json_encode($res));
            } else {
                $newRefToken = str_shuffle(substr(md5(uniqid(rand(), true)), 0, 10));
                $md5_pass = md5($pass);
                if (!empty($refToken)) {
                    $exist_refId = ($db_conn->query("SELECT * FROM `register` WHERE `ref_token` = '$refToken'"));
                    $check_refer_id = $exist_refId->fetch_object();
                    $check_refer_id = ($check_refer_id->id) ?? null;

                    if ($exist_refId->num_rows !== 1) {
                        $res = array(
                            "error" => true,
                            "msg" => "Referrer Id not found!",
                        );
                        exit(json_encode($res));
                    } else {
                        $insetToDatabase = $db_conn->query("INSERT INTO `register`(`name`, `father_name`, `mother_name`, `gender`, `dob`, `location`, `study`, `graduated_year`, `email`, `mobile`, `pass`, `ref_token`, `referer`) VALUES ('$name','$fathersName','$mothersName','$gender','$dob','$location','$graduatedAt',$completeGradution,'$email',$mobileNumber,'$md5_pass', '$newRefToken', $check_refer_id)");
                        if ($insetToDatabase) {
                            $res = array(
                                "error" => false,
                                "msg" => "Registration Successfully!",
                            );
                            exit(json_encode($res));
                        }
                    }
                } else {
                    $insetToDatabase = $db_conn->query("INSERT INTO `register`(`name`, `father_name`, `mother_name`, `gender`, `dob`, `location`, `study`, `graduated_year`, `email`, `mobile`, `pass`, `ref_token`) VALUES ('$name','$fathersName','$mothersName','$gender','$dob','$location','$graduatedAt',$completeGradution,'$email',$mobileNumber,'$md5_pass', '$newRefToken')");
                    if ($insetToDatabase) {
                        $res = array(
                            "error" => false,
                            "msg" => "Registration Successfully!",
                        );
                        exit(json_encode($res));
                    }
                }
            }
        }
    }
}
