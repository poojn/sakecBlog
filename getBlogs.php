<?php

include("dbconnect.php");

$cats = $_GET['cats'];
$sortBy = $_GET['sortBy'];
// echo "here".$cats."there";
$readTime =$_GET['readTime'];

// echo $cats."<br/>";
$catIds = explode(' ', $cats);
// print_r($catIds);

// $cats = "AND b.cat_id = c.cat_id AND ";
$cats = 'AND';
// echo $cats;


foreach ($catIds as $key => $id ) {
	if($key){		
		$cats = $cats." OR b.cat_id = $id";
	}
}

// echo strpos($cats, "b.cat_id = OR");
$cats = str_replace("AND OR", "AND", $cats);
// echo "<br><br>".$cats."<br><br>";
if ($cats == 'AND') {
	$cats = null;
}

if($sortBy == 'v') {
	$sortBy = 'ORDER BY b.cat_id, b.b_votes DESC, b.b_date DESC';
}
elseif($sortBy == 'l') {
	$sortBy = 'ORDER BY b.cat_id, b.b_date DESC, b.b_votes DESC';
}
else{
	$sortBy = 'ORDER BY b.cat_id, b.b_date ASC, b.b_votes DESC';
}

// GROUP BY b.cat_id 
$blogSelect = "SELECT * FROM `blogs` b WHERE b.b_read_time <= $readTime $cats $sortBy";
$categorySelect = "SELECT * FROM `category` ORDER BY cat_id ASC";

// echo "<p>".$blogSelect."</p>";
// echo "<p>".$categorySelect."<p/>";

$blogs = $conn->query($blogSelect);
$category = $conn->query($categorySelect);

$catId = array();
$catName = array();
while($list = $category->fetch_assoc()) {
	array_push($catId, $list['cat_id']);
	array_push($catName, $list['cat_name']);
}
// print_r($catName);

function getCatName($id) {
	global $catId;
	global $catName;
	for ($i=0; $i < count($catId); $i++) {
		if ($catId[$i] == $id) {
			return $catName[$i];
		}
	}
	return "Title: Unknown";
}


if ($blogs->num_rows > 0) {
	$section = 0;
    // output data of each row
    while($row = $blogs->fetch_assoc()) {

    	if($section != 0 && $section != $row['cat_id']) {
    		echo '
		    			</div>
				</section>
    		';
    	}

    	if($section != $row['cat_id']) {
    		$section = $row['cat_id'];
    		echo '
    		<section class="slab row-aft col-12">
			<h2 class="slab-title col-12">'.getCatName($row["cat_id"]).'</h2>		
			<div class="cards-wrapper col-12">
			';
    	}

    	echo '
    		<div class="card-space col-4">
				<article class="card" onclick="readBlog('.$row['b_id'].')">
					<div class="card-top">
						<div class="card-pic"><img src="data:image/jpeg;base64,'.base64_encode($row['b_cover']).'"></div>
						<div class="card-title">'.$row['b_title'].'</div>
					</div>
					<div class="card-down">
						<div class="card-summary">'.substr($row['b_content'], 0, 90).' ... </div>
						<div class="card-time">'.$row['b_read_time'].'min read</div>
					</div>
				</article>
			</div>
    	';

    }

    echo '
    			</div>
		</section>
	';

} else {
    echo "0 results";
}

/* echo '
	<script type="text/javascript">
	function readBlog(bid) {
		// var url = window.location.href;
		alert(bid);
		var url = "http://localhost/BLOG/readBlog.php?bid=" + bid;
		// window.open(url, "_self");
		alert(url);
		var win = window.open(url, "_blank");
		win.focus();
	}
	</script>
'; */
// echo "reached this point<br/>".$cats."<br/>".$sortBy."<br/>".$readTime."<br/>".$blogSelect."";
//95 characters ...
?>