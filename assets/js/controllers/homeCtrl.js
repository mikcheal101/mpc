var app = angular.module('mpc', ['ngFileUpload'])

.filter ('myFilter', function () {
	return function (hours) {
		var hrs = parseInt (hours);
		var date = new Date ();
		date.setHours (hrs, 0, 0);
		return date;
	};
})

.directive('checkemail', function ($q, $timeout) {
	return {
		require	: 'ngModel', 
		link	: function(scope, elm, attrs, ctrl) {
			
			ctrl.$asyncValidators.checkemail = function (modelValue, viewValue) {
				
				if (ctrl.$isEmpty(modelValue)) {
					return $q.when ();
				}
				var def = $q.defer ();
				$.post ('chef/checkEmail', {param:modelValue}, function (res) {
					res = $.parseJSON (res).response;
					if (!res.result) def.resolve ();
					else def.reject ();
				});
				return def.promise;
			};
		}
	};
})

.directive ('checktel', function ($q, $timeout) {
	return {
		require	: 'ngModel', 
		link	: function(scope, elm, attrs, ctrl) {
			
			ctrl.$asyncValidators.checktel = function (modelValue, viewValue) {
				
				if (ctrl.$isEmpty(modelValue)) return $q.when ();
				
				var def = $q.defer ();
				$.post ('chef/checkTel', {param:modelValue}, function (res) {
					res = $.parseJSON (res).response;
					if (!res.result) def.resolve ();
					else def.reject ();
				});
				return def.promise;
			};
		}
	};
})

.directive ('checkusername', function ($q, $timeout) {
	return {
		require	: 'ngModel', 
		link	: function(scope, elm, attrs, ctrl) {
			
			ctrl.$asyncValidators.checkusername = function (modelValue, viewValue) {
				
				if (ctrl.$isEmpty(modelValue)) {
					return $q.when ();
				}
				
				var def = $q.defer ();
				$.post ('chef/checkUsername', {param:modelValue}, function (res) {
					res = $.parseJSON (res).response;
					if (!res.result) def.resolve ();
					else def.reject ();
				});
				return def.promise;
			};
		}
	};
})

.controller ('homeController', function ($scope, Upload) {
	
	$scope.progress = 0;
	$scope.cook = {
		fullname 	: { val: '', error: '' },
		username	: { val: '', error: '' },
		email		: { val: '', error: '' },
		tel			: { val: '', error: '' },
		pwd			: { val: '', error: '' },
		repwd		: { val: '', error: '' },
		del			: { val: '2', error: '' },
		pick		: { val: new Date (0, 0, 1, 1, 0, 0), error: '' },
		dur			: { start : { val: '6', error: '' }, end : { val: '15', error: '' } },
		addr		: { val: '', error: '' },
		img			: { val: '', error: '' },
	};
	
	$scope.cook.saveCook = function (form) {
		var bool = ($scope.cook.fullname.val ) ? true : false;
		bool &= ($scope.cook.username.val ) ? true : false;
		bool &= ($scope.cook.email.val ) ? true : false;
		bool &= ($scope.cook.tel.val ) ? true : false;
		bool &= ($scope.cook.pwd ) ? true : false;
		bool &= ($scope.cook.repwd.val ) ? true : false;
		bool &= ($scope.cook.img.val) ? true : false;
		
		if (bool == true) {
			Upload.upload({
				url		: 'chef/ajaxSaveChef',
				files 	: $scope.cook.img.val,
				data	: $scope.cook
			}).then(function (response) {
				console.log (response);
			}, 
			function (response) {
				//console.log ('res 2', $.parseJSON (response));
			}, function (evt) {            
				$scope.progress = 
					Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
				//$scope.$digest ();
			});
		} 
	};
	
})

.controller ('loginController', function ($scope) {
	
	$scope.url = "";
	
	$scope.init = function (url) {
		$scope.url = url;
	};
	
	$scope.user = { username : "", pwd	: "" };
	
	$scope.login 	= {
		authenticate : function () {
			// test to see if the user exists 
			$.post ($scope.url + 'user/ajaxAuthenticateUser', {username: $scope.user.username, pwd: $scope.user.pwd}, function (res) {
				let r = $.parseJSON (res);
				console.log (r);
				if (r.status == 400) {
					$scope.login.error = r.message;
					$scope.$digest ();
				} else {
					$.post ($scope.url + 'user/addToSession', {session : r.object}, function (x) {
						window.location.href = $scope.url + 'user/redirectUser';
					});
				}
			});
		},
		clear : function () {
			$scope.user = { username : "", pwd	: "" };
		},
		erorr : ""
	};
	
});