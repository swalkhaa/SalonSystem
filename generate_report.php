<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Reports</title>
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
        <h2>Export Reports to PDF</h2>
        <form method="post" action="export.php">
            <div class="form-group">
                <label for="reportType">Select Report Type:</label>
                <select name="reportType" id="reportType" required>
                    <option value="">--Select Report--</option>
                    <option value="users">Users Report</option>
                    <option value="customers">Customers Report</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="export">Export to PDF</button>
            </div>
        </form>
    </div>
</body>
</html>


