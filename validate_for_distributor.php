   
<?php

session_start();


if(isset($_POST['email']) && isset($_POST['password'])){


$useremail = $_POST['email'];
$userpassword = $_POST['password'];


$con = new mysqli('localhost','root','','singup');

if($con->connect_error){
    die("connection failure to databse".$con->connect_error);

}
else{
    $sql = "SELECT * FROM dis WHERE email = '{$useremail}'";
    // Execute the query
    $result = $con->query($sql);
    
    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // The email exists in the database
        $r = $result->fetch_assoc();
        $dbpass = $r["pass"];
        $_SESSION['phone_number'] = $r['phone'];
        $_SESSION['location'] = $r['loc'];
        $_SESSION['first_name'] = $r['firstname'];
        $_SESSION['last_name'] = $r['lastname'];
        $_SESSION['profile_image'] = $r['img'];
        $_SESSION['emailaddress'] = $r['email'];
        
  
    
        if ($userpassword == $dbpass) { 
        
            echo '<script>window.location.href="mainpage.php"</script>'; 
        } else { 

            echo '<script>window.location.href="login1.php"
                    alert("invalid")</script>';
        } 


    }else{
        echo '<script>window.location.href="login.php"
                    alert("user deos not exist create new account")</script>';
    }
    

}
$con->close();

}

?>
