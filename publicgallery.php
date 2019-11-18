<?php include('config/database.php');?>
<?php session_start(); ?>
<?php

        $counter = 0;
        $get_imgs = $conn->prepare("select * from images order by post_id desc ");
        $get_imgs->execute();
        $rows = $get_imgs->rowCount();
        $qcount = $conn->prepare("SELECT * FROM likes");
        $qcount->execute();
        $likes = $qcount->rowCount();
        if ($rows)
        {
            while($row = $get_imgs->fetch(PDO::FETCH_BOTH)){
                $counter++;
                //echo $counter;
                //echo $row['Name'];
                
                // echo "there is something to display";
                // $row = $get_imgs->fetchAll();
                $display_img = $row['image_name'];
                $img_id = $row['post_id'];
                $poster = $row['uploaded_by'];
                echo "
                <div style='border:1px solid black'>
                <p>$poster</p>
                <img src='posts/$display_img' width='90%' height='auto' alt='sometings wrong' />

                
                </div>
                ";
            }
        }
        else
        {
            echo "no images to display";
        }
?>