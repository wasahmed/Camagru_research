<?php include('config/setup.php');?>
<?php session_start(); ?>
<?php
        $offset = 0;
        if(isset($_GET['offset'])){
            $offset = $_GET['offset'];
        }
        if($offset < 0){
            $offset = 0;
        }
        $counter = 0;
        $get_imgs = $conn->prepare("SELECT * FROM images ORDER by post_id DESC  LIMIT $offset, 5");
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
                $img_id = $row['post_id'];
                $poster = $row['uploaded_by'];
                $qcount = $conn->prepare("SELECT * FROM likes where post_id=$img_id");
                $qcount->execute();
                $likes = $qcount->rowCount();
                echo "
                <div style='border:1px solid black'>
                <p>$poster</p>
                <img src='$display_img' width='90%' height='auto' alt='sometings wrong' />
                <form action='comments.php?img_id=$img_id' method='post'>
                    <textarea id='view' name='comments' placeholder='Comment here'></textarea>
                    <p><input type='submit' name='submitcomm' value='Insert comment'/></p>
                </form>
                <p><a href='viewcomments.php?img_id=$img_id'><button>View comments</button></a></p>
                <p><a href='likes.php?img_id=$img_id'><button id='total'>$likes likes</button></a></p>
                </div>
                ";
                
                
            }
            echo "<a href='?offset=".($offset+5)."'>Next</a>";
            if($offset < 0 || ($offset - 5) < 0){
                echo "<a href='?offset=0'>Prev</a>";
            }else{
                echo "<a href='?offset=".($offset-5)."'>Prev</a>";
            }
        }
        else
        {
            echo "no images to display";
        }
?>