
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});

var getDoubleDigit = function (n) {
	return n > 9 ? "" + n: "0" + n;
}

var getTime = function (str) {
	var time = parseInt(str);
	if (time == 0 || time == 24) return "12:00 AM";
	else {
		if (time <= 11 && time >= 1) {
			return getDoubleDigit(time) +":00 AM";
		} else if (time >= 12 && time <= 23) {
			if (time == 12) return "12:00 PM";
			else {
				var extra = time - 12;
				return getDoubleDigit(extra) + ":00 PM";
			}
		}
	}
}			

var placeholder = $('#passport_placeholder');
var passport_input = $('#passport_input');
var photo = null;
var uploadBtn = $('#selectBtn');


var username = $('#username_r');
var registrationForm = $('#registrationForm');
var loginForm = $('#loginForm');
var registerBtn = $('#registerBtn');
var duration = "6,15";
var startTime = "6";
var endTime	= "15";


$('#sTime').html(getTime(startTime));
$('#eTime').html(getTime(endTime));

$('#_startTime').val(startTime);
$('#_endTime').val(endTime);

$('#dateSlider').roundSlider({
	sliderType: "range",
    width: 18,
    radius: "50",
    value: "6,15",
    editableTooltip: false,
    max: "24",
    mouseScrollAction: true,
    circleShape: "pie",
    
    change: function (args) {
    	duration = args.value;
    	var sp = duration.split(",");
    	startTime = sp[0];
    	endTime = sp[1];
    	$('#sTime').html(getTime(startTime));
		$('#eTime').html(getTime(endTime));
		$('#_startTime').val(startTime);
		$('#_endTime').val(endTime);
    }
});

registerBtn.click(function () {
	
	registrationForm.validate({
		rules: {
			fullname_r:		{required: true, minlength: 2,},
			passport_input: {required: true,},
			email_r: 		{required: true, minlength: 5, email: true},
			username_r:		{required: true, minlength: 5},
			tel_r:			{required: true, minlength: 5},
			password_r:		{required: true, minlength: 8}, 
			repassword_r:	{required: true, minlength: 8, equalTo: "#password_r"},
			address_r:		{required: true, minlength: 10},
		},
		messages:{
			fullname_r		: "Please, enter your fullname",
			passport_input	: "Please, Select a passport photo",
			email_r			: "Please, enter a valid email",
			username_r		: "Please, enter a username",
			tel_r			: "Please, enter a mobile/tel number",
			password_r		: "Please, enter a password with 8 characters min.",
			repassword_r	: "Please, enter a matching password with 8 characters min.",
			address_r		: "Please, enter a valid address",
			endtime_r		: "Enter a date later than the starting time",
		}
	});	
	var isValid = registrationForm.valid();
	
	if (isValid) {
		//send data via ajax to the server
		/*
		$.post('/http://[::1]/mypersonalchef.com.ng/index.php/user/createChef', {
			fullname	: $('#fullname_r').val(),
			username	: $('#username_r').val(),
			email		: $('#email_r').val(),
			tel			: $('#tel_r').val(),
			password	: $('#password_r').val(),
			startTime	: $('#_startTime').val(),
			endTime		: $('#_endTime').val(),
			address		: $('#address_r').val(),
			
		});
		*/
		console.log(photo);
	}	
});


username.focusout(function() {
	$('#chefurl').html(username.val());
});

uploadBtn.click(function () {
	passport_input.trigger('click');
});

passport_input.change(function () {
	//get the chosen file
	file = $(this);
	file = file[0];
	
	if (file.files && file.files[0]) {
		//file uploaded
		var reader = new FileReader();
		reader.readAsDataURL(file.files[0]);
		
		reader.onload = function (evt) {
			photo = evt.target.files;
			placeholder.attr('src', evt.target.result);
		}
	}
});


