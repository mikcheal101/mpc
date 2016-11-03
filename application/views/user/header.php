<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?="{$title} - {$sub_title}";?></title>
		
		<!-- Mobile support -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- Mobile support -->
		
		<!-- META DATA support -->
		<meta name="description" content="<?=$description;?>, Whatever You Choose Your Stomach Will Thank You. We bring food from the best Chef's in Nigeria to you, cooked uniquely for you. Just browse through your favourite dishes or search through Chefs by their specialties, create a meal plan and have the meals delivered to you at home or at the office. Invite a Chef to come cook at your home or get a great lesson. Whatever you choose, your stomach will thank you" />
		<meta name="keywords" content="<?=$keywords;?>, My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" >
		<!-- META DATA support -->
		
		<!-- FACEBOOK header meta data -->
		<?php if (isset($fb)):?>
		<meta property="og:url"         content="<?=$fb->url;?>" />
		<meta property="og:type"		content="article" />
		<meta property="og:title" 		content="<?=$fb->title;?>" />
		<meta property="og:site_name" 	content="MPC, My Personal Chef" />
		<meta property="og:image"   	content="<?=$fb->image;?>" />
		
		<meta name="og:description"	 	content="<?=$fb->description;?>" />
		<meta name="og:keywords" 		content="<?=$fb->keywords;?>" >
		<!-- FACEBOOK header meta data -->
		<?php endif; ?>
		<!-- TWITTER header meta data -->
		<meta name="twitter:title" content="My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" />
		<!-- TWITTER header meta data -->
		
		<!-- GOOGLE-PLUS header meta data -->
		<!-- GOOGLE-PLUS header meta data -->
		<?=link_tag('assets/mpclogo.ico', 'shortcut icon', 'image/x-icon', 'Mypersonalchef.com.ng icon');?>

		<?=link_tag('assets/css/bootstrap.min.css', 'stylesheet', 'text/css'); ?>
		<?=link_tag('assets/css/backgrounds.css', 'stylesheet', 'text/css'); ?>
		<?=link_tag('assets/css/border.css', 'stylesheet', 'text/css'); ?>
		<?=link_tag('assets/css/font-face.css', 'stylesheet', 'text/css'); ?>
		<?=link_tag('assets/css/font-awesome.min.css', 'stylesheet', 'text/css'); ?>
		<?=link_tag('assets/css/styles.css', 'stylesheet', 'text/css'); ?>
		<?=link_tag('assets/css/font-awesome.min.css', 'stylesheet', 'text/css'); ?>
		
		<style>
			@font-face {
			    font-family: 'icomoon';
			    src:     url("<?=base_url('assets/icons/icomoon.eot?d6820f');?>");
			    src:     url("<?=base_url('assets/icons/icomoon.eot?d6820f#iefix');?>") format('embedded-opentype'),
			         url("<?=base_url('assets/icons/icomoon.ttf?d6820f');?>") format('truetype'),
			         url("<?=base_url('assets/icons/icomoon.woff?d6820f');?>") format('woff'),
			         url("<?=base_url('assets/icons/icomoon.svg?d6820f#icomoon');?>") format('svg');
			    font-weight: normal;
			    font-style: normal;
			}
		</style>
		


		
	</head>
</html>
<body id="page-top" data-spy="scroll" data-target="mainNav">
	
	<?php
	    if (!is_null ($session)) $session = (array)$session;
		
	?>
    
	<nav id="" class="navbar navbar-default navbar-fixed-top no-shadow background-white text-black" style="border-color: rgba(0, 0, 0, 0.0)!important;" role="navigation">
		<div class="container-fluid" style="border-color: rgba(0, 0, 0, 0.2)!important; border:transparent;">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toogle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php $logo = "<img src='".base_url('assets/img/logo-light.png')."' class='height-x-40 p-l-30'  />"?>
				<?=anchor('/', $logo, array(
					'style'=>'text-transform:lowercase!important; padding:6px!important;',
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
					<?php if ($session !== null) : ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<?=$session['username'];?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php if ($session['type'] === "3") { ?>
								<li><?=anchor('chef/myProfile', 'My Profile');?></li>
							<?php } else if ($session['type'] === "2") { ?>
								<li><?=anchor('user/myProfile', 'My Profile');?></li>
							<?php } else if ($session['type'] === "1") { ?>
								<li><?=anchor('admin/myProfile', 'My Profile');?></li>
							<?php } ?>
							<li role="separator" class="divider"></li>
							<li><?=anchor('user/index', 'SignOut');?></li>
						</ul>
					</li>
					<?php endif; ?>
				</ul>
            	<ul class="nav navbar-nav navbar-right">
					<?php 
						if ($session['type'] === "2") echo "<li><a href='".site_url('user/viewMeals')."' class='text-black'>Order Meal</a></li>";
					?>
					<li><?=anchor('#about', 'About', array('class'=>"page-scroll text-black"));?></li>
					
			        <li class="dropdown">
			        	<a class="dropdown-toggle  text-black" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Extras <span class="caret text-black"></span></a>
			        	<ul class="dropdown-menu">
				        	<li><?=anchor('user/viewChefs', 'Chef Profiles', array('class'=>'text-black'));?></li>
				        	<li role="separator" class="divider"></li>
							<li><?=anchor('user/viewMeals', 'Browse Meals', array('class'=>'text-black'));?></li>
						</ul>
			        </li>
					
					<li><?=anchor('#contact', 'Contact Us', array('class'=>"page-scroll text-black"));?></li>
					<?php if ($session === null) { ?>
					<li>
						<?=anchor('#', 'Create an account', 	array(
						'class'=>"page-scroll text-black",  
						'data-toggle'=>"modal",
						'data-target'=>"#CRdialog"));?>
					</li>
					<?php } ?>
				</ul>
			</div>
				
		</div>
	</nav>
	
	
	<nav id="" class="navbar navbar-default navbar-fixed-bottom " style="background-color: rgba(0,0,0, 0.6); border-color: rgba(0, 0, 0, 0.2)!important;" role="navigation">
		<div class="container-fluid" style="border-color: rgba(0, 0, 0, 0.2)!important;">
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
            	<ul class="nav navbar-nav navbar-right" style="height: 69px;">
					
					<li class="color-gold" >
						<?=anchor('user/newDishes', '<i class="font-1-4 icon-new-dishes"></i>', array('class'=>'page-scroll color-gold'));?>
					</li>
					<li class="text-white" >
						<?=anchor('user/newPlaces', '<i class="font-1-4 color-gold icon-new-places"></i>', array('class'=>'page-scroll text-white'));?>
					</li>
					<li class="text-white" >
						<?=anchor('user/chefOfTheMonth', '<i class="font-1-4 color-gold icon-chef-of-the-month"></i>', array('class'=>'page-scroll text-white'));?>
					</li>
					<li class="text-white" >
						<?=anchor('user/ingredientsOfTheMonth', '<i class="font-1-4 color-gold icon-ingredients-of-the-month"></i>', array('class'=>'page-scroll text-white'));?>
					</li>
					<li class="text-white" >
						<?=anchor('user/shoppingMarkets', '<i class="font-1-4 color-gold icon-shopping-markets"></i>', array('class'=>'page-scroll text-white'));?>
					</li>
					<li class="text-white" >
						<?=anchor('user/cookingTips', '<i class="font-1-4 color-gold icon-cooking-tips"></i>', array('class'=>'page-scroll text-white'));?>
					</li>
					<li style="padding-left:10px;"><a class="page-scroll text-white"></a></li>
				</ul>
				
				<!--
				<ul class="nav navbar-nav navbar-left">
					<li><a class="page-scroll text-white">Terms & Conditions</a></li>
					<li><a class="page-scroll text-white">Safety & State</a></li>
					<li><a class="page-scroll text-white">&copy; 3Onze creations limited <?=date('Y');?></a></li>
				</ul>
				-->
			</div>
				
		</div>
	</nav>
				
	