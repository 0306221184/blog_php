<?php
$_SESSION['login'] = true;
$_SESSION["role"] = "admin";
$_SESSION["email"] = "nguyenlehoaitintest@gmail.com";
$_SESSION["username"] = "Tinwana";
$_SESSION["password"] = "password";
$_SESSION["avatar"] = "./src/assets/images/Logo.png";
$_SESSION["gender"] = "nữ";
$_SESSION["phoneNumber"] = "0902345123";

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
    <title>Login</title>
</head>

<body>
    <?php
    require './src/components/header/index.php'
    ?>
    <main id="auth">
        <form action="" class="auth-form" method="post">
            <img src="./src/assets/images/spiderum-logo.png" alt="" class="auth-form__logo">
            <div class="auth-form__input">
                <input class="myInput" type="text" name="username" id="username" placeholder="Tên đăng nhập" require>
                <input class="myInput" type="password" name="password" id="username" placeholder="Mật khẩu" require>
            </div>
            <button onclick="handleLoginSession(event)" type="submit" class="myBtn auth-form__submitBtn">Đăng
                nhập</button>
            <p class="auth-form__text">Chưa có tài khoản? <span class=""><a class="" href="./signUp.php">Đăng ký
                        ngay</a></span>
            </p>
        </form>
    </main>
</body>
<script>
    const handleLoginSession = (e) => {
        // e.preventDefault();

    }
</script>

</html>