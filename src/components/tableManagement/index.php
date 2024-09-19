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
                <th scope="col">Manage</th>
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
            $getAllUserData = getAllUsers();
            ?>
            <?php foreach ($getAllUserData as $item): ?>
                <?php
                $toggleNameManageBtn = $item['isDisable'] == true ? "Enable" : "Disable";
                ?>
                <tr class="table-tbody__tr">
                    <td scope="col"><?= Format::textShorten($item["id"]) ?></td>
                    <td scope="col"><?= Format::textShorten($item["username"]) ?></td>
                    <td scope="col"><?= Format::textShorten($item["role"]) ?></td>
                    <td scope="col"><a
                            href="./src/features/adminToggleManageUser.php?userId=<?= $item['id'] ?>&isDisable=<?= $item['isDisable'] ?>"><button
                                class="myBtn"><?= $toggleNameManageBtn ?></button></a></td>
                    <td scope="col"><a href="./src/features/adminDeleteUser.php?userId=<?= $item['id'] ?>"><button
                                class="myBtn">Delete</button></a></td>
                </tr>
            <?php endforeach; ?>
        <?php elseif (isset($_GET["path"]) && $_GET["path"] == "manage-posts"): ?>
            <?php
            $userId = Session::get('userId');
            $userRole = Session::get('role');
            require "./src/features/getAllPosts.php";
            require "./src/features/getPostsByUser.php";
            $getPostByUserData = getPostsByUserId($userId);
            $getAllPostsData = getAllPosts();
            ?>
            <?php if ($userRole == "ADMIN"): ?>
                <?php if ($getAllPostsData !== false): ?>
                    <?php foreach ($getAllPostsData as $item): ?>
                        <?php $nameManageBtn = $item['isActive'] == false ? "Enable" : "Disable" ?>
                        <tr class="table-tbody__tr">
                            <td scope="col"><?= Format::textShorten($item["username"]) ?></td>
                            <td scope="col"><?= Format::textShorten($item["title"]) ?></td>
                            <td scope="col"><?= Format::textShorten($item["category"]) ?></td>
                            <td scope="col"><a
                                    href="./src/features/adminToggleManagePost.php?postId=<?= $item['id'] ?>&isActive=<?= $item['isActive'] ?>"><button
                                        class="myBtn"><?= isset($_SESSION["role"]) && $_SESSION["role"] == "ADMIN" ? $nameManageBtn : "Edit" ?></button></a>
                            </td>
                            <td scope="col"><a href="./src/features/adminDeletePost.php?postId=<?= $item['id'] ?>"><button
                                        class="myBtn">Delete</button></td></a>
                        </tr>
                    <?php endforeach; ?>
                <?php elseif ($getAllPostsData == false): ?>
                    <p class="text-center fs-3 text-success">No post need except here!!!</p>
                <?php endif; ?>
            <?php elseif ($userRole == "USER"): ?>
                <?php if ($getPostByUserData !== false): ?>
                    <?php foreach ($getPostByUserData as $item): ?>
                        <?php $nameManageBtn = $item['isActive'] == false ? "Approving" : "Excepted" ?>
                        <?php $statusBtnClassTextColor = $item['isActive'] ? "text-success" : "text-dark" ?>
                        <tr class="table-tbody__tr">
                            <td scope="col"><?= Format::textShorten($item["username"]) ?></td>
                            <td scope="col"><?= Format::textShorten($item["title"]) ?></td>
                            <td scope="col"><?= Format::textShorten($item["category"]) ?></td>
                            <td scope="col"><a href="./editPost.php?postId=<?= $item['id'] ?>"><button
                                        class="myBtn"><?= isset($_SESSION["role"]) && $_SESSION["role"] == "ADMIN" ? $nameManageBtn : "Edit" ?></button></a>
                            </td>
                            <td scope="col"><a href="./src/features/adminDeletePost.php?postId=<?= $item['id'] ?>"><button
                                        class="myBtn">Delete</button></a></td>
                            <td scope="col"><span class="fw-bold <?= $statusBtnClassTextColor ?>"><?= $nameManageBtn ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php elseif ($getPostByUserData == false): ?>
                    <p class="text-center fs-3 text-success">No post need except here!!!</p>
                <?php endif; ?>
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