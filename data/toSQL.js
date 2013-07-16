function load_signin(){
	
	var address=$("#address").val();
	var address2=$("#address2").val();
	alert(address+","+address2);
	
	var succ = 
	function(){
		
	}
	
	var ret=$.ajax({
		type:"POST",
		url:"ins.php",
		data:{x:address,y:address2},
		async: false,
		success: succ()})
		
	.done(
		function(msg){
			alert("D!");
		}
	);

}
