<?php

require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

$first = $_POST['fn'];
$last = $_POST['ln'];
$email = $_POST['email'];
$number = $_POST['num'];
$subject = $_POST['sub'];
$message = $_POST['mess'];

if (empty($first)) {
  $errors[] = "Please enter your first name.";
}

if (empty($last)) {
    $errors[] = "Please enter your last name.";
  }

if (empty($email)) {
  $errors[] = "Please enter your email.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Please enter a valid email address.";
}

if (empty($number)) {
    $errors[] = "Please enter your number.";
} elseif (!is_numeric($number)) {
$errors[] = "Please enter a valid number.";
}

if (empty($subject)) {
$errors[] = "Please enter your name.";
}
if (empty($message)) {
  $errors[] = "Please enter a message.";
}

if (!empty($errors)) {
  foreach ($errors as $error) {
    echo "<p>Error: $error</p>";
  }
} else {
    
    

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username   = 'aboutdkenterprise@gmail.com';                     
    $mail->Password   = 'hxrylqrfvojyddcs';

    $mail->setFrom('aboutdkenterprise@gmail.com', 'D.K.Enterprise');
    $mail->addAddress($email, $first);
    $mail->isHTML(true);
    $mail->Subject = 'Thank you for contacting us';
    $mail->Body = 'Dear' .$first . $last . ','.'<br>'.   
                'Thank you for contacting us. We appreciate your interest in our services/products and we are delighted to receive your inquiry. We have received your message and our team will be reviewing it shortly.'.'<br>'.
                
                'We aim to respond to all inquiries within 2 bussiness days, so please expect to hear back from us soon. If your inquiry is urgent, please feel free to call us on 9428570608 and we will be happy to assist you immediately.'.'<br>'.
                                
                'We take pride in providing excellent customer service and we are committed to answering all of your questions in a timely and satisfactory manner. We look forward to the opportunity to serve you and we thank you once again for considering our company.'.'<br><br>'.
                                
                'Best regards,<br>'.
                'D.K.Enterprise';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header("Location: ./Pages/ContactUs.html");
    }


    $cmail = new PHPMailer(true);
    $cmail->SMTPDebug = SMTP::DEBUG_SERVER; 
    $cmail->isSMTP();
    $cmail->SMTPAuth   = true;
    $cmail->Host = 'smtp.gmail.com';
    $cmail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $cmail->Port = 587;

    $cmail->Username   = 'aboutdkenterprise@gmail.com';                     
    $cmail->Password   = 'hxrylqrfvojyddcs';

    $cmail->setFrom('aboutdkenterprise@gmail.com', 'D.K.Enterprise');
    $cmail->addAddress('aboutdkenterprise@gmail.com', 'D.K.Enterprise');
    $cmail->isHTML(true);
    $cmail->Subject = 'You have a new response from website';
    $cmail->Body = 'We have a new response from website.<br>'
    .'Name:'.$first.$last.'<br>'.'Email:'.$email.'<br>'.'Number:'.$number.'<br>'.'Subject:'.$subject.'<br>'.'Message:'.$message;

    if(!$cmail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $cmail->ErrorInfo;
    } else {
        
    }
}
?>
