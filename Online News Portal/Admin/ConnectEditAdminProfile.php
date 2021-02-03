
  <?php

    include '../DatabaseConnection.php';
    session_start();
    if(isset($_SESSION['AdminEmail'])){
      $AdminEmail=$_SESSION['AdminEmail'];
      $sql = "SELECT * FROM admin WHERE AdminEmail='$AdminEmail'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $AdminPassword=$row["AdminPassword"];  //for matching with old password when password will be upadate
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

    

    //For Updating Name

    if(isset($_POST['AdminFirstName'])){
      $AdminNewFirstName=$_POST['AdminFirstName'];
      $AdminNewLastName=$_POST['AdminLastName'];

      $update_sql =" UPDATE admin SET AdminFirstName = '$AdminNewFirstName', AdminLastName = '$AdminNewLastName' WHERE AdminEmail = '$AdminEmail'";    
   

      if (mysqli_query($conn, $update_sql)) {
        header("location:/Online News Portal/Admin/AdminProfile.php");
      }
    }

   

    //For Updating Password

    else if(isset($_POST['AdminOldPassword'])){
      $AdminOldPassword=$_POST['AdminOldPassword'];
      $AdminNewPassword=$_POST['AdminNewPassword'];

      
      if($AdminPassword==$AdminOldPassword){
        
        $update_sql =" UPDATE admin SET AdminPassword = '$AdminNewPassword' WHERE AdminEmail = '$AdminEmail'";    
   

        if (mysqli_query($conn, $update_sql)) {
          echo "
          <script>
            alert('Password has been changed successfully');
            location.href = '/Online News Portal/Admin/AdminProfile.php';
          </script>"; 
        }
      }

      else{
        echo "
          <script>
            alert('Given old password is wrong');
            location.href = '/Online News Portal/Admin/AdminProfile.php';
          </script>";
      }

    }





    
  ?>

