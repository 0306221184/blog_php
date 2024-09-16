<?php
require "../lib/session.php";
Session::init();
$userId = Session::get("userId");
$userRole = Session::get("role");
$toggleUserId = isset($_GET["userId"]) ? $_GET["userId"] : false;
$isDisable = isset($_GET["isDisable"]) ? $_GET["isDisable"] : false;
if ($userRole == "ADMIN") {
    if ($toggleUserId !== false) {
        try {
            require "../lib/database.php";
            $enableUserQuery = "UPDATE Users SET isDisable = IF(isDisable=1, 0, 1) WHERE id = $toggleUserId";
            $enableUserResult = Database::update($enableUserQuery);
            if ($enableUserResult !== false) {
                header("Location: ../../user.php?path=manage-users&userId=$userId&message=User toggle successfully!!");
                die();
            } else {
                header("Location: ../../user.php?path=manage-users&userId=$userId&error=Except user failed!!");
                die();
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            header("Location: ../../user.php?path=manage-users&userId=$userId&error=$error!!");
            die();
        }
    } else {
        header("Location: ../../user.php?path=manage-users&userId=$userId&error=Users id is required!!");
        die();
    }
} else {
    header("Location: ../../user.php?path=manage-users&userId=$userId&error=Permission denied!!");
    die();
}
