<?php
require './src/lib/database.php';
require './src/lib/session.php';
Session::init();
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
                <div class="posts-container__item">
                    <?php
                    require('./src/components/card/card.php')
                    ?>
                </div>
                <div class="posts-container__item">
                    <?php
                    require('./src/components/card/card.php')
                    ?>
                </div>
                <div class="posts-container__item">
                    <?php
                    require('./src/components/card/card.php')
                    ?>
                </div>
                <div class="posts-container__item">
                    <?php
                    require('./src/components/card/card.php')
                    ?>
                </div>
            </div>

        </div>
    </main>
    <?php
    require('./src/components/footer/footer.php')
    ?>
</body>

</html>