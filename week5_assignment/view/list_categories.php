<?php include('view/header.php'); ?>

<?php if($categories) { ?>
    <section id="list" class="list">
    <header class="list__row list__header">
    </header>
    
    <?php foreach ($categories as $c) : ?>
    <div class="list__row">
        <p class="bold"><?= $c['categoryName'] ?></p>
    </div>
    <div class="list__removeItem">
        <form action="." method="post">
            <input type="hidden" name="action" value="delete_category">
            <input type="hidden" name="categoryID" value="<?= $c['categoryID'] ?>">
            <button class="remove-button">Delete></button>
        </form>
    </div>
    <?php endforeach; ?>
    <?php } else { ?>
        <p>No categories exist yet!</p>
    <?php } ?>
    </section>

    <section id="add" class="add">
        <h2>Add Category</h2>
        <form action="." method="post" id="add_form" class="add__form">
        <div class="add__inputs">
            <label>Name:</label>
            <input type="text" name="category_name" maxlength="50" placeholder="Name" autofocus required>
            </div>
        <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
        </form>
    </section>
    <br>
    <p><a href=".">View &amp; Add Categories</a></p>
    <?php include('view/footer.php');