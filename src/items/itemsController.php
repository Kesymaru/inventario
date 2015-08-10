<?php

// dependencies
require_once('src/classes/ControllerClass.php');
require_once('src/classes/ItemsClass.php');

/**
 * Class ItemsController
 */
class ItemsController extends Controller{

	function __construct($paths, $method, $request){

		// call the parent contruct
		parent::__construct($paths, $method, $request);

		// determinates the action based on the method
		switch($this->method){

			// GET ACTION "GET"
			case 'GET':
				// id is defined
				if(isset($this->request['id'])){
					$this->get($this->request['id']);
				}else{
					$this->all();
				}
				break;

			// POST ACTION "CREATE"
			case 'POST':
				if(isset($this->request['name'])){
					$this->create($this->request['name']);
				}
				break;

			// PUT ACTION "UPDATE"
			case 'PUT':
				if(isset($this->request['id']) && isset($this->request['name'])){
					$this->update($this->request['id'], $this->request['name']);
				}
				break;

			//DELETE ACTION "REMOVE"
			case 'DELETE':
				if( isset($this->request['id']) ){
					$this->delete($this->request['id']);
				}
				break;

			default:
				// error response by default
				$this->response('', 'Error', true);
				return false;
		}
	}

	/**
	 * @name get
	 * @description get an item
	 * @param {int} $id
	 */
	private function get($id){
		// items class instance
		$items = new Items();

		// get the item
		if($itemData = $items->get($id)){
			return $this->response($itemData, '');
		}

		return $this->response('', "Could not get the item $id", true);
	}

	/**
	 * @name all
	 * @description get all items
	 * @return mixed
	 */
	private function all(){

		$items = new Items();

		if($itemsData = $items->all()){
			return $this->response($itemsData, '');
		}

		return $this->response('', "Could not get the items", true);

	}

	/**
	 * @name create
	 * @description create a new item
	 * @param string $name
	 * @return mixed
	 */
	private function create($name){

		$item = new Items();

		if($data = $item->create($name)){
			return $this->response($data, 'New item has been created', false);
		}

		return $this->response('', 'Could not create a new item', true);
	}

	/**
	 * @name update
	 * @description update an item
	 * @param int $id
	 * @param string $name
	 * @return mixed
	 */
	private function update($id, $name){

		$item = new Items();

		if($item->update($id, $name)){
			return $this->response('', 'Item has been updated', false);
		}

		return $this->response('', "Could not update the item $id", true);
	}

	/**
	 * @name delete
	 * @description  delete an item
	 * @param int $id
	 * @return mixed
	 */
	private function delete($id){

		$item = new Items();

		if($item->delete($id)){
			return $this->response('', 'Item has been deleted', false);
		}

		return $this->response('', "Could not delete the item $id", true);
	}
}


