<?php
require_once 'assets/conn/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $salon_name = $db->real_escape_string($_POST['salon_name']);
    $salon_description = $db->real_escape_string($_POST['salon_description']);
    

    $target_dir = "uploads/";
    $salon_image = $target_dir . basename($_FILES["salon_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($salon_image, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["salon_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


    if (file_exists($salon_image)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }


    if ($_FILES["salon_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

 
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["salon_image"]["tmp_name"], $salon_image)) {

            $sql = "INSERT INTO salons (salon_name, salon_description, salon_image) VALUES ('$salon_name', '$salon_description', '$salon_image')";

            if ($db->query($sql) === TRUE) {
                echo "New salon registered successfully.";
                echo "Go back to dashboard <a href='admindashboard.php'><button>Go to Dashboard</button>";
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
            echo "Go back to dashboard <a href='admindashboard.php'><button>Go to Dashboard</button>";
        }
    }
}

$db->close();
?>

