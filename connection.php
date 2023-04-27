<<<<<<< HEAD
<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "blog_users";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
=======
<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "blog_users";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
	die("Connection failed: " . mysqli_connect_error());
>>>>>>> 9a0219555f9c3ea5758e4ab3d627cd0c72cf33de
}