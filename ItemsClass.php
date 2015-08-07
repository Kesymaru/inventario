<?php

require_once('DatabaseClass.php');

/**
* @class Items
* @description class for items
*/
class Items extends Database{

	/**
	* Get all items
	* @return {array} items getted from the database
	*/
	function all(){

		// get all items 
		$query = $this->connection->prepare('SELECT * FROM items');

		// execute the query
		if($query->execute()){

			// return the query result
			return $query->fetchAll();
		}
		return false;
	}

	/**
	* Get an item
	* @param {int} id
	* @return {array|boolean} data or false in case fails
	*/
	function get($id){

		// get the item
		$query = $this->connection->prepare('SELECT * FROM items WHERE id = :id');

		// bind data
		$bind = array(
			':id' => $id
		);

		// execute the query
		if($query->execute($bind)){

			// return the query result
			return $query->fetch();
		}
		return false;
	}

	/**
	* Create an item
	* @param {string} name
	*/
	function create($name){
		
		// create the query
		$query = $this->connection->prepare('INSERT INTO items (name, created, updated) VALUES (:name, :created, :updated)');
		
		// date time
		$now = $this->now();

		// bind data to be inserted
		$bind = array(
			':name' => 		$name,
			':created' => 	$now,
			':updated' => 	$now
		);

		// execute the sql query
		if($query->execute($bind)){
			 $id =  $this->connection->lastInsertId();

			 if($data = $this->get($id)){
			 	return $data;
			 }
			 return $id;
		}
		return false;
	}

	/**
	* Update an item
	* @param {int} id
	* @param {string} name
	*/
	function update($id, $name){

		// update an item
		$query = $this->connection->prepare('UPDATE items SET name = :name, updated = :updated WHERE id = :id');

		// updated date time
		$updated = $this->now();

		// bind data
		$bind = array(
			':id' => 		$id, 
			':name' => 		$name,
			':updated' => 	$updated
		);

		if($query->execute($bind)){
			return true;
		}
		return false;
	}

	/**
	* Delete an item
	* @param {int} id
	*/
	function delete($id){

		// delete the item
		$query = $this->connection->prepare('DELETE FROM items WHERE id = :id');

		$bind = array(':id' => $id);

		if($query->execute($bind)){
			return true;
		}
		return false;
	}

	/**
	* Get the now date time
	* @return {string} date time
	*/
	private function now(){
		
		// create the date time
		$now = new DateTime('now');
		$now = $now->format('Y-m-d H:i:s');

		return $now;
	}
}