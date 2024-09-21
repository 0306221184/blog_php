<?php
try {
    require "../lib/database.php";
    $commentId = isset($_GET['commentId']) ? $_GET['commentId'] : false;
    $postAuthorId = isset($_GET['postAuthorId']) ? $_GET['postAuthorId'] : false;
    $postId = isset($_GET['postId']) ? $_GET['postId'] : false;
    if ($commentId) {
        $deleteCommentQuery = "DELETE FROM Comments WHERE id = $commentId";
        $deleteCommentResult = Database::delete($deleteCommentQuery);
        if ($deleteCommentResult !== false) {
            header("Location: ../../post.php?authorId=$postAuthorId&postId=$postId&message=Comment deleted!!!#postComments");
            die();
        } else {
            header("Location: ../../post.php?authorId=$postAuthorId&postId=$postId&error=Can not delete comment,server error!!!#postComments");
            die();
        }
    } else {
        header("Location: ../../post.php?authorId=$postAuthorId&postId=$postId&error=Comment id required!!!#postComments");
        die();
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    header("Location: ../../post.php?authorId=$postAuthorId&postId=$postId&error=My server error!!!#postComments");
    die();
}
