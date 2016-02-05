<?php
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//$to  	  = 'Nestle Tollhouse <info@nestlecafe.com>';
$to  	  = 'Nestle Tollhouse <tarun@colossal.net>';

$senderName		= $_POST['name'];
$senderEmail	= $_POST['email'];
$subject	    = $_POST['subject'];
$store			= $_POST['store'];
$senderMsg		= nl2br($_POST['comments']);

$sitename		= "Nestle Tollhouse Cafe by Chip";
$date 			= date("m/d/Y H:i:s");
$ToSubject 		= "Contact Us From $senderName via $sitename";
$EmailBody 		= "A visitor to the Nestle Tollhouse Cafe by Chip contact form has left the following information:<br /><br />
              	<b>Sender Name:</b> $senderName
			 	<br /><br />
			 	<b>Sender Email:</b> $senderEmail
			 	<br /><br />
				<b>Regarding:</b> $subject
				<br /><br />
				<b>Store Number:</b> $store
				<br /><br />
				<b>Message Sent:</b>
			  	<br />$senderMsg<br /><br />
			  	<i>this message was sent as an automated online submission</i><br /><br />";
$Message 		= $EmailBody.$EmailFooter;
mail($to, $ToSubject, $Message, $headers . "From:$senderName <".$senderEmail.">");

header('Location: /thankyou');

?>