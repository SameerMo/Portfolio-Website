<<<<<<< HEAD
<?php
include_once 'header.php';
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["confirmPassword"];

    require_once 'functions.php';
    require_once 'connection.php';

    if (emptyInputSignup($email, $password, $passwordRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (passwordsMatch($password, $passwordRepeat) !== false) {
        header("location: ../signup.php?error=passwordmismatch");
        exit();
    }
    if (emailExists($conn, $email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }
    createUser($conn, $email, $password);
}

?>
<div class="grid-container">
    <div class="item1">
        <section>
            <div class="forms">
                <form action="signup.php" method="POST" id="signup-form">
                    <h2>Sign up Form</h2>

                    <div class="userin">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="userin">
                        <label for="password">Password</label>
                        <input type="password" name="password" required minlength="8">
                    </div>

                    <div class="userin">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword" required minlength="8">
                    </div>

                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>
            <?php
            if (isset($_GET["status"])) {
                if ($_GET["status"] == "success") {
                    echo "<p>You have successfully signed up<p>";
                }
            }
            ?>
        </section>
    </div>
</div>
<?php
include_once 'footer.php';
=======
<?php
include_once 'header.php';
if( isset($_POST["submit"]) )
{
    $email       = $_POST["email"];
    $password       = $_POST["password"];
    $passwordRepeat = $_POST["confirmPassword"];
    
    require_once 'functions.php';
    require_once 'connection.php';
    
    if( emptyInputSignup($email, $password, $passwordRepeat) !== false )
    {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if( invalidEmail($email) !== false )
    {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if( passwordsMatch($password, $passwordRepeat) !== false )
    {
        header("location: ../signup.php?error=passwordmismatch");
        exit();
    }
    if( emailExists($conn, $email) !== false )
    {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }
    createUser($conn, $email, $password);
}

?>
    <div class="grid-container">
        <div class="item1">
            <section>
                <div class="forms">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="signup-form">
                        <h2>Sign up Form</h2>
    
                        <div class="userin">
                            <label for="email">Email</label>
                            <input type="email" name="email" required>
                        </div>
    
                        <div class="userin">
                            <label for="password">Password</label>
                            <input type="password" name="password" required minlength="8">
                        </div>

                        <div class="userin">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmPassword" required minlength="8">
                        </div>            
    
                        <button type="submit" name="submit">Sign Up</button>
                    </form>
                </div>
                <?php
                if (isset($_GET["status"])){
                    if($_GET["status"] == "success"){
                        echo "<p>You have successfully signed up<p>";
                    }
                }
                ?>
            </section>
        </div>
    </div>
<?php
include_once 'footer.php';
>>>>>>> 9a0219555f9c3ea5758e4ab3d627cd0c72cf33de
?>