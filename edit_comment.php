<?php
include 'connection.php';
if (isset($_POST['submit'])) {
    $comment_id = $_POST['comment_id'];
    $new_comment = $_POST['new_comment'];
    if (empty($new_comment)) {
        die("Comment cannot be empty");
    }
    $query = "UPDATE comments SET comment='$new_comment' WHERE id='$comment_id'";
    mysqli_query($conn, $query);
    header('Location: viewBlog.php');
}
?>