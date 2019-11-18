<?php include('config/database.php');?>
<?php
	if(isset($_GET['link'])){
		$link = $_GET['link'];
		$result = $conn->prepare("SELECT * from users WHERE link='$link' LIMIT 1");
		$result->execute();
		if($result->rowCount() == 1)
		{
			$update = $conn->prepare("UPDATE users SET verified=1 WHERE link='$link' LIMIT 1");   
			$update->execute();
				if ($update){
					echo "<script>window.alert('Account verified')</script>";
            		header("refresh:0; url=index.php" );
				}
		}else{
			echo "damn";
		}
	}else{
		die("somethings wrong");
	}
?>
<html>
<head>
	<link href="style.css" rel="stylesheet"/>
</head>
<body>
	<a href="index.php">Sign In</a>
</body>
</html>