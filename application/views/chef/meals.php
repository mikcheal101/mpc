
<div class="container" style="margin-top:0px;">
	<div class="row">
		<div class="col-sm-12">
			
			<!-- meal addition panel -->
			<div id="mealCreation" class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title">Meal Panel</div>
				</div>
				
				<div class="panel-body">
					<div class="container-fluid">
						<?=form_open_multipart('', array('class'=>'form-horizontal'));?>
						
						<?php if (isset($upload_error)) ?>
						<div class="row-fluid">
							<div class="col-sm-3">
								<img src="http://placehold.it/300x300" style="width: 100%" id="photo" />
								<hr>
								<input type="file" class="form-control pop2" role="button"
									data-toggle="popover" data-content="Click Here to Upload your Meal's Image" 
									title="Meals Creation [Help Option]"  data-placement="bottom" name="passport" id="passport" />	
							</div>
							<div class="col-sm-9">
								<fieldset>
									<legend>Enter Meal Details
										<small>
											<?php  if(strlen(validation_errors()) > 0 || strlen($upload_error)): ?>
											<div class="alert alert-danger alert-dismissible"  role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<?=(strlen(validation_errors()) > 0)?validation_errors():"";?>
												<?=(strlen($upload_error) > 0)? $upload_error:"";?>
											</div>
											<?php endif;?>
											
										</small>	
									</legend>
									<!-- meal name -->
									<div class="form-group">
										<label class="control-label col-sm-4" for="mealname">Meal Name *:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control pop3" value="<?=set_value('mealname');?>" name="mealname" placeholder="Enter Meal Name" required="required" 
												data-toggle="popover" data-content="Enter Meal Name here" data-id="namePop" data-container=".pop3"
												title="Meals Name Creation [Help Option]"  data-placement="bottom"
											/>
										</div>
									</div>
									
									<!-- ingredients-->
									<div class="form-group">
										<label class="control-label col-sm-4" for="ingridients">Ingredients *:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control pop4" name="ingridients" placeholder="Enter Ingridients (e.g salt, pepper, maggi, rice)" required="required"
												role="button"  value="<?=set_value('ingridients');?>"
												data-toggle="popover" data-content="Enter Meal Ingredients here" 
												title="Meals Ingredients Creation [Help Option]"  data-placement="bottom"
											 />
										</div>
									</div>
									
									
									<!-- Comment -->
									<div class="form-group">
										<label class="control-label col-sm-4" for="comment">Comment On Meal:</label>
										<div class="col-sm-8">
											<textarea class="form-control" name="comment" placeholder="Enter extra details for the meal"><?=set_value('comment');?></textarea>
										</div>
									</div>
									
									<!-- Meal restrictions -->
									<div class="form-group">
										<label class="control-label col-sm-4" for="meal_type">Meal Ordering Restrictions:</label>
										<div class="col-sm-8 pop5"
												data-toggle="popover" data-content="Enter Meal Ordering Restrictions here" 
												title="Meals Ordering Restrictions Creation [Help Option]"  data-placement="bottom">
											<div class="radio">
												<label>
													<input type="radio" name="meal_type" value="1" class="meal_type"  required="required" />
													<span>Restricted Meal</span>
													<small>[i.e Meal has restricted ordering time(s)]</small>
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" class="meal_type" name="meal_type" value="2" />
													<span>Open Meal</span>
													<small>[i.e Meal can be ordered at anytime]</small>
												</label>
											</div>
										</div>
									</div>
									
									<!-- Start and ending time -->
									<div class="form-group" id="startEnd">
										<label class="control-label col-sm-4" for="duration">Ordering Start & End Time *:</label>
										<div class="col-sm-8 pop6"
											data-toggle="popover" data-content="Select order opening and closing time" 
											title="Meals Ordering Time Creation [Help Option]"  data-placement="bottom">
											<div class="col-sm-6">
												<input type="time" class="form-control pop6a" name="start_time" placeholder="Enter Start Time" 
													data-toggle="tooltip" data-placement="bottom" title="Enter Order Opening Time for this meal"
													 value="<?=set_value('start_time');?>"
												 />
											</div>
											<div class="col-sm-6">
												<input type="time" class="form-control pop6b " name="end_time" placeholder="Enter End Time"
													data-toggle="tooltip" data-placement="bottom" title="Enter Order Closing Time for this meal"
													 value="<?=set_value('end_time');?>"
												 />
											</div>
										</div>
									</div>
									
									<!-- 1 Serving Price -->
									<div class="form-group">
										<label class="control-label col-sm-4" for="price">Price for 1 Serving [NGN] *:</label>
										<div class="col-sm-8">
											<input type="number" min="1" class="form-control pop7" name="servings_price" placeholder="Enter Price for 1 serving" required="required" 
												data-toggle="popover" data-content="Select order opening and closing time" 
												title="Meals Ordering Time Creation [Help Option]"  data-placement="bottom"
												 value="<?=set_value('servings_price');?>"
											/>
										</div>
									</div>
									
									<!-- Saving Button -->
									<div class="form-group">
										<div class="col-sm-12">
											<button class="btn btn-success pull-right pop8" type="submit"
												data-toggle="popover" data-content="Click here to save meal" 
												title="Meals Creation [Help Option]"  data-placement="left"
											>Add Meal</button>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			
			<!-- meal editing panel -->
			<div id="mealEdit" class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title">Meal Panel</div>
				</div>
				
				<div class="panel-body">
					<div class="container-fluid">
						<?=form_open_multipart('chef/updatemeal', array('class'=>'form-horizontal'));?>
						
						<?php if (isset($upload_error)) ?>
						<div class="row-fluid">
							<div class="col-sm-3">
								<img src="http://placehold.it/300x300" style="width: 100%" id="photo" />
								<hr>
								<input type="file" class="btn form-control" name="passport" id="passport" />
							</div>
							<div class="col-sm-9">
								<fieldset>
									<legend>Enter Meal Details
										<small>
											<p><?=validation_errors();?></p>
											<p><?=($upload_error);?></p>
										</small>	
									</legend>
									<!-- meal name -->
									<div class="form-group">
										<label class="control-label col-sm-4" for="mealname">Meal Name *:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="mealname" placeholder="Enter Meal Name" required="required" />
											<input type="hidden" name="meal_id" value="" id="meal_id" />
										</div>
									</div>
									
									<!-- ingredients-->
									<div class="form-group">
										<label class="control-label col-sm-4" for="ingridients">Ingridients *:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="ingridients" placeholder="Enter Ingridients (e.g salt, pepper, maggi, rice)" required="required" />
										</div>
									</div>
									
									
									<!-- Comment -->
									<div class="form-group">
										<label class="control-label col-sm-4" for="comment">Comment On Meal:</label>
										<div class="col-sm-8">
											<textarea class="form-control" name="comment" placeholder="Enter extra details for the meal"></textarea>
										</div>
									</div>
									
									<!-- Meal restrictions -->
									<div class="form-group">
										<label class="control-label col-sm-4" for="meal_type">Meal Ordering Restrictions:</label>
										<div class="col-sm-8">
											<div class="radio">
												<label>
													<input type="radio" name="meal_type" value="1" class="meal_type" checked="checked" />
													<span>Restricted Meal</span>
													<small>[i.e Meal has restricted ordering time(s)]</small>
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" class="meal_type" name="meal_type" value="2" />
													<span>Open Meal</span>
													<small>[i.e Meal can be ordered at anytime]</small>
												</label>
											</div>
										</div>
									</div>
									
									<!-- Start and ending time -->
									<div class="form-group" id="startEnd">
										<label class="control-label col-sm-4" for="duration">Ordering Start & End Time *:</label>
										<div class="col-sm-8">
											<div class="col-sm-6">
												<input type="time" class="form-control" name="start_time" placeholder="Enter Start Time" />
											</div>
											<div class="col-sm-6">
												<input type="time" class="form-control" name="end_time" placeholder="Enter End Time" />
											</div>
										</div>
									</div>
									
									<!-- 1 Serving Price -->
									<div class="form-group">
										<label class="control-label col-sm-4" for="price">Price for 1 Serving [NGN] *:</label>
										<div class="col-sm-8">
											<input type="number" min="1" class="form-control" name="servings_price" placeholder="Enter Price for 1 serving" required="required" />
										</div>
									</div>
									
									<!-- Saving Button -->
									<div class="form-group">
										<div class="col-sm-12">
											<div class="btn-group pull-right">
												<button id="updateMeal" class="btn btn-success" type="submit">Update Meal</button>
												<button id="cancelUpdate" class="btn btn-danger" type="button">Cancel Update</button>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-12 pop9" 
			data-toggle="popover" data-content="View Meals Below. Click me to view the next option" data-trigger="hover"
			title="Meals Display / Listing [Help Option]"  data-placement="top">
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title">Meal Listing</div>
				</div>
				<div class="panel-body table-striped">
					<table class="table" id="myLog">
						<thead>
							<th width="7%"></th>
							<th></th>
							<th></th>
							<th width="12%"></th>
							<th width="10%"></th>
						</thead>
						<tbody>
							<?php foreach($meals as $meal):?>
							<tr>
								<td><img class="thumbnail" src="<?=($meal->image_url);?>" style="width:100%; padding:0px !important; margin-bottom:0px!important;" /></td>
								<td style="vertical-align:middle; text-align:right;"><?=$meal->name;?></td>
								<td style="vertical-align:middle; text-align:left; border-left:1px solid #f2f2f2;"><?=$meal->ingredients;?></td>
								<td style="vertical-align:middle; text-align:center; font-size:12px;"><?=($meal->start_time !== NULL)? "{$meal->start_time} - {$meal->end_time}":"Unrestricted Meal";?></td>
								<td style="vertical-align:middle; text-align:center;">
									<div class="btn-group-sm">
										<!-- <button class="glyphicon glyphicon-pencil btn btn-sm btn-default" id="editBtn"  type="button"></button> -->
										<button id="" value="<?=$meal->meal_id;?>" class="removeMeal glyphicon glyphicon-trash btn btn-sm btn-danger pop10"
											data-toggle="popover" data-content="Click here to delete meal" role="button"
											title="Meals Deletion [Help Option]"  data-placement="left" data-trigger="hover"
												></button>
									</div>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	

<script type="text/javascript">

	$('.removeMeal').click(function (evt) {
		var mealId = $(this).val();
		
		$(this).parent().parent().parent().fadeOut('slow', function () {
			var row = $(this);
			$.get('<?=site_url("chef/removeMeal/");?>/'+mealId, function (data) {
				row.remove();
			});
		});
	});
	
	$(function () {
		$('#mealEdit').hide();
		
		$('.pop2').popover('show');	
		
		$('.pop2').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.pop3').popover('show');
		});
		
		$('.pop3').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.pop4').popover('show');
		});
		
		$('.pop4').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.pop5').popover('show');
		});
		
		$('.pop5').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.pop').popover('show');
		});
		
		$('.pop6').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.pop').popover('show');
		});
		
		$('.pop7').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.pop').popover('show');
		});
		
		$('.pop8').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.pop').popover('show');
		});
		
		$('.pop9').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			var counter = 0;
			$('.pop10').each(function () {
				if (counter == 0) {
					$(this).popover('show');
					counter = 1;		
				}
			});
		});
		
		$('.pop10').on('hidden.bs.popover', function (e) {
			$(this).popover('destroy');
			$('.pop11').popover('show');
		});
		
		
		$('.pop3').keydown(function (e) {
			option = 2;
			$(this).popover('hide');
			$('.pop4').popover('show');
		});
		
		$('.pop4').keydown(function (e) {
			option = 3;
			$(this).popover('hide');
			$('.pop5').popover('show');
		});
		
		$('.meal_type').change(function () {
			var val = 1;
			if ($(this).is(':checked'))
				val = $(this).val(); 
			
			if (val == '1' || val == 1) {
				$('.pop6').popover('show');
				$('.pop5').popover('hide');
				$('.pop7').popover('hide');
				
				
			} else {
				$('.pop7').popover('show');
				$('.pop6').popover('hide');
				$('.pop5').popover('hide');
			}

		});
		
		$('.pop6b').change(function (e) {
			$('.pop6').popover('destroy');
			$('.pop7').popover('show');
			
		});
		
		$('.pop7').keydown(function (e) {
			$(this).popover('destroy');
			$('.pop8').popover('show');
			
		});
		
		$('.pop8').mouseover(function (e) {
			$(this).popover('destroy');
			$('.pop9').popover('show');
			
			$('.pop7').blur();
		});
		
		
	});
</script>
		