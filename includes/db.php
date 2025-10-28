<?php
$servername = "localhost";
$username = "root";
$password = ""; // if password is set, add here
$dbname = "child_adoption_portal";

// $servername = "db";
// $username = "root";
// $password = "root"; // if password is set, add here
// $dbname = "child_adoption_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
