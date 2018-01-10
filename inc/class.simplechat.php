<?php

class SimpleChat {

	private $helper;
	private $db;
	private $currentMessage;
	
	function __construct($helper){
		$this->helper = $helper;
		//get db connection
		$this->db = $this->db_connect();
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
		$db = new mysqli($host, $user, $password, $dbName);	
		
		// check connection */
		if ($db->connect_errno) {
			printf("Connect failed: %s\n", $db->connect_errno);
			exit();
		}
		
		return $db;
	}
	
	protected function initialize()
	{
		//$this->create_tables();
		//$this->populate_tables();
		$_POST['message'] = isset($_POST['message']) ? $_POST['message'] : '';	
	}
	
	protected function create_tables()
	{
		$sql = file_get_contents("sql/sc_message.sql");
		if ($this->db->query($sql) === true) {
			return true;
		} else {
			echo "Error: " . $sql . "<br>" . $this->db->error;
		}
		
		$sql = file_get_contents("sql/sc_user.sql");
		if ($this->db->query($sql) === true) {
			return true;
		} else {
			echo "Error: " . $sql . "<br>" . $this->db->error;
		}	
	}
	
	protected function populate_tables()
	{
		$result = $this->db->query("SELECT COUNT(ID) as 'total' FROM `sc_message`");
		
		$row = $result->fetch_array();
		
		echo 'Total results: ' . $result->num_rows;
		
		/*if (count($row['total']) == 0){
			
			$sql = file_get_contents("sql/example_data.sql");
			
			if ($this->db->multi_query($sql) === true) {
				return true;
			} else {
				echo "Error: " . $sql . "<br>" . $this->db->error;
			}
		}*/
			
	}
	
	public function getConversation()
	{
		
		$conversation = '';
		$result = $this->db->query("SELECT * FROM `sc_message` m LEFT JOIN `sc_user` u ON m.user_id = u.ID");	
		
		
		$tableStr = '';
		$tableStr .= '<table>';
		$tableStr .= '<tr><th>User</th><th>Message</th><th>Datetime</th></tr>';
		
		while ($row = $result->fetch_assoc()){
			$tableStr .= '<tr>';
			$tableStr .= '<td>' . $row['first_name'] . ' ' . $row['surname'] .'</td><td>' . stripslashes($row['message']) . '</td><td>' . stripslashes($row['datetime_posted']) . '</td>';	
			$tableStr .= '</tr>';			
		}
		
		$tableStr .= '</table>';
		
		return $tableStr;
	}
	
	protected function insert_message()
	{
		//check if message has been entered
		if (isset($_POST['message']) && !empty($_POST['message'])){
			
			$this->currentMessage = $this->helper->sanitize_input($_POST['message'], $this->db);
			
			$sql = "INSERT INTO `sc_message` (`ID`, `user_id`, `message`, `datetime_posted`, `datetime_seen`, `deleted`) VALUES (NULL, '1', '".$this->currentMessage ."', CURRENT_TIMESTAMP, NULL, '0');";

			if ($this->db->query($sql) === true) {
				return true;
			} else {
				echo "Error: " . $sql . "<br>" . $this->db->error;
			}

		}
	}
	
}

?>