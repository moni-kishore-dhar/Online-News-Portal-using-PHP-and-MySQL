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

$sql = "SELECT * FROM viewer WHERE ViewerEmail='$_POST[ViewerEmail]' and ViewerPassword='$_POST[ViewerPassword]'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    session_start();
    $_SESSION['ViewerEmail']=$_POST['ViewerEmail'];
    header("location:/Online News Portal/Viewer/ViewerHomepage.php");
     

} 
else {
    mysqli_close($conn);

    echo "
		<script>
			alert('Invalid Username or Password');
			location.href = '/Online News Portal/Public/Homepage.php';
		</script>";


	}

mysqli_close($conn);
?>
