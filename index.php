<?php

/* ––––– CONNECTION TO MYSQL BDD ––––– */

$host = 'localhost';
$dbname = 'mylibrary';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Successfully connected to $dbname on $host.";

} catch (PDOException $e) {
    
    die("Unable to connect to database $dbname :" . $e->getMessage());

} ?>