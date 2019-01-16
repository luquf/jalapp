<?php

require __DIR__.'/../vendor/autoload.php';

function sendPassword($email, $nom, $prenom, $password) {
    $mail = new PHPMailer\PHPMailer\PHPMailer;                             
    $mail->isSMTP();   
    $mail->CharSet = 'UTF-8';                                   
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                               
    $mail->Username = 'domisep.no.reply@gmail.com';       
    $mail->Password = 'Jala123?';                          
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    
    $mail->setFrom('domisep.no.reply@gmail.com', 'Domisep');
    $mail->addAddress($email, $prenom." ".$nom);     
    $mail->Subject = 'Bienvenue chez Domisep';
    $mail->Body    = 'Bonjour '.$prenom.', bienvenue chez Domisep. Voici votre mot de passe: '.$password;
    $mail->send();   
}

function sendForgottenPassword($email, $nom, $prenom, $password) {
    $mail = new PHPMailer\PHPMailer\PHPMailer;                             
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';                                      
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                               
    $mail->Username = 'domisep.no.reply@gmail.com';       
    $mail->Password = 'Jala123?';                          
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    
    $mail->setFrom('domisep.no.reply@gmail.com', 'Domisep');
    $mail->addAddress($email, $prenom." ".$nom);     
    $mail->Subject = 'Réinitialisation de votre mot de passe Domisep';
    $mail->Body    = 'Bonjour '.$prenom.', vous avez demandé la réinitialisation de votre mot de passe Domisep. Voici votre nouveau mot de passe: '.$password;
    $mail->send();   
}

function sendContactFormMail($email, $nom, $prenom, $msg) {
    $mail = new PHPMailer\PHPMailer\PHPMailer;                             
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';                                      
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                               
    $mail->Username = 'domisep.no.reply@gmail.com';       
    $mail->Password = 'Jala123?';                          
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    
    $mail->setFrom('domisep.no.reply@gmail.com', 'Domisep');
    $mail->addAddress('domisep.no.reply@gmail.com', 'Domisep');     
    $mail->Subject = 'Nouveau message site Domisep';
    $mail->Body    = 'Email: '.$email.'Nom: '.$nom.'Prénom: '.$prenom.'Message: '.$msg.'';
    $mail->send();   
}

