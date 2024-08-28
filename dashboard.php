<?php
    session_start();

    if (!isset($_SESSION["user"]) || $_SESSION["user"] !== 'customer') {
        header("location: index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Dashboard</title>
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
            <li><a href="Make appoitment.php">Make appoitment</a></li>
            <li><a href="assets/hanndlers/logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="dash">
        <h1>Welcome to our system</h1>

        <main>
            <section id="services">
                <h2>Our Salons</h2>

                <?php
                require_once 'assets/conn/connection.php';


            
                $sql = "SELECT salon_name, salon_description, salon_image FROM salons";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="service">';
                        echo '<img src="' . $row["salon_image"] . '" width="450" height="500">';
                        echo '<div class="description">';
                        echo '<h3>' . htmlspecialchars($row["salon_name"]) . '</h3>';
                        echo '<p>' . htmlspecialchars($row["salon_description"]) . '</p>';
                        echo '<a href="Make appoitment.php"><button type="submit">Book Now</button></a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No salons available at the moment.</p>';
                }

                $db->close();
                ?>
            </section>

            <section id="about-us">
                <h2>About Us</h2>
                <p>Welcome to our different Salon, where we offer a wide range of beauty and wellness services to cater to your needs.</p>
            </section>
        </main>

        <footer>
            <center><p>&copy; 2024 Multiple Makeup Saloon System. All rights reserved.</p></center>
        </footer>
    </div>
    <script scr="https://cdn.jsdeliver.net/npm/sweetalert2@11"></sript>

    <?php

    ?>
</body>
</html>
