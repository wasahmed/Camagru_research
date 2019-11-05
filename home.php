<!DOCTYPE >
<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="style2.css"/>
       
        <title>Camagru :home</title>
    </head>

    <body>
    
        <div class="main_wrapper">
            
            <div class="header_wrapper">
                <h1 id="slogan">Camagru</h1>
            </div>

            <div class="menubar">
                <ul id="menu">
                    <li><a href="?link=1" name="link1">Home</a></li>
                    <li><a href="?link=2" name="link2">Gallery</a></li>
                    <li><a href="?link=3" name="link3">Upload</a></li>
                    <li><a href="?link=4" name="link4">Account settings</a></li>
                    <li><a href="?link=5" name="link5">Logout</a></li>
                </ul>
            </div>

            <div id="content_area">
            <div id="content_box">
                <?php
                    $link = $_GET['link'];
                    if ($link == '1'){
                        echo "feed";
                    }
                    else if ($link == '2')
                    {
                        echo "display my posts";
                    }
                    else if ($link == '3')
                    {
                        echo "post image";
                    }
                    else if ($link == '4')
                    {
                        // echo "change username, password, email";
                        echo "
                        <div>
                            <h3>Modify account</h3>
                                <form action='home2.php' method='post'>

                                <div>
                                <input type='text' placeholder='New Username' name='new_username' value='' />
                                </div>

                                <div>
                                <input type='password' placeholder='New Password' name='new_password' value=''/>
                                </div>

                                <div>
                                <input type='email' placeholder='New Email' name='new_email' value='' />
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
                    else
                    {  
                        //var_dump($_SESSION);
                        echo"default home";
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