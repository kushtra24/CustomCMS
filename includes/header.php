<?php 
include 'db.php';
include 'functions.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Personal blog</title>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name = "verification" content = "b035c5a7a8d230220fdfdf13b8be06e7" />

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="https://www.dritapp.com/xmlrpc.php">
<!-- works for ipad full screen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta type="text/css" rel="apple-touch-icon-precomposed" href="img/favicon.png">
<!-- works for ipad full screen -->
<meta name="description" content="Dritare app eshte nje aplikacion per dyer dhe dritare qe mundeson llogaritjen e cmimit per te gjitha llojet e dritareve dhe dyerve."/>
<meta name="robots" content="noodp"/>
<link rel="canonical" href="http://www.dritapp.ch/" />
<link rel="publisher" href="https://plus.google.com/+dritapp/about"/>
<meta property="og:locale" content="al_AL" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Dritapp - aplikacion per dyer dhe dritare" />
<meta property="og:description" content="Dritare app eshte nje aplikacion per dyer dhe dritare qe mundeson llogaritjen e cmimit per te gjitha llojet e dritareve dhe dyerve." />
<meta property="og:url" content="http://www.dritapp.ch/" />
<meta property="og:site_name" content="Dritapp" />

<!-- css -->

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/bootstrap.vertical-tabs.min.css">
<script src="https://use.fontawesome.com/4aa62c5f9a.js"></script>
<!-- <link rel="stylesheet" href="css/font-awesome.css"> -->
<!-- css -->

<!-- fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700italic,300' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
<!-- fonts -->



  <!-- Important Owl stylesheet -->
<link rel="stylesheet" href="css/owl.carousel.css">
 
<!-- Default Theme -->
<link rel="stylesheet" href="css/owl.theme.css">


  <!-- Jquery -->
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <!-- jQuery -->



</head>
<body>

<header>
<div class="top-header-canvas">
	<div class="container">
		<div class="col-md-9">
			<ul>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">Impressum</a></li>
				<li><a href="#">Media</a></li>
				<li><a href="admin/index.php">Admin</a></li>
			</ul>
		</div>
		<div class="col-md-3">
			<ul class="float-right">
				<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
				<li><a href="#"><i class="fa fa-behance-square"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
				<li><a href="#"><i class="fa fa-envelope-square"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="menu-herader">
	<div class="container">
		<div class="col-md-12">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">

						<?php 

						$query = "SELECT * FROM categories";
						$select_all_categories_query = mysqli_query($connect, $query);

						while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
							$cat_title = $row['cat_title'];
							echo "<li><a href=''>{$cat_title}</a></li>";
						}

						?>
						</ul>

						<div id="navigation-search-hook" class="">
						<span class="fa fa-search" style="display: inline-block;"></span>
						</div>

						<div id="navigation-search-form" class="active">
							<form method="post" action="search.php">
								<input name="search" type="text" placeholder="Enter search term and hit enter">
								<button class="btn btn-default" name="submit" type="submit"> <span class="fa fa-search" style="display: inline-block;"></span></button>
							</form>
							<span class="fa fa-close close_serach_form"></span>
						</div>
					</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>
</div>
</header>