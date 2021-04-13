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


if(isset($_POST["next"])){
    //store posted values in the session variables
    $_SESSION['manu_content'] = $_POST['manu_content'];
    $_SESSION['mod_content'] = $_POST['mod_content'];
    $_SESSION['modYr_content'] = $_POST['modYr_content'];
    $_SESSION['con_content'] = $_POST['con_content'];
    $_SESSION['col_content'] = $_POST['col_content'];
    $_SESSION['bod_content'] = $_POST['bod_content'];
    $_SESSION['fuel_content'] = $_POST['fuel_content'];
    $_SESSION['regYr_content'] = $_POST['regYr_content'];
    $_SESSION['eng_content'] = $_POST['eng_content'];
    $_SESSION['trans_content'] = $_POST['trans_content'];
    $_SESSION['mil_content'] = $_POST['mil_content'];
}
if(isset($_POST["submit"])){
    $manu_content=$_SESSION['manu_content'];
    $mod_content=$_SESSION['mod_content'];
    $modYr_content=$_SESSION['modYr_content'];
    $con_content=$_SESSION['con_content'];
    $col_content=$_SESSION['col_content'];
    $bod_content=$_SESSION['bod_content'];
    $fuel_content=$_SESSION['fuel_content'];
    $regYr_content=$_SESSION['regYr_content'];
    $eng_content=$_SESSION['eng_content'];
    $trans_content=$_SESSION['trans_content'];
    $mil_content=$_SESSION['mil_content'];
    $sname=$_POST["sname"];
    $scno=$_POST["scno"];
    $semail=$_POST["semail"];
    $sloc=$_POST["sloc"];
    $price =$_POST["price"];
    $adDetails =$_POST["adDetails"];
    var_dump ($_SESSION['manu_content'],$mod_content,$modYr_content,$con_content,$col_content,$bod_content,
    $fuel_content,$regYr_content,$eng_content,$trans_content,$mil_content,$sname,
    $scno,$semail,$sloc,$price,$adDetails);

    $sql ="INSERT INTO vehicle(manufacturer,model,modelYr,vCondition,color,bodyType,fuelType,
    regYr,engCapacity,transmission,mileage,sname,scno,semail,sloc,price,addDetails) VALUES 
    ('$manu_content','$mod_content','$modYr_content','$con_content','$col_content','$bod_content',
    '$fuel_content','$regYr_content','$eng_content','$trans_content','$mil_content','$sname',
    '$scno','$semail','$sloc','$price','$adDetails')";

    if($conn->query($sql)===TRUE){
        echo "Vehicle information stored successfully";
    }else{
        echo "Error: ".$sql."<br>".$conn->error;
    }

     // File upload configuration 
     $targetDir = "uploads/"; 
     $allowTypes = array('jpg','png','jpeg','gif'); 
      
     $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
     $fileNames = array_filter($_FILES['files']['name']); 
     if(!empty($fileNames)){ 
         foreach($_FILES['files']['name'] as $key=>$val){ 
             // File upload path 
             $fileName = basename($_FILES['files']['name'][$key]); 
             $targetFilePath = $targetDir . $fileName; 
              
             // Check whether file type is valid 
             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
             if(in_array($fileType, $allowTypes)){ 
                 // Upload file to server 
                 if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                     
                     $sql2="SELECT MAX(vId) FROM vehicle";
                     $result= $conn->query($sql2);
                     $vehicleid = $result->fetch_assoc();
                     $vid= implode(" ",$vehicleid);

                        
                     // Image db insert sql 
                     $insertValuesSQL .= "('".$fileName."', NOW(),'".$vid."'),"; 
                    
                     
                 }else{ 
                     $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                 } 
             }else{ 
                 $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
             } 
         } 
          
         if(!empty($insertValuesSQL)){ 
             $insertValuesSQL = trim($insertValuesSQL, ','); 
             // Insert image file name into database 
             $insert = $conn->query("INSERT INTO carimages (fileName, uploadedOn,vehicleId) VALUES $insertValuesSQL"); 
             if($insert){ 
                 $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                 $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                 $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                 $statusMsg = "Files are uploaded successfully.".$errorMsg; 
             }else{ 
                 $statusMsg = "Sorry, there was an error uploading your file."; 
             } 
         } 
     }else{ 
         $statusMsg = 'Please select a file to upload.'; 
     } 
      
     // Display status message 
     echo $statusMsg; 


   
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

    <title>Home</title>


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
        <script src="http://code.jquery.com/jquery-1.8.3.js" type="text/javascript"></script>

    </head>

    <body>

        <script src="../js/imgupload.js"></script>
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
        <!-- Form -->
   
            <div class="form">
                <form action="/carRodio/sell/addAdv2.php" method="post" enctype="multipart/form-data">
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
                                        <h4 class="title">Vehicle Details</h4>
                                    </td>
                                    <td>
                                        <h4 class="title" id="active">Additional Information</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label> </label></td>
                                </tr>
                                <tr>
                                    <td><label><b>Manufacturer & Model</b></label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for='files'>Select multiple files: </label>

                                        <input id='files' type='file' name="files[]" multiple />

                                        <output id="result"></output>
                                    </td>

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
                                    <td><label>Name: </label><input type="text" name="sname" id="sname" /></td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td><label>Contact No: </label><input type="text" name="scno" id="scno" /></td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td><label>Email: </label><input type="text" name="semail" id="semail" /></td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td><label>Location: </label><input type="text" name="sloc" id="sloc" /></td>
                                </tr>
                                <tr>
                                    <td><label></label></td>
                                </tr>
                                <tr>
                                    <td><label>Price: </label></td>
                                    <td><input type="number" name="price" id="price" /></td>
                                </tr>
                                <tr>
                                    <td><label> </label></td>
                                </tr>
                                <tr>
                                    <td><label>Additional Details: </label></td>
                                    <td><textarea rows="5" name="adDetails" id="adDetails"></textarea></td>
                                </tr>
                                <tr>
                                    <td><label> </label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="addAdv.php">
                                            <input type="button" value=" Back " />
                                        </a>
                                    </td>
                                    <td>
                                        <a href="addAdv2.php"><input type="submit" value="submit" name="submit" /></a>
                                    </td>
                                </tr>

                            </tbody>
                    </table>
                </form>
            </div>

    </body>

    </html>



</body>

</html>