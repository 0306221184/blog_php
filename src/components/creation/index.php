<?php if (isset($_GET["path"]) && $_GET["path"] == "add-user"): ?>
    <main id="auth" class="h-100">
        <form action="./src/features/adminAddUser.php" class="auth-form" method="post" enctype="multipart/form-data">
            <div class="auth-form__input">
                <div action="" class="profile-form__avatar">
                    <label for="avatarUpload" class="profile-avatar__label">
                        <div class="avatarPreview">
                            <?php if (isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"]): ?>
                                <i class="fa-solid fa-camera avatarPreview-icon"></i>
                            <?php endif; ?>
                            <img id="avatarPreview" class="img-thumbnail" src="./src/assets/images/Logo.png"
                                alt="Upload Image">
                        </div>
                        <input type="file" id="avatarUpload" accept="image/*" name="avatarUpload"
                            <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
                    </label>
                </div>
                <input class="myInput" type="text" name="fullName" id="fullName" placeholder="Họ và tên" required>
                <input class="myInput" type="tel" name="phoneNumber" id="phoneNumber" placeholder="Số điện thoại" required>
                <input class="myInput" type="email" name="email" id="email" placeholder="Email" required>
                <input class="myInput" type="text" name="username" id="username" placeholder="Tên đăng nhập" required>
                <input class="myInput" type="password" name="password" id="password" placeholder="Mật khẩu" required>
                <input class="myInput" type="password" name="confirmPassword" id="confirmPassword"
                    placeholder="Nhập lại mật khẩu" required>
                <select name="role" id="role" class="myInput cursorPointer">
                    <option value="ADMIN">Admin</option>
                    <option value="USER">User</option>
                </select>
            </div>
            <?php if (isset($_GET['error'])): ?>
                <p class="text-center text-danger fs-5"><?= $_GET['error'] ?></p>
            <?php elseif (isset($_GET['message'])): ?>
                <p class="text-center text-success fs-5"><?= $_GET['message'] ?></p>
            <?php endif; ?>
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
            <?php if (isset($_GET['error'])): ?>
                <p class="text-center text-danger fs-5"><?= $_GET['error'] ?></p>
            <?php elseif (isset($_GET['message'])): ?>
                <p class="text-center text-success fs-5"><?= $_GET['message'] ?></p>
            <?php endif; ?>
            <button type="submit" class="myBtn auth-form__submitBtn">Tạo danh mục</button>
        </form>
    </main>
<?php endif; ?>