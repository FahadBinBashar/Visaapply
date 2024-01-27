<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
  $researchid = $_POST['researchid'];
  $instituteid = $_POST['instituteid'];
  $recongnitionid = $_POST['recongnitionid'];
  $supportid = $_POST['supportid'];
  $status = $_POST['status'];

  if ($researchid != 0) {
    // Update the status in the research table
    $sql = "UPDATE research SET status = '$status' WHERE rid = $researchid";
  } else if ($instituteid != 0) {
    // Update the status in the institution table
    $sql = "UPDATE institution SET status = '$status' WHERE iid = $instituteid";
  } else if ($recongnitionid != 0) {
    // Update the status in the recognition table
    $sql = "UPDATE recognition SET status = '$status' WHERE rid = $recongnitionid";
  } else if ($supportid != 0) {
    // Update the status in the support table
    $sql = "UPDATE support SET status = '$status' WHERE sid = $supportid";
  }

  if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error updating status']);
  }

  $conn->close();
}
?>
