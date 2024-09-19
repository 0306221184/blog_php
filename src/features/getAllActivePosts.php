<?php
function getAllActivePosts()
{
    try {
        $getAllActivePostsQuery = "SELECT Posts.id,Posts.title,Posts.content,Posts.authorId,Posts.thumbnail,Posts.isActive,Categories.name AS category
                                FROM Posts 
                                INNER JOIN Categories ON Posts.categoryId = Categories.id
                                INNER JOIN Users ON Posts.authorId = Users.id
                                WHERE Posts.isActive = 1";
        $getAllActivePostsResult = Database::select($getAllActivePostsQuery);
        if ($getAllActivePostsResult !== false) {
            $getAllActivePostsData = $getAllActivePostsResult->fetch_all(MYSQLI_ASSOC);
            return $getAllActivePostsData;
        } else {
            return false;
        }
    } catch (Exception $e) {
        $error =  $e->getMessage();
        return $error;
    }
}
