<?php

require __DIR__.'/../lib/mail.php';

$mail = new PHPmailer();
$mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP 
$mail->Host = 'smtp.gmail.com'; // Spécifier le serveur SMTP
$mail->SMTPAuth = true; // Activer authentication SMTP
$mail->Username = 'domisep.no.reply@gmail.com'; // Votre adresse email d'envoi
$mail->Password = 'Jala123?'; // Le mot de passe de cette adresse email
$mail->SMTPSecure = 'ssl'; // Accepter SSL
$mail->Port = 465;

$mail->setFrom('from@example.com', 'Mailer'); // Personnaliser l'envoyeur
$mail->addAddress('leoantoineberton@gmail.com', 'Leo'); // Ajouter le destinataire

$mail->Subject = 'Here is the subject';
$mail->Body = 'This is the HTML message body';

if(!$mail->send()) {
    echo 'Erreur, message non envoyé.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
    echo 'Le message a bien été envoyé !';
 }
?>