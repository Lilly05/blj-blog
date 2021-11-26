<?php

function connectToDatabase()
{
    try {
        return new PDO('mysql:localhost;dbname=blog', 'root', '',[
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
            $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
            $sql = "SELECT created_by, created_at, post_title, link, post_text FROM posts ORDER BY created_at DESC";
            foreach ($pdo->query($sql) as $row) { 
            $link = $row['link'];?>

            <h2 class="title"> <?php
            echo $row['created_by'];?> 
            </h2> <p class="time"> <?php
            echo $row['created_at']."<br>"; ?> 
            <h5 class="title"> </p><?php
            echo $row['post_title']."<br>"; ?>
            </h5><?php
            echo "<img src='" . $link . "' . width='400px'><br>";
            ?></p>
            <p class= "post"> <?php
            echo $row['post_text']."<br>"; ?>
            </p> <?php
            }
            ?>
        </main>
    </div>
</body>
<html>