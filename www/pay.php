<?php require 'query/query.php';
session_start();
	if(!isset($_SESSION['products'])){
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Магазин комиксов</title>
	<link rel="stylesheet" href="template/css/css.css">
	<link rel="stylesheet" href="template/css/card.css">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Lobster&family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>
<body>
	
		<?php include 'layouts/header.php';

		session_start();
		if(isset($_SESSION['user'])){
			$user=getInfoUser($_SESSION['user']);
		} ?>
		<?php  
			$comics=getGoodsInCard();
			foreach ($comics as $comicsItem): 
				$total_price_in_card+= $comicsItem["total_price"] ;
			endforeach; ?>
		<?php require 'pay-run.php';?>
		<div class="main-container">
			<div class="section-menu">
					<ul class="section-menu-list">
						<li class="section-menu-item">Оформление заказа</li>
					</ul>
				</div>
			<?php  if($message==""){?>
			<section class="section">
				<form method="post" action="#" enctype="multipart/form-data" class="form-goods">
					<p>ФИО</p>
					<input type="text" name="name" value="<?php  echo $user['name'];?>" required>
					<p>Email</p>
					<input type="email" name="email" value="<?php  echo $user['email'];?>" required>
					<p>Адрес доставки</p>
					<input type="text" name="address" value="" required>
					<p>Способ оплаты</p>
					<label><input type="radio" name="type-pay" value="1" required>Картой при получении</label>
					<label><input type="radio" name="type-pay" value="2" required>Наличными при получении</label>

					<input class="submit" type="submit" name="pay" value="Оформить">
				</form>
				<div class="card-goods">
					<?php
					foreach ($comics as $comicsItem): ?>
					<div class="card-good">
						<div class="image-title">
							<h1 class="name-good-in-card"><?php  echo $comicsItem["name"]?></h1>
						</div>
						<div class="calc-sum">
							<span class="calc">
								<span><?php  echo $comicsItem["count"]?></span>
								<span>x</span>
								<span><?php  echo $comicsItem["price"]?>  руб.</span>
							</span>
							<span class="cost">
								<?php  echo $comicsItem["total_price"] ?>руб.
							</span>
						</div>
					</div>
						<?php
						endforeach; ?>
					<div class="pay">
						<span>
							Итог:
						</span>
						<span>
							<?php echo $total_price_in_card ?>  руб.
						</span>
					</div>
				</div>		
			</section>
		<?php  }else{
			echo $message;
		}
			?>
		</div>
		<?php include 'layouts/footer.php' ?>
		
</body>
</html>