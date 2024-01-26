<?php
include 'connection.php';
session_start();

    $user = $_POST['username'];  
    $opassword   = $_POST['oldpassword']; 
    $npassword      = $_POST['newpassword']; 
    
$sql=("SELECT * from admin where username='".$_SESSION['loginadmin']."'");
    $result=mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $_SESSION['password'] = $row['password'];

    //echo $CategoryID;
    //echo $phone;  
    //echo $birthdate; 
    //echo $country; 
    //echo $city; 
    //echo $status;  
    if($_SESSION['password'] ==  $opassword)
{ 
	$sql="update admin set password = '$npassword' where password = '$opassword' AND username = '$user'";
    $result = $conn->query($sql);
	header("Location: ../PSW.php");
}
else {
    
     echo '<script>alert("Password did not match")</script>';  
                echo '<script>window.location="../PSW.php"</script>';  
}
?>