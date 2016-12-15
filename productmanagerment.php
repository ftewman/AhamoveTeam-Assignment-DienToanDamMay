<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="images/fav.png" type="image/x-icon" />
<title>Quản Lý Sản Phẩm</title>
<link rel="stylesheet" href="jquery-mobile/jquery.mobile-1.4.5.min.css" />
<script src="jquery-mobile/jquery-1.11.1.min.js"></script>
<script src="jquery-mobile/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/sanpham.js"></script>

</head>

<body>

	<section id="container">
		<section data-role="header">
			<h1>Quản Lý Sản Phẩm</h1>
			<!-- 			    <a href="" data-icon="lock" id="btnLogout" class="ui-btn-right">Đăng -->
			<!-- 				Xuất</a>      -->
			<a href="#nav-panel" data-icon="bars" data-iconpos="notext"
				class="ui-link ui-btn-left ui-btn ui-icon-bars ui-btn-icon-notext ui-shadow ui-corner-all"
				data-role="button" role="button">Menu</a>
			<section data-role="navbar">
				        
				<ul>
					<li><a href="" id="btnOrder" class="ui-btn">Đơn Hàng</a></li>
					<li><a href="" id="btnInvoice" class="ui-btn">Hóa Đơn</a></li>
					<li><a href="" id="btnProduct" class="ui-btn ui-btn-active">Sản
							Phẩm</a></li>
				</ul>
				    
			</section>
			<!-- /navbar -->
		</section>
		<!-- /header -->
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
						required> <label for="productName">Loại sản phẩm:</label> <select
						id="productCategories">
						<option value="1">Apple</option>
					</select> <label for="description">Mô tả:</label>
					<textarea type="text" name="description" id="description"
						maxlength="50" required></textarea>
					<input type="button" class="ui-btn" value="Thêm" id="addProduct">
				</form>
			</section>

			<section id="tblProduct" data-role="collapsible"
				data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u"
				data-iconpos="right">
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
			<div data-role="popup" id="popupEdit" data-theme="a"
				class="ui-corner-all">
				    
				<form>
					        
					<div style="padding: 5px 35px;">
						            
						<h3>Sửa sản phẩm</h3>
						  <label for="productNameEdit">Tên sản phẩm:</label> <input
							type="text" name="productNameEdit" id="productNameEdit" required>
						<label for="priceEdit">Giá:</label> <input type="number"
							name="priceEdit" id="priceEdit" maxlength="12" required> <label
							for="productCategoriesEdit">Loại sản phẩm:</label> <select
							id="productCategoriesEdit">
							<option value="1">Apple</option>
						</select> <label for="descriptionEdit">Mô tả:</label>
						<textarea type="text" name="descriptionEdit" id="descriptionEdit"
							maxlength="50" required></textarea>
						<input type="button" class="ui-btn" value="Cập nhật"
							id="editProduct">
					</div>
					    
				</form>
			</div>
		</section>
		<div data-role="panel" data-display="push" data-theme="a"
			id="nav-panel"
			class="ui-panel ui-panel-position-left ui-panel-display-push ui-body-b ui-panel-animate ui-panel-open">

			<div class="ui-panel-inner">
				<ul data-role="listview" class="ui-listview">

					<li><a href="#panel-responsive-page2"
						class="ui-btn ui-btn-icon-right ui-icon-carat-r">Accordion</a></li>
					<li><a href="#panel-responsive-page2"
						class="ui-btn ui-btn-icon-right ui-icon-carat-r" id="btnLogout">Đăng xuất</a></li>
					<li data-icon="delete" class="ui-first-child"><a href="#"
						data-rel="close" class="ui-btn ui-btn-icon-right ui-icon-delete">Đóng</a></li>
				</ul>
			</div>

		</div>
	</section>

</body>
</html>
