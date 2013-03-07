var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){dd='0'+dd} 
if(mm<10){mm='0'+mm} 

var today = yyyy + '-' + dd + '-' + mm;

$(function() {
	setTimeout(function() {
		calcQuantity();
	});
	productPrice = getPrice();
	$('#PricePaid').val(productPrice);
	$('#unitPrice').text(getPrice());
	getProductTotal();
	time();

	// Select Button
	$('.selectButton').click(function() {
		$(this).next('select').focus();
	});

	// Datepicker
	$('#orderDate').val(today);
	$('#orderDate').datepicker({ dateFormat: "yy-mm-dd" });
	$('#shipDate').datepicker({ dateFormat: "yy-mm-dd" });
	$('#actualDate').datepicker({ dateFormat: "yy-mm-dd" });

	// Order price
	$('.order select').change(function() {
		productPrice = getPrice();
		$('#unitPrice').text(getPrice());
		if(quantity !== 0 || quantity === "") {
			calcQuantity();
		} else {
			$('.order #totalPrice').val('$' + productPrice);
			$('#PricePaid').val(productPrice);
		}
	});

	$('.play').click(function() {
		var elem = $('#timer'); 
		if($(this).hasClass('start') === true) {
			$(this).removeClass('start');
			$(this).addClass('pause');
			$(this).text('u');

			myCounter = setInterval(function() { 
				// first time
				sec += 1;
				// double digit seconds
				if (sec < 10) {
					seconds = "0" + sec;
				} else {
					seconds = sec;
				}
				// minute
				if (sec > 59) {
					setTimeout(function() {
						sec = 0 - 1;
						minutes += 1;
					}, 0);
				}
				// hours 
				if (minutes > 59) {
					hours += 1;
					minutes = 0;
					sec = 0;
				}
				// start time
				if (count === 0) {
					$('#startTime').val(time());
				}

				count ++;

			totalTime = hours + ':' + minutes + ':' + seconds;
			elem.val(totalTime); 
			}, 1000);
		} else {
			$(this).addClass('start');
			$(this).removeClass('pause');
			$(this).text('P');
			if (count > 0) {
				$('#stopTime').val(time());
			}
			clearInterval(myCounter); 
		}
	});

	$('#quantity').keyup(function() {
		calcQuantity();
	});

});

function time() {
	var now = new Date();
	var hours = now.getHours();
	if (hours > 12) {
		hours -= 12;
	} else if (hours === 0) {
		hours = 12;
	}
	var minutes = now.getMinutes();
	if (minutes < 10) {
		minutes = "0" + minutes;
	}
	return hours + ':' + minutes;
}

function getProductTotal() {
	$('.order #totalPrice').val('$' + getPrice());
}

function getPrice() {
	var product = $('.order select').val();
	var price = product.substr(product.indexOf(',') + 1, product.length);
	return price;
}

function calcQuantity() {
	var total = $('#quantity').val() * getPrice();
	$('.order #totalPrice').val('$' + total);
}