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
    if(isset($_SESSION['SuperAdminEmail'])){
      $SuperAdminEmail=$_SESSION['SuperAdminEmail'];
      $sql = "SELECT * FROM super_admin WHERE SuperAdminEmail='$SuperAdminEmail'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $SuperAdminFirstName=$row["SuperAdminFirstName"];
          $SuperAdminLastName=$row["SuperAdminLastName"] . "<br>";
        }
      }
    } 
    else {
      echo "
      <script>
        alert('You are not Logged In');
        location.href = '/Online News Portal/Super Admin/SuperAdminSignIn.php';
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
                    <li><a href="/Online News Portal/Super Admin/SuperAdminProfile.php" class="nav-link">Profile</a></li>
                    <li><a href="/Online News Portal/SignOut.php" class="nav-link">Sign Out</a></li>
                  </ul>
              </div>
            </div>
            <div class="col-md-2" style="margin-top: 15px; padding-left: 0px;">

                <?php echo "<b>".$SuperAdminFirstName." ".$SuperAdminLastName."</b>"; ?>
            </div>
    </div>
    
    
    <nav class="navbar navbar-expand-lg navbar-light">
          
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>


            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminHomepage.php">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminBangladeshPage.php">Bangladesh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminInternationalPage.php">International</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminBusinessPage.php">Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminSportsPage.php">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminEntertainmentPage.php">Entertainment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminLifestylePage.php">Lifestyle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminJobPage.php">Job</a>
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

  
  <div class="container bg-light" style="border: 1px black solid; margin-top: 30px; width: 20%;">
    <center><h5><a class="nav-link" href="/Online News Portal/News Management (Super Admin)/SuperAdminAddNews.php"><b>Add News</b></a></h5></center>
  </div>


  <div class="container" style="margin-top: 40px; width: 60%;">

    <?php
      date_default_timezone_set("Asia/Dhaka");
      $Date=date("d/m/Y");
      $sql = "SELECT * FROM news WHERE NewsDate='$Date' order by NewsTimeForSort desc";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
      
        while($row = mysqli_fetch_assoc($result)) {
          $NewsId=$row["NewsId"];
          $NewsHeadline=$row["NewsHeadline"];
          $NewsTime=$row["NewsTime"];
          $NewsDescription=$row["NewsDescription"];


          $Image_sql = "SELECT * FROM news_image WHERE NewsId='$NewsId'";
          $Image_result = mysqli_query($conn, $Image_sql);
          while($Image_row = mysqli_fetch_assoc($Image_result)) {
            $NewsImage=$Image_row["NewsImage"];
            break;

          }
    ?>

          

          <div class="card">
            <div class="card-body bg-light">
              <div class="row">
                <div class="col-md-3">
                  <?php
                    if (isset($NewsImage)) {
                  ?>
                      <a href="/Online News Portal/Super Admin/SuperAdminSinglePageNewsViewModule.php?var=<?php echo $NewsId;?>"><img src="/Online News Portal/Images/<?php echo$NewsImage ?>"  alt="Image is not available"  style=" width: 100%; height: 200px;"></a>
                  <?php
                      unset($NewsImage); //Unset image na korle ager news er image ta variable a theke jay. jar fole kono news er image na thaklew ager news er j image ta chilo oita print hoy. tai protibar image print kore unset kore felle kono image er news na thakle oi news er jonno kunu image display korar thakbe na.
                    }
                  ?>
                </div>
                <div class="col-md-8 bg-white" style="margin-left: 1px;">
                  <a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminSinglePageNewsViewModule.php?var=<?php echo $NewsId;?>" style="padding-left: 0px;">
                    <font size="4px"><b><?php echo $NewsHeadline; ?></b></font><br>
                    <font size="3px"><font color="DimGray"><?php echo substr($NewsDescription,0,138); ?>...</font></font><br>
                  </a>
                  <font size="1px"><font color="Darkgray">Published :  <?php echo $NewsTime ?></font></font><br><br>             
                </div>
              </div>                
            </div>
          </div>

          <br>

    

    <?php

        }
      } 
      else {
    ?>
    <div class="container bg-light" style="width: 60%; margin-top: 80px; margin-bottom: 60px; text-align: center; border: 2px black solid; font-size: 30px;">
        <b>No news has been published yet<br>Thanks for staying with us</b>
      
    </div>
      
    <?php
      }
    ?>


    
  </div>


  









































<!-- Footer --> 
<footer class="page-footer container bg-light" style="margin-top: 70px; margin-bottom: 30px;">

        <div class="row">   
          <div class="col-md-6" style="padding-top: 15px;">
            <font size="4"><a class="nav-link" style="width: 43%;" href="/Online News Portal/Super Admin/SuperAdminManageAdminPannel.php"><b>Manage Admin Pannel</b></a></font> 
          </div>
          <div class="col-md-6" style="text-align: right; padding-top: 10px;
          padding-right: 30px;">
            <font size="6"><font color="DimGray"><b><i>A part of your everyday life</i></b></font></font>      
          </div>
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
        <a class="nav-link" style="width: 2%;" href="/Online News Portal/Super Admin/SuperAdminHomepage.php">DailyBulletin.com</a>        
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