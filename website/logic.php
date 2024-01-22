<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Fetch data from the stock table
    $sql = "SELECT * FROM stock";
    $result = $conn->query($sql);

    $data = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo "Error: " . $conn->error;
    }

} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Insert data into the stock table
    $itemType = $_POST['itemType'] ?? '';
    $specificItem = $_POST['specificItem'] ?? '';
    $opening = $_POST['opening'] ?? 0;
    $added = $_POST['added'] ?? 0;
    $total = $_POST['total'] ?? 0;
    $closingStock = $_POST['closingStock'] ?? 0;
    $sales = $_POST['sales'] ?? 0;
    $unitPrice = $_POST['unitPrice'] ?? 0;
    $totalSales = $_POST['totalSales'] ?? 0;
    $createdAt = $_POST['createdAt'] ?? '';

    $sql = "INSERT INTO stock (itemType, specificItem, opening, added, total, closingStock, sales, unitPrice, totalSales, createdAt)
            VALUES ('$itemType', '$specificItem', $opening, $added, $total, $closingStock, $sales, $unitPrice, $totalSales, '$createdAt')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
