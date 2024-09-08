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
            <th scope="col">Edit</th>
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
        <?php foreach ($usersData as $item): ?>
        <tr class="table-tbody__tr">
            <td scope="col"><?= Format::textShorten($item["username"]) ?></td>
            <td scope="col"><?= Format::textShorten($item["role"]) ?></td>
            <td scope="col"><button class="myBtn">Edit</button></td>
            <td scope="col"><button class="myBtn">Delete</button></td>
        </tr>
        <?php endforeach; ?>
        <?php elseif (isset($_GET["path"]) && $_GET["path"] == "manage-posts"): ?>
        <?php foreach ($postsData as $item): ?>
        <tr class="table-tbody__tr">
            <td scope="col"><?= Format::textShorten($item["title"]) ?></td>
            <td scope="col"><?= Format::textShorten($item["category"]) ?></td>
            <td scope="col"><button
                    class="myBtn"><?= isset($_SESSION["role"]) && $_SESSION["role"] == "ADMIN" ? "Except" : "Edit" ?></button>
            </td>
            <td scope="col"><button class="myBtn">Delete</button></td>
        </tr>
        <?php endforeach; ?>
        <?php elseif (isset($_GET["path"]) && $_GET["path"] == "manage-categories"): ?>
        <?php foreach ($categoriesData as $item): ?>
        <tr class="table-tbody__tr">
            <td scope="col"><?= Format::textShorten($item["name"]) ?></td>
            <td scope="col"><button class="myBtn">Edit</button></td>
            <td scope="col"><button class="myBtn">Delete</button></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>