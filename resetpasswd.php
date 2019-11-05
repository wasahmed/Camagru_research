<!DOCTYPE html >
<html>
<head>
    <title>Camagru: Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
            <h2>Reset Password</h2>
            <div>
                <form action="" method="post">
                    <div class="textbox">
                        <input type="text" placeholder="new password" name="new" value="" required/>
                    </div>

                    <button type="submit" name="new_p" class="btn"> Set password </button>
                <p>Not registered?  <a href="register.php">Sign Up</a></p>
                </form>
            </div>
<body>
</html>
<?php
	if(isset($_GET['link']) and isset($_POST['new_p'])){
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
        $new = $_POST['new'];
        $new = md5($new);
		if($result->rowCount() == 1)
		{
			$update = $conn->prepare("UPDATE users SET passwd='$new' WHERE link='$link' LIMIT 1");   
			$update->execute();
				if ($update){
					echo "<b>password reset</b>";
				}
		}else{
			echo "email not found";
		}
	}else{
		die("reset link not clicked");
	}
?>