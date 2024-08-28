<?php
    require_once 'assets/conn/connection.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $addr = $_POST['addr'];
        $roles = $_POST['roles'];

        $sql = "UPDATE users SET username = ?, email = ?, phone = ?, addr = ?, roles = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssssi", $username, $email, $phone, $addr, $roles, $id);

        if ($stmt->execute()) {
            header("Location: viewuser.php");
            exit();
        } else {
            echo "Error updating user.";
        }
    } else {
        echo "Invalid request method.";
    }
?>
