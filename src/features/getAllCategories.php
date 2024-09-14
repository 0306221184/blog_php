<?php
function getAllCategories()
{
    $userId = Session::get('userId');
    try {
        if (Session::get('login') == true) {
            $getAllCategoriesQuery = "SELECT name,description,Users.username as authorName FROM Categories INNER JOIN  Users ON Categories.authorId = Users.id";
            $getAllCategoriesResult = Database::select($getAllCategoriesQuery);
            if ($getAllCategoriesResult !== false) {
                $getAllCategoriesData = $getAllCategoriesResult->fetch_all(MYSQLI_ASSOC);
                return $getAllCategoriesData;
            } else {
                return "Something went wrong!!";
            }
        } else {
            return "Permission denied!!";
        }
    } catch (Exception $e) {
        $error =  $e->getMessage();
        return $error;
    }
}