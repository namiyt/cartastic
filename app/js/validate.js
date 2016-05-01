function checkRegistration() {
	console.log('hi');
	var name = document.OrderForm.name;
	var phone = document.OrderForm.phone;
	var email = document.OrderForm.email;
	var shipto = document.OrderForm.shipto;
	var billto = document.OrderForm.billto;
	var ccid = document.OrderForm.ccid;
	var shipMethod = document.OrderForm.shipmethod;
	var cardType = document.OrderForm.cardtype;

	if (name.value.length < 1) {
		alert("Please enter your name.");
		return false;
	}
	if (phone.value.length < 1) {
		alert("Please enter your phone number.");
		return false;
	}
	if (shipto.value.length < 1) {
		alert("Please enter your shipping address.");
		return false;
	}
	if (billto.value.length < 1) {
		alert("Please enter your billing address.");
		return false;
	}
	if (ccid.value.length != 16) {
		alert("Please enter a valid credit card number.");
		return false;
	}

	console.log(name.value + "\n" + phone.value + "\n" + email.value);

	var body = "Hello " +  name.value 
		+ ",%0D%0A%0D%0AHere are your order details:%0D%0A%0D%0APhone number: " 
		+ phone.value + "%0D%0AEmail address: " + email.value
		+ "%0D%0AShipping address: " + shipto.value
		+ "%0D%0ABilling address: " + billto.value
		+ "%0D%0ACredit card type: " + cardType.value
		+ "%0D%0ACreditcard number: " + ccid.value
		+ "%0D%0AShipping method: " + shipMethod.value;

	window.location.href = "mailto:" + email.value + "?subject=Your Order&body=" + body;

	return false;
}