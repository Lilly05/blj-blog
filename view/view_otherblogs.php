<?php
include "../model/model_otherblogs.php";
?>

<!DOCTYPE html>
<head>
    <link href="../styles/style.css" rel="stylesheet">
</head>
<body>
    <header>
            <ul>
                <li>
                    <input type="checkbox" />
                    <div class="animation">A</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">N</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">D</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">E</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">R</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">E</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="space"></div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">B</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">L</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">O</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">G</div>
                </li>
                <li>
                    <input type="checkbox" />
                    <div class="animation">S</div>
                </li>
        </ul>
    </header>
    <?php
    include "../navigation.php";
    ?> 
    <main> 
    <?php
    $sql = "SELECT description, url FROM urls ORDER BY description asc";
    foreach ($pdo->query($sql) as $row) { 
        $link = $row['url'];
        $description = $row['description'];
        echo "<a href='" . $link . "'class='otherblogs'>". $description . "</a><br><br>";
        }
    ?>
    </main>
</body>
</html>