<?php
include("../connection.php");
if(isset($_POST["name"])){
    $uname=$_POST["name"];
    $uaddress=$_POST["address"];
    $ucno=$_POST["cno"];
    $uemail =$_POST["email"];
    $upwd =$_POST["pwd"];

    $sql = "INSERT INTO user(uname,
    address,cno,email,password) VALUES 
    ('$uname','$uaddress','$ucno','$uemail','$upwd')";

    if($conn->query($sql)===TRUE){
        echo "(<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Thank you for visting Car Rodio. You have successfully registered as a member.')
        window.location.href='/carRodio/login/login.php';
        </SCRIPT>)";
    //    header("location: /carRodio/login/login.php");
    }else{
        echo "Error: ".$sql."<br>".$conn->error;
    }
}?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/styles.css" rel="stylesheet">

    <title>Sign Up</title>

</head>

<body>


   <div class="logo">

        <img class="logo" src="/carRodio/img/logow.png" alt="">

   </div>

   <!--<div class="main">

        <img src="img/bg.png" alt="">

   </div-->

   <div class="bg-img">

    <form action="/carRodio/register/register.php" method="post" class="containers">
  
        <input type="text" placeholder="Name" name="name" required>
  
        <input type="text" placeholder="Address" name="address" required>

        <input type="text" placeholder="Contact Number" name="cno">

        <input type="text" placeholder="Email Address" name="email" required>
  
        <input type="password" placeholder="Password" name="pwd" required>

        <!--select>
            <option value="0">Sign Up As</option>
            <option value="1">Seller</option>
            <option value="2">Buyer</option>
        </select-->


        <div class="flex-container">
            <div>
                <label class="checkbox">
                    
                    <input type="checkbox"> Remember me
                    <span class="checkmark"></span>
                            
                </label>
            </div>

            <div>
                <button type="submit" class="btn">Sign Up</button>
            </div>
            
        </div>

        <p class="link">
            Already have an account? <b><a href="../login/login.php">Sign in</a></b>
        </p>
    
    </div>
        

    </form>

  </div>
    
</body>

</html>