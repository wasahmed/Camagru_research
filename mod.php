<?php include('config/database.php');?>
<?php
	session_start();
	$sessionuser = $_SESSION['username'];
	if(isset($_POST['new_password'])){
		if ($_POST['new_password'] !== '') {
			$newpassword = md5($_POST['new_password']);
			// $sessionuser = $_SESSION['username'];
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
				echo $sessionuser;
				echo "error changing password <br/>";
			}
			}
}
else{
	die("reset link not clicked");
}
if(isset($_POST['new_email'])){
	if ($_POST['new_email'] !== '') {
	$newemail = $_POST['new_email'];
	// $sessionuser = $_SESSION['username'];
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
		echo "error changing email <br/>";
	}
}
}
	if(isset($_POST['new_username'])){
		if ($_POST['new_username'] !== '') {
        $newusername = $_POST['new_username'];
        // $sessionuser = $_SESSION['username'];
		$result = $conn->prepare("SELECT * from users WHERE username='$sessionuser' LIMIT 1");
        $result->execute();
		if($result->rowCount() == 1)
		{
			$update = $conn->prepare("UPDATE users SET username='$newusername' WHERE username='$sessionuser' LIMIT 1");   
			$update->execute();
				if ($update){
					// $_SESSION['username'] = $sessionuser;
					echo "<script>window.alert('Username changed')</script>";
					header( "refresh:0; url=home.php" );
				}
		}else{
			echo "error changing username <br/>";
		}
	}
    }
    else{
		die("reset link not clicked");
	}
	if (isset($_POST['check1']))
	{
		$notify = $conn->prepare("UPDATE users SET notify=1");   
		$notify->execute();
		if ($notify){
			echo "<script>window.alert('Preference changed')</script>";
			header( "refresh:0; url=home.php" );
		}
	}
	if (isset($_POST['check2']))
	{
		$notify = $conn->prepare("UPDATE users SET notify=0");   
		$notify->execute();
		if ($notify){
			echo "<script>window.alert('Preference changed')</script>";
			header( "refresh:0; url=home.php" );
		}
	}
?>