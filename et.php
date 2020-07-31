
<?php


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <dimphojputu@gmail.com>' . "\r\n";

$to_email = "tidilotsotlhe@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi,nn This is test email send by PHP Script";



mail($to_email, $subject, $body, 'From: Matcha <matcha@gmail.com>');
//$headers = "From: sender\'s email";


