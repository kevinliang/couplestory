
	<div id='album_name' class='modal_wrapper'>
		<div class="modal-header">
			Create an Album
		</div>
		<div class="album-name-wrapper modal-content-add">
			<form method="post" action="ajax/album_create.php">
				<span class="album_name">Album Name: </span><input type="text" id="aName" class="album_name" />
				<input type="submit" value="Create" id='album_submit' class="blue show_modal close" name='album' close='album_name'>
			</form>
		</div>
	</div> 