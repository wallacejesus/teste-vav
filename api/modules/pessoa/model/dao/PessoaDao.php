<?php
require_once('core/dao/Dao.php');
class PessoaDao extends Dao{
  public function __constructor(){}
  public function create(Pessoa $pessoa){
    //throw new Exception("Error Processing Request", 1);    
  	return true;
  }
}
?>