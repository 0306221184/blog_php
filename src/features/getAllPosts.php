<?php
function getAllPosts()
{
    try {
        if (Session::get('role') == "ADMIN") {
            $getAllPostsQuery = "SELECT Posts.id,Posts.title,Posts.content,Users.username AS username,Posts.isActive,Categories.name AS category
                                FROM Posts 
                                INNER JOIN Categories ON Posts.categoryId = Categories.id
                                INNER JOIN Users ON Posts.authorId = Users.id
                                ORDER BY isActive ASC;";
            $getAllPostsResult = Database::select($getAllPostsQuery);
            if ($getAllPostsResult !== false) {
                $getAllPostsData = $getAllPostsResult->fetch_all(MYSQLI_ASSOC);
                return $getAllPostsData;
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