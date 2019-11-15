<?php include('config/database.php');?>
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
                //echo $counter;
                //echo $row['Name'];
                
                // echo "there is something to display";
                // $row = $get_imgs->fetchAll();
                $display_img = $row['image_name'];
                echo "
                <div style='border:1px solid black'>
                <p>User name</p>
                <img src='posts/$display_img' width='90%' height='auto' alt='sometings wrong' />
                
                <p><a href='delete.php'><button>Delete Image</button></a></p>
                </div>
                ";
            }
        }
        else
        {
            echo "no images to display";
        }
?>