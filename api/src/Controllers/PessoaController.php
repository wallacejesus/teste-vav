<?php
  include("src/Models/Entity/Pessoa.php");
  class PessoaController{
  	
  	function __constructor(){}
    public function create($response,$request){
      
      $pessoa = json_decode($request->getBody());
      $p = new Pessoa();
      $p->setNome($pessoa->nome);
      //echo json_encode(array("msg"=>$p->getNome()));
    }
  }
?>