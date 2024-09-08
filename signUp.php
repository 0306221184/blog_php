<?php
require './src/lib/session.php';
require './src/lib/database.php';
Session::init();

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
    <title require>Sign Up</title>
</head>

<body>
    <?php
    require './src/components/header/index.php'
    ?>
    <main id="auth">
        <form action="./signUp.php" class="auth-form" method="post">
            <img src="./src/assets/images/spiderum-logo.png" alt="" class="auth-form__logo">
            <div class="auth-form__input">
                <input class="myInput" type="text" name="username" id="username" placeholder="Tên đăng nhập" require>
                <input class="myInput" type="password" name="password" id="password" placeholder="Mật khẩu" require>
                <input class="myInput" type="password" name="confirmPassword" id="confirmPassword"
                    placeholder="Nhập lại mật khẩu" require>
            </div>
            <button type="submit" class="myBtn auth-form__submitBtn">Đăng ký</button>
            <p class="auth-form__text">Đã có tài khoản? <span class=""><a class="" href="./login.php">Đăng
                        nhập</a></span>
            </p>
        </form>
    </main>

</body>

</html>