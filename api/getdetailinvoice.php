	<?php
	include 'db.php';
	
	$maHoaDon = "";
	$maHoaDon = $_REQUEST ['maHoaDon'];
	$sql = "SELECT `tbl_hoadon`.`maHoaDon`,tbl_hoadon.fk_maNhanVien, `tbl_khachhang`.`maKhachHang`, tbl_khachhang.tenKhachHang, tbl_khachhang.soDienThoaiKH, tbl_khachhang.diaChiKH,tbl_sanpham.tenSanPham,tbl_sanpham.giaSanPham, tbl_chitiethoadon.soLuong, tbl_hoadon.ngayMuaHang, tbl_chitiethoadon.tongTien FROM `tbl_hoadon` LEFT JOIN `tbl_khachhang` ON `tbl_hoadon`.`fk_maKhachHang` = `tbl_khachhang`.`maKhachHang` LEFT JOIN `tbl_chitiethoadon` ON `tbl_chitiethoadon`.`fk_maHoaDon` = `tbl_hoadon`.`maHoaDon` LEFT JOIN tbl_sanpham ON tbl_chitiethoadon.fk_maSanPham = tbl_sanpham.maSanPham WHERE tbl_hoadon.maHoaDon = '$maHoaDon'";
	$resultI = $conn->query ( $sql );
	$output = "";
	$arr = array();
	$backupRow;
	if ($resultI->num_rows > 0) {
		while ( $row = $resultI->fetch_assoc () ) {
			array_push($arr, $row);
		}
		echo 'json ='.json_encode($arr).';';
// 				var ahihi = json.maHoaDon;
// 				$("#id").html("json.maHoaDon");
// 				$("#ngayBan").html('.$backupRow['ngayMuaHang'].');
// 				$("#ngayXuat").html('.$backupRow['ngayMuaHang'].');
// 				console.log(ahihi);
// 				';
		
		
		
		
		
	}
	
	?>