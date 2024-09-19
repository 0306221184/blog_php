<?php
function getUserById($userId)
{
    try {
        $getUserByIdQuery = "SELECT id,fullname,email,username,password,phoneNumber,avatar,gender,role,isDisable,createdAt
                            FROM Users
                            WHERE id = '$userId'";
        $getUserByIdResult = Database::select($getUserByIdQuery);
        if ($getUserByIdResult !== false) {
            $getUserByIdData = $getUserByIdResult->fetch_assoc();
            return $getUserByIdData;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}
