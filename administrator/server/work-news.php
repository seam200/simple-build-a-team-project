<?php
include_once("./db-connect.php");
function sefuda($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripcslashes($data);

    return $data;
}

$select_news = ($db_conn->query("SELECT * FROM `news` WHERE `id` = 1")) ?? null;

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addBreakingNews']) && $_POST['addBreakingNews'] == "success") {
    $newsDetails = sefuda($_POST['newsDetails']);
    $newsLink = sefuda($_POST['newsLink']);

    if (empty($newsDetails)) {
        $res = [
            "error" => true,
            "msg" => "Details are not available to published!"
        ];
        exit(json_encode($res));
    } else {
        if ($select_news->num_rows !== 1) {
            $newsDetails = mysqli_real_escape_string($db_conn, $newsDetails);
            $newsLink = mysqli_real_escape_string($db_conn, $newsLink);
            $newsLink = $newsLink ?? null;
            $insert_news = $db_conn->query("INSERT INTO `news`(`link_href`, `details`) VALUES ('$newsLink','$newsDetails')");

            if ($insert_news) {
                $res = [
                    "error" => false,
                    "msg" => "Breaking News Added Successfully!"
                ];
                exit(json_encode($res));
            } else {
                $res = [
                    "error" => true,
                    "msg" => "Something Went Worng!"
                ];
                exit(json_encode($res));
            }
        } else {
            $res = [
                "error" => true,
                "msg" => "News Already Published. Now You should update it!"
            ];
            exit(json_encode($res));
        }
    }
} elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBreakingNews']) && $_POST['updateBreakingNews'] == "success") {
    $newsDetails = sefuda($_POST['newsDetails']);
    $newsLink = sefuda($_POST['newsLink']);

    $newsDetails = mysqli_real_escape_string($db_conn, $newsDetails);
    $newsLink = mysqli_real_escape_string($db_conn, $newsLink);
    $newsLink = $newsLink ?? null;
    $newsDetails = $newsDetails ?? null;
    $updated_news = $db_conn->query("UPDATE `news` SET `link_href`='$newsLink',`details`='$newsDetails' WHERE `id` = 1");

    if ($updated_news) {
        $res = [
            "error" => false,
            "msg" => "Breaking News Updated Successfully!"
        ];
        exit(json_encode($res));
    } else {
        $res = [
            "error" => true,
            "msg" => "Something Went Worng!"
        ];
        exit(json_encode($res));
    }
} else {
    $res = [
        "error" => true,
        "msg" => "Your Server Request Is not accepted!"
    ];
    exit(json_encode($res));
}
