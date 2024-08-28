    <?php
    require_once 'assets/conn/connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: viewuser.php");
            exit();
        } else {
            echo "Error deleting user.";
        }
    } else {
        echo "Invalid request method.";
    }
?>

