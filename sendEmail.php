<?php
$msg = "";
// Handle smly_addr and email_addr separately because
// user might in some out-dated browsers get past the required fields.
if(isset($_POST['smly_addr'])) {
	$msg = $msg . "wallet:" . $_POST['smly_addr'] . "\n";
} else {
	$msg = $msg . "wallet:COULD_NOT_FETCH" . "\n";
}

if(isset($_POST['email_addr'])) {
	$msg = $msg . "email:" . $_POST['email_addr'] . "\n";
} else {
	$msg = $msg . "email:COULD_NOT_FETCH" . "\n";
}

if(isset($_POST['remote_addr'])) {
	$msg = $msg . "ip:" . $_POST['remote_addr'] . "\n"; 
} else {
	$msg = $msg . "ip:COULD_NOT_FETCH" . "\n";
}

if(isset($_POST['order_datetime'])) {
	$msg = $msg . "date:" . $_POST['order_datetime'] . "\n"; 
} else {
	$msg = $msg . "date:COULD_NOT_FETCH" . "\n";
}

if(isset($_POST['total_amount'])) {
	$msg = $msg . "amount:" . $_POST['total_amount'] . "\n";
} else {
	$msg = $msg . "amount:COULD_NOT_FETCH" . "\n";
}

$msg = wordwrap($msg,70);

// send email
mail("educationinasuitcase@gmail.com","EIAS SMLY REQUEST",$msg);
header( 'Location: http://educationinasuitcase.com/donation/thankyou.html' ) ;
?> 

