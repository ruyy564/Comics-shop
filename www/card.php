
<?php require 'query/query.php';
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
	
		<?php include 'layouts/header.php' ?>
		<div class="main-container">
			<div class="section-menu">
					<ul class="section-menu-list">
						<li class="section-menu-item">Корзина</li>
					</ul>
			</div>
			<section class="section">
				<div class="card-goods">
					<?php 
					$comics=getGoodsInCard();
					if($comics!=0){
					$total_price_in_card=0;
					foreach ($comics as $comicsItem): ?>
					<div class="card-good">
						<div class="image-title">
							<h1 class="name-good-in-card"><?php  echo $comicsItem["name"]?></h1>
						</div>
						<div class="calc-sum">
							<span class="calc">
								<span class="<?=$comicsItem['id']?>" ><?php  echo $comicsItem["count"]?> </span>
								<span>x</span>
								<span class="price_<?=$comicsItem['id']?>"><?php  echo $comicsItem["price"]?> </span>
								<span>руб.</span>
							</span>
							<span>
								<span class="cost_<?=$comicsItem['id']?>">
									<?php  echo $comicsItem["total_price"] ?>
								</span>
								<span>руб.</span>
							</span>
							
						</div>
						<div class="btn-card">
							<button type="button" data-id="<?=$comicsItem['id']?>" class="icon-minus">
								<svg class="icon" aria-hidden="true" data-prefix="fas" data-icon="minus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
									<path fill="currentColor" d="M424 318.2c13.3 0 24-10.7 24-24v-76.4c0-13.3-10.7-24-24-24H24c-13.3 0-24 10.7-24 24v76.4c0 13.3 10.7 24 24 24h400z">
									</path>
								</svg>
								
							</button>
							<span class="p<?=$comicsItem['id']?>"><?php  echo $comicsItem["count"]?></span>
							<button type="button" data-id="<?=$comicsItem['id']?>"  class="icon-plus">
								<svg class="icon" aria-hidden="true" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
									<path fill="currentColor" d="M448 294.2v-76.4c0-13.3-10.7-24-24-24H286.2V56c0-13.3-10.7-24-24-24h-76.4c-13.3 0-24 10.7-24 24v137.8H24c-13.3 0-24 10.7-24 24v76.4c0 13.3 10.7 24 24 24h137.8V456c0 13.3 10.7 24 24 24h76.4c13.3 0 24-10.7 24-24V318.2H424c13.3 0 24-10.7 24-24z">
									</path>
								</svg>
							</button>
							<button type="button" data-id="<?=$comicsItem['id']?>" class="icon-delete">
								<svg class="icon" aria-hidden="true" data-prefix="far" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
									<path fill="currentColor" d="M381.6 80l-34-56.7C338.9 8.8 323.3 0 306.4 0H205.6c-16.9 0-32.5 8.8-41.2 23.3l-34 56.7H40c-13.3 0-24 10.7-24 24v12c0 6.6 5.4 12 12 12h16.4L76 468.4c2.3 24.7 23 43.6 47.8 43.6h264.5c24.8 0 45.5-18.9 47.8-43.6L467.6 128H484c6.6 0 12-5.4 12-12v-12c0-13.3-10.7-24-24-24h-90.4zm-176-32h100.8l19.2 32H186.4l19.2-32zm182.6 416H123.8L92.6 128h326.7l-31.1 336z">
										
									</path>
								</svg>
							</button>
						</div>
					</div>

					<?php
						$total_price_in_card+= $comicsItem["total_price"] ;
						endforeach; ?>
					</div>
				<div class="pay">
					<span>
						Итог:
					</span>
					<span>
						<span class="total-price-in-card">
						<?php
						echo $total_price_in_card ?> 
						</span>
						<span>руб.</span>
					</span>
					<a href="pay.php" class="good-button">
						<span>Оформить заказ</span>
					</a>
				</div>
				<?php }else{
					echo "В корзине нет товаров";
				} ?>
			</section>
		</div>
		<?php include 'layouts/footer.php' ?>
</body>
</html>