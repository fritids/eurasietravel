<?php

	$email_text = array();
	foreach($_POST as $key => $value){
		if($value != ""){
			$email_text[str_replace("_", " ",$key)] = stripcslashes($value);					
		}
	}
	$name = trim(strip_tags($email_text['fullName']));
	$email = strip_tags($email_text['emailFrom']);
	
	$message = '<html><body>';
	$message .= '<table border="0" style="width:720px;" cellpadding="1" cellspacing="1">';
	$message .= "<tr><td><strong>Traveler Information:</strong>";
	$message .= "<font color='#666'><br />Name: " . $email_text['title'] . $email_text['fullName'];
	$message .= "<br />Phone: " . $email_text['contactNumber'];
	$message .= "<br />Email: " . $email_text['emailFrom'];
	$message .= "<br />Address: " . $email_text['address'];
	$message .= "</td>";
	
	$message .= '<td style="width:280px;"></td>';
	
	$message .= "<td></font><strong>Travel Information:</strong> ";
	$message .= "<font color='#666'><br />Package Tours Titles: " . $email_text['tourname'];
	$message .= "<br />Tours Type: " . $email_text['tourtype'];
	
	if ($email_text['tourcountry'] != 'Group Tours') {
		$message .= "<br />Arrive Date: " . $email_text['arriveDate'];
		$message .= "<br />Departure Date: " . $email_text['departureDate'];
	} else {
		$message .= "<br />Date: " . $email_text['list_date'];
	}
	
	$message .= '<br />Number of Pax: ' . $email_text['numPax']. '</font></td></tr>';
		
	$message .= "<tr><td><br /><br /><font color='#666'>Traveler's require: </font><br /><br />" . str_replace( "\n", "<br />", $email_text['comments']). '</td></tr>';
	$message .= "</table>";
	$message .= '</body></html>';
	
	$to = 'booking@eurasietravel.com.kh';
	
	if ($email_text['tourcountry'] != 'Group Tours') {
		$subject = "Country Tour Booking From " . $email_text['title'] . $email_text['fullName'];
	} else{
		$subject = "Group Tours Booking From " . $email_text['title'] . $email_text['fullName'];
	}
	
	$headers = "From: ". $name . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
	//$headers .= "Return-Path:". $email  ."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	
	
	if(mail($to, $subject, $message, $headers))
	{
		echo "<h4 align='center'><font color='green'>Thank you for your booking this tour package</font></h4><div align='center'>We'll try to get back to you shortly</div>";
	}else{
		echo "Couldn\'t send email. Please try emailing me from your own account. Thank you.";
	}
	
?>