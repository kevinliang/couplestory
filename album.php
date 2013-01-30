<?php session_start(); ?>
<!doctype html>
<?php require('includes/connect.php');?>
<head>
<?php include('includes/head.php'); ?>
</head>
<body>
	<div id='overlay' class='close_modal'></div>
		<?php include('includes/header.php'); ?>

	<div class="container clearfix">
		<?php include('includes/side_nav.php'); ?>
		<div class="main-content-wrapper">
			<div class="left-col-wrapper">
				<div class="edit-bar-wrapper clearfix">
					<div class="edit-bar">
						<button class="blue show_modal" name='add_media'><div class="plus"></div>&nbsp;Add Photos/Videos</button>
					</div>
				</div>
				<div class="main-content">
					<?php include('scripts/populate_album.php'); ?>
				</div>
			</div> <!-- end left-col-wrapper -->
			<div class="right-col-wrapper">
				<div class="right-col-box">
					<h2>
						LoveNotes
					</h2>
					<div class="right-col-box-content">
						Testing
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal_plain">
		<?php include('includes/modals/add_media.php'); ?>
	</div>
</body>
