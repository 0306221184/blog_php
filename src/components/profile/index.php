<?php
$userId = isset($_GET['userId']) ? $_GET['userId'] : false;
if ($userId == false) {
    header("Location: ./index.php?error=User id is required!!!");
    die();
} else {
    require "./src/features/getUserById.php";
    $userProfileData = getUserById($userId);
}

?>
<section class="profile-container">
    <?php if (isset($_GET['error'])): ?>
        <p class="text-center text-danger fs-4"><?= $_GET['error'] ?></p>
    <?php elseif (isset($_GET['message'])): ?>
        <p class="text-center text-success fs-4"><?= $_GET['message'] ?></p>
    <?php endif; ?>
    <form action="./src/features/updateProfile.php?followerId=<?= $userId ?>" class="profile-form" method="post"
        enctype="multipart/form-data">
        <?php require './src/components/avatarInput/index.php' ?>
        <div class="profile-form__info">
            <div class="form-info__username">
                <label for="username">Tên hiển thị</label>
                <input type="text" id="username" class="myInput" name="username"
                    value="<?= $_SESSION["userId"] != $_GET["userId"] ? $userProfileData['username'] : $_SESSION["username"] ?>"
                    disabled>
            </div>
            <div class="form-info__email">
                <label for="email">Email</label>
                <input type="text" id="email" class="myInput" name="email"
                    value="<?= $_SESSION["userId"] != $_GET["userId"] ? $userProfileData['email'] : $_SESSION["email"] ?>"
                    <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
            </div>
            <div class="form-info__gender">
                <label>Giới tính</label>
                <div class="info-gender__radio">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="NAM"
                            <?php if ($_SESSION["userId"] != $_GET["userId"] && $userProfileData['gender'] == "NAM"): ?>
                            checked
                            <?php elseif ($_SESSION["userId"] == $_GET["userId"] && $_SESSION["gender"] == "NAM"): ?>
                            checked <?php endif; ?> <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
                        <label class="form-check-label" for="male">
                            Nam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="NỮ"
                            <?php if ($_SESSION["userId"] != $_GET["userId"] && $userProfileData['gender'] == "NỮ"): ?>
                            checked
                            <?php elseif ($_SESSION["userId"] == $_GET["userId"] && $_SESSION["gender"] == "NỮ"): ?>
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
                    value="<?= $_SESSION["userId"] != $_GET["userId"] ? $userProfileData['phoneNumber'] : $_SESSION["phoneNumber"] ?>"
                    <?= $_SESSION["userId"] != $_GET["userId"] ? "disabled" : "" ?>>
            </div>
            <?php if (isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"]): ?>
                <a href="./changePassword.php" class="ghostBtn form-info__changePassword">Đổi mật khẩu</a>
            <?php endif; ?>
        </div>
        <button name="type" type="submit" class="myBtn profile-form__saveBtn"
            value="<?= isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"] ? 'update' : 'follow' ?>">
            <?php if (isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"]): ?>
                Lưu thay đổi
                <?php elseif (isset($_GET["userId"]) && $_SESSION["userId"] != $_GET["userId"]): ?>Follow
            <?php endif; ?></button>
    </form>
</section>