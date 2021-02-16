<?php
require('database.php');
require('index.php');

$item = filter_input(INPUT_GET, "Item", FILTER_SANITIZE_STRING);
$item_desc = filter_input(INPUT_GET, "Item Description", FILTER_SANITIZE_STRING);
$itemno = 1;

$insertquery = 'INSERT INTO todoitems
                    (ItemNum, Title, Description)
                VALUES
                    (:ItemNum, :Title, :Description)';
$insertstatement = $db->prepare($insertquery);
$insertstatement->bindValue(':ItemNum', $itemno);
$insertstatement->bindValue(':Title', $item);
$insertstatement->bindValue(':Description', $item_desc);
$insertstatement->execute();
$insertstatement->closeCursor();

