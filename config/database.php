<?php
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
    //echo "connected successfully";
}
catch(PDOException $e)
{
    echo "connection error: " . $e;
}
/////////////////////////////////////////////////////////////////////////////


//create table///////////////////////////////////////////////////////////////
$sql = "CREATE TABLE $db.users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(30),
    passwd VARCHAR(100) NOT NULL)";

$conn->exec($sql);
$conn = NULL;
/////////////////////////////////////////////////////////////////////////////
?>