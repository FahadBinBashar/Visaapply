<?php
// Include the database configuration file
session_start();
$rdate = date("d-m-Y");
if ($_SESSION['loginuser'] == true) {
    include 'connection.php';
    $valid['success'] = array('success' => false, 'messages' => array());
    $did = $_SESSION['loginuser'];
    $choice = $_POST['choice'];
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
        $targetDir = "../recognitionuploads/";
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
    $sql = "INSERT INTO recognition (cid, choice, filename, status, rdate) VALUES ('$did','$choice','$insertValuesSQL','$status','$rdate')";

    if ($conn->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Files are uploaded successfully.";
        $_SESSION['upload_success'] = true; // Set session variable
    } else { 
        $valid['success'] = false;
        $valid['messages'] = "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
}
header("Location: ../recognition.php");
?>
