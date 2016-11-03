<div class="col-sm-9" ng-init="com.load ();">
	<div class="col-sm-4">
		<div class="card">
			<div class="card-block">
				<h4 class="card-title text-capitalize text-primary" ng-bind="com.com.name"></h4>
				<h6 class="card-subtitle text-muted" ng-bind="com.com.date | date : 'yyyy, MMMM' ">2016, January</h6>
			</div>
			<div style="max-width: 100%;">
				<img ngf-thumbnail="com.com.main_picture" class="img-responsive" alt="{{com.com.name}}"/>
			</div>
			<div class="card-block">
				<p class="card-text"></p>
				<span ng-click="com.com.drop ();" class="card-link text-danger">drop</span>
				<span ngf-max-total-size="10MB" 
						ngf-select="com.com.upload ($files);"
						ng-model="com.com.main_picture" accept="image/*" 
						class="card-link text-primary">select / change Image</span>
			</div>
		</div>
	</div>
	
	<div class="col-sm-8">
		<div class="panel">
			<form enctype="multipart/form-data" name="form" novalidate>
				<div class="panel-body">
					<label for="" style="padding-top: 20px;">
						Fullname:
					</label>
					<input required type="text" style="font-size:15px!important;" name="name" class="form-control" ng-model="com.com.name" placeholder="enter name" />
					<div ng-show="form.$submitted || form.name.$touched">
						<small class="text-danger" ng-show="form.name.$error.required || form.name.$error.minlength < 2">
							enter a name!
						</small>
					</div>
					
					<br>
					<label for="" style="padding-top: 20px;">
						Year & Month:
					</label>
					<div class="form-group row">
						<div class="col-xs-12">
							<input required type="month" style="font-size:15px!important;" name="date" class="form-control" ng-model="com.com.date" placeholder="enter Yeaer & Month" />
						</div>
					</div>
					<div ng-show="form.$submitted || form.date.$touched">
						<small class="text-danger" ng-show="form.date.$error.required">
							enter the year & month!
						</small>
					</div>
					
					
					<label for="" style="padding-top: 20px;">
						Description
					</label>
					<div class="tinymce" ng-bind="com.com.description" ng-model="com.com.description"></div>
					<br>
				</div>
				<div class="panel-footer">
					<button type="submit" class="btn btn-success btn-sm" ng-click="com.commit (form);">submit</button>
				</div>
			</form>
		</div>
	</div>
</div>