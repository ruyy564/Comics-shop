<?php 
	require '../db.php';

	$name =$_POST['name'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$category=(int)$_POST['category'];
	$pages=$_POST['pages'];
	$cover=$_FILES['cover']['name'];
	$id_publisher=(int)$_POST['id_publisher'];
	$binding=(int)$_POST['binding'];
	$isbn=$_POST['isbn'];


	mysqli_query($db,"INSERT INTO `books`(`id`, `name`, `price`, `description`, `category`, `pages`, `cover`, `id_publisher`, `binding`, `isbn`, `date`) VALUES (NULL,'$name','$price', '$description','$category','$pages', '$cover','$id_publisher','$binding', '$isbn', NULL)");
 	header('location:index.php');
 ?>