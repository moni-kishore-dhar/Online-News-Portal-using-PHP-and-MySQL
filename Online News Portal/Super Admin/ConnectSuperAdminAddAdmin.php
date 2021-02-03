<?php
    include '../DatabaseConnection.php';

 


    $news_insert_sql = "INSERT INTO admin (AdminFirstName, AdminLastName, AdminEmail, AdminPassword) 
       VALUES ('$_POST[AdminFirstName]', '$_POST[AdminLastName]', '$_POST[AdminEmail]', '$_POST[AdminPassword]')";
    //$news_insert_result = mysqli_query($conn, $new_insert_sql);
    if (mysqli_query($conn, $news_insert_sql)) {
    	
 
    	
    	header("location:/Online News Portal/Super Admin/SuperAdminManageAdminPannel.php");
    		
  		
	}
	else {
    		echo "Error: " . $news_insert_sql . "<br>" . mysqli_error($conn);
	}



	mysqli_close($conn);







?>