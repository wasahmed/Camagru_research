<?php
include ('setup.php');
//creating db starts here////////////////////////////////////////////////////
    try {
        $conn = new PDO("mysql:host=$servername", $root, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("CREATE DATABASE IF NOT EXISTS`$db`;");
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
$sql = "CREATE TABLE IF NOT EXISTS $db.users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(30),
    passwd VARCHAR(100) NOT NULL, 
    `link` VARCHAR(50) NOT NULL , 
    `verified` TINYINT(1) NULL DEFAULT 0)";

$imgs = "CREATE TABLE IF NOT EXISTS `images` (
    `post_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `uploaded_by` varchar(25) NOT NULL,
    `image_name` text NOT NULL
  )";
          


$conn->exec($sql);
$conn->exec($imgs);

/////////////////////////////////////////////////////////////////////////////
?>