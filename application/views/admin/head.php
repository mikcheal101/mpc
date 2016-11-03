<!DOCTYPE html>
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
		

 		<!-- <link href="css/css.css" rel="stylesheet" type="text/css"> -->
		
		<link href="<?=base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
 		<link href="<?=base_url('assets/css/styles.css');?>" rel="stylesheet" type="text/css">
 		<link href="<?=base_url('assets/css/bootstrap-multiselect.css');?>" rel="stylesheet" type="text/css">
 		
		<?=link_tag('assets/css/index.min.css', 'stylesheet', 'text/css'); ?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
 		<style>
 			button.multiselect { white-space: initial; }
 		</style>
		
		
	</head>
	<body ng-app="mpc" ng-controller="adminCtrl">
		<div class="container-fluid">