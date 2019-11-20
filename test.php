<!DOCTYPE html>
<?php session_start(); ?>
<html>

    <head>
        <title>Camagru: Upload</title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
    <?php
            if (!isset($_SESSION['success'])) header('location: index.php');
    ?>
        <div style="margin-bottom: 15px">
            <video id="video" autoplay></video>
        </div>
        <div style="margin-bottom: 15px">
            <button class="btn profile_buttons outline" id="snap">Capture</button>
            <select id="stickers" style="font-size: 20px;height: 40px;">
                <option value="none">none</option>
                <option value="s1">Scary Musk</option>
                <option value="s2">Boss Baby</option>
                <option value="s3">El P</option>
            </select>
            <button class="btn profile_buttons outline" id="apply">Apply</button>
            <button class="btn profile_buttons blue" id="save" name="img">Upload</button>
        </div>
        <div style="margin-bottom: 15px">
                <canvas id="edit" width=416 height=300></canvas>
        </div>
        <div style="display:inline-block;">
            <img id="s1"  src="stickers/s1.png" alt="kya" width=100 height=100>
            <img id="s2" src="stickers/s2.png" alt="light" width=100 height=100>
            <img id="s3" src="stickers/s3.png" alt="nerd" width=100 height=100>
                           
        </div>
        <script src="photo.js"></script>
        <?php 
        $get_imgs = $conn->prepare("SELECT * FROM images ORDER by post_id DESC  LIMIT 1");
        $get_imgs->execute();
        $rows = $get_imgs->rowCount();
        if ($rows)
        {
            if($row = $get_imgs->fetch(PDO::FETCH_BOTH)){
                $display_img = $row['image_name'];
                echo "<p><img src='$display_img' width='400' height='300' alt='sometings wrong' /></p>";
            }
        }
        ?>
    </body>
</html>