<?php 
//include("../connection.php");
session_start();
$errors ='';


if(isset($_POST['submit'])=='send'&& isset($_POST['eml']))
{  
    $email=$_POST['eml'];
    $_SESSION['email'] = $email;
    
    $server="localhost";
    $user="root";
    $password="";
    $dbname="carrodio";
    
    $conn = new mysqli($server,$user,$password,$dbname);
    
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }else{
        // echo"Connected successfully";
    }

    $query = mysqli_query($conn,"SELECT * FROM user WHERE email='$email'");
    
    require_once ('Exception.php');
    require_once ('class.phpmailer.php');
    require_once ('class.smtp.php');
    require_once ('PHPMailerAutoload.php');
    $mail = new \PHPMailer\PHPMailer\PHPMailer();
    //smtp settings
    $mail->isSMTP(); // send as HTML
    $mail->Host = "smtp.gmail.com"; // SMTP servers
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = "niharaarts1@gmail.com"; // Your mail
    $mail->Password = '3Dinithi3Nihara3'; // Your password mail
    $mail->Port = 587; //specify SMTP Port
    $mail->SMTPSecure = 'tls';                               
    $mail->setFrom($_POST['eml']);
    $mail->addAddress('niharaperera3@gmail.com'); // Your mail
    $mail->addReplyTo($_POST['eml']);
    $mail->isHTML(true);
    $mail->Subject='Form Submission:';
    $code= rand(100,999);
    $mail->Body="Your activation link is:http://localhost/carRodio/register/resetpwd.php?email=code=$code";
   // mail($email, "Send Code", $message);
   
    if (mysqli_num_rows ($query)==1)
    {
        if($mail->send())
        {
            echo'<script>alert("A link has been to your email.")</script>';
        }
      //  $query2 = mysqli_query($conn,"UPDATE user SET passsword='$password' WHERE email='$email'"); 
        }
        else
        {
        $errors = 'Sorry, your email does not exist in our record database.';
        echo '<script>alert("Sorry, your email does not exist in our record database.")</script>';
         }
}else{
    echo"error";
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/styles.css" rel="stylesheet">

    <title>Email Verification</title>

</head>

<body>

   <div class="logo">

        <img class="logo" src="/carRodio/img/logow.png" alt="">

   </div>

   <!--<div class="main">

        <img src="img/bg.png" alt="">

   </div-->

   <div class="bg-img">

    <form action="/carRodio/register/verifyemail.php" method="POST" class="container">

        <h1>To continue, First verify it's you </h1>

        <input type="text" placeholder="Enter Your Email Address" name="eml" required>

        <div class="flex-container">

            <div>
                <button type="submit" name="submit" value="send" class="btn">Next</button>
            </div>
            
        </div>

    
    </div>
        

    </form>

  </div>
    
</body>

</html>