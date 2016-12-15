	<?php
	include 'db.php';
	
	$action = "";
	$maHoaDon = "";
	$action = $_REQUEST ['action'];
	$arr = array ();
	if ($action == 'getinvoices') {
		$query = "SELECT `tbl_hoadon`.`maHoaDon`, `tbl_khachhang`.`maKhachHang`, tbl_khachhang.tenKhachHang, tbl_khachhang.soDienThoaiKH, tbl_khachhang.diaChiKH , SUM(tbl_chitiethoadon.tongTien) AS 'tongTien' FROM `tbl_hoadon` LEFT JOIN `tbl_khachhang` ON `tbl_hoadon`.`fk_maKhachHang` = `tbl_khachhang`.`maKhachHang` LEFT JOIN `tbl_chitiethoadon` ON `tbl_chitiethoadon`.`fk_maHoaDon` = `tbl_hoadon`.`maHoaDon` GROUP BY tbl_hoadon.maHoaDon";
		$result = $conn->query ( $query );
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				array_push ( $arr, $row );
			}
			echo json_encode ( $arr );
		} else {
			$arr ['result'] = 'false';
			echo json_encode ( $arr );
		}
	} else if ($action == 'getinvoice') {
		$maHoaDon = $_REQUEST ['maHoaDon'];
		$sql = "SELECT `tbl_hoadon`.`maHoaDon`,tbl_hoadon.fk_maNhanVien, `tbl_khachhang`.`maKhachHang`, tbl_khachhang.tenKhachHang, tbl_khachhang.soDienThoaiKH, tbl_khachhang.diaChiKH,tbl_sanpham.tenSanPham,tbl_sanpham.giaSanPham, tbl_chitiethoadon.soLuong, tbl_hoadon.ngayMuaHang, tbl_chitiethoadon.tongTien FROM `tbl_hoadon` LEFT JOIN `tbl_khachhang` ON `tbl_hoadon`.`fk_maKhachHang` = `tbl_khachhang`.`maKhachHang` LEFT JOIN `tbl_chitiethoadon` ON `tbl_chitiethoadon`.`fk_maHoaDon` = `tbl_hoadon`.`maHoaDon` LEFT JOIN tbl_sanpham ON tbl_chitiethoadon.fk_maSanPham = tbl_sanpham.maSanPham WHERE tbl_hoadon.maHoaDon = '$maHoaDon'";
		$resultI = $conn->query ( $sql );
		if ($resultI->num_rows > 0) {
			while ( $row = $resultI->fetch_assoc () ) {
				echo json_encode ( $row );
			}
			
		} else {
			$arr ['result'] = 'false';
			echo json_encode ( $arr );
		}
	}
	
	?>