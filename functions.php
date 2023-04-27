<<<<<<< HEAD
<?php

function emailExists($conn, $email)
{
	$sql = "SELECT * FROM users WHERE email=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: login.php");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);

}

function loginUser($conn, $email, $password)
{
	$emailExists = emailExists($conn, $email);

	if ($emailExists === false) {
		header("location: login.php?status=wrongemail");
		exit();
	}

	$passwordHashed = $emailExists["password"];
	$checkpwd = password_verify($password, $passwordHashed);

	if ($checkpwd === false) {
		header("location: login.php?status=wrongpassword");
		exit();
	} else if ($checkpwd === true) {
		session_start();
		$_SESSION["uid"] = $emailExists["uid"];
		echo $_SESSION["email"] = $emailExists["email"];
		header("location: addPost.php?status=success");
		exit();
	}
}

function emptyInputSignup($email, $password, $passwordRepeat)
{
	$result;
	if (empty($email) || empty($password) || empty($passwordRepeat)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function emptyInputLogin($email, $password)
{
	$result;
	if (empty($email) || empty($password)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidEmail($email)
{
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function passwordsMatch($password, $passwordRepeat)
{
	$result;
	if ($password !== $passwordRepeat) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function createUser($conn, $email, $password)
{
	if (empty($email) || empty($password)) {
		header("Location: signup.php?error=emptyfields");
		exit();
	}
	$sql = "INSERT INTO users (email, password) VALUES (?, ?)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location: signup.php?error=stmtfailed");
		exit();
	}
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPassword);
	if (!mysqli_stmt_execute($stmt)) {
		header("Location: signup.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_close($stmt);
	header("Location: signup.php?status=success");
	exit();
}

function addPost($conn, $date, $title, $content)
{
	$sql = "INSERT INTO posts (post_date, post_title, post_content) VALUES (?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location: addpost.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sss", $date, $title, $content);
	if (!mysqli_stmt_execute($stmt)) {
		header("Location: addpost.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_close($stmt);
	header("Location: viewBlog.php?status=success");
	exit();

}
=======
<?php

function emailExists($conn, $email){
	$sql = "SELECT * FROM users WHERE email=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("location: login.php");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result =  false;
		return $result;
	}

	mysqli_stmt_close($stmt);

}

function loginUser($conn, $email, $password){
	$emailExists = emailExists($conn, $email);

	if ($emailExists === false){
		header("location: login.php?status=wrongusername");
		exit();
	}

	$passwordHashed = $emailExists["password"];
	$checkpwd = password_verify($password, $passwordHashed);

	if ($checkpwd === false){
		header("location: login.php?status=wrongpassword");
		exit();
	}
	else if ($checkpwd === true){
		session_start();
		$_SESSION["uid"] = $emailExists["uid"];
		echo $_SESSION["email"] = $emailExists["email"];
		header("location: addPost.php?status=success");
		exit();
	}
}

	function emptyInputSignup($email, $password, $passwordRepeat)
	{
		$result;
		if(empty($email) || empty($password) || empty($passwordRepeat) )
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		return $result;
	}
	
	function emptyInputLogin($email, $password)
	{
		$result;
		if( empty($email) || empty($password) )
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		return $result;
	}
	
	function invalidEmail($email)
	{
		$result;
		if( !filter_var($email, FILTER_VALIDATE_EMAIL) )
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		return $result;
	}
	
	function passwordsMatch($password, $passwordRepeat)
	{
		$result;
		if( $password !== $passwordRepeat )
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		return $result;
	}		

	function createUser($conn, $email, $password) {
		if (empty($email) || empty($password)) {
			header("Location: signup.php?error=emptyfields");
			exit();
		}
		$sql = "INSERT INTO users (email, password) VALUES (?, ?)";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: signup.php?error=stmtfailed");
			exit();
		}
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPassword);
		if (!mysqli_stmt_execute($stmt)) {
			header("Location: signup.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_close($stmt);
		header("Location: signup.php?status=success");
		exit();
	}
	
>>>>>>> 9a0219555f9c3ea5758e4ab3d627cd0c72cf33de
