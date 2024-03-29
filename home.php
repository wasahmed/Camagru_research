<!DOCTYPE >
<?php include('config/setup.php');?>
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
                    <li><a href="?link=1" name="link1">Home</a></li>
                    <li><a href="?link=2" name="link2">Gallery</a></li>
                    <li><a href="?link=3" name="link3">Snap</a></li>
                    <li><a href="?link=4" name="link4">Account settings</a></li>
                    <li><a href="?link=6" name="link6">Upload</a></li>
                    <li><a href="?link=5" name="link5">Logout</a></li>
                </ul>
            </div>

            <div id="content_area">
            <div id="content_box">
                <?php
                    $link = $_GET['link'];
                    if ($link == '1'){
                        require_once("showimages.php");
                    }
                    else if ($link == '2')
                    {
                        require_once("showmyimages.php");
                    }
                    else if ($link == '3')
                    {
                        require_once('test.php');
                    }
                    else if ($link == '4')
                    {
                        echo "
                        <div>
                            <h3>Modify account</h3>
                                <form action='mod.php' method='post'>
                                <div>
                                <?php include('mod.php');?>
                                <input type='text' placeholder='New Username' name='new_username' value='' />
                                </div>
                                <div>
                                <input type='password' placeholder='New Password' name='new_password' value=''/>
                                </div>
                                <div>
                                <input type='email' placeholder='New Email' name='new_email' value='' />
                                </div>
                                <div>
                                <h6>Recieve notifications?<input type='checkbox' name='check1' /></h6>
                                </div>
                                <div>
                                <h6>Do not notifications?<input type='checkbox' name='check2' /></h6>
                                </div>
                                <button type='submit' name='modify account'> Update </button>
                                </form>
                        </div>
            ";
                    }
                    else if ($link == '5')
                    {
                        session_destroy();
                        unset($_SESSION['username']);
                        unset($_SESSION['success']);
                        header('location: index.php');
                        //var_dump($_SESSION);
                    }
                    else if ($link == '6')
                    {
                        echo "post image";
                        echo "<form action='' method='post' enctype='multipart/form-data'>";
                        echo "<input type='file' name='image' />
                        <input type='submit' name='insert_post' value='Post'/>";
                        if(isset($_POST['insert_post']))
                        {
                            $who = $_SESSION['username']; 
                            $image = $_FILES['image']['name'];
                            $image_tmp = $_FILES['image']['tmp_name'];
                            move_uploaded_file($image_tmp, "posts/$image");
                            $insert = $conn->prepare("insert into images (uploaded_by, image_name) values ('$who', 'posts/$image')");
                            $insert->execute();
                            if($insert)
                            {
                            echo "<script>alert('Image Posted')</script>";
                            }
                        }
                    }
                    else
                    {  
                        require_once("showimages.php");
                        //var_dump($_SESSION);
                        //echo"default home";
                    }
                ?>
            </div>
            </div>

            
            <div id="footer">
                <p> &copyWTC</p>
            </div>
        </div>
    </body>
</html>
                
                    
                       
                        
                        
                        