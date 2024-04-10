<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Tech Pro Admin</a>
                </div>
            </div>
            <ul class="sidebar-nav">
            <li class="sidebar-item">
                    <a href="Dashboard.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="tasks.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Task</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="providers.php" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Service Providers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="profile.php" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Profile</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="main p-3">

            <div class="">



                <h1>
                 Service Providers
                </h1>
                <!-- user statistics overview cards -->

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
                  echo"<b><h6 class='card-title'>$phone</h6></b>";
                  echo"<b><h6 class='card-title'>$email</h6></b>";
                  echo"<p class='card-text'>$description</p>";

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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>