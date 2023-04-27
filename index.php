<?php
include_once 'header.php';
?>
<div class="grid-container">
    <div class="item1">
        <article>
            <h2>ABOUT ME</h2>
            <section>
                <h3>Hi! I am Sameer Khan.</h3><br>
                <h4>I am an <span>aspiring software developer</span></h4><br>
                <p> Interested in AI and machine learning. I am currently studying computer science at Queen Mary
                    University of London.
                    Some things i like: Football, movies, video games.
                    You can get in touch with me through the details provided in the contact page.
                </p><br>
                <a href="contact.php" class="button" id="contactme">Get in touch with me</a><br>
                <figure>
                    <img src="images/sameer.png" id="sameer" alt="Sameer Khan">
                </figure>
            </section>
        </article>
        <?php
        if (isset($_GET["status"])) {
            if ($_GET["status"] == "loggedout") {
                echo "<p>You have successfully logged out<p>";
            }
        }
        ?>
    </div>
</div>
<?php
include_once 'footer.php';
?>