<?php include('config/setup.php');?>
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
 
            }     
        }else{
            die("somethings wrong");
            
        }
    }
        ?>