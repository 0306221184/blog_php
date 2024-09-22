<?php
function getNotificationByUserId($userId)
{
    try {
        $getNotificationByIdQuery = "SELECT id,userId,triggerUserId,type,content,isRead,createdAt
                                    FROM Nofitications
                                    WHERE userId='$userId' AND isRead = 0";
        $getNotificationByIdResult = Database::select($getNotificationByIdQuery);
        if ($getNotificationByIdResult !== false) {
            $getNotificationByIdData = $getNotificationByIdResult->fetch_all(MYSQLI_ASSOC);
            return $getNotificationByIdData;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}
