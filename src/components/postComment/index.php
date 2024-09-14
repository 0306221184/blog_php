<div class="post-comment shadow">
    <form action="" class="post-comment__form" method="post">
        <input type="text" class="myInput" placeholder="Hãy chia sẽ cảm nghĩ của bạn về bài viết">
        <button class="ghostBtn px-4 py-2">Gửi</button>
    </form>
    <div class="post-comment__body">
        <div class="post-comment__user">
            <a href="<?= isset($_SESSION["login"]) ? "./user.php?path=profile&userId=$userId" : "login.php" ?>"
                class="post-header__author">
                <img src="<?= $postAuthor["avatar"] ?>" alt="avatar" class="avatar-img img-thumbnail">
                <div class="post-header__info">
                    <div class="post-authorName"><?= $postAuthor["name"] ?></div>
                    <div class="post-UploadDay"><?= $postUploadDay ?></div>
                </div>
            </a>
            <p class="comment-body__content">
                <?= $postCommentContent ?>
            </p>
        </div>
    </div>
</div>