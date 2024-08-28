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
            <li><a href="UpdateSaloon.php">UpdateSaloon</a></li>
            <li><a href="generate_report.php">Generate Reports</a></li>
			
            <li><a href="assets/hanndlers/logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <h2>Register New Salon</h2>
        <form action="process_register_salon.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="salon_name">Salon Name:</label>
                <input type="text" id="salon_name" name="salon_name" required>
            </div>
            <div class="form-group">
                <label for="salon_description">Salon Description:</label>
                <textarea id="salon_description" name="salon_description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="salon_image">Upload Salon Image:</label>
                <input type="file" id="salon_image" name="salon_image" accept="image/*" required>
            </div>
            <div class="form-group">
                <button type="submit">Register Salon</button>
                <button type="reset">Clear</button>
            </div>
        </form>
    </div>
</body>
</html>
