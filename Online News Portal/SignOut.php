<?php
	session_start();
	session_unset();
	session_destroy();
	header("location:/Online News Portal/Public/Homepage.php");
?>
