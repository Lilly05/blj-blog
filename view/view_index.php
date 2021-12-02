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
            <h1>Lilly's Blog</h1>
        </header>
        <?php
            include "../navigation.php";
        ?>
        <main class="background">
            <?php
            foreach ($pdo->query($sql) as $post) { 
                $link = $post['link'];
                ?>
                <div class="post-box">
                    <div class="post">
                        <h2 class="title"> <?= $post['created_by'] ?></h2> 
                        <p class="time"> <?= $post['created_at'] ?></p>
                        <h5 class="title"> <?= $post['post_title']."<br>" ?></h5>
                        <p><img src="<?= $link ?>" class="image"></p>
                        <p class= "post"> <?= $post['post_text'] ?></p>
                    </div>
                    <div class="comments-box">
                        <div class="add-comment-box">
                            <form method="POST">
                                <label for="comment_block">Neuer Kommentar:</label><br><br>
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