<?php get_header($doc_title); ?>
	<?php get_nav("Forgot Password"); ?>
	<div class="center page">
		<div class="error"><?php echo $error; ?></div>
		<form action="." method="post" id="forgotPassword">
			<input type="hidden" name="action" value="validateNewPassword" />
			<input type="text" name="password1" placeholder="New Password" />
			<input type="text" name="password2" placeholder="Confirm Passoword" />
			<input type="submit" name="submit" value="Reset Password" class="button submit">
		</form>
	</div>
<?php get_footer(); ?>