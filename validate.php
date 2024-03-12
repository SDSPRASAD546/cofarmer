   
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
    $sql = "SELECT * FROM users WHERE email = '$useremail'";
    // Execute the query
    $result = $con->query($sql);
    echo '<script>alert(<?php $useremail ?>)</script>';

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // The email exists in the database
        $r = $result->fetch_assoc();
        $dbpass = $r["pass"];
        $_SESSION['phone_number'] = $r['phone_number'];
        $_SESSION['location'] = $r['loc'];
        $_SESSION['first_name'] = $r['first_name'];
        $_SESSION['last_name'] = $r['sure_name'];
        $_SESSION['profile_image'] = $r['profile_image'];
        $_SESSION['email'] = $useremail;
        
  
    
        if ($userpassword == $dbpass) { 
        
            echo '<script>window.location.href="farmer.php"</script>'; 
            echo '<script>alert(<?php $useremail ?>)</script>';
        } else { 

            echo '<script>window.location.href="login.php"
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
