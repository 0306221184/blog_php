<?php
require "../lib/session.php";
Session::init();
$userId = Session::get("userId");
$userRole = Session::get("role");
$postId = isset($_GET["postId"]) ? $_GET["postId"] : false;
if ($postId !== false) {
    try {
        require "../lib/database.php";
        require "./getPostById.php";
        $deletePostData = getPostsById($postId);
        $deleteThumbnailPath = str_replace('./src/', '../', $deletePostData['avatar']);
        if (file_exists($deleteThumbnailPath)) {
            unlink($deleteThumbnailPath);
        }
        $deletePostQuery = "DELETE FROM Posts WHERE id = $postId";
        $deletePostResult = Database::update($deletePostQuery);
        if ($deletePostResult !== false) {
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