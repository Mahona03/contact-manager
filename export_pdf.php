<?php
require('fpdf/fpdf.php'); // Include FPDF
include 'db.php';         // Include database connection

// Create PDF object
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Contact List', 0, 1, 'C');
$pdf->Ln(10);

// Column headers
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(50, 10, 'Name', 1);
$pdf->Cell(40, 10, 'Phone', 1);
$pdf->Cell(70, 10, 'Email', 1);
$pdf->Ln();

// Fetch contacts from database
$pdf->SetFont('Arial', '', 12);
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(20, 10, $row['id'], 1);
        $pdf->Cell(50, 10, $row['name'], 1);
        $pdf->Cell(40, 10, $row['phone'], 1);
        $pdf->Cell(70, 10, $row['email'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No contacts found.', 1, 1, 'C');
}

$conn->close();

// Output PDF to download
$pdf->Output('D', 'contacts_export.pdf'); 
// 'D' means "Download" the file
?>
