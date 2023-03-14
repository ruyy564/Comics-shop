<?php require '../query/query.php';?>
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
				
				<table class="table-info">
					<tr>
						<th>id</th>
						<th>name</th>
						<th>price</th>
						<th>description</th>
						<th>category</th>
						<th>pages</th>
						<th>cover</th>
						<th>id_publisher</th>
						<th>binding</th>
						<th>isbn</th>
						<th>date</th>
					</tr>
					<?php
						$products =get_books();
						foreach ($products as $product) {
							?>
							<tr>
								<td><?=$product[0]?></td>
								<td><?=$product[1]?></td>
								<td><?=$product[2]?></td>
								<td><?=$product[3]?></td>
								<td><?=$product[4]?></td>
								<td><?=$product[5]?></td>
								<td><?=$product[6]?></td>
								<td><?=$product[7]?></td>
								<td><?=$product[8]?></td>
								<td><?=$product[9]?></td>
								<td><?=$product[10]?></td>
								<td><a href="update.php?id=<?=$product[0]?>">Изменить</a></td>
							</tr>
							<?php
						}
					?>
				</table>
				<form method="post" action="create.php" enctype="multipart/form-data" class="form-goods">
					<p>Название</p>
					<input type="text" name="name" value="Введите название" required>
					<p>Цена</p>
					<input type="number" name="price" step="0.01" value="0.00" required>
					<p>Описание</p>
					<textarea  name="description" required></textarea>
					<p>Категория</p>
					<select size="1"  name="category">
					<option selected disabled>Выберите категорию</option>
					<?php
						$count=0;
						$categories =mysqli_query($db,"SELECT * FROM `categories`");
						$categories =mysqli_fetch_all($categories);
						foreach ($categories as $category) {
							?>
							<option value="<?=$count?>"><?=$category[1]?></option>
							<?php
							$count++;
						}
					?>
					</select>
					<p>Количество страниц</p>
					<input type="number" name="pages"  value="0" required>
					<p>Обложка</p>
					<input type="file" name="cover">
					<p>Издательство</p>
					<select size="1"  name="id_publisher">
					<option selected disabled>Выберите издательство</option>
					<?php
						$count=0;
						$publishers =mysqli_query($db,"SELECT * FROM `publishers`");
						$publishers =mysqli_fetch_all($publishers);
						foreach ($publishers as $publisher) {
							?>
							<option value="<?=$count?>"><?=$publisher[1]?></option>
							<?php
							$count++;
						}
					?>
					</select>
					<p>Переплет</p>
					<select size="1"  name="binding">
					<option selected disabled>Выберите переплет</option>
					<?php
						$count=0;
						$binders =mysqli_query($db,"SELECT * FROM `binders`");
						$binders =mysqli_fetch_all($binders);
						foreach ($binders as $binder) {
							?>
							<option value="<?=$count?>">
								<?=$binder[1]?>
							</option>
							<?php
							$count++;
						}
					?>
					</select>
					<p>ISBN</p>
					<input type="text" name="isbn" value="3453-67867-457" required>
					<input type="submit" value="Добавить">
				</form>
		</section>
		</div>
	
</body>
</html>