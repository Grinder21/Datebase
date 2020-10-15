<?php
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);
	include_once('mysql.php');
	
	$mysql = new MySQL('localhost', 'root', 'password', 'team');

	print_r($mysql);
	
	// get all posts
	/*
	try{
		$posts = $mysql->get('users');
		print_r($posts);
		echo $mysql->num_rows(); // number of rows returned
	}catch(Exception $e){
		echo 'Caught exception: ', $e->getMessage();
	}
	*/
?>