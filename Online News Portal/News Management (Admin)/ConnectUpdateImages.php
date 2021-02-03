<?php
	

    include '../DatabaseConnection.php';

    $NewsId= $_GET['var'];


  	$NewsImage = $_FILES['NewsImage']['name'];
  	$target_path = "../Images/";
  	$target_file = $target_path . basename($_FILES["NewsImage"]["name"]);

  	// Select file type
  	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  	// Valid file extensions
  	$extensions_arr = array("jpg","jpeg","png","gif");

  	// Check extension
  	if( in_array($imageFileType,$extensions_arr) ){
 
    	
      $sql_in_news_image = "SELECT * FROM news_image WHERE NewsId='$NewsId'";
      $result_in_news_image = mysqli_query($conn, $sql_in_news_image);
      

      if (mysqli_num_rows($result_in_news_image) > 0) {
        
        while($row = mysqli_fetch_assoc($result_in_news_image)) {
              $NewsImageId=$row["NewsImageId"];
              $OldNewsImage=$row["NewsImage"];

        }

        $Image_IN_Folder = "../Images/$OldNewsImage";
        //Deleting Old Image from folder
        unlink($Image_IN_Folder);
        
        $sql =" UPDATE news_image SET NewsImage = '".$NewsImage."', NewsId = '$NewsId' WHERE NewsImageId = '$NewsImageId'";

   
      }
      else{
        $sql = "insert into news_image (NewsImage, NewsId) values('".$NewsImage."','$NewsId')";

      }
    
     	
    	mysqli_query($conn,$sql);
  
    	// Upload file
    	move_uploaded_file($_FILES['NewsImage']['tmp_name'],$target_path.$NewsImage);
    	
      header("location:/Online News Portal/Admin/AdminSinglePageNewsViewModule.php?var=$NewsId");
    
	}

  	else{
  		mysqli_close($conn);
    	echo "
    		<script>
        		alert('Select an valid image');
          		location.href = '/Online News Portal/News Management (Admin)/UpdateImages.php?var=$NewsId';
        	</script>";

  	}

  	mysqli_close($conn);
 

?>