<?php
session_start();

$_SESSION['service'] = $_POST['service'];
$_SESSION['date'] = $_POST['date'];
$_SESSION['time'] = $_POST['time'];
$_SESSION['stylist'] = $_POST['stylist'];
$_SESSION['salon'] = $_POST['salon'];
$_SESSION['comments'] = $_POST['comments'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Preview - Online Salon</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
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
                <li><a href="assets/hanndlers/logout.php">Logout</a></li>
            </ul>
        </div>
    <div class="container">
        <header>
            <h1>Order Preview</h1>
        </header>
        <main>
            <p><strong>Service:</strong> <?php echo $_SESSION['service']; ?></p>
            <p><strong>Date:</strong> <?php echo $_SESSION['date']; ?></p>
            <p><strong>Time:</strong> <?php echo $_SESSION['time']; ?></p>
            <p><strong>Stylist:</strong> <?php echo $_SESSION['stylist']; ?></p>
            <p><strong>Salon:</strong> <?php echo $_SESSION['salon']; ?></p>
            <p><strong>Comments:</strong> <?php echo $_SESSION['comments']; ?></p>
            <p><strong>Booking Price:</strong> Tsh 10,000/=</p>

            <form method="post" action="checkout.php">
                <button type="submit">Proceed to Payment</button>
            </form>
        </main>
    </div>
</body>
</html>
