<header class="header">
 <div class="navigation">
   <div class="logo">
     <p>Logo</p>
   </div>
   <nav class="nav-links">
     <ul class="bar">
       <li><a class="page1" href="login.php">Shoes</a></li>
       <li><a class="page2" href="login.php">Shirts</a></li>
       <li><a class="page3" href="login.php">Trousers</a></li>

     </ul>
   </nav>
   <div class="btnPrimary">
     <div class="inbtn1">
       <button id="btn" class="btn" type="button" name="button" onclick="change()"><i class="fas fa-user-circle"></i> Account</button>
     </div>
     </div>
   </div>
   <div class="outBtn">
     <div id="a" style=" height: auto;">
       <button id="1" type="button" class="btn2" value="click" onclick="menu1.toogle()"><i class="fas fa-sign-in-alt"></i> <a href="login.php">Login</a></button>
     </div>
   </div>


     <div class="img-box">
       <img src="assets/image/textback.png" style="width: 100%">
     </div>

     <script>

     function change(){
     	if(document.querySelector(".btn2").style.display = 'none'){
     		document.querySelector(".btn2").style.display = 'block';
     	}
     	else if (document.querySelector(".btn2").style.display = 'block'){
     		document.querySelector(".btn2").style.display = 'none'
     	}
     }
     </script>

   </header>
