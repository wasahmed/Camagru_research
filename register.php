<?php include('serverside.php') ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Camagru: Register</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="login-box">
            <h2>Register</h2>

            <div>
                <form action="register.php" method="post">

                    <?php include(errors.php) ?>
            
                    <div class="textbox">
                        <input type="text" placeholder="Username" name="username" value="" required/>
                    </div>

                    <div class="textbox">
                        <input type="email" placeholder="Email" name="email" value="" required/>
                    </div>

                    <div class="textbox">
                        <input type="password" placeholder="Password" name="password_1" value="" required/>
                    </div>

                    <div class="textbox">
                        <input type="password" placeholder="Confirm Password" name="password_2" value="" required/>
                    </div>
                    <button type="submit"> SignIN </button>
                    <!-- <a href="home.php"><button class="btn">Sign Up</button></a> -->
                <p>Already have an account?  <a href="index.php">Sign In</a></p>
                </form>
            </div>
        

            <div class="footer"> <p>&copy wasahmed 2019</p></div>
        </div>
    </body>
</html>