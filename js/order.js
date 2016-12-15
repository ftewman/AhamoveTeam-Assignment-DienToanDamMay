/**
 * 
 */
var link = "api/";
	var arrPtP = [];
	var arrP = [];
	var idKHtP;
	function checklogin(){
		var resultCheck = localStorage.getItem("result","none");
		if(resultCheck!='true'){
			window.location.assign('index.php');
		}
	}
	
	function deleteProducta(id){
		var pos = arrP.findIndex(x => x.id === id);
		$('tr#'+id+'').remove();
		arrPtP.splice(arrPtP.indexOf(id),1);
		arrP.splice(pos,1);
	}
	
	checklogin();
	
	function addToCart(id){
		var pos = arrP.findIndex(x => x.id === id);
		backupP = {};
		if(arrP.length==0){
			$.getJSON(link+'getproductoredit.php',{action:'getproduct',maSanPham:id},function(resGTE){
				var outputP = "";
					outputP+= '<tr id="'+resGTE.maSanPham+'">'
						+'<th><b class="ui-table-cell-label">ID</b>'+resGTE.maSanPham+'</th>' 
						+'<th><b class="ui-table-cell-label">Tên Máy</b>'+resGTE.tenSanPham+'</b></th>'
						+'<td><b class="ui-table-cell-label">Giá</b>'+resGTE.giaSanPham+'</td>'
						+'<td id="soLuong" data-rel="external"><b class="ui-table-cell-label">Số Lượng</b><p id="'+resGTE.maSanPham+'z">'+1+'</p></td>'
						+"<td><input type=\"button\" class=\"ui-btn\" onclick=\"deleteProducta('"+resGTE.maSanPham+"')\" id=\"deleteProduct\" value=\"Xóa\"></td>"
						+'</tr>';
				$('#listCart').append(outputP);
				$('#tblProduct').collapsible('expand');
				arrPtP.push(id);
				arrP.push({id:id,soLuong:1,gia:resGTE.giaSanPham,tongTien:resGTE.giaSanPham});
				console.log('1. size: '+ arrP.length+JSON.stringify(arrP,null));
			});
			
			return;
		}
		
		if(pos >= 0){
			arrP[pos].soLuong+=1;
			arrP[pos].tongTien = arrP[pos].soLuong * arrP[pos].gia;
			$('#'+id+'z').html(arrP[pos].soLuong);
			console.log('id: '+ id + ' - sl: '+ arrP[pos].soLuong);
			console.log('2. size: '+ arrP.length+'- pos: '+pos+' - '+JSON.stringify(arrP,null));
			return;
		}else if(pos ==-1){
			$.getJSON(link+'getproductoredit.php',{action:'getproduct',maSanPham:id},function(resGTE){
				var outputP = "";
				outputP+= '<tr id="'+resGTE.maSanPham+'">'
					+'<th><b class="ui-table-cell-label">ID</b>'+resGTE.maSanPham+'</th>' 
					+'<th><b class="ui-table-cell-label">Tên Máy</b>'+resGTE.tenSanPham+'</b></th>'
					+'<td><b class="ui-table-cell-label">Giá</b>'+resGTE.giaSanPham+'</td>'
					+'<td id="soLuong" data-rel="external"><b class="ui-table-cell-label">Số Lượng</b><p id="'+resGTE.maSanPham+'z">'+1+'</p></td>'
					+"<td><input type=\"button\" class=\"ui-btn\" onclick=\"deleteProducta('"+resGTE.maSanPham+"')\" id=\"deleteProduct\" value=\"Xóa\"></td>"
					+'</tr>';
				$('#listCart').append(outputP);
				$('#tblProduct').collapsible('expand');
				arrPtP.push(id);
				arrP.push({id:id,soLuong:1,gia:resGTE.giaSanPham,tongTien:resGTE.giaSanPham});
				console.log('3. size: '+ arrP.length+JSON.stringify(arrP,null));
			});
			return;
		}
	}
	
	function showCustomer(idKH){
		$.getJSON(link+'getcustomer.php',{action:'getcustomer',maKhachHang:idKH},function(reCC){
			$('#customerPhone').val(reCC.soDienThoaiKH);
			$('#customerName').val(reCC.tenKhachHang);
			$('#customerAddress').val(reCC.diaChiKH);
			idKHtP = idKH;
			$('#lvPhone').hide();
		});
	}
	
	
$(document).ready(function(){
	$('#btnAddOrder').click(function() {
		var cusPhone = $('#customerPhone').val();
		var cusName = $('#customerName').val();
		var cusAddress = $('#customerAddress').val();
		var staffID = localStorage.getItem('maNhanVien');
		if(cusPhone.length==0){
			$('#customerPhone').focus();
			$('#customerPhone').attr('placeholder','Không được để trống');
		}else if(cusName.length==0){
			$('#customerName').focus();
			$('#customerName').attr('placeholder','Không được để trống');
		}else if(cusAddress.length==0){
			$('#customerAddress').focus();
			$('#customerAddress').attr('placeholder','Không được để trống');
		}else if(arrP.length==0){
			$('#searchProduct').focus();
			$('#searchProduct').attr('placeholder','Mời thêm sản phẩm');
		}else{
			$.getJSON(link+'neworder.php',{tenKH:cusName,sdtKH:cusPhone,diaChiKH:cusAddress,maNV:staffID},function(resNO){
				var orderID = resNO.maHoaDon;
				$.each(arrP,function(lpi,lpe){
					$.getJSON(link+'detailorder.php',{maHD:orderID, maSP:lpe.id, soLuong:lpe.soLuong, tongTien:lpe.tongTien},function(resDNO){
						$('#customerPhone').focus();
						$('#customerPhone').val('');
						$('#customerName').val('');
						$('#customerAddress').val('');
						$('#searchProduct').val('');
						arrP.splice(0,arrP.length);
						arrPtP.splice(0,arrPtP.length);
						if(resDNO.insert=='true'){
							$('#popupSuccess').popup('open');
							setTimeout(function(){ 
								$('#popupSuccess').popup('close');
							}, 1500);
							
						}
					});
				});
			});
		}
			
	
	});
	
	$.getJSON(link+'getcustomer.php',{action:'getcustomers'},function(resCtS){
		var outputCs = "";
		$.each(resCtS,function(resCtSi, resCtSe){
			outputCs+='<li class="ui-screen-hidden">'
				+"<a href=\"\" class=\"ui-btn ui-btn-icon-right ui-icon-plus\" onclick=\"showCustomer('"+resCtSe.maKhachHang+"')\">"+resCtSe.soDienThoaiKH+"</a></li>";
		});
		$('#lvPhone').html(outputCs);
	});
	
	$.getJSON(link+'getproducts.php',function(resPs){
		var outputPs = "";
		$.each(resPs,function(resPsi, resPse){
			outputPs+='<li class="ui-screen-hidden">'
				+"<a href=\"\" class=\"ui-btn ui-btn-icon-right ui-icon-plus\" onclick=\"addToCart('"+resPse.maSanPham+"')\">"+resPse.tenSanPham+"</a></li>";
		});
		$('#lvProduct').html(outputPs);
		$('#lvProduct').show();
		
	});
	
	$('#btnProduct').click(function(){
		window.location.assign('productmanagerment.php');
	});
	$('#btnOrder').click(function(){
		window.location.assign('ordermanagerment.php');
	});
	 
	$('#btnLogout').click(function(){
		localStorage.clear();
		window.location.assign('index.php');
	});
	
});