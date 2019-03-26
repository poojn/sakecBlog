<?php
session_start();
include("dbconnect.php");

$bid = $_GET['bid'];

$blogSelect = "SELECT b.*, u.u_username FROM `blogs` b, `users` u, `write` w WHERE b.b_id = $bid AND w.b_id = b.b_id AND w.u_id = u.u_id";

// echo "<p>".$blogSelect."</p>";

$blogs = $conn->query($blogSelect);
// $category = $conn->query($categorySelect);

if ($blogs->num_rows > 0) {
    // output data of each row
    while($row = $blogs->fetch_assoc()) {
    	$blogTitle = $row['b_title'];
    	$blogDate = $row['b_date'];
    	$blogContent = $row['b_content'];
    	// $blogVotes = $row['b_votes'];
    	$blogReadTime = $row['b_read_time'];
    	$blogCover = $row['b_cover'];
    	$blogWriter = $row['u_username'];
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Read Blog
	</title>
	<?php include('head.php');?>

</head>
<!-- onload="getSize()" onresize="getSize()" -->
<body onload="likeToggle(null, null)">

	<div id="screen-size" style="position: fixed; top: 0; left: 0; color: #000;background-color: #fff;padding: 0 3px ;z-index: 9999999999;">
		<p style="float: left; font-size: 10px;">
		    <span id="w">0</span><br />
		    <span id="h">0</span>
		</p>
	</div>

	<?php include('sakecBlogHead.php'); ?>

	<main class="row-aft">

		<section id="blog" class="col-blog">
			<h1 id="blog-title"><?php echo $blogTitle;?></h1>
			<h6 id="blog-date"><?php echo $blogDate;?></h6><!-- <br/>
			<h6 id="blog-read-time"><?php echo $blogReadTime;?> min read</h6> -->
			<div id="blog-content">
				<!-- <img src="Images/books.png"> -->
				<img src="data:image/jpeg;base64, <?php echo base64_encode($blogCover);?>">
				<?php echo $blogContent;?>

				<!-- <img src="Images/background1.jpg"> -->
				<br/><br/>
				<div id="blog-vote">
					<!-- <?php if($voted == 1) : ?><i class="fas fa-heart" id="like" onclick="likeToggle(<?php echo $bid.", ".$uid;?>)"></i>
					<?php elseif($voted == 0) : ?><i class="far fa-heart" id="dislike" onclick="likeToggle(<?php echo $bid.", ".$uid;?>)"></i>
					<?php else : ?><i class="far fa-heart" id="dislike"></i><?php endif; ?>
					<span id="total_votes"><?php echo $blogVotes;?></span> -->
					<i class="far fa-heart" id="dislike"></i>
				</div>
			</div>
			<div id="writer">by <?php echo $blogWriter;?></div>
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