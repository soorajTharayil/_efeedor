<?php 
$servername = "localhost";
$username = "phpmyadmin";
$password = "Efeedor#@100";
$dbname = "efeedor_qms_new";

// Create connection
$conn_g = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_g->connect_error) {
  die("Connection failed: " . $conn_g->connect_error);
}

?>


