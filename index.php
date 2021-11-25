<?php

function connectToDatabase()
{
    try {
        return new PDO('mysql:localhost;dbname=wordpress', 'root', '',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES uft8',
        ]);

    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>

<head>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div id="container">
        <header>
            <h1>Lilly's Blog</h1>
        </header>
        <?php
            include "navigation.php";
        ?>
        <main class="background">
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=wordpress', 'root', '');
            $sql = "SELECT created_by, created_at, post_title, post_text FROM posts ORDER BY created_at DESC";
            foreach ($pdo->query($sql) as $row) { ?>
            <h2 class="home"> <?php
            echo $row['created_by'];?> 
            </h2> <p class="time"> <?php
            echo $row['created_at']."<br>"; ?> 
            <h3 class="home"> </p><?php
            echo $row['post_title']."<br>"; ?>
            </h3> <p class= "post"> <?php
            echo $row['post_text']."<br>"; ?>
            </p> <?php
            }
            ?>
        </main>
    </div>
</body>
<html>