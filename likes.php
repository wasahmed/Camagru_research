<?php include('config/database.php');?>
<?php
	if(isset($_GET['img_id'])){
		$img_id = $_GET['img_id'];
		$result = $conn->prepare("SELECT * from users WHERE img_id='$img_id' LIMIT 1");
		$result->execute();
		if($result->rowCount() == 1)
		{
			$update = $conn->prepare("UPDATE users SET verified=1 WHERE link='$link' LIMIT 1");   
			$update->execute();
				if ($update){
					echo "<b>verified account</b>";
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