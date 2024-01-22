<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Fetch data from the expenses table
    $sql = "SELECT * FROM credit"; // Corrected table name to 'expenses'
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode($data);

} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Insert data into the expenses table
    $customer = $_POST['customer'];
    $amaunt = $_POST['amaunt'];
    $paid = $_POST['paid'];
    $comments = $_POST['comments'];
    $createdAt = $_POST['createdAt'];

    $sql = "INSERT INTO credit (customer, amaunt,paid, comments, createdAt)
            VALUES ('$customer', $amaunt,$paid, '$comments', '$createdAt')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
