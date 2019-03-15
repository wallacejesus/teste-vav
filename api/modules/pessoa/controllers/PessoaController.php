<?php
require_once('modules/pessoa/model/entity/Pessoa.php');
require_once('modules/pessoa/model/dao/PessoaDao.php');
require_once('core/interfaces/Crud.php');
class PessoaController implements Crud{

  public function __constructor(){}

  public function create($request, $response){
    $result = array("status"=>"SUCCESS","message"=>"Operação realizada com sucesso!!!","id_pessoa"=>null);
    try {
	  	$object = json_decode($request->getBody());
	  	$pessoa = new Pessoa();

	  	if(!isset($object->nome) or $object->nome==""){
	      $result=array("status"=>"FAIL","message"=>"Nome não informado!");
	      goto fim;
	  	}
	  	if(!isset($object->sobrenome) or $object->sobrenome==""){
	      $result=array("status"=>"FAIL","message"=>"Sobrenome não informado");
	      goto fim;
	  	}
	  	if(!isset($object->dt_aniversario) or $object->dt_aniversario==""){
	      $result=array("status"=>"FAIL","message"=>"AniversÃ¡rio não informado");
	      goto fim;
	  	}
	  	if(!isset($object->telefones)){
	      $result=array("status"=>"FAIL","message"=>"Contato não informado");
	      goto fim;
	  	}  	  	  	
	  	else{
	  	  foreach ($object->telefones as $telefone) {
		  	  if(!isset($telefone->numero) or $telefone->numero==""){
		        $result=array("status"=>"FAIL","message"=>"Número do telefone não informado");
		        goto fim;     
		      }
		  	  if(!isset($telefone->tipo) or $telefone->tipo==""){
		        $result=array("status"=>"FAIL","message"=>"Tipo (Ex:Casa, Celular, Trabalho etc...) do contato do telefone não informado");
		        goto fim;     
		      }  	    
	  	  }
	  	}  	
	  	$pessoa->setNome($object->nome);
	  	$pessoa->setSobrenome($object->sobrenome);
	  	$pessoa->setDt_aniversario($object->dt_aniversario);
	  	$pessoa->setTelefone($object->telefones);
	  	$resultCreate = PessoaDao::create($pessoa);
	  	if(!$resultCreate["retorno"]){
	      $result = array("status"=>"FAIL","message"=>"Erro ao Cadastrar Pessoa");  
	      goto fim; 
	    } 	
      $result["id_pessoa"]=$resultCreate["id_pessoa"];
    	
    } 
    catch (Exception $e) {
      $result = array("status"=>"FAIL","message"=>$e->getMessage());	
      goto fim;
    }

    
    fim:
    echo json_encode($result);
  }

	public function findAll(){
		$result = array("status"=>"SUCCESS","message"=>"Operação realizada com sucesso!!!","pessoas"=>array());
		try {
			$result["pessoas"]=PessoaDao::findAll();
		} catch (Exception $ex) {
			$result = array("status"=>"FAIL","message"=>$ex->getMessage());
			goto fim;
		}
		fim:
		echo json_encode($result);
	}
	public function findOne($nome){
		$result = array("status"=>"SUCCESS","message"=>"Operação realizada com sucesso!!!","pessoas"=>array());
		try {
			$result["pessoas"]=PessoaDao::findOne($nome);
		} 
		catch(Exception $ex) {
			$result = array("status"=>"FAIL","message"=>$ex->getMessage());
			goto fim;
		}
		fim:
		echo json_encode($result);
	}

	public function update($id,$request,$response){
    $result = array("status"=>"SUCCESS","message"=>"Operação realizada com sucesso!!!");
    try {
	  	$object = json_decode($request->getBody());
	  	$pessoa = new Pessoa();

	  	if(isset($object->nome) and $object->nome==""){
	      $result=array("status"=>"FAIL","message"=>"Nome não informado!");
	      goto fim;
	  	}
	  	if(isset($object->sobrenome) and $object->sobrenome==""){
	      $result=array("status"=>"FAIL","message"=>"Sobrenome não informado");
	      goto fim;
	  	}
	  	if(isset($object->dt_aniversario) and $object->dt_aniversario==""){
	      $result=array("status"=>"FAIL","message"=>"AniversÃ¡rio não informado");
	      goto fim;
	  	}
	  	if(isset($object->telefones)){
	  	  foreach ($object->telefones as $telefone) {
		  	  if(isset($telefone->numero) and $telefone->numero==""){
		        $result=array("status"=>"FAIL","message"=>"Número do telefone não informado");
		        goto fim;     
		      }
		  	  if(isset($telefone->tipo) and $telefone->tipo==""){
		        $result=array("status"=>"FAIL","message"=>"Tipo (Ex:Casa, Celular, Trabalho etc...) do contato do telefone não informado");
		        goto fim;     
		      }  	    
	  	  }
	  	}  	
	  	if(!isset($id) or $id==""){
        $result=array("status"=>"FAIL","message"=>"ID a ser atualizado não foi informado");
        goto fim; 	  		
	  	}

	  	$pessoa->setNome($object->nome);
	  	$pessoa->setSobrenome($object->sobrenome);
	  	$pessoa->setDt_aniversario($object->dt_aniversario);
	  	$pessoa->setTelefone($object->telefones);
	  	if(!PessoaDao::update($id,$pessoa))
	      $result = array("status"=>"FAIL","message"=>"Erro ao atualizar cadastro");    	
    	
    } 
    catch (Exception $e) {
      $result = array("status"=>"FAIL","message"=>$e->getMessage());	
      goto fim;
    }

    
    fim:
    echo json_encode($result);		

	}
	public function delete($id){
    $result = array("status"=>"SUCCESS","message"=>"Operação realizada com sucesso!!!");
	  try {		
	  	if(!isset($id) or $id==""){
	      $result=array("status"=>"FAIL","message"=>"ID do cadastro a ser excluído não foi informado");
	      goto fim; 	  		
	  	}
	  	if(!PessoaDao::delete($id)){
	      $result = array("status"=>"FAIL","message"=>"Erro ao excluir cadastro");    	
	      goto fim;
	    }
	  	
	  } 
	  catch (Exception $e) {
	    $result = array("status"=>"FAIL","message"=>$e->getMessage());	
	    goto fim;
	  }

	  
	  fim:
	  echo json_encode($result);			

	} 
	
}
?>