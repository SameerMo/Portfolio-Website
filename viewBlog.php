<?php
include_once 'header.php';
include 'connection.php';
$selectedMonth = "";
if (isset($_GET['month'])) {
    $selectedMonth = $_GET['month'];
    $sql = "SELECT * FROM posts WHERE MONTH(post_date) = '$selectedMonth'";
} else {
    $sql = "SELECT * FROM posts";
}

$query = mysqli_query($conn, $sql);

$posts = array();
while ($row = mysqli_fetch_assoc($query)) {
    $posts[] = $row;
}

function sortByPostDateDescending($a, $b)
{
    return strtotime($b['post_date']) - strtotime($a['post_date']);
}

usort($posts, 'sortByPostDateDescending');
?>
<div class="grid-container">
    <div class="blog">
        <section id="blog-post">
            <h2>BLOG</h2><br>
            <form method="get" action="viewBlog.php">
                <label for="month">Select a month:</label>
                <select name="month" id="month">
                    <option value="01" <?php if ($selectedMonth == "01")
                        echo " selected"; ?>>January</option>
                    <option value="02" <?php if ($selectedMonth == "02")
                        echo " selected"; ?>>February</option>
                    <option value="03" <?php if ($selectedMonth == "03")
                        echo " selected"; ?>>March</option>
                    <option value="04" <?php if ($selectedMonth == "04")
                        echo " selected"; ?>>April</option>
                    <option value="05" <?php if ($selectedMonth == "05")
                        echo " selected"; ?>>May</option>
                    <option value="06" <?php if ($selectedMonth == "06")
                        echo " selected"; ?>>June</option>
                    <option value="07" <?php if ($selectedMonth == "07")
                        echo " selected"; ?>>July</option>
                    <option value="08" <?php if ($selectedMonth == "08")
                        echo " selected"; ?>>August</option>
                    <option value="09" <?php if ($selectedMonth == "09")
                        echo " selected"; ?>>September</option>
                    <option value="10" <?php if ($selectedMonth == "10")
                        echo " selected"; ?>>October</option>
                    <option value="11" <?php if ($selectedMonth == "11")
                        echo " selected"; ?>>November</option>
                    <option value="12" <?php if ($selectedMonth == "12")
                        echo " selected"; ?>>December</option>
                </select>
                <button type="submit">Filter</button>
            </form>
            <?php
            if (isset($_GET["status"])) {
                if ($_GET["status"] == "success") {
                    echo "<p>The post has been successfully added<p>";
                }
            }
            ?>

            <div class="row">
                <?php
                if (count($posts) == 0) {
                    echo "<p>No posts found for the selected month.</p>";
                }
                ?>
                <?php foreach ($posts as $p) { ?>
                    <div class="col-sm-4 mb-3">
                        <div class="post">
                            <h5 class="title">
                                <span class="post-title">
                                    <?php echo $p['post_title']; ?>
                                </span>
                                <span class="post-date">
                                    <?php echo $p['post_date']; ?>
                                </span>
                            </h5><br>
                            <p class="content">
                                <?php echo ($p['post_content']); ?>
                            </p><br>
                            <p>Comments</p>
                            <?php
                            $post_id = $p['id'];

                            $sql = "SELECT * FROM comments WHERE post_id = $post_id";
                            $result = mysqli_query($conn, $sql);
                            $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            ?>

                            <?php foreach ($comments as $comment) { ?>
                                <div class="comment">
                                    <p>
                                    <?php echo $comment['author']; ?>
                                    <?php echo $comment['date']; ?><br>
                                        <?php echo $comment['comment']; ?>
                                    </p>
                                    <?php if (isset($_SESSION['uid']) && $_SESSION['email'] == 'admin@sameerkhan.com') { ?>
                                        <div class="comment-options">
                                            <a href="#" onclick="showEditForm(<?php echo $comment['id']; ?>)">Edit</a>
                                            <a href="delete_comment.php?comment_id=<?php echo $comment['id']; ?>">Delete</a>
                                        </div>

                                        <form action="edit_comment.php" method="post" id="edit-form-<?php echo $comment['id']; ?>"
                                            style="display: none;">
                                            <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                                            <textarea name="new_comment"><?php echo $comment['comment']; ?></textarea>
                                            <button name="submit" type="submit">Update</button>
                                        </form>
                                    <?php } ?>
                                </div>
                            <?php } ?>



                            <?php if (isset($_SESSION['uid'])) { ?>
                                <form action="submit_comment.php" method="post">
                                    <input type="hidden" name="post_id" value="<?php echo $p['id']; ?>">
                                    <textarea name="comment" placeholder="Add a comment..."></textarea>
                                    <button type="submit">Submit</button>
                                </form>
                            <?php } else {
                                echo "You must be logged in to add comments.";
                            } ?>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
            </div>
        </section>
    </div>
    <div class="login">
        <?php
        if (isset($_SESSION["uid"])) {
            echo '<a href="logout.php">Click here to logout</a>';
        } else {
            echo '<a href="login.php">Click here to login</a><br>';
            echo '<a href="signup.php">Click here to signup</a>';
        }
        ?>
    </div>
    <div class="post">
        <?php
        if (isset($_SESSION["uid"])) {
            echo '<a href="addPost.php">Click here to add a post</a>';
        } else {
            echo '<p>You must be logged in to add posts</p>';
        }
        ?>
    </div>
</div>
<?php
include_once 'footer.php';
?>