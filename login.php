
<?php
	include "header.inc";
	include "menu.inc";
	require_once ("settings.php");
	$conn = @mysqli_connect($host,
	$user,
	$pwd,
	$sql_db);

		if (isset($_SESSION["locked"])){
			//taking the difference between current time and locked time
			$difference = time() - $_SESSION["locked"];
			if ($difference > 150){
				unset($_SESSION["locked"]);
				unset($_SESSION["login_attempts"]);
			}
		}
		if (!isset($_SESSION["login_attempts"])){
			$_SESSION["login_attempts"] =0 ;
		}


		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			//check if username and password is set ^^
			//collecting user inputs 
			$username = trim($_POST["username"]);
			$password = trim($_POST["password"]);
			//other data sanitising functions
			$query = "select * from login_credentials where username = '$username' AND password = '$password'" ;
			$result = mysqli_query($conn, $query);
		
			//to keep user logged in
    	    if (@mysqli_num_rows($result)) {
				$_SESSION['loggedin'] = $username;
				header("Location:manage.php");
			}
			else{
				$_SESSION["error"] = "Username or Password is incorrect";
				$_SESSION["login_attempts"] += 1;
			}
		}
?>
<title>Supervisor login</title>
<h1>Login page</h1>
<form method="post" action="login.php">
<?php if (isset($_SESSION["error"])) { ?>
	<p id="error2">
        <?= $_SESSION["error"]; ?></p>
<?php unset($_SESSION["error"]); }?>

<p>
	<label for="username">Username: </label>
	<input type="text" id="username" name="username" required>
		
</p>
<p>
	<label for="password">Password: </label>
	<input type="text" id="password" name="password" required>
		
</p>
<?php
	if ($_SESSION["login_attempts"] > 2){
		$_SESSION["locked"] = time();
		echo "<p id = \"error1\"> To Many Attempts: Please Try Again By Clicking on the Login Tab In 150 seconds:</p>";
		//
	}
	else {
?>
<p>
	<input type="submit" value="Login">
</p>
<?php } ?>
</form>
<?php
include "footer.inc";
?>
