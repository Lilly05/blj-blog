<?php

function connectToDatabase()
{
    try {
        return new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dagomez', 'd041e_dagomez', '54321_Db!!!',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES uft8',
        ]);

    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
}
$pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dagomez', 'd041e_dagomez', '54321_Db!!!');
?>

<!DOCTYPE html>
<head>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
            <h1>Andere Blogs</h1>
    </header>
    <?php
    include "navigation.php";

    $sql = "SELECT description, url FROM urls ORDER BY description asc";
    foreach ($pdo->query($sql) as $row) { ?>
        <a href=<?php $row['url'] ?>><?php $row['description']?></a><br><br>
    <?php }
    ?>

</body>
</html>