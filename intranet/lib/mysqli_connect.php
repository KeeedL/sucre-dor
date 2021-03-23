<?php
$servername = "localhost";
$username = "root";
$password = "root";
$conn = null;
$db_name = "bestOfBurger"; // Database Name

$conn = mysqli_connect($servername, $username, $password, $db_name); // Connect to Database

if(!$conn) // Check connection
{
	die("Connection failed: " . mysqli_connect_error()); // Display error if not connected
}
?>
