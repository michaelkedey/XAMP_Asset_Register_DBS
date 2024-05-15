<?php
// Connect to the source database
$sourceConn = new mysqli('source_host', 'source_username', 'source_password', 'source_database');

// Connect to the destination database
$destinationConn = new mysqli('destination_host', 'destination_username', 'destination_password', 'destination_database');

// Check connection
if ($sourceConn->connect_error || $destinationConn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the source database
$sql = "SELECT * FROM source_table";
$result = $sourceConn->query($sql);

if ($result->num_rows > 0) {
    // Insert fetched data into the destination database
    while ($row = $result->fetch_assoc()) {
        $sql = "INSERT INTO destination_table (column1, column2, ...) 
                VALUES ('" . $row['column1'] . "', '" . $row['column2'] . "', ...)";
        $destinationConn->query($sql);
    }
}

// Close connections
$sourceConn->close();
$destinationConn->close();
?>
