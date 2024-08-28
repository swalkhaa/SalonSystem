<?php
    require_once 'assets/conn/connection.php';


    $role1 = "customer";
    $sql_users = "SELECT id, username, email, phone, addr, roles FROM users WHERE roles = ?";
    $stmt_users = $db->prepare($sql_users);
    $stmt_users->bind_param("s", $role1);
    $stmt_users->execute();
    $result_users = $stmt_users->get_result();

    $role2 = "admin";
    $sql_users2 = "SELECT id, username, email, phone, addr, roles FROM users WHERE roles = ?";
    $stmt_users2 = $db->prepare($sql_users2);
    $stmt_users2->bind_param("s", $role2);
    $stmt_users2->execute();
    $result_users2 = $stmt_users2->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <style>
        /* General Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        thead th {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: left;
        }

        tbody td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Responsive Table Styling */
        @media (max-width: 768px) {
            table {
                border: 0;
            }

            thead {
                display: none;
            }

            tr {
                display: block;
                margin-bottom: 15px;
            }

            td {
                display: block;
                text-align: right;
                font-size: 14px;
                position: relative;
                padding-left: 50%;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 45%;
                padding-left: 10px;
                font-weight: bold;
                text-align: left;
                color: #333;
            }
        }

        /* Button Styling */
        button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Responsive Button Styling */
        @media (max-width: 768px) {
            button {
                font-size: 12px;
                padding: 6px 10px;
            }
        }

        /* Flexbox for Action Buttons Container */
        .action-button {
            display: flex;
            gap: 5px;
        }
    </style>
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
        <header>
            <h2>Owners (Admins)</h2>
        </header>
        
        <main>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result_users2->num_rows > 0): ?>
                        <?php while($row = $result_users2->fetch_assoc()): ?>
                            <tr>
                                <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                                <td data-label="Username"><?php echo htmlspecialchars($row['username']); ?></td>
                                <td data-label="Email"><?php echo htmlspecialchars($row['email']); ?></td>
                                <td data-label="Phone"><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td data-label="Address"><?php echo htmlspecialchars($row['addr']); ?></td>
                                <td data-label="Role"><?php echo htmlspecialchars($row['roles']); ?></td>
                                <td data-label="Actions">
                                    <div class="action-button">
                                        <form action="update_user.php" method="GET">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit">Update</button>
                                        </form>
                                        <form action="delete_user.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" style="background-color: red;" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>

        <h1>CUSTOMERS LIST</h1>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result_users->num_rows > 0): ?>
                        <?php while($row = $result_users->fetch_assoc()): ?>
                            <tr>
                                <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                                <td data-label="Username"><?php echo htmlspecialchars($row['username']); ?></td>
                                <td data-label="Email"><?php echo htmlspecialchars($row['email']); ?></td>
                                <td data-label="Phone"><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td data-label="Address"><?php echo htmlspecialchars($row['addr']); ?></td>
                                <td data-label="Role"><?php echo htmlspecialchars($row['roles']); ?></td>
                                <td data-label="Actions">
                                    <div class="action-button">
                                        <form action="update_user.php" method="GET">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit">Update</button>
                                        </form>
                                        <form action="delete_user.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" style="background-color: red;" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>

