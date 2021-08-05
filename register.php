<?php session_start();
error_reporting(0);
require_once "application_top.php";



// function credentialize($username, $password, $email, $cpassword){
$usrname = $psword = $confirm_psword = "";
$usrname_err = $psword_err = $confirm_psword_err = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
      $usrname_err = "Please enter a username";
    } else {
      $username=mysqli_real_escape_string($conn, $_POST['username']);
      $email=mysqli_real_escape_string($conn, $_POST['email']);

      $query =  "SELECT id FROM user_details WHERE username='$username'";

      if($stmt = mysqli_prepare($conn, $query)){
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        $param_username = trim($username);

        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);

          if(mysqli_stmt_num_rows($stmt) == 1){
            $usrname_err="This username is already taken.";
          }
          else {
            $usrname=trim($username);
          }

        } else{
          echo "Ooooooooops! Please try again later.";
        }

        mysqli_stmt_close($stmt);
      }
    }
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword=mysqli_real_escape_string($conn, $_POST['cpassword']);
    $hash=password_hash($password, PASSWORD_DEFAULT);

    if(empty(trim($hash))){
      $psword_err = "Password must have atleast 6 characters.";
    } else{
      $psword = trim($hash);
    }

    if(empty(trim($cpassword))){
      $confirm_psword = trim($cpassword);
      if(empty($psword_err) && ($psword != $confirm_psword)){
        $confirm_psword_err="Password should match.";
      }
    }

    if(empty($usrname_err) && empty($psword_err) && empty($confirm_psword_err)){

      $query = "INSERT INTO user_details(`username`, `emailid`, `password`) 
      VALUES('$username', '$email', '$hash')";
      // function checker($conn, $query, $stmt, $usrname, $psword){
      if($stmt = mysqli_prepare($conn, $query)){
        $param_username = $usrname;
        $param_password = password_hash($psword, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, 'ss', $param_username, $param_password);

        var_dump($param_password);


        if(mysqli_stmt_execute($stmt)){

          sleep(1);
          
          header("location: login.php");
        }
        else {
          // var_dump($param_password);
          echo "Ooooops! Try again later.";
        }

        mysqli_stmt_close($stmt);
      }
    }
    }

    mysqli_close($conn);
  // }
  // checker($conn, $query, $stmt, $usrname, $psword);
// }

 ?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
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


              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="signin-form" class="form-signin">
            	    <span></span>
                  <label for="username">Input Username</label>
                	<input type="text" id="inputText" name="username" class="form-control <?php echo (!empty($usrname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $usrname; ?>" placeholder="Username" />
                  <span class="invalid-feedback"><?php echo $usrname_err; ?></span>
                  <label for="email">Input Email</label>
                  <input type="text" id="inputPassword" class="form-control" name="email" placeholder="Email" required />
                  <label for="password">Input Password</label>
                  <input type="password" id="inputPassword" class="form-control <?php echo (!empty($psword_err)) ? 'is-invalid' : ''; ?>" name="password" placeholder="Password" value="<?php echo $psword; ?>" />
                  <span class="invalid-feedback"><?php echo $psword_err; ?></span>
                  <label for="Cpassword">Confirm Password</label>
                  <input type="password" id="inputPassword" class="form-control <?php echo (!empty($confirm_psword_err)) ?  'is-invalid' : ''; ?>" name="cpassword" placeholder="Password" value="<?php echo $confirm_psword; ?>" />
                  <span class="invalid-feedback"><?php echo $confirm_psword_err; ?></span>
                  <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit" value="Register">Register</button>

               </form>
        </div>	    
      </div>
    </body>

</html>
<?php







// if(isset($_POST['username']))
// {


//     // if(empty)
//     // if($password != $cpassword) {
//     //     array_push($errors, "Wrong Confirmation");
//     // }
//     $query=mysqli_query($conn, "SELECT * FROM user_details WHERE username='$username'");
//     $count=mysqli_num_rows(trim($query));



//     if($count==1)
//     {
//        echo '<script>
//        if(document.getElementById("fail-login").innerHTML === ""){
//        document.getElementById("fail-login").innerHTML += "Username already exists. Try another";
//         }
//        </script>';

//        echo "Username already exists";
//     }
//     else if($count==0)
//     {
//         $insert_query=mysqli_query($conn, "INSERT INTO user_details(`username`, `emailid`, `password`) 
//         VALUES('$username', '$email', '$password')") or die("error");
//          if($insert_query)
//          {        
//           echo '<script>
//           if(document.getElementById("scs").innerHTML === ""){
//               document.getElementById("scs").innerHTML += "You are logged in.";
//           }
//           </script>';
//           @ob_flush();
//           flush();
//           sleep(1);
//           echo "<script>window.location.href = 'login.php'</script>";
//          }
//          // mysqli_query($conn, $insert_query);
       
//         $_SESSION['username']=$username;

//     }
// }
// function registerUser($username, $email, $pass, $cpass)
// {

    
// }

// registerUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['cpassword']);

?>