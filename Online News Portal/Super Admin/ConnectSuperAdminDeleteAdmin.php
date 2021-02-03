<?php
	$AdminId= $_GET['var'];

	
    include '../DatabaseConnection.php';

	$sql_delete_admin = "DELETE FROM admin WHERE AdminId='$AdminId'";
    $sql_delete_admin = mysqli_query($conn, $sql_delete_admin);

    header("location:/Online News Portal/Super Admin/SuperAdminManageAdminPannel.php");

?>