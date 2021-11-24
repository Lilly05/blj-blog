<?php

$errors = [];

$user = 'root';
$password = '';
$database = 'wordpress';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $title = $_POST['title'] ?? '';
    $post = $_POST['post'] ?? '';

    if ($name === '') {
      $errors[] = 'Bitte geben Sie einen Namen ein.';
    }

  if (count($errors) === 0) {
      echo "Alles OK!";
      $list = array ($name, $email, $phone, $people, $hotel, $program, $shuttle, $note);

      if(file_exists("anmeldungen.csv")){
          fputcsv($handle, ['Name', 'Email', 'Phone']);
      }
      $handle = fopen("daten/anmeldungen.csv", "a");
      fputcsv($handle, ['Name', 'Email', 'Phone'], ';');
      fclose($handle);
      
  }

    $conn = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password);
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
        <input type="text" name="name" value="<?=htmlspecialchars($name ?? '')?>"><br><br>
        <label for="title">Titel:</label><br>
        <input type="text" name="title" value="<?=htmlspecialchars($title ?? '')?>"><br><br>
        <label for="post">Blog Beitrag:</label><br>
        <textarea name="post" rows="10" cols="30" value="<?=htmlspecialchars($post ?? '' )?>"></textarea><br><br>
        <input type="submit" value="Posten">
    </form>
</body>
</html>
