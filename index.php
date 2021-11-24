<?php
function connectToDatabase()
{
    try {
        return new PDO('mysql:host=localhost;dbname=guestbook', 'root', '');
    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
}
$dbh = connectToDatabase();

$daten = "SELECT "
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
            <h2>Name</h2>
            <p>Blog Beitrag</p>
            <p>Kommentar</p>
        </main>
    </div>
</body>
<html>