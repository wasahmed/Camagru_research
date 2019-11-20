<!DOCTYPE >
<?php include('config/setup.php');?>
<html>
    <head>
        <link rel="stylesheet" href="style2.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Camagru :home</title>
    </head>

    <body>
        <div class="main_wrapper">
            
            <div class="header_wrapper">
                <h1 id="slogan">Camagru</h1>
            </div>

            <div class="menubar">
                <ul id="menu">
                    <li><a href="?link=1" name="link1">Sign In</a></li>
                </ul>
            </div>

            <div id="content_area">
            <div id="content_box">
                <?php
                    $link = $_GET['link'];
                    if ($link == '1'){
                        header("location: index.php");
                        exit();
                    }
                ?>
            </div>
            <?php 
            $get_imgs = $conn->prepare("SELECT * FROM images ORDER by post_id DESC");
            $get_imgs->execute();
            $rows = $get_imgs->rowCount();
            if ($rows)
            {
                while($row = $get_imgs->fetch(PDO::FETCH_BOTH)){
                    $counter++;
                    $display_img = $row['image_name'];
                    $img_id = $row['post_id'];
                    $poster = $row['uploaded_by'];
                    $qcount = $conn->prepare("SELECT * FROM likes where post_id=$img_id");
                    $qcount->execute();
                    $likes = $qcount->rowCount();
                    echo "
                    <div style='border:1px solid black'>
                    
                    <img src='$display_img' width='90%' height='auto' alt='sometings wrong' />
                    
                    </div>
                    ";
            }
        }
            ?>
            </div>
            <div id="footer">
                <p> &copyWTC</p>
            </div>
        </div>
    </body>
</html>