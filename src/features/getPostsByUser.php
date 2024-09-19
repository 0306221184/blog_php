<?php
function getPostsByUserId($id)
{
    try {
        $getPostByUserQuery = "SELECT Posts.id,Posts.title,Posts.content,Users.username AS username,Posts.isActive,Categories.name AS category
                                FROM Posts 
                                INNER JOIN Categories ON Posts.categoryId = Categories.id
                                INNER JOIN Users ON Posts.authorId = Users.id
                                WHERE Posts.authorId = '$id'";
        $getPostByUserResult = Database::select($getPostByUserQuery);
        if ($getPostByUserResult !== false) {
            $getPostByUserData = $getPostByUserResult->fetch_all(MYSQLI_ASSOC);
            return $getPostByUserData;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}
