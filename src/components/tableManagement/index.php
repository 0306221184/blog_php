<?php
require './src/components/items/tableItems.php';
require './src/helpers/format.php';

?>
<table class="table-primary tableManagement-table">
    <thead class="tableManagement-table__thead">
        <tr>
            <?php if (isset($_GET["path"]) && $_GET["path"] == "manage-users"): ?>
                <?php foreach ($userManagementItem as $item): ?>
                    <th scope="col"><?= $item ?></th>
                <?php endforeach; ?>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            <?php elseif (isset($_GET["path"]) && $_GET["path"] == "manage-posts"): ?>
                <?php foreach ($postManagementItem as $item): ?>
                    <th scope="col"><?= $item ?></th>
                <?php endforeach; ?>
                <th scope="col">Manage</th>
                <th scope="col">Delete</th>
            <?php elseif (isset($_GET["path"]) && $_GET["path"] == "manage-categories"): ?>
                <?php foreach ($categoryManagementItem as $item): ?>
                    <th scope="col"><?= $item ?></th>
                <?php endforeach; ?>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody class="tableManagement-table__tbody">
        <?php if (isset($_GET["path"]) && $_GET["path"] == "manage-users"): ?>
            <?php
            require "./src/features/getAllUsers.php";
            $getAllUserData = getAllUsers();            ?>
            <?php foreach ($getAllUserData as $item): ?>
                <tr class="table-tbody__tr">
                    <td scope="col"><?= Format::textShorten($item["id"]) ?></td>
                    <td scope="col"><?= Format::textShorten($item["username"]) ?></td>
                    <td scope="col"><?= Format::textShorten($item["role"]) ?></td>
                    <td scope="col"><button class="myBtn">Edit</button></td>
                    <td scope="col"><button class="myBtn">Delete</button></td>
                </tr>
            <?php endforeach; ?>
        <?php elseif (isset($_GET["path"]) && $_GET["path"] == "manage-posts"): ?>
            <?php
            require "./src/features/getNotExceptPosts.php";
            $getNotExceptPostsData = getNotExceptPosts();
            ?>
            <?php if ($getNotExceptPostsData !== false): ?>
                <?php foreach ($getNotExceptPostsData as $item): ?>
                    <tr class="table-tbody__tr">
                        <td scope="col"><?= Format::textShorten($item["title"]) ?></td>
                        <td scope="col"><?= Format::textShorten($item["category"]) ?></td>
                        <td scope="col"><a href="./src/features/adminExceptPost.php?postId=<?= $item['id'] ?>"><button
                                    class="myBtn"><?= isset($_SESSION["role"]) && $_SESSION["role"] == "ADMIN" ? "Except" : "Edit" ?></button></a>
                        </td>
                        <td scope="col"><a href="./src/features/adminDeletePost.php?postId=<?= $item['id'] ?>"><button
                                    class="myBtn">Delete</button></td></a>

                    </tr>
                <?php endforeach; ?>
            <?php elseif ($getNotExceptPostsData == false): ?>
                <p class="text-center fs-3 text-success">No post need except here!!!</p>
            <?php endif; ?>
        <?php elseif (isset($_GET["path"]) && $_GET["path"] == "manage-categories"): ?>
            <?php
            require "./src/features/getAllCategories.php";
            $getAllCategoriesData = getAllCategories();
            ?>
            <?php foreach ($getAllCategoriesData as $item): ?>
                <tr class="table-tbody__tr">
                    <td scope="col"><?= Format::textShorten(ucwords($item["name"])) ?></td>
                    <td scope="col"><?= Format::textShorten($item["description"]) ?></td>
                    <td scope="col"><?= Format::textShorten($item["authorName"]) ?></td>
                    <td scope="col"><button class="myBtn">Edit</button></td>
                    <td scope="col"><button class="myBtn">Delete</button></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>