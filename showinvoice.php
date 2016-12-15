<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="images/fav.png" type="image/x-icon" />
<title>Chi tiết hóa đơn</title>
<link rel="stylesheet" href="jquery-mobile/jquery.mobile-1.4.5.min.css" />
<script src="jquery-mobile/jquery-1.11.1.min.js"></script>
<script src="jquery-mobile/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/invoicestyle.css">
<script type="text/javascript">
$(document).ready(function(){
	
// 	 = '{"maHoaDon":"5","fk_maNhanVien":"2","maKhachHang":"1","tenKhachHang":"\u0110\u1ed7 Xu\u00e2n Tr\u01b0\u1eddng","soDienThoaiKH":"0964224694","diaChiKH":"H\u00e0 N\u1ed9i","tenSanPham":"Samsung Galaxy Note 7","giaSanPham":"18200000","soLuong":"2","ngayMuaHang":"16\/12\/2016 02:48:07","tongTien":"36400000"}{"maHoaDon":"5","fk_maNhanVien":"2","maKhachHang":"1","tenKhachHang":"\u0110\u1ed7 Xu\u00e2n Tr\u01b0\u1eddng","soDienThoaiKH":"0964224694","diaChiKH":"H\u00e0 N\u1ed9i","tenSanPham":"Samsung S7 Edge","giaSanPham":"19000000","soLuong":"3","ngayMuaHang":"16\/12\/2016 02:48:07","tongTien":"63000000"}';
// 	$('#id').html(obj.maHoaDon);
// 	$('#ngayBan').html(obj.ngayMuaHang);
// 	$('#ngayXuat').html(obj.ngayMuaHang);
	var json =  [];
	<?php
	include 'api/getdetailinvoice.php';
	?>
	$('#id').html(json[0].maHoaDon);
	$('#ngayBan').html(json[0].ngayMuaHang);
	$('#ngayXuat').html(json[0].ngayMuaHang);
	$('#sdt').html(json[0].soDienThoaiKH);
	$('#ten').html(json[0].tenKhachHang);
	$('#diaChi').html(json[0].diaChiKH);
	var outputI = "";
	var sumBill = 0;
	$.each(json,function(ind,ele){
		sumBill+=parseInt(ele.tongTien);
		outputI+='<tr class="item">'
			+'<td>'+ele.tenSanPham+' x ('+ele.soLuong+')</td>'
				+'<td>'+parseInt(ele.giaSanPham).toLocaleString()+' đồng</td>'
				+'</tr>';
	});
	$('#tblInvoice').append(outputI);
	
	var outLast = '<tr class="total">'
		+'<td></td>'
	+'<td>Tổng: '+sumBill.toLocaleString()+' đồng</td>'
	+'</tr>';
	$('#tblInvoice').append(outLast);
});

</script>
<script type="text/javascript">

</script>


<body>
	<div class="invoice-box">
		<table cellpadding="0" cellspacing="0" id="tblInvoice">
			<tr class="top">
				<td colspan="2">
					<table>
						<tr>
							<td class="title"><img src="images/logo.png"
								style="width: 100%; max-width: 300px;"></td>

							<td>Invoice #: <span id="id">23</span><br> Ngày mua hàng: <span
								id="ngayBan"></span><br>Ngày xuất hóa đơn: <span id="ngayXuat">Due:
									February 1, 2015</span></td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="information">
				<td colspan="2">
					<table>
						<tr>
							<td>Ahamove Team.<br> P402, FPT Polytechnic.<br> Nhà H, Hàm Nghi,
								Mỹ Đình, Hà Nội.
							</td>

							<td><span id="diaChi">Invoice #: 23</span><br> <span id="sdt">Invoice
									#: 23</span><br> <span id="ten">Invoice #: 23</span></td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="heading">
				<td>Phương thức thanh toán</td>

				<td>Check #</td>
			</tr>

			<tr class="details">
				<td>Tiền mặt</td>

				<td>0</td>
			</tr>

			<tr class="heading">
				<td>Tên Sản Phẩm</td>

				<td>Giá</td>
			</tr>

		</table>
	</div>
</body>
</html>