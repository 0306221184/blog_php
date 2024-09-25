<?php
function getNumberOfCategories($limit)
{
    $userId = Session::get('userId');
    try {
        if (Session::get('login') == true) {
            $getNumberOfCategoriesQuery = "SELECT Categories.id AS id,name,description,Users.username as authorName FROM Categories INNER JOIN  Users ON Categories.authorId = Users.id LIMIT $limit";
            $getNumberOfCategoriesResult = Database::select($getNumberOfCategoriesQuery);
            if ($getNumberOfCategoriesResult !== false) {
                $getNumberOfCategoriesData = $getNumberOfCategoriesResult->fetch_all(MYSQLI_ASSOC);
                return $getNumberOfCategoriesData;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } catch (Exception $e) {
        $error =  $e->getMessage();
        return false;
    }
}