<?php
    require_once 'assets/conn/connection.php';

    $sql = "SELECT id, services, dates, tm, stylist, salon, comments FROM appointments"; // Make sure the 'id' column exists in your database
    $result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: red;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd; 
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }

        .clearbtn {
            position: fixed;
            right: 30px;
            bottom: 50px;
            width: 200px;
            height: auto;
        }

    </style>
</head>
<body>
<?php

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
    <div class="clearbtn">
        <form action="delete_all_appointments.php" method="post">
            <button type="submit" style="background-color: red;">Delete all data</button>
        </form>
    </div>
<div class="container">
    <h1>Appointments</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Service</th>
                <th>Date</th>
                <th>Time</th>
                <th>Stylist</th>
                <th>Salon</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";  
                        echo "<td>" . $row['services'] . "</td>";
                        echo "<td>" . $row['dates'] . "</td>";
                        echo "<td>" . $row['tm'] . "</td>";
                        echo "<td>" . $row['stylist'] . "</td>";
                        echo "<td>" . $row['salon'] . "</td>";
                        echo "<td>" . $row['comments'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No appointments found</td></tr>";
                }
            ?>
        </tbody>
    </table>
            </div>

</body>
</html>
