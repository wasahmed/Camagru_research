<?php include('config/database.php');?>
<?php include('showimages.php');?>
<?php session_start(); ?>
<?php
	$currentuser = $_SESSION['username'];
	if(isset($_GET['img_id']) && isset($_POST['submitcomm'])){
        $img_id = $_GET['img_id'];
        $comment = $_POST['comments'];
        //echo $comment;
		$result = $conn->prepare("SELECT * from images WHERE post_id='$img_id' ");
		$result->execute();
		if($result->rowCount() == 1)
		{
            $update = $conn->prepare("INSERT INTO comments (post_id, comment, username) VALUES ('$img_id', '$comment' ,'$currentuser')");
            $update->execute();
            if ($update)
            {
                echo "<script>window.alert('comment inserted')</script>";
                header("refresh:0; url=home.php?link=1" );
            }      
        }else{
            die("somethings wrong");
        }
    }
?>