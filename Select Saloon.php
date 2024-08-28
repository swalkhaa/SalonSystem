<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Salon - Online Salon</title>
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
            <li><a href="Select Saloon.php">Select saloon</a></li>
            <li><a href="Make appoitment.php">Make appoitment</a></li>
            <li><a href="assets/hanndlers/logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <header>
            <h1>Select Salon</h1>
        </header>
        <main>
            <section class="salon-list">
                <h2>Available Salons</h2>
                <ul>
                    <li>
                        <div class="salon-info">
                            <h3>Salon 1</h3>
                            <p>Location: Mombasa Zanzibar</p>
                            <p>Services: Haircut, Hair Coloring,Facial,hair Styling,Streaming</p>
                        </div>
                        <a href="Make appoitment.php"><button type="submit">Book Now</button></a>
                    </li>
                    <li>
                        <div class="salon-info">
                            <h3>Salon 2</h3>
                            <p>Location: Mbweni Zanzibar </p>
                            <p>Services:Simple Markup, Bride Markup, Heavy Markup</p>
                        </div>
                        <a href="Make appoitment.php"><button type="submit">Book Now</button></a>
                    </li>
                    <li>
                        <div class="salon-info">
                            <h3>Salon 3</h3>
                            <p>Location: Mwera zanzibar</p>
                            <p>Services: Hair Styling, Manicure, Pedicure, Markup,Nails services</p>
                        </div>
                        <a href="Make appoitment.php"><button type="submit">Book Now</button></a>
                </ul>
            </section>
        </main>
    </div>
</body>
</html>
