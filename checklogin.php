<?php

include 'db.php';

if (isset ( $_REQUEST ["action"] ) && $_REQUEST ["action"] == "login") {
	$user_name = $_REQUEST ["username"];
	$pass_word = $_REQUEST ["password"];
	
	$query = mysql_query("SELECT * FROM tbl_nhanvien WHERE maNV='$user_name' AND matKhauNV='$pass_word'");
	$row = mysql_num_rows($query);
	
	
	if($row > 0){
		echo 1;
	}else{
		echo 0;
	}
}


?>