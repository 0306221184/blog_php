<section class="profile-container">
    <form action="" class="profile-form" method="post">
        <div action="" class="profile-form__avatar">
            <label for="avatarUpload" class="profile-avatar__label">
                <div class="avatarPreview">
                    <?php if (isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"]): ?>
                    <i class="fa-solid fa-camera avatarPreview-icon"></i>
                    <?php endif; ?>
                    <img id="avatarPreview" class="img-thumbnail"
                        src="<?= isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"] ? $_SESSION["avatar"] : $userAvatar ?>"
                        alt="Upload Image">
                </div>
                <input type="file" id="avatarUpload" accept="image/*"
                    <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
            </label>
        </div>
        <div class="profile-form__info">
            <div class="form-info__username">
                <label for="username">Tên hiển thị</label>
                <input type="text" id="username" class="myInput" name="username"
                    value="<?= $_SESSION["userId"] != $_GET["userId"] ? $username : $_SESSION["username"] ?>"
                    <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
            </div>
            <div class="form-info__email">
                <label for="email">Email</label>
                <input type="text" id="email" class="myInput" name="email"
                    value="<?= $_SESSION["userId"] != $_GET["userId"] ? $email : $_SESSION["email"] ?>"
                    <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
            </div>
            <div class="form-info__gender">
                <label>Giới tính</label>
                <div class="info-gender__radio">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="nam"
                            <?php if ($_SESSION["userId"] != $_GET["userId"] && $gender == "nam"): ?> checked
                            <?php elseif ($_SESSION["userId"] == $_GET["userId"] && $_SESSION["gender"] == "nam"): ?>
                            checked <?php endif; ?> <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
                        <label class="form-check-label" for="male">
                            Nam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="nữ"
                            <?php if ($_SESSION["userId"] != $_GET["userId"] && $gender == "nữ"): ?> checked
                            <?php elseif ($_SESSION["userId"] == $_GET["userId"] && $_SESSION["gender"] == "nữ"): ?>
                            checked <?php endif; ?> <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
                        <label class="form-check-label" for="female">
                            Nữ
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-info__phoneNumber">
                <label for="phoneNumber">Số điện thoại</label>
                <input type="tel" id="phoneNumber" class="myInput" name="phoneNumber"
                    value="<?= $_SESSION["phoneNumber"] ?>"
                    <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
            </div>
            <?php if (isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"]): ?>
            <a href="./changePassword.php" class="ghostBtn form-info__changePassword">Đổi mật khẩu</a>
            <?php endif; ?>
        </div>
        <button
            class="myBtn profile-form__saveBtn"><?php if (isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"]): ?>
            Lưu thay đổi
            <?php elseif (isset($_GET["userId"]) && $_SESSION["userId"] != $_GET["userId"]): ?>Follow
            <?php endif; ?></button>
    </form>
</section>