<?php
session_start();
$email = $_POST['email'];
$raw_password = $_POST['password'];
$phone = $_POST['phone_number'];
$first_name = $_POST['first_name'];
$sure_name = $_POST['sure_name'];
$location = $_POST['location'];

$_SESSION['last_name'] = $sure_name;
$_SESSION['first_name'] = $first_name;
$_SESSION['phone_number'] = $phone;
$_SESSION['location'] = $location;
$_SESSION['email'] = $email;

$conn = new mysqli('localhost', 'root', '', 'singup');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$imageFilename = $_FILES['image']['name'];
$imageTempname = $_FILES['image']['tmp_name'];
$imageFolder = "./profiles/" . $imageFilename;

$userInsertSQL = "INSERT INTO users (email, pass, phone_number, first_name, sure_name, loc) VALUES (?, ?, ?, ?, ?, ?)";

$userStmt = $conn->prepare($userInsertSQL);
$userStmt->bind_param("ssssss", $email, $raw_password, $phone, $first_name, $sure_name, $location);

if ($userStmt->execute()) {
   
        
        
        $imageInsertSQL = "UPDATE users SET profile_image = ? WHERE email = ?";
        
       
        $imageStmt = $conn->prepare($imageInsertSQL);
        $imageStmt->bind_param("ss", $imageFilename, $email);
        
 
        if ($imageStmt->execute()) {
        
            if (move_uploaded_file($imageTempname, $imageFolder)) {
                echo "<h3>Data and image uploaded successfully!</h3>";
            } else {
                echo "<h3>Failed to move the image to the folder!</h3>";
            }
        } else {
            echo "<h3>Failed to update the image filename in the database!</h3>";
        }
    
} else {
    echo "<h3>Failed to insert user details into the database!</h3>";
}

$_SESSION['profile_image'] = $imageFilename;

$conn->close();
?>
<script>
    window.location.href = "farmer.php";
    aler("welcome")
</script>
