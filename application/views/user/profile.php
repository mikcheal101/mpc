<div class="container">
	<section id="details" class="row">
		<div class="col-sm-3">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h3 class="panel-title">Profile Image</h3>
				</div>
				<img class="panel-body" alt="<?=strtoupper($user_profile['name']);?>" src="<?=$img;?>" style="width: 100%; padding: 0px!important;" />
			</div>
		</div>
		
		<div class="col-sm-9">
			<div class="panel panel-inverse">
				
				<div class="panel-body list-group">
					<?php if(strlen($user_profile['name']) > 0){ ?>
					<div class="list-group-item">
						<h5 class="list-group-item-heading">Name:</h5>
						<p class="list-group-item-text"><?=strtoupper($user_profile['name']);?></p>
					</div>
					<?php } ?>
					
					<?php if(strlen($user_profile['birthday']) > 0){ ?>
					<div class="list-group-item">
						<h5 class="list-group-item-heading">Date of Birth:</h5>
						<p class="list-group-item-text"><?=$user_profile['birthday'];?></p>
					</div>
					<?php } ?>
					
					<?php if(strlen($user_profile['email']) > 0){ ?>
					<div class="list-group-item">
						<h5 class="list-group-item-heading">email Address:</h5>
						<p class="list-group-item-text"><?=mailto($user_profile['email'], $user_profile['email']);?></p>
					</div>
					<?php } ?>
					<?php if(strlen($user_profile['friends']['summary']['total_count']) > 0){ ?>
					<div class="list-group-item">
						<h5 class="list-group-item-heading">Invite Your Friends:</h5>
						<a href="#" class="list-group-item-text"><?=$user_profile['friends']['summary']['total_count'];?></a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<hr>
</div>
<div class="container-fluid" id="mealplan" >
	<div class="row-fluid">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title">Meal Plan</h3>
			</div>
			<div class="panel-body ">
				<div class="col-sm-4">
					<div class="row">
						<div class="bootcards-list">
							<div class="panel panel-default">
								<div class="list-group">
		  							<span class="list-group-item" href="#">
		        						<h4 class="list-group-item-heading" id="selectedDate">{Day of Week Selected}</h4>
		        						<p class="list-group-item-text" id="selectedTime">{Time of Day Selected}</p>
		        						<span class="error" style="color:red;" id="errorPane"></span>
		  							</span>
								</div>
								
								<div class="modal-body">
	    							<form class="form-horizontal">
	      								<div class="form-group">
	        								<label class="col-xs-3 control-label">Meal / Chef Name:</label>
	        								<div class="col-xs-9">
	        									<select class="form-control" id="foodSelection">
	        										<option value="0">Select Meal</option>
	        										<?php foreach($meals as $meal) :?>
	        										<option value="<?=$meal->id;?>"><?=$meal->name;?> - <?=$meal->chef;?> [<?=$meal->likes;?> Likes | [<?=$meal->orders;?> Orders]</option>
	        										<?php endforeach; ?>
	        									</select>
	          									<!-- <input style="padding:0px!important;" type="text" class="form-control" name="" id="meal_name" value="" placeholder="Search By Meal or Chef" /> -->
	        								</div>
	      								</div>
	      								<div class="form-group">
	        								<label class="col-xs-3 control-label">Servings</label>
	        								<div class="col-xs-9">
	          									<input style="padding:0px!important;" type="number" class="form-control" name="" id="meal_servings" value="1" min="1" placeholder="Servings" />
	        								</div>
	      								</div>
	    							</form>
	  							</div>
	  							<div class="panel-footer">
								    <div class="btn-group-sm btn-group-raised pull-right">
								    	<span class="btn btn-danger" id="removeMealBtn">Remove Meal</span>
								    	<span class="btn btn-success" id="addMealBtn">Add Meal</span>
								    </div>
							  	</div>
							</div>
						</div>
					</div>
				</div>
				
				<?php
					# look into displayng data from the database
					 #var_dump($mealPlan);
				?>
				<div class="col-sm-8">
					<table class="table table-bordered">
						<thead>
							<tr class="active">
								<td width="12%"></td>
								<td width="12%">Sunday</td>
								<td width="12%">Monday</td>
								<td width="12%">Tuesday</td>
								<td width="12%">Wednesday</td>
								<td width="12%">Thursday</td>
								<td width="12%">Friday</td>
								<td width="12%">Saturday</td>
							</tr>
						</thead>
						<tbody>
							<?php
								function doublr($fig) {
									return (($fig > 9)?$fig:"0{$fig}");
								}
								$i=0; 
								if (count($mealPlan) > 0 ) :
								for($i=0; $i<12; $i++){
									$meal_ = $mealPlan[$i];
									#var_dump($meal_);
									echo "<tr>
										<td>[".(($i==0)?12:doublr($i)).":00] am</td>
										<td id='' class='foodTable' value='{$i},0' meal_id='0'></td>
										<td id='' class='foodTable' value='{$i},1' meal_id='0'></td>
										<td id='' class='foodTable' value='{$i},2' meal_id='0'></td>
										<td id='' class='foodTable' value='{$i},3' meal_id='0'></td>
										<td id='' class='foodTable' value='{$i},4' meal_id='0'></td>
										<td id='' class='foodTable' value='{$i},5' meal_id='0'></td>
										<td id='' class='foodTable' value='{$i},6' meal_id='0'></td>
									</tr>";	
								}
								else:
								endif;
							?>
						</tbody>		
					</table>
					<hr>
					<table class="table table-bordered">
						<tfoot>
							<tr class="active">
								<td width="12%">#</td>
								<td width="12%">Sunday</td>
								<td width="12%">Monday</td>
								<td width="12%">Tuesday</td>
								<td width="12%">Wednesday</td>
								<td width="12%">Thursday</td>
								<td width="12%">Friday</td>
								<td width="12%">Saturday</td>
							</tr>
						</tfoot>
						<tbody>
							<?php
								$i=0; 
								$z=12;
								for($i=0; $i<12; $i++,$z++){
									echo "<tr>
										<td>[".(($i==0)?12:doublr($i)).":00] am</td>
										<td id='' class='foodTable' value='{$z},0'></td>
										<td id='' class='foodTable' value='{$z},1'></td>
										<td id='' class='foodTable' value='{$z},2'></td>
										<td id='' class='foodTable' value='{$z},3'></td>
										<td id='' class='foodTable' value='{$z},4'></td>
										<td id='' class='foodTable' value='{$z},5'></td>
										<td id='' class='foodTable' value='{$z},6'></td>
									</tr>";	
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
	</div>
</div>


<script type="text/javascript">

	var day_ 		= '';
	var time_ 		= '';
	var meal_		= '';
	var servings_	= '';
	var error_txt   = '';
	var errorSpan	= $('#errorPane');
	var selectedBox = '';
		
	$('#foodSelection').select2();	
	
	$('.foodTable').click(function () {
		// change the background color
		$.each($('.foodTable'), function () {
			$(this).css('background-color', '#ffffff');
		}); 
		$(this).css('background-color', '#f2f2f2');
		selectedBox = $(this);
		
		var selected = $(this).attr('value');
		var options = selected.split(',');
		var meal_id = $(this).attr('meal_id');
		
		var timeSelected = function (_time) {
			var hr = "";
			if (parseInt(_time) > 11) {
				hr = (parseInt(_time)  + 1) + ":00 PM";
				
			} else {
				hr = (parseInt(_time)  + 1) + ":00 AM";
			}
			$('#selectedTime').text(hr+"");
			
		};
		
		var dateSelected = function (_date) {
			var x = "";
			switch (_date) {
				case "0":
					x = "SUNDAY";
				break;
				case "1":
					x = "MONDAY";
				break;
				case "2":
					x = "TUESDAY";
				break;
				case "3":
					x = "WEDNESDAY";
				break;
				case "4":
					x = "THURSDAY";
				break;
				case "5":
					x = "FRIDAY";
				break;
				case "6":
					x = "SATURDAY";
				break;
			}
			$('#selectedDate').text(x);
		};
		
		timeSelected(options[0]);
		dateSelected(options[1]);
		time_ 	= options[0];
		day_	= options[1];  
	});
	
	$('#addMealBtn').click(function () {
		// send meal to database
		var day 	= day_;
		var time 	= time_;
		var meal 	= $('#foodSelection').val();
		
		var servings		= $('#meal_servings').val();
		var meal_details 	= $('#foodSelection option:selected').text();
		error_txt 			= "";
		
		if(meal == '0') {
			error_txt += '<br>Select a meal.';
		} 
		if (day.length < 1 || time.length < 1) {
			error_txt += '<br>Select a Date & Time.';
		}
		
		
		if (error_txt.length > 1) {
			error_txt = 'Please:'+ error_txt;
			errorSpan.html(error_txt);
			return;	
		} else {
			errorSpan.html("");
		}
		
		
		$.post("<?=site_url('user/addMeal');?>", {day:day, time:time, meal:meal, servings:servings}, function (data){
			var _details = meal_details;
			_details = _details.split('[');
			
			_meal = _details[0].split("-");
			selectedBox.html(_meal[0]+" ["+servings+"]");
			selectedBox.attr('title', meal_details +" ["+servings+" Servings]");
		});	
		 
		//console.log(day+":"+time+":"+meal+":"+servings);
	});
	
	$('#removeMealBtn').click(function () {
		
	});
</script>