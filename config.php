<?php
// Create connection
$conn = mysqli_connect("178.128.103.119", "user", "test","myDb");
mysqli_set_charset($conn,"utf-8");
if ($conn->connect_error) {
echo "error connection database or mysql". $conn->connect_error;
}
?>