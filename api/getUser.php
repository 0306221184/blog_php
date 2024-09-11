<?php
require '../src/lib/session.php';
Session::init();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = [
        "status" => "OK",
        "id" => $_SESSION['userId'],
        "email" => $_SESSION["email"],
        "username" => $_SESSION["username"],
        "avatar" => $_SESSION["avatar"],
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If the request is not a POST request, you can handle it differently or return an error
    header('HTTP/1.1 405 Method Not Allowed');
    $response = ["error" => "Only POST method is allowed"];
    header('Content-Type: application/json');
    echo json_encode($response);
}
