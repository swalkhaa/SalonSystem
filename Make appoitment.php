<?php
session_start();
require_once 'assets/conn/connection.php';


// Fetch salons from the database
$sql = "SELECT salon_name FROM salons";
$result = $db->query($sql);

if ($result) {
    $salons = $result->fetch_all(MYSQLI_ASSOC);
} else {
    die("Error fetching salons: " . $mysqli->error);
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Order - Online Salon</title>
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
            <li><a href="Select Saloon.php">Select Saloon</a></li>
            <li><a href="Make appointment.php">Make Appointment</a></li>
            <li><a href="assets/hanndlers/logout.php">Logout</a></li>
        </ul>
    </div>
   
    <div class="container">
        <header>
            <h1>Make Order</h1>
        </header>
        <main>
            <form method="post" action="preview_order.php">
                <div class="form-group">
                    <label for="service">Select Service:</label>
                    <select id="service" name="service" required>
                        <option value="haircut">Haircut</option>
                        <option value="hairstyling">Hair Styling</option>
                        <option value="coloring">Hair Coloring</option>
                        <option value="manicure">Manicure</option>
                        <option value="pedicure">Pedicure</option>
                        <option value="markup">Markup</option>
                        <option value="nails">Nails Services</option>
                        <option value="dressing">Dressing</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Select Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="time">Select Time:</label>
                    <input type="time" id="time" name="time" required>
                </div>
                <div class="form-group">
                    <label for="stylist">Select Stylist:</label>
                    <select id="stylist" name="stylist" required>
                        <option value="muna">Muna</option>
                        <option value="muntazi">Muntazi</option>
                        <option value="amina">Amina</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="salon">Select Salon:</label>
                    <select id="salon" name="salon" required>
                        <?php foreach ($salons as $salon): ?>
                            <option value="<?php echo htmlspecialchars($salon['salon_name']); ?>">
                                <?php echo htmlspecialchars($salon['salon_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comments">Comments:</label>
                    <textarea id="comments" name="comments" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Preview Order</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
