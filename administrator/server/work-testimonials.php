<?php 
include_once("./db-connect.php");
function sefuda($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['addClientReview']) && $_POST['addClientReview'] === "success"){
    $name = sefuda($_POST['name']);
    $location = sefuda($_POST['location']);
    $details = sefuda($_POST['details']);
    $clientImg_name = ($_FILES['clientImg']['name'] ?? null);
    $clientImg_tmpName = ($_FILES['clientImg']['tmp_name'] ?? null);
    $clientImg_size = ($_FILES['clientImg']['size'] ?? null);
    $clientImg_type = ($_FILES['clientImg']['type'] ?? null);

    $image_array = ["image/jpg", "image/png", "image/jpeg"];
    $allow_size = 5 * 1024 * 1024;

    if(empty($clientImg_name)){
        $res = array(
            "error" => true,
            "msg" => "Please select an image!",
        );
        exit(json_encode($res));
    }elseif(!getimagesize($clientImg_tmpName)){
        $res = array(
            "error" => true,
            "msg" => "Please select an image file!",
        );
        exit(json_encode($res));
    }elseif(!in_array($clientImg_type ,$image_array)){
        $res = array(
            "error" => true,
            "msg" => "Only allow jpg, png, jpeg formate!",
        );
        exit(json_encode($res));
    }elseif($allow_size < $clientImg_size){
        $res = array(
            "error" => true,
            "msg" => "Your client image is too large in size!",
        );
        exit(json_encode($res));
    }elseif(empty($name)){
        $res = array(
            "error" => true,
            "msg" => "Please enter your client name!",
        );
        exit(json_encode($res));
    }elseif(empty($location)){
        $res = array(
            "error" => true,
            "msg" => "Please enter your client location!",
        );
        exit(json_encode($res));
    }elseif(empty($details)){
        $res = array(
            "error" => true,
            "msg" => "Please enter your client review!",
        );
        exit(json_encode($res));
    }else{
            $a = "ABCDEFGHIJKLMNOPQRSTUVWabcdefghijklmnopqrstuvwxyz0123456789";
            $ext = pathinfo($clientImg_name, PATHINFO_EXTENSION);
            $uniqName = "alhuda-client-" . str_replace(' ', '-', strtolower($name)) . "-" . strtolower(substr(str_shuffle($a), 0, 8)) . uniqid() . rand() . "." . $ext;

            $img_location = "../../static/images/client-review/$uniqName";
            $image_src_for_insert = "static/images/client-review/$uniqName";
            $image_alt_for_insert = "alhuda-client-" . strtolower($name);

            $move = move_uploaded_file($clientImg_tmpName, $img_location);

            $inset_testimonials = $db_conn->query("INSERT INTO `testimonials`( `name`, `location`, `details`,`image_src`,`image_alt`) VALUES ('$name','$location','$details','$image_src_for_insert','$image_alt_for_insert')");

            if ($inset_testimonials) {
                $res = array(
                    "error" => false,
                    "msg" => "Client Review Added Successfully!",
                );
                exit(json_encode($res));
            }
    }



}

?>
