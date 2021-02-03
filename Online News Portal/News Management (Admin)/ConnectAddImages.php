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
 
    	// Insert record
     	$sql = "insert into news_image (NewsImage, NewsId) values('".$NewsImage."','$NewsId ')";
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
          		location.href = '/Online News Portal/News Management (Admin)/AddImages.php?var=$NewsId';
        	</script>";

  	}

  	mysqli_close($conn);
 

?>