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

if(isset($_POST["deladv"])){
    
    $sql ="DELETE FROM vehicle WHERE vId=1";

    if($conn->query($sql)===TRUE){
        echo "Advetisement was deleted successfully";
    }else{
        echo "Error: ".$sql."<br>".$conn->error;
    }

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

    <link href="../css/sellpg.css" rel="stylesheet">

    <title>Sell Home Page</title>


</head>

<body>

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="../css/homepg.css" rel="stylesheet">
        <link href="../css/sellpg.css" rel="stylesheet">

        <title>Home</title>


    </head>

    <body>

        <!-- Header -->
        <header class="">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo -->
                    <a class="navbar-brand" href="../homepg.php">
                        <div class="logo">
                            <img class="logo" src="/carRodio/img/logow.png" alt="">
                        </div>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../homepg.php">Home
                                    <span class="sr-only"></span>
                                </a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="cars.html">Buy</a></li>

                            <li class="nav-item active"><a class="nav-link" href="sellhomepg.php">Sell</a></li>

                            <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

<div class="form">
    <form action="/carRodio/sell/sellhomepg.php" method="post">
        <a href="addAdv.php">
            <input type="button" value=" Add advertisement " name="addadv" />
        </a>
        <br><br>
        <a href="updateAdv.php">
            <input type="button" value=" Update advertisement " name="upadv" />
        </a>
        <br><br>
        <a href="sellhomepg.php">
            <input type="submit" value=" Delete advertisement " name="deladv" />
        </a>
        <br><br>
</form>
        </div>

    </body>

    </html>



</body>

</html>