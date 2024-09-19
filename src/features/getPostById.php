<?php
function getPostsById($postId)
{
    try {
        $getPostByIdQuery = "SELECT Posts.id,Posts.title,Posts.content,Users.username AS username,Posts.isActive,Categories.name AS category
                                FROM Posts 
                                INNER JOIN Categories ON Posts.categoryId = Categories.id
                                INNER JOIN Users ON Posts.authorId = Users.id
                                WHERE Posts.id = '$postId'";
        $getPostByIdResult = Database::select($getPostByIdQuery);
        if ($getPostByIdResult !== false) {
            $getPostByIdData = $getPostByIdResult->fetch_assoc();
            return $getPostByIdData;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}
