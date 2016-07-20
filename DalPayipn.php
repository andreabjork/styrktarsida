<!-- success -->
<div>
	<h2 style="text-align:center;">Megum við senda þér broskall?</h2>
	<form class="smallScreenFlex columnFlex" id="dalpayForm" action = "http://educationinasuitcase.com/sendEmail.php" method="POST">
		<input type="hidden" name="remote_addr" value=<?php if(isset($_POST['remote_addr'])) echo '"' . $_POST['remote_addr'] . '"' ?> 
		/>
		<input type="hidden" name="order_datetime" value=<?php if(isset($_POST['order_datetime'])) echo '"' . $_POST['order_datetime'] . '"' ?>
		/>
		<input type="hidden" name="total_amount" value=<?php if(isset($_POST['total_amount'])) echo '"' . $_POST['total_amount'] . '"'?>
		/>
		<span style="margin-bottom: 10px; width: 200px;">
		<label style="display:block; width: 100px; margin-left:auto; margin-right: auto; font-size: 1em;" for="amount">Broskallaveski</label>
		<input type="text" name="smly_addr" id="address" placeholder="BGs1L33mgDz8mUAE5h3bgmuo7s9r5Et8ne" style="display:block; margin-left:auto; margin-right: auto; font-size: 1.2em;" required />
		</span>
		<label style="display:block; width: 100px; margin-left:auto; margin-right: auto; font-size: 1em;" for="amount">Netfang</label>
		<input type="text" name="email_addr" id="email" placeholder="example@example.om" style="display:block; margin-left:auto; margin-right: auto; font-size: 1.2em;" required />
		</span>
		</br>
		<button style="display: block; margin-left: auto; margin-right: auto; margin-bottom: 10px; " type="submit" id="smlyBtn" value="Styrkja &#x00A; Education in a Suitcase" name="submit" alt="Buy Now from DalPay Retail - checkout is secure and private.">Já takk, sendið mér broskall!</button>
	</form>
	<button style="display: block; margin-left: auto; margin-right: auto; margin-bottom: 10px;" onclick="window.location.href='http://educationinasuitcase.com/donation'">Fara aftur á Education in a Suitcase</button>
</div>

