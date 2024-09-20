<?php
require './src/lib/database.php';
require './src/lib/session.php';
Session::init();
Session::checkSession();
$userId = Session::get("userId");
$postId = isset($_GET['postId']) ? trim($_GET['postId']) : false;
if (!$postId) {
    header("Location: user.php?path=manage-posts&userId=$userId");
    die();
} else {
    require './src/features/getPostById.php';
    $getPostByIdData = getPostsById($postId);
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
    <title>Modify your post!</title>
</head>

<body>
    <?php
    require('./src/components/header/index.php')
    ?>
    <main class="writePost-main">
        <h1 class="writePost-title">Sửa bài</h1>
        <form action="./src/features/editPost.php" class="writePost-form" method="POST" enctype="multipart/form-data">
            <input type="text" class="myInput w-100" name="title" placeholder="Tiêu đề"
                value="<?= $getPostByIdData['title'] ?>">
            <select name="category" id="category" class="writePost-form__category w-100">
                <?php
                require "./src/features/getAllCategories.php";
                $getAllCategoriesData = getAllCategories();
                ?>
                <?php foreach ($getAllCategoriesData as $item): ?>
                    <option <?= $getPostByIdData['category'] == $item['name'] ? "selected" : ""  ?>
                        value='<?= $item["id"] ?>'><?= $item["name"] ?></option>
                <?php endforeach; ?>
            </select>
            <textarea class="myInput writePost-form__postBody w-100" name="content"
                placeholder="Nội dung"><?= $getPostByIdData['content'] ?></textarea>
            <?php if (isset($_GET['error'])): ?>
                <p class="text-center text-danger fs-5"><?= $_GET['error'] ?></p>
            <?php elseif (isset($_GET['message'])): ?>
                <p class="text-center text-success fs-5"><?= $_GET['message'] ?></p>
            <?php endif; ?>
            <button type="submit" class="myBtn" name="postId" value="<?= $getPostByIdData['id'] ?>">Sửa bài</button>
        </form>
    </main>
    <?php
    require('./src/components/footer/footer.php')
    ?>
</body>

</html>