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
            <li><a href="UpdateSaloon.php">Update Saloon</a></li>
            <li><a href="generate_report.php">Generate Reports</a></li>
            <li><a href="assets/hanndlers/logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>View Saloons</h2>

        <table>
            <thead>
                <tr>
                    <th>Saloon ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "SaloonSystem";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch salons from the database
                $sql = "SELECT id, salon_name, salon_description, salon_image FROM salons";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row['salon_image']) . "' alt='" . htmlspecialchars($row['salon_name']) . "' width='100' height='100'></td>";
                        echo "<td>" . htmlspecialchars($row['salon_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['salon_description']) . "</td>";
                        echo "<td>";
                        echo "<div class='action-buttons'>";
                        echo "<a href='upt_salon.php?id=" . $row['id'] . "'><button class='btn btn-update'>Update</button></a>";
                        echo "<form action='delete_saloon.php' method='POST' style='display:inline;'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' style='background-color: red;' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this salon?\");'>Delete</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No salons available.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>
