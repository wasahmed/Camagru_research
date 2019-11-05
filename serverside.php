<?php

session_start();

if(isset($_POST['register'])){
    
    $username = "";
    $password = "";
    $errors = array();

//////connecting to db/////////////////////////////////////////////////////////////
    try {
        $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "654321");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "connection error: " . $e;
    }
///////////////////////////////////////////////////////////////////////////////////

////////register users, retrieve form information//////////////////////////////////
    //mysli_real_escape_string??
    $username =  $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1']; 
    $password_2 = $_POST['password_2'];
/////////////////////////////////////////////////////////////////////////////////////


///////form validation////////////////////////////////////////////////////////////////
    if(empty($username)) {array_push($errors, "Username is required");}
    if(empty($email)) {array_push($errors, "Email is required");}
    if(empty($password_1)) {array_push($errors, "Password is required");}
    if($password_2 != $password_1) {array_push($errors, "Passwords do not match");}
//////////////////////////////////////////////////////////////////////////////////////

////////unique usernames or email////////////////////////////////////////////////////////////////////////// 
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1");
    $stmt->execute();
    $user = $stmt->fetchAll();
    if ($user)
    {
        if ($user[0]['username'] === $username){array_push($errors, "Username taken");}
        if ($user[0]['email'] === $email){array_push($errors, "email used");}
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    $link = md5(time().$username);
    $password = md5($password_1);



//////register user if no errors/////////////////////////////////////////////////////////////////////////////////////////
    if (count($errors) == 0){
        //$password = md5($password_1);
        $sql = $conn->prepare("INSERT INTO users (username, email, passwd, link) VALUES ('$username', '$email', '$password', '$link')");
        $sql->execute();
        if ($sql){
            $to      = $email;
            $subject = 'the subject';
            $message = "<a href='http://localhost:8080/camagru_research/verify.php?link=$link'>Confirm Account</a>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <bikad58028@mailnet.top>' . "\r\n";


        if(mail($to, $subject, $message, $headers))
            echo "A verification email has been sent to $email";
        }
        
        //$_SESSION['username'] = $username;
        //$_SESSION['success'] = "You are now logged in";
        $conn->NULL;
        //header('location: test.php');
        // echo "A verification email has been sent to $email";
        // echo "<p>confirmed account?".'<a href="index.php">Link</a>';
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}


///login/////////////////////////////////////////////////


if(isset($_POST['login'])){
    try {
        $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "654321");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "connection error: " . $e;
    }

    $username1 =  $_POST['username'];
    $password1 =  $_POST['password_1'];

if (empty($username1)){array_push($errors, "Username required");}
if (empty($password1)){array_push($errors, "Password required");}

if(count($errors) == 0){
    $password1 = md5($password1);
    $lq = $conn->prepare("SELECT * FROM users WHERE username = '$username1' and passwd='$password1' LIMIT 1");
    $lq->execute();
    $rows = $lq->rowCount();
    if ($rows)
    {
        $row = $lq->fetchAll();
        $verified = $row[0]['verified'];
        if ($verified == 1)
        {
            echo "WELCOME";
        }
        else {
            echo "not verified";
        }
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "logged in successfuly";
        header('location: home.php');
    }else {
        echo "htdgfg";
        array_push($errors, "wrong username/password");
    }
}
}


?>