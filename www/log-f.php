<?php 
require 'query/query.php';
	function exitd(){
		session_start();
		if(isset($_SESSION['user'])){
			unset($_SESSION['user']);
		}
	}
	function checkPasswords($password,$password2){
		if($password==$password2){
			return true;
		}
		return false;
	}
     function checkLengthPassword($password){
		if (strlen($password) >= 2) {
            return true;
        }
        return false;
	}
 ?>