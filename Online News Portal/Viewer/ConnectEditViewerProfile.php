
  <?php

    include '../DatabaseConnection.php';
    session_start();
    if(isset($_SESSION['ViewerEmail'])){
      $ViewerEmail=$_SESSION['ViewerEmail'];
      $sql = "SELECT * FROM viewer WHERE ViewerEmail='$ViewerEmail'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $ViewerPassword=$row["ViewerPassword"];  //for matching with old password when password will be upadate
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

    

    //For Updating Name

    if(isset($_POST['ViewerFirstName'])){
      $ViewerNewFirstName=$_POST['ViewerFirstName'];
      $ViewerNewLastName=$_POST['ViewerLastName'];

      $update_sql =" UPDATE viewer SET ViewerFirstName = '$ViewerNewFirstName', ViewerLastName = '$ViewerNewLastName' WHERE ViewerEmail = '$ViewerEmail'";    
   

      if (mysqli_query($conn, $update_sql)) {
        header("location:/Online News Portal/Viewer/ViewerProfile.php");
      }
    }

   

    //For Updating Password

    else if(isset($_POST['ViewerOldPassword'])){
      $ViewerOldPassword=$_POST['ViewerOldPassword'];
      $ViewerNewPassword=$_POST['ViewerNewPassword'];

      
      if($ViewerPassword==$ViewerOldPassword){
        
        $update_sql =" UPDATE viewer SET ViewerPassword = '$ViewerNewPassword' WHERE ViewerEmail = '$ViewerEmail'";    
   

        if (mysqli_query($conn, $update_sql)) {
          echo "
          <script>
            alert('Password has been changed successfully');
            location.href = '/Online News Portal/Viewer/ViewerProfile.php';
          </script>"; 
        }
      }

      else{
        echo "
          <script>
            alert('Given old password is wrong');
            location.href = '/Online News Portal/Viewer/ViewerProfile.php';
          </script>";
      }

    }





    
  ?>

