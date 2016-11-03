<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4>Chef Login portal</h4>
				</div>
				<?=form_open();?>
				<div class="panel-body">
					<?php  if(strlen(validation_errors()) > 0 || strlen($error)): ?>
					<div class="alert alert-danger alert-dismissible"  role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?=(strlen(validation_errors()) > 0)?validation_errors():"";?>
						<?=(strlen($error) > 0)?$error:"";?>
					</div>
					<?php endif;?>
					<div class="form-horizontal">
						<fieldset>
							<div class="form-group">
								<label class="control-label col-lg-4" for="">Username:</label>
								<div class="col-lg-8">
									<input type="text" id="username_l" name="username" value="<?=set_value('username');?>" minlength="2" class="form-control myControl" placeholder="Enter chef username" required="required" />
								</div>	
							</div>
							
							<div class="form-group">
								<label class="control-label col-lg-4" for="">Password:</label>
								<div class="col-lg-8">
									<input type="password" minlength="6" id="password_l" name="password" class="form-control myControl" placeholder="Enter Password" required="required" />
								</div>	
							</div>
						</fieldset>	
					</div>
				</div>
				<div class="panel-footer">
					<div class="btn-group">
						<button type="button" class="btn btn-danger"><small style="color:white;">Cancel</small></button>
						<button type="submit" class="btn btn-success" id="loginBtn"><small style="color:white;">Authenticate</small></button>
					</div>
				</div>
				<?=form_close();?>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>