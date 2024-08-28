<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SaloonSystem";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch salon details based on the ID
$id = intval($_GET['id']);
$sql = "SELECT * FROM salons WHERE id = $id";
$result = $conn->query($sql);
$salon = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the form submission
    $salon_name = $conn->real_escape_string($_POST['salon_name']);
    $salon_description = $conn->real_escape_string($_POST['salon_description']);

    // Handle image upload
    if (!empty($_FILES['salon_image']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['salon_image']['name']);
        move_uploaded_file($_FILES['salon_image']['tmp_name'], $target_file);
        $salon_image = $conn->real_escape_string($_FILES['salon_image']['name']);

        $sql = "UPDATE salons SET salon_name = '$salon_name', salon_description = '$salon_description', salon_image = '$salon_image' WHERE id = $id";
    } else {
        $sql = "UPDATE salons SET salon_name = '$salon_name', salon_description = '$salon_description' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Salon updated successfully.";
    } else {
        echo "Error updating salon: " . $conn->error;
    }

    // Redirect back to the salon view page
    header("Location: UpdateSaloon.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Salon</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
    <div class="container">
        <h2>Update Salon</h2>
        <form action="upt_salon.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="salon_name">Salon Name:</label>
                <input type="text" id="salon_name" name="salon_name" value="<?php echo htmlspecialchars($salon['salon_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="salon_description">Salon Description:</label>
                <textarea id="salon_description" name="salon_description" rows="4" required><?php echo htmlspecialchars($salon['salon_description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="salon_image">Salon Image:</label>
                <input type="file" id="salon_image" name="salon_image" accept="image/*">
                <p>Current Image:</p>
                <img src="uploads/<?php echo htmlspecialchars($salon['salon_image']); ?>" alt="Salon Image" width="100">
            </div>
            <div class="form-group">
                <button type="submit">Update Salon</button>
                <button type="reset">Clear</button>
                <button type="cancel" style="background-color: red;">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
