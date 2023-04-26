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
?>