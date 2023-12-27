<?php

$servername = "localhost";
$username = "b";
$password = "";
$database = "database_lab10";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$parameter = isset($_GET['parameter']) ? $_GET['parameter'] : '';

$sql = "SELECT s.size as size, s.area as area, s.itemname as itemname, s.sectionname as sectionname, il.quantity as quantity, il.condition1 as condition1 FROM itemlocation il inner join storeholditems h on h.itemNo = il.itemNo inner join section s on s.sectionNo = il.sectionNo WHERE il.sectionNo = ?";



$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $parameter);
$stmt->execute();

$result = $stmt->get_result();

$response = [];

if ($result->num_rows > 0) {
    // get results
    while ($row = $result->fetch_assoc()) {
        $response[] = [
            'size' => $row['size'],
            'area' => $row['area'],
            'itemname' => $row['itemname'],
            'sectionname' => $row['sectionname'],
            'quantity' => $row['quantity'],
            'condition' => $row['condition1']
        ];
    }
} else {
    $response['message'] = "No results found.";
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);

?>