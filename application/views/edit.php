<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/assets/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/edit.css">

	<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<?php $this->load->view('partials/logged_in_navigation.php'); ?>

		<div class="row">
			<div class="col-xs-offset-1 col-xs-4 edit-info">
				<h3>Edit user <?= $profile_id ?></h3>
        <form action="/users/process_user_changes/<?= $profile_id ?>" method="post">
          <div class="row spacer">
      			<div class="col-xs-12">
              <label>Email Address:</label>
              <input type="text" name="email" value="<?= $email ?>"/><br />
            </div>
          </div> <!--end row -->

          <div class="row spacer">
      			<div class="col-xs-12">
              <label>First Name:</label>
              <input type="text" name="first_name" value="<?= $first_name ?>"/><br />
            </div>
          </div> <!--end row -->

          <div class="row spacer">
      			<div class="col-xs-12">
              <label>Last Name:</label>
              <input type="text" name="last_name" value="<?= $last_name ?>"/><br />
            </div>
          </div> <!--end row -->

          <div class="row spacer">
      			<div class="col-xs-12">
              <label>User Level:</label>
              <select name="user_level"/>
                <option value="1">
                  Normal
                </option>
                <option value="9">
                  Admin
                </option>
              </select>
            </div>
          </div> <!--end row -->

          <div class="row spacer">
            <div class="col-xs-12 text-right">
              <input class="save" type="submit" value="Save" /><br />
            </div>
          </div> <!--end row -->

        </form> <!-- end information form -->
			</div>

      <div class="col-xs-offset-1 col-xs-4 change-password">
        <div class="row">
          <div class="col-xs-12">
						<form action="/users/change_password/<?= $profile_id ?>" method="post">

            <h3>Change Password</h3>

            <label>Password:</label>
            <input type="password" name="password" />
          </div>
        </div> <!-- end row -->

        <div class="row spacer">
          <div class="col-xs-12">
            <label>Password Confirmation:</label>
            <input type="password" name="password_confirmation" />
          </div>
        </div> <!-- end row -->

        <div class="row spacer">
          <div class="col-xs-12 text-right">
            <input class="update-password" type="submit" value="Update Password" /><br />
          </div>
        </div> <!--end row -->

      </div>
		</div> <!-- end row -->
	</div> <!--end container -->
</body>
</html>
