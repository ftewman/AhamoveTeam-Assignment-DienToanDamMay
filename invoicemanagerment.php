<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="images/fav.png" type="image/x-icon" />
<title>Quản Lý Hóa Đơn</title>
<link rel="stylesheet" href="jquery-mobile/jquery.mobile-1.4.5.min.css" />
<script src="jquery-mobile/jquery-1.11.1.min.js"></script>
<script src="jquery-mobile/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/invoice.js"></script>

</head>

<body>

	<section id="container">
		<section data-role="header">
			<h1>Quản Lý Hóa Đơn</h1>
			    <a href="" data-icon="lock" id="btnLogout" class="ui-btn-right">Đăng
				Xuất</a>     
			<section data-role="navbar">
				        
				<ul>
					<li><a href="" id="btnOrder" class="ui-btn">Đơn Hàng</a></li>
					<li><a href="" id="btnInvoice" class="ui-btn ui-btn-active">Hóa Đơn</a></li>
					<li><a href="" id="btnProduct" class="ui-btn">Sản Phẩm</a></li>
				</ul>
				    
			</section>
			<!-- /navbar -->
		</section>
		<!-- /header -->

		<section id="content" data-role="content">
			<section id="themLoaiSanPham">
				<h3>Danh sách hóa đơn</h3>
				<form method="post" id="formInvoice" class="ui-filterable">
					<input type="text" id="invoiceID" name="invoiceID"
						data-type="search" placeholder="Tìm kiếm hóa đơn" required> <br>
					<!-- 					<ul id="lvInvoice" data-role="listview" data-filter="false" -->
					<!-- 						data-filter-reveal="false" data-input="#invoiceID"> -->
					<!-- 						<li> -->

					<table data-role="table" id="tbl-invoice" data-filter="true"
						data-input="#invoiceID" data-mode="reflow"
						class="ui-body-d ui-shadow table-stripe ui-responsive"
						title="Danh Sách Loại Sản Phẩm">
						 
						<thead>
							    
							<tr>
								<th data-priority="1">ID</th>       
								<th data-priority="persist">Phone</th>       
								<th data-priority="2">Name</th>       
								<th data-priority="3">Total Bill</th>       
							</tr>
							  
						</thead>
						<tbody id="tblInvoice">
							<tr class>
								<th><b class="ui-table-cell-label">ID</b>1</th>
								<td><b class="ui-table-cell-label">Phone</b><a href=""
									class="ui-link">0964224694</a></td>
								<td><b class="ui-table-cell-label">Name</b>Đỗ Xuân Trường</td>
								<td><b class="ui-table-cell-label">Total Bill</b>200000000</td>
							</tr>
						</tbody>

					</table>
					<!-- 						</li> -->
					<!-- 					</ul> -->
					<br>
				</form>
			</section>

			<div data-role="popup" id="popupSuccess" data-theme="a"
				class="ui-corner-all">
				<p>Thêm thành công</p>
			</div>
		</section>
	</section>
</body>
</html>
