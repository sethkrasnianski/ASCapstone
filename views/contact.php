<?php get_header($doc_title); ?>
<?php get_nav($_SESSION['Company']); ?>
	<div class="center page">
		<div id="contact-form">
			<form action="" method="post">
				<div class="control-box"><input type="text" placeholder="Name"/></div>
				<div class="clearall"></div>

				<div class="control-box"><input type="text" placeholder="Email"/></div>
				 <div class="clearall"></div>

				<div class="control-box"><input type="text" placeholder="Subject"/></div>
				<div class="clearall"></div>

				<div class="control-box"><textarea placeholder="Body"></textarea></div>
				<div class="clearall"></div>

				<div class="submit-wrap" align="right">
					<input type="submit" class="button" value="Send"/>
				</div>	
			</form>
		</div>
	</div>
<?php get_footer(); ?>