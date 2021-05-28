<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Zack">
        <Title>Watson Interface</Title>
        <link rel="stylesheet" type="text/css" href="loot.css">
        <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Aclonica" /> -->
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Aclonica' type='text/css' />
        
        
    </head>
    <body>
        <nav>
            <ul class="nav__bar">         
                <?php 
                    if (isset($_SESSION["useruid"])){
                        
                        echo "<li class='nav__buttons'><a href='index.php'>Main Page</a></li>";
                        echo "<li class='nav__buttons'><a href='./includes/logout.inc.php'>Logout</a></li>";
                    }         
                    else {
                        echo "<li class='nav__buttons'><a href='login.php'>Members Only</a></li>";
                    }
                ?>
            </ul>
         </nav>