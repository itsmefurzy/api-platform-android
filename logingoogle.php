<?php
	
	require_once('connection.php');

	$username	= $_REQUEST['username'];   
	$email=$_REQUEST["email"];
	$password	= md5($_REQUEST['password']); 
	$picture	= ($_REQUEST['picture']); 
	$log		= 0;
	$date		= date('Y-m-d H:i:s');
	
	// select user
	$query1 = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' and email='$email' AND status='confirm'");
    	$mysql=mysqli_fetch_assoc($query1);
	  if(mysqli_num_rows($query1)<=(int)0){

		// get data user
	    $query2 = mysqli_query($conn, "INSERT INTO users (username, email, created, updated, status,picture) VALUES ('$username', '$email',  '$date', '$date', 'confirm','$picture') ");

	    echo json_encode(array(
	    	'response'		=>'success',
//	    	'user_id'		=> $user_id,
	    	'username'		=> $username,
	    	'email'			=> $email,
//	    	'phone'			=> $phone,
	    	'picture'		=> $mysql["picture"],
//	    	'created'		=> $created,
//	    	'updated'		=> $updated
	    	));

	} else {
	    echo json_encode(array( 'response'=>'available data' ));
	}
?>