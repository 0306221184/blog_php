<?php if (isset($_GET["path"]) && $_GET["path"] == "add-user"): ?>
<main id="auth" class="h-100">
    <form action="" class="auth-form" method="post">
        <div class="auth-form__input">
            <?php require './src/components/avatarInput/index.php' ?>
            <input class="myInput" type="text" name="fullName" id="fullName" placeholder="Họ và tên" require>
            <input class="myInput" type="tel" name="phoneNumber" id="phoneNumber" placeholder="Số điện thoại" require>
            <input class="myInput" type="text" name="username" id="username" placeholder="Tên đăng nhập" require>
            <input class="myInput" type="password" name="password" id="password" placeholder="Mật khẩu" require>
            <input class="myInput" type="password" name="confirmPassword" id="confirmPassword"
                placeholder="Nhập lại mật khẩu" require>
            <select name="role" id="role" class="myInput cursorPointer">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <button type="submit" class="myBtn auth-form__submitBtn">Tạo người dùng</button>
    </form>
</main>
<?php elseif (isset($_GET["path"]) && $_GET["path"] == "add-category"): ?>
<main id="auth" class="h-100">
    <form action="" class="auth-form" method="post">
        <img src="./src/assets/images/spiderum-logo.png" alt="" class="auth-form__logo">
        <div class="auth-form__input">
            <input class="myInput" type="text" name="name" id="name" placeholder="Tên danh mục" require>
            <input class="myInput" type="text" name="description" id="description" placeholder="Mô tả danh mục" require>
        </div>
        <button type="submit" class="myBtn auth-form__submitBtn">Tạo danh mục</button>
    </form>
</main>
<?php endif; ?>