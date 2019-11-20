<!DOCTYPE html>
<html>

    <head>
        <title>Camagru: Register</title>
        <link rel="stylesheet" href="style.css">
        <script>
            function chkpwd(register){
                var str = document.getElementById('pass').value;
                console.log('str: ', str);
                if (str.length < 8)
                {
                    window.alert("too short");
                    return false;
                }
                if (str.search(/[a-z]/) == -1)
                {
                    window.alert("need atleast one lowercase");
                    return false;
                }
                if (str.search(/[A-Z]/) == -1)
                {
                    window.alert("need atleast one uppercase");
                    return false;
                }
                if (str.search(/[0-9]/) == -1)
                {
                    window.alert("need atleast one number");
                    return false;
                }
                return true;
            }
        </script>
    </head>

    <body>
        <div class="login-box">
            <h2>Register</h2>

            <div>
                <form action="serverside.php" method="post" onsubmit="return chkpwd()">

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
                    <div class="textbox">
                        <h6>Recieve notifications?<input type="checkbox" name="check" /></h6>
                    </div>
                    <button type="submit" name="register" class="btn"> Sign Up </button>
                <p>Already have an account?  <a href="index.php">Sign In</a></p>
                </form>
            </div>
        

            <div class="footer"> <p>&copy wasahmed 2019</p></div>
        </div>
    </body>
</html>