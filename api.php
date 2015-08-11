<?php

/*
// get the HTTP METHOD
$method = $_SERVER['REQUEST_METHOD'];

// get the HTTP REQUEST DATA
$request = $_REQUEST;

// explode the url path
$url = substr($_SERVER['REQUEST_URI'], 1);

// remove the 'inventario/api.php'
$url = preg_replace('/inventario\/api.php\//', '', $url);

// replace the "?" query param to "/"
$url = preg_replace('/\?/', '/', $url);

// get all paths
$paths = explode('/', $url);

if( isset($paths[0]) ){

	// RestFul endpoint
	switch($paths[0]){
		case 'items':

			require_once('src/items/itemsController.php');

			$controller = new ItemsController($paths, $method, $request);
			break;

		case 'categories':

			break;
	}
}
*/

/**
 * Class API
 */
class API {

	private $method;
	private $url;
	private $request;
	private $paths;

	function __construct(){

		// get the HTTP METHOD
		$this->method = $_SERVER['REQUEST_METHOD'];

		// get the HTTP REQUEST DATA
		$this->request = $_REQUEST;

		// explode the url path
		$this->url = substr($_SERVER['REQUEST_URI'], 1);

		// remove the 'inventario/api.php'
		$this->url = preg_replace('/inventario\/api.php\//', '', $this->url);

		// replace the "?" query param to "/"
		$this->url = preg_replace('/\?/', '/', $this->url);

		// get all paths
		$this->paths = explode('/', $this->url);

		// action to run
		$this->actions();
	}

	/**
	 * @name actions
	 * @description determinate the action to run, base on the mthod and url
	 */
	private function actions(){

		// RestFul endpoint
		switch( $this->paths[0] ){
			case 'items':
				require_once('src/items/itemsController.php');

				$controller = new ItemsController($this->paths, $this->method, $this->request);
				break;

			case 'categories':

				break;
		}

	}
}

$api = new API();