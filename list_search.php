<?php 

	require_once('connection.php');

	$title 			= $_REQUEST['title'];


	$sql 	= "SELECT con.*, cat.name AS category FROM content AS con JOIN category AS cat ON con.category_id = cat.category_id WHERE con.title like '%".$title."%' AND con.status='confirm' ORDER BY con.content_id DESC";



	// echo $sql; die();
	$query 	= mysqli_query($conn, $sql);


	$result = array();
	while($row = mysqli_fetch_array($query)){
		$created = date("d/m/y h:i A", strtotime($row['created']));
		$updated = date("d/m/y h:i A", strtotime($row['updated']));

    	$img = $row['image'];
		if (!file_exists("../blogapp/images/".$img)) {
			$img = "";
		}

		array_push($result,array(
			'content_id'	=> $row['content_id'],
			'category_id'	=> $row['category_id'],
			'category'		=> strtoupper($row['category']),
			'author'		=> $row['author'],
			'title'			=> $row['title'],
			'image'			=> $img,
			'created'		=> $created,
			'updated'		=> $updated,
			'status'		=> $row['status'],
			'phone'		    => $row['phone'],
			'tanggal'	    => $row['tanggal'],
			'view'			=> $row['view'],
			'love'			=> $row['love'],
		));
	}



	echo json_encode(array('result'=>$result));
	mysqli_close($conn);

 ?>