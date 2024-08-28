<?php
session_start();

if ($_SESSION['payment_status'] !== 'success') {
    header("Location: payment.php");
    exit;
}

require_once 'assets/conn/connection.php';



$service = $_SESSION['service'];
$date = $_SESSION['date'];
$time = $_SESSION['time'];
$stylist = $_SESSION['stylist'];
$salon = $_SESSION['salon'];
$comments = $_SESSION['comments'];
$price = 10000; 

$sql = "INSERT INTO appointments (services, dates, tm, stylist, salon, comments, price) 
        VALUES ('$service', '$date', '$time', '$stylist', '$salon', '$comments', '$price')";

if ($db->query($sql) === TRUE) {
   
    

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Booking Confirmation</title>
        <link rel='stylesheet' href='assets/styles/style.css'>
    </head>
    <body>
        <div class='container'>
            <header>
                <h1>Appointment Successfully Booked!</h1>
            </header>
            <main>
                <p>Your appointment has been successfully booked. Thank you for choosing our service!</p>
                <a href='dashboard.php' class='btn'>Go to Dashboard</a>
            </main>
        </div>
    </body>
    </html>";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Dashboard</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
    <body>
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Multiple Makeup System</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="View Services.php">View Service</a></li>
                <li><a href="Select Saloon.php">Select saloon</a></li>
                <li><a href="Make appoitment.php">Make appoitment</a></li>
                <li><a href="/hanndlers/logout.php">Logout</a></li>
            </ul>
        </div>
