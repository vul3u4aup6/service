<?php
$servername = "localhost";
$username = "root";
$password = "vul3aup6";
$dbname = "service";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,'UTF8');

?>