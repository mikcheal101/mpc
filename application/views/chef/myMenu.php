<div class="container">
	<div class="row">
		<div class="col-sm-12" >
			<div class="panel panel-inverse">
				<div class="panel-body rop1" style="text-align: center;" data-toggle="popover" data-content="Select Day of the week to create a menu for" role="button"
											title="Menu Creation [Help Option]"  data-placement="bottom" >
					<label class="active">
						<input type="radio" id="sun" class="dodw" name="dodw" value="0" <?=date('w');?> <?=(date('w') === '0')?'checked="checked"':'';?> /> Sunday
					</label>
					<label class="">
						<input type="radio" id="mon" class="dodw" name="dodw" value="1" <?=(date('w') === '1')?'checked="checked"':'';?> />Monday
					</label>
					<label class="">
						<input type="radio" id="tue" class="dodw" name="dodw" value="2" <?=(date('w') === '2')?'checked="checked"':'';?>  />Tuesday
					</label>
					<label class="">
						<input type="radio" id="wed" class="dodw" name="dodw" value="3" <?=(date('w') === '3')?'checked="checked"':'';?>  />Wednesday
					</label>
					<label class="">
						<input type="radio" id="thur" class="dodw" name="dodw" value="4"<?=(date('w') === '4')?'checked="checked"':'';?>  />Thursday
					</label>
					<label class="">
						<input type="radio" id="fri" class="dodw" name="dodw" value="5" <?=(date('w') === '5')?'checked="checked"':'';?> />Friday
					</label>
					<label class="">
						<input type="radio" id="sat" class="dodw" name="dodw" value="6" <?=(date('w') === '6')?'checked="checked"':'';?>  />Saturday
					</label>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row" id="multi">
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Meals</h4>
				</div>
				
				<div class="panel-body row-fluid meals rop2" data-toggle="popover" data-content="Select Meal to drag into the menu area on your right" role="button"
											title="Menu Creation [Help Option]"  data-placement="top" >
					<?php foreach ($meals as $meal):?>
					<div class="meal col-sm-6 col-md-6 col-lg-4" id="<?=$meal->meal_id;?>" style="padding: 2px;">
						<img class="img-responsive img-thumbnail img-rounded" src="<?=$meal->image_url;?>" style="width: 100%;" /> 
					</div>
                    <?php endforeach;?>
				</div>
			</div>
		</div>		
		<div class="col-sm-8">
			<div class="panel panel-inverse"  >
				<p class="reportLbl"></p>
				<div class="panel-body mealmenu rop3" style="overflow-y:scroll; min-height: 350px;" data-toggle="popover" data-content="Drop meal here" role="button"
											title="Menu Creation [Help Option]"  data-placement="top">
					
				</div>
				<div class="panel-footer mybuts">
					<span>Drag And drop meals into the space above for the day</span>
					<div class="btn-group btn-group-sm btn-group-raised pull-right ">
						<span class="btn btn-default" id="clearBtn">
							<i class="glyphicon glyphicon-refresh"></i>
						</span>
						<span class="btn btn-success " id="submitBtn"  >
							<i class="glyphicon glyphicon-thumbs-up rop4" data-toggle="popover" 
						data-content="Click here to save the meau for the selected day" role="button" data-trigger="click"
											title="Menu Creation [Help Option]"  data-placement="bottom" data-container="body"></i>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	// declarations
	var sun = $('#sun');
	var mon = $('#mon');
	var tue = $('#tue');
	var wed = $('#wed');
	var thur = $('#thur');
	var fri = $('#fri');
	var sat = $('#sat');
	
	var divs = $('.meals, .mealmenu');
	
	var dodw 		= [];
	dodw["sun"] 	= [];
	dodw['mon'] 	= [];
	dodw['tue'] 	= [];
	dodw['wed'] 	= [];
	dodw['thur'] 	= [];
	dodw['fri'] 	= [];
	dodw['sat'] 	= [];
	
	Array.prototype.diff = function(a) {
		return this.filter(function(i) {return a.indexOf(i) < 0;});
	};
	
</script>

<script type="text/javascript">

	var clearDiv = function () {
		$('.mealmenu').find('.meal').each(function () {
			var item = $(this);
			item.remove();
			$('.meals').append(item);
		});
	};
	
	var moveMeal = function (arr) {
		$.each(arr, function (x, y) {
			var item = $('.meals').find('#'+y); 
			item.remove();
			$('.mealmenu').append(item);
		});
	};
	 
	var moveMeals = function (day_, x) {
		clearDiv();
		if (day_ == "0" || day_ == 0) moveMeal(x['sun']); 
		else if (day_ == "1" || day_ == 1) moveMeal(x['mon']);
		else if (day_ == "2" || day_ == 2) moveMeal(x['tue']);
		else if (day_ == "3" || day_ == 3) moveMeal(x['wed']);
		else if (day_ == "4" || day_ == 4) moveMeal(x['thur']);
		else if (day_ == "5" || day_ == 5) moveMeal(x['fri']);
		else if (day_ == "6" || day_ == 6) moveMeal(x['sat']);
	};
	
	$(function () {
		var checked = $('.dodw:checked').val();
		var meal_ids = [];
		var dodw = [];
		dodw["sun"] 	= [];
		dodw['mon'] 	= [];
		dodw['tue'] 	= [];
		dodw['wed'] 	= [];
		dodw['thur'] 	= [];
		dodw['fri'] 	= [];
		dodw['sat'] 	= [];
		
		divs.sortable({
			containment: 	"document",
			tolerance: 		"pointer",
			connectWith: 	".mealmenu, .meals",
			cursor: 		"pointer",
			revert:			true
		});
        
        var setDates = function (obj) {
        	var day_ = [];
        	
        	if (obj.day == "0" || obj.day == 0) {
        		day_ = dodw["sun"];
        		day_.push(obj.meal);
        	}  
			else if (obj.day == "1" || obj.day == 1) {
				day_ = dodw["mon"];
				day_.push(obj.meal);
			}
			else if (obj.day == "2" || obj.day == 2) {
				day_ = dodw["tue"];
				day_.push(obj.meal);
			}
			else if (obj.day == "3" || obj.day == 3) {
				day_ = dodw["wed"];
				day_.push(obj.meal);
			}
			else if (obj.day == "4" || obj.day == 4) {
				day_ = dodw["thur"];
				day_.push(obj.meal);
			}
			else if (obj.day == "5" || obj.day == 5) {
				day_ = dodw["fri"];
				day_.push(obj.meal);
			}
			else if (obj.day == "6" || obj.day == 6) {
				day_ = dodw["sat"];
				day_.push(obj.meal);
			}
        };
        
        var reorderMeals = function (obj) {
        	var day_ = [];
        	
        	if (obj.day == "0" || obj.day == 0) {
        		dodw["sun"] = [];
        	}  
			else if (obj.day == "1" || obj.day == 1) {
				dodw["mon"] = [];
			}
			else if (obj.day == "2" || obj.day == 2) {
				dodw["tue"] = [];
			}
			else if (obj.day == "3" || obj.day == 3) {
				dodw["wed"] = [];
			}
			else if (obj.day == "4" || obj.day == 4) {
				dodw["thur"] = [];
			}
			else if (obj.day == "5" || obj.day == 5) {
				dodw["fri"] = [];
			}
			else if (obj.day == "6" || obj.day == 6) {
				dodw["sat"] = [];
			}
			
			$.each(obj.meal, function (x, y) {
				var xy = {day:obj.day, meal:y};
        		setDates(xy);
    		});
        };
        
        $.getJSON('<?=site_url('chef/getMenu');?>', function (data) {            
            $.each(data, function (x, y) { 
            	setDates(y);
            	// move the meals by day
				moveMeals(parseInt(checked), dodw); 
            });
        });
		
		
		sun.click(function () {
			checked = 0;
            moveMeals(checked, dodw);
		});
		mon.click(function () {
            checked = 1;
			moveMeals(checked, dodw);
		});
		tue.click(function () {
            checked = 2;
			moveMeals(checked, dodw);
		});
		wed.click(function () {
            checked = 3;
			moveMeals(checked, dodw);
		});
		thur.click(function () {
            checked = 4;
			moveMeals(checked, dodw);
		});
		fri.click(function () {
            checked = 5;
			moveMeals(checked, dodw);
		});
		sat.click(function () {
            checked = 6;
			moveMeals(checked, dodw);
		});
        
        $('#submitBtn').click(function () {
            // display all the ids in the div
            //get the day selected and then the ids within
            var inside = [];
            $('.mealmenu').find('.meal').each(function () {
                inside.push($(this).attr('id'));
            });
            $.post("<?=site_url('chef/setMenu');?>", {ids:inside, day:checked}, function (data) {
            	// display success result
            	var days = {0:"Sunday", 1:"Monday", 2:"Tuesday", 3:"Wednesday", 4:"Thursday", 5:"Friday", 6:"Saturday"};
            	
            	var str = '<div class="alert alert-sm alert-success alert-dismissible" role="alert">';
  					str+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
  					str+='<strong>Success!</strong> Menu for '+days[checked]+', has been saved!';
				str+='</div>';
				$('.reportLbl').fadeIn(1500, function (e) {
					$('.reportLbl').html(str);
					$('.reportLbl').fadeOut(3000);	
				});
            	
            });
            var obj = {day:checked, meal:inside};
            reorderMeals(obj);
        });
        
        $('#clearBtn').click(function () { clearDiv(); });
	});

</script>

<script type="text/javascript">
	
	
	
	
	$(function () {
		$('.rop1').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.rop2').popover('show');
		});
		
		$('.rop2').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.rop3').popover('show');
		});
		
		$('.rop3').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.rop4').popover('show');
		});
		
		$('.rop4').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
		});
		
		$('.rop1').popover('show');
		
		$('.rop1').hover(function () {
			$('.rop1').popover('hide');
		});
		
		$('.rop2').hover(function () {
			$('.rop2').popover('hide');
		});
		
		$('.rop3').hover(function () {
			$('.rop3').popover('hide');
		});
		
		$('.rop4').hover(function () {
			$('.rop4').popover('hide');
		});
	});
	
	
		
		
	
</script>