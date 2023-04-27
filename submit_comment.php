<?php
session_start();
include "connection.php";
$post_id = $_POST['post_id'];
$comment = $_POST['comment'];
$date = date('Y-m-d H:i:s');
$email = $_SESSION['email'];
$email_parts = explode('@', $email);
$username = $email_parts[0];
if (empty($comment)) {
    die("Comment cannot be empty");
}
$sql = "INSERT INTO comments (post_id, author, date, comment) VALUES ($post_id, '$username', '$date', '$comment')";
mysqli_query($conn, $sql);
header("Location: viewBlog.php");
exit;
?>