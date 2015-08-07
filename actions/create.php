<?php

// load the items class 
require_once('../ItemsClass.php');

$response = array(
	'error' => true,
	'message' => '' 
);

if(isset($_POST['name'])){

	$name = $_POST['name'];

	$items = new Items();
	
	// create the new item
	if($data = $items->create($name)){
		$response['error'] = false;
		$response['message'] = 'Items has been created';
		$response['item'] = $data;
	}else{
		$response['message'] = 'Could not create the new item';
	}
}

// request response in json format
echo json_encode($response);