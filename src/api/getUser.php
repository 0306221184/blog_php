<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = [
        "status" => "OK",
        "username" => "Tinwana",
        "avatar" => "./src/assets/images/Logo.png"
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
