<?php get_header(); ?>
	<?php get_nav("Forgot Password"); ?>
	<div class="center page">
		<div class="error"><?php echo $error; ?></div>
		<form action="." method="post" id="forgotPassword">
			<input type="hidden" name="action" value="resetPassword" />
			<input type="submit" name="submit" value="Reset Password" class="button submit">
			<input type="text" name="question" placeholder="Date of birth (ex. 11/12/2012)" class="question" value="<?php echo $_POST['question']; ?>" />
		</form>
	</div>
<?php get_footer(); ?>