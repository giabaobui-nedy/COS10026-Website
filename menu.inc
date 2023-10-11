<div class="navbar">
    <a href="index.php">Home</a>
    <div class="subnav">
        <button class="subnavbtn">Content</button>
        <div class="subnav-content">
            <a href="topic1.php">IPv4</a>
            <a href="topic2.php">IPv6</a>
            <a href="topic3.php">IPV4 vs IPV6</a>
        </div>
    </div> 
	<a href="manage.php">Manage</a>
	<a href="quiz.php">Quiz</a>
	<a href="enhancements.php">Enhancements</a>
	<a href="enhancements2.php">Enhancements2</a>
	<a href="phpenhancements.php">Php Enhancements</a>
<?php 
    session_start();
    if (isset($_SESSION['loggedin'])) {        	//detects if logged in or not

    echo '<a href="logout.php">Logout</a>';		//if $_SESSION['user'] is found (aka someone is logged in) the logout button will be displayed
	}
    else{
    echo '<a href="login.php">Login</a>';		//if $_SESSION['user'] is not found, (aka noone has logged in) the login button will be displayed
}
?>
</div>
