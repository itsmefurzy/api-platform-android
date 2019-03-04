<?php
	require_once('connection.php');

	$user_id	 = $_REQUEST['user_id'];
	$content_id	 = $_REQUEST['content_id'];
	$category_id = $_REQUEST['category_id'];
	$title		 = $_REQUEST['title'];
	$author 	 = $_REQUEST['author'];
	$content	 = $_REQUEST['content'];
	$phone		 = $_REQUEST['phone'];
	$tanggal	 = $_REQUEST['tanggal'];
	$image		 = $_REQUEST['image'];
	$signature	 = $_REQUEST['signature'];
	
	
	
    $filename   = date('dmY');
    $rand       = uniqid();
	$id 		= $filename.$rand;
	$root 		= $_SERVER['DOCUMENT_ROOT'];
	$path 		= $root."/blogapp/images/$id.png";
	$actualpath = "$id.png";
	
	$filenames   = date('dmY');
    $rands       = uniqid();
	$ids 		= $filename.$rand;
	$roots 		= $_SERVER['DOCUMENT_ROOT'];
	$paths		= $root."/blogapp/images_signature/$id.png";
	$actualpaths = "$id.png";


	// update user
	$query = mysqli_query($conn, "UPDATE content SET title = '$title',  author = '$author', category_id = '$category_id', content='$content', phone='$phone', tanggal='$tanggal', image='$actualpath', signature='$actualpaths' WHERE content_id='$content_id'");
	if($query) {
	    file_put_contents($path,base64_decode($image));
	    file_put_contents($paths,base64_decode($signature));
	    echo json_encode(array( 'response'=>'success' ));
	} else {
	    echo json_encode(array( 'response'=>'failed' ));
	}
?>