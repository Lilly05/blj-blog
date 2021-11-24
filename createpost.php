<?php

$user = 'root';
$password = '';
$database = 'wordpress';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $title = $_POST['title'] ?? '';
    $post = $_POST['post'] ?? '';

    $conn = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn -> prepare("INSERT INTO posts (created_by, post_title, post_text) VALUES (:name, :title, :post)");
    
    $sql->execute([':name' => $name, ':title' => $title, ':post' => $post]);
}
?>

<!DOCTYPE html>
<head>
<link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Lilly's Blog</h1>
    </header>
    <?php
    include "navigation.php";
    ?>
    <form action="createpost.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="<?= $name ?? ''?>"><br><br>
        <label for="title">Titel:</label><br>
        <input type="text" name="title" value="<?= $title ?? ''?>"><br><br>
        <label for="post">Blog Beitrag:</label><br>
        <textarea name="post" rows="10" cols="30" value="<?= $post ?? '' ?>"></textarea><br><br>
        <input type="submit" value="Posten">
    </form>
</body>
</html>
