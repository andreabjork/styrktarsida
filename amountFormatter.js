var giftRatio = 2;

// On page rendering, add a click event and onChange event to the amount field
// so we can update the value
$(function() {

	// Update the page on pageload...
	update();

	// ... as well as on every page change.
	$("#amount").change(function() {
		update();
	});

	// Empty number field on click to write new amount.
	$("#amount").click(function() {
		$(this).val("");
	});
/*
	$("#fundBtn").click(function() {
		console.log("clicked this button");
		$.ajax({
			type: 'POST',
			// make sure you respect the same origin policy with this url:
			// http://en.wikipedia.org/wiki/Same_origin_policy
			url: 'http://educationinasuitcase.com/sendEmail.php',
			data: { 
			'smly_addr': 'wannasee', 
			'remote_addr': 'ifthis',
			'order_datetime': 'works',
			'total_amount': 'first'
			},
			success: function(msg){
				console.log("Managed to post the data to sendEmail.php, now submitting...");
				$("#dalpayForm").submit();    
			}
		});
	});*/


});

// Grabs the data from the form fields, updates the UI accordingly
// and sets the price of the Dalpay form as the number from the number field.
function update() {
	var current = getCurrentData();
	updateUI(current);
	updateDalpayBtn(current);
}

// Gets data from the number field and parses it.
// Return value is of the form {"amountVal": 1000, "stringVal": "1.000 ISK"}
function getCurrentData() {
	return parseInput($("#amount"), "ISK");
}

// Updates the input item1_price with the price of the donation
function updateDalpayBtn(current) {
	$('input[name="item1_price"]').val(current["amountVal"]);
}

// Update both amount field and the span containing the SMLY gift amount
function updateUI(current) {
	updateAmountField(current);
	updateSMLYGift(current);
}

//  Amount field should always hold the stringValue of the current amount.
//  If an invalid amount was entered, this is simply 0 ISK
function updateAmountField(current) {
	$("#amount").val(current["stringVal"]);
}

// Smly gift is currently two times that of the amount Value.
function updateSMLYGift(current) {
	donation = current["stringVal"];
	gift = (parseAmountString((current["amountVal"]*giftRatio).toString(), "SMLY"))["stringVal"];
	$("#fundAmount").html(donation);
	$("#smlyAmount").html(gift);
}

// Parses input of the form 
// 10000
// 10.000,-
// 10.000
// 10000 ISK
// 10.000 ISK
// ... etc
function parseInput(amountField, ticker) {
	return parseAmountString($(amountField).val(), ticker);
}

// Grab input as above and create an object like
// {"amountVal": 1000, "stringVal": "1.000 ISK"}
function parseAmountString(amountStr, ticker) {
	var input = amountStr;
	var amount = (input.split(",")[0]).replaceAll(".", "").replaceAll(" ", "").replaceAll("-").replaceAll("ISK", "");
	amount = parseInt(amount);
	// Return var:
	var current = {"stringVal": null, "amountVal": null}
	if(!isNaN(amount)) {
		// Update current and update the input field
		current["amountVal"] = amount;
		current["stringVal"] = addCommas(current["amountVal"])+" "+ticker;
	} else {
		current["amountVal"] = 0;
		current["stringVal"] = "0 "+ticker;
	}

	return current;
}


// A function to replace all occurrences of str1 with str2
String.prototype.replaceAll = function(str1, str2, ignore) {
    return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
} 

// Function to add commas so we can make a nice string with the amount
function addCommas(nStr) {
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + '.' + '$2');
	}
	return x1 + x2;
}
