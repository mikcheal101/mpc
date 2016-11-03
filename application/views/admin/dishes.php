<div class="col-sm-9">
	<div class="panel">
		<form enctype="multipart/form-data" name="form" novalidate>
			<div class="panel-body">
				<div style="width:150px;">
					<img ngf-thumbnail="dish.dish.image" class="img-thumbnail img-responsive" />
				</div>
				<br>
				<span class="btn btn-sm btn-primary" ngf-max-total-size="10MB" 
					ngf-select="dish.dish.upload ($files);"
					ng-model="dish.dish.image" accept="image/*">select image</span>
				<br>
				<label for="" style="padding-top: 20px;">
					Heading
				</label>
				<input required type="text" style="font-size:15px!important;" name="heading" class="form-control" ng-model="dish.dish.Heading" placeholder="enter heading" />
				<div ng-show="form.$submitted || form.heading.$touched">
					<small class="text-danger" ng-show="form.heading.$error.required || form.heading.$error.minlength < 2">
						enter a heading!
					</small>
				</div>
				
				<label for="" style="padding-top: 20px;">
					Comment
				</label>
				<div class="tinymce" ng-bind="dish.dish.comment" ng-model="dish.dish.comment"></div>
				<br>
			</div>
			<div class="panel-footer">
				<button class="btn btn-success btn-sm btn-outline" ng-click="dish.commit (form);" type="submit">Submit</button>
				<button class="btn btn-danger btn-sm btn-outline" ng-click="dish.reset ();" type="reset">Reset</button>
			</div>
		</form>
	</div>
	<div class="panel">
		<div class="panel-heading">
			<h4>New Dishes</h4>
		</div>
		<div class="panel-body">
			<table class="table table-fluid" ng-init="dish.loadDishes ();">
				<tr dir-paginate="d in dish.dishes | itemsPerPage : 15">
					<td width="130"> 
						<img class="img-fluid img-responsive img-rounded" width="120px" alt="{{d.Heading}}" ngf-thumbnail="d.image" />
					</td>
					<td width="25%"> 
						<h4 ng-click="dish.set (d);">
							<span ng-bind="d.Heading"></span>
						</h4>
					</td>
					<td> 
						<span ng-bind="d.comment | limitTo: 100"></span>
					</td>
					<td width="10">
						<i class="fa fa-times text-danger" ng-click="dish.drop (d);"></i>
					</td>
				</tr>
			</table>
			<dir-pagination-controls></dir-pagination-controls>	
		</div>
		
	</div>
</div>
