<?php
require './src/components/items/tableItems.php'
?>
<table class="table-primary">
    <thead>
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
</table>