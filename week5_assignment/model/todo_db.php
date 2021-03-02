<?php

    function get_todo_items($categoryID) {
        global $db;
        if ($categoryID) { 
            //READ ITEM FROM DB//
            $query = 'SELECT T.categoryID T.Description C.categoryName from todoitems T LEFT JOIN
            categories C ON T.categoryID = C.categoryID WHERE T.categoryID = :categoryID ORDER BY T.CategoryID';
        } else {
            $query = 'SELECT T.categoryID T.Description C.categoryName from todoitems T LEFT JOIN
            categories C ON T.categoryID = C.categoryID ORDER BY T.CategoryID';
        } 
        $statement = $db->prepare($query);
        $statement->bindValue(:categoryID, $categoryID);
        $statement->execute();
        $values = $statement->fetchAll();
        $statement->closeCursor();
        return $values;
    }

    function delete_todo_items($itemNum) {
        global $db;
        $query = 'DELETE FROM todoitems WHERE ID = :itemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':itemNum', $itemNum);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_todo_items($categoryID, $description, $title) {
        global $db;
        //ADD TO DB//
        $query = 'INSERT INTO todoitems (categoryID, Description, Title) VALUES (:categoryID, :description, :title)';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':title', $title);
        $statement->execute();
        $statement->closeCursor();
    }