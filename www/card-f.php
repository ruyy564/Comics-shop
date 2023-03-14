
<?php 
session_start();
	function getGoodsInCard(){
		if(isset($_SESSION['products'])){
			$products=$_SESSION['products'];
			$id=array_keys($products);
			if($id!=null){
				$goods=getProductArrayById($id);
				return $goods;
			}
			return 0;
		}else{
			return 0;
		}
	}

	function addProduct($id){
		$id=intval($id);
		$productsInCard = array();
		if(isset($_SESSION['products'])){
			$productsInCard=$_SESSION['products'];

		}

		if(array_key_exists($id, $productsInCard)){
			$productsInCard[$id]++;
		}else{
			$productsInCard[$id]=1;
		}

		$_SESSION['products']=$productsInCard;

		return countProducts();
	}
	function subtractProduct($id){
		$id=intval($id);
		$productsInCard=$_SESSION['products'];
		$productsInCard[$id]--;
		if($productsInCard[$id]==0){
			$productsInCard[$id]=1;
		}
		$_SESSION['products']=$productsInCard;

		return countProducts();
	}
	function deleteProduct($id){
		$productsInCard=$_SESSION['products'];
		unset($productsInCard[$id]);
		$_SESSION['products']=$productsInCard;
		return $productsInCard;
		/*$re f=$_SERVER['HTTP_REFERER'];
		header("Location:$ref");*/
	}
	function countProducts(){
		if(isset($_SESSION['products'])){
			$count=0;

			foreach ($_SESSION['products'] as $id => $quantity) {
				$count=$count+$quantity;
			}
			return $count;
		}else{

			return 0;
		}
	}
 ?>