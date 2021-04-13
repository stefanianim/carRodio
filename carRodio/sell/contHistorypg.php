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

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/homepg.css" rel="stylesheet">
    <link href="../css/contHistory.css" rel="stylesheet">

    <title>Contact history of buyers</title>

</head>

<body>

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="homepg.php">
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

                        <li class="nav-item"><a class="nav-link" href="../buy/buyhomepg.php">Buy</a></li>

                        <li class="nav-item active"><a class="nav-link" href="sellhomepg.php">Sell</a></li>

                        <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <h2>Contact History</h2>

    <div class="contacts">
        <div>
            <?php
                $query1 = 'SELECT * FROM contacthistory ';
                $get1 = $conn->query($query1);
                $option1 = '';
                while ($rows1 = $get1->fetch_assoc()) {?>
            <table>
                <tr>
                    <td>
                        <label name="name">Name:</label>
                    </td>
                    <td>
                        <p name="nametxt" ><?php echo $rows1['bname']; ?></p>
                    </td>
                    <td class="time"><?php echo $rows1['date']; ?></td>
                </tr>
                <tr>
                    <td>
                        <label name="loc">Location:</label>
                    </td>
                    <td>
                        <p name="loctxt" ><?php echo $rows1['bloc']; ?></p>
                    </td>
                    <td><p></p></td>
                </tr>
                <tr>
                    <td>
                        <label name="email">Email:</label>
                    </td>
                    <td>
                        <p name="emailtxt" ><?php echo $rows1['bemail']; ?></p>
                    </td>
                    <td><p></p></td>
                </tr>
                <tr>
                    <td>
                        <label name="mob">Contact No:</label>
                    </td>
                    <td>
                        <p name="mobtxt" ><?php echo $rows1['bmob']; ?></p>
                    </td>
                    <td><p></p></td>
                </tr>
                
            </table>
            <?php } ?>
        </div>
    </div>
</body>

</html>