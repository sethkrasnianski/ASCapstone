<html>
<head>
	<title><?php echo $_SESSION['page_title'];?></title>
	<?php echo render_css("master.css"); ?>
	<?php echo render_css("jquery-ui.css"); ?>
	<?php echo render_js("jquery.js"); ?>
	<?php echo render_js("jquery-ui.js"); ?>
	<?php echo render_js("main.js"); ?>

	<!-- order -->
	<?php if ($_SERVER['REQUEST_URI'] === '/ASCapstone/?action=newOrder' || $_REQUEST['action'] === "editOrder") {
    	echo render_js("orders.js");
	} ?>

	<!-- employee -->
	<?php if($_SESSION['PermissionLevel'] <= 2) { ?>
		<?php echo render_css("employee.css"); ?>
	<?php } ?>


</head>
<body class="ease-4">
