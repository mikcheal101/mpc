<div class="col-sm-9">
	<div class="panel">
		<form enctype="multipart/form-data" name="form" novalidate>
			<div class="panel-body">
				<div style="width:150px;">
					<img ngf-thumbnail="shop.shop.url" class="img-thumbnail img-responsive" />
				</div>
				<br>
				<span class="btn btn-sm btn-primary" ngf-max-total-size="10MB" 
					ngf-select="shop.shop.upload ($files);"
					ng-model="shop.shop.url" accept="image/*">select image</span>
				<br>
				<label for="" style="padding-top: 20px;">
					Title
				</label>
				<input required type="text" style="font-size:15px!important;" name="title" class="form-control" ng-model="shop.shop.title" 
					placeholder="enter title" />
				<div ng-show="form.$submitted || form.title.$touched">
					<small class="text-danger" ng-show="form.title.$error.required || form.title.$error.minlength < 2">
						enter a title!
					</small>
				</div>
				
				<label for="" style="padding-top: 20px;">
					Address
				</label>
				<div class="tinymce" ng-bind="shop.shop.address" ng-model="shop.shop.address"></div>
				<br>
				
				<label for="" style="padding-top: 20px;">
					Description
				</label>
				<div class="tinymce" ng-bind="shop.shop.description" ng-model="shop.shop.description"></div>
				<br>
			</div>
			<div class="panel-footer">
				<button class="btn btn-success btn-sm btn-outline" ng-click="shop.commit (form);" type="submit">Submit</button>
				<button class="btn btn-danger btn-sm btn-outline" ng-click="shop.reset ();" type="reset">Reset</button>
			</div>
		</form>
	</div>
	<div class="panel">
		<div class="panel-name">
			<h4>Shops & Markets</h4>
		</div>
		<div class="panel-body">
			<table class="table table-fluid " ng-init="shop.load ();">
				<tr dir-paginate="d in shop.shops | itemsPerPage : 15" width="100%">
					<td width="130"> 
						<img class="img-fluid img-responsive img-rounded" width="120px" alt="{{d.title}}" ngf-thumbnail="d.url" />
					</td>
					<td width="25%"> 
						<h4 ng-click="shop.set (d);">
							<span class="small" ng-bind="d.title"></span>
						</h4>
					</td>
					<td> 
						<span ng-bind="d.description | limitTo: 100"></span>
					</td>
					<td width="10">
						<i class="fa fa-times text-danger" ng-click="shop.drop (d);"></i>
					</td>
				</tr>
			</table>
			<dir-pagination-controls></dir-pagination-controls>	
			
		</div>
		
	</div>
</div>
