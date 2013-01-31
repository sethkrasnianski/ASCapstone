<?php include('views/header.php') ?>
<form action="." method="post">
	<input type="hidden" name="action" value="add-account" />
	<input type="text" name="FirstName" placeholder="First Name" />
	<input type="text" name="MiddleName" placeholder="Middle Name" />
	<input type="text" name="LastName" placeholder="Last Name" />
	<input type="text" name="Company" placeholder="Company" />
	<input type="text" name="Street" placeholder="Street" />
	<input type="text" name="Street2" placeholder="Street2" />
	<input type="text" name="City" placeholder="City" />
	<input type="text" name="State" placeholder="State" />
	<input type="text" name="Zip" placeholder="Zip" />
	<input type="text" name="Phone" placeholder="Phone" />
	<input type="text" name="Email" placeholder="Email" />
	<input type="text" name="DOB" placeholder="DOB" />
	<input type="text" name="Username" placeholder="Username" />
	<input type="text" name="Password" placeholder="Password" />
	<input type="submit" name="submit" value="Create Account">
</form>
<?php include('views/footer.php') ?>