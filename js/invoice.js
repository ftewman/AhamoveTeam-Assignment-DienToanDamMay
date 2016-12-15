/**
 * 
 */

var api = 'api/';

	function getInvoice(maHD){
		$.getJSON(api+'getinvoice.php',{action:'getinvoice',maHoaDon: maHD}, function(resI){
			console.log(resI.ngayMuaHang);
		});
	}
$(document).ready(function(){
	$.getJSON(api+'getinvoice.php', {action:'getinvoices'}, function(resIs){
		//alert(resI.length);
		var outputI = "";
		$.each(resIs, function (resIi, resIe){
			outputI+='<tr class>'
				+'<th><b class="ui-table-cell-label">ID</b>'+resIe.maHoaDon+'</th>'
				+"<td><b class=\"ui-table-cell-label \">Phone</b><a href=\"showinvoice.php?maHoaDon="+resIe.maHoaDon+"\" class=\"ui-link\" target=\"_blank\">"+resIe.soDienThoaiKH+"</a></td>"
				+'<td><b class="ui-table-cell-label">Name</b>'+resIe.tenKhachHang+'</td>'
				+'<td><b class="ui-table-cell-label">Total Bill</b>'+resIe.tongTien+'</td>'
				+'</tr>';
		});
		$('#tblInvoice').html(outputI);
	});
	
	$('#btnOrder').click(function(){
		window.location.assign('ordermanagerment.php');
	});
	$('#btnInvoice').click(function(){
		window.location.assign('invoicemanagerment.php');
	});
	$('#btnProduct').click(function(){
		window.location.assign('productmanagerment.php');
	});
	$('#btnLogout').click(function(){
		localStorage.clear();
		window.location.assign('index.php');
	});
});