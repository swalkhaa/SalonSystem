<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Employee</title>
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
    <div class="container">
        <h1>Register Users</h1>
         <main>
            <form action="register_employee_process.php" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>
                
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                
                <label for="passw">Password:</label><br>
                <input type="password" id="passw" name="passw" required><br>
                
                <label for="phone">Phone:</label><br>
                <input type="text" id="phone" name="phone" required><br>
                
                <label for="addr">Address:</label><br>
                <input type="text" id="addr" name="addr" required><br>
                
                <label for="roles">Role:</label><br>
                <select id="roles" name="roles">
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                </select><br>
                
                <button type="submit">Register</button>
                <button type="reset">Clear</button>
            </form>
        </main> 

