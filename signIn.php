<div id="signin-modal">
	<div id="close-signin" class="row-aft"><i class="fa fa-times close" aria-hidden="true"></i></div>

	<form id="login-form" action="#">
		<label for="uname">User Name</label>
		<input type="text" id="uname" name="user name" placeholder="Your user name..">
		<label for="password">Password</label><br>
		<input type="password" id="password" name="password" placeholder="Enter your password..">
		<input type="submit" name="submit">
		<input type="reset">
	</form>

	<form id="signup-form" action="#">
		<label for="fname">First Name</label>
		<input type="text" id="fname" name="first name" placeholder="Your first name..">

		<label for="lname">Last Name</label>
		<input type="text" id="lname" name="last name" placeholder="Your last name..">

		<label for="uname">User Name</label>
		<input type="text" id="uname" name="user name" placeholder="Your user name..">
	    <label for="gender">Gender</label><br>
		<select id="gender" name="gender">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			<option value="Other">Other</option>
		</select>
		<label>Phone number</label>
		<br>
		<input type="tel" id="phone" name="number" placeholder="Enter your mobile number.." pattern="^\d{10}$" required />
		<br>
		<label for="ename">Email</label>
	    <br>
		<input type="Email" id="ename" name="Email" placeholder="Enter your Email id..">
	    <br>
		<label for="password">Password</label><br>
		<input type="password" id="password" name="password" placeholder="Enter your password..">

		<input type="submit" name="submit">
		<input type="reset">
	</form>
</div>
<script type="text/javascript">
	// Get the modal
	var modal = document.getElementById('signin-modal');
	var form = document.getElementById('signup-form');

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
</script>
<?php
	
?>