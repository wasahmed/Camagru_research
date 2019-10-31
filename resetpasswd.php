<?php
	if(isset($_GET['link'])){
		$link = $_GET['link'];
        $email = $_POST['e'];
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
        $new = "a";
        $new = md5($new);
        echo "here";
		if($result->rowCount() == 1)
		{
			$update = $conn->prepare("UPDATE users SET passwd='$new' WHERE link='$link' LIMIT 1");   
			$update->execute();
				if ($update){
					echo "<b>password reset</b>";
				}
		}else{
			echo "damn";
		}
	}else{
		die("somethings wrong");
	}
?>