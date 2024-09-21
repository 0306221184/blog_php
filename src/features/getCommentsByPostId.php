<?php
function getCommentsByPostId($postId)
{
    try {
        $getCommentsByPostIdQuery = "SELECT id,content,postId,userId,createdAt FROM Comments WHERE postId=$postId";
        $getCommentsByPostIdResult = Database::select($getCommentsByPostIdQuery);
        if ($getCommentsByPostIdResult != false) {
            $getCommentsByPostIdData = $getCommentsByPostIdResult->fetch_all(MYSQLI_ASSOC);
            return $getCommentsByPostIdData;
        } else return false;
    } catch (Exception $e) {
        return false;
    }
}
