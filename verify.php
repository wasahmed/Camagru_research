<?php
	if(isset($_GET['link'])){
		$link = $_GET['link'];
		try {
			$conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "654321");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "connection error: " . $e;
		}
		$result = $conn->prepare("SELECT * from users WHERE link='$link' LIMIT 1");
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