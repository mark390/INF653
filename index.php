<?php
    if (isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['age'])) {
        $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_NUMBER_INT);
        $date = date('m/d/y');
        $dayage = $age * 365;
    } else {
        echo "Get parameters not set!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 2 Assignment</title>
    <style>
    body {
        background-image: url(screen.png);
        background-repeat: no-repeat;
        background-position: center center;
        text-align: center;
        }
    ul {
        text-align: right;
    }
    </style>
</head>
<body>
    <ul><?php echo "Today is $date"; ?></ul>
    <h1><?php echo "Hello, my name is" . " " . htmlspecialchars($firstname) . " " . htmlspecialchars($lastname) . "."; ?></h1>
    <h2><?php if ( $age >= 18 ) {
        echo "I am old enough to vote in the United States.";
    } else {
        echo "I am not old enough to vote in the United States";
    } ?></h2>
    <h3><?php echo "That means I am" . " " . htmlspecialchars($dayage) . " " . "days old."; ?></h3>
    
</body>
</html>