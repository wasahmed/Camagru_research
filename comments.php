<?php include('config/setup.php');?>

<?php session_start(); ?>
<?php
	$currentuser = $_SESSION['username'];
	if(isset($_GET['img_id']) && isset($_POST['submitcomm'])){
        $img_id = $_GET['img_id'];
        $comment = $_POST['comments'];
		$result = $conn->prepare("SELECT * from images WHERE post_id='$img_id' ");
		$result->execute();
		if($result->rowCount() == 1)
		{
            $update = $conn->prepare("INSERT INTO comments (post_id, comment, username) VALUES ('$img_id', '$comment' ,'$currentuser')");
            $update->execute();
            if ($update)
            {
                echo "<script>window.alert('comment inserted')</script>";
            }      
        }else{
            die("somethings wrong");
        }
    }
    $get_owner = $conn->prepare("SELECT uploaded_by from images where post_id='$img_id'");
    $get_owner->execute();
    $owner = $get_owner->fetch();
    $user = $owner['uploaded_by'];


    $email = $conn->prepare("SELECT email from users where username='$user'");
    $email->execute();
    $emailaddress = $email->fetch();
    $sendemailto = $emailaddress['email'];


    $preference = $conn->prepare("SELECT notify from users where username='$user'");
    $preference->execute();
    $notification_setting = $preference->fetch();
    $notify = $notification_setting['notify'];

    if ($notify == 1)
    {
        $to      = $sendemailto;
            $subject = 'comments';
            $message = "someone has commented on your post";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <camagru>' . "\r\n";
            if(mail($to, $subject, $message, $headers))
            
            
            echo "<script>window.alert('notification email sent')</script>";
            header("refresh:0; url=home.php?link=1" );
    }
    else
    {
        header("refresh:0; url=home.php?link=1" );
    }

?>