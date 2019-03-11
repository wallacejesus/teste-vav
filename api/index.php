<?php

require 'lib/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');


$app->get('/',function(){
  echo json_encode(array(
    "name"=>"API VAV Audio Visual",
    "version"=>"1.0.0",
    "author"=>"Wallace Jesus"
  ));
});


$app->post('/pessoa/create',function() use($app){
  include_once("src/Controllers/PessoaController.php");  
  
  PessoaController::create($app->response,$app->request);
});

$app->notFound(function () use ($app) {
    echo json_encode(array("status"=>"error","message"=>"Requisição não definida!!!"));
});
$app->run();

