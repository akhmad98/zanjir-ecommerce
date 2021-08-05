<?php
session_start();
require_once "application_top.php";

$_SESSION["username"]='ahmad';
?>
<html>
	<head>
		<script src="https://kit.fontawesome.com/79a0fbe733.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	</head>
	<body>
		<?php

		$product_id=isset($_GET['product_id']) ? $_GET['product_id'] : '';
		$query=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$product_id'");
		$row=mysqli_fetch_array($query);
		
		 ?>
		<div class="head-to-head">				
			<?php
					 
			?></div>
		 <div class="container">
			 <div class="left-column">
				 <img src="assets/image/products/<?php echo $row['img']; ?>" alt="">
			 </div>
			 <div class="right-column">
				 <div class="product-desc">
					<span> </span>
					<h1><?php echo $row['title']; ?></h1>
					<p><?php echo $row['descpt']; ?></p>
				 </div>
				 <div class="product-price">
					 <span>$<?php echo $row['prize']; ?></span>

				 </div>
				 <form action="" method="post">
					<div>
						<div class="center">
							<p>
							</p><div class="input-group">
								<span class="input-group-btn">
									<button class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant">
									<span class="glyphicon glyphicon-minus"></span>
									</button>
								</span>
								
								<input type="text" name="quant" id="inpt" class="form-control input-number" value="1" min="1" max="10">
								<span class="input-group-btn">
									<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant">
										<span class="glyphicon glyphicon-plus"></span>
									</button>
								</span>
							</div>
						</div>
						<a href="basket.php?product_id=<?php echo $row['product_id'];?>" class="btn-card"><button name="cart_button" style="background: transparent;border:none;">Add to Card</button></a>
						
					</div>
				 </form>
				
			 </div>
		 </div>
		<div class="footer"></div>
	</body>
</html>
<script>
$(function(){
  	$(".head-to-head").load("included/header1.php");
});
$(function(){
  $(".footer").load("included/footer.html");
});

$('.btn-number').click(function(e){
	e.preventDefault();

	fieldName = $(this).attr('data-field');
	type = $(this).attr('data-type');
	var input = $("input[name='"+fieldName+"']");
	var currentVal = parseInt(input.val());
	if(!isNaN(currentVal)) {
		if(type == 'minus') {
			if(currentVal > input.attr('min')) {
				input.val(currentVal - 1).change();
			}
			if(parseInt(input.val()) == input.attr('min')) {
				$(this).attr('disabled', true);
			} 
		}else if(type == 'plus') {
				if(currentVal < input.attr('max')) {
					input.val(currentVal + 1).change();
				}
				if(parseInt(input.val()) == input.attr('max')) {
					$(this).attr('disabled', true);
				}
			}	
		}else {
				input.val(0);
	}
});
$('.input-number').focusin(function(){
	$(this).data('oldValue', $(this).val());
});
$('.input-number').change(function(){
	minValue = parseInt($(this).attr('min'));
	maxValue = parseInt($(this).attr('max'));
	valueCurrent = parseInt($(this).val());
	
	const newLocal = name = $(this).attr('name');
	if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});
</script>

<?php
if(isset($_POST['cart_button'])){

	$quer=mysqli_query($conn, "SELECT  user_details.*, orders.* FROM orders INNER JOIN user_details ON orders.user_id = user_details.id WHERE user_details.username='$_SESSION[username]' AND orders.product_id='$product_id'");
	// if(empty($quer)){
	// 	echo "Salom";
	// }

	$count2=mysqli_num_rows($quer);
	$row_order=mysqli_fetch_array($quer);

	$no_qty=$row_order['quant'] + intVal($_POST["quant"]);
	$quer1=mysqli_query($conn, "SELECT * FROM user_details WHERE username='$_SESSION[username]'");
	$user_row=mysqli_fetch_array($quer1);

		if($count2>=1)
		{
			mysqli_query($conn, "UPDATE orders SET quant=$no_qty WHERE user_id='$user_row[id]' AND product_id='$product_id'");
		}
		else
		{
			mysqli_query($conn, "INSERT INTO orders(user_id, product_id, quant) VALUES('$user_row[id]', '$_GET[product_id]', '1')");
		}


	
	$_SESSION["name"]=$row['title'];
	$_SESSION["description"]=$row['descpt'];
	$_SESSION["prize"]=$row['prize'];


}

?>