<?php

// load the items class 
require_once('ItemsClass.php');

$response = array(
	'error' => true,
	'message' => '',
);

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$items = new Items();
	if($items->delete($id)){
		$response = array(
			'error' => false,
			'message' => "The item id: $id has been deleted"
		);
	}
}else{
	$response['message'] = 'Undefined item id';
}
echo json_encode($response);