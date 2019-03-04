<?php
	
	require_once('connection.php');

	$category_id	= $_REQUEST['category_id'];
	$user_id		= $_REQUEST['user_id'];
	$username		= $_REQUEST['username'];   
	$author			= $_REQUEST['author'];
	$title			= $_REQUEST['title'];
	$content		= $_REQUEST['content'];
//	$latitude		= $_REQUEST['latitude'];
//	$longitude		= $_REQUEST['longitude'];
	$image			= $_REQUEST['image'];
	$phone			= $_REQUEST['phone'];
	$tanggal		= $_REQUEST['tanggal'];
    $signature		= $_REQUEST['signature'];
	$date			= date('Y-m-d H:i:s');
	

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
	
	// insert content
	$query		= mysqli_query($conn, "INSERT INTO content ( category_id, user_id, title, author, content, image, created, updated, status, view, love,phone,tanggal,signature) VALUES ('$category_id', '$user_id', '$title', '$author', '$content', '$actualpath', '$date', '$date', 'confirm', '0', '0','$phone','$tanggal','$actualpaths') ");

	if($query) {
	     file_put_contents($path,base64_decode($image));
	     file_put_contents($paths,base64_decode($signature));
	    echo json_encode(array( 'response'=>'success' ));
	} else {
		echo json_encode(array( 'response'=>'failed' ));
	}
?>