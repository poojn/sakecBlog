<?php
session_start();
if (isset($_SESSION['userName'])) {
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		SakecBlog
	</title>

	<?php include('head.php');?>
	
	<script type="text/javascript">
	
		
		// document.getElementsByTagName('nav')[0].getElementsByTagName('a')[1].className +="nav-active";
		
		var signModal = document.getElementById('signin-modal');
		// var form = document.getElementById('signup-form');
		var signin = document.getElementById("signin");
		signin.onclick = function() {
		    signModal.style.display = "block";
		}
		window.onclick = function(event) {
		    if (event.target == signModal) {
		        signModal.style.display = "none";
		    }
		}
		
		function readBlog(bid) {
			// var url = window.location.href;
			// alert(bid);
			var url = "http://localhost/BLOG/readBlog.php?bid=" + bid;
			// window.open(url, "_self");
			// alert(url);
			var win = window.open(url, "_blank");
			win.focus();
		}

	</script>

</head>
<!-- onload="getSize()" onresize="getSize()" -->
<body onload="filterBlogs()">

	<div id="screen-size" style="position: fixed; top: 0; left: 0; color: #000;background-color: #fff;padding: 0 3px ;z-index: 9999999999;">
		<p style="float: left; font-size: 10px;">
		    <span id="w">0</span><br />
		    <span id="h">0</span>
		</p>
	</div>

	<?php include('sakecBlogHead.php'); ?>

	<main class="row-aft">

		<section id="poster" class="col-mid">
				<!-- <img src="Images/books.png"> -->
				<span id="readIdeas">read ideas</span>
				<span id="getIdeas">get ideas</span>
				<span id="shareIdeas">share ideas</span>
		</section>

		<form id="category-filter" class="col-mid">
			<div><input type="checkbox" name="category" id="technology" value="1" onclick="filterBlogs()">Technology</div>
			<div><input type="checkbox" name="category" id="politics" value="4" onclick="filterBlogs()">Politics</div>
			<div><input type="checkbox" name="category" id="entertainment" value="2" onclick="filterBlogs()">Entertainment</div>
			<div><input type="checkbox" name="category" id="social" value="5" onclick="filterBlogs()">Social</div>
			<div><input type="checkbox" name="category" id="literature" value="3" onclick="filterBlogs()">Literature</div>
			<div><input type="checkbox" name="category" id="sports" value="6" onclick="filterBlogs()">Sports</div>
		</form>

		<div id="sort-select" class="col-5">
		 	Sort by
			<select onchange="filterBlogs()">
			 	<option value="v">Votes</option>
			 	<option value="l">Latest</option>
			 	<option value="o">Oldest</option>
			</select>
		</div>

		<div id="reading-time" class="col-7">
			How long? <span>1 <input type="range" name="reading-time" min="1" max="14" step="2" onchange="filterBlogs()"> 14 min</span>
		</div>
		<section id="displayBlogs" class="slab row-aft col-12">
<!-- 		<section class="slab row-aft col-12">
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
							<div class="card-read-more">Read more</div>
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
						</div>
					</article>
				</div>
			</div>
		</section> -->
		</section>
			

	</main>

	<?php include('sakecBlogFoot.php'); ?>

</body>
</html>