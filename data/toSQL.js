//=====rightClick = set Point to SQL
function loadSignin(){
	var address=$("#address").val();
	var address2=$("#address2").val();
	alert(address+","+address2);
	
	var succ = function(){};
	
	var ret=$.ajax({
		type:"POST",
		url:"data/ins.php",
		data:{x:address,y:address2},
		async: false,
		success: succ()})
		
	.done(
		function(msg){
		alert("Inserted to SQL!!");
		}
	);
}		
 //==========

/*$(document).ready(function(){
  $(document).keydown(function(){
    $("#KeyID").val(event.which);
  });
  $(document).keyup(function(){
    $("#KeyID").val("");
  });
});
*/