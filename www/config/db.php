<?php  

	function getConnection(){
		$paramsPath='config/data_base.php';
		$params=include($paramsPath);

		$dns="mysql:host={$params['host']};dbname={$params['dbname']}";
		$db=new PDO($dns,$params['user'],$params['password']);

		return $db;
	}
	
?>