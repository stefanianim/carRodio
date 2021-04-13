<?php
session_start();
$server = "localhost";
$user = "root";
$password = "";
$dbname = "carrodio";

$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["contact"])){
    //store posted values in the session variables
    $_SESSION['manufacturer'] = $_POST['manufacturer'];
    $_SESSION['sellerEmail'] = $_POST['sellerEmail'];
    var_dump($_SESSION['manufacturer']);
    var_dump($_SESSION['sellerEmail']);

}
if(isset($_POST["submit"])){

    require_once ('Exception.php');
    require_once ('class.phpmailer.php');
    require_once ('class.smtp.php');
    require_once ('PHPMailerAutoload.php');

    $mail = new \PHPMailer\PHPMailer\PHPMailer();

    $name = $_POST['nametxt'];
    $location = $_POST['loctxt'];
    $mobile = $_POST['mobtxt'];
    $msg = $_POST['msgtxt'];
    $email=$_POST["emailtxt"];

    $mail->setFrom($_POST["emailtxt"], $name);
    $mail->addAddress($_SESSION["sellerEmail"], "Recepient Name");
    $mail->addReplyTo($_POST["emailtxt"], "Reply");
    $mail->isHTML(true);

    $mail->isSMTP(); // send as HTML
    $mail->Host = "smtp.gmail.com"; // SMTP servers
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = "niharaarts1@gmail.com"; // Your mail
    $mail->Password = '3Dinithi3Nihara3'; // Your password mail
    $mail->Port = 587; //specify SMTP Port
    $mail->SMTPSecure = 'tls';   

    $mail->Subject = "Form submission";
    $mail->Body = $name . " from " . $location . " sent the following:" . "\n\n" . $msg;
   
        if(!$mail->send()) 
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } 
        else 
        {
            echo '<script>alert("Message has been sent successfully, seller will contact you shortly.")</script>';
        }

        $date=date("Y/m/d");

        $sql ="INSERT INTO contacthistory(bname,bloc,bemail,bmob) VALUES 
        ('$name','$location','$email','$mobile')";

        if($conn->query($sql)===TRUE){
           // echo "Buyer information stored successfully";
        }else{
            echo "Error: ".$sql."<br>".$conn->error;
        }

    // use header('Location: thank_you.php'); to redirect to another page.
    }

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/contactpg.css" rel="stylesheet">

    <title>Contact Seller</title>


</head>

<body>
    <div class="logo">

        <img class="logo" src="/carRodio/img/logow.png" alt="">

    </div>
    <div class="form">
        <form action="/carRodio/buy/contactpg.php" method="post">
            <table class="table">
                <thead>
                    <h2>Contact The Seller</h2>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label> </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="name">Name:</label>
                        </td>
                        <td>
                            <input type="text" name="nametxt" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="loc">Location:</label>
                        </td>
                        <td>
                            <input type="text" name="loctxt" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="mob">Mobile No:</label>
                        </td>
                        <td>
                            <input type="number" name="mobtxt" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="email">Email:</label>
                        </td>
                        <td>
                            <input type="text" name="emailtxt" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label name="msg">Message:</label>
                        </td>
                        <td>
                            <textarea type="text" name="msgtxt" row="20" col="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> </label>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <a href="advpg.php"><input type="button" value="Cancel" name="cancel" /></a>
                        </td>
                        <td>
                            <a><input type="submit" value="Send" name="submit" /></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </form>
    </div>

</body>

</html>