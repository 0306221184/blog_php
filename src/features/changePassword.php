<?php
require '../lib/session.php';
Session::init();
try {
    $userId = Session::get("userId");
    $oldPassword = isset($_POST["oldPassword"]) ? trim($_POST["oldPassword"]) : "";
    $newPassword = isset($_POST["newPassword"]) ? trim($_POST["newPassword"]) : "";
    $checkPassword = password_verify($oldPassword, Session::get("password"));
    $confirmPassword = isset($_POST["confirmPassword"]) ? trim($_POST["confirmPassword"]) : "";
    if ($checkPassword) {
        if ($newPassword == $confirmPassword) {
            $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updatePasswordQuery = "UPDATE Users SET password = '$newHashedPassword' WHERE id='$userId'";
            require "../lib/database.php";
            $updatePasswordResult = Database::update($updatePasswordQuery);
            if ($updatePasswordResult != false) {
                header("Location: ../../user.php?path=profile&userId=$userId&message=Change password successfully!!");
            } else {
                header("Location: ../../changePassword.php?error=Change password failed, some thing went wrong!!");
                die();
            }
        } else {
            header("Location: ../../changePassword.php?error=Make sure confirm right password!!");
            die();
        }
    } else {
        header("Location: ../../changePassword.php?error=$oldPassword,$newPassword,$confirmPassword,$userPassword!!");
        die();
    }
} catch (Exception $e) {
}
