<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->UserName = 'apinassirou@gmail.com';
    $mail->Password = 'vesqrpvtuflrtmsn';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 465;

    $mail->setFrom('apinassirou@gmail.com', 'Institut AZONNANGBO');
    $mail->addAddress('assogbaangemarie@gmail.com', 'AZONNANKPO');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = '<h3>Nom :' . $name . '</h3>' .
                     '<h3>Email :' . $email . '</h3>'. 
                     '<p> :' . nl2br($message) . '</p>';  
    
    $mail->send();
    echo 'Votre message a été envoyé avec succès';
} catch (Exception $e) {
    echo "Le message n\'a pas été envoyé. Erreur de Mailer : {$mail->ErrorInfo}";
}



?>