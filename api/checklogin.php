<?php
include 'db.php';

if (isset ( $_REQUEST ["action"] ) && $_REQUEST ["action"] == "login") {
	$pass_word = $_REQUEST ["password"];
	$user_name = $_REQUEST ["username"];
	
	
	$query = "SELECT * FROM `tbl_nhanvien` WHERE `tenDangNhap` = '$user_name'";
	$result = $conn->query ( $query );
	
	if ($result->num_rows > 0) {
		while ( $row = $result->fetch_assoc () ) {
			if ($pass_word == $row ["matKhau"]) {
				$row ["result"] = "success";
				
				echo json_encode ( $row );
				
				// var_dump ( $row );
			} else {
				$arr ["result"] = "failure";
				echo json_encode ( $arr );
			}
		}
	} else {
		$arr ["result"] = "wrongusername";
		echo json_encode ( $arr );
	}
	$conn->close ();
}

?>