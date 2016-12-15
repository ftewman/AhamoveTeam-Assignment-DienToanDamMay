	<?php
	include 'db.php';
	$action = "";
	$maKH = "";
	$action = $_REQUEST ['action'];
	$arr = array ();
	
	if ($action == 'getcustomers') {
		$queryPs = "SELECT * FROM `tbl_khachhang`";
		$resultPs = $conn->query ( $queryPs );
		if ($resultPs->num_rows > 0) {
			while ( $row = $resultPs->fetch_assoc () ) {
				array_push ( $arr, $row );
			}
			echo json_encode ( $arr );
		}
	} else if ($action == 'getcustomer') {
		$maKhachHang = $_REQUEST ['maKhachHang'];
		$queryP = "SELECT * FROM `tbl_khachhang` WHERE `maKhachHang` = $maKhachHang";
		$resultP = $conn->query ( $queryP );
		if ($resultP->num_rows > 0) {
			while ( $row = $resultP->fetch_assoc () ) {
				echo json_encode ( $row );
			}
			
		}
	}
	
	?>