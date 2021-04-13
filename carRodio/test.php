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

<body>
    <table style="border:1px solid black; width:100%">
        <tr>
            <td>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:250px">
                    <div class="carousel-inner">
                        <?php
                            // Get images from the database
                            $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=45");

                            if($query->num_rows > 0){
                                while($row = $query->fetch_assoc()){
                                    $imageURL = 'sell/uploads/'.$row["fileName"];
                                    ?>

                                        <div class="carousel-item ss1">
                                            <img style="width:250px" src="<?php echo $imageURL; ?>" alt="" class="image img-fluid" />
                                        </div>


                                        <?php }
                                
                            }else{ ?>
                                <p>No image(s) found...</p>
                                <?php } ?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      
                    </a>
                </div>
            </td>
            <td>
            <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" style="width:250px">
                    <div class="carousel-inner">
                        <?php
                            // Get images from the database
                            $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=43");

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
            </td>
        </tr>
        <table>

        <script>
            document.getElementsByClassName("ss1")[0].classList.add("active");
            document.getElementsByClassName("ss2")[0].classList.add("active");
        </script>
</body>
</html>