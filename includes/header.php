<?php include 'head.php' ?>

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
				      <a class="navbar-brand" href="http://localhost/customcms"><img src="img/logo.png" alt="logo"></a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">

						<?php 

						$query = "SELECT * FROM categories";
						$select_all_categories_query = mysqli_query($connect, $query);

						while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
							$cat_title = $row['cat_title'];
							$is_menu = $row['is_menu'];
							if ($is_menu == true) {
							echo "<li><a href=''>{$cat_title}</a></li>";
							}
						}

						?>
						</ul>

						<div id="navigation-search-hook" class="">
						<span class="fa fa-search" style="display: inline-block;"></span>
						</div>

						<div id="navigation-search-form" class="hidden">
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