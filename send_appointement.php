<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientName = $_POST['client-name'];
    $clientEmail = $_POST['client-email'];
    $appointmentDate = $_POST['appointment-date'];
    $appointmentTime = $_POST['appointment-time'];
    
    $appointmentDateTime = "$appointmentDate $appointmentTime";

    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'jleablue2@gmail.com'; // SMTP username
        $mail->Password = 'sbjqvcathkcpmxha'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('jleablue2@gmail.com', 'James Ledoux');
        $mail->addAddress('jleablue2@gmail.com'); // Admin email address

        $mail->isHTML(true);
        $mail->Subject = 'Nouveau rendez-vous';
        $mail->Body = "Nom: $clientName<br>Email: $clientEmail<br>Date et Heure: $appointmentDateTime";

        $mail->send();
        echo 'Rendez-vous confirmé!';
    } catch (Exception $e) {
        echo "Échec de l'envoi du message. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
