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
    <title>Trang cá nhân</title>
</head>

<body>
    <?php
    require('./src/components/header/index.php')
    ?>
    <main class="container user-main">
        <?php
        require('./src/components/userSidebar/index.php')
        ?>
        <div class="user-content">
            <div
                class="user-content__body <?= isset($_GET["path"]) && str_starts_with($_GET["path"], "manage") ? "scrollY" : "" ?>">
                <?php if (isset($_GET["path"]) && str_starts_with($_GET["path"], "manage")): ?>
                    <?php
                    require './src/components/tableManagement/index.php';
                    ?>
                <?php elseif (isset($_GET["path"]) && $_GET["path"] == "profile"): ?>
                    <?php
                    require "./src/components/profile/index.php";
                    ?>
                <?php elseif (isset($_GET["path"]) && str_starts_with($_GET["path"], "add")): ?>
                    <?php
                    require "./src/components/creation/index.php";
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