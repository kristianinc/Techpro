<?php

// Database configuration


$dbHost = 'localhost'; // Change this to your database host 127.0.0.1
$dbName = 'techpro'; // Change this to your database name
$dbUsername = 'root'; // Change this to your database username
$dbPassword = ''; // Change this to your database password

// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set character set to UTF-8
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}

?>