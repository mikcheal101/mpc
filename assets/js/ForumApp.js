var app = angular.module('forumApp', ['ngAnimate', 'ngSanitize',  'angularUtils.directives.dirPagination', 'ngFileUpload']);
app.controller ('forumCntrl', function ($scope, $http, $window, Upload, $interval) {

	$scope.facebookLoggedIn = false;
	$scope.chatLastCall		= 0;
	
	$scope.facebookDetails	= {
		picture : { data: { url: "http://placehold.it/300x300"}},
	};
	$scope.messages			= [];
	$scope.comments			= [];
	$scope.leftCounters		= {
		posts : 0,
		following: 0,
		followers: 0,
	};
	
	$scope.chat				= {};
	$scope.chat.message		= "";
	$scope.chat.images		= [];
	$scope.chat.videos		= [];
	$scope.chat.audios		= [];
		
	$scope.getDate = function (date) {
		return new Date (date);
	};
	
	$interval (function () { 
		$scope.getChats (); 
		$scope.loadLeftCounters (); 
		$scope.loadMostComments (); 
	}, 1500); // request every 1500 seconds
	
	$scope.getChats = function () {
		$.post ('forum/action', {action:4, timer:$scope.chatLastCall}, function (response) {
			response = $.parseJSON(response);
			angular.forEach (response.chat, function (chat) {
				$scope.messages.unshift(chat);
				$scope.chatLastCall = response.current_time;
			}); 
			$scope.$digest ();
		});
	};
	
	$scope.init = (function () {
		// document ready
		$.ajaxSetup({ cache: true });
  		$.getScript('//connect.facebook.net/en_US/sdk.js', function(){
    		FB.init({
      			appId: '738245036277604',
  				version: 'v2.7' // or v2.1, v2.2, v2.3, ...
    		});     
    		FB.getLoginStatus($scope.facebookGetStatus);
  		});
	});
	
	$scope.facebookGetStatus = function (resp) {
		if (resp.status === "connected") {
			$scope.facebookLoggedIn = true;
			FB.api('/me?fields=email,name,birthday,picture.type(large),timezone,updated_time,friendlists,first_name, middle_name, last_name,gender', function (response) {
				// send user data to db
				$scope.facebookDetails = response;
				$scope.$digest ();
				var user = {
					email 	: response.email,
					id 		: response.id,
					photo	: response.picture.data.url,
					name	: response.first_name +" "+ response.last_name,
				};
				$.post("forum/addUser", user, function (res) {
					//console.log ()
				});
			});
		} else $scope.facebookLoggedIn = false;
	};
	
	
	$scope.facebookLogin = function () {
		FB.getLoginStatus(function (response) {
			if (response.status !== "connected") {
				FB.login($scope.facebookGetStatus);
			}
		});
	};
	
	$scope.loadMostComments = function () {
		$.getJSON ('forum/fetchMostCommented', function (data) {
			$scope.comments = data.items;
		});
	};
	
	$scope.loadLeftCounters = function () {
		$.getJSON ('forum/fetchLeftCounters', function (data) {
			$scope.leftCounters = data;
		});
	};
	
	$scope.loadMessages = function () {
		$.post ('forum/action', {action:2}, function (response) {
			response = $.parseJSON(response);
			$scope.messages = response.chat;
			$scope.chatLastCall = response.current_time;
			$scope.$digest ();
		});
	}();

		
	$scope.postMessage = function () {
		// post data to server
		var x 		= $scope.chat.message.trim ();	
		var images	= $scope.chat.images;
		var videos 	= $scope.chat.videos;
		var audios	= $scope.chat.audios;
			
		var bool 	= false;
		$scope.chat.message = ""; 
		$scope.chat.images = [];
		$scope.chat.audios = [];
		$scope.chat.videos = [];
		
		bool |= (x.length > 0);
		console.log ('1', bool);
		bool |= (images.length > 0);
		console.log ('2',bool);
		bool |= (videos.length > 0);
		console.log ('3',bool);
		bool |= (audios.length > 0);
		console.log ('4',bool);
		
		if (bool) {
			$.post ('forum/action', {action:1, message: x}, function (res) { 
				var result = $.parseJSON(res).post;			
				
				//upload images
				$scope.uploadImages (result, images);
				
				// upload videos
				
				// upload audios
			});
		}
	};
	
	$scope.getImages = function (images) {
		$scope.chat.images = images;
	};
	
	$scope.getVideos = function (videos) {
		$scope.chat.videos = videos;
	};
	
	$scope.registerImages = function (response) {
		//var data = $.parseJSON (response.data);
		console.log (response);
	};
	
	$scope.uploadImages = function (forumId, images) {
        var files = images;
        if (files && files.length) {
            Upload.upload({
                url: 'forum/uploadPix',
                data: {
                    files	: files,
                    forum 	: forumId,
                }
            }).then($scope.registerImages, 
            function (response) {
                console.log (response);
            }, function (evt) {
            	console.log ('function 2', evt);
                $scope.progress = 
                    Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
            });
        }
    };	
    
    $scope.uploadVideos = function () {
        var files = $scope.chat.images;
        if (files && files.length) {
            Upload.upload({
                url: 'forum/uploadPix',
                data: {
                    files: files
                }
            }).then(function (response) {
                $timeout(function () {
                    $scope.chat.result = response.data;
                    console.log ("chat post", response);
                });
            }, function (response) {
                if (response.status > 0) {
                    $scope.chat.errorMsg = response.status + ': ' + response.data;
                    console.log ($scope.chat.errorMsg);
                }
            }, function (evt) {
                $scope.progress = 
                    Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
            });
        }
    };	

	


});