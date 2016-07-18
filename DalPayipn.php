<!-- success -->
<button onclick="window.location.href='http://educationinasuitcase.com/donation'">Til baka á <italic>Education in a Suitcase</italic></button>

<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("andreabjork43@gmail.com","EIAS Donation",$msg);
?> 
