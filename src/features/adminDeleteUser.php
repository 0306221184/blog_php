<?php
require "../lib/session.php";
Session::init();
$userId = Session::get("userId");
$userRole =  Session::get("role");
$deleteUserId = isset($_GET["userId"]) ? $_GET["userId"] : false;
if ($userRole == "ADMIN") {
    if ($deleteUserId !== false) {
        try {
            require "../lib/database.php";
            require "./getUserById.php";
            $deleteUserData = getUserById($userId);
            $deleteAvatarPath = str_replace('./src/', '../', $deleteUserData['avatar']);
            if (file_exists($deleteAvatarPath)) {
                unlink($deleteAvatarPath);
            }
            $deleteUserQuery = "DELETE FROM Users WHERE id = $deleteUserId";
            $deleteUserResult = Database::update($deleteUserQuery);
            if ($deleteUserResult !== false) {
                header("Location: ../../user.php?path=manage-users&userId=$userId&message=User deleted!!");
                die();
            } else {
                header("Location: ../../user.php?path=manage-users&userId=$userId&error=Delete user failed!!");
                die();
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            header("Location: ../../user.php?path=manage-users&userId=$userId&error=$error!!");
            die();
        }
    } else {
        header("Location: ../../user.php?path=manage-users&userId=$userId&error=User id is required!!");
        die();
    }
} else {
    header("Location: ../../user.php?path=manage-users&userId=$userId&error=Permission denied!!");
    die();
}
