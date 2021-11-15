<?php
		$host					= 'localhost:3307';
		$user 				= 'root';
		$password 		= '';
		$db 					= 'products';

		$data 				= mysqli_connect($host, $user, $password, $db);
		$category			= mysqli_query($data, "SELECT * FROM `category`");
    // mysqli_set_charset($data,"utf8");
    if (!$data) {
			die("Không kết nối :" . mysqli_connect_error());
		}
?>