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
        <form action="/carRodio/sell/addAdv2.php" method="post">
            <table class="table">
                <thead>
                    <h2 class="title"><b>Add Advertisement</b></h2>
                    <thead>
                    <tbody>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="title" id="active">Vehicle Details</h4>
                            </td>
                            <td>
                                <h4 class="title">Additional Information</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td><label><b>Manufacturer & Model</b></label></td>
                        </tr>
                        <tr>
                            <td><label>Manufacturer</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select
                                    onchange="document.getElementById('manu_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT manuName FROM carmanufacturer';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['manuName']; ?>"><?php echo $rows['manuName']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="manu_content" id="manu_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Model</label></td>
                            <td><label>Model Year</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select
                                    onchange="document.getElementById('mod_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT modName FROM carmodel';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['modName']; ?>"><?php echo $rows['modName']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="mod_content" id="mod_content" value="" />
                            </td>
                            <td>
                                <select
                                    onchange="document.getElementById('modYr_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT modYr FROM modelyear';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['modYr']; ?>"><?php echo $rows['modYr']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="modYr_content" id="modYr_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        </tr>
                        <tr>
                            <td><label><b>Condition, Body type & More</b></label></td>
                        </tr>
                        <tr>
                            <td><label>Condition</label></td>
                            <td><label>Color</label></td>
                        </tr>
                        <tr>
                            <td><select
                                    onchange="document.getElementById('con_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT conName FROM carcondition';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['conName']; ?>"><?php echo $rows['conName']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="con_content" id="con_content" value="" />
                            </td>
                            <td><select
                                    onchange="document.getElementById('col_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT colName FROM carcolor';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['colName']; ?>"><?php echo $rows['colName']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="col_content" id="col_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Body Type</label></td>
                            <td><label>Fuel Type</label></td>
                        </tr>
                        <tr>
                            <td><select
                                    onchange="document.getElementById('bod_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT bodType FROM carbodytype';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['bodType']; ?>"><?php echo $rows['bodType']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="bod_content" id="bod_content" value="" />
                            </td>
                            <td><select
                                    onchange="document.getElementById('fuel_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT fuelType FROM carfueltype';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['fuelType']; ?>"><?php echo $rows['fuelType']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="fuel_content" id="fuel_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Year of Registration</label></td>
                        </tr>
                        <tr>
                            <td><select
                                    onchange="document.getElementById('regYr_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT regYr FROM carregyear';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['regYr']; ?>"><?php echo $rows['regYr']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="regYr_content" id="regYr_content" value="" />
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
                            <td><label>Engine Capacity</label></td>
                            <td>
                                <select
                                    onchange="document.getElementById('eng_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT engCapacity FROM carenginecapacity';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['engCapacity']; ?>">
                                        <?php echo $rows['engCapacity']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="eng_content" id="eng_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Transmission</label></td>
                            <td>
                                <select
                                    onchange="document.getElementById('trans_content').value=this.options[this.selectedIndex].text">
                                    <option value=" " selected> - Select - </option>
                                    <?php
                                            $query = 'SELECT transName FROM cartransmission';
                                            $get = $conn->query($query);
                                            $option = '';
                                            while ($rows = $get->fetch_assoc()) {?>
                                    <option value="<?php echo $rows['transName']; ?>">
                                        <?php echo $rows['transName']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="trans_content" id="trans_content" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Mileage</label></td>
                            <td><input type="number" name="mil_content" id="mil_content" placeholder="e.g. 30000" />
                            </td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td><label> </label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a href="addAdv2.php">
                                    <input type="submit" value=" Next " name="next" />
                                </a>
                            </td>
                        </tr>

                    </tbody>
            </table>
        </form>
    </div>



</body>


</html>