<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '../lib/database.php';
    require '../lib/session.php';
    Session::init();
    $type = $_POST["type"];
    $userId = Session::get('userId');
    $followerId = isset($_GET['followerId']) && !empty($_GET['followerId']) ? $_GET['followerId'] : null;
    if ($type == "update") {
        $updateAvatarStatus = false;
        $getOldAvatarPathQuery = "SELECT avatar from Users WHERE id='$userId'";
        $oldAvatarPathResult = Database::select($getOldAvatarPathQuery);
        $oldAvatarPath = $oldAvatarPathResult->fetch_assoc();
        $oldAvatarPathFinal = str_replace("./src", "..", $oldAvatarPath);
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
                $maxFileSize = 5 * 1024 * 1024;
                if ($avatarFileSize <= $maxFileSize) {
                    $newAvatarFileName = uniqid() . '.' . $fileExtension;
                    $pathAvatarFileName = $uploadDir . $newAvatarFileName;
                    $pathMoveAvatarFileName = $uploadDirMove . $newAvatarFileName;
                    if (move_uploaded_file($avatarFileTmpPath, $pathMoveAvatarFileName)) {
                        if (file_exists($oldAvatarPathFinal["avatar"])) {
                            unlink($oldAvatarPathFinal["avatar"]);
                        }
                        $updateAvatarQuery = "UPDATE Users SET avatar='$pathAvatarFileName' WHERE id='$userId'";
                        $updateAvatarResult = Database::update($updateAvatarQuery);
                        if ($updateAvatarResult != false) {
                            $updateAvatarStatus = true;
                        } else {
                            header("Location: ../../user.php?path=profile&userId=$userId&error=Upload avatar failed!!");
                            die();
                        }
                    }
                } else {
                    header("Location: ../../user.php?path=profile&userId=$userId&error=Upload avatar failed!!");
                    die();
                }
            } else {
                header("Location: ../../user.php?path=profile&userId=$userId&error=Avatar image have to less than 5MB!!");
                die();
            }
        }
        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "NỮ";
        $phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : "";
        try {
            $updateProfileQuery = "UPDATE Users SET email='$email',gender=N'$gender',phoneNumber='$phoneNumber' WHERE id='$userId'";
            $userInfoQuery = "SELECT id,email, password,role,avatar,gender,phoneNumber FROM Users WHERE id='$userId'";
            $updateProfileResult = Database::update($updateProfileQuery);
            if ($updateProfileResult != false) {
                $userInfoResult = Database::select($userInfoQuery);
                if ($userInfoResult != false) {
                    $user = $userInfoResult->fetch_assoc();
                    Session::set('userId', $user['id']);
                    Session::set('role', $user['role']);
                    Session::set('email', $user['email']);
                    Session::set('avatar', $user['avatar']);
                    Session::set('gender', $user['gender']);
                    Session::set('phoneNumber', $user['phoneNumber']);
                }
                header("Location: ../../user.php?path=profile&userId=$userId&message=Updated your profile");
                die();
            } else {
                header("Location: ../../user.php?path=profile&userId=$userId&error=Update failed, something went wrong!!");
                die();
            }
        } catch (Exception $e) {
            $checkEmailError = str_contains($e, "user.email");
            if ($checkEmailError) {
                header("Location: ../../user.php?path=profile&userId=$userId&error=Email is already in use!!!");
                die();
            } else {
                header("Location: ../../user.php?path=profile&userId=$userId&error=Update failed, something went wrong!!");
                die();
            }
        }
    } else if ($type = "follow") {
        try {
            if ($followerId) {
                $selectFollowerQuery = "SELECT followerId,followedId FROM Followers WHERE followerId = $userId AND followedId = $followerId";
                $checkFollower = Database::select($selectFollowerQuery);
                if ($checkFollower == false) {
                    $insertFollowerQuery = "INSERT INTO Followers (followerId,followedId) VALUES ('$userId','$followerId')";
                    $insertFollowerResult = Database::insert($insertFollowerQuery);
                    if ($insertFollowerResult !== false) {
                        header("Location: ../../user.php?path=profile&userId=$followerId&message=Followed");
                        die();
                    } else {
                        header("Location: ../../user.php?path=profile&userId=$followerId&error=Can not follow,server error!!");
                        die();
                    }
                } else {
                    header("Location: ../../user.php?path=profile&userId=$followerId&message=Already follow!!");
                    die();
                }
            } else {
                header("Location: ../../user.php?path=profile&userId=$followerId&error=Follower id is required!!");
                die();
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            header("Location: ../../user.php?path=profile&userId=$followerId&error=Can not follow,$error!!");
            die();
        }
    }
}
