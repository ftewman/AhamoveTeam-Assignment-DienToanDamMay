/**
 * 
 */
var link = "api/";
	var arrPtP = [];
	function checklogin(){
		var resultCheck = localStorage.getItem("result","none");
		if(resultCheck!='true'){
			window.location.assign('index.php');
		}
	}
	
	function deleteProducta(id){
		$('tr#'+id+'').remove();
		arrPtP.splice(arrPtP.indexOf(id),1);
	}
	
	checklogin();
	function addToCard(id){
		$.getJSON(link+'getproductoredit.php',{action:'getproduct',maSanPham:id},function(resGTE){
			var outputP = "";
				outputP+= '<tr id="'+resGTE.maSanPham+'">'
					+'<th><b class="ui-table-cell-label">ID</b>'+resGTE.maSanPham+'</th>' 
					+'<th><b class="ui-table-cell-label">Tên Máy</b>'+resGTE.tenSanPham+'</b></th>'
					+'<td><b class="ui-table-cell-label">Giá</b>'+resGTE.giaSanPham+'</td>'
					+'<td data-rel="external"><b class="ui-table-cell-label">Mô tả</b>'+resGTE.moTa+'</td>'
					+"<td><input type=\"button\" class=\"ui-btn\" onclick=\"deleteProducta('"+resGTE.maSanPham+"')\" id=\"deleteProduct\" value=\"Xóa\"></td>"
					+'</tr>';
			$('#listCart').append(outputP);
			$('#tblProduct').collapsible('expand');
			arrPtP.push(id);
		});
		
	}
	
$(document).ready(function(){
	$('#btnAddOrder').click(function() {
		$.each(arrPtP,function(ind,ele){
			console.log(ele);
		});
	});
	$.getJSON(link+'getproducts.php',function(resPs){
		var outputPs = "";
		$.each(resPs,function(resPsi, resPse){
			outputPs+='<li class="ui-screen-hidden">'
				+"<a href=\"\" class=\"ui-btn ui-btn-icon-right ui-icon-plus\" onclick=\"addToCard('"+resPse.maSanPham+"')\">"+resPse.tenSanPham+"</a></li>";
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