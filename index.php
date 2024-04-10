<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href="style.css" type="text/css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>


<div class="container">

<!-- navigation bar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tech Pro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav"> <!-- Add justify-content-end class here -->
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

<br>
<h2>Our Services</h2>
<br>

<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card 1</h5>
          <p class="card-text">This is some text within Card 1.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card 2</h5>
          <p class="card-text">This is some text within Card 2.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card 3</h5>
          <p class="card-text">This is some text within Card 3.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
  <br>

     <!-- services start here -->

<br>
<h2>Service Providers</h2>
<br>

<?php

$conn = mysqli_connect("localhost", "root", "", "techpro");
    if ($conn->connect_error) {
        die("connection faied:" . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE service != 'admin'";
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



          echo"<div class='col-sm-6 col-md-4 col-lg-3'>";
            echo"<div class='card' style='width: 18rem;'>";
               echo" <img src='$image' class='card-img-top' alt='...'>";
                echo"<div class='card-body'>";
                  echo"<h5 class='card-title'>$fullname</h5>";
                  echo"<b><h6 class='card-title'>$service</h6></b>";
                  echo"<p class='card-text'>$description</p>";

              echo"     
              <form method='POST' action='hire.php'>
              <input type='hidden' name='id' value='$id'>
              <button class='btn btn-primary' type='submit'>Hire</a>
              </form>       
              ";

              echo "</div>";
              echo "</div>";
            echo "</div>";


        }
        echo "</row";
        echo "</div>";
    } else {
    }

?>

  </div>
  </div>


  <footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="footerNav">
            <ul><li><a href="">Home</a></li>
                <li><a href="">News</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">our Team</a></li>
            </ul>
        </div>
        
    </div>
   <div class="footerBottom">
        <p>Copyright &copy;2024; Designed by <span class="designer">Sheilah Nakabuubi</span></p>
    </div>
</footer>
      
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>