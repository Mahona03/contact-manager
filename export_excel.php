<?php
include 'db.php';

// Set headers to tell browser to download it as an Excel file
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="contacts_export.xls"');

// Start output
echo "ID\tName\tPhone\tEmail\n"; // column titles

// Fetch data from database
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row['id'] . "\t" . $row['name'] . "\t" . $row['phone'] . "\t" . $row['email'] . "\n";
    }
} else {
    echo "No contacts found";
}

$conn->close();
?>
