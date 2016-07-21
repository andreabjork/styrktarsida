<!-- success -->

<style type="text/css">
#eiasBox {
  background-color: #EEEEEE;
  /*! padding-bottom: 10px; */
}

h1 {
  font-size: 2em;
  font-weight: normal;
  margin: 0px 0 0 0;
  padding: 20px 10px 15px 10px;
  color: #222;
  background: #eee;
  border-bottom: 1px solid #ddd;
}

h2 {
  font-size: 1.5em;
  font-weight: normal;
  margin: 50px 0 0 0;
  padding: 20px 10px 15px 10px;
  color: #222;
  background: #eee;
  border-bottom: none; 
}

.flexContainer {
  display: flex;
  flex-flow: row-reverse wrap;
  justify-content: space-between;
  align-content: center;
}

.flexContainer .biggerFlex {
  display: block;
  width: 60%;
  height: 200px;
  border-left: 1px solid #ddd;
}


.flexContainer .biggerFlex form {
  height: 100%;
}

.flexContainer .biggerFlex ul {
  list-style: none;
}

.flexLi {
  display: flex;
  justify-content: space-around;
  flex-flow: row;
}

.flexContainer .smallerFlex {
  display: block;
  width: 39%;
  height: 100%;
}

.flexContainer .smallerFlex p {
  margin: 20px 20px 53px !important;
}

.styledLabel {
  display: block;
  width: 100px;
  margin-left: auto;
  margin-right: auto;
  font-size: 1em;
}

.styledInput {
  display: block;
  margin-left: auto;
  margin-right: auto;
  font-size: 1.2em;
}

#goBackBtn {
  height: auto !important;
  line-height: 1.2 !important;
}

.flexUl {
  height: 100%;
  display: flex;
  flex-flow: column nowrap;
  justify-content: space-around;
}
</style>
<div id="eiasBox">
	<h2 style="text-align:center;">Takk fyrir að styrkja Education in a Suitcase!</h2>
	<h1 style="text-align:center;">Megum við senda þér broskall?</h1>
	<div class="flexContainer">
		<div class="biggerFlex">
			<form class="smallScreenFlex columnFlex" id="dalpayForm" action = "http://educationinasuitcase.com/sendEmail.php" method="POST">
			<input type="hidden" name="remote_addr" value=<?php if(isset($_POST['remote_addr'])) echo '"' . $_POST['remote_addr'] . '"' ?> 
			/>
			<input type="hidden" name="order_datetime" value=<?php if(isset($_POST['order_datetime'])) echo '"' . $_POST['order_datetime'] . '"' ?>
			/>
			<input type="hidden" name="total_amount" value=<?php if(isset($_POST['total_amount'])) echo '"' . $_POST['total_amount'] . '"'?>
			/>

			<ul class="flexUl">
				<li class="flexLi">
					<label class="styledLabel" for="amount">Broskallaveski</label>
						<input class="styledInput" type="text" name="smly_addr" id="address" placeholder="BGs1L33mgDz8mUAE5h3bgmuo7s9r5Et8ne" style="display:block; margin-left:auto; margin-right: auto; font-size: 1.2em;" required />
				</li>
				<li class="flexLi">
					<label class="styledLabel" for="amount">Netfang</label>
					<input class="styledInput" type="text" name="email_addr" id="email" placeholder="example@example.om" style="display:block; margin-left:auto; margin-right: auto; font-size: 1.2em;" required />
				</li>
				<li class="flexLi">
					<button style="display: block; margin-left: auto; margin-right: auto; margin-bottom: 10px; " type="submit" id="smlyBtn" value="Styrkja &#x00A; Education in a Suitcase" name="submit" alt="Buy Now from DalPay Retail - checkout is secure and private.">Já takk, sendið mér broskall!</button>
				</li>
			</ul>
			</form>
		</div>
		<div class="smallerFlex">
			<p id="smlyInfo">Áttu ekki broskallaveski?<a href="wallet.html"> Smelltu hér</a> til að sækja veski.</p>
			<button id="goBackBtn" style="display: block; margin-left: auto; margin-right: auto; margin-bottom: 10px;" onclick="window.location.href='http://educationinasuitcase.com/donation'">Fara aftur á <br> Education in a Suitcase</button>
		</div>
	</div>
	
</div>

