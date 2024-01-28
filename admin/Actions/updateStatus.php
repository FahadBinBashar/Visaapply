<?php
include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
// Include the configuration file
include '../../Actions/mail_config.php';
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
  $researchid = isset($_POST['researchid']) ? $_POST['researchid'] : 0;
  $instituteid = isset($_POST['instituteid']) ? $_POST['instituteid'] : 0;
  $recongnitionid = isset($_POST['recongnitionid']) ? $_POST['recongnitionid'] : 0;
  $supportid = isset($_POST['supportid']) ? $_POST['supportid'] : 0;
  $visaid = isset($_POST['visaid']) ? $_POST['visaid'] : 0;
  $residencyid = isset($_POST['residencyid']) ? $_POST['residencyid'] : 0;
  $renewalid = isset($_POST['renewalid']) ? $_POST['renewalid'] : 0;
  $domiciliationid = isset($_POST['domiciliationid']) ? $_POST['domiciliationid'] : 0;
  $otherid = isset($_POST['otherid']) ? $_POST['otherid'] : 0;
  $status = isset($_POST['status']) ? $_POST['status'] : '';

  if ($researchid != 0) {
    // Update the status in the research table
    $sql = "UPDATE research SET status = '$status' WHERE rid = $researchid";
    $sqlr = "SELECT users.email, users.name FROM research INNER JOIN users ON research.cid = users.id WHERE research.rid = '$researchid'";
  } else if ($instituteid != 0) {
    // Update the status in the institution table
    $sql = "UPDATE institution SET status = '$status' WHERE iid = $instituteid";
    $sqlr = "SELECT users.email, users.name FROM institution INNER JOIN users ON institution.cid = users.id WHERE institution.iid = '$instituteid'";
  } else if ($recongnitionid != 0) {
    // Update the status in the recognition table
    $sql = "UPDATE recognition SET status = '$status' WHERE rid = $recongnitionid";
    $sqlr = "SELECT users.email, users.name FROM recognition INNER JOIN users ON recognition.cid = users.id WHERE recognition.rid = '$recongnitionid'";
  } else if ($supportid != 0) {
    // Update the status in the support table
    $sql = "UPDATE support SET status = '$status' WHERE sid = $supportid";
    $sqlr = "SELECT users.email, users.name FROM support INNER JOIN users ON support.cid = users.id WHERE support.sid = '$supportid'";
  } else if ($visaid != 0) {
    // Update the status in the support table
    $sql = "UPDATE visa SET status = '$status' WHERE vid = $visaid";
    $sqlr = "SELECT users.email, users.name FROM visa INNER JOIN users ON visa.cid = users.id WHERE visa.vid = '$visaid'";
  } else if ($residencyid != 0) {
    // Update the status in the support table
    $sql = "UPDATE residency SET status = '$status' WHERE resid = $residencyid";
    $sqlr = "SELECT users.email, users.name FROM residency INNER JOIN users ON residency.cid = users.id WHERE residency.resid = '$residencyid'";
  } else if ($renewalid != 0) {
    // Update the status in the support table
    $sql = "UPDATE renewal SET status = '$status' WHERE renid = $renewalid";
    $sqlr = "SELECT users.email, users.name FROM renewal INNER JOIN users ON renewal.cid = users.id WHERE renewal.renid = '$renewalid'";
  } else if ($domiciliationid != 0) {
    // Update the status in the support table
    $sql = "UPDATE domiciliation SET status = '$status' WHERE did = $domiciliationid";
    $sqlr = "SELECT users.email, users.name FROM domiciliation INNER JOIN users ON domiciliation.cid = users.id WHERE domiciliation.did = '$domiciliationid'";
  } else if ($otherid != 0) {
    // Update the status in the support table
    $sql = "UPDATE otherlegal SET status = '$status' WHERE lid = $otherid";
    $sqlr = "SELECT users.email, users.name FROM otherlegal INNER JOIN users ON otherlegal.cid = users.id WHERE otherlegal.lid = '$otherid'";
  }

  if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
    try {
      $resultr = $conn->query($sqlr);
      // If a user is found, send an email
      if ($resultr) {
          $row = $resultr->fetch_assoc();

          if ($row) {
              $userEmail = $row['email'];
              $userName = $row['name'];

              // Create a new PHPMailer instance
              $mail = new PHPMailer(true);

              try {
                  // Server settings
                  $mail->isSMTP();
                  $mail->Host       = $config['smtp_host'];
                  $mail->SMTPAuth   = $config['smtp_auth'];
                  $mail->Username   = $config['smtp_username'];
                  $mail->Password   = $config['smtp_password'];
                  $mail->SMTPSecure = $config['smtp_secure'];
                  $mail->Port       = $config['smtp_port'];

                  // Sender and recipient settings for user email
                  $mail->setFrom('info@munihaelectronics.com', 'ES Hayat');
                  $mail->addAddress($userEmail, $userName); // Recipient email and name

                  // Email content
                  $mail->isHTML(true);
                  $mail->Subject = 'ES Hayat Status Update';
                  $mail->Body    = 'Dear ' . $userName . ', Your status has been updated to ' . $status . ' in ES Hayat.';

                  // Send the user email
                  $mail->send();
                  // echo 'Email has been sent successfully to ' . $userEmail;
              } catch (Exception $e) {
                  echo "User email could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }
          } else {
              echo 'User not found with the given CID';
          }
      }
    } catch (PDOException $e) {
      echo "Error executing query: " . $e->getMessage();
    }
   
  } else {
    echo json_encode(['success' => false, 'message' => 'Error updating status']);
  }

  $conn->close();
}
?>
