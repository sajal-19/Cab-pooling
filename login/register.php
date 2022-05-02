<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
        echo "<script type='text/javascript'>alert('$username_err');</script>";
    }
    else
    {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                    echo "<script type='text/javascript'>alert('$username_err');</script>";
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else
            {
                echo "Something went wrong";
            }
          }
          mysqli_stmt_close($stmt);
    }




// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
    echo "<script type='text/javascript'>alert('$password_err');</script>";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
    echo "<script type='text/javascript'>alert('$password_err');</script>";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
    echo "<script type='text/javascript'>alert('$password_err');</script>";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>


<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="j.css">
    <title>Register Here</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
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
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br><br>
<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="#" method="post">
				<h1>Register Here</h1>
		
				<input type="text" placeholder="Username" name="username" />
				<input type="password" placeholder="Password" name="password" />
        <input type="password" placeholder=" Confirm Password" name="confirm_password" />
				<br><br>
				<button style="background-color: #ffc930;">Register</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
          <img src="images/heart (2).png" alt=" this is a image" srcset="" style="max-width: 100%;">
					<h1>Cabzi </h1>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br>
<footer class="text-center text-lg-start bg-light text-muted">
  
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background-color:#EDEDED"
  >
    
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
  
  <div class="text-center p-4" style="background-color:#0F0E0E">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="cab.html">Cabzi.com</a>
  </div>

</footer>
<!-- Footer -->
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>

</html>