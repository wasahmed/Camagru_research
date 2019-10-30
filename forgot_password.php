<html>
<head>
    <title>Camagru: Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
            <h2>Forgot Password</h2>
            <div>
                <form action="" method="post">
                    <div class="textbox">
                        <input type="email" placeholder="Email" name="e" value="" required/>
                    </div>

                    <button type="submit" name="forgot" class="btn"> Send e-mail </button>
                <p>Not registered?  <a href="register.php">Sign Up</a></p>
                </form>
            </div>
<body>
</html>
            

<?php
  if(isset($_POST['forgot'])){
      try {
          $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "654321");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "connection error: " . $e;
        }
        
        $email = $_POST['e'];
        
        $checkemail = $conn->prepare("SELECT * FROM users WHERE email='$email' LIMIT 1");
        $checkemail->execute();
        $rows = $checkemail->rowCount();
        if ($rows)
        {
            $row = $checkemail->fetchAll();
            $exists = $row[0]['email'];
            if ($exists){
            $to      = $email;
            $subject = 'password reset';
            $message = "<a href='http://localhost:8080/camagru_research/resetpasswd.php'>Reset Password</a>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <bikad58028@mailnet.top>' . "\r\n";
        }
        else {
            echo "somethings wrong";
        }
        if(mail($to, $subject, $message, $headers))
            echo "A a link to reset your password has been sent to $email";
    }
}
?>