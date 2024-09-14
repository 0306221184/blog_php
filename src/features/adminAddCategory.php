<?php
require '../lib/session.php';
Session::init();
$userId = Session::get('userId');
$categoryName = trim($_POST['name']);
$categoryDescription = trim($_POST['description']);
if (Session::get("role") == "ADMIN" && Session::get('login') == true) {
    if (isset($categoryName) || isset($categoryDescription)) {
        try {
            require "../lib/database.php";
            $insertCategoryQuery = "INSERT INTO Categories (name,description,authorId) VALUES ('$categoryName', '$categoryDescription','$userId')";
            $insertCategoryResult = Database::insert($insertCategoryQuery);
            if ($insertCategoryResult !== false) {
                header("Location: ../../user.php?path=add-category&userId=$userId&message=Create category $name successfully!!!");
                die();
            } else {
                header("Location: ../../user.php?path=add-category&userId=$userId&error=Something went wrong!!");
                die();
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            header("Location: ../../user.php?path=add-category&userId=$userId&error=$error!!");
            die();
        }
    } else {
        header("Location: ../../user.php?path=add-category&userId=$userId&error=Name and description is required!!!");
        die();
    }
} else {
    header("Location: ../../user.php?path=add-category&userId=$userId&error=Permission denied!!!");
    die();
}