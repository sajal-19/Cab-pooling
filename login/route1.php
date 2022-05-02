<?php
require_once "config.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
 { 
    echo " enterd";
     $cab = $_POST['cab'];
     $source = $_POST['source'];
     $destination = $_POST['destination'];
     $time=$_POST['time'];
     $sql = "INSERT INTO route1 (cab,source,destination,time1)
     VALUES ('$cab','$source','$destination','$time')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !" . $time;
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
mysqli_close($conn);
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

    <title>Route</title>
  </head>
  <body>
    
    <div class="container">
    <h1>Administrator Login </h1>
    <br><hr><br><br>
    <form class="row gy-2 gx-3 align-items-center" method="POST">
  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingInput">Cab</label>
    <select class="form-select" name="cab" id="autoSizingSelect">
      <option selected value="select">Choose a Cab</option>
      <option value="i10">i10</option>
      <option value="Santro">Santro</option>
      <option value="Swift">Swift</option>
      <option value="Wagnor">Wagnor</option>
      <option value="XUV">XUV</option>
    </select>
  </div>
  <div class="col-auto">
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
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
    </div>
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