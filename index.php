<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$sql = "SELECT created_by, created_at, post_title, link, post_text, comments FROM posts ORDER BY created_at DESC";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'] ?? '';
    $comment = htmlspecialchars($comment);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = $pdo -> prepare("INSERT INTO posts (comments) VALUES (:comment)");

    $sql2->execute([':comment' => $comment]);
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
            foreach ($pdo->query($sql) as $row) { 
            $link = $row['link'];?>

            <h2 class="title"> <?php
            echo $row['created_by'];?> 
            </h2> <p class="time"> <?php
            echo $row['created_at']."<br>"; ?> 
            <h5 class="title"> </p><?php
            echo $row['post_title']."<br>"; ?>
            </h5><?php
            echo "<img src='" . $link . "' . class='image'><br>";
            ?></p>
            <p class= "post"> <?php
            echo $row['post_text']."<br>"; ?>
            </p> 
            <form method="POST">
            <label for="comment">Kommentar:</label><br>
            <input type="text" name="comment" value="<?=$comment ?? ''?>"><br><br>
            <div class="border">
            <input class="comment" type="submit" value="Posten"><br><br>
            </div>
            </form>
            <?php
            }
            ?>
        </main>
    </div>
</body>
<html>