<?php

require __DIR__.'/../vendor/autoload.php';

$smtp = '';
$addr = '';
$pass = '';    

function sendPassword($email, $nom, $prenom, $password) {
    global $smtp, $addr, $pass;
    $mail = new PHPMailer\PHPMailer\PHPMailer;                             
    $mail->isSMTP();   
    $mail->CharSet = 'UTF-8';                                   
    $mail->Host = $smtp;
    $mail->SMTPAuth = true;                               
    $mail->Username = $addr;
    $mail->Password = $pass;
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    
    $mail->setFrom('domisep.no.reply@gmail.com', 'Domisep');
    $mail->addAddress($email, $prenom." ".$nom);     
    $mail->Subject = 'Bienvenue chez Domisep';
    $mail->Body    = 'Bonjour '.$prenom.', bienvenue chez Domisep. Voici votre mot de passe: '.$password;
    $mail->send();   
}

function sendForgottenPassword($email, $nom, $prenom, $password) {
    global $smtp, $addr, $pass;
    $mail = new PHPMailer\PHPMailer\PHPMailer;                             
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';                                      
    $mail->Host = $smtp;
    $mail->SMTPAuth = true;                               
    $mail->Username = $addr;
    $mail->Password = $pass;
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    
    $mail->setFrom('domisep.no.reply@gmail.com', 'Domisep');
    $mail->addAddress($email, $prenom." ".$nom);     
    $mail->Subject = 'Réinitialisation de votre mot de passe Domisep';
    $mail->Body    = 'Bonjour '.$prenom.', vous avez demandé la réinitialisation de votre mot de passe Domisep. Voici votre nouveau mot de passe: '.$password;
    $mail->send();   
}

function sendContactFormMail($email, $nom, $prenom, $msg) {
    global $smtp, $addr, $pass;
    $mail = new PHPMailer\PHPMailer\PHPMailer;                             
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';                                      
    $mail->Host = $smtp;
    $mail->SMTPAuth = true;                               
    $mail->Username = $addr;
    $mail->Password = $pass;
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    
    $mail->setFrom('domisep.no.reply@gmail.com', 'Domisep');
    $mail->addAddress('domisep.no.reply@gmail.com', 'Domisep');     
    $mail->Subject = 'Nouveau message site Domisep';
    $mail->Body    = 'Email: '.$email.' Nom: '.$nom.' Prénom: '.$prenom.' Message: '.$msg.'';
    $mail->send();   
}

