<?php  
	session_start();
	require('deliveryController.php');
	require('deliveryModel.php');

	define('INCLUDE_PATH','http://localhost/delivery/');
	$deliveryController = new deliveryController();
	$deliveryController->index();



?>