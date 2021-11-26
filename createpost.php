<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $name = htmlspecialchars($name);
    $title = $_POST['title'] ?? '';
    $title = htmlspecialchars($title);
    $link = $_POST['link'] ??'';
    $link = filter_var($link, FILTER_SANITIZE_URL);
    $post = $_POST['post'] ?? '';
    $post = htmlspecialchars($post);

    if ($name === '') {
      $errors[] = 'Bitte geben Sie einen Namen ein.';
    }

    if ($title === '') {
        $errors[] = 'Bitte geben Sie einen Titel ein.';
    }

    if ($post === '') {
        $errors[] = 'Bitte schreiben Sie ihren Blogbeitrag.';
    }

    if (filter_var($link, FILTER_VALIDATE_URL) === FALSE && $link !== ' ') {
        $errors[] = 'Bitte geben Sie einen gültigen Link ein';
    }

    if (count($errors) === 0) {
        $conn = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn -> prepare("INSERT INTO posts (created_by, post_title, link, post_text) VALUES (:name, :title, :link, :post)");
    
        $sql->execute([':name' => $name, ':title' => $title, ':link' => $link, ':post' => $post]);
  }
}
?>

<!DOCTYPE html>
<head>
<link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Blog Beitrag erstellen</h1>
    </header>
    <?php
    include "navigation.php";
    ?>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (count($errors) > 0) { ?>
                <ul class="error-box">
                    <?php foreach ($errors as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
        <?php }else {
            ?> <p class="notification"><?php
            echo "Ihr Beitrag wurde gepostet"; ?>
            </p> <?php
        }
    }?>
    <form action="createpost.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="<?=$name ?? ''?>"><br><br>

        <label for="title">Titel:</label><br>
        <input type="text" name="title" value="<?=$title ?? ''?>"><br><br>

        <label for="link"></label>Bildlink:<br>
        <input type="text" name="link" value="<?=$link ?? ''?>"><br><br>

        <label for="post">Blog Beitrag:</label><br>
        <textarea name="post" rows="10" cols="30" value="<?=$post ?? '' ?>"></textarea><br><br>

        <input type="submit" value="Posten">
    </form>
</body>
</html>
