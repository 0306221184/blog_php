<?php
require "../src/lib/session.php";
require "../src/lib/database.php";
Session::init();
$userId = Session::get("userId");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        require "../src/features/getNotificationsByUserId.php";
        $notificationData = getNotificationByUserId($userId) !== false ? getNotificationByUserId($userId) : [];
        $response = [
            "status" => "OK",
            "message" => "Fetch notifications successfully!",
            "data" => $notificationData
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (Exception $e) {
        $response = [
            "status" => "ERROR",
            "message" => $e->getMessage(),
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
