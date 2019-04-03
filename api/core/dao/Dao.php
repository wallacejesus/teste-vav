<?php
class Dao{
  public function __constructor(){}
  public function open(){
  	$conn = null;
  	try {
  		$conn =  new MongoDB\Client('mongodb+srv://user:password@host');     	} 
  	catch (Exception $e) {
  	  $conn=null;
  	  throw new Exception("Erro ao tentar conectar com o banco de dados.", 1);
  	      	      	  
  	}
  	return $conn;
  }
}
?>