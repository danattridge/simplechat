<?php

class SimpleChat {

	private $mysqli;
	private $currentMessage;
	
	function __construct($helper){
		
		//get db connection
		$this->mysqli = $this->db_connect();
		$this->initialize();
		$this->insert_message();
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
	
	protected function initialize()
	{
		$this->create_tables();
		$_POST['message'] = isset($_POST['message']) ? $_POST['message'] : '';	
	}
	
	protected function create_tables()
	{
		if (!$this->mysqli->query("SHOW TABLES LIKE `sc_user`")){
			
			$sql = trim(file_get_contents("sql/create_tables.sql"));
			
			if ($this->mysqli->multi_query($sql) === true) {
				return true;
			} else {
				echo "Error: " . $sql . "<br>" . $this->mysqli->error;
			}
		}
			
	}
	
	protected function insert_message()
	{
		//check if message has been entered
		if (isset($_POST['message']) && !empty($_POST['message'])){
			
			$this->currentMessage = $helper->sanitize_input($_POST['message']);
			
			$sql = "INSERT INTO `sc_message` (`ID`, `user_id`, `message`, `datetime_posted`, `datetime_seen`, `deleted`) VALUES (NULL, '1', '".$this->currentMessage ."', CURRENT_TIMESTAMP, NULL, '0');";

			if ($this->mysqli->query($sql) === true) {
				return true;
			} else {
				echo "Error: " . $sql . "<br>" . $this->mysqli->error;
			}

		}
	}
	
}

?>