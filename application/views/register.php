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

		<div class="row">
			<div class="col-xs-8">
				<h3>Register</h3>
				<?php
					if($this->session->flashdata("register_error"))
					{
						var_dump($this->session->flashdata("register_error"));
					}
				?>
        <form action="/process_registration" method="post">
          <div class="row spacer">
      			<div class="col-xs-4">
              Email Address:
              <input type="text" name="email" /><br />
            </div>
          </div> <!--end row -->
          <div class="row spacer">
      			<div class="col-xs-4">
              First Name:
              <input type="text" name="first_name" /><br />
            </div>
          </div> <!--end row -->
          <div class="row spacer">
      			<div class="col-xs-4">
              Last Name:
              <input type="text" name="last_name" /><br />
            </div>
          </div> <!--end row -->
          <div class="row spacer">
      			<div class="col-xs-4">
              Password:
              <input type="password" name="password"/><br />
            </div>
          </div> <!--end row -->
          <div class="row spacer">
      			<div class="col-xs-4">
              Password Confirmation:
              <input type="password" name="confirm_password"/><br />
            </div>
          </div> <!--end row -->
          <div class="row spacer">
            <div class="col-xs-6">
              <input type="submit" value="Register" /><br />
            </div>
          </div> <!--end row -->
        </form>
        <div class="row spacer">
          <div class="col-xs-6">
            <a href="/signin">Already have an account?  Log in.</a>
          </div>
        </div>
			</div>
		</div>
	</div> <!--end container -->
</body>
</html>
