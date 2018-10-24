<?php

echo '
<div id="head-full" class="row-aft">
	<header class="row-aft">
		<div id="logo">S</div>
		<div id="site-name">akecBlog</div>
		<nav class="nav">
			<a href="javascript:void(0);" class="icon row-bef" onclick="navHam()"><i class="fa fa-bars"></i></a>
			<a href="#" class="nav-active">Home</a>
			<a href="#">About Us</a>
			<a href="#" id="signin">Sign In</a>
		</nav>
	</header>
</div>
	';
include("signIn.php");

?>