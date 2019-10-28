<?php require_once('config/setup.php') ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Camagru: Sign in</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="login-box">
            <h2>Login</h2>

            <div>
                <form action="index.php" method="post">
            
                    <div class="textbox">
                        <input type="text" placeholder="Username" name="username" value="" required/>
                    </div>

                    <div class="textbox">
                        <input type="password" placeholder="Password" name="password_1" value="" required/>
                    </div>

                   <a href="home.php"><button class="btn">Sign In</button></a>
                <p>Not registered?  <a href="register.php">Sign Up</a></p>
                </form>
            </div>
        

            <div class="footer"> <p>&copy wasahmed 2019</p></div>
        </div>
    </body>
</html>