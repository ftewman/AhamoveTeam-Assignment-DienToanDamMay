	<?php
	include 'db.php';
	
	$query = "SELECT * FROM `tbl_sanpham`";
	$result = $conn->query ( $query );
	
	$arr = array ();
	
	if ($result->num_rows > 0) {
		while ( $row = $result->fetch_assoc () ) {
			array_push ( $arr, $row );
		}
		echo json_encode ( $arr );
	}else{
		echo 'Không có dữ liệu';
	}
	
	$conn->close ();
	
	?>