<?php 
session_start();
if (isset($_SESSION['userName'])) {

}
else{
	if(isset($_SERVER['HTTP_REFERER'])) {
		header("Location: {$_SERVER['HTTP_REFERER']}");
	}
	else {
		header("Location: index.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Write Blog
	</title>
<!-- 	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">
	<script src="main.js"></script>
	<link rel="icon" href="Images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<?php include('head.php');?>
	
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

		<form action="uploadBlog.php" method="post" id="writeblog" enctype="multipart/form-data">
			Title
			<input type="text" name="writeTitle" id="write-title">
			<select id="write-category" name="writeCategory">
				<option selected value="1">Technology</option>
				<option value="2">Entertainment</option>
				<option value="3">Literature</option>
				<option value="4">Politics</option>
				<option value="5">Social</option>
				<option value="6">Sports</option>
			</select>
			Content
			<textarea placeholder="blog here..." id="write-content" name="writeContent"></textarea>
			Add Image
			<input type="file" name="writeImage" id="write-image">
			<input type="submit" name="writeSubmit" id="write-submit" value="submit">
		</form>

	</main>

	<?php include('sakecBlogFoot.php'); ?>

</body>
</html>