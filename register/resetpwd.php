<?php
include("../connection.php");
session_start();

$email = $_SESSION['email'];
var_dump($email);

if(isset($_POST['npwd'])){

    //$uemail =$_SESSION["email"];
    $npwd =$_POST["npwd"];
    $cpwd =$_POST["cpwd"];

    if($npwd==$cpwd){
        $sql = "UPDATE user SET password='$npwd' WHERE email='$email'";
    }

    if($conn->query($sql)===TRUE){
        echo "(<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You have changed your password successfully.')
        window.location.href='/carRodio/login/login.php';
        </SCRIPT>)";
    }else{
        echo "Error: ".$sql."<br>".$conn->error;
    }
}
else{
    echo"error";
}?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/styles.css" rel="stylesheet">

    <title>Change Password</title>

</head>

<body>

   <div class="logo">

        <img class="logo" src="/carRodio/img/logow.png" alt="">

   </div>

   <!--<div class="main">

        <img src="img/bg.png" alt="">

   </div-->

   <div class="bg-img">

    <form action="/carRodio/register/resetpwd.php" method="POST" class="container">

        <input type="password" placeholder="New Password" name="npwd" required>
  
        <input type="password" placeholder="Confirm Password" name="cpwd" required>


        <div class="flex-container">

            <div>
                <button type="submit" class="btn" value="submit">Submit</button>
            </div>
              
        </div>
        

    </form>

  </div>
    
</body>

</html>