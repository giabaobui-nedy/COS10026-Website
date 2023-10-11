<?php
    include 'header.inc';
    include "menu.inc";
?>
<div id="mainbody">
    <h1>PHP Enhancements</h1>

  	<h2><a href="login.php">Enhancement 1: Login Page</a></h2>
	  <p>This enhancement involes a login page which will ask a user to enter their username and password. All usernames and passwords are stored in the SQL table login_credentials. If a user enters the correct information, they will gain access to the supervisor page and commands. </p>
	  <p>The html code to implement this feature:</p>
	  <img id="img" src="images/login.png" alt="PHP that logs someone in and keeps them logged in"/> </br>
 	  <img id="img" src="images/login2.PNG" alt="PHP to log in"/>
	  <p>If a user tries to access manage.php without being logged in, they will be redirected to the login.php page. Only once they have succesffuly logged in can they access manage.php. We use $_SESSION['loggedin'] to keep a user logged in.</p>
	  <p>The html code to implement this feature:</p>
	  <img id="img" src="images/loggedin.PNG" alt="Code preventing access to manage.php">

	<h2><a href="logout.php">Enhancement 2: Making the login system more secure</a></h2>
	  <p>The first part of this is the logout page, which enables a supervisor to logout once they are done with the supervisor page. This is done by making use of the session destroy and session unset functions</p>
	  <img id="img" src="images/logoutcode.PNG" alt="PHP logout code">
	  <p>Having a logout page to accompany the login page is essential because it prevents someone from acessesing someone else's account by using the same computer.</p>
	  <p>Also, the button for logging out will only be shown when logged in, and the login button will only show when logged in.</p>
	  <!-- Note: I am making the code for this but I wont upload it until the login has been created so that the code does not break -->
	  <p>The second security feature we have added was when a user entered a username and the password incorrectly more than 2 attempts the session will automatically locked for 2 minutes. In two minutes when you click on the login tab and comes again you can try to enter the username and password again.</p>

	 <section id="footnotes">
      	  <h6>References</h6>
    		<p> <a class="footnote-link" href="https://youtu.be/tH7dzGnrSI8">[1]</a> Youtube: How to prevent user from login for 30 seconds after 3 failed login attempts - PHP (2020). Retrieved 29 May 2022 </p>
		<p> <a class="footnote-link" href="https://www.w3schools.com/howto/howto_css_login_form.asp">[2]</a> W3Schools: How TO - Login Form. Retrieved 29 May 2022 </p>
	 </section>
</div>

<?php
    include "footer.inc";
?>

