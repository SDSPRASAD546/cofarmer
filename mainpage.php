
<?php 

session_start();
if (isset($_SESSION['first_name'], $_SESSION['last_name'], $_SESSION['location'], $_SESSION['phone_number'])){
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name']; 
    $location = $_SESSION['location'];
    $phone_number = $_SESSION['phone_number'];
    $profile_image = $_SESSION['profile_image'];
    $emailaddress = $_SESSION['emailaddress'];

  

}
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distributor</title>
    <link rel="stylesheet" href="mainpage.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<div class="webpage">

    <div class="profile">

        <div id="cover"></div>
        <img src="bussinessman.jpg" alt="" id="pimg">
        

        <h2><?php echo $last_name . "  ".$first_name; ?></h2>
        
        <div class="contact"> 
            <i class="w3-xlarge"><i class="fa fa-home">  :  3-56/9</i></i>
            

            <h3> 
                Railway Station road
                <br>
                Narasaraopet
            <br></h3>
            <i class="w3-xlarge"><i class="fa fa-phone"> :<?php echo $phone_number; ?> </i></i>
            <br>
            <i class="w3-xlarge"><i class="fa fa-envelope"> 
            
                : <?php echo $emailaddress; ?>
            </i></i>
   
        </div>

    </div>

    <div class="post_page">
        <div class="header">
            
            <form action="search_page.php" method="post" class="search_form">
            <i class="w3-xlarge"><i class="fa fa-search"> </i></i>
            <input type="search" name="search">
            <input type="submit" value="search">
            </form>
        
            <h1>posts</h1>
            <hr style="margin: 0;">
        </div>
        <div class="allposts">
        

            <?php 
            
            $con = new mysqli('localhost','root','','singup');

            if($con->connect_error){
                die("connection failure to databse".$con->connect_error);

            }
            else{
                $statement = "SELECT * FROM posts";

                
                $result = $con->query($statement);

                if ($result->num_rows > 0) {
                    // Fetch all posts into an array
                    $posts1 = [];
                    while ($row = $result->fetch_assoc()) {
                        $posts1[] = $row;
                    }
                    for ($i = count($posts1) - 1; $i >= 0; $i--) {
                        $row = $posts1[$i];
                        $statement2 = "SELECT * FROM users WHERE email = '{$row['user']}' ";
                        $result2 = $con->query($statement2);
                        $row2 = $result2->fetch_assoc();
                    
            ?>
                <div class="post">
                    <section class="post_profile">
                        <img src="./profiles/<?php echo $row['pimg']; ?>" alt="">
                        <h5 name="<?php echo $row2['sure_name'] ?> <?php echo $row2['first_name'] ?>" class="user-name"><?php echo $row2['sure_name'] . '  ' . $row2['first_name']; ?></h5>
                    </section>
                        <h4>Crop Name : <?php echo $row['name_of_the_crop']; ?></h4><br>
                        <h4>Quantity : <?php echo $row['quantity']; ?></h4><br>
                    <section class="image">
                        <img src="./posts/<?php echo $row['post_image']; ?>"><br><hr>
                    </section>
                    
                </div>
                
                        
            <?php
                    }
                    } else { ?>
                        <h1> EMPTY POSTS </h1>
            <?php } }?>

            </div>
        
        </div>
    </div>
    
    <div class="post_details">
        <form action="side_page.php" method=post id='form1' target='frame'></form>
        <iframe frameborder="0" name="frame">nothing here</iframe>
    </div>

</div>

<script>
   



    document.querySelectorAll('.user-name').forEach(function (element) {
    element.addEventListener('click', function () {
        const arr = this.getAttribute('name').split(" ");
        const lname = arr[0];
        const fname = arr[1];

        var ele = document.getElementById('form1');
        
        // Create input elements
        var input1 = document.createElement("input");
        var input2 = document.createElement("input");

        // Set attributes for the first input
        input1.type = "text";
        input1.value = fname;
        input1.name = "fname"; // Set a specific name for the input

        // Set attributes for the second input
        input2.type = "text";
        input2.value = lname;
        input2.name = "lname"; // Set a specific name for the input

        // Append the input elements to the form
        ele.appendChild(input1);
        ele.appendChild(input2);

        // Submit the form
        ele.submit();
    });
});



</script>


<?php 

?>

</body>
</html>