<?php

class Register {

	private $mysqli;
	private $formFields = array(
		'title', 'first_name', 'surname', 'nickname', 'email', 'password', 'password_confirm', 'contact_no'
	);
	
	function __construct($helper){
		
		//get db connection
		$this->mysqli = $this->db_connect();
		$this->initialize();
		$this->insert_user();
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
		foreach ($this->formFields as $field){
			$_POST[$field] = isset($_POST[$field]) ? $_POST[$field] : '';
		}
	}
	
	protected function insert_user()
	{
		//check if message has been entered
		if (isset($_POST['surname']) && !empty($_POST['surname'])){
			
			$sql = "INSERT INTO `sc_user` (`ID`, `title`, `surname`, `firstname`, `nickname`, `email`, `password`, `dob`, `contact_no`) VALUES (NULL, 'Mr', 'Attridge', 'Daniel', 'Dan', 'danattridge56@gmail.com', 'password1', '1978-05-06', '07821 894556');";
			
			$fieldNames = '';
			$fieldValues = '';
			
			foreach ($this->formFields as $field){
				if ($field != 'password_confirm'){
					$fieldNames .= '`'.$field.'`, ';
					$fieldValues .= "'".$_POST[$field]."', ";
				}
			}
			
			$fieldNames = rtrim($fieldNames, ', ');
			$fieldValues = rtrim($fieldValues, ', ');
			
			$insertSql = "INSERT INTO `sc_user` (" . $fieldNames . ") VALUES (" . $fieldValues . ")";
			
			echo $insertSql;
			
			

		}
	}
	
}

?>