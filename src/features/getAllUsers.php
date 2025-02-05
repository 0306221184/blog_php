<?php
function getAllUsers()
{
    $userId = Session::get('userId');
    try {
        if (Session::get('role') == "ADMIN") {
            $getAllUserQuery = "SELECT id,username,role,isDisable FROM Users
                                ORDER BY isDisable ASC;";
            $getAllUserResult = Database::select($getAllUserQuery);
            if ($getAllUserResult !== false) {
                $getAllUserData = $getAllUserResult->fetch_all(MYSQLI_ASSOC);
                return $getAllUserData;
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

