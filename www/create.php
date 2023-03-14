<?php 
	require 'query/query.php';

	$name =$_POST['name'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$category=(int)$_POST['category'];
	$pages=$_POST['pages'];
	$cover=$_FILES['cover']['name'];
	$id_publisher=(int)$_POST['id_publisher'];
	$binding=(int)$_POST['binding'];
	$isbn=$_POST['isbn'];
	$authors=$_POST['authors'];
	$genres=$_POST['genres'];
	$id= addGoods($name,$price,$description,$category,$pages,$cover,$id_publisher,$binding,$isbn);
	addInBooksAutors($id,$authors);
	addInGenresBooks($id,$genres);
	header('location:admin.php');
 ?>