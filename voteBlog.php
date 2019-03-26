<?php
session_start();
include("dbconnect.php");

$bid = $_GET['bid'];
$toggle = $_GET['toggle'];

if(isset($_SESSION['userId'])) {
	$voteSelect = 'SELECT count(v.u_id), b.votes FROM `vote` v, `blogs` b WHERE v.b_id = '.$bid.' AND b.b_id = '.$bid.' AND v.u_id = '.$_SESSION['userId'].'';
	// echo $voteSelect;
	$votes = $conn->query($voteSelect);
	if($votes->num_rows > 0) {
		$voted = $votes->fetch_assoc()['count(v.u_id)'];		
    	$blogVotes = $votes->fetch_assoc()['b_votes'];
		// echo $voted;
	}
	if($toggle == null) {
		$toggle = 0;
	}
}
else {
	$voted = null;
	$toggle = null;
}

if ($toggle == 1) {

	if($voted == 1) {
		if($conn->query("DELETE FROM `vote` WHERE u_id = ".$_SESSION['userId']." AND b_id = ".$bid."")) {
			echo '
				<i class="far fa-heart" id="dislike" onclick="likeToggle('.$bid.', '.$uid.', 1)"></i>
				';
		}
	}
	elseif ($voted == 0) {
		if($conn->query("INSERT INTO `vote` VALUES (".$_SESSION['userId'].", ".$bid.")")) {
			echo '
				<i class="fas fa-heart" id="like" onclick="likeToggle('.$bid.', '.$uid.', 1)"></i>
				';
		}
	}
	else {
		echo '
				<i class="far fa-heart" id="dislike"></i>
				';
	}
}
elseif ($toggle == 0) {
	if($voted == 1) {
		echo '
			<i class="fas fa-heart" id="like" onclick="likeToggle('.$bid.', '.$uid.', 1)"></i>
			';
	}
	elseif ($voted == 0) {
		echo '
			<i class="far fa-heart" id="dislike" onclick="likeToggle('.$bid.', '.$uid.', 1)"></i>
			';
}
	else {
		echo '
			<i class="far fa-heart" id="dislike"></i>
			';
	}
}
else {
	echo '
		<i class="far fa-heart" id="dislike"></i>
		';
}

echo '
	<span id="total_votes">'.$blogVotes.'</span>
	';
?>