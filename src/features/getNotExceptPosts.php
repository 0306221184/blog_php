<?php
function getNotExceptPosts()
{
    try {
        if (Session::get('role') == "ADMIN") {
            $getNotExceptPostsQuery = "SELECT Posts.id,Posts.title,Posts.content,Posts.authorId,Categories.name AS category
            FROM Posts 
            INNER JOIN Categories ON Posts.categoryId = Categories.id
            WHERE isActive = false";
            $getNotExceptPostsResult = Database::select($getNotExceptPostsQuery);
            if ($getNotExceptPostsResult !== false) {
                $getNotExceptPostsData = $getNotExceptPostsResult->fetch_all(MYSQLI_ASSOC);
                return $getNotExceptPostsData;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } catch (Exception $e) {
        $error =  $e->getMessage();
        return $error;
    }
}