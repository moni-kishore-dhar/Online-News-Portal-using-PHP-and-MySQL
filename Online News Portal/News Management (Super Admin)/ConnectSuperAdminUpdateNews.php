

<?php
    $NewsId= $_GET['var'];
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


    $news_update_sql =" UPDATE news SET NewsHeadline = '$_POST[NewsHeadline]', NewsDescription = '$_POST[NewsDescription]', NewsCategory = '$_POST[NewsCategory]', NewsTime = '$Time', NewsTimeForSort = '$TimeForSort', NewsDate = '$Date', NewsReporterName = '$_POST[NewsReporterName]', NewsReporterId = '$NewsReporterId' WHERE NewsId = '$NewsId'";    
   

    if (mysqli_query($conn, $news_update_sql)) {
      
       header("location:/Online News Portal/Super Admin/SuperAdminSinglePageNewsViewModule.php?var=$NewsId");
    }
    else {
        echo "Error: " . $news_update_sql . "<br>" . mysqli_error($conn);
    }



  mysqli_close($conn);







?>