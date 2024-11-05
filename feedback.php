<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'capstone-project');

$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedbk'];

$que="INSERT INTO `feedback` (`id`,`name`,`email`,`feedbk`) VALUES (0,'$name','$email','$feedback')";

$result = mysqli_query($con, $que);

if (isset($_POST['submit'])) {
	header('location:feedback.html');
}

?>