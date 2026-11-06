<?php
$host = "localhost"; 
$user = "u892683572_halloween_usr"; 
$pass = "P@ssw0rdITD"; 
$dbname = "u892683572_halloween_db"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>