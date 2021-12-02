<?php
include "../model/model_otherblogs.php";
?>

<!DOCTYPE html>
<head>
    <link href="../styles/style.css" rel="stylesheet">
</head>
<body>
    <header>
            <h1>Andere Blogs</h1>
    </header>
    <?php
    include "../navigation.php";

    $sql = "SELECT description, url FROM urls ORDER BY description asc";
    foreach ($pdo->query($sql) as $row) { 
    $link = $row['url'];
    $description = $row['description'];
        echo "<a href='" . $link . "'class='otherblogs'>". $description . "</a><br><br>";
        }
    ?>

</body>
</html>