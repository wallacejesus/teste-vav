<?php
  include_once("modules/pessoa/controllers/PessoaController.php"); 
  $app->group('/pessoa',function() use($app){
		$app->post('/create',function() use($app){			 
		  PessoaController::create($app->request,$app->response);		
		});	
		$app->put('/update/:id',function($id) use($app){			 
		  PessoaController::update($id,$app->request,$app->response);		
		});			
		$app->delete('/delete/:id','PessoaController::delete');
	  $app->get('/findAll','PessoaController::findAll');				
	  $app->get('/findOne/:nome','PessoaController::findOne');	  
  });

?>