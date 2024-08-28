<?php
    session_start();
    if (!isset($_SESSION["user"]) || $_SESSION["user"] !== 'admin') {
        header("location: index.php");
        exit();
    }

    require_once 'assets/conn/connection.php';

    $sql_users = "SELECT COUNT(*) as total_users FROM users";
    $result_users = $db->query($sql_users);
    $row_users = $result_users->fetch_assoc();
    $total_users = $row_users['total_users'];


    $sql_employees = "SELECT COUNT(*) as total_appointment FROM appointments";
    $result_employees = $db->query($sql_employees);
    $row_employees = $result_employees->fetch_assoc();
    $total_appointment = $row_employees['total_appointment'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Admin Dashboard</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="admindashboard.php">Dashboard</a></li>
            <li><a href="viewuser.php">View Users</a></li>
            <li><a href="RegisterUser.php">Register New User</a></li>
            <li><a href="RegisterSaloon.php">Register Saloon</a></li>
            <li><a href="viewAppointment.php">View Appointments</a></li>
            <li><a href="UpdateSaloon.php">UpdateSaloon</a></li>
            <li><a href="generate_report.php">Generate Reports</a></li>
            <li><a href="assets/hanndlers/logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="card-container">
            <div class="card">
                <h2>Total Users</h2>
                <p class="card-value"><?php echo $total_users; ?></p>
                <p class="card-description">Total number of users registered.</p>
            </div>
            <div class="card">
                <h2>Appointments</h2>
                <p class="card-value"><?php echo $total_appointment; ?></p>
                <p class="card-description">Total number of all appointments.</p>
            </div>
        </div>
    </div>
    <script scr="https://cdn.jsdeliver.net/npm/sweetalert2@11"></sript>

    <?php
    ?>
</body>
</html>
