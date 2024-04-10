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
                 Tasks / Hires
                </h1>
                <!-- user statistics overview cards -->

 <br>

                <?php

      session_start();
      $my_id = $_SESSION["id"];

        //echo($_SESSION["id"]);

            $conn = mysqli_connect("localhost", "root", "", "techpro");
                if ($conn->connect_error) {
                    die("connection faied:" . $conn->connect_error);
                }

                $sql = "SELECT users.fullname, users.service, hires.*
                FROM hires
                JOIN users ON hires.serviceprovider_id = users.id;
                ";
            // this is an sql statement to pick all users from the database

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                echo"<table class='table'>
                
                <thead>
                <tr>
                <th scope='col'>Client Name</th>
                <th scope='col'>Client Phone</th>
                <th scope='col'>Offer</th>
                <th scope='col'>Description</th>
                <th scope='col'>Service provider</th>
                <th scope='col'>Service</th>
                </tr>
                </thead>
                <tbody>
                
                ";

                    while ($row = $result->fetch_assoc()) {

                        $id = $row['id'];
                        $clientname = $row['clientname'];
                        $phone = $row['client_phone'];
                        $offer = $row['offer'];
                        $description = $row['description'];
                        $fullname = $row['fullname'];
                        $service = $row['service'];


                     echo' <tr>
                            <td>'.$clientname.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$offer.'</td>
                            <td>'.$description.'</td>
                            <td>'.$fullname.'</td>
                            <td>'.$service.'</td>
                           </tr>
                       ';

                    }
                    echo "</table";
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