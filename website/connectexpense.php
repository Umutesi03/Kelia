<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Fetch data from the expenses table
    $sql = "SELECT * FROM expenses"; // Corrected table name to 'expenses'
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
    $descriptions = $_POST['descriptions'];
    $amaunt = $_POST['amaunt'];
    $comments = $_POST['comments'];
    $createdAt = $_POST['createdAt'];

    $sql = "INSERT INTO expenses (descriptions, amaunt, comments, createdAt)
            VALUES ('$descriptions', $amaunt, '$comments', '$createdAt')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
