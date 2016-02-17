<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/assets/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/new.css">

	<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<?php $this->load->view('partials/logged_in_navigation.php'); ?>

		<div class="row">
			<a href="/dashboard"><button class="to-dashboard pull-right">Return to Dashboard</button></a>
			<div class="col-xs-4">
				<h3>Add a new user</h3>

        <form action="/dashboard/add_new_user" method="post">
				<div class="new-user">
          <div class="row spacer">
      			<div class="col-xs-12">
              <label>Email Address:</label>
              <input type="text" name="email" /><br />
            </div>
          </div> <!--end row -->

          <div class="row spacer">
      			<div class="col-xs-12">
              <label>First Name:</label>
              <input type="text" name="first_name" /><br />
            </div>
          </div> <!--end row -->

          <div class="row spacer">
      			<div class="col-xs-12">
              <label>Last Name:</label>
              <input type="text" name="last_name" /><br />
            </div>
          </div> <!--end row -->

          <div class="row spacer">
      			<div class="col-xs-12">
              <label>Password:</label>
              <input type="password" name="password"/><br />
            </div>
          </div> <!--end row -->

          <div class="row spacer">
      			<div class="col-xs-12">
              <label>Password Confirmation:</label>
              <input type="password" name="confirm_password"/><br />
            </div>
          </div> <!--end row -->

          <div class="row spacer">
            <div class="col-xs-3 text-right">
              <input class="create" type="submit" value="Create" /><br />
            </div>
          </div> <!--end row -->

        </form>
			</div>
		</div> <!--end row -->

	</div> <!--end container -->
</body>
</html>
