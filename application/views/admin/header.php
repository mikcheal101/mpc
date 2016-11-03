<body class="navbar-fixed sidebar-nav fixed-nav" ng-app="mpc" ng-controller="adminCntrl">
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
    <header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#" 
            	style="padding:4px; background-size: 0; text-align: -webkit-center; background-color:rgb(34, 35, 43); ">
            	<img style="width: 37px;" src="<?=base_url('assets/mpclogo.png');?>"  />
            </a>
            <ul class="nav navbar-nav hidden-md-down">
            	<li class="nav-item" onclick="hideleft();">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>
                <li class="nav-item p-x-1">
                    <?=anchor('admin/myProfile', '<i class="icon-user"></i> my profile', array('class'=>'nav-link'));?>
                </li>
                <li class="nav-item p-x-1">
                    <?=anchor('admin/settings', '<i class="icon-wrench"></i> settings', array('class'=>'nav-link'));?>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right hidden-md-down">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="<?=($user->image_url === NULL)? "http://placehold.it/100x100":$user->image_url;?>" 
                        	class="img-avatar">
                        <span class="hidden-md-down"><?=$user->username;?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                            <strong>Account</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="icon-bell"></i> System Log<span class="label label-info">42</span></a>
                        <a class="dropdown-item" href="#"><i class="icon-envelope"></i> Messages<span class="label label-success">42</span></a>
                        <div class="dropdown-header text-xs-center">
                            <strong>Settings</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="icon-user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="icon-wrench"></i> Settings</a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="<?=base_url('admin/logout');?>"><i class="icon-lock"></i> Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
                </li>
            </ul>
        </div>
    </header>
    
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="<?=($user->image_url === NULL)? "http://placehold.it/100x100":$user->image_url;?>" class="img-avatar" alt="Avatar">
            <div>
                <strong><?=($user->fullname === NULL)? "JOHN DOE":strtoupper($user->fullname);?></strong>
            </div>
            <div class="text-muted">
                <small>Web - Admin</small>
            </div>
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-link">
                    <i class="icon-settings"></i>
                </button>
                <button type="button" class="btn btn-link">
                    <i class="icon-speech"></i>
                    <span class="label label-warning label-pill">5</span>
                </button>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-title">
                    Dashboard
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.html"><i class="icon-speedometer"></i> DASHBOARD</a>
                </li>
                <li class="divider"></li>
                <li class="nav-title">
                    Navigation
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-wrench"></i> SETTINGS <span class="label label-danger">NEW</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-people"></i> CHEFS </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-paper-plane"></i> SYSTEM LOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-note"></i> TRANSACTIONS</a>
                </li>
            </ul>
        </nav>
        <div class="sidebar-footer">
            <ul class="sidebar-footer-menu">
                
                <li>
                    <div class="btn-group dropup">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-list"></i>
                            <span>Menu</span>
                        </button>
                        <div class="dropdown-menu">
                            <div class="dropdown-header text-xs-center">
                                <strong>Account</strong>
                            </div>
                            <a class="dropdown-item" href="#"><i class="icon-bell"></i> Logs<span class="label label-info">42</span></a>
                            <a class="dropdown-item" href="#"><i class="icon-envelope-open"></i> Messages<span class="label label-success">42</span></a>
                            <a class="dropdown-item" href="#"><i class="icon-docs"></i> Comments<span class="label label-warning">42</span></a>
                            <div class="dropdown-header text-xs-center">
                                <strong>Settings</strong>
                            </div>
                            <a class="dropdown-item" href="#"><i class="icon-user"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="icon-wrench"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="icon-credit-card"></i> Payments<span class="label label-default">42</span></a>
                            <div class="divider"></div>
                            <a class="dropdown-item" href="#"><i class="icon-logout"></i> Logout</a>
                        </div>
                    </div>
                </li>
                <li class="action">
                    <div class="btn-group dropup">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-people"></i>
                            <span>Chefs</span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                      </div>
                </li>
            </ul>
        </div>
    </div>
	<main class="main">
		<iframe style="width:86%; position:absolute; height: 100%" src="<?=base_url('admin/myProfile');?>"></iframe>