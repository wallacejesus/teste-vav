<?php
require_once('core/dao/Dao.php');
use MongoDB\BSON\Regex as Regex;
use MongoDB\BSON\ObjectID as ObjectID;
class PessoaDao extends Dao{
  public function __constructor(){}
  public function create(Pessoa $pessoa){
    $result = array("retorno"=>true,"id_pessoa"=>null);
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
	   $insertResult = $pessoasCollection->insertOne($document);   	      
	   $result["id_pessoa"] = (String) $insertResult->getInsertedId();
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

	public function findOne($nome){
		$result=null;
    try { 

	    $conn = self::open();
	    $vav_bd = $conn->vav_bd;
	    $pessoasCollection = $vav_bd->pessoas;
	    $param = array("nome"=>new Regex(preg_quote($nome), 'i'));      
	    $result = iterator_to_array($pessoasCollection->find($param)); 
	       	
    } 
    catch (Exception $ex) {
    	throw new Exception("Não foi possível consultar a coleção de pessoas. Erro:".$ex->getMessage(), 1);
			
    }
  	return $result;
	}	

  public function update(String $id,Pessoa $pessoa){
    $result = true;

    try {
	    $conn = self::open();
	    $vav_bd = $conn->vav_bd;
	    $pessoasCollection = $vav_bd->pessoas;
	    	         
	    $document = array( 
	    	'$set'=>array(
		      "nome"=>$pessoa->getNome(),
		      "sobrenome"=>$pessoa->getSobrenome(),
		      "dt_aniversario"=>$pessoa->getDt_aniversario(),
		      "telefones"=>$pessoa->getTelefone()
	      )
	    );
	    

	    $pessoasCollection->updateOne(array("_id"=>new ObjectID($id)),$document);    	
    } 
    catch (Exception $e) {
    	throw new Exception("Erro ao atualizar cadastro. Erro=".$e->getMessage(), 1);
    	
    	$result = false;
    }
  	return $result;
  }	
  public function delete(String $id){
    $result = true;

    try {
	    $conn = self::open();
	    $vav_bd = $conn->vav_bd;
	    $pessoasCollection = $vav_bd->pessoas;    	          
	    $pessoasCollection->deleteMany(array("_id"=>new ObjectID($id)));    	
    } 
    catch (Exception $e) {
    	throw new Exception("Erro ao excluir cadastro. Erro=".$e->getMessage(), 1);
    	
    	$result = false;
    }
  	return $result;
  }	  
	
}
?>