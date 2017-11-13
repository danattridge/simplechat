<?php

class Register {

	private $mysqli;
	
	function __construct(){
		
		//get db connection
		$this->mysqli = $this->db_connect();
	}
	
	function __destruct(){
	
	}
	
	protected function db_connect()
	{
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$dbName = 'da_simplechat';
		
		// Connecting to and select the MySQL database
		$mysqli = new mysqli($host, $user, $password, $dbName);	
		
		// check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		return $mysqli;
	}
	
	protected function insert_message()
	{
		//check if message has been entered
		if (isset($_POST['message']) && !empty($_POST['message'])){
			
			$message = $_POST['message'];
			
			$this->currentMessage = $this->sanitize_input($_POST['message']);
			
			$sql = "INSERT INTO `sc_message` (`ID`, `user_id`, `message`, `datetime_posted`, `datetime_seen`, `deleted`) VALUES (NULL, '1', '".$this->currentMessage ."', CURRENT_TIMESTAMP, NULL, '0');";

			if ($this->mysqli->query($sql) === true) {
				return true;
			} else {
				echo "Error: " . $sql . "<br>" . $this->mysqli->error;
			}
			
			

		}
	}
	
	protected function sanitize_input(&$userInput)
	{
		$sanitizedInput = mysqli_real_escape_string($this->mysqli, $userInput);
		$sanitizedInput = htmlspecialchars($sanitizedInput);
		return $sanitizedInput;
	}
	
}

?>