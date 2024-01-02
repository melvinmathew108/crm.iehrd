<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/u572741574/domains/csmcentralschool.com/public_html/PHPMailer-master/src/Exception.php';
require '/home/u572741574/domains/csmcentralschool.com/public_html/PHPMailer-master/src/PHPMailer.php';
require '/home/u572741574/domains/csmcentralschool.com/public_html/PHPMailer-master/src/SMTP.php';
//require 'C:\xampp\phpMyAdmin\PHPMailer\PHPMailer-master\PHPMailer-master\src\Exception.php';
//require 'C:\xampp\phpMyAdmin\PHPMailer\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
//require 'C:\xampp\phpMyAdmin\PHPMailer\PHPMailer-master\PHPMailer-master\src\SMTP.php';

//$mail = new PHPMailer();
//$mail->isSMTP();
//$mail->Host = gethostname();
//$mail->SMTPAuth = true;
// echo "Enter Success";

 //echo $_SERVER['DOCUMENT_ROOT'];

	$sender_name = $_POST["sender_name"]; //sender name 
	$reply_to_email = $_POST["sender_email"]; //sender email, it will be used in "reply-to" header 
	$subject	 = $_POST["subject"]; //subject for the email 
	$message	 = $_POST["message"]; //body of the email 
	$phone	 = $_POST["sender_phone"]; //body of the email 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "webhorizontech@gmail.com";
$mail->Password   = "9539093879";

$mail->IsHTML(false);
//$mail->AddAddress("garbybaby@gmail.com", $sender_name);
$mail->AddAddress("garbybaby@gmail.com", $sender_name);
//$mail->AddAddress($sender_name, "garby-name");
$mail->SetFrom("Web@gmail.com", $sender_name);
//$mail->AddReplyTo("babygarby@gmail.com", "reply-to-name");
$mail->AddReplyTo($reply_to_email, $sender_name);
$mail->AddCC("hellowprince@gmail.com", "Mail From Website");
//$mail->AddCC("garbybaby@gmail.com", "Mail From Website");
//$mail->AddCC("jinoxavi@gmail.com", "Garby");
//$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
$mail->Subject = $_POST["subject"];
//$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
$content = "This Message is from  - ".$phone."- and message is :-".$message;

//$mail->addAttachment('C:\Users\Dell\Downloads\6c8412b034e824e554ee63e8b8e0c361.jpg');
foreach ($_FILES["my_files"]["name"] as $k => $v) {
    $mail->AddAttachment( $_FILES["my_files"]["tmp_name"][$k], $_FILES["my_files"]["name"][$k] );
}



$mail->MsgHTML($content);
  header("Location: contact.php");
// if(!$mail->Send()) {
// 	 //var_dump($mail);
//   echo "<p class='failed'>Error while sending Email.</p>";
//   header("Location: contact.php");
// 	exit();
 
// } else {
// 	 //var_dump($mail);
// 	// echo "<p class='success'>Mail Sent Successfully.</p>";
// 	header("Location: contact.php");
// 	exit();
	
// }
?>