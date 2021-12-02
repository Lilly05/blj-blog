<?php 
include "../model/model_createpost.php";
?>

<!DOCTYPE html>
<head>
<link href="../styles/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Blog Beitrag erstellen</h1>
    </header>
    <?php
    include "../navigation.php";
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
    <form action="view_createpost.php" method="POST">
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