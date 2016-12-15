	<?php
	include 'db.php';
	$maNV = "";
	
	$tenKH = "";
	$sdtKH = "";
	$diaChiKH = "";
	
	$maKH = "";
	$maHD = "";
	
	$maNV = $_REQUEST ["maNV"];
	$tenKH = $_REQUEST ["tenKH"];
	$sdtKH = $_REQUEST ["sdtKH"];
	$diaChiKH = $_REQUEST ["diaChiKH"];
	
	$ketQua = [ ];
	$getSDTKH = "SELECT `maKhachHang`, `tenKhachHang`, `soDienThoaiKH`, `diaChiKH` FROM `tbl_khachhang` WHERE `soDienThoaiKH`= '$sdtKH'";
	$resultSDTKH = $conn->query ( $getSDTKH );
	if ($resultSDTKH->num_rows > 0) {
		$tempMaKH = "";
		while ( $rowSDTKH = $resultSDTKH->fetch_assoc () ) {
			$tempSDT = $rowSDTKH ["soDienThoaiKH"];
			$tempMaKH = $rowSDTKH ["maKhachHang"];
		}
		if ($tempSDT == $sdtKH) {
			$maKH = $tempMaKH;
			$ketQua ["trung"] = "true";
			
			// Sau đó lưu hóa đơn:
			$insertHD = "INSERT INTO `tbl_hoadon` (`fk_maKhachHang`, `fk_maNhanVien`) VALUES ('$maKH', '$maNV')";
			if ($conn->query ( $insertHD ) === TRUE) {
				// Rồi tìm mã hóa đơn:
				$getMaHD = "SELECT `maHoaDon` FROM `tbl_hoadon` ORDER BY `maHoaDon` DESC LIMIT 1";
				$resultHD = $conn->query ( $getMaHD );
				if ($resultHD->num_rows > 0) {
					$maHD = $resultHD->fetch_assoc () ["maHoaDon"];
					// trả về mã hóa đơn:
					$ketQua ["maHoaDon"] = $maHD;
				}
			} else {
				echo $conn->error;
			}
			// Kết thúc lưu hóa đơn
		}
	} else {
		$insertKH = "INSERT INTO `tbl_khachhang`(`tenKhachHang`, `soDienThoaiKH`, `diaChiKH`) VALUES ('$tenKH', '$sdtKH','$diaChiKH')";
		if ($conn->query ( $insertKH ) === TRUE) {
			// Nếu lưu thành công thì get mã khách hàng nằm cuối
			$getMaKH = "SELECT `maKhachHang` FROM `tbl_khachhang` ORDER BY `maKhachHang` DESC LIMIT 1";
			$resultMaKH = $conn->query ( $getMaKH );
			if ($resultMaKH->num_rows > 0) {
				$maKH = $resultMaKH->fetch_assoc () ["maKhachHang"];
				$ketQua ["trung"] = "false";
				
				// Sau đó lưu hóa đơn:
				$insertHD = "INSERT INTO `tbl_hoadon` (`fk_maKhachHang`, `fk_maNhanVien`) VALUES ('$maKH', '$maNV')";
				if ($conn->query ( $insertHD ) === TRUE) {
					// Rồi tìm mã hóa đơn:
					$getMaHD = "SELECT `maHoaDon` FROM `tbl_hoadon` ORDER BY `maHoaDon` DESC LIMIT 1";
					$resultHD = $conn->query ( $getMaHD );
					if ($resultHD->num_rows > 0) {
						$maHD = $resultHD->fetch_assoc () ["maHoaDon"];
						// trả về mã hóa đơn:
						$ketQua ["maHoaDon"] = $maHD;
					}
				} else {
					echo $conn->error;
				}
				// Kết thúc lưu hóa đơn
			}
		}
	}
	function luuHD($conn, $maKH, $maNV, $maSP, $soLuong, $tongTien, $ketQua) {
		$insertHD = "INSERT INTO `tbl_hoadon` (`fk_maKhachHang`, `fk_maNhanVien`) VALUES ('$maKH', '$maNV')";
		if ($conn->query ( $insertHD ) === TRUE) {
			// Rồi tìm mã hóa đơn:
			$getMaHD = "SELECT `maHoaDon` FROM `tbl_hoadon` ORDER BY `maHoaDon` DESC LIMIT 1";
			$resultHD = $conn->query ( $getMaHD );
			if ($resultHD->num_rows > 0) {
				$maHD = $resultHD->fetch_assoc () ["maHoaDon"];
				// Sau khi lấy được mã hóa đơn thì lưu chi tiết đơn hàng:
				$insertDetail = "INSERT INTO `tbl_chitiethoadon` (`fk_maHoaDon`, `fk_maSanPham`, `soLuong`, `tongTien`) VALUES ('$maHD', '$maSP', '$soLuong', '$tongTien')";
				if ($conn->query ( $insertDetail ) === TRUE) {
					$ketQua ["insert"] = "true";
				} else {
					$ketQua ["insert"] = "false";
				}
			}
		} else {
			echo $conn->error;
		}
	}
	echo json_encode ( $ketQua );
	$conn->close ();
	
	?>