<?php

class Helper {
	
	function __construct(){
		
	}
	
	function __destruct(){
	
	}
	
	public function sanitize_input(&$userInput, &$db)
	{
		$sanitizedInput = $db->real_escape_string($userInput);
		$sanitizedInput = htmlspecialchars($sanitizedInput);
		return $sanitizedInput;
	}
	
}

?>