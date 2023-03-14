<?php 
session_start();
if(isset($_POST['log'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	$errors=false;

	$userId=checkLogin($email,$password);

	if($userId==false){
		$errors[]='Email и/или пароль введены неверно';
	}else{
		$_SESSION['user']=$userId;
		header("Location: account.php");
	}
}

 ?>