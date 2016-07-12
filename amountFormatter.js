var exchangeRate = 2;

// On page rendering, add a click event and onChange event to the amount field
// so we can update the value
$(function() {

	updateUI();

	$("#amount").click(function() {
		$(this).val("");
	});

	$("#amount").change(function() {
		updateUI();
	});
});

function updateUI() {
	var current = parseInput($("#amount"), "ISK");
	updateAmountField(current);
	updateSMLYGift(current);
}

function updateAmountField(current) {
	$("#amount").val(current["stringVal"]);
}

function updateSMLYGift(current) {
	donation = current["stringVal"];
	gift = (parseAmountString((current["amountVal"]*exchangeRate).toString(), "SMLY"))["stringVal"];
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
