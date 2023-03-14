<?php require 'log-f.php';
	session_start();
	$orders=get_orders($_SESSION['user']);
	$user=getInfoUser($_SESSION['user']);
	if(!isset($_SESSION['user'])){
		header("Location: log.php");
	}
	$errors=false;
	if(isset($_POST['change-password'])){
		$email=$user['email'];
		$password2=$_POST['pwd-new'];
		$password=$_POST['pwd-old'];
		if(!checkLogin($email,$password)){
			$errors[]="Введен неверный пароль";
		}
		if(checkPasswords($password,$password2)){
			$errors[]="Введен тот же пароль";
		}
		if(!checkLengthPassword($password2)){
			$errors[]="Пароль должен содержать минимум 2 символа";
		}
		if($errors==null){
			changePassword($_SESSION['user'],$password2);
			 $message="Пароль изменен"; 
		}
			
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Магазин комиксов</title>
	<link rel="stylesheet" href="template/css/css.css">
	<link rel="stylesheet" href="template/css/account.css">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Lobster&family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>
<body>
	
		<?php include 'layouts/header.php';
		 ?>
		<div class="main-container">
			<section class="section">
				<div class="section-menu">
					<ul class="section-menu-list">
						<li class="section-menu-item">Личный кабинет</li>
					</ul>
				</div>
				<?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                        
                    </ul>
                <?php endif; ?>
                <?php echo $message; ?>
				<div class="account">
					<div class="profil">
						<h1>Ваш профиль</h1>
						<div class="person">
							<span>Имя:<?php  echo $user['name'];?></span>
							<span>Email:<?php  echo $user['email'];?></span>
						</div>
						<div class="edit">
							<span>Смена пароля</span>
							<form action="#" method="post" class="form-goods">
								<input type="password" name="pwd-old" placeholder="Пароль"" value=""/>
								<input type="password" name="pwd-new" placeholder="Пароль"" value=""/>
								<input type="submit" name="change-password" class="submit" value="Изменить пароль" />
							</form>
							<a href="" class="back">Назад</a>
						</div>
						<a href="" class="change-profil">Сменить пароль</a>
						<?php if($_SESSION['user']==1){?>
							<a href="admin.php" >Админ панель</a>
						<?php } ?>
						<a href="exit.php" class="exit">Выход</a>
					</div>
					<div class="orders">
						<h1>Ваши заказы</h1>
						<?php
						 foreach ($orders as $order): ?>
						<div class="order">
							<span>Номер заказа:<?php  echo $order['id'];?></span>
							<span>Сумма:<?php  echo $order['price'];?>руб.</span>
							<span>Адрес:<?php  echo $order['address'];?></span>
							<span>Статус:<?php  echo $order['status'];?></span>
						</div>
						<?php
						endforeach; 
						if(!$orders){
							echo "Ваш список заказов пуст";
						}?>
					</div>
				</div>
			</section>
		</div>
		<?php include 'layouts/footer.php' ?>
</body>
</html>