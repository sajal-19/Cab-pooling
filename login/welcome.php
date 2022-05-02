<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Success</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Montserrat:ital,wght@0,300;0,500;0,800;0,900;1,800&family=Ubuntu&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
        <!-- font awesome using link-->
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 


    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body class="color">
    
<header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-transparent ps-5">
    <div class="container-fluid">
      <a class="navbar-brand " href="#"> <b> Cabzi</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cab.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="about us.html">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.html">Contact Us</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
    
          
          <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
               <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
           </li>
            </ul>
          </div>
        </ul>
        
    </div>
  </nav>
</header> 
    </ul>

  

  </div>
</nav>

<div class="container mt-4">
 
<br><br>
<img class="float-end" src="images/heart (2).png" alt=" this is image" srcset="" style="max-width: 80%;">
  <h1 class="display-4"><?php echo"Dear ". $_SESSION['username']?> </h2>
  <h2 class="lead">Thank you !</h2>
  <p> For choosing cabzi we assure that this ride is best ride you enjoy in your life. and we hope to have uh agaim here again</p>
  <hr class="my-4">
  <p>Every journey creates it own expereience so enjoy our ride and forgot the problems.</p>
  <a class="btn btn-dark btn-lg pd-1 m-2" href="book_ride.php">Book Cab</a>
  <br><br><br><br><br>
  <br><br><br><br><br>
 <br><br><br><br><br>
 
</div>
 
</div>
<!-- FOOTER -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section
      class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background-color:#EDEDED"
    >
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a  class="btn btn-dark btn-floating m-1 "
        style="background-color: #3055a3;"
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
        style="background-color: hsl(7, 71%, 55%);"
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
        role="button">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5" >
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-car me-3"></i>Cabzi
            </h6>
            <p>
              This is website which provides the ride to the customer where customer can enjoy th ride and pool the cab in a cost effective way.
            </p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i>Graphic Era Hill University,Uk, India</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              sajalgupta19082002.sg@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 91 8192046262</p>
            
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color:#0F0E0E">
      © 2022 Copyright:
      <a class="text-reset fw-bold" href="cab.html">Cabzi.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
