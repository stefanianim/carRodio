<?php
session_start();
include("../connection.php");

if(isset($_SERVER['REQUEST_METHOD'])=="POST"
&& isset($_POST['eml']) && isset($_POST['pwd']))
{
    $uemail=$_POST['eml'];
    $upwd=$_POST['pwd'];


    $sql="SELECT email,password from user where email='$uemail' AND 
    password='$upwd' limit 1";
    
    
    $result=$conn->query($sql);

    if($result && mysqli_num_rows($result)>0)
    {
        $row=$result->fetch_assoc();
        
        if($row['email'] == $uemail
        && $row['password'] == $upwd)
        {
            $_SESSION['email']=$uemail;
            echo "(<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You have successfully logged in.')
            window.location.href='/carRodio/register/register.php';
            </SCRIPT>)";
        die;
        }
    
    }else{
        echo'<script>alert("Your username or password is incorrect")</script>';
    }
  
} ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/styles.css" rel="stylesheet">

    <title>Sign In</title>

</head>

<body>

   <div class="logo">

        <img class="logo" src="/carRodio/img/logow.png" alt="">

   </div>

   <!--<div class="main">

        <img src="img/bg.png" alt="">

   </div-->

   <div class="bg-img">

    <form action="/carRodio/login/login.php" method="post" class="container">

        <input type="text" placeholder="Email Address" name="eml" required>
  
        <input type="password" placeholder="Password" name="pwd" required>

        <p class="fp"><a href="../register/verifyemail.php">Forgot Password?</a></p>


        <div class="flex-container">
            <div>
                <label class="checkbox">
                    
                    <input type="checkbox"> Remember me?
                    <span class="checkmark"></span>
                            
                </label>
            </div>

            <div>
                <button type="submit" class="btn">Sign In</button>
            </div>
            
        </div>

        <p class="link">
            Doesn't have an account? <b><a href="../register/register.php">Sign Up</a></b>
        </p>
    
    </div>
        

    </form>

  </div>
    
</body>

</html>