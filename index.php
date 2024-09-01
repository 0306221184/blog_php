<?php
$hello = "Hello";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/mainHeader.css">
    <link rel="stylesheet" href="./src/css/footer.css">
    <link rel="stylesheet" href="./src/css/style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script type="module" src="./src/js/index.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    require('./src/components/defaultHeader/index.php')
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