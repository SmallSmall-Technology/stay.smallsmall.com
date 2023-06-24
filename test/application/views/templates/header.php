<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/slider.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/daterange-custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/custom-checkbox.css" rel="stylesheet" type="text/css" />
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
<title>Stay One</title>
</head>

<body>
	<div class="main-container">
		<div class="navigation-bar">
			<div class="navigation-bar-inner">
				<div class="logo">
					<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="StayOne Logo" /></a>
				</div>
				
				<ul class="menu">
					<li class="menu-item check-in" id="check-in">Check In</li>
					
					<?php //echo $loggedIn; ?>
					<?php if(@$loggedIn){ ?>
					<li class="menu-item"><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
						<li class="menu-item item-full"><a href="<?php echo base_url('dashboard'); ?>">My Dashboard</a></li>
					<?php }else{ ?>
					    <li class="menu-item"><a href="<?php echo base_url('login'); ?>">Login</a></li>
						<li class="menu-item item-highlight"><a href="<?php echo base_url('signup'); ?>">Signup</a></li>
					<?php } ?>
					<li onClick="openNav()" class="menu-item last-menu-item">
						<div class="menu-bars">
							<span class="bar"></span>
							<span class="bar"></span>
							<span class="bar"></span>
						</div>
					</li>
				</ul>
			</div>
		</div>