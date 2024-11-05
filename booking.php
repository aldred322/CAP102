<?php

require_once 'phpqrcode/qrlib.php';

$con=mysqli_connect('127.0.0.1','root','','capstone-project');

$firstname=$_POST['ffirst']; 
$lastname=$_POST['flast']; 
$email=$_POST['femail']; 
$city=$_POST['city']; 
$phone=$_POST['fphone']; 
$destination=$_POST['fdesti'];

// Create a data string to encode into the QR code
$data = "Event: $destination\n";
$data .= "Name: $firstname $lastname\n";
$data .= "Email: $email\n";
$data .= "City: $city\n";
$data .= "Phone: $phone";

// Generate a QR code image using PHPQRCode
$filename = 'qrcode_' . bin2hex(random_bytes(16)) . '.png';
QRcode::png($data, $filename, 'L', 4, 4);

// Insert the booking data and QR code value into the database
$sql="INSERT INTO booking(id,ffirst,flast,femail,city,fphone,fdesti,qr_code) VALUES (0,'$firstname','$lastname','$email','$city','$phone','$destination','$filename')";
$result = mysqli_query($con,$sql);

if(isset($_POST['submit'])){
  echo '<div class="container">';
  echo '<div class="header"><h2>Booking Successful!</h2></div>';
  echo '<div class="success"><p>Your QR code is:</p></div>';
  echo '<div class="qr-code"><img src="' . $filename . '"></div>';
  echo '</div>';
}
?>

<head>
  <link rel="stylesheet" type="text/css" href="css/bookqr.css">
</head>