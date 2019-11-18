<?php include('config/database.php');?>

<?php session_start(); ?>
<?php
    if (isset($_GET['img_id'])){
        $who = $_SESSION['username'];
        $img_id = $_GET['img_id'];
        $counter = 0;
        $del_imgs = $conn->prepare("DELETE from images where uploaded_by='$who' and post_id='$img_id'");
        $del_imgs->execute();
        echo "<script>window.alert('Image Deleted')</script>";
        header("refresh:0; url=home.php?link=2" );
    }
?>