<?php

/**
 * db connection
 */
 
 class DbConnect {
	
	private $conn;
	
	function __construct() {        
    
	}

	
	function dbConnection(){
		
	  include_once dirname(__FILE__) . '/Config.php';
		
		
		$this->conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		
		if ($this->conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		return $this->conn;
	}
 }
?>