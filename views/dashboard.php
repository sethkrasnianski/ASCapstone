<?php get_header(); ?>
	<?php get_nav($_SESSION['Company']); ?>
	<div class="page">
		<div class="welcome">
			<?php if($_SESSION['PermissionLevel'] <= 2) { ?>
				<?php echo "what's up admin / employee?" ?>
			<?php } else { ?>
				<?php if($_SESSION['OrderPlaced'] !== true) { ?>
					<h1>Since this is your first time here,</h1>
					<p>You may want to start with <a href="?action=newOrder">creating an order</a>.</p>
				<?php } else { ?>
					<?php echo $_SESSION['Message']; ?>
				<?php } ?>
			<?php } ?>	
		</div>
	</div>
<?php get_footer(); ?>