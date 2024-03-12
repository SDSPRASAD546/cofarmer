<?php
session_start();
$quantity = $_POST['quantity'];
$crop = $_POST['crop'];
$photo = $_FILES['photo']['name'];
$imageTempname = $_FILES['photo']['tmp_name'];
$imageFolder = "./posts/" . $photo;
$email = $_SESSION['email'];
$profile_image = $_SESSION['profile_image'];

$conn = new mysqli('localhost', 'root', '', 'singup');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Use a prepared statement to safely insert data
    $sql = "INSERT INTO posts (post_image, user, name_of_the_crop, quantity, pimg) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $photo, $email, $crop, $quantity, $profile_image);

    if ($stmt->execute()) {
        if (move_uploaded_file($imageTempname, $imageFolder)) {
            echo '<script>window.location.href="farmer.php"; alert("Uploaded successfully");</script>';
        } else {
            echo '<script>window.location.href="farmer.php"; alert("Not uploaded");</script>';
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
