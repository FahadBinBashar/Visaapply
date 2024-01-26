<?php
// Include the database configuration file
$rdate = date("d-m-Y");
session_start();
if ($_SESSION['loginuser'] == true) {
    include 'connection.php';
    $did = $_SESSION['loginuser'];
    $choice = $_POST['choice'];
    $start = $_POST['start'];
    $expiry = $_POST['expiry'];
    $status = 'Pending';
    // Array to store file names
    $fileNames = array();

    // Loop through each file input
    foreach ($_FILES as $file) {
        $originalFileName = basename($file["name"]);
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $randomNumber = rand(1000, 9999); // Generate a random number

        // Create a unique file name by combining the user name, original file name, and a random number
        $uniqueFileName = $_SESSION['loginuser'] . '_' . $_SESSION['uname'] . '_' . $randomNumber . '_' . $originalFileName;

        // File upload path
        $targetDir = "../residencyuploads/";
        $targetFilePath = $targetDir . $uniqueFileName;

        // Move the file to the server
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            // Store the unique file name in the array
            $fileNames[] = $uniqueFileName;
        } else {
            echo "Error uploading file: " . $originalFileName . "<br>";
        }
    }

    // Insert file names into the database
    $insertValuesSQL = implode(',', $fileNames);
    echo $insertValuesSQL;
    $sql = "INSERT INTO residency (cid, choice, start, expiry, filename, status, rdate) VALUES ('$did','$choice','$start','$expiry','$insertValuesSQL','$status','$rdate')";

    if ($conn->query($sql) === TRUE) {
        echo "Files are uploaded successfully.";
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: ../residency.php");
    // Close connection
    $conn->close();
}
?>
