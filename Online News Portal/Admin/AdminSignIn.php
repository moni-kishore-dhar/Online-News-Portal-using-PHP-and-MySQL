<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/Online News Portal/css/bootstrap.min.css">
    <title>Daily Bulletin</title>
    <style>
        
        div.SignUpBox
        {
        border-radius: 5px;
        border: 2px solid black;
        padding: 20px;            
        box-shadow: 5px 10px 8px 10px gray; 
        }


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

?>


  <div class="container" style="margin-top: 50px;">
    
    
    <div class="row  bg-light" style="margin-top: 20px; height: 150px;">
            <div class="col-md-9" style="margin-top: 5px;">
                <h1><b><i>Daily Bulletin</i></b></h1>
                <font size="2"><?php echo $Date; ?></font>
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
                        <a class="nav-link" href="/Online News Portal/Public/Homepage.php">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Public/PublicBangladeshPage.php">Bangladesh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Public/PublicInternationalPage.php">International</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Public/PublicBusinessPage.php">Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Public/PublicSportsPage.php">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Public/PublicEntertainmentPage.php">Entertainment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Public/PublicLifestylePage.php">Lifestyle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Online News Portal/Public/PublicJobPage.php">Job</a>
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


    <br><br><br>


    <div class="SignUpBox container" style="width: 30%; border: 2px solid black;">
        <div class="container" style="width: 60%;">
        <br>
            <center><h4>Admin Pannel</h4></center><br>
            <center><h5>Sign In</h5></center>
            <br>  
            <form action="/Online News Portal/Admin/ConnectAdminSignIn.php" method="Post" style="font-weight: bold;">
                Email<br>
                <input name="AdminEmail" placeholder="@email.com" type="email" required><br><br>
                Password<br>
                <input name="AdminPassword" placeholder="At least 6 characters" minlength="6" type="password" required><br><br>
                <button class="btn btn-outline-dark" style="width: 60%;";>Sign In</button>
            </form>
            <br><br><br>

        </div>
    </div>






















   
<!-- Footer --> 
<footer class="page-footer container bg-light" style="margin-top: 70px; margin-bottom: 30px;">

        <div class="row">   
          <div class="col-md-6" style="padding-top: 15px;">
            <font size="4"><a class="nav-link" style="width: 30%;" href="/Online News Portal/Admin/AdminSignIn.php"><b>Admin Pannel</b></a></font> 
          </div>
          <div class="col-md-6" style="text-align: right; padding-top: 10px;
          padding-right: 30px;">
            <font size="6"><font color="DimGray"><b><i>A part of your everyday life</i></b></font></font>      
          </div>
        </div>
        <br><br>

        


        <center><font size="4"><a class="nav-link" style="width: 2%;" href="/Online News Portal/Super Admin/SuperAdminSignIn.php"><b>Administrator</b></a></font></center>   
        
    
  
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
        <a class="nav-link" style="width: 2%;" href="/Online News Portal/Public/Homepage.php">DailyBulletin.com</a>        
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