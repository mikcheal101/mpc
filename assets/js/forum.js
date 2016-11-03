var fbBtn 		= document.getElementById ('fbBtn');
var sendBtn 	= document.getElementById ("sendBtn");
var chatDiv		= document.getElementById ('chat-messages');
var chatMsg 	= document.getElementById ('chatMsg');
var holder		= document.getElementById ('placeholder');
var images 		= document.getElementById ('images');
var chatDiv		= document.getElementById ('chatDiv');

var mostComm 	= $('#mostCommented');
var postCount	= $('#postsCount');
var following	= $('#followingCount');
var followers	= $('#followersCount');

var months_ = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

var message		= {};
var thumbnails	= [];
var connected = false;
var user	= {};

$(document).ready(function (){
	console.log ('document ready!');
	$.ajaxSetup({cache: true});
	$.getScript('assets/js/fb.js', function () {
		FB.init({
	      	appId      	: '738245036277604',
			version    	: 'v2.7'
    	});

    	FB.getLoginStatus(function (response) {
			statusChecCallback(response);
		});
	});
});

function hide (param) {
	param.style.visibility = 'hidden';
	param.style.width = '0px';
	param.style.height = '0px';
	param.style.padding = '0px';
	param.style.margin = '0px';
}

function show (param) {
	param.style.visibility = 'visible';
}

function scroll (param) {
	//param.scrollTop = param.scrollHeight;

}

function statusChecCallback (response) {
	if (response.status === "connected") {
		// allow message to go through when clicked
		connected = true;
		testApi();
	} else {
		connected = false;
	}
}

function testApi () {
	FB.api('/me?fields=email,name,birthday,picture,timezone,updated_time,friendlists', function (response) {
		// send user data to db
		this.user = response;
		var postData = {email:response.email, id:response.id, photo:response.picture.data.url, name:response.name, action:3};
		$.post("forum/action", postData, function (res) {
		});
	});
}

function authenticateFacebook () {

	FB.getLoginStatus(function (response) {
		if (response.status !== "connected") {
			FB.login(statusChecCallback, {scope: 'public_profile, email'});
		}
	});
}

function deauthorizeFacebook () {
	FB.logout(function (resonse) {
		console.log(response);
	});
}

function checkLoginStatus () {
	FB.getLoginStatus(function (response) {
		statusChecCallback(response);
	});
}

function displayMessage () {
	console.log(this.message.ts);
	var r;
	r = '<div class="panel">';
		r+= '<div class="panel-heading">';
			r+= '<div class="row">';
				r+= '<div class="col-sm-12 padding-00">';
					r+= '<table style="width: 100%; border-bottom: 1px solid #f3f3f3;">';
						r+= '<tr>';
							r+= '<td style="" class="col-sm-1 p-b-10 text-left p-l-00">';
								r+= '<img src="'+ message.image_url+'" class="img-responsive img-rounded" style="width:30px!important; height: 30px!important;" />';
							r+= '</td>';
							r+= '<td style="" class="col-sm-6 p-b-10 text-left p-l-00">';
								r+= '<span class="p-l-00 font-3 bold">'+ message.fullname +'</span>';
							r+= '</td>';
							r+= '<td style="" class="col-sm-4 text-right p-b-10 p-l-00 p-r-00">';
								r+= '<span class="font-12"><span class="text-black">'+ getFormattedDate (message.ts) +'</span>  -  <span class="text-ash">'+ getFormattedTime (message.ts) +'</span></span>';
							r+= '</td>';
						r+= '</tr>';
					r+= '</table>';
				r+= '</div>';
			r+= '</div>';
		r+= '</div>';

		r+= '<p class="p-l-2- p-r-20 panel-body p-t-00">';
			r+= message.text ;
		r+= '</p>';

		if (thumbnails.length > 0) {
			r+= '<div class="p-l-15 p-r-15" >';
				r+= '<div style="display:-webkit-box; width: 100%; overflow-x: scroll; overflow-y: hidden;">';

					for (var counter = 0; counter < thumbnails.length; counter++) {
						let temp = thumbnails[counter];
						r+= '<img src="'+ temp +'" class="img-rounded img-responsive img-fluid p-r-10" style="height: 150px; width: 150px;" />';
					}
				r+= '</div>';
			r+= '</div>';
		}

		r+= '<div class="panel-footer background-white-complete text-right" style="color: #d3d3d3;">';
			r+= '<span class="p-l-05 p-r-05"><i class="glyphicon glyphicon-trash hover-red"></i></span>';
			r+= '<span class="p-l-05 p-r-05"><i class="glyphicon glyphicon-share hover-green"></i></span>';
		r+= '</div>';
	r+= '</div>'

	chatDiv.innerHTML = r + chatDiv.innerHTML;
};

var loadMessages = function (param) {
	var chats = $.parseJSON(param).chat;
	$.each(chats, function (key, chat) {
		message = chat;
		displayMessage ();
	});
};

function sendMessage (param) {
	$.post("forum/action", {action: 1, user: param}, function (obj) {
		console.log(obj);
	});
}

function addMessage () {
	// get the message sent
	if (chatMsg.value.trim().length > 0) {
		var user_ = {
			user	: user.id,
			fullname: user.name,
			email	: user.email,
			image_url: user.picture.data.url,
			text	: chatMsg.value,
			ts		: new Date(), // this is meant to display time in this format 09:20 Jul 7, 2016
		};
		this.message = user_;
		displayMessage();
		chatMsg.value = "";
		scroll(chatDiv);
		sendMessage(user_);
	}
}

function getFormattedTime  (date) {
	date = new Date (date);
	var h = date.getHours ();
	var i = date.getMinutes ();
	var t = (h > 12) ? "PM":"AM";

	if (i < 10) i = "0"+ i;
	if (h > 12) h -= 12;
	if (h < 10) h = "0"+ h;
	return h +":"+ i +" "+ t +"  ";
}

function getFormattedDate (date) {
	date = new Date (date);
	let d = date.getDate ();
	let m = date.getMonth ();
	let y = date.getFullYear ();

	return months_[m] +" "+ d +", "+ y;
}

function dbGetChats () {
	$.post("forum/action", {action: 2}, function (obj) {
		loadMessages(obj);
		scroll(chatDiv);
	});
}

dbGetChats();

function imageIconClicked () {
	// trigger the files to open
	images.click();
}

function displayImage () {
	if (images.files.length < 1) return;
	thumbnails = [];

	for (var i=0; i < images.files.length; i++) {
		var passport = images.files[i];
		if (passport.type.substring(0, 5) !== "image") continue;
		loadImages (passport);
	}
}

function loadImages (file) {
	if (file) {
		//file uploaded
		var reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = function (evt) {
			var photo = evt.target.files;
			thumbnails.push (evt.target.result);
			addThumbnail ();
		}
	}
}

function addThumbnail () {
	holder.innerHTML = "";
	var htmls = "";
	for (var i=0; i < thumbnails.length; i++) {
		htmls += '<img src="'+ thumbnails[i] +'" class="m-t-10 padding-05 img-responsive img-fluid img-rounded" style="width: 50px; height: 50px;" id="" />';
	}
	holder.innerHTML = htmls;
}

function postMessage () {

	this.authenticateFacebook ();
	if (Object.keys(this.user).length === 0) return;
	var message 		= {};
	message.user 		= this.user.id;
	message.fullname 	= this.user.name;
	message.email		= this.user.email;
	message.image_url	= this.user.picture.data.url;
	message.boolean 	= false;
	message.text		= "";

	console.log ('message 1', message);

	// check if message has images
	if (thumbnails.length > 0) {
		message.thumbnails	= thumbnails;
		message.boolean 	= message.boolean || true;
	}

	// check if there is a message to send
	if (chatMsg.value.trim().length > 0) {
		message.text		= chatMsg.value;
		message.ts			= new Date();
		message.boolean 	= message.boolean || true;
	}

	console.log ('message 2', message);

	if (message.boolean) {

		// there is a meassage to post
		displayMessage ();
		scroll (chatDiv);

		chatMsg.value 	= "";
		thumbnails 	= [];
		holder.innerHTML = "";

		sendMessage(message);
	}
}

function videoIconClicked ( ) {}

function loadMostCommented ( ) {
	$.getJSON ('fetchMostCommented', {user: user}, displayMostCommented);
}

function loadPostsCount ( ) {
	$.getJSON ('fetchLeftCounters', {user: user}, displayLeftSide);
}

function displayLeftSide (jsonData) {
	followers.html (jsonData.followers);
	following.html (jsonData.following);
	postCount.html (jsonData.posts);
}

function displayMostCommented (jsonData) {
	mostComm.html ("");
	$.each(jsonData.items, function (v) {
		var r = "";
		r +='<li class="list-group-item">';
			r +='<img src="'+ v.image +'" class="img-responsive img-rounded" style="width: 20px; height: 20px;" />';
			r +='<span class="">'+ v.username +'</span>';
			r +='<span class="badge badge-danger">'+ v.counted +'</span>';
		r +='</li>';
		mostComm.append (r);
	});
}

function likeClicked () {}
