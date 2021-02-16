<?php
require('database.php');

$title = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING);

//DELETE ITEM FROM DB//
$deletequery = 'DELETE FROM todolist
                WHERE Title = :title';
$deletestatement = $db->prepare($deletequery);
$deletestatement->bindValue(':title', $title);
$deletestatement->execute();
$deletestatement->closeCursor();

include('index.php');