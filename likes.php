<?php include('config/setup.php');?>
<?php include('showimages.php');?>
<?php session_start(); ?>
<?php
	$currentuser = $_SESSION['username'];
	if(isset($_GET['img_id'])){
		$img_id = $_GET['img_id'];
		$result = $conn->prepare("SELECT * from likes WHERE post_id='$img_id' AND username='$currentuser'");
		$result->execute();
		if($result->rowCount() == 1)
		{
			echo "<script>window.alert('liked already')</script>";
			header("refresh:0; url=home.php?link=1" );
			// // $update->execute();
			// // 	if ($update){
				// // 		echo "<b>verified account</b>";
				// // 	}
			}else{
				//echo "not liked";
				$update = $conn->prepare("INSERT INTO likes (post_id, username) VALUES ('$img_id', '$currentuser')");
				$update->execute();
				if ($update)
				{
					echo "<script>window.alert('liked:)')</script>";
					header("refresh:0; url=home.php?link=1" );
				}   
		}
	}else{
		die("somethings wrong");
	}
?>
