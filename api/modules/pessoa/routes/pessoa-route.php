<?php
  include_once("modules/pessoa/controllers/PessoaController.php"); 
  $app->group('/pessoa',function() use($app){
		$app->post('/create',function() use($app){			 
			PessoaController::create($app->request,$app->response);
		});		
  });

?>