<?php


require __DIR__.'/../vendor/autoload.php';

function sendPassword($password, $email, $name, $last_name) {
    $mail = new PHPMailer\PHPMailer\PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "domisep.no.reply@gmail.com";
    $mail->Password = "Jala123?";
    $mail->setFrom('domisep.no.reply@gmail.com', 'Domisep Customer Service');
    $mail->addAddress($email, $name.' '.$last_name);
    $mail->Subject = 'Inscription Domisep';
    $mail->Body = 'Bonjour '.$last_name.', bienvenue chez Domisep, votre mot de passe est le suivant: '.$password;
    $mail->send();

} 
function save_mail($mail) {
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}