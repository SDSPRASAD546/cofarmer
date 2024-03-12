<?php

$email = $_POST['email'];
$raw_password = $_POST['password'];
$phone = $_POST['phone_number'];
$first_name = $_POST['first_name'];
$sure_name = $_POST['sure_name'];
$location = $_POST['location'];

session_start();
$_SESSION['last_name'] = $sure_name;
$_SESSION['first_name'] = $first_name;
$_SESSION['phone_number'] = $phone;
$_SESSION['location'] = $location;
$_SESSION['emailaddress'] = $email;

$conn = new mysqli('localhost', 'root', '', 'singup');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$imageFilename = $_FILES['image']['name'];
$imageTempname = $_FILES['image']['tmp_name'];
$imageFolder = "./profiles/" . $imageFilename;

$userInsertSQL = "INSERT INTO dis (email, pass, phone, firstname, lastname, loc,img) VALUES (?, ?, ?, ?, ?, ?,?)";

$userStmt = $conn->prepare($userInsertSQL);
$userStmt->bind_param("sssssss", $email, $raw_password, $phone, $first_name, $sure_name, $location,$imageFilename);

if ($userStmt->execute()) {
    // Check if an image was uploaded

       echo "inserted";}
    
 else {
    echo "<h3>Failed to insert user details into the database!</h3>";
}

$_SESSION['profile_image'] = $imageFilename;

$conn->close();
?>
<script>
    window.location.href = "mainpage.php";
    aler("welcome")
</script>
