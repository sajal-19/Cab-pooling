<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
        echo "<script type='text/javascript'>alert('$err');</script>";
    }
    else
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


  if(empty($err))
  {
      $sql = "SELECT id, username, password FROM users WHERE username = ?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      $param_username = $username;
      
      
      // Try to execute this statement
      if(mysqli_stmt_execute($stmt))
      {
          mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) == 1)
                  {
                      mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                      if(mysqli_stmt_fetch($stmt))
                      {
                          if(password_verify($password, $hashed_password))
                          {
                              // this means the password is corrct. Allow user to login
                              session_start();
                              $_SESSION["username"] = $username;
                              $_SESSION["id"] = $id;
                              $_SESSION["loggedin"] = true;

                              //Redirect user to welcome page
                              header("location: welcome.php");
                              
                          }
                          else {
                            $message = "Username and/or Password incorrect.\\nTry again.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                          }
                        
                      }
                      else {
                        $message = "Username and/or Password incorrect.\\nTry again.";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                      }
                      

                  }
                  else {
                    $message = "Username and/or Password incorrect.\\nTry again.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                  }

      }
  }    


}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="j.css">
    <title>LOGIN </title>
  </head>
  <body class="color">
  <header>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Cabzi</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cab.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="about us.html">About Us</a>
        </li>  
      </ul>
    </div>
  </div>
</nav>
  </header>
<br><br><br><br><br><br><br><br>
<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="#" method="post">
				<h1>Login Here</h1>
		
				<input type="text" placeholder="Username" name="username" />
				<input type="password" placeholder="Password" name="password" />
       
        <br><br>
				<button style="border: 1px solid rgba(114, 114, 71, 0.733);background-color: #ff4f32;">login</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
          <img src="images/mobile-map-and-navigation.png" alt="" srcset="" style="max-width: 100%;">
					<h1>Cabzi </h1>
					</div>
			</div>
		</div>
	</div>
</div>
<br><br><br>
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background-color:#EDEDED"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    
    <div>
      <a  class="btn btn-dark btn-floating m-1"
      style="background-color: #3b5998;"
      href="#!"
      role="button">        <i class="fab fa-facebook-f"></i>
      </a>
      <a class="btn btn-dark btn-floating m-1"
      style="background-color: #55acee;"
      href="#!"
      role="button">
        <i class="fab fa-twitter"></i>
      </a>
      <a class="btn btn-dark btn-floating m-1"
      style="background-color: #dd4b39;"
      href="#!"
      role="button">
        <i class="fab fa-google"></i>
      </a>
      <a  class="btn btn-dark btn-floating m-1"
      style="background-color: #ac2bac;"
      href="#!"
      role="button">
        <i class="fab fa-instagram"></i>
      </a>
      <a class="btn btn-dark btn-floating m-1"
      style="background-color: #0082ca;"
      href="#!"
      role="button">
        <i class="fab fa-linkedin"></i>
      </a>
      <a class="btn btn-dark btn-floating m-1"
      style="background-color: #333333;"
      href="#!"
      role="button"">
        <i class="fab fa-github"></i>
      </a>
    </div>
  </section>
  <!-- Copyright -->
  <div class="text-center p-4" style="background-color:#0F0E0E">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="cab.html">Cabzi.com</a>
  </div>
  <!-- Copyright -->
</footer>

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>