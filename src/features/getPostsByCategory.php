<?php
function getPostsByCategory($categoryId, $offsetLimit, $limit)
{
    try {
        $getPostsByCategoryQuery = "SELECT Posts.id,Posts.title,Posts.content,Posts.authorId,Posts.thumbnail,Posts.isActive,Categories.name AS category
                                FROM Posts 
                                INNER JOIN Categories ON Posts.categoryId = Categories.id
                                INNER JOIN Users ON Posts.authorId = Users.id
                                WHERE Posts.isActive = 1 AND Posts.categoryId = '$categoryId'
                                LIMIT $offsetLimit,$limit";
        $getPostsByCategoryResult = Database::select($getPostsByCategoryQuery);
        if ($getPostsByCategoryResult !== false) {
            $getPostsByCategoryData = $getPostsByCategoryResult->fetch_all(MYSQLI_ASSOC);
            return $getPostsByCategoryData;
        } else {
            return false;
        }
    } catch (Exception $e) {
        $error =  $e->getMessage();
        return $error;
    }
}