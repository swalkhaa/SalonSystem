<?php

    require_once 'assets/conn/connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $passw = password_hash($_POST['passw'], PASSWORD_DEFAULT); 
        $phone = $_POST['phone'];
        $addr = $_POST['addr'];
        $roles = $_POST['roles'];

        $sql = "INSERT INTO users (username, email, passw, phone, addr, roles) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssssss", $username, $email, $passw, $phone, $addr, $roles);

        if ($stmt->execute()) {
            header("Location: viewuser.php");
            exit();
        } else {
            echo "Error registering employee.";
        }
    } else {
        echo "Invalid request method.";
    }
?>
