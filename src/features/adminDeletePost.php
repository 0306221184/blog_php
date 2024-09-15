<?php
require "../lib/session.php";
Session::init();
$userId = Session::get("userId");
$postId = isset($_GET["postId"]) ? $_GET["postId"] : false;
if ($postId !== false) {
    try {
        require "../lib/database.php";
        $activePostQuery = "DELETE FROM Posts WHERE id = $postId";
        $activePostResult = Database::update($activePostQuery);
        if ($activePostResult !== false) {
            header("Location: ../../user.php?path=manage-posts&userId=$userId&message=Post deleted!!");
            die();
        } else {
            header("Location: ../../user.php?path=manage-posts&userId=$userId&error=Delete post failed!!");
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
