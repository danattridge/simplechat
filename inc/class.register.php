<?php

class Register {

	private $db;
	private $formFields = array(
		'title' => array('label' => 'Title', 'required' => 1),
		'first_name' => array('label' => 'First Name', 'required' => 1),
		'surname' => array('label' => 'Surname', 'required' => 1),
		'nickname' => array('label' => 'Nickname', 'required' => 0),
		'dob' => array('label' => 'Date of Birth', 'required' => 1),
		'gender' => array('label' => 'Gender', 'required' => 1),
		'email' => array('label' => 'Email', 'required' => 1),
		'password' => array('label' => 'Password', 'required' => 1),
		'password_confirm' => array('Confirm Password' => 'Title', 'required' => 1),
		'salt' => array('label' => 'Salt', 'required' => 0),
		'contact_no' => array('label' => 'Contact Number', 'required' => 1),
		'submit' => array('label' => 'Submit', 'required' => 0)
	);
	
	private $error = array();
	
	function __construct($helper){
		
		//get db connection
		$this->db = $this->dbConnect();
		$this->initialize();
		$this->validateUserData();
		$this->insertUser();
	}
	
	function __destruct(){
	
	}
	
	protected function dbConnect()
	{
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$dbName = 'da_simplechat';
		
		// Connecting to and select the MySQL database
		$db = new mysqli($host, $user, $password, $dbName);	
		
		// check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		return $db;
	}
	
	protected function initialize()
	{
		foreach ($this->formFields as $field){
			$fieldkey = key($field);
			$_POST[$fieldkey] = isset($_POST[$fieldkey]) ? $_POST[$fieldkey] : '';
		}
	}
	
	public function validateUserData()
	{
		if (isset($_POST['submit']) && !empty($_POST['submit'])){
			
			foreach ($this->formFields as $key => $field){
				
				switch($key){
					case 'title': case 'first_name': case 'surname': case 'gender': case 'email': case 'password': case 'password_confirm': case 'contact_no': case 'dob':
						if (empty($_POST[$key]) || strlen($_POST[$key]) < 1){
							$this->error[$key] = ucfirst($key) . " is a required field.";
						}
						break;
					case 'dob':
						if (!preg_match("^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$", $_POST[$key])){
							$this->error[$key] = ucfirst($key) . " should be in the format YYYY/MM/DD.";
						}
						break;
					default:
				}
			}
		}
		
		return $this->error;
		
	}
	
	protected function insertUser()
	{
		if (isset($_POST['submit']) && !empty($_POST['submit'])){
			
			if (count($this->error) == 0){
			
				$fieldNames = '';
				$fieldValues = '';
				
				$salt = $this->generateSalt(22);
				
				foreach ($this->formFields as $key => $val){
					
					print_r($field);
					
					if ($key != 'password_confirm' && $key != 'submit'){
						$fieldNames .= '`'.$key.'`, ';
						if ($key == 'password'){
							$fieldValues .= "'".$this->generatePasswordHash($_POST[$key], $salt)."', ";
						}
						elseif ($key == 'salt'){
							$fieldValues .= "'".$salt."', ";
						}
						else {
							$fieldValues .= "'".$_POST[$key]."', ";
						}
					}
					
				}
				
				$fieldNames = rtrim($fieldNames, ', ');
				$fieldValues = rtrim($fieldValues, ', ');
				
				$insertSql = "INSERT INTO `sc_user` (" . $fieldNames . ") VALUES (" . $fieldValues . ")";
				
				if ($this->db->query($insertSql) === true) {
					return true;
				} 
				else {
					echo "Error: " . $insertSql . "<br>" . $this->db->error;
				}
			}
			
		}
	}
	
	private function generatePasswordHash($password, $salt)
	{
		$phpversion = substr(phpversion(), 0, 1);
		
		// salt only required for php5
		if ($phpversion == '5'){
			$hash = password_hash($password, PASSWORD_DEFAULT, $options = array('salt' => $salt, 'cost' => 10 /*default cost of 10*/ ));
		}
		else {
			$hash = password_hash($password, PASSWORD_DEFAULT, $options = array('cost' => 10 /*default cost of 10*/ ));
		}
		
		return $hash;
	}
	
	private function generateSalt($length) {
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&()*+,-./:;<=>?@[\]^_`{|}~';  
		$size = strlen($chars);
		$salt = '';
		for($i=0; $i<$length; $i++) {
			$salt .= $chars[rand(0, $size-1)];
		}
		return $salt;
	}
	
}

?>