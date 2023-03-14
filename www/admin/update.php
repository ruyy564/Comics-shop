<?php 
	require '../db.php';
	$product_id=$_GET['id'];
	$product=mysqli_query($db, "SELECT * FROM books WHERE `id` = '$product_id'");
	$product=mysqli_fetch_assoc($product);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Магазин комиксов</title>
	<link rel="stylesheet" href="../css.css">
</head>
<body>
	
		
		<div class="main-container">
		<section class="section">
			<div class="section-menu">
				<h1 class="section-title">Админ панель</h1>
			</div>
				<form method="post" action="create.php" enctype="multipart/form-data" class="form-goods">
					<p>Название</p>
					<input type="text" name="name" value="<?=$product['name']?>" required>
					<p>Цена</p>
					<input type="number" name="price" value="<?=$product['price']?>" required>
					<p>Описание</p>
					<textarea  name="description" required><?=$product['description']?></textarea>
					<p>Категория</p>
					<input type="text" name="category" value="<?=$product['category']?>" required>
					<p>Количество страниц</p>
					<input type="number" name="pages" value="<?=$product['pages']?>" required>
					<p>Обложка</p>
					<input type="file" name="cover" value="<?=$product['cover']?>">
					<p>Издательство</p>
					<input type="text" name="id_publisher" value="<?=$product['id_publisher']?>"  required>
					<p>Переплет</p>
					<input type="text" name="binding" value="<?=$product['binding']?>"  required>
					<p>ISBN</p>
					<input type="text" name="isbn" value="<?=$product['isbn']?>" required>
					<input type="submit" value="Добавить">
				</form>
		</section>
		</div>
	
</body>
</html>