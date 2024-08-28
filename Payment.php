<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Online Salon</title>
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
            <h1>Payment</h1>
        </header>
        <main>
            <form id="paymentForm" method="post" action="process_payment.php">
                <div class="form-group">
                    <label for="cardNumber">Card Number:</label>
                    <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter your card number" required>
                </div>
                <div class="form-group">
                    <label for="expiryDate">Expiry Date:</label>
                    <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YYYY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" placeholder="CVV" required>
                </div>
                <div class="form-group">
                    <label for="cardholderName">Cardholder Name:</label>
                    <input type="text" id="cardholderName" name="cardholderName" placeholder="Enter cardholder's name" required>
                </div>
                <div class="form-group">
                    <button type="submit">Submit Payment</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
