<?php
// Start the session
session_start();

// Require the database connection file
require_once 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        // Retrieve username and password from the form
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Construct the SQL query (vulnerable to SQL injection)
        $sql = "SELECT *  FROM users WHERE email = '$email' AND password = '$password'";

        // Execute the SQL query
        $result = $pdo->query($sql);

        // Check if a user with the provided username exists
        if ($result && $result->rowCount() > 0) {
            // Fetch the user record
            $user = $result->fetch(PDO::FETCH_ASSOC);

                $_SESSION["id"] = $user["id"];
                $_SESSION["service"] = $user["service"];

                // Redirect to the dashboard for admin.
                if($_SESSION["service"] == "admin") {

                    header("Location: Dashboard.php");

                } else {

                     header("Location:Myservice.php");

                }



                echo($_SESSION["service"]);

                //redirect to the rest of the pages for other services.




             //   header("Location: Myservice.php");



           
        } else {
            // User not found
            $error = "Wrong Credentials.";
            echo($error);
        }
    }
}
?>
