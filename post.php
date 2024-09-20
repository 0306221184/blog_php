<?php
require './src/lib/database.php';
require './src/lib/session.php';
require './src/features/getUserById.php';
require './src/features/getPostById.php';
require "./src/helpers/format.php";
Session::init();
Session::checkSession();
$authorId = isset($_GET['authorId']) ? $_GET['authorId'] : false;
$postId = isset($_GET['postId']) ? $_GET['postId'] : false;
if ($authorId == false || $postId == false) {
    header("Location: ./index.php?error=author and post id is required!!!");
    die();
} else {
    $authorData = getUserById($authorId);
    $postData = getPostsById($postId);
    if ($authorData == false || $postData == false) {
        header("Location: ./index.php?error=Server error!!!");
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/header.css">
    <link rel="stylesheet" href="./src/css/footer.css">
    <link rel="stylesheet" href="./src/css/style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="module" src="./src/js/index.js"></script>
    <title>Post</title>
</head>

<body>
    <?php
    require('./src/components/header/index.php')
    ?>
    <main class="container post-main">
        <div class="post-header">
            <p class="post-header__category"><?= $postData['category'] ?></p>
            <h1 class="post-header__title"><?= $postData['title'] ?></h1>
            <p class="post-header__foreword"><?= Format::textShorten($postData['content']) ?></p>
            <a href="<?= isset($_SESSION["login"]) ? "./user.php?path=profile&userId=$authorId" : "login.php" ?>"
                class="post-header__author">
                <img src="<?= $authorData["avatar"] ?>" alt="avatar" class="avatar-img img-thumbnail">
                <div class="post-header__info">
                    <div class="post-authorName"><?= $authorData["username"] ?></div>
                    <div class="post-UploadDay"><?= $postData['createdAt'] ?></div>
                </div>
            </a>
        </div>
        <div class="post-body">
            <p class="post-body__text">
                <?= $postData['content'] ?>
            </p>
        </div>
        <?php require './src/components/postComment/index.php' ?>
    </main>
    <?php
    require('./src/components/footer/footer.php')
    ?>
</body>

</html>