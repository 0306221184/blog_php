<?php
try {
    require "../lib/session.php";
    require "../lib/database.php";
    Session::init();
    $userId = Session::get('userId');
    $postId = isset($_POST['postId']) ? $_POST['postId'] : false;
    $commentContent = isset($_POST['commentContent']) ? $_POST['commentContent'] : false;
    $postAuthorId = isset($_GET['postAuthorId']) ? $_GET['postAuthorId'] : false;
    if (!$userId) {
        header('Location: ./login.php');
        die();
    } elseif (!$postId || !$commentContent) {
        header("Location: ../../post.php?authorId=$postAuthorId&postId=$postId&error=Can not find your comment content!!!#postComments");
        die();
    } else {
        $insertCommentQuery = "INSERT INTO Comments (content,postId,userId) VALUES ('$commentContent','$postId','$userId')";
        $insertCommentResult = Database::insert($insertCommentQuery);
        if ($insertCommentResult !== false) {
            header("Location: ../../post.php?authorId=$postAuthorId&postId=$postId&message=Comment create successfully!!!#postComments");
            die();
        } else {
            header("Location: ../../post.php?authorId=$postAuthorId&postId=$postId&error=Add comment failed,something went wrong!!!#postComments");
            die();
        }
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    header("Location: ../../post.php?authorId=$postAuthorId&postId=$postId&error=My server error!!!#postComments");
    die();
}
