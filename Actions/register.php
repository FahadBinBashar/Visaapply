<?php
session_start(); // Start the session
use PHPMailer\PHPMailer\PHPMailer;
// Include the configuration file
include 'mail_config.php';
include 'connection.php';
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


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

            // Sender and recipient settings
            $mail->setFrom('info@munihaelectronics.com', 'ES Hayat');
            $mail->addAddress($email, $name); // Recipient email and name

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'ES Hayat Registration';
            $mail->Body    = 'Dear ' . $name . ', Thank you for registering yourself with ES Hayat.';

            // Send the email
            $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            // Create a new PHPMailer instance for admin email
            $adminMail = new PHPMailer(true);

            try {
                // Server settings for admin email
                $adminMail->isSMTP();
                $adminMail->Host       = $config['smtp_host'];
                $adminMail->SMTPAuth   = $config['smtp_auth'];
                $adminMail->Username   = $config['smtp_username'];
                $adminMail->Password   = $config['smtp_password'];
                $adminMail->SMTPSecure = $config['smtp_secure'];
                $adminMail->Port       = $config['smtp_port'];

                // Sender and recipient settings for admin email
                $adminMail->setFrom('info@munihaelectronics.com', 'ES Hayat');
                $adminMail->addAddress('eshayat2022@gmail.com', 'Admin'); // Admin's email and name

                // Email content
                $adminMail->isHTML(true);
                $adminMail->Subject = 'New Registration';
                $adminMail->Body    = 'A new user ' . $email . ' has registered with ES Hayat Portal. Check their information and take action accordingly.';

                // Send the admin email
                $adminMail->send();
            } catch (Exception $e) {
                echo "Admin email could not be sent. Mailer Error: {$adminMail->ErrorInfo}";
            }

// 					//php mail
// 					    $to      = $email;
//                        $subject = 'ES Hayat Registration';
//                       $message = 'Dear '.$name.' , Thankyou for registering yourself with ES Hayat.';
//                         $headers = 'From: noreply@eshayatabroad.com' . "\r\n" .
//                               'Reply-To: noreply@eshayatabroad.com' . "\r\n" .
//                                    'X-Mailer: PHP/' . phpversion();
// mail($to, $subject, $message, $headers);
// 	//php mail
// 					   $to      = 'fahadbinbashar@gmail.com';
//                         $subject = 'New Registration';
//                        $message = 'A new user ' .$email. ' has registered with ES Hayat Portal. Check their information and take action accordingly.';
//                        $headers = 'From: noreply@eshayatabroad.com' . "\r\n" .
//                        'Reply-To: noreply@eshayatabroad.com' . "\r\n" .
//                                  'X-Mailer: PHP/' . phpversion();
// mail($to, $subject, $message, $headers);
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