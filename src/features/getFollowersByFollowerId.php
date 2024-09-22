<?php
function getFollowersByFollowerId($followerId)
{
    try {
        $getFollowersByFollowerIdQuery = "SELECT followerId,followedId,createdAt FROM Followers WHERE followerId = $followerId";
        $getFollowersByFollowerIdResult = Database::select($getFollowersByFollowerIdQuery);
        if ($getFollowersByFollowerIdResult !== false) {
            $getFollowersByFollowerIdData = $getFollowersByFollowerIdResult->fetch_all(MYSQLI_ASSOC);
            return $getFollowersByFollowerIdData;
        } else return false;
    } catch (Exception $e) {
        return false;
    }
}
