<?php

	include_once('mysql.php');
	
	$mysql = new MySQL('localhost', 'root', 'password', 'team');
	
	// get all posts
	try{
		$posts = $mysql->get('users');
		print_r($posts);
		echo $mysql->num_rows(); // number of rows returned
	}catch(Exception $e){
		echo 'Caught exception: ', $e->getMessage();
	}
?>