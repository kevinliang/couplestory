	<div id='overlay' class='close_modal'></div>
	<?php include('includes/header.php'); ?>
	<div class="container clearfix">
		<?php include('includes/side_nav.php'); ?>
		<div class="main-content-wrapper">
			<div class="left-col-wrapper">
				<div class="edit-bar-wrapper clearfix">
					<div class="edit-bar">
						<button class="blue show_modal" name='test'><div class="plus"></div>&nbsp;Add a Memory</button>
					</div>
				</div>
				<div class="main-content">
					<?php include('scripts/populate_albums.php'); ?>
				</div>
			</div>
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
			<!-- Modal -->
			
<div class="modal_plain">
	<?php include('includes/modals/upload.php');?>
	<?php include('includes/modals/album_name.php'); ?>
	<div id='test' class='modal_wrapper'>
		<div class="modal-header">
			Add a Memory
		</div>
		<div class="modal-content-add">
			<div class="modal-3column-box">
				<div class="column-content">
					Add a Status
				</div>
			</div>
			<button class="modal-3column-box show_modal close" name="album_name" close="test">
				<div class="column-content">
					Add an Album
				</div>
			</button>
			<div class="modal-3column-box">
				<div class="column-content">
					Add a Video
				</div>
			</div>
		</div>
	</div> 
</div>