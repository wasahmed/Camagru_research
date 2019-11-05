<?php include('serverside.php'); ?>
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
                <form action="serverside.php" method="post">
            
                    <div class="textbox">
                        <input type="text" placeholder="Username" name="username" value="" required/>
                    </div>

                    <div class="textbox">
                        <input type="password" placeholder="Password" name="password_1" value="" required/>
                    </div>

                    <button type="submit" name="login" class="btn"> Sign In </button>
                <p>Not registered?  <a href="register.php">Sign Up</a></p>
                <p><a href="forgot_password.php">Forgot password?</a></p>
                </form>
            </div>
        

            <div class="footer"> <p>&copy wasahmed 2019</p></div>
        </div>
    </body>
</html>