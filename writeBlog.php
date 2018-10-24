<?php 
session_start();
// if(isset()) {}
// else{
// 	header()
// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Write Blog
	</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">
	<script src="main.js"></script>
	<link rel="icon" href="Images/favicon.ico" type="image/x-icon">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style type="text/css">
		main *{
			display: block;
		}
	</style>

</head>

<body onload="getSize()" onresize="getSize()">

	<div id="screen-size" style="position: fixed; top: 0; left: 0; color: #000;background-color: #fff;padding: 0 3px ;z-index: 9999999999;">
		<p style="float: left; font-size: 10px;">
		    <span id="w">0</span><br />
		    <span id="h">0</span>
		</p>
	</div>

	<?php include('sakecBlogHead.php'); ?>

	<main class="row-aft">

		<form action="#" method="">
			Title
			<input type="text" name="title">
			<select>
				<option>Technology</option>
				<option>Entertainment</option>
				<option>Politics</option>
			</select>
			Content
			<textarea placeholder="blog here..."></textarea>
			Image
			<input type="file" name="image">
			<input type="button" name="submit" value="submit">
		</form>

	</main>

	<?php include('sakecBlogFoot.php'); ?>

</body>
</html>