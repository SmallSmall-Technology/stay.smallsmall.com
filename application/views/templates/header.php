<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?php echo base_url(); ?>assets/css/style.css?version=<?php echo rand(2, 999); ?>.10.<?php echo rand(2, 999); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/slider.css?version=<?php echo rand(1, 999); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/custom-select.css?version=<?php echo rand(1, 999); ?>" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/daterange-custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/custom-checkbox.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/side-nav.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!---<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />--->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>Stay SmallSmall</title>
</head>

<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a target="_blank" href="https://rent.smallsmall.com/properties">Rent</a>
        <a href="<?php echo base_url(); ?>">Nightly stay</a>
        <a target="_blank" href="https://buy.smallsmall.com">Buy</a>
        <span class="check-in">Virtual Checkin</span>
        
        <div class="companyinfo">
            You can call us on<br /><a href="tel:+2349037222669">09037222669</a> and <a href="tel:+2349036339800">09036339800</a><br />or email us at<br /><a href="mailto:hello@smallsmall.com">hello@smallsmall.com</a>
        </div>
    </div>
	<div class="main-container">
		<div class="navigation-bar">
			<div class="navigation-bar-inner">
				<div class="logo">
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="StayOne Logo" /></a>
				</div>
				
				<ul class="menu">
					<li class="menu-item check-in" id="check-in">Virtual Check-In</li>
					
					<?php //echo $loggedIn; ?>
					<?php if(@$loggedIn && @$user_type == 'tenant'){ ?>
					
					    <li class="menu-item"><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
						<li class="menu-item item-full"><a href="https://rent.smallsmall.com/user/dashboard">My Dashboard</a></li>
						
					<?php }else if(@$loggedIn && @$user_type == 'landlord'){ ?>
					
					    <li class="menu-item"><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
						<li class="menu-item item-full"><a href="https://rent.smallsmall.com/landlord/dashboard">My Dashboard</a></li>
						
					<?php }else{ ?>
					    
					    <li class="menu-item"><a href="<?php echo base_url('login'); ?>">Login</a></li>
						<li class="menu-item item-highlight"><a href="<?php echo base_url('signup'); ?>">Signup</a></li>
						
					<?php } ?>
					<!---<li onClick="openNav()" class="menu-item last-menu-item">
						<div class="menu-bars">
							<span class="bar"></span>
							<span class="bar"></span>
							<span class="bar"></span>
						</div>
					</li>--->
				</ul>
			</div>
		</div>
		<div class="mobile-navigation-header mobile-header <?php echo @$mob_color; ?>">
            <div class="mobile-navigation-inner">
                <div class="mobile-logo"><a href="<?php echo base_url(); ?>"></a></div>
                <div class="mobile-navigation">
                    <div onclick="openNav()" class="hamburger-menu">
                        <div class="hamburger-bars"></div>
                        <div class="hamburger-bars"></div>
                        <div class="hamburger-bars"></div>
                    </div>
                    <?php if(@$userID && @$user_type == 'tenant' ){ ?>
                    
                            <!--- Tenant button ---->
                            <li class="mob-top-btn register-btn-mobile"><a href="<?php echo base_url('user/dashboard'); ?>"><span></span><span>Dashboard</span></a></li>
                    
                    <?php }else if(@$userID && @$user_type == 'landlord' ){ ?>
                            
                            <!--- Landlord button ---->
                            <li class="mob-top-btn register-btn-mobile"><a href="<?php echo base_url('landlord/dashboard'); ?>"><span></span><span>Dashboard</span></a></li>
                    
                    <?php }else{ ?>
                        
                            <div class="mob-top-btn register-btn-mobile"><a href="<?php echo base_url('signup'); ?>">Create account</a></div>
                            <div class="mob-top-btn login-btn-mobile"><a href="<?php echo base_url('login'); ?>"></a></div>
                            
                    <?php } ?>
                    
                </div>
            </div>
        </div>