<?php

if (isset($_SESSION['user_id'])) {

    header('location:index.html');
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome for icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../menu.css">
    <link rel="stylesheet" href="../css/demo.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,500,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"> -->
    <title>Dashboard</title>

</head>

<body>

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">SCHOOLER</label>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="addstudents.html">Register Students</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav><br>
    <h2 style="margin-left:40%;">Registered Students</h2><br>

    <?php

    // Require the database connection file
    require_once 'db_connect.php';

    $conn = mysqli_connect("localhost", "root", "", "school");
    if ($conn->connect_error) {
        die("connection faied:" . $conn->connect_error);
    }

    $sql = "select * from students";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // while loop to fetch contents of the database
        echo '<div class ="container">';
        echo '<table id="pupils" class="table table-striped">';

        echo '<tr><th>id</th><th>fullnames</th><th>performance</th><th>HIV Status</th><th>Action</th></tr>';

        while ($row = $result->fetch_assoc()) {


            $id = $row['id'];
            $fullname = $row['fullname'];
            $performance = $row['performance'];
            $HIV_status = $row['HIV_status'];


            echo '<form method="post" action="">';
            echo "<tr>";
            echo '<td> ' . $id . ' </td>';
            echo '<td> ' . $fullname . ' </td>';
            echo '<td> ' . $performance . ' </td>';
            echo '<td> ' . $HIV_status . ' </td>';
            echo '<td><a href="csrf.php?id=' . $id . '&fullname = ' . $fullname . ' &hiv_status=' . $HIV_status . '&performance=' . $performance . '">Edit</a></td>';


            echo "</tr></form>";
            echo '</div>';
        }
        echo "</table";
        echo '</div>';
    } else {
    }

    ?>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script> 
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#pupils').DataTable();
        });
    </script>


</body>

</html>