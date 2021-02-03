<?php
	include '../DatabaseConnection.php';
	$NewsId= $_GET['var'];
  	$sql = "SELECT * FROM news_image WHERE NewsId='$NewsId'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
        	$NewsImage=$row["NewsImage"];
       	}

       	$Image_IN_Folder = "../Images/$NewsImage";
        //Deleting Image from folder
       	unlink($Image_IN_Folder);
       		
       	
       	//Deleting row containing this image file from database
       	$sql_delete_row = "DELETE FROM news_image WHERE NewsId='$NewsId'";
       	$result_delete_row = mysqli_query($conn, $sql_delete_row);
        header("location:/Online News Portal/Admin/AdminSinglePageNewsViewModule.php?var=$NewsId");
    }

    else{
        mysqli_close($conn);
    	echo "
    		<script>
        		alert('There is no picture in this news');
          		location.href = '/Online News Portal/Admin/AdminSinglePageNewsViewModule.php?var=$NewsId';
        	</script>";


    }

?>