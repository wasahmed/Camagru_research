<!DOCTYPE html>
<html>

    <head>
        <title>Register</title>
    </head>

    <body>
        <div class="container">
        <img src="https://www.outsideonline.com/sites/default/files/styles/img_1400x800/public/2019/04/05/selfie-stick_h.jpg?itok=MnG_eJjw" alt="background image">

            <div class="header">
                <h2>Register</h2>
            </div>

            <form action="registration.php" method="post">
            
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" />
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" />
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password_1" />
                </div>

                <div>
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password_2" />
                </div>

                <button type="submit"> Register 
                </button>

                <p>Already have an account?  <a href="index.php">Sign In</a></p>

            </form>
        </div>

    </body>
</html>