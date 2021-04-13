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

    <link href="../css/sellpg.css" rel="stylesheet">

    <title>Selected Advertisement</title>


</head>

<body>
    <div class="form">
        <form action="/carRodio/buy/contactpg.php" method="post">
            <table class="table">
                <thead>

                    <?php
                $query1 = 'SELECT * FROM vehicle WHERE vId=42';
                $get1 = $conn->query($query1);
                $option1 = '';
                while ($rows1 = $get1->fetch_assoc()) {?>

                    <h2 class="title" ><b><?php echo $rows1['manufacturer']; ?> <?php echo $rows1['model']; ?></b></h2>
                    <h4 class="title" name="modelYr"><?php echo $rows1['modelYr']; ?></h4>

                    <input type="hidden" name="manufacturer" id="con_content" 
                    value="<?php echo $rows1['manufacturer']; ?>
                    <?php echo $rows1['model'];?>
                    <?php echo $rows1['modelYr']; ?>" />

                    <?php }?>
                    </h2>
                    <thead>
                    <tbody>
                        <tr>
                            <td><label> </label></td>
                        </tr>

                        <tr>
                            <td><label><b>Condition, Body type & More</b></label></td>
                        </tr>
                        <tr>
                            <td><label>Condition: </label></td>
                            <td><label>Color: </label></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                        $query1 = 'SELECT vCondition FROM vehicle WHERE vId=42';
                                        $get1 = $conn->query($query1);
                
                                        while ($rows1 = $get1->fetch_assoc()) {?>

                                <p><?php echo $rows1['vCondition']; ?></p>

                                <?php }?>

                            </td>
                            <td>
                                <?php
                                        $query1 = 'SELECT color FROM vehicle WHERE vId=42';
                                        $get1 = $conn->query($query1);
                             
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['color']; ?>
                                </p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label>Body Type: </label></td>
                            <td><label>Fuel Type: </label></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                            $query1 = 'SELECT bodyType FROM vehicle WHERE vId=42';
                                            $get1 = $conn->query($query1);
                                       
                                            while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['bodyType']; ?>
                                </p>

                                <?php }?>

                            </td>
                            <td>
                                <?php
                                            $query1 = 'SELECT fuelType FROM vehicle WHERE vId=42';
                                            $get1 = $conn->query($query1);
                                        
                                            while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['fuelType']; ?>
                                </p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label>Year of Registration: </label></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                            $query1 = 'SELECT regYr FROM vehicle WHERE vId=42';
                                            $get1 = $conn->query($query1);
                                         
                                            while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['regYr']; ?>
                                </p>

                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        </tr>
                        <tr>
                            <td><label><b>Other</label></b></td>
                        </tr>
                        <tr>
                            <td><label>Engine Capacity: </label></td>
                            <td>
                                <?php
                                            $query1 = 'SELECT engCapacity FROM vehicle WHERE vId=42';
                                            $get1 = $conn->query($query1);
                                        
                                            while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['engCapacity']; ?>
                                </p>

                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Transmission: </label></td>
                            <td>
                                <?php
                                            $query1 = 'SELECT transmission FROM vehicle WHERE vId=42';
                                            $get1 = $conn->query($query1);
                                
                                            while ($rows1 = $get1->fetch_assoc()) {?>
                                <p>
                                    <?php echo $rows1['transmission']; ?>
                                </p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label>Mileage: </label></td>
                            <td>
                                <?php
                                        $query1 = 'SELECT mileage FROM vehicle WHERE vId=42';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                <p name="mil_content" id="mil_content">
                                    <?php echo $rows1['mileage']; ?> </p>

                                <?php }?>

                            </td>
                        </tr>

                        <tr>
                            <td>

                                <label>Uploaded files: <label>
                                        <?php
                                // Get images from the database
                                $query = $conn->query("SELECT * FROM carimages WHERE vehicleId=42 ORDER BY vehicleId DESC");

                                    if($query->num_rows > 0){
                                        while($row = $query->fetch_assoc()){
                                            $imageURL = '../sell/uploads/'.$row["fileName"];
                                            ?>
                                        <img src="<?php echo $imageURL; ?>" alt="" class="thumbnail" />
                                        <?php }
                                    }else{ ?>
                                        <p>No image(s) found...</p>
                                        <?php } ?>

                            </td>

                        </tr>

                        <tr>
                            <td><label></label></td>
                        </tr>
                        <tr>
                            <td><label>Price: </label></td>
                            <td>
                                <?php
                                    $query1 = 'SELECT price FROM vehicle WHERE vId=42';
                                    $get1 = $conn->query($query1);
                                    $option1 = '';
                                    while ($rows1 = $get1->fetch_assoc()) {?>
                                <p name="price" id="price" ><?php echo $rows1['price']; ?> </p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td><label>Additional Details: </label></td>
                            <td>
                                <?php
                                        $query1 = 'SELECT addDetails FROM vehicle WHERE vId=42';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                <p  name="adDetails" id="adDetails">
                                        <?php echo $rows1['addDetails']; ?>"</p>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <label class="title"><b>Seller Details:</b></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td><label>Name: </label>
                                <?php
                                        $query1 = 'SELECT sname FROM vehicle WHERE vId=42';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                <label type="text" name="sname" id="sname"><?php echo $rows1['sname']; ?></label>

                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td><label>Contact No: </label>
                                <?php
                                        $query1 = 'SELECT scno FROM vehicle WHERE vId=42';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                <label type="text" name="scno" id="scno"><?php echo $rows1['scno']; ?></label>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td><label>Email: </label>
                                <?php
                                        $query1 = 'SELECT semail FROM vehicle WHERE vId=42';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                <label type="text" name="semail" id="semail" ><?php echo $rows1['semail']; ?></label>

                                <input type="hidden" name="sellerEmail" value="<?php echo $rows1['semail']; ?>"/>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td><label>Location: </label>
                                <?php
                                        $query1 = 'SELECT sloc FROM vehicle WHERE vId=42';
                                        $get1 = $conn->query($query1);
                                        $option1 = '';
                                        while ($rows1 = $get1->fetch_assoc()) {?>
                                <label type="text" name="sloc" id="sloc"><?php echo $rows1['sloc']; ?></label>

                                <?php }?>

                            </td>
                        </tr>
                        <tr>

                            <td><label> </label></td>

                            <td>
                                <a href="carRodio/buy/contactpg.php"><input type="submit" value="Contact the seller"
                                        name="contact" /></a>
                            </td>
                        </tr>

                    </tbody>
            </table>
        </form>
    </div>

</body>

</html>