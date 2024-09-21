<?php
function getPostsCountRows($whereCondition)
{
    try {
        $getCountRowsQuery = "SELECT COUNT(id) AS countRows FROM Posts WHERE $whereCondition";
        $getCountRowsResult = Database::select($getCountRowsQuery);
        if ($getCountRowsResult !== false) {
            $getCountRowsData = $getCountRowsResult->fetch_assoc();
            return $getCountRowsData;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}