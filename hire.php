<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>


     <!-- navigation bar  -->
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Tech Pro</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="services.html">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="login.html">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="register.html">Register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  <!-- navigation end -->


   <!-- services start here -->

   <div class="container">
<br>
<h2>Hire This Service Provider</h2>
<br>



<?php

require_once 'db_connect.php';


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];



$conn = mysqli_connect("localhost", "root", "", "techpro");
if ($conn->connect_error) {
    die("connection faied:" . $conn->connect_error);
}


    $sql = "SELECT * FROM users WHERE id = $id ";
  // this is an sql statement to pick all users from the database

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      echo"<div class='row'>";

        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];
            $fullname = $row['fullname'];
            $email = $row['email'];
            $phone = $row['phone'];
            $service = $row['service'];
            $image = $row['image'];
            $description = $row['description'];



        echo'
        
        <div class="row">
            <div class="col-md-6">

            ';

            echo"<div class='card' style='width: 18rem;'>";
            echo" <img src='$image' class='card-img-top' alt='...'>";
             echo"<div class='card-body'>";
               echo"<h5 class='card-title'>$fullname</h5>";
               echo"<b><h6 class='card-title'>$service</h6></b>";
               echo"<p class='card-text'>$description</p>";

           echo "</div>";
           echo "</div>";   

    echo'        
            </div>

            <div class="col-md-6">

            
            <form method="POST" action="hirebackend.php">
            <h5> Please fill in your details to complete hiring </h5>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We\'ll never share your details with anyone else.</div>
            </div>

            <input type="hidden" name="id" value="'.$id.'">

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Phone</label>
              <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Offer(price)</label>
              <input type="text" name="offer" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Describe your work</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Hire</button>
          </form>



            </div>
        </div>
        
        
        ';



        }
        echo "</row";
        echo "</div>";
    } else {
    }

}


?>

