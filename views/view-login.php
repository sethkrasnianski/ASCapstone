<?php 
	include("views/header.php");
?>
<div id="login-box">
	<form action="." method="post">
		<input type="hidden" name="action" value="add-test">
		<table border="0">
			<tr>
				<td colspan="2" align="center"><h2 style="color:white;">Customer Login</h2></td>
			</tr>

			<tr>
				<!-- <td colspan="2"><input type="text" name="User" class="myText" placeholder="Username"/></td> -->
				<td colspan="2"><input type="text" name="firstName" class="myText" placeholder="first name"/></td>
			</tr>

			<tr>
				<!-- <td colspan="2"><input type="text" name="Pass" class="myText" placeholder="Password"/></td> -->
			</tr>

			<tr>
				<td align="left"><input class="myButton"type="submit" name="Submit" value="submit"/></td>
				<td align="right"><a href="#">Create an account</a></td>

				
			</tr>


		</table>
	</form>
	<form action="." method="post">
		<input type="hidden" name="action" value="create-account"/ >
		<input id="submit" type="submit" name="submit" value="submit" />
	</form>
</div>

<?php
	include("views/footer.php")
?>