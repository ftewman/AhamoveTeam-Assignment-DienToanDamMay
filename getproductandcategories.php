	<?php
	include 'db.php';
	
	$queryCat = 'SELECT * FROM `tbl_loaisanpham`';
	$resultCat = $conn->query ( $queryCat );
	
	$queryP = "SELECT * FROM `tbl_sanpham`";
	$resultP = $conn->query ( $queryP );
	
	$arrS = array ();
	$arrP = array ();
	$arrCat = array ();
	
	if ($resultCat->num_rows > 0) {
		while ( $rowCat = $resultCat->fetch_assoc () ) {
			array_push ( $arrCat, $rowCat );
		}
		$arrS ["Categories"] = $arrCat;
		// echo json_encode ( $arrP );
	}
	
	if ($resultP->num_rows > 0) {
		while ( $rowP = $resultP->fetch_assoc () ) {
			array_push ( $arrP, $rowP );
		}
		$arrS ["Products"] = $arrP;
		// echo json_encode ( $arrP );
	}
	echo json_encode ( $arrS );
	
	$conn->close ();
	
	?>