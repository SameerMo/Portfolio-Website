<?php
include_once 'header.php';
?>
    <div class="grid-container">
        <div class="blog">
            <section id="blog-post">
                <h2>SAMPLE BLOG POST</h2><br>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus magni autem adipisci ipsam, hic aliquam aperiam soluta ducimus consectetur voluptates sint velit eveniet similique maiores, unde fugiat officia id a!</p>
            </section>
        </div>
        <div class="login">
        <?php
                if (isset($_SESSION["uid"])){
                    echo '<a href="logout.php">Click here to logout</a>';
                }
                else{
                    echo '<a href="login.php">Click here to login</a>';
                }
                ?>
        </div>
        <div class="post">
            <a href="addPost.php">Click here to add a post</a>
        </div>
    </div>
<?php
include_once 'footer.php';
?>