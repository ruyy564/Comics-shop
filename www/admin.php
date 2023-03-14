<?php require 'query/query.php';
session_start();
if(!isset($_SESSION['user'])){
	header("Location: log.php");
	}
if($_SESSION['user']!=1){
	header("Location: account.php");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Магазин комиксов</title>
	<link rel="stylesheet" href="template/css/css.css">
</head>
<body>
	
		
		<div class="main-container">
		<section class="section">
			<div class="section-menu">
				<h1 class="section-title">Админ панель</h1>
			</div>
				<a href="index.php" >На главную</a>
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
								<td><?=$product['id']?></td>
								<td><?=$product['name']?></td>
								<td><?=$product['price']?></td>
								<td><?=$product['description']?></td>
								<td><?=$product['category']?></td>
								<td><?=$product['pages']?></td>
								<td><?=$product['cover']?></td>
								<td><?=$product['id_publisher']?></td>
								<td><?=$product['binding']?></td>
								<td><?=$product['isbn']?></td>
								<td><?=$product['date']?></td>
								<td><a href="delete.php?id=<?=$product['id']?>">Удалить</a></td>
							</tr>
							<?php
						}
					?>
				</table>
				<form method="post" action="create.php" enctype="multipart/form-data" class="form-adm">
					<p>Название</p>
					<input type="text" name="name" value="Введите название" required>
					<p>Цена</p>
					<input type="number" name="price" step="0.01" value="0.00" required>
					<p>Описание</p>
					<textarea  name="description" required>scs</textarea>
					<p>Категория</p>
					<select size="1"  name="category">
					<?php
						$categories =get_categories();
						foreach ($categories as $category) {
							?>
							<option value="<?=$category['id']?>"><?=$category['name']?></option>
							<?php
						}
					?>
					</select>
					<p>Количество страниц</p>
					<input type="number" name="pages"  value="0" required>
					<p>Обложка</p>
					<input type="file" name="cover">
					<p>Издательство</p>
					<select size="1"  name="id_publisher">
					<?php
						$publishers =get_publishers();
						foreach ($publishers as $publisher) {
							?>
							<option value="<?=$publisher['id']?>"><?=$publisher['name']?></option>
							<?php
						}
					?>
					</select>
					<p>Переплет</p>
					<select size="1"  name="binding">
					<?php
						$binders =get_binders();
						foreach ($binders as $binder) {
							?>
							<option value="<?=$binder['id']?>">
								<?=$binder['name']?>
							</option>
							<?php
						}
					?>
					</select>
					<p>ISBN</p>
					<input type="text" name="isbn" value="3453-67867-457" required>
					<p>Авторы</p>
					<div>
						<?php
							$authors =get_authors();
							$count=0;
							foreach ($authors as $author) {
								if($count==0){?>
								<input type="checkbox" name="authors[]" value="<?=$author['id']?>" checked><?=$author['name']?><Br>
								<?php
								}else{?>
									<input type="checkbox" name="authors[]" value="<?=$author['id']?>"><?=$author['name']?><Br>
								<?php }
								$count++;
							}
						?>
					</div>
					<p>Жанры</p>
					<div>
						<?php
							$genres =get_genres();
							$count=0;
							foreach ($genres as $genre) {
								if($count==0){?>
								<input type="checkbox" name="genres[]" value="<?=$genre['id']?>" checked><?=$genre['name']?><Br>
								<?php
								}else{?>
									<input type="checkbox" name="genres[]" value="<?=$genre['id']?>"><?=$genre['name']?><Br>
								<?php }
								$count++;
							}
						?>
					</div>
					<input type="submit" value="Добавить">
				</form>
		</section>
		</div>
	
</body>
</html>