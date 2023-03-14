<?php 
require 'query/query.php';
$id= $_GET['id'];
delete_book($id);
header('location:admin.php');
 ?>