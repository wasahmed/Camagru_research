
<!DOCTYPE html>
<html>

    <head>
        <title>Camagru: Register</title>
        <link rel="stylesheet" href="style.css">
        <!-- <script>
            chkpwd = function(register){
                var str = document.getElementById('pass').value;
                if (str.length < 8)
                {
                    window.alert("too short");
                }
                else if (str.search(/[a-z]/) == -1)
                {
                    window.alert("need atleast one lowercase");
                }
                else if (str.search(/[A-Z]/) == -1)
                {
                    window.alert("need atleast one uppercase");
                }
                else if (str.search(/[0-9]/) == -1)
                {
                    window.alert("need atleast one number");
                }
            }
        </script> -->
    </head>

    <body>
        <div class="login-box">
            <h2>Register</h2>

            <div>
            <!-- need processing to happen only if password is correct -->
                <form action="serverside" method="post">

                    <?php include('errors.php') ?>
            
                    <div class="textbox">
                        <input type="text" placeholder="Username" name="username" value="" required/>
                    </div>

                    <div class="textbox">
                        <input type="email" placeholder="Email" name="email" value="" required/>
                    </div>

                    <div class="textbox">
                        <input id="pass" type="password" placeholder="Password" name="password_1" value="" />
                        <p id="passerror"></p>
                    </div>

                    <div class="textbox">
                        <input type="password" placeholder="Confirm Password" name="password_2" value="" required/>
                    </div>
                    <button type="submit" onclick="chkpwd()" name="register" class="btn"> Sign Up </button>
                <p>Already have an account?  <a href="index.php">Sign In</a></p>
                </form>
            </div>
        

            <div class="footer"> <p>&copy wasahmed 2019</p></div>
        </div>
    </body>
</html>