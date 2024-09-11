<?php
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
        <form action="" class="writePost-form">
            <input type="text" class="myInput" placeholder="Tiêu đề">
            <select name="category" id="category" class="writePost-form__category">
                <option value="tranh luận">Tranh luận</option>
                <option value="khoa học - công nghệ">Khoa học - công nghệ</option>
                <option value="tài chính">Tài chính</option>
                <option value="sáng tác">Sáng tác</option>
                <option value="nghệ thuật">Nghệ thuật</option>
            </select>
            <textarea class="myInput writePost-form__postBody" name="postBody" id="postBody"
                placeholder="Nội dung"></textarea>
            <div class="writePost-form__thumbnail">
                <label for="thumbnail">Thêm ảnh</label>
                <input type="file" class="myInput" id="postThumbnail" name="postThumbnail"
                    accept=".jpg,.jpeg,.png,.pdf">
            </div>
            <button type="submit" class="myBtn">Tạo bài</button>
        </form>
    </main>
    <?php
    require('./src/components/footer/footer.php')
    ?>
</body>

</html>