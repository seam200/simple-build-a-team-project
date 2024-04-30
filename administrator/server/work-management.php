<?php 
include_once("./db-connect.php");
function sefuda($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['addManager']) && $_POST['addManager'] === "success"){
    $name = sefuda($_POST['name']);
    $title = sefuda($_POST['title']);
    $facebook = sefuda($_POST['facebook'] ?? null);
    $twitter = sefuda($_POST['twitter'] ?? null);
    $linkedin = sefuda($_POST['linkedin'] ?? null);
    $skype = sefuda($_POST['skype'] ?? null);
    $managerImg_name = ($_FILES['managerImg']['name'] ?? null);
    $managerImg_tmpName = ($_FILES['managerImg']['tmp_name'] ?? null);
    $managerImg_size = ($_FILES['managerImg']['size'] ?? null);
    $managerImg_type = ($_FILES['managerImg']['type'] ?? null);

    $image_array = ["image/jpg", "image/png", "image/jpeg"];
    $allow_size = 5 * 1024 * 1024;

    if(empty($name)){
        $res = array(
            "error" => true,
            "msg" => "Please write a name!",
        );
        exit(json_encode($res));
    }elseif(empty($title)){
        $res = array(
            "error" => true,
            "msg" => "Please enter a title for this member!",
        );
        exit(json_encode($res));
    }elseif(empty($managerImg_name)){
        $res = array(
            "error" => true,
            "msg" => "Please select an image!",
        );
        exit(json_encode($res));
    }elseif(!getimagesize($managerImg_tmpName)){
        $res = array(
            "error" => true,
            "msg" => "Please select an image file!",
        );
        exit(json_encode($res));
    }elseif(!in_array($managerImg_type ,$image_array)){
        $res = array(
            "error" => true,
            "msg" => "Only allow jpg, png, jpeg formate!",
        );
        exit(json_encode($res));
    }elseif($allow_size < $managerImg_size){
        $res = array(
            "error" => true,
            "msg" => "Your image is too large in size!",
        );
        exit(json_encode($res));
    }else{
            $a = "ABCDEFGHIJKLMNOPQRSTUVWabcdefghijklmnopqrstuvwxyz0123456789";
            $ext = pathinfo($managerImg_name, PATHINFO_EXTENSION);
            $uniqName = "alhuda-member-" . str_replace(' ', '-', strtolower($name)) . "-" . strtolower(substr(str_shuffle($a), 0, 8)) . uniqid() . rand() . "." . $ext;

            $img_location = "../../static/images/management/$uniqName";
            $image_src_for_insert = "static/images/management/$uniqName";
            $image_alt_for_insert = "alhuda-member-" . strtolower($name);

            $move = move_uploaded_file($managerImg_tmpName, $img_location);

            $insert_member = $db_conn->query("INSERT INTO `management`(`name`, `title`, `image_src`, `image_alt`, `facebook_link`, `twitter_link`, `linkedin_link`, `skype_link`) VALUES ('$name','$title','$image_src_for_insert','$image_alt_for_insert','$facebook','$twitter','$linkedin','$skype')");

            if ($insert_member) {
                $res = array(
                    "error" => false,
                    "msg" => "Member Added Successfully!",
                );
                exit(json_encode($res));
            }
    }
}

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['addSponsor']) && $_POST['addSponsor'] === "success"){
    $name = sefuda($_POST['name']);
    $link = sefuda($_POST['link']);
    $companyImg_name = ($_FILES['companyImg']['name'] ?? null);
    $companyImg_tmpName = ($_FILES['companyImg']['tmp_name'] ?? null);
    $companyImg_size = ($_FILES['companyImg']['size'] ?? null);
    $companyImg_type = ($_FILES['companyImg']['type'] ?? null);

    $image_array = ["image/jpg", "image/png", "image/jpeg"];
    $allow_size = 5 * 1024 * 1024;

    if(empty($name)){
        $res = array(
            "error" => true,
            "msg" => "Please write a name of this company!",
        );
        exit(json_encode($res));
    }elseif(empty($link)){
        $res = array(
            "error" => true,
            "msg" => "Please enter link for this company!",
        );
        exit(json_encode($res));
    }elseif(empty($companyImg_name)){
        $res = array(
            "error" => true,
            "msg" => "Please select an image!",
        );
        exit(json_encode($res));
    }elseif(!getimagesize($companyImg_tmpName)){
        $res = array(
            "error" => true,
            "msg" => "Please select an image file!",
        );
        exit(json_encode($res));
    }elseif(!in_array($companyImg_type ,$image_array)){
        $res = array(
            "error" => true,
            "msg" => "Only allow jpg, png, jpeg formate!",
        );
        exit(json_encode($res));
    }elseif($allow_size < $companyImg_size){
        $res = array(
            "error" => true,
            "msg" => "Your image is too large in size!",
        );
        exit(json_encode($res));
    }else{
            $a = "ABCDEFGHIJKLMNOPQRSTUVWabcdefghijklmnopqrstuvwxyz0123456789";
            $ext = pathinfo($companyImg_name, PATHINFO_EXTENSION);
            $uniqName = "alhuda-sponsor-" . str_replace(' ', '-', strtolower($name)) . "-" . strtolower(substr(str_shuffle($a), 0, 8)) . uniqid() . rand() . "." . $ext;

            $img_location = "../../static/images/sponsor/$uniqName";
            $image_src_for_insert = "static/images/sponsor/$uniqName";
            $image_alt_for_insert = "alhuda-sponsor-" . strtolower($name);

            $move = move_uploaded_file($companyImg_tmpName, $img_location);

            $insert_sponsor = $db_conn->query("INSERT INTO `sponsor`(`name`, `link`, `image_src`, `image_alt`) VALUES ('$name','$link','$image_src_for_insert','$image_alt_for_insert')");

            if ($insert_sponsor) {
                $res = array(
                    "error" => false,
                    "msg" => "Sponsor Added Successfully!",
                );
                exit(json_encode($res));
            }
    }
}

?>
