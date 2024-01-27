<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
  $id = $_POST['id'];
  $status = $_POST['status'];

  // Update the status in the database
  $sql = "UPDATE research SET status = '$status' WHERE rid = $id";

  if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error updating status']);
  }

  $conn->close();
}
?>
