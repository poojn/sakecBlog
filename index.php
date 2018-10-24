<?php
session_start();
// if (isset(var)) {
// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		SakecBlog
	</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main.css">
	<script src="main.js"></script>
	<link rel="icon" href="Images/favicon.ico" type="image/x-icon">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script type="text/javascript">
		
		var modal = document.getElementById('signin-modal');
		var form = document.getElementById('signup-form');
		var btn = document.getElementById("signin");
		btn.onclick = function() {
		    modal.style.display = "block";
		}
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}

	</script>

</head>

<body onload="getSize()" onresize="getSize()">

	<div id="screen-size" style="position: fixed; top: 0; left: 0; color: #000;background-color: #fff;padding: 0 3px ;z-index: 9999999999;">
		<p style="float: left; font-size: 10px;">
		    <span id="w">0</span><br />
		    <span id="h">0</span>
		</p>
	</div>

	<?php include('sakecBlogHead.php'); ?>

	<!-- <div id="head-full" class="row-aft">
		<header class="row-aft">
			<div id="logo">S</div>
			<div id="site-name">akecBlog</div>
			<nav class="nav">
				<a href="#" class="nav-active">Home</a>
				<a href="#">About Us</a>
				<a href="#">Sign In</a>
				<a href="javascript:void(0);" class="icon" onclick="navHam()"><i class="fa fa-bars"></i></a>
			</nav>
		</header>
	</div> -->

	<main class="row-aft">

		<section id="poster" class="col-mid">
				<!-- <img src="Images/books.png"> -->
				<span id="readIdeas">read ideas</span>
				<span id="getIdeas">get ideas</span>
				<span id="shareIdeas">share ideas</span>
		</section>

		<!-- <form id="category-filter" class="col-6" action="#" method="">
			<input type="checkbox" name="category" value="technology" id="technology"><label for="technology">Technology</label>
			<input type="checkbox" name="category" value="politics" id="politics"><label for="politics">Politics</label>
			<input type="checkbox" name="category" value="entertainment" id="entertainment"><label for="entertainment">Entertainment</label>
			<input type="checkbox" name="category" value="social" id="social"><label for="social">Social</label>
			<input type="checkbox" name="category" value="literature" id="literature"><label for="literature">Literature</label>
			<input type="checkbox" name="category" value="sports" id="sports"><label for="sports">Sports</label>
			How long? 0<input type="range" name="reading-Time" min="0" max="15" step="3">15 min
			<input type="submit" value="Get going">
		</form> -->

		<form id="category-filter" class="col-mid">
			<div id="technology"><input type="checkbox" name="category" value="technology" onclick="">Technology</div>
			<div id="politics"><input type="checkbox" name="category" value="politics">Politics</div>
			<div id="entertainment"><input type="checkbox" name="category" value="entertainment">Entertainment</div>
			<div id="social"><input type="checkbox" name="category" value="social">Social</div>
			<div id="literature"><input type="checkbox" name="category" value="literature">Literature</div>
			<div id="sports"><input type="checkbox" name="category" value="sports">Sports</div>
	<!-- 		<div id="reading-time">How long? 0<input type="range" name="reading-time" min="0" max="15" step="3">15 min</div>-->
			<!-- <input type="submit" value="Get going"> -->
		</form>

		<!-- <div id="sort-by" class="col-12"> -->
		<div id="sort-select" class="col-5">
		 	Sort by
			<select>
			 	<option value="votes">Votes</option>
			 	<option value="shortest">Shortest</option>
			 	<option value="longest">Longest</option>
			</select>
		</div>

		<div id="reading-time" class="col-7">
			How long? <span>0 <input type="range" name="reading-time" min="0" max="15" step="3"> 15 min</span>
		</div>
		<!-- </div> -->

		<section class="slab row-aft col-12">
			<h2 class="slab-title col-12">Technology</h2>		
			<div class="cards-wrapper col-12">

				<div class="card-space col-4">
					<article class="card">
						<div class="card-top">
							<div class="card-pic"><img src="Images/pic1.jpg"></div>
							<div class="card-title">Battles</div>
						</div>
						<div class="card-down">
							<div class="card-summary">Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun </div>
							<div class="card-time">5min read</div>
							<!-- <div class="card-read-more">Read more</div> -->
						</div>
					</article>
				</div>

				<div class="card-space col-4">
					<article class="card">
						<div class="card-top">
							<div class="card-pic"><img src="Images/download.png"></div>
							<div class="card-title">SAKEC</div>
						</div>
						<div class="card-down">
							<div class="card-summary">Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun </div>
							<div class="card-time">5min read</div>
							<!-- <div class="card-read-more">Read more</div> -->
						</div>
					</article>
				</div>

				<div class="card-space col-4">
					<article class="card">
						<div class="card-top">
							<div class="card-pic"><img src="Images/Default.png"></div>
							<div class="card-title">Library of BOOKS</div>
						</div>
						<div class="card-down">
							<div class="card-summary">Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun </div>
							<div class="card-time">5min read</div>
							<!-- <div class="card-read-more">Read more</div> -->
						</div>
					</article>
				</div>

				<div class="card-space col-4">
					<article class="card">
						<div class="card-top">
							<div class="card-pic"><img src="Images/pic1.jpg"></div>
							<div class="card-title">Part 2:</div>
						</div>
						<div class="card-down">
							<div class="card-summary">Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun </div>
							<div class="card-time">5min read</div>
						</div>
					</article>
				</div>

				<div class="card-space col-4">
					<article class="card">
						<div class="card-top">
							<div class="card-pic"><img src="Images/books.png"></div>
							<div class="card-title">Library of BOOKS</div>
						</div>
						<div class="card-down">
							<div class="card-summary">Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun </div>
							<div class="card-time">5min read</div>
							<!-- <div class="card-read-more">Read more</div> -->
						</div>
					</article>
				</div>

				<div class="card-space col-4">
					<article class="card">
						<div class="card-top">
							<div class="card-pic"><img src="Images/download.png"></div>
							<div class="card-title">SAKEC</div>
						</div>
						<div class="card-down">
							<div class="card-summary">Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun Lorem Ipsum dolor amet sun </div>
							<div class="card-time">5min read</div>
							<!-- <div class="card-read-more">Read more</div> -->
						</div>
					</article>
				</div>

			</div>
		</section>

	</main>

	<?php include('sakecBlogFoot.php'); ?>

	<!-- <div id="foot-full" class="row-bef">
		<footer class="row-aft" id="foot">
			<div id="copyright">@You can Copy this, 2018</div>
			<section id="footer-by">
				<a href="#">geetanjali</a>
				<a href="#">pundrik</a>
				<a href="#">poojan</a>
			</section>
		</footer>
	</div> -->

</body>
</html>