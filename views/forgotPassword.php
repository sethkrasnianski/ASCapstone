<?php get_header(); ?>
	<?php get_nav("Forgot Password"); ?>
	<div class="center page">
		<div class="error"><?php echo $error; ?></div>
		<form action="." method="post" id="forgotPassword">
			<input type="hidden" name="action" value="securityQuestions" />
			<input type="text" name="email" placeholder="Email" class="question" />
			<input type="submit" name="submit" value="Reset Password" class="button submit">
		</form>
	</div>
<?php get_footer(); ?>