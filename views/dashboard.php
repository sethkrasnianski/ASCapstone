<?php get_header(); ?>
	<?php get_nav($_SESSION['Company']); ?>
	<div class="page">
		<div class="welcome">
			<h1>Since this is your first time here,</h1>
			<p>You may want to start with <a href="?action=newOrder">creating an order</a>.</p>
			<pre>
				<?php print_r($_SESSION); ?>
			</pre>	
		</div>
	</div>
<?php get_footer(); ?>