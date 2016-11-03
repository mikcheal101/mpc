<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?=$title;?></title>
		
		<!-- Mobile support -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		
		<meta name="Description" content="My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" />
		
		<meta property="og:title" content="My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" />
		<meta property="og:Description" content="Personal Chef food delivery, My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" />
		<meta property="og:type" content="website" />
		<meta property="og:site_name" content="MPC, My Personal Chef" />
		<meta property="og:url" content="http://mypersonalchef.com.ng" />
		<meta property="og:image" content="http://ia.media-imdb.com/images/rock.jpg" />
		
		<meta name="twitter:title" content="My Personal Chef, Gourmet, meals, food, Nigeria, Chef, Chef gregs" />
		
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<!-- Material Design fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<?=link_tag('assets/mpclogo.ico', 'shortcut icon', 'image/x-icon', 'Mypersonalchef.com.ng icon');?>
		
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel="stylesheet" />
		<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' />
		<?=link_tag('assets/bootstrap/bootstrap.min.css', 'stylesheet');?>
		<link href="http://fezvrasta.github.io/snackbarjs/dist/snackbar.min.css" rel="stylesheet" />

		<script src="http://code.jquery.com/jquery-1.12.0.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0-beta.1/jquery-ui.js" type="text/javascript"></script>
		
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript" ></script>
		<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
		
		<script src="<?=base_url('assets/socket.io-client-master/socket.io.js');?>"></script>
		<script src="<?=base_url('assets/Sortable-master/Sortable.js');?>"></script>

		<!-- <script src="<?=base_url('assets/sockets/chefSocket.js');?>"></script> -->
		
		<!-- number formatting -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
		<!-- number formatting -->
		
		<!-- date picker -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.js"></script>
		<!-- date picker -->
		
		<script src="<?=base_url('assets/angular/angular.min.js');?>"></script>
		<script src="<?=base_url('assets/angular/angular-cookies.js');?>"></script>
		
		<script type="text/javascript">
		
			var pos = 0;
			
			$(document).ready(function() {
				$('#myLog').DataTable({
					"language": {
				      "emptyTable": "You are yet to add meals"
				    }
				});
				$('#ordersTable').DataTable({
					"language": {
				      "emptyTable": "You Have No Orders for today!"
				    }
				});
				
					
			});
		</script>
	</head>
</html>
<body>
				
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" class="navbar-toggle collapsed" >
					<span class="sr-only">Toogle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?=anchor('user/index', '<b>mypersonalchef.com.ng</b>', array('class'=>'navbar-brand'));?>
			</div>
			
			<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="<?=($location === 0)?'active':'';?>"><?=anchor('chef/myProfile', 'MY PROFILE');?></li>
					<li class="<?=($location === 1)?'active':'';?>"
						id="pop1" role="button" trigger="click"
							data-toggle="popover" data-content="Click Here to Create/Add your Meals" 
							title="Meals [Help Option]"  data-container=".navbar-nav" data-placement="bottom">
						<a href="<?=site_url('chef/meals');?>" >MEALS</a>
					</li>
					<li  class="<?=($location === 2)?'active':'';?>"
						data-toggle="popover" data-content="View Meals Below" 
						title="Meals Display / Listing [Help Option]"  data-placement="top"
						>
						<?=anchor('chef/orders', 'ORDERS FOR THE DAY');?>
					</li>
					<li 
						data-toggle="popover" data-content="Click to create / view your menu" 
						title="Menu Options [Help Option]"  data-placement="bottom"
					class="pop11 <?=($location === 3)?'active':'';?>"><?=anchor('chef/myMenu', 'MY MENU');?></li>
					<!-- <li class="<?=($location === 3)?'active':'';?>"><?=anchor('chef/sales', 'SALES');?></li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li
						data-toggle="popover" data-content="View Meals Below" 
						title="Meals Display / Listing [Help Option]"  data-placement="top"
					><?=anchor('chef/logout/user/index', 'sign-out <i class="glyphicon.glyphicon-log-out"></i>');?></li>
				</ul>
			</div>
		</div>
	</nav>
	