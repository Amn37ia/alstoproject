<?php 
define('web_title','Roxenwald');

// Open Connection
$con = @mysqli_connect('localhost', 'root', '', 'alchemiastory');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
} else {
	//echo "Its Work!";
}

?>