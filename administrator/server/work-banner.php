<?php
include_once("./db-connect.php");
function sefuda($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['addbanner']) && $_POST['addbanner'] === "success") {
    $title = sefuda($_POST['title']);
    $subTitle = sefuda($_POST['subTitle']);
    $bannerImg_name = ($_FILES['bannerImg']['name'] ?? null);
    $bannerImg_tmpName = ($_FILES['bannerImg']['tmp_name'] ?? null);
    $bannerImg_size = ($_FILES['bannerImg']['size'] ?? null);
    $bannerImg_type = ($_FILES['bannerImg']['type'] ?? null);

    $image_array = ["image/jpg", "image/png", "image/jpeg"];
    $allow_size = 5 * 1024 * 1024;

    if (empty($title)) {
        $res = array(
            "error" => true,
            "msg" => "Please write banner a title",
        );
        exit(json_encode($res));
    } elseif (empty($subTitle)) {
        $res = array(
            "error" => true,
            "msg" => "Please write banner a sub title",
        );
        exit(json_encode($res));
    } elseif (empty($bannerImg_name)) {
        $res = array(
            "error" => true,
            "msg" => "Please select an image!",
        );
        exit(json_encode($res));
    } elseif (!getimagesize($bannerImg_tmpName)) {
        $res = array(
            "error" => true,
            "msg" => "Please select an image file!",
        );
        exit(json_encode($res));
    } elseif (!in_array($bannerImg_type, $image_array)) {
        $res = array(
            "error" => true,
            "msg" => "Only allow jpg, png, jpeg formate!",
        );
        exit(json_encode($res));
    } elseif ($allow_size < $bannerImg_size) {
        $res = array(
            "error" => true,
            "msg" => "Your banner image is too large!",
        );
        exit(json_encode($res));
    } else {
        $a = "ABCDEFGHIJKLMNOPQRSTUVWabcdefghijklmnopqrstuvwxyz0123456789";
        $ext = pathinfo($bannerImg_name, PATHINFO_EXTENSION);
        $uniqName = "alhuda-banner-" . str_replace(' ', '-', strtolower($title)) . "-" . strtolower(substr(str_shuffle($a), 0, 8)) . uniqid() . rand() . "." . $ext;

        $location = "../../static/images/banner/$uniqName";
        $image_src_for_insert = "static/images/banner/$uniqName";
        $image_alt_for_insert = "alhuda-banner-" . strtolower($title);

        $move = move_uploaded_file($bannerImg_tmpName, $location);

        $inset_banner = $db_conn->query("INSERT INTO `banners`(`title`, `sub_title`, `image_src`, `image_alt`) VALUES ('$title','$subTitle','$image_src_for_insert','$image_alt_for_insert')");

        if ($inset_banner) {
            $res = array(
                "error" => false,
                "msg" => "Banner added Successfully!",
            );
            exit(json_encode($res));
        }
    }
} elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['updateBanner']) && $_POST['updateBanner'] === "success") {
    $bannerId = sefuda($_POST['bannerId']);
    $bannerTitle = sefuda($_POST['bannerTitle']);
    $bannerSubTitle = sefuda($_POST['bannerSubTitle']);
    $bannerImgName = ($_FILES['bannerImg']['name'] ?? null);
    $bannerImgTmpName = ($_FILES['bannerImg']['tmp_name'] ?? null);
    $bannerImgSize = ($_FILES['bannerImg']['size'] ?? null);
    $bannerImgType = ($_FILES['bannerImg']['type'] ?? null);


    $image_array = ["image/jpg", "image/png", "image/jpeg"];
    $allow_size = 5 * 1024 * 1024;


    if (empty($bannerTitle)) {
        $res = array(
            "error" => true,
            "msg" => "Please write banner a title",
        );
        exit(json_encode($res));
    } elseif (empty($bannerSubTitle)) {
        $res = array(
            "error" => true,
            "msg" => "Please write banner a sub title",
        );
        exit(json_encode($res));
    } else {
        if (!empty($bannerImgName)) {
            if (!getimagesize($bannerImgTmpName)) {
                $res = array(
                    "error" => true,
                    "msg" => "Please select an image file!",
                );
                exit(json_encode($res));
            } elseif (!in_array($bannerImgType, $image_array)) {
                $res = array(
                    "error" => true,
                    "msg" => "Only allow jpg, png, jpeg formate!",
                );
                exit(json_encode($res));
            } elseif ($allow_size < $bannerImgSize) {
                $res = array(
                    "error" => true,
                    "msg" => "Your banner image is too large!",
                );
                exit(json_encode($res));
            } else {
                $a = "ABCDEFGHIJKLMNOPQRSTUVWabcdefghijklmnopqrstuvwxyz0123456789";
                $ext = pathinfo($bannerImgName, PATHINFO_EXTENSION);
                $uniqName = "alhuda-banner-" . str_replace(' ', '-', strtolower($bannerTitle)) . "-" . strtolower(substr(str_shuffle($a), 0, 8)) . uniqid() . rand() . "." . $ext;

                $select_banner = (($db_conn->query("SELECT * FROM `banners` WHERE `id` = '$bannerId'"))->fetch_object()) ?? null;
                $fetch_img = $select_banner->image_src;

                if ($fetch_img !== null) {
                    unlink("../../" . $fetch_img);
                }

                $location = "../../static/images/banner/$uniqName";
                $image_src_for_insert = "static/images/banner/$uniqName";
                $image_alt_for_insert = "alhuda-banner-" . strtolower($bannerTitle);

                $move = move_uploaded_file($bannerImgTmpName, $location);

                if ($move) {
                    $update_banner = $db_conn->query("UPDATE `banners` SET `title`='$bannerTitle',`sub_title`='$bannerSubTitle',`image_src`='$image_src_for_insert',`image_alt`='$image_alt_for_insert' WHERE `id` = '$bannerId'");

                    if ($update_banner) {
                        $res = array(
                            "error" => false,
                            "msg" => "Banner info Updated Successfully!",
                        );
                        exit(json_encode($res));
                    }
                }
            }
        } elseif (empty($bannerImgName)) {
            $update_banner = $db_conn->query("UPDATE `banners` SET `title`='$bannerTitle',`sub_title`='$bannerSubTitle' WHERE `id` = '$bannerId'");

            if ($update_banner) {
                $res = array(
                    "error" => false,
                    "msg" => "Banner info Updated Successfully!",
                );
                exit(json_encode($res));
            }
        }
    }
} elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['deleteBanner']) && $_POST['deleteBanner'] === "success") {
    $banner_id = sefuda($_POST['bannerId']);

    if (empty($banner_id)) {
        $res = array(
            "error" => true,
            "msg" => "Something went wrong!",
        );
        exit(json_encode($res));
    } else {
        $select_banner = (($db_conn->query("SELECT * FROM `banners` WHERE `id` = '$banner_id'"))->fetch_object()) ?? null;
        $fetch_img = $select_banner->image_src;

        if ($fetch_img !== null) {
            unlink("../../" . $fetch_img);
        }

        $delete_query = $db_conn->query("DELETE FROM `banners` WHERE `id` = '$banner_id'");
        if ($delete_query) {
            $res = array(
                "error" => false,
                "msg" => "Banner Deleted Successfully!",
            );
            exit(json_encode($res));
        }
    }
} elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['updateStatus']) && $_POST['updateStatus'] === "success") {

    $bannerId = sefuda($_POST['bannerId']);
    $isChecked = sefuda($_POST['isChecked']);

    // Check if the checkbox is checked or unchecked
    if (isset($isChecked) &&  $isChecked === "true") {
        // Checkbox is checked, update status to 'active'
        $status = "active";
    } else {
        // Checkbox is unchecked, update status to 'inactive'
        $status = "inactive";
    }


    $update_status = $db_conn->query("UPDATE `banners` SET `status`='$status' WHERE `id` = '$bannerId'");

    if ($update_status) {
        $res = "Banner Status Updated Successfully!";
        exit($res);
    } else {
        $res = "Something Went wrong!";
        exit($res);
    }
} else {
    $res = array(
        "error" => true,
        "msg" => "Invalid request method!",
    );
    exit(json_encode($res));
}
