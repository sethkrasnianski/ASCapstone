var sec = 0;
var seconds = undefined;
var minutes = 0;
var hours = 0;
var totalTime = 0;
var count = 0;

$(function() {

	var menu = false;
	getProductTotal();
	time();

	// Menu toggle
	$('.menu').click(function() {
		var left = $('header nav.bottom .left');
		var right = $('header nav.bottom .right');
		if(menu === false) {
			$('nav.bottom').slideDown();
			left.fadeIn(1050);
			right.fadeIn(1050);
			menu = true;
		} else {
			$('nav.bottom').slideUp();
			menu = false;
			left.hide();
			right.hide();
		}
	});

	// Success Fade out
	$('.fadeout').delay(4000).fadeOut();

	// Order price
	$('.order select').change(function() {
		$('.order #totalPrice').val('$' + $(this).val());
	});

	// Select Button
	$('.selectButton').click(function() {
		$(this).next('select').focus();
	});

	// Datepicker
	$('#orderDate').datepicker({ dateFormat: "yy-mm-dd" });
	$('#shipDate').datepicker({ dateFormat: "yy-mm-dd" });
	$('#actualDate').datepicker({ dateFormat: "yy-mm-dd" });

	$('#timer').click(function() {

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
					log(minutes);
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
	$('.order #totalPrice').val('$' + $('.order select').val());
}

function formError(txt) {
  $(".page .error").text(txt);
  // $(".page .error").fadeIn('slow');
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

function validatePhone(phone) {
  var re = /^\(?\d{3}\)?[- ]?\d{3}[- ]?\d{4}$/;
  return re.test(phone);
}

function log(data) {
	return console.log(data);
}
