<?php

session_start();

//intialise variables
$username = "";
$password = "";
$errors = array();


try {
    $conn = new PDO("mysql:host=$servername;dbname=users", $root, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "connection error: " . $e;
}


//register users, retrieve form information
//mysli_real_escape_string??
$username =  $_POST['username'];
$email = $_POST['email'];
$password_1 = $_POST['password_1']; 
$password_2 = $_POST['password_2'];

//form validation
if(empty($username)) {array_push($errors, "Username is required");}
if(empty($email)) {array_push($errors, "Email is required");}
if(empty($password_1)) {array_push($errors, "Password is required");}
if($password_2 != $password_1) {array_push($errors, "Passwords do not match");}

//unique usernames 
$user_check = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";
$results = $conn->query($user_check);
$user = $results->fetch_assoc($results);

if ($user)
{
    if ($user['username'] === $username){array_push($errors, "Username taken");}
    if ($user['email'] === $email){array_push($errors, "email used");}
}


//register user
if (count($errors) == 0){
    $password = md5($password_1);
    $q = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    $conn->query($q);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: test.php');
}
?>