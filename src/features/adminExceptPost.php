<?php
require "../lib/session.php";
Session::init();
$userId = Session::get("userId");
$postId = isset($_GET["postId"]) ? $_GET["postId"] : false;
if ($postId !== false) {
    try {
        require "../lib/database.php";
        $activePostQuery = "UPDATE Posts SET isActive = true WHERE id = $postId";
        $activePostResult = Database::update($activePostQuery);
        if ($activePostResult !== false) {
            header("Location: ../../user.php?path=manage-posts&userId=$userId&message=Post Excepted!!");
            die();
        } else {
            header("Location: ../../user.php?path=manage-posts&userId=$userId&error=Except post failed!!");
            die();
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
        header("Location: ../../user.php?path=manage-posts&userId=$userId&error=$error!!");
        die();
    }
} else {
    header("Location: ../../user.php?path=manage-posts&userId=$userId&error=Post id is required!!");
    die();
}
