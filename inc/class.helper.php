<?php

class Helper {

	
	function __construct(){
		
	}
	
	function __destruct(){
	
	}
	
	protected function sanitize_input(&$userInput)
	{
		$sanitizedInput = mysqli_real_escape_string($this->mysqli, $userInput);
		$sanitizedInput = htmlspecialchars($sanitizedInput);
		return $sanitizedInput;
	}
	
}

?>