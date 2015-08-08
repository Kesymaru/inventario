<?php

// include the items class
include_once('../../src/classes/ItemsClass.php');

// response
$response = array(
	'error' => true,
	'message' => '',
);

$items = new Items();

if($allItems = $items->all()){
	$response['error'] = false;
	$response['data'] = $allItems;
}

// response
echo json_encode($response);