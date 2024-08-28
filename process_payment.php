<?php
session_start();

$cardNumber = $_POST['cardNumber'];
$expiryDate = $_POST['expiryDate'];
$cvv = $_POST['cvv'];
$cardholderName = $_POST['cardholderName'];

$_SESSION['payment_status'] = 'success';
header("Location: checkout.php");
?>
