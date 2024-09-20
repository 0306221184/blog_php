<div action="" class="profile-form__avatar">
    <label for="avatarUpload" class="profile-avatar__label">
        <div class="avatarPreview">
            <?php if (isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"]): ?>
            <i class="fa-solid fa-camera avatarPreview-icon"></i>
            <?php endif; ?>
            <img id="avatarPreview" class="img-thumbnail"
                src="<?= isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"] ? $_SESSION["avatar"] : $userProfileData['avatar'] ?>"
                alt="Upload Image">
        </div>
        <input type="file" id="avatarUpload" accept="image/*" name="avatarUpload"
            <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
    </label>
</div>