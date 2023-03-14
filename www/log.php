<?php require 'log-f.php';
?>
<?php require 'sing-up.php';
?>
<?php require 'reg.php';
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
	
		<?php include 'layouts/header.php' ?>
		<div class="main-container">
			<section class="section">
				<div class="section-menu">
					<ul class="section-menu-list">
						<li class="section-menu-item">Авторизация/регистрация</li>
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
                <div class="log-reg">
                	<div class="signup-form">
						<?php 
					 if(isset($_SESSION['user'])){
						header("Location: account.php");
					} ?>
					
						<h2>Вход на сайт</h2>
						<form action="#" method="post" class="form-goods">
							<input type="email" name="email" placeholder="E-mail" value="" required />
							<input type="password" name="password" placeholder="Пароль" value="" required/>
							<input type="submit" name="log" class="submit" value="Вход" />
						</form>
					</div>
					<div class="signup-form">
						<h2>Регистрация на сайте</h2>
						<form action="#" method="post" class="form-goods">
							<input type="text" name="nameReg" placeholder="Имя" value="" required/>
							<input type="email" name="emailReg" placeholder="E-mail" value="" required/>
							<input type="password" name="passwordReg" placeholder="Пароль"" value="" required/>
							<input type="password" name="password2Reg" placeholder="Пароль"" value="" required/>
							<input type="submit" name="reg" class="submit" value="Регистрация" />
						</form>
					</div>
                </div>
				
			</section>
		</div>
		<?php include 'layouts/footer.php' ?>
</body>
</html>