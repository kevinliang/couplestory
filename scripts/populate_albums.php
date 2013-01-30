<?php
	$query = "SELECT a.id, a.name FROM albums a WHERE a.uid='".$_SESSION['uid']."' ORDER BY a.id DESC ";
	
	if($result=$mysqli->query($query)) {
		for($i=0; $i<$result->num_rows; $i++) {
			$rows = $result->fetch_row();
			$query2 = "SELECT m.id, m.ext FROM media m WHERE m.album_id ='$rows[0]' ORDER BY m.id DESC LIMIT 1";
			if($result2=$mysqli->query($query2)) {
				if($result2->num_rows == 1) {
					$rows2 = $result2->fetch_row();
?>
					<a href="album/<?php echo $rows[0];?>">
						<div class="left-col-box">
							<div class="left-col-box-header">
								<?php echo $rows[1]; ?>
							</div>
								<img src="includes/thumber.php?file=../img/<?php echo $rows2[0]. '.'.$rows2[1];?>&width=217&height=217" />
						</div>
					</a>
<?php
				}
			}
		}
	}
?>	