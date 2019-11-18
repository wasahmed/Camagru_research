<!DOCTYPE >
<?php include('config/database.php');?>
<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="style2.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Camagru :home</title>
    </head>

    <body>
        <?php
            if (!isset($_SESSION['success'])) header('location: index.php');
        ?>
        <div class="main_wrapper">
            
            <div class="header_wrapper">
                <h1 id="slogan">Camagru</h1>
            </div>

            <div class="menubar">
                <ul id="menu">
                    <li><a href="index.php" name="link">Sign In</a></li>
                </ul>
            </div>

            <div id="content_area">
            <div id="content_box">
                <?php
                    $link = $_GET['link'];
                    require_once("publicgallery.php");
                ?>
            </div>
            </div>

            
            <div id="footer">
                <p> &copyWTC</p>
            </div>
        </div>
    </body>
</html>