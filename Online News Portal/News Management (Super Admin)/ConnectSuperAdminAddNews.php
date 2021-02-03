<?php
	date_default_timezone_set("Asia/Dhaka");
    $Time=date("h:i A");
    $TimeForSort= date("H:i:s");
    //echo $Time;
    $Date=date("d/m/Y");
    //echo $Date;
    include '../DatabaseConnection.php';

    session_start();
    if(isset($_SESSION['SuperAdminEmail'])){
      $SuperAdminEmail=$_SESSION['SuperAdminEmail'];
      $sql = "SELECT * FROM super_admin WHERE SuperAdminEmail='$SuperAdminEmail'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $NewsReporterId=$row["SuperAdminId"];
        }
      }

    }



    else{
      mysqli_close($conn);
      echo "
        <script>
          alert('You are not Logged In');
          location.href = '/Online News Portal/Public/Homepage.php';
        </script>";

    }


    $news_insert_sql = "INSERT INTO news (NewsHeadline, NewsDescription, NewsCategory, NewsTime, NewsTimeForSort, NewsDate, NewsReporterName, NewsReporterId) 
       VALUES ('$_POST[NewsHeadline]', '$_POST[NewsDescription]', '$_POST[NewsCategory]', '$Time', '$TimeForSort', '$Date', '$_POST[NewsReporterName]', '$NewsReporterId')";
    //$news_insert_result = mysqli_query($conn, $new_insert_sql);
    if (mysqli_query($conn, $news_insert_sql)) {
    	
    	$NewsId= mysqli_insert_id($conn);
    	
    	header("location:/Online News Portal/News Management (Super Admin)/SuperAdminAddImages.php?var=$NewsId");
    		
  		
	}
	else {
    		echo "Error: " . $news_insert_sql . "<br>" . mysqli_error($conn);
	}



	mysqli_close($conn);







?>