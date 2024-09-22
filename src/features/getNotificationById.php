<?php
function getNotificationById($id)
{
    try {
        $getNotificationByIdQuery = "SELECT id,userId,triggerUserId,type,content,isRead,createdAt FROM Nofitications WHERE id=$id";
        $getNotificationByIdResult = Database::select($getNotificationByIdQuery);
        if ($getNotificationByIdResult !== false) {
            $getNotificationByIdData = $getNotificationByIdResult->fetch_assoc();
            return $getNotificationByIdData;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}
