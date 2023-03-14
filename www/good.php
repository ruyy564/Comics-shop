<?php require 'query/query.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Магазин комиксов</title>
	<link rel="stylesheet" href="template/css/css.css">
	<link rel="stylesheet" href="template/css/good.css">
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Lobster&family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>
<body>
	
		<?php 
			include 'layouts/header.php';
			$comics= get_book_by_id($_GET['id']);
		?>
		<div class="main-container">
			<section class="section">
					<div class="main">
						<div class="main-image-good">
						<h1><?php  echo $comics["name"]?></h1>
						<img class="main-img"src="template/img/<?php  echo $comics["cover"]?>" alt="">
						</div>
						<div class="main-info-good">
							<ul>
								<li><h1><?php  echo $comics["name"]?></h1></li>
								<li>
									<span class="cateogry">
										Категория:
									</span>
									<span class="category-good">
										<?php  echo get_category_by_id($comics["category"])?>
									</span>
								</li>
								<li>
									<span class="cateogry">
										Издатель:
									</span>
									<span class="category-good">
										<?php  echo get_publisher_by_id($comics["id_publisher"])?>
									</span>
								</li>
								<li>
									<span class="cateogry">
										Количество страниц:
									</span>
									<span class="category-good">
										<?php  echo $comics["pages"]?>
									</span>
								</li>
								<li>
									<span class="cateogry">
										Обложка:
									</span>
									<span class="category-good">
										<?php  echo get_binders_by_id($comics["binding"])?>
									</span>
								</li>
								<li>
									<span class="cateogry">
										Жанр:
									</span>
									<span class="category-good">
										<?php  get_genres_by_id($_GET['id'])?>
									</span>
								</li>
								<li>
									<span class="cateogry">
										Автор:
									</span>
									<span class="category-good">
										<?php  get_authors_by_id($_GET['id'])?>
									</span>
								</li>
								<li>
									<span class="cateogry">
										ISBN:
									</span>
									<span class="category-good">
										<?php  echo $comics["isbn"]?>
									</span>
								</li>
							</ul>
						</div>	
						<div class="main-buy">
							<span class="const">Цена</span>
							<span  class="good-price"><?php  echo $comics["price"]?> руб</span>
							<a href="#" data-id="<?=$_GET['id']?>" class="good-button-buy">
								<svg class="icon-good" aria-hidden="true" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z"></path></svg>
								<span  class="good-title">В корзину</span>
							</a>	
						</div>
					</div>
					<div class="declaration">
						<h1>Описание</h1>
						<p><?php  echo $comics["description"]?></p>
					</div>
			</section>
		</div>
		<?php include 'layouts/footer.php' ?>
</body>
</html>