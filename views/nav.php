<header>
	<nav class="top">
		<h1><?php echo $pageTitle; ?></h1>
		<div class="left"><a href="/ASCapstone/?action=logOut">Logout</a> <a href="/ASCapstone/?action=dashboard">Dashboard</a></div>
		<div class="menu button"></div>
	</nav>
	<nav class="bottom">
		<div class="right">
			<?php if($_SESSION['PermissionLevel'] === 3 || $_SESSION['PermissionLevel'] === 1) { ?>
				<a href="?action=newOrder"><span class="plus">+</span> New Order</a>
			<?php } ?>
			<?php if($_SESSION['PermissionLevel'] === 3 || $_SESSION['PermissionLevel'] === 1) { ?>
				<a href="#">Delete Order</a>
			<?php } ?>
			<a href="#" class="last">Contact Us</a>
		</div>
	</nav>
</header>