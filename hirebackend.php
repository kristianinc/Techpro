<?php

require_once 'db_connect.php';


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['name'];
    $service_provider_id = $_POST['id'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $offer = $_POST['offer'];


    // SQL query to insert user data into the database
    $sql = "INSERT INTO hires (serviceprovider_id,clientname,client_phone,description, offer) VALUES (?,?,?,?,?)";


    
    try {
        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters to placeholders and execute the prepared statement
        if ($stmt->execute([$service_provider_id, $fullname, $phone, $description, $offer])) {
            echo "Hire registered successfully";
            header('location: hirestatus.php');
        } else {
            echo "Error: Unable to register user";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}


?>

