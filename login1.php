<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cofarmer/farmerlogin/page</title>
    <link rel="stylesheet" href="login1.css">
</head>
<body>
    <div class="main">
        <img src="co farmer.jpg" >
    </div><br>
    <div class="textbox">
        <h1>
            Cofarmer
        </h1>
        <h2>
            Cofarmer helps to connect farmers and distributors.
        </h2>
    </div>


    <form class="container" action="validate_for_distributor.php" method="post">
<div class="form">
    <input type="text" class="text" placeholder="Distributor name" name="email" required> <br>
    <input type="password" class="text" placeholder="Password" name="password" required><br>
     <input type="submit" value="Login as Distributor">
    
    <p><a href="">forgot password?</a><br></p>
    <div class="btn">
    <button><a href="signup1.html" style="text-decoration:none; color:white;">Create New Account</a></button>
     
         
     </div>



</div>

</form>
    
</body>
</html>