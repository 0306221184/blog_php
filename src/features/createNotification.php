<?php
function createNotification($triggerUserId, $type, $content)
{
    try {
        $createNotificationQuery = "INSERT INTO Nofitications (userId, triggerUserId, type, content)
                                    SELECT followerId, followedId, '$type','$content' 
                                    FROM Followers
                                    WHERE followedId = $triggerUserId";
        $createNotificationResult = Database::insert($createNotificationQuery);
        if ($createNotificationResult !== false) {
            return true;
        } else return false;
    } catch (Exception $e) {
        return false;
    }
}
