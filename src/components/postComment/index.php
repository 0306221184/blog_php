<div id="postComments" class="post-comment shadow">
    <form action="./src/features/commentPost.php?postAuthorId=<?= $authorData['id'] ?>" class="post-comment__form"
        method="post">
        <input autocomplete="off" type="text" name="commentContent" class="myInput"
            placeholder="Hãy chia sẽ cảm nghĩ của bạn về bài viết">
        <button name="postId" value="<?= $postData['id'] ?>" class="ghostBtn px-4 py-2">Gửi</button>
    </form>
    <?php
    require "./src/features/getCommentsByPostId.php";
    $getCommentsByPostIdData = getCommentsByPostId($postData['id']);
    ?>
    <?php if ($getCommentsByPostIdData !== false): ?>
        <?php foreach ($getCommentsByPostIdData as $item): ?>
            <?php
            $commentAuthorData = getUserById($item['userId']);
            ?>
            <div class="post-comment__body">
                <div class="post-comment__user">
                    <a href="<?= isset($_SESSION["login"]) ? "./user.php?path=profile&userId=" . $commentAuthorData['id'] : "login.php" ?>"
                        class="post-header__author">
                        <img src="<?= $commentAuthorData["avatar"] ?>" alt="avatar" class="avatar-img img-thumbnail">
                        <div class="post-header__info">
                            <div class="post-authorName"><?= $commentAuthorData["username"] ?></div>
                            <div class="post-UploadDay"><?= $item["createdAt"] ?></div>
                        </div>
                    </a>
                    <p class="comment-body__content">
                        <?= $item['content'] ?>
                    </p>
                </div>
                <?php if (Session::get('userId') == $commentAuthorData['id']): ?>
                    <a
                        href="./src/features/deleteComment.php?commentId=<?= $item['id'] ?>&postAuthorId=<?= $authorData['id'] ?>&postId=<?= $postData['id'] ?>"><button
                            class="myBtn">Delete</button></a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>