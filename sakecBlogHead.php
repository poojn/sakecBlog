<?php
// session_start();

$signIn = '<a href="#" id="signin" class="">Sign In</a>';

if (isset($_SESSION['userName'])) {
	$signIn = null;
	$loggedIn = '<a onclick="toggleUserNav()" href="#" id="username-nav">'.$_SESSION["userName"].'</a>
	<a href="writeBlog.php" class="user-drop" id="writeblog-nav">Write a Blog</a>
	<a href="signOut.php" class="user-drop" id="sign-out">Sign Out</a>';
	//<a href="profile.php" class="user-drop" id="profile-nav">Profile</a>
}
else {
	$loggedIn = null;
}
?>

<div id="head-full" class="row-aft">
	<header class="row-aft">
		<div id="logo" onclick="goHome()">S</div>
		<div id="site-name" onclick="goHome()">akecBlog</div>
		<nav class="nav row-aft">
			<a href="javascript:void(0);" class="icon row-bef" onclick="navHam()"><i class="fa fa-bars"></i></a>
			<a href="index.php" class="nav-active">Home</a>
			<!--  -->			
			<a href="aboutUs.php" class="">About Us</a>
			<?php echo $signIn.''.$loggedIn;?>
			<!-- '.$signIn.
			''
			.$loggedIn.' -->
		</nav>
	</header>
</div>
<div id="signin-modal">
	<div id="close-signin" class="row-aft"><i class="fa fa-times close" aria-hidden="true"></i></div>

	<form id="login-form" action="signIn.php" method="post">
		<label for="uname">User Name</label>
		<input type="text" id="uname" name="uname" placeholder="Your user name..">
		<label for="password">Password</label><br/>
		<input type="password" id="password" name="password" placeholder="Enter your password..">		
		<input type="checkbox" id="show-pass" name="showPassword" onclick="togglePass()">
		<label for="showPass" id="show-pass-label">Show Password</label><br/>

		<input type="submit" name="LogIn" value="Log In">
		<input type="reset">
		<input type="button" id="form-toggle" value="Sign Up" onclick="toggleForm()">
		<input type="hidden" name="destination" value="<?php echo $_SERVER['REQUEST_URI']?>">
	</form>

	<form id="signup-form" action="signIn.php" method="post">
		<label for="fname">First Name</label>
		<input type="text" id="fname" name="fname" placeholder="Your first name..">

		<label for="lname">Last Name</label>
		<input type="text" id="lname" name="lname" placeholder="Your last name..">

		<label for="uname">User Name</label>
		<input type="text" id="uname" name="uname" placeholder="Your user name..">
	    <label for="gender">Gender</label><br/>
		<select id="gender" name="gender">
			<option selected value="M">Male</option>
			<option value="F">Female</option>
			<option value="O">Other</option>
		</select>
		<label>Phone number</label>
		<br/>
		<input type="tel" id="phone" name="number" placeholder="Enter your mobile number.." pattern="^\d{10}$" required />
		<br/>
		<label for="ename">Email</label>
	    <br/>
		<input type="Email" id="ename" name="email" placeholder="Enter your Email id..">
	    <br/>
		<label for="password">Password</label><br/>
		<input type="password" id="password" name="password" placeholder="Enter your password..">
		<label for="password">Confirm Password</label><br/>
		<input type="password" id="password" name="confirmPassword" placeholder="Confirm your password..">

		<input type="submit" name="SignUp" value="Sign Up">
		<input type="reset">
		<input type="button" id="form-toggle" value="Log In" onclick="toggleForm()">
		<input type="hidden" name="destination" value="<?php echo $_SERVER['REQUEST_URI']?>">
	</form>
</div>
<script type="text/javascript">
	// Get the modal
	var modal = document.getElementById("signin-modal");

	// Get the button that opens the modal
	var btn = document.getElementById("signin");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on the button, open the modal 
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}	

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}

	var sform = document.getElementById("signup-form");
	var lform = document.getElementById("login-form");

	sform.style.display = "none";

	function toggleForm(){
		if (sform.style.display == "none") {
			sform.style.display = "block";
			lform.style.display = "none"
		}
		else{
			sform.style.display = "none";
			lform.style.display = "block";
		}
	}

	function togglePass() {
	    var passBox = document.getElementById("password");
	    if (passBox.type === "password") {
	        passBox.type = "text";
	    } else {
	        passBox.type = "password";
	    }
	}

	function toggleUserNav() {
		var userOpt = document.getElementsByClassName("user-drop");
		if(userOpt[0].style.display == "none") {
			for(i=0; i<userOpt.length; i++) {
				userOpt[i].style.display = "block";
			}
		}
		else {
			for(i=0; i<userOpt.length; i++) {
				userOpt[i].style.display = "none";
			}
		}
	}

</script>
