<?php
	date_default_timezone_set("Asia/Dhaka");
  $CommentsTime=date("h:i A");
	$CommentsDate=date("j F, Y");
	$CommentsTimeForSort=date("H:i:s");
  $CommentsDateForSort=date("d/m/Y");
	

	include '../DatabaseConnection.php';

	session_start();
    if(isset($_SESSION['ViewerEmail'])){
      $ViewerEmail=$_SESSION['ViewerEmail'];
      $sql = "SELECT * FROM viewer WHERE ViewerEmail='$ViewerEmail'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $ViewerId=$row["ViewerId"];  
        }
      }
    } 
    else {
      echo "
      <script>
        alert('You are not Logged In');
        location.href = '/Online News Portal/Public/Homepage.php';
      </script>";
    }


    $NewsId= $_GET['var'];



    $comments_insert_sql = "INSERT INTO comments (CommentsDescription, NewsId, ViewerId, CommentsTime, CommentsDate, CommentsTimeForSort, CommentsDateForSort) 
       VALUES ('$_POST[CommentsDescription]', '$NewsId', '$ViewerId', '$CommentsTime', '$CommentsDate', '$CommentsTimeForSort', '$CommentsDateForSort')";


    if (mysqli_query($conn, $comments_insert_sql)) {
    	
    	header("location:/Online News Portal/Viewer/ViewerSinglePageNewsViewModule.php?var=$NewsId");
    		
  		
    }
    else {
    		echo "Error: " . $news_insert_sql . "<br>" . mysqli_error($conn);
    }



	mysqli_close($conn);

?>