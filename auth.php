<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myapp";

date_default_timezone_set('Asia/Jakarta');
$time = date('Y-m-d H:i:s');
$conn = new mysqli($servername, $username, $password, $dbname);
/* check connection */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>