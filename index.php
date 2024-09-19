<?php
require './src/lib/database.php';
require './src/lib/session.php';
require "./src/features/getAllActivePosts.php";
require "./src/features/getPostsByCategory.php";
require './src/features/getUserById.php';
require "./src/helpers/format.php";
Session::init();
$categoryId = isset(($_GET['categoryId'])) ? trim($_GET['categoryId']) : false;
$PostsData = $categoryId !== false ? getPostsByCategory($categoryId) : getAllActivePosts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/header.css">
    <link rel="stylesheet" href="./src/css/footer.css">
    <link rel="stylesheet" href="./src/css/style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="module" src="./src/js/index.js"></script>
    <title>HomePage</title>
</head>

<body>
    <?php
    require('./src/components/header/index.php')
    ?>
    <main class="container py-2 my-2">
        <div class="posts-container">
            <div class="posts-container__grid">
                <?php if (empty($PostsData)): ?>
                <p class="text-center fs-2">This category don't have any post!!! </p>
                <?php elseif (isset($PostsData)): ?>
                <?php foreach ($PostsData as $item): ?>
                <?php
                        $authorData = getUserById($item['authorId']);
                        ?>
                <div class="posts-container__item">
                    <a href="./post.php?userId=<?= $authorData['id'] ?>&postId=<?= $item['id'] ?>" class="card">
                        <div class="card-image">
                            <img src="<?= $item['thumbnail'] ?>" alt="./src/assets/images/Logo.pnj" class="h-100 w-100">
                        </div>
                        <div class="card-content">
                            <p class="card-content__category">
                                <?= $item['category'] ?>
                            </p>
                            <p class="card-content__title">
                                <?= $item['title'] ?>
                            </p>
                            <p class="card-content__preview">
                                <?= Format::textShorten($item['content']); ?>
                            </p>
                            <div class="card-content__author">
                                <img class="author-avatar" src="./src/assets/images/Logo.png" />
                                <span class="author-name">
                                    <?= $authorData['username'] ?></span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </main>
    <?php
    require('./src/components/footer/footer.php')
    ?>
</body>

</html>