<?php 
	function register_js($path) {
		return '<script type="text/javascript" src="' . $path . '"></script>';
	}	
 
	function render_js($path) {
		return '<script type="text/javascript" src="assets/js/' . $path . '"></script>';
	}

	function render_css($path) {
		return '<link rel="stylesheet" type="text/css" href="assets/css/' . $path . '" />';
	}

	function get_header() {
		require_once "views/header.php";
	}

	function get_footer() {
		require_once "views/footer.php";
	}

	function get_nav($pageTitle) {
		require_once "views/nav.php";
	}

	function debug($array) {
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}

	function render_error($message) {
		$error = $message;
		include 'views/errors.php';
	}
?>
