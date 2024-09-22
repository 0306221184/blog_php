<?php
function getFollowersByFollowedId($followedId)
{
    try {
        $getFollowersByFollowedIdQuery = "SELECT followerId,followedId,createdAt FROM Followers WHERE followedId = $followedId";
        $getFollowersByFollowedIdResult = Database::select($getFollowersByFollowedIdQuery);
        if ($getFollowersByFollowedIdResult !== false) {
            $getFollowersByFollowedIdData = $getFollowersByFollowedIdResult->fetch_all(MYSQLI_ASSOC);
            return $getFollowersByFollowedIdData;
        } else return false;
    } catch (Exception $e) {
        return false;
    }
}
