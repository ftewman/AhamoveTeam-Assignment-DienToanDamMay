<?php
include 'db.php';
$action = "";
$maSanPham = "";
$maLoai = '';
$action = $_REQUEST ['action'];
if ($action == 'product') {
	$maSanPham = $_REQUEST ["maSanPham"];
	$deleteP = "DELETE FROM `tbl_sanpham` WHERE `maSanPham` =  $maSanPham";
	if ($conn->query ( $deleteP ) === TRUE) {
		$arr ['result'] = 'true';
	} else {
		$arr ['result'] = 'false';
	}
	echo json_encode ( $arr );
}
if($action == 'category'){
	$maLoai = $_REQUEST['maLoai'];
	$deleteC = "DELETE FROM `tbl_loaisanpham` WHERE `maLoai` = $maLoai";
	if ($conn->query ( $deleteC ) === TRUE) {
		$arr ['result'] = 'true';
	} else {
		$arr ['result'] = 'false';
	}
	echo json_encode ( $arr );
}
$arr = array ();


?>