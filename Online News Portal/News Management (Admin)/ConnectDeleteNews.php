<?php
	include '../DatabaseConnection.php';
	$NewsId= $_GET['var'];
  	$sql = "SELECT * FROM news_image WHERE NewsId='$NewsId'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
        	$NewsImage=$row["NewsImage"];     //Need it for unlink the image
       	}

       	$Image_IN_Folder = "../Images/$NewsImage";
        //Deleting Image from folder
       	unlink($Image_IN_Folder);	
       	//Deleting row containing this image file from database
       	$sql_delete_image_row = "DELETE FROM news_image WHERE NewsId='$NewsId'";
       	$result_delete_image_row = mysqli_query($conn, $sql_delete_image_row);
    }

    $sql_delete_news = "DELETE FROM news WHERE NewsId='$NewsId'";
    $result_delete_news = mysqli_query($conn, $sql_delete_news);

    header("location:/Online News Portal/Admin/AdminHomepage.php");
        

    

?>