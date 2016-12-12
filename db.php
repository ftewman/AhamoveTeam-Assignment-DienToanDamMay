<?php
// if(!mysql_connect("localhost", "root", "")){
// echo 'error in connecting database';
// }

// if(!mysql_select_db("ahamoveteam")){
// echo 'error database';
// }
GLOBAL $conn;
$conn = new mysqli ( "localhost", "root", "", "ahamoveteam" );
$charset = 'utf8';
mysqli_set_charset ( $conn, $charset );

if ($conn->connect_error) {
	die ( "Connection failed: " . $conn->connect_error );
}

?>