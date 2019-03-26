<?php
session_start();
include("dbconnect.php");

if(isset($_SESSION['userName'])) {

	if(isset($_POST['writeSubmit'])) {

		$title = $_POST['writeTitle'];
		$cat = $_POST['writeCategory'];
		//$blog = "<script type='text/javascript'>document.getElementById('write-content').innerHTML;<script/>";
		$blog = $_POST['writeContent'];
		// $readTime = str_word_count($blog);
		$readTime = round(str_word_count($blog)/200) + 1;
		// echo $readTime;
		//echo ">".$blog;
		// $imgContent = addslashes(file_get_contents($_FILES['writeImage']['tmp_name']));




		/* $target_dir = "../uploads/";
	    $target_path = 	$target_dir.basename($_FILES['writeImage']['name']);     

	    //move_uploaded_file($_FILES['fileToUpload']['name'],$target_path);
	    if(move_uploaded_file($_FILES['writeImage']['name'],$target_path))
	    {
	        echo basename($_FILES['writeImage']['name']);
	    }
	    else
	    {
	        echo "Possible file upload attack!\n";
	    }
	        print_r($_FILES); */

		//storing of image

		$img = $_FILES['writeImage'];
		$imgName = $img['name'];
		if($imgName !== '') {

			$imgPath = $img['tmp_name'];
			//echo ">>".$imgPath;
			$imgType = $img['type'];
			$imgSize = $img['size'];
			

			$check = getimagesize($imgPath);
			// && $imgSize<=614400
			if($check !== FALSE && ($imgType="image/jpeg"||$imgType="image/png"||$imgType="image/gif")) {
				// $img = $_POST['writeImage'];
				//$img = LOAD_FILE('C:\Users\Public\Pictures\Sample%Pictures/Lighthouse.jpg');
	       		$imgContent = addslashes(file_get_contents($imgPath));
				//echo "<br> user ".$imgPath."<br>";
			}
			else{
				echo "Upload genuine picture not too big";
			}
		}
		else {
			$imgPath = 'Images\Default.png';			
       		$imgContent = addslashes(file_get_contents($imgPath));
			//echo "<br> def ".$imgPath."<br>";
		}


		//insert blog query

		// $blogInsert = $conn->prepare("INSERT INTO blogs VALUES ('', ?, ?, '', ?, '', ?, LOAD_FILE(?))");
		$blogInsert = $conn->prepare("INSERT INTO blogs(b_title, cat_id, b_content, b_read_time, b_cover) VALUES ( ?, ?, ?, ?, '$imgContent')");
		$blogInsert->bind_param("sisi", $title, $cat, $blog, $readTime);
		//s , $imgContent
	
		if($blogInsert->execute()) {
			$blogId = $conn->insert_id;
			//echo $_SESSION['userId']."+".$blogId."";
			// echo "INSERT INTO `write`(`u_id`, `b_id`) VALUES (".$_SESSION['userId'].", ".$blogId.")";

			$writeInsert = "INSERT INTO `write`(`u_id`, `b_id`) VALUES (".$_SESSION['userId'].", ".$blogId.")";
			if($conn->query($writeInsert) === TRUE) {
				//echo "<br />write updated";
				$blogDone = "Blog Uploaded succesfully";
				echo "<script type='text/javascript'>alert('".$blogDone."');</script>";
			}
			else {
				//echo "<br />write not updated ".$conn->error;
				$conn->query("DELETE FROM blogs WHERE b_id = ".$blogId."");				
				session_unset(); 
				session_destroy();
				$blogFail = "failed. something's off. seems like you are not registered with the database";
				echo "<script type='text/javascript'>alert('$blogFail');</script>";
			}

			
			//test display image after uploading
			//$result = $conn->query("SELECT b_cover FROM blogs WHERE b_id = ".$blogId."");
    
		    /* if($result->num_rows > 0){
		        $imgData = $result->fetch_assoc();
		        
		        //Render image
		        // header("Content-type: image/png"); 
		        // echo $imgData['b_cover'];
		        echo '<br/><img src="data:image/jpeg;base64,'.base64_encode($imgData['b_cover']).'">';
		        // echo "<br><br>".$imgData['b_cover'];
		    }else{
		        echo 'Image not found...';
		    } */

		}
		else {
			echo "#".$blogInsert->errno;
			$blogFail = "failed. something's off.";
			echo "<script type='text/javascript'>alert('$blogFail');</script>";
		}
		
	}
	
}

if(isset($_SERVER['HTTP_REFERER'])) {
	header("Location: {$_SERVER['HTTP_REFERER']}");
}
else {
	header("Location: index.php");
}
?>