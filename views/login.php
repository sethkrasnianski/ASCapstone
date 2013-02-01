<?php get_header(); ?>
<div id="login-box">
	<form action="." method="post">
		<input type="hidden" name="action" value="validateLogin">
		<table border="0">
			<tr>
				<td colspan="2" align="center"><h2 style="color:white;">Login</h2></td>
			</tr>

			<tr>
				<td colspan="2"><input type="text" name="User" placeholder="Username"/></td>
				<!-- <td colspan="2"><input type="text" name="firstName" class="myText" placeholder="first name"/></td> -->
			</tr>

			<tr>
				<td colspan="2"><input type="text" name="Pass" placeholder="Password"/></td>
			</tr>

			<tr>
				<td align="left"><input class="button"type="submit" name="submit" value="Submit"/></td>
				<td align="right"><a href="index.php?action=createAccount">Create an account</a></td>
			</tr>
		</table>
	</form>
</div>

<?php get_footer(); ?>