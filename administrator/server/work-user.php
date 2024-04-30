<?php
include_once("./db-connect.php");
function sefuda($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['updateUserPost']) && $_POST['updateUserPost'] === "success") {

    $userId = sefuda($_POST['userId']);
    $userPost = sefuda($_POST['userPost']);

    if (empty($userId)) {
        $res = array(
            "error" => true,
            "msg" => "Something went wrong! Please try again.",
        );
        exit(json_encode($res));
    } elseif (empty($userPost)) {
        $res = array(
            "error" => true,
            "msg" => "Please enter a post for this user!",
        );
        exit(json_encode($res));
    } else {
        $update_user_post = $db_conn->query("UPDATE `register` SET `post`='$userPost' WHERE `id` = '$userId'");

        if ($update_user_post) {
            $res = array(
                "error" => false,
                "msg" => "User Post Updated Successfully!",
            );
            exit(json_encode($res));
        }
    }
}
