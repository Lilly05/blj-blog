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

    if (filter_var($link, FILTER_VALIDATE_URL) === FALSE && $link !== '') {
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
