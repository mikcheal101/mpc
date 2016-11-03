<div class="col-sm-9">
	<div class="panel">
		<form enctype="multipart/form-data" name="form" novalidate>
			<div class="panel-body">
				<div style="width:150px;">
					<img ngf-thumbnail="place.place.image_url" class="img-thumbnail img-responsive" />
				</div>
				<br>
				<span class="btn btn-sm btn-primary" ngf-max-total-size="10MB" 
					ngf-select="place.place.upload ($files);"
					ng-model="place.place.image_url" accept="image/*">select image</span>
				<br>
				
				<label for="" style="padding-top: 20px;">
					Title
				</label>
				<input required type="text"  style="font-size:15px!important;" name="title" class="form-control" ng-model="place.place.title" placeholder="enter title" />
				<div ng-show="form.$submitted || form.title.$touched">
					<small class="text-danger" ng-show="form.title.$error.required || form.title.$error.minlength < 2">
						enter a title!
					</small>
				</div>
				
				<label for="" style="padding-top: 20px;">
					Description
				</label>
				<div class="tinymce" ng-bind="place.place.description" ng-model="place.place.description"></div>
				<br>
			</div>
			<div class="panel-footer">
				<button class="btn btn-success btn-sm btn-outline" ng-click="place.commit (form);" type="submit">Submit</button>
				<button class="btn btn-danger btn-sm btn-outline" ng-click="place.reset ();" type="reset">Reset</button>
			</div>
		</form>
	</div>
	<div class="panel">
		<div class="panel-title">
			<h4>New Place</h4>
		</div>
		<div class="panel-body">
			<table class="table table-fluid" ng-init="place.loadPlaces ();">
				<tr dir-paginate="p in place.places | itemsPerPage : 15">
					<td width="130"> 
						<img class="img-fluid img-responsive img-rounded" width="120px" alt="{{d.title}}" ngf-thumbnail="p.image_url" />
					</td>
					<td width="25%"> 
						<h4 ng-click="place.set (d);">
							<span ng-bind="p.title"></span>
						</h4>
					</td>
					<td> 
						<span ng-bind="p.description | limitTo: 100"></span>
					</td>
					<td width="10">
						<i class="fa fa-times text-danger" ng-click="place.drop (p);"></i>
					</td>
				</tr>
			</table>
			<dir-pagination-controls></dir-pagination-controls>	
		</div>
	</div>
</div>
