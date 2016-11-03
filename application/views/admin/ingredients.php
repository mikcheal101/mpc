<div class="col-sm-9">
	<div class="panel">
		<form enctype="multipart/form-data" name="form" novalidate>
			<div class="panel-body">
				<div style="width:150px;">
					<img ngf-thumbnail="ing.ing.image_url" class="img-thumbnail img-responsive" />
				</div>
				<br>
				<span class="btn btn-sm btn-primary" ngf-max-total-size="10MB" 
					ngf-select="ing.ing.upload ($files);"
					ng-model="ing.ing.image_url" accept="image/*">select image</span>
				<br>
				<label for="" style="padding-top: 20px;">
					Name
				</label>
				<input required type="text" style="font-size:15px!important;" name="name" class="form-control" ng-model="ing.ing.name" placeholder="enter name" />
				<div ng-show="form.$submitted || form.name.$touched">
					<small class="text-danger" ng-show="form.name.$error.required || form.name.$error.minlength < 2">
						enter a name!
					</small>
				</div>
				
				<label for="" style="padding-top: 20px;">
					comments
				</label>
				<div class="tinymce" ng-bind="ing.ing.comments" ng-model="ing.ing.comments"></div>
				<br>
			</div>
			<div class="panel-footer">
				<button class="btn btn-success btn-sm btn-outline" ng-click="ing.commit (form);" type="submit">Submit</button>
				<button class="btn btn-danger btn-sm btn-outline" ng-click="ing.reset ();" type="reset">Reset</button>
			</div>
		</form>
	</div>
	<div class="panel">
		<div class="panel-name">
			<h4>Ingredients</h4>
		</div>
		<div class="panel-body">
			<table class="table table-fluid" ng-init="ing.load ();">
				<tr dir-paginate="d in ing.ings | itemsPerPage : 15">
					<td width="130"> 
						<img class="img-fluid img-responsive img-rounded" width="120px" alt="{{d.name}}" ngf-thumbnail="d.image_url" />
					</td>
					<td width="25%"> 
						<h4 ng-click="ing.set (d);" class="text-primary small">
							<span ng-bind="d.name"></span>
						</h4>
					</td>
					<td> 
						<span class="small" ng-bind="d.comments | limitTo: 100"></span>
					</td>
					<td width="10">
						<i class="fa fa-times text-danger" ng-click="ing.drop (d);"></i>
					</td>
				</tr>
			</table>
			<dir-pagination-controls></dir-pagination-controls>	
		</div>
		
	</div>
</div>
