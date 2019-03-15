<?php
require_once('core/dao/Dao.php');
class PessoaDao extends Dao{
  public function __constructor(){}
  public function create(Pessoa $pessoa){
    $result = true;
    try {

	    $conn = self::open();
	    $vav_bd = $conn->vav_bd;
	    $pessoasCollection = $vav_bd->pessoas;

	   $document = array( 
	      "nome"=>$pessoa->getNome(),
	      "sobrenome"=>$pessoa->getSobrenome(),
	      "dt_aniversario"=>$pessoa->getDt_aniversario(),
	      "telefones"=>$pessoa->getTelefone()
	   );
	   $pessoasCollection->insertMany(array($document));    	
    } 
    catch (Exception $e) {
    	$result = false;
    }
  	return $result;
  }
	public function findAll(){
		$result=null;
    try { 

	    $conn = self::open();
	    $vav_bd = $conn->vav_bd;
	    $pessoasCollection = $vav_bd->pessoas;

	    $result = iterator_to_array($pessoasCollection->find()); 
	       	
    } 
    catch (Exception $ex) {
    	throw new Exception("Não foi possível consultar a coleção de pessoas. Erro:".$ex->getMessage(), 1);
			
    }
  	return $result;
	}
	
}
?>