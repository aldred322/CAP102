<?php

$con=mysqli_connect('127.0.0.1','root','','capstone-project');



if(isset($_POST['de-submit-c']))
{
	$id=$_POST['id'];
	$firstname=$_POST['fname'];

	$sql="DELETE FROM `customer` WHERE id=$id and fname='$firstname'";
	$result = mysqli_query($con,$sql);
	header('location:admin.php');
}

if(isset($_POST['in-submit-a']))
{
	$rid=$_POST['rid'];
	$rname=$_POST['rname'];
	$password=$_POST['password'];

	$sql1="INSERT INTO `rsrch`(`rid`,`rname`,`password`) VALUES ('$rid,'$rname','$password')";
	$result = mysqli_query($con,$sql1);
	header('location:admin.php');
}

if(isset($_POST['de-submit-a']))
{
	$fid=$_POST['fid'];
	$ffname=$_POST['ffname'];

	$sql2="DELETE FROM `finance` WHERE fid=$fid and ffname='$ffname'";
	$result = mysqli_query($con,$sql2);
	header('location:admin.php');
}

if(isset($_POST['ins-submit-p']))
{
	$pid=$_POST['pid'];
	$pname=$_POST['pname'];
	$pcity=$_POST['pcity'];

	$sql3="INSERT INTO `places`(`pid`,`pname`,`pcity`) VALUES ($pid,'$pname','$pcity')";
	$result = mysqli_query($con,$sql3);
	header('location:admin.php');
}

if(isset($_POST['de-submit-p']))
{
	$pid=$_POST['pid'];
	$pname=$_POST['pname'];

	$sql4="DELETE FROM `places` WHERE pid=$pid and pname='$pname'";
	$result = mysqli_query($con,$sql4);
	header('location:admin.php');
}

if(isset($_POST['ins-submit-h']))
{
	$rid=$_POST['rid'];
	$rname=$_POST['rname'];
	$password=$_POST['password'];

	$sql5="INSERT INTO `rsrchdev`(`rid`,`rname`,`password`) VALUES ($rid,'$rname','$password')";
	$result = mysqli_query($con,$sql5);
	header('location:admin.php');
}
if(isset($_POST['ins-submit-h']))
{
	$rid=$_POST['rid'];
	$rname=$_POST['rname'];
	$password=$_POST['password'];

	$sql5="INSERT INTO `rsrchdev`(`rid`,`rname`,`password`) VALUES ($rid,'$rname','$password')";
	$result = mysqli_query($con,$sql5);
	header('location:admin.php');
}

if(isset($_POST['de-submit-h']))
{
	$rid=$_POST['rid'];
	$rname=$_POST['rname'];

	$sql6="DELETE FROM `rsrchdev` WHERE rid=$rid and rname='$rname'";
	$result = mysqli_query($con,$sql6);
	header('location:admin.php');
}
if(isset($_POST['add_pd']))
{
	$pname=$_POST['pname'];
	$pdescription=$_POST['pdescription'];
	$pi_main=$_POST['pi_main'];
	$pi1=$_POST['pi1'];
	$pi2=$_POST['pi2'];
	$pi3=$_POST['pi3'];

	$sql6="INSERT INTO `information`(`pname`,`pdescription`,`pi_main`,`pi1`,`pi2`,`pi3`) VALUES ('$pname','$pdescription','$pi_main','$pi1','$pi2','$pi3')";
	$result = mysqli_query($con,$sql6);
	if ($result) {
		header('location:admin.php');
	}
}
?>