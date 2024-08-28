<?php
require_once 'assets/conn/connection.php';

$sql = "DELETE FROM appointments";

if ($db->query($sql) === TRUE) {
    echo "<script>
        alert('You have deleted all appointment records');
        window.location.href = 'viewAppointment.php';
    </script>";
} else {
    echo "<script>
        alert('Something went wrong, please try again');
        window.location.href = 'viewAppointment.php';
    </script>";
}

$db->close();
?>
