<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$sql = "SELECT * FROM posts ORDER BY created_at DESC";

if(isset($_POST['comment-id'])) {
    $idComment  = $_POST['comment-id'];
    $comment = $_POST['comment_block'] ?? '';
    $comment = htmlspecialchars($comment);
    $stmt = $pdo->prepare('INSERT INTO comments (comment, blog_id)
    VALUES(:comment, :id)');
    $stmt->execute([':comment' => $comment, ':id' => $idComment]);
 }  

 $stmt = $pdo->query('SELECT * FROM `comments` ORDER BY createdat DESC');
 $comments = $stmt-> fetchAll();
?>