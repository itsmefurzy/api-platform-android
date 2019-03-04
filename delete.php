<?php
    if(isset($_REQUEST["content_id"])){
	require_once('connection.php');
	$content_id	= $_REQUEST['content_id'];
	
	// delete
	$query = mysqli_query($conn, "DELETE FROM content WHERE content_id='$content_id' ") or die("something must check".mysqli_error($conn));

	if($query) {
	    echo json_encode(array( 'response'=>'success' ));
	} else {
	    echo json_encode(array( 'response'=>'failed' ));
	}
}else {
	    echo json_encode(array( 'response'=>'failed' ));
	}
?>