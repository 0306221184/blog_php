<?php
require "../lib/session.php";
Session::init();
$userId = Session::get(('userId'));
$postId = isset($_POST['postId']) ? trim($_POST["postId"]) : "";
$postTitle = isset($_POST['title']) ? trim($_POST["title"]) : "";
$postCategoryId = isset($_POST['category']) ? trim($_POST["category"]) : "";
$postContent = isset($_POST['content']) ? trim($_POST["content"]) : "";

try {
    if (empty($postTitle) || empty($postCategory) || empty($postContent)) {
        $updatePostQuery = "UPDATE Posts SET title='$postTitle' , content='$$postContent' , categoryId='$postCategoryId' WHERE id='$postId';";
        require "../lib/database.php";
        $updatePostResult = Database::insert($updatePostQuery);
        if ($updatePostResult != false) {
            header("Location: ../../user.php?path=manage-posts&userId=$userId&message=Update post successfully!!");
            die();
        } else {
            header("Location: ../../user.php?path=manage-posts&userId=$userId&error=Something went wrong!!");
            die();
        }
    } else {
        header("Location: ../../user.php?path=manage-posts&userId=$userId&error=All input is required!!");
        die();
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    header("Location: ../../user.php?path=manage-posts&userId=$userId&error=$error!!");
    die();
}
