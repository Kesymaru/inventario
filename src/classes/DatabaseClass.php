<?php 

/**
* Connect to the database
*/
class Database{	
	// private variables
	private 	$username = 	'pacho';
	private 	$password = 	'pancho';
	private 	$host = 		'localhost';
	private 	$database = 	'inventario';
	private 	$charset = 		array(
		'charset' => 'utf8'
	);
	protected 	$connection =	NULL;


	/**
	 *
	* Connect to the database
	*/
	function __construct(){
		try{
			// create the connection
			$this->connection = new PDO(
				"mysql:host=".$this->host.";dbname=".$this->database,
				$this->username,
				$this->password,
				$this->charset
			);

			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->connection->query("SET CHARACTER SET utf8");
		}catch(PDOException $error){
			die();
		}
	}

	function __destruct(){
		//$this->connection->close();
		$this->connection = NULL;
	}
}