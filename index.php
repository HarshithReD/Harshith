<link rel="stylesheet" href="style.css">
<h1>Menu</h1>
<form method="post" onsubmit="fun();" action="order.php">
<div id="menu"></div>
</br>
<input type="submit" name="sub" id="sub" value="order">
</form>
<h3 id="ohead">Your order</h3>
<div id="order"></div>
<br>
<div id="total">Total = 0</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
var gid;
var total=0;
 $(document).ready(function() {
        setTimeout(function(){
       $('.items').hide();
		$('.items').fadeIn(1500,function(){});
		
			 });
        }, 100);
		$('#ohead').click(function(){
			$('#order').toggle(300);
		});

$.ajax({
	url:"db.php",
	type:"post",
	dataType:"json",
	data:{},
	success:function(data){
		var a=data.rows;
		gid=data;
		for(var i=1;i<=a;i++){
			console.log(data[i]);
		var r=$('<input type="button" id="'+data[i]+'" class="items" onclick="func('+i+')" value="'+data[i]+'"/><br>');
        $('#menu').append(r);
		$('#order').show();
		
		}
		
	}
	
});
function func(j){
	var price=gid['price'][j];
	var item=gid[j];
	$('#order').append('~> '+item+'<br><br>');
	total=Number(total)+Number(price);
	$('#total').html("Total = "+total);
	$(document).scrollTop(3000);
	$('#order').show();
}
function fun(){
	var data=$('#order').text();
	
	$.ajax({
	url:"order.php",
	data:{data:data},
	type:"post",
	dataType:"json",
	
	success:function(data){}
	});
}




</script>
