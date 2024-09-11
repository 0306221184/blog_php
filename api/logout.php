<?php
require '../src/lib/session.php';
Session::init();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform logout operations
    // $_SESSION['login'] = false;
    // session_unset();
    // session_destroy();
    Session::destroy();


    $response = ["message" => "Logged out successfully"];
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If the request is not a POST request, you can handle it differently or return an error
    header('HTTP/1.1 405 Method Not Allowed');
    $response = ["error" => "Only POST method is allowed"];
    header('Content-Type: application/json');
    echo json_encode($response);
}