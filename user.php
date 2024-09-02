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
    <title>Trang cá nhân</title>
</head>

<body>
    <?php
    require('./src/components/header/index.php')
    ?>
    <main class="container user-main">
        <div class="user-sidebar">
            <a href="./user.php?path=profile" class="user-sidebar__item">
                <i class="fa-regular fa-window-restore"></i>
                <p>Thông tin cá nhân</p>
            </a>
            <a href="./writePost.php" class="user-sidebar__item">
                <i class="fa-regular fa-pen-to-square"></i>
                <p>Viết bài</p>
            </a>
            <a href="./user.php?path=manage-posts" class="user-sidebar__item">
                <i class="fa-regular fa-folder"></i>
                <p>Quản lý bài viết</p>
            </a>
            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin"): ?>
                <a href="./user.php?path=add-user" class="user-sidebar__item">
                    <i class="fa-regular fa-circle-user"></i>
                    <p>Thêm người dùng</p>
                </a>
                <a href="./user.php?path=manage-users" class="user-sidebar__item">
                    <i class="fa-regular fa-user"></i>
                    <p>Quản lý người dùng</p>
                </a>
                <a href="./user.php?path=add-category" class="user-sidebar__item">
                    <i class="fa-solid fa-list"></i>
                    <p>Thêm danh mục</p>
                </a>
                <a href="./user.php?path=manage-categories" class="user-sidebar__item">
                    <i class="fa-solid fa-table-cells-large"></i>
                    <p>Quản lý danh mục</p>
                </a>
            <?php endif; ?>
        </div>
        <div class="user-content">
            <div class="user-content__body">
                <?php if (isset($_GET["path"]) && str_starts_with($_GET["path"], "manage")): ?>
                    <?php
                    require './src/components/tableManagement/index.php';
                    ?>
                <?php elseif (isset($_GET["path"]) && $_GET["path"] == "profile"): ?>
                    <?php
                    require "./src/components/profile/index.php";
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php
    require('./src/components/footer/footer.php')
    ?>
</body>

</html>