<?php
session_start();	


include("dbconnect.php");	

if(isset($_POST["LogIn"])) {

	//LOG IN

	$uname = $_POST["uname"];
	$pass = $_POST["password"];

	$logSelect = $conn->prepare("SELECT u_id, u_password FROM users WHERE u_username = ?");
	$logSelect->bind_param("s", $uname);
	// $logSelect->execute();
	// $logResult = $logSelect->get_result();
	// $logRow = $logresult->fetchAssoc();
	// $passh = $logRow["u_password"];
	// $uId = $logRow["u_id"];
	
	if ($logSelect->execute()) {
		$logResult = $logSelect->get_result();
		$logRow = $logResult->fetch_assoc();
		$passh = $logRow["u_password"];
		$uid = $logRow["u_id"];

		if (password_verify($pass, $passh)) {
			$logDone = "You have been Logged In.";
			echo "<script type='text/javascript'>alert('".$logDone."');</script>";

			$_SESSION['userName'] = $uname;
			$_SESSION['userId'] = $uid;
		}
		else {
			$logFail = "Incorrect Login.";
			echo "<script type='text/javascript'>alert('".$logFail."');</script>";
		}
	}
	else {
		echo $logSelect->errno;
	}

	$logSelect->close();

}

elseif (isset($_POST['SignUp'])) {

	//SIGN UP

	//set parameters
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST["uname"];
	$gender = $_POST["gender"];
	$number = $_POST["number"];
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$passh = password_hash($pass, PASSWORD_DEFAULT);

	echo "'$fname','$lname','uname','$gender',$number,'$email','$passh'";

	//prepare and bind
	$signInsert = $conn->prepare("INSERT INTO `users`(`u_fname`, `u_lname`, `u_username`, `u_gender`, `u_phone`, `u_email`, `u_password`) VALUES( ?, ?, ?, ?, ?, ?, ?)");
	$signInsert->bind_param("ssssiss", $fname, $lname, $uname, $gender, $number, $email, $passh);
	// mysqli_query($conn, "INSERT INTO users VALUES ('','$fname','$lname','$uname','$gender',$number,'$email','$passh')") or die("Could not Sign Up");
	// echo "<script type='text/javascript'>alert('$message');</script>"; mysql_error()

	//execute
	// $signInsert->execute();

	//check errors
	if($signInsert->execute()) {
		$signDone = "You have been Signed Up.";
		echo "<script type='text/javascript'>alert('".$signDone."');</script>";
		$uid = $conn->insert_id;

		$_SESSION['userName'] = $uname;
		$_SESSION['userId'] = $uid;
	}
	else{
		echo $signInsert->errno;
		$signFail = "failed. something's off.";
		echo "<script type='text/javascript'>alert('".$signFail."');</script>";
	}

	$signInsert->close();

}
// else {
// 	$message = "something's off";
// 	echo "<script type='text/javascript'>alert('$message');</script>";
// }

//return to previous page
// echo "\n".$_SERVER['HTTP_REFERER'];
if(isset($_SERVER['HTTP_REFERER'])) {
	header("Location: {$_SERVER['HTTP_REFERER']}");
}
else {
	header("Location: index.php");
}
// header("Location: ".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']);
?>