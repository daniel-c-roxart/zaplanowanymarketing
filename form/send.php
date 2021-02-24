<?php

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//  $recaptcha_url      = 'https://www.google.com/recaptcha/api/siteverify';
//  $recaptcha_secret   = '6Lf2h6oUAAAAALsVJebVeQ3f2g41SVR7YpSAE4-4';
//  $recaptcha_response = $_POST['recaptcha_response'];

//  $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
//  $recaptcha = json_decode($recaptcha);

//  if ($recaptcha->score >= 0.5) {

 header("refresh:0;url=https://zaplanowanymarketing.pl");

 $mail = new PHPMailer();

 $mail->isSMTP();
 $mail->Host       = 'mycomp.home.pl';
 $mail->SMTPAuth   = true;
 $mail->Username   = 'koderzy@roxart.pl';
 $mail->Password   = 'Z0eha#qruJ&y';
 $mail->SMTPSecure = 'tls';
 $mail->Port       = 587;
 $mail->CharSet    = 'UTF-8';

 $mail->setFrom('koderzy@roxart.pl', 'SMTP - Roxart Agency');
 $mail->addAddress('dominik.s@roxart.pl', 'Lead - Roxart Agency');

 $mail->Subject = 'Lead - ' . $_POST['stanowisko'] . ' - zaplanowanymarketing.pl';

 $mail->isHTML(true);

 $mail->Body .= "<b>Imie:</b> " . $_POST['imie'] . "<br/>";
 $mail->Body .= "<b>Adres e-mail:</b> " . $_POST['email'] . "<br/>";
 $mail->Body .= "<b>Telefon:</b> " . $_POST['tel'] . "<br/>";

 if ($mail->send()) {
  exit('Wiadomość wysłana!');
 } else {
  exit('Mailer Error: ' . $mail->ErrorInfo);
 }

//  } else {
 //   exit('Recaptcha error!');
 //  }

}
