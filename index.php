<?php session_start(); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Prime</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="https://kit.fontawesome.com/79a0fbe733.js" crossorigin="anonymous"></script>

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

<?php

    if($_SESSION["username"]!=null)
    {

      include "included/header1.php";

    }
    else
    {
        include "included/header.php";

    }

?>



		<div class="wraptek">


			<div class="wrapper">
				<?php
					include "application_top.php";
					
					$query=mysqli_query($conn, "SELECT * FROM products");
					$count=mysqli_num_rows($query);

					while($row=mysqli_fetch_array($query))
					{

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

	<div class="footer" id="included">

	</div>

	<script src="./js/home.js" type="text/javascript"></script>
</body>

</html>


