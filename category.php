
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	</head>
	<style media="screen">
		div.card-body > h1 {
			width: 100%;
			text-align: center;
		}
		p {
			padding-top: 15px;
			font-size: 18px;
			font-family: inherit;
			text-align: center;
		}

	</style>
	<body>
		<div class="head-to-head"></div>
		<div class="wraptek">
			<div class="wrapper">
				<?php
					include "application_top.php";
					$product_type=isset($_GET['type']) ? $_GET['type'] : '';
					$query=mysqli_query($conn, "SELECT * FROM products WHERE product_type='$product_type'");
					while($row=mysqli_fetch_array($query)){
				?>
						<div class="card" id="Products">
						<a href="product.php?product_id=<?php echo $row['product_id']; ?>" style="text-decoration: none">
							<div id="img-box">
								<img src="assets/image/products/<?php echo $row['img']; ?>" alt="" id="theImg" width="100%">
							</div>
						</a>
							<div class="card-body">
								<h1><?php echo $row['title']; ?></h1>
								<p class="card-text">$<?php echo $row['prize']; ?></p>
							</div>
						</div>
				<?php
					}

				?>
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
</script>
