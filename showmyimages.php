<?php include('config/setup.php');?>
<?php session_start(); ?>
<?php
        $who = $_SESSION['username'];
        $counter = 0;
        $get_imgs = $conn->prepare("select * from images where uploaded_by='$who'");
        $get_imgs->execute();
        $rows = $get_imgs->rowCount();
        if ($rows)
        {
            while($row = $get_imgs->fetch(PDO::FETCH_BOTH)){
                $counter++;
                $display_img = $row['image_name'];
                $img_id = $row['post_id'];
                echo "
                <div style='border:1px solid black'>
                <p>User name</p>
                <img src='$display_img' width='90%' height='auto' alt='sometings wrong' />
                
                <p><a href='delete.php?img_id=$img_id'><button>Delete Image</button></a></p>
                </div>
                ";
            }
        }
        else
        {
            echo "no images to display";
        }
?>