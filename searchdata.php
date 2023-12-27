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

$parameter = isset($_GET['parameter']) ? $_GET['parameter'] : '';

$sql = "SELECT h.size as size, s.area as area, h.itemname as itemname, r.sectionname as sectionname, il.quantity as quantity, il.condition1 as condition1 FROM itemlocation il inner join storeholditems s on s.itemNo = il.itemno inner join section se on se.sectionNo = il.sectionNo WHERE il.sectionNo = ?";