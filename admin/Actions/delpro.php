<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "old";
$connect = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


     
    $CategoryID 		= $_POST['category_id']; 
	$sql="delete from projects where pid = '$CategoryID'";
		$result = $connect->query($sql);
		header("Location: ../cat2.php");
?>