<?php
session_start();
include 'connection.php';
//get values from form to login.php
 $username = $_POST['username'];
 $password = $_POST['password'];

 	$sql=("SELECT * from admin where username ='$username' and password ='$password'");
	$result=mysqli_query($conn, $sql);


if ($result->num_rows > 0) 
{
    // output data of each row

    while($row = $result->fetch_assoc()) 
    {
		 $_SESSION['loginadmin']=$row['username'];
		 echo "<script> window.open('../Overview.php','_self')</script>";
    }
} 
else {
    
     echo '<script>alert("Wrong Username or Password")</script>';  
    echo '<script>window.location="../login.php"</script>';  
}

$conn->close();
?>

