<?php
require '../lib/session.php';
Session::init();
$username = trim($_POST['username']);
$password = trim($_POST['password']);
if (strlen($password) < 6) {
    header("Location: ../../login.php?error=Password must be at least 6 characters");
    die();
}

if (empty($username) || empty($password)) {
    header('Location: ../../login.php?error=Username and password are required!');
    die();
}
$queryAuthentication = "SELECT id,email,username, password,role,avatar,gender,phoneNumber FROM user WHERE username='$username'";
try {
    // Insert user data
    require '../lib/database.php';
    $userResult = Database::select($queryAuthentication);
    if ($userResult != false) {
        $user = $userResult->fetch_assoc();
        $checkPassword = password_verify($password, $user['password']);
        if ($checkPassword) {
            Session::init();
            Session::set('login', true);
            Session::set('userId', $user['id']);
            Session::set('role', $user['role']);
            Session::set('email', $user['email']);
            Session::set('username', $user['username']);
            Session::set('avatar', $user['avatar']);
            Session::set('gender', $user['gender']);
            Session::set('phoneNumber', $user['phoneNumber']);
            header("Location: ../../index.php");
        } else {
            header("Location: ../../login.php?error=Wrong password!!");
            die();
        }
    } else {
        header("Location: ../../login.php?error=User not exists!!");
        die();
    }
} catch (Exception $e) {
    // Handle database errors
    $error = $e->getMessage();
    header("Location: ../../login.php?error=$error!!");
    die($e->getMessage());
}
