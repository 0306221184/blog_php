<?php
Session::init();
?>
<?php if (isset($_SESSION['login']) && $_SESSION['login']): ?>
    <header class="d-flex flex-column justify-content-center align-items-center header w-100 shadow bg-light">
        <div class="container d-flex justify-content-between align-items-center gap-5">
            <a class="wideLogo d-none d-lg-inline-block" href="./index.php">
                <img src="./src/assets/images/wideLogo.png" class="header-logo" alt="...">
            </a>
            <a class="subLogo d-sm-inline-block d-lg-none" href="./index.php">
                <img src="./src/assets/images/wideLogo.png" class="header-logo__sm w-100 h-100"
                    alt="./src/assets/images/wideLogo.png">
            </a>
            <div class="d-flex flex-row-reverse gap-2 align-items-center">
                <div data-popover="avatar" class="avatar d-flex align-items-center justify-content-between gap-1">
                    <div class="">
                        <img src="<?= Session::get("avatar") ?>" alt=".." class="avatar-img img-thumbnail">
                    </div>
                    <i class="fas fa-caret-down opacity-50"></i>
                </div>
                <a href="./writePost">
                    <button class="ghostBtn">
                        <i class="fas fa-feather-alt opacity-50"></i>
                        <span class="text-dark">Viết bài</span>
                    </button>
                </a>
                <div class="icon d-flex align-items-center text-dark">
                    <i class="fas fa-search w-100 h-100 text-dark opacity-50"></i>
                </div>
                <div class="icon d-flex align-items-center text-dark">
                    <i class="fa-regular fa-bell w-100 h-100 text-dark opacity-50"></i>
                    <div class="notification-remain bg-danger">2</div>
                </div>
            </div>
        </div>
        <div class="container d-none d-lg-flex justify-content-between align-items-end h-50 pb-3 ">
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
<?php else: ?>
    <header class="header w-100 shadow bg-light d-flex align-items-center ">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="wideLogo" href="./index.php">
                <img src="./src/assets/images/wideLogo.png" class="header-logo" alt="...">
            </a>
            <div class="d-flex flex-row-reverse gap-1 align-items-center">
                <div class="">
                    <a href="./login.php">
                        <button class="rounded-5 text-center text-white fw-medium px-3 py-2 btn  btn-info">Đăng
                            nhập</button>
                    </a>
                </div>
                <div class="">
                    <a href="./signUp.php">
                        <div class="btn text-center text-dark fw-medium px-3 py-1">Đăng ký</div>
                    </a>
                </div>
                <div class=" icon d-flex align-items-center text-dark">
                    <i class="fas fa-search w-100 h-100 text-dark opacity-50"></i>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>