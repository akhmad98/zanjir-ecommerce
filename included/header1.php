<?php

include "../application_top.php";
?>
<div class="navigation" style="background-color: rgba(0, 0, 0, 0.7);">
	<div class="logo">
		 <p>Logo</p>
	</div>
	<nav class="nav-links">
		 <ul class="bar">
			 <li><a class="page1" href="category.php?type=shoes">Shoes</a></li>
			 <li><a class="page2" href="category.php?type=shirts">Shirts</a></li>
			 <li><a class="page3" href="category.php?type=trousers">Trousers</a></li>

		 </ul>
	</nav>
	<div class="btnPrimary">
		<?php
			$cart_query=mysqli_query($conn, "SELECT u.*, o.order_id, o.quant, o.product_id FROM user_details u JOIN orders o ON u.id = o.user_id WHERE username='$_SESSION[username]'");
			$count=mysqli_num_rows($cart_query);
		?>
		 <div class="inbtn1">
       		<button id="2" type="button" class="btn3" value="click" onclick="toggle()"><a href="basket.php">(<?php echo $count; ?>)<i class="fa fa-shopping-basket"></i></a></button>
			<button id="btn" class="btn" type="button" name="button" onclick="thenChange()"><i class="fas fa-user-circle"></i> Account</button>
		 </div>
	</div>
</div>
	 <div class="outBtn">
		 <div id="a" style=" height: auto;">
			 <button id="3" type="button" class="btn4" value="click" onclick="menu3.toogle()" style="color:black;"><i class="fas fa-sign-out-alt"></i> <a id="exit-link" href="logout.php" style="color: black;">Logout</a></button>
		 </div>
	 </div>
	 <div id="test">

	 </div>

<script>

$(function(){
  $(".footer").load("inluded/footer.html");
});
function thenChange(){
 if(document.querySelector(".btn4").style.display = 'none'){
   document.querySelector(".btn4").style.display = 'block';
 }
 else if (document.querySelector(".btn4").style.display = 'block'){
   document.querySelector(".btn4").style.display = 'none';
 }
}

</script>
<?php
printf($cart_query);
?>