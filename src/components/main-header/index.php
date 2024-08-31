<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/mainHeader.css">
    <link rel="stylesheet" href="./src/css/footer.css">
    <script type="module" src="./src/js/index.js"></script>
    <link rel="stylesheet" href="./src/css/style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <title>main-header</title>
</head>

<body>
    <header class="d-flex flex-column justify-content-center align-items-center header w-100 shadow bg-light">
        <div class="container d-flex justify-content-between align-items-center gap-5">
            <a class="wideLogo" href="./index.php">
                <img src="./src/assets/images/wideLogo.png" class="header-logo" alt="...">
            </a>
            <div class="d-flex flex-row-reverse gap-2 align-items-center">
                <div data-popover="avatar" class="avatar d-flex align-items-center justify-content-between gap-1">
                    <div class="">
                        <img src="./src/assets/images/Logo.png" alt="" class="avatar-img img-thumbnail">
                    </div>
                    <i class="fas fa-caret-down opacity-50"></i>
                </div>
                <button class="write-btn px-4 py-2 rounded-5">
                    <i class="fas fa-feather-alt opacity-50"></i>
                    <span class="text-dark fw-medium">Viết bài</span>
                </button>
                <div class="search-icon d-flex align-items-center text-dark">
                    <i class="fas fa-search w-100 h-100 text-dark opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-between align-items-end h-50 pb-3">
            <span class=""><a class="nav-link" href="">TRANH LUẬN</a></span>
            <span class=""><a class="nav-link" href="">KHOA HỌC - CÔNG NGHỆ</a></span>
            <span class=""><a class="nav-link" href="">TÀI CHÍNH</a></span>
            <span class=""><a class="nav-link" href="">SÁNG TÁC</a></span>
            <span class=""><a class="nav-link" href="">NGHỆ THUẬT</a></span>
            <span class=""><a class="nav-link" href="">ẨM THỰC</a></span>
            <div class="bar-icon">
                <i class="fas fa-bars opacity-50"></i>
            </div>
        </div>
    </header>