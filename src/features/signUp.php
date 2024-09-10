<?php
require '../lib/database.php';
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);
$confirmPassword = trim($_POST['confirmPassword']);
if (strlen($password) < 6) {
    header("Location: ../../signUp.php?error=Password must be at least 6 characters");
    die();
}
if ($password !== $confirmPassword) {
    header("Location: ../../signUp.php?error=Password not match!");
    die();
}
if (empty($username) || empty($password)) {
    header('Location: ../../signUp.php?error=Username and password are required!');
    die();
}
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$querySignUp = "INSERT INTO user (username, password, email) VALUES ('$username','$hashedPassword','$email')";
$queryCheckUser = "SELECT id FROM user WHERE username='$username' OR email='$email'";
try {
    // Insert user data
    $checkUser = Database::select($queryCheckUser);
    if ($checkUser == false) {
        $userId = Database::insert($querySignUp);
        header("Location: ../../login.php");
    } else {
        header("Location: ../../signUp.php?error=User already exists!!");
        die();
    }
} catch (Exception $e) {
    // Handle database errors
    $error = $e->getMessage();
    header("Location: ../../signUp.php?error=$error!!");
    die($e->getMessage());
}
