
<?php
    require_once 'assets/conn/connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Fetch user data by ID
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if ($user) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Update User</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f9f9f9;
                    }

                    .container {
                        width: 50%;
                        margin: 0 auto;
                        padding: 20px;
                        background: #fff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }

                    h2 {
                        text-align: center;
                        color: #333;
                    }

                    form {
                        display: flex;
                        flex-direction: column;
                    }

                    label {
                        margin-bottom: 5px;
                        font-weight: bold;
                        color: #333;
                    }

                    input[type="text"],
                    input[type="email"] {
                        padding: 10px;
                        margin-bottom: 15px;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                    }

                    button {
                        padding: 10px 15px;
                        border: none;
                        border-radius: 4px;
                        background-color: #007bff;
                        color: #fff;
                        font-size: 16px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                    }

                    button:hover {
                        background-color: #0056b3;
                    }

                    .error {
                        color: red;
                        text-align: center;
                        margin-top: 20px;
                    }
                </style>
            </head>
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
            <li><a href="viewAppointment.php">View Appointments</a></li>
            <li><a href="assets/hanndlers/logout.php">Logout</a></li>
        </ul>
    </div>
            <body>
                <div class="container">
                    <h2>Update User</h2>
                    <form action="update_user_process.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                        <label for="username">Username:</label>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                        <label for="addr">Address:</label>
                        <input type="text" name="addr" value="<?php echo htmlspecialchars($user['addr']); ?>" required>
                        <label for="roles">Role:</label>
                        <input type="text" name="roles" value="<?php echo htmlspecialchars($user['roles']); ?>" required>
                        <button type="submit" style="background-color: green;">Update User</button>
                        <button type="reset">Clear</button>
                        <button type="cancel" style="background-color: red;">Cancel</button>
                    </form>
                </div>
            </body>
            </html>
            <?php
        } else {
            echo "<p class='error'>User not found.</p>";
        }
    } else {
        echo "<p class='error'>No ID provided.</p>";
    }
?>
