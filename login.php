<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Trang chu</title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript">
        	
			$(document).ready(function() {
				
				$("#username").focus();
				
				$("#login").click(function() {
                    var un = $("#username").val();
					var pw = $("#password").val();
					if($.trim(un).length > 0 && $.trim(pw).length > 0){
						var dulieu = 'action=login&username='+un+'&password='+pw;
						
						$.ajax({
							type: "POST",
							data: dulieu,
							url: "http://localhost/webbanhang/checklogin.php",
							success: function(responseText){

								if(responseText == "1"){
									window.location.href="http://24h.com.vn/";
								}else if(responseText == "0"){
									alert("false");
								}else{
									alert("loi");
								}
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) { 
								alert("Status: " + errorThrown.responseText);
							} 
						
						});
					}
					
                });
                
            });
			
        </script>
    </head>
    
    <body>
    
        <form method="post" id="formDangNhap">
            <img src="images/logo.png" height="95" width="300" />
            <label for="username">Tên đăng nhập:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" id="password" required>
            <input type="button" class="ui-btn" value="Đăng nhập" id="login">
            <a href="#" class="quenMatKhau">* Quên mật khẩu</a>
        </form>
        
    </body>
</html>
