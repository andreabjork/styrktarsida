<?php
$msg = "";
// Handle smly_addr and email_addr separately because
// user might in some out-dated browsers get past the required fields.
if(isset($_POST['smly_addr'])) {
	$msg = $msg . "wallet:" . $_POST['smly_addr'] . "\n";
} else {
	$msg = $msg . "wallet:none" . "\n";
}

if(isset($_POST['smly_addr']) && isset($_POST['remote_addr']) && isset($_POST['order_datetime']) && isset($_POST['total_amount'])) {
	$msg = $msg . "ip:" . $_POST['remote_addr'] . "\n" 
				. "date:" . $_POST['order_datetime'] . "\n" 
				. "amount:" . $_POST['total_amount'] . "\n";

	// Nest this so we can completely override the mail if we don't get the necessary params:
	if(isset($_POST['email_addr'])) {
		$msg = $msg . "email:" . $_POST['email_addr'];
	} else {
		$msg = $msg . "email:none@none.com";
	}
} else {
	$msg = "ERROR: Something went wrong when getting one or more of the parameters: smly_addr, remote_Addr, order_datetime, total_amount";
}



$msg = wordwrap($msg,70);

// send email
mail("educationinasuitcase@gmail.com","EIAS SMLY REQUEST",$msg);
header( 'Location: http://educationinasuitcase.com/donation/thankyou.html' ) ;
?> 