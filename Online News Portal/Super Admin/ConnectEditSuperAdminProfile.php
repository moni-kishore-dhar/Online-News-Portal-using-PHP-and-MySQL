
  <?php

    include '../DatabaseConnection.php';
    session_start();
    if(isset($_SESSION['SuperAdminEmail'])){
      $SuperAdminEmail=$_SESSION['SuperAdminEmail'];
      $sql = "SELECT * FROM super_admin WHERE SuperAdminEmail='$SuperAdminEmail'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $SuperAdminPassword=$row["SuperAdminPassword"];  //for matching with old password when password will be upadate
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

    

    //For Updating Name

    if(isset($_POST['SuperAdminFirstName'])){
      $SuperAdminNewFirstName=$_POST['SuperAdminFirstName'];
      $SuperAdminNewLastName=$_POST['SuperAdminLastName'];

      $update_sql =" UPDATE super_admin SET SuperAdminFirstName = '$SuperAdminNewFirstName', SuperAdminLastName = '$SuperAdminNewLastName' WHERE SuperAdminEmail = '$SuperAdminEmail'";    
   

      if (mysqli_query($conn, $update_sql)) {
        header("location:/Online News Portal/Super Admin/SuperAdminProfile.php");
      }
    }

   

    //For Updating Password

    else if(isset($_POST['SuperAdminOldPassword'])){
      $SuperAdminOldPassword=$_POST['SuperAdminOldPassword'];
      $SuperAdminNewPassword=$_POST['SuperAdminNewPassword'];

      
      if($SuperAdminPassword==$SuperAdminOldPassword){
        
        $update_sql =" UPDATE super_admin SET SuperAdminPassword = '$SuperAdminNewPassword' WHERE SuperAdminEmail = '$SuperAdminEmail'";    
   

        if (mysqli_query($conn, $update_sql)) {
          echo "
          <script>
            alert('Password has been changed successfully');
            location.href = '/Online News Portal/Super Admin/SuperAdminProfile.php';
          </script>"; 
        }
      }

      else{
        echo "
          <script>
            alert('Given old password is wrong');
            location.href = '/Online News Portal/Super Admin/SuperAdminProfile.php';
          </script>";
      }

    }





    
  ?>

