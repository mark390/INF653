<?php
    require('database.php');

    $item = filter_input(INPUT_GET, "item", FILTER_SANITIZE_STRING);
    $item_desc = filter_input(INPUT_GET, "itemdesc", FILTER_SANITIZE_STRING);
    $itemno = 1; 
    //READ ITEM FROM DB//
    $query = 'SELECT Title, Description 
              FROM todolist
              WHERE Title = :title
              ORDER BY Title desc';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemNum', $itemno);
    $statement->bindValue(':title', $item);
    $statement->bindValue(':description', $item_desc);
    $values = $statement->fetchAll();
    $statement->closeCursor();
    //DELETE ITEM FROM DB//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <h1>ToDo List</h1>
<section>
    <ul>
        <?php foreach ($item as $i) : ?>
            <li>
                <?php echo $i['Title']; ?>
                <?php echo $i['Description'] ?>
                <form action="delete.php" method="POST">Delete</form>
        </li>
        <?php endforeach; ?>
    </ul>
</section>
    <h2>Add Item</h2>
    <form class="submitform" action="." method=POST>
        <label for="item">Item:></label>
        <input type="text" id="item" name="Item" required>
        <label for="itemdesc">Item Description:></label>
        <input type="text" id="itemdesc" name="Item Description" required>
        <button>Submit<button>
    </form>
</section>

    <!-- <i class="material-icons">delete</i> -->
    
</body>
</html>