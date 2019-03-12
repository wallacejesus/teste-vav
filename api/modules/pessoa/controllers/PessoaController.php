<?php
require_once('modules/pessoa/model/entity/Pessoa.php');
require_once('modules/pessoa/model/dao/PessoaDao.php');
require_once('core/interfaces/Crud.php');
class PessoaController implements Crud{

  public function __constructor(){}

  public function create($request, $response){
    
    try {
	    $result = array("status"=>"SUCCESS","message"=>"Operação realizada com sucesso!!!");
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
	      $result=array("status"=>"FAIL","message"=>"Aniversário não informado");
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
	  	if(!PessoaDao::create($pessoa))
	      $result = array("status"=>"FAIL","message"=>"Erro ao Criar contato");    	
    	
    } 
    catch (Exception $e) {
      $result = array("status"=>"FAIL","message"=>$e->getMessage());	
      goto fim;
    }

    
    fim:
    echo json_encode($result);
  }

	public function findAll(){}
	public function findOne($param){}
	public function update($id){}
	public function delete($id){} 
	
}
?>