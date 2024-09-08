<div class="user-sidebar">
    <a href="./user.php?path=profile&userId=<?= isset($_GET["userId"]) ? $_GET["userId"] : $_SESSION["userId"] ?>"
        class="user-sidebar__item">
        <i class="fa-regular fa-window-restore"></i>
        <p>Thông tin cá nhân</p>
    </a>

    <?php if (isset($_GET["userId"]) && $_SESSION["userId"] == $_GET["userId"]): ?>
        <a href="./writePost.php" class="user-sidebar__item">
            <i class="fa-regular fa-pen-to-square"></i>
            <p>Viết bài</p>
        </a>
    <?php endif; ?>
    <a href="./user.php?path=manage-posts&userId=<?= isset($_GET["userId"]) ? $_GET["userId"] : $_SESSION["userId"] ?>"
        class="user-sidebar__item">
        <i class="fa-regular fa-folder"></i>
        <p>Quản lý bài viết</p>
    </a>
    <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "ADMIN"): ?>
        <a href="./user.php?path=add-user&userId=<?= isset($_GET["userId"]) ? $_GET["userId"] : $_SESSION["userId"] ?>"
            class="user-sidebar__item">
            <i class="fa-regular fa-circle-user"></i>
            <p>Thêm người dùng</p>
        </a>
        <a href="./user.php?path=manage-users&userId=<?= isset($_GET["userId"]) ? $_GET["userId"] : $_SESSION["userId"] ?>"
            class="user-sidebar__item">
            <i class="fa-regular fa-user"></i>
            <p>Quản lý người dùng</p>
        </a>
        <a href="./user.php?path=add-category&userId=<?= isset($_GET["userId"]) ? $_GET["userId"] : $_SESSION["userId"] ?>"
            class="user-sidebar__item">
            <i class="fa-solid fa-list"></i>
            <p>Thêm danh mục</p>
        </a>
        <a href="./user.php?path=manage-categories&userId=<?= isset($_GET["userId"]) ? $_GET["userId"] : $_SESSION["userId"] ?>"
            class="user-sidebar__item">
            <i class="fa-solid fa-table-cells-large"></i>
            <p>Quản lý danh mục</p>
        </a>
    <?php endif; ?>
</div>