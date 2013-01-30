<?php
$album_id = $mysqli->real_escape_string($_GET['album_id']);
$query = "SELECT m.id, m.ext FROM media m WHERE m.album_id ='$album_id' ORDER BY m.id DESC";
if($result=$mysqli->query($query)) {
	for($i=0; $i<$result->num_rows; $i++) {
		$rows = $result->fetch_row();
?>
		<div class="left-col-box">
			<div class="image_settings">Hi</div>
			<div class="album_image">
				<div class="image_settings">
					<button class="delete_button" id="<?php echo $rows[0];?>">Delete</button>
				</div>
				<img src="/includes/thumber.php?file=../img/<?php echo $rows[0]. '.'.$rows[1];?>&width=218&height=218" />
			</div>
		</div>
<?php
	}
}
?>	