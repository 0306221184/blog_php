<?php
require "../lib/session.php";
Session::init();
$userId = Session::get(('userId'));
$postTitle = isset($_POST['title']) ? trim($_POST["title"]) : "";
$postCategoryId = isset($_POST['category']) ? trim($_POST["category"]) : "";
$postContent = isset($_POST['content']) ? trim($_POST["content"]) : "";

try {
    if (empty($postTitle) || empty($postCategory) || empty($postContent)) {
        $uploadDir = "./src/assets/uploads/";
        $uploadDirMove = '../assets/uploads/';
        $thumbnailFileName;
        $thumbnailFileTmpPath;
        $thumbnailFileSize;
        $thumbnailFileType;
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
            $thumbnailFileName = $_FILES['thumbnail']['name'];
            $thumbnailFileTmpPath = $_FILES['thumbnail']['tmp_name'];
            $thumbnailFileSize = $_FILES['thumbnail']['size'];
            $thumbnailFileType = $_FILES['thumbnail']['type'];
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($thumbnailFileName, PATHINFO_EXTENSION));
            if (in_array($fileExtension, $allowedExtensions)) {
                $maxFileSize = 5 * 1024 * 1024;
                if ($thumbnailFileSize <= $maxFileSize) {
                    $newThumbnailFileName = uniqid() . '.' . $fileExtension;
                    $pathThumbnailFileName = $uploadDir . $newThumbnailFileName;
                    $pathMoveThumbnailFileName = $uploadDirMove . $newThumbnailFileName;
                    if (move_uploaded_file($thumbnailFileTmpPath, $pathMoveThumbnailFileName)) {
                        $createPostQuery = "INSERT INTO Posts (title,content,thumbnail,categoryId,authorId) 
                        VALUES ('$postTitle','$postContent','$pathThumbnailFileName','$postCategoryId','$userId')";
                        require "../lib/database.php";
                        require "../features/createNotification.php";
                        $createPostResult = Database::insert($createPostQuery);
                        if ($createPostResult != false) {
                            $createNotification = createNotification($userId, "POST", $postTitle);
                            header("Location: ../../writePost.php?message=Create post successfully!!");
                            die();
                        } else {
                            header("Location: ../../writePost.php?error=Something went wrong!!");
                            die();
                        }
                    } else {
                        header("Location: ../../writePost.php?error=Upload thumbnail failed, something went wrong!!");
                        die();
                    }
                } else {
                    header("Location: ../../writePost.php?error=File maxsize only 5MB!!");
                    die();
                }
            } else {
                header("Location: ../../writePost.php?error=Except jpg,jpeg,png,gif only!! $fileExtension");
                die();
            }
        } else {
            header("Location: ../../writePost.php?error=Upload thumbnail failed, something went wrong!!");
            die();
        }
    } else {
        header("Location: ../../writePost.php?error=All input is required!!");
        die();
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    header("Location: ../../writePost.php?error=$error!!");
    die();
}
