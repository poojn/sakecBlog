<?php
session_start();
// if (isset(var)) {
// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Read Blog
	</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">
	<script src="main.js"></script>
	<link rel="icon" href="Images/favicon.ico" type="image/x-icon">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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

		<section id="blog" class="col-blog">
			<h1 id="blog-title">TITLE</h1>
			<h6 id="blog-time">12/06/03</h6>
			<div id="blog-content">
				<!-- <img src="Images/books.png"> -->
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				v<br/><br/>drt
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun

				<img src="Images/background1.jpg">

				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				<br/><br/>drt
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun

				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				<br/><br/>drt
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun

				Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
				<div id="blog-vote">
					<i class="far fa-heart"></i>
					<i class="fas fa-heart"></i>
					<span id="total_votes">13</span>
				</div>
			</div>
			<div id="writer">by Test Blogger</div>
			<div id="comments-zone">
				<h3>Comments</h3>
				<div class="comment-box"><span class="commenter" onclick="profile(Tester)">Tester</span><br/><span class="comment">Lorem ipsum dolor amet</span></div>
			</div>
		</section>

		<aside id="suggestions" class="col-sug">
			<h3>Suggested</h3>


			<div class="card-space col-card-space">
				<article class="card">
					<div class="card-top">
						<div class="card-pic"><img src="Images/books.png"></div>
						<div class="card-summary-suggestion">
							Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
						</div>
						<div class="card-title">Battles sdfgj</div>
					</div>
				</article>
			</div>

			<div class="card-space col-card-space">
				<article class="card">
					<div class="card-top">
						<div class="card-pic"><img src="Images/pic1.jpg"></div>
						<div class="card-summary-suggestion">
							Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
						</div>
						<div class="card-title">Battles sdfgj</div>
					</div>
				</article>
			</div>

			<div class="card-space col-card-space">
				<article class="card">
					<div class="card-top">
						<div class="card-pic"><img src="Images/Default.png"></div>
						<div class="card-summary-suggestion">
							Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
						</div>
						<div class="card-title">Battles sdfgj</div>
					</div>
				</article>
			</div>

			<div class="card-space col-card-space">
				<article class="card">
					<div class="card-top">
						<div class="card-pic"><img src="Images/download.png"></div>
						<div class="card-summary-suggestion">
							Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun
						</div>
						<div class="card-title">Battles sdfgj</div>
					</div>
				</article>
			</div>

		</aside>

	</main>

	<?php include('sakecBlogFoot.php'); ?>

</body>
</html>