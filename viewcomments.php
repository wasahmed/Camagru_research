<?php include('config/database.php');?>
<?php session_start(); ?>
<?php
    $counter = 0;
	$currentuser = $_SESSION['username'];
	if(isset($_GET['img_id'])){
        $img_id = $_GET['img_id'];
		$result = $conn->prepare("SELECT comment, username from comments ");
        $result->execute();
        $rows = $result->rowCount();
		if($rows)
		{
            while($row = $result->fetch(PDO::FETCH_BOTH)){
                $counter++;
                
                $display_comment = $row['comment'];
                $commenter = $row['username'];
                echo "Comment by $commenter : $display_comment<br>";
                //header("refresh:0; url=home.php?link=1" );
                //echo "$display_comment";
 
            }     
        }else{
            die("somethings wrong");
            
        }
    }
        ?>