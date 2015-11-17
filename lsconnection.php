<?php
session_start();
//setting up the databse connection
$servername = "localhost";
$username = "wkuykendall50";
$password = "ypahujuvu";
$dbname = "wkuykendall50_lecturesnippets";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>