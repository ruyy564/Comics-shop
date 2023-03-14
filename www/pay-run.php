<?php 
if(isset($_POST['pay'])){
	$email=$_POST['email'];
	$typePay=$_POST['type-pay'];
	$address=$_POST['address'];
	session_start();
	if(isset($_SESSION['user'])){
		addOrder($_SESSION['user'],$total_price_in_card,$email,$typePay,$address,1);
	}else{
		addOrder("",$total_price_in_card,$email,$typePay,$address,1);
	}
	unset($_SESSION['products']);
	$message="Ваш заказ оформлен";
}

 ?>