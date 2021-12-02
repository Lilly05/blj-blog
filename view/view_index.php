<?php
include "../model/model_index.php";
?>

<!DOCTYPE html>

<head>
<link href="../styles/style.css" rel="stylesheet">
</head>

<body>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
    });
        window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
    <div id="container">
        <header>
        <ul>
        <li>
            <input type="checkbox" />
            <div class="animation">L</div>
        </li>
        <li>
            <input type="checkbox" />
            <div class="animation">I</div>
        </li>
        <li>
            <input type="checkbox" />
            <div class="animation">L</div>
        </li>
        <li>
            <input type="checkbox" />
            <div class="animation">L</div>
        </li>
        <li>
            <input type="checkbox" />
            <div class="animation">Y</div>
        </li>
        <li>
            <input type="checkbox" />
            <div class="animation">S</div>
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
      </ul>
        </header>
        <?php
            include "view_navigation.php";
        ?>
        <main class="background">

        <div class="notification-container" id="notification-container">
        <div class="easteregg notification-info">
            <strong>Info:</strong> Auf diesem Blog gibt es ein Easteregg. Have fun searching :)
        </div>
        </div>
        
            <?php
            foreach ($pdo->query($sql) as $post) { 
                $link = $post['link'];
                ?>
                <div class="post-box">
                    <div class="post">
                        <div class="post-information">
                        <h2 class="title"> <?= $post['created_by'] ?></h2> 
                        <p class="time"> <?= $post['created_at'] ?></p>
                        <h5 class="title"> <?= $post['post_title']."<br>" ?></h5>
                        </div>
                        <p><img src="<?= $link ?>" class="image"></p>
                        <p class= "post"> <?= $post['post_text'] ?></p>
                    </div>
                    <div class="comments-box">
                        <div class="add-comment-box">
                            <form method="POST">
                                <label class="label" for="comment_block">Neuer Kommentar:</label><br><br>
                                <input type="text" name="comment_block"?><br><br>
                                <input type="submit" value="Posten"><br><br>
                                <input type="hidden" name="comment-id" value="<?=$post['blog_id']?>">
                            </form>
                        </div>
                        <div class="comments">
                            <h5>Kommentare</h5>
                            <?php foreach($comments as $comment): ?>
                                <?php if($comment['blog_id'] === $post['blog_id']): ?>
                                    <?php if($comment !== " "): ?>
                                        <div class="comment">
                                            <?= $comment['comment'] ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>     
                        </div>
                     </div>
                </div> <!-- /post-box -->
                <?php 
                } 
            ?>
        </main>
    </div>
</body>
</html>