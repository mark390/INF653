<?php
    $dsn = 'mysql:host=localhost;dbname=todo';
    $username = 'root';
    //$password = ''

    try {
        $db = new PDO($dsn, $username);

    } catch (PDOException $e) {
        $error_msg = 'Database Error: ' ;
        $error_msg .= $e->getMessage();
        include('view/error.php');
        exit();
    }
?>