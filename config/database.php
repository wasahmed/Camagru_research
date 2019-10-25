<?php
    $servername = "localhost";
    $username = "root";
    $password = "654321";

    try {
        $con = new PDO("mysql:host=$servername;dbname=Camagru", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>