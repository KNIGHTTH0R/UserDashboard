<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/assets/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/dashboard.css">

	<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<?php $this->load->view('partials/logged_in_navigation.php'); ?>

		<div class="row">
			<div class="col-xs-12">
				<h3>All Users</h3>
        <table class="table table-striped">
          <thead>
            <th>ID</th>
						<th>Name</th>
            <th>Email</th>
            <th>created_at</th>
            <th>user_level</th>
          </thead>
          <tbody>
						<?php foreach( $all_users as $user ){ ?>
						<tr>
	            <td><?= $user['id'] ?></td>
							<td>
								<a href="/users/show/<?= $user['id'] ?>">
									<?= $user['first_name'].' '.$user['last_name'] ?>
								</a>
							</td>
	            <td><?= $user['email'] ?></td>
	            <td><?= $user['created_at'] ?></td>
	            <td><?= $user['user_level'] ?></td>
						</tr>
						<?php } ?>
          </tbody>
        </table>
			</div>
		</div>
	</div> <!--end container -->
</body>
</html>
