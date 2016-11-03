<div class="container-fluid full-height width-100">
	<div class="row full-height background-yellow border-10x border-orange no-margin p-t-50 p-l-00 p-r-00 p-b-10">
		<div class="container">
			<div class="row">
                <div class="col-sm-12">
                    <h4  class="curly-text-2 font-50 font-normal-100 text-orange">Meal Plan</h4>
                </div>
            </div>
            
			<div class="row">
				<div class="col-sm-4">
					<div class="col-sm-12 col-md-12 background-light-brown-complete">
						<h5 class="text-white" id="day_of_the_week"></h5>
						<p class="text-white" id="time_of_the_week"></p>
						<table class="table ">
							<tr>
								<td class="no-border col-sm-5 text-right text-white">Meal / Chef Name: </td>
								<td class="no-border p-t-00 text-white">
									<select id="meal_select" class="form-control text-white font-14" >
										<option value="">Select Chef / Meal</option>
									</select>
								</td>
							</tr>
							<tr>
								<td class="no-border col-sm-5 text-right text-white">Servings: </td>
								<td class="no-border p-t-00">
									<input type="number" value="0" min="0" name="" class="form-control text-white font-14" id="servings" />
								</td>
							</tr>
						</table>
						<p id="img-bg" style="height:200px;"></p>
						<span class="ingredients"></span>
					</div>
					<div class="col-sm-12  col-md-12 height-x-40 background-red-complete p-l-00">
						<div class=" col-md-3"></div>
						<div class="col-sm-12 col-md-9">
							<div class="container-fuild">
								<div class="row no-padding">
									<div id="addBtn" class="btn col-xs-1 col-sm-2 col-md-2 background-orange-complete no-padding text-center">
										<i class="fa fa-2x fa-plus p-t-10 text-white"></i>
									</div>
									<div class="col-xs-2 col-sm-4 text-center col-md-3">
										<div class="text-white p-t-05" style="font-size: 18px;">Add</div>
									</div>
									<div id="removeBtn" class="btn col-xs-1 col-sm-2 col-md-2 background-orange-complete no-padding text-center">
										<i class="fa fa-2x fa-minus p-t-10 text-white"></i>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-3">
										<div class="text-white p-t-05" style="font-size: 18px;">Remove</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12 p-t-10">
							<div class="btn-block ">
								<a class="btn btn-default col-sm-6">SAVE CHANGES</a>
								<a class="btn btn-success col-sm-6">CHECKOUT</a>	
							</div>
							
						</div>	
					</div>
					
					
				</div>
				
				
				
				<div class="col-sm-8">
					<div class="col-sm-12  background-white-complete padding-15">
						<div class="row">
							<div class="col-sm-12">
								<table class="table no-border table-responsive">
									<thead>
										<td style="width:10%!important;" class="no-border"></td>
										<td style="width:10%!important;" class="no-border text-center">Sunday</td>
										<td style="width:10%!important;" class="no-border text-center">Mon</td>
										<td style="width:10%!important;" class="no-border text-center">Tuesday</td>
										<td style="width:10%!important;" class="no-border text-center">Wednes..</td>
										<td style="width:10%!important;" class="no-border text-center">Thursday</td>
										<td style="width:10%!important;" class="no-border text-center">Friday</td>
										<td style="width:10%!important;" class="no-border text-center">Saturday</td>
									</thead>
									
									<tbody class="innerRows">
									<?php for ($count=0; $count<24; $count++) {?>	
										<tr class="rows">
											<td style="width:7%!important; height: 50px; font-style: bold!important; border-bottom: 1px solid #dedede!important; border-top: 1px solid #dedede!important;"><?=date('h', strtotime("00-00-00 {$count}:00:00"));?> : 00 <?=date('a', strtotime("00-00-00 {$count}:00:00"));?></td>
											<td style="width:10%!important;" class="text-center meal_plan ash-b-l-1x ash-b-r-1x" hasmeal="false"></td>
											<td style="width:10%!important;" class="text-center meal_plan ash-b-l-1x ash-b-r-1x" hasmeal="false"></td>
											<td style="width:10%!important;" class="text-center meal_plan ash-b-l-1x ash-b-r-1x" hasmeal="false"></td>
											<td style="width:10%!important;" class="text-center meal_plan ash-b-l-1x ash-b-r-1x" hasmeal="false"></td>
											<td style="width:10%!important;" class="text-center meal_plan ash-b-l-1x ash-b-r-1x" hasmeal="false"></td>
											<td style="width:10%!important;" class="text-center meal_plan ash-b-l-1x ash-b-r-1x" hasmeal="false"></td>
											<td style="width:10%!important;" class="text-center meal_plan ash-b-l-1x ash-b-r-1x" hasmeal="false"></td>
										</tr>
										<?php } ?>
									</tbody>
									<tfoot>
										<td style="width:7%!important;"></td>
										<td style="width:10%!important;" class="no-border text-center">Sunday</td>
										<td style="width:10%!important;" class="no-border text-center">Mon</td>
										<td style="width:10%!important;" class="no-border text-center">Tuesday</td>
										<td style="width:10%!important;" class="no-border text-center">Wed</td>
										<td style="width:10%!important;" class="no-border text-center">Thursday</td>
										<td style="width:10%!important;" class="no-border text-center">Friday</td>
										<td style="width:10%!important;" class="no-border text-center">Saturday</td>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// week days 
	Date.longDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	
	// meal class
	var Meal = function (){
		this.id = 0;
		this.name = "";
		this.image_url = "";
		this.price = 0;
		this.comment = "";
		this.ingredients = "";
	};
	
	Meal.prototype.create  = function (id, name, image_url, price, comment, ingredients) {
		this.id 			= id;
		this.name 			= name;
		this.image_url 		= image_url;
		this.price 			= price;
		this.comment 		= comment;
		this.ingredients 	= ingredients;
	};
	
	Meal.prototype.copy  = function (param) {
		this.id = param.id;
		this.name = param.name;
		this.image_url = param.image_url;
		this.price = param.price;
		this.comment = param.comment;
		this.ingredients = param.ingredients;
	};
	
	Meal.prototype.destroy  = function () {
		this.id = 0;
		this.name = "";
		this.image_url = "";
		this.price = 0;
		this.comment = "";
		this.ingredients = "";
	};
	
	// order class
	var Order = function () {
		this.meal = new Meal();
		this.time = -1;
		this.day = -1;
		this.quantity = 0;
	};
	
	
	// database class
	var Database = function () {
		this.items = [];
		this.orders = [];
		this.meal = new Meal();
		this.orders_exists = 0;
	};
	
	Database.prototype.addMeal = function (meal) {
		this.items.push(meal);
	};
	
	Database.prototype.addOrder = function (order) {
		var existance = 0;
		
		$.each(this.orders, function (k, v) {
			if (v.meal.id == order.meal.id && v.time == order.time && v.day == order.day) {
				existance = 1;
				if (v.quantity != order.quantity) v.quantity = order.quantity; 
			}
		});
		
		if (existance == 0 ) 
			this.orders.push(order);
			
		console.log(this.orders);
	};
	
	Database.prototype.orderExists = function (order) {
		this.orders_exists = 0;
		
	}
	
	Database.prototype.removeMeal = function (id) {
		$.each(this.items, function (k, v) {
			if (v.id == id) 
				this.items.splice(k, 1);
		});
	};
	
	Database.prototype.removeOrder = function (order) {
		var openOrders = this.orders;
		
		$.each(openOrders, function (k, v) {
			if (v.meal.id == order.meal.id && v.time == order.time && v.day == order.day) { 
				openOrders.splice(k, 1);
				return false;
			}
		});
	};
	
	Database.prototype.getMeals = function () {
		return this.items;
	};
	
	Database.prototype.saveChanges = function () {
		// send to server to add to session
	}
	
	Database.prototype.checkOut = function () {
		// send to server and redirect to cart
		this.saveChanges();
		
	}
	
	Database.prototype.getOrders = function () {
		return this.orders;
	};
		
	Database.prototype.getMealsCount = function () {
		return this.items.length;
	};
	
	Database.prototype.getOrdersCount = function () {
		return this.orders.length;
	};
	
	Database.prototype.getMealById = function (id) {
		items = this.items;
		meal = this.meal;
		$.each(items, function (k, v) {			
			if (v.id == id) meal.copy(items[k]);
		});
	};
	
	Database.prototype.getMeal = function () {		
		return this.meal;	
	};
	
</script>

<script type="text/javascript">
	var no_pic_color 	= "#ffffff";
	var selected_color 	= "#f9f9f9";
	
	var div 			= $('.meal_plan');
	var servings 		= $('#servings');
	var meals_select 	= $('#meal_select');
	
	var addBtn 			= $('#addBtn');
	var removeBtn		= $('#removeBtn');
	
	var selected_meal	= new Meal();
	var mealDatabase 	= new Database();
	var meal_planDb		= new Database();
	var activeOrder		= new Order();
	
	var selected_box	= null;
	
	var axis 			= 0; 
	
	addBtn.click(function (evt) {
		// add meal to the db and to the table
		// display the selected meal 
		displayPicture();
		
		meal_planDb.addOrder(activeOrder);
	});
	
	removeBtn.click(function (evt) {
		removePicture();
		//meal_planDb.addMeal(selected_meal);
		meal_planDb.removeOrder(activeOrder);
		prepOrder();
	});
	
	meals_select.change(function (evt) {
		//selected_meal = $(this).val();
		mealDatabase.getMealById($(this).val());
		selected_meal = mealDatabase.getMeal();
		setImageDisplay($('#img-bg'));
		prepOrder();
	});
	
	servings.change(function (evt) {
		if ($(this).val() < 0) $(this).val(0);
		var price = selected_meal.price * $(this).val();
		$('#costing').html(numeral(price).format('0,0.00'));
		prepOrder();
	});
	
	servings.keyup(function (evt) {
		if ($(this).val() < 0) $(this).val(0);
		var price = selected_meal.price * $(this).val();
		$('#costing').html(numeral(price).format('0,0.00'));
		prepOrder();
	});
	

	div.each(function(x) {
		var item = $(this);
		selected_box = item;
		item.click(function (evt) {
			getPositions (item);
			displayDateTime();
			change(item);
			servings.val(1);
		});
	});
	
	var prepOrder = function () {
		activeOrder 		= new Order();
		activeOrder.meal 	= selected_meal;
		activeOrder.time 	= axis.y;
		activeOrder.day 	= axis.x;
		activeOrder.quantity = servings.val();
		console.log('activeOrder:', activeOrder);
	};
	
	var setImageDisplay = function (box) {
		box.css('background-image', 'url(' + selected_meal.image_url + ')');
		box.css('background-position', 'center');
		box.css('background-repeat', 'no-repeat');
		box.css('background-size', 'cover');
		box.css('border-radius', '3px');
		box.css('height', '200px');
		
		var string = '';
		
		if (selected_meal.comment != null && selected_meal.comment.length > 0) {
			string+= '<span class="bold text-black font-14">Description</span>';
			string+= '<p class="text-black">' + selected_meal.comment + '</p>';
		}
		
		// set the description message
		if (selected_meal.ingredients != null && selected_meal.ingredients.length > 0) {
			var ing = selected_meal.ingredients.split(",");
			 
			string+= '<p></p>';
			string+= '<span class="bold text-white font-14">Ingredients:</span>';
			string+= '<ol class="text-white">';
				$.each(ing, function (k,v) {
					console.log();
					string+= '<li>' + v.trim() +'</li>';
				});
			string+= '</ol>';
		}
		
		if (selected_meal.price != null && selected_meal.price.length > 0) {
			string+= '<h5 class="text-right text-white">NGN <span id="costing">' + numeral(selected_meal.price).format('0,0.00') + '<span></h5>';
		}
		$('.ingredients').html(string);
		prepOrder();
	};
	
	var displayPicture = function () {
		var box = $('.innerRows tr:nth-child(' + (axis.y + 1) + ') td:nth-child(' + (axis.x + 2) + ')');
		box.css('background-image', 'url(' + selected_meal.image_url + ')');
		box.css('background-position', 'center');
		box.css('background-repeat', 'no-repeat');
		box.css('background-size', 'cover');
		box.css('border-radius', '3px');
	}
	
	var removePicture = function () {
		var box = $('.innerRows tr:nth-child(' + (axis.y + 1) + ') td:nth-child(' + (axis.x + 2) + ')');
		box.css('background-image', 'none');
	}
	
	var displayDateTime = function () {
		$('#day_of_the_week').text(Date.longDays[axis.x]);
		$('#time_of_the_week').text(getHM(axis.y));
	}
	
	var getHM = function (hours) {
		var h = (hours == 0) ? "12" : (hours < 10) ? "0" + hours : (hours > 12) ? "0" + hours - 12: "";
		var m = " : 00";
		var sub = (hours > 12) ? " PM" : " AM";
		return h + m + sub;
	}
	
	var getPositions = function (item) {
		var results = [];
		results.x = [];
		results.y = [];

		results.x = item.parent().children().index(item) - 1;
		results.y = item.parent().parent().children('.rows').index(item.parent());
		
		getMeals (item, results.x, results.y);
		axis = results;
	};
	
	var getMeals = function (post, x, y) {
		var url = "<?=base_url('user/ajax_get_meals_for_meal_plan/');?>/" + x + "/" + y;
		$.getJSON(url, function (data) {
			var str = "";
			$.each(data, function(item, value) {
				addToMealSelect (value);
			});
		});
	};
	
	
	var addToMealSelect = function (chef) {
		var str = "";
		selected_meal = new Meal();
		$.each(chef, function (x, y) {
			str = "<optgroup label='Chef " + y.title + "'>";
				$.each(y.seeds, function (a, b) {
					var meal = new Meal();
					meal.copy(b);
					mealDatabase.addMeal(meal);
					
					str+= "<option value='" + b.id + "'>" + b.name + "</option>";
					 
					if (selected_meal.id == 0) selected_meal.copy(b);

					shadeMyNeighbours();
				});
			str+= "</optgroup>";
		})
		setImageDisplay($('#img-bg'));
		meals_select.html(str);
	};
	
	function uncheckAll () { div.each(function(x) { changeToNoPic($(this)); }); }
	
	function change (attr) {
		uncheckAll();
 		changeToSelected(attr);
	}
	
	function changeToNoPic (param) {
		param.css('background-color', no_pic_color);
		param.removeClass('activeRow');
		param.removeClass('activeColumn');
	}
	
	function changeToBgPic (param, bgUrl) {}
	
	function changeToSelected (param) {
		param.css('background-color', selected_color);
		
	}
	
	var shadeMyNeighbours = function () {
		shadeHorizontally();
		shadeVertically(axis.y);
		setLeftBox();
	}
	
	var shadeHorizontally  = function () {
		var x_axis = $('.innerRows tr:nth-child(' + (axis.y + 1) + ')');

		x_axis.each(function(k, v) {
			var y_axis = $('.innerRows tr:nth-child(' + (axis.y + 1) + ') td');
			y_axis.addClass('activeRow')
		});
	}
	
	var shadeVertically  = function (param) {
		var x_axis = $('.innerRows td:nth-child(' + (axis.x + 2) + ')');
		x_axis.addClass('activeColumn');
	}
	
	var setLeftBox = function () {
		var x = $('.innerRows tr td:nth-child(' + (axis.x + 1) + ')');
		x.css('border-right', 'none');
	}
 </script>