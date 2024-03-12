<?php 

$first_name = $_POST['fname'];
$last_name = $_POST['lname'];


echo "<script>
const firstName = '<?php echo $first_name; ?>';
const lastName = '<?php echo $last_name; ?>';

alert('First Name: ' + firstName + '\nLast Name: ' + lastName);
</script>";
$con = new mysqli('localhost', 'root', '', 'singup');

if ($con->connect_error) {
    die("Connection failure to database" . $con->connect_error);
}

$statement = "SELECT * FROM users WHERE first_name = '$first_name' AND sure_name='$last_name'";
$result = $con->query($statement);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
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
        <img src="./profiles/<?php echo $row['profile_image']; ?>">
    </div>

    <div class="post">
        <p>
            <h3>Name : <?php echo $last_name . "  " . $first_name; ?> </h3><br>
            <h3>Phone : <?php echo $row['phone_number']; ?></h3><br>
            <h3>Location : <?php echo $row['loc']; ?></h3><br>
        </p>
        <hr>

        <div class="post_button">
            <h2>Uploaded Posts</h2>
            
        </div>

        <hr>

        <div>
            <?php
            $statement1 = "SELECT * FROM posts WHERE user = '{$row['email']}'";
            $result1 = $con->query($statement1);

            if ($result1->num_rows > 0) {
                while ($row1 = $result1->fetch_assoc()) {
            ?>
                    <h4>Crop Name : <?php echo $row1['name_of_the_crop']; ?></h4><br>
                    <h4>Quantity : <?php echo $row1['quantity']; ?></h4><br>
                    <img src="./posts/<?php echo $row1['post_image']; ?>"><br><hr>
            <?php
                }
            } else {
            ?>
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
