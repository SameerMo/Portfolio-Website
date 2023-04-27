<?php
include 'connection.php';
$comment_id = $_GET['comment_id'];
$query = "DELETE FROM comments WHERE id='$comment_id'";
mysqli_query($conn, $query);
header('Location: viewBlog.php');
?>