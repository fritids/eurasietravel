<?php

$email_text = array();
foreach($_POST as $key => $value){
	if($value != ""){
		$email_text[str_replace("_", " ",$key)] = stripcslashes($value);		
	}
}

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

include('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();
$mail->IsMail();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.eurasietravel.com.kh"; // SMTP server
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "eurasietravel@gmail.com";  // GMAIL username
$mail->Password   = "euQ1p2m3g4";            // GMAIL password

$mail->SetFrom($email_text['emailFrom'], $email_text['fullName']);

$mail->AddAddress("booking@eurasietravel.com.kh", "Eurasie Travel - Hotel Booking");

$mail->Subject = "Hotel Booking From " . $email_text['title'] . $email_text['fullName'];
$mail->Body = "<strong>Personal Information:</strong>";
$mail->Body .= "<font color='#666'><br />Name: " . $email_text['title'] . $email_text['fullName'];
$mail->Body .= "<br />Phone: " . $email_text['contactNumber'];
$mail->Body .= "<br />Email: " . $email_text['emailFrom'];
$mail->Body .= "<br />Address: " . $email_text['address'];
$mail->Body .= "</font><br /><br /><strong>Hotel Information:</strong> ";
$mail->Body .= "<font color='#666'><br />Hotel Name: " . $email_text['hotelName'] . ' in <small>' . $email_text['hotelArea'] . '</small>';
$mail->Body .= "<br />Arrive Date: " . $email_text['arriveDate'];
$mail->Body .= "<br />Departure Date: " . $email_text['departureDate'];
$mail->Body .= "<br />Number of Night: " . $email_text['numNight'];
$mail->Body .= "<br />Number of Rooms: " . $email_text['numRoom'];
$mail->Body .= "<br />Number of Peopel: " . $email_text['numPeople'];
$mail->Body .= "<br />Room Type: " . $email_text['roomType'];

$mail->Body .= "<br /><br />Customer's comment: </font><br />" . str_replace( "\n", "<br />", $email_text['comments']);
$mail->IsHTML(true);
if(!$mail->Send())
{
	echo "Error sending: " . $mail->ErrorInfo;
}
else
{
	echo "<h4 align='center'><font color='green'>Thank you for your booking this hotel</font></h4><div align='center'>We'll try to get back to you shortly</div>";
}
?>