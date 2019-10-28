<?php

session_start();

//intialise variables
// $username = "";
// $password = "";
// $errors = array();


//creating db starts here////////////////////////////////////////////////////
$servername="localhost"; 
$root="root"; 
$password="654321"; 
$db = "camagru";

    try {
        $conn = new PDO("mysql:host=$servername", $root, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("CREATE DATABASE `$db`;");
    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
$conn = NULL;
//creating db ends here//////////////////////////////////////////////////////


//connecting to created db//////////////////////////////////////////////////
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $root, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected successfully";
}
catch(PDOException $e)
{
    echo "connection error: " . $e;
}
/////////////////////////////////////////////////////////////////////////////


//create table///////////////////////////////////////////////////////////////
$sql = "CREATE TABLE $db.users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY)";

$conn->exec($sql);
/////////////////////////////////////////////////////////////////////////////


//register users, retrieve form information
//mysli_real_escape_string??
// $username =  $_POST['username'];
// $email = $_POST['email'];
// $password_1 = $_POST['password_1']; 
// $password_2 = $_POST['password_2'];

// //form validation
// if(empty($username)) {array_push($errors, "Username is required");}
// if(empty($email)) {array_push($errors, "Email is required");}
// if(empty($password_1)) {array_push($errors, "Password is required");}
// if($password_2 != $password_1) {array_push($errors, "Passwords do not match");}

// //unique usernames 
// $user_check = "SELECT * FROM"
?>