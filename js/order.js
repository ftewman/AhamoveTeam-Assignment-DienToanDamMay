/**
 * 
 */

function checklogin(){
		var resultCheck = localStorage.getItem("result","none");
		if(resultCheck!='true'){
			window.location.assign('index.php');
		}
	}
	checklogin();
	
$(document).ready(function(){
	
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