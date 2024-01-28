<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
  $researchid = $_POST['researchid'];
  $instituteid = $_POST['instituteid'];
  $recongnitionid = $_POST['recongnitionid'];
  $supportid = $_POST['supportid'];
  $visaid = $_POST['visaid'];
  $residencyid = $_POST['residencyid'];
  $renewalid = $_POST['renewalid'];
  $domiciliationid = $_POST['domiciliationid'];
  $otherid = $_POST['otherid'];
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
  }else if ($visaid != 0) {
    // Update the status in the support table
    $sql = "UPDATE visa SET status = '$status' WHERE vid = $visaid";
  }else if ($residencyid != 0) {
    // Update the status in the support table
    $sql = "UPDATE residency SET status = '$status' WHERE resid = $residencyid";
  }else if ($renewalid != 0) {
    // Update the status in the support table
    $sql = "UPDATE renewal SET status = '$status' WHERE renid = $renewalid";
  }else if ($domiciliationid != 0) {
    // Update the status in the support table
    $sql = "UPDATE domiciliation SET status = '$status' WHERE did = $domiciliationid";
  }else if ($otherid != 0) {
    // Update the status in the support table
    $sql = "UPDATE otherlegal SET status = '$status' WHERE lid = $otherid";
  }

  if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error updating status']);
  }

  $conn->close();
}
?>
