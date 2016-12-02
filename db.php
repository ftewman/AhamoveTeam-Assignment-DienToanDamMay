<?php
if(!mysql_connect("localhost", "root", "")){
	echo 'error in connecting database';
}

if(!mysql_select_db("banhang")){
	echo 'error database';
}

?>