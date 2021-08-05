<?php
session_start();


?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script src="https://kit.fontawesome.com/79a0fbe733.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <style>
/* #overlay {
  position: fixed;
  /* display: none; 
  width: auto;
  height: auto;
  top: 20%;
  left: 15%;
  right: 15%;
  bottom: 10%;
  background-color: red;
  z-index: 2;
  cursor: pointer;
} */

/* #text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
} */
        </style>
    </head>
	<body>
        <!-- <div id="overlay">
            <div id="text"></div>
            <a href="new.php?id=<?php echo $_SESSION["id"]; ?>" id="card" class="btn btn-card" role="button" name="" id="checkout">Checkout</a>
        </div> -->
		<div class="head-to-head"></div>
        <div class="m-head">
            <h1>Your Basket </h1>
            <?php
                include "application_top.php";


                $query1=mysqli_query($conn, "SELECT  products.*, orders.* FROM
                 orders INNER JOIN products ON orders.product_id = products.product_id 
                 WHERE  orders.user_id='$_SESSION[id]'");
                



            ?>
            <table class="main">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                while($order_row=mysqli_fetch_array($query1))
                                { 
                ?>
                    <tr>
                        <td><?php echo $order_row["title"]; ?></td>
                        <td><?php if(strlen($order_row["descpt"])>30)
                        {
                            echo substr($order_row["descpt"],0,30)."....";
                        }
                        else{ echo substr($order_row["descpt"],0,30);}
                        ?></td>
                        <td><?php echo $order_row["prize"]; ?></td>
                        <td>
    
                            <button><?php echo $order_row['quant']; ?></button>

                        </td>
                        <td><?php echo  $order_row['quant'] * $order_row["prize"]; ?></td>
                        <td><a href="delete.php?id=<?php echo $_SESSION["id"]; ?>" class="" role="button"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>Total cost</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>

            </table>
            <div class="complete">
            <!-- <button  class="btn btn-card" >Continue</button> -->
                <a href="checkout.html" class="btn btn-card" id="card">Continue to Checkout</a>
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
// function on() {
//     document.getElementById("overlay").style.display = "block";
// }

</script>
