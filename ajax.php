<?php

require 'inc/class.helper.php';
require 'inc/class.register.php';
$help = new Helper();
$register = new Register($help);

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

$content = '';

foreach ($_GET as $val => $key){
	$content .= $val . ': ' . $key . '¦ ';	
}
fwrite($myfile, $content);
fclose($myfile);

$exampleArr = array(
	'color1' => 'red',
	'color2' => 'yellow',
	'color3' => 'green',
	'color4' => 'blue',
	'color5' => 'purple'
);

echo json_encode($exampleArr);