<?php session_start(); 


require_once "application_top.php";
error_reporting(0);
// require_once "application_top.php";





?>
<html>
    <head>
    	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://kit.fontawesome.com/79a0fbe733.js" crossorigin="anonymous"></script>
    	<link rel="stylesheet" href="assets/css/stylelog.css">
    </head>
    <body>
    	<div class="container">

        	<div class="card card-container">
                <h1 id="scs" style="color: green;"></h1>
        	    <h1 id="fail-login" style="color:red"></h1>
        	    <img id="profile-img" class="profile-img-card" src="assets/image/avatar.png" />
        	    <p id="profile-name" class="profile-name-card"></p>


        	    <form method="post" action="" name="signin-form" class="form-signin">
            	    <span></span>

                	<input type="text" id="inputText" class="form-control" name="username" pattern="[a-zA-Z0-9]+" required autofocus />
                	<input type="password" id="inputPassword" class="form-control" name="password" required />
            	    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit" value="login">Log In</button>
                    <div>If haven't got logined. <a href="register.php">Register</a></div>

                    <div id="via">
            	        <i class="fab fa-facebook-square"></i>
            	        <i class="fab fa-google-plus-square"></i>
            	        <i class="fab fa-twitter-square"></i>
        	        </div>

        	    </form>



    	    </div>

	    </div>
    </body>

</html>

<?php




$_SESSION["username"]=$_POST["username"];
$query=mysqli_query($conn, "SELECT * FROM user_details WHERE username='$_SESSION[username]'");
$user_row=mysqli_fetch_array($query);

$_SESSION["id"]=$user_row['id'];
$_SESSION["loggedin"] = true;

if(isset($_POST["submit"]))
{
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $query=mysqli_query($conn, "SELECT * FROM user_details WHERE username='$username'");
    $count=mysqli_num_rows($query);

    if($count==1)
    {
        $row=mysqli_fetch_assoc($query);
        if(password_verify($password, $row['password'])){
            echo '<script>
            if(document.getElementById("scs").innerHTML === ""){
                document.getElementById("scs").innerHTML += "Login Success. Wait few seconds";
            }
            </script>';
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                sleep(5);
                header("location: index.php");
                exit;
            }
        }
        else {
            echo '<script>
            if(document.getElementById("scs").innerHTML === ""){
                document.getElementById("scs").innerHTML += "Login or Username is incorrect";
            }
            </script>';
        }

        //header('Location: index.php');
    }
    else 
    {
        echo '<script>
        if(document.getElementById("fail-login").innerHTML === ""){
            document.getElementById("fail-login").innerHTML += "Failed login. Try again";
        }
        </script>';
        exit();
    }

}



