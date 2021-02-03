
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/Online News Portal/css/bootstrap.min.css">
    <title>Daily Bulletin</title>
    <style>
      a.nav-link {color:black;}
      a.nav-link:hover {color:DimGray;
        text-decoration:none;}
    </style>
    
</head>


<body>


  <?php

    date_default_timezone_set("Asia/Dhaka");
    $Time=date("h:i:sa");
    //echo $Time;

    $Date=date("<b>l,</b> j F Y") . "<br>";
    //echo $Date;

    include '../DatabaseConnection.php';
    session_start();
    if(isset($_SESSION['AdminEmail'])){
      $AdminEmail=$_SESSION['AdminEmail'];
      $sql = "SELECT * FROM admin WHERE AdminEmail='$AdminEmail'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $AdminFirstName=$row["AdminFirstName"];
          $AdminLastName=$row["AdminLastName"] . "<br>";
        }
      }
    } 
    else {
      echo "
      <script>
        alert('You are not Logged In');
        location.href = '/Online News Portal/Admin/AdminSignIn.php';
      </script>";
    }

    
  ?>



  <div class="container" style="margin-top: 50px;">
    
    
    <div class="row bg-light" style="margin-top: 20px; height: 150px;">
            <div class="col-md-9" style="margin-top: 5px;">
                <h1><b><i>Daily Bulletin</i></b></h1>
                <font size="2"><?php echo $Date; ?></font>
            </div>
            <div class="col-md-1" style="margin-top: 8px; text-align: right; padding-right: 0px;">
              <div class="dropdown">
                <button class="btn" type="button" data-toggle="dropdown" style="width: 40px;"><img src="/Online News Portal/Images/UserIcon.PNG" alt="Image is not available" style="height: 20px; width: 20px;"></button>
                  <ul class="dropdown-menu bg-light" style="text-align: center;">
                    <li><a href="/Online News Portal/Admin/AdminProfile.php" class="nav-link">Profile</a></li>
                    <li><a href="/Online News Portal/SignOut.php" class="nav-link">Sign Out</a></li>
                  </ul>
              </div>
            </div>
            <div class="col-md-2" style="margin-top: 15px; padding-left: 0px;">

                <?php echo "<b>".$AdminFirstName." ".$AdminLastName."</b>"; ?>
            </div>
    </div>
    
    
    <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>


            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Admin/AdminHomepage.php">All</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Admin/AdminBangladeshPage.php">Bangladesh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Admin/AdminInternationalPage.php">International</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Admin/AdminBusinessPage.php">Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Admin/AdminSportsPage.php">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Admin/AdminEntertainmentPage.php">Entertainment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Admin/AdminLifestylePage.php">Lifestyle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Admin/AdminJobPage.php">Job</a>
                    </li>
                    
                </ul>


                <a class="btn" data-toggle="collapse" href="#myContent" style="margin-top: -7px;"><img src="/Online News Portal/Images/SearchIcon.PNG" style="height: 25px; width: 25px;"></a>
                <div class="collapse" id="myContent">
                  <div>
                    <form action="/Online News Portal/ConnectSearch.php" method="Post">
                      <input type="Text" required name="SearchNews" placeholder=" Search..." style="width: 150px; margin-right: 1px; margin-left: 10px;">
                      <button class="btn btn-sm btn-outline-dark bg" style="margin-top: -7px;">Search</button>
                    </form>

                  </div>
                </div>
            

                
            </div>
        </nav>
        <hr style="margin-top: -10px;">


        
  </div>




	<?php

		$NewsId= $_GET['var'];
		$sql = "SELECT * FROM news WHERE NewsId='$NewsId'";
      	$result = mysqli_query($conn, $sql);

      	if (mysqli_num_rows($result) > 0) {
      
        	while($row = mysqli_fetch_assoc($result)) {
          		$NewsHeadline=$row["NewsHeadline"];
          		$NewsTime=$row["NewsTime"];
          		$NewsDescription=$row["NewsDescription"];
          		$NewsReporterName=$row["NewsReporterName"];
              $NewsCategory=$row["NewsCategory"];
          	}

          	$Image_sql = "SELECT * FROM news_image WHERE NewsId='$NewsId'";
          	$Image_result = mysqli_query($conn, $Image_sql);
          	while($Image_row = mysqli_fetch_assoc($Image_result)) {
            	$NewsImage=$Image_row["NewsImage"];
            	break;
            }
        }

        else {
        echo "No news has been published yet!!";
    	}
    ?>


    <div class="container" style="margin-top: 80px; width: 70%;">
    	<?php
            if (isset($NewsImage)) {
        ?>
    			<img src="/Online News Portal/Images/<?php echo$NewsImage ?>"  alt="Image is not available"  style=" width: 100%; height: 400px;">
    	<?php
            unset($NewsImage);
           	}
        ?>
    	
    </div>

    
    <div class="dropdown" style="position: absolute; right: 15%; margin-top: 25px;">
        <button class="btn" type="button" data-toggle="dropdown"><img src="/Online News Portal/Images/EditIcon.PNG" alt="Image is not available" style="height: 25px; width: 25px;"></button>
            <ul class="dropdown-menu" style="text-align: center;">
                <li><a href="/Online News Portal/News Management (Admin)/UpdateNews.php?var=<?php echo $NewsId;?>" class="nav-link">Update News</a></li>
                <li><a href="/Online News Portal/News Management (Admin)/UpdateImages.php?var=<?php echo $NewsId;?>" class="nav-link">Update Picture</a></li>
                <li><a href="/Online News Portal/News Management (Admin)/ConnectDeleteNews.php?var=<?php echo $NewsId;?>" class="nav-link">Delete News</a></li>
                <li><a href="/Online News Portal/News Management (Admin)/ConnectDeleteImages.php?var=<?php echo $NewsId;?>" class="nav-link">Delete Picture</a></li>
            </ul>
    </div>
    
    <div class="container" style="width: 60%; margin-top: 70px;">   	
    		<font size="6px"><b><?php echo $NewsHeadline; ?></b></font><br><br>
        <font size="4px"><font color="DimGray"><b>News Category: <?php echo $NewsCategory; ?></b></font></font><br>
    		<font size="3px"><font color="DimGray"><?php echo $NewsReporterName; ?></font></font><br>
    		<font size="2px"><font color="DarkGray">Published: <?php echo $NewsTime; ?></font></font>
	  </div>



    <div class="container" style="margin-top: 50px; width: 50%;">
    	<font size="4px"><?php echo $NewsDescription; ?></font><br>
    </div>







    <div class="container bg-light" style="margin-top: 100px; width: 40%; padding-top: 10px; padding-bottom: 10px; font-size: 20px;">
      <b>Comments....</b>    
    </div>
    <div class="container bg-light overflow-auto" style="width: 40%; padding-top: 20px; padding-bottom: 20px; font-size: 20px; min-height: 50px; max-height: 800px; margin-bottom: 40px;">
      
        
        <?php
          $sql_for_comments = "SELECT * FROM comments where NewsId=$NewsId order by CommentsDateForSort desc, CommentsTimeForSort desc";
          $result_of_comments = mysqli_query($conn, $sql_for_comments);

          if (mysqli_num_rows($result_of_comments) > 0) {
      
            while($row = mysqli_fetch_assoc($result_of_comments)) {
              $CommentsId=$row["CommentsId"];
              $CommentsDescription=$row["CommentsDescription"];
              $CommentsTime=$row["CommentsTime"];
              $CommentsDate=$row["CommentsDate"];
              
              $CommentatorsId=$row["ViewerId"];


              $sql_for_commentators = "SELECT * FROM viewer WHERE ViewerId='$CommentatorsId'";
              $result_of_commentators = mysqli_query($conn, $sql_for_commentators);
              while($commentators_row = mysqli_fetch_assoc($result_of_commentators)) {
                $CommentatorsFirstName=$commentators_row["ViewerFirstName"];
                $CommentatorsLastName=$commentators_row["ViewerLastName"];
              }

        ?>
        <center>
        <div class="container bg-white overflow-auto" style="text-align: left; border-radius:20px; padding-top: 10px; padding-bottom: 10px; font-size: 15px; padding-left: 25px;">          
              <b><?php echo $CommentatorsFirstName."  ".$CommentatorsLastName ?></b><br>
            
              <font size="3px"><?php echo $CommentsDescription; ?></font> 
              <hr style="margin-bottom: 0px;">
              
              <div class="row" style="font-size: 12px; color: dimgray; font-weight: bold;">
                <div class="col-md-8" style="padding-top: 8px; padding-left: 25px;">
                  <?php echo $CommentsTime.",  ".$CommentsDate; ?>
                </div>
                <div class="col-md-4" style="text-align: right; padding-right: 30px;">              
                    <a href="/Online News Portal/Admin/ConnectAdminDeleteComments.php?CommentsId=<?php echo $CommentsId;?> & NewsId=<?php echo $NewsId;?>" class="nav-link"><font color="DimGray">Delete</font></a>
                </div>                
              </div>                            
        </div><br>
        </center>


        <?php
            }
          }

          else{
            //echo "No Comments";
          }
        ?>         
    </div>



















































<!-- Footer --> 
<footer class="page-footer container bg-light" style="margin-top: 70px; margin-bottom: 30px;">

         
          <div style="text-align: right; padding-top: 10px;
          padding-right: 30px;">
            <font size="6"><font color="DimGray"><b><i>A part of your everyday life</i></b></font></font>      
          </div>
        
        <br><br>

        


  
  <hr>
  <!-- Copyright -->
  <div class="footer-copyright py-3">
    <div style="text-align: right; word-spacing: 10px; padding-right: 30px; margin-top: -30px;">
        <a href="https://facebook.com" target="_blank"><img src="/Online News Portal/Images/FacebookIcon.PNG" style="height: 20px; width: 20px;"></a>   
        <a href="https://twitter.com/" target="_blank"><img src="/Online News Portal/Images/TwitterIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://www.instagram.com/" target="_blank"><img src="/Online News Portal/Images/InstaIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://www.youtube.com"  target="_blank"><img src="/Online News Portal/Images/YoutubeIcon.PNG" style="height: 20px; width: 20px;"></a>      
    </div>
    
    <div class="row">
      <div class="col-md-2" style="text-align: right; padding-right: 0px; padding-top: 7px;">
        © 2020 Copyright:  
      </div>
      <div class="col-md-10" style="text-align: left; padding-left: 0px;">
        <a class="nav-link" style="width: 2%;" href="/Online News Portal/Admin/AdminHomepage.php">DailyBulletin.com</a>        
      </div>
    </div> 

  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->






    <script src="/Online News Portal/jquery-3.5.1.slim.min.js"></script>
    <script src="/Online News Portal/popper.min.js"></script>
    <script src="/Online News Portal/js/bootstrap.bundle.min.js"></script>
</body>

</html>
