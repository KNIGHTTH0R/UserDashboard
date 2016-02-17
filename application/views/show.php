<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/assets/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/show.css">

	<script type="text/javascript" src="/assets/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<?php $this->load->view('partials/logged_in_navigation.php'); ?>

		<div class="row">
			<div class="col-xs-12">
        <h4><?= $profile['first_name'] ?> <?= $profile['last_name'] ?></h4>
        <div class="row spacer">
          <div class="col-xs-2">
            Registered at:
          </div>
          <div class="col-xs-3">
            <?= $profile['created_at'] ?>
          </div>
        </div> <!--end row -->
        <div class="row">
          <div class="col-xs-2">
            User ID:
          </div>
          <div class="col-xs-3">
            <?= $profile['id'] ?>
          </div>
        </div> <!--end row -->
        <div class="row">
          <div class="col-xs-2">
            Email address:
          </div>
          <div class="col-xs-3">
            <?= $profile['email'] ?>
          </div>
        </div> <!--end row -->
        <div class="row">
          <div class="col-xs-2">
            Description:
          </div>
          <div class="col-xs-3">
            <?= $profile['description'] ?>
          </div>
        </div> <!--end row -->
      </div>
    </div> <!--end row -->

    <div class="row spacer">
      <div class="col-xs-12">
        <h4>Leave a Message for <?= $profile['first_name'] ?></h4>
        <form action="/leave_message/<?= $profile['id'] ?>" method="post">
          <textarea name="content" placeholder="Write a message..." rows="3"></textarea>
					<div class="row spacer text-right">
	          <button class="post">Post</button>
	        </div>
        </form>
			</div>
		</div> <!--end row -->

		<?php foreach($messages as $message){ ?>
	    <div class="row spacer">
	      <div class="col-xs-12 message">
					<h5 class="timestamp">
						<?=$message['created_at']?>
					</h5>
	        <h5><?=$message['first_name']." ".$message['last_name']?> wrote:</h5>
	        <p class="message">
	          <?= $message['content'] ?>
	        </p>
				</div>
			</div> <!--end row -->

			<?php
				if(isset($message['comments'])){
					foreach($message['comments'] as $comment){
			?>
		    <div class="row">
		      <div class="comment col-xs-offset-1 col-xs-11">
						<h5 class="timestamp">
							<?=$comment['created_at']?>
						</h5>
		        <h5><?=$comment['first_name']." ".$comment['last_name']?> wrote:</h5>
		        <p class="comment">
		          <?= $comment['comment_content'] ?>
		        </p>
					</div>
				</div>
			<?php
					}
				}
			?>
			<form action="/leave_comment/<?= $message['id'] ?>/<?= $profile['id'] ?>" method="post">
				<div class="row">
		      <div class="comment col-xs-offset-1 col-xs-11">
		        <textarea name="content" rows="3" placeholder="Write a comment..."></textarea>
		        <div class="row spacer text-right">
		          <button class="post">Post</button>
		        </div>
		      </div>
		    </div> <!--end row -->
			</form>
		<?php } ?> <!-- end messages foreach -->

	</div> <!--end container -->
</body>
</html>
