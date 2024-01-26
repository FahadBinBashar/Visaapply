<?php
include 'connection.php';
session_start();

    $CategoryID = $_SESSION['loginuser'];
    $email = $_POST['email'];  
    $opassword   = $_POST['oldpassword']; 
    $npassword      = $_POST['newpassword']; 
    
$conn = new mysqli($servername, $username, $password, $dbname);
$sql=("SELECT * from users where id='".$_SESSION['loginuser']."'");
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
	$sql="update users set password = '$npassword' where id = '$CategoryID' AND email = '$email'";
    $result = $conn->query($sql);
	header("Location: ../PSW.php");
}
else {
    
     echo '<script>alert("Password did not match")</script>';  
                echo '<script>window.location="../PSW.php"</script>';  
}
?>