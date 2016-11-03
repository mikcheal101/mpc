var app = angular.module('mpc', ['checklist-model', 'angularUtils.directives.dirPagination', 'ngFileUpload']);

app.controller('adminCtrl', function ($scope, Upload) {
	
	/*************************** new dishes *******************************/
	
	$scope.dish = {};
	var dish = $scope.dish;
	dish.dishes = [];
	dish.dish = {
		id : 0,
		Heading : '',
		comment : ''
	};
	dish.loadDishes = function () {
		$.getJSON ('loadNewDishes')
		.then (
			function (s) {
				dish.dishes = s.result;
				$scope.$digest ();
			}, displayError 
		);
	};
	dish.set = function (d) {
		dish.dish = d;
		tinyMCE.activeEditor.setContent (d.comment);
	};
	dish.commit = function (form) {
		if (form.$valid) {
			var d = dish.dish;
			d.comment = tinyMCE.activeEditor.getContent ();
			dish.reset ();
			Upload.upload ({
				url: 'commitNewDishes',
				data : {
					files: d.image,
					post: d
				}
			})
			.then (
				function (x) {
					var r = x.data.result;
					if (r.type === 'save') {
						d.id = r.id;
						d.image = r.img;
						dish.dishes.unshift (d);
					}
				}, 
				function (err) {
					console.error (err);
				}
			);
		}
	}; 
	dish.reset = function () {
		dish.dish = {
			id : 0,
			Heading : '',
			comment : ''
		};
		tinyMCE.activeEditor.setContent (dish.dish.comment);
	};
	dish.drop = function (d) {
		dish.dishes.splice (dish.dishes.indexOf (d), 1);
		$.post ('dropNewDishes', {id:d.id}).then (
			displayResult, displayError
		);
	};
	
	
	/*************************** new places *******************************/
	
	$scope.place = {};
	var place = $scope.place;
	place.places = [];
	place.place = {
		id :0,
		title:'',
		description:'',
		image_url:''
	};
	place.loadPlaces = function () {
		$.getJSON ('loadNewPlaces')
		.then (
			function (r) {
				place.places = r.result;
				$scope.$digest ();
			},displayError
		);
	};	
	place.set = function (p) {
		place.place = p;
		tinyMCE.activeEditor.setContent(place.place.description);
	};
	place.commit = function (form) {
		if (form.$valid) {
			var d = place.place;
			d.description = tinyMCE.activeEditor.getContent ();
			place.reset ();
			Upload.upload ({
				url : "commitNewPlaces",
				data : {
					files : d.image_url,
					post : d
				}
			})
			.then (
				function (r) {
					r = r.data.result;
					if (r.type === 'save') {
						d.id = r.id;
						d.image_url = r.img;
						place.places.unshift (d);
					}
				}, displayError
			);
		}
	};
	place.reset = function () {
		place.place = {
			id :0,
			title:'',
			description:'',
			image_url:''
		};
		tinyMCE.activeEditor.setContent ("");
	};
	place.drop = function (p) {
		place.places.splice (place.places.indexOf (p), 1);
		$.post ('dropNewPlaces', {id:p.id})
		.then (displayResult, displayError);
	};
	
	
	/*************************** chef of the month *******************************/
	
	$scope.com = {};
	var com = $scope.com;
	com.com = {
		id : 0,
		description : '',
		name : '',
		main_picture : ''
	};
	com.load = function () {
		$.getJSON ("loadChefOfTheMonth")
		.then (
			function (c) {
				com.com = c.result;
				com.com.date = new Date ();
				com.com.date.setFullYear (com.com.year);
				com.com.date.setMonth (com.com.month);
				tinyMCE.activeEditor.setContent (com.com.description);
				$scope.$digest ();
			}, displayError
		);
	};
	com.drop = function () {
		$.post ("dropChefOfTheMonth", {id:com.com.id})
		.then (
			function (r) {
				com.reset ();
			}, displayError
		);
	};
	com.commit = function (form) {
		if (form.$valid) {
			var d = com.com;
			d.description = tinyMCE.activeEditor.getContent ();
			d.year = d.date.getFullYear ();
			d.month = d.date.getMonth ();

			Upload.upload ({
				url : 'commitChefOfTheMonth',
				data : {
					files: d.main_picture,
					post: d
				}
			})
			.then (
				function (r) {
					r = r.data.result;
					if (r.type === 'save') {
						com.com.id = r.id;
						com.main_picture = r.img;
					}
				}, displayError
			);
		}
		
		
	};
	com.reset = function () {
		com.com = {
			id : 0,
			description : '',
			name : '',
			main_picture : ''
		};
		tinyMCE.activeEditor.setContent ("");
	};
	
	
	/*************************** ingredients of the months *******************************/
	
	$scope.ing  = {};
	var ing = $scope.ing;
	ing.ings = [];
	ing.ing = {
		id : 0,
		name : '',
		image_url : '',
		comments: ''
	};
	ing.load = function () {
		$.getJSON ("loadIngredientsOfTheMonth")
		.then (
			function (d) {
				ing.ings = d.result;
				console.log (ing.ings);
				$scope.$digest ();
			}, displayError
		);
	};
	ing.drop = function (i) {
		ing.ings.splice (ing.ings.indexOf (i), 1);
		$.post ("dropIngOfTheMonth", {id:i.id})
		.then (displayResult, displayError);
	};
	ing.commit = function (form) {
		var d = ing.ing;
		d.comments = tinyMCE.activeEditor.getContent ();
		ing.reset ();
		if (form.$valid) {
			Upload.upload ({
				url: "commitIngOfTheMonth",
				data : {
					files: d.image_url,
					post: d
				}
			})
			.then (
				function (r) {
					r = r.data.result;
					if (r.type === 'save') {
						d.id = r.id;
						d.image_url = r.img;
						ing.ings.unshift (d);
					}
				}, displayError
			);
		}
	};
	ing.reset = function () {
		ing.ing = {
			id : 0,
			name : '',
			image_url : '',
			comments: ''
		};
		tinyMCE.activeEditor.setContent ("");
	};
	ing.set = function (i) { ing.ing = i; tinyMCE.activeEditor.setContent (i.comments);};
	
	/*************************** shops and markets *******************************/
	
	$scope.shop = {};
	var shop = $scope.shop;
	shop.shops = [];
	shop.shop = {
		id: 0,
		title: '',
		description:'',
		url: '',
		address: ''
	};	
	shop.load = function () {
		$.getJSON ("loadShoppingMarkets")
		.then (
			function (r) {
				shop.shops = r.result;
				console.log (shop.shops);
				$scope.$digest ();
			}, displayError
		);
	};
	shop.drop = function (i) {
		shop.shops.splice (shop.shops.indexOf (i), 1);
		$.post ("dropShoppingMarkets", {id:i.id})
		.then (displayResult, displayError);
	};
	shop.commit = function (form) {
		if (form.$valid) {
			var d = shop.shop;
			d.address = tinyMCE.editors[0].getContent ();
			d.description = tinyMCE.editors[1].getContent ();
			tiny ();
			console.log (d);
			shop.reset ();
			Upload.upload ({
				url : 'commitShoppingMarkets',
				data: {
					files: d.url,
					post: d
				}
			})
			.then (
				function (r) {
					
					r = r.data.result;
					if (r.type === 'save') {
						d.id = r.id;
						d.url = r.img;
						shop.shops.unshift (d);
					}
				}, displayError
			);
		}
	};
	shop.reset = function () {
		shop.shop = {
			id: 0,
			title: '',
			description:'',
			url: '',
			address: ''
		};
		tinyMCE.editors[0].setContent ("");
		tinyMCE.editors[1].setContent ("");
	};
	shop.set = function (s) { 
		shop.shop = s; 
		tinyMCE.editors[0].setContent (s.address);
		tinyMCE.editors[1].setContent (s.description);
	}
	
	/*************************** cooking tips *******************************/
	
	$scope.cook = {};
	var cook = $scope.cook;
	cook.cooks = [];
	cook.cook = {
		id:0,
		img : '',
		title: '',
		description : ''
	};
	cook.load = function () {
		$.getJSON ('loadCookingTips')
		.then (
			function (d) {
				cook.cooks = d.result;
				$scope.$digest ();
			}, displayError
		);
	};
	cook.set = function (c) { cook.cook = c; tinyMCE.activeEditor.setContent (c.description);};
	cook.reset = function () {
		cook.cook = {
			id:0,
			img : '',
			title: '',
			description : ''
		};
		tinyMCE.activeEditor.setContent ("");
	};
	cook.drop = function (c) {
		cook.cooks.splice (cook.cooks.indexOf (c), 1);
		$.post ('dropCookingTips', {id:c.id})
		.then (displayResult, displayError);
	};
	cook.commit = function (form) {
		if (form.$valid) {
			var d = cook.cook;
			d.description = tinyMCE.activeEditor.getContent ();
			cook.reset ();
			Upload.upload ({
				url : "commitCookingTips",
				data : {
					files: d.img,
					post: d
				}
			})
			.then (
				function (r) {
					r = r.data.result;
					if (r.type === 'save') {
						d.id = r.id;
						d.img = r.img;
					}
				}, displayError
			)
		}
	};
	
	
	var displayResult = function (result) {
		console.info (result);
	};
	
	var displayError = function (error) {
		console.error (error);
	};
	
	var tiny = function () {
		for (var i=0; i<tinyMCE.editors.length; i++) {
			console.log (i, tinyMCE.editors[i].getContent ());
		}
	};
});