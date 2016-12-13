<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="images/fav.png" type="image/x-icon" />
<title>Đăng nhập</title>
<link rel="stylesheet" href="jquery-mobile/jquery.mobile-1.4.5.min.css" />
<script src="jquery-mobile/jquery-1.11.1.min.js"></script>
<script src="jquery-mobile/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript">
		var link = "http://localhost/inf/AhamoveTeam-Assignment-DienToanDamMay";
		var resultCheck = localStorage.getItem("result","none");
		if(resultCheck=="success"){
			window.location.assign('productmanagerment.php');
		}
			$(document).ready(function() {
				
				$("#username").focus();
				$("#login").click(function() {
                    var un = $("#username").val();
					var pw = $("#password").val();
					
					if($.trim(un).length > 0 && $.trim(pw).length > 0){
						
						$.getJSON(link+'/checklogin.php', {action:'login',username:un, password: pw}, function(data){
							if(data.result == "success"){
								localStorage.setItem("maNhanVien", data.maNhanVien);
								localStorage.setItem("tenDangNhap", data.tenDangNhap);
								localStorage.setItem("tenNhanVien", data.tenNhanVien);
								localStorage.setItem("diaChiNV", data.diaChiNV);
								localStorage.setItem("soDienThoaiNV", data.soDienThoaiNV);
								localStorage.setItem("matKhau", data.matKhau);
								localStorage.setItem("result", data.result);
								window.location.assign('productmanagerment.php');
							}
						});
						
// 						$.ajax({
// 							type: "POST",
// 							data: dulieu,
// 							url: link+ "/checklogin.php",
// 							success: function(responseText){

// 								if(responseText == "1"){
// 									window.location.href="http://24h.com.vn/";
// 								}else if(responseText == "0"){
// 									alert("false");
// 								}else{
// 									alert("loi"+ responseText);
// 								}
// 							},
// 							error: function(XMLHttpRequest, textStatus, errorThrown) { 
// 								alert("Status: " + errorThrown.responseText);
// 							} 
						
// 						});

					}
					
                });
                
            });
			
        </script>
</head>

<body>
	<form method="post" id="formDangNhap">
		<img src="images/logo.png" height="95" width="300" /> <label
			for="username">Tên đăng nhập:</label> <input type="text"
			name="username" id="username" required> <label for="password">Mật
			khẩu:</label> <input type="password" name="password" id="password"
			required> <input type="button" class="ui-btn" value="Đăng nhập"
			id="login"> <a href="#" class="quenMatKhau">* Quên mật khẩu</a>
	</form>

</body>
</html>
