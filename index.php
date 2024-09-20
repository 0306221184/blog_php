<?php
require './src/lib/database.php';
require './src/lib/session.php';
require "./src/features/getAllActivePosts.php";
require "./src/features/getPostsByCategory.php";
require './src/features/getUserById.php';
require "./src/helpers/format.php";
require "./src/features/getCountRows.php";
Session::init();
$limit = 6;

$page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;

$start = ($page - 1) * $limit;
$categoryId = isset(($_GET['categoryId'])) && !empty(($_GET['categoryId'])) ? trim($_GET['categoryId']) : false;
$PostsData = $categoryId !== false ? getPostsByCategory($categoryId, $start, $limit) : getAllActivePosts($start, $limit);
$whereCondition = $categoryId == false ? "isActive = 1" : "isActive = 1 AND categoryId = $categoryId";
$totalRecords = getPostsCountRows($whereCondition);
$totalPage = ceil($totalRecords['countRows'] / $limit);
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
    <main class="container py-2 my-2 d-flex flex-column">
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
                    <a href="./post.php?authorId=<?= $authorData['id'] ?>&postId=<?= $item['id'] ?>" class="card">
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
                                <?= Format::textShorten($item['content'], 100); ?>
                            </p>
                            <div class="card-content__author">
                                <img class="author-avatar" src="<?= $authorData['avatar'] ?>" />
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
        <nav aria-label="Page navigation example" class="mx-auto mt-3">
            <ul class="pagination">
                <li class="page-item"><a class="page-link"
                        href="./index.php?page=<?= $page - 1 ?>&categoryId=<?= $categoryId ?>">Previous</a></li>
                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                <li class="page-item"><a class="page-link"
                        href="./index.php?page=<?= $i ?>&categoryId=<?= $categoryId ?>"><?= $i ?></a></li>
                <?php endfor; ?>
                <li class="page-item"><a class="page-link"
                        href="./index.php?page=<?= $page + 1 ?>&categoryId=<?= $categoryId ?>">Next</a></li>
            </ul>
        </nav>
    </main>
    <?php
    require('./src/components/footer/footer.php')
    ?>
</body>

</html>