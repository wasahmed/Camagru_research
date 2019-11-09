<?php
    session_start();
    try {
        $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "654321");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "connection error: " . $e;
    }
	if(isset($_POST['new_username'])){
        $newusername = $_POST['new_username'];
        $sessionuser = $_SESSION['username'];
		$result = $conn->prepare("SELECT * from users WHERE username='$sessionuser' LIMIT 1");
        $result->execute();
		if($result->rowCount() == 1)
		{
			$update = $conn->prepare("UPDATE users SET username='$newusername' WHERE username='$sessionuser' LIMIT 1");   
			$update->execute();
				if ($update){
					echo "<b>username changed</b>";
				}
		}else{
			echo "error";
		}
    }
    // else{
	// 	die("reset link not clicked");
    // }
    if(isset($_POST['new_password'])){
			if ($_POST['new_password'] !== '') {
        $newpassword = md5($_POST['new_password']);
				$sessionuser = $_SESSION['username'];
				$result = $conn->prepare("SELECT * from users WHERE username='$sessionuser' LIMIT 1");
        $result->execute();
				if($result->rowCount() == 1)
				{
					$update = $conn->prepare("UPDATE users SET passwd='$newpassword' WHERE username='$sessionuser' LIMIT 1");   
					$update->execute();
						if ($update){
							echo "<b>password changed</b>";
						}
				}else{
					echo "error";
				}
				}
    }
    else{
		die("reset link not clicked");
    }
    if(isset($_POST['new_email'])){
        $newemail = $_POST['new_email'];
        $sessionuser = $_SESSION['username'];
		$result = $conn->prepare("SELECT * from users WHERE username='$sessionuser' LIMIT 1");
        $result->execute();
		if($result->rowCount() == 1)
		{
			$update = $conn->prepare("UPDATE users SET email='$newemail' WHERE username='$sessionuser' LIMIT 1");   
			$update->execute();
				if ($update){
					echo "<b>email changed</b>";
				}
		}else{
			echo "error";
		}
    }
    else{
		die("reset link not clicked");
	}
?>