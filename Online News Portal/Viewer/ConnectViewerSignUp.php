
<?php


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "online news portal";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	} 

    $select = "SELECT ViewerEmail From viewer Where ViewerEmail  ='$_POST[ViewerEmail]'";
    $result = mysqli_query($conn, $select);

    $rowNumber=mysqli_num_rows($result);

    $Password=$_POST['ViewerPassword'];
    $ConfirmPassword=$_POST['ViewerConfirmPassword'];
     
    if ($rowNumber==0 && $Password == $ConfirmPassword) {
     	
    	
    	$sql = "INSERT INTO viewer (ViewerFirstName, ViewerLastName, ViewerEmail, ViewerPassword) 
       VALUES ('$_POST[ViewerFirstName]', '$_POST[ViewerLastName]', '$_POST[ViewerEmail]', '$_POST[ViewerPassword]')";


		if (mysqli_query($conn, $sql)) {
    		session_start();
    		$_SESSION['ViewerEmail']=$_POST['ViewerEmail'];
    		header("location:/Online News Portal/Viewer/ViewerHomepage.php");
    		
	
		}
		else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
		
      	
    } 

   else if($rowNumber==0 && $Password != $ConfirmPassword){   	

		mysqli_close($conn);
		echo "
		<script>
			alert('Incorrect Password');
			location.href = '/Online News Portal/Viewer/ViewerSignUp.php';
		</script>";


	}

	else if($rowNumber!=0 && $Password == $ConfirmPassword){   	

    	mysqli_close($conn);
    	echo "
		<script>
			alert('Username is already taken');
			location.href = '/Online News Portal/Viewer/ViewerSignUp.php';
		</script>";
		



	}

	else if($rowNumber!=0 && $Password != $ConfirmPassword){   	

    	
		mysqli_close($conn);
    	echo "
		<script>
			alert('Username is already taken and Incorrect Password');
			location.href = '/Online News Portal/Viewer/ViewerSignUp.php';
		</script>";
		

	}





?>



