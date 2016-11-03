<div class="container-fluid" >
	<div class="row">
		<div class="col-sm-12 p-l-00">
			<div class="col-sm-8 m-t-10">
				<div class="btn-group">
					<span class="btn btn-sm btn-default" ng-click="newPlace.createPlace();">New Place</span>
				</div>
				<?=form_open_multipart('');?>
				<div class="panel panel-default m-t-05">
					<div class="panel-heading"><h5 class="m-t-05" ng-bind="newPlace.selectedPlace.title"></h5></div>
					<div class="panel-body">
						
						<div class="col-sm-12 p-l-00 p-r-00 m-b-10">
							<img ng-if="newPlace.selectedPlaceSize > 0" id="" class="img-thumbnail" ng-src="{{newPlace.selectedPlace.image_url}}" />
							<img ng-if="newPlace.selectedPlaceSize == 0 && newPlace.newImage.length > 0" id="preview" ng-src="{{newPlace.newImage}}" class="img-thumbnail" />
						</div>
						
						<div class="col-sm-12 p-l-00 p-r-00 m-b-10">
							<input type="url" ng-model="newPlace.selectedPlace.image_url" placeholder="Enter Image Url" name="image_url" class="form-control" ng-change="newPlace.setImage();"/>
						</div>
						
						<div class="col-sm-12 p-l-00 p-r-00 m-b-10">
							<input type="text" name="title" ng-model="newPlace.selectedPlace.title"  placeholder="Enter Place Title" class="form-control" />
						</div>
						
						<div class="col-sm-12 p-l-00 p-r-00">
							<textarea class="form-control tinymce" name="description" placeholder="Enter Place Description">{{newPlace.selectedPlace.description}}</textarea>
						</div>
						
					</div>
					<div class="panel-footer">
						<div class="btn-group ">
							<span ng-click="newPlace.updatePlace();" ng-if="newPlace.selectedPlaceSize > 0" class="btn btn-sm btn-info">Update Changes</span>
							<a href="<?=base_url('administrator/dropPlace/');?>/{{newPlace.selectedPlace.id}}" ng-if="newPlace.selectedPlaceSize > 0" class="btn btn-sm btn-orange">Delete Place</a>
							<input type="submit" name="submit" ng-if="newPlace.selectedPlaceSize === 0" class="btn btn-sm btn-success" value="Save Place" />
						</div>
					</div>
				</div>
				<?=form_close();?>
			</div>
			<div class="col-sm-4 white-background">
				<h3 class="m-t-10 text-green">Places Listing</h3>
				<table class="table table-borderless">
					<tr dir-paginate="place in newPlace.places | itemsPerPage:10" ng-click="newPlace.selectedPlace = place; newPlace.displayPlace();">
						<td ><img ng-src="{{place.image_url}}" class="img-rounded" style="height: 40px;" /> </td>
						<td><span ng-bind="place.title"></span></td>
					</tr>
				</table>
				<dir-pagination-controls></dir-pagination-controls>		
			</div>	
		</div>
		
	</div>
</div>