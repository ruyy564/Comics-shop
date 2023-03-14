<?php  
	
	require 'config/db.php';
	Global $db;
	$db=getConnection();
	function checkPassword($email,$password){
		Global $db;
		$result=$db->prepare("SELECT * FROM users WHERE email = :email AND password =:password");
		$result->bindparam(':email',$email,PDO::PARAM_STR);
		$result->bindparam(':password',$password,PDO::PARAM_STR);
		$result->execute();
		$user=$result->fetch();
		if($user){
			return true;
		}
		return false;
	}
	function getInfoUser($id){
		Global $db;
		$result=$db->query("SELECT name,email FROM users WHERE `id` = '$id'");

		$user=$result->fetch();
		return $user;
	}
	function changePassword($id,$password){
		Global $db;
		$result=$db->prepare("UPDATE `users` SET password=:password WHERE id=:id");
		$result->bindparam(':id',$id,PDO::PARAM_INT);
		$result->bindparam(':password',$password,PDO::PARAM_STR);
		$result->execute();
		$user=$result->fetch();
		if($user){
			return $user['id'];
		}
		return false;
	}
	function addOrder($user,$price,$email,$typePay,$address,$status){
		Global $db;
		if($user!=""){
			 $sql = 'INSERT INTO orders (price, email,pay,user,status,address) '
                . 'VALUES (:price, :email, :typePay,:user,:status,:address)';
                $result = $db->prepare($sql);
       			$result->bindParam(':user', $user, PDO::PARAM_INT);
		}else{
			$sql = 'INSERT INTO orders (price, email,pay,status,address) '
                . 'VALUES (:price, :email,:typePay,:status,:address)';
            $result = $db->prepare($sql);
		}
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':typePay', $typePay, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
         return $result->execute();
	}
	 function register($name, $email, $password){
		Global $db;

        $sql = 'INSERT INTO users (name, email, password) '
                . 'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }
	function checkLogin($email,$password){
		Global $db;
		$result=$db->prepare("SELECT * FROM users WHERE email = :email AND password =:password");
		$result->bindparam(':email',$email,PDO::PARAM_STR);
		$result->bindparam(':password',$password,PDO::PARAM_STR);
		$result->execute();
		$user=$result->fetch();
		if($user){
			return $user['id'];
		}
		return false;
	}
	function delete_book($id){
		Global $db;
		$sql='DELETE FROM `authors_books` WHERE id_book=:id';
		$result = $db->prepare($sql);
		$result->bindparam(':id',$id,PDO::PARAM_STR);
		$result->execute();
		$sql='DELETE FROM `genres_books` WHERE id_book=:id';
		$result = $db->prepare($sql);
		$result->bindparam(':id',$id,PDO::PARAM_STR);
		$result->execute();
		$sql='DELETE FROM books WHERE id=:id';
		$result = $db->prepare($sql);
		$result->bindparam(':id',$id,PDO::PARAM_INT);
		$result->execute();
	}
	function addGoods($name,$price,$description,$category,$pages,$cover,$id_publisher,$binding,$isbn){
		Global $db;
		$sql='INSERT INTO books(name, price, description, category, pages, cover, id_publisher, binding, isbn, date) '
			.'VALUES (:name,:price,:description,:category,:pages,:cover,:id_publisher,:binding,:isbn,CURRENT_DATE())';
		  $result = $db->prepare($sql);
		$result->bindparam(':name',$name,PDO::PARAM_STR);
		$result->bindparam(':price',$price,PDO::PARAM_STR);
		$result->bindparam(':description',$description,PDO::PARAM_STR);
		$result->bindparam(':category',$category,PDO::PARAM_STR);
		$result->bindparam(':pages',$pages,PDO::PARAM_STR);
		$result->bindparam(':cover',$cover,PDO::PARAM_STR);
		$result->bindparam(':id_publisher',$id_publisher,PDO::PARAM_STR);
		$result->bindparam(':binding',$binding,PDO::PARAM_STR);
		$result->bindparam(':isbn',$isbn,PDO::PARAM_STR);

		if($result->execute()){
			return $db->lastInsertId();;
		}

		return false;
	}
	function checkReg($email){
		Global $db;
		$result=$db->prepare("SELECT * FROM users WHERE email = :email");
		$result->bindparam(':email',$email,PDO::PARAM_STR);
		$result->execute();
		if ($result->fetchColumn())
            return true;
        return false;
	}
	function getProductArrayById($id){
		Global $db;
		$comics=array();
		$idString=implode(',',$id);
		$result=$db->query("SELECT * FROM books WHERE `id` in ($idString)");
		$i=0;
		while ($row=$result->fetch()) {
			$comics[$i]['id']=$row['id'];
			$comics[$i]['name']=$row['name'];
			$comics[$i]['title']=$row['title'];
			$comics[$i]['price']=$row['price'];
			$comics[$i]['cover']=$row['cover'];
			$comics[$i]['count']=$_SESSION['products'][$row['id']];
			$comics[$i]['total_price']=$comics[$i]['count']*$comics[$i]['price'];
			$i++;
		}
		return $comics;
	}
	function addInGenresBooks($id,$genres){
		Global $db;
		foreach($genres as $value) {
			$sql='INSERT INTO genres_books(id_genre, id_book) '
			.'VALUES (:id_genre,:id_book)';
		 	 $result = $db->prepare($sql);
			$result->bindparam(':id_book',$id,PDO::PARAM_INT);
			$result->bindparam(':id_genre',$value,PDO::PARAM_INT);
			$result->execute();
		}
		
		return ;
	}
	function addInBooksAutors($id,$authors){
		Global $db;
		foreach($authors as $value) {
			$sql='INSERT INTO authors_books(id_author, id_book) '
			.'VALUES (:id_author,:id_book)';
		 	 $result = $db->prepare($sql);
			$result->bindparam(':id_book',$id,PDO::PARAM_INT);
			$result->bindparam(':id_author',$value,PDO::PARAM_INT);
			$result->execute();
		}
		
		return ;
	}
	function get_orders($id){
		Global $db;
		$orders=array();
		$result=$db->query("SELECT * FROM orders WHERE `user`='$id'");

		$i=0;
		while ($row=$result->fetch()) {
			$orders[$i]['id']=$row['id'];
			$orders[$i]['address']=$row['address'];
			$orders[$i]['price']=$row['price'];
			$orders[$i]['pay']=$row['pay'];
			$orders[$i]['status']=$row['status'];
			$i++;
		}
		return $orders;
	}
	function get_new_comicses(){
		Global $db;
		$comics=array();
		$result=$db->query("SELECT * FROM books ORDER BY date desc limit 10");

		$i=0;
		while ($row=$result->fetch()) {
			$comics[$i]['id']=$row['id'];
			$comics[$i]['name']=$row['name'];
			$comics[$i]['title']=$row['title'];
			$comics[$i]['price']=$row['price'];
			$comics[$i]['cover']=$row['cover'];
			$i++;
		}
		return $comics;
	}

	function get_book_by_id($id){
		Global $db;
		$result=$db->query("SELECT * FROM books WHERE `id` = '$id'");

		$comics=$result->fetch();
		return $comics;
	}
	function get_books(){
		Global $db;
		$comics=array();
		$result=$db->query("SELECT * FROM books");

		$i=0;
		while ($row=$result->fetch()) {
			$comics[$i]['id']=$row['id'];
			$comics[$i]['name']=$row['name'];
			$comics[$i]['description']=$row['description'];
			$comics[$i]['price']=$row['price'];
			$comics[$i]['isbn']=$row['isbn'];
			$comics[$i]['category']=$row['category'];
			$comics[$i]['id_publisher']=$row['id_publisher'];
			$comics[$i]['cover']=$row['cover'];
			$comics[$i]['date']=$row['date'];
			$comics[$i]['binding']=$row['binding'];
			$comics[$i]['pages']=$row['pages'];
			$i++;
		}
		return $comics;
	}
	function get_categories(){
		Global $db;
		$categories=array();
		$result=$db->query("SELECT * FROM categories");

		$i=0;
		while ($row=$result->fetch()) {
			$categories[$i]['id']=$row['id'];
			$categories[$i]['name']=$row['name'];
			$i++;
		}
		return $categories;
	}
	function get_authors(){
		Global $db;
		$authors=array();
		$result=$db->query("SELECT * FROM authors");

		$i=0;
		while ($row=$result->fetch()) {
			$authors[$i]['id']=$row['id_author'];
			$authors[$i]['name']=$row['name'];
			$i++;
		}
		return $authors;
	}
	function get_genres(){
		Global $db;
		$genres=array();
		$result=$db->query("SELECT * FROM genres");

		$i=0;
		while ($row=$result->fetch()) {
			$genres[$i]['id']=$row['id'];
			$genres[$i]['name']=$row['name'];
			$i++;
		}
		return $genres;
	}
	function get_publishers(){
		Global $db;
		$publishers=array();
		$result=$db->query("SELECT * FROM publishers");

		$i=0;
		while ($row=$result->fetch()) {
			$publishers[$i]['id']=$row['id_publisher'];
			$publishers[$i]['name']=$row['name'];
			$i++;
		}
		return $publishers;
	}
	function get_binders(){
		Global $db;
		$binders=array();
		$result=$db->query("SELECT * FROM binders");

		$i=0;
		while ($row=$result->fetch()) {
			$binders[$i]['id']=$row['id_binding'];
			$binders[$i]['name']=$row['name'];
			$i++;
		}
		return $binders;
	}
	function get_category_by_id($id){
		Global $db;
		$result=$db->query("SELECT * FROM categories WHERE `id` = '$id'");

		$category=$result->fetch();
		
		return $category['name'];
	}
	function get_authors_by_id($id){
		Global $db;
		$result=$db->query("SELECT id_author FROM authors_books WHERE `id_book` = '$id'");

		$i=0;
		while ($row=$result->fetch()) {
			if($i!=0){
				echo ' , ';
			}
			echo get_author_by_id($row['id_author']);
			$i++;
		}
		return;
	}
	function get_author_by_id($id){
		Global $db;
		$result=$db->query("SELECT * FROM authors WHERE `id_author` = '$id'");

		$author=$result->fetch();
		
		return $author['name'];
	}
	function get_publisher_by_id($id){
		Global $db;
		$result=$db->query("SELECT * FROM `publishers` WHERE `id_publisher` = '$id'");

		$publisher=$result->fetch();
		
		return $publisher['name'];
	}
	function get_binders_by_id($id){
		Global $db;
		$result=$db->query("SELECT * FROM binders WHERE `id_binding` = '$id'");

		$binders=$result->fetch();
		
		return $binders['name'];
	}
	function get_genres_by_id($id){
		Global $db;
		$result=$db->query("SELECT id_genre FROM genres_books WHERE `id_book` = '$id'");
		$i=0;
		while ($row=$result->fetch()) {
			if($i!=0){
				echo ' , ';
			}
			echo get_genre_by_id($row['id_genre']);
			$i++;
		}
		return;
	}
	function get_genre_by_id($id){
		Global $db;
		$result=$db->query("SELECT * FROM genres WHERE `id` = '$id'");

		$genre=$result->fetch();
		
		return $genre['name'];
	}

	function get_comicses_by_categori($id){
		Global $db;
		$result=$db->query("SELECT * FROM books WHERE `category` = '$id'");
		
		$i=0;
		while ($row=$result->fetch()) {
			$comics[$i]['id']=$row['id'];
			$comics[$i]['name']=$row['name'];
			$comics[$i]['title']=$row['title'];
			$comics[$i]['price']=$row['price'];
			$comics[$i]['cover']=$row['cover'];
			$i++;
		}
		return $comics;
	}
?>