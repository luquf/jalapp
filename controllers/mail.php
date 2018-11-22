<?php

$mail = new EMail;

//Enter your SMTP server (defaults to "127.0.0.1"):
$mail->Server = "smtp.gmail.com";    

//Enter your FULL email address:
$mail->Username = 'domisep.no.reply@gmail.com';    

//Enter the password for your email address:
$mail->Password = 'Jala123?';
    
//Enter the email address you wish to send FROM (Name is an optional friendly name):
$mail->SetFrom("domisep.no.reply@gmail.com","Your name");  

//Enter the email address you wish to send TO (Name is an optional friendly name):
$mail->AddTo("leoantoineberton@gmail.com","Recipient's Name");

//You can add multiple recipients:
//$mail->AddTo("someother2@address.com");

//Enter the Subject of your message:
$mail->Subject = "Some subject or other";

//Enter the content of your email message:
$mail->Message = "Some html message";

//Optional extras
$mail->ContentType = "text/html";    // Defaults to "text/plain; charset=iso-8859-1"
//$mail->Headers['X-SomeHeader'] = 'abcde';    // Set some extra headers if required

echo $success = $mail->Send(); //Send the email.

?>