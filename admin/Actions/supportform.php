<?php
include 'connection.php';
session_start();
$valid['success'] = array('success' => false, 'messages' => array());
$rdate = date("d-m-Y");
$status = 'Pending';
if($_POST) {	

	$cid 	= $_SESSION['loginuser'];
	$subject 	        = $_POST['subject'];

	$sql = "INSERT INTO support (cid, subject, rdate, status) 
	VALUES ('$cid', '$subject','$rdate','$status')";

	if($conn->query($sql) === TRUE) {
			$valid['success'] = true;
			header("Location: ../Support.php");
					//php mail
				//	    $to      = $email;
                 //       $subject = 'Primeful distributions';
          //              $message = 'Dear '.$first_name.' , Thankyou for registering yourself with Primeful Distributions. Our team will review your request and will send you an email when your account it approved. 
//Thanks';
                      //  $headers = 'From: noreply@primefuldistributions.com' . "\r\n" .
                       //            'Reply-To: noreply@primefuldistributions.com' . "\r\n" .
            //                       'X-Mailer: PHP/' . phpversion();
//mail($to, $subject, $message, $headers);
	//php mail
					   // $to      = 'muhammadnaeem137@gmail.com';
                       // $subject = 'Customer Registration';
                       // $message = 'A new user' .$email. ' has registered with Primeful Distribution. Check their information and take action accordingly.';
                       // $headers = 'From: noreply@primefuldistributions.com' . "\r\n" .
                             //      'Reply-To: noreply@primefuldistributions.com' . "\r\n" .
                           //        'X-Mailer: PHP/' . phpversion();
//mail($to, $subject, $message, $headers);
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the details";
				}	

	$conn->close();
	echo json_encode($valid);
 
} // /if $_POST
		 header("Location: ../Support.php");
		 ?>