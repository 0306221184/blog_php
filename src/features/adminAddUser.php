<?php
require '../lib/session.php';
Session::init();
$userId = Session::get('userId');
$fullName = trim($_POST['fullName']);
$phoneNumber = trim($_POST['phoneNumber']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$confirmPassword = trim($_POST['confirmPassword']);
$email = trim($_POST['email']);
$confirmPassword = trim($_POST['confirmPassword']);
$role = trim($_POST['role']);
if (strlen($password) < 6) {
    header("Location: ../../user.php?path=add-user&userId=$userId&error=Password must be at least 6 characters");
    die();
}
if ($password !== $confirmPassword) {
    header("Location: ../../user.php?path=add-user&userId=$userId&error=Password not match!");
    die();
}
if (empty($username) || empty($password)) {
    header("Location: ../../user.php?path=add-user&userId=$userId&error=Username and password are required!");
    die();
}
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$queryCheckUser = "SELECT id FROM Users WHERE username='$username' OR email='$email'";
try {
    // Insert user data
    require '../lib/database.php';
    $checkUser = Database::select($queryCheckUser);
    if ($checkUser == false) {
        $updateAvatarStatus = false;
        $uploadDir = "./src/assets/uploads/";
        $uploadDirMove = '../assets/uploads/';
        $avatarFileName;
        $avatarFileTmpPath;
        $avatarFileSize;
        $avatarFileType;
        if (isset($_FILES['avatarUpload']) && $_FILES['avatarUpload']['error'] == 0) {
            $avatarFileName = $_FILES['avatarUpload']['name'];
            $avatarFileTmpPath = $_FILES['avatarUpload']['tmp_name'];
            $avatarFileSize = $_FILES['avatarUpload']['size'];
            $avatarFileType = $_FILES['avatarUpload']['type'];
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($avatarFileName, PATHINFO_EXTENSION));
            if (in_array($fileExtension, $allowedExtensions)) {
                // Check the size of the image (optional)
                $maxFileSize = 5 * 1024 * 1024; // 2 MB
                if ($avatarFileSize <= $maxFileSize) {
                    $newAvatarFileName = uniqid() . '.' . $fileExtension;
                    $pathAvatarFileName = $uploadDir . $newAvatarFileName;
                    $pathMoveAvatarFileName = $uploadDirMove . $newAvatarFileName;
                    if (move_uploaded_file($avatarFileTmpPath, $pathMoveAvatarFileName)) {
                        $adminCreateUserQuery = "INSERT INTO Users (fullName,phoneNumber,email,username, password,role,avatar ) VALUES ('$fullName','$phoneNumber','$email','$username','$hashedPassword','$role','$pathAvatarFileName')";
                        $insertUserResult = Database::insert($adminCreateUserQuery);
                        if ($insertUserResult !== false) {
                            header("Location: ../../user.php?path=add-user&userId=$userId&message=Create user successfully!!");
                            die();
                        } else {
                            header("Location: ../../user.php?path=add-user&userId=$userId&error=Create user failed!!");
                            die();
                        }
                    } else {
                        header("Location: ../../user.php?path=add-user&userId=$userId&error=Upload avatar failed!!");
                        die();
                    }
                } else {
                    header("Location: ../../user.php?user.php?path=add-user&userId=$userId&error=Avatar image have to less than 5MB!!");
                    die();
                }
            } else {
                header("Location: ../../user.php?user.php?path=add-user&userId=$userId&error=Avatar image have to a image!!");
                die();
            }
        } else {
            header("Location: ../../user.php?user.php?path=add-user&userId=$userId&error=Avatar is required!!");
            die();
        }
    } else {
        header("Location: ../../user.php?path=add-user&userId=$userId&error=User already exists!!");
        die();
    }
} catch (Exception $e) {
    // Handle database errors
    $error = $e->getMessage();
    header("Location: ../../user.php?path=add-user&userId=$userId&error=$error!!");
    die($e->getMessage());
}