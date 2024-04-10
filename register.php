<?php

require_once 'db_connect.php';


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $description = $_POST['description'];
    $password = $_POST['password'];
    $image = $_POST['image'];
    

        //handle upload of the image to the folder structure.
        if(isset($_FILES["image"])){

            //relevant image information
            $fileName = basename($_FILES["image"]["name"]);
            $file = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $filetype = $_FILES['image']['type'];

            //get the file extension and format picture name.
            $fileext = explode('.', $fileName);
            $fileactualext = strtolower(end($fileext));

            // Construct the complete file path adding the file extension.
            $filenamenew = uniqid('',true).'.'.$fileactualext;
            $Fullimagepath= "images/".$filenamenew;

            //upload the image into the project folder.
            move_uploaded_file($tempname, $Fullimagepath);

        }


    // SQL query to insert user data into the database
    $sql = "INSERT INTO users (fullname,email,phone,service,image,description, password) VALUES (?,?,?,?,?,?,?)";


    
    try {
        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters to placeholders and execute the prepared statement
        if ($stmt->execute([$fullname, $email, $phone, $service, $Fullimagepath, $description, $password])) {
            echo "User registered successfully";
            header('location: login.html');
        } else {
            echo "Error: Unable to register user";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}


?>

