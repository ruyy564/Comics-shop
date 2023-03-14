<?php 
if(isset($_POST['reg'])){
	$email=$_POST['emailReg'];
	$password=$_POST['passwordReg'];
	$password2=$_POST['password2Reg'];
	$name=$_POST['nameReg'];

	$errors=false;
	if(checkPasswords($password,$password2)==false){
		$errors[]='Пароли не совпадают';
	}
	if(checkLengthPassword($password)==false){
		$errors[]='Пароль должен быть от 6 символов';
	}
	$userId=checkReg($email);
	if($userId==true){
		$errors[]='Пользоваль с таким email уже существует';
	}else{
		if($errors==null){
			$message="Регистрация прошла успешно";
			register($name, $email, $password);
		}
		
	}
}
 ?>