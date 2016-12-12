<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thêm</title>
<link rel="stylesheet" href="jquery-mobile/jquery.mobile-1.4.5.min.css" />
<script src="jquery-mobile/jquery-1.11.1.min.js"></script>
<script src="jquery-mobile/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript">
	var link = "http://localhost/inf/AhamoveTeam-Assignment-DienToanDamMay";
	function loadCatAndProd(){
 		$.getJSON(link+'/getproductandcategories.php',function(res){
	 		var categories = res.Categories;
		 	var products = res.Products;
		 	var outputC = "";
		 	var outputTbl ="";
			$.each(categories,function(indexC, elementC){
				outputC+= '	<option value="'+elementC.maLoai+'">'+elementC.tenLoai+'</option>';
				outputTbl+= '<tr>'
					+'<th><b class="ui-table-cell-label">ID</b>'+elementC.maLoai+'</th>'
					+'<td><b class="ui-table-cell-label">Tên Máy</b>'+elementC.tenLoai+'</td>'
					+"<td><input type=\"button\" class=\"ui-btn\" onclick=\"deleteCategory('"+elementC.maLoai+"')\" id=\"deleteProduct\" value=\"Xóa\"></td>"
					+'</tr>';
			});
			$('#productCategories').html(outputC);
			$('#tblLoaiSanPham').html(outputTbl);

			var outputP = "";
			$.each(products,function(indexP, elementP){
				outputP+= '<tr>'
					+'<th><b class="ui-table-cell-label">ID</b>'+elementP.maSanPham+'</th>'
					+'<td><b class="ui-table-cell-label">Tên Máy</b>'+elementP.tenSanPham+'</td>'
					+'<td><b class="ui-table-cell-label">Giá</b>'+elementP.giaSanPham+'</td>'
					+'<td data-rel="external"><b class="ui-table-cell-label">Mô tả</b>'+elementP.moTa+'</td>'
					+"<td><input type=\"button\" class=\"ui-btn\" onclick=\"deleteProduct('"+elementP.maSanPham+"')\" id=\"deleteProduct\" value=\"Xóa\"></td>"
					+'</tr>';
			});+
			$('#listSanPham').html(outputP);
	 	});	
 	}
	function deleteProduct(idDP){
		$.getJSON(link+'/deleteproduct.php',{action:'product',maSanPham:idDP},function(resDP){
			if(resDP.result == "true"){
				loadCatAndProd();
			}
		});
	}
	function deleteCategory(idDC){
		$.getJSON(link+'/deleteproduct.php',{action:'category',maLoai:idDC},function(resDC){
			if(resDC.result == "true"){
				loadCatAndProd();
			}
		});
	}
	$(document).ready(function() {
	 	loadCatAndProd();
	 	$('#productName').focus();

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
				$.getJSON(link+'/insertproductorcategory.php',{action:'product',tenSanPham:productName,giaSanPham:price,fk_maLoai:productCategories,moTa:description},
						function(resIP){
					if(resIP.result == 'true'){
						loadCatAndProd();
						$('#productName').val("");
						$('#price').val("");
						$('#description').val("");
						$('#productName').focus();
						$("#popupAddSuccess").popup("open");
						setTimeout(function(){$("#popupAddSuccess").popup("close");}, 1000);
						$("html, body").animate({ scrollTop: $(document).height() }, 1000);
					}
					},	function(errIP){
							alert(errIP);
						});		
			}

	 	});
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
					loadCatAndProd();
				}
			}
			,function(errIC){alert(errIC)});
			
		});
	 	
	});
</script>
</head>

<body>

	<section id="container">
		<section data-role="navbar">
			<ul>
				<li><a href="#" id="btnNav" class="ui-btn">Sản Phẩm</a></li>
				<li><a href="#" id="btnNav" class="ui-btn">Thêm Sản Phẩm</a></li>
				<li><a href="#" id="btnNav" class="ui-btn">Thêm Sản Phẩm</a></li>
			</ul>
		</section>
		<section id="content" data-role="content">
			<section id="themLoaiSanPham">
				<h3>Thêm Loại Sản Phẩm</h3>
				<form method="post" id="formAddProduct">
					<label for="catName">Tên loại sản phẩm:</label> <input type="text"
						name="catName" id="catName" required> <input type="button"
						class="ui-btn" value="Thêm" id="addCat">
				</form>

			</section>
			<section data-role="collapsible" data-collapsed-icon="arrow-d"
				data-expanded-icon="arrow-u" data-iconpos="right">
				<table data-role="table" id="movie-table" class="ui-responsive"
					title="Danh Sách Loại Sản Phẩm">
					<tr>
						<h3>Danh sách loại sản phẩm</h3>
					</tr>
					<thead>
						<tr>
							<th data-priority="1">ID</th>       
							<th data-priority="2">Tên Loại</th>       
						</tr>
					</thead>
					<tbody id="tblLoaiSanPham">
						<tr>
							<td colspan="4"><p align="center">
									<strong>Không có dữ liệu</strong>
								</p></td>
						</tr>
					</tbody>
				</table>

			</section>

			<hr>
			<section id="themSanPham">
				<h3>Thêm Sản phẩm</h3>
				<form method="post" id="formAddProduct">
					<label for="productName">Tên sản phẩm:</label> <input type="text"
						name="productName" id="productName" required> <label for="price">Giá:</label>
					<input type="number" name="price" id="price" maxlength="12"
						required> <label for="description">Mô tả:</label>
					<textarea type="text" name="description" id="description"
						maxlength="50" required></textarea>
					<select id="productCategories">
						<option value="1">Apple</option>
					</select> <input type="button" class="ui-btn" value="Thêm"
						id="addProduct">
				</form>
			</section>

			<section data-role="collapsible" data-collapsed-icon="arrow-d"
				data-expanded-icon="arrow-u" data-iconpos="right">
				<table data-role="table" id="movie-table" class="ui-responsive"
					title="Danh Sách Sản Phẩm">
					<tr>
						<h3>Danh sách sản phẩm</h3>
					</tr>
					<thead>
						<tr>
							<th data-priority="1">ID</th>       
							<th data-priority="2">Tên Máy</th>       
							<th data-priority="3">Giá</th>       
							<th data-priority="persist">Mô tả</th>
						</tr>
					</thead>
					<tbody id="listSanPham">
						<tr>
							<td colspan="4"><p align="center">
									<strong>Không có dữ liệu</strong>
								</p></td>
						</tr>
					</tbody>
				</table>
			</section>

		</section>
	</section>

</body>
</html>
