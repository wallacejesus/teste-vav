<?php
  $app->response()->header('Content-Type', 'application/json;charset=utf-8');
	$app->get('/',function(){
	  echo json_encode(array(
	    "name"=>"API VAV Audio Visual",
	    "version"=>"1.0.0",
	    "author"=>"Wallace Jesus"
	  ));
	});

	$app->notFound(function () use ($app) {
	    echo json_encode(array("status"=>"error","message"=>"Requisição não definida!!!"));
	});
	require 'modules/pessoa/routes/pessoa-route.php';
?>