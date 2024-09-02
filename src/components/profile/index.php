<section class="profile-container">
    <form action="" class="profile-form">
        <div action="" class="profile-form__avatar">
            <label for="avatarUpload" class="profile-avatar__label">
                <div class="avatarPreview">
                    <i class="fa-solid fa-camera avatarPreview-icon"></i>
                    <img id="avatarPreview" class="img-thumbnail" src="./src/assets/images/Logo.png" alt="Upload Image">
                </div>
                <input type="file" id="avatarUpload" accept="image/*">
            </label>
        </div>
        <div class="profile-form__info">
            <div class="form-info__username">
                <label for="username">Tên hiển thị</label>
                <input type="text" id="username" class="myInput" name="username" value="<?= $_SESSION["username"] ?>">
            </div>
            <div class="form-info__email">
                <label for="email">Email</label>
                <input type="text" id="email" class="myInput" name="email" value="<?= $_SESSION["email"] ?>">
            </div>
            <div class="form-info__gender">
                <label>Giới tính</label>
                <div class="info-gender__radio">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="nam"
                            <?php if ($_SESSION["gender"] == "nam") echo 'checked'; ?>>
                        <label class="form-check-label" for="male">
                            Nam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="nữ"
                            <?php if ($_SESSION["gender"] == "nữ") echo 'checked'; ?>>
                        <label class="form-check-label" for="female">
                            Nữ
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-info__phoneNumber">
                <label for="phoneNumber">Số điện thoại</label>
                <input type="tel" id="phoneNumber" class="myInput" name="phoneNumber"
                    value="<?= $_SESSION["phoneNumber"] ?>">
            </div>
            <a href="./changePassword.php" class="ghostBtn form-info__changePassword">Đổi mật khẩu</a>
        </div>
    </form>
</section>