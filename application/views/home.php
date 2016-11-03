<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>My Personal Chef Nigeria, <?="{$title} - {$sub_title}";?></title>

		<!-- Mobile support -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
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

		<?=link_tag('assets/css/index.min.css', 'stylesheet', 'text/css'); ?>

		
	</head>
	<body id="page-top" data-spy="scroll" data-target="mainNav" ng-app="mpc" ng-controller="homeController">
		<nav id="mainNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toogle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?=anchor('#page-top', 'mypersonalchef.com.ng', array(
						'style'=>'text-transform:lowercase!important; padding:12px!important; font-size:20px;',
						'class'=>'navbar-brand page-scroll',
						));?>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-left">
						<?php if (isset($user_profile)) : ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<?=$user_profile['name'];?>
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><?=anchor('user/myProfile', 'My Profile');?></li>
								<li role="separator" class="divider"></li>
								<li><?=anchor('#browse', 'Meal Plan');?></li>
								<li role="separator" class="divider"></li>
								<li><?=anchor('user/facebookLogout', 'SignOut');?></li>

							</ul>
						</li>
						<?php endif; ?>
                        
						<?php  if (!is_null ($session)) : $session = (array) $session; ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<?=$session['username'];?>
							<span class="caret"></span></a>
                            <?php 
								$list = array ();
								switch ((int)$session['type']) {
									case ADMIN :
										$list[] = anchor ('admin/', 'My Profile');
									break;
									case USER :
									break;
									case CHEF :
										$list[] = anchor ('chef/myProfile', 'My Profile');
									break;
									default : 
									break;
								} 
								$list[] = anchor ('user/logout', 'SignOut');
								echo ul ($list, array ('class'=>'dropdown-menu'));
							?>
						<?php endif; ?>
					</ul>
                	<ul class="nav navbar-nav navbar-right">
						<li><?=anchor('forumBoard', 'Forum');?></li>
						<?php
							if (!isset($user_profile))
								echo "<li><a href='".site_url('user/viewMeals')."'>Order Meal</a></li>";
						?>
						<li><?=anchor('#about', 'About', array('class'=>"page-scroll"));?></li>

				        <li class="dropdown">
				        	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Extras <span class="caret"></span></a>
				        	<ul class="dropdown-menu">
					        	<li><?=anchor('user/viewChefs', 'Chef Profiles');?></li>
					        	<li role="separator" class="divider"></li>
								<li><?=anchor('user/viewMeals', 'Browse Meals');?></li>
							</ul>
				        </li>

						<li><?=anchor('#contact', 'Contact Us', array('class'=>"page-scroll"));?></li>
						<li><?=anchor('#', 'Create an account', 	array(
							'class'=>"page-scroll",
							'data-toggle'=>"modal",
							'data-target'=>"#CRdialog"));?></li>
					</ul>
				</div>

			</div>
		</nav>

		<header style="height:100%;" class="mobile_header">
			<div class="container-fluid" style="height:100%;">
				<div class="row" style="height:100%;">
					<div class="col-sm-9 mobile_part9" style="height:100%; align-items:center; display: flex; padding:10px;">
						<h1 style="font-family:'c_l'; width: 100%; font-size:100px!important;">The Home of Gourmet Eating &amp; Lifestyle...</h1>
					</div>
					<div class="col-sm-3 mobile_part3"
						style="height:calc(100% - 50px); padding:10px; background-color:rgba(76, 74, 77, 0.4); margin-top:50px;">
						<ul class="nav miNav" style="position: relative; top: 15px; translateY(-50%);
						font-family: 'c_l'; font-size: 13px;">
							<li class="">
								<i class="font-1-4 icon-new-dishes"></i>
								<?=anchor('user/newDishes', 'New Dishes', array('class'=>'font-1'));?>
							</li>
							<li>
								<i class="font-1-4 icon-new-places"></i>
								<?=anchor('user/newPlaces', 'New Places', array('class'=>'font-1'));?>
							</li>
							<li>
								<i class="font-1-4 icon-chef-of-the-month"></i>
								<?=anchor('user/chefOfTheMonth', 'Chef Of The Month', array('class'=>'font-1'));?>
							</li>
							<li>
								<i class="font-1-4 icon-ingredients-of-the-month"></i>
								<?=anchor('user/ingredientsOfTheMonth', 'Ingredients (of The Month)', array('class'=>'font-1'));?>
							</li>
							<li>
								<i class="font-1-4 icon-shopping-markets"></i>
								<?=anchor('user/shoppingMarkets', 'Shopping &amp; Markets', array('class'=>'font-1'));?>
							</li>
							<li>
								<i class="font-1-4 icon-cooking-tips"></i>
								<?=anchor('user/cookingTips', 'Cooking Tips', array('class'=>'font-1'));?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>

		<section id="extras">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 text-center">
						<h2 class="section-heading">mypersonalchef.com.ng</h2>
						<hr class="primary"/>
					</div>
				</div>
			</div>

			<div class="container">
	            <div class="row">
	            	<div class="col-sm-4 text-center">
	            		<div class="service-box">
	            			<a style="text-decoration: none;" href="<?=site_url('user/viewMeals');?>" class="fa fa-4x fa-cutlery wow bounceIn text-primary"></a>
	            			<h4>CREATIONS</h4>
	            			<!-- <p class="text-muted">Fill in details to become a registered chef</p> -->
	            		</div>
	            	</div>

	            	<div class="col-sm-4 text-center">
	            		<div class="service-box">
	            			<a style="text-decoration: none;" href="<?=site_url('user/viewChefs');?>" class="fa fa-4x fa-users wow bounceIn text-primary"></a>
	            			<h4>CHEFS</h4>
	            			<!-- <p class="text-muted">The benefits.</p> -->
	            		</div>
	            	</div>

	            	<div class="col-sm-4 text-center">
	            		<div class="service-box">
	            			<a href="<?=site_url('user/make_a_meal_plan');?>" style="text-decoration: none;" class="fa fa-4x fa-calendar wow bounceIn text-primary" ></a>
	            			<h4>CREATE A MEAL PLAN</h4>
	            			<!-- <p class="text-muted">Set up a day to day plan of your favourite meals to be delivered at your desired time.</p> -->
	            		</div>
	            	</div>
						<!--  http://mypersonalchef.com.ng/chef/checkTel  -->
	            </div>
	        </div>
		</section>

		<section class="" id="our_meals" style="background-color: #F9F8F6; padding: 40px 0px; background-image:url('http://mypersonalchef.com.ng/assets/backgrounds/01.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-align-center" style="padding-bottom: 20px;">
						<h2 style="text-align: center; color: #FFF;">Creations</h2>
					</div>

					<?php for($i=0,$j=0; $i<ceil(count($meals) / 4); $i++) { ?>
					<div class="col-sm-12" style="margin-bottom: 10px;">
						<?php
						for ($k=0; $k<4; $k++, $j++) {
							if($j>=(count($meals))) break;
							$meal = $meals[$j];
							#var_dump($meal);
						?>
						<div class="col-sm-3 " >
							<div class="col-sm-12" style="background-color: #FFF; border: 1px solid #dedede; padding:10px;">
								<div class="background-image" style="height:250px; margin:-11px; background-image: url('<?=$meal->image_url;?>'); background-repeat:no-repeat; background-size:cover; background-position:center;"></div>
								<h4 class="text-align-justify text-success" style="font-size:14px; padding: 10px 0px 10px 0px; line-height: 20px;"><?=$meal->name;?></h4>
								<h5 class="text-align-justify" style="font-size:12px; line-height: 20px; min-height: 40px;"><?=base64_decode($meal->comment);?></h5>
								<p style="border-top: 1px solid #dedede; padding: 10px 10px 0px 10px; margin: 15px -11px 0px -11px;"><?=NGN." ".$meal->price;?> <button class="btn btn-sm btn-success" style="float: right;">add to cart</button></p>
							</div>
						</div>
						<?php } ?>

					</div>
					<?php } ?>

				</div>
			</div>
		</section>

		<!-- about us section -->
		<section class="bg-primary" id="about">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2  col-lg-offset-2 text-center">
						<h2 class="section-heading"><?=ucwords("A Gourmet is a being pleasing to the heavens <p id='charles'>Charles Pierre Monselet</p>");?></h2>
						<hr class="light"/>
						<p class="text-faded">Welcome to a celebration of the creators and enjoyers of haute cuisine..</p>
						<p class="text-faded">If dinner is a poem and a well stuffed pantry is a garden or you journey with your taste buds and see aroma in colour, dancing to the music of the Chef's art then you are home! Grab a plate.</p>
					</div>
				</div>
			</div>
		</section>

		<section id="becomeachef">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 text-center">
						<h2 class="section-heading">BECOME A CHEF</h2>
						<hr class="primary"/>
					</div>
				</div>
			</div>

			<div class="container">
	            <div class="row">
	            	<div class="col-sm-4 text-center">
	            		<div class="service-box">
	            			<a style="text-decoration: none;" href="#" class="fa fa-4x fa-user-plus wow bounceIn text-primary" data-toggle="modal" data-target="#CRdialog"></a>
	            			<h4>CHEF SIGNUP</h4>
	            			<!-- <p class="text-muted">Fill in details to become a registered chef</p> -->
	            		</div>
	            	</div>

	            	<div class="col-sm-4 text-center">
	            		<div class="service-box">
	            			<a style="text-decoration: none;" href="<?=base_url('user/toChefsWithLove');?>" class="fa fa-4x fa-suitcase wow bounceIn text-primary" ></a>
	            			<h4>TO CHEFS WITH LOVE</h4>
	            			<!-- <p class="text-muted">The benefits.</p> -->
	            		</div>
	            	</div>

	            	<div class="col-sm-4 text-center">
	            		<div class="service-box">
	            			<a style="text-decoration: none;" class="fa fa-4x fa-edit wow bounceIn text-primary" href="#"  
								data-toggle="modal" data-target="#Ldialog"></a>
	            			<h4>CHEF LOG-IN</h4>
	            			<!-- <p class="text-muted">Our Guidelines</p> -->
	            		</div>
	            	</div>
	            </div>

	            <!--
	            	<br>
		            <div class="row">
		            	<div class="col-sm-3"></div>
		            	<div class="col-sm-6" style="text-align:center;">
		            		<p><h4>ALREADY A CHEF,   <a href="#" class="btn btn-primary btn-lg page-scroll" data-toggle="modal" data-target="#Ldialog">click here to login</a></h4></p>
		            	</div>
		            	<div class="col-sm-3"></div>

		            </div>
		       	-->
	        </div>
		</section>
		<!-- browse section-->
		<!-- <section class="" id="browse"></section> -->

		<!-- become a chef section -->

		<!-- contact us -->
		<section class="bg-info" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 text-center">
						<h2 class="section-heading">Let's Keep In Touch!</h2>
						<hr class="primary" />
						<p>Ready to place orders / sell meals with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
					</div>

					<div class="col-lg-4 col-lg-offset-2 text-center">
						<i class="fa fa-mobile-phone fa-3x wow bounceIn"></i>
						<p>(+234) 905 587 0296</p>
					</div>

					<div class="col-lg-4 text-center">
						<i class="fa fa-envelope-o fa-3x wow bounceIn"></i>
						<p><?=anchor('mailto:customercare@mypersonalchef.com.ng', 'customercare@mypersonalchef.com.ng', array(

							));?></p>
					</div>

				</div>
			</div>
		</section>
        
		<section class=" weight-500" style="background-color: #000; padding-bottom: 50px!important; padding-top:10px!important; padding-left: 150px; padding-right: 150px; color:#fff;" id="footer">
			<div class="container-fluid text-white">
				<div class="row">
					<div class="col-sm-4">
						<h3><a class="no-decoration" href="#" style="color:#fff!important; font-size: 0.72em;">mypersonalchef.com.ng</a></h3>
					</div>
					<div class="col-sm-4">
						<h3 ><a class="btn btn-default" style="font-size: 14px!important;">Become a chef</a></h3>
					</div>
					<div class="col-sm-4">
						<h3 ><a class="btn btn-danger" style="font-size: 14px!important;">ENJOY GOURMET MEALS</a></h3>
					</div>
				</div>

				<div class="line-ash"></div>

				<div class="row">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4">
						<p><a href="<?=base_url('user/viewMeals');?>" class="font-11 no-decoration">CREATIONS</a></p>
						<p><a href="<?=base_url('user/viewChefs');?>" class="font-11 no-decoration">CHEFS</a></p>
						<p><a href="#" class="font-11 no-decoration">CREATE A MEAL PLAN</a></p>
						<p><a href="#" class="font-11 no-decoration">CHEF SIGN-UP</a></p>
						<p><a href="#" class="font-11 no-decoration">TO CHEFS WITH LOVE</a></p>
						<p><a href="#" data-toggle="modal" data-target="#CRdialog" class="font-11 no-decoration">CHEF SIGNIN</a></p>
					</div>
					<div class="col-sm-4">
						<p><a href="<?=base_url('user/viewMeals');?>" class="font-11 no-decoration">ORDER MEAL</a></p>
						<p><a href="#" class="font-11 no-decoration">HELP</a></p>
						<p><a href="#about" class="font-11 no-decoration">ABOUT MYPERSONALCHEF.COM.NG</a></p>
						<p><a href="#" class="font-11 no-decoration">BROWSE CHEFS</a></p>
						<p><a href="<?=base_url('user/viewMeals');?>" class="font-11 no-decoration">BROWSE MEALS</a></p>
					</div>
				</div>

				<div class="line-ash"></div>

				<div class="row" style="font-size: 11px!important;">
					<div class="col-sm-4 weight-300">&copy; <?=date('Y');?> 3Onze Creations Limited.</div>
					<div class="col-sm-4">
						<a href="" class=" weight-300" style="color: #fff!important;">Safety & State</a>
					</div>
					<div class="col-sm-4">
						<a href="" class="weight-300" style="color: #fff!important;">Terms & Conditions</a>
					</div>
				</div>
			</div>
		</section>


		<!-- the below displays are dialogs -->
		<!-- Login Dialog -->
		<div class="modal fade bs-example-modal-lg" id="Ldialog" 
			tabindex="-1" role="dialog" aria-labelledby="LdialogLabel"
			ng-controller="loginController" ng-init="init ('<?=base_url ();?>');">
			<div class="modal-dialog" role="document">
				<div class="model-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="false">&times;</span>
						</button>
						<h4 class="modal-title" id="LdialogLabel">Sign In <small ng-class="['font-danger', 'font-12']" ng-bind="login.error"></small></h4>
					</div>
					
					<form name="loginForm" novalidate>
						<div class="modal-body">
							<div class="form-horizontal">
								<fieldset>
									<div class="form-group">
										<label class="control-label col-lg-4" for="">Username:</label>
										<div class="col-lg-8">
											<input type="text" name="username_l" minlength="2" 
												class="form-control font-16" placeholder="Enter chef username" 
												required="required" ng-model="user.username" />
											<div ng-class="['font-danger', 'font-14']" ng-show="loginForm.username_l.$error.minlength < 8">
												Enter a username with minimum of 8 Characters
											</div>
											<div ng-show="loginForm.$submitted">
												<div ng-class="['font-danger', 'font-14']" ng-show="loginForm.username_l.$error.required">
													Enter a username!
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-4" for="">Password:</label>
										<div class="col-lg-8">
											<input type="password" minlength="8" name="password_l" 
												class="form-control font-16" placeholder="Enter Password" 
												required="required" ng-model="user.pwd" />
											<div ng-class="['font-danger', 'font-14']" ng-show="loginForm.password_l.$error.minlength < 8">
												Enter a password with minimum of 8 Characters
											</div>
											<div ng-show="loginForm.$submitted">
												<div ng-class="['font-danger', 'font-14']" ng-show="loginForm.password_l.$error.required">
													Enter a Password!
												</div>
											</div>
										</div>
										
									</div>
								</fieldset>
							</div>
							
						</div>

						<div class="modal-footer">
							<div class="btn-group">
								<button type="button" class="btn btn-danger" ng-click="login.clear ();" data-dismiss="modal"><small>Cancel</small></button>
								<button type="button" class="btn btn-success" ng-click="login.authenticate ();"><small>Authenticate</small></button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>

		<!-- Chef Registration Dialog -->
		<div class="modal fade" id="CRdialog" tabindex="-1" role="dialog" aria-labelledby="CRdialogLabel">
			<div class="modal-dialog " role="document">
				<div class="model-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="CRdialogLabel">Chef Registration <span style="font-size:11px;" class="text-muted chefLink">http://www.mypersonalchef.com.ng/@chef.<span id="chefurl"></span></spa></h4>
						
						<br>
						<div class="progress progress-small">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ng-style="{'width':progress + '%'}">
								<span ng-bind="progress">0</span>% Complete
							</div>
						</div>
						
					</div>
					<form name="registrationForm" novalidate>
						<div class="modal-body" style="overflow-y: scroll; height: 500px;">
							<div class="container-fluid">

								
									<div class="imgDataError error p-b-10 text-center"></div>
									<div class="row">
										<div class="col-sm-12 text-center">
											<img ngf-thumbnail="cook.img.val" 
												ng-class="['img-responsive', 'img-fluid', 'img-rounded', 'initial-display']" />
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 text-center">
											<span class="btn btn-default" ngf-select ng-model="cook.img.val" ngf-pattern="'image/*'" 
												ngf-accept="'image/*'" ngf-max-size="10MB" 
												ngf-resize="{width: 250, height: 250}" required="" name="image" >
												<i class="glyphicon glyphicon-upload"></i> Select Image
												<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.$submitted">
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.image.$error.required">Upload a profile image.</div>
												</div>
											</span>
											
										</div>
									</div>

									<div class="row">
										<div class="form-group">
											<div class="col-lg-12">
												<input type="text" ng-model="cook.fullname.val" name="fullname_r" class="form-control font-16"
													placeholder="Enter Your fullname eg. John Doe" required data-toggle="tooltip" 
													data-placement="top" title="Enter Fullname eg. John Doe" />
												<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.$submitted || registrationForm.fullname_r.$touched">
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.fullname_r.$error.required">Tell us your fullname.</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="col-lg-12" id="usernameDiv">
												
												<input type="text" ng-model="cook.username.val" name="username_r" class="form-control font-16" 
													placeholder="Enter Username eg. cookies" required data-toggle="tooltip" data-placement="top" checkusername />
													
												<span ng-class="['text-success', 'font-12']" ng-show="registrationForm.username_r.$pending.checkusername">validating username...</span>
												<span ng-class="['font-danger', 'font-12']" ng-show="registrationForm.username_r.$error.checkusername">This username is already taken!</span>
												
												<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.$submitted || registrationForm.username_r.$touched">
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.username_r.$error.required">Give us a username.</div>
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.username_r.$error.minlength < 8">Give us a username with characters > 8.</div>
												</div>
												
											</div>
										</div>

										<div class="form-group">
											<div class="col-lg-6">
												<input type="email" ng-model="cook.email.val" name="email_r" class="form-control font-16" placeholder="Enter email address"
													required="required"  data-toggle="tooltip" data-placement="top" title="Enter a valid email address" checkemail />
												
												<span ng-class="['text-success', 'font-12']" ng-show="registrationForm.email_r.$pending.checkemail">validating email...</span>
												<span ng-class="['font-danger', 'font-12']" ng-show="registrationForm.email_r.$error.checkemail">This email is already taken!</span>
												
												<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.$submitted || registrationForm.email_r.$touched">
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.email_r.$error.required">Tell us your email address.</div>
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.email_r.$error.email">Give us a valid email address.</div>
												</div>
											</div>
											<div class="col-lg-6">
												<input type="tel" ng-model="cook.tel.val" name="tel_r" class="form-control font-16" placeholder="Enter tel number" 
													required="required"  data-toggle="tooltip" data-placement="top" title="Enter a Telephone Number" checktel />
												
												<span ng-class="['text-success', 'font-12']" ng-show="registrationForm.tel_r.$pending.checktel">validating tel no...</span>
												<span ng-class="['font-danger', 'font-12']" ng-show="registrationForm.tel_r.$error.checktel">This tel no is already taken!</span>
												
												<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.$submitted || registrationForm.tel_r.$touched">
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.tel_r.$error.required">Tell us your tel. number.</div>
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.tel_r.$error.minlength < 8">Give us a valid tel number with a minimum of 8 nos.</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="col-lg-6">
												<input type="password" ng-model="cook.pwd.val" name="password_r" class="form-control font-16" placeholder="Enter Password" 
													required="required" data-toggle="tooltip" data-placement="top" title="Enter Password" />
												<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.$submitted || registrationForm.password_r.$touched">
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.password_r.$error.required">Give us a password.</div>
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.password_r.$error.minlength < 8">Give us a password with characters > 8.</div>
												</div>
											</div>
											<div class="col-lg-6">
												<input type="password" name="repassword_r" ng-model="cook.repwd.val" class="form-control font-16" placeholder="Re Enter Password" required data-toggle="tooltip" data-placement="top" title="Re enter password" />
												<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.$submitted || registrationForm.repassword_r.$touched">
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.repassword_r.$error.required">Re-type your password.</div>
													<div ng-class="['font-danger', 'font-12']" ng-show="registrationForm.repassword_r.$error.minlength < 8">Re type a password with characters > 8.</div>
													<div ng-class="['font-danger', 'font-12']" ng-show="cook.repwd.val != cook.pwd.val">Password should match.</div>
												</div>
											</div>
										</div>

										<br>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-left:30px; padding-right: 30px; padding-top:15px;">
													<label style="font-size:12px; font-weight: 500;">Select A Meal Delivery Plan</label>
													<select name="demand" class="form-control select" id="demand" ng-model="cook.del.val">
														<option value="1">Fixed Delivery [This option means all meals would be collected at a fixed time daily]</option>
														<option value="2">On Demand Delivery [This option allows our delivery merchant to pick up deliveries at ready time]</option>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group" ng-show="cook.del.val == 1">
											<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
												<input type="time" name="timed_r" ng-model="cook.pick.val" ng-value="cook.pick.val | date : 'h:mm:ss'" class="form-control font-16" 
													placeholder="Enter Delivery pick up time"  data-toggle="tooltip" data-placement="top" 
													title="Enter Delivery Pick up time" />										
											</div>
										</div>
										<br>

										<div class="form-group">
											<div class="col-lg-3">
												<div class="rslider" id="dateSlider" data-toggle="tooltip" data-placement="top" title="Select start and end times. From 0 implying 12:00 AM to 23:00 implying 11:00 PM."></div>
											</div>
											<div class="col-lg-9" style="margin-top: 25px;">
												<h3>
													<span id="sTime" ng-bind="cook.dur.start.val | myFilter | date : 'h:mm a'"></span> 
													- 
													<span id="eTime" ng-bind="cook.dur.end.val | myFilter | date : 'h:mm a'"></span>
												</h3>
												<input type="hidden" name="startTime" id="_startTime" ng-model="cook.dur.start.val" />
												<input type="hidden" name="endTime" id="_endTime" ng-model="cook.dur.end.val" />
											</div>

										</div>
										<br>

										<div class="form-group">
											<div class="col-lg-12">
												<textarea id="address_r" ng-model="cook.addr.val" name="address_r" class="form-control textarea" placeholder="Enter a valid (office / Kitchen / Residencial) address" required data-toggle="tooltip" data-placement="top" title="Enter a valid (office / Kitchen / Residencial) address"></textarea>
											</div>
										</div>

									</div>
								
							</div>

						</div>
					

						<div class="modal-footer">
							<div class="btn-group">
								<button type="button" class="btn btn-danger" data-dismiss="modal"><small>Cancel</small></button>
								<button type="submit" class="btn btn-success" ng-click = "cook.saveCook (registrationForm);"><small>Register</small></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Why become a personal chef Dialog -->
		<div class="modal fade" id="OPdialog" tabindex="-1" role="dialog" aria-labelledby="OPdialogLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="model-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="OPdialogLabel">Why Become A PersonalChef</h4>
					</div>

					<div class="modal-body">
						<p>MyPersonalChef.com is made for great Chefs like you. </p>
						<p>At no cost to you we provide you access to a vibrant community of foodies and gourmets.
							In addition you get the marketing, visibility, credibility that would skyrocket your operating costs otherwise.</p>
						<p>Just sign up for free and open a world of endless possibilities in the world of good food"</p>
					</div>

				</div>
			</div>
		</div>


		<!-- Rules And Regulations Dialog -->
		<div class="modal fade" id="RARdialog" tabindex="-1" role="dialog" aria-labelledby="RARdialogLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="model-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="RARdialogLabel">Terms And Conditions</h4>

					</div>

					<div class="modal-body">

					</div>

					<div class="modal-footer">

					</div>

				</div>
			</div>
		</div>

		<!-- Registered Alert -->
		<div class="modal fade" id="Confirmeddialog" tabindex="-1" role="dialog" aria-labelledby="ConfirmdialogLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="model-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="ConfirmdialogLabel">Registration Complete</h4>

					</div>

					<div class="modal-body" style="font-size: 11px; font-weight: 200;">
						<p>Thank you for registering with <a href="http://www.mypersonalchef.com.ng">mypersonalchef.com.ng</a>.</p>
						<p>A confirmation email has been sent to your provided email address.</p>
						<br>
						<p>Thanks</p>
						<p>Webadmin mypersonalchef.com.ng</p>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>


		<!-- Coming Soon Alert -->
		<div class="modal fade" id="ComingSoon" tabindex="-1" role="dialog" aria-labelledby="ComingSoonDialogLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="model-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="ConfirmdialogLabel">Coming Soon</h4>

					</div>

					<div class="modal-body" style="font-size: 11px; font-weight: 200;">
						<p>Thank you for Visiting <a href="http://www.mypersonalchef.com.ng">mypersonalchef.com.ng</a>.</p>
						<p>As we aim to make better the expirence we are making changes and improvements to our beloved site.</p>
						<p>Kindly, fill the form below to enable us reach you when the site is fully functional.</p>
						<br>

						<div class="form-horizontal">
							<fieldset>
								<div class="form-group">
									<label class="control-label col-lg-4" for="">Fullname:</label>
									<div class="col-lg-8">
										<input type="text"  ng-model="guest.name"  minlength="2" class="form-control font-16" placeholder="Please, Enter your Fullname" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-4" for="">Email Address:</label>
									<div class="col-lg-8">
										<input type="email" ng-model="guest.email" minlength="2" class="form-control font-16" placeholder="Please, Enter your email address" required />
									</div>
								</div>

							</fieldset>
						</div>
						<p></p>
						<p>Thanks</p>
						<p>Webadmin mypersonalchef.com.ng</p>
					</div>

					<div class="modal-footer">
						<div class="btn-group btn-group-raised btn-group-sm">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-success" data-dismiss="modal" ng-click="guest.saveGuest ();">Save</button>
						</div>
					</div>

				</div>
			</div>
		</div>


		<!-- jQuery -->
		<script src="<?=base_url('/assets/js/jquery.js');?>" type="text/javascript"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?=base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>
		
		<!-- Plugin JavaScript no idea why we placed these three here again -->
		
		<!-- Custom Theme JavaScript -->
		<script src="<?=base_url('/assets/js/creative.js');?>" type="text/javascript"></script>

		<!-- powerslider JavaScript -->
		<script src="<?=base_url('/assets/js/roundslider.min.js');?>" type="text/javascript"></script>
		
		<script src="<?=base_url('assets/js/angular.1.5.7.min.js');?>"></script>		
		<script src="<?=base_url('assets/js/angular-upload/ng-file-upload-shim.min.js');?>"></script> <!-- for no html5 browsers support -->
		<script src="<?=base_url('assets/js/angular-upload/ng-file-upload.min.js');?>"></script>
		<script src="<?=base_url('assets/js/controllers/homeCtrl.js');?>"></script>
		
		<!-- page jS manipulation -->
		<script type="text/javascript">
			$(function () {
				$('[data-toggle="tooltip"]').tooltip();
			});

			$('#dateSlider').roundSlider({
				sliderType: "range",
			    width: 18,
			    radius: "50",
			    value: "6,15",
			    editableTooltip: false,
			    max: "24",
			    mouseScrollAction: true,
			    circleShape: "pie",

			    change: function (args) {
					var element = angular.element ($('#dateSlider'));
					var scope = element.scope ();
					var sp = args.value.split(",");
					
					scope.$apply (function () {
						scope.cook.dur.start.val = sp[0];
						scope.cook.dur.end.val = sp[1];
					});
			    }
			});
		</script>

	</body>
</html>
