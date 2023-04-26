<!--Opening HTML tags and adding navbar-->
<?php
include_once 'header.php';
if (isset($_POST["submit"])){
	$email=$_POST["email"];
	$password=$_POST["password"];
	require_once 'connection.php';
	require_once 'functions.php';
	loginUser($conn, $email, $password);
}
?>
    <div class="grid-container">
        <div class="item1">
            <section>
                <div class="forms">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="login-form">
                        <h2>Login Form</h2>
    
                        <div class="userin">
                            <label for="email">Email</label>
                            <input type="email" name="email">
                        </div>
    
                        <div class="userin">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required minlength="8">
                        </div>

                        <div class="userin">
                            <label>Show Password</label>
                            <input type="checkbox" onclick="password_show_hide();">
                        </div>

    
                        <button type="submit" name="submit">Login</button>
                    </form>
                </div>
				<?php
                if (isset($_GET["status"])){
                    if($_GET["status"] == "loggedout"){
                        echo "<p>You have successfully logged out<p>";
                    }
                }
                ?>
            </section>
        </div>
    </div>
<?php
include_once 'footer.php';
?>