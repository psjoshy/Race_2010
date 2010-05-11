<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Merchandise Collector</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="title" content="Web site" />
	<meta name="description" content="Site description here" />
	<meta name="keywords" content="keywords here" />
	<meta name="language" content="en" />

 	<meta name="subject" content="Site subject here" />
	<meta name="robots" content="All" />
	<meta name="copyright" content="Cold Storage" />	
	<meta name="abstract" content="Site description here" />
	<meta name="MSSmartTagsPreventParsing" content="true" />

	<link rel="stylesheet" type="text/css" href="<?= $base ?>/stylesheets/styles.css" />
	<script src="<?= $base ?>/js/jquery.js"></script>
	<style type="text/css">
		#wrapper {
			background:#EEEEEE url(<?= $base ?>/images/bg.jpg?z=1210) repeat-y center top;
		}
		
		#header {
			background: #FFFFFF url(<?= $base ?>/images/header.jpg?z=1210) no-repeat center top;
		}
		
		#app_header {
			
			background-color: #014b88;
		}
		
		#nav1 {
			
			background-color: #0e9751;
		}
		
		#nav1 ul li a:hover {
			/*background: #B86E89 url(<?= $base ?>/images/selectedMenu.jpg?z=1210 ) repeat-x;*/
			background-color: #014b88;
			color: #FFFFFF;
		}
		
		#footer {
			background: #FFFFFF url(<?= $base ?>/images/footer.jpg?z=1210) no-repeat center top;
			color: #FFFFFF;
		}
		#footer p
		{
			color: #FFFFFF;
		}
	</style>
</head>
<body>
    <div id="wrapper">
    	<div id="header"></div>
    	<div id="app_header">Race Pack Collection</div>
    	<div id="nav1">
			<ul id="menus">
						<?
							if($this->session->userdata('type')=='admin')
							{
							?>
								<li><a href="<?= $base ?>/index.php/admin/">Main Menu</a></li>
								<li><a href="<?= $base ?>/index.php/usr/logout/">Logout</a></li>			
							<?
							}
													
							elseif($this->session->userdata('type')=='collector')
							{
							?>
								<li><a href="<?= $base ?>/index.php/collect/search">Home</a></li>
								<li><a href="<?= $base ?>/index.php/usr/logout/">Logout</a></li>
							<?
							}
							else
							{
							?>
							
							<li><a href="<?= $base ?>">Home</a></li>
							<?
							}
							?>

							
			</ul>
							</div>