<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="farmer.css">
</head>
<body>

<?php 
        
        $con = new mysqli('localhost','root','','singup');

        if($con->connect_error){
            die("connection failure to databse".$con->connect_error);

        }
        else{}

        
    <div class="main">
        <h1>Cofarmer</h1>
    <div class="cover">
        <img src="user1.jpeg" alt="">
        </div>
        
        <div class="post">
        <p>
            Rajesh Yerraguntla<br>
            9999999999<br>
            3-221<br>
            railway station road<br>
            narasaraopet<br>
            palnadu<br>
        </p>
        <hr>
        <h2>Uploaded Posts</h2>
        <hr>
        <p>Details about crop
            <br>
            Crop Name:<br>
            Expected Quantity:<br>
            <img src="Chilli.jpg" alt="" width="70%"> <br>
            <hr>
        </p>
        <p>
            Details about crop <br>
            Crop Name<br>
            Expected Quantity<br>
            <img src="cotton.jpg" alt="" width="70%">
        </p>
        </div>
    </div>
</body>
</html>