<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/assets/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/signin.css">

	<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<?php $this->load->view('partials/navigation.php'); ?>
		<?php $this->load->view('partials/hero-unit.php'); ?>

		<div class="row">
			<div class="col-xs-4">
				<h4>Manage Users</h4>
				<p>
					Using this application, you'll earn how to add, remove, and edit users for the application.
				</p>
			</div>
			<div class="col-xs-4">
				<h4>Leave messages</h4>
				<p>
					Users will be able to leave a message to another user using this application.
				</p>
			</div>
			<div class="col-xs-4">
				<h4>Manage Users</h4>
				<p>
					Admins will be able to edit another user's information (email address, first name, last name, etc).
				</p>
			</div>
		</div> <!--end row -->

	</div> <!--end container -->
</body>
</html>
