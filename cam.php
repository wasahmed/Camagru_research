<?php
include_once('config/database.php');
session_start();
echo"he";
$imgfile = file_get_contents("php://input");
$x = explode(',', $imgfile);
$photo = base64_decode($x[1]);
$img_name = uniqid().".png";
$username = $_SESSION['username'];
$fileDestination = 'posts/'.$img_name;
file_put_contents("posts/".$img_name, $photo);
$sql = $conn->prepare("INSERT INTO images (uploaded_by, image_name) VALUES('$username', '$fileDestination')");
$sql->execute();
echo "success";
?>