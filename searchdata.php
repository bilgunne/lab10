<?php
// Өгөгдлийн санд холбогдох
$servername = "localhost";
$username = "b";
$password = "";
$dbname = "database_lab10";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}