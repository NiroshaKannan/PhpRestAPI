<?php

class DbHandler {

    private $conn;

    function __construct() {
        require_once ('connection.php');
       
        $db = new DbConnect();
        $this->conn = $db->dbConnection();
    }

    public function createUser($name, $email, $password, $position) {
        require_once 'passhash.php';
        $response = array();

        // First check if user already existed in db
      //  if (!$this->isUserExists($email)) {
            // Generating password hash
            $password_hash = PassHash::hash($password);

            // Generating API key
            $api_key = $this->generateApiKey();

            // insert query
		 	$query ="INSERT INTO users(name, email, password_hash, pos, api_key, status) values('$name', '$email', '$password_hash', '$position', '$api_key' , 1)";
            $stmt = $this->conn->prepare($query);
          //  $stmt->bind_param("ssss", $name, $email, $password_hash, $position, $api_key);

            $result = $stmt->execute();

            $stmt->close();

            // Check for successful insertion
            if ($result) {
                // User successfully inserted
                return USER_ACCOUNT_CREATED;
            } else {
                // Failed to create user
                return USER_ACCOUNT_FAILED;
            }
       /* } else {
            // User with same email already existed in the db
            return USER_ACCOUNT_EXIT;
        }*/

        return $response;
    }
	
	private function generateApiKey() {
        return md5(uniqid(rand(), true));
    }
}
?>