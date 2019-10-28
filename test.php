<?php

session_start();
if (isset($_SESSION['username'])){
    echo "welcome";
}



if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>testpage</title>
</head>
<body>
    <h1>this is a test<h1>
    <?php
    if(isset($_SESSION['success'])) :
    ?>
    <div>
        <h3>
        <?php
            echo $_SESSION['success'];
            unset($_SESSION['success'])
        ?>
        </h3>
    </div>
    <?php endif ?>

    <?php if(isset($_SESSION['username'])) : ?>
    <h3>Welcome <?php echo $_SESSION['username'];?></h3>

    <button><a href="test.php?logout='1'"></a></button>

    <?php endif ?>

</body>
</html>
