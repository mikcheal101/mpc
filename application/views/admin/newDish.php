<div class="container-fluid" >
	<div class="row">
		<div class="col-sm-12 p-l-00">
			<div class="col-sm-8 m-t-10">
				<div class="btn-group">
					<span class="btn btn-sm btn-default" ng-click="newMeal.createNewMeal();">New Meal</span>
				</div>
				<?=form_open_multipart('', array ('name'=>'form'));?>
				<div class="panel panel-default m-t-05">
					<div class="panel-heading"><h5 class="m-t-05" ng-bind="newMeal.selectedMeal.Heading"></h5></div>
					<div class="panel-body">
						
						<div class="col-sm-12 p-l-00 p-r-00 m-b-10">
							<img ng-if="newMeal.selectedMealSize > 0" id="" class="img-thumbnail" ng-src="{{newMeal.selectedMeal.image}}" />
							<img ng-if="newMeal.selectedMealSize === 0" id="preview" ng-src="{{newMeal.newImage}}" class="img-thumbnail" />
						</div>
						
						<div class="col-sm-12 p-l-00 p-r-00 m-b-10">
							<input type="url" placeholder="Enter Image url" ng-model="newMeal.selectedMeal.image" name="url" class="form-control" ng-change="newMeal.setImage();"/>
						</div>
						
						<div class="col-sm-12 p-l-00 p-r-00 m-b-10">
							<input type="text" name="heading" ng-model="newMeal.selectedMeal.Heading"  placeholder="Enter New Dish Title" class="form-control" />
						</div>
						
						<div class="col-sm-12 p-l-00 p-r-00">
							<textarea class="form-control tinymce" name="comment" placeholder="Enter Description">{{newMeal.selectedMeal.comment}}</textarea>
						</div>
						
					</div>
					<div class="panel-footer">
						<div class="btn-group ">
							<span ng-click="newMeal.updateMeal();" ng-if="newMeal.selectedMealSize > 0" class="btn btn-sm btn-info">Update Changes</span>
							<a href="<?=base_url('administrator/dropMeal/');?>/{{newMeal.selectedMeal.id}}" ng-if="newMeal.selectedMealSize > 0" class="btn btn-sm btn-orange">Delete Meal</a>
							<input type="submit" name="submit" ng-if="newMeal.selectedMealSize === 0" class="btn btn-sm btn-success" value="Save Meal" />
						</div>
					</div>
				</div>
				<?=form_close();?>
			</div>
			<div class="col-sm-4 white-background">
				<h3 class="m-t-10 text-green">Meals Listing</h3>
				<table class="table table-borderless">
					<tr dir-paginate="meal in newMeal.meals | itemsPerPage:10" ng-click="newMeal.selectedMeal = meal; newMeal.displayMeal();">
						<td ><img ng-src="{{meal.image}}" class="img-rounded" style="height: 40px;" /> </td>
						<td>{{meal.Heading}}</td>
					</tr>
				</table>
				<dir-pagination-controls></dir-pagination-controls>		
			</div>	
		</div>
		
	</div>
</div>