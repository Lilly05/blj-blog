<?php 
include "../model/model_createpost.php";
?>

<!DOCTYPE html>
<head>
<link href="../styles/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="container">
        <header>
        <ul>
            <li>
                <input type="checkbox" />
                <div class="animation">N</div>
            </li>
            <li>
                <input type="checkbox" />
                <div class="animation">E</div>
            </li>
            <li>
                <input type="checkbox" />
                <div class="animation">U</div>
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
                <div class="space"></div>
            </li>
            <li>
                <input type="checkbox" />
                <div class="animation">B</div>
            </li>
            <li>
                <input type="checkbox" />
                <div class="animation">E</div>
            </li>
            <li>
                <input type="checkbox" />
                <div class="animation">I</div>
            </li>
            <li>
                <input type="checkbox" />
                <div class="animation">T</div>
            </li>
            <li>
                <input type="checkbox" />
                <div class="animation">R</div>
            </li>
            <li>
                <input type="checkbox" />
                <div class="animation">A</div>
            </li>
            <li>
                <input type="checkbox" />
                <div class="animation">G</div>
            </li>
      </ul>
    </header>
    <?php
    include "view_navigation.php";
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
            echo "Ihr Beitrag wurde gepostet"; ?><br>
            </p> <?php
        }
    }?>
    <form class="newpost" action="view_createpost.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="<?=$name ?? ''?>"><br><br>

        <label for="title">Titel:</label><br>
        <input type="text" name="title" value="<?=$title ?? ''?>"><br><br>

        <label for="link">Bildlink:</label><br>
        <input type="text" name="link" value="<?=$link ?? ''?>"><br><br>

        <label for="post">Blog Beitrag:</label><br>
        <textarea name="post" rows="10" cols="30" value="<?=$post ?? '' ?>"></textarea><br><br>

        <input type="submit" value="Posten">
    </form>
    </div>
</body>
</html>