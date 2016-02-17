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
				<h3>Sign in</h3>
        <form action="/login_check" method="post">
          <div class="row spacer">
      			<div class="col-xs-3">
              Email Address:
              <input type="text" name="email" /><br />
            </div>
          </div> <!--end row -->
          <div class="row spacer">
      			<div class="col-xs-3">
              Password:
              <input type="password" name="password"/><br />
            </div>
          </div> <!--end row -->
          <div class="row spacer">
            <div class="col-xs-6">
              <input type="submit" value="Sign In" /><br />
            </div>
          </div> <!--end row -->
        </form>
        <div class="row spacer">
          <div class="col-xs-6">
            <a href="/register">Don't have an account?  Register.</a>
          </div>
        </div>
			</div>
		</div>
	</div> <!--end container -->
</body>
</html>
