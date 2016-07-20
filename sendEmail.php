<?php
$msg = "";
if(isset($_POST['smly_addr']) && isset($_POST['remote_addr']) && isset($_POST['order_datetime']) && isset($_POST['total_amount'])) {
	$msg = $msg . "wallet:" . $_POST['smly_addr'] . "\n"
				. "ip:" . $_POST['remote_addr'] . "\n" 
				. "date:" . $_POST['order_datetime'] . "\n" 
				. "amount:" . $_POST['total_amount'];
} else {
	$msg = $msg . "Something went wrong when getting one or more of the parameters: smly_addr, remote_Addr, order_datetime, total_amount";
}

$msg = wordwrap($msg,70);

// send email
mail("educationinasuitcase@gmail.com","EIAS SMLY REQUEST",$msg);
header( 'Location: http://educationinasuitcase.com/donation/thankyou.html' ) ;
?> 