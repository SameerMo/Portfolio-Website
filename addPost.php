<<<<<<< HEAD
<?php
include_once 'header.php';
if (isset($_POST["submit"])) {
    $date = date('Y-m-d H:i:s');
    $title = $_POST["title"];
    $content = $_POST["content"];

    require_once 'functions.php';
    require_once 'connection.php';

    addPost($conn, $date, $title, $content);
}
?>
<div class="grid-container">
    <div class="item1">
        <section>
            <?php
            if (isset($_GET["status"])) {
                if ($_GET["status"] == "success") {
                    $email = $_SESSION['email'];
                    $email_parts = explode('@', $email);
                    $username = $email_parts[0];
                    echo "<p>Welcome {$username}</p>";
                }
            }
            ?>
            <div class="forms">
                <form action="addPost.php" id="add-post" method="POST">
                    <h2>Add Post</h2>

                    <div class="userin">
                        <label for="title">Enter Desired Title</label>
                        <input type="text" name="title" id="title"><br>
                        <span id="title-error"></span>
                    </div>

                    <div class="userin">
                        <label for="content">Enter content</label>
                        <input type="text" name="content" id="content"><br>
                        <span id="content-error"></span>
                    </div>

                    <button type="submit" id="submit" name="submit">Submit</button>
                    <button type="button" onclick="clearAddPost()">Clear</button>
                </form>
            </div>
            <?php
            ?>
        </section>
        <script src="js/scripts.js"></script>
    </div>
</div>
<?php
include_once 'footer.php';
=======
<?php
include_once 'header.php';
?>
    <div class="grid-container">
        <div class="item1">
            <section>
            <?php
                if (isset($_GET["status"])){
                    if($_GET["status"] == "success"){
                        echo "<p>You have successfully logged in<p>";
                    }
                }
                ?>
                <div class="forms">
                    <form action="" id="add-post" onsubmit="preventDefault(event)">
                        <h2>Add Post</h2>
    
                        <div class="userin">
                            <label for="title">Enter Desired Title</label>
                            <input type="text" id="title">
                        </div>
    
                        <div class="userin">
                            <label for="content">Enter content</label>
                            <input type="text" id="content">
                        </div>
    
                        <button type="submit">Submit</button>
                        <button onclick="clearAddPost()">Clear</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
<?php
include_once 'footer.php';
>>>>>>> 9a0219555f9c3ea5758e4ab3d627cd0c72cf33de
?>