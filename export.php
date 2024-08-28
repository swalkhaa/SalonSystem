<?php
require_once('tcpdf/tcpdf.php');
require_once 'assets/conn/connection.php';

// Create new PDF document with A4 Landscape orientation
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

if (isset($_POST['export'])) {
    $reportType = $_POST['reportType'];

    if ($reportType == 'users') {
        generateUsersReport($pdf);
    } elseif ($reportType == 'customers') {
        generateAppointmentsReport($pdf);
    }
}

// Close and output PDF document
$pdf->Output('report.pdf', 'I'); // 'I' sends the file inline to the browser.

function generateUsersReport($pdf) {
    global $db;

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Admin');
    $pdf->SetTitle('Users Report');
    $pdf->SetSubject('Users PDF Report');

    // Add a page for Admins
    $pdf->AddPage();
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Write(0, 'Admins Report', '', 0, 'C', true, 0, false, false, 0);

    // Table Headers for Admins
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(40, 10, 'Username', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Email', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Phone', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Address', 1, 1, 'C');

    // Fetch Admins data from the database
    $admins = getUsersByRole('admin');
    
    // Display admins data in table rows
    $pdf->SetFont('helvetica', '', 10);
    foreach ($admins as $admin) {
        $pdf->Cell(40, 10, $admin['username'], 1, 0, 'C');
        $pdf->Cell(50, 10, $admin['email'], 1, 0, 'C');
        $pdf->Cell(40, 10, $admin['phone'], 1, 0, 'C');
        $pdf->Cell(50, 10, $admin['addr'], 1, 1, 'C');
    }

    // Add a new page for Customers
    $pdf->AddPage();
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Write(0, 'Customers Report', '', 0, 'C', true, 0, false, false, 0);

    // Table Headers for Customers
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(40, 10, 'Username', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Email', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Phone', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Address', 1, 1, 'C');

    // Fetch Customers data from the database
    $customers = getUsersByRole('customer');
    
    // Display customers data in table rows
    $pdf->SetFont('helvetica', '', 10);
    foreach ($customers as $customer) {
        $pdf->Cell(40, 10, $customer['username'], 1, 0, 'C');
        $pdf->Cell(50, 10, $customer['email'], 1, 0, 'C');
        $pdf->Cell(40, 10, $customer['phone'], 1, 0, 'C');
        $pdf->Cell(50, 10, $customer['addr'], 1, 1, 'C');
    }
}

function generateAppointmentsReport($pdf) {
    global $db;

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Admin');
    $pdf->SetTitle('Appointments Report');
    $pdf->SetSubject('Appointments PDF Report');

    // Add a page
    $pdf->AddPage();
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Write(0, 'Appointments Report', '', 0, 'C', true, 0, false, false, 0);

    // Table Headers for Appointments
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(30, 10, 'Service', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Date', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Time', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Stylist', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Salon', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Price ($)', 1, 1, 'C');

    // Fetch appointments data from the database
    $appointments = getAllAppointments();
    
    // Display appointments data in table rows
    $pdf->SetFont('helvetica', '', 10);
    foreach ($appointments as $appointment) {
        $pdf->Cell(30, 10, $appointment['services'], 1, 0, 'C');
        $pdf->Cell(30, 10, $appointment['dates'], 1, 0, 'C');
        $pdf->Cell(20, 10, $appointment['tm'], 1, 0, 'C');
        $pdf->Cell(40, 10, $appointment['stylist'], 1, 0, 'C');
        $pdf->Cell(30, 10, $appointment['salon'], 1, 0, 'C');
        $pdf->Cell(40, 10, $appointment['price'], 1, 1, 'C');
    }
}

function getUsersByRole($role) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE roles = ?");
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getAllAppointments() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM appointments");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
