<?php
include 'connection.php';
session_start();
    
    $CategoryID = $_SESSION['loginuser'];
    $phone = $_POST['phone'];  
    $birthdate 	= $_POST['birthdate']; 
    $country 		= $_POST['country']; 
    $city 	= $_POST['city']; 
    $status 		= $_POST['status'];  

    //echo $CategoryID;
    //echo $phone;  
    //echo $birthdate; 
    //echo $country; 
    //echo $city; 
    //echo $status;  

	$sql="update users set phone = '$phone', birthdate = '$birthdate', country = '$country', city = '$city', status = '$status' where id = '$CategoryID'";
    $result = $conn->query($sql);
	header("Location: ../Newapp.php");
?>