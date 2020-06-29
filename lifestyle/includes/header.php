<header class="header sticky-top">
  <div class="container">
	<nav class="navbar navbar-expand-md navbar-dark">
	  <a class="navbar-brand" href="index">Lifestyle</a>
	  <a class="navbar-toggler d-md-none" type="button" data-toggle="collapse" href="#collapsibleNavId">
		<span class="navbar-toggler-icon"></span>
	  </a>
	  <div class="collapse navbar-collapse" id="collapsibleNavId">
		<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
		
		<!--display this menu if not logged in -->
		<?php if (!$loggedin) {?>

		  <li class="nav-item row">
			<span class="fa-stack fa-lg">
			  <i class="fa fa-user-plus fa-stack-1x fa-inverse"></i>
			</span>
			<a class="nav-link active" href="signup">
			  Sign Up
			</a>
		  </li>
		  
		  <li class="nav-item row">
			<span class="fa-stack fa-lg"> 
			  <i class="fa fa-sign-in fa-inverse fa-stack-1x"></i> 
			</span>
			<a class="nav-link active row" href="login">
			  Login
			</a>
		  </li>

		<!-- display this menu if logged in -->
		<?php } else {?>

		  <li class="nav-item active d-none text-uppercase d-lg-flex row">
			<span class="fa-stack fa-lg">
			  <i class="fa fa-stack-1x fa-map-marker fa-inverse"></i>
			</span>
			<a class="nav-link active" href="#">
			
			  <!--display the city of user from session variables if logged in -->
			  <?php echo $_SESSION['city'] ?>
			  
			</a>
		  </li>
		  
		  <li class="nav-item row">
			<span class="fa-stack fa-lg">
			  <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
			</span>
			<a class="nav-link active" href="cart">
			  Cart
			</a>
		  </li>
		  
		  <li class="nav-item row">
			<span class="fa-stack fa-lg">
			  <i class="fa fa-user fa-stack-1x fa-inverse"></i>
			</span>
			<a class="nav-link active" href="settings">
			  Settings
			</a>
		  </li>
		  
		  <li class="nav-item row">
			<span class="fa-stack fa-lg"> <i class="fa fa-sign-out fa-inverse fa-stack-1x"></i> </span>
			<a class="nav-link active row" href="php/logout">
			  Logout
			</a>
		  </li>

		<?php }?>

		</ul>
	  </div>
	</nav>
  </div>
</header>
