<?php
require './src/lib/database.php';
require './src/lib/session.php';
Session::init();
Session::checkSession();
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
    <title>Write your post!</title>
</head>

<body>
    <?php
    require('./src/components/header/index.php')
    ?>
    <main class="writePost-main">
        <h1 class="writePost-title">Viết bài</h1>
        <form action="./src/features/writePost.php" class="writePost-form" method="POST" enctype="multipart/form-data">
            <input type="text" class="myInput" name="title" placeholder="Tiêu đề">
            <select name="category" id="category" class="writePost-form__category">
                <?php
                require "./src/features/getAllCategories.php";
                $getAllCategoriesData = getAllCategories();
                ?>
                <?php foreach ($getAllCategoriesData as $item): ?>
                    <option value='<?= $item["id"] ?>'><?= $item["name"] ?></option>
                <?php endforeach; ?>
            </select>
            <textarea class="myInput writePost-form__postBody" name="content" placeholder="Nội dung"></textarea>
            <div class="writePost-form__thumbnail">
                <label for="thumbnail">Thêm ảnh</label>
                <input type="file" class="myInput" name="thumbnail" accept=".jpg,.jpeg,.png,.pdf">
            </div>
            <?php if (isset($_GET['error'])): ?>
                <p class="text-center text-danger fs-5"><?= $_GET['error'] ?></p>
            <?php elseif (isset($_GET['message'])): ?>
                <p class="text-center text-success fs-5"><?= $_GET['message'] ?></p>
            <?php endif; ?>
            <button type="submit" class="myBtn">Tạo bài</button>
        </form>
    </main>
    <?php
    require('./src/components/footer/footer.php')
    ?>
</body>

</html>