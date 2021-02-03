
<?php
include '../DatabaseConnection.php';

$sql = "SELECT * FROM admin WHERE AdminEmail='$_POST[AdminEmail]' and AdminPassword='$_POST[AdminPassword]'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    session_start();
    $_SESSION['AdminEmail']=$_POST['AdminEmail'];
    header("location:/Online News Portal/Admin/AdminHomepage.php");
     

} 
else {
    mysqli_close($conn);

    echo "
		<script>
			alert('Invalid Username or Password');
			location.href = '/Online News Portal/Admin/AdminSignIn.php';
		</script>";


	}

mysqli_close($conn);
?>
