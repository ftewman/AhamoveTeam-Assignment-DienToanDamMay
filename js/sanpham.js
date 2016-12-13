var link = "http://localhost/inf/AhamoveTeam-Assignment-DienToanDamMay";
	var backupProduct;

	function editProduct(id){
		$.getJSON(link+'/getproductoredit.php',{action:'getproduct',maSanPham:id},function(resGTE){
			$('#productNameEdit').val(resGTE.tenSanPham);
			$('#productNameEdit').attr('name',resGTE.maSanPham);
			$('#priceEdit').val(resGTE.giaSanPham);
			$('#descriptionEdit').val(resGTE.moTa);
			var outputCE = "";
			var catForEdit = resGTE.Categories;
			$.each(catForEdit,function(iPcFE,ePcFE){
				outputCE+= '<option value="'+ePcFE.maLoai+'">'+ePcFE.tenLoai+'</option>';
			});
			$('#productCategoriesEdit').html(outputCE);
			$('#productCategoriesEdit').val(resGTE.fk_maLoai).change();
			
			$('#popupEdit').popup('open');
		});
		
		
		
		
	}
//load category and product
	function loadCatAndProd(){
 		$.getJSON(link+'/getproductandcategories.php',function(res){
	 		var categories = res.Categories;
		 	var products = res.Products;
		 	backupProduct = products;
		 	var outputC = "";
		 	var outputTbl ="";
			$.each(categories,function(indexC, elementC){
				outputC+= '	<option value="'+elementC.maLoai+'">'+elementC.tenLoai+'</option>';
				outputTbl+= '<tr>'
					+'<th><b class="ui-table-cell-label">ID</b>'+elementC.maLoai+'</th>'
					+'<td><b class="ui-table-cell-label">Tên Loại</b>'+elementC.tenLoai+'</td>'
					+"<td><input type=\"button\" class=\"ui-btn\" onclick=\"deleteCategory('"+elementC.maLoai+"')\" id=\"deleteProduct\" value=\"Xóa\"></td>"
					+'</tr>';
			});
			$('#productCategories').html(outputC);
			$('#tblLoaiSanPham').html(outputTbl);

			var outputP = "";
			$.each(products,function(indexP, elementP){
				outputP+= '<tr>'
					+'<th><b class="ui-table-cell-label">ID</b>'+elementP.maSanPham+'</th>' 
					+'<td><b class="ui-table-cell-label">Tên Máy</b><a id="editProduct" class="ui-link" onclick="editProduct('+elementP.maSanPham+')" href="#">'+elementP.tenSanPham+'</a></td>'
					+'<td><b class="ui-table-cell-label">Giá</b>'+elementP.giaSanPham+'</td>'
					+'<td data-rel="external"><b class="ui-table-cell-label">Mô tả</b>'+elementP.moTa+'</td>'
					+"<td><input type=\"button\" class=\"ui-btn\" onclick=\"deleteProduct('"+elementP.maSanPham+"')\" id=\"deleteProduct\" value=\"Xóa\"></td>"
					+'</tr>';
			});+
			$('#listSanPham').html(outputP);
	 	});	
 	}
	
	
	
// delete product
	function deleteProduct(idDP){
		$.getJSON(link+'/deleteproductorcategory.php',{action:'product',maSanPham:idDP},function(resDP){
			if(resDP.result == "true"){
				loadCatAndProd();
			}
		});
	}
// delete category
	function deleteCategory(idDC){
		$.getJSON(link+'/deleteproductorcategory.php',{action:'category',maLoai:idDC},function(resDC){
			if(resDC.result == "true"){
				loadCatAndProd();
			}
		});
	}
	$(document).ready(function() {
	 	loadCatAndProd();
	 	$('#productName').focus();
// add product
	 	$('#addProduct').click(function (){
			var productName = $('#productName').val();
			var price = $('#price').val();
			var description = $('#description').val();
			var productCategories = $('#productCategories').val();
			if(productName.length == 0){
				$('#productName').focus();
				$('#productName').attr('placeholder','Không được để trống');
				
			}else if(price.length == 0){
				$('#price').focus();
				$('#price').attr('placeholder','Không được để trống');
				
			}else if(description.length == 0){
				$('#description').focus();
				$('#description').attr('placeholder','Không được để trống');
				
			}else{
				$.getJSON(link+'/insertproductorcategory.php'
						,{action:'product',tenSanPham:productName,giaSanPham:price,fk_maLoai:productCategories,moTa:description},
						function(resIP){
					if(resIP.result == 'true'){
						loadCatAndProd();
						$('#productName').val("");
						$('#price').val("");
						$('#description').val("");
						$('#productName').focus();
						$('#tblProduct').collapsible('expand');
						setTimeout(function(){$("#popupAddSuccess").popup("close");}, 1000);
						$("html, body").animate({ scrollTop: $(document).height() }, 1000);
					}
					},	function(errIP){
							alert(errIP);
						});		
			}

	 	});
	 	//update product
	 	$('#editProduct').click(function(){
	 		var idUpdate = $('#productNameEdit').attr('name');
	 		var productNameEdit = $('#productNameEdit').val();
			var priceEdit = $('#priceEdit').val();
			var descriptionEdit = $('#descriptionEdit').val();
			var productCategoriesEdit = $('#productCategoriesEdit').val();
			if(productNameEdit.length == 0){
				$('#productNameEdit').focus();
				$('#productNameEdit').attr('placeholder','Không được để trống');
				
			}else if(priceEdit.length == 0){
				$('#priceEdit').focus();
				$('#priceEdit').attr('placeholder','Không được để trống');
				
			}else if(descriptionEdit.length == 0){
				$('#descriptionEdit').focus();
				$('#descriptionEdit').attr('placeholder','Không được để trống');
				
			}else{
				$.getJSON(link+'/getproductoredit.php'
						,{action:'editproduct',maSanPham:idUpdate,tenSanPham:productNameEdit,giaSanPham:priceEdit,fk_maLoai:productCategoriesEdit,moTa:descriptionEdit},
						function(resUP){
					if(resUP.result == 'true'){
						loadCatAndProd();
						$('#productNameEdit').val("");
						$('#priceEdit').val("");
						$('#descriptionEdit').val("");
						$('#productNameEdit').focus();
						$('#tblProductEdit').collapsible('expand');
						setTimeout(function(){$("#popupEdit").popup("close");}, 100);
						$("html, body").animate({ scrollTop: $(document).height() }, 1000);
					}
					},	function(errUP){
							alert(errUP);
						});		
			}
	 	});
	 	
	 	// add category
		$('#addCat').click(function(){
			var catName = $('#catName').val();
			if(catName.length==0){
				$('#catName').focus();
				$('#catName').attr('placeholder','Không được để trống');
				return;
			}
			$.getJSON(link+'/insertproductorcategory.php'
					,{action:'category',tenLoai:catName}
			,function(resIC){
				if(resIC.result=='true'){
					$('#catName').val('');
					$('#catName').focus();
					loadCatAndProd();
				}
			}
			,function(errIC){alert(errIC)});
			
		});
		 
		$('#btnLogout').click(function(){
			localStorage.clear();
			window.location.assign('index.php');
		});
	 	
	});