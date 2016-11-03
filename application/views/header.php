<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?="{$title} - {$sub_title}";?></title>

		<!-- Mobile support -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- Mobile support -->

		<!-- META DATA support -->
		<meta name="description" content="<?=$description;?>, Whatever You Choose Your Stomach Will Thank You. We bring food from the best Chef's in Nigeria to you, cooked uniquely for you. Just browse through your favourite dishes or search through Chefs by their specialties, create a meal plan and have the meals delivered to you at home or at the office. Invite a Chef to come cook at your home or get a great lesson. Whatever you choose, your stomach will thank you" />
		<meta name="keywords" content="<?=$keywords;?>, My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" >
		<!-- META DATA support -->

		<!-- FACEBOOK header meta data -->
		<meta property="og:url"         content="http://mypersonalchef.com.ng/<?=$page;?>" />
		<meta property="og:type"		content="<?=$type;?>" />
		<meta property="og:title" 		content="My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" />
		<meta property="og:site_name" 	content="MPC, My Personal Chef" />
		<meta property="og:image"   	content="<?=base_url('assets/mpclogo.ico');?>" />

		<meta name="og:description"	 	content="<?=$description;?>, Whatever You Choose Your Stomach Will Thank You. We bring food from the best Chef's in Nigeria to you, cooked uniquely for you. Just browse through your favourite dishes or search through Chefs by their specialties, create a meal plan and have the meals delivered to you at home or at the office. Invite a Chef to come cook at your home or get a great lesson. Whatever you choose, your stomach will thank you" />
		<meta name="og:keywords" 		content="<?=$keywords;?>, My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" >
		<!-- FACEBOOK header meta data -->

		<!-- TWITTER header meta data -->
		<meta name="twitter:title" content="My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" />
		<!-- TWITTER header meta data -->

		<!-- GOOGLE-PLUS header meta data -->
		<!-- GOOGLE-PLUS header meta data -->

		<?=link_tag('assets/mpclogo.ico', 'shortcut icon', 'image/x-icon', 'Mypersonalchef.com.ng icon');?>

		<!-- Material Design fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />


		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel="stylesheet" />
		<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' />

		<?=link_tag('assets/bootstrap/bootstrap.min.css', 'stylesheet');?>
		<?=link_tag('assets/fa/css/font-awesome.min.css', 'stylesheet');?>

		<?=link_tag('assets/bootcards-1.1.2/dist/css/bootcards-desktop.min.css', 'stylesheet');?>


		<link href="http://fezvrasta.github.io/snackbarjs/dist/snackbar.min.css" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />


		<script src="http://code.jquery.com/jquery-1.12.0.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0-beta.1/jquery-ui.js" type="text/javascript"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
		<script src="<?=base_url('assets/bootcards-1.1.2/dist/js/bootcards.min.js');?>" type="text/javascript"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
		<script src="<?=base_url('assets/Sortable-master/Sortable.js');?>"></script>

		<!-- angular js -->
		<script src="<?=base_url('assets/angular/angular.min.js');?>"></script>
		<script src="<?=base_url('assets/assets/js/angular-socialshare.min.js');?>"></script>

		<script src="<?=base_url('assets/angular/app.js');?>"></script>
		<script src="<?=base_url('assets/angular/mealsCntrl.js');?>"></script>
		<script src="<?=base_url('assets/angular/ordersCntrl.js');?>"></script>
		<script src="<?=base_url('assets/angular/chefsCntrl.js');?>"></script>

		<!-- end angular -->

		<script src="http://platform.twitter.com/widgets.js"></script>

		<!-- number formatting -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
		<!-- number formatting -->

		<!-- date picker -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.js"></script>
		<!-- date picker -->

		<!-- Facebook Class -->
		<script src="<?=base_url('assets/javascriptClasses/Facebook.js');?>"></script>
		<!-- Facebook Class -->

		<style type="text/css">
			td{
				text-align: center;
				vertical-align:middle;
			}
			thead tr td {
				font-weight: bold;
			}

			.modal-footer {
				background-color: #FFFFFF;
				border-bottom-right-radius: 5px;
				border-bottom-left-radius: 5px;
			}

			.modal-body {
				background-color: #FFFFFF;
			}

			.modal-header {
				background-color: #FFFFFF;
				border-top-right-radius: 5px;
				border-top-left-radius: 5px;
			}

			#input {
				border-radius:
			}

			.error{
				padding-left: 10px;
				color: red;
				font-size: 11px;
				font-weight: 100;
			}

			.myControl,
			.myControl:focus {
				border: none;
				box-shadow: none;
				border-bottom: 1px solid #CBE2CB;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 12px;
			}

			.no-gutter > [class*='col-'] {
				padding-left:0;
			    padding-right:0;
			}

			.one-gutter > [class*='col-'] {
				padding-left:4px;
			    padding-right:4px;
			}

			.animate-enter {
				-webkit-transition: 1s linear all; /* Chrome */
				transition: 1s linear all;
				opacity: 0;
			}

			.animate-enter.animate-enter-active {
				opacity: 1;
			}

			.bar {
			  width: 100%;
			  height: 4px;
			  border: 1px solid green;
			  border-radius: 3px;
			  background-image:
			    repeating-linear-gradient(
			      -45deg,
			      green,
			      green 5px,
			      #fff 10px,
			      #fff 20px /* determines size */
			    );
			  background-size: 28px 28px;
			  animation: move .5s linear infinite;
			}

			@keyframes move {
			  0% {
			    background-position: 0 0;
			  }
			  100% {
			    background-position: 28px 0;
			  }
			}

		</style>

		<script type="text/javascript">
			$(function (){
				$('#expirydate').datepicker({format:'mm/yy'});
			});
		</script>
	</head>
	<body ng-app="mpc">

		<script>
			window.fbAsyncInit = function() {
			  	FB.init({ appId: '<?=FACEBOOK;?>', xfbml: true, version: 'v2.6'});
			 };

	  		(function(d, s, id){
		     	var js, fjs = d.getElementsByTagName(s)[0];
		     	if (d.getElementById(id)) {return;}
		     	js = d.createElement(s); js.id = id;
		     	js.src = "//connect.facebook.net/en_US/sdk.js";
		     	fjs.parentNode.insertBefore(js, fjs);
		   	}(document, 'script', 'facebook-jssdk'));
		</script>


		<nav id="mainNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toogle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?=anchor('user/index', '<b>mypersonalchef.com.ng</b>', array('class'=>'navbar-brand', 'style'=>'font-size:20px;'));?>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-left">
						<?php if (isset($user_profile)){ ?>
								<li class="dropdown">
						        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						        	<?=$user_profile['name'];?>
						        	<span class="caret"></span></a>
						        	<ul class="dropdown-menu">
						        		<li><?=anchor('user/myProfile', 'My Profile');?></li>
						        		<li role="separator" class="divider"></li>
						        		<!-- <li><a href="#" class="page-scroll">My Orders</a></li> -->
						        		<li role="separator" class="divider"></li>
										<!-- <li><?=anchor('user/myProfile#mealplan', 'Meal Plan');?></li> -->
										<li><?=anchor('#', 'Meal Plan');?></li>
							        	<li role="separator" class="divider"></li>
										<li><?=anchor('user/facebookLogout', 'SignOut');?></li>

									</ul>
						        </li>
						<?php	}
							if (isset($_SESSION['user'])) { ?>
								<li class="dropdown">
						        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						        	<?=($session!=null)?"Chef ".$session->username:"Chef ";?>
						        	<span class="caret"></span></a>
						        	<ul class="dropdown-menu">
							        	<li><?=anchor('chef/myProfile', 'My Profile');?></li>
							        	<li role="separator" class="divider"></li>
										<li><?=anchor('user/facebookLogout', 'SignOut');?></li>
									</ul>
						        </li>
							<?php } ?>
					</ul>
                	<ul class="nav navbar-nav navbar-right">
                        <li><?=anchor('forumBoard', 'Forum');?></li>
						<li><?=anchor('#', 'Make A Meal Plan');?></li>
						<li><?=anchor('user/viewMeals', 'Browse Meals');?></li>
						<li><?=anchor('user/viewChefs', 'Chef Profiles');?></li>
						<li><?=anchor('#contact', 'Contact Us', array('class'=>"page-scroll"));?></li>
						<li>
							<?=anchor('#ordersDialog', '<i class="glyphicon glyphicon-shopping-cart"></i> Cart', array('data-toggle'=>"modal", 'data-target'=>"#ordersDialog"));?>
			        	</li>
					</ul>
				</div>

			</div>
		</nav>


		<!-- View Orders -->
		<div class="modal fade" id="ordersDialog" tabindex="-1" role="dialog" ng-init="loadOrders();" aria-labelledby="ordersDialogLabel" ng-controller="ordersCntrl">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="ordersDialogLabel">
							<i class="glyphicon success glyphicon-shopping-cart pull-left"></i>
							My Cart <small>[<?=date('dS M, Y');?>]</small>
						</h4>
					</div>
					<div class="modal-body">
						<div class="error" style="color:red;" id="errorPane"></div>
							<div class="row">
			        			<div class="col-sm-12">
			        				<table class="table table-striped table-bordered">
					        			<thead>
					        				<tr class="active">
					        					<td>Meal</td>
					        					<td>Servings</td>
					        					<td>&#8358; Price / Serving</td>
					        					<td>&#8358; Cost</td>
					        				</tr>
					    				</thead>

					    				<tbody>
					    					<tr ng-repeat="order in orders">
					    						<td style="text-align: center;">{{order.meal.name}}<input type="hidden" class="meal" value="{{order.id}}" /></td>
				        						<td style="text-align: center;">{{order.servings}}</td>
				        						<td style="text-align: center;">{{order.price}}</td>
				        						<td style="text-align: left;">{{order.cost}}</td>
					    					</tr>
					        			</tbody>
					        			<tfoot>
					    					<tr>
					    						<td colspan="3" style="text-align: right;">Sub Total:</td>
					    						<th style="text-align: left;">&#8358; {{subTotal}}</th>
					    					</tr>
					    				</tfoot>
			        				</table>
			        			</div>
			        		</div>

			        		<div ng-show="payment.checkProcessing()" class="bar"></div>
			        		<br>

			        		<form name="paymentForm">
				        		<div class="row">
						    		<div class="col-sm-4">Select a Payment Option: </div>
						    		<div class="col-sm-8">
						    			<label class="active">
											<input type="radio" id="cc" class="status paymentOption" ng-model="payment.option" name="paymentOption" value="1"  />
											Credit Cards
										</label>
										<label class="">
											<input type="radio" id="pod" class="status info paymentOption" ng-model="payment.option" name="paymentOption" value="2" checked="checked"  />
											Pay On Delivery
										</label>
						    		</div>
								</div>

						    	<div class="row">
						    		<div class="col-sm-12">
						    			<div class="form-horizontal form" role="form">
						    				<div class="form-group">
						    					<div class="col-sm-12">
						    						<label for="deliveryAddress">Delivery Address:</label>
							    					<div class="input-group">
														<textarea ng-model="payment.address" class="form-control" placeholder="Please, Enter the delivery address"
															name="deliveryAddress" id="deliveryAddress" title="Enter the delivery Address"></textarea>
														<div class="input-group-addon">
															<i class="glyphicon glyphicon-home"></i>
														</div>
													</div>
													<p class="error" ng-show="paymentForm.deliveryAddress.$touched && (paymentForm.deliveryAddress.$invalid || payment.address.length < 4)">Please Enter a valid Delivery Address!</p>
						    					</div>
						    				</div>
						    			</div>

						    		</div>
						    	</div>

								<div class="row">
									<div class="col-sm-12">
										<div class="form-horizontal form" role="form">
											<div class="form-group">

												<div class="col-sm-6">
													<label for="emailAddress">Email Address:</label>
													<div class="input-group">
														<input type="email" name="email" class="form-control" placeholder="Enter Valid Email address" id="emailAddress" ng-model="payment.email" />
														<div class="input-group-addon">
															<i class="glyphicon glyphicon-envelope"></i>
														</div>
													</div>
													<p class="error" ng-show="paymentForm.email.$touched && (paymentForm.email.$invalid || payment.email.length < 3)">Please Enter a valid Email Address!</p>
												</div>

												<div class="col-sm-6">
													<label for="tel">Tel Number:</label>
													<div class="input-group">
														<input type="tel" placeholder="Enter A Valid Mobile Number" name="tel" class="form-control" id="tel" ng-model="payment.tel" />
														<div class="input-group-addon">
															<i class="glyphicon glyphicon-earphone"></i>
														</div>
													</div>
													<p class="error" ng-show="paymentForm.tel.$touched && (paymentForm.tel.$invalid || payment.tel.length < 3)">Please Enter a valid Tel. Number!</p>
												</div>
											</div>


											<div ng-show="payment.getPaymentOption()">
												<hr>
												<div class="form-group">
													<div class="col-sm-6">
														<label for="ccn">Credit Card Number:</label>
														<div class="input-group">
															<input type="text" maxlength="10" class="form-control" required name="ccn" placeholder="Card Number" id="ccn" ng-model="payment.ccn" ng-pattern="onlyNumbers" />
															<div class="input-group-addon">
																<i class="glyphicon glyphicon-credit-card"></i>
															</div>
														</div>
														<p class="error" ng-show="paymentForm.ccn.$touched && (paymentForm.ccn.$invalid || payment.ccn.length < 10)">Invalid Credit Card Number!</p>
													</div>
													<div class="col-sm-3">
														<label for="cvv">CVV:</label>
														<div class="input-group">
															<input type="text" maxlength="4" minlength="3" required name="cvv" placeholder="CVV" class="form-control" id="cvv" ng-model="payment.cvv" ng-pattern="onlyNumbers" />
															<div class="input-group-addon">
																<i class="glyphicon glyphicon-lock"></i>
															</div>
														</div>
														<p class="error" ng-show="paymentForm.cvv.$touched && (paymentForm.cvv.$invalid || payment.cvv.length < 3)">Invalid CVV!</p>
													</div>
													<div class="col-sm-3">
														<label for="expirydate">Expiry Date:</label>
														<div class="input-group date">
															<input type="text" readonly="readonly" required name="expDate" placeholder="Expiry Date"
															class="form-control" id="expirydate" ng-model="payment.expirydate" />
															<div class="input-group-addon">
																<i class="glyphicon glyphicon-calendar"></i>
															</div>
														</div>
														<p class="error" ng-show="paymentForm.expDate.$touched && (paymentForm.expDate.$invalid || payment.expirydate.length < 3)">Invalid Expiry Date!</p>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</form>
			  			</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button ng-show="payment.checkPaymentStatus()"
								type="button" class="btn btn-success" id="checkoutBtn"
								ng-click="payment.checkout();"
								>Checkout</button>
			  			</div>
					</div>
				</div>
			</div>
