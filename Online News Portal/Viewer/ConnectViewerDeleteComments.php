<?php
	$CommentsId= $_GET['CommentsId'];
	$NewsId= $_GET['NewsId'];


    include '../DatabaseConnection.php';

	$sql_delete_comments = "DELETE FROM comments WHERE CommentsId='$CommentsId'";
    $result_delete_comments = mysqli_query($conn, $sql_delete_comments);

    header("location:/Online News Portal/Viewer/ViewerSinglePageNewsViewModule.php?var=$NewsId");

?>