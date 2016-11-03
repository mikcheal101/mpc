<div class="container-fluid" >
	<div class="row">
		<div class="col-sm-12 p-l-00">
			<div class="col-sm-8 m-t-10">
				<div class="btn-group">
					<span class="btn btn-sm btn-default" ng-click="ingredients.createIng();">New Ingredient</span>
				</div>
				<?=form_open_multipart('');?>
				<div class="panel panel-default m-t-05">
					<div class="panel-heading"><h5 class="m-t-05" ng-bind="ingredients.selectedIng.name"></h5></div>
					<div class="panel-body">
						<div class="col-sm-12 p-l-00 p-r-00 m-b-10">
							<img ng-if="ingredients.selectedIngSize >= 1" id="" class="img-thumbnail" ng-src="{{ingredients.selectedIng.image_url}}" />
							<img ng-if="ingredients.selectedIngSize == 0 && ingredients.newImage.length > 0" id="preview" ng-src="{{ingredients.newImage}}" class="img-thumbnail" />
						</div>
						
						<div class="col-sm-12 p-l-00 p-r-00 m-b-10">
							<input type="url" ng-model="ingredients.selectedIng.image_url" placeholder="Enter Image Url" name="image_url" class="form-control" ng-change="ingredients.setImage();"/>
						</div>
						
						<div class="col-sm-12 p-l-00 p-r-00 m-b-10">
							<input type="text" name="name" ng-model="ingredients.selectedIng.name" placeholder="Enter Ingredient Title" class="form-control" />
						</div>
						
						<div class="col-sm-12 p-l-00 p-r-00">
							<textarea class="form-control tinymce" name="comment" placeholder="Enter Ingredient Description">{{ingredients.selectedMeal.comments}}</textarea>
						</div>
						
					</div>
					<div class="panel-footer">
						<div class="btn-group ">
							<span ng-click="ingredients.updateIngs();" ng-if="ingredients.selectedIngSize > 0" class="btn btn-sm btn-info">Update Changes</span>
							<a href="<?=base_url('administrator/dropIng/');?>/{{ingredients.selectedIng.id}}" ng-if="ingredients.selectedIngSize > 0" class="btn btn-sm btn-orange">Delete Ingredient</a>
							<input type="submit" name="submit" ng-if="ingredients.selectedIngSize === 0" class="btn btn-sm btn-success" value="Save Ingridient" />
						</div>
					</div>
				</div>
				<?=form_close();?>
			</div>
			<div class="col-sm-4 white-background">
				<h3 class="m-t-10 text-green">Ingredients Listing</h3>
				<table class="table table-borderless">
					<tr dir-paginate="ing in ingredients.ings | itemsPerPage:10" ng-click="ingredients.selectedIng = ing; ingredients.displayIng();">
						<td ><img ng-src="{{ing.image_url}}" class="img-rounded" style="height: 40px;" /> </td>
						<td><span ng-bind="ing.name"></span></td>
					</tr>
				</table>
				<dir-pagination-controls></dir-pagination-controls>		
			</div>	
		</div>
		
	</div>
</div>