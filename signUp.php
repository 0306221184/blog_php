<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/mainHeader.css">
    <link rel="stylesheet" href="./src/css/footer.css">
    <link rel="stylesheet" href="./src/css/style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="module" src="./src/js/index.js"></script>
    <title>Document</title>
</head>

<body id="auth">
    <form action="" class="auth-form">
        <img src="./src/assets/images/spiderum-logo.png" alt="" class="auth-form__logo">
        <div class="auth-form__input">
            <input type="text" name="username" id="username" placeholder="Tên đăng nhập">
            <input type="password" name="password" id="password" placeholder="Mật khẩu">
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Nhập lại mật khẩu">
        </div>
        <button type="submit" class="myBtn auth-form__submitBtn">Đăng ký</button>
        <p class="auth-form__text">Đã có tài khoản? <span class=""><a class="" href="./login.php">Đăng nhập</a></span>
        </p>
    </form>
</body>

</html>