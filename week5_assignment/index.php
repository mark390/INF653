<?php
    require('database.php');
    require('todo_db.php');
    require('category_db.php');

    $ItemNum = filter_input(INPUT_POST, 'ItemNum', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'Title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'Description', FILTER_SANITIZE_STRING);
    $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
    $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
    if (!$categoryID) {
        $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
    }

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_items';
        }
    }

    switch($action) {
        case "list_categories":
            $categories = get_categories();
            include('view/list_categories.php');
            break;
        case "add_category":
            add_category($categoryName);
            header("Location: .?action=list_categories");
            break;
        case "add_item":
            if ($categoryID && $description) {
                add_todo_items($categoryID, $description, $title);
                header("Location: .?categoryID=$categoryID");
                include('view/list_items.php');
            } else {
                $error = "Invalid Item Data!";
                include('view/error.php');
                exit();
            }
            break;
        case "delete_category":
            if ($categoryID) {
                try {
                    delete_category($categoryID);
                } catch (PDOException $e) {
                    $error = 'You cannot delete a category when it has items';
                    include('view/error.php');
                    exit();
                }
                header("Location: .?action=list_categories");
            }
            break;
        case "delete_todo_items":
            if ($ItemNum) {
                delete_todo_items($ItemNum);
                header("Location: .?categoryID=$categoryID");
            } else {
                $error = "Missing category ID";
                include('view/error.php');
            }
            break;
        default:
            $categoryName = get_categoryName($categoryID);
            $categories = get_categories();
            $todoitems = get_todo_items();
            include('view/list_categories.php');



    }
    

    
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
        <?php foreach ($ItemNum as $i) : ?>
            <li>
                <?php echo $i['Title']; ?>
                <?php echo $i['Description'] ?>
                <form action="model/delete.php" method="POST">Delete</form>
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