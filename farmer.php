<?php 
session_start();
if (isset($_SESSION['first_name'], $_SESSION['last_name'], $_SESSION['location'], $_SESSION['phone_number'])){
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name']; // Corrected variable name
    $location = $_SESSION['location'];
    $phone_number = $_SESSION['phone_number'];
    $profile_image = $_SESSION['profile_image'];
    $email = $_SESSION['email'];
  

}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="farmer.css">
</head>
<body>
    <div class="main">
        <h1>Cofarmer</h1>
        <div class="cover">
        <img src="./profiles/<?php echo $profile_image; ?>">
        
        </div>
        
        <div class="post">
            <p>
               <h3>Name :  <?php
                echo $last_name."  ". $first_name;?> </h3><br>
                <h3>Phone : <?php echo $phone_number; ?></h3><br>
                <h3>Location : <?php echo $location; ?></h3><br>
            </p>
            <hr>
            <div class="post_button">
            <h2>Uploaded Posts</h2>
            <button><a href="upload_post.html">Add post </a></button>
            </div>
            <hr>
            <div>
            <?php
            $con = new mysqli('localhost','root','','singup');

            if($con->connect_error){
                die("connection failure to databse".$con->connect_error);
            
            }
                $statement = "SELECT * FROM posts WHERE user = '$email'";
                $result = $con->query($statement);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

            ?>
                
                <h4>Crop Name : <?php echo $row['name_of_the_crop']; ?></h4><br>
                <h4>Quantity : <?php echo $row['quantity']; ?></h4><br>
                <img src="./posts/<?php echo $row['post_image']; ?>"><br><hr>
        
            <?php
                }}else{ ?>
                    <h1> EMPTY POSTS </h1>
                <?php
                }

                $con->close();
            ?>
            </div>
           
        </div>
    </div>
</body>
</html>
