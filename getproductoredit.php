	<?php
	include 'db.php';
	$action = "";
	$maSanPham = "";
	$tenSanPham = "";
	$giaSanPham = "";
	$fk_maLoai = "";
	$moTa = "";
	$action = $_REQUEST ['action'];
	$arr = array ();
	if ($action == "getproduct") {
		$maSanPham = $_REQUEST ['maSanPham'];
		$queryP = "SELECT * FROM `tbl_sanpham` WHERE `maSanPham` = '$maSanPham'";
		$resultP = $conn->query ( $queryP );
		
		if ($resultP->num_rows > 0) {
			while ( $row = $resultP->fetch_assoc () ) {
				$arr = $row;
				$arr ['result'] = 'true';
			}
		} else {
			$arr ['result'] = 'false';
		}
		$queryCat = 'SELECT * FROM `tbl_loaisanpham`';
		$resultCat = $conn->query ( $queryCat );
		$arrCat = array();
		if ($resultCat->num_rows > 0) {
			while ( $rowCat = $resultCat->fetch_assoc () ) {
				array_push ( $arrCat, $rowCat );
			}
			$arr ["Categories"] = $arrCat;
			// echo json_encode ( $arrP );
		}
		
		
		echo json_encode ( $arr );
	} else if ($action == 'editproduct') {
		$maSanPham = $_REQUEST ['maSanPham'];
		$tenSanPham = $_REQUEST ['tenSanPham'];
		$giaSanPham = $_REQUEST ['giaSanPham'];
		$fk_maLoai = $_REQUEST ['fk_maLoai'];
		$moTa = $_REQUEST ['moTa'];
		$editP = "UPDATE `tbl_sanpham` SET `tenSanPham`='$tenSanPham',`giaSanPham`='$giaSanPham',`fk_maLoai`='$fk_maLoai',`moTa`='$moTa' WHERE `maSanPham` = '$maSanPham'";
		if ($conn->query ( $editP ) === TRUE) {
			$arr ['result'] = 'true';
		} else {
			$arr ['result'] = 'false';
		}
		echo json_encode ( $arr );
	}
	
	?>