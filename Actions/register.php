<?php
session_start(); // Start the session

include 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());
$rdate = date("d-m-Y");

if ($_POST) {
    $name  = $_POST['username'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $sql = "INSERT INTO users (name, email, password, regdate) 
            VALUES ('$name', '$email','$pass','$rdate')";

    if ($conn->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Registered";

					//php mail
					    $to      = $email;
                       $subject = 'ES Hayat Registration';
                      $message = 'Dear '.$name.' , Thankyou for registering yourself with ES Hayat.';
                        $headers = 'From: noreply@eshayatabroad.com' . "\r\n" .
                              'Reply-To: noreply@eshayatabroad.com' . "\r\n" .
                                   'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
	//php mail
					   $to      = 'fahadbinbashar@gmail.com';
                        $subject = 'New Registration';
                       $message = 'A new user ' .$email. ' has registered with ES Hayat Portal. Check their information and take action accordingly.';
                       $headers = 'From: noreply@eshayatabroad.com' . "\r\n" .
                       'Reply-To: noreply@eshayatabroad.com' . "\r\n" .
                                 'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
				 $_SESSION['registration_success'] = true; // Set session variable

    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while adding the members";
    }

    $conn->close();
    echo json_encode($valid);
} // /if $_POST

header("Location: ../Signup.php");
?>