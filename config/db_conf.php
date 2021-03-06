<?php
/*
* Mysql database class - only one connection alowed
*/
class Database {
	private $_connection;
	private static $_instance;
	private $_host = "localhost";
	private $_username = "pma";
	private $_password = "";
	private $_database = "licenze";

	/**
	 * Get an instance of the Database
	 * @return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to connect to MySQL: " . E_USER_ERROR);
		}
	}

	private function __clone() { }

	/**
	 * Get mysqli connection
	 */
	public function getConnection() {
		return $this->_connection;
	}
}
?>