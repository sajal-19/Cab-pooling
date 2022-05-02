<?php
require_once "config.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$source=$_POST['source'];
$destination=$_POST['destination'];
$time=$_POST['time'];
$sql = "SELECT cab FROM route1 WHERE (source='$source' AND destination='$destination'  AND time1 >='$time'  ) ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
  
  // output data of each row
  while($row = mysqli_fetch_assoc($result))
   {
    
     $var=$row["cab"];
      $sql="SELECT * FROM route1 INNER JOIN  connect ON route1.cab=connect.cab WHERE(connect.cab ='$var' AND connect.space >0 )";
      $result1 = mysqli_query($conn, $sql);
      $row1=mysqli_fetch_assoc($result1);
      $var1=$row1["cab"];
      if (mysqli_num_rows($result1) > 0)
       {
         echo " inside the join query";
           $sql="UPDATE connect SET space = space-1 WHERE (cab ='$var')";
           $result2 = mysqli_query($conn, $sql);
           if ($result2) 
           {
            echo "Record updated successfully";
            header("location: success.php");
            echo "Record updated successfully";
            break;
          } 
          else 
          {
            echo "Error updating record: " . mysqli_error($conn);
          }
         // mysqli_close($result2);
        
        
       }
      else 
      {
        //echo "0 results";
        header("location:sorry.html");
       }
     // mysqli_close($result1);
    }

  }
  else 
  {
    //echo "0 results";
    header("location:sorry.html");
   }
 mysqli_close($conn);
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
    <title>Booking_Page</title>

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
        </ul>
        
    </div>
  </nav>
</header>
<br><br> 
    <br><br>
    <div class="jumbotron container mt-5">
    <img class="float-end" src="images/heart (2).png" alt=" this is image" srcset="" style="max-width: 35%;">
      <h1 class="display-4">Book A ride...</h2>
        <div class="container" style=" text-align:center;">
           
            <br><hr><br><br>
            <form class="row gy-2 gx-3 align-items-center"  method="POST">
          <div class="col-auto" >
            <label class="visually-hidden" for="autoSizingInputGroup">Source</label>
            <div class="input-group">
              <div class="input-group-text">@</div>
              <select class="form-select" name="source" id="autoSizingSelect">
              <option selected value="select">Choose a Source</option>
              <option value="Graphic-Era-Hill-University">Graphic-Era-Hill-University</option>
              <option value="ISBT">ISBT</option>
              <option value="Ghanta-Ghar">Ghanta-Ghar</option>
              <option value="Prem-Nagar">Prem-Nagar</option>
              <option value="Shimla-Bye-Pass">Shimla-Bye-Pass</option>
              <option value="Maggi-Point">Maggi-Point</option>
              <option value="Raj-Mandi">Raj-Mandi</option>
              <option value="JP-Bend">JP-Bend</option>
              <option value="First-Gyear-Cafe">First-Gyear-Cafe</option>
              <option value="Masli-Park">Masli-Park</option>
              <option value="Chanchank bridge">Chanchank bridge</option>
              <option value="Rispana">Rispana</option>
              <option value="Haridwar">Haridwar</option>
              <option value="Raiwala">Raiwala</option>
            
            </select>
            </div>
          </div>
          <div class="col-auto">
          <label class="visually-hidden" for="autoSizingInputGroup">Source</label>
            <div class="input-group">
              <div class="input-group-text">@</div>
              <select class="form-select" name="destination" id="autoSizingSelect">
              <option selected value="select">Choose a Destination</option>
              <option value="ISBT">ISBT</option>
              <option value="Ghanta-Ghar">Ghanta-Ghar</option>
              <option value="Prem-Nagar">Prem-Nagar</option>
              <option value="Shimla-Bye-Pass">Shimla-Bye-Pass</option>
              <option value="Maggi-Point">Maggi-Point</option>
              <option value="Raj-Mandi">Raj-Mandi</option>
              <option value="JP-Bend">JP-Bend</option>
              <option value="First-Gyear-Cafe">First-Gyear-Cafe</option>
              <option value="Masli-Park">Masli-Park</option>
              <option value="Chanchank bridge">Chanchank bridge</option>
              <option value="Rispana">Rispana</option>
              <option value="Haridwar">Haridwar</option>
              <option value="Raiwala">Raiwala</option>
              <option value="Vikash-Nagar">Vikash-Nagar</option>
              <option value="Masoorie">Masoorie</option>
              <option value="Dhanloti">Dhanloti</option>
              <option value="Dooiwala">Dooiwala</option>
              <option value="Rishikesh">Rishikesh</option>
            
            </select>
            </div>
          </div>
         
          <div class="col-auto">
              <input class="form-time"  name="time" type="time" id="autoSizingCheck">
            </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-dark " >Submit</button>
          </div>
        </form>
        <br>
        <br>
        <h1>Routes</h1>
        <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Graphic Era -> ISBT-> Ghanta-Ghar -> Premnagar -> Vikash-Nagar</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Graphic Era -> ISBT-> Shimila bye pass -> Maggi-point -> Masoorie</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-success">Graphic Era -> Raj-Mandi -> JP-Bend -> First-Gyear-Cafe -> Masli-Park -> Dhanloti</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Graphic Era -> ISBT-> Chanchank bridge -> Rispana -> Dooiwala </a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Graphic Era -> ISBT-> Haridwar -> Raiwala -> Rishikesh </a>
 </div>
    </div>  

      
     <br><br><br><br><br>
     <br><br><br><br><br>
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
  
    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>
