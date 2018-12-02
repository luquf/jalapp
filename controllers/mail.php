<?php

require __DIR__.'/../vendor/autoload.php';

function sendPassword($email, $nom, $prenom, $password) {
    $mail = new PHPMailer\PHPMailer\PHPMailer;                             
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                               
    $mail->Username = 'domisep.no.reply@gmail.com';       
    $mail->Password = 'Jala123?';                          
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    
    $mail->setFrom('domisep.no.reply@gmail.com', 'Domisep');
    $mail->addAddress($email, $premom." ".$nom);     
    $mail->Subject = 'Bienvenue chez Domisep';
    $mail->Body    = 'Bonjour '.$prenom.', bienvenue chez Domisep. Voici votre mot de passe: '.$password;
    $mail->send();   
}