
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BankDB";

// Create connection
//$conn = new mysqli($servername, //$username, $password, $dbname);
// Check connection

$conn = mysqli_connect($servername, $username, $password, $dbname);




if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>