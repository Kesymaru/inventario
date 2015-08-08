<?php

// get the HTTP METHOD
$method = $_SERVER['REQUEST_METHOD'];

// get the HTTP REQUEST DATA
$request = $_REQUEST;

// explode the url path
$uri = substr($_SERVER['REQUEST_URI'], 1);

// get all paths
$paths = explode("/", $uri);

if(isset($paths[2])){

	// remove "?"
	$paths[2] = str_replace('?', '', $paths[2]);

	echo print_r($paths);
	echo print_r($request);

	// RestFul endpoint
	switch($paths[2]){
		case 'items':

			require_once('src/items/itemsController.php');

			$controller = new ItemsController($paths, $method, $request);
			break;
	}
}

