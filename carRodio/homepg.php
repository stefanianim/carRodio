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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/homepg.css" rel="stylesheet">

    <!-- featured cars slideshow js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <title>Home</title>


</head>

<body >

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
                        <li class="nav-item active">
                            <a class="nav-link" href="homepg.php">Home
                                <span class="sr-only"></span>
                            </a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="buy/buyhomepg.php">Buy</a></li>

                        <li class="nav-item"><a class="nav-link" href="sell/sellhomepg.php">Sell</a></li>

                        <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Background slideshow -->
    <ul class="slideshow">
        <li><span>1</span></li>
        <li><span>2</span></li>
        <li><span>3</span></li>
        <li><span>4</span></li>
        <li><span>5</span></li>
    </ul>


    <div class="section">
        <h2 class="ftitle">Featured Cars</h2>

        <table class="fcars">
            <tr>
                <td>
                <div class="cards">
                    <div class="card">
                           
                    <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel" style="width:250px">
                            <div class="carousel-inner">
                                <?php
                                    // Get images from the database
                                    $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=48");

                                    if($query->num_rows > 0){
                                        while($row = $query->fetch_assoc()){
                                            $imageURL = 'sell/uploads/'.$row["fileName"];
                                            ?>

                                                <div class="carousel-item ss1">
                                                    <img style="width:100%; height:100%" src="<?php echo $imageURL; ?>" alt="" class="image img-fluid" />
                                                </div>
                                <?php }
                                        
                                    }else{ ?>
                                        <p>No image(s) found...</p>
                                        <?php } ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>    
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                    </div>
                    <?php
                        $query1 = 'SELECT * FROM vehicle WHERE vId=48';
                        $get1 = $conn->query($query1);
                        $option1 = '';
                        while ($rows1 = $get1->fetch_assoc()) {?>
                            <a href='buy/advpg.php'>
                                <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h4>
                                <p><?php echo $rows1['modelYr']; ?></p>
                            </a>
                            <?php }?>
                </td>

                <td>
                <div class="cards">
                    <div class="card">
                           
                    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" style="width:250px">
                            <div class="carousel-inner">
                                <?php
                                    // Get images from the database
                                    $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=45");

                                    if($query->num_rows > 0){
                                        while($row = $query->fetch_assoc()){
                                            $imageURL = 'sell/uploads/'.$row["fileName"];
                                            ?>

                                                <div class="carousel-item ss2">
                                                    <img style="width:100%; height:100%" src="<?php echo $imageURL; ?>" alt="" class="image img-fluid" />
                                                </div>
                                <?php }
                                        
                                    }else{ ?>
                                        <p>No image(s) found...</p>
                                        <?php } ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>    
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                    </div>
                    <?php
                        $query1 = 'SELECT * FROM vehicle WHERE vId=45';
                        $get1 = $conn->query($query1);
                        $option1 = '';
                        while ($rows1 = $get1->fetch_assoc()) {?>
                            <a href='buy/advpg.php'>
                                <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h4>
                                <p><?php echo $rows1['modelYr']; ?></p>
                            </a>
                            <?php }?>
                </td>

                <td>
                <div class="cards">
                    <div class="card">
                           
                    <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel" style="width:250px">
                            <div class="carousel-inner">
                                <?php
                                    // Get images from the database
                                    $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=46");

                                    if($query->num_rows > 0){
                                        while($row = $query->fetch_assoc()){
                                            $imageURL = 'sell/uploads/'.$row["fileName"];
                                            ?>

                                                <div class="carousel-item ss3">
                                                    <img style="width:100%; height:100%" src="<?php echo $imageURL; ?>" alt="" class="image img-fluid" />
                                                </div>
                                <?php }
                                        
                                    }else{ ?>
                                        <p>No image(s) found...</p>
                                        <?php } ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>    
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                    </div>
                    <?php
                        $query1 = 'SELECT * FROM vehicle WHERE vId=46';
                        $get1 = $conn->query($query1);
                        $option1 = '';
                        while ($rows1 = $get1->fetch_assoc()) {?>
                            <a href='buy/advpg.php'>
                                <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h4>
                                <p><?php echo $rows1['modelYr']; ?></p>
                            </a>
                            <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                <div class="cards">
                    <div class="card">
                           
                    <div id="carouselExampleControls4" class="carousel slide" data-ride="carousel" style="width:250px">
                            <div class="carousel-inner">
                                <?php
                                    // Get images from the database
                                    $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=47");

                                    if($query->num_rows > 0){
                                        while($row = $query->fetch_assoc()){
                                            $imageURL = 'sell/uploads/'.$row["fileName"];
                                            ?>

                                                <div class="carousel-item ss4">
                                                    <img style="width:100%; height:100%" src="<?php echo $imageURL; ?>" alt="" class="image img-fluid" />
                                                </div>
                                <?php }
                                        
                                    }else{ ?>
                                        <p>No image(s) found...</p>
                                        <?php } ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls4" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>    
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControl4" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                    </div>
                    <?php
                        $query1 = 'SELECT * FROM vehicle WHERE vId=47';
                        $get1 = $conn->query($query1);
                        $option1 = '';
                        while ($rows1 = $get1->fetch_assoc()) {?>
                            <a href='buy/advpg.php'>
                                <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h4>
                                <p><?php echo $rows1['modelYr']; ?></p>
                            </a>
                            <?php }?>
                </td>
                <td>
                <div class="cards">
                    <div class="card">
                           
                    <div id="carouselExampleControls5" class="carousel slide" data-ride="carousel" style="width:250px">
                            <div class="carousel-inner">
                                <?php
                                    // Get images from the database
                                    $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=49");

                                    if($query->num_rows > 0){
                                        while($row = $query->fetch_assoc()){
                                            $imageURL = 'sell/uploads/'.$row["fileName"];
                                            ?>

                                                <div class="carousel-item ss5">
                                                    <img style="width:100%; height:100%" src="<?php echo $imageURL; ?>" alt="" class="image img-fluid" />
                                                </div>
                                <?php }
                                        
                                    }else{ ?>
                                        <p>No image(s) found...</p>
                                        <?php } ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls5" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>    
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls5" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                    </div>
                    <?php
                        $query1 = 'SELECT * FROM vehicle WHERE vId=49';
                        $get1 = $conn->query($query1);
                        $option1 = '';
                        while ($rows1 = $get1->fetch_assoc()) {?>
                            <a href='buy/advpg.php'>
                                <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h4>
                                <p><?php echo $rows1['modelYr']; ?></p>
                            </a>
                            <?php }?>
                </td>
                <td>
                <div class="cards">
                    <div class="card">
                           
                    <div id="carouselExampleControls6" class="carousel slide" data-ride="carousel" style="width:250px">
                            <div class="carousel-inner">
                                <?php
                                    // Get images from the database
                                    $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=50");

                                    if($query->num_rows > 0){
                                        while($row = $query->fetch_assoc()){
                                            $imageURL = 'sell/uploads/'.$row["fileName"];
                                            ?>

                                                <div class="carousel-item ss6">
                                                    <img style="width:100%; height:100%" src="<?php echo $imageURL; ?>" alt="" class="image img-fluid" />
                                                </div>
                                <?php }
                                        
                                    }else{ ?>
                                        <p>No image(s) found...</p>
                                        <?php } ?>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls6" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>    
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls6" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                    </div>
                    <?php
                        $query1 = 'SELECT * FROM vehicle WHERE vId=50';
                        $get1 = $conn->query($query1);
                        $option1 = '';
                        while ($rows1 = $get1->fetch_assoc()) {?>
                            <a href='buy/advpg.php'>
                                <h4><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h4>
                                <p><?php echo $rows1['modelYr']; ?></p>
                            </a>
                            <?php }?>
                </td>
            </tr>
        </table>

        <script>
            document.getElementsByClassName("ss1")[0].classList.add("active");
            document.getElementsByClassName("ss2")[0].classList.add("active");
            document.getElementsByClassName("ss3")[0].classList.add("active");
            document.getElementsByClassName("ss4")[0].classList.add("active");
            document.getElementsByClassName("ss5")[0].classList.add("active");
            document.getElementsByClassName("ss6")[0].classList.add("active");
        </script>

</body>

</html>