	<?php
	
	include 'db.php';
	$maHD = "";
	$maSP = "";
	$soLuong = "";
	$tongTien = "";
	
	$maHD = $_REQUEST ["maHD"];
	$maSP = $_REQUEST ["maSP"];
	$soLuong = $_REQUEST ["soLuong"];
	$tongTien = $_REQUEST ["tongTien"];
	
	$ketQua = [ ];
	
	// Sau khi lấy được mã hóa đơn thì lưu chi tiết đơn hàng:
	$insertDetail = "INSERT INTO `tbl_chitiethoadon` (`fk_maHoaDon`, `fk_maSanPham`, `soLuong`, `tongTien`) VALUES ('$maHD', '$maSP', '$soLuong', '$tongTien')";
	if ($conn->query ( $insertDetail ) === TRUE) {
		$ketQua ["insert"] = "true";
	} else {
		$ketQua ["insert"] = "false";
	}
	
	echo json_encode ( $ketQua );
	$conn->close ();
	
	?>