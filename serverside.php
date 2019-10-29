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


//////register user if no errors/////////////////////////////////////////////////////////////////////////////////////////
    if (count($errors) == 0){
        $password = md5($password_1);
        $sql = $conn->prepare("INSERT INTO users (username, email, passwd) VALUES ('$username', '$email', '$password')");
        $sql->execute();
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        //header('location: test.php');
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>