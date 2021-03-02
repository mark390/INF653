<?php include('view/header.php'); ?>

<section id="list" class="list">
    <header class="list row list header">
    <h1>ToDoItems</h1>
    <form action="." method="get" id="list" class="list_header_select">
    <input type="hidden" name="action" value="list_categories">
    <select name="categoryID" required>
        <option value="0">View All</option>
        <?php foreach ($categories as $category) : ?>
        <?php if ($categoryID = $category['categoryID']) { ?>
            <option value="<?= $category['categoryID'] ?>" selected></option>
        <?php } else { ?>
            <option value="<?= $category['categoryID'] ?>">
        <?php } ?>
            <?= $category['categoryName'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button class="add-button bold">Go</button>
    </form>
    </header>
    <? if ($todoitems) { ?>
        <?php foreach ($todoitems as $i) : ?>
        <div class="list_row">
            <div class="list_item"></div>
            <p class="bold"> <?= $i['Title'] ?></p>
            <p class="bold"> <?= $i['Description'] ?></p>
        </div>
        <div class="list_remove__item">
        <form action="." method="post">
        <input type="hidden" name="action"
        value="delete_todoitems">
        <input type="hidden" name="categoryID" value=<?= $i['categoryID'] ?>>
        <button class="remove-button"><i class="fas fa-minus-circle"></i></button>
        </form> 
        </div>
        <?php endforeach; ?>
        <?php } else { ?>
        <br>
        <?php if ($categoryID) { ?>
            <p>No items exist for this category!</p>
        <?php } else { ?>
            <p>No items exist yet!</p>
        <?php } ?>
        <br>
        <?php } ?>
</section>

<section id="add" class="add">
        <h2>Add Item</h2>
        <form action="." method="post" id="add__form">
            <input type="hidden" name="action" id="add_item">
            <div class="add__items">
            <label>Category></label>
            <select name="categoryID" required>
                <option value="">Please Select</option>
                <?php foreach ($category as $c) : ?>
                <option value="<? $c['categoryID']; ?>">
                    <?= $c['categoryName']; ?>
                </option>
                <?php endforeach; ?>    
            </select>
            <label>Description</label>
            <input type="text" name="description" maxlength="120" placeholder="Description" required>
            </div>
            <div class="add_addItem">
                    <button class="add-button bold">Add</button>
            </div>
            </form>
</section>
<br>
<p><a href=".?action=list_categories">View/Edit Categories</a></p>
<?php include('view/footer.php'); ?>